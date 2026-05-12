-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:3307
-- 生成日期： 2026-05-12 06:12:19
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `finalexam_c`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activation_code` varchar(64) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `activation_code`, `active`, `reset_token`, `reset_expires`, `created_at`) VALUES
(1, 'lang', 'yuki2005xue@gmail.com', '$2y$10$tPMJ5QhB8zvgpXhF/axD5uLUv9h1qLOH58qEQfTsP8lK46gQujI.2', '467f7ecbce8c0a7f045bdd4b7a89f9bd', 0, NULL, NULL, '2026-05-12 03:49:17'),
(2, 'rachel', 'dc32856@um.edu.mo', '$2y$10$X3PZJ34ejzyYx5vwoR81IOAsm29Umervj9feXzmxhLKopwJOxxaCS', '4c3d2c9488b291048b68e0ac9933f8ed', 1, NULL, NULL, '2026-05-12 03:52:42'),
(3, '1233', 'text@gmail.com', '$2y$10$YHRwyGxpmHbdKi0q9D.rdOp9USJKm3lYqXwtY/tSbDSHNwqx0wNUe', 'd7bf739267b60dc68fa657568340bcfd', 1, NULL, NULL, '2026-05-12 04:03:01');

--
-- 转储表的索引
--

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
