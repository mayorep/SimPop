<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class wa extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('wa/mWA');
	}
	
	public function index() {
		$data = $this->mWA->kirimWA($status);
		
	}

}
