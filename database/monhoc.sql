-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 10:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1951060631_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` int(10) UNSIGNED NOT NULL,
  `ten_mh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sotinchi` int(10) UNSIGNED DEFAULT NULL,
  `sotiet_lt` int(10) UNSIGNED DEFAULT NULL,
  `sotiet_bt` int(10) UNSIGNED DEFAULT NULL,
  `sotiet_th` int(10) UNSIGNED DEFAULT NULL,
  `sogio_tuhoc` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mamh`, `ten_mh`, `sotinchi`, `sotiet_lt`, `sotiet_bt`, `sotiet_th`, `sogio_tuhoc`) VALUES
(1, 'Toan', 5, 8, 1, 9, 3),
(2, 'Tieng Anh1', 2, 2, 5, 3, 3),
(3, 'C++', 3, 1, 7, 5, 49),
(4, 'He quan tri', 5, 3, 8, 2, 41),
(5, 'PTHTTT', 2, 6, 3, 3, 38),
(6, 'Mang may tinh', 2, 9, 7, 1, 37),
(7, 'Tieng Anh chuyen nganh', 5, 5, 9, 3, 41),
(8, 'C#', 3, 4, 9, 7, 16),
(9, 'Java', 3, 7, 8, 3, 47),
(10, 'Web', 2, 5, 2, 9, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `mamh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
