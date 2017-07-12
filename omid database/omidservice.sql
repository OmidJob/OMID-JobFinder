-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 11:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omidservice`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `g2j` (`gdate` DATETIME) RETURNS CHAR(10) CHARSET utf8 BEGIN

    DECLARE i, gy, gm, gd,g_day_no,j_day_no, j_np,jy,jm,jd INT DEFAULT 0;

    DECLARE resout char(10);

    SET gy = YEAR(gdate)-1600;

    SET gm = MONTH(gdate)-1;

    SET gd = DAY(gdate)-1;

    

    SET g_day_no = ((365 *  gy) + mydiv( gy+3, 4 ) - mydiv( gy+99 , 100 )+ mydiv ( gy+399, 400 ) );

       SET i = 0;

    WHILE (i < gm) do

        SET  g_day_no = g_day_no + g_days_in_month(i);

        SET i = i+1; 

    end WHILE;



    if  gm > 1 and (( gy% 4 = 0 and gy%100 <> 0 )) or gy % 400 = 0 THEN 

        SET     g_day_no =    g_day_no +1;

    end IF;

       set g_day_no = g_day_no + gd; 



    SET j_day_no = g_day_no -79;

    SET j_np =  j_day_no DIV 12053;

    set j_day_no = j_day_no % 12053;

    

    SET jy = 979+33*j_np+4*mydiv(j_day_no,1461);

    set j_day_no = j_day_no % 1461;



    if j_day_no >= 366 then 

        SET jy = jy + mydiv(j_day_no-1, 365);

        SET j_day_no =( j_day_no-1) % 365;

       end if;



    SET i = 0;

    WHILE ( i < 11 and j_day_no >= j_days_in_month(i) ) do

        SET  j_day_no = j_day_no -  j_days_in_month(i);

        SET i = i+1;

    end WHILE;



       SET jm = i+1;

    SET jd = j_day_no+1;





     SET resout=CONCAT_WS('-',jy,jm,jd);



    RETURN      resout;



END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `g_days_in_month` (`m` SMALLINT) RETURNS SMALLINT(2) BEGIN

    CASE m

        WHEN 0 THEN RETURN 31;

        WHEN 1 THEN RETURN 28;

        WHEN 2 THEN RETURN 31;

        WHEN 3 THEN RETURN 30;

        WHEN 4 THEN RETURN 31;

        WHEN 5 THEN RETURN 30;

        WHEN 6 THEN RETURN 31;

        WHEN 7 THEN RETURN 31;

        WHEN 8 THEN RETURN 30;

        WHEN 9 THEN RETURN 31;

        WHEN 10 THEN RETURN 30;

        WHEN 11 THEN RETURN 31;

    END CASE;

   



END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `j_days_in_month` (`m` SMALLINT) RETURNS SMALLINT(2) BEGIN

    CASE m

        WHEN 0 THEN RETURN 31;

        WHEN 1 THEN RETURN 31;

        WHEN 2 THEN RETURN 31;

        WHEN 3 THEN RETURN 31;

        WHEN 4 THEN RETURN 31;

        WHEN 5 THEN RETURN 31;

        WHEN 6 THEN RETURN 30;

        WHEN 7 THEN RETURN 30;

        WHEN 8 THEN RETURN 30;

        WHEN 9 THEN RETURN 30;

        WHEN 10 THEN RETURN 30;

        WHEN 11 THEN RETURN 29;

    END CASE;

   



END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `mydiv` (`a` INT, `b` INT) RETURNS INT(11) BEGIN

 return FLOOR( a / b);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `educationalinfo`
--

CREATE TABLE `educationalinfo` (
  `EducationalInfoId` int(11) NOT NULL COMMENT 'شناسه اطلاعات تحصیلی',
  `MinistrantId` int(11) NOT NULL COMMENT 'شناسه ارائه دهنده خدمت',
  `DegreeId` int(11) NOT NULL COMMENT 'شناسه مدرک تحصیلی',
  `StudyFieldId` int(11) NOT NULL COMMENT 'شناسه رشته تحصیلی',
  `InstituteName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام موسسه آموزشی',
  `CountryId` int(11) NOT NULL COMMENT 'کشور',
  `StateId` int(11) NOT NULL COMMENT 'استان ',
  `CityId` int(11) NOT NULL COMMENT 'شهر ',
  `StartYear` smallint(4) NOT NULL COMMENT 'سال شروع',
  `EndYear` smallint(4) NOT NULL COMMENT 'سال پایان',
  `GPA` float(4,2) NOT NULL COMMENT 'معدل',
  `Comment` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیح',
  `DocumentsFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه اسناد',
  `NumberOfFiles` tinyint(4) DEFAULT NULL COMMENT 'تعداد فایلهای پوشه',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات تحصیلی' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `educationalinfo`
--

INSERT INTO `educationalinfo` (`EducationalInfoId`, `MinistrantId`, `DegreeId`, `StudyFieldId`, `InstituteName`, `CountryId`, `StateId`, `CityId`, `StartYear`, `EndYear`, `GPA`, `Comment`, `DocumentsFolder`, `NumberOfFiles`, `Status`, `LogId`) VALUES
(1, 1, 1, 1, 'تست', 1, 1, 1, 1390, 1393, 16.00, NULL, NULL, NULL, 'UNDER_REVIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employerinfo`
--

CREATE TABLE `employerinfo` (
  `EmployerId` int(11) NOT NULL COMMENT 'شناسه کارفرما',
  `EmployerName` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام کارفرما',
  `ContactPersonFirstName` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام رابط',
  `ContactPersonLastName` varchar(35) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام خانوادگی رابط',
  `ActivityId` int(11) DEFAULT NULL COMMENT 'شناسه حوزه فعالیت',
  `EstablishmentYear` tinyint(4) DEFAULT NULL COMMENT 'سال تاسیس',
  `EmployerSizeId` int(11) DEFAULT NULL COMMENT 'شناسه اندازه کارفرما',
  `ActivityType` enum('EXTERNAL','INTERNAL','INTERNAL_AND_EXTERNAL') COLLATE utf8_persian_ci NOT NULL DEFAULT 'INTERNAL' COMMENT 'نوع فعالیت',
  `ProductsAndServices` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'محصولات و خدمات',
  `EmployerDsc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توصیف کارفرما',
  `StateId` int(11) DEFAULT NULL COMMENT 'شناسه استان',
  `CityId` int(11) DEFAULT NULL COMMENT 'شناسه شهر',
  `Address` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'آدرس',
  `Email` varchar(45) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  `Phone` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تلفن',
  `ContactPersonMobile` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'موبایل رابط',
  `WebSite` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'وب سایت',
  `ImageName` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام تصویر',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات کارفرما' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `employerinfo`
--

INSERT INTO `employerinfo` (`EmployerId`, `EmployerName`, `ContactPersonFirstName`, `ContactPersonLastName`, `ActivityId`, `EstablishmentYear`, `EmployerSizeId`, `ActivityType`, `ProductsAndServices`, `EmployerDsc`, `StateId`, `CityId`, `Address`, `Email`, `Phone`, `ContactPersonMobile`, `WebSite`, `ImageName`, `Status`, `LogId`) VALUES
(1, 'یوبی باکس', NULL, NULL, 1, 94, 1, 'INTERNAL', NULL, NULL, NULL, NULL, NULL, 'azam_feyznia@yahoo.com', NULL, '09354077020', NULL, NULL, 'UNDER_REVIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobexperiencesinfo`
--

CREATE TABLE `jobexperiencesinfo` (
  `JobExperienceId` int(11) NOT NULL COMMENT 'شناسه سابقه شغلی',
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه سرویس',
  `EmployerName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام کارفرما',
  `EmployerPhone` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL COMMENT ' تلفن کارفرما',
  `EmployerAddress` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'آدرس کارفرما',
  `CountryId` int(11) NOT NULL COMMENT 'کشور',
  `StateId` int(11) NOT NULL COMMENT 'استان ',
  `CityId` int(11) NOT NULL COMMENT 'شهر ',
  `StartYear` smallint(4) DEFAULT NULL COMMENT 'سال شروع',
  `StartMonth` tinyint(4) DEFAULT NULL COMMENT 'ماه شروع',
  `EndYear` smallint(4) DEFAULT NULL COMMENT 'سال پایان',
  `EndMonth` tinyint(4) DEFAULT NULL COMMENT 'ماه پایان',
  `NotOverYet` tinyint(1) DEFAULT '0' COMMENT 'هنوز تمام نشده',
  `Comment` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیح',
  `DocumentsFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه اسناد',
  `NumberOfFiles` tinyint(4) DEFAULT NULL COMMENT 'تعداد فایلهای پوشه',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات سوابق شغلی' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jobexperiencesinfo`
--

INSERT INTO `jobexperiencesinfo` (`JobExperienceId`, `ServiceId`, `EmployerName`, `EmployerPhone`, `EmployerAddress`, `CountryId`, `StateId`, `CityId`, `StartYear`, `StartMonth`, `EndYear`, `EndMonth`, `NotOverYet`, `Comment`, `DocumentsFolder`, `NumberOfFiles`, `Status`, `LogId`) VALUES
(1, 1, 'تست', NULL, NULL, 1, 1, 1, 1393, 6, NULL, NULL, 1, NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(2, 1, 'تستک', '05555555', 'تستتت', 1, 1, 1, 1358, 11, NULL, NULL, 0, 'ااااا', NULL, NULL, 'UNDER_REVIEW', NULL),
(3, 1, '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, 1, '', NULL, NULL, 'UNDER_REVIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languagesinfo`
--

CREATE TABLE `languagesinfo` (
  `LanguageId` int(11) NOT NULL COMMENT 'شناسه زبان',
  `MinistrantId` int(11) NOT NULL COMMENT 'شناسه ارائه دهنده خدمت',
  `LanguageName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام زبان',
  `LevelOfExpertise` enum('BASIC','INTERMEDIATE','ADVANCED') COLLATE utf8_persian_ci NOT NULL COMMENT 'سطح تخصص',
  `Comment` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیح',
  `DocumentsFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه اسناد',
  `NumberOfFiles` tinyint(4) DEFAULT NULL COMMENT 'تعداد فایلهای پوشه',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات زبان' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `languagesinfo`
--

INSERT INTO `languagesinfo` (`LanguageId`, `MinistrantId`, `LanguageName`, `LevelOfExpertise`, `Comment`, `DocumentsFolder`, `NumberOfFiles`, `Status`, `LogId`) VALUES
(1, 1, 'انگلیسی', 'INTERMEDIATE', NULL, NULL, NULL, 'UNDER_REVIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ministrantpersonalinfo`
--

CREATE TABLE `ministrantpersonalinfo` (
  `MinistrantId` int(11) NOT NULL COMMENT 'شناسه ارائه دهنده خدمت',
  `MinistrantFirstName` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام ارائه دهنده خدمت',
  `MinistrantLastName` varchar(35) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام خانوادگی ارائه دهنده خدمت',
  `Sex` enum('MAN','WOMAN') COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'جنسیت',
  `MaritalStatus` enum('SINGLE','MARRIED') COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'وضعیت تاهل',
  `MilitaryServiceStatus` enum('NOT_SERVED','ONGOING','EXEMPTED','EDUCATIONAL_EXTEPTION','COMPLETED') COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'وضعیت نظام وظیفه',
  `YearOfBirth` tinyint(4) DEFAULT NULL COMMENT 'سال تولد',
  `MonthOfBirth` tinyint(4) DEFAULT NULL COMMENT 'ماه تولد',
  `DayOfBirth` tinyint(4) DEFAULT NULL COMMENT 'روز تولد',
  `NationalityId` int(11) DEFAULT NULL COMMENT 'ملیت',
  `MinistrantDsc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توصیف ارائه دهنده خدمت',
  `StateId` int(11) DEFAULT NULL COMMENT 'استان ارائه دهنده خدمت',
  `CityId` int(11) DEFAULT NULL COMMENT 'شهر ارائه دهنده خدمت',
  `Address` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'آدرس',
  `Phone` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تلفن',
  `Email` varchar(45) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  `Mobile` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'موبایل',
  `DocumentsFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه اسناد',
  `NumberOfFiles` tinyint(4) DEFAULT '0' COMMENT 'تعداد فایلهای پوشه',
  `ImageName` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام تصویر',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات شخصی ارائه دهنده خدمت' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ministrantpersonalinfo`
--

INSERT INTO `ministrantpersonalinfo` (`MinistrantId`, `MinistrantFirstName`, `MinistrantLastName`, `Sex`, `MaritalStatus`, `MilitaryServiceStatus`, `YearOfBirth`, `MonthOfBirth`, `DayOfBirth`, `NationalityId`, `MinistrantDsc`, `StateId`, `CityId`, `Address`, `Phone`, `Email`, `Mobile`, `DocumentsFolder`, `NumberOfFiles`, `ImageName`, `Status`, `LogId`) VALUES
(1, 'اعظم', 'فیض نیا', 'MAN', NULL, 'EXEMPTED', NULL, 1, 1, 1, '', 1, 1, '', '', 'azam.feyznia@gmail.com', '09354077030', '***15.jpg***25.jpg***16.jpg***17.jpg', 4, '1.jpg', 'UNDER_REVIEW', NULL),
(2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'azi.feyznia@gmail.com', '09354077000', NULL, NULL, '2.jpg', 'UNDER_REVIEW', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hanhen1111@gmail.com', '09121345678', NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'azii.feyznia@gmail.com', '09337007020', NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aziii.feyznia@gmail.com', '09338007020', NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aziiii.feyznia@gmail.com', '09339007020', NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aziiiii.feyznia@gmail.com', '09336007020', NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aziiiiii.feyznia@gmail.com', '09335007020', NULL, NULL, NULL, 'UNDER_REVIEW', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'azam_feyznia@yahoo.comm', '09354087020', NULL, NULL, NULL, 'UNDER_REVIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presentedservices`
--

CREATE TABLE `presentedservices` (
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه خدمت',
  `SkillId` int(11) NOT NULL COMMENT 'شناسه مهارت',
  `MinistrantId` int(11) NOT NULL COMMENT 'شناسه ارائه دهنده خدمت',
  `CooperationTypeId` int(11) DEFAULT NULL COMMENT 'شناسه نوع همکاری',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت',
  `ImageFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه تصاویر',
  `NumberOfImages` tinyint(4) DEFAULT NULL COMMENT 'تعداد تصاویر پوشه',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='سرویس‏های ارائه شده' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `presentedservices`
--

INSERT INTO `presentedservices` (`ServiceId`, `SkillId`, `MinistrantId`, `CooperationTypeId`, `Status`, `ImageFolder`, `NumberOfImages`, `LogId`) VALUES
(1, 1, 1, 1, 'UNDER_REVIEW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recommendedservices`
--

CREATE TABLE `recommendedservices` (
  `RecomId` int(11) NOT NULL COMMENT 'شناسه توصیه',
  `AdviserId` int(11) NOT NULL COMMENT 'شناسه توصیه کننده',
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه خدمت',
  `ScoreValue` tinyint(4) NOT NULL COMMENT 'امتیاز',
  `Comment` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیحات'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='سرویسهای توصیه شده' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `servicecomments`
--

CREATE TABLE `servicecomments` (
  `CommentId` int(11) NOT NULL COMMENT 'شناسه نظر',
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه خدمت',
  `CommentContent` varchar(200) COLLATE utf8_persian_ci NOT NULL COMMENT 'متن نظر',
  `CommentedFromId` int(11) NOT NULL COMMENT 'شناسه نظردهنده',
  `IsReply` enum('NO','YES') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO' COMMENT 'نظر، پاسخ است',
  `RootCommentId` int(11) DEFAULT NULL COMMENT 'شناسه نظر روت',
  `NumberOfLikes` tinyint(4) NOT NULL COMMENT 'تعداد لایکها',
  `Status` enum('DEACTIVE','ACTIVE','UNDER_REVIEW') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت نظر'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='نظرهای خدمت' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `servicerequests`
--

CREATE TABLE `servicerequests` (
  `ReqId` int(11) NOT NULL COMMENT 'شناسه درخواست',
  `EmployerId` int(11) NOT NULL COMMENT 'شناسه کارفرما',
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه خدمت',
  `Status` enum('REJECT','ACCEPT','UNDER_REVIEW','DELETED') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNDER_REVIEW' COMMENT 'وضعیت درخواست همکاری',
  `ReqStateId` int(11) NOT NULL COMMENT 'شناسه استان همکاری',
  `ReqCityId` int(11) NOT NULL COMMENT 'شناسه شهر همکاری',
  `WorkingDayes` varchar(20) COLLATE utf8_persian_ci NOT NULL COMMENT 'روزهای کاری',
  `WorkingHours` varchar(10) COLLATE utf8_persian_ci NOT NULL COMMENT 'ساعات کاری',
  `FacilitiesAndBenefits` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تسهیلات و مزایا',
  `BusinessTrips` enum('AS_NEEDED','OCCASIONALLY','AT_ALL') COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'سفرهای کاری',
  `LogId` int(11) DEFAULT NULL COMMENT 'شناسه لاگ',
  `ReqDate` date NOT NULL COMMENT 'تاریخ درخواست',
  `ImageName` varchar(40) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='درخواستهای همکاری خدمت' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `servicerequests`
--

INSERT INTO `servicerequests` (`ReqId`, `EmployerId`, `ServiceId`, `Status`, `ReqStateId`, `ReqCityId`, `WorkingDayes`, `WorkingHours`, `FacilitiesAndBenefits`, `BusinessTrips`, `LogId`, `ReqDate`, `ImageName`) VALUES
(1, 1, 1, 'UNDER_REVIEW', 1, 1, 'شنبه-چهارشنبه', '8-14', 'بیمه', 'AS_NEEDED', NULL, '2017-06-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `softwaresinfo`
--

CREATE TABLE `softwaresinfo` (
  `SoftwareId` int(11) NOT NULL COMMENT 'شناسه نرم افزار',
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه سرویس',
  `SoftwareName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام نرم افزار',
  `LevelOfExpertise` enum('BASIC','INTERMEDIATE','ADVANCED') COLLATE utf8_persian_ci NOT NULL COMMENT 'سطح تخصص',
  `Comment` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیح',
  `DocumentsFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه اسناد',
  `NumberOfFiles` tinyint(4) DEFAULT NULL COMMENT 'تعداد فایلهای پوشه'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات نرم افزارها' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `softwaresinfo`
--

INSERT INTO `softwaresinfo` (`SoftwareId`, `ServiceId`, `SoftwareName`, `LevelOfExpertise`, `Comment`, `DocumentsFolder`, `NumberOfFiles`) VALUES
(1, 1, 'apache', 'ADVANCED', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `traininginfo`
--

CREATE TABLE `traininginfo` (
  `TrainingId` int(11) NOT NULL COMMENT 'شناسه دوره آموزشی',
  `ServiceId` int(11) NOT NULL COMMENT 'شناسه سرویس',
  `TrainingName` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام دوره آموزشی',
  `TrainingYear` smallint(4) NOT NULL COMMENT 'سال برگزاری',
  `Duration` tinyint(4) NOT NULL COMMENT 'طول دوره برحسب ماه',
  `HeldBy` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'برگزارکننده',
  `Certificate` enum('NO','YES') COLLATE utf8_persian_ci NOT NULL COMMENT 'وضعیت گواهی',
  `Comment` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیح',
  `DocumentsFolder` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام پوشه اسناد',
  `NumberOfFiles` tinyint(4) DEFAULT NULL COMMENT 'تعداد فایلهای پوشه'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='اطلاعات شخصی ارائه دهنده خدمت' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `traininginfo`
--

INSERT INTO `traininginfo` (`TrainingId`, `ServiceId`, `TrainingName`, `TrainingYear`, `Duration`, `HeldBy`, `Certificate`, `Comment`, `DocumentsFolder`, `NumberOfFiles`) VALUES
(1, 1, 'دوره php', 1389, 4, 'مرکز فنی حرفه ای ارم', 'NO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educationalinfo`
--
ALTER TABLE `educationalinfo`
  ADD PRIMARY KEY (`EducationalInfoId`);

--
-- Indexes for table `employerinfo`
--
ALTER TABLE `employerinfo`
  ADD PRIMARY KEY (`EmployerId`);

--
-- Indexes for table `jobexperiencesinfo`
--
ALTER TABLE `jobexperiencesinfo`
  ADD PRIMARY KEY (`JobExperienceId`);

--
-- Indexes for table `languagesinfo`
--
ALTER TABLE `languagesinfo`
  ADD PRIMARY KEY (`LanguageId`);

--
-- Indexes for table `ministrantpersonalinfo`
--
ALTER TABLE `ministrantpersonalinfo`
  ADD PRIMARY KEY (`MinistrantId`);

--
-- Indexes for table `presentedservices`
--
ALTER TABLE `presentedservices`
  ADD PRIMARY KEY (`ServiceId`);

--
-- Indexes for table `recommendedservices`
--
ALTER TABLE `recommendedservices`
  ADD PRIMARY KEY (`RecomId`);

--
-- Indexes for table `servicecomments`
--
ALTER TABLE `servicecomments`
  ADD PRIMARY KEY (`CommentId`);

--
-- Indexes for table `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD PRIMARY KEY (`ReqId`);

--
-- Indexes for table `softwaresinfo`
--
ALTER TABLE `softwaresinfo`
  ADD PRIMARY KEY (`SoftwareId`);

--
-- Indexes for table `traininginfo`
--
ALTER TABLE `traininginfo`
  ADD PRIMARY KEY (`TrainingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educationalinfo`
--
ALTER TABLE `educationalinfo`
  MODIFY `EducationalInfoId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه اطلاعات تحصیلی', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employerinfo`
--
ALTER TABLE `employerinfo`
  MODIFY `EmployerId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه کارفرما', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobexperiencesinfo`
--
ALTER TABLE `jobexperiencesinfo`
  MODIFY `JobExperienceId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه سابقه شغلی', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `languagesinfo`
--
ALTER TABLE `languagesinfo`
  MODIFY `LanguageId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه زبان', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ministrantpersonalinfo`
--
ALTER TABLE `ministrantpersonalinfo`
  MODIFY `MinistrantId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه ارائه دهنده خدمت', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `presentedservices`
--
ALTER TABLE `presentedservices`
  MODIFY `ServiceId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه خدمت', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recommendedservices`
--
ALTER TABLE `recommendedservices`
  MODIFY `RecomId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه توصیه';
--
-- AUTO_INCREMENT for table `servicecomments`
--
ALTER TABLE `servicecomments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه نظر';
--
-- AUTO_INCREMENT for table `servicerequests`
--
ALTER TABLE `servicerequests`
  MODIFY `ReqId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه درخواست', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `softwaresinfo`
--
ALTER TABLE `softwaresinfo`
  MODIFY `SoftwareId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه نرم افزار', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `traininginfo`
--
ALTER TABLE `traininginfo`
  MODIFY `TrainingId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه دوره آموزشی', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
