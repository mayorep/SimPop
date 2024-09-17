<div class="register-logo">
    <a href="./"><b>SIKKASEHAT</b>Register</a>
  </div>

  <section class="content">
    <form action="index.php/register/register/signup" method="post">
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
                <div class="card-body">
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
                      <a href="index.php/auth/login" class="btn btn-primary btn-block">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
  </section>
  
