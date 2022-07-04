# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: shareposts
# Generation Time: 2022-07-04 00:05:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `date_created`)
VALUES
	(1,9,9,'testt','2022-07-03 22:32:18'),
	(2,7,9,'yoo','2022-07-03 22:32:34'),
	(3,9,9,'sdff','2022-07-03 22:43:56'),
	(4,9,9,'My Comment','2022-07-03 22:52:20'),
	(5,9,9,'sdff','2022-07-03 22:53:46'),
	(6,9,9,'jhk','2022-07-03 22:54:09'),
	(7,9,9,'jhkdggg','2022-07-03 22:54:20'),
	(8,9,9,'jhkdgggasdd','2022-07-03 22:54:38'),
	(9,9,9,'sdfsdfff','2022-07-03 22:55:00'),
	(10,7,9,'this is cool','2022-07-04 00:48:34'),
	(11,9,9,'fdgfdgv','2022-07-04 01:16:05'),
	(12,6,9,'Is this working','2022-07-04 01:16:44'),
	(13,10,1,'I like this!','2022-07-04 01:19:05'),
	(14,11,1,'Damn this is cool','2022-07-04 01:19:23');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT '',
  `email` varchar(64) DEFAULT '',
  `rsvp` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prefferences` varchar(264) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;

INSERT INTO `guests` (`id`, `name`, `email`, `rsvp`, `date_added`, `prefferences`)
VALUES
	(17,'Byron Jacobs','byron@mywebs.co.za',1,'2022-07-03 01:31:42','a:3:{s:6:\"drinks\";s:9:\"Cooldrink\";s:5:\"foods\";s:4:\"Meat\";s:13:\"accommodation\";s:10:\"Sleep Over\";}'),
	(19,'Michael','michael@test.com',1,'2022-07-02 22:59:33','a:3:{s:6:\"drinks\";s:7:\"Alcahol\";s:5:\"foods\";s:5:\"Vegan\";s:13:\"accommodation\";s:10:\"Sleep Over\";}'),
	(30,'Greg Dicks','greg@dicks.com',1,'2022-07-03 00:10:28','a:3:{s:6:\"drinks\";s:7:\"Alcahol\";s:5:\"foods\";s:5:\"Vegan\";s:13:\"accommodation\";s:12:\"Not Sleeping\";}'),
	(31,'Jono','jono@booth.com',2,NULL,NULL),
	(32,'Amelie Lens','amelie@going.com',1,'2022-07-03 01:25:06','a:3:{s:6:\"drinks\";s:9:\"Cooldrink\";s:5:\"foods\";s:5:\"Vegan\";s:13:\"accommodation\";s:10:\"Sleep Home\";}'),
	(33,'Jimmy','jimmy@email.com',1,'2022-07-03 04:23:44','a:3:{s:6:\"drinks\";s:5:\"Water\";s:5:\"foods\";s:5:\"Vegan\";s:13:\"accommodation\";s:12:\"Not Sleeping\";}'),
	(34,'Michael','michael@home.com',2,NULL,NULL),
	(35,'Daniel','daniel@coming.com',1,'2022-07-03 04:34:26','a:3:{s:6:\"drinks\";s:7:\"Alcahol\";s:5:\"foods\";s:4:\"Meat\";s:13:\"accommodation\";s:10:\"Sleep Over\";}'),
	(36,'Michael','m2@mine.com',1,'2022-07-04 01:02:50','a:3:{s:6:\"drinks\";s:9:\"Cooldrink\";s:5:\"foods\";s:4:\"Meat\";s:13:\"accommodation\";s:10:\"Sleep Over\";}'),
	(37,'Broomo','broom@test.com',1,'2022-07-04 01:03:55','a:3:{s:6:\"drinks\";s:9:\"Cooldrink\";s:5:\"foods\";s:7:\"Nothing\";s:13:\"accommodation\";s:10:\"Sleep Over\";}'),
	(38,'byron2','byron@mywebs.co.zaa',1,NULL,NULL);

/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ideas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ideas`;

CREATE TABLE `ideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(64) NOT NULL DEFAULT '',
  `idea` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ideas` WRITE;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;

INSERT INTO `ideas` (`id`, `name`, `email`, `idea`)
VALUES
	(1,'byron','byron@mywebs.co.za','My idea'),
	(2,'byron','byron3@mywebs.co.za','Website'),
	(3,'byron','byron4@mywebs.co.za','a:2:{i:0;s:7:\"Website\";i:1;s:7:\"Website\";}'),
	(4,'byron','byrons@mywebs.co.za','a:2:{s:5:\"idea1\";s:7:\"Website\";s:5:\"idea2\";s:7:\"Support\";}'),
	(5,'byron','byron44@mywebs.co.za','Website'),
	(6,'byron','byron44677@mywebs.co.za','Support'),
	(7,'byron','byron@msssywebs.co.za','Website'),
	(8,'byron','byron@mywebs.co.zasss','Support'),
	(9,'byron','byron@mywebs.co.zaddfdff','Service'),
	(10,'byronff','byron@mywebs.co.zafffff','Website'),
	(11,'byron','byron@mywebs.co.zadsfsfsdf','Website'),
	(12,'byron','steve@spinealign.co.za','Service'),
	(13,'byron','byron@mywebs.co.zasadsadasd','Website'),
	(14,'byronsss','byron@mywebs.co.zasadsadasdddd','Service'),
	(15,'byronsss','byron@mywebs.co.zasadsadasddddss','Service'),
	(16,'byronsss','byron@mywebs.co.zasadsadasddddssaa','Service'),
	(17,'byronsss','byron@mywebs.co.zasadsadasddddssaaa','Website'),
	(18,'byron2','byron@mywebs.co.za23333','Support'),
	(19,'byron','byron@mywebs.co.zarwrererr','Website'),
	(20,'byron','byron@mywebs.co.zarwrererraa','Website'),
	(21,'byron','byron@mywebs.co.zarwrererraaa','Website'),
	(22,'byron','byron@mywebs.co.zarwrererraaaa','Website'),
	(23,'byron','byron@mywebs.co.zarwrererraaaaa','Website'),
	(24,'byron','byron@mywebs.co.zarwrererraaaaaa','Website'),
	(25,'byron','byron@mywebs.co.zaasdasd','Website'),
	(26,'byron','byron@mywebs.co.zazxfg','Website'),
	(27,'byron','byron@mywebs.co.zaerr','Website'),
	(28,'byron','byron@mywebs.co.zaerra','Website'),
	(29,'byron','byron@mywebs.co.zaerraaaa','Website'),
	(30,'byron','byron@mywebs.co.zaerraaaazzz','Website');

/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`)
VALUES
	(3,9,'Is this a good idea?','we are trying to do this','2022-07-04 01:17:42'),
	(10,9,'Welcome!','hey check out my brand new site, you can RSVP, and add a post as your ideas!','2022-07-04 01:18:15'),
	(11,1,'Wedding Ideas','Here are some wedding ideas we are planning on having, feel free to add your own here','2022-07-04 01:18:54');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL DEFAULT '',
  `status` varchar(256) DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `status`, `password`)
VALUES
	(1,'byron','byron@mywebs.co.za','admin','$2y$10$BHiJnVwUJY/KLL6CcZvxxuafeyJGNS1mSHnFusIRXs671Af7Y8QpS'),
	(6,'client','client@test.com','','$2y$10$syK5AiSA.tdGpn0dcqCrAe1VIfnXS3v0cCc1HEkTy3h0ugfTXEYQe'),
	(7,'test2','test2@gmail.com','','$2y$10$Ughibbr5dL2eTGaUd9LgsOsy82LFCpEDTBJI05/1Bv9y.mrPfSAie'),
	(8,'test3','test@3.com','','$2y$10$RFDRd.W/QQOSenNDBqqkKuvP19z5ufOaP5yPhkekoFbBxy/f3j8jm'),
	(9,'daniel','user@test.com','user','$2y$10$TgWQyAGl2pZbHC.XypENN.HZkd2u.SW.xXupcDE7qbRDYIlFvoSgK');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
