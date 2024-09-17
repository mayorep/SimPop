<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mWA extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataWa() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idAuthorization,
		a.vc_ketAuthorization,
		a.int_statusAuthorization
		FROM `authorization` a
		ORDER BY a.int_statusAuthorization DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idAuthorization'] = $r->int_idAuthorization;
			$h['vc_ketAuthorization'] = $r->vc_ketAuthorization;
			$h['int_statusAuthorization'] = $r->int_statusAuthorization;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterWa($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.int_idAuthorization,
			a.vc_ketAuthorization,
			a.int_statusAuthorization
			FROM `authorization` a
			ORDER BY a.int_statusAuthorization DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.int_idAuthorization,
			a.vc_ketAuthorization,
			a.int_statusAuthorization
			FROM `authorization` a
			WHERE a.int_statusAuthorization = 1
			ORDER BY a.int_statusAuthorization DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.int_idAuthorization,
			a.vc_ketAuthorization,
			a.int_statusAuthorization
			FROM `authorization` a
			WHERE a.int_statusAuthorization = 0
			ORDER BY a.int_statusAuthorization DESC";
		} else {
			$filter = "SELECT 
			a.int_idAuthorization,
			a.vc_ketAuthorization,
			a.int_statusAuthorization
			FROM `authorization` a
			ORDER BY a.int_statusAuthorization DESC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idAuthorization'] = $r->int_idAuthorization;
			$h['vc_ketAuthorization'] = $r->vc_ketAuthorization;
			$h['int_statusAuthorization'] = $r->int_statusAuthorization;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisWA($idJenis) {
		$data = array();
		$no = 1;
		$this->db->query("UPDATE `authorization` SET `int_statusAuthorization` = '0' ");	
        $eksekusi = $this->db->query("UPDATE `authorization` SET `int_statusAuthorization` = '1' 
		WHERE `int_idAuthorization` = '$idJenis'");
	}

	public function privasiWA($idJenis) {
		$data = array();
		$no = 1;
		$this->db->query("UPDATE `authorization` SET `int_statusAuthorization` = '0' ");
        $eksekusi = $this->db->query("UPDATE `authorization` SET `int_statusAuthorization` = '0' 
		WHERE `int_idAuthorization` = '$idJenis'");
	}

	public function addWa($judul) {
		$autWa = "Authorization: ".$judul;
		$updateWa = $this->db->query("UPDATE authorization SET `int_statusAuthorization` = '0'");
		$addWa = $this->db->query("INSERT INTO authorization
		(vc_ketAuthorization, int_statusAuthorization) 
		VALUES ('$autWa', '1')");
		if ($addWa) {
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