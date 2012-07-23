-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2012 at 03:10 PM
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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_categories_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `server_path` text,
  `public_url` text,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(32) DEFAULT NULL,
  `thumbnail` text,
  `keywords` text,
  `admin_comment` text,
  `date_created` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_categories_id`, `name`, `server_path`, `public_url`, `title`, `description`, `type`, `thumbnail`, `keywords`, `admin_comment`, `date_created`, `user_created`, `date_modified`, `user_modified`, `published`) VALUES
(1, 5, '1_images.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '1_images.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039671, NULL, 1343039671, NULL, NULL),
(2, 5, '5_images.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '5_images.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039673, NULL, 1343039673, NULL, NULL),
(3, 5, '54350main_MM_image_feature_101_jw4.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '54350main_MM_image_feature_101_jw4.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039675, NULL, 1343039675, NULL, NULL),
(4, 5, 'fantasy-5.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'fantasy-5.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039677, NULL, 1343039677, NULL, NULL),
(5, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039679, NULL, 1343039679, NULL, NULL),
(6, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039681, NULL, 1343039681, NULL, NULL),
(7, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039683, NULL, 1343039683, NULL, NULL),
(8, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1343039685, NULL, 1343039685, NULL, NULL),
(9, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039688, NULL, 1343039688, NULL, NULL),
(10, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039690, NULL, 1343039690, NULL, NULL),
(11, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039692, NULL, 1343039692, NULL, NULL),
(12, 5, 'nature-images-62.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'nature-images-62.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039694, NULL, 1343039694, NULL, NULL),
(13, 5, 'pia12832-browse.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'pia12832-browse.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039699, NULL, 1343039699, NULL, NULL),
(14, 5, 'Random-Picture-I-have-in-my-images-folder-PART-1-random-4862339-1024-1024.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Random-Picture-I-have-in-my-images-folder-PART-1-random-4862339-1024-1024.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039703, NULL, 1343039703, NULL, NULL),
(15, 5, 'img_bibo_10_.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'img_bibo_10_.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343040535, NULL, 1343040535, NULL, NULL),
(16, 5, 'teddy2.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'teddy2.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343040577, NULL, 1343040577, NULL, NULL);
