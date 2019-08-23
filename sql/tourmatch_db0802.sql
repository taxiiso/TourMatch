-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourmatch_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `m_admin`
--

CREATE TABLE `m_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_loginid` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_admin`
--

INSERT INTO `m_admin` (`admin_id`, `admin_loginid`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- テーブルの構造 `t_guide`
--

CREATE TABLE `t_guide` (
  `guide_id` int(11) NOT NULL,
  `loginid` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `japanese` int(10) NOT NULL,
  `english` int(10) NOT NULL,
  `chinese` int(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `self_introduction` varchar(2010) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `afg` int(10) NOT NULL,
  `temppass` varchar(100) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `birth_month` int(11) NOT NULL,
  `birth_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_guide`
--

INSERT INTO `t_guide` (`guide_id`, `loginid`, `password`, `name`, `address`, `tel`, `birthday`, `gender`, `joindate`, `japanese`, `english`, `chinese`, `image`, `self_introduction`, `mail`, `afg`, `temppass`, `birth_year`, `birth_month`, `birth_day`) VALUES
(8, 'abe', '020kFU', '阿部たかし', '東京都', '0123456789', '1963-01-14', '男', '2019-08-01 08:16:49', 1, 1, 0, 'kyuri_yama.jpg', '阿部寛です。\r\nテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエテルマエロマエ。', 'isokunren@gmail.com', 3, '', 1963, 1, 14),
(9, 'test88', '41d5m0', '今日', '青森県', '0123456789', '1970-03-20', '男', '2019-08-02 01:58:12', 1, 0, 0, '', 'sacxascx', 'test@test.com', 2, 'jUoREa0s0HiRuWVsGnVNu5HfDpwy00', 1970, 3, 20),
(10, 'test', 'test', '阿部寛', '岩手県', '0123456789', '1963-01-14', '男', '2019-08-02 05:31:26', 1, 1, 1, 'abe-top.jpg', '阿部寛です。\r\n', 'isokunren@gmail.com', 2, 'efGLlESxjNrLeNJT6t9pBCFNUyvZ7R', 1963, 1, 14),
(11, 'aaa', 't60PgR', 'あああ', '岩手県', '111', '1963-01-14', '男', '2019-08-01 02:26:08', 1, 0, 0, 'ninjin.jpg', 'cwsdxaWindows', 'test@test.com', 1, 'CsNGLmpkBF4kI0TioHrcHnauplTa2t', 1963, 1, 14),
(12, 'fgbhfgb', 'zF07do', 'あああ', '宮城県', '111', '1963-01-14', '男', '2019-08-01 04:14:36', 1, 0, 0, 'piman_yama.jpg', 'cwsdxaWindows', 'test@test.com', 1, 'MckvpqE6A6Diz41FO0Wdwb1Nk6PQPC', 1963, 1, 14);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_guidebook`
--

CREATE TABLE `t_guidebook` (
  `guidebook_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `guide_id` int(100) NOT NULL,
  `tour_date` date NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guide_can_date` date NOT NULL,
  `afg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_guidebook`
--

INSERT INTO `t_guidebook` (`guidebook_id`, `tour_id`, `guide_id`, `tour_date`, `reg_date`, `guide_can_date`, `afg`) VALUES
(1, 2, 10, '2019-08-20', '2019-08-02 06:42:31', '0000-00-00', 1),
(2, 5, 10, '2019-08-19', '2019-08-02 06:46:02', '0000-00-00', 1),
(3, 5, 10, '2019-08-11', '2019-08-02 07:21:02', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_tour`
--

CREATE TABLE `t_tour` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(200) NOT NULL,
  `tour_address` varchar(300) NOT NULL,
  `tour_price` int(11) NOT NULL,
  `tour_image` varchar(300) NOT NULL,
  `tour_detail` varchar(1000) NOT NULL,
  `tour_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `afg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_tour`
--

INSERT INTO `t_tour` (`tour_id`, `tour_name`, `tour_address`, `tour_price`, `tour_image`, `tour_detail`, `tour_date`, `afg`) VALUES
(1, 'asas', '宮城県', 445323, 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\tour_image\\kyabetsu.jpg', 'gjngjh', '2019-08-02 05:36:53', 2),
(2, 'asas', '宮城県', 532453, 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\tour_image\\ninjin_yama.jpg', 'ncfgncgfncfgh', '2019-07-31 05:10:23', 1),
(3, 'vdfvdf', '秋田県', 99555, 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\tour_image\\tomato_yama.jpg', 'sdvdbvsvbgdrgvxd', '2019-07-31 05:14:40', 1),
(4, 'casdc', '宮城県', 52752, 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\tour_image\\negi_taba.jpg', 'dsfvfesrvrvrd', '2019-07-31 05:17:11', 1),
(5, 'casdc', '宮城県', 52752, 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\tour_image\\negi_taba.jpg', 'dsfvfesrvrvrd', '2019-07-31 05:37:52', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `loginid` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mail` varchar(200) NOT NULL,
  `afg` int(10) NOT NULL,
  `temppass` varchar(200) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `birth_month` int(11) NOT NULL,
  `birth_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_user`
--

INSERT INTO `t_user` (`user_id`, `loginid`, `password`, `name`, `address`, `tel`, `birthday`, `gender`, `joindate`, `mail`, `afg`, `temppass`, `birth_year`, `birth_month`, `birth_day`) VALUES
(4, 'takushi', 'M1LjDZ', '浜田', '大阪府', '0123456789', '1952-03-22', '男', '2019-07-25 04:21:58', 'isokunren@gmail.com', 3, '', 1952, 3, 22),
(5, 'test', 'vBvDFR', '鈴木宗男', '北海道', '0123456789', '1963-04-19', '男', '2019-07-25 04:39:01', 'isokunren@gmail.com', 2, '', 0, 0, 0),
(6, 'test1', '0L3NQw', '岸部シロー', '山梨県', '0123456789', '1989-12-30', '男', '2019-07-25 08:05:05', 'isokunren@gmail.com', 2, '', 0, 0, 0),
(7, 'test02', '4d9V2w', 'テスト太郎', '宮城県', '0123456789', '1949-01-01', '男', '2019-08-01 01:45:02', 'test@gmail.com', 1, 'ftMjClElu0kx851XjyeE28jFtYpJeh', 1949, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_userbook`
--

CREATE TABLE `t_userbook` (
  `userbook_id` int(11) NOT NULL,
  `guidebook_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comp_date` date NOT NULL,
  `user_can_date` date NOT NULL,
  `afg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `t_guide`
--
ALTER TABLE `t_guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `t_guidebook`
--
ALTER TABLE `t_guidebook`
  ADD PRIMARY KEY (`guidebook_id`);

--
-- Indexes for table `t_tour`
--
ALTER TABLE `t_tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_userbook`
--
ALTER TABLE `t_userbook`
  ADD PRIMARY KEY (`userbook_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_guide`
--
ALTER TABLE `t_guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_guidebook`
--
ALTER TABLE `t_guidebook`
  MODIFY `guidebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_tour`
--
ALTER TABLE `t_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_userbook`
--
ALTER TABLE `t_userbook`
  MODIFY `userbook_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
