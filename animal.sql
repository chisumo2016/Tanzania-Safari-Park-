-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 10:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `animal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number_people` int(11) NOT NULL,
  `book_date` varchar(50) NOT NULL,
  `depart_date` varchar(50) NOT NULL,
  `arrival_date` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `name`, `number_people`, `book_date`, `depart_date`, `arrival_date`, `date`, `status`) VALUES
(3, 3, 'hello world', 123, '05/03/2015 00:00', '05/15/2015 00:00', '05/27/2015 10:28', '2015-05-03 07:16:18', '0'),
(5, 2, 'Admin2', 12, '05/07/2015 00:00', '05/09/2015 00:00', '05/01/2015 00:00', '2015-05-04 07:14:40', '0'),
(12, 10, 'Cameron Bernard', 12, '05/13/2015 00:00', '05/19/2015 00:00', '05/14/2015 00:00', '2015-05-11 11:55:59', '0'),
(8, 6, 'Butoke Chsiumo', 122, '05/06/2015 00:00', '05/13/2015 00:00', '05/06/2015 00:00', '2015-05-05 05:30:03', '0'),
(9, 7, 'Nancy Martin', 5, '05/06/2015 07:29', '05/18/2015 00:00', '05/07/2015 00:00', '2015-05-06 11:02:15', '0'),
(10, 8, 'Mausam', 5, '05/12/2015 00:00', '05/25/2015 00:00', '05/06/2015 12:42', '2015-05-11 03:25:23', '0'),
(11, 9, 'Bundalla Rober', 8, '05/11/2015 16:00', '05/18/2015 00:00', '05/12/2015 08:00', '2015-05-11 05:18:19', '0'),
(13, 0, 'Mansoor', 2, '2015-05-20', '2015-05-30', '2015-05-12', '2015-05-12 00:00:00', '1'),
(14, 12, 'Mansoor', 2, '2015-05-20', '2015-05-30', '2015-05-12', '2015-05-12 00:00:00', '1'),
(15, 11, 'Shila', 2, '05/14/2015 07:01', '05/15/2015 08:01', '05/13/2015 07:01', '2015-05-13 12:28:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`) VALUES
(1, 'Home', '<p><img alt="" src="http://www.onekind.org/uploads/a-z/az_giraffe1.jpg" style="float:left; height:170px; width:300px" />A Tanzania safari is something special, whatever your age, budget, interests or previous safari experience. Almost a third of this vast and spectacular country is protected for wildlife viewing, and these areas include some of the best and most varied game viewing locations in the world. This is a region of incredible natural beauty with a great range of landscape and terrain. Furthermore, all the game viewing areas offer a selection of excellent accommodation options - a winning combination!</p>\r\n\r\n<p>Though very accessible, Tanzania Safari isn&#39;t on many safari itineraries. This is mainly because it doesn&#39;t offer a chance of seeing the <a href="https://www.safaribookings.com/arusha-np#">Big Five</a>. The park is at the base of Mount Meru, which is good for climbing. It has a range of habitats including forest - home to <a href="https://www.safaribookings.com/arusha-np#">black-and-white colobus</a> monkeys - and is excellent for birding.</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n'),
(2, 'About Tanzania Safari ', '<p><strong>A&nbsp;Tanzania safari is something special, whatever your age,&nbsp;budget, interests or previous safari experience.&nbsp; Almost a third&nbsp;of this vast and spectacular country is protected for wildlife viewing, and these&nbsp;areas include </strong><strong>some of the best and most varied&nbsp;game viewing locations in the world.&nbsp; </strong><strong>This is a region of incredible natural beauty with a great&nbsp;range of landscape and terrain.&nbsp; Furthermore, all the game viewing areas offer a selection&nbsp;of&nbsp;excellent&nbsp; animals and other creatures to see.</strong></p>\r\n\r\n<p><strong>Tanzanian Safaris&nbsp;can take many forms, depending on your interests and inclinations. We specialise in providing you with the finest safari experiences, in absolute comfort and style, whatever your requirements.&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, 'Contact', '<p><strong>Contact Us</strong></p>\r\n\r\n<p>Please free to contact by using one of the method below</p>\r\n\r\n<p>14 Rothwell Walk</p>\r\n\r\n<p>Caversham</p>\r\n\r\n<p>Reading RG4 5DB</p>\r\n\r\n<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.489380792473!2d-0.954275699999985!3d51.46753090000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48769b29b742394b%3A0xe1fd7b6974c87550!2s14+Rothwell+Walk%2C+Reading+RG4+5DB!5e0!3m2!1sen!2suk!4v1430906072571" width="600" height="450" frameborder="0" style="border:0"></iframe>'),
(4, 'What We Offer', '<p>Our Service List</p>\r\n\r\n<ul>\r\n	<li><strong>Arusha National Park</strong> : View the Antelope, elephant&nbsp; species and black and while color</li>\r\n	<li><strong>Katavi Nation Park</strong> :- It very Classic Park , view the big rhino and big animal</li>\r\n	<li><strong>Lake Manyara&nbsp;</strong> :- It very Classic Park , view the big animal and other&nbsp; species</li>\r\n	<li><strong>Mahale Mountain</strong> : It very Classic Park , view the big Chimpanzee</li>\r\n</ul>\r\n\r\n<p>In order to view these beutiful Park ,Customer has to registers first&nbsp; in order to making a booking via online.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `is_admin`, `date`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2015-05-02 00:00:00'),
(2, 'Testa', 'tets@test.com', 'testing', 'e10adc3949ba59abbe56e057f20f883e', 0, '2015-05-02 08:16:58'),
(3, 'Adminfffff', 'jitendra_solanki7087@yahoo.comfff', 'admin2fffff', '21232f297a57a5a743894a0e4a801fc3', 0, '2015-05-03 10:14:26'),
(4, 'NIks', 'jagad.nikunj@gmail.com', 'niks', '77f5b1b21376c34b437f3ae7b710032d', 0, '2015-05-04 09:02:52'),
(5, 'bernard chisumo', 'bt@yahoo.com', 'chisumo', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2015-05-05 05:07:57'),
(6, 'bernard chisumo', 'bchisumo74@yahoo.com', 'chisumo', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2015-05-05 05:28:44'),
(7, 'Nancy Martin', 'na@gmail.com', 'nancy', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2015-05-06 11:00:40'),
(8, 'bertha', 'bchisumo74@hotmail.com', 'rujama', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2015-05-11 03:09:41'),
(12, 'bertha', 'b@cd.com', 'bertha', '202cb962ac59075b964b07152d234b70', 0, '2015-05-14 07:10:29'),
(10, 'Cameron Bernard', 'cameron@gmail.com', 'cam', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2015-05-11 11:53:28'),
(11, 'Alexander', 'ac@email.com', 'AlexanderC', '2ac9cb7dc02b3c0083eb70898e549b63', 0, '2015-05-13 12:27:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
