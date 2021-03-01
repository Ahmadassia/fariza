-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 01, 2021 at 07:07 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farizadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fadb_admin`
--

DROP TABLE IF EXISTS `fadb_admin`;
CREATE TABLE IF NOT EXISTS `fadb_admin` (
  `idadm` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fadb_admin`
--

INSERT INTO `fadb_admin` (`idadm`, `fullname`, `email`, `password`) VALUES
(1, 'bilal', 'bilal.m.saed@gmail.com', '123'),
(7, 'ahmad', 'ahmmad@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `fadb_article`
--

DROP TABLE IF EXISTS `fadb_article`;
CREATE TABLE IF NOT EXISTS `fadb_article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `article_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_author_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_author_fk` (`id_author_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fadb_article_cate`
--

DROP TABLE IF EXISTS `fadb_article_cate`;
CREATE TABLE IF NOT EXISTS `fadb_article_cate` (
  `id_art_cate` int(11) NOT NULL AUTO_INCREMENT,
  `idcate_fk` int(11) NOT NULL,
  `id_article_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_art_cate`),
  KEY `id_article_fk` (`id_article_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fadb_author`
--

DROP TABLE IF EXISTS `fadb_author`;
CREATE TABLE IF NOT EXISTS `fadb_author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fadb_author`
--

INSERT INTO `fadb_author` (`id_author`, `fullname`, `email`, `password`, `image`) VALUES
(1, 'بیلال محمد', 'bilal.m.saed@gmail.com', '123', 'login.png'),
(2, 'هیوا عزیز', 'hiwaaziz@gmail.com', '123', ''),
(3, 'کۆڕەک عثمان', 'korekosman@gmail.com', '123', ''),
(4, 'احمد عاصى', 'ahmadasi@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `fadb_category`
--

DROP TABLE IF EXISTS `fadb_category`;
CREATE TABLE IF NOT EXISTS `fadb_category` (
  `idcate` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`idcate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fadb_follow_author`
--

DROP TABLE IF EXISTS `fadb_follow_author`;
CREATE TABLE IF NOT EXISTS `fadb_follow_author` (
  `id_fa` int(11) NOT NULL AUTO_INCREMENT,
  `id_author_fk` int(11) NOT NULL,
  `id_author_f_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_fa`),
  KEY `id_author_fk` (`id_author_fk`),
  KEY `id_author_f_fk` (`id_author_f_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fadb_follow_category`
--

DROP TABLE IF EXISTS `fadb_follow_category`;
CREATE TABLE IF NOT EXISTS `fadb_follow_category` (
  `id_fc` int(11) NOT NULL AUTO_INCREMENT,
  `id_author_fk` int(11) NOT NULL,
  `id_cate_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_fc`),
  KEY `id_author_fk` (`id_author_fk`),
  KEY `id_cate_fk` (`id_cate_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fadb_op_site`
--

DROP TABLE IF EXISTS `fadb_op_site`;
CREATE TABLE IF NOT EXISTS `fadb_op_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `mini_about` text NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `header` varchar(55) NOT NULL,
  `logo` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fadb_op_site`
--

INSERT INTO `fadb_op_site` (`id`, `web_title`, `phone`, `email`, `phone2`, `instagram`, `about`, `mini_about`, `keyword`, `header`, `logo`) VALUES
(1, 'فاریزە', '07503364175', 'bilal.m.saed@gmail.com', '07503364175', 'https://www.instagram.com/', 'شوێنێک بۆ نوسین', 'شوێنێک بۆ نوسین', 'شوێنێک بۆ نوسین', 'header.jpeg', 'logo.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fadb_article`
--
ALTER TABLE `fadb_article`
  ADD CONSTRAINT `fadb_article_ibfk_1` FOREIGN KEY (`id_author_fk`) REFERENCES `fadb_author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fadb_article_cate`
--
ALTER TABLE `fadb_article_cate`
  ADD CONSTRAINT `fadb_article_cate_ibfk_1` FOREIGN KEY (`id_article_fk`) REFERENCES `fadb_article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fadb_follow_author`
--
ALTER TABLE `fadb_follow_author`
  ADD CONSTRAINT `fadb_follow_author_ibfk_1` FOREIGN KEY (`id_author_fk`) REFERENCES `fadb_author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fadb_follow_author_ibfk_2` FOREIGN KEY (`id_author_f_fk`) REFERENCES `fadb_author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fadb_follow_category`
--
ALTER TABLE `fadb_follow_category`
  ADD CONSTRAINT `fadb_follow_category_ibfk_1` FOREIGN KEY (`id_author_fk`) REFERENCES `fadb_author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fadb_follow_category_ibfk_2` FOREIGN KEY (`id_cate_fk`) REFERENCES `fadb_category` (`idcate`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
