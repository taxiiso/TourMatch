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
  `japanese` varchar(30) NOT NULL,
  `english` varchar(30) NOT NULL,
  `chinese` varchar(30) NOT NULL,
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
(14, 'test02', 'test', '千原せいじ', '大阪府', '0123456789', '1962-10-28', '男', '2019-08-06 04:46:31', '可', '不可', '不可', 'seizi.jpg', '案内したるから、ありがたく思えよ。', 'isokunren@gmail.com', 2, '', 1962, 10, 28),
(15, 'test03', 'test', '森田一義', '福岡県', '0123456789', '1940-01-01', '男', '2019-08-13 05:32:18', '可', '可', '可', 'tamori.jpg', 'ガイドしてもいいかな？？いいとも～。', 'isokunren@gmail.com', 2, '', 1940, 1, 1),
(18, 'test01', 'test', '阿部寛', '東京都', '0123456789', '1966-02-15', '男', '2019-08-13 07:29:50', '可', '不可', '可', 'abe-top.jpg', '阿部寛です。\r\n親切丁寧にガイドします。\r\nよろしくお願いします。', 'isokunren@gmail.com', 2, '', 1966, 2, 15);

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
  `afg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_guidebook`
--

INSERT INTO `t_guidebook` (`guidebook_id`, `tour_id`, `guide_id`, `tour_date`, `reg_date`, `afg`) VALUES
(24, 6, 14, '2019-08-13', '2019-08-13 07:26:43', '終了'),
(25, 6, 14, '2019-08-14', '2019-08-13 07:26:55', '募集中'),
(26, 6, 14, '2019-08-15', '2019-08-13 07:27:08', '募集中'),
(27, 6, 14, '2019-08-16', '2019-08-13 07:27:30', '募集中'),
(28, 7, 15, '2019-08-13', '2019-08-13 07:28:14', '終了'),
(29, 7, 15, '2019-08-14', '2019-08-13 07:28:26', '予約成立'),
(30, 7, 15, '2019-08-15', '2019-08-13 07:28:38', '募集中'),
(31, 7, 15, '2019-08-16', '2019-08-13 07:28:51', '予約成立'),
(32, 8, 18, '2019-08-13', '2019-08-13 07:30:18', '終了'),
(33, 8, 18, '2019-08-14', '2019-08-13 07:30:30', '募集中'),
(34, 8, 18, '2019-08-15', '2019-08-13 07:30:41', '予約成立'),
(35, 8, 18, '2019-08-16', '2019-08-13 07:30:55', '募集中'),
(36, 6, 18, '2019-08-17', '2019-08-14 05:06:28', '募集中'),
(37, 8, 18, '2019-08-19', '2019-08-14 05:35:46', '募集中'),
(38, 6, 14, '2019-08-17', '2019-08-14 05:36:28', '募集中'),
(39, 6, 14, '2019-08-18', '2019-08-14 05:36:38', '募集中'),
(40, 6, 14, '2019-08-19', '2019-08-14 05:36:51', '募集中'),
(41, 7, 15, '2019-08-18', '2019-08-14 05:37:24', '募集中'),
(42, 7, 15, '2019-08-19', '2019-08-14 05:37:42', '募集中'),
(43, 7, 15, '2019-08-20', '2019-08-14 05:37:56', '募集中');

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
  `tour_make_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `afg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_tour`
--

INSERT INTO `t_tour` (`tour_id`, `tour_name`, `tour_address`, `tour_price`, `tour_image`, `tour_detail`, `tour_make_date`, `afg`) VALUES
(6, 'こってこて大阪ツアー半日', '大阪府', 12000, 'osaka.jpg', 'こってこての大阪ツアー！！<br>\r\nベタなものが好きなあなたにオススメです。<br>\r\n<br>\r\n【ツアースケジュール】<br>\r\n<br>\r\n・新世界と通天閣<br>\r\n・串カツでランチ<br>\r\n・あべのハルカス展望台<br>\r\n・大阪城見学<br>\r\n・中之島散策<br>\r\n・心斎橋のグリコで記念撮影<br>\r\n<br>', '2019-08-06 07:29:09', '1'),
(7, 'おいでやす京都1日満喫ツアー', '京都府', 25000, 'kyoto.jpg', '世界的観光地である京都。<br>\r\nこのツアーでは、京都を一日かけてじっくりと周ります。<br>\r\nもちろん、京都グルメも満喫！！<br>\r\n<br>\r\n【ツアー内容】<br>\r\n<br>\r\n・清水寺<br>\r\n・金閣寺・銀閣寺<br>\r\n・平安神宮<br>\r\n・伏見稲荷大社<br>\r\n・鴨川<br>\r\n・錦市場<br>\r\n・茶道体験<br>\r\n・八つ橋食べ放題<br>\r\n・京懐石ディナー<br>\r\n<br>\r\n', '2019-08-06 05:20:32', '1'),
(8, 'ハイカラな街神戸半日ツアー', '兵庫県', 8000, 'kobe.jpg', '異人館の並ぶお洒落な港町神戸。<br>\r\nこのツアーでは、そんな神戸の見どころを半日で巡るツアーです。<br>\r\n\r\n<br>\r\n【ツアー内容】<br>\r\n<br>\r\n・神戸中華街<br>\r\n・異人館巡り<br>\r\n・メリケンパーク<br>\r\n・神戸タワー<br>\r\n・明石焼き食べ放題<br>\r\n・神戸スイーツ食べ放題<br>\r\n<br>\r\n', '2019-08-06 05:20:47', '1');

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
(8, 'test01', 'test', '安倍晋三', '東京都', '0123456789', '1966-02-15', '男', '2019-08-06 02:35:47', 'isokunren@gmail.com', 2, '', 1966, 2, 15),
(9, 'test02', 'test', '野比のび太', '神奈川県', '0123456789', '1978-03-17', '男', '2019-08-06 02:41:26', 'isokunren@gmail.com', 2, '', 1978, 3, 17),
(10, 'test03', 'test', '仮田仮子', '北海道', '仮田仮子', '1941-02-18', '女', '2019-08-06 02:54:09', 'test@test.com', 1, 'ZonVgTdsGh9YYNHAGnUlcrmyKrasbg', 1941, 2, 18),
(11, 'test04', 'test', '滝川クリステル', '福井県', '0123456789', '1988-10-19', '女', '2019-08-08 04:55:41', 'isokunren@gmail.com', 2, '', 1988, 10, 19);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_userbook`
--

CREATE TABLE `t_userbook` (
  `userbook_id` int(11) NOT NULL,
  `guidebook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comp_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `afg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_userbook`
--

INSERT INTO `t_userbook` (`userbook_id`, `guidebook_id`, `user_id`, `comp_date`, `afg`) VALUES
(16, 24, 8, '2019-08-13 07:31:27', '終了'),
(17, 29, 8, '2019-08-13 07:31:53', '予約中'),
(18, 34, 8, '2019-08-13 07:32:25', '予約中'),
(19, 31, 8, '2019-08-14 04:32:59', '予約中');

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
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_guidebook`
--
ALTER TABLE `t_guidebook`
  MODIFY `guidebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `t_tour`
--
ALTER TABLE `t_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_userbook`
--
ALTER TABLE `t_userbook`
  MODIFY `userbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
