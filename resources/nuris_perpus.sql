-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2020 pada 07.55
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuris_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` smallint(6) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `anggota_tipe_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `desa_id` bigint(20) UNSIGNED NOT NULL,
  `kode_pos` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `posel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `katasandi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_konfirmasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_anggota` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `anggota_nama`, `jenis_kelamin`, `tanggal_lahir`, `anggota_tipe_id`, `alamat`, `provinsi_id`, `kabupaten_id`, `kecamatan_id`, `desa_id`, `kode_pos`, `telepon`, `whatsapp`, `facebook`, `instagram`, `jurusan_id`, `kelas_id`, `posel`, `foto`, `katasandi`, `kode_konfirmasi`, `status_anggota`, `pembuatan`, `perubahan`) VALUES
(1, 'Dani', NULL, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'default.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_tipe`
--

CREATE TABLE `anggota_tipe` (
  `anggota_tipe_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_tipe_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota_tipe`
--

INSERT INTO `anggota_tipe` (`anggota_tipe_id`, `anggota_tipe_nama`, `pembuatan`, `perubahan`) VALUES
(1, 'Siswa', '2019-12-07 06:13:28', '2019-12-07 06:13:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `aturan_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_tipe_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `kali_pinjam` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `toleransi` int(11) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`aturan_id`, `anggota_tipe_id`, `jumlah`, `periode`, `kali_pinjam`, `denda`, `toleransi`, `pembuatan`, `perubahan`) VALUES
(1, 1, '3', 3, 3, 10000, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biblio`
--

CREATE TABLE `biblio` (
  `biblio_id` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edisi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penulis_id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `harga_buku` int(11) DEFAULT NULL,
  `penerbit_tahun` year(4) DEFAULT NULL,
  `penerbit_tempat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipekoleksi_id` bigint(20) UNSIGNED NOT NULL,
  `klasifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `lampiran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promosi` smallint(6) DEFAULT NULL,
  `publik` smallint(6) DEFAULT NULL,
  `panggil` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eksemplar` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_item_id` bigint(20) UNSIGNED NOT NULL,
  `sumber_item_id` bigint(20) UNSIGNED NOT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biblio`
--

INSERT INTO `biblio` (`biblio_id`, `judul`, `edisi`, `penulis_id`, `isbn`, `penerbit_id`, `harga_buku`, `penerbit_tahun`, `penerbit_tempat`, `deskripsi`, `tipekoleksi_id`, `klasifikasi_id`, `gambar`, `lampiran`, `promosi`, `publik`, `panggil`, `eksemplar`, `status_item_id`, `sumber_item_id`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Bahasa Indonesia', '2', 1, '234-897-98-8', 1, 89000, 2019, 'Jakarta', '-', 1, 1, '0', '0', NULL, 1, 'Anggur', 'Anggur11', 1, 3, 2, '2019-12-10 02:00:05', '2019-12-10 02:09:27'),
(2, 'Matematika', '2', 1, '234-897-98-8', 1, 89000, 2019, 'Jakarta', '-', 1, 1, '0', '0', NULL, 1, 'Anggur', 'Anggur12', 1, 3, 2, '2019-12-10 02:00:05', '2020-01-12 23:50:22'),
(3, 'Pemrograman Dasar', '2', 1, '234-897-98-8', 1, 89000, 2019, 'Jakarta', '-', 1, 1, '0', '0', NULL, 1, 'Anggur', 'Anggur13', 2, 3, 2, '2019-12-10 02:00:05', '2019-12-10 02:09:35'),
(4, 'Teknologi', '2', 1, '234-897-98-8', 1, 89000, 2019, 'Jakarta', '-', 1, 1, '0', '0', NULL, 1, 'Anggur', 'Anggur14', 2, 3, 1, '2019-12-10 02:00:05', '2019-12-10 02:00:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `desa_id` bigint(20) UNSIGNED NOT NULL,
  `desa_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`desa_id`, `desa_nama`, `kecamatan_id`, `kabupaten_id`, `provinsi_id`) VALUES
(1, 'Ciherang', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(1, 'RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`kabupaten_id`, `kabupaten_nama`, `provinsi_id`) VALUES
(1, 'Cianjur', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan_nama`, `kabupaten_id`, `provinsi_id`) VALUES
(1, 'Karang Tengah', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`, `jurusan_id`) VALUES
(1, 'XII RPL 1', 1),
(2, 'XII', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `klasifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `klasifikasi_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`klasifikasi_id`, `klasifikasi_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Teknologi', 1, '2019-12-09 23:57:34', '2019-12-09 23:57:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(67, '2014_10_12_000000_create_users_table', 1),
(68, '2014_10_12_100000_create_password_resets_table', 1),
(69, '2019_08_19_000000_create_failed_jobs_table', 1),
(70, '2019_11_15_143035_create_penerbit_table', 1),
(71, '2019_11_15_153013_create_penulis_table', 1),
(72, '2019_11_15_153059_create_tipekoleksi_table', 1),
(73, '2019_11_15_153118_create_klasifikasi_table', 1),
(74, '2019_11_15_153141_create_status_item_table', 1),
(75, '2019_11_15_153201_create_sumber_item_table', 1),
(76, '2019_11_15_153219_create_biblio_table', 1),
(77, '2019_11_15_170352_create_anggota_tipe_table', 1),
(78, '2019_11_16_023953_create_provinsi_table', 1),
(79, '2019_11_16_024159_create_kabupaten_table', 1),
(80, '2019_11_16_024346_create_kecamatan_table', 1),
(81, '2019_11_16_024433_create_desa_table', 1),
(82, '2019_11_16_024728_create_jurusan_table', 1),
(83, '2019_11_16_024926_create_kelas_table', 1),
(84, '2019_11_16_025045_create_anggota_table', 1),
(85, '2019_11_16_031617_create_aturan_table', 1),
(86, '2019_11_16_141427_create_status_sirkulasi_table', 1),
(87, '2019_11_16_151527_create_sirkulasi_table', 1),
(88, '2019_11_16_161627_create_pengaturan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `penerbit_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`penerbit_id`, `penerbit_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Telkom Informasi', 2, NULL, NULL),
(2, 'Telkomsel Infor', 1, NULL, NULL),
(3, 'Marisa Alimfor\r\n', 2, '2019-12-11 03:00:00', '2019-12-10 17:06:00'),
(4, 'ebook komunity', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `pengaturan_id` bigint(20) UNSIGNED NOT NULL,
  `tentang_kami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator` bigint(20) UNSIGNED NOT NULL,
  `operasional_awal` datetime DEFAULT NULL,
  `operasional_akhir` datetime DEFAULT NULL,
  `hak_cipta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `penulis_id` bigint(20) UNSIGNED NOT NULL,
  `penulis_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`penulis_id`, `penulis_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Doni Suhendar', 2, '2019-12-09 23:57:02', '2019-12-09 23:57:02'),
(2, 'Doni  Damara', 2, '2019-12-09 23:57:02', '2019-12-11 19:47:49'),
(3, 'Alfin Abdulloh S', 1, '2019-12-11 19:38:05', '2019-12-11 19:50:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `provinsi_nama`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sirkulasi`
--

CREATE TABLE `sirkulasi` (
  `sirkulasi_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `biblio_id` bigint(20) UNSIGNED NOT NULL,
  `aturan_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_pinjam` date DEFAULT NULL,
  `kembali_pinjam` date DEFAULT NULL,
  `perpanjangan` date DEFAULT NULL,
  `status_sirkulasi_id` bigint(20) UNSIGNED NOT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sirkulasi`
--

INSERT INTO `sirkulasi` (`sirkulasi_id`, `anggota_id`, `biblio_id`, `aturan_id`, `mulai_pinjam`, `kembali_pinjam`, `perpanjangan`, `status_sirkulasi_id`, `pembuatan`, `perubahan`) VALUES
(1, 1, 1, 1, '2019-12-18', '2019-12-23', '2019-12-23', 1, '2019-12-17 10:48:19', '2019-12-17 10:57:21'),
(2, 1, 1, 1, '2019-12-18', '2019-12-21', NULL, 1, '2019-12-17 18:11:19', '2019-12-17 18:11:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_item`
--

CREATE TABLE `status_item` (
  `status_item_id` bigint(20) UNSIGNED NOT NULL,
  `status_item_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_item`
--

INSERT INTO `status_item` (`status_item_id`, `status_item_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Dipinjam', 1, '2019-12-10 00:03:08', '2019-12-10 00:03:08'),
(2, 'Tersedia', 1, '2019-12-10 00:03:45', '2019-12-10 00:03:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_sirkulasi`
--

CREATE TABLE `status_sirkulasi` (
  `status_sirkulasi_id` bigint(20) UNSIGNED NOT NULL,
  `status_sirkulasi_nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_sirkulasi`
--

INSERT INTO `status_sirkulasi` (`status_sirkulasi_id`, `status_sirkulasi_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Peminjaman', 1, '2019-12-11 19:00:36', '2019-12-11 19:00:36'),
(2, 'Pengembalian', 1, '2019-12-11 19:01:10', '2019-12-11 19:01:10'),
(3, 'Konfirmasi', 1, '2019-12-11 19:01:24', '2019-12-11 19:01:24'),
(4, 'Riwayat Konfirmasi', 1, '2019-12-11 19:01:58', '2019-12-11 19:01:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_item`
--

CREATE TABLE `sumber_item` (
  `sumber_item_id` bigint(20) UNSIGNED NOT NULL,
  `sumber_item_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sumber_item`
--

INSERT INTO `sumber_item` (`sumber_item_id`, `sumber_item_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, NULL, 2, '2019-12-10 00:02:18', '2019-12-10 00:02:18'),
(2, NULL, 2, '2019-12-10 01:24:50', '2019-12-10 01:24:50'),
(3, 'Bantuan', 2, '2019-12-10 01:26:51', '2019-12-10 01:26:51'),
(4, 'Sumber Item', 1, '2020-01-12 02:26:45', '2020-01-12 02:26:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipekoleksi`
--

CREATE TABLE `tipekoleksi` (
  `tipekoleksi_id` bigint(20) UNSIGNED NOT NULL,
  `tipekoleksi_nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terhapus` smallint(6) DEFAULT NULL,
  `pembuatan` timestamp NULL DEFAULT NULL,
  `perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tipekoleksi`
--

INSERT INTO `tipekoleksi` (`tipekoleksi_id`, `tipekoleksi_nama`, `terhapus`, `pembuatan`, `perubahan`) VALUES
(1, 'Buku', 2, '2019-12-10 00:05:23', '2019-12-10 00:05:23'),
(2, 'Tipe Koleksi', 1, '2020-01-12 02:25:40', '2020-01-12 02:25:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `anggota_anggota_tipe_id_foreign` (`anggota_tipe_id`),
  ADD KEY `anggota_provinsi_id_foreign` (`provinsi_id`),
  ADD KEY `anggota_kabupaten_id_foreign` (`kabupaten_id`),
  ADD KEY `anggota_kecamatan_id_foreign` (`kecamatan_id`),
  ADD KEY `anggota_desa_id_foreign` (`desa_id`),
  ADD KEY `anggota_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `anggota_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `anggota_tipe`
--
ALTER TABLE `anggota_tipe`
  ADD PRIMARY KEY (`anggota_tipe_id`);

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`aturan_id`),
  ADD KEY `aturan_anggota_tipe_id_foreign` (`anggota_tipe_id`);

--
-- Indeks untuk tabel `biblio`
--
ALTER TABLE `biblio`
  ADD PRIMARY KEY (`biblio_id`),
  ADD KEY `biblio_penulis_id_foreign` (`penulis_id`),
  ADD KEY `biblio_penerbit_id_foreign` (`penerbit_id`),
  ADD KEY `biblio_tipekoleksi_id_foreign` (`tipekoleksi_id`),
  ADD KEY `biblio_klasifikasi_id_foreign` (`klasifikasi_id`),
  ADD KEY `biblio_status_item_id_foreign` (`status_item_id`),
  ADD KEY `biblio_sumber_item_id_foreign` (`sumber_item_id`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`desa_id`),
  ADD KEY `desa_kecamatan_id_foreign` (`kecamatan_id`),
  ADD KEY `desa_kabupaten_id_foreign` (`kabupaten_id`),
  ADD KEY `desa_provinsi_id_foreign` (`provinsi_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupaten_id`),
  ADD KEY `kabupaten_provinsi_id_foreign` (`provinsi_id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`),
  ADD KEY `kecamatan_kabupaten_id_foreign` (`kabupaten_id`),
  ADD KEY `kecamatan_provinsi_id_foreign` (`provinsi_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `kelas_jurusan_id_foreign` (`jurusan_id`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`klasifikasi_id`);

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
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`penerbit_id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`pengaturan_id`),
  ADD KEY `pengaturan_operator_foreign` (`operator`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`penulis_id`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indeks untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  ADD PRIMARY KEY (`sirkulasi_id`),
  ADD KEY `sirkulasi_anggota_id_foreign` (`anggota_id`),
  ADD KEY `sirkulasi_biblio_id_foreign` (`biblio_id`),
  ADD KEY `sirkulasi_aturan_id_foreign` (`aturan_id`),
  ADD KEY `sirkulasi_status_sirkulasi_id_foreign` (`status_sirkulasi_id`);

--
-- Indeks untuk tabel `status_item`
--
ALTER TABLE `status_item`
  ADD PRIMARY KEY (`status_item_id`);

--
-- Indeks untuk tabel `status_sirkulasi`
--
ALTER TABLE `status_sirkulasi`
  ADD PRIMARY KEY (`status_sirkulasi_id`);

--
-- Indeks untuk tabel `sumber_item`
--
ALTER TABLE `sumber_item`
  ADD PRIMARY KEY (`sumber_item_id`);

--
-- Indeks untuk tabel `tipekoleksi`
--
ALTER TABLE `tipekoleksi`
  ADD PRIMARY KEY (`tipekoleksi_id`);

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
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anggota_tipe`
--
ALTER TABLE `anggota_tipe`
  MODIFY `anggota_tipe_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `aturan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `biblio`
--
ALTER TABLE `biblio`
  MODIFY `biblio_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `desa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `kabupaten_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kecamatan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `klasifikasi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `penerbit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `pengaturan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penulis`
--
ALTER TABLE `penulis`
  MODIFY `penulis_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `provinsi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  MODIFY `sirkulasi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_item`
--
ALTER TABLE `status_item`
  MODIFY `status_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_sirkulasi`
--
ALTER TABLE `status_sirkulasi`
  MODIFY `status_sirkulasi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sumber_item`
--
ALTER TABLE `sumber_item`
  MODIFY `sumber_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tipekoleksi`
--
ALTER TABLE `tipekoleksi`
  MODIFY `tipekoleksi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_anggota_tipe_id_foreign` FOREIGN KEY (`anggota_tipe_id`) REFERENCES `anggota_tipe` (`anggota_tipe_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`desa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`kabupaten_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_anggota_tipe_id_foreign` FOREIGN KEY (`anggota_tipe_id`) REFERENCES `anggota_tipe` (`anggota_tipe_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `biblio`
--
ALTER TABLE `biblio`
  ADD CONSTRAINT `biblio_klasifikasi_id_foreign` FOREIGN KEY (`klasifikasi_id`) REFERENCES `klasifikasi` (`klasifikasi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblio_penerbit_id_foreign` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`penerbit_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblio_penulis_id_foreign` FOREIGN KEY (`penulis_id`) REFERENCES `penulis` (`penulis_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblio_status_item_id_foreign` FOREIGN KEY (`status_item_id`) REFERENCES `status_item` (`status_item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblio_sumber_item_id_foreign` FOREIGN KEY (`sumber_item_id`) REFERENCES `sumber_item` (`sumber_item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblio_tipekoleksi_id_foreign` FOREIGN KEY (`tipekoleksi_id`) REFERENCES `tipekoleksi` (`tipekoleksi_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`kabupaten_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `desa_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `desa_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`kabupaten_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kecamatan_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD CONSTRAINT `pengaturan_operator_foreign` FOREIGN KEY (`operator`) REFERENCES `anggota` (`anggota_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  ADD CONSTRAINT `sirkulasi_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`anggota_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sirkulasi_aturan_id_foreign` FOREIGN KEY (`aturan_id`) REFERENCES `aturan` (`aturan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sirkulasi_biblio_id_foreign` FOREIGN KEY (`biblio_id`) REFERENCES `biblio` (`biblio_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sirkulasi_status_sirkulasi_id_foreign` FOREIGN KEY (`status_sirkulasi_id`) REFERENCES `status_sirkulasi` (`status_sirkulasi_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
