<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mPengguna extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataPengguna() {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("SELECT 
		a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, 
		a.tx_alamat, a.vc_notel, a.img_user, a.sts_user, b.level_id, 
		b.level_ket, a.id_struktural 
		FROM `user` a JOIN level b ON a.level_id = b.level_id 
		ORDER BY a.id_user DESC, sts_user DESC");
		foreach ($pengguna->result() AS $r){
			$h['no'] = $no++;
			$h['id_user'] = $r->id_user;
			$h['un_user'] = $r->un_user;
			$h['pass_user'] = $r->pass_user;
			$h['nama_user'] = $r->nama_user;
			$h['vc_nik'] = $r->vc_nik;
			$h['vc_bpjs'] = $r->vc_bpjs;
			$h['tx_alamat'] = $r->tx_alamat;
			$h['vc_notel'] = $r->vc_notel;
			$h['img_user'] = $r->img_user;
			$h['sts_user'] = $r->sts_user;
			$h['level_id'] = $r->level_id;
			$h['level_ket'] = $r->level_ket;
			$h['id_struktural'] = $r->id_struktural;
			$cekStruktural = $this->db->query("SELECT * FROM struktural WHERE id_struktural = '$r->id_struktural'");
			$rcekStruktural = $cekStruktural->result();
			$h['ket_struktural'] = $rcekStruktural->ket_struktural;
			$h['sts_struktural'] = $rcekStruktural->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterPengguna($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, a.tx_alamat,
			a.vc_notel, a.img_user, a.sts_user, b.level_id, b.level_ket, a.id_struktural
			FROM `user` a 
			JOIN level b ON a.level_id = b.level_id 
			ORDER BY a.id_user DESC, sts_user DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, a.tx_alamat,
			a.vc_notel, a.img_user, a.sts_user, b.level_id, b.level_ket, a.id_struktural
			FROM `user` a 
			JOIN level b ON a.level_id = b.level_id 
			WHERE a.sts_user = 1
			ORDER BY a.id_user DESC, sts_user DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, a.tx_alamat,
			a.vc_notel, a.img_user, a.sts_user, b.level_id, b.level_ket, a.id_struktural
			FROM `user` a 
			JOIN level b ON a.level_id = b.level_id 
			WHERE a.sts_user = 0
			ORDER BY a.id_user DESC, sts_user DESC";
		} else {
			$filter = "SELECT 
			a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, a.tx_alamat,
			a.vc_notel, a.img_user, a.sts_user, b.level_id, b.level_ket, a.id_struktural
			FROM `user` a 
			JOIN level b ON a.level_id = b.level_id 
			ORDER BY a.id_user DESC, sts_user DESC";
		}

		$data = array();
		$no = 1;	
        $pengguna = $this->db->query($filter);

		foreach ($pengguna->result() AS $r){
			$h['no'] = $no++;
			$h['id_user'] = $r->id_user;
			$h['un_user'] = $r->un_user;
			$h['pass_user'] = $r->pass_user;
			$h['nama_user'] = $r->nama_user;
			$h['vc_nik'] = $r->vc_nik;
			$h['vc_bpjs'] = $r->vc_bpjs;
			$h['tx_alamat'] = $r->tx_alamat;
			$h['vc_notel'] = $r->vc_notel;
			$h['img_user'] = $r->img_user;
			$h['sts_user'] = $r->sts_user;
			$h['level_id'] = $r->level_id;
			$h['level_ket'] = $r->level_ket;
			$h['id_struktural'] = $r->id_struktural;
			$cekStruktural = $this->db->query("SELECT * FROM struktural WHERE id_struktural = '$r->id_struktural'");
			$rcekStruktural = $cekStruktural->result();
			$h['ket_struktural'] = $rcekStruktural->ket_struktural;
			$h['sts_struktural'] = $rcekStruktural->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisPengguna($idPengguna) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `user` SET `sts_user` = '1' 
		WHERE `id_user` = '$idPengguna'");
	}

	public function privasiPengguna($idPengguna) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `user` SET `sts_user` = '0' 
		WHERE `id_user` = '$idPengguna'");
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

	public function addPengguna($nik, $nama, $bpjs, $mail, $tel, $alamat, $status, $struktural) {
		// $tgl = date("Y-m-d");
		$pass = rand();	
		$addPengguna = $this->db->query("INSERT INTO `user` (`level_id`, `un_user`, `pass_user`, `nama_user`, `vc_nik`, `vc_bpjs`, `tx_alamat`, `vc_notel`, `id_struktural`, `img_user`, `sts_user`) 
			VALUES ('$status', '$mail', '$pass', '$nama', '$nik', '$bpjs', '$alamat', '$tel', '$struktural', './public/admin/dist/img/avatar5.png', '1')");
		if ($addPengguna) {
			// $ambilIdPengguna = $this->db->query("SELECT id_pengumuman FROM `pengumuman`ORDER BY tgl_pengumuman DESC LIMIT 1");
			// $rowData = $ambilIdPengguna->result();
			// $_SESSION['ambilIdPengguna'] = $rowData;
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function dellPengumuman($id) {
		$dell = $this->db->query("DELETE FROM `pengumuman` WHERE id_pengumuman = $id");
	}

	public function viewEdit($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, a.tx_alamat,
		a.vc_notel, a.img_user, a.sts_user, b.level_id, b.level_ket, a.id_struktural
		FROM `user` a 
		JOIN level b ON a.level_id = b.level_id
		WHERE a.id_user = '$id'
		ORDER BY a.id_user DESC, sts_user DESC");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['id_user'] = $r->id_user;
			$h['un_user'] = $r->un_user;
			$h['pass_user'] = $r->pass_user;
			$h['nama_user'] = $r->nama_user;
			$h['vc_nik'] = $r->vc_nik;
			$h['vc_bpjs'] = $r->vc_bpjs;
			$h['tx_alamat'] = $r->tx_alamat;
			$h['vc_notel'] = $r->vc_notel;
			$h['img_user'] = $r->img_user;
			$h['sts_user'] = $r->sts_user;
			$h['level_id'] = $r->level_id;
			$h['level_ket'] = $r->level_ket;
			$h['id_struktural'] = $r->id_struktural;
			$cekStruktural = $this->db->query("SELECT * FROM struktural WHERE id_struktural = '$r->id_struktural'");
			$rcekStruktural = $cekStruktural->result();
			$h['ket_struktural'] = $rcekStruktural->ket_struktural;
			$h['sts_struktural'] = $rcekStruktural->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataPengguna($i, $nik, $nama, $bpjs, $mail, $tel, $alamat, $status, $dtStruktur) {
		$edit = $this->db->query("UPDATE `user` SET level_id = '$status', `un_user` = '$mail', `nama_user` = '$nama', `vc_nik` = '$nik', `vc_bpjs` = '$bpjs', `tx_alamat` = '$alamat', `vc_notel` = '$tel', `id_struktural` = '$dtStruktur' 
		WHERE `id_user` = $i");
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

	public function viewReset($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, a.tx_alamat,
		a.vc_notel, a.img_user, a.sts_user, b.level_id, b.level_ket, a.id_struktural
		FROM `user` a 
		JOIN level b ON a.level_id = b.level_id
		WHERE a.id_user = '$id'
		ORDER BY a.id_user DESC, sts_user DESC");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['id_user'] = $r->id_user;
			$h['un_user'] = $r->un_user;
			$h['pass_user'] = $r->pass_user;
			$h['nama_user'] = $r->nama_user;
			$h['vc_nik'] = $r->vc_nik;
			$h['vc_bpjs'] = $r->vc_bpjs;
			$h['tx_alamat'] = $r->tx_alamat;
			$h['vc_notel'] = $r->vc_notel;
			$h['img_user'] = $r->img_user;
			$h['sts_user'] = $r->sts_user;
			$h['level_id'] = $r->level_id;
			$h['level_ket'] = $r->level_ket;
			$h['id_struktural'] = $r->id_struktural;
			$cekStruktural = $this->db->query("SELECT * FROM struktural WHERE id_struktural = '$r->id_struktural'");
			$rcekStruktural = $cekStruktural->result();
			$h['ket_struktural'] = $rcekStruktural->ket_struktural;
			$h['sts_struktural'] = $rcekStruktural->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}
}