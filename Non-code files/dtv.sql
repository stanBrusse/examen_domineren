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

CREATE TABLE IF NOT EXISTS `accounts` (
  `Nummer` int(11) NOT NULL AUTO_INCREMENT,
  `Naam_Voor` varchar(25) NOT NULL,
  `Naam_Tussen` varchar(5) NOT NULL,
  `Naam_Achter` varchar(25) NOT NULL,
  `Adres_Straat_Naam` varchar(25) NOT NULL,
  `Adres_Straat_Nummer` varchar(11) NOT NULL,
  `Adres_Plaats_Postcode` varchar(6) NOT NULL COMMENT '4 nummers + 2 lettrs',
  `Adres_Plaats_Naam` varchar(25) NOT NULL,
  `Geboorte_Datum` date NOT NULL,
  `Geslacht` varchar(6) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Telefoon` text NOT NULL,
  `Account_Rol` varchar(11) NOT NULL DEFAULT 'Lid' COMMENT 'Lid of Werknemer',
  PRIMARY KEY (`Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `account_bevoeging`
--

CREATE TABLE IF NOT EXISTS `account_bevoeging` (
  `Werknemer_Nummer` int(11) NOT NULL,
  `Bevoeging_Level` varchar(11) NOT NULL,
  KEY `Werknemer_Nummer_Account_Bevoeging` (`Werknemer_Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activiteiten`
--

CREATE TABLE IF NOT EXISTS `activiteiten` (
  `Nummer` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(55) NOT NULL,
  `Datum_Activiteit` date NOT NULL COMMENT 'op daze datum begint toernooi',
  `Datum_Ingeschreven` date NOT NULL COMMENT 'voor deze datum moet lid geregistreerd zijn',
  `Tijd_Start` int(4) NOT NULL COMMENT '1200 wordt 12:00 uur',
  `Tijd_Eind` int(4) NOT NULL COMMENT '1230 wordt 12:30 uur',
  PRIMARY KEY (`Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activiteit_banen`
--

CREATE TABLE IF NOT EXISTS `activiteit_banen` (
  `Activiteit_Nummer` int(11) NOT NULL,
  `Baan_Nummer` int(11) NOT NULL,
  KEY `Toernooi_Nummer_Toernooi_Baan_Reservatie` (`Activiteit_Nummer`),
  KEY `Baan_Nummer_Toernooi_Baan_Reservatie` (`Baan_Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activiteit_werknemer`
--

CREATE TABLE IF NOT EXISTS `activiteit_werknemer` (
  `Activiteit_Nummer` int(11) NOT NULL,
  `Werknemer_Nummer` int(11) NOT NULL,
  `Rol` varchar(55) NOT NULL COMMENT 'Schijdrechter, Woordvoeder',
  KEY `Toernooi_nummer_Toernooi_Werknemer` (`Activiteit_Nummer`),
  KEY `Werknemer_Nummer_Toernooi_Werknemer` (`Werknemer_Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `artikelen`
--

CREATE TABLE IF NOT EXISTS `artikelen` (
  `Nummer` int(11) NOT NULL,
  `Naam` int(11) NOT NULL,
  `Descriptie` int(11) NOT NULL,
  `Foto` int(11) NOT NULL,
  `Prijs` int(11) NOT NULL,
  `Categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banen`
--

CREATE TABLE IF NOT EXISTS `banen` (
  `Nummer` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AI',
  `Code` varchar(3) NOT NULL COMMENT 'Letter + Code',
  `Soort` varchar(25) NOT NULL,
  `Ligging` text NOT NULL,
  `Afmeting_Lengte` decimal(2,2) NOT NULL,
  `Afmeting_Breedte` decimal(2,2) NOT NULL,
  `Vloer` text NOT NULL,
  `Check_Datum` date NOT NULL,
  `Service_Datum` date NOT NULL,
  PRIMARY KEY (`Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registratie_activiteit`
--

CREATE TABLE IF NOT EXISTS `registratie_activiteit` (
  `Activiteit_Nummer` int(11) NOT NULL,
  `Lid_Nummer` int(11) NOT NULL,
  `Datum_Inschrijfing` timestamp NOT NULL DEFAULT current_timestamp(),
  KEY `Lid_Nummer_Toernooi_registratie` (`Lid_Nummer`),
  KEY `Toernooi_nummer_Regitratie_Toernooi` (`Activiteit_Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservatie_baan`
--

CREATE TABLE IF NOT EXISTS `reservatie_baan` (
  `Nummer` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` date NOT NULL,
  `Baan_Nummer` int(11) NOT NULL,
  `Tijd_Begin` int(4) NOT NULL COMMENT '2000 wordt 20:00 uur',
  `Tijd_Eind` int(4) NOT NULL COMMENT '2100 wordt 21:00 uur',
  `Lid_Nummer` int(11) NOT NULL,
  PRIMARY KEY (`Nummer`),
  KEY `Baan_Nummer_Reservatie_Baan` (`Baan_Nummer`),
  KEY `Lid_Nummer_Reservatie_Baan` (`Lid_Nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_bevoeging`
--
ALTER TABLE `account_bevoeging`
  ADD CONSTRAINT `Werknemer_Nummer_Account_Bevoeging` FOREIGN KEY (`Werknemer_Nummer`) REFERENCES `accounts` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activiteit_banen`
--
ALTER TABLE `activiteit_banen`
  ADD CONSTRAINT `Baan_Nummer_Toernooi_Baan_Reservatie` FOREIGN KEY (`Baan_Nummer`) REFERENCES `banen` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Toernooi_Nummer_Toernooi_Baan_Reservatie` FOREIGN KEY (`Activiteit_Nummer`) REFERENCES `activiteiten` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activiteit_werknemer`
--
ALTER TABLE `activiteit_werknemer`
  ADD CONSTRAINT `Toernooi_nummer_Toernooi_Werknemer` FOREIGN KEY (`Activiteit_Nummer`) REFERENCES `activiteiten` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Werknemer_Nummer_Toernooi_Werknemer` FOREIGN KEY (`Werknemer_Nummer`) REFERENCES `accounts` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registratie_activiteit`
--
ALTER TABLE `registratie_activiteit`
  ADD CONSTRAINT `Lid_Nummer_Toernooi_registratie` FOREIGN KEY (`Lid_Nummer`) REFERENCES `accounts` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Toernooi_nummer_Regitratie_Toernooi` FOREIGN KEY (`Activiteit_Nummer`) REFERENCES `activiteiten` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservatie_baan`
--
ALTER TABLE `reservatie_baan`
  ADD CONSTRAINT `Baan_Nummer_Reservatie_Baan` FOREIGN KEY (`Baan_Nummer`) REFERENCES `banen` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Lid_Nummer_Reservatie_Baan` FOREIGN KEY (`Lid_Nummer`) REFERENCES `accounts` (`Nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
