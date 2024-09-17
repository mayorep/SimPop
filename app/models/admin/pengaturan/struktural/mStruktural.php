<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mStruktural extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataStruktural() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.id_struktural,
		a.ket_struktural,
		a.sts_struktural
		FROM struktural a
		ORDER BY a.id_struktural DESC");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['id_struktural'] = $r->id_struktural;
			$h['ket_struktural'] = $r->ket_struktural;
			$h['sts_struktural'] = $r->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function filterStruktural($status) {
		if ($status == "Semua") {
			$filter = "SELECT
			a.id_struktural,
			a.ket_struktural,
			a.sts_struktural
			FROM struktural a
			ORDER BY a.sts_struktural DESC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.id_struktural,
			a.ket_struktural,
			a.sts_struktural
			FROM struktural a
			WHERE a.sts_struktural = 1
			ORDER BY a.sts_struktural DESC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.id_struktural,
			a.ket_struktural,
			a.sts_struktural
			FROM struktural a
			WHERE a.sts_struktural = 0
			ORDER BY a.sts_struktural DESC";
		} else {
			$filter = "SELECT 
			a.id_struktural,
			a.ket_struktural,
			a.sts_struktural
			FROM struktural a
			ORDER BY a.sts_struktural DESC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['id_struktural'] = $r->id_struktural;
			$h['ket_struktural'] = $r->ket_struktural;
			$h['sts_struktural'] = $r->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisStruktural($idStruktural) {
		$data = array();
		$no = 1;	
        $eksekusi = $this->db->query("UPDATE `struktural` SET `sts_struktural` = '1' 
		WHERE `id_struktural` = '$idStruktural'");
	}

	public function privasiStruktural($idStruktural) {
		$data = array();
		$no = 1;	
        $eksekusi = $this->db->query("UPDATE `struktural` SET `sts_struktural` = '0' 
		WHERE `id_struktural` = '$idStruktural'");
	}

	public function addStruktural($judul) {
		$cekId = $this->db->query("SELECT a.id_struktural FROM struktural a
		ORDER BY a.id_struktural DESC LIMIT 1");
		$numId = $cekId->result();
		$idNya = $numId[0]->id_struktural + 1;
		$addStruktural = $this->db->query("INSERT INTO `struktural` (id_struktural,ket_struktural, sts_struktural) 
		VALUES ('$idNya', '$judul', '1')");
		if ($addStruktural) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function viewEditStruktural($id) {
		$data = array();
		$cari = $this->db->query("SELECT * FROM struktural 
		WHERE id_struktural = '$id'");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['id_struktural'] = $r->id_struktural;
			$h['ket_struktural'] = $r->ket_struktural;
			$h['sts_struktural'] = $r->sts_struktural;
			
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editDataStruktural($id, $judul) {
		$edit = $this->db->query("UPDATE struktural SET ket_struktural = '$judul' 
		WHERE id_struktural = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

}