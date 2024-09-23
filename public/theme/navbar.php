<?php
if (empty($_SESSION['login'])) {
    if ($_SESSION["page"] == "PHome" OR $_SESSION["page"] == "PArtikel" 
    OR $_SESSION["page"] == "PPengumuman"  OR $_SESSION["page"] == "PPertanyaan"  
    OR $_SESSION["page"] == "PTesTimoni" OR $_SESSION["page"] == "PKontak"
    OR $_SESSION["page"] == "PPendaftaran" OR $_SESSION["page"] == "PTentangKami"
    OR $_SESSION["page"] == "PEdukasi") {
?>
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="homeRoute" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">SimPop </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="index.php/homeRoute/home" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="index.php/public/informasi/pengumuman/pengumuman" class="dropdown-item">Pengumuman</a>
                            <a href="index.php/public/informasi/artikel/artikel" class="dropdown-item">Artikel</a>
                            <!-- <a href="testimonial.html" class="dropdown-item">Testimoni</a> -->
                            <a href="index.php/public/informasi/edukasi/edukasi" class="dropdown-item">Edukasi Pra-OP</a>
                            <a href="index.php/public/informasi/pertanyaan/pertanyaan" class="dropdown-item">FAQ</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="index.php/register/register" class="dropdown-item">Daftar Operasi</a>
                            <!-- <a href="about.html" class="dropdown-item">Tentang Kami</a> -->
                        <a href="index.php/public/kontak/kontak" class="dropdown-item">Kontak</a>
                        </div>
                    </div>
                    <a href="index.php/auth/login" class="nav-item nav-link">Masuk/Daftar</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">Emergency 24/7</p>
                        <h5 class="m-0 text-secondary">081261153944</h5>
                    </div>
                </div>
            </div>
        </nav>
    </div>
<?php
    } else {}
    
}else {
?>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="./public/img/logo/logo2.png" style="width:20%">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </form>
        </div>
      </li>

      
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
    </li>
</ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="./public/img/logo/logo3.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SimPop</span>
    </a>
    
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION['imgUser'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['namaUser']; ?></a>
            </div>
        </div>

      
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="index.php/admin/dashboard/homeAdmin" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <?php
                if ($_SESSION['idlevel'] == 1) {
            ?>
            <li class="nav-item">
                <a href="index.php/admin/pengguna/pengguna" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-user"></i>
                    <p>Pengguna</p>
                </a>
            </li>
            <?php
                }
            ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-circle-info"></i>
                    <p>Informasi<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="index.php/admin/Informasi/artikel/artikel" class="nav-link">
                            <i class="far fa-solid fa-newspaper nav-icon"></i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php/admin/Informasi/pengumuman/pengumuman" class="nav-link">
                            <i class="far fa-solid fa-bullhorn nav-icon"></i>
                            <p>Pengumuman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php/admin/Informasi/edukasi/edukasi" class="nav-link">
                            <i class="fa-solid fa-book-open nav-icon"></i>
                            <p>Edukasi</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="admin/Informasi/testTimoni/testTimoni" class="nav-link">
                            <i class="far fa-solid fa-quote-right nav-icon"></i>
                            <p>Testimoni</p>
                        </a>
                    </li> -->
                </ul>
            </li>  
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-id-card"></i>
                    <p>Pendaftaran<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <?php
                        if ($_SESSION['idlevel'] == 3){
                    ?>
                    <li class="nav-item">
                        <a href="index.php/admin/pendaftaran/pendaftaran/pendaftaran" class="nav-link">
                            <i class="far fa-solid fa-solid fa-address-card nav-icon"></i>
                            <p>Daftar Operasi</p>
                        </a>
                    </li>
                    <?php
                        }else{
                    ?>
                    <li class="nav-item">
                        <a href="index.php/admin/pendaftaran/list/listPendataran" class="nav-link">
                            <i class="far fa-solid fa-solid fa-list-check nav-icon"></i>
                            <p>List Pendaftar</p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </li> 
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-circle-question"></i>
                    <p>Pertanyaan<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                <?php
                    if ($_SESSION['idlevel']==3) {
                ?>
                    <li class="nav-item">
                        <a href="index.php/admin/pertanyaan/pertanyaan/pertanyaan" class="nav-link">
                            <i class="far fa-solid fa-person-circle-question nav-icon"></i>
                            <p>Pertanyaan</p>
                        </a>
                    </li>
                    <?php
                        }else{
                    ?>
                    <li class="nav-item">
                        <a href="index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan" class="nav-link">
                            <i class="far fa-solid fa-clipboard-list nav-icon"></i>
                            <p>Daftar Pertanyaan</p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </li>    
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-gear"></i>
                    <p>Pengaturan<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="index.php/admin/pengaturan/akun/akun" class="nav-link">
                            <i class="far fa-solid fa-user-gear nav-icon"></i>
                            <p>Akun</p>
                        </a>
                    </li>
                    <?php
                        if ($_SESSION['idlevel'] == 1) {
                    ?>
                    <li class="nav-item">
                        <a href="index.php/admin/pengaturan/struktural/struktural" class="nav-link">
                            <i class="far fa-solid fa-file-circle-plus nav-icon"></i>
                            <p>Struktural</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php/admin/pengaturan/jenis/jenis" class="nav-link">
                            <i class="fa-solid fa-tags nav-icon"></i>
                            <p>Jenis OP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php/admin/pengaturan/wa/wa" class="nav-link">
                            <i class="fa-brands fa-square-whatsapp nav-icon"></i>
                            <p>Whatapp</p>
                        </a>
                    </li>
                    <?php
                        } elseif ($_SESSION['idlevel'] == 2) {
                    ?>
                    <li class="nav-item">
                        <a href="index.php/admin/pengaturan/jenis/jenis" class="nav-link">
                            <i class="fa-solid fa-tags nav-icon"></i>
                            <p>Jenis OP</p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <!-- <li class="nav-item">
                        <a href="admin/pengaturan/hakAkses/hakAkses" class="nav-link">
                            <i class="far fa-solid fa-window-restore nav-icon"></i>
                            <p>Hak Akses</p>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="nav-item">
                <a href="index.php/auth/session/outSession" class="nav-link">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p>
                        Keluar
                    </p>
                </a>
            </li>
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php
}