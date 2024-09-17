<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pendaftaran Operasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pendaftaran Operasi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
    if ($_SESSION['viewEditDataList'] == 1) {
      $idList = $_SESSION['editDataList']['data']['0']['int_idOperasi'];
      $nama_user = $_SESSION['editDataList']['data']['0']['nama_user'];
      $int_jenisOperasi = $_SESSION['editDataList']['data']['0']['int_jenisOperasi'];
      $vc_ketJenisOperasi = $_SESSION['editDataList']['data']['0']['vc_ketJenisOperasi'];
      $linkEdit = "admin/pendaftaran/pendaftaran/pendaftaran/editList?i=$idList";
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
                        Edit Data Permohonan Operasi <b><?php echo $nama_user ?></b>
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <section class="content" style="width:1000px">

                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Operasi</label>
                                <select name="jenis" class="form-control" required>
                                  <option value="<?php echo $int_jenisOperasi ?>">
                                    --<?php echo $vc_ketJenisOperasi ?>--
                                  </option>
                                  <?php
                                  $numjenisOperasi = count($_SESSION['jenisOperasi']['data']);
                                  for ($j=0;$j<$numjenisOperasi;$j++){
                                  ?>
                                  <option value="<?php echo $_SESSION['jenisOperasi']['data'][$j]['int_idJenisOperasi'] ?>">
                                    <?php echo $_SESSION['jenisOperasi']['data'][$j]['vc_ketJenisOperasi'] ?>
                                  </option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                  </section>
                </div>
                <div class="card-footer">
                  <a href="admin/pendaftaran/pendaftaran/pendaftaran" class="btn btn-outline-dark" data-dismiss="modal">
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
    } elseif ($_SESSION['viewAdd'] == 1) {
    ?>
      <section class="content">
        <div class="" id="tambahList">
          <div class="modal-dialog" style="max-width: max-content;">
            <div class="modal-content">
              <form action="admin/pendaftaran/list/listPendataran/tambahPengajuan" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                  <h4 class="modal-title">Ajukan Permohonan Operasi</h4>
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
                                <span class="form-control">
                                  <?php echo $_SESSION['vc_nik'] ?>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <span class="form-control">
                                  <?php echo $_SESSION['namaUser'] ?>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <span class="form-control">
                                  <?php echo $_SESSION['tx_alamat'] ?>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon</label>
                                <span class="form-control">
                                  <?php echo $_SESSION['vc_notel'] ?>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">BPJS</label>
                                <span class="form-control">
                                  <?php echo $_SESSION['vc_bpjs'] ?>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Operasi</label>
                                <select name="jenis" class="form-control" required>
                                  <option value=""></option>
                                  <?php
                                  $numjenisOperasi = count($_SESSION['jenisOperasi']['data']);
                                  for ($j=0;$j<$numjenisOperasi;$j++){
                                  ?>
                                  <option value="<?php echo $_SESSION['jenisOperasi']['data'][$j]['int_idJenisOperasi'] ?>">
                                    <?php echo $_SESSION['jenisOperasi']['data'][$j]['vc_ketJenisOperasi'] ?>
                                  </option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="modal-footer justify-content-between">
                  <a href="admin/pendaftaran/pendaftaran/pendaftaran" class="btn btn-outline-dark">
                    <i class="fa-regular fa-circle-xmark"></i> Batal
                  </a>
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
                      Semua Data Pendaftaran Operasi 
                      <?php 
                        if ($_SESSION['filterList'] == 0) {
                          $viewFilter = "Privasi";
                        } elseif ($_SESSION['filterList'] == 1) {
                          $viewFilter = "Publis";
                        } else {
                          $viewFilter = "Semua";
                        }
                          echo  " ( ".$viewFilter." )";
                      ?>
                    </h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <a href="admin/pendaftaran/pendaftaran/pendaftaran" class="btn btn-outline-primary">
                      <i class="fa-solid fa-arrows-rotate"></i>
                    </a>
                    <a href="admin/pendaftaran/list/listPendataran/viewAdd" class="btn btn-outline-primary">
                      <i class="fa-solid fa-plus"></i> 
                    </a>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filterPengguna">
                    <i class="fa-solid fa-filter"></i> 
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="display table table-bordered table-striped" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pasien</th>
                      <th>Jenis Operasi</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataList']['data']);
                    for($i=0;$i<$numRow;$i++) {
                      $id = $_SESSION['dataList']['data'][$i]['int_idOperasi'];
                      $linkEdit = "admin/pendaftaran/pendaftaran/pendaftaran/viewEditList?i=$id";
                      $linkDel = "admin/pendaftaran/pendaftaran/pendaftaran/dell?i=$id";
                    ?>
                    <div class="modal fade" id="<?php echo "data".$id ?>">
                      <div class="modal-dialog" style="max-width: max-content;">
                        <div class="modal-content bg-secondary">
                          <div class="modal-header">
                            <h4 class="modal-title">
                              Detail Permohonan 
                              <?php echo $_SESSION['dataList']['data'][$i]['nama_user'] ?>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="input-group">
                                  <label for="exampleInputFile">Catatan &nbsp;</label>
                                  <?php echo $_SESSION['dataList']['data'][$i]['tx_catatanOperasi'] ?>
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
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td style="max-width:400px"><?php echo $_SESSION['dataList']['data'][$i]['nama_user'] ?></td>
                      <td><?php echo $_SESSION['dataList']['data'][$i]['vc_ketJenisOperasi'] ?></td>
                      <td><?php echo $_SESSION['dataList']['data'][$i]['dt_tglOperasi'] ?></td>
                      <td>
                        <?php 
                        $sts = $_SESSION['dataList']['data'][$i]['vc_status'];
                        if ($sts == 1) {
                          echo "Pengajuan";
                        } elseif ($sts == 2) {
                          echo "Dijadwalkan";
                        } elseif ($sts == 3) {
                          echo "Proses Operasi";
                        } elseif ($sts == 4) {
                          echo "Selesai";
                        } else {
                          echo "Dibatalkan";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($sts == 1) {
                        ?>
                        <a href="<?php echo $linkEdit ?>" class="btn btn-outline-dark">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="<?php echo $linkDel ?>" class="btn btn-outline-dark">
                          <i class="fa-solid fa-trash"></i>
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
                      <th>Pasien</th>
                      <th>Jenis</th>
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
        <form action="admin/pendaftaran/pendaftaran/pendaftaran/filterDataAkun" method = "post">
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
                    <option value="semua">Semua</option>
                    <option value="1">Pengajuan</option>
                    <option value="2">Dijadwalkan</option>
                    <option value="3">Proses Operasi</option>
                    <option value="4">Selesai</option>
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
  </div>
  
  


  