<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class artikel extends CI_Controller {

	function __construct() {
 
        parent::__construct();
		session_start();
		$this->load->model('admin/informasi/artikel/mArtikel');
	}
	
	public function index() {
		$data = $this->mArtikel->semuadataArtikel($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AArtikel";
			$_SESSION['dataArtikel2'] = $data;
			$_SESSION['filterArtikel'] = "Semua";
			$_SESSION['editdataArtikel2'] = "";
			$_SESSION['viewEditdataArtikel2'] = 0;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function filterData() {
		$_SESSION['dataArtikel2'] = "";
		$status = $this->input->post('status', TRUE);
		$data = $this->mArtikel->filterArtikel($status);
		// print_r($data);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			// $_SESSION['page'] = "AArtikel";
			$_SESSION['dataArtikel2'] = $data;
			$_SESSION['filterArtikel'] = $status;
			$_SESSION['report'] = '';
			// echo $status;
			redirect('./');
		}
	}

	public function updatePublis() {
		$idArtikel = $_GET['i'];
		$update = $this->mArtikel->publisArtikel($idArtikel);
		$data = $this->mArtikel->filterArtikel($_SESSION['filterArtikel']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AArtikel";
			$_SESSION['dataArtikel2'] = $data;
			$_SESSION['filterArtikel'] = $_SESSION['filterArtikel'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idArtikel = $_GET['i'];
		$update = $this->mArtikel->privasiArtikel($idArtikel);
		$data = $this->mArtikel->filterArtikel($_SESSION['filterArtikel']);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AArtikel";
			$_SESSION['dataArtikel2'] = $data;
			$_SESSION['filterArtikel'] = $_SESSION['filterArtikel'];
			redirect('./');
		}
	}

	public function tambahArtikel() {
		$judul = $this->input->post('judul', TRUE);
		$isi = $this->input->post('isiArtikel', TRUE);
		$idUser = $_SESSION['idUser'];
		$target_dir = "./public/admin/dist/img/foto/artikel/";
		$namaBaru = $target_dir.$idUser.rand()."_".$judul.".jpg";
		$tambah = $this->mArtikel->addArtikel($idUser, $judul, $isi, $namaBaru);
        if ($tambah == 1) {
			$tambah = $this->mArtikel->uploadFoto($target_dir, $namaBaru);
			if ($tambah == 1) {
				$report = 1;	
				$_SESSION['report'] = '1';
				redirect('./admin/Informasi/artikel/artikel');
			}else{
				$id = $_SESSION['ambilIdArtikel'];
				$tambah = $this->mArtikel->dellArtikel($id);
				$report = 0;
				$_SESSION['report'] = '0';
				redirect('./admin/Informasi/artikel/artikel');
			}
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('./admin/Informasi/artikel/artikel');
		}

		return $report;
	}

	public function viewEditArtikel() {
		$idArtikel = $_GET['i'];
		$edit = $this->mArtikel->viewEditArtikel($idArtikel);
		$_SESSION['editdataArtikel2'] = $edit;
		$_SESSION['viewEditdataArtikel2'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editArtikel() {
		$id = $_GET['i'];
		$judul = $this->input->post('judul', TRUE);
		$isi = $this->input->post('isiArtikel', TRUE);
		$idUser = $_SESSION['idUser'];
		if ($_FILES["fileToUpload"]["tmp_name"] == "") {
			$edit = $this->mArtikel->editdataArtikel($id, $judul, $isi);
			if ($edit == 1) {
				$_SESSION['report'] = 1;
				redirect('./admin/Informasi/artikel/artikel');
			}else{
				$_SESSION['report'] = 0;
				redirect('./admin/Informasi/artikel/artikel');
			}
		} else {
			$edit = $this->mArtikel->editdataArtikel($id, $judul, $isi);
			if ($edit == 1) {
				$posisiGambar = substr($_SESSION['editdataArtikel2']['data']['0']['gambarArtikel'],2);
				unlink($posisiGambar);
				$target_dir = "./public/admin/dist/img/foto/artikel/";
				$namaBaru = $target_dir.$idUser.rand()."_".$judul.".jpg";
				$reupload = $this->mArtikel->editFotoArtikel($id, $target_dir, $namaBaru);
				if ($reupload == 1) {
					$report = 1;
					$_SESSION['report'] = 1;	
					redirect('./admin/Informasi/artikel/artikel');
				}else{
					$report = 0;
					$_SESSION['report'] = 0;
					redirect('./admin/Informasi/artikel/artikel');
				}
			}else{
				$_SESSION['report'] = 0;
				redirect('./admin/Informasi/artikel/artikel');
			}
	
		}
		return $report;
	}
}
