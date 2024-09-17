<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class jenis extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pengaturan/jenis/mJenis');

	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$data = $this->mJenis->semuaDataJenis();
			$_SESSION['page'] = "AJenis";
			$_SESSION['dataJenis'] = $data;
			$_SESSION['filterJenis'] = "Semua";
			$_SESSION['editDataJenis'] = "";
			$_SESSION['viewEditDataJenis'] = 0;
			$_SESSION['report'] = '';
			// print_r($data);
			redirect('./');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mJenis->filterJenis($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "AJenis";
			$_SESSION['dataJenis'] = $data;
			$_SESSION['filterJenis'] = $status;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}	

	public function updatePublis() {
		$idJenis = $_GET['i'];
		$update = $this->mJenis->publisJenis($idJenis);
		$data = $this->mJenis->filterJenis($_SESSION['filterJenis']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AJenis";
			$_SESSION['dataJenis'] = $data;
			$_SESSION['filterJenis'] = $_SESSION['filterJenis'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idJenis = $_GET['i'];
		$update = $this->mJenis->privasiJenis($idJenis);
		$data = $this->mJenis->filterJenis($_SESSION['filterJenis']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AJenis";
			$_SESSION['dataJenis'] = $data;
			$_SESSION['filterJenis'] = $_SESSION['filterJenis'];
			redirect('./');
		}
	}

	public function tambahJenis() {
		$judul = $this->input->post('nama', TRUE);
		
		$tambah = $this->mJenis->addJenis($judul);
		if ($tambah == 1) {
			$_SESSION['report'] = '1';
			redirect('index.php/admin/pengaturan/jenis/jenis');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/pengaturan/jenis/jenis');
		}

		return true;
	}

	public function viewEditJenis() {
		$idJenis = $_GET['i'];
		$edit = $this->mJenis->viewEditJenis($idJenis);
		$_SESSION['editDataJenis'] = $edit;
		$_SESSION['viewEditDataJenis'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editJenis() {
		$id = $_GET['i'];
		$judul = $this->input->post('judul', TRUE);
		$edit = $this->mJenis->editDataJenis($id, $judul);
		if ($edit == 1) {
			$_SESSION['report'] = 1;
			redirect('index.php/admin/pengaturan/Jenis/Jenis');
		}else{
			$_SESSION['report'] = 0;
			redirect('index.php/admin/pengaturan/Jenis/Jenis');
		}
		
		return $report;
	}
}
