-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for klytest
CREATE DATABASE IF NOT EXISTS `klytest` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `klytest`;

-- Dumping structure for table klytest.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table klytest.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_09_10_102430_t_user', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table klytest.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index 2` (`nama`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table klytest.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `email`, `no_telp`, `jenis_kelamin`, `agama`, `alamat`, `username`, `password`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Fajar', 'fajar@gmail.com', '0123456789', 'L', 'Islam', 'Jl. Sunan Giri 1, Kediri', 'fajar', '$2y$10$LETiFa3HxHLgQLRqpbp7/u4mOKw9dtoL.p2ltoyPRgL9C4Y6rnM3.', 'foto-Fajar-99914478.jpg', 'usr', '2019-09-10 17:50:37', '2019-09-11 12:00:11'),
	(2, 'Candra', 'candra@gmail.com', '0987654321', 'L', 'Islam', 'Jl. Sunan Kalijogo 1, Kediri', 'candra', '$2y$10$LETiFa3HxHLgQLRqpbp7/u4mOKw9dtoL.p2ltoyPRgL9C4Y6rnM3.', 'foto-Candra-918717056.jpg', 'adm', '2019-09-10 17:51:22', '2019-09-12 02:48:27'),
	(4, 'Didit', 'didit@gmail.com', '081234567891', 'L', 'Islam', 'Kediri', 'didit', '$2y$10$LETiFa3HxHLgQLRqpbp7/u4mOKw9dtoL.p2ltoyPRgL9C4Y6rnM3.', 'foto-Didit-470850377.jpg', 'adm', '2019-09-11 05:15:40', '2019-09-12 02:48:42'),
	(9, 'ab', 'abcd@gmail.com', '081234567891', 'P', 'Islam', 'a', 'sari', '$2y$10$89NhCnl7f0qEJMXgCYvA8.sKwxM4VNvu0qQ2/zAY7L29gURcXMAEu', 'foto-ab-774173959.jpg', 'usr', '2019-09-11 08:52:12', '2019-09-12 03:45:41'),
	(11, 'Oda', 'odaodi@gmail.com', '081234567891', 'L', 'Islam', 'aaaaaa', 'odaaaaaaaaa', '$2y$10$zpKgBjn3A6pCbw4e5zBNZuaO2I8jrA1daUG4dSaeIybEq/KRCoCLK', 'foto-Oda-10793317.jpeg', 'usr', '2019-09-12 03:10:39', '2019-09-12 03:10:39'),
	(12, 'Diditsatya', 'diditsatya@gmail.com', '081234567891', 'L', 'Islam', 'aaaaaaaaaa', 'aaaaaaaaa', '$2y$10$oyvgGWWobrhN.dgPgqtNqOozoisySDAuzPWqoQzWySyTp8OwBI6hO', 'foto-Diditsatya-823271561.jpg', 'adm', '2019-09-12 03:20:06', '2019-09-12 03:20:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
