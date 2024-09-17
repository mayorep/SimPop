<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class akun extends CI_Controller {

	function __construct() {

        parent::__construct();
		session_start();
		$this->load->model('admin/informasi/artikel/mArtikel');
		$this->load->model('admin/pengguna/mPengguna');
		$this->load->model('register/mRegister');
		$this->load->model('wa/mWA');
	}
	
	public function index() {
		if (empty($_SESSION['page'])) {
			redirect('index.php/auth/session/outSession');
		} else {
			$_SESSION['page'] = "AAkun";
			$_SESSION['tokenAkun'] = 0;
			$_SESSION['PesanCode'] = "";
			redirect('./');

		}
	}

	public function token() {
		$id = $_GET['i'];
		$nik = $this->input->post('nik', TRUE);
		$nama = htmlspecialchars($this->input->post('nama', ENT_QUOTES));
		$bpjs = $this->input->post('bpjs', TRUE);
		$mail = $this->input->post('mail', TRUE);
		$tel = $this->input->post('tel', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		$status = $_GET['st'];
		$dtStruktur = $_GET['str'];

		$_SESSION['eid'] = $id;
		$_SESSION['enik'] = $nik;
		$_SESSION['enama'] = $nama;
		$_SESSION['ebpjs'] = $bpjs;
		$_SESSION['email'] = $mail;
		$_SESSION['etelep'] = $tel;
		$_SESSION['ealamat'] = $alamat;
		$_SESSION['estatus'] = $status;
		$_SESSION['edtStruktur'] = $dtStruktur;

		$_SESSION['tokenAkun'] = 1;

		$codeNya = rand();
		$code = $this->mRegister->cekCode($tel, $codeNya);
		$pesan = "Hai $nama. Ini kode kamu untuk update profil *$codeNya*";
		$code = $this->mWA->kirimWA($tel, $pesan);
		// echo $tel;
		redirect('./');
	}
	
	public function codeIn() {
		$code = $this->input->post('code', TRUE);
		$notel = $_SESSION["etelep"];
		$ferivikasiCode = $this->mRegister->ferivikasiCode($notel, $code);
		if ($ferivikasiCode == 1){
			$_SESSION['PesanCode'] = "";
			$_SESSION["CodeRegister"] = "";	
			$id = $_SESSION['eid'];
			$nik = $_SESSION['enik'];
			$nama = $_SESSION['enama'];
			$bpjs = $_SESSION['ebpjs'];
			$mail = $_SESSION['email'];
			$tel = $_SESSION['etelep'];
			$alamat = $_SESSION['ealamat'];
			$status = $_SESSION['estatus'];
			$dtStruktur = $_SESSION['edtStruktur'];
			redirect("index.php/admin/pengaturan/akun/akun/editAkun?i=$id&st=$status&str=$struktural&nik=$nik&nama=$nama&bpjs=$bpjs&mail=$mail&tel=$tel&alamat=$alamat");

		} else {
			$_SESSION['PesanCode'] = "0";
			redirect('./');
		}
		// print_r($data['data'][0]);
	}

	public function editAkun() {
		$i = $_GET['i'];
		$nik = $_GET['nik'];
		$nama = $_GET['nama'];
		$bpjs = $_GET['bpjs'];
		$mail = $_GET['mail'];
		$tel = $_GET['tel'];
		$alamat = $_GET['alamat'];
		$status = $_GET['st'];
		$dtStruktur = $_GET['str'];
		
		// $cekun = $this->db->query("SELECT un_user FROM user WHERE un_user = '$mail' OR vc_notel = '$tel'");
		// $row = $cekun->num_rows();
		// if ($row == 0 OR $row == 1) {
			$tambah = $this->mPengguna->editDataPengguna($i, $nik, $nama, $bpjs, $mail, $tel, $alamat, $status, $dtStruktur);
			if ($tambah == 1) {
				$_SESSION['vc_nik'] = $nik;
				$_SESSION['namaUser'] = $nama;
				$_SESSION['vc_bpjs'] = $bpjs;
				$_SESSION['unUser'] = $mail;
				$_SESSION['vc_notel'] = $tel;
				$_SESSION['tx_alamat'] = $alamat;
				redirect('index.php/admin/pengaturan/akun/akun');
			}else{
				$report = 0;
				$_SESSION['report'] = '0';
				redirect('index.php/admin/pengaturan/akun/akun');
			}
			echo $status."-".$report;
		// } else {
			?>
			<!-- <script type='text/javascript'>
				let text ="Email Atau Nomer Telepon sudah terdaftar";
				if (confirm(text) == true) {
					window.location.replace('./');
				} else {
					window.location.replace('./');
				}
			</script> -->
			<?php
		// }
		
		return $report;
	}

}
