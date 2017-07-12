-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 11:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omidframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `UserId` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `Email` varchar(45) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  `Mobile` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'موبایل',
  `Disabled` enum('NO','YES') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO' COMMENT 'فعال یا غیرفعال',
  `ExpireDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'تاریخ انقضا',
  `UserName` varchar(60) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام کاربری',
  `PSWD1` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'پسورد1',
  `PSWD2` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'پسورد2',
  `PswdShouldBeChanged` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO' COMMENT 'پسورد باید تغییر کند',
  `PersonTypeId` enum('ADMIN','EMPLOYER','MINISTRANT') COLLATE utf8_persian_ci NOT NULL COMMENT 'نوع کاربر'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='کاربران سیستم' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`UserId`, `Email`, `Mobile`, `Disabled`, `ExpireDate`, `UserName`, `PSWD1`, `PSWD2`, `PswdShouldBeChanged`, `PersonTypeId`) VALUES
(1, 'azam.feyznia@gmail.com', '09354077030', 'NO', '2017-06-26 07:29:18', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT'),
(2, 'azam_feyznia@yahoo.com', '09354077020', 'NO', '2017-06-14 04:56:27', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'EMPLOYER'),
(3, 'azi.feyznia@gmail.com', '09354077000', 'NO', '2017-06-18 09:10:04', NULL, 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, 'NO', 'MINISTRANT'),
(4, 'hanhen1111@gmail.com', '09121345678', 'NO', '2017-06-19 11:02:51', NULL, '5cd5178cb90d179a88adf253fde44f9fd62a994b', NULL, 'NO', 'MINISTRANT'),
(5, 'azii.feyznia@gmail.com', '09337007020', 'NO', '2017-06-27 06:31:03', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT'),
(6, 'aziii.feyznia@gmail.com', '09338007020', 'NO', '2017-06-27 06:33:56', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT'),
(7, 'aziiii.feyznia@gmail.com', '09339007020', 'NO', '2017-06-27 06:35:01', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT'),
(8, 'aziiiii.feyznia@gmail.com', '09336007020', 'NO', '2017-06-27 06:38:16', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT'),
(9, 'aziiiiii.feyznia@gmail.com', '09335007020', 'NO', '2017-06-27 06:42:59', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT'),
(10, 'azam_feyznia@yahoo.comm', '09354087020', 'NO', '2017-06-27 06:46:35', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 'NO', 'MINISTRANT');

-- --------------------------------------------------------

--
-- Table structure for table `deactiveinfo`
--

CREATE TABLE `deactiveinfo` (
  `DeactiveId` int(11) NOT NULL COMMENT 'شناسه لغو عضویت',
  `DeactiveReason` enum('TEMPORARY','MANY_MESSAGES_REQUESTS','DONT_KNOW_HOW_USE','DONT_FIND_USEFUL','PRIVACY_CONCERN','ACCOUNT_HACKED','DONT_FEEL_SAFE','HAVE_ANOTHER_ACCOUNT') COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'علت لغو عضویت ',
  `UserId` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `DeactiveDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'تاریخ لغو عضویت',
  `Comment` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیحات',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات لغو عضویت' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `deactiveinfo`
--

INSERT INTO `deactiveinfo` (`DeactiveId`, `DeactiveReason`, `UserId`, `DeactiveDate`, `Comment`, `Status`, `LogId`) VALUES
(1, 'TEMPORARY', 1, '2017-06-25 05:01:00', '', 'UNDER_REVIEW', NULL),
(2, 'TEMPORARY', 1, '2017-06-25 05:01:00', '', 'UNDER_REVIEW', NULL),
(3, NULL, 1, '2017-06-25 05:01:00', 'hhhhh', 'UNDER_REVIEW', NULL),
(4, 'TEMPORARY', 1, '2017-06-25 05:01:00', NULL, 'UNDER_REVIEW', NULL),
(5, 'TEMPORARY', 1, '2017-06-25 05:02:02', NULL, 'UNDER_REVIEW', NULL),
(6, 'TEMPORARY', 1, '2017-06-25 05:33:35', NULL, 'UNDER_REVIEW', NULL),
(7, 'TEMPORARY', 1, '2017-06-25 05:36:54', NULL, 'UNDER_REVIEW', NULL),
(8, 'TEMPORARY', 1, '2017-06-26 07:29:00', NULL, 'UNDER_REVIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sysaudit`
--

CREATE TABLE `sysaudit` (
  `RecId` int(11) NOT NULL COMMENT 'شناسه رکورد',
  `UserId` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'شناسه کاربر',
  `PageTitle` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان صفحه',
  `Action` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عمل انجام شده',
  `ActionDate` date NOT NULL COMMENT 'تاریخ انجام عملیات',
  `IPAddress` bigint(20) DEFAULT NULL COMMENT 'آدرس IP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات حسابرسی سیستم';

-- --------------------------------------------------------

--
-- Table structure for table `syslog`
--

CREATE TABLE `syslog` (
  `LogId` int(11) NOT NULL COMMENT 'شناسه لاگ',
  `UserId` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'شناسه کاربر',
  `TableName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام جدول',
  `RecId` int(11) NOT NULL COMMENT 'شناسه رکورد',
  `ActionType` enum('INSERT','DELETE','UPDATE') COLLATE utf8_persian_ci NOT NULL COMMENT 'نوع عمل انجام شده',
  `ActionDate` date NOT NULL COMMENT 'تاریخ انجام عملیات',
  `IPAddress` bigint(20) DEFAULT NULL COMMENT 'آدرس IP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات لاگ سیستم' ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `deactiveinfo`
--
ALTER TABLE `deactiveinfo`
  ADD PRIMARY KEY (`DeactiveId`);

--
-- Indexes for table `sysaudit`
--
ALTER TABLE `sysaudit`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `syslog`
--
ALTER TABLE `syslog`
  ADD PRIMARY KEY (`LogId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه کاربر', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `deactiveinfo`
--
ALTER TABLE `deactiveinfo`
  MODIFY `DeactiveId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه لغو عضویت', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sysaudit`
--
ALTER TABLE `sysaudit`
  MODIFY `RecId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه رکورد';
--
-- AUTO_INCREMENT for table `syslog`
--
ALTER TABLE `syslog`
  MODIFY `LogId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه لاگ';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
