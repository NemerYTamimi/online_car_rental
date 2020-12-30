-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 01:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
drop database IF EXISTS dbschema_1170025;
create database dbschema_1170025;
use dbschema_1170025;
--
-- Database: `dbschema_1170025`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `buyID` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `days` int(11) NOT NULL,
  `options` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `credit` int(100) NOT NULL,
  `expireddate` date NOT NULL,
  `bank` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`pid`, `cid`, `buyID`, `start`, `end`, `days`, `options`, `name`, `credit`, `expireddate`, `bank`, `type`) VALUES
(67, 20, 40, '2020-01-01', '2020-02-02', 32, 2, 'Nemer Tamimi', 111324234, '2025-01-01', 'arabi bank', 'visa'),
(67, 20, 41, '2020-01-01', '2020-02-02', 32, 2, 'Nemer', 111123123, '2024-01-01', 'Palestine Bank', 'visa'),
(67, 20, 42, '2020-01-01', '2021-01-01', 366, 0, 'Nemer', 111111111, '2020-01-01', 'arabi', 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `name` varchar(20) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `manufacturing` varchar(20) DEFAULT NULL,
  `consumption` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `available colors` varchar(100) DEFAULT NULL,
  `pid` int(10) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `length` float NOT NULL,
  `width` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `year` varchar(12) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`name`, `country`, `manufacturing`, `consumption`, `price`, `available colors`, `pid`, `horsepower`, `length`, `width`, `description`, `year`, `new`) VALUES
('Pride', 'Korea', 'kia', 13, 33, 'White & Red', 63, 130, 3.2, 2.4, 'full full', '2015', 1),
('Peugeot301', 'France', 'Peugeot', 12, 63, 'White & Black', 67, 117, 4.445, 1.748, '5 Passengers. Air Conditioning.  Manual  4 Doors  up to 2 Luggage', '2019', 1),
('X3', 'Palestine', 'BMW', 10, 100, 'Red', 68, 245, 250, 150, 'ACCIDENT FREE', '2005', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(20) NOT NULL,
  `cId` int(10) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `cId`, `address`, `email`, `telephone`, `password`, `dateOfBirth`) VALUES
('NemerTamimi', 20, 'Jifna - Aljalazon-street ', 'nemertamimi1999@icloud.com', '+9705688191491', '2c22672c888e2320cb6d8312a0b2345a', '1999-11-26'),
('abumaher', 120001, 'Birzeit', 'abumaher@abc.com', '+97000000000', '4f4bae0374961148506e694fb58eb57c', '1990-02-01'),
('Nemer', 1170012, 'bet hanina post - ramalah', 'nemer123@nemer.com', '+970568891491', '2c22672c888e2320cb6d8312a0b2345a', '2020-01-01'),
('Nemer', 1170025, 'bet hanina   - ramalah', 'nemertamimi@123.com', '+970568891491', '2c22672c888e2320cb6d8312a0b2345a', '2022-03-03'),
('jehad', 1171858, 'nablus', 'jihad@hotmail.com', '0599999999', '2b68d992a12ca80309e47616be71666f', '2020-05-01'),
('TamimiTest', 123123123, 'bet hanina post - ramalah', 'test@icloud.com', '+970568891491', '2c22672c888e2320cb6d8312a0b2345a', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `pid` int(11) NOT NULL,
  `figure` varchar(11) NOT NULL,
  `imageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pid`, `figure`, `imageID`) VALUES
(1, 'fig1', 1),
(1, 'fig2', 2),
(1, 'fig3', 3),
(2, 'fig1', 4),
(2, 'fig2', 5),
(2, 'fig3', 8),
(2, 'fig4', 9),
(3, 'fig1', 10),
(3, 'fig2', 11),
(3, 'fig3', 12),
(4, 'fig1', 13),
(4, 'fig2', 14),
(4, 'fig3', 15),
(5, 'fig1', 16),
(5, 'fig2', 17),
(5, 'fig3', 18),
(5, 'fig4', 19),
(6, 'fig1', 20),
(6, 'fig2', 21),
(6, 'fig4', 22),
(6, 'fig4', 23),
(7, 'fig1', 24),
(7, 'fig2', 25),
(7, 'fig3', 26),
(8, 'fig1', 27),
(8, 'fig2', 28),
(8, 'fig3', 29),
(9, 'fig1', 30),
(9, 'fig2', 31),
(9, 'fig3', 32),
(9, 'fig4', 33),
(59, 'img1j', 59),
(20, '20', 100),
(60, 'img1j', 101),
(60, 'img2j', 102),
(60, 'img3j', 103),
(61, 'img1jpg', 104),
(61, 'img2jpg', 105),
(61, 'img3jpg', 106),
(62, 'img1.jpg', 107),
(62, 'img2.jpg', 108),
(62, 'img3.jpg', 109),
(63, 'img1.jpg', 110),
(63, 'img2.jpg', 111),
(63, 'img3.jpg', 112),
(64, 'img1.png', 113),
(64, 'img2.png', 114),
(64, 'img3.png', 115),
(65, 'img1.pdf', 116),
(65, 'img2.pdf', 117),
(65, 'img3.docx', 118),
(66, 'img1.jpg', 119),
(66, 'img2.jpg', 120),
(66, 'img3.jpg', 121),
(67, 'img1.jpg', 122),
(67, 'img2.jpg', 123),
(67, 'img3.jpg', 124),
(68, 'img1.jfif', 125),
(68, 'img2.jpg', 126),
(68, 'img3.jpg', 127);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `senderName` varchar(20) NOT NULL,
  `senderEmail` varchar(35) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`senderName`, `senderEmail`, `title`, `message`) VALUES
('nemer', 'kjn@.vj', 'jhbn1', 'sdfasdfdfadsfasdfasdf'),
('nemer', 'kjn@ds.vjsdfdsfa', 'ssdf', 'dsfsdfsdfsdfadfgdgdfgagd\r\nafgdgf\r\nfdgafdgagag\r\nafghf dfghdgfh  sdgh gfhdf hs  rtwrt we rt gs\r\ndg sdfg sfg'),
('essa salameh', 'tariq@sweetgirl.com', 'jihad absent', 'nimer is cool kick him out.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buyID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`senderEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `buyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DROP USER IF EXISTS 'master'@'%';
CREATE USER  'master'@'%' IDENTIFIED by  'comp334';GRANT ALL PRIVILEGES ON *.* TO 'master'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;