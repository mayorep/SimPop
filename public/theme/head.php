<!DOCTYPE html>
<html lang="en">
<?php
if (empty($_SESSION['login'])) {
    if ($_SESSION["page"] == "PHome" OR $_SESSION["page"] == "PArtikel" 
    OR $_SESSION["page"] == "PPengumuman"  OR $_SESSION["page"] == "PPertanyaan"  
    OR $_SESSION["page"] == "PTesTimoni" OR $_SESSION["page"] == "PKontak"
    OR $_SESSION["page"] == "PPendaftaran" OR $_SESSION["page"] == "PTentangKami") {
?>
<head>
    <meta charset="utf-8">
    <title>SimPop T.C.Hillers</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="./public/viewPublic/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./public/viewPublic/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./public/viewPublic/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./public/viewPublic/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./public/viewPublic/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./public/viewPublic/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <table>
                    <td>
                        <img src="./public/img/logo/unair.png" style="max-width:60px"/>
                    </td>
                    <td>
                        <a href="" class="navbar-brand m-0 p-0">
                            <h1 class="text-primary m-0">SimPop</h1>
                        </a>
                    </td>
                </table>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <a href="https://maps.app.goo.gl/qGCfi6LMkf64CN2U7" target="_blank" class="m-0">Alamat/map</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">info@example.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

<?php
    } elseif ($_SESSION["page"] == "LoginPage") {
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SimPop RSUD T.C. HILLERS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="./public/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./public/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<?php 
    } elseif ($_SESSION["page"] == "Register") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SimPop RSUD T.C. HILLERS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="./public/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./public/admin/dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition register-page">
<div class="wrapper">
<?php
    }
} else {
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SimPop RSUD T.C. HILLERS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="./public/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="./public/admin/dist/css/adminlte.min.css">
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
  <link rel="stylesheet" href="./public/admin/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="./public/admin/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="./public/admin/plugins/codemirror/theme/monokai.css">
  <link rel="stylesheet" href="./public/admin/plugins/simplemde/simplemde.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<div class="wrapper">
<?php
}
?>