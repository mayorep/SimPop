<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mArtikel extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataArtikel() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.id_artikel as idArtikel,
		a.judul_artikel as judulArtikel,
		a.gbr_artikel as gambarArtikel,
		a.tgl_artikel as tglArtikel,
		a.isi_artikel as isiArtikel,
		a.status_artikel AS statusArtikel,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM artikel a JOIN user b ON a.user_id = b.id_user ORDER BY status_artikel DESC, tgl_artikel DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['idArtikel'] = $r->idArtikel;
			$h['judulArtikel'] = $r->judulArtikel;
			$h['gambarArtikel'] = $r->gambarArtikel;
			$h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			$h['isiArtikel'] = $r->isiArtikel;
			$h['statusArtikel'] = $r->statusArtikel;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function limitEnam() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.id_artikel as idArtikel,
		a.judul_artikel as judulArtikel,
		a.gbr_artikel as gambarArtikel,
		a.tgl_artikel as tglArtikel,
		a.isi_artikel as isiArtikel,
		a.status_artikel AS statusArtikel,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM artikel a JOIN user b ON a.user_id = b.id_user 
		WHERE a.status_artikel = 1
		ORDER BY a.id_artikel DESC LIMIT 6");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['idArtikel'] = $r->idArtikel;
			$h['judulArtikel'] = $r->judulArtikel;
			$h['gambarArtikel'] = $r->gambarArtikel;
			$h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			$h['isiArtikel'] = $r->isiArtikel;
			$h['statusArtikel'] = $r->statusArtikel;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterArtikel($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.id_artikel as idArtikel,
			a.judul_artikel as judulArtikel,
			a.gbr_artikel as gambarArtikel,
			a.tgl_artikel as tglArtikel,
			a.isi_artikel as isiArtikel,
			a.status_artikel AS statusArtikel,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM artikel a JOIN user b ON a.user_id = b.id_user 
			ORDER BY status_artikel DESC, tgl_artikel DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.id_artikel as idArtikel,
			a.judul_artikel as judulArtikel,
			a.gbr_artikel as gambarArtikel,
			a.tgl_artikel as tglArtikel,
			a.isi_artikel as isiArtikel,
			a.status_artikel AS statusArtikel,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM artikel a JOIN user b ON a.user_id = b.id_user 
			WHERE status_artikel = 1 ORDER BY status_artikel DESC, tgl_artikel DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.id_artikel as idArtikel,
			a.judul_artikel as judulArtikel,
			a.gbr_artikel as gambarArtikel,
			a.tgl_artikel as tglArtikel,
			a.isi_artikel as isiArtikel,
			a.status_artikel AS statusArtikel,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM artikel a JOIN user b ON a.user_id = b.id_user WHERE status_artikel = 0 ORDER BY status_artikel DESC, tgl_artikel DESC";
		} else {
			$filter = "SELECT 
			a.id_artikel as idArtikel,
			a.judul_artikel as judulArtikel,
			a.gbr_artikel as gambarArtikel,
			a.tgl_artikel as tglArtikel,
			a.isi_artikel as isiArtikel,
			a.status_artikel AS statusArtikel,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM artikel a JOIN user b ON a.user_id = b.id_user ORDER BY status_artikel DESC, tgl_artikel DESC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['idArtikel'] = $r->idArtikel;
			$h['judulArtikel'] = $r->judulArtikel;
			$h['gambarArtikel'] = $r->gambarArtikel;
			$h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			$h['isiArtikel'] = $r->isiArtikel;
			$h['statusArtikel'] = $r->statusArtikel;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisArtikel($idArtikel) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `artikel` SET `status_artikel` = '1' 
		WHERE `id_artikel` = '$idArtikel'");
	}

	public function privasiArtikel($idArtikel) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `artikel` SET `status_artikel` = '0' 
		WHERE `id_artikel` = '$idArtikel'");
	}

	public function uploadFoto($target_dir, $namaBaru) {
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$report = 3;
		}else{
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$report = 4;
			} else {
				if ($_FILES["fileToUpload"]["size"] > 2000000) {
					echo "Sorry, your file is too large.";
					$report = 5;
				} else {
					if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						if($check !== false) {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								rename($target_file,$namaBaru);
								echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$report = 1;
							} else {
								echo "Sorry, there was an error uploading your file.";
								$report = 6;
							}
						} else {
							echo "File is not an image.";
							$report = 7;
						}
					}
				}
			}

		}
		return $report;
	}

	public function addArtikel($idUser, $judul, $isi, $namaBaru) {
		$tgl = date("Y-m-d");	
        $addArtikel = $this->db->query("INSERT INTO `artikel` (user_id, `judul_artikel`, `gbr_artikel`, `tgl_artikel`, `isi_artikel`, `status_artikel`) 
		VALUES ('$idUser', '$judul', '$namaBaru', '$tgl', '$isi', '1')");
		if ($addArtikel) {
			$ambilIdArtikel = $this->db->query("SELECT id_artikel FROM `artikel`ORDER BY tgl_artikel DESC LIMIT 1");
			$rowData = $ambilIdArtikel->result();
			$_SESSION['ambilIdArtikel'] = $rowData;
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function dellArtikel($id) {
		$dell = $this->db->query("DELETE FROM `artikel` WHERE `artikel`.`id_artikel` = $id");
	}

	public function viewEditArtikel($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.id_artikel as idArtikel,
		a.judul_artikel as judulArtikel,
		a.gbr_artikel as gambarArtikel,
		a.tgl_artikel as tglArtikel,
		a.isi_artikel as isiArtikel,
		a.status_artikel AS statusArtikel,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM artikel a JOIN user b ON a.user_id = b.id_user 
		WHERE a.id_artikel = '$id'");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['idArtikel'] = $r->idArtikel;
			$h['judulArtikel'] = $r->judulArtikel;
			$h['gambarArtikel'] = $r->gambarArtikel;
			$h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			$h['isiArtikel'] = $r->isiArtikel;
			$h['statusArtikel'] = $r->statusArtikel;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataArtikel($id, $judul, $isi) {
		$edit = $this->db->query("UPDATE `artikel` SET `judul_artikel` = '$judul', `isi_artikel` = '$isi' 
		WHERE `id_artikel` = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function editFotoArtikel($id, $target_dir, $namaBaru) {
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$report = 3;
		}else{
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$report = 4;
			} else {
				if ($_FILES["fileToUpload"]["size"] > 2000000) {
					echo "Sorry, your file is too large.";
					$report = 5;
				} else {
					if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						if($check !== false) {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								rename($target_file,$namaBaru);
								// echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$edit = $this->db->query("UPDATE `artikel` SET `gbr_artikel` = '$namaBaru'
								WHERE `id_artikel` = $id");
								if ($edit) {
									$report = 1;
								}else{
									$report = 0;
								}
							} else {
								echo "Sorry, there was an error uploading your file.";
								$report = 6;
							}
						} else {
							echo "File is not an image.";
							$report = 7;
						}
					}
				}
			}

		}
		return $report;
	}
}