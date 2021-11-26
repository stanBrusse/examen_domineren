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
  `wachtwoord` varchar(55) NOT NULL,
  `naam_voor` varchar(25) NOT NULL,
  `naam_tussen` varchar(5) NOT NULL,
  `naam_achter` varchar(25) NOT NULL,
  `adres_straat_naam` varchar(25) NOT NULL,
  `adres_straat_nummer` varchar(11) NOT NULL,
  `adres_plaats_postcode` varchar(6) NOT NULL COMMENT '4 nummers + 2 lettrs',
  `adres_plaats_naam` varchar(25) NOT NULL,
  `geboorte_datum` date NOT NULL,
  `geslacht` varchar(6) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telefoon` text NOT NULL,
  `account_rol` varchar(11) NULL COMMENT 'Lid of Werknemer'
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
  `werknemer_nummer` int(11) NOT NULL,
  `bevoeging_level` varchar(11) NOT NULL
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
  `title` varchar(55) NOT NULL,
  `datum_activiteit` date NOT NULL COMMENT 'op daze datum begint toernooi',
  `datum_ingeschreven` date NOT NULL COMMENT 'voor deze datum moet lid geregistreerd zijn',
  `tijd_start` int(4) NOT NULL COMMENT '1200 wordt 12:00 uur',
  `tijd_eind` int(4) NOT NULL COMMENT '1230 wordt 12:30 uur'
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
  `activiteit_nummer` int(11) NOT NULL,
  `baan_nummer` int(11) NOT NULL
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
  `activiteit_nummer` int(11) NOT NULL,
  `werknemer_nummer` int(11) NOT NULL,
  `rol` varchar(55) NOT NULL COMMENT 'Schijdrechter, Woordvoeder'
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
  `naam` varchar(25) NOT NULL,
  `descriptie` varchar(55) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `prijs` decimal(4,2) NOT NULL,
  `categorie` varchar(6) NOT NULL
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
  `code` varchar(3) NOT NULL COMMENT 'Letter + Code',
  `soort` varchar(25) NOT NULL,
  `ligging` text NOT NULL,
  `afmeting_lengte` decimal(4,2) NOT NULL,
  `afmeting_breedte` decimal(4,2) NOT NULL,
  `vloer` text NOT NULL,
  `check_datum` date NOT NULL,
  `service_datum` date NOT NULL
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
  `activiteit_nummer` int(11) NOT NULL,
  `lid_nummer` int(11) NOT NULL,
  `datum_inschrijfing` timestamp NOT NULL DEFAULT current_timestamp()
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
  `datum` date NOT NULL,
  `baan_nummer` int(11) NOT NULL,
  `tijd_Begin` int(4) NOT NULL COMMENT '2000 wordt 20:00 uur',
  `tijd_Eind` int(4) NOT NULL COMMENT '2100 wordt 21:00 uur',
  `lid_nummer` int(11) NOT NULL
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
  ADD KEY `werknemer_nummer_account_bevoeging` (`werknemer_nummer`);

--
-- Indexes for table `activiteiten`
--
ALTER TABLE `activiteiten`
  ADD PRIMARY KEY (`nummer`);

--
-- Indexes for table `activiteit_banen`
--
ALTER TABLE `activiteit_banen`
  ADD KEY `toernooi_nummer_toernooi_baan_reservatie` (`activiteit_nummer`),
  ADD KEY `baan_nummer_toernooi_baan_reservatie` (`baan_nummer`);

--
-- Indexes for table `activiteit_werknemer`
--
ALTER TABLE `activiteit_werknemer`
  ADD KEY `toernooi_nummer_toernooi_werknemer` (`activiteit_nummer`),
  ADD KEY `werknemer_nummer_toernooi_werknemer` (`werknemer_nummer`);

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
  ADD KEY `lid_nummer_toernooi_registratie` (`lid_nummer`),
  ADD KEY `toernooi_nummer_regitratie_toernooi` (`activiteit_nummer`);

--
-- Indexes for table `reservatie_baan`
--
ALTER TABLE `reservatie_baan`
  ADD PRIMARY KEY (`nummer`),
  ADD KEY `baan_nummer_reservatie_baan` (`baan_nummer`),
  ADD KEY `lid_nummer_reservatie_baan` (`lid_nummer`);

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
  ADD CONSTRAINT `werknemer_nummer_account_bevoeging` FOREIGN KEY (`werknemer_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activiteit_banen`
--
ALTER TABLE `activiteit_banen`
  ADD CONSTRAINT `baan_nummer_toernooi_baan_reservatie` FOREIGN KEY (`baan_nummer`) REFERENCES `banen` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `toernooi_nummer_toernooi_baan_reservatie` FOREIGN KEY (`activiteit_nummer`) REFERENCES `activiteiten` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activiteit_werknemer`
--
ALTER TABLE `activiteit_werknemer`
  ADD CONSTRAINT `toernooi_nummer_toernooi_werknemer` FOREIGN KEY (`activiteit_nummer`) REFERENCES `activiteiten` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `werknemer_nummer_toernooi_werknemer` FOREIGN KEY (`werknemer_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registratie_activiteit`
--
ALTER TABLE `registratie_activiteit`
  ADD CONSTRAINT `lid_nummer_toernooi_registratie` FOREIGN KEY (`lid_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `toernooi_nummer_regitratie_toernooi` FOREIGN KEY (`activiteit_nummer`) REFERENCES `activiteiten` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservatie_baan`
--
ALTER TABLE `reservatie_baan`
  ADD CONSTRAINT `baan_nummer_reservatie_baan` FOREIGN KEY (`baan_nummer`) REFERENCES `banen` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lid_nummer_reservatie_baan` FOREIGN KEY (`lid_nummer`) REFERENCES `accounts` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
