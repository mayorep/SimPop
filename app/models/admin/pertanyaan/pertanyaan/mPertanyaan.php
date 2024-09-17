<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mPertanyaan extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataDaftarPertanyaan() {
		$data = array();
		$no = 1;	
        $pengumuman = $this->db->query("SELECT 
		a.int_idPertanyaan, a.tx_pertanyaan, a.tx_jawaban, a.id_user, b.nama_user,
		a.dt_tglPertanyaan, a.int_statusPertanyaan
		FROM pertanyaan a 
		JOIN user b ON a.id_user = b.id_user 
		WHERE a.int_statusPertanyaan = 1
		ORDER BY int_idPertanyaan DESC");

		foreach ($pengumuman->result() AS $r){
			$h['no'] = $no++;
			$h['int_idPertanyaan'] = $r->int_idPertanyaan;
			$h['tx_pertanyaan'] = $r->tx_pertanyaan;
			$h['tx_jawaban'] = $r->tx_jawaban;
			$h['dt_tglPertanyaan'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['int_statusPertanyaan'] = $r->int_statusPertanyaan;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}
}