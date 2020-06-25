-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 07:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `science-home`
--

CREATE TABLE `science-home` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `science-home`
--

INSERT INTO `science-home` (`id`, `title`, `date`) VALUES
(1, 'This is a very long title detailing the gravitionational pull of  the Yamagi Complex Theory or Orbital physics relating to high-speed asteroids and small-scale galatic bodies prior to 2005', '2020-04-20'),
(2, 'This is a title detailing nothing', '2020-06-23'),
(3, 'This is an average title of BIG proportions', '2020-03-13'),
(4, 'Get swifty! An examination of late capitalism\'s impact on culture and research', '2020-05-11'),
(5, 'Arecibo gets new puppy!', '2020-07-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `science-home`
--
ALTER TABLE `science-home`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `science-home`
--
ALTER TABLE `science-home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
