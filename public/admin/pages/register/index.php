  <div class="register-logo">
    <a href="./"><b>SIKKASEHAT</b>Register</a>
  </div>
<?php
if (empty($_SESSION['CodeRegister']) OR $_SESSION['CodeRegister'] == ""){
?>
    <form action="register/register/signup" method="post">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">
                        Pendaftaran <b>Member / Pasien</b>
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                <?php
                  if ($_SESSION['PesanCode'] == 0) {
                ?>
                  <section class="content" style="width:1000px">
                    <span style="color:red">
                      <b>Email / No Whatapp Sudah Terdaftar.</b> Silakan gati email / no Whatapp anda
                    </span>  
                  </section>
                <?php
                  }
                ?>
                  <section class="content" style="width:1000px">
                    <div class="container-fluid">
                      <div class="card card-default" style="background-color: transparent;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <input type="number" name="nik" class="form-control" id="exampleInputEmail1" placeholder="Contoh : 320981237654560" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Contoh : Udin Sejaagat" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">BPJS</label>
                                <input type="number" name="bpjs" class="form-control" id="exampleInputEmail1" placeholder="ect : 3320981237654560">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">E-Mail</label>
                                <input type="email" name="mail" class="form-control" id="exampleInputEmail1" placeholder="Contoh : udin@gmail.com" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Telepon</label>
                                <input type="text" name="tel" class="form-control" id="exampleInputEmail1" placeholder="Contoh : 086784322925" required>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Jln. Kenanganmu, Kota Dewe" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-12">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <div class="col-4">
                      <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                      <a href="auth/login" class="btn btn-primary btn-block">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
<?php
} else {
  // print_r($_SESSION["dataRegister"]);
?>
    <section class="content">
      <form action="register/register/codeIn" method="post" enctype="multipart/form-data">
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
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kode Tidak Ada?</label>
                              <a href="register/register/resendCode" class="form-control btn btn-outline-dark" data-dismiss="modal">
                                <i class="fa-regular fa-circle-xmark"></i> Kirim Lagi Ke Whatapp
                              </a>
                            </div>
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
                  <a href="auth/session/outSession" class="btn btn-outline-dark" data-dismiss="modal">
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
<?php }  
