-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ebewmyqz_ajtebapp
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-log-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*CREATE DATABASE ebewmyqz_ajtebapp;*/
USE dbsy2y5dvdxo5x;
--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` varchar(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address_line1` varchar(200) DEFAULT NULL,
  `agbada_length` varchar(20) DEFAULT NULL,
  `agbada_width` varchar(20) DEFAULT NULL,
  `agbada_head` varchar(20) DEFAULT NULL,
  `top_neck` varchar(20) DEFAULT NULL,
  `top_sh` varchar(20) DEFAULT NULL,
  `top_al1` varchar(100) DEFAULT NULL,
  `top_al2` varchar(20) DEFAULT NULL,
  `top_bl1` varchar(100) DEFAULT NULL,
  `top_bl2` varchar(20) DEFAULT NULL,
  `top_bl3` varchar(20) DEFAULT NULL,
  `top_burst1` varchar(100) DEFAULT NULL,
  `top_burst2` varchar(20) DEFAULT NULL,
  `top_burst3` varchar(20) DEFAULT NULL,
  `top_ra1` varchar(100) DEFAULT NULL,
  `top_ra2` varchar(20) DEFAULT NULL,
  `top_ra3` varchar(20) DEFAULT NULL,
  `top_cuffs` varchar(20) DEFAULT NULL,
  `top_alunder` varchar(20) DEFAULT NULL,
  `top_burstburst` varchar(20) DEFAULT NULL,
  `top_wrist` varchar(20) DEFAULT NULL,
  `top_armhole` varchar(20) DEFAULT NULL,
  `top_sidejoining` varchar(20) DEFAULT NULL,
  `pant_waist` varchar(20) DEFAULT NULL,
  `pant_lap` varchar(20) DEFAULT NULL,
  `pant_tl` varchar(20) DEFAULT NULL,
  `pant_knee` varchar(20) DEFAULT NULL,
  `pant_ankle` varchar(20) DEFAULT NULL,
  `pant_hips` varchar(20) DEFAULT NULL,
  `pant_wk` varchar(20) DEFAULT NULL,
  `pant_frontcrotch` varchar(20) DEFAULT NULL,
  `pant_backcrotch` varchar(20) DEFAULT NULL,
  `pant_inseam` varchar(20) DEFAULT NULL,
  `calve` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`, `firstname`, `lastname`, `email`, `phone`, `country`, `city`, `address_line1`, `agbada_length`, `agbada_width`, `agbada_head`, `top_neck`, `top_sh`, `top_al1`, `top_al2`, `top_bl1`, `top_bl2`, `top_bl3`, `top_burst1`, `top_burst2`, `top_burst3`, `top_ra1`, `top_ra2`, `top_ra3`, `top_cuffs`, `top_alunder`, `top_burstburst`, `top_wrist`, `top_armhole`, `top_sidejoining`, `pant_waist`, `pant_lap`, `pant_tl`, `pant_knee`, `pant_ankle`, `pant_hips`, `pant_wk`, `pant_frontcrotch`, `pant_backcrotch`, `pant_inseam`, `calve`, `date`) VALUES ('NLA210820','Engr. Bola','Kawu','kawu45@gmail.com','08033457733','Nigeria','Abuja','','50','32','','17 1/2','20 1/5','24 1/2','','36','','','47/46/48','46','48','19/ 16/ 13.5','16','13 1/2','Single','','17','12','12','','41','29','40 3/4','20','16','46','21','12 1/2','','','','2020-08-21 11:22:19'),('RE 040920','Mr. Kolawole ','Olalekan','customerservice@ebewelebrown.com','0212345689','Nigeria','Abuja','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2020-09-04 10:40:37'),('REN040920','Mr. Ken','Chikere','ladimange@gmail.com','09037790171','Nigeria','Abuja','6, Bashir Dalhatu Close Guzampe','','','','17','19','10.5/ 23.5','23.5','32/ 34.5','34.5','','44/ 43/45','43','45','15.5/ 14/ 12.5','14','12.5','7.5','','15.5','11','10.5','','35','27','37','18.5','15.5','41.5','22','11.5','','','','2020-09-04 10:53:09'),('RHI170920','Mr Abdullahi','Banye','customerservice@ebewelebrown.com','07080100004','Nigeria','Abuja','41, Durban Street','','','','','','',NULL,'',NULL,NULL,'',NULL,NULL,'',NULL,NULL,'','','','','','','','','','','','','','','','','','2020-09-17 16:26:42'),('RKD210820','Mr. KD','Avong','kabosh63@gmail.com','08035921209','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2020-08-21 10:07:57');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `invoice_id` varchar(16) NOT NULL,
  `customer` varchar(11) NOT NULL,
  `descriptions` varchar(250) DEFAULT NULL,
  `owners` varchar(200) DEFAULT NULL,
  `quantities` varchar(200) DEFAULT NULL,
  `prices` varchar(200) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `bbf` float DEFAULT NULL,
  `deposit` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `vat` varchar(5) DEFAULT NULL,
  `mode_of_payment` varchar(50) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `issued_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` (`invoice_id`, `customer`, `descriptions`, `owners`, `quantities`, `prices`, `amount`, `bbf`, `deposit`, `discount`, `shipping`, `vat`, `mode_of_payment`, `paid`, `issued_date`) VALUES ('RHI16411217-IN','RHI170920','{\"des1\":\"Agbada\",\"des2\":\"Encrustment\",\"des3\":\"Swarovski\",\"des4\":\"\",\"des5\":\"\",\"des6\":\"\",\"des7\":\"\"}','{\"owner1\":\"Client\",\"owner2\":\"Store\",\"owner3\":\"Store\",\"owner4\":\"NA\",\"owner5\":\"NA\",\"owner6\":\"NA\",\"owner7\":\"NA\"}','{\"qty1\":\"5\",\"qty2\":\"1\",\"qty3\":\"3\",\"qty4\":\"\",\"qty5\":\"\",\"qty6\":\"\",\"qty7\":\"\"}','{\"price1\":\"100000\",\"price2\":\"50000\",\"price3\":\"10000\",\"price4\":\"\",\"price5\":\"\",\"price6\":\"\",\"price7\":\"\"}',580000,0,550000,30000,0,'0.00','Access POS',1,'2020-09-17 16:41:16'),('RHI27401217-IN','RHI170920','{\"des1\":\"Agbada\",\"des2\":\"Encrustment\",\"des3\":\"Swarovski\",\"des4\":\"\",\"des5\":\"\",\"des6\":\"\",\"des7\":\"\"}','{\"owner1\":\"Client\",\"owner2\":\"Store\",\"owner3\":\"Store\",\"owner4\":\"NA\",\"owner5\":\"NA\",\"owner6\":\"NA\",\"owner7\":\"NA\"}','{\"qty1\":\"5\",\"qty2\":\"1\",\"qty3\":\"3\",\"qty4\":\"\",\"qty5\":\"\",\"qty6\":\"\",\"qty7\":\"\"}','{\"price1\":\"100000\",\"price2\":\"50000\",\"price3\":\"10000\",\"price4\":\"\",\"price5\":\"\",\"price6\":\"\",\"price7\":\"\"}',580000,0,550000,30000,0,'0.00','Access POS',1,'2020-09-17 16:40:27'),('RKD01190621-IN','RKD210820','{\"des1\":\"4 Kaftans\",\"des2\":\"Swarovski\",\"des3\":\"Emblem\",\"des4\":\"\",\"des5\":\"\",\"des6\":\"\",\"des7\":\"\"}','{\"owner1\":\"Company\",\"owner2\":\"Company\",\"owner3\":\"Company\",\"owner4\":\"NA\",\"owner5\":\"NA\",\"owner6\":\"NA\",\"owner7\":\"NA\"}','{\"qty1\":\"4\",\"qty2\":\"2\",\"qty3\":\"1\",\"qty4\":\"\",\"qty5\":\"\",\"qty6\":\"\",\"qty7\":\"\"}','{\"price1\":\"50000\",\"price2\":\"10000\",\"price3\":\"5000\",\"price4\":\"\",\"price5\":\"\",\"price6\":\"\",\"price7\":\"\"}',225000,0,220000,5000,0,'0.00','GTB POS',1,'2020-09-14 21:43:51');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` varchar(16) NOT NULL,
  `customer` varchar(11) NOT NULL,
  `sleeve` varchar(20) DEFAULT NULL,
  `neck` varchar(20) DEFAULT NULL,
  `embroy` varchar(20) DEFAULT NULL,
  `underlay` varchar(20) DEFAULT NULL,
  `pant` varchar(20) DEFAULT NULL,
  `back_detailing` varchar(20) DEFAULT NULL,
  `back_pocket` varchar(20) DEFAULT NULL,
  `chest_pocket` varchar(20) DEFAULT NULL,
  `side_pocket` varchar(20) DEFAULT NULL,
  `bl` varchar(20) DEFAULT NULL,
  `color_dislike` varchar(50) DEFAULT NULL,
  `design` varchar(50) DEFAULT NULL,
  `agbada_length` varchar(20) DEFAULT NULL,
  `agbada_width` varchar(20) DEFAULT NULL,
  `agbada_head` varchar(20) DEFAULT NULL,
  `top_neck` varchar(20) DEFAULT NULL,
  `top_sh` varchar(20) DEFAULT NULL,
  `top_al1` varchar(20) DEFAULT NULL,
  `top_al2` varchar(20) DEFAULT NULL,
  `top_bl1` varchar(20) DEFAULT NULL,
  `top_bl2` varchar(20) DEFAULT NULL,
  `top_bl3` varchar(20) DEFAULT NULL,
  `top_burst1` varchar(20) DEFAULT NULL,
  `top_burst2` varchar(20) DEFAULT NULL,
  `top_burst3` varchar(20) DEFAULT NULL,
  `top_ra1` varchar(20) DEFAULT NULL,
  `top_ra2` varchar(20) DEFAULT NULL,
  `top_ra3` varchar(20) DEFAULT NULL,
  `top_cuffs` varchar(20) DEFAULT NULL,
  `top_alunder` varchar(20) DEFAULT NULL,
  `top_burstburst` varchar(20) DEFAULT NULL,
  `top_wrist` varchar(20) DEFAULT NULL,
  `top_armhole` varchar(20) DEFAULT NULL,
  `top_sidejoining` varchar(20) DEFAULT NULL,
  `pant_waist` varchar(20) DEFAULT NULL,
  `pant_lap` varchar(20) DEFAULT NULL,
  `pant_tl` varchar(20) DEFAULT NULL,
  `pant_knee` varchar(20) DEFAULT NULL,
  `pant_ankle` varchar(20) DEFAULT NULL,
  `pant_hips` varchar(20) DEFAULT NULL,
  `pant_wk` varchar(20) DEFAULT NULL,
  `pant_frontcrotch` varchar(20) DEFAULT NULL,
  `pant_backcrotch` varchar(20) DEFAULT NULL,
  `pant_inseam` varchar(20) DEFAULT NULL,
  `calve` varchar(20) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`),
  KEY `customer` (`customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`order_id`, `customer`, `sleeve`, `neck`, `embroy`, `underlay`, `pant`, `back_detailing`, `back_pocket`, `chest_pocket`, `side_pocket`, `bl`, `color_dislike`, `design`, `agbada_length`, `agbada_width`, `agbada_head`, `top_neck`, `top_sh`, `top_al1`, `top_al2`, `top_bl1`, `top_bl2`, `top_bl3`, `top_burst1`, `top_burst2`, `top_burst3`, `top_ra1`, `top_ra2`, `top_ra3`, `top_cuffs`, `top_alunder`, `top_burstburst`, `top_wrist`, `top_armhole`, `top_sidejoining`, `pant_waist`, `pant_lap`, `pant_tl`, `pant_knee`, `pant_ankle`, `pant_hips`, `pant_wk`, `pant_frontcrotch`, `pant_backcrotch`, `pant_inseam`, `calve`, `order_date`) VALUES ('REF-5150072108','NLA210820','Single','Turning','','Yes','Joggers','No','Yes','Patch','Inner','36','','Sent to EBNL','50','32','','17 1/2','20 1/5','24 1/2','','36','','','47','46','48','19','16','13 1/2','Single','','17','12','12','','41','29','40 3/4','20','16','46','21','12 1/2','','','','2020-08-21 11:56:38');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(100) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `passw` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username`, `verified`, `token`, `passw`, `role`) VALUES ('alfred',1,'48dbba284e0372be4bee40d908dee9660502ed2255f40d94d33daf067e5821e1b24f4e592f3a8beae38ccb074d810a7f871c','$2y$10$PsC4sO7yTwinUee5hCMko.ZOwemmVw08UX4Ol4fmImZkHbgK/Gah2',NULL),('Thompson',1,'592800ff5ee3110c2f6a2197090b736937504c65095ca9c012eb9861ef4f5e6dd24120487d54af2365412e77dc0dbfecadda','$2y$10$Ljiv4Tkos3cSxIt0OUM1X.oJvE3IJ36primph03I9KYrrYnNmZqky',NULL),('Onoriode',1,'5fbaf67ef3ef49bc27d735d2a2da7717f1974941a94cf8069ce31cb1f35c40607915f8985ad88a3823c3bebc2760a81a0f6b','$2y$10$WnLG197yPx2ccbffuatig.4kWXN.QSiYNVqvCTeYL/2k6QNAgYr4y',NULL),('Bukola',1,'ab2468b53fd01cd08519f69b34ecb532555feea4e86ecae3b0ff7045a60fe90414755fd0ef9ccd203efce55006efe1878a34','$2y$10$VHztZOb06ZWzwjZR99EW6.FC28wWMHPIpdAgmNjacopIKYlm7XVg2',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ebewmyqz_ajtebapp'
--

--
-- Dumping routines for database 'ebewmyqz_ajtebapp'
--
/*!50003 DROP PROCEDURE IF EXISTS `ClearOldBalance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`un1fgcyxsvwxb`@`localhost` PROCEDURE `ClearOldBalance`(IN `customer` VARCHAR(16))
UPDATE invoices SET deposit = (amount - discount) WHERE customer = @customer ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-07  3:03:11
