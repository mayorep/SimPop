<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class pertanyaan extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/pertanyaan/pertanyaan/mPertanyaan');
	}
	
	public function index() {
		$data = $this->mPertanyaan->semuaDataDaftarPertanyaan($status);
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "APertanyaan";
			$_SESSION['datavPertanyaan'] = $data;
			$_SESSION['report'] = '';
			redirect('./');
		}
	}

	public function publicView() {
		$data = $this->mPertanyaan->semuaDataDaftarPertanyaan($status);
		$_SESSION['datavPertanyaan2'] = $data;
		$_SESSION['report'] = '';
		// print_r($data);
		$this->load->view('admin/pages/pertanyaan/pertanyaan/publicView');
	}

}
