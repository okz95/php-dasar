-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2025 at 12:21 AM
-- Server version: 11.4.4-MariaDB
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-dasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_exp` date NOT NULL,
  `stok` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama`, `harga`, `tgl_buat`, `tgl_exp`, `stok`, `gambar`) VALUES
('M-001', 'Seblak Rafael', 15000, '2025-04-24', '2025-04-30', 4, 'test'),
('M-002', 'Syomay Bandung', 10000, '2025-04-24', '2025-04-30', 2, 'test'),
('M-003', 'Batagor', 10000, '2025-04-24', '2025-04-30', 2, 'test'),
('M-004', 'Kupat Tahu', 20000, '2025-04-24', '2025-04-30', 2, 'test'),
('M-005', 'Cilok', 10000, '2025-04-24', '2025-04-30', 2, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
