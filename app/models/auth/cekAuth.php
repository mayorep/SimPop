<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cekAuth extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

    public function inSession($email, $pass) {	
		$data = array();
		$query = $this->db->query("SELECT 
		a.id_user as idUser,  
		a.un_user as unUser, 
		a.nama_user as namaUser,
		a.img_user as imgUser,
		a.vc_nik as vc_nik,
		a.vc_bpjs as vc_bpjs,
		a.tx_alamat as tx_alamat,
		a.vc_notel as vc_notel,
        b.level_id as idlevel,
        b.level_ket AS ketLevel,
        c.id_struktural as idStruktural,
        c.ket_struktural as ketStruktural,
        a.sts_user as statusUser
		 FROM user a JOIN level b ON a.level_id = b.level_id JOIN struktural c ON a.id_struktural = c.id_struktural 
		WHERE a.un_user = '$email' AND a.pass_user = '$pass' AND a.sts_user = 1;");
        $row = $query->num_rows();
		
		foreach ($query->result() AS $r){ 
			$h['idUser'] = $r->idUser;
			$h['unUser'] = $r->unUser;
			$h['vc_nik'] = $r->vc_nik;
			$h['vc_bpjs'] = $r->vc_bpjs;
			$h['tx_alamat'] = $r->tx_alamat;
			$h['vc_notel'] = $r->vc_notel;
			$h['namaUser'] = $r->namaUser;
			$h['idStruktural'] = $r->idStruktural;
			$h['imgUser'] = $r->imgUser;
			$h['idlevel'] = $r->idlevel;
			$h['ketLevel'] = $r->ketLevel;
			$h['idStruktural'] = $r->idStruktural;
			$h['ketStruktural'] = $r->ketStruktural;
			$h['statusUser'] = $r->statusUser;
			array_push($data, $h);
		}

		$res = [
			'alertLogin' => $row,
			'data' => $data
		];
		return $res;
	}

	public function outSession() {	
        session_destroy();
	}

}