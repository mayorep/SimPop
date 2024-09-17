<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mDashboard extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function dataRingkasan() {
		$array = array();	
        $pasien = $this->db->query("SELECT id_user FROM `user` WHERE `level_id` = 3");
		$rpasien = $pasien->num_rows();

		$testi = $this->db->query("SELECT int_id_testTimoni FROM `tb_testtimoni`");
		$rtesti = $testi->num_rows();

		$pegawai = $this->db->query("SELECT id_user FROM `user` WHERE `level_id` = 1 AND `sts_user` = 1 OR `level_id` = 2 AND `sts_user` = 1");
		$rpegawai = $pegawai->num_rows();

		$pengguna = $this->db->query("SELECT id_user FROM `user` WHERE `sts_user` = 1");
		$rpengguna = $pengguna->num_rows();

		$res = [
			'pasien' => $rpasien,
			'testTimoni' => $rtesti,
			'pegawaiAktif' => $rpegawai,
			'penggunaAktif' => $rpengguna,
		];
		return $res;
	}
	
	public function dataStruktural() {
		$array = array();	
        $struktural = $this->db->query("SELECT * FROM struktural WHERE sts_struktural = '1' ORDER BY id_struktural ASC");
		$rstruktural = $struktural->result();

		foreach ($struktural->result() AS $r){
			$h['no'] = $no++;
			$h['id_struktural'] = $r->id_struktural ;
			$h['ket_struktural'] = $r->ket_struktural;
			$h['sts_struktural'] = $r->sts_struktural;
			
			array_push($array, $h);
		}
		
		$res = [
			'dataStruktural' => $array
		];
		return $res;
	}

}