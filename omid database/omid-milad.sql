-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: omidframework
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه کاربر',
  `Email` varchar(45) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  `Mobile` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'موبایل',
  `Disabled` enum('NO','YES') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO' COMMENT 'فعال یا غیرفعال',
  `ExpireDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'تاریخ انقضا',
  `UserName` varchar(60) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام کاربری',
  `PSWD1` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'پسورد1',
  `PSWD2` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'پسورد2',
  `PswdShouldBeChanged` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO' COMMENT 'پسورد باید تغییر کند',
  `PersonTypeId` enum('ADMIN','EMPLOYER','MINISTRANT') COLLATE utf8_persian_ci NOT NULL COMMENT 'نوع کاربر',
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT COMMENT='کاربران سیستم';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'azam.feyznia@gmail.com','09354077030','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(2,'azam_feyznia@yahoo.com','09354077020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','EMPLOYER'),(3,'azi.feyznia@gmail.com','09354077000','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(4,'hanhen1111@gmail.com','09121345678','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(5,'azii.feyznia@gmail.com','09337007020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(6,'aziii.feyznia@gmail.com','09338007020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(7,'aziiii.feyznia@gmail.com','09339007020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(8,'aziiiii.feyznia@gmail.com','09336007020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(9,'aziiiiii.feyznia@gmail.com','09335007020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(10,'azam_feyznia@yahoo.comm','09354087020','NO','2017-07-11 13:13:17',NULL,'531c154c293dfa54ca8eb77046c68c1aad5eb1f8',NULL,'NO','MINISTRANT'),(11,'ranaei.milad72@gmail.com','09337008290','NO','2017-07-11 20:30:45',NULL,'63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1',NULL,'NO','MINISTRANT'),(12,'owncloud1372@gmail.com','09443545432','NO','2017-07-11 13:25:25',NULL,'63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1',NULL,'NO','MINISTRANT');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deactiveinfo`
--

DROP TABLE IF EXISTS `deactiveinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deactiveinfo` (
  `DeactiveId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه لغو عضویت',
  `DeactiveReason` enum('TEMPORARY','MANY_MESSAGES_REQUESTS','DONT_KNOW_HOW_USE','DONT_FIND_USEFUL','PRIVACY_CONCERN','ACCOUNT_HACKED','DONT_FEEL_SAFE','HAVE_ANOTHER_ACCOUNT') COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'علت لغو عضویت ',
  `UserId` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `DeactiveDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'تاریخ لغو عضویت',
  `Comment` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیحات',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ',
  PRIMARY KEY (`DeactiveId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT COMMENT='اطلاعات لغو عضویت';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deactiveinfo`
--

LOCK TABLES `deactiveinfo` WRITE;
/*!40000 ALTER TABLE `deactiveinfo` DISABLE KEYS */;
INSERT INTO `deactiveinfo` VALUES (1,'TEMPORARY',1,'2017-06-25 05:01:00','','UNDER_REVIEW',NULL),(2,'TEMPORARY',1,'2017-06-25 05:01:00','','UNDER_REVIEW',NULL),(3,NULL,1,'2017-06-25 05:01:00','hhhhh','UNDER_REVIEW',NULL),(4,'TEMPORARY',1,'2017-06-25 05:01:00',NULL,'UNDER_REVIEW',NULL),(5,'TEMPORARY',1,'2017-06-25 05:02:02',NULL,'UNDER_REVIEW',NULL),(6,'TEMPORARY',1,'2017-06-25 05:33:35',NULL,'UNDER_REVIEW',NULL),(7,'TEMPORARY',1,'2017-06-25 05:36:54',NULL,'UNDER_REVIEW',NULL),(8,'TEMPORARY',1,'2017-06-26 07:29:00',NULL,'UNDER_REVIEW',NULL);
/*!40000 ALTER TABLE `deactiveinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password`
--

DROP TABLE IF EXISTS `reset_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Reset_Email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `Token` varchar(250) CHARACTER SET utf8 NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password`
--

LOCK TABLES `reset_password` WRITE;
/*!40000 ALTER TABLE `reset_password` DISABLE KEYS */;
INSERT INTO `reset_password` VALUES (22,'ranaei.milad72@gmail.com','4QBSD1A2CE961VVPRPUA73YTO515E6YF583TA6MYA45OFSTCW2ATQZ5EJOJV2PCPVVH8DROMLMMFGSC7CF48MZS2GP8PC55U6V66','2017-07-12 00:38:03'),(23,'ranaei.milad72@gmail.com','QYDZR6R14O1HWB8MB301ZXEX8KAATRXB58WTAFTPWS7DAADZSB7Z8YYQMZ1VHCG7W40DRDRMRZB6QK0THIO2S6OY1USU0L4VCXRC','2017-07-12 00:38:53'),(24,'ranaei.milad72@gmail.com','6M2DQEZUXACET0B6YW75450AGQM8STLU62R3MT0BJGM7DXYUATCAUY7MZXIWDHCTX1AAGKXM87JDQSQRQ6TYVUVFDDAZ0FHBEZ56','2017-07-12 00:39:03'),(25,'ranaei.milad72@gmail.com','I4MP5PUPSOSZVJCEBHDM58XDVY86X6G2QE2OGJIZIPVVUGFLXMLXO4G77GOU6WEUB2QKRHLGHR54TCV546FGT3W2UCYM4T8OC26B','2017-07-12 00:39:49'),(26,'owncloud1372@gmail.com','VTJ929GVJHXEZEF5WY3F23RMJC06WQLWT1KTY3GCWB6LV8QTX1Z30CJ01XW5QEE69OE3DVI8GK9PU0P8E6WRULAVXFL1YP1OC4QJ','2017-07-12 00:41:27'),(27,'owncloud1372@gmail.com','WUT3GMJVFZJ4H6DQGQLOKRUHM7FLYKZT301QDS4E2G5UCDPGV1GDUVLZEC24B0CR8SXRGPZG0WFCL6SSGV6AGICDUK5X6AL6F9OW','2017-07-12 00:42:18'),(28,'owncloud1372@gmail.com','Z875D4BYXSO0WMC0KQEYACRW4CYOFMVW41GQVMWHIZ6VPGQZRIXLCFRYHSWC29G8I319KRPPZSMCMP7QY96KGJMU46VDSAUJW2IF','2017-07-12 00:43:31'),(30,'ranaei.milad72@gmail.com','XC4YV3D83YC8SS2CZRULI7OWPJOZVD5VL0BYY9D7I4JTI5PZ9RWG9QHJHPAQSS38LRG35E04ZGRAVR6M60YVFPFYFRFCZMTCYDUQ','2017-07-12 00:57:25'),(31,'ranaei.milad72@gmail.com','25PY4QX9BK89Z0VAB8OA3E7TRQL5HXFRWYS32J25QMXL542ZZAK53Q3A4L7SJU43AJZ0HG94KQGJBGBSCRQE6XXQJ0O5IEFJ17Y2','2017-07-12 00:59:11'),(32,'ranaei.milad72@gmail.com','K1G44PJPC72JTTQ3MZXXVHZBFL371XEWFYMAA75AL15YYQGQ41KP3B1HRSIYRFADLQY8GGSOZ7PM7TRGEAO0IXLT0UXYADXPUKD8','2017-07-12 00:59:37'),(33,'ranaei.milad72@gmail.com','FP199T48FSK4I0SL7E2BQFI4MZV0Q00BRXVGJYMWMXW7VOH9ZSCGQ0CT28V07TC8M23ZR4SPSGE0EZSWUZ5SVCO9DSVCV1I954JB','2017-07-12 01:00:04');
/*!40000 ALTER TABLE `reset_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sysaudit`
--

DROP TABLE IF EXISTS `sysaudit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sysaudit` (
  `RecId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه رکورد',
  `UserId` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'شناسه کاربر',
  `PageTitle` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان صفحه',
  `Action` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عمل انجام شده',
  `ActionDate` date NOT NULL COMMENT 'تاریخ انجام عملیات',
  `IPAddress` bigint(20) DEFAULT NULL COMMENT 'آدرس IP',
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات حسابرسی سیستم';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sysaudit`
--

LOCK TABLES `sysaudit` WRITE;
/*!40000 ALTER TABLE `sysaudit` DISABLE KEYS */;
/*!40000 ALTER TABLE `sysaudit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `syslog`
--

DROP TABLE IF EXISTS `syslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `syslog` (
  `LogId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه لاگ',
  `UserId` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'شناسه کاربر',
  `TableName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام جدول',
  `RecId` int(11) NOT NULL COMMENT 'شناسه رکورد',
  `ActionType` enum('INSERT','DELETE','UPDATE') COLLATE utf8_persian_ci NOT NULL COMMENT 'نوع عمل انجام شده',
  `ActionDate` date NOT NULL COMMENT 'تاریخ انجام عملیات',
  `IPAddress` bigint(20) DEFAULT NULL COMMENT 'آدرس IP',
  PRIMARY KEY (`LogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT COMMENT='اطلاعات لاگ سیستم';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `syslog`
--

LOCK TABLES `syslog` WRITE;
/*!40000 ALTER TABLE `syslog` DISABLE KEYS */;
/*!40000 ALTER TABLE `syslog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-12 10:52:40
