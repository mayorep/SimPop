
    <?php
    if ($_SESSION['preview'] == 0) {
    ?>
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pengumuman</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Informasi</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Pengumuman</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="container-xxl py-5">
        <div class="container">
            <?php
            if ($_SESSION['preview'] == 0) {
            ?>
            <div class="row g-4">
                <?php
                $count = count($_SESSION['dataPengumuman']['data']);
                for ($i=0;$i<$count;$i++) {
                    $id = $_SESSION['dataPengumuman']['data'][$i]['id_pengumuman'];
                    $linkPreview = "public/informasi/pengumuman/pengumuman/preview?i=$id";
                ?>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="<?php echo $_SESSION['dataPengumuman']['data'][$i]['gbr_pengumuman'] ?>" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        <h5 class="text-truncate me-3 mb-0">
                            <?php echo $_SESSION['dataPengumuman']['data'][$i]['judul_pengumuman'] ?>
                        </h5>
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href="<?php echo $linkPreview ?>">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            } else {
            ?>
            <div class="row g-4">
                <div class="col-4">
                    <a href="public/informasi/pengumuman/pengumuman" class="btn btn-outline-primary" type="submit">Kembali</a>
                </div>
            </div>
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Informasi / Pengumuman</h6>
                <h1 class="mb-5"><?php echo $_SESSION['dataPengumumanV']['data'][0]['judul_pengumuman'] ?></h1>
            </div>
            <div class="row g-4">
                <div class="col-12" align="center">
                    <img src="<?php echo $_SESSION['dataPengumumanV']['data'][0]['gbr_pengumuman'] ?>" style="max-width:400px"/>
                </div>
                <div class="col-12">
                    <?php echo $_SESSION['dataPengumumanV']['data'][0]['isi_pengumuman'] ?>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-4">
                    <a href="public/informasi/pengumuman/pengumuman" class="btn btn-outline-primary" type="submit">Kembali</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
        
