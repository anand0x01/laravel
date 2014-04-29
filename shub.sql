-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2014 at 01:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shub`
--
CREATE DATABASE IF NOT EXISTS `shub` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shub`;

-- --------------------------------------------------------

--
-- Table structure for table `adoubts`
--

CREATE TABLE IF NOT EXISTS `adoubts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adver_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `doubt` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `adoubts_adver_id_foreign` (`adver_id`),
  KEY `adoubts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `adoubts`
--

INSERT INTO `adoubts` (`id`, `adver_id`, `user_id`, `doubt`, `answer`, `created_at`) VALUES
(6, 2, 11, 'The BBC''s Ian Pannell and Darren Conway have witnessed the devastating effects of air bombardment on Syrian civilians after gaining rare access to rebel-held areas of Aleppo.', NULL, '2014-04-28 01:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `advernonpro`
--

CREATE TABLE IF NOT EXISTS `advernonpro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adver_id` int(10) unsigned NOT NULL,
  `sector_id` smallint(5) unsigned NOT NULL,
  `type_sm` tinyint(1) NOT NULL DEFAULT '0',
  `type_mr` tinyint(1) NOT NULL DEFAULT '0',
  `type_pd` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `degree_ug` tinyint(1) NOT NULL DEFAULT '0',
  `degree_g` tinyint(1) NOT NULL DEFAULT '0',
  `degree_phd` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `students` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advernonpro_adver_id_foreign` (`adver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `advernormals`
--

CREATE TABLE IF NOT EXISTS `advernormals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adver_id` int(10) unsigned NOT NULL,
  `sector_id` smallint(5) unsigned NOT NULL,
  `type_sm` tinyint(1) NOT NULL DEFAULT '0',
  `type_mr` tinyint(1) NOT NULL DEFAULT '0',
  `type_pd` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `degree_ug` tinyint(1) NOT NULL DEFAULT '0',
  `degree_g` tinyint(1) NOT NULL DEFAULT '0',
  `degree_phd` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `students` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advernormals_adver_id_foreign` (`adver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `advernormals`
--

INSERT INTO `advernormals` (`id`, `adver_id`, `sector_id`, `type_sm`, `type_mr`, `type_pd`, `description`, `phone`, `degree_ug`, `degree_g`, `degree_phd`, `image`, `students`) VALUES
(1, 2, 6, 1, 1, 0, '3.4\r\nKhan to Yuvraj Singh, no run, poor cricket all around. Yuvraj tries the same steer as Kohli, knowing well that there is a slip in place. Gets a faint edge to the keeper but Tare drops a sitter. He batted poorly, and is not proving to be great guns with the bigger gloves\r\nYuvraj Singh is the new man in\r\n3.3\r\nKhan to Kohli, OUT, Oh Kohli. What an un-Kohli-like dismissal. This is as soft as Kohli will ever get. Steers a short-of-a-length delivery straight to slip. Had he responded to PP''s call last ball, Kohli wouldn''t even have been on strike to do this\r\nV Kohli c Harbhajan Singh b Khan 0 (2b 0x4 0x6) SR: 0.00\r\n3.2\r\nKhan to Kohli, no run, short of a length, Kohli moves across to work this to square leg. PP wants one, but Kohli doesn''t. PP has to dive back in\r\n3.1\r\nKhan to Patel, 1 run, short of a length, wide, slashed away to third man for one\r\nThe master chaser, Virat Kohli, is in, but he is not on strike', '54464465464', 1, 1, 1, '/media/uploads/2014/04/19/7dbCYlb2.jpg', 6),
(2, 5, 4, 1, 0, 0, '14.4\r\nNarine to Tiwary, FOUR\r\n14.3\r\nNarine to Karthik, OUT, that''s gone, Narine with the breakthrough, DK tries a reverse paddle, misses this big offspinner and is caught in front\r\nKD Karthik lbw b Narine 56 (40b 5x4 2x6) SR: 140.00\r\n14.2\r\nNarine to Karthik, no run, bowled full at the stumps and blocked back calmly\r\n14.1\r\nNarine to Duminy, 1 run, tries the reverse sweep, not much on it, but enough for a single wide of short third man', '4327468236489273847', 1, 1, 1, NULL, 8),
(3, 6, 6, 1, 0, 1, 'Big picture\r\nAfter the shock-and-awe show by Glenn Maxwell and David Miler, Rajasthan Royals captain Shane Watson was quick to admit there was little any bowling side could have done in the face of such calculated and skillful belligerence.\r\n\r\nChennai Super Kings will be a bigger challenge for Royals on the basis of facing possibly the strongest top six in the current IPL. Their win against Delhi Daredevils would have buoyed Super Kings as it turned out to be a far more comprehensive effort than the game against Kings XI Punjab, where their bowling and fielding were a letdown. An even better sign for them was the team selection in conditions that played right into their three-seamer strategy. In Dubai, too, the ball can seam under lights early on, as the Daredevils attack showed a few days ago against Kolkata Knight Riders, so Super Kings may well opt to leave Samuel Badree out for one more game.\r\n\r\nIn spite of their loss, Royals had a lot of positives from their game; the biggest, undoubtedly, being Watson''s return to form. The new opening pair of Mumbai batsmen - Ajinkya Rahane and Abhishek Nayar - haven''t yet settled at the top, but with Stuart Binny and Steven Smith showing they can hold the middle order together, the old pair of Rahane and Watson striding out may lift the team against a tough opposition.\r\n\r\nPlayers to watch\r\nSanju Samson''s half-century on Sunday stood out for two reasons - an ability to strike cleanly and a lack of fear, evident in the way he smacked L Balaji over the leg side off just the sixth ball of his innings. As India''s highest run-getter at the recent Under-19 World Cup held in the UAE, he also brought in his experience of local conditions into play.\r\n\r\nIshwar Pandey has been on the fringes of the India team for the last couple of seasons and found himself in the same position on the Pune Warriors bench last year, as he played just two games in a long campaign. He found his rhythm immediately on debut for Super Kings and will hope for a longer run in the tournament this year.\r\n\r\nStats & Trivia\r\nBefore his half-century against Kings XI Punjab, Shane Watson''s last T20 fifty came during the IPL in May last year\r\nRoyals have won five out of 13 IPL matches between the two sides\r\nWith 19 fifties and one hundred, Suresh Raina shares the record for the most fifty-plus scores in the IPL (20) with Chris Gayle and Gautam Gambhir. He also has the record for most catches in the league (55)\r\nRachna Shetty is a senior sub-editor at ESPNcricinfo\r\n\r\nRSS Feeds: Rachna Shetty\r\n© ESPN Sports Media Ltd.\r\n \r\n\r\nLogin - Register to post comments - \r\nPosted by  Dennis Edwards on (April 23, 2014, 13:02 GMT)\r\nwatson should use binny in the bowling department the last game played he got 1 over and only gave away 4 runs whiles the rest of the bowlers were giving away runs like water......why not pick cooper for this game against csk\r\nPosted by  Bayz Tamy on (April 23, 2014, 12:47 GMT)\r\nCSK will won the toss. They will be ball fast .\r\nPosted by AshwinMS on (April 23, 2014, 12:46 GMT)\r\nI''m with Royals,but CSK has the upper hand here.They have more powerful batting line up.And Dhoni''s captaincy is not to be underestimated.\r\nPosted by SamWintson92 on (April 23, 2014, 12:14 GMT)\r\n@ Cricinfo: Please find out why Shane Watson hasn''t bowled in the first 2 IPL matches. Is he unfit to bowl ? Please dig in. He''s a wicket taking & economical bowler & I can''t understand why he''s not bowling.\r\nMy Teams:\r\nRR XI: (Please no Dhawan Kulkarni. A bowler who gives away 27 runs in an over lost the match for the team & doesn''t deserve to be in the team, Watson should bowl & open the batting) 1 Watson (C) 2 Rahane 3 Samson (WK) 4 Binny 5 S Smith 6 Faulkner 7 A Nayar 8 Bhatia 9 Richardson 10 I Abdulla/Vikramjeet 11 Tambe.\r\nCSK XI: 1 McCullum 2 D Smith 3 Raina 4 Du Plessis 5 Dhoni (C+WK) 6 Jadeja 7 Manhas 8 Ashwin 9 Ishwar 10 Mohit 11 Badree.\r\nPosted by matt_thor on (April 23, 2014, 12:07 GMT)\r\nRoyals XI (alongwith the batting order) for todays match :\r\nWatson,Rahane,Samson,A Nayar, S Smith, Binny, Faulkner, R Bhatia, Richardson, V Malik(if available)/ Kulkarni ,P Tambe\r\nFirst 3 batsmen if play sensibly are capable of destroying Chennai bowling. They have done it in the past as well. Good Luck RR. Halla Bol!!\r\nPosted by Maz_The_Indian on (April 23, 2014, 11:52 GMT)\r\nCSK seems to be favorites. RR has good players, but may be they dont have the power that CSK batting has which is required to cross the line\r\nPosted by deadite11 on (April 23, 2014, 11:50 GMT)\r\nMake it simple, the team with best bowling attack will win. RR has the Aussies link as they can use 4 aussies to dominate the match. Except rahane and samson/binny, others were not good, so CSK should target them. And this is not sawai mansingh stadium, so RR cant win easily against CSK unless their overseas players outperform.\r\nPosted by Cricketfan11111 on (April 23, 2014, 11:50 GMT)\r\nWith the addition of hilfenhaus csk bowling looks good. Bravo was good in the death overs. Hilf is a good opening bower. He invariably takes early wickets. Bravo''s all-round ability will be missed though. Pandey and MSharma will develop further and will serve the indian cricket. Few shots Manhas played looked good. so Dhoni will not change the winning combination. Aparajith is still very young. He may have to wait a little longer unless someone in the team has a bad run or injured.\r\nPosted by  Arunkumar Gunaseelan on (April 23, 2014, 11:18 GMT)\r\nchennai would include apparajid in the squad that will encourage him to steadyup his position in #CSK\r\nPosted by jhovee on (April 23, 2014, 11:08 GMT)\r\nHope DHONI will not sacrifice Ashwin/Jadeja on for Badree.. & also unfair to move any one of 4 foreign players (Dwanye,Mc Cullum,Du Plessis,Hilfy) who are really doing good, to make way for him.\r\nIf any of the above fails continuosly for next 2/3 matches, he may think of replacement ...', '546464546465', 1, 1, 1, NULL, 7),
(4, 9, 0, 0, 0, 1, 'lorem ipsum telhua', '1156546445656', 1, 1, 1, '/media/uploads/2014/04/25/MJpCS3Ey.jpg', 5),
(5, 10, 0, 1, 0, 0, 'dsaknka dka kdmakdm ka dka mdk', '71381683163781', 1, 1, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `advers`
--

CREATE TABLE IF NOT EXISTS `advers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ad_type` smallint(5) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `is_viewable` tinyint(1) NOT NULL DEFAULT '1',
  `is_sold` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `advers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `advers`
--

INSERT INTO `advers` (`id`, `user_id`, `ad_type`, `title`, `created_at`, `updated_at`, `confirmed`, `is_viewable`, `is_sold`) VALUES
(2, 4, 1, 'A very simple project', '2014-04-19 07:17:21', '2014-04-19 07:17:21', 1, 1, 0),
(5, 4, 2, 'Kolkata T20 166/5 (20/20 ov)', '2014-04-19 12:04:27', '2014-04-19 12:04:27', 1, 1, 0),
(6, 5, 1, 'Royals square up to Super Kings batting arsenal', '2014-04-23 07:55:47', '2014-04-23 07:55:47', 1, 1, 0),
(9, 4, 1, 'lorem', '2014-04-25 03:25:57', '2014-04-25 03:25:57', 1, 1, 0),
(10, 4, 2, 'tolankasn', '2014-04-25 03:26:23', '2014-04-25 03:26:23', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adviews`
--

CREATE TABLE IF NOT EXISTS `adviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `view_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adver_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adviews_user_id_foreign` (`user_id`),
  KEY `adviews_adver_id_foreign` (`adver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `adviews`
--

INSERT INTO `adviews` (`id`, `user_id`, `view_time`, `adver_id`) VALUES
(1, 4, '2014-04-25 09:10:31', 5),
(2, 4, '2014-04-25 09:11:04', 2),
(3, 4, '2014-04-25 09:11:33', 6),
(4, 4, '2014-04-25 09:12:27', 6),
(5, 4, '2014-04-25 09:12:33', 10),
(6, 4, '2014-04-25 09:13:10', 5),
(7, 4, '2014-04-25 09:33:06', 5),
(8, 4, '2014-04-27 04:46:46', 5),
(9, 4, '2014-04-27 04:46:52', 2),
(10, 4, '2014-04-27 04:47:01', 6),
(11, 4, '2014-04-27 05:27:39', 2),
(12, 4, '2014-04-27 05:29:36', 2),
(13, 4, '2014-04-27 05:29:39', 2),
(14, 4, '2014-04-27 05:29:52', 2),
(22, 4, '2014-04-27 11:21:37', 2),
(31, 11, '2014-04-28 01:11:37', 2);

-- --------------------------------------------------------

--
-- Table structure for table `aresponses`
--

CREATE TABLE IF NOT EXISTS `aresponses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adver_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `response` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `aresponses_adver_id_foreign` (`adver_id`),
  KEY `aresponses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aresponses`
--

INSERT INTO `aresponses` (`id`, `adver_id`, `user_id`, `response`, `created_at`, `updated_at`) VALUES
(2, 2, 11, 'The BBC''s Ian Pannell and Darren Conway have witnessed the devastating effects of air bombardment on Syrian civilians after gaining rare access to rebel-held areas of Aleppo.', '2014-04-28 01:12:05', '2014-04-28 01:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_16_150217_make_whitelist_table', 1),
('2014_04_16_151623_make_users_table', 1),
('2014_04_17_060832_create_failed_jobs_table', 2),
('2014_04_17_200105_add_remember_token', 3),
('2014_04_19_060840_make_orgdomain_table', 4),
('2014_04_19_062419_edit_org_tables', 5),
('2014_04_19_084821_make_ads_table', 6),
('2014_04_19_125120_edit_ad_controls', 7),
('2014_04_25_135254_make_edit', 8),
('2014_04_27_102258_make_aresponse_table', 9),
('2014_04_27_140337_make_doubts_table', 10),
('2014_04_28_060832_add_resume_feature', 11);

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE IF NOT EXISTS `organisations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `domain` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `balance` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organisations_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `user_id`, `domain`, `balance`, `name`) VALUES
(1, 4, 'gmail.com', '0', 'Anand''s Organisation'),
(2, 5, 'gmail.com', '0', 'Microsoft'),
(3, 7, 'gmail.com', '0', 'Jaykant Baba');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `country_id` int(11) NOT NULL,
  `balance` decimal(10,3) NOT NULL DEFAULT '0.000',
  `resume` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `country_id`, `balance`, `resume`) VALUES
(1, 11, 1, '0.000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `universities_country_id_foreign` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `domain`, `name`, `country_id`) VALUES
(1, 'princeton.edu', 'Princeton University', 2),
(2, 'iitr.ernet.in', 'IIT Roorkee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` smallint(5) unsigned NOT NULL DEFAULT '1',
  `verification_status` tinyint(1) NOT NULL DEFAULT '0',
  `joined` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `user_type`, `verification_status`, `joined`, `remember_token`) VALUES
(4, 'anandms91@gmail.com', '$2y$10$moi0fHJhald34GMtKoYlU.YOkUtOCy9R9cYq/iuqLASBvuoPZnINu', 'Anand Mohan Sinha', 3, 0, '2014-04-19 01:36:22', 'YihgfAfBhEnqZFJDyphidVycxFsew0Nm8FMIysrKk7CcRYt3acQC08J9M4sh'),
(5, 'anant@gmail.com', '$2y$10$MESr9kTIq77N1c0zBSj/2eI2NC5dvp75g/57HB3Hj9oKo1MTONzHO', 'Anandt Mohan Sinha', 3, 0, '2014-04-23 07:47:30', NULL),
(7, 'jaykant@gmail.com', '$2y$10$lorEC7GNbPuzrsKMUdCdhOwT7sNiOUSA8OcGQfz3iZ6NsldnwlFGq', 'Jaykant Shikre', 3, 0, '2014-04-25 02:36:59', 'q3wNi2myqJjdRxIJaUzD4tThb8PkIEMsM2HC43YspiSAO1BRBeJQaOnO0pHF'),
(11, 'anandms91@iitr.ernet.in', '$2y$10$mo8JHhR7MDAmj1xC/VAa9OUt2KVmUJ8oQnHUJXEW5liipW1hmK/MS', 'Anand Mohan Sinha', 1, 0, '2014-04-28 01:10:39', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoubts`
--
ALTER TABLE `adoubts`
  ADD CONSTRAINT `adoubts_adver_id_foreign` FOREIGN KEY (`adver_id`) REFERENCES `advers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adoubts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advernonpro`
--
ALTER TABLE `advernonpro`
  ADD CONSTRAINT `advernonpro_adver_id_foreign` FOREIGN KEY (`adver_id`) REFERENCES `advers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advernormals`
--
ALTER TABLE `advernormals`
  ADD CONSTRAINT `advernormals_adver_id_foreign` FOREIGN KEY (`adver_id`) REFERENCES `advers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advers`
--
ALTER TABLE `advers`
  ADD CONSTRAINT `advers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `adviews`
--
ALTER TABLE `adviews`
  ADD CONSTRAINT `adviews_adver_id_foreign` FOREIGN KEY (`adver_id`) REFERENCES `advers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `aresponses`
--
ALTER TABLE `aresponses`
  ADD CONSTRAINT `aresponses_adver_id_foreign` FOREIGN KEY (`adver_id`) REFERENCES `advers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aresponses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organisations`
--
ALTER TABLE `organisations`
  ADD CONSTRAINT `organisations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
