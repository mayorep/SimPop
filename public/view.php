<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "./public/theme/head.php";
include "./public/theme/navbar.php";
if (empty($_SESSION['login'])) {
    if (empty($_SESSION['page'])) {
        $_SESSION['page'] = "PHome";
    }
    if ($_SESSION["page"] == "PHome") {
        include "./public/viewPublic/index.php";
    } elseif ($_SESSION["page"] == "PArtikel") {
        include "./public/viewPublic/page/informasi/artikel/index.php";
    } elseif ($_SESSION["page"] == "PPengumuman") {
        include "./public/viewPublic/page/informasi/pengumuman/index.php";
    } elseif ($_SESSION["page"] == "PPertanyaan") {
        include "./public/viewPublic/page/informasi/pertanyaan/index.php";
    } elseif ($_SESSION["page"] == "PTesti") {
        include "./public/viewPublic/";
    } elseif ($_SESSION["page"] == "PKontak") {
        include "./public/viewPublic/page/kontak/index.php";
    } elseif ($_SESSION["page"] == "PPendaftaran") {
        include "./public/viewPublic/";
    } elseif ($_SESSION["page"] == "PTentangKami") {
        include "./public/viewPublic/";
    } elseif ($_SESSION["page"] == "LoginPage") {
        include "./public/admin/pages/login/index.php";
    } elseif ($_SESSION["page"] == "Register") {
        include "./public/admin/pages/register/index.php";
    } else {
        redirect('auth/session/outSession');
    }
} else {
    $dataStruktural = $_SESSION['dataStruktural']['dataStruktural'];
    if ($_SESSION["page"] == "ADashboard") {
        include "./public/admin/pages/dashboard/index.php";
    } elseif ($_SESSION["page"] == "APengguna") {
        include "./public/admin/pages/pengguna/index.php";
    } elseif ($_SESSION["page"] == "AArtikel") {
        include "./public/admin/pages/informasi/artikel/index.php";
    } elseif ($_SESSION["page"] == "APengumuman") {
        include "./public/admin/pages/informasi/pengumuman/index.php";
    } elseif ($_SESSION["page"] == "ADaftarOperasi") {
        include "./public/admin/pages/pendaftaran/pendaftaran/index.php";
    } elseif ($_SESSION["page"] == "AListPendaftar") {
        include "./public/admin/pages/pendaftaran/list/index.php";
    } elseif ($_SESSION["page"] == "ADaftarPertanyaan") {
        include "./public/admin/pages/pertanyaan/daftarPertanyaan/index.php";
    } elseif ($_SESSION["page"] == "APertanyaan") {
        include "./public/admin/pages/pertanyaan/pertanyaan/index.php";
    } elseif ($_SESSION["page"] == "AAkun") {
        include "./public/admin/pages/pengaturan/akun/index.php";
    } elseif ($_SESSION["page"] == "AJenis") {
        include "./public/admin/pages/pengaturan/jenis/index.php";
    } elseif ($_SESSION["page"] == "AWa") {
        include "./public/admin/pages/pengaturan/wa/index.php";
    } elseif ($_SESSION["page"] == "AHakAkses") {

    } elseif ($_SESSION["page"] == "AStruktural") {
        include "./public/admin/pages/pengaturan/struktural/index.php";
    } elseif ($_SESSION["page"] == "ATesti") {
        include "./public/admin/pages/informasi/testTimoni/index.php";
    } else {
        redirect('auth/session/outSession');
    }
}
include "./public/theme/footer.php";