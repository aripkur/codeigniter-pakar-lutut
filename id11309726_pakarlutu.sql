-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2020 at 06:13 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `id11309726_pakarlutu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cedera`
--

CREATE TABLE `tbl_cedera` (
  `cedera_id` int(11) NOT NULL,
  `cedera_kode` varchar(10) NOT NULL,
  `cedera_nama` varchar(100) NOT NULL,
  `cedera_solusi` text NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `gejala_id` int(11) NOT NULL,
  `gejala_kode` varchar(10) NOT NULL,
  `gejala_nama` text NOT NULL,
  `gejala_gambar` varchar(20) DEFAULT 'default.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kaidah`
--

CREATE TABLE `tbl_kaidah` (
  `kaidah_id` int(11) NOT NULL,
  `kaidah_kode` varchar(10) NOT NULL,
  `fk_cedera` int(11) NOT NULL,
  `fk_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pakar`
--

CREATE TABLE `tbl_pakar` (
  `pakar_id` int(11) NOT NULL,
  `pakar_nama` varchar(100) NOT NULL,
  `pakar_email` varchar(100) NOT NULL,
  `pakar_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cedera`
--
ALTER TABLE `tbl_cedera`
  ADD PRIMARY KEY (`cedera_id`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`gejala_id`);

--
-- Indexes for table `tbl_kaidah`
--
ALTER TABLE `tbl_kaidah`
  ADD PRIMARY KEY (`kaidah_id`);

--
-- Indexes for table `tbl_pakar`
--
ALTER TABLE `tbl_pakar`
  ADD PRIMARY KEY (`pakar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cedera`
--
ALTER TABLE `tbl_cedera`
  MODIFY `cedera_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `gejala_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kaidah`
--
ALTER TABLE `tbl_kaidah`
  MODIFY `kaidah_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pakar`
--
ALTER TABLE `tbl_pakar`
  MODIFY `pakar_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
