<?php
$id = $_SESSION['idUser'];
$status = $_SESSION['idlevel'];
$struktural = $_SESSION['idStruktural'];
$linkEdit = "index.php/admin/pengaturan/akun/akun/token?i=$id&st=$status&str=$struktural";
?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil <b><?php echo $_SESSION['namaUser'] ?></b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
    if (empty($_SESSION['tokenAkun']) OR $_SESSION['tokenAkun'] == "" OR $_SESSION['tokenAkun'] == 0) {
    ?>
        <section class="content">
            <div class="modal-dialog" style="max-width: max-content;">
              <div class="modal-content">
                <form action="<?php echo $linkEdit ?>" method="post" enctype="multipart/form-data" >
                  <div class="modal-header">
                    <h4 class="modal-title">Profil <b><?php echo $_SESSION['namaUser'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <section class="content" style="width:1000px">
                      <div class="container-fluid">
                        <div class="card card-default" style="background-color: transparent;">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">NIK</label>
                                  <input value="<?php echo $_SESSION['vc_nik'] ?>" type="number" name="nik" class="form-control" id="exampleInputEmail1" placeholder="Contoh : 320981237654560" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama</label>
                                  <input value="<?php echo $_SESSION['namaUser'] ?>" type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Contoh : Udin Sejaagat" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">BPJS</label>
                                  <input value="<?php echo $_SESSION['vc_bpjs'] ?>" type="number" name="bpjs" class="form-control" id="exampleInputEmail1" placeholder="ect : 3320981237654560">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">E-Mail</label>
                                  <input value="<?php echo $_SESSION['unUser'] ?>" type="email" name="mail" class="form-control" id="exampleInputEmail1" placeholder="Contoh : udin@gmail.com" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Telepon</label>
                                  <input value="<?php echo $_SESSION['vc_notel'] ?>" type="text" name="tel" class="form-control" id="exampleInputEmail1" placeholder="Contoh : 086784322925" required>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Alamat</label>
                                  <input value="<?php echo $_SESSION['tx_alamat'] ?>" type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Jln. Kenanganmu, Kota Dewe" required>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  <div class="modal-footer justify-content-between">
                      <button type="submit" name="submit" class="btn btn-outline-dark">
                      <i class="fa-solid fa-pen-to-square"></i> Edit
                      </button>
                  </div>
                </form>
              </div>
            </div>
        </section>
    <?php
    }else{
    ?>
    <section class="content">
      <form action="index.php/admin/pengaturan/akun/akun/codeIn" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">
                        Masukan Code Yang Terkirim Ke Whatapp Anda</b>
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                <section class="content" style="width:1000px">
                  <div class="container-fluid">
                    <div class="card card-default" style="background-color: transparent;">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Code</label>
                              <input type="text" name="code" class="form-control" id="exampleInputEmail1" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <!-- <div class="form-group">
                              <label for="exampleInputEmail1">Kode Tidak Ada?</label>
                              <a href="register/register/resendCode" class="form-control btn btn-outline-dark" data-dismiss="modal">
                                <i class="fa-regular fa-paper-plane"></i> Kirim Lagi Ke Whatapp
                              </a>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <?php
                  if ($_SESSION['PesanCode'] == 0) {
                ?>
                  <section class="content" style="width:1000px">
                    <span style="color:red">
                      <b>Kode SALAH. Masukan Code Yang Terkirim Ke Whatapp Anda</b>
                    </span>  
                  </section>
                <?php
                  }
                ?>
                </div>
                <div class="card-footer">
                  <a href="index.php/admin/pengaturan/akun/akun" class="btn btn-outline-dark" data-dismiss="modal">
                    <i class="fa-regular fa-circle-xmark"></i> Batal
                  </a>
                  <button type="submit" name="submit" class="btn btn-outline-success">
                    <i class="fa-regular fa-floppy-disk"></i> Lanjutkan
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <?php
    }
    ?>
</div>