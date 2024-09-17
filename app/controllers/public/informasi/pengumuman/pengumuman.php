<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class pengumuman extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('public/informasi/pengumuman/mPengumuman');
	}
	
	public function index() {
		$data = $this->mPengumuman->semuaDataPengumuman($status);
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "PPengumuman";
			$_SESSION['dataPengumuman'] = $data;
			$_SESSION['preview'] = 0;
			redirect('./');
		}
	}

	public function preview() {
		$id = $_GET['i'];
		$_SESSION['preview'] = 1;
		$data = $this->mPengumuman->dataPengumuman($id);
		$_SESSION['dataPengumumanV'] = $data;
		redirect('./');

	}

}
