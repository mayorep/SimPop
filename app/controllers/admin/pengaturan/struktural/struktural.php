<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class struktural extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pengaturan/struktural/mStruktural');

	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$data = $this->mStruktural->semuaDataStruktural();
			$_SESSION['page'] = "AStruktural";
			$_SESSION['dataStruktural'] = $data;
			$_SESSION['filterStruktural'] = "Semua";
			$_SESSION['editDataStruktural'] = "";
			$_SESSION['viewEditDataStruktural'] = 0;
			$_SESSION['report'] = '';
			// print_r($data);
			redirect('./');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mStruktural->filterStruktural($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "AStruktural";
			$_SESSION['dataStruktural'] = $data;
			$_SESSION['filterStruktural'] = $status;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}	

	public function updatePublis() {
		$idStruktural = $_GET['i'];
		$update = $this->mStruktural->publisStruktural($idStruktural);
		$data = $this->mStruktural->filterStruktural($_SESSION['filterStruktural']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AStruktural";
			$_SESSION['dataStruktural'] = $data;
			$_SESSION['filterStruktural'] = $_SESSION['filterStruktural'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idStruktural = $_GET['i'];
		$update = $this->mStruktural->privasiStruktural($idStruktural);
		$data = $this->mStruktural->filterStruktural($_SESSION['filterStruktural']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AStruktural";
			$_SESSION['dataStruktural'] = $data;
			$_SESSION['filterStruktural'] = $_SESSION['filterStruktural'];
			redirect('./');
		}
	}

	public function tambahStruktural() {
		$judul = $this->input->post('namaStruktural', TRUE);
		$isi = $this->input->post('isiStruktural', TRUE);
		$idUser = $_SESSION['idUser'];
		
		$tambah = $this->mStruktural->addStruktural($judul);
		if ($tambah == 1) {
			$_SESSION['report'] = '1';
			redirect('index.php/admin/pengaturan/Struktural/Struktural');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/pengaturan/Struktural/Struktural');
		}

		return true;
	}

	public function viewEditStruktural() {
		$idStruktural = $_GET['i'];
		$edit = $this->mStruktural->viewEditStruktural($idStruktural);
		$_SESSION['editDataStruktural'] = $edit;
		$_SESSION['viewEditDataStruktural'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editStruktural() {
		$id = $_GET['i'];
		$judul = $this->input->post('judul', TRUE);
		$edit = $this->mStruktural->editDataStruktural($id, $judul);
		if ($edit == 1) {
			$_SESSION['report'] = 1;
			redirect('index.php/admin/pengaturan/Struktural/Struktural');
		}else{
			$_SESSION['report'] = 0;
			redirect('index.php/admin/pengaturan/Struktural/Struktural');
		}
		
		return $report;
	}
}
