-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 23, 2018 at 11:29 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Carpool1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `fav_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `initialLocation` text NOT NULL,
  `destination` text NOT NULL,
  `depart` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ride`
--

CREATE TABLE `Ride` (
  `ride_id` int(11) NOT NULL,
  `rider_type` text NOT NULL,
  `initialLocation` text NOT NULL,
  `destination` text NOT NULL,
  `depart` text NOT NULL,
  `ride_type` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `Username`, `Password`, `Email`, `Mobile`, `picture`) VALUES
(31, 'Ramsha Iftikhar', 'helloramsha', 'riftikhar.bese16seecs@seecs.edu.pk', '3328557374', 'http://res.cloudinary.com/carpool199/image/upload/v1545221143/szuul1u3tlyb5mzdulab.jpg; PHPSESSID=orjpfiijv29pmeji54e9qhe1hj'),
(32, 'Junaid Khalid', 'hellojunaid', 'mkhalid.bese16seecs@seecs.edu.pk', '3336688851', 'http://res.cloudinary.com/carpool199/image/upload/v1545221220/fcoqnpusarikuhfxmwkn.jpg; PHPSESSID=orjpfiijv29pmeji54e9qhe1hj'),
(35, 'Saim Raza', '12345678', 'sraza.bscs16seecs@seecs.edu.pk', '3336688852', 'http://res.cloudinary.com/carpool199/image/upload/v1545243666/afklfk6vdq1ovawfax4g.jpg; PHPSESSID=r896u1761fu0f6jadpqtfugd2u'),
(38, 'Shahzeb', '12345678', 'jun@yahoo.com', '3336688852', 'http://res.cloudinary.com/carpool199/image/upload/v1545244732/xbtpnpe7u2vaphpoqyqa.jpg; PHPSESSID=r896u1761fu0f6jadpqtfugd2u'),
(40, 'Fahad', '12345678', 'tk6783329@gmail.com', '3336688852', 'http://res.cloudinary.com/carpool199/image/upload/v1545289745/aopweh69h8b56xdt7vp0.jpg; PHPSESSID=vttq5i510v2d3dict64l7jfc5l'),
(41, 'The Hand', '12345678', 'hand@gmail.com', '3336688852', 'http://res.cloudinary.com/carpool199/image/upload/v1545291938/xajxyprwqrgqwgoym6iu.png; PHPSESSID=vttq5i510v2d3dict64l7jfc5l'),
(45, 'Lionel Messi', '12345678', 'messi@gmail.com', '923123232', 'http://res.cloudinary.com/carpool199/image/upload/v1545301327/hj819jm7khxdxvwguceh.jpg; PHPSESSID=vttq5i510v2d3dict64l7jfc5l'),
(46, 'Ahmed', '12345678', 'junaid@yahoo.com', '3336688852', 'http://res.cloudinary.com/carpool199/image/upload/v1545303883/uwlaiuleppwfsqrvbzb4.jpg; PHPSESSID=vttq5i510v2d3dict64l7jfc5l');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `ride_id` (`ride_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Ride`
--
ALTER TABLE `Ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Favourite`
--
ALTER TABLE `Favourite`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ride`
--
ALTER TABLE `Ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`ride_id`) REFERENCES `Ride` (`ride_id`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Ride`
--
ALTER TABLE `Ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
