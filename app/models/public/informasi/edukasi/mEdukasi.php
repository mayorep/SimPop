<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mEdukasi extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataEdukasi() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idEdukasi,
		a.vc_judul,
		a.lt_link,
		a.int_idJenisEdukasi,
		a.dt_tanggal,
		a.int_status,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user
		WHERE a.int_status = 1
		ORDER BY a.int_status DESC, a.dt_tanggal DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idEdukasi'] = $r->int_idEdukasi;
			$h['vc_judul'] = $r->vc_judul;
			$h['lt_link'] = $r->lt_link;
			$h['int_idJenisEdukasi'] = $r->int_idJenisEdukasi;
			$h['dt_tanggal'] = $r->dt_tanggal;
			$h['int_status'] = $r->int_status;
			$h['id_user'] = $r->idUser;
			$h['nama_user'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function dataEdukasi($id) {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idEdukasi,
		a.vc_judul,
		a.lt_link,
		a.int_idJenisEdukasi,
		a.dt_tanggal,
		a.int_status,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM tb_edukasi a JOIN user b ON a.id_user = b.id_user
		WHERE a.int_idEdukasi = '$id'
		ORDER BY a.int_status DESC, a.dt_tanggal DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idEdukasi'] = $r->int_idEdukasi;
			$h['vc_judul'] = $r->vc_judul;
			$h['lt_link'] = $r->lt_link;
			$h['int_idJenisEdukasi'] = $r->int_idJenisEdukasi;
			$h['dt_tanggal'] = $r->dt_tanggal;
			$h['int_status'] = $r->int_status;
			$h['id_user'] = $r->idUser;
			$h['nama_user'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}
}