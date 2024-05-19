-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table phpcrud.anytable
CREATE TABLE IF NOT EXISTS `anytable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstData` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pic` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `multiPic` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aboutMe` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `certificates` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table phpcrud.anytable: ~0 rows (approximately)
INSERT INTO `anytable` (`id`, `firstData`, `pic`, `multiPic`, `aboutMe`, `name`, `certificates`) VALUES
	(1, 'My Portfolio', 'Screenshot 2024-05-15 233410.png', 'work7.png,work5.png,work4.png,work3.png,work2.png,WORK1.png,cert1.png', 'I\'m a third-year college student at New Era University with a passion for video editing, music, gaming, and programming. My creative side thrives when I\'m editing videos, crafting narratives through visuals and sound. Music is my constant companion, inspiring me as I delve into different genres and artists. Gaming serves as both entertainment and a way to unwind, immersing myself in diverse virtual worlds. Programming is where I channel my logical thinking and problem-solving skills. Proficient in HTML, CSS, Java, Python, JavaScript, and ActionScript, I enjoy the process of bringing ideas to life through coding. My journey is a blend of creativity, technology, and exploration, shaping me into a well-rounded individual ready to tackle new challenges.', 'Angelo Gerard T. Mallari', NULL);

-- Dumping structure for table phpcrud.idtbl
CREATE TABLE IF NOT EXISTS `idtbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table phpcrud.idtbl: ~0 rows (approximately)
INSERT INTO `idtbl` (`id`) VALUES
	(1);

-- Dumping structure for table phpcrud.navbar
CREATE TABLE IF NOT EXISTS `navbar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `navbar1` varchar(1000) DEFAULT NULL,
  `navbar2` varchar(1000) DEFAULT NULL,
  `navbar3` varchar(1000) DEFAULT NULL,
  `navbar4` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table phpcrud.navbar: ~0 rows (approximately)
INSERT INTO `navbar` (`id`, `navbar1`, `navbar2`, `navbar3`, `navbar4`) VALUES
	(1, 'Home', 'Ronan', 'Jm', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
