<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class homeRoute extends CI_Controller {

	function __construct() {
        parent::__construct();
		session_start();
		$this->load->model('admin/informasi/artikel/mArtikel');
		$this->load->model('admin/informasi/pengumuman/mPengumuman');
	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			$_SESSION['page'] = "PHome";
			$_SESSION['report'] = '';
			// redirect('./');
		}
		$data = $this->mArtikel->limitEnam($status);
		$_SESSION['dataArtikel'] = $data;
		$data2 = $this->mPengumuman->semuaDataPengumuman($status);
		$_SESSION['dataPengumuman'] = $data2;
		$this->load->view('view');
	}

	public function home() {
		$data = $this->mArtikel->semuaDataArtikel($status);
		$_SESSION['dataArtikel'] = $data;
		if (empty($_SESSION['page'])) {
			$_SESSION['page'] = "PHome";
			$_SESSION['report'] = '';
			redirect('./');
		} else {
			$_SESSION['page'] = "PHome";
			$_SESSION['report'] = '';
			redirect('./');
		}
		// $this->load->view('view');
	}

}
