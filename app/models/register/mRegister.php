<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mRegister extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function cekCode($notel, $codeNya) {
		$qAutoriz = $this->db->query("SELECT * FROM `tb_token` 
		WHERE vc_notel = '$notel' ORDER BY vc_notel DESC LIMIT 1");
		$row = $qAutoriz->num_rows();
		$r = $qAutoriz->result();
		$idToken = $r[0]->int_idToken;
		if ($row == 0){
			$qInToken = $this->db->query("INSERT INTO `tb_token` (`vc_notel`, `vc_token`) 
			VALUES ('$notel', '$codeNya')");
		} else {
			$qInToken = $this->db->query("UPDATE `tb_token` SET `vc_token` = '$codeNya' 
			WHERE `int_idToken` = '$idToken'");
		}
		return $response;
	}

	public function ferivikasiCode($notel, $code) {
		$cekToken = $this->db->query("SELECT * FROM `tb_token` 
		WHERE vc_notel = '$notel' AND vc_token = '$code' ORDER BY vc_notel DESC LIMIT 1");
		$row = $cekToken->num_rows();
		if ($row == 1) {
			return '1';
		} else {
			return '0';
		}
	}

	public function addPasien($data) {
		$pass = rand();	
		$nama = $data['data'][0]['nama'];
		$mail = $data['data'][0]['mail'];
		$nik = $data['data'][0]['nik'];
		$bpjs = $data['data'][0]['bpjs'];
		$alamat = $data['data'][0]['alamat'];
		$trl = $data['data'][0]['trl'];
		$_SESSION["noWA"] = $trl;
		$_SESSION["pass"] = $pass;
		$addPengguna = $this->db->query("INSERT INTO `user` 
			(`level_id`, `un_user`, `pass_user`, `nama_user`, `vc_nik`, 
			`vc_bpjs`, `tx_alamat`, `vc_notel`, `id_struktural`, `img_user`, `sts_user`) 
			VALUES ('3', '$mail', '$pass', '$nama', '$nik', 
			'$bpjs', '$alamat', '$trl', '0', './public/admin/dist/img/avatar5.png', '1')");
		if ($addPengguna) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function cekDataPasien($notel, $mail) {
		$cekData = $this->db->query("SELECT * FROM `user`
		WHERE un_user = '$mail' OR vc_notel = '$notel'");
		$row = $cekData->num_rows();
		return $row;
	}
}