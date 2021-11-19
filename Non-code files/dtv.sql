-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 04:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtv`
--
CREATE DATABASE IF NOT EXISTS `dtv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dtv`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `nummer` int(11) NOT NULL,
  `naam_voor` varchar(25) NOT NULL,
  `naam_tussen` varchar(5) NOT NULL,
  `naam_achter` varchar(25) NOT NULL,
  `adres_straat_naam` varchar(25) NOT NULL,
  `adres_straat_nummer` varchar(11) NOT NULL,
  `adres_plaats_postcode` varchar(6) NOT NULL COMMENT '4 nummers + 2 lettrs',
  `Adres_Plaats_Naam` varchar(25) NOT NULL,
  `Geboorte_Datum` date NOT NULL,
  `Geslacht` varchar(6) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Telefoon` text NOT NULL,
  `Account_Rol` varchar(11) NOT NULL DEFAULT 'Lid' COMMENT 'Lid of Werknemer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `accounts`:
--

-- --------------------------------------------------------

--
-- Table structure for table `account_bevoeging`
--

DROP TABLE IF EXISTS `account_bevoeging`;
CREATE TABLE `account_bevoeging` (
  `Werknemer_nummer` int(11) NOT NULL,
  `Bevoeging_Level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `account_bevoeging`:
--   `Werknemer_nummer`
--       `accounts` -> `nummer`
--

-- --------------------------------------------------------

--
-- Table structure for table `activiteiten`
--

DROP TABLE IF EXISTS `activiteiten`;
CREATE TABLE `activiteiten` (
  `nummer` int(11) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Datum_Activiteit` date NOT NULL COMMENT 'op daze datum begint toernooi',
  `Datum_Ingeschreven` date NOT NULL COMMENT 'voor deze datum moet lid geregistreerd zijn',
  `Tijd_Start` int(4) NOT NULL COMMENT '1200 wordt 12:00 uur',
  `Tijd_Eind` int(4) NOT NULL COMMENT '1230 wordt 12:30 uur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `activiteiten`:
--

-- --------------------------------------------------------

--
-- Table structure for table `activiteit_banen`
--

DROP TABLE IF EXISTS `activiteit_banen`;
CREATE TABLE `activiteit_banen` (
  `Activiteit_nummer` int(11) NOT NULL,
  `Baan_nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `activiteit_banen`:
--   `Baan_nummer`
--       `banen` -> `nummer`
--   `Activiteit_nummer`
--       `activiteiten` -> `nummer`
--

-- --------------------------------------------------------

--
-- Table structure for table `activiteit_werknemer`
--

DROP TABLE IF EXISTS `activiteit_werknemer`;
CREATE TABLE `activiteit_werknemer` (
  `Activiteit_nummer` int(11) NOT NULL,
  `Werknemer_nummer` int(11) NOT NULL,
  `Rol` varchar(55) NOT NULL COMMENT 'Schijdrechter, Woordvoeder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `activiteit_werknemer`:
--   `Activiteit_nummer`
--       `activiteiten` -> `nummer`
--   `Werknemer_nummer`
--       `accounts` -> `nummer`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikelen`
--

DROP TABLE IF EXISTS `artikelen`;
CREATE TABLE `artikelen` (
  `nummer` int(11) NOT NULL,
  `Naam` varchar(25) NOT NULL,
  `Descriptie` varchar(55) NOT NULL,
  `Foto` varchar(55) NOT NULL,
  `Prijs` decimal(4,2) NOT NULL,
  `Categorie` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `artikelen`:
--

-- --------------------------------------------------------

--
-- Table structure for table `banen`
--

DROP TABLE IF EXISTS `banen`;
CREATE TABLE `banen` (
  `nummer` int(11) NOT NULL COMMENT 'AI',
  `Code` varchar(3) NOT NULL COMMENT 'Letter + Code',
  `Soort` varchar(25) NOT NULL,
  `Ligging` text NOT NULL,
  `Afmeting_Lengte` decimal(2,2) NOT NULL,
  `Afmeting_Breedte` decimal(2,2) NOT NULL,
  `Vloer` text NOT NULL,
  `Check_Datum` date NOT NULL,
  `Service_Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `banen`:
--

-- --------------------------------------------------------

--
-- Table structure for table `registratie_activiteit`
--

DROP TABLE IF EXISTS `registratie_activiteit`;
CREATE TABLE `registratie_activiteit` (
  `Activiteit_nummer` int(11) NOT NULL,
  `Lid_nummer` int(11) NOT NULL,
  `Datum_Inschrijfing` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `registratie_activiteit`:
--   `Lid_nummer`
--       `accounts` -> `nummer`
--   `Activiteit_nummer`
--       `activiteiten` -> `nummer`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservatie_baan`
--

DROP TABLE IF EXISTS `reservatie_baan`;
CREATE TABLE `reservatie_baan` (
  `nummer` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Baan_nummer` int(11) NOT NULL,
  `Tijd_Begin` int(4) NOT NULL COMMENT '2000 wordt 20:00 uur',
  `Tijd_Eind` int(4) NOT NULL COMMENT '2100 wordt 21:00 uur',
  `Lid_nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `reservatie_baan`:
--   `Baan_nummer`
--       `banen` -> `nummer`
--   `Lid_nummer`
--       `accounts` -> `nummer`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`nummer`);

--
-- Indexes for table `account_bevoeging`
--
ALTER TABLE `account_bevoeging`
  ADD KEY `Werknemer_nummer_Account_Bevoeging` (`Werknemer_nummer`);

--
-- Indexes for table `activiteiten`
--
ALTER TABLE `activiteiten`
  ADD PRIMARY KEY (`nummer`);

--
-- Indexes for table `activiteit_banen`
--
ALTER TABLE `activiteit_banen`
  ADD KEY `Toernooi_nummer_Toernooi_Baan_Reservatie` (`Activiteit_nummer`),
  ADD KEY `Baan_nummer_Toernooi_Baan_Reservatie` (`Baan_nummer`);

--
-- Indexes for table `activiteit_werknemer`
--
ALTER TABLE `activiteit_werknemer`
  ADD KEY `Toernooi_nummer_Toernooi_Werknemer` (`Activiteit_nummer`),
  ADD KEY `Werknemer_nummer_Toernooi_Werknemer` (`Werknemer_nummer`);

--
-- Indexes for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`nummer`);

--
-- Indexes for table `banen`
--
ALTER TABLE `banen`
  ADD PRIMARY KEY (`nummer`);

--
-- Indexes for table `registratie_activiteit`
--
ALTER TABLE `registratie_activiteit`
  ADD KEY `Lid_nummer_Toernooi_registratie` (`Lid_nummer`),
  ADD KEY `Toernooi_nummer_Regitratie_Toernooi` (`Activiteit_nummer`);

--
-- Indexes for table `reservatie_baan`
--
ALTER TABLE `reservatie_baan`
  ADD PRIMARY KEY (`nummer`),
  ADD KEY `Baan_nummer_Reservatie_Baan` (`Baan_nummer`),
  ADD KEY `Lid_nummer_Reservatie_Baan` (`Lid_nummer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activiteiten`
--
ALTER TABLE `activiteiten`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banen`
--
ALTER TABLE `banen`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AI';

--
-- AUTO_INCREMENT for table `reservatie_baan`
--
ALTER TABLE `reservatie_baan`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_bevoeging`
--
ALTER TABLE `account_bevoeging`
  ADD CONSTRAINT `Werknemer_nummer_Account_Bevoeging` FOREIGN KEY (`Werknemer_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activiteit_banen`
--
ALTER TABLE `activiteit_banen`
  ADD CONSTRAINT `Baan_nummer_Toernooi_Baan_Reservatie` FOREIGN KEY (`Baan_nummer`) REFERENCES `banen` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Toernooi_nummer_Toernooi_Baan_Reservatie` FOREIGN KEY (`Activiteit_nummer`) REFERENCES `activiteiten` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activiteit_werknemer`
--
ALTER TABLE `activiteit_werknemer`
  ADD CONSTRAINT `Toernooi_nummer_Toernooi_Werknemer` FOREIGN KEY (`Activiteit_nummer`) REFERENCES `activiteiten` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Werknemer_nummer_Toernooi_Werknemer` FOREIGN KEY (`Werknemer_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registratie_activiteit`
--
ALTER TABLE `registratie_activiteit`
  ADD CONSTRAINT `Lid_nummer_Toernooi_registratie` FOREIGN KEY (`Lid_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Toernooi_nummer_Regitratie_Toernooi` FOREIGN KEY (`Activiteit_nummer`) REFERENCES `activiteiten` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservatie_baan`
--
ALTER TABLE `reservatie_baan`
  ADD CONSTRAINT `Baan_nummer_Reservatie_Baan` FOREIGN KEY (`Baan_nummer`) REFERENCES `banen` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Lid_nummer_Reservatie_Baan` FOREIGN KEY (`Lid_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
