<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class pendaftaran extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pendaftaran/list/mList');
		$this->load->model('wa/mWA');
	}
	
	public function index() {
		$id = $_SESSION['idUser'];
		$jenisOperasi = $this->mList->jenisOperasi();
		$data=$this->mList->semuaDaataPendaftaranPerAkun($id);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "ADaftarOperasi"; 
			$_SESSION['dataList'] = $data;
			$_SESSION['filterList'] = "Semua";
			$_SESSION['editDataList'] = "";
			$_SESSION['viewEditDataList'] = 0;
			$_SESSION['viewAdd'] = "";
			$_SESSION['dataAdd'] = "";
			$_SESSION['jenisOperasi'] = $jenisOperasi;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function filterDataAkun() {
		$id = $_SESSION['idUser'];
		$status = $this->input->post('status', TRUE);
		$jenisOperasi = $this->mList->jenisOperasi();
		$data=$this->mList->filterDataPendaftaranPerAkun($id, $status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "ADaftarOperasi"; 
			$_SESSION['dataList'] = $data;
			$_SESSION['filterList'] = "Semua";
			$_SESSION['editDataList'] = "";
			$_SESSION['viewEditDataList'] = 0;
			$_SESSION['viewAdd'] = "";
			$_SESSION['dataAdd'] = "";
			$_SESSION['jenisOperasi'] = $jenisOperasi;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function viewEditList() {
		$id = $_GET['i'];
		$data = $this->mList->viewEdit($id);
		if ($data) {
			$report = 1;
			$_SESSION['editDataList'] = $data;
			$_SESSION['viewEditDataList'] = 1;
			$_SESSION['report'] = '1';
			print_r($_SESSION['editDataList']);
			redirect('./');
		} else {
			$report = 0;
			$_SESSION['editDataList'] = "";
			$_SESSION['viewEditDataList'] = 0;
			$_SESSION['report'] = '0';
			redirect('admin/pendaftaran/pendaftaran/pendaftaran');
		}
		return $report;
	}

	public function editList() {
		$id = $_GET['i'];
		$jenis = $this->input->post('jenis', TRUE);
		$data = $this->mList->editListPendaftaran($id, $jenis);
		if ($data) {
			$report = 1;
			$_SESSION['editDataList'] = "";
			$_SESSION['viewEditDataList'] = 0;
			redirect('admin/pendaftaran/pendaftaran/pendaftaran');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('./');
		}
		return $report;
	}

	public function dell() {
		$id = $_GET['i'];
		$jenis = $this->input->post('jenis', TRUE);
		$data = $this->mList->dellPendaftaran($id);
		if ($data) {
			$report = 1;
			$_SESSION['editDataList'] = "";
			$_SESSION['viewEditDataList'] = 0;
			redirect('admin/pendaftaran/pendaftaran/pendaftaran');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('./');
		}
		return $report;
	}

}
