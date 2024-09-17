-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 10:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21799001_opsc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `gbr_artikel` varchar(255) NOT NULL,
  `tgl_artikel` date NOT NULL,
  `isi_artikel` longtext NOT NULL,
  `status_artikel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `user_id`, `judul_artikel`, `gbr_artikel`, `tgl_artikel`, `isi_artikel`, `status_artikel`) VALUES
(1, 1, '6 Hal yang Harus Disiapkan Sebelum Menjalani Operasi Medis', './public/admin/dist/img/foto/artikel/11208329307_6 Hal yang Harus Disiapkan Sebelum Menjalani Operasi Medis.jpg', '2024-01-19', '                                                                                                                                                                                                                                                                                                                                                                        <h2>Persiapan sebelum menjalani operasi medis</h2>\r\n\r\n<p><img alt=\"makan sehat sebelum operasi\" src=\"https://cdn.hellosehat.com/wp-content/uploads/2022/03/7a7a7fbc-shutterstock_1886178655.jpg\"></p>\r\n\r\n<p>Setelah memastikan empat hal di atas, saatnya Anda mempersiapkan diri untuk operasi. Inilah beberapa persiapan penting sebelum operasi, baik secara fisik maupun mental.  </p>\r\n\r\n<h3>1. Menjalani gaya hidup sehat</h3>\r\n\r\n<p>Jika dokter sudah menyarankan Anda untuk menjalani operasi, segeralah mengubah gaya hidup menjadi lebih sehat.</p>\r\n\r\n<p>Sebuah studi dalam <a href=\"https://www.bmj.com/content/358/bmj.j3702.full\" target=\"_blank\"><em>British Medical Journal</em> (2017)</a>, menyebutkan <em>prehabilitation </em>atau aktivitas fisik khusus sebelum operasi membantu meningkatkan keberhasilan operasi.</p>\r\n\r\n<p>Beberapa gaya hidup sehat lainnya, seperti pola makan sehat, cukup tidur, berhenti merokok, dan minum alkohol, juga membantu mempercepat waktu pemulihan.</p>\r\n\r\n<h3>2. Puasa sebelum operasi medis</h3>\r\n\r\n<p>Beberapa hari sebelumnya, dokter akan memberitahukan apakah Anda perlu <a href=\"https://hellosehat.com/sehat/operasi/alasan-pantang-makan-sebelum-operasi/\">puasa sebelum operasi</a>. Pasalnya, perut yang kosong akan membantu kerja obat bius selama Anda dibedah. </p>\r\n\r\n<p>Konsultasikan secara rinci makanan apa saja yang tidak boleh dikonsumsi dan kapan Anda harus mulai puasa sebelum operasi.</p>\r\n\r\n<p>Apabila Anda sedang minum obat rutin, tanyakan juga apakah penggunaan obat masih bisa dilanjutkan atau harus dihentikan sementara waktu.</p>\r\n\r\n<h3>3. Pemeriksaan kesehatan sebelum operasi</h3>\r\n\r\n<p>Pada umumnya, dokter akan meminta pasien untuk melakukan pemeriksaan kesehatan terlebih dahulu di rumah sakit sehari atau beberapa hari sebelum operasi medis.</p>\r\n\r\n<p>Beberapa jenis <a href=\"https://hellosehat.com/sehat/operasi/tes-sesudah-sebelum-operasi/\">tes sebelum operasi</a> yang mungkin Anda lakukan meliputi pemeriksaan darah lengkap, tes urine, rontgen <em>thorax</em>, elektrokardiografi (EKG), dan MRI.</p>\r\n\r\n<h3>Jangan membawa atau memakai aksesori apa pun</h3>\r\n\r\n<p><img alt=\"rawat inap rumah sakit\" src=\"https://cdn.hellosehat.com/wp-content/uploads/2022/10/853bd82c-rumah-sakit-terbesar-di-indonesia-1.jpg\"></p>\r\n\r\n<p>Tanggalkan semua perhiasan sebelum operasi, mulai dari kalung, cincin, dan anting. Anda juga sebaiknya tidak memakai cat kuku atau riasan wajah apa pun saat datang ke rumah sakit. </p>\r\n\r\n<p>Persiapan ini perlu Anda lakukan untuk mencegah infeksi bakteri atau kontaminasi dari partikel-partikel asing selama prosedur operasi berlangsung.</p>\r\n\r\n<h3>5. Bawa baju ganti yang nyaman</h3>\r\n\r\n<p>Saat menjalani pemulihan setelah operasi di rumah sakit, gunakanlah baju dan pakaian dalam yang longgar, nyaman, dan memiliki bahan yang menyerap keringat.</p>\r\n\r\n<p>Pilih juga pakaian yang mudah dilepas dan dikenakan, seperti kaus dan celana pendek, terlebih bila pergerakan tubuh Anda menjadi terbatas setelah menjalani operasi.</p>\r\n\r\n<h3>6. Minta dukungan orang-orang terdekat</h3>\r\n\r\n<p>Jika tiba waktunya operasi, percayalah bahwa Anda berada di tangan para ahli dan profesional yang tepat. Mintalah juga dukungan dan kehadiran orang terdekat selama operasi berjalan. </p>\r\n\r\n<p>Pastikan ada orang yang nanti akan membantu Anda<a href=\"https://hellosehat.com/sehat/operasi/tips-cepat-pulih-setelah-operasi/\"> memulihkan diri setelah operasi</a>, baik di rumah sakit maupun di rumah saat Anda sudah diperbolehkan pulang.</p>\r\n\r\n<p>Anda tidak diperbolehkan untuk mengemudi kendaraan sendiri, bahkan setelah operasi rawat jalan. Pastikan orang terdekat membantu merencanakan kepulangan Anda.</p>\r\n\r\n<h3>Kesimpulan</h3>\r\n\r\n<ul>\r\n <li>Sebelum operasi, ada beberapa hal yang perlu dipertimbangkan dan dipersiapkan guna mendukung kelancaran dan keberhasilan prosedur medis ini.</li>\r\n <li>Perlu tidaknya operasi, kredibilitas dokter dan rumah sakit, dan biaya operasi sering kali menjadi hal-hal yang perlu dipertimbangkan.</li>\r\n <li>Apabila keputusan operasi sudah mantap, penting untuk melakukan persiapan, seperti menjalani gaya hidup sehat, melakukan tes medis sebelum operasi, hingga meminta dukungan orang terdekat.</li>\r\n</ul>\r\n                                                                                                                                                                                                                                                                                                                                                    ', 1),
(2, 1, 'Prosedur Post Care', './public/admin/dist/img/foto/artikel/11560982051_Prosedur Post Care.jpg', '2024-01-19', '                                    <h3>Post Care</h3>\r\n\r\n<p>Ditinjau oleh dr. Rizal Fadli </p>\r\n\r\n<p> </p>\r\n\r\n<h2><strong>Pengertian Post Care</strong></h2>\r\n\r\n<p>Post care adalah perawatan yang perlu dilakukan di rumah setelah mendapat diagnosis suatu penyakit, atau setelah menjalani operasi atau tindakan medis oleh dokter. Ini mencakup hal-hal yang perlu dilakukan untuk mencegah penyakit memburuk, pola makan apa yang harus dimiliki, olahraga apa yang boleh dijalani, dan lain-lain. </p>\r\n\r\n<p>Untuk post care pasca operasi, perawatan dapat dimulai segera setelah operasi. Bisa saat rawat inap di rumah sakit dan dapat berlanjut setelah dipulangkan. Sebagai bagian dari perawatan pasca operasi, dokter atau petugas medis biasanya akan memberi edukasi mengenai potensi efek samping dan komplikasi dari prosedur.</p>\r\n\r\n<h2><strong>Tujuan Post Care</strong></h2>\r\n\r\n<p>Post care sangat penting untuk membantu mengelola kondisi kesehatan yang dialami. Termasuk mencegah kemungkinan komplikasi penyakit, dan risiko efek samping serius setelah operasi. </p>\r\n\r\n<h2><strong>Manfaat Post Care</strong></h2>\r\n\r\n<p>Post care bermanfaat untuk mengelola kondisi kesehatan yang dialami, agar tidak menjadi semakin parah dan menyebabkan komplikasi. Jika baru saja menjalani operasi atau tindakan medis lainnya, ini juga bermanfaat untuk menurunkan risik efek samping dan komplikasi terkait operasi. </p>\r\n\r\n<p>Misalnya, jika didiagnosis diabetes, perawatan ini dapat membantu mengelola kadar gula darah agar tetap di batas aman, dan mencegah komplikasi serius. Contoh lainnya, perawatan luka bekas operasi di rumah, dapat bermanfaat untuk mempercepat penyembuhan, sekaligus mencegah infeksi. </p>\r\n\r\n<h2><strong>Kapan Harus Melakukan Post Care?</strong></h2>\r\n\r\n<p>Post care dapat dilakukan segera setelah menerima diagnosis penyakit dari dokter, atau setelah menjalani operasi atau tindakan medis lainnya. </p>\r\n\r\n<h2><strong>Prosedur Post Care</strong></h2>\r\n\r\n<p>Untuk pengelolaan penyakit setelah mendapat diagnosis, prosedur post care cenderung seperti perubahan gaya hidup lebih sehat. Tergantung kondisi atau penyakit yang dialami, perawatan yang diperlukan bisa berbeda. </p>\r\n\r\n<p>Namun umumnya berupa perubahan pola makan, pemilihan jenis olahraga yang tepat, minum obat yang diresepkan dokter, dan mengontrol kondisi secara rutin. Perubahan pola makan dan pemilihan jenis olahraga bisa dikonsultasikan pada dokter. </p>\r\n\r\n<p>Untuk perawatan pasca operasi, perawatan biasanya akan dilakukan segera setelah keluar ruang operasi. Alias dimulai sejak masih menjalani rawat inap di rumah sakit. Perawatan di rumah sakit ini biasanya dilakukan oleh perawat atau petugas medis, dan diawasi oleh dokter.</p>\r\n\r\n<p>Setelah dirasa boleh pulang, perawatan akan dilanjutkan di rumah. Dokter biasanya akan memberi instruksi yang komprehensif sebelum kamu dipulangkan. Mengenai apa yang harus dilakukan di rumah. Termasuk soal pola makan, aktivitas fisik, dan perawatan luka operasi. </p>\r\n\r\n<p>Tergantung pada kondisi yang dialami, post care pasca operasi dapat langsung dilakukan di rumah. Misalnya jika tindakan medis yang dijalani adalah operasi kecil atau bedah minor yang tidak perlu rawat inap. </p>\r\n\r\n<p>Sangat penting untuk mengikuti instruksi dokter setelah meninggalkan rumah sakit. Minumlah obat sesuai resep, waspadai potensi komplikasi, dan pastikan tidak melewati janji temu dengan dokter. </p>\r\n\r\n<p>Hal penting lain yang harus dilakukan saat pemulihan pasca operasi adalah mengamati dengan cermat bagaimana dokter atau perawat membersihkan dan merawat luka operasi. </p>\r\n\r\n<p>Beberapa tips perawatan bekas luka operasi paling dasar meliputi:</p>\r\n\r\n<ul>\r\n <li>Jangan menggosok, menggosok, atau merawat luka sayatan secara kasar dengan cara apa pun. </li>\r\n <li>Menahan diri dari menerapkan produk apapun (lotion, krim, dll) kecuali jika disetujui oleh dokter. </li>\r\n <li>Melindungi luka dari paparan sinar matahari. </li>\r\n <li>Menjaga luka tetap kering dan bersih. </li>\r\n</ul>\r\n\r\n<p>Aspek penting lain dari perawatan pasca operasi adalah pola makan. Memiliki pola makan yang sehat dan seimbang dapat memberi nutrisi yang dibutuhkan tubuh untuk pulih sepenuhnya, pada tingkat yang lebih cepat. </p>\r\n\r\n<h2><strong>Tempat Melakukan Post Care</strong></h2>\r\n\r\n<p>Post cara dapat dilakukan di rumah atau di rumah sakit, tergantung kondisi dan tindakan medis yang dijalani. Pastikan untuk minum obat yang diresepkan dokter. Kamu juga bisa <a href=\"https://www.halodoc.com/aplikasi-halodoc\" target=\"_blank\"><em>download</em> <strong>Halodoc</strong></a> untuk <a href=\"https://www.halodoc.com/obat-dan-vitamin\" target=\"_blank\">cek kebutuhan medis</a> kamu dengan mudah.</p>\r\n\r\n<p><a href=\"https://youtu.be/YvQgpAT4DAY?si=dRV8R9l0GPer2PGW\">https://youtu.be/YvQgpAT4DAY?si=dRV8R9l0GPer2PGW</a></p>\r\n                                  ', 1),
(5, 1, 'judul ', './public/admin/dist/img/foto/artikel/11471541158_judul .jpg', '2024-09-09', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <p>sad</p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `int_idAuthorization` int(11) NOT NULL,
  `vc_ketAuthorization` longtext NOT NULL,
  `int_statusAuthorization` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorization`
--

INSERT INTO `authorization` (`int_idAuthorization`, `vc_ketAuthorization`, `int_statusAuthorization`) VALUES
(1, 'Authorization: eqPYX5Tv@6zCShwUerE5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_ket`) VALUES
(1, 'Admin istrator'),
(2, 'Pegawai'),
(3, 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `gbr_pengumuman` varchar(255) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `isi_pengumuman` longtext NOT NULL,
  `status_pengumuman` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `user_id`, `judul_pengumuman`, `gbr_pengumuman`, `tgl_pengumuman`, `isi_pengumuman`, `status_pengumuman`) VALUES
(1, 1, 'Pengumuman Hasil Akhir Proses Seleksi Pegawai Kontrak Profesional RS Tc Hilers 2024 1', './public/admin/dist/img/foto/pengumuman/1333956398_Pengumuman Hasil Akhir Proses Seleksi Pegawai Kontrak Profesional RS Tc Hilers 2024 1.jpg', '2024-01-19', 'awsedtfgu', 1),
(8, 1, 'ab', './public/admin/dist/img/foto/pengumuman/11372341957_a.jpg', '2024-09-10', '                                    <p>ab</p>                                  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `int_idPertanyaan` int(11) NOT NULL,
  `tx_pertanyaan` longtext NOT NULL,
  `tx_jawaban` longtext NOT NULL,
  `id_user` int(11) NOT NULL,
  `dt_tglPertanyaan` date NOT NULL,
  `int_statusPertanyaan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`int_idPertanyaan`, `tx_pertanyaan`, `tx_jawaban`, `id_user`, `dt_tglPertanyaan`, `int_statusPertanyaan`) VALUES
(9, '<p>pertanyaan</p>', '<p>Jawaban</p>', 1, '2024-09-13', 1),
(10, '<p><b>pertanyaan ke 2</b></p>', '<p><span xss=removed>jawaban ke 2</span></p>', 1, '2024-09-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `struktural`
--

CREATE TABLE `struktural` (
  `id_struktural` int(11) NOT NULL,
  `ket_struktural` varchar(255) NOT NULL,
  `sts_struktural` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `struktural`
--

INSERT INTO `struktural` (`id_struktural`, `ket_struktural`, `sts_struktural`) VALUES
(0, 'Pasien', 1),
(1, 'Direktur Rumah Sakit', 1),
(2, 'HRD', 1),
(3, 'Bidang Personalia', 1),
(7, 'Kepala Ruangan', 1),
(8, 'Dokter Umum', 1),
(9, 'Dokter Spesialis', 1),
(10, 'Perawat', 1),
(11, 'Anggota', 1),
(12, 'OB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisoperasi`
--

CREATE TABLE `tb_jenisoperasi` (
  `int_idJenisOperasi` int(11) NOT NULL,
  `vc_ketJenisOperasi` varchar(255) NOT NULL,
  `int_statusJenisOperasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenisoperasi`
--

INSERT INTO `tb_jenisoperasi` (`int_idJenisOperasi`, `vc_ketJenisOperasi`, `int_statusJenisOperasi`) VALUES
(1, 'Operasi Jantung', 1),
(2, 'Operasi Caesar', 1),
(3, 'Operasi Kista', 1),
(4, 'Operasi Miom', 1),
(5, 'Operasi Tumor', 1),
(6, 'Operasi hernia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_operasi`
--

CREATE TABLE `tb_operasi` (
  `int_idOperasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `int_jenisOperasi` int(11) NOT NULL,
  `dt_tglOperasi` datetime DEFAULT NULL,
  `tx_catatanOperasi` longtext DEFAULT NULL,
  `vc_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_operasi`
--

INSERT INTO `tb_operasi` (`int_idOperasi`, `id_user`, `int_jenisOperasi`, `dt_tglOperasi`, `tx_catatanOperasi`, `vc_status`) VALUES
(10, 28, 1, '2024-09-17 15:39:00', 'as', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_testtimoni`
--

CREATE TABLE `tb_testtimoni` (
  `int_id_testTimoni` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `int_idToken` int(11) NOT NULL,
  `vc_notel` varchar(255) NOT NULL,
  `vc_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_token`
--

INSERT INTO `tb_token` (`int_idToken`, `vc_notel`, `vc_token`) VALUES
(5, '085784322925', '867326119');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `level_id` int(1) NOT NULL,
  `un_user` varchar(50) NOT NULL,
  `pass_user` varchar(12) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `vc_nik` varchar(30) NOT NULL,
  `vc_bpjs` varchar(30) NOT NULL,
  `tx_alamat` longtext NOT NULL,
  `vc_notel` varchar(12) NOT NULL,
  `id_struktural` int(11) NOT NULL,
  `img_user` longtext NOT NULL,
  `sts_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `level_id`, `un_user`, `pass_user`, `nama_user`, `vc_nik`, `vc_bpjs`, `tx_alamat`, `vc_notel`, `id_struktural`, `img_user`, `sts_user`) VALUES
(1, 1, 'admin@gmail.com', 'admin', 'Admin ', '1111', '', '', '', 11, './public/admin/dist/img/avatar5.png', 1),
(28, 3, 'udin@gmail.com', '226848291', 'udin', '1320123123123123', '1320123123123123', 'Jalan raya shermadohir RT 1 RW 6 desa senduro kecamatan senduro', '085784322925', 0, './public/admin/dist/img/avatar5.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`int_idAuthorization`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`int_idPertanyaan`),
  ADD KEY `d_user` (`id_user`);

--
-- Indexes for table `struktural`
--
ALTER TABLE `struktural`
  ADD PRIMARY KEY (`id_struktural`);

--
-- Indexes for table `tb_jenisoperasi`
--
ALTER TABLE `tb_jenisoperasi`
  ADD PRIMARY KEY (`int_idJenisOperasi`);

--
-- Indexes for table `tb_operasi`
--
ALTER TABLE `tb_operasi`
  ADD PRIMARY KEY (`int_idOperasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `int_jenisOperasi` (`int_jenisOperasi`);

--
-- Indexes for table `tb_testtimoni`
--
ALTER TABLE `tb_testtimoni`
  ADD PRIMARY KEY (`int_id_testTimoni`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`int_idToken`),
  ADD UNIQUE KEY `vc_notel` (`vc_notel`),
  ADD UNIQUE KEY `vc_notel_2` (`vc_notel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `un_user` (`un_user`),
  ADD UNIQUE KEY `vc_nik` (`vc_nik`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `id_struktural` (`id_struktural`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `int_idAuthorization` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `int_idPertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jenisoperasi`
--
ALTER TABLE `tb_jenisoperasi`
  MODIFY `int_idJenisOperasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_operasi`
--
ALTER TABLE `tb_operasi`
  MODIFY `int_idOperasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_testtimoni`
--
ALTER TABLE `tb_testtimoni`
  MODIFY `int_id_testTimoni` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `int_idToken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tb_operasi`
--
ALTER TABLE `tb_operasi`
  ADD CONSTRAINT `tb_operasi_ibfk_1` FOREIGN KEY (`int_jenisOperasi`) REFERENCES `tb_jenisoperasi` (`int_idJenisOperasi`),
  ADD CONSTRAINT `tb_operasi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_struktural`) REFERENCES `struktural` (`id_struktural`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
