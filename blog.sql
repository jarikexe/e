-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2016 at 05:01 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `text`, `date`, `entry_id`) VALUES
(3, 'asdfasdfas', 'asdfsdfasdfsadfasdf', 1467284154, 8),
(4, 'asdfasdf', 'asdfasdfasdfasdf', 1467284265, 8),
(5, 'asdfasdf', 'asdfasdfasdfasdf', 1467284284, 8),
(9, 'sadf', 'asdfoiasudiofuaoisd', 1467313487, 10);

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(21) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) DEFAULT NULL,
  `content` text,
  `date` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `header`, `content`, `date`, `author`) VALUES
(1, 'Header', 'dslkfjaksdvjsadkvnklxvs;dlkfjsl\r\n\r\nsdaklfjsladjf;\r\nskdjlfjjkasnvjwienguihsadjfkl\r\nakjsdfjksldf\r\njkasdfvsdiofgsdgvjhasdljkgf\r\nsdkjlvnjksdnvflkasjdfljlk;sd', 1467035821, 'jar'),
(10, 'Header real log header[12054]sadfasdf', 'Служба Яндекс.Рефераты предназначена для студентов и школьников, дизайнеров и журналистов, создателей научных заявок и отчетов — для всех, кто относится к тексту, как к количеству знаков\r\n', 1467308612, 'someDick'),
(11, 'sdfsadfsadf', 'asdfasdfasdf', 1467461203, 'sdafasdfsdfaasdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
