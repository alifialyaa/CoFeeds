-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 09:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cofeeds`
--

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `kasus_id` int(11) NOT NULL,
  `update_kasus_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_kasus` int(11) NOT NULL,
  `total_sembuh` int(11) NOT NULL,
  `total_meninggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`kasus_id`, `update_kasus_id`, `tanggal`, `total_kasus`, `total_sembuh`, `total_meninggal`) VALUES
(1, 3, '2020-05-20', 18496, 4467, 1221);

-- --------------------------------------------------------

--
-- Table structure for table `update_kasus`
--

CREATE TABLE `update_kasus` (
  `update_kasus_id` int(11) NOT NULL,
  `update_positif` int(11) NOT NULL,
  `update_meninggal` int(11) NOT NULL,
  `update_sembuh` int(11) NOT NULL,
  `update_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_kasus`
--

INSERT INTO `update_kasus` (`update_kasus_id`, `update_positif`, `update_meninggal`, `update_sembuh`, `update_tanggal`) VALUES
(1, 17514, 1148, 4129, '2020-05-17 16:00:30'),
(2, 496, 43, 195, '2020-05-18 16:07:25'),
(3, 486, 30, 143, '2020-05-19 15:50:00');

--
-- Triggers `update_kasus`
--
DELIMITER $$
CREATE TRIGGER `update_tabel` AFTER INSERT ON `update_kasus` FOR EACH ROW BEGIN UPDATE kasus SET
update_kasus_id = NEW.update_kasus_id,
total_kasus = total_kasus + NEW.update_positif,
total_sembuh = total_sembuh + NEW.update_sembuh,
total_meninggal = total_meninggal + NEW.update_meninggal, tanggal = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`kasus_id`),
  ADD KEY `update_kasus_id` (`update_kasus_id`);

--
-- Indexes for table `update_kasus`
--
ALTER TABLE `update_kasus`
  ADD PRIMARY KEY (`update_kasus_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `kasus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `update_kasus`
--
ALTER TABLE `update_kasus`
  MODIFY `update_kasus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`update_kasus_id`) REFERENCES `update_kasus` (`update_kasus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
