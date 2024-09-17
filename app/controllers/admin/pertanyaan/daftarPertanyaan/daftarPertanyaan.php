<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class daftarPertanyaan extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pertanyaan/daftarPertanyaan/mDaftarPertanyaan');
	}
	
	public function index() {
		$data = $this->mDaftarPertanyaan->semuaDataDaftarPertanyaan($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "ADaftarPertanyaan";
			$_SESSION['dataPertanyaan2'] = $data;
			$_SESSION['filterPertanyaan'] = "Semua";
			$_SESSION['editDataPertaanyaan'] = "";
			$_SESSION['viewEditDataPertanyaan2'] = 0;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mDaftarPertanyaan->filterPertanyaan($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "ADaftarPertanyaan";
			$_SESSION['dataPertanyaan2'] = $data;
			$_SESSION['filterPertanyaan'] = $status;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function updatePublis() {
		$idPertanyaan = $_GET['i'];
		$update = $this->mDaftarPertanyaan->publisPertanyaan($idPertanyaan);
		// $data = $this->mDaftarPertanyaan->filterPertanyaan($_SESSION['filterPertaanyaan']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "ADaftarPertanyaan";
			// $_SESSION['dataPertanyaan2'] = $data;
			// $_SESSION['filterPertaanyaan'] = $_SESSION['filterPertaanyaan'];
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}
	}

	public function updatePrivasi() {
		$idPertanyaan = $_GET['i'];
		$update = $this->mDaftarPertanyaan->privasiPertanyaan($idPertanyaan);
		// $data = $this->mDaftarPertanyaan->filterPertanyaan($_SESSION['filterPertaanyaan']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "ADaftarPertanyaan";
			// $_SESSION['dataPertanyaan2'] = $data;
			// $_SESSION['filterPertaanyaan'] = $_SESSION['filterPertaanyaan'];
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}
	}

	public function tambahPertanyaan() {
		$pertanyaan = $this->input->post('pertanyaan', TRUE);
		$jawaban = $this->input->post('jawaban', TRUE);
		$idUser = $_SESSION['idUser'];
		$tambah = $this->mDaftarPertanyaan->addPertanyaan($idUser, $pertanyaan, $jawaban);
        if ($tambah == 1) {
			$report = 1;	
			$_SESSION['report'] = '1';
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}

		return $report;
	}

	public function viewEditPertanyaan() {
		$idPertanyaan = $_GET['i'];
		$edit = $this->mDaftarPertanyaan->viewEditPertanyaan($idPertanyaan);
		$_SESSION['editDataPertanyaan2'] = $edit;
		$_SESSION['viewEditDataPertanyaan2'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editPertanyaan() {
		$id = $_GET['i'];
		$pertanyaan = $this->input->post('pertanyaan', TRUE);
		$jawaban = $this->input->post('jawaban', TRUE);
		$idUser = $_SESSION['idUser'];
		$tambah = $this->mDaftarPertanyaan->editDataPertanyaan($idUser, $id, $pertanyaan, $jawaban);
        if ($tambah == 1) {
			$report = 1;	
			$_SESSION['report'] = '1';
			echo $id;
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}

		return $report;
	}

	public function dellPertanyaan() {
		$id = $_GET['i'];
		$dell = $this->mDaftarPertanyaan->dellPertanyaan($id);
		if ($dell == 1) {
			$report = 1;	
			$_SESSION['report'] = '1';
			echo $id;
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan');
		}

		return $report;
	}
}
