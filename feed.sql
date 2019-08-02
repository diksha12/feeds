-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 02:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feed`
--

-- --------------------------------------------------------

--
-- Table structure for table `ball_by_ball`
--

CREATE TABLE `ball_by_ball` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `over_number` int(11) NOT NULL,
  `ball_number` int(11) NOT NULL,
  `batsman` int(11) NOT NULL,
  `bowler` int(11) NOT NULL,
  `runs_scored` int(11) NOT NULL,
  `run_type` enum('run','4','6','lb','b') NOT NULL,
  `overthrows` int(11) NOT NULL,
  `overthrow_fielder_id` int(11) NOT NULL,
  `dismissal_type` int(11) NOT NULL,
  `catcher` int(11) NOT NULL,
  `run_out_by` int(11) NOT NULL,
  `stumping_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `team1_name` varchar(500) NOT NULL,
  `team1_short_name` varchar(20) NOT NULL,
  `team2_name` varchar(500) NOT NULL,
  `team2_short_name` varchar(20) NOT NULL,
  `series_name` varchar(500) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `original_datetime` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `datetime_created` datetime NOT NULL,
  `datetime_last_modified` datetime NOT NULL,
  `toss_won_by_team_id` int(11) NOT NULL,
  `batted_first_team_id` int(11) NOT NULL,
  `batted_second_team_id` int(11) NOT NULL,
  `first_innings_runs_scored` int(11) NOT NULL,
  `first_innngs_overs_bowled` int(11) NOT NULL,
  `first_innings_wickets` int(11) NOT NULL,
  `first_innings_total_extras` int(11) NOT NULL,
  `first_innings_byes` int(11) NOT NULL,
  `first_innings_leg_byes` int(11) NOT NULL,
  `first_innings_wides` int(11) NOT NULL,
  `first_innings_noballs` int(11) NOT NULL,
  `second_innings_runs_scored` int(11) NOT NULL,
  `second_innngs_overs_bowled` int(11) NOT NULL,
  `second_innings_wickets` int(11) NOT NULL,
  `second_innings_total_extras` int(11) NOT NULL,
  `second_innings_byes` int(11) NOT NULL,
  `second_innings_leg_byes` int(11) NOT NULL,
  `second_innings_wides` int(11) NOT NULL,
  `second_innings_noballs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `area` varchar(500) NOT NULL,
  `current_team` int(11) NOT NULL,
  `current_series` int(11) NOT NULL,
  `player_type` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) DEFAULT NULL,
  `datetime_created` datetime NOT NULL,
  `datetime_last_modified` datetime DEFAULT NULL,
  `player_credits` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `dob`, `area`, `current_team`, `current_series`, `player_type`, `created_by`, `last_modified_by`, `datetime_created`, `datetime_last_modified`, `player_credits`) VALUES
(1, 'Virat Kohli', '2016-07-13', 'Delhi', 1, 2, 'Batsman', 1, NULL, '2019-08-01 13:31:05', NULL, 0),
(2, 'MS Dhoni', '2019-07-31', 'Place 1', 2, 2, 'AllRounder', 1, NULL, '2019-08-01 13:31:37', NULL, 0),
(3, 'MS Dhoni', '2019-07-31', 'Place 1', 2, 2, 'AllRounder', 1, NULL, '2019-08-01 14:16:19', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `score_record`
--

CREATE TABLE `score_record` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `player_name` varchar(500) NOT NULL,
  `player_role` enum('barsman','bowler','all-rounder','wicket-keeper') NOT NULL,
  `player_super_role` enum('captain','vice-captain') NOT NULL,
  `bowler_type` enum('off-spinner','leg-spinner','fast','medium-fast') NOT NULL,
  `bowling_hand` enum('left','right') NOT NULL,
  `overs_bowled` decimal(4,1) NOT NULL,
  `wickets` int(11) NOT NULL,
  `runs_conceded` int(11) NOT NULL,
  `maidens` int(11) NOT NULL,
  `4s_conceded` int(11) NOT NULL,
  `6s_conceded` int(11) NOT NULL,
  `dots_bowled` int(11) NOT NULL,
  `wides_bowled` int(11) NOT NULL,
  `noballs_bowled` int(11) NOT NULL,
  `batsman_hand` enum('leftie','rightie') NOT NULL,
  `batting_position` int(11) NOT NULL,
  `runs_scored` int(11) NOT NULL,
  `balls_faced` int(11) NOT NULL,
  `4s_hit` int(11) NOT NULL,
  `6s_hit` int(11) NOT NULL,
  `dots_conceded` int(11) NOT NULL,
  `1_run` int(11) NOT NULL,
  `2_run` int(11) NOT NULL,
  `3_run` int(11) NOT NULL,
  `4_run` int(11) NOT NULL,
  `5_run` int(11) NOT NULL,
  `6_run` int(11) NOT NULL,
  `7_run` int(11) NOT NULL,
  `8_run` int(11) NOT NULL,
  `batting_status_type` enum('not-yet-batted','not-out','bowled','lbw','caught','stumped','run-out') NOT NULL DEFAULT 'not-yet-batted',
  `wicket_bowler` int(11) NOT NULL,
  `caught_by` int(11) NOT NULL,
  `run_out_by` int(11) NOT NULL,
  `stumped_by` int(11) NOT NULL,
  `wk_byes_conceded` int(11) NOT NULL,
  `wk_stumpings` int(11) NOT NULL,
  `match_award` varchar(200) NOT NULL,
  `series_award` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `location` varchar(500) DEFAULT NULL,
  `country` varchar(500) DEFAULT NULL,
  `format_id` int(11) NOT NULL,
  `format_name` varchar(300) NOT NULL,
  `series_type_id` int(11) NOT NULL,
  `series_type_name` varchar(300) NOT NULL,
  `created_by` int(11) NOT NULL,
  `datetime_created` datetime NOT NULL,
  `datetime_last_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `location`, `country`, `format_id`, `format_name`, `series_type_id`, `series_type_name`, `created_by`, `datetime_created`, `datetime_last_modified`) VALUES
(1, 'The Ashes', 'erwr', 'saab', 1, 'T20', 1, 'Under-16', 1, '2019-07-31 15:55:21', NULL),
(2, 'India Vs WI', 'werwrewre', 'Bangladesh', 1, 'T20', 1, 'Under-16', 1, '2019-07-31 15:55:40', NULL),
(3, 'TNPL', 'TN', 'India', 1, '', 1, '', 0, '0000-00-00 00:00:00', NULL),
(4, '', '', '', 1, 'T20', 1, 'Under-16', 1, '2019-07-31 19:17:42', NULL),
(5, '', '', '', 1, 'T20', 1, 'Under-16', 1, '2019-07-31 19:17:43', NULL),
(6, '', '', '', 1, 'T20', 1, 'Under-16', 1, '2019-07-31 19:17:44', NULL),
(7, '', '', '', 1, 'T20', 1, 'Under-16', 1, '2019-07-31 19:18:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `series_format_type`
--

CREATE TABLE `series_format_type` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series_format_type`
--

INSERT INTO `series_format_type` (`id`, `name`) VALUES
(1, 'T20'),
(2, 'T10');

-- --------------------------------------------------------

--
-- Table structure for table `series_type`
--

CREATE TABLE `series_type` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series_type`
--

INSERT INTO `series_type` (`id`, `name`) VALUES
(1, 'Under-16'),
(2, 'Under-19');

-- --------------------------------------------------------

--
-- Table structure for table `squads`
--

CREATE TABLE `squads` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `player_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `datetime_created` datetime NOT NULL,
  `datetime_last_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `short_name`, `remarks`, `created_by`, `datetime_created`, `datetime_last_modified`) VALUES
(1, 'India', 'cmdkcsm', '', 1, '2019-07-31 16:06:00', NULL),
(2, 'Bangladesh', 'BA', 'kmk', 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ball_by_ball`
--
ALTER TABLE `ball_by_ball`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_record`
--
ALTER TABLE `score_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_format_type`
--
ALTER TABLE `series_format_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_type`
--
ALTER TABLE `series_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `squads`
--
ALTER TABLE `squads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `ball_by_ball`
--
ALTER TABLE `ball_by_ball`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `score_record`
--
ALTER TABLE `score_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `series_format_type`
--
ALTER TABLE `series_format_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `series_type`
--
ALTER TABLE `series_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `squads`
--
ALTER TABLE `squads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
