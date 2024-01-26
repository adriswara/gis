create SCHEMA IF NOT EXISTS angkotin;
use angkotin;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2024 at 06:58 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkotin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int NOT NULL,
  `fk_terminalA` int NOT NULL,
  `fk_terminalB` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `fk_terminalA`, `fk_terminalB`) VALUES
(1, 6, 7),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`id`, `nama`, `longitude`, `latitude`) VALUES
(1, 'Titik Nol Bandung', -6.9175, 107.6191),
(4, 'Terminal Leuih Panjang', -6.945974047146048, 107.59461437150387),
(6, 'Terminal Antapani', -6.9153705670291234, 107.66573481355405),
(7, 'Terminal Cicaheum', -6.902061686172729, 107.65629966845091),
(8, 'Terminal Cimahi', -6.880584606143148, 107.5380307276204),
(9, 'Terminal Ledeng', -6.859003683786733, 107.59505869558306),
(10, 'Terminal Sarijadi', -6.889676073381499, 107.61271490563595),
(12, 'Terminal Cisitu', -6.872274344858246, 107.61404520375844),
(13, 'Terminal Cibiru', -6.905082692350188, 107.57496685829632),
(14, 'Terminal Ciroyom', -6.9268954701077, 107.55059094385247),
(15, 'Terminal Riung Dago', -6.942231975610562, 107.68311352096971),
(16, 'Terminal Kebon Jati', -6.909172664880922, 107.60208935464932),
(17, 'Terminal Pasar Kordon', -6.94938884052372, 107.63848156494578),
(18, 'Terminal Kebon Kelapa', -6.925770250985667, 107.6064554607754),
(19, 'Terminal Tegalega', -6.932631725980285, 107.60276455279126),
(20, 'BTM Cicadas', -6.911410112080165, 107.64351008745952);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
