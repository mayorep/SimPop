<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class homeAdmin extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/dashboard/mDashboard');
	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$data = $this->mDashboard->dataRingkasan();
			$struktural = $this->mDashboard->dataStruktural();
			$_SESSION['page'] = "ADashboard";
			$_SESSION['dataDashboard'] = $data;
			$_SESSION['dataStruktural'] = $struktural;
			redirect('./');
		}
	}

}
