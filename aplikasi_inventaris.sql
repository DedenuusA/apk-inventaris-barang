-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 16.59
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjamans`
--

CREATE TABLE `detail_pinjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `pinjaman_id` int(11) DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pinjamans`
--

INSERT INTO `detail_pinjamans` (`id`, `perusahaan_id`, `pinjaman_id`, `item_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(93, NULL, 54, 95, 20, '2023-08-28 06:01:34', '2023-08-28 06:01:34'),
(94, NULL, 54, 96, 10, '2023-08-28 06:01:34', '2023-08-28 06:01:34'),
(95, NULL, 54, 97, 20, '2023-08-28 06:01:34', '2023-08-28 06:01:34'),
(96, NULL, 54, 98, 10, '2023-08-28 06:01:34', '2023-08-28 06:01:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `perusahaan_id`, `kategori_id`, `nama_item`, `deskripsi`, `stok`, `created_at`, `updated_at`, `sisa`) VALUES
(95, 7, 24, 'wismilak kretek 12', 'ball', 300, '2023-08-28 05:49:22', '2023-08-30 07:51:45', 280),
(96, 7, 24, 'wismilak slim 16 kretek', 'ball', 400, '2023-08-28 05:49:54', '2023-08-30 07:51:46', 390),
(97, 7, 24, 'wismilak satya 12 kretek', 'ball', 500, '2023-08-28 05:50:21', '2023-08-30 07:51:46', 480),
(98, 7, 24, 'diplomat 12 filter', 'ball', 200, '2023-08-28 05:50:52', '2023-08-30 07:51:46', 190),
(99, 7, 24, 'diplomat 16 filter', 'ball', 300, '2023-08-28 05:51:28', '2023-08-30 07:51:46', 300),
(100, 7, 24, 'diplomat mild 16', 'ball', 100, '2023-08-28 05:51:47', '2023-08-30 07:51:46', 100),
(101, 7, 24, 'diplomat mild menthol 16', 'ball', 150, '2023-08-28 05:52:10', '2023-08-30 07:51:46', 150),
(102, 7, 24, 'diplomat evo 16', 'ball', 600, '2023-08-28 05:52:41', '2023-08-30 07:51:46', 600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `perusahaan_id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(24, 7, 'rokok', '2023-08-28 05:48:54', '2023-08-28 05:48:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_25_082427_create_kategoris_table', 1),
(6, '2023_06_25_082428_create_items_table', 1),
(7, '2023_06_25_082718_create_pesanans_table', 1),
(8, '2023_06_25_084113_create_detail_pesanans_table', 1),
(9, '2023_07_16_075258_add_sisa_in_items_table', 1),
(10, '2023_08_09_120426_create_perusahaans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama`, `email`, `no_tlp`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 'AGRIAKU DIGITAL INDONESIA', 'cs@agriaku.com', '081235647891', 'Grogol petamburan, West Jakarta City, Jakarta 11470', '2023-08-11 00:25:30', '2023-08-11 00:25:30'),
(7, 'GAWIH JAYA', 'gawih@gmail.com', '081237584651', 'jalan pulasaren kota cirebon', '2023-08-11 00:28:30', '2023-08-11 00:28:30'),
(8, 'LEX', 'lex@gmail.com', '081222445336', 'kota bandung jawa barat', '2023-08-11 00:30:24', '2023-08-11 00:30:24'),
(9, 'BAYER INDONESIA ( FARMASI )', 'bayer@bayer.com', '081333226744', 'Jl. Jend. Sudirman Kav. 5-6. Jakarta 10220, Indonesia', '2023-08-11 00:32:10', '2023-08-11 05:29:50'),
(10, 'BCAMF', 'bcamf@gmail.com', '081222334455', 'Gedung WTC Jl. Mangga Dua Raya. 8 Lantai 6, Blok CL 001, RT.CL, RW.5, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430', '2023-08-11 00:33:17', '2023-08-11 00:33:17'),
(11, 'KREDIT PINTAR', 'kreditpi@kredit.com', '081224488221', 'Jl. Jenderal Sudirman No.52-53, RT.5/RW.3, Senayan, Kebayoran Baru, South Jakarta City, Jakarta 12190', '2023-08-11 00:34:35', '2023-08-11 05:30:39'),
(12, 'MANUVA', 'manuva@gmail.com', '081444332226', 'RT.5/RW.3, Senayan, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12190', '2023-08-11 00:39:10', '2023-08-11 00:39:10'),
(13, 'PAPANDAYAN COCOA INDUSTRIES', 'papandaya@gmail.com', '081556664328', 'Jl. Mengger, Pasawahan, Kec. Dayeuhkolot, Bandung, Jawa Barat 40256, Indonesia, Kota Bandung.', '2023-08-11 00:43:01', '2023-08-11 00:43:01'),
(14, 'SONY ELEKTRONIC', 'sony@sony.com', '081777444228', 'Jl. Jend. Sudirman No. 28 Jakarta 10210, Indonesia.', '2023-08-11 00:44:54', '2023-08-11 05:31:04'),
(15, 'ADIRA FINANCE', 'adira@adira.com', '081553622878', 'Jl. Jend. Sudirman No.Kav 25, Kuningan, Karet, Setia Budi', '2023-08-11 00:46:18', '2023-08-11 05:31:40'),
(16, 'BAYER INDONESIA ( INDUSTRI PERTANIAN )', 'bayeri@bayer.com', '081555663347', 'Jl. Jend. Sudirman Kav. 5-6. Jakarta 10220,', '2023-08-11 00:48:06', '2023-08-11 05:32:16'),
(17, 'INTEGRASI LOGISTIK CIPTA SOLUSI', 'integrasi@logistik.com', '084111778345', 'Jalan Laksamana Yos Sudarso No.23 - 24, RT.16/RW.6, Kb. Bawang, Jakarta Utara, Jkt Utara, Daerah Khusus Ibukota Jakarta 14320', '2023-08-11 00:49:41', '2023-08-11 00:49:41'),
(18, 'PERFETTI VAN MELLE', 'perfetti@melle.com', '82314555620', 'Jl Raya Bogor Km 47,4,Nanggewer,Cibinong, CIBINONG 16912, Cibinong, Java, Indonesia', '2023-08-11 00:51:10', '2023-08-11 00:51:10'),
(19, 'PT SWIKARYA INSAN MANDIRI', 'customer.group@sim.co.id', '081211110071', 'Jl. Kebagusan raya No. 18, RT 01 RW 07,\r\nPasar Minggu, Kota Administrasi,\r\nJakarta Selatan 12520', '2023-08-23 19:07:33', '2023-08-23 19:07:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamans`
--

CREATE TABLE `pinjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pinjamans`
--

INSERT INTO `pinjamans` (`id`, `perusahaan_id`, `user_id`, `tanggal_pinjaman`, `tanggal_pengembalian`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(54, 7, 32, '2023-08-28', '1970-01-01', '', 'menunggu_respon', '2023-08-28 06:01:34', '2023-08-28 06:01:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','karyawan','pimpinan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'karyawan',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `perusahaan_id`, `name`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `no_tlp`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 7, 'muhammad teguh', 'teguh@gmail.com', NULL, '$2y$10$qPZGtSMsypp6Eieey5.OBuNrpaCTKkdzqLDLFlq.9WJi.hrbD.kf6', 'laki-laki', '087452132882', 'Jln. Bedeng Batu – Kel. Pekiringan – Kec. Kesambi – CIREBON 45131.', 'pimpinan', NULL, '2023-08-11 00:59:50', '2023-08-11 05:00:43'),
(11, 6, 'hidayatul mustopa', 'hidayah@gmail.com', NULL, '$2y$10$3dfy8U6hxnMEv.Sup8BOx.wYVxMndgYIWaEEQRQweaA8Vz3BE/Eqm', 'laki-laki', '083773311548', 'Jl. KH Agus Salim 16, Sabang, Menteng Jakarta Pusat', 'pimpinan', NULL, '2023-08-11 01:01:37', '2023-08-11 01:07:12'),
(12, 8, 'rere dimas erlangga', 'rere@gmail.com', NULL, '$2y$10$UXCAnWb9uZJPLU.M3/aNRurGhXCYqDAJgAWH53b7ESm0vwp0r2iqm', 'laki-laki', '082551117253', 'Bandung Kidul: Jl. Batununggal No.3, Mengger / 753-1377', 'pimpinan', NULL, '2023-08-11 01:02:57', '2023-08-11 01:08:41'),
(13, 10, 'faizal fuad', 'faizal@gmail.com', NULL, '$2y$10$jAFq7lEFg.x7jqKcw9MbPeL7x0qEe9E6G3SZK31IWM4kp6v2Mztx.', 'laki-laki', '082666222164', 'Jl. Taman Margasatwa No. 12, Warung Buncit, Jakarta Selatan\r\nTelepon: 021-7802366', 'pimpinan', NULL, '2023-08-11 01:04:51', '2023-08-11 01:10:51'),
(14, 7, 'gilang fajar', 'gilang@gmail.com', NULL, '$2y$10$rAE8HVsxRI9dja57rrImAOExqYYUfGWGzQn9f6df2ZChUuoJFCJOK', 'laki-laki', '082111445644', 'Jln. Pembangunan – Kel. Pekiringan – Kec. Kesambi – CIREBON.', 'karyawan', NULL, '2023-08-11 01:12:48', '2023-08-11 01:12:48'),
(15, 7, 'eki suganda', 'eki@gmail.com', NULL, '$2y$10$hx9vO6GQcSINYyQjUVzEH.MwvNED4a.S6IItzphfzKLcvLZn6W8ly', 'laki-laki', '082226644551', 'Jln. Pemuda, – Kel. Pekiringan – Kec. Kesambi – CIREBON.', 'karyawan', NULL, '2023-08-11 02:29:57', '2023-08-11 02:29:57'),
(16, 7, 'muhammad agus budiman', 'budiman@gmail.com', NULL, '$2y$10$sbBonU08XgQ7EGKkvh9yDu2ON9DXKBvI3SfGQ1k.p8jpn0TcaV4AK', 'laki-laki', '082554447896', 'Jln. Satria Ujung – Kel. Pekiringan – Kec. Kesambi – CIREBON.', 'pimpinan', NULL, '2023-08-11 02:31:16', '2023-08-11 05:01:09'),
(18, 7, 'muhammad agus budiman', 'agus@gmail.com', NULL, '$2y$10$0UTY6aRvWNhWAg.1KJzrJeQjqRSiiTblWgDYO2hVCofEwLclyeA2y', 'laki-laki', '082554447896', 'Jln. Satria Ujung – Kel. Pekiringan – Kec. Kesambi – CIREBON.', 'karyawan', NULL, '2023-08-11 02:31:49', '2023-08-11 02:31:49'),
(19, 7, 'ade nana nuryana', 'ade@gmail.com', NULL, '$2y$10$5yAxJdUWfINAHekK94cISOb6unWlWRnmpgLno/xfDk/0oVYCqY91u', 'laki-laki', '087851954214', 'Jln. Ampera I – Kel. Pekiringan – Kec. Kesambi – CIREBON.', 'karyawan', NULL, '2023-08-11 02:33:10', '2023-08-11 02:33:10'),
(20, 8, 'agung nugroho', 'nugroho@gmail.com', NULL, '$2y$10$y/sGL.9gXA.q0eyUn77eFOCHhjAn/XmT5boTQa84EzyHyOLtaU5su', 'laki-laki', '087548987449', 'JL. Tebet Raya No. 84, Tebet, Jakarta Selatan Telepon: 021-8311316', 'pimpinan', NULL, '2023-08-11 02:37:19', '2023-08-11 05:01:50'),
(21, 8, 'saprul prasetia', 'saprul@gmail.com', NULL, '$2y$10$8HNoLBLv3rDLR4bSx713zefyMeFNb2S8kRXi0n0gVe6L50k3D9uF.', 'laki-laki', '087895884124', 'Jl. Metro Pondok Indah Kav. IV, Kebayoran Lama, Jakarta Selatan', 'karyawan', NULL, '2023-08-11 02:41:37', '2023-08-11 02:41:37'),
(22, 8, 'aip saripudin', 'aip@gmail.com', NULL, '$2y$10$WxnQR2pPC6RB4HYKVGtyueGZHh87nadmoviFv1kuMBEnLQqOFltu.', 'laki-laki', '087488564158', 'Antapani: Jl. A H Nasution No. 14, Jatihandap / 727-1129', 'karyawan', NULL, '2023-08-11 02:43:42', '2023-08-11 02:43:42'),
(23, 10, 'mustopa', 'mustopa@gmail.com', NULL, '$2y$10$ktqvNksrtlinrhsHk5CstOuuDtLJD7fvrlxnxO04Lh7IJp7Xhf5AW', 'laki-laki', '087455124587', 'Jl. KH. Agus Salim No. 29A Jakarta Pusat. Telepon: 021-31935668', 'karyawan', NULL, '2023-08-11 02:45:12', '2023-08-11 02:45:12'),
(24, 10, 'gusti siswanto', 'siswanto@gmail.com', NULL, '$2y$10$mdmaRqeaOn9hzBtbupiRMus1lD1OXVJQ6t3UI2PbnSZd9KCO4Iv4.', 'laki-laki', '081545654787', 'Jl. Hos Cokroaminoto, No. 84, Menteng Jakarta Pusat.\r\nTelepon: 021-3907857', 'karyawan', NULL, '2023-08-11 02:46:11', '2023-08-11 05:02:14'),
(25, 10, 'krisno teguh', 'steguh@gmail.com', NULL, '$2y$10$VCQQB5EE5JVWg7zXvi/WW.K7UcmcPCEcAYg.UV/R95xu0jUDpgAeO', 'laki-laki', '087858945878', 'Alamat Jl. Ahmad Dahlan/ Jl. Bacang I No.2 Jakarta Selatan', 'karyawan', NULL, '2023-08-11 02:47:34', '2023-08-11 05:02:52'),
(26, 10, 'diky sahyudin', 'diky@gmail.com', NULL, '$2y$10$WXCqsUoezleT8Rv9r.9E6.hVW3jY4R19diA8p2YKjrXopsyNCJlX6', 'laki-laki', '081545654782', 'Jl. Benda No. 20D, Kemang Jakarta Selatan', 'karyawan', NULL, '2023-08-11 02:48:56', '2023-08-11 02:48:56'),
(27, 8, 'mohammad slamet', 'slamet@gmail.com', NULL, '$2y$10$AqvPFHSRCxJep12IjtJYMe4g0WDxsxZ/BMrct7J.mvbtvY/47xvyi', 'laki-laki', '081845628795', 'Astana Anyar: Jl. Bojongloa No.69 / 520-0419 bandung', 'karyawan', NULL, '2023-08-11 02:50:08', '2023-08-11 02:50:08'),
(28, 8, 'taufan', 'taufan@gmail.com', NULL, '$2y$10$IvtSAX8PPYcTM1zDFqTYNONA9gOJGjedAZdoR8tIONARPykRvdurm', 'laki-laki', '081898745684', 'Babakan Ciparay: Jl. Babakan Ciparay No. 212 / 601-5723', 'karyawan', NULL, '2023-08-11 03:03:38', '2023-08-11 03:03:38'),
(29, 8, 'fadly agung wahyuda', 'fadly@gmail.com', NULL, '$2y$10$Ce1cFutkcsmLAfytt8ONTO.dNshLm/2fwUAG2dkD4SzC77Y3nc6lS', 'laki-laki', '087456325487', 'Bandung Wetan: l. Tamansari No.49, Lb. Siliwangi / 25007166', 'karyawan', NULL, '2023-08-11 03:04:43', '2023-08-11 03:04:43'),
(30, 7, 'deden uus aprianto', 'deden@gmail.com', NULL, '$2y$10$BCmR.vgjpSeRO8jyrifXYOpbyOUrKM08hWePgpwx8raA81bmZ.Zn2', 'laki-laki', '087829888329', 'Jalan Raya Prapatan Rajagaluh', 'karyawan', NULL, '2023-08-11 03:05:18', '2023-08-11 03:05:18'),
(31, 7, 'faisal gunawan', 'faisal@gmail.com', NULL, '$2y$10$rhakd0hgvi0CxufhTDeAau5mAaIQ4oQIQ25qqUrMeMzVysXycDdFy', 'laki-laki', '087845611547', 'jatiwangi kab majalengka', 'karyawan', NULL, '2023-08-11 03:06:18', '2023-08-11 03:06:18'),
(32, 7, 'Amanda Tan', 'amanda@gmail.com', NULL, '$2y$10$xMDJX6QQ3/ogBKcnsz8BZeqwrT4IDD0stcYJjt3xi5Opba2aBAuo6', 'perempuan', '087328888123', 'JL. Pramuka No.1, Kalijaga, Harjamukti, Kota Cirebon, Jawa Barat 45144.', 'karyawan', NULL, '2023-08-21 06:27:42', '2023-08-21 06:27:42'),
(33, 7, 'Budi Santoso', 'budi@gmail.com', NULL, '$2y$10$WgrLq.xRWg8ghsnqr0xGruMPibShayV5DTFcyfplt8muCJGPBEnVO', 'laki-laki', '087328563264', 'l. Lemah Wungkuk No.123, Lemahwungkuk, Kota Cirebon, Jawa Barat 45111, Indonesia', 'karyawan', NULL, '2023-08-21 06:32:12', '2023-08-21 06:32:12'),
(36, 7, 'Lukman Hakim', 'lukman@gmail.com', NULL, '$2y$10$iVmLenIF1UY.oR1Hcj.HpOY1Ei2dzSkxp65Xpl80iLq7edHGYE4Fe', 'laki-laki', '087256341762', 'Jl. Samadikun No. 3A Cirebon kode pos 45121', 'karyawan', NULL, '2023-08-21 09:17:12', '2023-08-21 09:17:12'),
(37, 6, 'Maya Malik', 'malik@gmail.com', NULL, '$2y$10$Mry0AOjY7qQSp5.UrxvawO2y62sdQtKET0SIvECNw8Tu/zjuGA2ZO', 'laki-laki', '087453271623', 'Jl. Fajar Baru Utara No.16A', 'karyawan', NULL, '2023-08-21 09:30:37', '2023-08-21 09:30:37'),
(38, 6, 'Salman Khan', 'salman@gmail.com', NULL, '$2y$10$odLF2QEuw/mwQoalFmZRcuJL1eXo1bYdVmU3/9lF5jBaaV53CPMJK', 'laki-laki', '087326538732', 'Jl. Joglo Raya No.1', 'karyawan', NULL, '2023-08-21 09:38:05', '2023-08-21 09:38:05'),
(39, 7, 'Umar Abdullah', 'umar@gmail.com', NULL, '$2y$10$o2YtmQV6TTTq105pUTH1b.B2lyw4FfPrvzYRDq2oosXchffdAgpRK', 'laki-laki', '089234128764', 'Jl. Dr. Cipti Mangun Kusumo Cirebon kode 45131', 'karyawan', NULL, '2023-08-21 09:44:09', '2023-08-21 09:44:09'),
(40, 19, 'santi', 'santi@gmail.com', NULL, '$2y$10$JzPNl9BsMxI2MNX/btFO9e5rsRtQY0SfIPMRfNpouy3PtoVrEreo.', 'perempuan', '087329666251', 'JL. KH. Mas Mansyur No. 17 Tanah Abang Jakarta Pusat, Kebon Kacang, Kec. Tanah Abang\r\nKota Jakarta Pusat', 'admin', NULL, '2023-08-23 19:12:23', '2023-08-23 19:30:19'),
(41, 14, 'Maya Malik', 'maya@gmail.com', NULL, '$2y$10$wb20/.MspzIoO1oKDmue7./efscLmhDKWZH7VDLqkLLOnn/Pxy9.u', 'perempuan', '087327634192', 'JL. MENTENG TENGGULUN NO. 17, Menteng, Kec. Menteng\r\nKota Jakarta Pusat', 'pimpinan', NULL, '2023-08-23 19:16:56', '2023-08-23 19:16:56'),
(42, 14, 'Eko Wahyudi', 'eko@gmail.com', NULL, '$2y$10$A3JhBA00wbmt/hVX8pO6HuokcRNHgPo2YeH4bcM2OCcR01Eij/lJO', 'laki-laki', '081543285473', 'JL. KALIBARU TIMUR V NO.104, Bungur, Kec. Senen\r\nKota Jakarta Pusat', 'karyawan', NULL, '2023-08-23 19:22:04', '2023-08-23 19:22:04'),
(43, 19, 'Fitriani Hidayat', 'fitriani@gmail.com', NULL, '$2y$10$XKX1x9w79cLMFPGH9hSOguMAqtvNzCnvCW7yRJrR8dCa3WYeClj2K', 'perempuan', '081563788824', 'BEND. JAGO, Kemayoran, Kec. Kemayoran\r\nKota Jakarta Pusat', 'admin', NULL, '2023-08-23 19:40:38', '2023-08-23 19:40:38'),
(44, 19, 'Puspita', 'puspita@gmail.com', NULL, '$2y$10$0zKIx5DDMlpLTCb1KZ.zJeVwm0KDeWDVZzktCov4GCa1eNjXrhmR6', 'laki-laki', '087327355624', 'JL. Taman Wijaya Kusuma, -, Kec. Sawah Besar\r\nKota Jakarta Pusat', 'admin', NULL, '2023-08-23 19:42:14', '2023-08-23 19:42:14'),
(45, 10, 'Adi Nugroho', 'adi@gmail.com', NULL, '$2y$10$St1t7ZXZaJO.3SX40OlIruvEKkHfiMvYhC5dmVRSLiUk3uZX/hCP2', 'laki-laki', '089145638883', 'Jalan Tanah Abang IV No.49, Rt.8/Rw.4, Petojo Selatan', 'karyawan', NULL, '2023-08-24 06:49:46', '2023-08-24 06:49:46'),
(46, 10, 'Ari Wijaya', 'ariwijaya@gmail.com', NULL, '$2y$10$U8h5SVvAHWa2o6MqPmihM.IO2RhRFi7HlR5wbjCGJQS3JeEAtGIcC', 'laki-laki', '087329347751', 'Jln. Cilandak Tengah I - Kel. Cilandak Barat - Kec. Cilandak - JAKARTA SELATAN', 'karyawan', NULL, '2023-08-24 06:52:14', '2023-08-24 06:52:14'),
(47, 10, 'Rizki Setiawan', 'rizki@gmail.com', NULL, '$2y$10$8gYNF80LXMvsQXzM6rpPp.FXP934ioQuMKeZactRw2i2iFlEA/SIW', 'laki-laki', '087327533561', 'Jln. Dasa Warno - Kel. Cilandak Barat - Kec. Cilandak - JAKARTA SELATAN', 'karyawan', NULL, '2023-08-24 06:54:23', '2023-08-24 06:54:23'),
(48, 10, 'Bayu Prabowo', 'bayu@gmail.com', NULL, '$2y$10$CWif.7mpmE.NVESIZj59z.6RMEPANSbOHQlJkdOhv5VA6.Tk7lIby', 'laki-laki', '087328553721', 'Jln. Deparlu I - IV - Kel. Cilandak Barat - Kec. Cilandak - JAKARTA SELATAN', 'karyawan', NULL, '2023-08-24 06:56:43', '2023-08-24 06:56:43'),
(49, 10, 'Rama Wijaya', 'ramawijaya@gmail.com', NULL, '$2y$10$kHwv3Xgyu0AM99SCEwOVzefez2HMYzbPLPcXD9z3RDLm74wOknABK', 'laki-laki', '082643788134', 'Jln. Deposito, - Kel. Cilandak - Kec. Cilandak - JAKARTA SELATAN', 'karyawan', NULL, '2023-08-24 06:58:24', '2023-08-24 06:58:24'),
(50, 8, 'Aditya Rahman', 'AdityaRahman@gmail.com', NULL, '$2y$10$6e4DYHufp.sWbYqej34vF.bZOlWqbASTwEZaeQguPV7Wsk4jd2QIa', 'laki-laki', '087328453321', 'JL. HAJI ALPI CIJERAH, Cibuntu, Kec. Bandung Kulon Kota Bandung', 'karyawan', NULL, '2023-08-24 07:26:50', '2023-08-24 07:26:50'),
(51, 8, 'Kusuma Wardhani', 'Kusuma@gmail.com', NULL, '$2y$10$h/Rdx9599sOw7w4DaK9nhOOXOSmbq5Y8XqNuf98VBORHXbmoQnCAO', 'laki-laki', '08145552623', 'JL. CIJERAH RAYA NO.151, Cibuntu, Kec. Bandung Kulon Kota Bandung', 'karyawan', NULL, '2023-08-24 07:29:30', '2023-08-24 07:29:30'),
(52, 8, 'Joko Sutomo', 'Joko@gmail.com', NULL, '$2y$10$lxNP01eJqh.9stobb0fyw.JMFDwY2HTkn1yPsjTbLW.U6a8e1OAgW', 'laki-laki', '087329444632', 'JL. K.H. WAHID HASYIM GG.SUKARMA BLK NO.19, -, Kec. Bojong Loa Kaler Kota Bandung', 'karyawan', NULL, '2023-08-24 07:33:04', '2023-08-24 07:33:04'),
(53, 6, 'Dedi Kurniawan', 'Dedi@gmail.com', NULL, '$2y$10$2wQ4p29iLC2Bd5v4VyFYS.gq9FCnOUSdIa6P6D0vjadE2jx0aWuPS', 'laki-laki', '089341664418', 'Jalan Mpok Nori (menggantikan Jalan Raya Bambu Apus,Jakarta Timur)', 'karyawan', NULL, '2023-08-24 07:59:49', '2023-08-24 07:59:49'),
(54, 6, 'Yoga Pratama', 'Yoga@gmail.com', NULL, '$2y$10$Dm7Zzmw12R378zmzJlFWCOysodBMSKVsyEW1JuKXSDaz25vdPoyre', 'laki-laki', '087327444981', 'Jalan H. Bokir bin Dji\'un (menggantikan Jalan Raya Pondok Gede segmen, Jakarta', 'karyawan', NULL, '2023-08-24 08:04:52', '2023-08-24 08:04:52'),
(55, 6, 'Dito Setiawan', 'Dito@gmail.com', NULL, '$2y$10$23M18IoTYDoby/Zba5L78OdgGH2v8kXZyQAqMzH7NQG8R1pXToofG', 'laki-laki', '081544773298', 'Jalan Haji Darip (menggantikan Jalan Bekasi Timur Raya, Jakarta Timur)', 'karyawan', NULL, '2023-08-24 08:08:11', '2023-08-24 08:08:11'),
(56, 6, 'Rina Susanto', 'Rina@gmail.com', NULL, '$2y$10$wAWDN/Osh/EkrUWxfihAjuqM31.3Y2tVis9YQ3RvF.WA2dI/iiwzG', 'laki-laki', '087329882551', 'Jalan Entong Gendut (menggantikan Jalan Budaya, Jakarta Timur)', 'karyawan', NULL, '2023-08-24 08:09:52', '2023-08-24 08:09:52'),
(57, 14, 'asep rahmadi', 'aseprahmadi@gmail.com', NULL, '$2y$10$I5Ie6yzszR2nNHXJPK2vi.5RkcWs3es7WE/bTwhSrgWMfHFauwQKK', 'laki-laki', '087329333648', 'Jl. Setiabudi Tengah No. 3, Jakarta Selatan 12910', 'karyawan', NULL, '2023-08-25 07:43:02', '2023-08-25 07:43:02'),
(58, 14, 'qudrat wihana', 'qudrat@gmail.com', NULL, '$2y$10$9YiMoNVAgxc6dvWY/HIVHeB7Cxkq5cSHD8J0uTxZLx0d0MwuUQQ4e', 'laki-laki', '081456686333', 'Jalan Tanah Abang IV No.49, Rt.8/Rw.4, Petojo Selatan, Gambir, Kecamatan Gambir, Kota Jakarta Pusat,', 'karyawan', NULL, '2023-08-25 07:44:52', '2023-08-25 07:44:52'),
(59, 14, 'dedi sudrajat', 'dedisudrajat@gmail.com', NULL, '$2y$10$N7BhjS678jTuvty95KacieuqC5/9OjE1Yp9LsCfuEHBrVeY1aF/Bm', 'laki-laki', '087329333664', 'Jalan Bonang No. 19. RT 2/RW 5 Menteng, Jakarta Pusat', 'karyawan', NULL, '2023-08-25 07:48:30', '2023-08-25 07:48:30'),
(60, 14, 'fadjar dewi', 'fadjar@gmail.com', NULL, '$2y$10$YcdQvCaOHC/6/w8mN2WpYuh0Q0p5PZU.4whwVcBN3A.ID/W7BcxVO', 'laki-laki', '089445576142', 'Jl. Danau Toba No.136, RT.14/RW.3, Bend. Hilir, Kecamatan Tanah Abang, Kota Jakarta Pusat', 'karyawan', NULL, '2023-08-25 07:50:32', '2023-08-25 07:50:32'),
(61, 14, 'sugeng prapto', 'sugeng@gmail.com', NULL, '$2y$10$giGAYCj4qHUcBdJbuE19rO9QDoGyGmL4lf1vqgxOc8YoSSqZpgmHC', 'laki-laki', '087329777342', 'Jalan Cempaka Putih Barat 19, RT 006 RW 011 No. 16 A, Jakarta Pusat', 'karyawan', NULL, '2023-08-25 08:01:48', '2023-08-25 08:01:48'),
(62, 14, 'asep nana rahmat', 'asepnana@gmail.com', NULL, '$2y$10$/Iw3.9plUQCnLrzR7a2TMObnjVPDOhNynaPH4HiVkFf0/SUtokgQu', 'laki-laki', '087329888345', 'Jl. Kartini III Dalam No.11A, Kartini, Kecamatan Sawah Besar, Kota Jakarta Pusat', 'karyawan', NULL, '2023-08-25 08:03:53', '2023-08-25 08:03:53'),
(63, 14, 'asep rahayu', 'aseprahayu@gmail.com', NULL, '$2y$10$v3AUhf1u9NjJ9rvEtq5xeOl4qEoFI0bggbX9NAV4mNSdofOLt5trS', 'laki-laki', '085321777231', 'jl Cempaka Raya Gang H Munasir III no 6 Cempaka Putih Barat Jakarta Pusat', 'karyawan', NULL, '2023-08-25 08:07:32', '2023-08-25 08:07:32'),
(64, 14, 'endi suhendi', 'endisuhendi@gmail.com', NULL, '$2y$10$AuxnlG9kD7DfUExJvKxJjucHG1DsJnzqD6QYaBlHbnlqqrI3hSeNi', 'laki-laki', '087329333667', 'Komplek Griya Agung Permai. Block B No 24 Jalan Letjen Suprapto, Jakarta Pusat', 'karyawan', NULL, '2023-08-25 08:11:59', '2023-08-25 08:11:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pinjamans`
--
ALTER TABLE `detail_pinjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pinjamans_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perusahaans_email_unique` (`email`);

--
-- Indeks untuk tabel `pinjamans`
--
ALTER TABLE `pinjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjamans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pinjamans`
--
ALTER TABLE `detail_pinjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pinjamans`
--
ALTER TABLE `pinjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pinjamans`
--
ALTER TABLE `detail_pinjamans`
  ADD CONSTRAINT `detail_pinjamans_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjamans`
--
ALTER TABLE `pinjamans`
  ADD CONSTRAINT `pinjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
