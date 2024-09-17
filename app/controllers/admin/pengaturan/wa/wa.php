<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class wa extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pengaturan/Wa/mWA');

	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$data = $this->mWA->semuaDataWa();
			$_SESSION['page'] = "AWa";
			$_SESSION['dataWa'] = $data;
			$_SESSION['filterWa'] = "Semua";
			$_SESSION['editDataWa'] = "";
			$_SESSION['viewEditDataWa'] = 0;
			$_SESSION['report'] = '';
			// print_r($data);
			redirect('./');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mWA->filterWa($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "AWa";
			$_SESSION['dataWa'] = $data;
			$_SESSION['filterWa'] = $status;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}	

	public function updatePublis() {
		$idWa = $_GET['i'];
		$update = $this->mWA->publisWA($idWa);
		$data = $this->mWA->filterWA($_SESSION['filterWa']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AWa";
			$_SESSION['dataWa'] = $data;
			$_SESSION['filterWa'] = $_SESSION['filterWa'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idWa = $_GET['i'];
		$update = $this->mWA->privasiWA($idWa);
		$data = $this->mWA->filterWA($_SESSION['filterWa']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AWa";
			$_SESSION['dataWa'] = $data;
			$_SESSION['filterWa'] = $_SESSION['filterWa'];
			redirect('./');
		}
	}

	public function tambahWa() {
		$judul = $this->input->post('nama', TRUE);
		
		$tambah = $this->mWA->addWa($judul);
		if ($tambah == 1) {
			$_SESSION['report'] = '1';
			redirect('index.php/admin/pengaturan/Wa/Wa');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/pengaturan/Wa/Wa');
		}

		return true;
	}

	// public function viewEditJenis() {
	// 	$idJenis = $_GET['i'];
	// 	$edit = $this->mJenis->viewEditJenis($idJenis);
	// 	$_SESSION['editDataJenis'] = $edit;
	// 	$_SESSION['viewEditDataJenis'] = 1;
	// 	$_SESSION['report'] = '';
	// 	redirect('./');
	// }

	// public function editJenis() {
	// 	$id = $_GET['i'];
	// 	$judul = $this->input->post('judul', TRUE);
	// 	$edit = $this->mJenis->editDataJenis($id, $judul);
	// 	if ($edit == 1) {
	// 		$_SESSION['report'] = 1;
	// 		redirect('index.php/admin/pengaturan/Jenis/Jenis');
	// 	}else{
	// 		$_SESSION['report'] = 0;
	// 		redirect('index.php/admin/pengaturan/Jenis/Jenis');
	// 	}
		
	// 	return $report;
	// }
}
