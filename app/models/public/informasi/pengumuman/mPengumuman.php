<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mPengumuman extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataPengumuman() {
		$data = array();
		$no = 1;	
        $pengumuman = $this->db->query("SELECT 
		a.id_pengumuman as id_pengumuman,
		a.judul_pengumuman as judul_pengumuman,
		a.gbr_pengumuman as gbr_pengumuman,
		a.tgl_pengumuman as tgl_pengumuman,
		a.isi_pengumuman as isi_pengumuman,
		a.status_pengumuman AS status_pengumuman,
		b.id_user  AS idUser,
		b.nama_user AS namaUser
		FROM pengumuman a JOIN user b ON a.user_id = b.id_user
		WHERE  a.status_pengumuman = 1
		ORDER BY a.status_pengumuman DESC, a.tgl_pengumuman DESC");

		foreach ($pengumuman->result() AS $r){
			$h['no'] = $no++;
			$h['id_pengumuman'] = $r->id_pengumuman;
			$h['judul_pengumuman'] = $r->judul_pengumuman;
			$h['gbr_pengumuman'] = $r->gbr_pengumuman;
			$h['tgl_pengumuman'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['isi_pengumuman'] = $r->isi_pengumuman;
			$h['status_pengumuman'] = $r->status_pengumuman;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function dataPengumuman($id) {
		$data = array();
		$no = 1;	
        $pengumuman = $this->db->query("SELECT 
		a.id_pengumuman as id_pengumuman,
		a.judul_pengumuman as judul_pengumuman,
		a.gbr_pengumuman as gbr_pengumuman,
		a.tgl_pengumuman as tgl_pengumuman,
		a.isi_pengumuman as isi_pengumuman,
		a.status_pengumuman AS status_pengumuman,
		b.id_user  AS idUser,
		b.nama_user AS namaUser
		FROM pengumuman a JOIN user b ON a.user_id = b.id_user
		WHERE  a.id_pengumuman = '$id'
		ORDER BY a.status_pengumuman DESC, a.tgl_pengumuman DESC");

		foreach ($pengumuman->result() AS $r){
			$h['no'] = $no++;
			$h['id_pengumuman'] = $r->id_pengumuman;
			$h['judul_pengumuman'] = $r->judul_pengumuman;
			$h['gbr_pengumuman'] = $r->gbr_pengumuman;
			$h['tgl_pengumuman'] = date('d-m-Y', strtotime($r->tgl_pengumuman));
			$h['isi_pengumuman'] = $r->isi_pengumuman;
			$h['status_pengumuman'] = $r->status_pengumuman;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}
}