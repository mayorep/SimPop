<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class session extends CI_Controller {

	function __construct() {

        parent::__construct();
		$this->load->model('auth/cekAuth');
		session_start();
	}
	
	public function inSession() {  
		$email = $this->input->post('email', TRUE);
        $pass = $this->input->post('pass', TRUE);
		$data = $this->cekAuth->inSession($email, $pass);
		if ($data['alertLogin'] == 1) {
			$_SESSION["login"] = "true";
			$_SESSION["page"] = "ADashboard";
			$_SESSION['alertLogin'] = 1;

			$_SESSION['idUser'] = $data['data']['0']['idUser'];
			$_SESSION['unUser'] = $data['data']['0']['unUser'];
			$_SESSION['vc_nik'] = $data['data']['0']['vc_nik'];
			$_SESSION['vc_bpjs'] = $data['data']['0']['vc_bpjs'];
			$_SESSION['tx_alamat'] = $data['data']['0']['tx_alamat'];
			$_SESSION['vc_notel'] = $data['data']['0']['vc_notel'];
			$_SESSION['namaUser'] = $data['data']['0']['namaUser'];
			$_SESSION['idStruktural'] = $data['data']['0']['idStruktural'];
			$_SESSION['imgUser'] = $data['data']['0']['imgUser'];
			$_SESSION['idlevel'] = $data['data']['0']['idlevel'];
			$_SESSION['ketLevel'] = $data['data']['0']['ketLevel'];
			$_SESSION['ketStruktural'] = $data['data']['0']['ketStruktural'];
			$_SESSION['statusUser'] = $data['data']['0']['statusUser'];
			
			redirect('./admin/dashboard/homeAdmin');
		} else {
			$_SESSION['alertLogin'] = 0;
			redirect('auth/login');
		}
		// print_r($data['data']);
	}

	public function outSession() {
		$this->cekAuth->outSession();
		redirect('./');
	}

}
