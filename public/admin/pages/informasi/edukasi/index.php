<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Edukasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Edukasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($_SESSION['viewEditdataEdukasi2'] == 1) {
      $idEdukasi = $_SESSION['editdataEdukasi2']['data']['0']['int_idEdukasi'];
      $ejudul = $_SESSION['editdataEdukasi2']['data']['0']['vc_judul'];
      $lt_link = $_SESSION['editdataEdukasi2']['data']['0']['lt_link'];
      $int_idJenisEdukasi = $_SESSION['editdataEdukasi2']['data']['0']['int_idJenisEdukasi'];
      if ($int_idJenisEdukasi == 1) {
        $namaJenis = "Youtube";
      }elseif ($int_idJenisEdukasi == 2) {
        $namaJenis = "Google Sllides";
      }
      $linkEdit = "index.php/admin/informasi/Edukasi/Edukasi/editEdukasi?i=$idEdukasi";
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
                        Edit Data Edukasi <b><?php echo $judul ?></b>
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
                                <label for="exampleInputEmail1">Judul Edukasi</label>
                                <input type="text" value="<?php echo $ejudul ?>" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul Edukasi" required>
                              </div>
                            <div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Jenis Edukasi</label>
                              <select name="jenis" class="form-control" required>
                                <option value="<?php echo $int_idJenisEdukasi ?>">-- <?php echo $namaJenis ?> --</option>
                                <option value="1">Youtube</option>
                                <option value="2">Google Sllides</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Link</label>
                              <textarea name="link" class="form-control" style="height:200px" id="exampleInputEmail1" placeholder="Link" required><?php echo $lt_link ?></textarea>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="card-footer">
                  <a href="index.php/admin/Informasi/Edukasi/Edukasi" class="btn btn-outline-dark" data-dismiss="modal">
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
                      Semua Data Edukasi 
                      <?php 
                        if ($_SESSION['filterEdukasi'] == 0) {
                          $viewFilter = "Privasi";
                        } elseif ($_SESSION['filterEdukasi'] == 1) {
                          $viewFilter = "Publis";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="admin/Informasi/Edukasi/Edukasi" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <?php
                      if ($_SESSION['idlevel'] == 3) {}else{
                    ?>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahEdukasi">
                      <i class="fa-solid fa-plus"></i> 
                    </button>
                    <?php
                      }
                    ?>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filterPengguna">
                      <i class="fa-solid fa-filter"></i> 
                    </button>
                    <?php
                      if ($_SESSION['idlevel'] == 3) {}else{
                    ?>
                    <a href="" target="_blank" class="btn btn-outline-danger" data-toggle="modal" data-target="#tutorial">
                      <i class="fa-solid fa-circle-info"></i> 
                    </a>
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Jenis</th>
                      <th>Autor</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataEdukasi2']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataEdukasi2']['data'][$i]['int_idEdukasi'];
                      $linkPublish = "index.php/admin/informasi/Edukasi/Edukasi/updatePublis?i=$id";
                      $linkPrivasi = "index.php/admin/informasi/Edukasi/Edukasi/updatePrivasi?i=$id";
                      $linkEdit = "index.php/admin/informasi/Edukasi/Edukasi/viewEditEdukasi?i=$id";
                      if ($_SESSION['idlevel'] == 3 & $_SESSION['dataEdukasi2']['data'][$i]['int_status'] == 0) {} else {
                    ?>
                    <div class="modal fade" id="<?php echo "data".$id ?>">
                      <div class="modal-dialog" style="margin:0" align="center">
                        <div class="modal-content bg-secondary" style="width: fit-content;">
                          <div class="modal-header">
                            <h4 class="modal-title"><?php echo $_SESSION['dataEdukasi2']['data'][$i]['vc_judul'] ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12" align="center">
                                <?php
                                  if ($_SESSION['dataEdukasi2']['data'][$i]['int_idJenisEdukasi'] == 1){
                                  ?>
                                  <div>
                                    <?php echo $_SESSION['dataEdukasi2']['data'][$i]['lt_link'];?>
                                  </div>
                                  <?php
                                  } elseif ($_SESSION['dataEdukasi2']['data'][$i]['int_idJenisEdukasi'] == 2){
                                    echo $_SESSION['dataEdukasi2']['data'][$i]['lt_link'];
                                  }
                                ?>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td style="max-width:400px"><?php echo $_SESSION['dataEdukasi2']['data'][$i]['vc_judul'] ?></td>
                      <td align="center">
                        <?php 
                        if ($_SESSION['dataEdukasi2']['data'][$i]['int_idJenisEdukasi'] == 1) {
                        ?>
                        <button type="button" data-toggle="modal" data-target="<?php echo "#data".$id ?>" class="btn btn-outline-danger" Style="width:50px">
                          <i class="fa-brands fa-youtube nav-icon"></i>
                        </button>
                        <?php
                        } elseif ($_SESSION['dataEdukasi2']['data'][$i]['int_idJenisEdukasi'] == 2) {
                        ?>
                          <button type="button" data-toggle="modal" data-target="<?php echo "#data".$id ?>" class="btn btn-outline-primary" Style="width:50px">
                            <i class="fa-solid fa-file-powerpoint nav-icon"></i>
                          </button>
                        <?php
                        }
                        ?>
                      </td>
                      <td><?php echo $_SESSION['dataEdukasi2']['data'][$i]['nama_user'] ?></td>
                      <td><?php echo $_SESSION['dataEdukasi2']['data'][$i]['dt_tanggal'] ?></td>
                      <td>
                        <?php 
                          $sts = $_SESSION['dataEdukasi2']['data'][$i]['int_status'];
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
                      <th>Jenis</th>
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
        <form action="index.php/admin/informasi/Edukasi/Edukasi/filterData" method = "post">
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

  <div class="modal fade" id="tutorial">
    <div class="modal-dialog">
      <div class="modal-content bg-light" style="width: fit-content;">
        <div class="modal-header">
          <h4 class="modal-title">Tutorial</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/eMWaLdVGWt4?si=4kbBpG6kECDsgrFR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
            <i class="fa-regular fa-circle-xmark"></i> Keluar
          </button>
        </div>
      </div>
    </div>
  </div>

    <section class="content">
      <div class="modal modal-info fade" id="tambahEdukasi">
        <div class="modal-dialog" style="max-width: max-content;">
          <div class="modal-content">
            <form action="index.php/admin/informasi/Edukasi/Edukasi/tambahEdukasi" method="post" enctype="multipart/form-data" >
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Edukasi</h4>
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
                              <label for="exampleInputEmail1">Judul Edukasi</label>
                              <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul Edukasi" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Jenis Edukasi</label>
                              <select name="jenis" class="form-control" required>
                                <option value="">-- Pilih Jenis Link --</option>
                                <option value="1">Youtube</option>
                                <option value="2">Google Sllides</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Link</label>
                              <input type="text" name="linkData" class="form-control" id="exampleInputEmail1" placeholder="Link" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
</div>
  