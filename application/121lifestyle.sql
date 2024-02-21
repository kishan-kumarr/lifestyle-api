-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2019 at 02:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `121lifestyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountType`
--

CREATE TABLE `accountType` (
  `id` int(10) UNSIGNED NOT NULL,
  `accountType` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountType`
--

INSERT INTO `accountType` (`id`, `accountType`, `status`, `created`) VALUES
(1, 'Savings accounts', 1, '2019-05-01 07:45:39'),
(2, 'Checking accounts', 1, '2019-05-01 07:45:39'),
(3, 'Money market accounts', 1, '2019-05-01 07:46:02'),
(4, 'Retirement accounts', 1, '2019-05-01 07:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileCountryCode` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `normal_password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2' COMMENT '1=admin,2=ceo',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobileCountryCode`, `mobile`, `address`, `document`, `location`, `password`, `normal_password`, `role`, `status`, `created`) VALUES
(1, NULL, 'life@style.com', NULL, NULL, NULL, NULL, NULL, '81de0046095163d7945e4315b0c29764', 'lifestyle', 1, 1, '2019-03-19 05:49:14'),
(2, 'Devin Tran', 'davin898@gmail.com', 52, '6985474145', '524, Neelkanth apartment, near EDM mall, kaushambi, Ghaziabad. Pin code - 201012', '1556778297sample.pdf', '14', 'd0970714757783e6cf17b26fb8e2298f', '112233', 2, 1, '2019-05-02 06:25:02'),
(3, 'Kishan Kumar', 'kktesting333@gmail.com', 91, '8368379794', 'B-1/A26 Mohan Cooperative Industrial Office New Delhi-110044 India', '1556778443lesson2.pdf', '13', 'd0970714757783e6cf17b26fb8e2298f', '112233', 2, 1, '2019-05-02 06:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) UNSIGNED NOT NULL,
  `airportName` varchar(255) DEFAULT NULL,
  `countryName` varchar(255) DEFAULT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `areaName` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1= active,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `airportName`, `countryName`, `stateName`, `cityName`, `areaName`, `status`, `created`) VALUES
(3, 'IGI Airport T3 Road, Aerocity, New Delhi, Delhi, India', 'India', 'Delhi', 'New Delhi', 'Susan Lott', 1, '2019-04-25 07:06:30'),
(4, 'Airport Road, Block A, Jagatpura, Jaipur, Rajasthan, India', 'India', 'Rajasthan', 'Jaipur', 'Jamal Mcgee', 1, '2019-04-25 07:07:00'),
(6, 'Patna Airport - Ashiana More Road, Khajpura, Patna, Bihar, India', 'India', 'Bihar', 'Patna', 'Delhi', 1, '2019-05-13 05:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) UNSIGNED NOT NULL,
  `branchName` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branchName`, `status`, `created`) VALUES
(1, 'Noida', 1, '2019-04-02 04:59:00'),
(3, 'Okhla', 1, '2019-04-02 04:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `branch_manager`
--

CREATE TABLE `branch_manager` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileCountryCode` int(11) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `branch` varchar(11) DEFAULT NULL,
  `under_ceo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `normalPassword` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `approvedBy` int(11) DEFAULT NULL COMMENT '1=admin,2=Ceo',
  `createdBy` int(11) DEFAULT NULL COMMENT '1=by ceo, null= by admin',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_manager`
--

INSERT INTO `branch_manager` (`id`, `name`, `email`, `mobileCountryCode`, `mobile`, `address`, `document`, `location`, `branch`, `under_ceo`, `password`, `normalPassword`, `status`, `approvedBy`, `createdBy`, `created`) VALUES
(1, 'Tatum Peters', 'branch@manager.com', 258, '6574867897', 'Mohal Estate New Delhi - 29', '1556792704sample.pdf', '13', '1', '3', 'd0970714757783e6cf17b26fb8e2298f', '112233', 1, NULL, NULL, '2019-05-02 10:25:10'),
(17, 'Rhiannon Delgado', 'vazati@mailinator.com', 966, '6545679879', 'Dicta voluptas repud', '1558073238sample.pdf', '14', '3', '2', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Pa$$w0rd!', 1, NULL, NULL, '2019-05-17 06:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `ceo`
--

CREATE TABLE `ceo` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileCountryCode` int(11) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `normalPassword` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `countryId` int(11) DEFAULT NULL,
  `stateId` int(11) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=acitve,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `countryId`, `stateId`, `cityName`, `status`, `created`) VALUES
(6, 4, 9, 'city1', 1, '2019-04-22 11:59:04'),
(8, 3, 7, 'city3', 1, '2019-04-22 12:02:28'),
(10, 4, 9, 'city31', 1, '2019-04-22 12:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) UNSIGNED NOT NULL,
  `countryName` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryName`, `status`, `created`) VALUES
(2, 'coutnry', 1, '2019-04-22 11:10:10'),
(3, 'coutnry1', 1, '2019-04-22 11:10:15'),
(4, 'coutnry5', 1, '2019-04-22 11:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `validFrom` varchar(255) DEFAULT NULL,
  `validTo` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL COMMENT 'value_in_%',
  `no_of_times` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `validFrom`, `validTo`, `value`, `no_of_times`, `status`, `created`) VALUES
(3, 'JYMJBIKI', '02-04-2019', '02-04-2019', '65', 5, 1, '2019-04-01 09:41:42'),
(4, 'EKW34EJR', '11-04-2019', '11-04-2019', '45', 10, 1, '2019-04-01 09:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileCountryCode` int(11) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `under_ceo` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `under_branch_manager` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `normalPassword` varchar(255) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `aboutMe` text,
  `randCode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=admin approve, 0=admin disapprove, 3= bm approve, 4= bm disapprove',
  `approvedBy` int(11) DEFAULT NULL COMMENT '1=admin,2=ceo,3=B.M',
  `createdBy` int(11) DEFAULT NULL COMMENT '1= CEO and ADMIN, 2= branch manager',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `firstName`, `lastName`, `dob`, `email`, `mobileCountryCode`, `mobile`, `address`, `location`, `under_ceo`, `branch`, `under_branch_manager`, `password`, `normalPassword`, `city`, `aboutMe`, `randCode`, `status`, `approvedBy`, `createdBy`, `created`) VALUES
(1, 'Aileen', 'kumar', '24-01-1979', 'alieen34@gmail.com', 31, '9879846545', '524, Neelkanth apartment, near EDM mall, kaushambi, Ghaziabad. Pin code - 201012', '14', '2', '1', '1', 'd0970714757783e6cf17b26fb8e2298f', '112233', 9, 'i m exp driver', '', 2, 2, 1, '2019-05-01 11:44:43'),
(6, 'Brenden', 'Bentley', 'Ab error dolorem dis', 'hyhacoxone@mailinator.net', 961, '5895474587', 'Culpa ipsum labore', '13', '3', '1', '1', 'd0970714757783e6cf17b26fb8e2298f', '112233', 8, 'Excepturi corrupti ', '', 1, 2, 1, '2019-05-03 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `driverBankDetail`
--

CREATE TABLE `driverBankDetail` (
  `id` int(11) UNSIGNED NOT NULL,
  `driverId` int(11) DEFAULT NULL,
  `routingNo` varchar(255) DEFAULT NULL,
  `accountNo` varchar(255) DEFAULT NULL,
  `accountHolderName` varchar(255) DEFAULT NULL,
  `accountType` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driverBankDetail`
--

INSERT INTO `driverBankDetail` (`id`, `driverId`, `routingNo`, `accountNo`, `accountHolderName`, `accountType`, `created`) VALUES
(1, 1, '65456465', '7898564578895623', 'Aleen Kumar', '1', '2019-05-01 11:44:43'),
(6, 6, '69854785', '6958745874589658', 'Hope Howard', '3', '2019-05-03 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `driverVehicleDetail`
--

CREATE TABLE `driverVehicleDetail` (
  `id` int(11) UNSIGNED NOT NULL,
  `driverId` int(11) DEFAULT NULL,
  `vehiclePlateNo` varchar(255) DEFAULT NULL,
  `vehicleType` varchar(255) DEFAULT NULL,
  `vehicleModel` varchar(255) DEFAULT NULL,
  `vehicleColour` varchar(255) DEFAULT NULL,
  `registrationYear` varchar(255) DEFAULT NULL,
  `childSeatAvailable` varchar(255) DEFAULT NULL,
  `maximumPerson` int(255) DEFAULT NULL,
  `maximumLuggage` varchar(255) DEFAULT NULL,
  `airport` varchar(255) DEFAULT NULL,
  `vehicleImage` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driverVehicleDetail`
--

INSERT INTO `driverVehicleDetail` (`id`, `driverId`, `vehiclePlateNo`, `vehicleType`, `vehicleModel`, `vehicleColour`, `registrationYear`, `childSeatAvailable`, `maximumPerson`, `maximumLuggage`, `airport`, `vehicleImage`, `created`) VALUES
(1, 1, 'DL-9658', '3', '5', '2', '2007', '3', 2, '5', '3', '1556777850mercd.jpg', '2019-05-01 11:44:43'),
(6, 6, 'SP-6252', '2', '3', '3', '2003', '2', 4, '3', '3', '1556860270imagess(1).jpeg', '2019-05-03 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `driverVehicleLicense`
--

CREATE TABLE `driverVehicleLicense` (
  `id` int(11) UNSIGNED NOT NULL,
  `driverId` int(11) DEFAULT NULL,
  `licenseFrontImage` varchar(255) DEFAULT NULL,
  `licenseBackImage` varchar(255) DEFAULT NULL,
  `insuranceFileImage` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driverVehicleLicense`
--

INSERT INTO `driverVehicleLicense` (`id`, `driverId`, `licenseFrontImage`, `licenseBackImage`, `insuranceFileImage`, `created`) VALUES
(1, 1, '1556777850imagess(1).jpeg', '1556777850downloadbb(1).jpeg', '1556777896slider2.jpg', '2019-05-01 11:44:43'),
(6, 6, '1556860270downloadb(1).jpeg', '1556860270download4(1).jpeg', '1556862510slider3.jpg', '2019-05-03 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) UNSIGNED NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `countryName` varchar(255) DEFAULT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `locationName`, `countryName`, `stateName`, `cityName`, `status`, `created`) VALUES
(12, 'Karol Bagh, New Delhi, Delhi, India', 'India', 'Delhi', 'New Delhi', 1, '2019-04-24 07:53:43'),
(13, 'Govindpuri Extension, Kalkaji, New Delhi, Delhi, India', 'India', 'Delhi', 'New Delhi', 1, '2019-04-24 07:53:53'),
(14, 'Sector 62, Noida, Uttar Pradesh, India', 'India', 'Uttar Pradesh', 'Noida', 1, '2019-04-24 07:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `manageToturial`
--

CREATE TABLE `manageToturial` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manageToturial`
--

INSERT INTO `manageToturial` (`id`, `description`, `image`, `status`, `created`) VALUES
(1, 'First Step', 'se-image-36476ba8c4787b2940b4c7a4b318ac43.jpg', 1, '2019-08-27 05:51:55'),
(2, 'Second Step', 'se-image-4c0b536e8dd5a20d0d262a58fa571349.jpg', 1, '2019-08-27 05:51:55'),
(3, 'Third Step', 'jaguar-e-type-S3658569-12.jpg', 1, '2019-08-27 05:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `MenuName` varchar(100) NOT NULL,
  `MenuSlug` varchar(120) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `icon_name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `MenuName`, `MenuSlug`, `position`, `icon_name`, `parent_id`, `visible`) VALUES
(1, 'Dashboard', 'dashboard', 1, 'dashboard', 0, 1),
(2, 'Manage Country', NULL, 2, 'domain', 0, 1),
(3, 'Manage State', NULL, 3, 'clear_all', 0, 1),
(4, 'Manage City', NULL, 4, 'poll', 0, 1),
(5, 'Manage Airport', NULL, 5, 'flight_takeoff', 0, 1),
(6, 'Manage Location', NULL, 6, 'location_on', 0, 1),
(7, 'Manage Branch', NULL, 7, 'account_balance', 0, 1),
(8, 'Manage Vehicle Type', 'vehicle-type', 8, 'drive_eta', 0, 1),
(9, 'Manage Vehicle Model', 'vehicle-model', 9, 'drive_eta', 0, 1),
(10, 'Manage Vehicle Colour', 'vehicle-colour', 10, 'drive_eta', 0, 1),
(12, 'Coupon', 'coupon-list', 12, 'redeem', 0, 1),
(13, 'Manage Employee', NULL, 13, 'account_box', 0, 1),
(14, 'All Country', 'country-list', 0, 'menu', 2, 1),
(15, 'Add Country', 'add-country', 0, 'add_box', 2, 1),
(16, 'All State', 'state-list', 0, 'menu', 3, 1),
(17, 'Add State', 'add-state', 0, 'add_box', 3, 1),
(18, 'All City', 'city-list', 0, 'menu', 4, 1),
(19, 'Add City', 'add-city', 0, 'add_box', 4, 1),
(20, 'All Airport', 'airport-list', 0, 'menu', 5, 1),
(21, 'Add Airport', 'add-airport', 0, 'add_box', 5, 1),
(22, 'All Location', 'location-list', 0, 'menu', 6, 1),
(23, 'Add Location', 'add-location', 0, 'add_box', 6, 1),
(24, 'All Branch', 'branch-list', 0, 'menu', 7, 1),
(25, 'Add Branch', 'add-branch', 0, 'add_box', 7, 1),
(29, 'Manage CEO', NULL, 15, 'account_box', 0, 1),
(30, 'Branch Manager', 'branch-manager-list', 0, 'account_box', 13, 1),
(31, 'Driver', 'driver-list', 0, 'account_box', 13, 1),
(32, 'Price Setting', 'price-list', 14, 'settings_application', 0, 1),
(33, 'All CEO', 'ceo-list', 0, 'account_box', 29, 1),
(34, 'Set Permission', 'set-ceo-permission', 0, 'remove_circle', 29, 1),
(35, 'Predefine message', 'manage-predefine-message', 15, 'mail_outline', 0, 1),
(36, '', 'update-city', NULL, NULL, 4, 0),
(37, '', 'admin', NULL, NULL, 4, 0),
(38, '', 'update-country', NULL, NULL, 2, 0),
(39, '', 'admin', NULL, NULL, 2, 0),
(40, '', 'update-state', NULL, NULL, 3, 0),
(41, '', 'admin', NULL, NULL, 3, 0),
(42, '', 'update-airport', NULL, NULL, 5, 0),
(43, '', 'admin', NULL, NULL, 5, 0),
(44, '', 'update-location', NULL, NULL, 6, 0),
(45, '', 'admin', NULL, NULL, 6, 0),
(46, '', 'update-branch', NULL, NULL, 7, 0),
(47, '', 'admin', NULL, NULL, 7, 0),
(48, '', 'add-vehicle-type', NULL, NULL, 8, 0),
(49, '', 'update-vehicle-type', NULL, NULL, 8, 0),
(50, '', 'admin', NULL, NULL, 8, 0),
(51, '', 'add-vehicle-model', NULL, NULL, 9, 0),
(52, '', 'update-vehicle-model', NULL, NULL, 9, 0),
(53, '', 'admin', NULL, NULL, 9, 0),
(54, '', 'add-vehicle-colour', NULL, NULL, 10, 0),
(55, '', 'update-vehicle-colour', NULL, NULL, 10, 0),
(56, '', 'admin', NULL, NULL, 10, 0),
(57, '', 'add-coupon', NULL, NULL, 12, 0),
(58, '', 'update-coupon', NULL, NULL, 12, 0),
(59, '', 'admin', NULL, NULL, 12, 0),
(60, '', 'add-branch-manager', NULL, NULL, 13, 0),
(61, '', 'update-branch-manager', NULL, NULL, 13, 0),
(62, '', 'admin', NULL, NULL, 13, 0),
(63, '', 'add-driver', NULL, NULL, 13, 0),
(64, '', 'update-driver', NULL, NULL, 13, 0),
(65, '', 'add-price', NULL, NULL, 32, 0),
(66, '', 'update-price', NULL, NULL, 32, 0),
(67, '', 'admin', NULL, NULL, 32, 0),
(68, '', 'add-predefine-message', NULL, NULL, 35, 0),
(69, '', 'update-predefine-message', NULL, NULL, 35, 0),
(70, '', 'admin', NULL, NULL, 35, 0),
(71, '', 'add-ceo', NULL, NULL, 29, 0),
(72, '', 'update-ceo', NULL, NULL, 29, 0),
(73, '', 'admin', NULL, NULL, 29, 0),
(74, '', 'update-ceo-permission', NULL, NULL, 29, 0),
(75, '', 'view-branch-manager', NULL, '', 13, 0),
(76, '', 'view-driver', NULL, NULL, 13, 0),
(77, '', 'view-price', NULL, NULL, 32, 0),
(78, '', 'view-ceo', NULL, NULL, 29, 0),
(79, 'Manage User Tutorial', 'manage-user-tutorial', 16, 'class', 0, 1),
(80, '', 'update-tutorial', NULL, NULL, 79, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobileCode`
--

CREATE TABLE `mobileCode` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(11) DEFAULT NULL,
  `country_isd_name` varchar(11) DEFAULT NULL,
  `country_isd_code` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobileCode`
--

INSERT INTO `mobileCode` (`id`, `country_name`, `country_isd_name`, `country_isd_code`, `created`) VALUES
(1, 'Afghanistan', 'AF', 93, '2019-03-28 09:43:57'),
(2, 'Albania', 'AL', 355, '2019-03-28 09:43:57'),
(3, 'Algeria', 'DZ', 213, '2019-03-28 09:43:57'),
(4, 'American Sa', 'AS', 1, '2019-03-28 09:43:57'),
(5, 'Andorra', 'AD', 376, '2019-03-28 09:43:57'),
(6, 'Angola', 'AO', 244, '2019-03-28 09:43:57'),
(7, 'Anguilla', 'AI', 1, '2019-03-28 09:43:57'),
(8, 'Antarctica', 'AQ', 672, '2019-03-28 09:43:57'),
(9, 'Antigua and', 'AG', 1, '2019-03-28 09:43:57'),
(10, 'Argentina', 'AR', 54, '2019-03-28 09:43:57'),
(11, 'Armenia', 'AM', 374, '2019-03-28 09:43:57'),
(12, 'Aruba', 'AW', 297, '2019-03-28 09:43:57'),
(13, 'Australia', 'AU', 61, '2019-03-28 09:43:57'),
(14, 'Austria', 'AT', 43, '2019-03-28 09:43:57'),
(15, 'Azerbaijan', 'AZ', 994, '2019-03-28 09:43:57'),
(16, 'Bahamas', 'BS', 1, '2019-03-28 09:43:57'),
(17, 'Bahrain', 'BH', 973, '2019-03-28 09:43:57'),
(18, 'Bangladesh', 'BD', 880, '2019-03-28 09:43:57'),
(19, 'Barbados', 'BB', 1, '2019-03-28 09:43:57'),
(20, 'Belarus', 'BY', 375, '2019-03-28 09:43:57'),
(21, 'Belgium', 'BE', 32, '2019-03-28 09:43:57'),
(22, 'Belize', 'BZ', 501, '2019-03-28 09:43:57'),
(23, 'Benin', 'BJ', 229, '2019-03-28 09:43:57'),
(24, 'Bermuda', 'BM', 1, '2019-03-28 09:43:57'),
(25, 'Bhutan', 'BT', 975, '2019-03-28 09:43:57'),
(26, 'Bolivia', 'BO', 591, '2019-03-28 09:43:57'),
(27, 'Bosnia and ', 'BA', 387, '2019-03-28 09:43:57'),
(28, 'Botswana', 'BW', 267, '2019-03-28 09:43:57'),
(29, 'Bouvet Isla', 'BV', 47, '2019-03-28 09:43:57'),
(30, 'Brazil', 'BR', 55, '2019-03-28 09:43:57'),
(31, 'British Ind', 'IO', 246, '2019-03-28 09:43:57'),
(32, 'Brunei Daru', 'BN', 673, '2019-03-28 09:43:57'),
(33, 'Bulgaria', 'BG', 359, '2019-03-28 09:43:57'),
(34, 'Burkina Fas', 'BF', 226, '2019-03-28 09:43:57'),
(35, 'Burundi', 'BI', 257, '2019-03-28 09:43:57'),
(36, 'Cambodia', 'KH', 855, '2019-03-28 09:43:57'),
(37, 'Cameroon', 'CM', 237, '2019-03-28 09:43:57'),
(38, 'Canada', 'CA', 1, '2019-03-28 09:43:57'),
(39, 'Cape Verde', 'CV', 238, '2019-03-28 09:43:57'),
(40, 'Cayman Isla', 'KY', 1, '2019-03-28 09:43:57'),
(41, 'Central Afr', 'CF', 236, '2019-03-28 09:43:57'),
(42, 'Chad', 'TD', 235, '2019-03-28 09:43:57'),
(43, 'Chile', 'CL', 56, '2019-03-28 09:43:57'),
(44, 'China', 'CN', 86, '2019-03-28 09:43:57'),
(45, 'Christmas I', 'CX', 61, '2019-03-28 09:43:57'),
(46, 'Cocos (Keel', 'CC', 61, '2019-03-28 09:43:57'),
(47, 'Colombia', 'CO', 57, '2019-03-28 09:43:57'),
(48, 'Comoros', 'KM', 269, '2019-03-28 09:43:57'),
(49, 'Congo Democ', 'CG', 242, '2019-03-28 09:43:57'),
(50, 'Cook Island', 'CK', 682, '2019-03-28 09:43:57'),
(51, 'Costa Rica', 'CR', 506, '2019-03-28 09:43:57'),
(52, 'Cote D\'Ivoi', 'CI', 225, '2019-03-28 09:43:57'),
(53, 'Croatia', 'HR', 385, '2019-03-28 09:43:57'),
(54, 'Cuba', 'CU', 53, '2019-03-28 09:43:57'),
(55, 'Cyprus', 'CY', 357, '2019-03-28 09:43:57'),
(56, 'Czech Repub', 'CZ', 420, '2019-03-28 09:43:57'),
(57, 'Denmark', 'DK', 45, '2019-03-28 09:43:57'),
(58, 'Djibouti', 'DJ', 253, '2019-03-28 09:43:57'),
(59, 'Dominica', 'DM', 1, '2019-03-28 09:43:57'),
(60, 'Dominican R', 'DO', 1, '2019-03-28 09:43:57'),
(61, 'Timor-Leste', 'TL', 670, '2019-03-28 09:43:57'),
(62, 'Ecuador', 'EC', 593, '2019-03-28 09:43:57'),
(63, 'Egypt', 'EG', 20, '2019-03-28 09:43:57'),
(64, 'El Salvador', 'SV', 503, '2019-03-28 09:43:57'),
(65, 'Equatorial ', 'GQ', 240, '2019-03-28 09:43:57'),
(66, 'Eritrea', 'ER', 291, '2019-03-28 09:43:57'),
(67, 'Estonia', 'EE', 372, '2019-03-28 09:43:57'),
(68, 'Ethiopia', 'ET', 251, '2019-03-28 09:43:57'),
(69, 'Falkland Is', 'FK', 500, '2019-03-28 09:43:57'),
(70, 'Faroe Islan', 'FO', 298, '2019-03-28 09:43:57'),
(71, 'Fiji', 'FJ', 679, '2019-03-28 09:43:57'),
(72, 'Finland', 'FI', 358, '2019-03-28 09:43:57'),
(73, 'France', 'FR', 33, '2019-03-28 09:43:57'),
(75, 'French Guia', 'GF', 594, '2019-03-28 09:43:57'),
(76, 'French Poly', 'PF', 689, '2019-03-28 09:43:57'),
(77, 'French Sout', 'TF', NULL, '2019-03-28 09:43:57'),
(78, 'Gabon', 'GA', 241, '2019-03-28 09:43:57'),
(79, 'Gambia', 'GM', 220, '2019-03-28 09:43:57'),
(80, 'Georgia', 'GE', 995, '2019-03-28 09:43:57'),
(81, 'Germany', 'DE', 49, '2019-03-28 09:43:57'),
(82, 'Ghana', 'GH', 233, '2019-03-28 09:43:57'),
(83, 'Gibraltar', 'GI', 350, '2019-03-28 09:43:57'),
(84, 'Greece', 'GR', 30, '2019-03-28 09:43:57'),
(85, 'Greenland', 'GL', 299, '2019-03-28 09:43:57'),
(86, 'Grenada', 'GD', 1, '2019-03-28 09:43:57'),
(87, 'Guadeloupe', 'GP', 590, '2019-03-28 09:43:57'),
(88, 'Guam', 'GU', 1, '2019-03-28 09:43:57'),
(89, 'Guatemala', 'GT', 502, '2019-03-28 09:43:57'),
(90, 'Guinea', 'GN', 224, '2019-03-28 09:43:57'),
(91, 'Guinea-biss', 'GW', 245, '2019-03-28 09:43:57'),
(92, 'Guyana', 'GY', 592, '2019-03-28 09:43:57'),
(93, 'Haiti', 'HT', 509, '2019-03-28 09:43:57'),
(94, 'Heard Islan', 'HM', 11, '2019-03-28 09:43:57'),
(95, 'Honduras', 'HN', 504, '2019-03-28 09:43:57'),
(96, 'Hong Kong', 'HK', 852, '2019-03-28 09:43:57'),
(97, 'Hungary', 'HU', 36, '2019-03-28 09:43:57'),
(98, 'Iceland', 'IS', 354, '2019-03-28 09:43:57'),
(99, 'India', 'IN', 91, '2019-03-28 09:43:57'),
(100, 'Indonesia', 'ID', 62, '2019-03-28 09:43:57'),
(101, 'Iran (Islam', 'IR', 98, '2019-03-28 09:43:57'),
(102, 'Iraq', 'IQ', 964, '2019-03-28 09:43:57'),
(103, 'Ireland', 'IE', 353, '2019-03-28 09:43:57'),
(104, 'Israel', 'IL', 972, '2019-03-28 09:43:57'),
(105, 'Italy', 'IT', 39, '2019-03-28 09:43:57'),
(106, 'Jamaica', 'JM', 1, '2019-03-28 09:43:57'),
(107, 'Japan', 'JP', 81, '2019-03-28 09:43:57'),
(108, 'Jordan', 'JO', 962, '2019-03-28 09:43:57'),
(109, 'Kazakhstan', 'KZ', 7, '2019-03-28 09:43:57'),
(110, 'Kenya', 'KE', 254, '2019-03-28 09:43:57'),
(111, 'Kiribati', 'KI', 686, '2019-03-28 09:43:57'),
(112, 'Korea, Demo', 'KP', 850, '2019-03-28 09:43:57'),
(113, 'South Korea', 'KR', 82, '2019-03-28 09:43:57'),
(114, 'Kuwait', 'KW', 965, '2019-03-28 09:43:57'),
(115, 'Kyrgyzstan', 'KG', 996, '2019-03-28 09:43:57'),
(116, 'Lao People\'', 'LA', 856, '2019-03-28 09:43:57'),
(117, 'Latvia', 'LV', 371, '2019-03-28 09:43:57'),
(118, 'Lebanon', 'LB', 961, '2019-03-28 09:43:57'),
(119, 'Lesotho', 'LS', 266, '2019-03-28 09:43:57'),
(120, 'Liberia', 'LR', 231, '2019-03-28 09:43:57'),
(121, 'Libya', 'LY', 218, '2019-03-28 09:43:57'),
(122, 'Liechtenste', 'LI', 423, '2019-03-28 09:43:57'),
(123, 'Lithuania', 'LT', 370, '2019-03-28 09:43:57'),
(124, 'Luxembourg', 'LU', 352, '2019-03-28 09:43:57'),
(125, 'Macao', 'MO', 853, '2019-03-28 09:43:57'),
(126, 'Macedonia, ', 'MK', 389, '2019-03-28 09:43:57'),
(127, 'Madagascar', 'MG', 261, '2019-03-28 09:43:57'),
(128, 'Malawi', 'MW', 265, '2019-03-28 09:43:57'),
(129, 'Malaysia', 'MY', 60, '2019-03-28 09:43:57'),
(130, 'Maldives', 'MV', 960, '2019-03-28 09:43:57'),
(131, 'Mali', 'ML', 223, '2019-03-28 09:43:57'),
(132, 'Malta', 'MT', 356, '2019-03-28 09:43:57'),
(133, 'Marshall Is', 'MH', 692, '2019-03-28 09:43:57'),
(134, 'Martinique', 'MQ', 596, '2019-03-28 09:43:57'),
(135, 'Mauritania', 'MR', 222, '2019-03-28 09:43:57'),
(136, 'Mauritius', 'MU', 230, '2019-03-28 09:43:57'),
(137, 'Mayotte', 'YT', 262, '2019-03-28 09:43:57'),
(138, 'Mexico', 'MX', 52, '2019-03-28 09:43:57'),
(139, 'Micronesia,', 'FM', 691, '2019-03-28 09:43:57'),
(140, 'Moldova', 'MD', 373, '2019-03-28 09:43:57'),
(141, 'Monaco', 'MC', 377, '2019-03-28 09:43:57'),
(142, 'Mongolia', 'MN', 976, '2019-03-28 09:43:57'),
(143, 'Montserrat', 'MS', 1, '2019-03-28 09:43:57'),
(144, 'Morocco', 'MA', 212, '2019-03-28 09:43:57'),
(145, 'Mozambique', 'MZ', 258, '2019-03-28 09:43:57'),
(146, 'Myanmar', 'MM', 95, '2019-03-28 09:43:57'),
(147, 'Namibia', 'NA', 264, '2019-03-28 09:43:57'),
(148, 'Nauru', 'NR', 674, '2019-03-28 09:43:57'),
(149, 'Nepal', 'NP', 977, '2019-03-28 09:43:57'),
(150, 'Netherlands', 'NL', 31, '2019-03-28 09:43:57'),
(151, 'Netherlands', 'AN', 599, '2019-03-28 09:43:57'),
(152, 'New Caledon', 'NC', 687, '2019-03-28 09:43:57'),
(153, 'New Zealand', 'NZ', 64, '2019-03-28 09:43:57'),
(154, 'Nicaragua', 'NI', 505, '2019-03-28 09:43:57'),
(155, 'Niger', 'NE', 227, '2019-03-28 09:43:57'),
(156, 'Nigeria', 'NG', 234, '2019-03-28 09:43:57'),
(157, 'Niue', 'NU', 683, '2019-03-28 09:43:57'),
(158, 'Norfolk Isl', 'NF', 672, '2019-03-28 09:43:57'),
(159, 'Northern Ma', 'MP', 1, '2019-03-28 09:43:57'),
(160, 'Norway', 'NO', 47, '2019-03-28 09:43:57'),
(161, 'Oman', 'OM', 968, '2019-03-28 09:43:57'),
(162, 'Pakistan', 'PK', 92, '2019-03-28 09:43:57'),
(163, 'Palau', 'PW', 680, '2019-03-28 09:43:57'),
(164, 'Panama', 'PA', 507, '2019-03-28 09:43:57'),
(165, 'Papua New G', 'PG', 675, '2019-03-28 09:43:57'),
(166, 'Paraguay', 'PY', 595, '2019-03-28 09:43:57'),
(167, 'Peru', 'PE', 51, '2019-03-28 09:43:57'),
(168, 'Philippines', 'PH', 63, '2019-03-28 09:43:57'),
(169, 'Pitcairn', 'PN', 64, '2019-03-28 09:43:57'),
(170, 'Poland', 'PL', 48, '2019-03-28 09:43:57'),
(171, 'Portugal', 'PT', 351, '2019-03-28 09:43:57'),
(172, 'Puerto Rico', 'PR', 1, '2019-03-28 09:43:57'),
(173, 'Qatar', 'QA', 974, '2019-03-28 09:43:57'),
(174, 'Reunion', 'RE', 262, '2019-03-28 09:43:57'),
(175, 'Romania', 'RO', 40, '2019-03-28 09:43:57'),
(176, 'Russian Fed', 'RU', 7, '2019-03-28 09:43:57'),
(177, 'Rwanda', 'RW', 250, '2019-03-28 09:43:57'),
(178, 'Saint Kitts', 'KN', 1, '2019-03-28 09:43:57'),
(179, 'Saint Lucia', 'LC', 1, '2019-03-28 09:43:57'),
(180, 'Saint Vince', 'VC', 1, '2019-03-28 09:43:57'),
(181, 'Samoa', 'WS', 685, '2019-03-28 09:43:57'),
(182, 'San Marino', 'SM', 378, '2019-03-28 09:43:57'),
(183, 'Sao Tome an', 'ST', 239, '2019-03-28 09:43:57'),
(184, 'Saudi Arabi', 'SA', 966, '2019-03-28 09:43:57'),
(185, 'Senegal', 'SN', 221, '2019-03-28 09:43:57'),
(186, 'Seychelles', 'SC', 248, '2019-03-28 09:43:57'),
(187, 'Sierra Leon', 'SL', 232, '2019-03-28 09:43:57'),
(188, 'Singapore', 'SG', 65, '2019-03-28 09:43:57'),
(189, 'Slovakia (S', 'SK', 421, '2019-03-28 09:43:57'),
(190, 'Slovenia', 'SI', 386, '2019-03-28 09:43:57'),
(191, 'Solomon Isl', 'SB', 677, '2019-03-28 09:43:57'),
(192, 'Somalia', 'SO', 252, '2019-03-28 09:43:57'),
(193, 'South Afric', 'ZA', 27, '2019-03-28 09:43:57'),
(194, 'South Georg', 'GS', 500, '2019-03-28 09:43:57'),
(195, 'Spain', 'ES', 34, '2019-03-28 09:43:57'),
(196, 'Sri Lanka', 'LK', 94, '2019-03-28 09:43:57'),
(197, 'Saint Helen', 'SH', 290, '2019-03-28 09:43:57'),
(198, 'St. Pierre ', 'PM', 508, '2019-03-28 09:43:57'),
(199, 'Sudan', 'SD', 249, '2019-03-28 09:43:57'),
(200, 'Suriname', 'SR', 597, '2019-03-28 09:43:57'),
(201, 'Svalbard an', 'SJ', 47, '2019-03-28 09:43:57'),
(202, 'Swaziland', 'SZ', 268, '2019-03-28 09:43:57'),
(203, 'Sweden', 'SE', 46, '2019-03-28 09:43:57'),
(204, 'Switzerland', 'CH', 41, '2019-03-28 09:43:57'),
(205, 'Syrian Arab', 'SY', 963, '2019-03-28 09:43:57'),
(206, 'Taiwan', 'TW', 886, '2019-03-28 09:43:57'),
(207, 'Tajikistan', 'TJ', 992, '2019-03-28 09:43:57'),
(208, 'Tanzania, U', 'TZ', 255, '2019-03-28 09:43:57'),
(209, 'Thailand', 'TH', 66, '2019-03-28 09:43:57'),
(210, 'Togo', 'TG', 228, '2019-03-28 09:43:57'),
(211, 'Tokelau', 'TK', 690, '2019-03-28 09:43:57'),
(212, 'Tonga', 'TO', 676, '2019-03-28 09:43:57'),
(213, 'Trinidad an', 'TT', 1, '2019-03-28 09:43:57'),
(214, 'Tunisia', 'TN', 216, '2019-03-28 09:43:57'),
(215, 'Turkey', 'TR', 90, '2019-03-28 09:43:57'),
(216, 'Turkmenista', 'TM', 993, '2019-03-28 09:43:57'),
(217, 'Turks and C', 'TC', 1, '2019-03-28 09:43:57'),
(218, 'Tuvalu', 'TV', 688, '2019-03-28 09:43:57'),
(219, 'Uganda', 'UG', 256, '2019-03-28 09:43:57'),
(220, 'Ukraine', 'UA', 380, '2019-03-28 09:43:57'),
(221, 'United Arab', 'AE', 971, '2019-03-28 09:43:57'),
(222, 'United King', 'GB', 44, '2019-03-28 09:43:57'),
(223, 'United Stat', 'US', 1, '2019-03-28 09:43:57'),
(224, 'United Stat', 'UM', 246, '2019-03-28 09:43:57'),
(225, 'Uruguay', 'UY', 598, '2019-03-28 09:43:57'),
(226, 'Uzbekistan', 'UZ', 998, '2019-03-28 09:43:57'),
(227, 'Vanuatu', 'VU', 678, '2019-03-28 09:43:57'),
(228, 'Vatican Cit', 'VA', 379, '2019-03-28 09:43:57'),
(229, 'Venezuela', 'VE', 58, '2019-03-28 09:43:57'),
(230, 'Vietnam', 'VN', 84, '2019-03-28 09:43:57'),
(231, 'Virgin Isla', 'VG', 1, '2019-03-28 09:43:57'),
(232, 'Virgin Isla', 'VI', 1, '2019-03-28 09:43:57'),
(233, 'Wallis and ', 'WF', 681, '2019-03-28 09:43:57'),
(234, 'Western Sah', 'EH', 212, '2019-03-28 09:43:57'),
(235, 'Yemen', 'YE', 967, '2019-03-28 09:43:57'),
(236, 'Serbia', 'RS', 381, '2019-03-28 09:43:57'),
(238, 'Zambia', 'ZM', 260, '2019-03-28 09:43:57'),
(239, 'Zimbabwe', 'ZW', 263, '2019-03-28 09:43:57'),
(240, 'Aaland Isla', 'AX', 358, '2019-03-28 09:43:57'),
(241, 'Palestine', 'PS', 970, '2019-03-28 09:43:57'),
(242, 'Montenegro', 'ME', 382, '2019-03-28 09:43:57'),
(243, 'Guernsey', 'GG', 44, '2019-03-28 09:43:57'),
(244, 'Isle of Man', 'IM', 44, '2019-03-28 09:43:57'),
(245, 'Jersey', 'JE', 44, '2019-03-28 09:43:57'),
(247, 'CuraÃ§ao', 'CW', 599, '2019-03-28 09:43:57'),
(248, 'Ivory Coast', 'CI', 225, '2019-03-28 09:43:57'),
(249, 'Kosovo', 'XK', 383, '2019-03-28 09:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `predefine_message`
--

CREATE TABLE `predefine_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `defaultMessage` text,
  `status` int(11) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predefine_message`
--

INSERT INTO `predefine_message` (`id`, `defaultMessage`, `status`, `created`) VALUES
(1, 'i m on the way', 1, '2019-05-07 12:01:27'),
(2, 'i have arrived', 1, '2019-05-07 12:01:47'),
(3, 'Just 5 minuit away', 1, '2019-05-13 07:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicleType` int(11) DEFAULT NULL,
  `normalPrice` float DEFAULT NULL,
  `midNightCharge` float DEFAULT NULL,
  `childCharge` float DEFAULT NULL,
  `additionalStop` float DEFAULT NULL,
  `additionalWaitingTime` float DEFAULT NULL,
  `additionalKelometer` float DEFAULT NULL,
  `userCancellationCharge` float DEFAULT NULL,
  `driverCancellationCharge` float DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `vehicleType`, `normalPrice`, `midNightCharge`, `childCharge`, `additionalStop`, `additionalWaitingTime`, `additionalKelometer`, `userCancellationCharge`, `driverCancellationCharge`, `created`) VALUES
(4, 4, 40, 70, 20, 10, 5, 35, 30, 50, '2019-05-03 10:02:47'),
(6, 3, 30, 45, 10, 10, 20, 15, 5, 10, '2019-06-13 07:08:43'),
(8, 2, 45, 78, 87, 45, 35, 45, 87, 57, '2019-06-13 07:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `saveRideDetails`
--

CREATE TABLE `saveRideDetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `nameSign` varchar(255) DEFAULT NULL,
  `chauffew` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `promotionalCode` varchar(255) DEFAULT NULL,
  `flightNo` varchar(255) DEFAULT NULL,
  `refferenceNo` varchar(255) DEFAULT NULL,
  `vehicleType` varchar(255) DEFAULT NULL,
  `noOfPerson` int(11) DEFAULT NULL,
  `noOfchild` int(11) DEFAULT NULL,
  `noOfLuggage` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `pickupDateTime` varchar(255) DEFAULT NULL,
  `dropoffDateTime` varchar(255) DEFAULT NULL,
  `bookFor` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1= ride compeleted, 0= not compeleted',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_permission`
--

CREATE TABLE `set_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `roleId` int(11) DEFAULT NULL COMMENT '2=ceo',
  `menuId` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_permission`
--

INSERT INTO `set_permission` (`id`, `roleId`, `menuId`, `created`) VALUES
(430, 2, 1, '2019-08-27 09:43:35'),
(431, 2, 2, '2019-08-27 09:43:35'),
(432, 2, 3, '2019-08-27 09:43:35'),
(433, 2, 4, '2019-08-27 09:43:35'),
(434, 2, 5, '2019-08-27 09:43:35'),
(435, 2, 6, '2019-08-27 09:43:35'),
(436, 2, 7, '2019-08-27 09:43:35'),
(437, 2, 8, '2019-08-27 09:43:35'),
(438, 2, 9, '2019-08-27 09:43:35'),
(439, 2, 10, '2019-08-27 09:43:35'),
(440, 2, 12, '2019-08-27 09:43:35'),
(441, 2, 13, '2019-08-27 09:43:35'),
(442, 2, 32, '2019-08-27 09:43:35'),
(443, 2, 35, '2019-08-27 09:43:35'),
(444, 2, 79, '2019-08-27 09:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) UNSIGNED NOT NULL,
  `countryId` int(11) DEFAULT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=active,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `countryId`, `stateName`, `status`, `created`) VALUES
(7, 3, 'Honga', 1, '2019-04-22 11:21:19'),
(8, 4, 'singa', 1, '2019-04-22 11:21:35'),
(9, 4, 'Hong1', 1, '2019-04-22 11:21:45'),
(10, 4, 'Hong2', 1, '2019-04-22 11:21:53'),
(11, 3, 'state 1', 1, '2019-04-22 11:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileCountryCode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `normalPassword` varchar(255) DEFAULT NULL,
  `my_referal_code` varchar(255) DEFAULT NULL,
  `referredByOther` varchar(255) DEFAULT NULL,
  `randCode` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=active,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `firstName`, `lastName`, `email`, `mobileCountryCode`, `mobile`, `password`, `normalPassword`, `my_referal_code`, `referredByOther`, `randCode`, `status`, `created`) VALUES
(21, NULL, 'kishan', 'kumar', 'kkumar@panindia.in', '91', '6985474587', 'd0970714757783e6cf17b26fb8e2298f', '112233', '1557740683', '', '', 1, '2019-05-13 09:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicleImage` varchar(255) DEFAULT NULL,
  `vehicleName` varchar(255) DEFAULT NULL,
  `passenger` varchar(255) DEFAULT NULL,
  `luggage` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicleImage`, `vehicleName`, `passenger`, `luggage`, `price`, `status`, `created`) VALUES
(2, '15537489491.jpeg', 'Business', '8', '2', 45, 1, '2019-03-27 13:19:34'),
(4, '1553749095downloadb(1).jpeg', 'Economy', '4', '3', 30, 1, '2019-03-28 04:58:15'),
(5, '1556277073download3(1).jpeg', 'Comfort', '6', '5', 80, 1, '2019-04-26 11:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_colour`
--

CREATE TABLE `vehicle_colour` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicleColour` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_colour`
--

INSERT INTO `vehicle_colour` (`id`, `vehicleColour`, `status`, `created`) VALUES
(2, 'White', 1, '2019-05-01 06:50:19'),
(3, 'Black', 1, '2019-05-01 06:50:30'),
(4, 'Red', 1, '2019-05-01 06:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicleModel` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`id`, `vehicleModel`, `status`, `created`) VALUES
(3, 'Model1', 1, '2019-05-01 06:46:12'),
(4, 'Model2', 1, '2019-05-01 06:46:20'),
(5, 'Model3', 1, '2019-05-01 06:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicleType` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `vehicleType`, `status`, `created`) VALUES
(2, 'Economy', 1, '2019-05-01 05:55:43'),
(3, 'Comfort', 1, '2019-05-01 05:55:55'),
(4, 'Business', 1, '2019-05-01 06:02:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountType`
--
ALTER TABLE `accountType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_manager`
--
ALTER TABLE `branch_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceo`
--
ALTER TABLE `ceo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverBankDetail`
--
ALTER TABLE `driverBankDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverVehicleDetail`
--
ALTER TABLE `driverVehicleDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverVehicleLicense`
--
ALTER TABLE `driverVehicleLicense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manageToturial`
--
ALTER TABLE `manageToturial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobileCode`
--
ALTER TABLE `mobileCode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefine_message`
--
ALTER TABLE `predefine_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saveRideDetails`
--
ALTER TABLE `saveRideDetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_permission`
--
ALTER TABLE `set_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_colour`
--
ALTER TABLE `vehicle_colour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountType`
--
ALTER TABLE `accountType`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_manager`
--
ALTER TABLE `branch_manager`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ceo`
--
ALTER TABLE `ceo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driverBankDetail`
--
ALTER TABLE `driverBankDetail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driverVehicleDetail`
--
ALTER TABLE `driverVehicleDetail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driverVehicleLicense`
--
ALTER TABLE `driverVehicleLicense`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `manageToturial`
--
ALTER TABLE `manageToturial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `mobileCode`
--
ALTER TABLE `mobileCode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `predefine_message`
--
ALTER TABLE `predefine_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `saveRideDetails`
--
ALTER TABLE `saveRideDetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_permission`
--
ALTER TABLE `set_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_colour`
--
ALTER TABLE `vehicle_colour`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
