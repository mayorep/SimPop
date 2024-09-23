<?php
if (empty($_SESSION['login'])) {
    if ($_SESSION["page"] == "PHome" OR $_SESSION["page"] == "PArtikel" 
    OR $_SESSION["page"] == "PPengumuman"  OR $_SESSION["page"] == "PPertanyaan"  
    OR $_SESSION["page"] == "PTesTimoni" OR $_SESSION["page"] == "PKontak"
    OR $_SESSION["page"] == "PPendaftaran" OR $_SESSION["page"] == "PTentangKami"
    OR $_SESSION["page"] == "PEdukasi") {
?>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Alamat</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Wairklau No.1 86113, Kota Uneng, Kec. Alok, Kabupaten Sikka, Nusa Tenggara Tim. 86113</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>081261153944</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Buka Jam</h4>
                    <h6 class="text-light">Setiap Hari</h6>
                    <p class="mb-4">24 Jam</p>
                    <!-- <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Pelayanan</h4>
                    <a class="btn btn-link" href="">Pengumuman</a>
                    <a class="btn btn-link" href="">Artikel</a>
                    <a class="btn btn-link" href="">Pertanyaan</a>
                    <a class="btn btn-link" href="">Dafftaar Operasi</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="https://www.instagram.com/precious_stone_store/">Precious Stone Developer</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By <a class="border-bottom" href="https://www.instagram.com/precious_stone_store/">Precious Stone Developer</a> Distributed By <a href="https://www.instagram.com/precious_stone_store/">Precious Stone Developer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./public/viewPublic/lib/wow/wow.min.js"></script>
    <script src="./public/viewPublic/lib/easing/easing.min.js"></script>
    <script src="./public/viewPublic/lib/waypoints/waypoints.min.js"></script>
    <script src="./public/viewPublic/lib/counterup/counterup.min.js"></script>
    <script src="./public/viewPublic/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./public/viewPublic/lib/tempusdominus/js/moment.min.js"></script>
    <script src="./public/viewPublic/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="./public/viewPublic/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="./public/viewPublic/js/main.js"></script>

<?php
    } elseif ($_SESSION["page"] == "LoginPage") {
?>
<script src="./public/admin/plugins/jquery/jquery.min.js"></script>
<script src="./public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./public/admin/dist/js/adminlte.min.js"></script>

<?php  
    } elseif ($_SESSION["page"] == "Register") {
?>
</div>
<script src="./public/admin/plugins/jquery/jquery.min.js"></script>
<script src="./public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./public/admin/dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
    }
} else {
?>
<aside class="control-sidebar control-sidebar-dark">
  </aside>
  <footer class="main-footer">
    <strong>Copyright &copy;  <a href="https://www.instagram.com/precious_stone_store/">Precious Stone Developer</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<script src="./public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./public/admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="./public/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="./public/admin/plugins/raphael/raphael.min.js"></script>
<script src="./public/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="./public/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="./public/admin/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery -->
<script src="/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./public/admin/plugins/jszip/jszip.min.js"></script>
<script src="./public/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="./public/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="./public/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./public/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="./public/admin/plugins/toastr/toastr.min.js"></script>
<script src="./public/admin/dist/js/demo.js"></script>
<script src="./public/admin/dist/js/pages/dashboard2.js"></script>


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

<script src="./public/admin/plugins/jquery/jquery.min.js"></script>
<script src="./public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./public/admin/dist/js/adminlte.min.js"></script>
<script src="./public/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="./public/admin/plugins/codemirror/codemirror.js"></script>
<script src="./public/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="./public/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="./public/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="./public/admin/dist/js/demo.js"></script>
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

<?php
}
?>
</body>

</html>