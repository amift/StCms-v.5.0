-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.25-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_phalcon_stcms5.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text DEFAULT NULL,
  `name` text NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_published` int(11) NOT NULL DEFAULT 1,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.articles: ~0 rows (approximately)
DELETE FROM `articles`;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `created`, `updated`, `views`) VALUES
  (4, 'ophviamwydi', 'Test article', '', '', '', '', '', 1, 1458056960, 1458471698, 20);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.catalog
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text DEFAULT NULL,
  `name` text NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_published` int(11) NOT NULL DEFAULT 1,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.catalog: ~0 rows (approximately)
DELETE FROM `catalog`;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `created`, `updated`, `parent_id`, `views`) VALUES
  (1, 'main', 'Main element', '', '', '', '', '', 1, 1457626194, 1457628284, 0, 15);
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.imagesarticles
CREATE TABLE IF NOT EXISTS `imagesarticles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.imagesarticles: ~0 rows (approximately)
DELETE FROM `imagesarticles`;
/*!40000 ALTER TABLE `imagesarticles` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagesarticles` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.imagescatalog
CREATE TABLE IF NOT EXISTS `imagescatalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.imagescatalog: ~0 rows (approximately)
DELETE FROM `imagescatalog`;
/*!40000 ALTER TABLE `imagescatalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagescatalog` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.imagesnews
CREATE TABLE IF NOT EXISTS `imagesnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.imagesnews: ~0 rows (approximately)
DELETE FROM `imagesnews`;
/*!40000 ALTER TABLE `imagesnews` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagesnews` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.imagespages
CREATE TABLE IF NOT EXISTS `imagespages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.imagespages: ~0 rows (approximately)
DELETE FROM `imagespages`;
/*!40000 ALTER TABLE `imagespages` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagespages` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.imagesproducts
CREATE TABLE IF NOT EXISTS `imagesproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.imagesproducts: ~0 rows (approximately)
DELETE FROM `imagesproducts`;
/*!40000 ALTER TABLE `imagesproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagesproducts` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.imagesusers
CREATE TABLE IF NOT EXISTS `imagesusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.imagesusers: ~0 rows (approximately)
DELETE FROM `imagesusers`;
/*!40000 ALTER TABLE `imagesusers` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagesusers` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text DEFAULT NULL,
  `name` text NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_published` int(11) NOT NULL DEFAULT 1,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.news: ~0 rows (approximately)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `created`, `updated`, `views`) VALUES
  (2, 'aldklwrusek', 'Test news', 'Test news', 'Test news', 'Test news', 'Test news', 'Test news', 1, 1457966387, 1457966391, 5);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(300) DEFAULT NULL,
  `name` text NOT NULL,
  `title` text DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_published` int(11) NOT NULL DEFAULT 1,
  `is_menu` int(11) NOT NULL DEFAULT 1,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.pages: ~0 rows (approximately)
DELETE FROM `pages`;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `is_menu`, `created`, `updated`, `views`, `parent_id`, `type`) VALUES
  (1, 'main', 'Main page', 'Main page', 'Main page', 'Main page', 'Main page summary', 'Main page content', 1, 0, 1455389920, 1457419532, 173, 0, 'main'),
  (3, 'kbshcapnctj', 'Text page', '', '', '', 'Text summary page', '', 1, 1, 1455438951, 1458487429, 267, 1, 'text'),
  (4, 'xxhucelmsry', 'Catalog page', '', '', '', 'Catalog summary page', '', 1, 1, 1458054370, 1458487446, 227, 1, 'cats'),
  (5, 'rixwopdehqc', 'Custom page', '', '', '', 'Custom summary page', '', 1, 1, 1458054398, 1458487459, 114, 1, 'users'),
  (6, 'nvptmlcesnc', 'News page', '', '', '', 'News page summary', '', 1, 1, 1458054421, 1458487470, 103, 1, 'news'),
  (7, 'osgokmcrqsi', 'Article page', '', '', '', 'Summary page', '', 1, 1, 1458412935, 1458487480, 176, 1, 'articles');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.pagetypes
CREATE TABLE IF NOT EXISTS `pagetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.pagetypes: ~0 rows (approximately)
DELETE FROM `pagetypes`;
/*!40000 ALTER TABLE `pagetypes` DISABLE KEYS */;
INSERT INTO `pagetypes` (`id`, `ident`, `name`, `status`) VALUES
  (1, 'main', 'Main page', 1),
  (2, 'text', 'Text page', 1),
  (3, 'users', 'Users page', 1),
  (4, 'cats', 'Category Page', 1),
  (5, 'news', 'News page', 1),
  (6, 'articles', 'Articles page', 1);
/*!40000 ALTER TABLE `pagetypes` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text DEFAULT NULL,
  `name` text NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `current_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `old_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_published` int(11) NOT NULL DEFAULT 1,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.products: ~0 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table db_phalcon_stcms5.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `views` int(11) NOT NULL DEFAULT 0,
  `created` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table db_phalcon_stcms5.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `status`, `role`, `views`, `created`) VALUES
  (2, 'Administrator', 'WebMaster', 'admin@admin.ru', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin', 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
