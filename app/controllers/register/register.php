<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class register extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('register/mRegister');
		$this->load->model('wa/mWA');
	}
	
	public function index() {
		$_SESSION["page"] = "Register";
		$_SESSION["CodeRegister"] = "";
		$_SESSION['PesanCode'] = "";	
		$_SESSION['notel'] = "";	
        redirect('./');
	}

	public function signUp() {
		$notel = $this->input->post('tel', TRUE);
		$_SESSION["notel"] = $notel;
		$mail = $this->input->post('mail', TRUE);
		$codeNya = rand();
		$code = $this->mRegister->cekCode($notel, $codeNya);
		$cekDataPasien = $this->mRegister->cekDataPasien($notel, $mail);
		if ($cekDataPasien == 0) {
			$_SESSION["CodeRegister"] = "CodeRegister";
			$array = array();
			$h['nik'] = $this->input->post('nik', TRUE);
			$h['nama'] = $this->input->post('nama', TRUE);
			$h['bpjs'] = $this->input->post('bpjs', TRUE);
			$h['mail'] = $this->input->post('mail', TRUE);
			$h['trl'] = $this->input->post('tel', TRUE);
			$h['alamat'] = $this->input->post('alamat', TRUE);
			$h['level'] = 3;
			$h['struktural'] = 0;
			array_push($array, $h);
			$res = [
				'data' => $array
			];
			$_SESSION["dataRegister"] = $res;
			$_SESSION['PesanCode'] = "";
			$pesan = "Selamat Datang di SimPop. Ini code Register kamu *$codeNya*";
			$code = $this->mWA->kirimWA($notel, $pesan);
		} else {
			$_SESSION['PesanCode'] = 0;
		}	
		
        redirect('./');
	}

	public function resendCode() {
		$notel = $_SESSION["notel"];
		$codeNya = rand();
		$code = $this->mRegister->cekCode($notel, $codeNya);
		
		$pesan = "Selamat Datang di SimPop. Ini code Register kamu *$codeNya*";
		$code = $this->mWA->kirimWA($notel, $pesan);
        redirect('./');

	}

	public function codeIn() {
		$code = $this->input->post('code', TRUE);
		$data = $_SESSION["dataRegister"];
		$notel = $_SESSION["notel"];
		$ferivikasiCode = $this->mRegister->ferivikasiCode($notel, $code);
		if ($ferivikasiCode == 1){
			$_SESSION['PesanCode'] = "";
			$_SESSION["CodeRegister"] = "";	
			$addPasien = $this->mRegister->addPasien($data);
			$email = $data['data'][0]['mail'];
			$pass = $_SESSION['pass'];
			$pesan = "Selamat Datang di SimPop. Gunakan email = $email dan password = $pass untuk login";
			$this->mWA->kirimWA($notel, $pesan);
			$_SESSION["page"] = "LoginPage";
			redirect('./');
		} else {
			$_SESSION['PesanCode'] = "0";
			redirect('./');
		}
		// print_r($data['data'][0]);
	}

}
