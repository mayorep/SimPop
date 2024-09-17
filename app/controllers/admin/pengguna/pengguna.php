<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class pengguna extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pengguna/mPengguna');
		$this->load->model('wa/mWA');
	}
	
	public function index() {
		$data = $this->mPengguna->semuaDataPengguna();
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "APengguna";
			$_SESSION['dataPengguna'] = $data;
			$_SESSION['filterPengguna'] = "Semua";
			$_SESSION['editDataPengguna'] = "";
			$_SESSION['viewEditDataPengguna'] = 0;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mPengguna->filterPengguna($status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "APengguna";
			$_SESSION['dataPengguna'] = $data;
			$_SESSION['filterPengguna'] = $status;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function updatePublis() {
		$idPengguna = $_GET['i'];
		$update = $this->mPengguna->publisPengguna($idPengguna);
		$data = $this->mPengguna->filterPengguna($_SESSION['filterPengguna']);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "APengguna";
			$_SESSION['dataPengguna'] = $data;
			$_SESSION['filterPengguna'] = $_SESSION['filterPengguna'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idPengguna = $_GET['i'];
		$update = $this->mPengguna->privasiPengguna($idPengguna);
		$data = $this->mPengguna->filterPengguna($_SESSION['filterPengguna']);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "APengguna";
			$_SESSION['dataPengguna'] = $data;
			$_SESSION['filterPengguna'] = $_SESSION['filterPengguna'];
			redirect('./');
		}
	}

	public function tambahPengguna() {
		$nik = $this->input->post('nik', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$bpjs = $this->input->post('bpjs', TRUE);
		$mail = $this->input->post('mail', TRUE);
		$tel = $this->input->post('tel', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		$status = $this->input->post('status', TRUE);
		$dtStruktur = $this->input->post('struktural', TRUE);
		
		$cekun = $this->db->query("SELECT un_user FROM user WHERE un_user = '$mail' OR vc_notel = '$tel'");
		$row = $cekun->num_rows();
		if ($row == 0) {
			// $idUser = $_SESSION['idUser'];
			// $target_dir = "./public/admin/dist/img/foto/Pengguna/";
			// $namaBaru = $target_dir.$idUser.rand()."_".$judul.".jpg";
			$tambah = $this->mPengguna->addPengguna($nik, $nama, $bpjs, $mail, $tel, $alamat, $status, $dtStruktur);
			if ($tambah == 1) {
				// $tambah = $this->mPengguna->uploadFoto($target_dir, $namaBaru);
				// if ($tambah == 1) {
					$report = 1;	
				// 	$_SESSION['report'] = '1';
					redirect('./admin/Pengguna/Pengguna');
				// }else{
				// 	$id = $_SESSION['ambilIdPengguna'];
				// 	echo $id;
				// 	$tambah = $this->mPengguna->dellPengguna($id);
				// 	$report = 0;
				// 	$_SESSION['report'] = '0';
				// 	// redirect('./admin/Informasi/Pengguna/Pengguna');
				// }
			}else{
				$report = 0;
				$_SESSION['report'] = '0';
				redirect('./admin/Pengguna/Pengguna');
			}
			echo $status."-".$report;
		} else {
			?>
			<script type='text/javascript'>
				let text ="Email Atau Nomer Telepon sudah terdaftar";
				if (confirm(text) == true) {
					window.location.replace('./');
				} else {
					window.location.replace('./');
				}
			</script>
			<?php
		}
		
		return $report;
	}

	public function viewEditPengguna() {
		$idPengguna = $_GET['i'];
		$edit = $this->mPengguna->viewEdit($idPengguna);
		$_SESSION['editDataPengguna'] = $edit;
		$_SESSION['viewEditDataPengguna'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editPengguna() {
		$i = $_GET['i'];
		$nik = $this->input->post('nik', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$bpjs = $this->input->post('bpjs', TRUE);
		$mail = $this->input->post('mail', TRUE);
		$tel = $this->input->post('tel', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		$status = $this->input->post('status', TRUE);
		$dtStruktur = $this->input->post('struktural', TRUE);
		
		$cekun = $this->db->query("SELECT un_user FROM user WHERE un_user = '$mail' OR vc_notel = '$tel'");
		$row = $cekun->num_rows();
		if ($row == 0) {
			// $idUser = $_SESSION['idUser'];
			// $target_dir = "./public/admin/dist/img/foto/Pengguna/";
			// $namaBaru = $target_dir.$idUser.rand()."_".$judul.".jpg";
			$tambah = $this->mPengguna->editDataPengguna($i, $nik, $nama, $bpjs, $mail, $tel, $alamat, $status, $dtStruktur);
			if ($tambah == 1) {
				// $tambah = $this->mPengguna->uploadFoto($target_dir, $namaBaru);
				// if ($tambah == 1) {
					$report = 1;	
				// 	$_SESSION['report'] = '1';
					redirect('./admin/Pengguna/Pengguna');
				// }else{
				// 	$id = $_SESSION['ambilIdPengguna'];
				// 	echo $id;
				// 	$tambah = $this->mPengguna->dellPengguna($id);
				// 	$report = 0;
				// 	$_SESSION['report'] = '0';
				// 	// redirect('./admin/Informasi/Pengguna/Pengguna');
				// }
			}else{
				$report = 0;
				$_SESSION['report'] = '0';
				redirect('./admin/Pengguna/Pengguna');
			}
			echo $status."-".$report;
		} else {
			?>
			<script type='text/javascript'>
				let text ="Email Atau Nomer Telepon sudah terdaftar";
				if (confirm(text) == true) {
					window.location.replace('./');
				} else {
					window.location.replace('./');
				}
			</script>
			<?php
		}
		
		return $report;
	}

	public function resetPassword() {
		$idPengguna = $_GET['i'];
		$dataPengguna = $this->mPengguna->viewReset($idPengguna);
		$user = $dataPengguna['data'][0]['un_user'];
		$pass_user = $dataPengguna['data'][0]['pass_user'];
		$notel = $dataPengguna['data'][0]['vc_notel'];
		$pesan = "Akun anda telah di reset. Silakan masuk dengan user *$user* dan Password *$pass_user*";
		// print_r($dataPengguna['data'][0]['un_user']);
		$this->mWA->kirimWA($notel, $pesan);
		redirect('./');
	}

	
}
