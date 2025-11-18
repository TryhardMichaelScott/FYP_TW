-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-10-11 10:04:16
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `travelv2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `item_text` text NOT NULL,
  `item_name` varchar(128) DEFAULT NULL,
  `item_url` text DEFAULT NULL,
  `item_order` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`item_id`, `list_id`, `item_text`, `item_name`, `item_url`, `item_order`) VALUES
(68, 43, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=SUBWAY 板橋新埔店\"allowfullscreen></iframe>', 'SUBWAY 板橋新埔店', 'https://maps.google.com/?cid=17791066927247658286', 0),
(69, 43, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=六堆伙房板橋新埔店\"allowfullscreen></iframe>', '六堆伙房板橋新埔店', 'https://maps.google.com/?cid=11634877667345940160', 0),
(70, 43, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=油庫口蚵仔麵線+炭烤香腸\"allowfullscreen></iframe>', '油庫口蚵仔麵線+炭烤香腸', 'https://maps.google.com/?cid=11162015973850417832', 0),
(71, 43, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=肥貓小麵館\"allowfullscreen></iframe>', '肥貓小麵館', 'https://maps.google.com/?cid=13392187155264495089', 0),
(72, 43, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=新致理重慶酸辣粉\"allowfullscreen></iframe>', '新致理重慶酸辣粉', 'https://maps.google.com/?cid=4193983819435453040', 0),
(73, 44, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=安利美特 台北店\"allowfullscreen></iframe>', '安利美特 台北店', 'https://maps.google.com/?cid=12192344543776259794', 0),
(74, 44, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=animate cafe 台北北門店\"allowfullscreen></iframe>', 'animate cafe 台北北門店', 'https://maps.google.com/?cid=5316730877947831069', 0),
(75, 44, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=雜誌瘋 西門店\"allowfullscreen></iframe>', '雜誌瘋 西門店', 'https://maps.google.com/?cid=6215949124841081523', 0),
(76, 44, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=萬年馬如龍 佳和模型玩具\"allowfullscreen></iframe>', '萬年馬如龍 佳和模型玩具', 'https://maps.google.com/?cid=10698547020652399495', 0),
(77, 44, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=MyAnime Café 動漫主題咖啡廳\"allowfullscreen></iframe>', 'MyAnime Café 動漫主題咖啡廳', 'https://maps.google.com/?cid=17605149208380533400', 0),
(78, 44, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=動漫空間\"allowfullscreen></iframe>', '動漫空間', 'https://maps.google.com/?cid=11316305391035633612', 0),
(201, 102, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=致理科技大學\"allowfullscreen></iframe>', '致理科技大學', 'https://maps.google.com/?cid=15163426911676065456', 0),
(202, 102, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=優衣庫 板橋大遠百店\"allowfullscreen></iframe>', '優衣庫 板橋大遠百店', 'https://maps.google.com/?cid=263446784222366676', 0),
(203, 103, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=致理科技大學\"allowfullscreen></iframe>', '致理科技大學', 'https://maps.google.com/?cid=15163426911676065456', 0),
(204, 103, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=優衣庫 板橋大遠百店\"allowfullscreen></iframe>', '優衣庫 板橋大遠百店', 'https://maps.google.com/?cid=263446784222366676', 0),
(205, 104, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=致理科技大學\"allowfullscreen></iframe>', '致理科技大學', 'https://maps.google.com/?cid=15163426911676065456', 0),
(206, 104, '<iframe width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\"\n           src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=優衣庫 板橋大遠百店\"allowfullscreen></iframe>', '優衣庫 板橋大遠百店', 'https://maps.google.com/?cid=263446784222366676', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `lists`
--

CREATE TABLE `lists` (
  `list_id` int(11) NOT NULL,
  `list_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `theme` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `lists`
--

INSERT INTO `lists` (`list_id`, `list_title`, `description`, `theme`, `user_id`) VALUES
(43, '致理美食', '中午要吃的', 'food', 4),
(44, '動漫周邊', '宅宅出門的目的', 'trip', 4),
(102, '1', '', 'food', 1),
(103, '1', '', 'food', 1),
(104, '1', '', 'food', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `account` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `username`, `account`, `password`, `email`) VALUES
(1, 'lily', 'jj', '123123', 'jj@gmail.com'),
(2, 'yuting', '10933145', '10933145', '10933145@gm.chihlee.edu.tw'),
(3, 'yutingwu', '109331451', '109331451', '109331451@gm.chihlee.edu.tw'),
(4, 'admin', 'admin', '0000', 'admin@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `list_id` (`list_id`);

--
-- 資料表索引 `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `lists` (`list_id`);

--
-- 資料表的限制式 `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
