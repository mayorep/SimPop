<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mArtikel extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataArtikel() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.id_artikel as idArtikel,
		a.judul_artikel as judulArtikel,
		a.gbr_artikel as gambarArtikel,
		a.tgl_artikel as tglArtikel,
		a.isi_artikel as isiArtikel,
		a.status_artikel AS statusArtikel,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM artikel a JOIN user b ON a.user_id = b.id_user 
		WHERE a.status_artikel = 1
		ORDER BY a.status_artikel DESC, a.tgl_artikel DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['idArtikel'] = $r->idArtikel;
			$h['judulArtikel'] = $r->judulArtikel;
			$h['gambarArtikel'] = $r->gambarArtikel;
			$h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			$h['isiArtikel'] = $r->isiArtikel;
			$h['statusArtikel'] = $r->statusArtikel;
			$h['idUser'] = $r->idUser;
			$h['namaUser'] = $r->namaUser;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function dataArtikel($id) {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.id_artikel as idArtikel,
		a.judul_artikel as judulArtikel,
		a.gbr_artikel as gambarArtikel,
		a.tgl_artikel as tglArtikel,
		a.isi_artikel as isiArtikel,
		a.status_artikel AS statusArtikel,
		b.id_user AS idUser,
		b.nama_user AS namaUser
		FROM artikel a JOIN user b ON a.user_id = b.id_user 
		WHERE a.id_artikel = $id
		ORDER BY a.status_artikel DESC, a.tgl_artikel DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['idArtikel'] = $r->idArtikel;
			$h['judulArtikel'] = $r->judulArtikel;
			$h['gambarArtikel'] = $r->gambarArtikel;
			$h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			$h['isiArtikel'] = $r->isiArtikel;
			$h['statusArtikel'] = $r->statusArtikel;
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