<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mJenis extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataJenis() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idJenisOperasi,
		a.vc_ketJenisOperasi,
		a.int_statusJenisOperasi
		FROM tb_jenisoperasi a
		ORDER BY a.int_idJenisOperasi DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idJenisOperasi'] = $r->int_idJenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['int_statusJenisOperasi'] = $r->int_statusJenisOperasi;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterJenis($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.int_idJenisOperasi,
			a.vc_ketJenisOperasi,
			a.int_statusJenisOperasi
			FROM tb_jenisoperasi a
			ORDER BY a.int_idJenisOperasi DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.int_idJenisOperasi,
			a.vc_ketJenisOperasi,
			a.int_statusJenisOperasi
			FROM tb_jenisoperasi a
			WHERE a.int_statusJenisOperasi = 1
			ORDER BY a.int_idJenisOperasi DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.int_idJenisOperasi,
			a.vc_ketJenisOperasi,
			a.int_statusJenisOperasi
			FROM tb_jenisoperasi a
			WHERE a.int_statusJenisOperasi = 0
			ORDER BY a.int_idJenisOperasi DESC";
		} else {
			$filter = "SELECT 
			a.int_idJenisOperasi,
			a.vc_ketJenisOperasi,
			a.int_statusJenisOperasi
			FROM tb_jenisoperasi a
			ORDER BY a.int_idJenisOperasi DESC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idJenisOperasi'] = $r->int_idJenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['int_statusJenisOperasi'] = $r->int_statusJenisOperasi;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisJenis($idJenis) {
		$data = array();
		$no = 1;	
        $eksekusi = $this->db->query("UPDATE `tb_jenisoperasi` SET `int_statusJenisOperasi` = '1' 
		WHERE `int_idJenisOperasi` = '$idJenis'");
	}

	public function privasiJenis($idJenis) {
		$data = array();
		$no = 1;	
        $eksekusi = $this->db->query("UPDATE `tb_jenisoperasi` SET `int_statusJenisOperasi` = '0' 
		WHERE `int_idJenisOperasi` = '$idJenis'");
	}

	public function addJenis($judul) {
		$addJenis = $this->db->query("INSERT INTO tb_jenisoperasi
		(vc_ketJenisOperasi, int_statusJenisOperasi) 
		VALUES ('$judul', '1')");
		if ($addJenis) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function viewEditJenis($id) {
		$data = array();
		$cari = $this->db->query("SELECT * FROM tb_jenisoperasi 
		WHERE int_idJenisOperasi = '$id'");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['int_idJenisOperasi'] = $r->int_idJenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['int_statusJenisOperasi'] = $r->int_statusJenisOperasi;
			
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataJenis($id, $judul) {
		$edit = $this->db->query("UPDATE tb_jenisoperasi SET vc_ketJenisOperasi = '$judul' 
		WHERE int_idJenisOperasi = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

}