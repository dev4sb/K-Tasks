-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2023 at 01:23 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `email`, `password`, `image`, `hobbies`, `gender`, `description`, `created_at`, `updated_at`) VALUES
(91, 'Thomas Everett1', 'Demetrius Stevens', 'pobozupusa@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '732282940car.jpg', 'Reading', 'Female', 'Occaecat illo consec', '2023-04-10 05:16:16', '2023-04-10 05:28:44'),
(85, 'Patrick Holman', 'Orson Dunn', 'foxyba@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1332632726surfing.jpg', 'Reading', 'Male', 'Veritatis blanditiis', '2023-04-10 05:14:47', '0000-00-00 00:00:00'),
(86, 'Sydnee Mcfadden', 'Jenette Talley', 'tysenef@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2034087129sunset.jpg', 'Travelling', 'Male', 'Enim omnis consequat', '2023-04-10 05:15:14', '0000-00-00 00:00:00'),
(87, 'Philip Donaldson', 'Allegra Talley', 'kede@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '575978428puppy.jpeg', 'Reading', 'Male', 'Alias omnis sit est', '2023-04-10 05:15:23', '0000-00-00 00:00:00'),
(83, 'Cain Rose', 'Ariana Holden', 'riwa@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '221891674duck.jpg', 'Travelling,Coding', 'Male', 'Voluptatem voluptate', '2023-04-10 05:02:08', '0000-00-00 00:00:00'),
(88, 'Nehru Gill', 'Belle Mann', 'gitogygu@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1594750402park-bench.jpg', 'Travelling,Sports', 'Female', 'Nulla laudantium lo', '2023-04-10 05:15:36', '0000-00-00 00:00:00'),
(89, 'Howard Boyle', 'Lydia Singleton', 'halu@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '3968728ocean.jpg', 'Reading,Sports', 'Female', 'Odit asperiores quia', '2023-04-10 05:15:46', '0000-00-00 00:00:00'),
(84, 'Meghan Ball', 'Minerva Herman', 'vyrocuka@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '948413961woman.jpg', 'Travelling,Sports', 'Female', 'Numquam ducimus cor', '2023-04-10 05:13:28', '0000-00-00 00:00:00'),
(80, 'Jasmine Shepard', 'Adrienne Scott', 'joqe@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1527037865book.jpg', 'Travelling', 'Female', 'Odio ullam dicta nih', '2023-04-10 04:54:49', '0000-00-00 00:00:00'),
(90, 'Olivia Mccarthy', 'Ifeoma Atkins', 'cuqupoci@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '525971603fox.jpg', 'Travelling', 'Female', 'Id nisi error minus ', '2023-04-10 05:16:01', '0000-00-00 00:00:00'),
(92, 'Ahmed Hamilton', 'Brody Cleveland', 'mycinagita@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1101905952book.jpg', 'Travelling,Coding', 'Female', 'Est minim et suscip', '2023-04-10 05:16:52', '0000-00-00 00:00:00'),
(93, 'Luke Jordan', 'Shelley Robbins', 'mucu@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '955990339boat.jpg', 'Travelling,Coding', 'Male', 'Ea delectus irure n', '2023-04-10 05:17:26', '0000-00-00 00:00:00'),
(94, 'Emerson Mcclain', 'Solomon Donovan', 'fepazuca@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '580132121bird.jpg', 'Reading,Travelling', 'Female', 'Nulla laboris tempor', '2023-04-10 05:17:37', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
