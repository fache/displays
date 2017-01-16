-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 10:20 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `displays`
--

-- --------------------------------------------------------

--
-- Table structure for table `cijene`
--

CREATE TABLE `cijene` (
  `ID` int(11) NOT NULL,
  `cijena` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `cijene`
--

INSERT INTO `cijene` (`ID`, `cijena`) VALUES
(1, '0'),
(2, '0'),
(3, '0'),
(4, '0'),
(5, '0'),
(6, '0'),
(7, '0'),
(9, '0'),
(10, '0'),
(11, '0'),
(12, '0'),
(13, '0'),
(14, '0'),
(15, '0'),
(26, '0'),
(41, '0'),
(50, '0'),
(68, '0'),
(71, '0'),
(1001, '0'),
(1003, '0'),
(1005, '0');

-- --------------------------------------------------------

--
-- Table structure for table `nazivi`
--

CREATE TABLE `nazivi` (
  `ID` int(11) NOT NULL,
  `Naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `nazivi`
--

INSERT INTO `nazivi` (`ID`, `Naziv`) VALUES
(1, 'A4 okviri'),
(2, 'Spremnik rinfuza'),
(3, 'Lopatice'),
(4, 'Jarboli'),
(5, 'Informacioni sistemi'),
(6, 'Kusur tacna'),
(7, 'Markeri'),
(9, 'A2'),
(10, 'A3'),
(11, 'A4'),
(12, 'A5'),
(13, 'A6'),
(14, 'A7'),
(15, 'A8'),
(26, 'Test Slika'),
(41, 'Test'),
(50, '3d naocale'),
(68, 'Cudna slika'),
(71, 'A10'),
(1001, 'aaaa'),
(1003, 'sa'),
(1004, 'aaaa'),
(1005, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `putanje`
--

CREATE TABLE `putanje` (
  `ID` int(11) NOT NULL,
  `putanja` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `putanje`
--

INSERT INTO `putanje` (`ID`, `putanja`) VALUES
(1, '145.jpg'),
(2, '159.jpg'),
(3, '350.jpg'),
(4, '694.jpg'),
(5, '760.jpg'),
(6, '770.jpg'),
(7, '781.jpg'),
(9, '159.jpg'),
(10, '159.jpg'),
(11, '159.jpg'),
(12, '159.jpg'),
(13, '159.jpg'),
(14, '159.jpg'),
(15, '159.jpg'),
(26, 'misija.jpg'),
(41, 'hrana_za_bebe.jpg'),
(50, '/'),
(68, 'http://www.mazzo.com.my/wp-content/uploads/MINI-0004-100x150.jpg'),
(71, '159.jpg'),
(1001, '45'),
(1003, '5'),
(1005, '11');

-- --------------------------------------------------------

--
-- Table structure for table `sifraprijave`
--

CREATE TABLE `sifraprijave` (
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `sifraprijave`
--

INSERT INTO `sifraprijave` (`username`, `password`) VALUES
('admin', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cijene`
--
ALTER TABLE `cijene`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nazivi`
--
ALTER TABLE `nazivi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `putanje`
--
ALTER TABLE `putanje`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sifraprijave`
--
ALTER TABLE `sifraprijave`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cijene`
--
ALTER TABLE `cijene`
  ADD CONSTRAINT `cijene_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `nazivi` (`ID`);

--
-- Constraints for table `putanje`
--
ALTER TABLE `putanje`
  ADD CONSTRAINT `putanje_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `nazivi` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
