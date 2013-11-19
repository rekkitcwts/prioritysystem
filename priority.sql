-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2013 at 02:38 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'priority'
--
CREATE DATABASE priority DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE priority;

-- --------------------------------------------------------

--
-- Table structure for table 'counter'
--

CREATE TABLE IF NOT EXISTS counter (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(40) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  number int(10) DEFAULT '0',
  username varchar(16) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table 'counter'
--

INSERT INTO counter (id, `password`, `name`, number, username) VALUES
(1, '0a8d5d082090e1e231bd15e14e1b7f2978b6ff04', 'First Year Advising', 0, 'cs_firstyear'),
(2, '20b4e0c8219ae643ad122be19c66141e5a96aaf6', 'Second Year Advising', 0, 'cs_secondyear'),
(3, '765c60cfdc9661711e728a175c178e51a6a8611f', 'Third Year Advising', 0, 'cs_thirdyear'),
(4, '8a357c1c6298abc3b57f910a74fb0b0a76a51612', 'Fourth Year Advising', 0, 'cs_fourthyear');

-- --------------------------------------------------------

--
-- Table structure for table 'counterlatest'
--

CREATE TABLE IF NOT EXISTS counterlatest (
  latestid bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  counter_id bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (latestid),
  UNIQUE KEY latestid (latestid),
  KEY counter_id (counter_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `counterlatest`
--
ALTER TABLE `counterlatest`
  ADD CONSTRAINT counterlatest_ibfk_1 FOREIGN KEY (counter_id) REFERENCES counter (id);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
