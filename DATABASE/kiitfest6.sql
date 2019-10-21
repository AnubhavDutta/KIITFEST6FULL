-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 11:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiitfest6`
--

-- --------------------------------------------------------

--
-- Table structure for table `chickensoup`
--

CREATE TABLE `chickensoup` (
  `idno` int(5) NOT NULL,
  `Pname` varchar(70) DEFAULT NULL,
  `Email` varchar(70) NOT NULL,
  `Ppassword` varchar(150) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `whatsapp` varchar(10) DEFAULT NULL,
  `Ayear` int(1) DEFAULT NULL,
  `College` varchar(70) DEFAULT NULL,
  `Pstate` varchar(20) DEFAULT NULL,
  `District` varchar(40) DEFAULT NULL,
  `Picture` varchar(200) DEFAULT NULL,
  `Collegeid` varchar(70) DEFAULT NULL,
  `People` int(5) NOT NULL DEFAULT 0,
  `Caexperience` varchar(1) DEFAULT 'x',
  `Prole` int(2) NOT NULL DEFAULT 0,
  `Paid` int(2) NOT NULL DEFAULT 0,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chickensoup`
--

INSERT INTO `chickensoup` (`idno`, `Pname`, `Email`, `Ppassword`, `mobile`, `whatsapp`, `Ayear`, `College`, `Pstate`, `District`, `Picture`, `Collegeid`, `People`, `Caexperience`, `Prole`, `Paid`, `code`) VALUES
(0, 'Saurabh', 'dubeyji@gmail.com', 'ec1a08ca25857e260784856b3556804d', '8877665544', '8877665544', 1, 'KIIT University', 'Bihar', 'Araria', NULL, '', 0, 'n', 1, 0, NULL),
(13, 'Anurag', 'pandey@gmail.com', 'ec1a08ca25857e260784856b3556804d', '123', '123', 3, 'KIIT', 'a', 'a', NULL, NULL, 0, 'x', 2, 0, 24),
(15, 'Ayushman Sinha', 'ayushmansin@gmail.com', 'ec1a08ca25857e260784856b3556804d\r\n', '1234567890', '1234567890', 1, 'KIIT University', 'Assam', 'Baksa', NULL, '', 0, 'n', 1, 0, NULL),
(20, 'Shivam Kashyap', 'kashyap@gmail.com', '7d7982cc30b26508c71c10836ec12840', '9876543212', '9876543212', 1, 'KIIT University', 'Andhra Pradesh', 'Anantapur', NULL, '', 0, 'n', 1, 0, NULL),
(22, 'Anubhav Dutta', 'anubhavdutta@hotmail.com', 'c27389b0d37a40421ac33e20e8617572', '1234567890', '1234567890', 1, 'KIIT University', 'Chhattisgarh', 'Balod', NULL, '', 0, 'n', 1, 0, NULL),
(24, 'Anubhav Dutta', 'anubhavduttamusic@gmail.com', 'c27389b0d37a40421ac33e20e8617572', '8827472135', '8827472135', 1, 'KIIT University', 'Chhattisgarh', 'Balod', NULL, '', 1, 'n', 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chickensoup`
--
ALTER TABLE `chickensoup`
  ADD PRIMARY KEY (`idno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chickensoup`
--
ALTER TABLE `chickensoup`
  MODIFY `idno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
