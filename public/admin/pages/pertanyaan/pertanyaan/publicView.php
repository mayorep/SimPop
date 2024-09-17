<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SimPop RSUD T.C. HILLERS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../../../public/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../../public/admin/dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/896c30804e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <link rel="stylesheet" href="../../../../public/admin/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/codemirror/theme/monokai.css">
  <link rel="stylesheet" href="../../../../public/admin/plugins/simplemde/simplemde.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<div class="wrapper" style="background-color: transparent;">  
  <div class="content-wrapper" style="background-color: transparent;">
    <section class="content-header">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-10" align="right">
                    <h3 class="card-title">Pertanyaan Yang Mungkin Anda Butuhkan </h3>
                  </div>
                  <!-- <div class="col-sm-2" align="right">
                      <a href="index.php/admin/pertanyaan/pertanyaan/pertanyaan" class="btn btn-outline-primary">
                        <i class="fa-solid fa-arrows-rotate"></i>
                      </a>
                  </div> -->
                </div>
              </div>
              <div class="card-body">
                <div id="accordion">
                  <?php
                  $numrow = count($_SESSION['datavPertanyaan']);
                  for ($i=0;$i<=$numrow;$i++) {
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

  <script src="../../../../public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../../public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../../public/admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../../../public/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../../../public/admin/plugins/raphael/raphael.min.js"></script>
<script src="../../../../public/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../../../public/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../../../public/admin/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery -->
<script src="/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../../public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../../public/admin/plugins/jszip/jszip.min.js"></script>
<script src="../../../../public/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../../public/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../../public/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../../public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../../../public/admin/plugins/toastr/toastr.min.js"></script>
<script src="../../../../public/admin/dist/js/demo.js"></script>
<script src="../../../../public/admin/dist/js/pages/dashboard2.js"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script src="../../../../public/admin/plugins/jquery/jquery.min.js"></script>
<script src="../../../../public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../public/admin/dist/js/adminlte.min.js"></script>
<script src="../../../../public/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../../../public/admin/plugins/codemirror/codemirror.js"></script>
<script src="../../../../public/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="../../../../public/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="../../../../public/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="../../../../public/admin/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#summernote').summernote()
    $('#summernote2').summernote()

    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>

</html>

  


  