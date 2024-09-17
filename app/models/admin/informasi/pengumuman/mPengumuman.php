<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mPengumuman extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataPengumuman() {
		$data = array();
		$no = 1;	
        $pengumuman = $this->db->query("SELECT 
		a.id_pengumuman as id_pengumuman,
		a.judul_pengumuman as judul_pengumuman,
		a.gbr_pengumuman as gbr_pengumuman,
		a.tgl_pengumuman as tgl_pengumuman,
		a.isi_pengumuman as isi_pengumuman,
		a.status_pengumuman AS status_pengumuman,
		b.id_user  AS idUser,
		b.nama_user AS namaUser
		FROM pengumuman a JOIN user b ON a.user_id = b.id_user  ORDER BY status_pengumuman DESC, tgl_pengumuman DESC");

		foreach ($pengumuman->result() AS $r){
			$h['no'] = $no++;
			$h['id_pengumuman'] = $r->id_pengumuman;
			$h['judul_pengumuman'] = $r->judul_pengumuman;
			$h['gbr_pengumuman'] = $r->gbr_pengumuman;
			$h['tgl_pengumuman'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['isi_pengumuman'] = $r->isi_pengumuman;
			$h['status_pengumuman'] = $r->status_pengumuman;
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
        $pengumuman = $this->db->query("SELECT 
		a.id_pengumuman as id_pengumuman,
		a.judul_pengumuman as judul_pengumuman,
		a.gbr_pengumuman as gbr_pengumuman,
		a.tgl_pengumuman as tgl_pengumuman,
		a.isi_pengumuman as isi_pengumuman,
		a.status_pengumuman AS status_pengumuman,
		b.id_user  AS idUser,
		b.nama_user AS namaUser
		FROM pengumuman a JOIN user b ON a.user_id = b.id_user
		WHERE a.status_pengumuman = 1
		ORDER BY a.id_pengumuman DESC LIMIT 6");

		foreach ($pengumuman->result() AS $r){
			$h['no'] = $no++;
			$h['id_pengumuman'] = $r->id_pengumuman;
			$h['judul_pengumuman'] = $r->judul_pengumuman;
			$h['gbr_pengumuman'] = $r->gbr_pengumuman;
			$h['tgl_pengumuman'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['isi_pengumuman'] = $r->isi_pengumuman;
			$h['status_pengumuman'] = $r->status_pengumuman;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterPengumuman($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.id_pengumuman as id_pengumuman,
			a.judul_pengumuman as judul_pengumuman,
			a.gbr_pengumuman as gbr_pengumuman,
			a.tgl_pengumuman as tgl_pengumuman,
			a.isi_pengumuman as isi_pengumuman,
			a.status_pengumuman AS status_pengumuman,
			b.id_user  AS idUser,
			b.nama_user AS namaUser
			FROM pengumuman a JOIN user b ON a.user_id  = b.id_user  ORDER BY status_pengumuman DESC, tgl_pengumuman DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.id_pengumuman as id_pengumuman,
			a.judul_pengumuman as judul_pengumuman,
			a.gbr_pengumuman as gbr_pengumuman,
			a.tgl_pengumuman as tgl_pengumuman,
			a.isi_pengumuman as isi_pengumuman,
			a.status_pengumuman AS status_pengumuman,
			b.id_user  AS idUser,
			b.nama_user AS namaUser
			FROM pengumuman a JOIN user b ON a.user_id  = b.id_user  WHERE status_pengumuman = 1 ORDER BY status_pengumuman DESC, tgl_pengumuman DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.id_pengumuman as id_pengumuman,
			a.judul_pengumuman as judul_pengumuman,
			a.gbr_pengumuman as gbr_pengumuman,
			a.tgl_pengumuman as tgl_pengumuman,
			a.isi_pengumuman as isi_pengumuman,
			a.status_pengumuman AS status_pengumuman,
			b.id_user  AS idUser,
			b.nama_user AS namaUser
			FROM pengumuman a JOIN user b ON a.user_id  = b.id_user  WHERE status_pengumuman = 0 ORDER BY status_pengumuman DESC, tgl_pengumuman DESC";
		} else {
			$filter = "SELECT 
			a.id_pengumuman as id_pengumuman,
			a.judul_pengumuman as judul_pengumuman,
			a.gbr_pengumuman as gbr_pengumuman,
			a.tgl_pengumuman as tgl_pengumuman,
			a.isi_pengumuman as isi_pengumuman,
			a.status_pengumuman AS status_pengumuman,
			b.id_user  AS idUser,
			b.nama_user AS namaUser
			FROM pengumuman a JOIN user b ON a.user_id  = b.id_user  ORDER BY status_pengumuman DESC, tgl_pengumuman DESC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['id_pengumuman'] = $r->id_pengumuman;
			$h['judul_pengumuman'] = $r->judul_pengumuman;
			$h['gbr_pengumuman'] = $r->gbr_pengumuman;
			$h['tgl_pengumuman'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['isi_pengumuman'] = $r->isi_pengumuman;
			$h['status_pengumuman'] = $r->status_pengumuman;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisPengumuman($idPengumuman) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `pengumuman` SET `status_pengumuman` = '1' 
		WHERE `id_pengumuman` = '$idPengumuman'");
	}

	public function privasiPengumuman($idPengumuman) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `pengumuman` SET `status_pengumuman` = '0' 
		WHERE `id_pengumuman` = '$idPengumuman'");
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

	public function addPengumuman($idUser, $judul, $isi, $namaBaru) {
		$tgl = date("Y-m-d");	
        $addArtikel = $this->db->query("INSERT INTO `pengumuman` (user_id, `judul_pengumuman`, `gbr_pengumuman`, `tgl_pengumuman`, `isi_pengumuman`, `status_pengumuman`) 
		VALUES ('$idUser', '$judul', '$namaBaru', '$tgl', '$isi', '1')");
		if ($addArtikel) {
			$ambilIdArtikel = $this->db->query("SELECT id_pengumuman FROM `pengumuman`ORDER BY tgl_pengumuman DESC LIMIT 1");
			$rowData = $ambilIdArtikel->result();
			$_SESSION['ambilIdArtikel'] = $rowData;
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function dellPengumuman($id) {
		$dell = $this->db->query("DELETE FROM `pengumuman` WHERE id_pengumuman = $id");
	}

	public function viewEditPengumuman($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.id_pengumuman as id_pengumuman,
		a.judul_pengumuman as judul_pengumuman,
		a.gbr_pengumuman as gbr_pengumuman,
		a.tgl_pengumuman as tgl_pengumuman,
		a.isi_pengumuman as isi_pengumuman,
		a.status_pengumuman AS status_pengumuman,
		b.id_user  AS idUser,
		b.nama_user AS namaUser
		FROM pengumuman a JOIN user b ON a.user_id = b.id_user 
		WHERE a.id_pengumuman = '$id'");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['id_pengumuman'] = $r->id_pengumuman;
			$h['judul_pengumuman'] = $r->judul_pengumuman;
			$h['gbr_pengumuman'] = $r->gbr_pengumuman;
			$h['tgl_pengumuman'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['isi_pengumuman'] = $r->isi_pengumuman;
			$h['status_pengumuman'] = $r->status_pengumuman;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataPengumuman($id, $judul, $isi) {
		$edit = $this->db->query("UPDATE `pengumuman` SET `judul_pengumuman` = '$judul', `isi_pengumuman` = '$isi' 
		WHERE `id_pengumuman` = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function editFotoPengumuman($id, $target_dir, $namaBaru) {
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
								$edit = $this->db->query("UPDATE `pengumuman` SET `gbr_pengumuman` = '$namaBaru'
								WHERE `id_pengumuman` = $id");
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