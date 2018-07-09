-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: cluster37.shareddb.hi.local:10037
-- Generation Time: Oct 12, 2016 at 10:11 AM
-- Server version: 5.5.52
-- PHP Version: 5.5.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web222-spotlight`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `Level` int(11) NOT NULL DEFAULT '1',
  `Question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`Level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Level`, `Question`, `answer`) VALUES
(1, '1. When the weight of reputation burdened him down, all it took was his own weight to impress the crown.\r\nWho am I?', 'archimedes'),
(2, '2. Hello Food ! ', 'foodpanda'),
(3, '3. Thank you for spending Christmas Eve at the House of Mouse.', 'waltereliasdisney'),
(4, '4. ALLURE OF THE SEAS', 'starbucks'),
(5, '5. She Doodled this.\r\nWho is She?', 'monica'),
(6, '6. T.Hawkins: Where do your words lie?\r\nAnthony: They lie in the game!\r\nWhat are they referring to ?', 'easports'),
(7, '7. No one ate the chips we first made!\r\nWho are we?', 'belllabs'),
(8, '8. CTRL C : EIC DOUBLE MOHUR', 'raghuramrajan'),
(9, '9. I own a subsidiary of the Catwoman , who am I?', 'warrenbuffet'),
(10, '10. My spyder rightfully avenged my insult at the hands of the stallion!\r\nWho am i?', 'ferrucciolamborghini'),
(11, '11. ''''That''s one small step for mankind, one giant leap for mankind."', 'motorola'),
(12, '12. THE ABODE OF PEACE', 'hassanalbolkiah'),
(13, '13. Who am I?', 'hermionegranger'),
(14, '14. She coined a term as the moth flew into the relay of the machine, little did she know that years later, the term will be on every coder’s mouth?', 'gracehopper'),
(15, '15. Which state am I located in?', 'nevada'),
(16, '16. Can it BE any easier ?', 'jonhaugen'),
(17, '17. Explore.', 'kanchenjunga'),
(18, '18. Taxi Driver: Where shall I drop you sir?\r\nHugo: To the Casino, NewYork.\r\nWho directed this scene?', 'martinscorsese'),
(19, '19. If you need all the information in the world in an archive, don’t go anywhere else but go to the mountain!', 'ironmountain'),
(20, '20. ©“Naughty but Nice”', 'salmanrushdie'),
(21, '21. They did in 2000,repeated in 2002,2011 and 2012, now in 2013, will Harlem shake be enough for Shun & Mao.\r\nWho are they ?', 'china'),
(22, '22. Name of the fun school ? ', 'funskool'),
(23, '23. The Mysterious Affairs at Styles', 'davidsuchet'),
(24, '24. When I was first born, I was first looking at a coffee cup in the Virus Room. Who am I?', 'webcam'),
(25, '25. Only if you thought Yoga was enough.', 'acharyabalkrishna'),
(26, '', 'precursor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `RegistrationNo` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Password` text NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Branch` text NOT NULL,
  `Score` int(11) NOT NULL DEFAULT '1',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
