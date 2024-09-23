<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Data Pengumuman 
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengumuman</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
    if ($_SESSION['viewEditDataPengumuman2'] == 1) {
      $idPengumuman = $_SESSION['editDataPengumuman2']['data']['0']['id_pengumuman'];
      $ejudul = $_SESSION['editDataPengumuman2']['data']['0']['judul_pengumuman'];
      $ebanner = $_SESSION['editDataPengumuman2']['data']['0']['gbr_pengumuman'];
      $eisi = $_SESSION['editDataPengumuman2']['data']['0']['isi_pengumuman'];
      $linkEdit = "index.php/admin/informasi/pengumuman/pengumuman/editPengumuman?i=$idPengumuman";
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
                        Edit Data Artikel <b><?php echo $judul ?></b>
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
                            <div class="col-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Judul Artikel</label>
                                <input type="text" value="<?php echo $ejudul ?>" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul Artikel" required>
                              </div>
                            <div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleInputFile">Foto Banner</label>
                                <div class="input-group">
                                  <img src="<?php echo $ebanner ?>" style="width:300px"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="fileToUpload">
                                  </div>
                                </div>
                              </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Isi Pengumuman</label>
                                <div class="input-group">
                                  <textarea id="summernote" name="isiPengumuman" placeholder="Isi Pengumuman" required>
                                    <?php echo $eisi ?>
                                  </textarea>
                                </div>
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
                  <a href="index.php/admin/Informasi/pengumuman/pengumuman" class="btn btn-outline-dark" data-dismiss="modal">
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
                      Semua Data Pengumuman
                      <?php 
                        if ($_SESSION['filterPengumuman'] == 0) {
                          $viewFilter = "Privasi";
                        } elseif ($_SESSION['filterPengumuman'] == 1) {
                          $viewFilter = "Publis";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="index.php/admin/Informasi/pengumuman/pengumuman" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <?php
                      if ($_SESSION['idlevel']==1 OR $_SESSION['idlevel']==2) {
                    ?>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahPengumuman">
                      <i class="fa-solid fa-plus"></i> 
                    </button>
                    <?php
                      }
                    ?>
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
                      <th>Judul</th>
                      <th>Gambar</th>
                      <th>Autor</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataPengumuman2']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataPengumuman2']['data'][$i]['id_pengumuman'];
                      $linkPublish = "index.php/admin/informasi/pengumuman/pengumuman/updatePublis?i=$id";
                      $linkPrivasi = "index.php/admin/informasi/pengumuman/pengumuman/updatePrivasi?i=$id";
                      $linkEdit = "index.php/admin/informasi/pengumuman/pengumuman/viewEditPengumuman?i=$id";
                      if ($_SESSION['idlevel'] == 3 & $_SESSION['dataPengumuman2']['data'][$i]['status_pengumuman']==0){}else{
                    ?>
                    
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td style="max-width:400px"><?php echo $_SESSION['dataPengumuman2']['data'][$i]['judul_pengumuman'] ?></td>
                      <td>
                        <img src="<?php echo $_SESSION['dataPengumuman2']['data'][$i]['gbr_pengumuman'] ?>" style="width:100px" />
                      </td>
                      <td><?php echo $_SESSION['dataPengumuman2']['data'][$i]['namaUser'] ?></td>
                      <td><?php echo $_SESSION['dataPengumuman2']['data'][$i]['tgl_pengumuman'] ?></td>
                      <td>
                        <?php  
                          $sts = $_SESSION['dataPengumuman2']['data'][$i]['status_pengumuman'];
                          if ($sts == 1) {
                            echo "<i class='fa-solid fa-earth-americas'></i> Publik";
                          } else {
                            echo "<i class='fa-solid fa-lock'></i> Pribadi";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($_SESSION['idlevel'] == 1 OR $_SESSION['idlevel'] == 2) {
                        ?>
                        <a href="<?php echo $linkEdit ?>" class="btn btn-outline-dark">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <?php
                          if ($sts == 0) {
                        ?>
                        <a href="<?php echo $linkPublish ?>" class="btn btn-outline-dark">
                          <i class='fa-solid fa-earth-americas'></i>
                        </a>
                        <?php
                          } else {
                        ?>
                        <a href="<?php echo $linkPrivasi ?>" class="btn btn-outline-dark">
                          <i class='fa-solid fa-lock'></i>
                        </a>
                        <?php
                          }
                        }
                        ?>
                        <button type="button" data-toggle="modal" data-target="<?php echo "#data".$id ?>" class="btn btn-outline-primary">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Gambar</th>
                      <th>Autor</th>
                      <th>Tanggal</th>
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
        <form action="index.php/admin/informasi/pengumuman/pengumuman/filterData" method = "post">
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
                    <option value="1">Publis</option>
                    <option value="0">Privasi</option>
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
      <div class="modal modal-info fade" id="tambahPengumuman">
        <div class="modal-dialog" style="max-width: max-content;">
          <div class="modal-content">
            <form action="index.php/admin/informasi/pengumuman/pengumuman/tambahPengumuman" method="post" enctype="multipart/form-data" >
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pengumuman</h4>
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
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Judul Pengumuman</label>
                              <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul Artikel" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Foto Banner</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="fileToUpload" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Isi Pengumuman</label>
                              <div class="input-group">
                                <textarea id="summernote" name="isiPengumuman" placeholder="Isi Pengumuman" required></textarea>
                              </div>
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
      $id = $_SESSION['dataPengumuman2']['data'][$a]['id_pengumuman'];
    ?>
    <div class="modal fade" id="<?php echo "data".$id ?>">
      <div class="modal-dialog" style="max-width: max-content;">
        <div class="modal-content bg-secondary">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo $_SESSION['dataPengumuman2']['data'][$a]['judulPengumuman'] ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <?php echo $_SESSION['dataPengumuman2']['data'][$a]['isi_pengumuman']; ?>
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
  


  