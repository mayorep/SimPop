<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mList extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function semuaDataPendaftaran() {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idOperasi,
		a.dt_tglOperasi,
		a.tx_catatanOperasi,
		a.vc_status,
		a.id_user,
		b.nama_user,
		b.vc_notel,
		a.int_jenisOperasi,
		c.vc_ketJenisOperasi
		FROM tb_operasi a 
		JOIN user b ON a.id_user = b.id_user
		JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
		ORDER BY a.int_idOperasi DESC ");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idOperasi'] = $r->int_idOperasi;
			$h['dt_tglOperasi'] = $r->dt_tglOperasi;
			$h['vc_status'] = $r->vc_status;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			$h['int_jenisOperasi'] = $r->int_jenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['tx_catatanOperasi'] = $r->tx_catatanOperasi;
			$h['vc_notel'] = $r->vc_notel;
			// $h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function jenisOperasi() {
		$array = array();
		$data = $this->db->query("SELECT * FROM `tb_jenisoperasi` WHERE int_statusJenisOperasi = 1");
		foreach ($data->result() AS $r){
			$h['int_idJenisOperasi'] = $r->int_idJenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			array_push($array, $h);
		}
		$res = [
			'data' => $array
		];
		return $res;
	}

	public function cariNik($nik) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("SELECT 
		a.id_user, a.un_user, a.pass_user, a.nama_user, a.vc_nik, a.vc_bpjs, 
		a.tx_alamat, a.vc_notel, a.img_user, a.sts_user, b.level_id, 
		b.level_ket, a.id_struktural 
		FROM `user` a JOIN level b ON a.level_id = b.level_id 
		WHERE a.vc_nik = '$nik'
		ORDER BY a.id_user DESC, sts_user DESC");
		foreach ($pengguna->result() AS $r){
			$h['no'] = $no++;
			$h['id_user'] = $r->id_user;
			$h['un_user'] = $r->un_user;
			$h['pass_user'] = $r->pass_user;
			$h['nama_user'] = $r->nama_user;
			$h['vc_nik'] = $r->vc_nik;
			$h['vc_bpjs'] = $r->vc_bpjs;
			$h['tx_alamat'] = $r->tx_alamat;
			$h['vc_notel'] = $r->vc_notel;
			$h['img_user'] = $r->img_user;
			$h['sts_user'] = $r->sts_user;
			$h['level_id'] = $r->level_id;
			$h['level_ket'] = $r->level_ket;
			$h['id_struktural'] = $r->id_struktural;
			$cekStruktural = $this->db->query("SELECT * FROM struktural WHERE id_struktural = '$r->id_struktural'");
			$rcekStruktural = $cekStruktural->result();
			$h['ket_struktural'] = $rcekStruktural->ket_struktural;
			$h['sts_struktural'] = $rcekStruktural->sts_struktural;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function statusPermohonan($id, $kode) {
		$data = array();
		$no = 1;	
        $updateStatusList = $this->db->query("UPDATE `tb_operasi` SET `vc_status` = '$kode' 
		WHERE int_idOperasi = '$id'");
		if ($updateStatusList) {
			$return = 1;
		} else {
			$return = 0;
		}
		return $return;
	}

	public function filterData($status) {
		if ($status == "Semua") {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			ORDER BY a.dt_tglOperasi ASC";
		} elseif ($status == 1) {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.vc_status = 1
			ORDER BY a.dt_tglOperasi ASC";
		} elseif ($status == 2) {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.vc_status = 2
			ORDER BY a.dt_tglOperasi ASC";
		} elseif ($status == 3) {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.vc_status = 3
			ORDER BY a.dt_tglOperasi ASC";
		} elseif ($status == 4) {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.vc_status = 4
			ORDER BY a.dt_tglOperasi ASC";
		} elseif ($status == 0) {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.vc_status = 0
			ORDER BY a.dt_tglOperasi ASC";
		}
		 else {
			$filter = "SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			ORDER BY a.dt_tglOperasi ASC";
		}

		$data = array();
		$no = 1;	
        $artikel = $this->db->query($filter);

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idOperasi'] = $r->int_idOperasi;
			$h['dt_tglOperasi'] = $r->dt_tglOperasi;
			$h['vc_status'] = $r->vc_status;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			$h['int_jenisOperasi'] = $r->int_jenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function publisArtikel($idArtikel) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `artikel` SET `status_artikel` = '1' 
		WHERE `id_artikel` = '$idArtikel'");
	}

	public function privasiArtikel($idArtikel) {
		$data = array();
		$no = 1;	
        $pengguna = $this->db->query("UPDATE `artikel` SET `status_artikel` = '0' 
		WHERE `id_artikel` = '$idArtikel'");
	}

	public function addList($jenis, $tgl, $catatan) {
		$idUser = $_SESSION['dataAdd']['data'][0]['id_user'];
        $addArtikel = $this->db->query("INSERT INTO tb_operasi 
		(id_user, int_jenisOperasi, dt_tglOperasi, tx_catatanOperasi, vc_status) 
		VALUES ('$idUser', '$jenis', '$tgl', '$catatan', '2')");
		if ($addArtikel) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function viewEdit($id) {
		$data = array();
		$cari = $this->db->query("SELECT 
		a.int_idOperasi,
		a.dt_tglOperasi,
		a.tx_catatanOperasi,
		a.vc_status,
		a.id_user,
		b.nama_user,
		a.int_jenisOperasi,
		c.vc_ketJenisOperasi
		FROM tb_operasi a 
		JOIN user b ON a.id_user = b.id_user
		JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
		WHERE a.int_idOperasi = '$id'
		ORDER BY a.int_idOperasi DESC ");

		foreach ($cari->result() AS $r){
			$h['no'] = $no++;
			$h['int_idOperasi'] = $r->int_idOperasi;
			$h['dt_tglOperasi'] = $r->dt_tglOperasi;
			$h['tx_catatanOperasi'] = $r->tx_catatanOperasi;
			$h['int_jenisOperasi'] = $r->int_jenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['nama_user'] = $r->nama_user;
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editList($id, $jenis, $tgl, $catatan) {
		$edit = $this->db->query("UPDATE tb_operasi SET 
		int_jenisOperasi = '$jenis', `dt_tglOperasi` = '$tgl' , `tx_catatanOperasi` = '$catatan' 
		WHERE `int_idOperasi` = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	// ===================================================
	public function semuaDaataPendaftaranPerAkun($id) {
		$data = array();
		$no = 1;	
        $artikel = $this->db->query("SELECT 
		a.int_idOperasi,
		a.dt_tglOperasi,
		a.tx_catatanOperasi,
		a.vc_status,
		a.id_user,
		b.nama_user,
		b.vc_notel,
		a.int_jenisOperasi,
		c.vc_ketJenisOperasi
		FROM tb_operasi a 
		JOIN user b ON a.id_user = b.id_user
		JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
		WHERE a.id_user = '$id'
		ORDER BY a.int_idOperasi DESC ");

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idOperasi'] = $r->int_idOperasi;
			$h['dt_tglOperasi'] = $r->dt_tglOperasi;
			$h['vc_status'] = $r->vc_status;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			$h['int_jenisOperasi'] = $r->int_jenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['tx_catatanOperasi'] = $r->tx_catatanOperasi;
			$h['vc_notel'] = $r->vc_notel;
			// $h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function addPengajuan($jenis, $tgl, $catatan) {
		$idUser = $_SESSION['idUser'];
		$sqlUpdate = $this->db->query("UPDATE `tb_operasi` SET `vc_status` = '0' WHERE id_user = '$idUser'");
        $addArtikel = $this->db->query("INSERT INTO tb_operasi 
		(id_user, int_jenisOperasi, dt_tglOperasi, tx_catatanOperasi, vc_status) 
		VALUES ('$idUser', '$jenis', '$tgl', '$catatan', '1')");
		if ($addArtikel) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function filterDataPendaftaranPerAkun($id, $status) {
		$data = array();
		$no = 1;
		if ($status !== 'semua') {
			$artikel = $this->db->query("SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			b.vc_notel,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.id_user = '$id' AND vc_status = '$status'
			ORDER BY a.int_idOperasi DESC ");
		}else{
			$artikel = $this->db->query("SELECT 
			a.int_idOperasi,
			a.dt_tglOperasi,
			a.tx_catatanOperasi,
			a.vc_status,
			a.id_user,
			b.nama_user,
			b.vc_notel,
			a.int_jenisOperasi,
			c.vc_ketJenisOperasi
			FROM tb_operasi a 
			JOIN user b ON a.id_user = b.id_user
			JOIN tb_jenisoperasi c ON a.int_jenisOperasi = c.int_idJenisOperasi
			WHERE a.id_user = '$id'
			ORDER BY a.int_idOperasi DESC ");
		}	

		foreach ($artikel->result() AS $r){
			$h['no'] = $no++;
			$h['int_idOperasi'] = $r->int_idOperasi;
			$h['dt_tglOperasi'] = $r->dt_tglOperasi;
			$h['vc_status'] = $r->vc_status;
			$h['id_user'] = $r->id_user;
			$h['nama_user'] = $r->nama_user;
			$h['int_jenisOperasi'] = $r->int_jenisOperasi;
			$h['vc_ketJenisOperasi'] = $r->vc_ketJenisOperasi;
			$h['tx_catatanOperasi'] = $r->tx_catatanOperasi;
			$h['vc_notel'] = $r->vc_notel;
			// $h['tglArtikel'] = date('d-m-Y', strtotime($r->tglArtikel));
			array_push($data, $h);
		}

		$res = [
			'data' => $data
		];
		return $res;
	}

	public function editListPendaftaran($id, $jenis) {
		$edit = $this->db->query("UPDATE tb_operasi SET int_jenisOperasi = '$jenis' WHERE `int_idOperasi` = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}

	public function dellPendaftaran($id) {
		$edit = $this->db->query("DELETE FROM `tb_operasi` WHERE `int_idOperasi` = '$id'");
		if ($edit) {
			$report = 1;
		}else{
			$report = 0;
		}
		return $report;
	}
}