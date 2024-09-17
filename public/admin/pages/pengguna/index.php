<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Data Pengguna 
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
    if ($_SESSION['viewEditDataPengguna'] == 1) {
      $id_user = $_SESSION['editDataPengguna']['data']['0']['id_user'];
      $email = $_SESSION['editDataPengguna']['data']['0']['un_user'];
      $nama_user = $_SESSION['editDataPengguna']['data']['0']['nama_user'];
      $vc_nik = $_SESSION['editDataPengguna']['data']['0']['vc_nik'];
      $vc_bpjs = $_SESSION['editDataPengguna']['data']['0']['vc_bpjs'];
      $tx_alamat = $_SESSION['editDataPengguna']['data']['0']['tx_alamat'];
      $vc_notel = $_SESSION['editDataPengguna']['data']['0']['vc_notel'];
      $level_id = $_SESSION['editDataPengguna']['data']['0']['level_id'];
      $level_ket = $_SESSION['editDataPengguna']['data']['0']['level_ket'];
      $linkEdit = "admin/Pengguna/Pengguna/editPengguna?i=$id_user";
    ?>
    <section class="content">
      <form action="<?php echo $linkEdit ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">
                        Edit Data Pengguna <b><?php echo $nama_user ?></b>
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
                              <label for="exampleInputEmail1">NIK</label>
                              <input type="number" value="<?php echo $vc_nik ?>" name="nik" class="form-control" id="exampleInputEmail1" placeholder="Contoh : 320981237654560" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                              <input type="text" value="<?php echo $nama_user ?>" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Contoh : Udin Sejaagat" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">BPJS</label>
                              <input type="number" value="<?php echo $vc_bpjs ?>" name="bpjs" class="form-control" id="exampleInputEmail1" placeholder="ect : 3320981237654560">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">E-Mail</label>
                              <input type="email" value="<?php echo $email ?>" name="mail" class="form-control" id="exampleInputEmail1" placeholder="Contoh : udin@gmail.com" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Telepon</label>
                              <input type="text" value="<?php echo $vc_notel ?>" name="tel" class="form-control" id="exampleInputEmail1" placeholder="Contoh : 086784322925" required>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Alamat</label>
                              <input type="text" value="<?php echo $tx_alamat ?>" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Jln. Kenanganmu, Kota Dewe" required>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Status Pengguna</label>
                              <select name="status" class="form-control" required>
                                <option value="<?php echo $level_id ?>">-- <?php echo $level_ket ?> --</option>
                                <option value="2">Pegawai</option>
                                <option value="3">Pasien</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Struktural</label>
                              <select name="struktural" class="form-control" require>
                                <option value="">-- Status --</option>
                                <?php
                                  $numStruktural = count($dataStruktural);
                                  for ($b=0;$b<$numStruktural;$b++) {
                                  ?>
                                  <option value="<?php echo $dataStruktural[$b]['id_struktural']?>">
                                    <?php echo $dataStruktural[$b]['ket_struktural'] ?>
                                  </option>
                                  <?php }?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                  </div>
                  <!-- /.container-fluid -->
                </section>
                </div>
                <div class="card-footer">
                  <a href="admin/Pengguna/Pengguna" class="btn btn-outline-dark" data-dismiss="modal">
                    <i class="fa-regular fa-circle-xmark"></i> Batal
                  </a>
                  <button type="submit" name="submit" class="btn btn-outline-success">
                    <i class="fa-regular fa-floppy-disk"></i> Simpan
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <?php 
    } else {
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h3 class="card-title">
                      Semua Data Pengguna
                      <?php 
                        if ($_SESSION['filterPengguna'] == 0) {
                          $viewFilter = "Tidak Aktif";
                        } elseif ($_SESSION['filterPengguna'] == 1) {
                          $viewFilter = "Aktif";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="admin/pengguna/pengguna" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahPengguna">
                      <i class="fa-solid fa-plus"></i> 
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filterPengguna">
                    <i class="fa-solid fa-filter"></i> 
                    </button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Bpjs</th>
                      <th>Notel</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataPengguna']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataPengguna']['data'][$i]['id_user'];
                      $linkPublish = "admin/pengguna/pengguna/updatePublis?i=$id";
                      $linkPrivasi = "admin/pengguna/pengguna/updatePrivasi?i=$id";
                      $linkEdit = "admin/pengguna/pengguna/viewEditPengguna?i=$id";
                      $linkReset = "admin/pengguna/pengguna/resetPassword?i=$id";
                    ?>
                    
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td style="max-width:400px"><?php echo $_SESSION['dataPengguna']['data'][$i]['vc_nik'] ?></td>
                      <td><?php echo $_SESSION['dataPengguna']['data'][$i]['nama_user'] ?></td>
                      <td><?php echo $_SESSION['dataPengguna']['data'][$i]['vc_bpjs'] ?></td>
                      <td><?php echo $_SESSION['dataPengguna']['data'][$i]['vc_notel'] ?></td>
                      <td>
                        <?php 
                          $sts = $_SESSION['dataPengguna']['data'][$i]['sts_user'];
                          if ($sts == 1) {
                            echo "<i class='fa-solid fa-user-check'></i> Aktif";
                          } else {
                            echo "<i class='fa-solid fa-user-xmark'></i> Tidak Aktif";
                          }
                        ?>
                      </td>
                      <td>
                        <a href="<?php echo $linkEdit ?>" class="btn btn-outline-dark">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <?php
                          if ($sts == 0) {
                        ?>
                        <a href="<?php echo $linkPublish ?>" class="btn btn-outline-primary">
                          <i class="fa-regular fa-square-check"></i>
                        </a>
                        <?php
                          } else {
                        ?>
                        <a href="<?php echo $linkPrivasi ?>" class="btn btn-outline-danger">
                          <i class="fa-regular fa-rectangle-xmark"></i>
                        </a>
                        <?php
                          }
                        ?>
                        <button type="button" data-toggle="modal" data-target="<?php echo "#data".$id ?>" class="btn btn-outline-primary">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                        <a href="<?php echo $linkReset ?>" class="btn btn-outline-primary">
                          <i class="fa-solid fa-key"></i>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Bpjs</th>
                      <th>Notel</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
  </div>

  <div class="modal fade" id="filterPengguna">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form action="admin/pengguna/pengguna/filterData" method = "post">
          <div class="modal-header">
            <h4 class="modal-title">Filter Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <select name="status" class="form-control" required>
                    <option value="">-- Status --</option>
                    <option value="Semua">Semua</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-outline-light">
              <i class="fa-solid fa-filter"></i> Terapkan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <section class="content">
      <div class="modal modal-info fade" id="tambahPengguna">
        <div class="modal-dialog" style="max-width: max-content;">
          <div class="modal-content">
            <form action="admin/pengguna/pengguna/tambahPengguna" method="post" enctype="multipart/form-data" >
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pengguna</h4>
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
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                              <select name="status" class="form-control" required>
                                <option value="">-- Status --</option>
                                <option value="2">Pegawai</option>
                                <option value="3">Pasien</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Struktural</label>
                              <select name="struktural" class="form-control" require>
                                <option value="">-- Status --</option>
                                <?php
                                  $numStruktural = count($dataStruktural);
                                  for ($b=0;$b<$numStruktural;$b++) {
                                  ?>
                                  <option value="<?php echo $dataStruktural[$b]['id_struktural']?>">
                                    <?php echo $dataStruktural[$b]['ket_struktural'] ?>
                                  </option>
                                  <?php }?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                  </div>
                  <!-- /.container-fluid -->
                </section>

              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
                    <i class="fa-regular fa-circle-xmark"></i> Keluar
                  </button>
                  <button type="submit" name="submit" class="btn btn-outline-success">
                    <i class="fa-regular fa-floppy-disk"></i> Simpan
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php 
    for($a=0;$a<$numRow;$a++) {
      $id = $_SESSION['dataPengguna']['data'][$a]['id_user'];
    ?>
    <div class="modal fade" id="<?php echo "data".$id ?>">
      <div class="modal-dialog" style="max-width: max-content;">
        <div class="modal-content bg-secondary">
          <div class="modal-header">
            <h4 class="modal-title">
              Biodata
              <b>
                <?php echo $_SESSION['dataPengguna']['data'][$a]['nama_user'] ?>
              </b>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row" style="width:1000px">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <span class="form-control">
                    <?php echo $_SESSION['dataPengguna']['data'][$a]['nama_user']; ?>
                  </span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">E-Mail</label>
                  <span class="form-control">
                    <?php echo $_SESSION['dataPengguna']['data'][$a]['un_user']; ?>
                  </span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">NIK</label>
                  <span class="form-control">
                    <?php echo $_SESSION['dataPengguna']['data'][$a]['vc_nik']; ?>
                  </span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">BPJS</label>
                  <span class="form-control">
                    <?php echo $_SESSION['dataPengguna']['data'][$a]['vc_bpjs']; ?>
                  </span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <span class="form-control">
                    <?php echo $_SESSION['dataPengguna']['data'][$a]['vc_notel']; ?>
                  </span>
                </div>
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <span class="form-control" style="height: 80px;">
                    <?php echo $_SESSION['dataPengguna']['data'][$a]['tx_alamat']; ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    </div>
  


  