-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Mar 2021 pada 15.08
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Komentar`
--

CREATE TABLE `Komentar` (
  `IDKomentar` int(11) NOT NULL,
  `tanggalKomen` date DEFAULT NULL,
  `ID_Produk_K` int(11) DEFAULT NULL,
  `isiKomen` varchar(200) DEFAULT NULL,
  `ID_User_K` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Merchant`
--

CREATE TABLE `Merchant` (
  `IDMerchant` int(11) NOT NULL,
  `namaMerchant` varchar(45) DEFAULT NULL,
  `tanggalBergabung` date DEFAULT NULL,
  `Id_User_M` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Produk`
--

CREATE TABLE `Produk` (
  `IDProduk` int(11) NOT NULL,
  `namaProduk` varchar(45) DEFAULT NULL,
  `gambarProduk` text DEFAULT NULL,
  `deskripsiProduk` varchar(200) DEFAULT NULL,
  `kondisiProduk` varchar(45) DEFAULT NULL,
  `Kategori` varchar(45) DEFAULT NULL,
  `Id_Merchant_M` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `User`
--

CREATE TABLE `User` (
  `IDUser` int(11) NOT NULL,
  `namaCustomer` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `user_password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Komentar`
--
ALTER TABLE `Komentar`
  ADD PRIMARY KEY (`IDKomentar`),
  ADD KEY `fk_Komentar_Produk1_idx` (`ID_Produk_K`),
  ADD KEY `fk_Komentar_User1_idx` (`ID_User_K`);

--
-- Indeks untuk tabel `Merchant`
--
ALTER TABLE `Merchant`
  ADD PRIMARY KEY (`IDMerchant`),
  ADD KEY `fk_Merchant_User1_idx` (`Id_User_M`);

--
-- Indeks untuk tabel `Produk`
--
ALTER TABLE `Produk`
  ADD PRIMARY KEY (`IDProduk`),
  ADD KEY `fk_Produk_Merchant1` (`Id_Merchant_M`);

--
-- Indeks untuk tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Komentar`
--
ALTER TABLE `Komentar`
  MODIFY `IDKomentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `Merchant`
--
ALTER TABLE `Merchant`
  MODIFY `IDMerchant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `Produk`
--
ALTER TABLE `Produk`
  MODIFY `IDProduk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `User`
--
ALTER TABLE `User`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Komentar`
--
ALTER TABLE `Komentar`
  ADD CONSTRAINT `fk_Komentar_Produk1` FOREIGN KEY (`ID_Produk_K`) REFERENCES `Produk` (`IDProduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Komentar_User1` FOREIGN KEY (`ID_User_K`) REFERENCES `User` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `Merchant`
--
ALTER TABLE `Merchant`
  ADD CONSTRAINT `fk_Merchant_User1` FOREIGN KEY (`Id_User_M`) REFERENCES `User` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `Produk`
--
ALTER TABLE `Produk`
  ADD CONSTRAINT `fk_Produk_Merchant1` FOREIGN KEY (`Id_Merchant_M`) REFERENCES `Merchant` (`IDMerchant`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
