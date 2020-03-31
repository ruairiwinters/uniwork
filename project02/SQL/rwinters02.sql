-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2020 at 01:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rwinters02`
--

-- --------------------------------------------------------

--
-- Table structure for table `project02_actimg`
--

CREATE TABLE `project02_actimg` (
  `id` int(11) NOT NULL,
  `filename` varchar(300) NOT NULL,
  `actid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_actimg`
--

INSERT INTO `project02_actimg` (`id`, `filename`, `actid`) VALUES
(66, 'BtXNC4Dq_400x400.jpg', 33),
(67, 'image.jpg', 33),
(69, 'tommy.jpg', 33),
(76, '0_I181219_150703_1968163oTextTRMRMMGLPICT000052251652o.jpg', 33),
(77, '1_Screen-Shot-2020-01-05-at-095654.png', 33),
(78, '5e7ccbd84c9418.13815407image.jpg', 33),
(79, 'NINTCHDBPICT000450860358.jpg', 32),
(80, '_methode_times_prod_web_bin_0bf759e4-f3f4-11e8-8c84-29b2667b0b46.jpg', 32),
(81, 'nintchdbpict000004401405.jpg', 32),
(82, '5e7ccc84c886f0.62390786p07k0r5r.jpg', 32),
(83, '220px-Kevin_Bridges_2015_Live.jpg', 32),
(84, '430653_1_m.jpg', 3),
(85, '659007_1_m.jpg', 3),
(86, 'bmwcm-5.0_fid-880229_fwcm-1.5_ihcm-50.0_iwcm-43.7_lmwcm-5.0_maxdim-1000_mc-ffffff_rmwcm-5.0_si-435595.jpg_tmwcm-5.0.jpg', 3),
(87, 'large.jpg', 3),
(88, 'getty_1156802643_395407.jpg', 11),
(89, 'sei_52670160-0a28.jpg', 11),
(90, 'f55cab0739390cf3b2c2f773b9c779b2f0ae8a99.jpg', 11),
(91, 'image (2).jpg', 2),
(92, '0011c331-500.webp', 2),
(93, 'image (1).jpg', 2),
(94, 'dermotkennedy4.jpg', 2),
(95, 'nWbB6s--_400x400.jpg', 2),
(96, 'swifttaylor_getty082819.jpg', 39),
(97, 'image (3).jpg', 39),
(98, 'taylor-swift-miss-americana-premiere-2020-billboard-1548-768x433.jpg', 39),
(99, 'Drake-Tory-Lanez-Popcaan.jpg', 40),
(100, 'download.jpg', 40),
(101, 'PRI_132710315-e1583232125363.jpg', 40),
(102, 'drake-2019-06-u-billboard-1548-1024x677.jpg', 40),
(103, 'NINTCHDBPICT000485625637.jpg', 41),
(104, 'shutterstock_editorial_8344889me.jpg', 41),
(105, 'Adele_2016.jpg', 41),
(106, 'american-idol-judge-katy-perry-controversial-moments-1581612005.jpg', 42),
(107, '2018-Publicity-Shot-Katy-Perry-Photo-Credit_-Rony-Alwin-Secondary-web-optimised-1000.jpg', 42),
(108, '17katy-mediumSquareAt3X.jpg', 42),
(109, 'katy_perry_dark_horse_copyright_lawsuit.jpg', 42),
(110, 'j-cole-dr-dre-studio-1499695900-compressed.jpg', 43),
(111, 'avatars-000573696831-yfdok7-t500x500.jpg', 43),
(112, 'bbf4d4c24f0f4834e4d3fd61a56898eceace0197.jpg', 43),
(113, 'J.%20Cole_16_9_1581558280.jpg', 43),
(114, 'gettyimages-1076483808.jpg', 44),
(115, 'kanye-west-attends-the-christian-dior-show-as-part-of-the-paris-fashion-week-womenswear-fall-winter-2015-2016-on-march-6-2015-in-paris-france-photo-by-dominique-charriau-wireimage-square.jpg', 44),
(116, 'eminem.jpg', 45),
(117, 'GettyImages-1205158935-696x442.jpg', 45),
(118, 'Joyner6.jpg', 45),
(119, 'Members_of_Brockhampton.jpg', 46),
(120, 'Brockhampton.jpg', 46),
(121, 'image (5).jpg', 47),
(122, 'image (4).jpg', 47),
(123, '16_1.jpg', 47),
(124, 'Neil-Delamere-Stand-Up-Top-Secret-Comedy-Club-Covent-Garden-London-Live-Stand-Up-Comedy-at-the-Best-Rated-Comedy-Club-In-London-Comedy-600x338.jpg', 50),
(125, 'neil-delamere-3.jpg', 50),
(126, 'neil-delamere-ulster-hall-1200x628.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `project02_acts`
--

CREATE TABLE `project02_acts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_acts`
--

INSERT INTO `project02_acts` (`id`, `name`, `description`, `typeid`) VALUES
(2, 'Dermot Kennedy', 'Irish Music Artist', 1),
(3, 'Jean-Michel Basquiat', 'American artist of Haitian and Puerto Rican descent', 3),
(11, 'Ed Sheeran', 'English Pop Singer Sensation', 1),
(32, 'Kevin Bridges', 'Standup Comedian from Glasgow', 2),
(33, 'Tommy Tiernan', 'Irish Standup Act', 1),
(39, 'Taylor Swift', 'Taylor Alison Swift is an American singer-songwriter.', 1),
(40, 'Drake', 'Aubrey Drake Graham is a Canadian rapper, singer, songwriter, producer, actor, and businessman.', 1),
(41, 'Adele', 'Adele Laurie Blue Adkins MBE is an English singer-songwriter.', 1),
(42, 'Katy Perry', 'Katheryn Elizabeth Hudson, known professionally as Katy Perry, is an American singer, songwriter, and television judge', 1),
(43, 'J. Cole', 'Jermaine Lamarr Cole is an American rapper, singer, songwriter, producer, and record executive', 1),
(44, 'Kanye', 'Kanye Omari West is an American rapper, singer, songwriter, record producer, entrepreneur and fashion designer.', 1),
(45, 'Eminem', 'Marshall Bruce Mathers III, known professionally as Eminem, is an American rapper, songwriter, record producer, record executive and actor.', 1),
(46, 'Brockhampton', 'Brockhampton is an American alternative hip hop band founded as AliveSinceForever in San Marcos, Texas in 2010.', 1),
(47, 'Paul Henry', 'Paul Henry was an Irish artist noted for depicting the West of Ireland landscape in a spare post-impressionist style.', 3),
(48, 'Eileen Sullivan', 'Eileen is a self-taught artist who started painting in Oils and who real passion lies with watercolour.', 3),
(50, 'Neil Delamere', 'Neil Delamere is an Irish comedian. He is a regular on \'The Blame Game\'', 2),
(51, 'Nipper Quinn', 'Traditional Irish Music Sessions.', 1),
(52, 'Jade Bradley', 'She\'ll be teaching you how to make your own plant based picnic, exploring the benefits of a sustainable plant based diet.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `project02_actseventslink`
--

CREATE TABLE `project02_actseventslink` (
  `id` int(11) NOT NULL,
  `actid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_actseventslink`
--

INSERT INTO `project02_actseventslink` (`id`, `actid`, `eventid`) VALUES
(4, 2, 2),
(55, 3, 1),
(14, 11, 2),
(41, 32, 9),
(42, 33, 9),
(46, 39, 2),
(49, 40, 28),
(47, 41, 2),
(48, 42, 2),
(50, 43, 28),
(51, 44, 28),
(53, 45, 28),
(52, 46, 28),
(54, 47, 1),
(56, 48, 1),
(57, 50, 31),
(58, 51, 32),
(59, 52, 33);

-- --------------------------------------------------------

--
-- Table structure for table `project02_downloadable`
--

CREATE TABLE `project02_downloadable` (
  `id` int(11) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `eventid` int(11) NOT NULL,
  `access` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_downloadable`
--

INSERT INTO `project02_downloadable` (`id`, `filepath`, `eventid`, `access`, `name`) VALUES
(8, 'ER Diagram 1.0.pub', 9, 'everyone', 'publisher'),
(9, 'new tesla.docx', 9, 'reservers', 'fdsdfgsdfg'),
(10, 'DISCOUNT.txt', 2, 'reservers', 'Discount Code'),
(11, 'websiteQRCode_noFrame.png', 9, 'reservers', 'Entry Code'),
(12, 'stranmillis_environs.gif', 1, 'everyone', 'How to get here'),
(13, '5e7df5072eeda2.15601206DISCOUNT.txt', 31, 'reservers', 'Discount Voucher');

-- --------------------------------------------------------

--
-- Table structure for table `project02_eventimg`
--

CREATE TABLE `project02_eventimg` (
  `id` int(11) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `position` varchar(20) NOT NULL,
  `eventid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_eventimg`
--

INSERT INTO `project02_eventimg` (`id`, `filepath`, `position`, `eventid`) VALUES
(7, 'a2070d33-0b06-465f-9637-bfc471b24f8f_1165841_TABLET_LANDSCAPE_LARGE_16_9.jpg', 'Top', 2),
(8, 'download (1).jpg', 'Bottom', 2),
(9, 'Long2019_9.jpg', 'Top', 28),
(10, 'images.jpg', 'Middle', 28),
(11, 'belfast-international.jpg', 'Middle', 1),
(12, 'unnamed.jpg', 'Top', 9),
(13, 'before-the-show-no-flash.jpg', 'Middle', 9),
(14, 'mm_ti_Irish-Instrument_Main-Hero_.jpg', 'Middle', 6),
(15, '0_1JPG.jpg', 'Top', 33),
(16, 'Pub-Night.jpg', 'Middle', 32),
(17, 'maxresdefault.jpg', 'Top', 31);

-- --------------------------------------------------------

--
-- Table structure for table `project02_events`
--

CREATE TABLE `project02_events` (
  `id` int(11) NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `typeid` int(11) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `managerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_events`
--

INSERT INTO `project02_events` (`id`, `eventname`, `typeid`, `venue`, `startdate`, `enddate`, `managerid`) VALUES
(1, 'Belfast Art Festival', 3, 'Belfast City Hall', '2020-02-26', '2020-02-28', 34),
(2, 'Belsonic Music Festival', 1, 'Ormeau Park', '2020-07-30', '2020-08-02', 34),
(6, 'The Points Trad Fest', 1, 'The Points Bar', '2020-03-18', '2020-03-18', 37),
(9, 'QUB\'s Comedy Night', 2, 'CSB', '2020-05-08', '2020-05-08', 34),
(28, 'Longitude', 1, 'Botanic Gardens', '2020-07-28', '2020-07-30', 34),
(31, '\'End of Watch\'', 2, 'Ulster Hall', '2020-08-30', '2020-08-30', 61),
(32, 'A Night of Irish Trad Music', 1, 'Granny Annies', '2020-05-21', '2020-05-21', 61),
(33, 'Belfast Food Festival', 8, 'Belfast Cookery School', '2020-04-21', '2020-04-23', 61);

-- --------------------------------------------------------

--
-- Table structure for table `project02_eventtext`
--

CREATE TABLE `project02_eventtext` (
  `id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `position` varchar(25) NOT NULL,
  `eventid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_eventtext`
--

INSERT INTO `project02_eventtext` (`id`, `text`, `position`, `eventid`) VALUES
(3, 'Funniest acts from all over Ireland', 'Top', 9),
(4, 'QUB Comedy Night has been running for the past 3 years', 'Middle', 9),
(5, 'Please check updated dates following the change', 'Urgent', 9),
(7, 'Belsonic is BACK', 'Top', 2),
(8, 'BELSONIC returns to the idyllic setting at Ormeau Park, Belfast. The popular music festival will bring a host of international headline acts to the heart of Belfast city centre across the month of June.', 'Middle', 2),
(9, 'Early bird tickets nearly sold out', 'Urgent', 2),
(10, 'Longitude is back!!!', 'Top', 28),
(11, 'Have any questions? Feel free to email us at longitude2020@gmail.com', 'Bottom', 28),
(12, 'A great mix of old and contemporary art.', 'Top', 1),
(13, 'Great for all ages ', 'Middle', 1),
(15, 'Delamere\'s End of Watch is stand up comedy at its best: witty and wry, fast and funny, he truly is in a class of his own.', 'Top', 31),
(16, 'Delamere cements his status as a Fringe legend as he delves into his wonderfully weird and hilarious set', 'Middle', 31),
(17, 'For anymore information contact us at:\r\nadmin@endofwatchtour.com\r\n07589664875', 'Bottom', 31),
(18, 'Due to the current outbreak of Coronavirus (COVID-19) this event has been cancelled. Granny Annies is also temporarily closed.', 'Urgent', 32),
(19, 'Get into the Irish spirit every Thursday evening at Granny Annies! They\'ll have their very own Riverdance Performers along with Nipper Quinn and Guests with their Traditional Irish Music Sessions.', 'Top', 32),
(20, 'Join in with jigs and reels, or just come along for the craic!', 'Middle', 32),
(21, 'If you\'d like to book a table for lunch or dinner, please call 028 90321331. ', 'Bottom', 32),
(22, 'We\'ve all heard of plant based diets - but what does it mean and how can it benefit our health and the planet?', 'Top', 33),
(23, 'A whole-foods, plant-based diet is a way of eating that celebrates plant foods and cuts out unhealthy items like added sugars and refined grains.', 'Middle', 33),
(24, 'Not for profit network working to create a sustainable food system in Belfast that works for people, the environment and the economy.', 'Bottom', 33);

-- --------------------------------------------------------

--
-- Table structure for table `project02_homepage`
--

CREATE TABLE `project02_homepage` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `position` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_homepage`
--

INSERT INTO `project02_homepage` (`id`, `text`, `position`) VALUES
(8, 'This is Bel-Festival. Every Event. Every Season', 'Top'),
(9, 'New festivals added weekly!', 'Middle'),
(10, 'We have got an event for everyone', 'Bottom'),
(11, 'Due to COVID19 Outbreak, we are saddened to announce the cancelling of Tennants Vital.', 'Urgent'),
(12, 'No need to buy tickets, simply create an account and reserve up to 5 tickets at one time.', 'Middle'),
(17, 'If you are in any way concerned about the impact of Covic-19, please contact us at administration@bel-festival.com', 'Bottom');

-- --------------------------------------------------------

--
-- Table structure for table `project02_messages`
--

CREATE TABLE `project02_messages` (
  `id` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `text` varchar(300) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_messages`
--

INSERT INTO `project02_messages` (`id`, `eventid`, `receiverid`, `subject`, `text`, `date`) VALUES
(13, 28, 36, 'Identification', 'I would like to advice to our younger visitors to bring a form of identification to ensure you are allowed in.', 'Thu Mar 26, 2020 16:44'),
(14, 28, 44, 'Identification', 'I would like to advice to our younger visitors to bring a form of identification to ensure you are allowed in.', 'Thu Mar 26, 2020 16:44'),
(15, 28, 49, 'Identification', 'I would like to advice to our younger visitors to bring a form of identification to ensure you are allowed in.', 'Thu Mar 26, 2020 16:44'),
(17, 31, 39, 'Seating', 'Just a reminder all seating arrangements are based of first come first serve on the night', 'Fri Mar 27, 2020 13:11'),
(18, 32, 39, 'Parking', 'Please note, car parking will be closed from 12am onwards.', 'Fri Mar 27, 2020 13:12'),
(19, 32, 39, 'UPDATE parking', 'Parking will now be shut at 2am on the night of the event\r\n', 'Fri Mar 27, 2020 13:13'),
(20, 28, 36, 'Identification', 'Please bring a form of identification to save being turned away at the door\r\n', 'Fri Mar 27, 2020 13:14'),
(21, 28, 44, 'Identification', 'Please bring a form of identification to save being turned away at the door\r\n', 'Fri Mar 27, 2020 13:14'),
(22, 28, 49, 'Identification', 'Please bring a form of identification to save being turned away at the door\r\n', 'Fri Mar 27, 2020 13:14'),
(23, 28, 39, 'Identification', 'Please bring a form of identification to save being turned away at the door\r\n', 'Fri Mar 27, 2020 13:14');

-- --------------------------------------------------------

--
-- Table structure for table `project02_passwordresets`
--

CREATE TABLE `project02_passwordresets` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_passwordresets`
--

INSERT INTO `project02_passwordresets` (`id`, `userid`) VALUES
(10, 49);

-- --------------------------------------------------------

--
-- Table structure for table `project02_publicusers`
--

CREATE TABLE `project02_publicusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_publicusers`
--

INSERT INTO `project02_publicusers` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'ruairiw', 'password', 3),
(2, 'niamhw', 'pword', 1),
(34, 'belsonicmanager', '123', 2),
(36, 'randomuser12', 'computer', 1),
(37, 'user1', 'ict', 2),
(38, 'john', 'password', 1),
(39, 'bob', 'password', 1),
(40, 'sarah', 'computer', 1),
(44, 'simcard', 'hash', 1),
(46, 'mick', 'hat', 1),
(47, 'wintymcgetts', 'password', 1),
(49, 'yurman', 'lol', 1),
(61, 'web1', 'lol123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project02_reviews`
--

CREATE TABLE `project02_reviews` (
  `id` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `eventid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_reviews`
--

INSERT INTO `project02_reviews` (`id`, `review`, `eventid`, `userid`) VALUES
(6, 'Very funny night!', 9, 38),
(16, 'Been going for 3 years, great night\'s craic!', 6, 46),
(17, 'Brilliant music, brilliant artists', 6, 40),
(18, 'Deadly craic', 9, 44),
(19, 'Haven\'t laughed as much in my life', 9, 49),
(20, 'Guaranteed great acts each year, great event', 28, 2),
(21, 'best time of my life', 28, 47),
(22, 'went last year, brilliant few days', 28, 49),
(23, 'interesting art on display', 1, 38),
(24, 'great range of art', 1, 36),
(25, 'loved it', 2, 40),
(26, 'had a great time!!!', 2, 44),
(29, 'Deadly music!!', 32, 39),
(30, 'Great music and dancing!', 32, 46),
(31, 'Highly recommend!', 31, 39),
(32, 'Great lessons!', 33, 38),
(33, 'delicious food!!', 33, 46);

-- --------------------------------------------------------

--
-- Table structure for table `project02_tickets`
--

CREATE TABLE `project02_tickets` (
  `id` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_tickets`
--

INSERT INTO `project02_tickets` (`id`, `eventid`, `userid`, `quantity`) VALUES
(15, 9, 38, 4),
(16, 9, 46, 2),
(17, 1, 39, 5),
(18, 1, 40, 2),
(19, 1, 44, 2),
(20, 2, 38, 5),
(21, 2, 2, 4),
(22, 28, 36, 2),
(23, 28, 44, 5),
(24, 28, 49, 4),
(25, 9, 38, 5),
(26, 9, 46, 1),
(27, 6, 40, 4),
(28, 6, 36, 2),
(30, 28, 39, 1),
(31, 2, 39, 1),
(32, 31, 39, 2),
(33, 32, 39, 4);

-- --------------------------------------------------------

--
-- Table structure for table `project02_type`
--

CREATE TABLE `project02_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `imagepath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project02_type`
--

INSERT INTO `project02_type` (`id`, `type`, `imagepath`) VALUES
(1, 'Music', '5e7bbfa2984029.57361647malte-wingen-PDX_a_82obo-unsplash.jpg'),
(2, 'Comedy', 'diane-alkier-NBT3LOCdkVM-unsplash.jpg'),
(3, 'Art', 'debby-hudson-MzSqFPLo8CE-unsplash.jpg'),
(8, 'Food', 'photo-1543352634-a1c51d9f1fa7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project02_actimg`
--
ALTER TABLE `project02_actimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actid` (`actid`);

--
-- Indexes for table `project02_acts`
--
ALTER TABLE `project02_acts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `project02_actseventslink`
--
ALTER TABLE `project02_actseventslink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actid` (`actid`,`eventid`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `project02_downloadable`
--
ALTER TABLE `project02_downloadable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `project02_eventimg`
--
ALTER TABLE `project02_eventimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `project02_events`
--
ALTER TABLE `project02_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `managerid` (`managerid`);

--
-- Indexes for table `project02_eventtext`
--
ALTER TABLE `project02_eventtext`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `project02_homepage`
--
ALTER TABLE `project02_homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project02_messages`
--
ALTER TABLE `project02_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `receiverid` (`receiverid`);

--
-- Indexes for table `project02_passwordresets`
--
ALTER TABLE `project02_passwordresets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `project02_publicusers`
--
ALTER TABLE `project02_publicusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project02_reviews`
--
ALTER TABLE `project02_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `project02_tickets`
--
ALTER TABLE `project02_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `project02_type`
--
ALTER TABLE `project02_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project02_actimg`
--
ALTER TABLE `project02_actimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `project02_acts`
--
ALTER TABLE `project02_acts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `project02_actseventslink`
--
ALTER TABLE `project02_actseventslink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `project02_downloadable`
--
ALTER TABLE `project02_downloadable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project02_eventimg`
--
ALTER TABLE `project02_eventimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project02_events`
--
ALTER TABLE `project02_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project02_eventtext`
--
ALTER TABLE `project02_eventtext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `project02_homepage`
--
ALTER TABLE `project02_homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project02_messages`
--
ALTER TABLE `project02_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project02_passwordresets`
--
ALTER TABLE `project02_passwordresets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project02_publicusers`
--
ALTER TABLE `project02_publicusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `project02_reviews`
--
ALTER TABLE `project02_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project02_tickets`
--
ALTER TABLE `project02_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project02_type`
--
ALTER TABLE `project02_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project02_actimg`
--
ALTER TABLE `project02_actimg`
  ADD CONSTRAINT `project02_actimg_ibfk_1` FOREIGN KEY (`actid`) REFERENCES `project02_acts` (`id`);

--
-- Constraints for table `project02_acts`
--
ALTER TABLE `project02_acts`
  ADD CONSTRAINT `project02_acts_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `project02_type` (`id`);

--
-- Constraints for table `project02_actseventslink`
--
ALTER TABLE `project02_actseventslink`
  ADD CONSTRAINT `project02_actseventslink_ibfk_1` FOREIGN KEY (`actid`) REFERENCES `project02_acts` (`id`),
  ADD CONSTRAINT `project02_actseventslink_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`);

--
-- Constraints for table `project02_downloadable`
--
ALTER TABLE `project02_downloadable`
  ADD CONSTRAINT `project02_downloadable_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`);

--
-- Constraints for table `project02_eventimg`
--
ALTER TABLE `project02_eventimg`
  ADD CONSTRAINT `project02_eventimg_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`);

--
-- Constraints for table `project02_events`
--
ALTER TABLE `project02_events`
  ADD CONSTRAINT `project02_events_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `project02_type` (`id`),
  ADD CONSTRAINT `project02_events_ibfk_2` FOREIGN KEY (`managerid`) REFERENCES `project02_publicusers` (`id`);

--
-- Constraints for table `project02_eventtext`
--
ALTER TABLE `project02_eventtext`
  ADD CONSTRAINT `project02_eventtext_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`);

--
-- Constraints for table `project02_messages`
--
ALTER TABLE `project02_messages`
  ADD CONSTRAINT `project02_messages_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`),
  ADD CONSTRAINT `project02_messages_ibfk_2` FOREIGN KEY (`receiverid`) REFERENCES `project02_publicusers` (`id`);

--
-- Constraints for table `project02_passwordresets`
--
ALTER TABLE `project02_passwordresets`
  ADD CONSTRAINT `project02_passwordresets_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `project02_publicusers` (`id`);

--
-- Constraints for table `project02_reviews`
--
ALTER TABLE `project02_reviews`
  ADD CONSTRAINT `project02_reviews_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`),
  ADD CONSTRAINT `project02_reviews_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `project02_publicusers` (`id`);

--
-- Constraints for table `project02_tickets`
--
ALTER TABLE `project02_tickets`
  ADD CONSTRAINT `project02_tickets_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `project02_events` (`id`),
  ADD CONSTRAINT `project02_tickets_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `project02_publicusers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
