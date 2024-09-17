<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class artikel extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('public/informasi/artikel/mArtikel');
	}
	
	public function index() {
		$data = $this->mArtikel->semuaDataArtikel($status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "PArtikel";
			$_SESSION['dataArtikel'] = $data;
			$_SESSION['preview'] = 0;
			redirect('./');
		}
	}

	public function preview() {
		$id = $_GET['i'];
		$_SESSION['preview'] = 1;
		$data = $this->mArtikel->dataArtikel($id);
		$_SESSION['dataArtikelV'] = $data;
		redirect('./');

	}

}
