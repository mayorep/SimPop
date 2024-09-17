<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Data Pertanyaan 
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pertanyaan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
    if ($_SESSION['viewEditDataPertanyaan2'] == 1) {
      $idPertanyaan = $_SESSION['editDataPertanyaan2']['data']['0']['int_idPertanyaan'];
      $ejudul = $_SESSION['editDataPertanyaan2']['data']['0']['tx_pertanyaan'];
      $eisi = $_SESSION['editDataPertanyaan2']['data']['0']['tx_jawaban'];
      $linkEdit = "index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/editPertanyaan?i=$idPertanyaan";
    ?>
    <section class="content">
      <form action="<?php echo $linkEdit ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-12">
                      <h3 class="card-title">
                        Edit Data Pertanyaan <b><?php  ?></b>
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
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Pertanyaan</label>
                                <div class="input-group">
                                  <textarea id="summernote" name="pertanyaan" placeholder="Isi Pengumuman" required>
                                    <?php echo $ejudul ?>
                                  </textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jawaban</label>
                                <div class="input-group">
                                  <textarea id="summernote2" name="jawaban" placeholder="Isi Pengumuman" required>
                                    <?php echo $eisi ?>
                                  </textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="card-footer">
                  <a href="index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan" class="btn btn-outline-dark" data-dismiss="modal">
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
                      Semua Data Pertanyaan
                      <?php 
                        if ($_SESSION['filterPertanyaan'] == 0) {
                          $viewFilter = "Privasi";
                        } elseif ($_SESSION['filterPertanyaan'] == 1) {
                          $viewFilter = "Publis";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                          // print_r($_SESSION['dataPertaanyaan']['data']);
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahPertanyaan">
                      <i class="fa-solid fa-plus"></i> 
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filterPertanyaan">
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
                      <th>Pertanyaan</th>
                      <th>Jawaban</th>
                      <th>Autor</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataPertanyaan2']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataPertanyaan2']['data'][$i]['int_idPertanyaan'];
                      $linkPublish = "index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/updatePublis?i=$id";
                      $linkPrivasi = "index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/updatePrivasi?i=$id";
                      $linkEdit = "index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/viewEditPertanyaan?i=$id";
                      $linkDell = "index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/dellPertanyaan?i=$id";
                    ?>
                    
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td style="max-width:400px">
                        <?php echo $_SESSION['dataPertanyaan2']['data'][$i]['tx_pertanyaan'] ?>
                      </td>
                      <td>
                        <?php echo $_SESSION['dataPertanyaan2']['data'][$i]['tx_jawaban'] ?>
                      </td>
                      <td><?php echo $_SESSION['dataPertanyaan2']['data'][$i]['nama_user'] ?></td>
                      <td><?php echo $_SESSION['dataPertanyaan2']['data'][$i]['dt_tglPertanyaan'] ?></td>
                      <td>
                        <?php 
                          $sts = $_SESSION['dataPertanyaan2']['data'][$i]['int_statusPertanyaan'];
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
                        <a href="<?php echo $linkDell ?>" onclick="myFunction()" class="btn btn-outline-dark">
                          <i class="fa-solid fa-trash-can"></i>
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
                      <th>Pertanyaan</th>
                      <th>Jawaban</th>
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

  <div class="modal fade" id="filterPertanyaan">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form action="index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/filterData" method = "post">
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
      <div class="modal modal-info fade" id="tambahPertanyaan">
        <div class="modal-dialog" style="max-width: max-content;">
          <div class="modal-content">
            <form action="index.php/admin/pertanyaan/daftarPertanyaan/daftarPertanyaan/tambahPertanyaan" method="post" enctype="multipart/form-data" >
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pertaanyaan</h4>
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
                              <label for="exampleInputEmail1">Pertanyaan</label>
                              <div class="input-group">
                                <textarea id="summernote" name="pertanyaan" placeholder="Isi Pengumuman" required></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Jawaban</label>
                              <div class="input-group">
                                <textarea id="summernote2" name="jawaban" placeholder="Isi Pengumuman" required></textarea>
                              </div>
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
  


  