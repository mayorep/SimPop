<?php
$dataSession =  $_SESSION['alertLogin'];
  if ($dataSession == ""){}  
  elseif ($dataSession == 1) {
    echo "<script type='text/javascript'>alert('Berhasil Masuk');</script>";
    $dataSession =  $_SESSION['alertLogin'];
    unset($_SESSION['alertLogin']);
  }else{
    echo "<script type='text/javascript'>alert('Gagal Masuk');</script>";
    unset($_SESSION['alertLogin']);
  }
?>
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>SipPop</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

      <form action="index.php/auth/session/inSession" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </div>
        </div>
        <div class="row" style="margin-top:4px">
          <div class="col-6">
            <a href="index.php/register/register">
              <button type="button" class="btn btn-primary btn-block">Register</button>
            </a>
          </div>
          <div class="col-6">
            <a href="index.php/auth/session/outSession">
              <button type="button" class="btn btn-danger btn-block">Keluar</button>
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>