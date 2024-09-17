<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mDaftarPertanyaan extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataDaftarPertanyaan() {
		$data = array();
		$no = 1;	
        $pengumuman = $this->db->query("SELECT 
		a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
		a.dt_tglPertanyaan, a.int_statusPertanyaan
		FROM pertanyaan a 
		JOIN user b ON a.id_user = b.id_user 
		ORDER BY int_idPertanyaan DESC");

		foreach ($pengumuman->result() AS $r){
			$h['no'] = $no++;
			$h['int_idPertanyaan'] = $r->int_idPertanyaan;
			$h['tx_pertanyaan'] = $r->tx_pertanyaan;
			$h['tx_jawaban'] = $r->tx_jawaban;
			$h['dt_tglPertanyaan'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['int_statusPertanyaan'] = $r->int_statusPertanyaan;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterPertanyaan($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
			a.dt_tglPertanyaan, a.int_statusPertanyaan
			FROM pertanyaan a 
			JOIN user b ON a.id_user = b.id_user 
			ORDER BY int_idPertanyaan DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
			a.dt_tglPertanyaan, a.int_statusPertanyaan
			FROM pertanyaan a 
			JOIN user b ON a.id_user = b.id_user 
			WHERE int_statusPertanyaan = 1
			ORDER BY int_idPertanyaan DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
			a.dt_tglPertanyaan, a.int_statusPertanyaan
			FROM pertanyaan a 
			JOIN user b ON a.id_user = b.id_user 
			WHERE int_statusPertanyaan = 0
			ORDER BY int_idPertanyaan DESC";
		} else {
			$filter = "SELECT 
			a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
			a.dt_tglPertanyaan, a.int_statusPertanyaan
			FROM pertanyaan a 
			JOIN user b ON a.id_user = b.id_user 
			ORDER BY int_idPertanyaan DESC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idPertanyaan'] = $r->int_idPertanyaan;
			$h['tx_pertanyaan'] = $r->tx_pertanyaan;
			$h['tx_jawaban'] = $r->tx_jawaban;
			$h['dt_tglPertanyaan'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['int_statusPertanyaan'] = $r->int_statusPertanyaan;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisPertanyaan($idPertanyaan) {
		$data = array();
		$no = 1;	
        $pertanyaan = $this->db->query("UPDATE `pertanyaan` SET `int_statusPertanyaan` = '1' 
		WHERE `int_idPertanyaan` = '$idPertanyaan'");
	}

	public function privasiPertanyaan($idPertanyaan) {
		$data = array();
		$no = 1;	
        $pertanyaan = $this->db->query("UPDATE `pertanyaan` SET `int_statusPertanyaan` = '0' 
		WHERE `int_idPertanyaan` = '$idPertanyaan'");
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

	public function addPertanyaan($idUser, $pertanyaan, $jawaban) {
		$tgl = date("Y-m-d");	
        $addArtikel = $this->db->query("INSERT INTO `pertanyaan` 
		(tx_pertanyaan, `tx_jawaban`, `id_user`, `dt_tglPertanyaan`, `int_statusPertanyaan`) 
		VALUES ('$pertanyaan', '$jawaban', '$idUser', '$tgl', '1')");
		if ($addArtikel) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function dellPengumuman($id) {
		$dell = $this->db->query("DELETE FROM `pengumuman` WHERE id_pengumuman = $id");
	}

	public function viewEditPertanyaan($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
		a.dt_tglPertanyaan, a.int_statusPertanyaan
		FROM pertanyaan a 
		JOIN user b ON a.id_user = b.id_user 
		WHERE a.int_idPertanyaan = '$id'
		ORDER BY int_idPertanyaan DESC");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['int_idPertanyaan'] = $r->int_idPertanyaan;
			$h['tx_pertanyaan'] = $r->tx_pertanyaan;
			$h['tx_jawaban'] = $r->tx_jawaban;
			$h['dt_tglPertanyaan'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['int_statusPertanyaan'] = $r->int_statusPertanyaan;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataPertanyaan($idUser, $id, $pertanyaan, $jawaban) {
		$edit = $this->db->query("UPDATE `pertanyaan` SET `tx_pertanyaan` = '$pertanyaan', `tx_jawaban` = '$jawaban' 
		WHERE `int_idPertanyaan` = '$id'");
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

	public function dellPertanyaan($id) {
		$edit = $this->db->query("DELETE FROM `pertanyaan` WHERE `int_idPertanyaan` = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}
}