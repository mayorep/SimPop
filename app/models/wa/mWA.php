<?php
defined('BASEPATH') or exit('No direct script access allowed');
class mWA extends CI_Model
{
    function __construct(){
		parent::__construct();
	}

	public function kirimWA($notel, $pesan) {
		$qAutoriz = $this->db->query("SELECT * FROM `authorization` WHERE int_statusAuthorization = '1' 
		ORDER BY int_idAuthorization DESC LIMIT 1");
		$r = $qAutoriz->result();
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.fonnte.com/send',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array(
		'target' => $notel,
		'message' => $pesan,
		),
		CURLOPT_HTTPHEADER => array(
			$r['0']->vc_ketAuthorization
		),
		));

		$response = curl_exec($curl);
		if (curl_errno($curl)) {
			$error_msg = curl_error($curl);
		}
		curl_close($curl);

		if (isset($error_msg)) {
			return $error_msg;
		}
		// echo $nomer;
		return $r->vc_ketAuthorization;
	}
}