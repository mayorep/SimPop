<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class edukasi extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('public/informasi/edukasi/mEdukasi');
	}
	
	public function index() {
		$data = $this->mEdukasi->semuaDataEdukasi($status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "PEdukasi";
			$_SESSION['dataEdukasi2'] = $data;
			$_SESSION['preview'] = 0;
			redirect('./');
		}
	}

	public function preview() {
		$id = $_GET['i'];
		$_SESSION['preview'] = 1;
		$data = $this->mEdukasi->dataEdukasi($id);
		$_SESSION['dataEdukasiV'] = $data;
		redirect('./');

	}

}
