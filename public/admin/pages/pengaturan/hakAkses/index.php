<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Artikel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($_SESSION['viewEditDataArtikel'] == 1) {
      $idArtikel = $_SESSION['editDataArtikel']['data']['0']['idArtikel'];
      $ejudul = $_SESSION['editDataArtikel']['data']['0']['judulArtikel'];
      $ebanner = $_SESSION['editDataArtikel']['data']['0']['gambarArtikel'];
      $eisi = $_SESSION['editDataArtikel']['data']['0']['isiArtikel'];
      $linkEdit = "admin/informasi/artikel/artikel/editArtikel?i=$idArtikel";
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
                                <label for="exampleInputEmail1">Isi Artikel</label>
                                <div class="input-group">
                                  <textarea id="summernote" name="isiArtikel" placeholder="Isi Artikel" required>
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
                  <a href="admin/Informasi/artikel/artikel" class="btn btn-outline-dark" data-dismiss="modal">
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
                      Semua Data Artikel 
                      <?php 
                        if ($_SESSION['filterArtikel'] == 0) {
                          $viewFilter = "Privasi";
                        } elseif ($_SESSION['filterArtikel'] == 1) {
                          $viewFilter = "Publis";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="admin/Informasi/artikel/artikel" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahArtikel">
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
                    $numRow = count($_SESSION['dataArtikel']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataArtikel']['data'][$i]['idArtikel'];
                      $linkPublish = "admin/informasi/artikel/artikel/updatePublis?i=$id";
                      $linkPrivasi = "admin/informasi/artikel/artikel/updatePrivasi?i=$id";
                      $linkEdit = "admin/informasi/artikel/artikel/viewEditArtikel?i=$id";
                    ?>
                    <div class="modal fade" id="<?php echo "data".$id ?>">
                      <div class="modal-dialog" style="max-width: max-content;">
                        <div class="modal-content bg-secondary">
                          <div class="modal-header">
                            <h4 class="modal-title"><?php echo $_SESSION['dataArtikel']['data'][$i]['judulArtikel'] ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <?php echo $_SESSION['dataArtikel']['data'][$i]['isiArtikel'] ?>
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
                      <td style="max-width:400px"><?php echo $_SESSION['dataArtikel']['data'][$i]['judulArtikel'] ?></td>
                      <td>
                        <img src="<?php echo $_SESSION['dataArtikel']['data'][$i]['gambarArtikel'] ?>" style="width:100px" />
                      </td>
                      <td><?php echo $_SESSION['dataArtikel']['data'][$i]['namaUser'] ?></td>
                      <td><?php echo $_SESSION['dataArtikel']['data'][$i]['tglArtikel'] ?></td>
                      <td>
                        <?php 
                          $sts = $_SESSION['dataArtikel']['data'][$i]['statusArtikel'];
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
                        <button type="button" data-toggle="modal" data-target="<?php echo "#data".$id ?>" class="btn btn-outline-primary">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <?php
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <?php } ?>
  </div>

  <div class="modal fade" id="filterPengguna">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form action="admin/informasi/artikel/artikel/filterData" method = "post">
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
      <div class="modal modal-info fade" id="tambahArtikel">
        <div class="modal-dialog" style="max-width: max-content;">
          <div class="modal-content">
            <form action="admin/informasi/artikel/artikel/tambahArtikel" method="post" enctype="multipart/form-data" >
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Artikel</h4>
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
                              <label for="exampleInputEmail1">Judul Artikel</label>
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
                              <label for="exampleInputEmail1">Isi Artikel</label>
                              <div class="input-group">
                                <textarea id="summernote" name="isiArtikel" placeholder="Isi Artikel" required></textarea>
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
        <!-- /.modal-dialog -->
      </div>
    </section>
  


  