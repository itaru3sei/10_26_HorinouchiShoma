-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_f02_db26`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(1, 'name1', 'url1', 'comment1', '2019-02-03 14:04:49'),
(2, 'name2', NULL, 'comment2', '2019-02-03 14:06:16'),
(3, 'name3', 'url3', NULL, '2019-02-03 14:06:16'),
(4, 'name4', NULL, NULL, '2019-02-03 14:06:16'),
(5, 'test01', 'https://www.facebook.com/', 'comment01', '2019-02-03 14:58:13'),
(6, 'test02', '', '', '2019-02-03 14:59:55'),
(7, 'aaa', '', 'commentcomment!', '2019-02-03 15:37:57'),
(8, 'DJnarikinn', 'http://aaaaa.com', 'あああああ', '2019-02-05 17:03:29'),
(9, 'DJnarikinn', 'http://aaaaa.com', 'あああああ', '2019-02-05 17:05:31'),
(25, 'ああ', '', '', '2019-02-05 18:08:15'),
(26, 'DJnarikinn', '', 'narikinnarikin', '2019-02-06 20:48:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `ju_syuro`
--

CREATE TABLE `ju_syuro` (
  `id` int(11) NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `ju_syuro`
--

INSERT INTO `ju_syuro` (`id`, `user_id`, `startdate`, `enddate`, `image`) VALUES
(3, '5', '2019-03-07', '2019-03-20', 'upload/20190307074002d41d8cd98f00b204e9800998ecf8427e.png'),
(5, '1', '2019-03-07', '2019-03-07', 'upload/20190307082853d41d8cd98f00b204e9800998ecf8427e.png'),
(6, '5', '2019-03-20', '2019-03-07', 'upload/20190307083602d41d8cd98f00b204e9800998ecf8427e.png'),
(7, '1', '2019-01-16', '2019-03-01', 'upload/20190307120713d41d8cd98f00b204e9800998ecf8427e.png');

-- --------------------------------------------------------

--
-- テーブルの構造 `moisture_table`
--

CREATE TABLE `moisture_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `moisture` float NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `moisture_table`
--

INSERT INTO `moisture_table` (`id`, `name`, `moisture`, `comment`, `indate`) VALUES
(9, '2', 0.3, 'aaa', '2019-02-13 14:45:19'),
(10, '6', 0.3, 'aaaa', '2019-02-16 17:43:40'),
(11, '6', 0.3, '', '2019-02-16 17:43:47'),
(12, '1', -0.1, '', '2019-02-25 15:09:52');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_care_user`
--

CREATE TABLE `mst_care_user` (
  `USER_ID` int(12) NOT NULL,
  `USER_NAME` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `USER_KANA` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ATTENTION_LV` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NO_NEEDS` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HOSPITAL` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ASSIGN_M_F` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NURSING` tinyint(1) DEFAULT NULL,
  `EMPLOYMENT_B` tinyint(1) DEFAULT NULL,
  `GH` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_care_user`
--

INSERT INTO `mst_care_user` (`USER_ID`, `USER_NAME`, `USER_KANA`, `ATTENTION_LV`, `NO_NEEDS`, `HOSPITAL`, `ASSIGN_M_F`, `NURSING`, `EMPLOYMENT_B`, `GH`) VALUES
(1, 'あおぞら 太郎', 'アオゾラ タロウ', NULL, NULL, NULL, NULL, 1, 1, 1),
(2, 'aiueo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'aaa', 'あああ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'aaaa', 'あああ', NULL, NULL, NULL, 'F', NULL, NULL, NULL),
(6, 'あ', '', NULL, NULL, NULL, '', NULL, NULL, NULL),
(7, 'あおぞら 太郎', 'アオゾラ タロウ', '0', NULL, 'ほ', 'M', NULL, NULL, NULL),
(8, 'あおぞら 太郎', 'アオゾラ タロウ', '要介護１', NULL, 'ほかぞのクリニック', 'F', NULL, NULL, NULL),
(9, 'あおぞら 太郎', 'アオゾラ タロウ', '要介護１', NULL, 'ほかぞのクリニック', 'F', NULL, NULL, NULL),
(10, 'aaa', '', '', NULL, '', '', NULL, NULL, NULL),
(14, 'あおぞら 太郎', 'アオゾラ タロウ', NULL, NULL, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `task` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `image`, `indate`) VALUES
(1, '課題更新', '2019-02-07', '難しい更新', NULL, '0000-00-00 00:00:00'),
(5, '課題04', '2019-01-04', 'tatituteto', NULL, '2019-02-02 15:25:15'),
(6, '課題05', '2019-01-05', 'aiueo', NULL, '2019-02-02 15:25:50'),
(7, '課題06', '2019-01-06', 'aiueo', NULL, '2019-02-02 15:26:15'),
(8, '課題07', '2019-01-07', NULL, NULL, '2019-02-02 15:26:55'),
(9, '課題08', '2019-01-08', NULL, NULL, '2019-02-02 15:26:55'),
(10, '課題09', '2019-01-09', NULL, NULL, '2019-02-02 15:26:55'),
(11, 'aaa', '2019-02-02', 'aafds', NULL, '2019-02-02 16:29:49'),
(12, 'aiueo', '2019-02-06', 'fhjdkasl', NULL, '2019-02-02 16:30:53'),
(13, 'fdja;lj', '2019-02-12', 'jfla;dsk', NULL, '2019-02-02 16:31:57'),
(14, 'aiueokakikicukecosasisusesotatituteto', '2019-02-09', 'hdfajdsal;jfld', NULL, '2019-02-09 14:41:34'),
(15, 'aaa', '2019-02-09', 'fjadl;kj', NULL, '2019-02-09 15:32:56'),
(16, 'aaa', '2019-03-02', 'aaa', 'upload/20190302080225d41d8cd98f00b204e9800998ecf8427e.png', '2019-03-02 16:02:25'),
(17, 'aaa', '2019-03-02', 'aaa', 'upload/20190302080239d41d8cd98f00b204e9800998ecf8427e.png', '2019-03-02 16:02:39'),
(18, 'aaa', '2019-03-02', '', 'upload/20190302080302d41d8cd98f00b204e9800998ecf8427e.png', '2019-03-02 16:03:02'),
(19, 'aaa', '2019-03-02', 'aaa', NULL, '2019-03-02 17:34:59'),
(20, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:48:18'),
(21, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:49:11'),
(22, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:49:47'),
(23, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:50:18'),
(24, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:50:55'),
(25, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:51:12'),
(26, '課題更新', '2019-03-02', '', NULL, '2019-03-02 17:52:03'),
(27, 'aaa', '2019-03-02', '', NULL, '2019-03-02 17:52:23'),
(28, 'aaa', '2019-03-07', 'aaa', 'upload/20190307055835d41d8cd98f00b204e9800998ecf8427e.png', '2019-03-07 13:58:35'),
(29, 'aaa', '2019-03-07', 'aaa', 'upload/20190307055955d41d8cd98f00b204e9800998ecf8427e.png', '2019-03-07 13:59:55');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'name', 'user', 'p', 0, 0),
(2, '管理ユーザーA', 'admin', 'pass', 1, 0),
(4, 'test_user2222', 'id02', 'pass02', 1, 0),
(6, '山田　太朗', 'a', 'a', 0, 0),
(7, 'DJnarikinn', 'aiueo', 'aaa', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ju_syuro`
--
ALTER TABLE `ju_syuro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moisture_table`
--
ALTER TABLE `moisture_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_care_user`
--
ALTER TABLE `mst_care_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ju_syuro`
--
ALTER TABLE `ju_syuro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `moisture_table`
--
ALTER TABLE `moisture_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mst_care_user`
--
ALTER TABLE `mst_care_user`
  MODIFY `USER_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
