-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2016 at 08:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `constructure`
--

-- --------------------------------------------------------

--
-- Table structure for table `componentsele`
--

CREATE TABLE `componentsele` (
  `id` int(50) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `highload`
--

CREATE TABLE `highload` (
  `id` int(50) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answers` varchar(500) NOT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highload`
--

INSERT INTO `highload` (`id`, `question`, `answers`, `points`) VALUES
(1, 'A mass of 0.5 kg moving with a speed of 1.5 m/s on a horizontal smooth surface collides with a nearly weightless spring of force constant k= 50N/m. what would be the maximum compression of the spring?', '0.15m', 3),
(2, 'A spherical drop of water carrying a charge of 3.0x10-10 has a potential of 500V at its surface. If two such drops combine to form a single drop, what is the potential at the surface of the new drop so formed?', '795V', 3),
(3, 'Newton solved the apple earth problem by stating the.', 'shell theorem', 3),
(4, 'A ship is sailing westwards at 8 m/s. While trying to fix a bolt at the top of the mast, the sailor drops the bolt. If the mast of the ship is 19.6 m high, where will the bolt hit the deck?', 'at its foot', 5),
(5, 'A cart of mass 500 kg is standing at rest on the rails. A man weighing 70 kg and running parallel to the rail track with a velocity of 100 ms-1jumps on to the cart on approaching it. Find the velocity with which the cart will start moving?', '1.23m/s', 5);

-- --------------------------------------------------------

--
-- Table structure for table `icy`
--

CREATE TABLE `icy` (
  `id` int(50) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `points` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icy`
--

INSERT INTO `icy` (`id`, `question`, `answer`, `points`) VALUES
(1, 'A hot liquid is kept a ‘big room’. The logarithm of the numerical value of the temperature difference between the liquid and the room is plotted against time. The shape of the plot will be very nearly?', 'straight', 3),
(2, 'On a new scale of temperature (which is linear) and called the W scale, the freezing and boiling point of water are 390 W and 2390 W respectively. What will be the temperature on the new scale, corresponding to a temperature of 390 C on the Celsius scale?\r\n(Note: Please omit the degree symbol in your answer.)', '117 W', 3),
(3, 'The mesmerising view from the top floor of the empire state building left you speechless and then you notice an experiment being conducted by two students. A person A throws a ball from the top of Empire State, at a height of 400m from the ground, another person B throws a ball at the same time in the air at a speed of 100 m/sec. Find the distance covered by ball B after it crosses ball A. (assume g=10 m/sec2).', '480 m', 3),
(4, 'You had some free time and you planned to visit a nearby water park. There you observed a system of pipes of circular cross-section:\r\nA pipe A has a discharge of 50 m3/s. It is divided into two parts B and C, B has a velocity of 10 m/s and diameter of 1 m. C is further divided into D and E. And finally E and B meets giving a final discharge of 40 m3/s.Find the discharge in D. Neglect friction and other losses and round off the answer to the nearest whole number \r\n', '9', 3),
(5, 'A particle moves in a region having a uniform magnetic field and a parallel uniform electric field. At some instant, the velocity of the particle is perpendicular to the field direction. The path of the particle will be ?', 'a circle', 3),
(6, '0.75 gram of petroleum was burnt in a bomb calorimeter which contains 2kg of water equivalent 500 gram. The rise in the temperature was 30C. The calorific value of petroleum is 10nN. What is the value of n?', '4', 5),
(7, 'Two spherical bodies A (radius of 6 cm) and B (radius 18cm) are at temperatures T1 and T2 respectively. The maximum intensity in the emission spectrum of A is at 500nm and in B is 1500nm. Considering them to be black bodies, what will be the ratio of the rate of total energy radiated by A to that of B?', '9', 5),
(8, 'On your visit to Stonehenge u found an ancient code of numbers. Decode the code (73,84,67,88,71,91,67,84,70) if ''DEMISE'' is (70,71,79,75,85,71)', 'GRAVEYARD', 5);

-- --------------------------------------------------------

--
-- Table structure for table `muddy`
--

CREATE TABLE `muddy` (
  `id` int(50) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muddy`
--

INSERT INTO `muddy` (`id`, `question`, `answer`, `points`) VALUES
(1, 'Displacement current goes on through the gap between the plates of the capacitor  when the charge in the capacitor________', 'is zero', 3),
(2, 'A point source of light is used in a photoelectric effect. If the source is received farther from the emitting metal .What effect it will have on the stopping potential?', 'will remain constant', 3),
(3, 'A car is running at a speed u. Seeing a child on the road, the driver applies brakes so as to bring the car to halt within a distance S. What is the reaction time of the driver?', '2S/u', 3),
(4, 'Being an engineer, a structural engineer consulted you to help out with a technical trouble he was facing. Find the position of the centroid of the given figure about AB. Take A as the origin. Answer in the format <X>,<Y>', 'X=4.5, Y=4.79', 5),
(5, 'On your way to 30 St. Mary Axe you passed by BIG BEN, you noticed that the time was 10:20, after visiting the  30 St Mary axe and now reaching the Big ben, you notice that the hour hand has moved by an angle 73 degrees .What is the time now? Answer in the format (hh:mm)', '12:46', 5);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(50) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `points` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `strongrock`
--

CREATE TABLE `strongrock` (
  `id` int(50) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strongrock`
--

INSERT INTO `strongrock` (`id`, `question`, `answer`, `points`) VALUES
(1, 'A boy whirl a stone in a horizontal circle of radius 1.5m and at a height 2m above the level ground. The string breaks and the stone flies off tangentially and strikes the ground after travelling a horizontal distance of 10m. What is the magnitude of the centripetal acceleration of the stone while in circular motion?', '163m/s2', 3),
(2, 'If heat is supplied to a body ,its temperature\r\na)Must increase                  \r\nb)May remain constant\r\nc) may increase \r\nd) may decrease\r\n', 'b', 3),
(3, 'A disc of mass 10g is kept floating horizontally by throwing 10 marbles per second against it from below. If the mass of each marble is 5g, what is the velocity with which the marbles are striking the disc (cm/s). Assume that the marbles strike the disc normally and rebound normally with the same speed.', '98cm/s', 5),
(4, 'A rocket is fired vertically from the surface of mars with a speed of 2km/s. If 20% of its initial energy is lost due to martian atmosphere resistance, how far will the rocket go from the surface of mars before returning to it? Mass of mars= 6.4x1023 kg, radius of mars= 3395km,     G=6.67x10-11Nm2/kg.', '495km', 5),
(5, 'Acc.to Newton’s law of gravitation the force acting on two bodies of mass 1kg situated at a distance of 10^-9m. the Force will be equal to', 'zero', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `points`, `level`) VALUES
(1, 'Test', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `componentsele`
--
ALTER TABLE `componentsele`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highload`
--
ALTER TABLE `highload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icy`
--
ALTER TABLE `icy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muddy`
--
ALTER TABLE `muddy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strongrock`
--
ALTER TABLE `strongrock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `componentsele`
--
ALTER TABLE `componentsele`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `highload`
--
ALTER TABLE `highload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `icy`
--
ALTER TABLE `icy`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `muddy`
--
ALTER TABLE `muddy`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `strongrock`
--
ALTER TABLE `strongrock`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
