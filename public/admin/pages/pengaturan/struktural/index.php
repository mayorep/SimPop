<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Struktural</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Struktural</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($_SESSION['viewEditDataStruktural'] == 1) {
      $idStruktural = $_SESSION['editDataStruktural']['data']['0']['id_struktural'];
      $judul = $_SESSION['editDataStruktural']['data']['0']['ket_struktural'];
      $linkEdit = "index.php/admin/pengaturan/Struktural/Struktural/editStruktural?i=$idStruktural";
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
                        Edit Data Struktural <b><?php echo $judul ?></b>
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
                                <label for="exampleInputEmail1">Judul Struktural</label>
                                <input type="text" value="<?php echo $judul ?>" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul Struktural" required>
                              </div>
                            <div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="card-footer">
                  <a href="index.php/admin/Informasi/Struktural/Struktural" class="btn btn-outline-dark" data-dismiss="modal">
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
                      Semua Data Struktural 
                      <?php 
                        if ($_SESSION['filterStruktural'] == 0) {
                          $viewFilter = "Privasi";
                        } elseif ($_SESSION['filterStruktural'] == 1) {
                          $viewFilter = "Publis";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="index.php/admin/pengaturan/Struktural/Struktural" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahStruktural">
                      <i class="fa-solid fa-plus"></i> 
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filterPengguna">
                    <i class="fa-solid fa-filter"></i> 
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataStruktural']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataStruktural']['data'][$i]['id_struktural'];
                      $linkPublish = "index.php/admin/pengaturan/Struktural/Struktural/updatePublis?i=$id";
                      $linkPrivasi = "index.php/admin/pengaturan/Struktural/Struktural/updatePrivasi?i=$id";
                      $linkEdit = "index.php/admin/pengaturan/Struktural/Struktural/viewEditStruktural?i=$id";
                      if ($id > 0) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td style="max-width:400px"><?php echo $_SESSION['dataStruktural']['data'][$i]['ket_struktural'] ?></td>
                      <td>
                        <?php 
                          $sts = $_SESSION['dataStruktural']['data'][$i]['sts_struktural'];
                          if ($sts == 1) {
                            echo "<i class='fa-solid fa-earth-americas'></i> Publik";
                          } else {
                            echo "<i class='fa-solid fa-lock'></i> Pribadi";
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
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <?php } ?>
  </div>

  <div class="modal fade" id="filterPengguna">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form action="index.php/admin/pengaturan/Struktural/Struktural/filterData" method = "post">
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
      <div class="modal modal-info fade" id="tambahStruktural">
        <div class="modal-dialog" style="max-width: max-content;">
          <div class="modal-content">
            <form action="index.php/admin/pengaturan/Struktural/Struktural/tambahStruktural" method="post" enctype="multipart/form-data" >
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Struktural</h4>
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
                              <label for="exampleInputEmail1">Judul Struktural</label>
                              <input type="text" name="namaStruktural" class="form-control" id="exampleInputEmail1" placeholder="Judul Struktural" required>
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
        <!-- /.modal-dialog -->
      </div>
    </section>
  


  