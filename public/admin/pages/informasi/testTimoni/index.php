<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengguna Aplikasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengguna Aplikasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h3 class="card-title">Semua Data Pengguna</h3>
                  </div>
                  <div class="col-sm-6" align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterPengguna">
                      Filter
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $numRow = count($_SESSION['dataPengguna']['data']);
                    for($i=0;$i<$numRow;$i++) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $_SESSION['dataPengguna']['data'][$i]['namaUser'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
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
    <!-- /.content -->
  </div>

  <div class="modal fade" id="filterPengguna">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form>
          <div class="modal-header">
            <h4 class="modal-title">Filter Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control" required>
                    <option value="">-- Kategori --</option>
                    <option value="all">Semua</option>
                    <option value="pas">Pasien</option>
                    <option value="peg">Pegawai</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control" required>
                    <option value="">-- Status --</option>
                    <option value="all">Semua</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-outline-light">Tampilkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>