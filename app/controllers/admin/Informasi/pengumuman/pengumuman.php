<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class pengumuman extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/informasi/pengumuman/mPengumuman');
	}
	
	public function index() {
		$data = $this->mPengumuman->semuaDataPengumuman($status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "APengumuman";
			$_SESSION['dataPengumuman2'] = $data;
			$_SESSION['filterPengumuman'] = "Semua";
			$_SESSION['editDataPengumuman2'] = "";
			$_SESSION['viewEditDataPengumuman2'] = 0;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mPengumuman->filterPengumuman($status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "APengumuman";
			$_SESSION['dataPengumuman2'] = $data;
			$_SESSION['filterPengumuman'] = $status;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function updatePublis() {
		$idPengumuman = $_GET['i'];
		$update = $this->mPengumuman->publisPengumuman($idPengumuman);
		$data = $this->mPengumuman->filterPengumuman($_SESSION['filterPengumuman']);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "APengumuman";
			$_SESSION['dataPengumuman2'] = $data;
			$_SESSION['filterPengumuman'] = $_SESSION['filterPengumuman'];
			redirect('./');
		}
	}

	public function updatePrivasi() {
		$idPengumuman = $_GET['i'];
		$update = $this->mPengumuman->privasiPengumuman($idPengumuman);
		$data = $this->mPengumuman->filterPengumuman($_SESSION['filterPengumuman']);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "APengumuman";
			$_SESSION['dataPengumuman2'] = $data;
			$_SESSION['filterPengumuman'] = $_SESSION['filterPengumuman'];
			redirect('./');
		}
	}

	public function tambahPengumuman() {
		$judul = $this->input->post('judul', TRUE);
		$isi = $this->input->post('isiPengumuman', TRUE);
		$idUser = $_SESSION['idUser'];
		$target_dir = "./public/admin/dist/img/foto/pengumuman/";
		$namaBaru = $target_dir.$idUser.rand()."_".$judul.".jpg";
		$tambah = $this->mPengumuman->addPengumuman($idUser, $judul, $isi, $namaBaru);
        if ($tambah == 1) {
			$tambah = $this->mPengumuman->uploadFoto($target_dir, $namaBaru);
			if ($tambah == 1) {
				$report = 1;	
				$_SESSION['report'] = '1';
				redirect('index.php/admin/Informasi/Pengumuman/Pengumuman');
			}else{
				$id = $_SESSION['ambilIdPengumuman'];
				echo $id;
				$tambah = $this->mPengumuman->dellPengumuman($id);
				$report = 0;
				$_SESSION['report'] = '0';
				// redirect('index.php/admin/Informasi/pengumuman/pengumuman');
			}
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('index.php/admin/Informasi/pengumuman/pengumuman');
		}

		return $report;
	}

	public function viewEditPengumuman() {
		$idPengumuman = $_GET['i'];
		$edit = $this->mPengumuman->viewEditPengumuman($idPengumuman);
		$_SESSION['editDataPengumuman2'] = $edit;
		$_SESSION['viewEditDataPengumuman2'] = 1;
		$_SESSION['report'] = '';
		redirect('./');
	}

	public function editPengumuman() {
		$id = $_GET['i'];
		$judul = $this->input->post('judul', TRUE);
		$isi = $this->input->post('isiPengumuman', TRUE);
		$idUser = $_SESSION['idUser'];
		if ($_FILES["fileToUpload"]["tmp_name"] == "") {
			$edit = $this->mPengumuman->editDataPengumuman($id, $judul, $isi);
			if ($edit == 1) {
				$_SESSION['report'] = 1;
				redirect('index.php/admin/Informasi/pengumuman/pengumuman');
			}else{
				$_SESSION['report'] = 0;
				redirect('index.php/admin/Informasi/pengumuman/pengumuman');
			}
		} else {
			$edit = $this->mPengumuman->editDataPengumuman($id, $judul, $isi);
			if ($edit == 1) {
				$posisiGambar = substr($_SESSION['editDataPengumuman2']['data']['0']['gambarPengumuman'],2);
				unlink($posisiGambar);
				$target_dir = "./public/admin/dist/img/foto/pengumuman/";
				$namaBaru = $target_dir.$idUser.rand()."_".$judul.".jpg";
				$reupload = $this->mPengumuman->editFotoPengumuman($id, $target_dir, $namaBaru);
				if ($reupload == 1) {
					$report = 1;
					$_SESSION['report'] = 1;	
					redirect('index.php/admin/Informasi/pengumuman/pengumuman');
				}else{
					$report = 0;
					$_SESSION['report'] = 0;
					redirect('index.php/admin/Informasi/pengumuman/pengumuman');
				}
			}else{
				$_SESSION['report'] = 0;
				redirect('index.php/admin/Informasi/pengumuman/pengumuman');
			}
	
		}
		return $report;
	}
}
