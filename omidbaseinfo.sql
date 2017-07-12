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
-- Database: `omidbaseinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityId` int(11) NOT NULL COMMENT 'شناسه شهر',
  `StateId` smallint(6) NOT NULL COMMENT 'شناسه استان',
  `CityName` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام شهر'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات شهرها';

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityId`, `StateId`, `CityName`) VALUES
(1, 1, 'مشهد');

-- --------------------------------------------------------

--
-- Table structure for table `cooperationtypes`
--

CREATE TABLE `cooperationtypes` (
  `CooperationTypeId` int(11) NOT NULL COMMENT 'شناسه نوع همکاری',
  `CooperationTypeName` varchar(200) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام نوع همکاری'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات انواع همکاری' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cooperationtypes`
--

INSERT INTO `cooperationtypes` (`CooperationTypeId`, `CooperationTypeName`) VALUES
(1, 'فول تایم');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryId` int(11) NOT NULL COMMENT 'شناسه کشور',
  `CountryName` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام کشور'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات کشورها' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryId`, `CountryName`) VALUES
(1, 'ایران');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `DegreeId` int(11) NOT NULL COMMENT 'شناسه مدرک تحصیلی',
  `DegreeName` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام مدرک تحصیلی',
  `Orderr` tinyint(4) DEFAULT NULL COMMENT 'ترتیب'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات مدارک تحصیلی' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`DegreeId`, `DegreeName`, `Orderr`) VALUES
(1, 'فوق لیسانس', 6);

-- --------------------------------------------------------

--
-- Table structure for table `employersizes`
--

CREATE TABLE `employersizes` (
  `EmployerSizeId` int(11) NOT NULL COMMENT 'شناسه اندازه کارفرما',
  `EmployerSizeTitle` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان اندازه کارفرما',
  `EmployerSizeOrder` tinyint(4) DEFAULT NULL COMMENT 'ترتیب اندازه ها'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات اندازه کارفرما' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `employersizes`
--

INSERT INTO `employersizes` (`EmployerSizeId`, `EmployerSizeTitle`, `EmployerSizeOrder`) VALUES
(1, 'کمتر از 10 نفر', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `institutecategories`
--

CREATE TABLE `institutecategories` (
  `InstituteCategoryId` int(11) NOT NULL COMMENT 'شناسه دسته موسسه',
  `InstituteCategoryName` varchar(300) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام دسته موسسه'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات دسته های موسسات آموزشی' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `jobgroups`
--

CREATE TABLE `jobgroups` (
  `JobGroupId` int(11) NOT NULL COMMENT 'شناسه گروه شغلی',
  `JobGroupName` varchar(45) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام گروه شغلی',
  `ServiceCategoryId` int(11) NOT NULL COMMENT 'شناسه دسته خدمت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات گروههای شغلی' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jobgroups`
--

INSERT INTO `jobgroups` (`JobGroupId`, `JobGroupName`, `ServiceCategoryId`) VALUES
(1, 'برنامه نویس', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicecategories`
--

CREATE TABLE `servicecategories` (
  `ServiceCategoryId` int(11) NOT NULL COMMENT 'شناسه دسته خدمت',
  `ServiceCategoryName` varchar(45) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام دسته خدمت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات دسته های خدمت' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `servicecategories`
--

INSERT INTO `servicecategories` (`ServiceCategoryId`, `ServiceCategoryName`) VALUES
(1, 'کامپیوتر');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `SkillId` int(11) NOT NULL COMMENT 'شناسه مهارت',
  `SkillName` varchar(80) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام مهارت',
  `JobGroupId` tinyint(4) NOT NULL COMMENT 'شناسه گروه شغلی مهارت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات مهارتها' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`SkillId`, `SkillName`, `JobGroupId`) VALUES
(1, 'برنامه نویس php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `StateId` int(11) NOT NULL COMMENT 'شناسه استان',
  `StateName` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام استان'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات استانها';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`StateId`, `StateName`) VALUES
(1, 'خراسان رضوی');

-- --------------------------------------------------------

--
-- Table structure for table `studyfields`
--

CREATE TABLE `studyfields` (
  `StudyFieldId` int(11) NOT NULL COMMENT 'شناسه رشته تحصیلی',
  `StudyFieldName` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام رشته تحصیلی',
  `InstituteCategoryId` smallint(6) DEFAULT NULL COMMENT 'دسته موسسه مربوط به رشته تحصیلی'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات رشته های تحصیلی ' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `studyfields`
--

INSERT INTO `studyfields` (`StudyFieldId`, `StudyFieldName`, `InstituteCategoryId`) VALUES
(1, 'کامپیوتر', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `cooperationtypes`
--
ALTER TABLE `cooperationtypes`
  ADD PRIMARY KEY (`CooperationTypeId`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`DegreeId`);

--
-- Indexes for table `employersizes`
--
ALTER TABLE `employersizes`
  ADD PRIMARY KEY (`EmployerSizeId`);

--
-- Indexes for table `institutecategories`
--
ALTER TABLE `institutecategories`
  ADD PRIMARY KEY (`InstituteCategoryId`);

--
-- Indexes for table `jobgroups`
--
ALTER TABLE `jobgroups`
  ADD PRIMARY KEY (`JobGroupId`);

--
-- Indexes for table `servicecategories`
--
ALTER TABLE `servicecategories`
  ADD PRIMARY KEY (`ServiceCategoryId`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`SkillId`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `studyfields`
--
ALTER TABLE `studyfields`
  ADD PRIMARY KEY (`StudyFieldId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه شهر', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cooperationtypes`
--
ALTER TABLE `cooperationtypes`
  MODIFY `CooperationTypeId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه نوع همکاری', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه کشور', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `DegreeId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه مدرک تحصیلی', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employersizes`
--
ALTER TABLE `employersizes`
  MODIFY `EmployerSizeId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه اندازه کارفرما', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institutecategories`
--
ALTER TABLE `institutecategories`
  MODIFY `InstituteCategoryId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه دسته موسسه';
--
-- AUTO_INCREMENT for table `jobgroups`
--
ALTER TABLE `jobgroups`
  MODIFY `JobGroupId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه گروه شغلی', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `servicecategories`
--
ALTER TABLE `servicecategories`
  MODIFY `ServiceCategoryId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه دسته خدمت', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `SkillId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه مهارت', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه استان', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studyfields`
--
ALTER TABLE `studyfields`
  MODIFY `StudyFieldId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه رشته تحصیلی', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
