-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 08:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `Judex_tables`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `average_judge_sentences`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `average_judge_sentences` (
`judge_id` int(11)
,`charge` varchar(20)
,`average_judge_sentence_per_charge` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `average_judge_sentences_detailed`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `average_judge_sentences_detailed` (
`judge_id` int(11)
,`judge_name` varchar(20)
,`judge_age` int(11)
,`judge_gender` varchar(1)
,`judge_race` varchar(10)
,`charge` varchar(20)
,`average_judge_sentence_per_charge` double
,`region` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `average_sentence_per_charge`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `average_sentence_per_charge` (
`charge` varchar(20)
,`average_sentence` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `average_sentence_per_region`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `average_sentence_per_region` (
`region_1_charge` varchar(20)
,`region_1` varchar(20)
,`average_sentence_for_region_1` double
,`number_of_cases_in_region_1` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `average_sentence_per_region_2`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `average_sentence_per_region_2` (
`region_2_charge` varchar(20)
,`region_2` varchar(20)
,`average_sentence_for_region_2` double
,`number_of_cases_in_region_2` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `case_table`
--

CREATE TABLE IF NOT EXISTS `case_table` (
  `case_id` int(11) NOT NULL,
  `judge_id` int(11) DEFAULT NULL,
  `region` varchar(20) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `judge_id` (`judge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_table`
--

INSERT INTO `case_table` (`case_id`, `judge_id`, `region`, `date1`) VALUES
(1, 6, 'Queens', '2020-05-12'),
(2, 6, 'Queens', '2021-03-23'),
(3, 6, 'Queens', '2020-03-16'),
(4, 6, 'Queens', '2022-07-04'),
(5, 6, 'Queens', '2020-01-25'),
(6, 2, 'Manhattan', '2020-08-07'),
(7, 2, 'Manhattan', '2022-03-17'),
(8, 2, 'Manhattan', '2020-05-09'),
(9, 2, 'Manhattan', '2022-11-19'),
(10, 2, 'Manhattan', '2020-12-27'),
(11, 9, 'Brooklyn', '2022-06-12'),
(12, 9, 'Brooklyn', '2020-05-13'),
(13, 9, 'Brooklyn', '2020-09-17'),
(14, 9, 'Brooklyn', '2020-02-21'),
(15, 9, 'Brooklyn', '2021-06-04'),
(16, 1, 'Staten Island', '2020-08-06'),
(17, 1, 'Staten Island', '2020-03-28'),
(18, 1, 'Staten Island', '2021-01-30'),
(19, 1, 'Staten Island', '2020-08-27'),
(20, 1, 'Staten Island', '2020-04-13'),
(21, 7, 'Bronx', '2021-02-11'),
(22, 7, 'Bronx', '2020-12-19'),
(23, 7, 'Bronx', '2021-07-12'),
(24, 7, 'Bronx', '2020-04-07'),
(25, 7, 'Bronx', '2020-10-22'),
(26, 10, 'Manhattan', '2022-04-29'),
(27, 10, 'Manhattan', '2020-02-29'),
(28, 10, 'Manhattan', '2020-05-10'),
(29, 10, 'Manhattan', '2021-05-13'),
(30, 10, 'Manhattan', '2020-06-12'),
(31, 4, 'Brooklyn', '2022-05-24'),
(32, 4, 'Brooklyn', '2020-07-14'),
(33, 4, 'Brooklyn', '2021-02-02'),
(34, 4, 'Brooklyn', '2020-03-09'),
(35, 4, 'Brooklyn', '2022-05-03'),
(36, 8, 'Bronx', '2020-05-30'),
(37, 8, 'Bronx', '2020-07-19'),
(38, 8, 'Bronx', '2021-10-02'),
(39, 8, 'Bronx', '2020-09-24'),
(40, 8, 'Bronx', '2020-02-13'),
(41, 2, 'Queens', '2021-07-15'),
(42, 2, 'Queens', '2020-12-26'),
(43, 2, 'Queens', '2022-04-27'),
(44, 2, 'Queens', '2020-06-05'),
(45, 2, 'Queens', '2020-09-28'),
(46, 3, 'Staten Island', '2021-07-04'),
(47, 3, 'Staten Island', '2020-04-19'),
(48, 3, 'Staten Island', '2020-05-05'),
(49, 3, 'Staten Island', '2022-05-29'),
(50, 3, 'Staten Island', '2021-02-28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `comparison_view`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `comparison_view` (
`region_1_charge` varchar(20)
,`region_1` varchar(20)
,`average_sentence_for_region_1` double
,`number_of_cases_in_region_1` bigint(21)
,`region_2` varchar(20)
,`average_sentence_for_region_2` double
,`number_of_cases_in_region_2` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `defendant`
--

CREATE TABLE IF NOT EXISTS `defendant` (
  `defendant_id` int(11) NOT NULL AUTO_INCREMENT,
  `defendant_name` varchar(20) DEFAULT NULL,
  `age` decimal(10,0) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`defendant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defendant`
--

INSERT INTO `defendant` (`defendant_id`, `defendant_name`, `age`, `gender`, `race`) VALUES
(1, 'Geoffrey Gooding', '47', 'M', 'Asian'),
(2, 'Emille Planck', '23', 'M', 'Black'),
(3, 'Laurent Blanche', '43', 'M', 'White'),
(4, 'Fareedat Ahmed', '28', 'F', 'Asian'),
(5, 'Tawanda Smith', '25', 'F', 'Black'),
(6, 'Kyle Xavier', '25', 'M', 'White'),
(7, 'Jack Fanders', '29', 'M', 'Asian'),
(8, 'Simone Smith', '27', 'F', 'Black'),
(9, 'Julius Cruz', '31', 'M', 'White'),
(10, 'Awa Doumbia', '29', 'F', 'Asian'),
(11, 'Mauricio Canelo', '32', 'M', 'Black'),
(12, 'Deborah Akinade', '31', 'F', 'White'),
(13, 'Anthony Saunders', '33', 'M', 'Asian'),
(14, 'Kiara Negron', '33', 'F', 'Black'),
(15, 'Idris Elba', '35', 'M', 'White'),
(16, 'Harry Styles', '35', 'M', 'Asian'),
(17, 'Bruno Mars', '33', 'M', 'Black'),
(18, 'Justin Bieber', '37', 'M', 'White'),
(19, 'Zayn Malik', '31', 'M', 'Asian'),
(20, 'Constance Wu', '39', 'F', 'Black'),
(21, 'Aya Laaraibi', '35', 'F', 'White'),
(22, 'Mubarak Odufade', '41', 'M', 'Asian'),
(23, 'Tyana Smith', '37', 'F', 'Black'),
(24, 'Rita Jones', '43', 'F', 'White'),
(25, 'Ali Subhan', '39', 'M', 'Asian'),
(26, 'Jariel Hoyos', '45', 'M', 'Black'),
(27, 'Nate Moore', '41', 'M', 'White'),
(28, 'Kevin Reade', '41', 'M', 'Asian'),
(29, 'Levon Turner', '44', 'M', 'Black'),
(30, 'Emily Wu', '43', 'F', 'White');

-- --------------------------------------------------------

--
-- Table structure for table `joint_table`
--

CREATE TABLE IF NOT EXISTS `joint_table` (
  `case_id` int(11) NOT NULL,
  `defendant_id` int(11) NOT NULL,
  `charge` varchar(20) DEFAULT NULL,
  `sentence` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`case_id`,`defendant_id`),
  KEY `defendant_id` (`defendant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joint_table`
--

INSERT INTO `joint_table` (`case_id`, `defendant_id`, `charge`, `sentence`) VALUES
(1, 30, 'Racketeering', '5'),
(2, 29, 'Burglary', '7'),
(3, 28, 'Arson', '12'),
(4, 27, 'Aggravated Assault', '2'),
(5, 26, 'Drug Possession', '13'),
(6, 25, 'Domestic violence', '19'),
(7, 24, 'Drug Possession', '4'),
(8, 23, 'Extortion', '8'),
(9, 22, 'Embezzlement', '3'),
(10, 21, 'Racketeering', '11'),
(11, 21, 'Shoplifting', '4'),
(12, 21, 'Sexual Assault', '8'),
(13, 21, 'Drug Possession', '16'),
(14, 20, 'Racketeering', '2'),
(15, 20, 'Solicitation', '5'),
(16, 20, 'Tax Evasion', '15'),
(17, 19, 'Vandalism', '13'),
(18, 19, 'Drug Possession', '17'),
(19, 18, 'Assault', '4'),
(20, 18, 'Robbery', '1'),
(21, 17, 'DUI', '17'),
(22, 16, 'Domestic violence', '4'),
(23, 15, 'Drug Trafficking ', '7'),
(24, 14, 'Drug Possession', '8'),
(25, 13, 'Homicide', '9'),
(26, 12, 'Homicide', '20'),
(27, 11, 'Drug Trafficking ', '10'),
(28, 11, 'Drug Possession', '12'),
(29, 11, 'Rape', '7'),
(30, 11, 'Robbery', '4'),
(31, 10, 'Drug Possession', '3'),
(32, 9, 'Drug Trafficking ', '19'),
(33, 8, 'Sexual Assault', '16'),
(34, 7, 'Solicitation', '3'),
(35, 6, 'Stalking', '8'),
(36, 6, 'Tax Evasion', '15'),
(37, 6, 'Theft', '13'),
(38, 5, 'Drug Possession', '19'),
(39, 5, 'Drug Trafficking ', '10'),
(40, 4, 'Racketeering', '11'),
(41, 4, 'Embezzlement', '3'),
(42, 4, 'Extortion', '5'),
(43, 4, 'Drug Possession', '12'),
(44, 4, 'Drug Trafficking ', '3'),
(45, 3, 'Burglary', '6'),
(46, 3, 'Fraud', '7'),
(47, 2, 'Drug Possession', '1'),
(48, 1, 'Drug Trafficking ', '3'),
(49, 1, 'Solicitation', '17'),
(50, 1, 'Tax Evasion', '13');

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE IF NOT EXISTS `judge` (
  `judge_id` int(11) NOT NULL,
  `judge_name` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`judge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`judge_id`, `judge_name`, `age`, `gender`, `race`) VALUES
(1, 'Karen May', 43, 'F', 'Asian'),
(2, 'Christine James', 37, 'F', 'White'),
(3, 'Anthony Williams', 46, 'M', 'Black'),
(4, 'Bill Clide', 56, 'M', 'Black'),
(5, 'Jasmine Florez', 53, 'F', 'Asian'),
(6, 'Jacob Jones', 35, 'M', 'White'),
(7, 'Nina Rodriguez', 58, 'F', 'White'),
(8, 'Johnathan Smith', 60, 'M', 'Black'),
(9, 'Sam Lawrence', 50, 'M', 'Asian'),
(10, 'Henry Williams', 41, 'M', 'White');

-- --------------------------------------------------------

--
-- Stand-in structure for view `main_view`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `main_view` (
`case_id` int(11)
,`judge_id` int(11)
,`defendant_id` int(11)
,`region` varchar(20)
,`case_date` date
,`charge` varchar(20)
,`sentence` varchar(20)
,`defendant_name` varchar(20)
,`defendant_age` decimal(10,0)
,`defendant_gender` varchar(1)
,`defendant_race` varchar(10)
,`judge_name` varchar(20)
,`judge_age` int(11)
,`judge_gender` varchar(1)
,`judge_race` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `region`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `region` (
`region` varchar(20)
,`judge_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `average_judge_sentences`
--
DROP TABLE IF EXISTS `average_judge_sentences`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`average_judge_sentences`  AS SELECT `main_view`.`judge_id` AS `judge_id`, `main_view`.`charge` AS `charge`, avg(`main_view`.`sentence`) AS `average_judge_sentence_per_charge` FROM `judex_tables`.`main_view` GROUP BY `main_view`.`judge_id`, `main_view`.`charge``charge`  ;

-- --------------------------------------------------------

--
-- Structure for view `average_judge_sentences_detailed`
--
DROP TABLE IF EXISTS `average_judge_sentences_detailed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`average_judge_sentences_detailed`  AS SELECT `judex_tables`.`judge`.`judge_id` AS `judge_id`, `judex_tables`.`judge`.`judge_name` AS `judge_name`, `judex_tables`.`judge`.`age` AS `judge_age`, `judex_tables`.`judge`.`gender` AS `judge_gender`, `judex_tables`.`judge`.`race` AS `judge_race`, `average_judge_sentences`.`charge` AS `charge`, `average_judge_sentences`.`average_judge_sentence_per_charge` AS `average_judge_sentence_per_charge`, `region`.`region` AS `region` FROM ((`judex_tables`.`judge` join `judex_tables`.`average_judge_sentences` on(`judex_tables`.`judge`.`judge_id` = `average_judge_sentences`.`judge_id`)) join `judex_tables`.`region` on(`judex_tables`.`judge`.`judge_id` = `region`.`judge_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `average_sentence_per_charge`
--
DROP TABLE IF EXISTS `average_sentence_per_charge`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`average_sentence_per_charge`  AS SELECT `main_view`.`charge` AS `charge`, avg(`main_view`.`sentence`) AS `average_sentence` FROM `judex_tables`.`main_view` GROUP BY `main_view`.`charge``charge`  ;

-- --------------------------------------------------------

--
-- Structure for view `average_sentence_per_region`
--
DROP TABLE IF EXISTS `average_sentence_per_region`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`average_sentence_per_region`  AS SELECT `main_view`.`charge` AS `region_1_charge`, `main_view`.`region` AS `region_1`, avg(`main_view`.`sentence`) AS `average_sentence_for_region_1`, count(0) AS `number_of_cases_in_region_1` FROM `judex_tables`.`main_view` GROUP BY `main_view`.`charge`, `main_view`.`region` ORDER BY `main_view`.`region` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `average_sentence_per_region_2`
--
DROP TABLE IF EXISTS `average_sentence_per_region_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`average_sentence_per_region_2`  AS SELECT `main_view`.`charge` AS `region_2_charge`, `main_view`.`region` AS `region_2`, avg(`main_view`.`sentence`) AS `average_sentence_for_region_2`, count(0) AS `number_of_cases_in_region_2` FROM `judex_tables`.`main_view` GROUP BY `main_view`.`charge`, `main_view`.`region` ORDER BY `main_view`.`region` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `comparison_view`
--
DROP TABLE IF EXISTS `comparison_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`comparison_view`  AS SELECT `average_sentence_per_region`.`region_1_charge` AS `charge`, `average_sentence_per_region`.`region_1` AS `region_1`, `average_sentence_per_region`.`average_sentence_for_region_1` AS `average_sentence_for_region_1`, `average_sentence_per_region`.`number_of_cases_in_region_1` AS `number_of_cases_in_region_1`, `average_sentence_per_region_2`.`region_2` AS `region_2`, `average_sentence_per_region_2`.`average_sentence_for_region_2` AS `average_sentence_for_region_2`, `average_sentence_per_region_2`.`number_of_cases_in_region_2` AS `number_of_cases_in_region_2` FROM (`judex_tables`.`average_sentence_per_region` join `judex_tables`.`average_sentence_per_region_2` on(`average_sentence_per_region`.`region_1_charge` = `average_sentence_per_region_2`.`region_2_charge`))  ;

-- --------------------------------------------------------

--
-- Structure for view `main_view`
--
DROP TABLE IF EXISTS `main_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`main_view`  AS SELECT `judex_tables`.`case_table`.`case_id` AS `case_id`, `judex_tables`.`judge`.`judge_id` AS `judge_id`, `judex_tables`.`defendant`.`defendant_id` AS `defendant_id`, `judex_tables`.`case_table`.`region` AS `region`, `judex_tables`.`case_table`.`date1` AS `case_date`, `judex_tables`.`joint_table`.`charge` AS `charge`, `judex_tables`.`joint_table`.`sentence` AS `sentence`, `judex_tables`.`defendant`.`defendant_name` AS `defendant_name`, `judex_tables`.`defendant`.`age` AS `defendant_age`, `judex_tables`.`defendant`.`gender` AS `defendant_gender`, `judex_tables`.`defendant`.`race` AS `defendant_race`, `judex_tables`.`judge`.`judge_name` AS `judge_name`, `judex_tables`.`judge`.`age` AS `judge_age`, `judex_tables`.`judge`.`gender` AS `judge_gender`, `judex_tables`.`judge`.`race` AS `judge_race` FROM (((`judex_tables`.`case_table` join `judex_tables`.`joint_table` on(`judex_tables`.`case_table`.`case_id` = `judex_tables`.`joint_table`.`case_id`)) join `judex_tables`.`defendant` on(`judex_tables`.`joint_table`.`defendant_id` = `judex_tables`.`defendant`.`defendant_id`)) join `judex_tables`.`judge` on(`judex_tables`.`case_table`.`judge_id` = `judex_tables`.`judge`.`judge_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `region`
--
DROP TABLE IF EXISTS `region`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `judex_tables`.`region`  AS SELECT `judex_tables`.`case_table`.`region` AS `region`, `judex_tables`.`case_table`.`judge_id` AS `judge_id` FROM `judex_tables`.`case_table` GROUP BY `judex_tables`.`case_table`.`judge_id``judge_id`  ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_table`
--
ALTER TABLE `case_table`
  ADD CONSTRAINT `case_table_ibfk_1` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`judge_id`) ON DELETE SET NULL;

--
-- Constraints for table `joint_table`
--
ALTER TABLE `joint_table`
  ADD CONSTRAINT `joint_table_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `case_table` (`case_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `joint_table_ibfk_2` FOREIGN KEY (`defendant_id`) REFERENCES `defendant` (`defendant_id`) ON DELETE CASCADE;
COMMIT;
