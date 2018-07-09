-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2016 at 05:36 AM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdbc_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `has_answered`
--

CREATE TABLE `has_answered` (
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `has_answered`
--

INSERT INTO `has_answered` (`user_id`, `level`, `question_id`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 1, 6),
(1, 1, 7),
(1, 1, 8),
(1, 1, 11),
(1, 1, 12),
(1, 1, 13),
(1, 1, 14),
(1, 1, 15),
(1, 1, 16),
(1, 1, 17),
(1, 1, 18),
(1, 2, 6),
(1, 2, 7),
(1, 2, 8),
(1, 2, 9),
(1, 2, 10),
(1, 2, 11),
(1, 2, 12),
(1, 2, 13),
(1, 2, 14),
(1, 2, 15),
(1, 2, 16),
(1, 2, 37),
(1, 2, 38),
(1, 2, 39),
(1, 3, 1),
(1, 3, 2),
(1, 3, 3),
(1, 3, 4),
(1, 3, 5),
(1, 3, 6),
(1, 3, 7),
(1, 3, 8),
(1, 3, 9),
(1, 3, 10),
(1, 3, 11),
(1, 3, 12),
(1, 3, 13),
(1, 3, 14),
(1, 3, 15),
(1, 3, 16),
(1, 3, 17),
(1, 3, 18),
(1, 3, 19),
(1, 4, 1),
(1, 4, 2),
(1, 4, 3),
(1, 4, 4),
(1, 4, 5),
(1, 4, 6),
(1, 4, 7),
(1, 4, 8),
(1, 4, 9),
(1, 4, 10),
(1, 4, 11),
(1, 4, 12),
(1, 4, 13),
(1, 4, 14),
(1, 4, 15),
(1, 5, 1),
(1, 5, 2),
(1, 5, 3),
(1, 5, 4),
(1, 5, 5),
(1, 5, 6),
(1, 5, 7),
(1, 5, 8),
(1, 5, 9),
(1, 5, 10),
(1, 5, 11),
(1, 5, 12),
(1, 5, 13),
(1, 5, 14),
(1, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `level_1`
--

CREATE TABLE `level_1` (
  `question_id` int(11) NOT NULL,
  `is_mcq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_1`
--

INSERT INTO `level_1` (`question_id`, `is_mcq`, `question`, `answer`, `points`) VALUES
(1, 0, 'On a new scale of temperature (which is linear) and called the W scale, the freezing and boiling point of water are 390 W and 2390 W respectively. What will be the temperature on the new scale, corresponding to a temperature of 390 C on the Celsius scale (only the numerical value)?', '117', 3),
(2, 0, 'The mesmerizing view from the top floor of the empire state building left you speechless and then you notice an experiment being conducted by two students. A person A throws a ball from the top of Empire State, at a height of 400m from the ground, another person B throws a ball at the same time in the air at a speed of 100 m/sec. Find the distance covered by ball B after it crosses ball A. (assume g=10 m/sec2).', '480', 3),
(3, 0, 'A spherical drop of water carrying a charge of 3.0x10-10 has a potential of 500V at its surface. If two such drops combine to form a single drop, what is the potential at the surface of the new drop so formed?', '795', 3),
(4, 1, 'If heat is supplied to a body ,its temperature:<br />\na) Must increase<br />\nb) May remain constant<br />\nc) may increase<br />\nd) may decrease', 'b, c', 3),
(5, 1, 'A rigid container of negligible heat capacity contains one mole of an ideal gas. The temperature of the gas increase by 10C if 3.0 cal of hear is added to it. The gas may be\na) Helium<br />\nb) Argon<br />\nc) Oxygen<br />\nd)  Carbon dioxide', 'a, b', 3),
(6, 0, 'Along with red bus ticket, you received a complementary ride on the London eye. The giant wheel having radius 10m is rotating .Mass of one cubicle inclusive of the passengers is 300Kg. assuming that the giant wheel has been given a velocity so that it just completes a circle. Determine the amount of force that that the giant wheel having radius 10m is rotating .Mass of one cubicle inclusive of the passengers is 300Kg. Assuming that the giant wheel has been given a velocity so that it just completes a circle. Determine the amount of force that the cubicle will experience at the bottom of the loop( Assume g=10m/s2 and neglect losses due to friction and other external losses.)', '4198', 3),
(7, 0, 'Walking back to your hotel room from a garden, you notice a fellow traveler suffering from skin irritation and some allergic reactions. You intend to help him out by finding out the cause. He couldn’t speak but had a chemical structure of the compound. Write the common name of the compound.<br />\n<img src="img/questions/q1_7.jpg">', 'Ortho-vanillin; o-vanillin', 3),
(8, 1, 'If A + B means A is the mother of B; A - B means A is the brother B; A % B means A is the father of B and A x B means A is the sister of B, which of the following shows that P is the maternal uncle of Q?<br />\na) Q - N + M * P<br />\nb) P + S * N - Q<br />\nc) P - M + N * Q<br />\nd) Q - S % P', 'c', 3),
(11, 1, 'A body projected vertically from the earth reaches a height Equal to the radius of the earth before returning. The power exerted by the gravitational force is the greatest<br />\na) At the highest point of the body<br />\nb) At the instant just before the body hits the earth<br />\nc) It remains constant throughout<br />\nd) At the instant just after the body is projected', 'b', 3),
(12, 1, 'Study the diagram given below and answer each of the following questions<br />\n<img src="img/questions/q1_9.jpg" /><br />\nHow many persons are there who take both tea and coffee but not wine ?<br />\nA 22<br />\nB 17<br />\nC 7<br />\nD 20', 'c', 3),
(13, 0, 'A ball of mass 0.2 kg is thrown vertically upwards by applying a force with hands. If the hand moves 0.2 m while applying the force and the ball goes upto 2m height further, find the magnitude of the force. Take g= 10m/s2', '22', 3),
(14, 0, 'A man desired to get into his work building, however he had forgotten his code.<br />\nHowever, he did recollect five pieces of information<br />\n-> Sum of 5th number and 3rd number is 14.<br />\n-> Difference of 4th and 2nd number is 1.<br />\n-> The 1st number is one less than twice the 2nd number.<br />\n->The 2nd number and the 3rd number equals 10.<br />\n->The sum of all digits is 30.<br />', '74658', 5),
(15, 0, 'Two spherical bodies A (radius of 6 cm) and B (radius 18cm) are at temperatures T1 and T2 respectively. The maximum intensity in the emission spectrum of A is at 500nm and in B is 1500nm. Considering them to be black bodies, what will be the ratio of the rate of total energy radiated by A to that of B?', '9', 5),
(16, 1, 'In a certain code language, ‘kew xas huma deko’ means ‘she is eating apples’; ‘kew tepo qua’ means\n    ‘she sells toys’ and ‘sul lim deko’ means ‘I like apples’. Which word in that language means ‘she’ and\n    ‘apples’?<br />\n a. xas & deko<br />\n b. xas & kew<br />\n c. kew & deko<br />\n d. kew & xas', 'c', 5),
(17, 1, 'One of the following numbers can be marked out as the odd one out. Can you find which one?<br />\n       a) 680986879<br />\n       b) 716089780<br />\n       c) 820670987<br />\n       d) 932967879', 'c', 5),
(18, 1, 'The initial velocity of the particle is u=4i+3j m/s. It is moving with uniform acceleration a=.4i+.3j m/s2.which of the following is true<br />\na. the magnitude of the velocity after 10 sec is 10m/s<br />\nb. The velocity vector at time t is given by (4+.4t)i +(3+.3t)j<br />\nc. the displacement at time t is (4t+.22)i +(3t+.152)j<br />\nd . None of the above<br />', 'a, b', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_2`
--

CREATE TABLE `level_2` (
  `question_id` int(11) NOT NULL,
  `is_mcq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_2`
--

INSERT INTO `level_2` (`question_id`, `is_mcq`, `question`, `answer`, `points`) VALUES
(6, 0, 'A diesel power station has a fuel consumption of 0.28 kg. The calorific value of fuel is 10,000 \r\nKcal/kg. Determine the overall efficiency (only give the numerical value).', '30.7', 3),
(7, 0, 'You are travelling on a train to Iguazu falls and notice, a man at rest throwing a ball in such a way that it returns to him and the train travels at 58.8m. If the train was travelling  with a constant velocity of 14.7m/s on a straight horizontal track .Find the initial speed of the ball as seen from the train.( take g=9.8 and round off to nearest whole number  )', '20', 3),
(8, 0, 'During your visit to newton Navarro Bridge, you were lucky enough to meet one of the leading marine engineers. He wanted to check your knowledge before a site visit. The following was his question.<br />\n                      Identify the element from the clues given below<br />\n1. D block element<br />\n2. Corrosion resistant<br />\n3. This metal and its alloys oxidises immediately on exposure with air.<br />\nDiscovered in late 18th century', 'titanium', 3),
(9, 1, 'You are at Princess Towers and you were approached by one of the engineers to help him find out the Moment of inertia about y-y axis. Round off the answer to the nearest whole number. \r\n<img src="img/questions/q2_4.jpg">', '292, 294, 296', 3),
(10, 1, 'Choose the wrong statements<br />\na) The molecules of the liquid lying in the surface film have smaller potential energy in comparison to the inner molecules.<br />\nb) For a curved surface of a liquid in equilibrium, the pressure is more on the concave side of the liquid than on the convex side.<br />\nc) Excess pressure inside the air bubble of radius R at the depth h inside a liquid of surface tension S is p=hpg+ 2S/R<br />\nd) Angle of contact increases with the increase in temperature of liquid.<br />\ne) Angle of contact depends on the inclination of the solid surface to the liquid surface.', 'a, c, e', 3),
(11, 0, '<img src="img/questions/q2_6.jpg">', 'p', 3),
(12, 0, 'Can you complete below number series by replacing "?" with the correct number.<br />\n<br />\n10 # 10 # 20 # ? # 110 # 300 # 930', '45', 3),
(13, 1, 'There are 8 houses in a line and in each house only one boy lives with the conditions as given below:<br />\n1. Jack is not the neighbour Siman.<br />\n2. Harry is just next to the left of Larry.<br />\n3. There is at least one to the left of Larry.<br />\n4. Paul lives in one of the two houses in the middle.<br />\n5. Mike lives in between Paul and Larry.<br />\nIf at least one lives to the right of Robert and Harry is not between Taud and Larry, then which one of the following statement is not correct ?<br />\nA)Robert is not at the left end.<br />\nB)Robert is in between Simon and Taud.<br >\nC)Taud is in between Paul and Jack.<br />\nD)There are three persons to the right of Paul.<br />', 'c', 3),
(14, 0, 'In a certain code language $#* means ‘Shirt is clean’, @ D# means ‘Clean and neat’ and @ ? means ‘neat boy’, then what is the code for ‘and’ in that language<br />\n\na) # <br />\nb) D <br />\nc) @ <br />\nd) Data inadequate ', 'b', 3),
(15, 0, 'You are at Ferrari world Abu Dhabi and you notice an 800 kg roller-coaster is released from rest at Point A of the track shown in the figure. Assume there is no friction or air resistance between Points A and C. How fast is the roller-coaster moving at Point B? What average force is required to bring the roller-coaster to a stop at Point D if the brakes are applied at Point C?\n<img src="img/questions/q2_1_1.jpg">', '12000', 5),
(16, 0, 'While you were in Brazil, the government made a major change by shifting the Brasillia time zone UTC-3 to a new location 9 degrees westwards. If the time before this change was 10:45, what is the time   now after the shifting of brasillia time zone? (Answer in the format HH:MM)', '10:09', 5),
(37, 1, 'In a certain code language : ‘dugo hui mul zo’ stans for ‘work is very hard’ ‘hui dugo ba ki’ for ‘Bingo is very smart’; ‘nano mul dugo’ for ‘cake is hard’; and ‘mul ki gu’ for ‘smart and hard’ Which of the following word stand for Bingo ?<br />\n\na) Jalu <br />\nb) Dugo <br />\nc) Ki <br />\nd) Ba<br />', 'd', 5),
(38, 0, 'The figure given on the left hand side in the following question is folded to form a box. Choose from the alternatives (1), (2), (3) and (4) the boxes that is similar to the box formed. <br />\n<img src="img/questions/q2_1_3.jpg"><br />\nA)1 and 2 only<br />\nB)2 and 4 only<br />\nC)2 and 3 only<br />\nD)1 and 4 only', 'c', 5),
(39, 1, 'If <br /> \r\n1. A + B means A is the mother of B.<br />\r\n2. A - B means A is the sister of B.<br />\r\n3. A * B means A is the father of B.<br />\r\n4. A ^ B means A is the brother of B.<br />\r\nWhich of the following means that N is the maternal uncle of M?<br />\r\na) N ^ P - L + E - M<br />\r\nb) N - Y + A ^ M<br />\r\nc) M - Y * P – N<br />\r\nd) N ^ C + F * M', 'a', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_3`
--

CREATE TABLE `level_3` (
  `question_id` int(11) NOT NULL,
  `is_mcq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_3`
--

INSERT INTO `level_3` (`question_id`, `is_mcq`, `question`, `answer`, `points`) VALUES
(1, 1, 'Given, in figure, Mass of A= 5kg , Force F= 150 N, Mass of B= ,acceleration of A= , the inclined length = 30 coefficient of friction = 0.5\nFind the time taken (in seconds) for B to cover the entire inclined length from 0 to 30m. (round off the answer to suitable whole number)\n<img src="img/questions/q3_1.jpg">', '7, 8, 9', 3),
(2, 0, 'A sphere of relative density of 9 and a diameter of D has a concentric cavity of diameter d. when the sphere just floats on water in a tank, what is the value of D/d (upto 2 decimal places)', '0.96', 3),
(3, 0, 'A dam is situated at a height of 550m above the sea level and supplies water to a power house which is at a height of 50 m above the sea level. 2000kg of water passes through the turbines per second. What would be the maximum power output of the power house (in MW) if the whole system were 80% efficient?', '8', 3),
(4, 1, 'Two resistors having equal resistances are joined in series and a current is passed through the combination. Neglect any variation in resistance as the temperature changes. In a given time interval,\r\na) Equal amount of thermal energy must be produced in the resistors \r\nb) Unequal amount of thermal energy may be produced\r\nc) The temperature must rise equally in the resistors\r\nd) The temperature may rise equally in the resistors', 'a, d', 3),
(5, 0, 'A guy stole a laptop. When he opens it, he finds that it is password protected. He clicks on the hint and the following text appears in front of him:\r\n1 Jug 2 Birthdays 3 flights 4 Cars 2 Laptops 1 Watch\r\nHe is left confused entirely. He has no clue. Can you help him with the password ', 'JIGAW', 3),
(6, 0, 'Can you identify the hidden rebus in the image below?\n<img src="img/questions/q3_6.jpg">', 'bear', 3),
(7, 1, 'In a class there are seven students (including boys and girls) A, B, C, D, E, F and G. They sit on three benches I, II and III. Such that at least two students on each bench and at least one girl on each bench. C who is a girl student, does not sit with A, E and D. F the boy student sits with only B. A sits on the bench I with his best friends. G sits on the bench III. E is the brother of C.<br />\nWhich of the following is the group of girls ?<br />\nA)BAC<br />\nB)BFC<br />\nC)BCD<br />\nD)CDF', 'c', 3),
(8, 1, 'Complete the series\n4, 12, 48, 240, 1440, (...)<br />\nA)7620<br />\nB)10080<br />\nC)6200<br />\nD)10020', 'b', 3),
(9, 1, 'Two cubes each weighing 22g exactly are taken. One is of iron( d= 8x103 kg/m3)) and other is of marble (d= 38x103 kg/m3). They are immersed in alcohol and then weighed again<br />\na) Iron cube weighs less<br />\nb) Iron cube weighs more<br />\nc) Both have equal weight<br />\nd) Nothing can be said<br />', 'b', 3),
(10, 0, 'BC is a cantilever bridge of span 8.279 m. Find the reaction force Ra if along with the force shown figure, a UDL of 30 N/m is there throughout span. Find Ra in KN \n<img src="img/questions/q3_2_1.jpg">', '550', 5),
(11, 0, 'A fully loaded Boeing aircraft has a mass of 3.3x 10^5 kg. Its total wing area is 500 m2. It is in level flight with a speed of 960 kmph. Estimate the percentage increase in the speed (give only the numerical value) of the air on the upper surface of the wing relative to the lower surface. The density of air is 1.2 kg/m3', '8', 5),
(12, 0, 'A rocket is fired vertically from the surface of mars with a speed of 2km/s. If 20% of its initial energy is lost due to martian atmosphere resistance, how far will the rocket go from the surface of mars before returning to it (in Km)? Mass of mars= 6.4x1023 kg, radius of mars= 3395km,     G=6.67x10-11Nm2/kg.', '495', 5),
(13, 0, 'The average of five natural numbers is 150. A particular number among the five exceeds another by 100. The rest three numbers lie between these two numbers and they are equal. How many different values can the largest number among the five take?<br />\n1) 59<br />\n2) 19<br />\n3) 21<br />\n4) 42<br />\n(enter the value, not the option number)', '19', 5),
(14, 0, '<img src="img/questions/q3_2_5.jpg">\n', 'Jack of SpadeS', 5),
(15, 0, 'Complete the sequence:  5824, 5242, ? , 4247, 3823<br />\na) 4467<br />\nb) 4718<br />\nc) 4856<br />\nd) 5164<br />', 'b', 5),
(16, 0, 'A nut comes loose from a bolt on the bottom of an elevator as the elavator is moving up the shaft at 3m/s. The nut strikes the bottom of the shaft in 2 sec. How far from the bottom of the shaft was the elevator when nut falls off (give only the numerical value in the nearest whole number)', '14', 5),
(17, 0, 'I have a few sweets to be distributed. If I keep 2, 3 or 4 in a pack, I am left with one sweet. If I keep 5 in a pack, I am left with none. What is the minimum number of sweets I can have to pack and distribute?', '25', 5),
(18, 0, 'On your visit to Stonehenge u found an ancient code of numbers. Decode the code (73,84,67,88,71,91,67,84,70) if \'DEMISE\' is (70,71,79,75,85,71)', 'GRAVEYARD', 5),
(19, 0, 'A thick uniform bar lies on a frictionless horizontal surface and is free to move in any way on the surface. Its mass is 0.16kg and length is 1.7 m. Two particles each of mass 0.8kg are moving on the same surface and towards the bar in the direction perpendicular to the bar, one with a velocity of 10m/s and other with velocity of 6m/s. If collision between the particles and the bar is completely inelastic, both particles strike with the bar simultaneously. What is the velocity (in m/s) of center of mass after collision?', '4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_4`
--

CREATE TABLE `level_4` (
  `question_id` int(11) NOT NULL,
  `is_mcq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_4`
--

INSERT INTO `level_4` (`question_id`, `is_mcq`, `question`, `answer`, `points`) VALUES
(1, 0, 'Two trains running in opposite directions cross a man standing on the platform in 27 secs and 17 secs respectively and they cross each other in 23 secs. The ratio of their speeds is ?', '3:2', 3),
(2, 0, 'A particle A is projected from the ground with an initial velocity of 10m/s at an angle 600 with horizontal. From what height (in meters) should another particle B be projected horizontally with velocity 5m/s so that both the particles collide in ground at a common point if both are projected simultaneously.\r\ng=10m/s2', '15', 3),
(3, 0, 'A body initially at 800 C cools to 640 C in 5 minutes and to 520 C in 10 minutes. What is the temperature of the surrounding? (give the answer only in whole number)', '16', 3),
(4, 1, 'A gas kept on a container of finite conductivity is suddenly compressed. The process<br />\n\na) Must be very nearly adiabatic<br />\nb) Must be very nearly isothermal <br />\nc) May be very nearly adiabatic<br />\nd) May be very nearly isothemal  <br />', 'c, d', 3),
(5, 1, 'Find the number of triangles in the given figure.<br />\n<img src="img/questions/q4_5.jpg"><br />\nA)10<br />\nB)12<br />\nC)14<br />\nD)16', 'c', 3),
(6, 1, 'Six dice with upper faces erased are as shows.<br />\n<img src="img/questions/q4_6.jpg"><br />\nThe sum of the numbers of dots on the opposite face is 7.\nIf dice (I), (II) and (III) have even number of dots on their bottom faces and the dice (IV), (V) and (VI) have odd number of dots on their top faces, then what would be the difference in the total number of top faces between there two sets?<br />\nA)0<br />\nB)2<br />\nC)4<br />\nD)6', 'd', 3),
(7, 1, 'Vincent has a paper route. Each morning, he delivers 37 newspapers to customers in his neighborhood. It takes Vincent 50 minutes to deliver all the papers. If Vincent is sick or has other plans, his friend Thomas, who lives on the same street, will sometimes deliver the papers for him.<br />\nA)Vincent and Thomas live in the same neighborhood.<br />\nB)It takes Thomas more than 50 minutes to deliver the papers.\nC)It is dark outside when Vincent begins his deliveries.<br />\nD)Thomas would like to have his own paper route.', 'a', 3),
(8, 0, 'How much energy (in MeV) is required to separate the typical middle-mass nucleus 120Sn into its constituent nucleons ( only give the numerical value) ?', '1021', 3),
(9, 0, 'Six bells commence tolling together and toll at interval of 2, 4, 6, 8, 10 and 12 secs respectively. In 30 minutes, how many times do they toll together?', '16', 3),
(10, 0, 'The height of the Aswan dam is 364 feet and the length is 3830 feet. Water falls from that height and rotates a turbine of diameter 1m and mass 400 kg. What is the speed of rotation of the turbine (in RPM; only numerical value required)', '0.25', 3),
(11, 0, '0.75 gram of petroleum was burnt in a bomb calorimeter which contains 2kg of water equivalent 500 gram. The rise in the temperature was 30C. The calorific value of petroleum is 10nN. What is the value of n?', '4', 5),
(12, 1, 'Being an engineer, a structural engineer consulted you to help out with a technical trouble he was facing. Find the position of the centroid of the given figure about AB. Take A as the origin. Answer in the format X,Y<br />\n<img src="img/questions/q4_2_2.jpg">', '4.5, 4.79', 5),
(13, 0, 'A cart of mass 500 kg is standing at rest on the rails. A man weighing 70 kg and running parallel to the rail track with a velocity of 100 ms-1jumps on to the cart on approaching it. Find the velocity (in m/s) with which the cart will start moving? ( only numerical va;u required)', '1.23', 5),
(14, 1, 'Choose the wrong statements<br />\na)  Bulk modulas of elasticity is reciprocal of compressibility. (OPTION TO BE CHANGED)<br />\nb) The breaking force for a wire is F. The breaking force for a single wire of double thickness is 2F.<br />\nc) A wire stretches a certain amount under a load. If the load and the diameter of the given wire are both increased to three times , the stretch caused in the wire is 1/9 times.<br />\nd) The elastic after effect is negligible small for quartz but very large for glass fibre.\ne) The possible value of Poissons ratio of a substance lies between 0 and 0.5.', 'b, c, e', 5),
(15, 0, 'A ship is sailing westwards at 8 m/s. While trying to fix a bolt at the top of the mast, the sailor drops the bolt. If the mast of the ship is 19.6 m high, at what place on the ship will the bolt hit the deck?', 'foot', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_5`
--

CREATE TABLE `level_5` (
  `question_id` int(11) NOT NULL,
  `is_mcq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_5`
--

INSERT INTO `level_5` (`question_id`, `is_mcq`, `question`, `answer`, `points`) VALUES
(1, 0, 'An elevator and its load having a total mass of 800kg. The elevator is originally moving downwards at 10m/s, it slows down to stop with constant acceleration in a distance of 25m. What is the tension (in N) in the supporting cable while the elevator is being brought to rest?\r\n       g=10m/s (only numerical value required)', '9600', 3),
(2, 0, 'Water flows through a capillary tube of radius r and length l at a rate of 40mL per second, when connected to a pressure difference of h cm of water. Another tube of the same length but radius r/2 is connected in series with this tube and the combination is connected to the same pressure head. Calculate the pressure difference across each tube and the rate of flow of water through the combination in mL/s. Answer in nearest whole number ', '2', 3),
(3, 1, 'In a laboratory experiment on emission from atomic hydrogen in a discharge tube, only a small number of lines are present in the hydrogen spectrum of a star. What is the reason for this observation?<br />\na) The amount of hydrogen taken is much smaller than that present in the star<br />\nb) The temperature of hydrogen in much lesser than that of the star<br />\nc) The pressure of the hydrogen is much smaller than that of the star<br />\nd) The gravitational pull is much smaller than that in the star', 'b', 3),
(4, 1, 'Six flats on a floor in two rows facing North and South are allotted to P, Q, R, S, T and U.<br />\nQ gets a North facing flat and is not next to S.<br />\nS and U get diagonally opposite flats.<br />\nR next to U, gets a south facing flat and T gets North facing flat.<br />\nWhich of the following combination get south facing flats?<br />\nA)QTS<br />\nB)UPT<br />\nC)URP<br />\nD)Data is inadequate', 'c', 3),
(5, 0, '‘A man is coded as ‘woman’, woman is coded as ‘girl’, ‘girl’ is coded as ‘boy’, ‘boy’ is coded as ‘worker’ then 6 years female is known as?', 'boy', 3),
(6, 1, 'A particle is going moving along x-axis. Which of the following statement is false<br />\na. At time t1 (dx/dt)t=t1=0,then (d2x/dt2)t=t1=0<br />\nb. At time t1 (dx/dt)t=t1 < 0 then the particle is directed towards origin<br />\nc. If the velocity is zero for a time interval, the acceleration is zero at any instant within the time interval.<br />\nd. At time t1 (d2x/dt2)t=t1 < 0 then the particle is directed towards origin', 'b, c', 3),
(7, 1, 'A school having 270 students provides facilities for playing four games – Cricket, Football, Tennis and Badminton. There are a few students in the school who do not play any of the four games. It is known that for every student in the school who plays at least N games, there are two students who play at least (N – 1) games, for N = 2, 3 and 4. If the number of students who play all the four games is equal to the number of students who play none, then how many students in the school play exactly two of the four games?<br />\n1) 30<br />\n2) 60<br />\n3) 90<br />\n4) 120<br />\n(enter the value, not the option number)', '60', 3),
(8, 1, 'Here are some words translated from an artificial language. <br />\nmorpirquat means birdhouse <br />\nbeelmorpir means bluebird <br />\nbeelclak means bluebell <br />\nWhich word could mean “houseguest”?<br />\nA. morpirhunde <br />\nB. beelmoki <br />\nC. quathunde <br />\nD. clakquat ', 'c', 3),
(9, 0, 'A bank offers 5% of compound interest on half yearly basis. A customer deposits 1600 Rs. each on 1st January and 1st July of the year .At the end of the year the amount he would have gained by the way of interest is?', '121', 3),
(10, 0, 'You are at Burj Khalifa, from that point a building A is at N60E another building B is at S45E and building C is at S40W, Now a building D is at 80 degree anticlockwise to A, 120 degrees clockwise to C and 205 degrees clockwise to B. Find the quarter circle bearing of D. \r\n       Consider your location as the origin. (Answer is the following format eg : S79E)', 'N20W/W70N', 3),
(11, 0, 'A disc of mass 10g is kept floating horizontally by throwing 10 marbles per second against it from below. If the mass of each marble is 5g, what is the velocity with which the marbles are striking the disc (cm/s). Assume that the marbles strike the disc normally and rebound normally with the same speed. (only numerical value required)', '98', 5),
(12, 0, 'Acc.to Newton’s law of gravitation the force acting on two bodies of mass 1kg situated at a distance of 10^-9m. the Force will be equal to', '0', 5),
(13, 0, 'Given F=100N and Mass = 10 kg, assuming g=10 m/s2 find the acceleration in M.\n<img src="img/questions/q5_2_3.jpg">', '30 m/s2', 5),
(14, 1, 'P, Q, R, S, T, U, V and W are sitting round the circle and are facing the centre: <br />\n1. P is second to the right of T who is the neighbour of R and V.<br />\n2. S is not the neighbour of P.<br />\n3. V is the neighbour of U.<br />\n4. Q is not between S and W. W is not between U and S.<br />\nWhat is the position of S ?<br />\nA)Between U and V<br />\nB)Second to the right of P<br />\nC)To the immediate right of W<br />\nD)Data inadequate.', 'c', 5),
(15, 1, '<img src="img/questions/q5_2_5.jpg">', '7 of spades;7 of clubs;7 of hearts;7 of diamonds', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `has_started` int(11) NOT NULL,
  `level_1` int(11) NOT NULL,
  `level_2` int(11) NOT NULL,
  `level_3` int(11) NOT NULL,
  `level_4` int(11) NOT NULL,
  `level_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `score`, `has_started`, `level_1`, `level_2`, `level_3`, `level_4`, `level_5`) VALUES
(1, 297, 0, 18, 39, 19, 15, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `has_answered`
--
ALTER TABLE `has_answered`
  ADD PRIMARY KEY (`user_id`,`level`,`question_id`);

--
-- Indexes for table `level_1`
--
ALTER TABLE `level_1`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `level_2`
--
ALTER TABLE `level_2`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `level_3`
--
ALTER TABLE `level_3`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `level_4`
--
ALTER TABLE `level_4`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `level_5`
--
ALTER TABLE `level_5`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level_1`
--
ALTER TABLE `level_1`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `level_2`
--
ALTER TABLE `level_2`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `level_3`
--
ALTER TABLE `level_3`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `level_4`
--
ALTER TABLE `level_4`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `level_5`
--
ALTER TABLE `level_5`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
