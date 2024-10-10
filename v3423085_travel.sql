-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Okt 2024 pada 07.49
-- Versi server: 8.0.30
-- Versi PHP: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v3423085_travel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `id` int NOT NULL,
  `nama_destinasi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`id`, `nama_destinasi`, `deskripsi`, `img`, `created_at`, `updated_at`) VALUES
(9, 'Pantai Parangtritis', 'Pantai di Gunung Kidul', 'cek', '2024-10-10 06:50:22', '2024-10-10 06:50:22'),
(10, 'Pantai Kuta', 'Pantai di Bali', '1111', '2024-10-10 06:50:47', '2024-10-10 06:50:47'),
(11, 'Pantai Pandawa', 'Pantai di Bali', 'img_0003s_0000_marvel-1.jpg', '2024-10-10 07:48:21', '2024-10-10 07:48:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id` int NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id`, `nama_hotel`, `alamat`, `created_at`, `updated_at`) VALUES
(7, 'Hotel Kita', 'Surakarta', '2024-10-10 06:49:02', '2024-10-10 06:49:02'),
(8, 'Hotel Indah', 'Kartasura', '2024-10-10 06:49:34', '2024-10-10 06:49:34'),
(9, 'Hotel Pandawa', 'Bedugul, Bali', '2024-10-10 07:48:50', '2024-10-10 07:48:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `deskripsi` text,
  `harga` int NOT NULL,
  `id_hotel` int DEFAULT NULL,
  `id_transport` int DEFAULT NULL,
  `id_destination` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `deskripsi`, `harga`, `id_hotel`, `id_transport`, `id_destination`, `created_at`, `updated_at`) VALUES
(3, 'paket', 'paket pantai', 200000000, 7, 8, 9, '2024-10-10 07:45:08', '2024-10-10 07:45:08'),
(4, 'paket 2', 'paket pantai bus non ac', 1000000, 7, 9, 9, '2024-10-10 07:46:12', '2024-10-10 07:46:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transport`
--

CREATE TABLE `transport` (
  `id` int NOT NULL,
  `nama_transport` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transport`
--

INSERT INTO `transport` (`id`, `nama_transport`, `created_at`, `updated_at`) VALUES
(8, 'Bus AC', '2024-10-10 06:48:13', '2024-10-10 06:48:13'),
(9, 'Bus Non AC', '2024-10-10 06:48:25', '2024-10-10 06:48:25'),
(10, 'BUS Tingkat Ac', '2024-10-10 07:49:04', '2024-10-10 07:49:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `gender`, `created_at`, `updated_at`) VALUES
(7, 'veri', '123', 'veri@gmail.com', 'Male', '2024-10-10 06:47:49', '2024-10-10 06:47:49'),
(8, 'veri1', '$2y$10$MZ4AtLIO2IX0CyXwPrxciOhYEge2rrk/ScrN8K2HOzbh3NU.GST6C', 'jakasembung@gmail.com', 'male', '2024-10-10 00:46:30', '2024-10-10 00:46:30'),
(9, 'dika', '$2y$10$cQ2tCccbKSqZBBPmzG.G1.Jyp/2CXPbzTw6F4a6mesVGdvfgstEfK', 'dika@gmail.com', 'female', '2024-10-10 00:47:59', '2024-10-10 00:47:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`id_hotel`),
  ADD KEY `transport_id` (`id_transport`),
  ADD KEY `destination_id` (`id_destination`);

--
-- Indeks untuk tabel `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `paket_ibfk_2` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `paket_ibfk_3` FOREIGN KEY (`id_destination`) REFERENCES `destination` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
