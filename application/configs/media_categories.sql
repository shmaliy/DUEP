-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2012 at 03:12 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sunny_duep`
--

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

DROP TABLE IF EXISTS `media_categories`;
CREATE TABLE IF NOT EXISTS `media_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `alias` text NOT NULL,
  `public_url` text,
  `name_bc` varchar(255) DEFAULT NULL,
  `name_menu` varchar(255) DEFAULT NULL,
  `enable_rss` int(11) DEFAULT NULL,
  `enable_email` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `media_categories_id` int(11) DEFAULT NULL,
  `admin_comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `media_categories`
--

INSERT INTO `media_categories` (`id`, `title`, `alias`, `public_url`, `name_bc`, `name_menu`, `enable_rss`, `enable_email`, `date_created`, `user_created`, `date_modified`, `user_modified`, `published`, `media_categories_id`, `admin_comment`) VALUES
(5, 'Бейджи - иконки', 'content_thumbnails', '', '', '', 0, 0, 1342879667, NULL, 1342879667, NULL, 1, 0, NULL);
