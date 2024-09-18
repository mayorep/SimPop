<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Pertanyaan 
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pertanyaan</li>
            </ol>
          </div>
        </div>
      </div>
      
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-10" align="right">
                    <h3 class="card-title">Pertanyaan Yang Mungkin Anda Butuhkan </h3>
                  </div>
                  <div class="col-sm-2" align="right">
                      <a href="index.php/admin/pertanyaan/pertanyaan/pertanyaan" class="btn btn-outline-primary">
                        <i class="fa-solid fa-arrows-rotate"></i>
                      </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="accordion">
                  <?php
                  $numrow = count($_SESSION['datavPertanyaan']['data']);
                  for ($i=0;$i<$numrow;$i++) {
                    // echo $numrow;
                  ?>
                  <div class="card card-primary">
                    <div class="card-header">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseOne<?php echo $i ?>">
                        <h4 class="card-title w-100">
                          <?php echo $_SESSION['datavPertanyaan']['data'][$i]['tx_pertanyaan'];?>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseOne<?php echo $i ?>" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <?php echo $_SESSION['datavPertanyaan']['data'][$i]['tx_jawaban'] ?>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>

  


  