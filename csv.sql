-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.13-MariaDB-log - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных mvc_csv
CREATE DATABASE IF NOT EXISTS `mvc_csv` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mvc_csv`;

-- Дамп структуры для таблица mvc_csv.csv
CREATE TABLE IF NOT EXISTS `csv` (
  `UID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL DEFAULT 0,
  `Email` varchar(50) NOT NULL DEFAULT '0',
  `Phone` varchar(50) NOT NULL DEFAULT '0',
  `Gender` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mvc_csv.csv: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `csv` DISABLE KEYS */;
/*!40000 ALTER TABLE `csv` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
