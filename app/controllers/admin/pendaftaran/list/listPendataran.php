<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class listPendataran extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pendaftaran/list/mList');
		$this->load->model('wa/mWA');
	}
	
	public function index() {
		$data = $this->mList->semuaDataPendaftaran($status);
		$jenisOperasi = $this->mList->jenisOperasi();
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AListPendaftar";
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

	public function viewAdd() {
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['viewAdd'] = 1;
			$_SESSION['dataAdd'] = "";
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function cariNik() {
		$nik = $this->input->post('nik', TRUE);
		$data = $this->mList->cariNik($nik);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			echo count($data['data']);
			if (count($data['data']) == 0) {
				$_SESSION['viewAdd'] = 1;
				$_SESSION['cekData'] = 0;
			}else{
				$_SESSION['cekData'] = 1;
				$_SESSION['viewAdd'] = 1;
			}
			$_SESSION['dataAdd'] = $data;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function updateStatusPermohonan() {
		$id = $_GET['i'];
		$kode = $this->input->post('kode', TRUE);
		if ($kode == 1) {
			$stsOP = "Pengajuan";
		} elseif ($kode == 2) {
			$stsOP = "Dijadwalkan";
		} elseif ($kode == 3) {
			$stsOP = "Proses Operasi";
		} elseif ($kode == 4) {
			$stsOP = "Selesai";
		} else {
			$stsOP = "Ditolak";
		}
		$nama = $_GET['n'];
		$notel = $_GET['no'];
		$update = $this->mList->statusPermohonan($id, $kode);
		$data = $this->mList->filterData($status);
		$data = $_SESSION['dataList']; 
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$pesan = "Halo $nama. Status pengajuan operasi anda adalah *$stsOP*. Info lebih lanjut cek app atau hubungi call center.";
			$this->mWA->kirimWA($notel, $pesan);
			$_SESSION['page'] = "AListPendaftar";
			$_SESSION['dataList'] = $data;
			$_SESSION['filterList'] = $_SESSION['filterList'];
			$_SESSION['viewAdd'] = "";
			redirect('admin/pendaftaran/list/listPendataran');
		}
	}

	public function filterData() {
		$status = $this->input->post('status', TRUE);
		$data = $this->mList->filterData($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
			$_SESSION['report'] = '';
		} else {
			$_SESSION['page'] = "AListPendaftar";
			$_SESSION['dataList'] = $data;
			$_SESSION['filterList'] = $_SESSION['filterList'];
			$_SESSION['viewAdd'] = "";
			redirect('./');
		}
	}

	public function tambahList() {
		$jenis = $this->input->post('jenis', TRUE);
		$tgl = $this->input->post('tgl', TRUE);
		$catatan = $this->input->post('catatan', TRUE);
		$dtOperasi = str_replace("T"," ",$tgl);
		$puasaMakan = date_create($tgl);
		date_add($puasaMakan, date_interval_create_from_date_string('-8 hours'));
		$fikPMakan = date_format($puasaMakan, 'Y-m-d H:i:s');

		$puasaMinum = date_create($tgl);
		date_add($puasaMinum, date_interval_create_from_date_string('-8 hours'));
		$fikPMinum = date_format($puasaMinum, 'Y-m-d H:i:s');

		$data = $this->mList->addList($jenis, $tgl, $catatan);
		if ($data) {
			$report = 1;
			$nama = $_SESSION['dataAdd']['data'][0]['nama_user'];
			$notel = $_SESSION['dataAdd']['data'][0]['vc_notel'];
			$pesan = "Halo $nama. Pengajuan Operasi anda sudah di jadwalkan pada $dtOperasi. Anda diwajibkan berpuasa mulai pukul $fikPMakan dan puasa minum $fikPMinum. Semoga diberi kelancaran dalam menjalani operasi anda";
			echo $pesan;
			$this->mWA->kirimWA($notel, $pesan);
			redirect('admin/pendaftaran/list/listPendataran');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('admin/pendaftaran/list/listPendataran');
		}
		return $report;
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
			redirect('admin/pendaftaran/list/listPendataran');
		}
		return $report;
	}

	public function editList() {
		$id = $_GET['i'];
		$jenis = $this->input->post('jenis', TRUE);
		$tgl = $this->input->post('tgl', TRUE);
		$catatan = $this->input->post('catatan', TRUE);
		$data = $this->mList->editList($id, $jenis, $tgl, $catatan);
		if ($data) {
			$report = 1;
			$_SESSION['editDataList'] = "";
			$_SESSION['viewEditDataList'] = 0;
			redirect('admin/pendaftaran/list/listPendataran');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('./');
		}
		return $report;
	}

	// ======================================================
	public function tambahPengajuan() {
		$jenis = $this->input->post('jenis', TRUE);
		$tgl = null;
		$catatan = null;
		$dtOperasi = str_replace("T"," ",$tgl);
		// $puasaMakan = date_create($tgl);
		// date_add($puasaMakan, date_interval_create_from_date_string('-8 hours'));
		// $fikPMakan = date_format($puasaMakan, 'Y-m-d H:i:s');

		// $puasaMinum = date_create($tgl);
		// date_add($puasaMinum, date_interval_create_from_date_string('-8 hours'));
		// $fikPMinum = date_format($puasaMinum, 'Y-m-d H:i:s');

		$data = $this->mList->addPengajuan($jenis, $tgl, $catatan);
		if ($data) {
			$report = 1;
			redirect('admin/pendaftaran/pendaftaran/pendaftaran');
		}else{
			$report = 0;
			$_SESSION['report'] = '0';
			redirect('admin/pendaftaran/pendaftaran/pendaftaran');
		}
		return $report;
	}
}
