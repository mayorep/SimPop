<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mEdukasi extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataEdukasi() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idEdukasi,
		a.vc_judul,
		a.lt_link,
		a.int_idJenisEdukasi,
		a.dt_tanggal,
		a.int_status,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user 
		ORDER BY a.int_idEdukasi DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idEdukasi'] = $r->int_idEdukasi;
			$h['vc_judul'] = $r->vc_judul;
			$h['lt_link'] = $r->lt_link;
			$h['int_idJenisEdukasi'] = $r->int_idJenisEdukasi;
			$h['dt_tanggal'] = $r->dt_tanggal;
			$h['int_status'] = $r->int_status;
			$h['id_user'] = $r->idUser;
			$h['nama_user'] = $r->namaUser;
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

	public function filterEdukasi($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.int_idEdukasi,
			a.vc_judul,
			a.lt_link,
			a.int_idJenisEdukasi,
			a.dt_tanggal,
			a.int_status,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user 
			ORDER BY a.int_idEdukasi DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.int_idEdukasi,
			a.vc_judul,
			a.lt_link,
			a.int_idJenisEdukasi,
			a.dt_tanggal,
			a.int_status,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user 
			WHERE a.int_status = 1
			ORDER BY a.int_status DESC, a.dt_tanggal DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.int_idEdukasi,
			a.vc_judul,
			a.lt_link,
			a.int_idJenisEdukasi,
			a.dt_tanggal,
			a.int_status,
			b.id_user AS idUser,
			b.nama_user AS namaUser
			FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user
			WHERE a.int_status = 0 
			ORDER BY a.int_status DESC, a.dt_tanggal DESC";
		} else {
			$filter = "";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idEdukasi'] = $r->int_idEdukasi;
			$h['vc_judul'] = $r->vc_judul;
			$h['lt_link'] = $r->lt_link;
			$h['int_idJenisEdukasi'] = $r->int_idJenisEdukasi;
			$h['dt_tanggal'] = $r->dt_tanggal;
			$h['int_status'] = $r->int_status;
			$h['id_user'] = $r->idUser;
			$h['nama_user'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisEdukasi($idEdukasi) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE tb_edukasi SET int_status = '1' 
		WHERE int_idEdukasi = '$idEdukasi'");
	}

	public function privasiEdukasi($idEdukasi) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE tb_edukasi SET int_status = '0' 
		WHERE int_idEdukasi = '$idEdukasi'");
	}

	public function addEdukasi($idUser, $judul, $jenis, $linkData) {
		$tgl = date("Y-m-d");	
        $addEdukasi = $this->db->query("INSERT INTO tb_edukasi 
		(id_user, vc_judul, lt_link, int_idJenisEdukasi, dt_tanggal, int_status) 
		VALUES ('$idUser', '$judul', '$linkData', '$jenis', '$tgl', '1')");
		if ($addEdukasi) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function viewEditEdukasi($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.int_idEdukasi,
		a.vc_judul,
		a.lt_link,
		a.int_idJenisEdukasi,
		a.dt_tanggal,
		a.int_status,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user 
		WHERE a.int_idEdukasi = '$id'
		ORDER BY a.int_status DESC, a.dt_tanggal DESC");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['int_idEdukasi'] = $r->int_idEdukasi;
			$h['vc_judul'] = $r->vc_judul;
			$h['lt_link'] = $r->lt_link;
			$h['int_idJenisEdukasi'] = $r->int_idJenisEdukasi;
			$h['dt_tanggal'] = $r->dt_tanggal;
			$h['int_status'] = $r->int_status;
			$h['id_user'] = $r->idUser;
			$h['nama_user'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataEdukasi($id, $judul, $jenis, $link) {
		$edit = $this->db->query("UPDATE `tb_edukasi` 
		SET `vc_judul` = '$judul', `lt_link` = '$link', `int_idJenisEdukasi` = '$jenis' 
		WHERE `int_idEdukasi` = '$id'");
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