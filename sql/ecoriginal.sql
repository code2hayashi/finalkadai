-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2017 年 3 月 16 日 07:55
-- サーバのバージョン： 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecsample1`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ec_item`
--

CREATE TABLE `ec_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ec_item`
--

INSERT INTO `ec_item` (`id`, `name`, `price`, `status`, `stock`, `create_date`, `update_date`) VALUES
(1, '白シャツ', 1000, 1, 10, '2017-02-20 18:47:27', '2017-02-20 18:47:27'),
(2, '白シャツ２', 1500, 1, 10, '2017-02-20 18:47:51', '2017-02-20 18:47:51'),
(3, '白シャツ3', 2000, 1, 10, '2017-02-20 18:47:51', '2017-02-20 18:47:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `ec_order`
--

CREATE TABLE `ec_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ec_order`
--

INSERT INTO `ec_order` (`id`, `user_id`, `price`, `created_date`) VALUES
(1, 1, 0, '2017-03-11 16:26:29'),
(2, 3, 10500, '2017-03-11 17:18:12'),
(3, 3, 0, '2017-03-11 20:58:49'),
(4, 1, 1500, '2017-03-11 22:03:06'),
(5, 1, 0, '2017-03-11 22:04:16'),
(6, 1, 1500, '2017-03-11 22:04:32'),
(7, 1, 0, '2017-03-11 22:24:41'),
(8, 1, 0, '2017-03-11 23:50:19'),
(9, 1, 0, '2017-03-11 23:52:23'),
(10, 1, 0, '2017-03-11 23:52:35'),
(11, 1, 13000, '2017-03-14 14:56:52'),
(12, 1, 0, '2017-03-14 14:56:59'),
(13, 1, 6500, '2017-03-14 15:01:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `ec_order_detail`
--

CREATE TABLE `ec_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ec_order_detail`
--

INSERT INTO `ec_order_detail` (`id`, `order_id`, `item_id`, `amount`, `price`, `created_date`) VALUES
(1, 2, 2, 7, 1500, '2017-03-11 17:18:12'),
(2, 4, 2, 1, 1500, '2017-03-11 22:03:06'),
(3, 6, 2, 1, 1500, '2017-03-11 22:04:32'),
(4, 11, 1, 1, 1000, '2017-03-14 14:56:52'),
(5, 11, 2, 8, 1500, '2017-03-14 14:56:52'),
(6, 13, 1, 2, 1000, '2017-03-14 15:01:14'),
(7, 13, 2, 3, 1500, '2017-03-14 15:01:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `ec_user`
--

CREATE TABLE `ec_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ec_user`
--

INSERT INTO `ec_user` (`id`, `name`, `email`, `password`, `created_date`, `updated_date`) VALUES
(1, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', '2017-03-11 16:26:13', '0000-00-00 00:00:00'),
(2, 'akasa', 'akasa', '7e0f02e2402be9296dd7226eee843f4b', '2017-03-11 16:27:30', '0000-00-00 00:00:00'),
(3, '林', 'bbb', '08f8e0260c64418510cefb2b06eee5cd', '2017-03-11 17:17:45', '0000-00-00 00:00:00'),
(4, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', '2017-03-11 22:02:46', '0000-00-00 00:00:00'),
(5, 'akasa', 'akasa', '7e0f02e2402be9296dd7226eee843f4b', '2017-03-14 18:57:56', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_order`
--
ALTER TABLE `ec_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_order_detail`
--
ALTER TABLE `ec_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_user`
--
ALTER TABLE `ec_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_order`
--
ALTER TABLE `ec_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ec_order_detail`
--
ALTER TABLE `ec_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ec_user`
--
ALTER TABLE `ec_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
