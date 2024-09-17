<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class login extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
	}
	
	public function index() {
		$_SESSION["page"] = "LoginPage";
        redirect('./');
	}

}
