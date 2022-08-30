-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2022 pada 13.26
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Struktur dari tabel `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kd_masuk` bigint(20) DEFAULT NULL,
  `barang_masuk` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) NOT NULL,
  `berat` int(11) NOT NULL,
  `bayar` int(10) NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `foto_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`id_masuk`, `tanggal`, `kd_masuk`, `barang_masuk`, `tujuan`, `berat`, `bayar`, `pengirim`, `foto_masuk`) VALUES
(14, '2022-08-01', 250847, 'Beras', 'Jl. Cipto no 3', 15, 15000, 'able (08123456789)', '250847.jpg'),
(15, '2022-08-02', 912350, 'Telur', 'Kuningan , Cipondok', 50, 50000, 'sasa (085678945612)', '912350.jpg'),
(16, '2022-08-04', 396805, 'Kecap Manis', 'Jl. Penamparan no 8', 10, 10000, 'R (087946513205)', '396805.jpg'),
(17, '2022-08-04', 685302, 'Gula Pasir', 'Jl. Kembar no 23', 25, 25000, 'L (083197465812)', '685302.jpg'),
(20, '2022-08-16', 348570, 'Lemari', 'Perum', 50, 50000, 'Rudy (08132457896452)', '348570.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_terkirim`
--

CREATE TABLE `tbl_terkirim` (
  `id_terkirim` int(11) NOT NULL,
  `tgl_terkirim` date DEFAULT NULL,
  `kd_terkirim` bigint(20) DEFAULT NULL,
  `barang_terkirim` varchar(100) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `foto_penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_terkirim`
--

INSERT INTO `tbl_terkirim` (`id_terkirim`, `tgl_terkirim`, `kd_terkirim`, `barang_terkirim`, `penerima`, `foto_penerima`) VALUES
(10, '2022-08-03', 250847, 'Beras', 'A (021364798546)', '250847.png'),
(11, '2022-08-03', 912350, 'Telur', 'L (085727519422)', '912350.png'),
(12, '2022-08-04', 396805, 'Kecap Manis', 'B (021365654848)', '396805.png'),
(13, '2022-08-04', 685302, 'Gula Pasir', 'C (021345484946)', '685302.png'),
(17, '2022-08-18', 731864, 'Kasur', 'D', '731864.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(6, 'Lenny', 'lennycute01@gmail.com', NULL, '$2y$10$PYnh16c3urQvaB7T52H7s.0AHQ10giYtGmYLwfFDb5K6SGaXFM4wm', NULL, '2022-05-12 19:57:04', '2022-05-12 19:57:04', 1),
(7, 'CV. Dhea Kumala Sejati', 'DKS@gmail.com', NULL, '$2y$10$PBUXpZne5sVIRx.PtRVa5uXOWxpgUc5Kxgy87g.HGrp2kSOP9FjE6', NULL, '2022-07-09 00:03:09', '2022-07-09 00:03:09', 2),
(12, 'Lenny', 'lalalenn@gmail.com', NULL, '$2y$10$QTCSOZj4Gh./IXkLo3JZXulVoGORtShYBdFLefMgR0NM6Iw3/EOp.', NULL, '2022-08-16 19:36:49', '2022-08-16 19:36:49', 1),
(14, 'Rudi', 'rudi@gmail.com', NULL, '$2y$10$V5kbiKBgUbwRlT64v2Pdzu.cyGP048NT3xXh5ErTtwo9hcgGwUvlu', NULL, '2022-08-17 20:32:36', '2022-08-17 20:32:36', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `tbl_terkirim`
--
ALTER TABLE `tbl_terkirim`
  ADD PRIMARY KEY (`id_terkirim`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_terkirim`
--
ALTER TABLE `tbl_terkirim`
  MODIFY `id_terkirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
