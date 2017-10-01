-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for suppressed
DROP DATABASE IF EXISTS `suppressed`;
CREATE DATABASE IF NOT EXISTS `suppressed` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `suppressed`;

-- Dumping structure for table suppressed.suppressed
DROP TABLE IF EXISTS `suppressed`;
CREATE TABLE IF NOT EXISTS `suppressed` (
  `SKU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SKU0` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SKU1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SKU2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SKU3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ASIN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alert_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alert_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `internal_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `explanation` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
