<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class testTimoni extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			redirect('./auth/session/outSession');
		} else {
			$_SESSION['page'] = "ATesti";
			redirect('./');
		}
	}

}
