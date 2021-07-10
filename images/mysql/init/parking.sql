-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jul 2021 pada 10.24
-- Versi server: 5.7.26
-- Versi PHP: 7.4.2

CREATE DATABASE IF NOT EXISTS `lumen`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

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
(1, '2021_07_01_131305_create_parking_slots_table', 1),
(2, '2021_07_01_131818_create_parking_logs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parking_logs`
--

CREATE TABLE `parking_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parking_slot_id` int(11) NOT NULL,
  `registration_number` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in` datetime NOT NULL,
  `out` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parking_slots`
--

CREATE TABLE `parking_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_number` int(11) NOT NULL,
  `is_avaible` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `registration_number` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parking_slots`
--

INSERT INTO `parking_slots` (`id`, `slot_number`, `is_avaible`, `registration_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'y', NULL, NULL, NULL),
(2, 2, 'y', NULL, NULL, NULL),
(3, 3, 'y', NULL, NULL, NULL),
(4, 4, 'y', NULL, NULL, NULL),
(5, 5, 'y', NULL, NULL, NULL),
(6, 6, 'y', NULL, NULL, NULL),
(7, 7, 'y', NULL, NULL, NULL),
(8, 8, 'y', NULL, NULL, NULL),
(9, 9, 'y', NULL, NULL, NULL),
(10, 10, 'y', NULL, NULL, NULL),
(11, 11, 'y', NULL, NULL, NULL),
(12, 12, 'y', NULL, NULL, NULL),
(13, 13, 'y', NULL, NULL, NULL),
(14, 14, 'y', NULL, NULL, NULL),
(15, 15, 'y', NULL, NULL, NULL),
(16, 16, 'y', NULL, NULL, NULL),
(17, 17, 'y', NULL, NULL, NULL),
(18, 18, 'y', NULL, NULL, NULL),
(19, 19, 'y', NULL, NULL, NULL),
(20, 20, 'y', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parking_logs`
--
ALTER TABLE `parking_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `parking_logs`
--
ALTER TABLE `parking_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
