-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 03:23 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bprdelta`
--

-- --------------------------------------------------------

--
-- Table structure for table `depositos`
--

CREATE TABLE `depositos` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manfaat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depositos`
--

INSERT INTO `depositos` (`id`, `keterangan`, `manfaat`, `banner`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Deposito merupakan dana masyarakat yang ditempatkan di bank dengan jangka waktu tertentu, yaitu satu bulan, tiga bukan, enam bulan dan dua belas bulan.</p>', '<ol>\r\n	<li>Memperoleh pendapatan tambahan dari bunga Deposito</li>\r\n	<li>Dapat dipergunakan sebagai agunan kredit</li>\r\n	<li>Jangka waktu Deposito dapat disesuaikan dengan rencana kebutuhan</li>\r\n	<li>Dengan menempatkan dana Deposito di BPR, berarti Anda ikut membangun daerah sendiri</li>\r\n	<!-- <li>Bunga Deposito umumnya lebih menarik</li> -->\r\n	<li>Memiliki jangka waktu tertentu sesuai dengan kesepakatan, hingga terhindar dari penggunaan dana yang tidak terencana</li>\r\n	<li>Deposito BPR juga dijamin oleh Lembaga Penjamin Simpanan(LPS), sesuai ketentuan dan persyaratan yang berlaku</li>\r\n</ol>', '1deposito.jpg', 1, NULL, '2021-05-01 13:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambardokumens`
--

CREATE TABLE `gambardokumens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokumen_id` int(10) UNSIGNED NOT NULL,
  `extension` enum('jpg','jpeg','png') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambarposts`
--

CREATE TABLE `gambarposts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `extension` enum('jpg','jpeg','png') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambarposts`
--

INSERT INTO `gambarposts` (`id`, `created_at`, `updated_at`, `post_id`, `extension`) VALUES
(1, '2021-05-01 09:49:52', '2021-05-01 09:49:52', 1, 'jpg'),
(2, '2021-05-01 11:03:00', '2021-05-01 11:03:00', 2, 'png');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `banner`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'fotodepan.jpg', 1, NULL, NULL),
(2, 'fotodepan.jpg', 1, NULL, NULL),
(3, 'fotodepan.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kredits`
--

CREATE TABLE `kredits` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_pengajuan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kredits`
--

INSERT INTO `kredits` (`id`, `keterangan`, `syarat_pengajuan`, `banner`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit.Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobo rtis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit.</p>', '<ol>\r\n	<li>Fotokopi KTP Suami-Istri</li>\r\n	<li>Usia Minimum 21 tahun, atau sudah menikah dan maksimum 60 tahun pada saat kredit lunas</li>\r\n	<li>Kartu Keluarga dan surat nikah</li>\r\n	<li>Fotokopi Rekening listrik / telepon</li>\r\n	<li>Fotokopi jaminan</li>\r\n</ol>', '1kredit.jpg', 1, NULL, '2021-05-01 13:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_05_13_144627_create_dokumens_table', 1),
(3, '2020_05_13_145033_create_posts_table', 1),
(4, '2020_05_13_145417_create_gambar_dokumens_table', 1),
(5, '2020_05_13_145712_create_gambar_posts_table', 1),
(6, '2020_05_13_145830_alter_posts_table', 1),
(7, '2020_05_13_150049_alter_dokumens_table', 1),
(8, '2020_05_15_095225_alter_gambar_posts_table', 1),
(9, '2020_05_15_101819_alter_gambar_dokumens_table', 1),
(12, '2021_05_01_065603_create_depositos_table', 2),
(13, '2021_05_01_070424_create_tabungans_table', 2),
(14, '2021_05_01_074810_create_kredits_table', 2),
(15, '2021_05_01_074941_create_typetabungans', 2),
(16, '2021_05_01_075036_create_typekredits_table', 2),
(17, '2021_05_01_120107_create_homes_table', 3),
(18, '2021_05_02_002725_create_tentangs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `judul`, `deskripsi`, `tanggal`, `user_id`) VALUES
(1, '2021-05-01 09:49:52', '2021-05-01 12:38:17', 'Berita_1', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '2021-05-01 19:38:17', 1),
(2, '2021-05-01 11:03:00', '2021-05-01 11:03:00', 'Berita 2', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', '2021-05-01 18:03:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabungans`
--

CREATE TABLE `tabungans` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manfaat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_orang` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_perusahaan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabungans`
--

INSERT INTO `tabungans` (`id`, `keterangan`, `manfaat`, `syarat_orang`, `syarat_perusahaan`, `banner`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Tabungan adalah simpanan yang penarikannya hanya dapat dilakukan menurut syarat tertentu yang disepakati, tetapi tidak dapat ditarik dengan cek, bilyet giro, dan /atau alat lainnya yang dipersamakan dengan itu.</p>', '<ol>\r\n	<li>Suku bunga tabungan BPR kompetitif dan menarik.</li>\r\n	<li>Biaya administrasi ringan.</li>\r\n	<li>Jaringan kantor BPR tersebar dari kota hingga ke desa.</li>\r\n	<li>Saldo minimum tabungan rendah dan setoran selanjutnya juga kecil.</li>\r\n	<li>Tabungan di BPR dapat digunakan sebagai agunan kredit.</li>\r\n	<li>Layanan jemput bola oleh petugas BPR sehingga tidak perlu repot mendatangi kantor BPR.</li>\r\n	<li>Tabungan di BPR dijamin oleh Lembaga Penjamin Simpanan (LPS) sesuai dengan ketentuan dan persyaratan yang berlaku.</li>\r\n</ol>', '<ol>\r\n	<li>Membawa KTP / SIM / Passport asli yang masih berlaku</li>\r\n	<li>Bunga dikenakan pajak sesuai ketentuan yang berlaku</li>\r\n	<li>Tingkat suku bunga dan biaya dapat berubah sewaktu-waktu</li>\r\n</ol>', '<ol>\r\n	<li>Membawa KTP / SIM / Passport pejabat yang berwenang</li>\r\n	<li>Membawa SIUP, NPWP, Akta Pendirian Perusahaan dan perubahan terakhir</li>\r\n	<li>Bunga dikenakan pajak sesuai ketentuan yang berlaku</li>\r\n	<li>Tingkat suku bunga dan biaya dapat berubah sewaktu-waktu</li>\r\n</ol>', '1tabungan.jpg', 1, NULL, '2021-05-01 13:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `tentangs`
--

CREATE TABLE `tentangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentangs`
--

INSERT INTO `tentangs` (`id`, `sejarah`, `visi`, `misi`, `thumb1`, `thumb2`, `banner`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies pellentesque mauris a elementum. Cras eu ornare turpis. Morbi id maximus lorem. Duis leo sapien, accumsan ves tibulum massa sit amet, sollicitudin euismod libero. Aliquam mollis ipsum eget nulla pulvinar, a fringilla urna consectetur.</p>', '<p>Menjadi BPR yang profesional, Tangguh dan Terpercaya dengan selalu mengutamakan kepuasan nasabah dari segi pelayanan.</p>', '<ol>\r\n	<li>Menjalankan aktivitas BPR yang unggul dengan mengutamakan pelayanan kepada Usaha Mikro, kecil, menengah untuk menunjang peningkatan ekonomi rakyat kecil.</li>\r\n	<li>Memberikan pelayanan prima kepada nasabah melalui jaringan kerja yang didukung oleh organisasi, manajemen dan sumber daya yang profesional, tangguh dan terpercaya.</li>\r\n	<li>Memberikan keuntungan dan manfaat yang optimal kepada pemegang saham, karyawan, nasabah dan pemerintah.</li>\r\n	<li>Menyediakan dan Mengembangkan pelayanan keuangan yang inovatif, berkualitas dan melebihi harapan masyarakat yang dinamik dengan hasil terbaik.</li>\r\n	<li>Membina jaringan kerjasama saling menguntungkan yang dilandasi rasa saling percaya.</li>\r\n</ol>', '1tentangthumb1.jpg', '1tentangthumb2.jpg', '1tentang.jpg', 1, NULL, '2021-05-01 18:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `typekredits`
--

CREATE TABLE `typekredits` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kredit_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typekredits`
--

INSERT INTO `typekredits` (`id`, `nama`, `keterangan`, `gambar`, `kredit_id`, `created_at`, `updated_at`) VALUES
(1, 'Kredit Modal Kerja', '<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo yee</p>', '1typekredit.jpg', 1, NULL, '2021-05-01 17:46:30'),
(2, 'Kredit Kepemilikan Mobil dan Motor', 'Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo', 'system_2.jpg', 1, NULL, NULL),
(3, 'Kredit Pendidikan', 'Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo', 'system_1.jpg', 1, NULL, NULL),
(4, 'Kredit Multiguna', 'Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo', 'system_2.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typetabungans`
--

CREATE TABLE `typetabungans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabungan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typetabungans`
--

INSERT INTO `typetabungans` (`id`, `nama`, `keterangan`, `gambar`, `tabungan_id`, `created_at`, `updated_at`) VALUES
(1, 'Tabungan Arta Abadi', '<ol>\r\n	<li>Setoran awal Rp. 50.000,-.</li>\r\n	<li>Suku bunga Tabungan Artha Abadi sangat menarik dan kompetitif menjadikan uang Anda lebih cepat berkembang.</li>\r\n	<li>Bunga dihitung berdasarkan saldo rata-rata harian dalam satu bulan.</li>\r\n	<li>Tidak ada biaya administrasi bulanan sehingga tidak akan mengurangi jumlah uang Anda. Jika dalam setahun tidak terdapat mutasi setoran ataupun tarikan dalam setahun akan dikenakan biaya administrasi sebesar Rp. 2.500,00</li>\r\n</ol>', '1typetabungan.jpg', 1, NULL, '2021-05-01 17:14:31'),
(2, 'Tabungan Arta Mulia Abadi', '<ol>\r\n								<li class=\"info_text\">Setoran awal Rp. 25.000,-.</li>\r\n								<li class=\"info_text\">Suku bunga Tabungan Artha Mulia Abadi sangat menarik dan kompetitif menjadikan uang Anda lebih cepat berkembang.</li>\r\n								<li class=\"info_text\">Bunga dihitung berdasarkan saldo rata-rata harian dalam satu bulan.</li>\r\n								<li class=\"info_text\">Tidak ada biaya administrasi bulanan sehingga tidak akan mengurangi jumlah uang Anda. Jika dalam setahun tidak terdapat mutasi setoran ataupun tarikan dalam setahun akan dikenakan biaya administrasi sebesar Rp. 2.500,00</li>\r\n							</ol>', 'system_2.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_handphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `no_handphone`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pegawai 1', 'pegawai1', '11111111111', '$2y$12$UnMKtxKaw2YN4LUf/VB5IO2PkyXkoJyYIUJDqlB7DuF4eJEJVaCUe', 1, NULL, NULL, NULL),
(2, 'Nasabah 1', 'nasabah1', '081111111111', '$2y$10$eWr9c.cAK36bxM.U.p.jf.QuXUGIaSPmtvdmqti3SV7l1iE0e/d7m', 0, NULL, '2021-05-01 10:01:06', '2021-05-01 10:01:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depositos_user_id_foreign` (`user_id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumens_user_id_foreign` (`user_id`);

--
-- Indexes for table `gambardokumens`
--
ALTER TABLE `gambardokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambardokumens_dokumen_id_foreign` (`dokumen_id`);

--
-- Indexes for table `gambarposts`
--
ALTER TABLE `gambarposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambarposts_post_id_foreign` (`post_id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homes_user_id_foreign` (`user_id`);

--
-- Indexes for table `kredits`
--
ALTER TABLE `kredits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kredits_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `tabungans`
--
ALTER TABLE `tabungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabungans_user_id_foreign` (`user_id`);

--
-- Indexes for table `tentangs`
--
ALTER TABLE `tentangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tentangs_user_id_foreign` (`user_id`);

--
-- Indexes for table `typekredits`
--
ALTER TABLE `typekredits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typekredits_kredit_id_foreign` (`kredit_id`);

--
-- Indexes for table `typetabungans`
--
ALTER TABLE `typetabungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typetabungans_tabungan_id_foreign` (`tabungan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambardokumens`
--
ALTER TABLE `gambardokumens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambarposts`
--
ALTER TABLE `gambarposts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kredits`
--
ALTER TABLE `kredits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabungans`
--
ALTER TABLE `tabungans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tentangs`
--
ALTER TABLE `tentangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typekredits`
--
ALTER TABLE `typekredits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typetabungans`
--
ALTER TABLE `typetabungans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `depositos`
--
ALTER TABLE `depositos`
  ADD CONSTRAINT `depositos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD CONSTRAINT `dokumens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gambardokumens`
--
ALTER TABLE `gambardokumens`
  ADD CONSTRAINT `gambardokumens_dokumen_id_foreign` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumens` (`id`);

--
-- Constraints for table `gambarposts`
--
ALTER TABLE `gambarposts`
  ADD CONSTRAINT `gambarposts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `homes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kredits`
--
ALTER TABLE `kredits`
  ADD CONSTRAINT `kredits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tabungans`
--
ALTER TABLE `tabungans`
  ADD CONSTRAINT `tabungans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tentangs`
--
ALTER TABLE `tentangs`
  ADD CONSTRAINT `tentangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `typekredits`
--
ALTER TABLE `typekredits`
  ADD CONSTRAINT `typekredits_kredit_id_foreign` FOREIGN KEY (`kredit_id`) REFERENCES `kredits` (`id`);

--
-- Constraints for table `typetabungans`
--
ALTER TABLE `typetabungans`
  ADD CONSTRAINT `typetabungans_tabungan_id_foreign` FOREIGN KEY (`tabungan_id`) REFERENCES `tabungans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
