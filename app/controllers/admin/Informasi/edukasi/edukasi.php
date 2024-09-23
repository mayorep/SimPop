<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class edukasi extends CI_Controller {

	function __construct() {
 
        parent::__construct();
		session_start();
		$this->load->model('admin/informasi/edukasi/mEdukasi');
	}
	
	public function index() {
		$data = $this->mEdukasi->semuadataEdukasi($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AEdukasi";
			$_SESSION['dataEdukasi2'] = $data;
			$_SESSION['filterEdukasi'] = "Semua";
			$_SESSION['editdataEdukasi2'] = "";
			$_SESSION['viewEditdataEdukasi2'] = 0;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function filterData() {
		$_SESSION['dataEdukasi2'] = "";
		$status = $this->input->post('status', TRUE);
		$data = $this->mEdukasi->filterEdukasi($status);
		// print_r($data);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			// $_SESSION['page'] = "AEdukasi";
			$_SESSION['dataEdukasi2'] = $data;
			$_SESSION['filterEdukasi'] = $status;
			$_SESSION['report'] = '';
			// echo $status;
			redirect('./');
		}
	}

	public function updatePublis() {
		$idEdukasi = $_GET['i'];
		$update = $this->mEdukasi->publisEdukasi($idEdukasi);
		$data = $this->mEdukasi->filterEdukasi($_SESSION['filterEdukasi']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AEdukasi";
			$_SESSION['dataEdukasi2'] = $data;
			$_SESSION['filterEdukasi'] = $_SESSION['filterEdukasi'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idEdukasi = $_GET['i'];
		$update = $this->mEdukasi->privasiEdukasi($idEdukasi);
		$data = $this->mEdukasi->filterEdukasi($_SESSION['filterEdukasi']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AEdukasi";
			$_SESSION['dataEdukasi2'] = $data;
			$_SESSION['filterEdukasi'] = $_SESSION['filterEdukasi'];
			redirect('./');
		}
	}

	public function tambahEdukasi() {
		$judul = $this->input->post('judul', TRUE);
		$jenis = $this->input->post('jenis', TRUE);
		// if ($jenis == 2) {
			$step1 = str_replace("&lt;","<",$this->input->post('linkData', TRUE));
			$step2 = str_replace("&gt;",">",$step1);
			$linkData = $step2;
		// } else {
		// 	$linkData = $this->input->post('linkData', TRUE);
		// }
		$idUser = $_SESSION['idUser'];
		
		$tambah = $this->mEdukasi->addEdukasi($idUser, $judul, $jenis, $linkData);
        if ($tambah == 1) {
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/Informasi/Edukasi/Edukasi');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/Informasi/Edukasi/Edukasi');
		}

		return $report;
	}

	public function viewEditEdukasi() {
		$idEdukasi = $_GET['i'];
		$edit = $this->mEdukasi->viewEditEdukasi($idEdukasi);
		$_SESSION['editdataEdukasi2'] = $edit;
		$_SESSION['viewEditdataEdukasi2'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editEdukasi() {
		$id = $_GET['i'];
		$judul = $this->input->post('judul', TRUE);
		$jenis = $this->input->post('jenis', TRUE);
		$step1 = str_replace("&lt;","<",$this->input->post('link', TRUE));
		$step2 = str_replace("&gt;",">",$step1);
		$link = $step2;
		// $link = $this->input->post('link', TRUE);
		$idUser = $_SESSION['idUser'];
		$edit = $this->mEdukasi->editdataEdukasi($id, $judul, $jenis, $link);
		if ($edit == 1) {
			$_SESSION['report'] = 1;
			redirect('index.php/admin/Informasi/Edukasi/Edukasi');
		}else{
			$_SESSION['report'] = 0;
			redirect('index.php/admin/Informasi/Edukasi/Edukasi');
		}
		return $report;
	}
}
