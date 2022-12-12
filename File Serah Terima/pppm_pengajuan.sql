-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 05:34 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pppm_pengajuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `NIP` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_unit_pppm` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_awal`
--

CREATE TABLE `anggaran_awal` (
  `id_tahunAnggaran` int(11) NOT NULL,
  `tahun_anggaran` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggaran_awal`
--

INSERT INTO `anggaran_awal` (`id_tahunAnggaran`, `tahun_anggaran`, `jumlah`) VALUES
(1, 2022, '10000000000'),
(2, 2022, '5000000000'),
(3, 2022, '');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_total`
--

CREATE TABLE `anggaran_total` (
  `id_total` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `dana_keluar` varchar(50) NOT NULL,
  `sisa_anggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggaran_total`
--

INSERT INTO `anggaran_total` (`id_total`, `tahun`, `dana_keluar`, `sisa_anggaran`) VALUES
(1, '2022', '1950000', '0'),
(2, '2022', '1950000', '0'),
(3, '2022', '1950000', '0'),
(4, '2022', '1950000', '13050000'),
(5, '2022', '1950000', '13050000'),
(6, '2022', '1950000', '13050000'),
(7, '2022', '1950000', '13050000'),
(8, '2022', '1950000', '13050000'),
(9, '2022', '1950000', '13050000'),
(10, '2022', '1950000', '13050000'),
(11, '2022', '1950000', '13050000'),
(12, '2022', '1950000', '13050000'),
(13, '2022', '1950000', '13050000'),
(14, '2022', '1950000', '13050000'),
(15, '2022', '1950000', '13050000'),
(16, '2022', '1950000', '13050000'),
(17, '2022', '1950000', '13050000'),
(18, '2022', '1950000', '13050000'),
(19, '2022', '1950000', '13050000'),
(20, '2022', '1950000', '13050000'),
(21, '2022', '1950000', '13050000'),
(22, '2022', '1950000', '13050000'),
(23, '2022', '1950000', '13050000'),
(24, '2022', '1950000', '13050000'),
(25, '2022', '1950000', '13050000'),
(26, '2022', '1950000', '13050000'),
(27, '2022', '1950000', '13050000'),
(28, '2022', '1950000', '13050000'),
(29, '2022', '1950000', '13050000'),
(30, '2022', '1950000', '13050000'),
(31, '2022', '1950000', '13050000'),
(32, '2022', '1950000', '13050000'),
(33, '2022', '1950000', '13050000'),
(34, '2022', '1950000', '13050000'),
(35, '2022', '1950000', '13050000'),
(36, '2022', '1950000', '13050000'),
(37, '2022', '1950000', '13050000'),
(38, '2022', '1950000', '13050000'),
(39, '2022', '1950000', '13050000'),
(40, '2022', '1950000', '13050000'),
(41, '2022', '1950000', '13050000'),
(42, '2022', '1950000', '13050000'),
(43, '2022', '1950000', '13050000'),
(44, '2022', '1950000', '13050000'),
(45, '2022', '1950000', '13050000'),
(46, '2022', '1950000', '13050000'),
(47, '2022', '1950000', '13050000'),
(48, '2022', '1950000', '13050000'),
(49, '2022', '1950000', '13050000'),
(50, '2022', '1950000', '13050000'),
(51, '2022', '1950000', '13050000'),
(52, '2022', '1950000', '13050000'),
(53, '2022', '1950000', '13050000'),
(54, '2022', '1950000', '13050000'),
(55, '2022', '1950000', '13050000'),
(56, '2022', '1950000', '13050000'),
(57, '2022', '1950000', '13050000'),
(58, '2022', '1950000', '13050000'),
(59, '2022', '1950000', '13050000'),
(60, '2022', '1950000', '13050000'),
(61, '2022', '1950000', '13050000'),
(62, '2022', '1950000', '13050000'),
(63, '2022', '1950000', '13050000'),
(64, '2022', '1950000', '13050000'),
(65, '2022', '1950000', '13050000'),
(66, '2022', '1950000', '13050000'),
(67, '2022', '1950000', '13050000'),
(68, '2022', '1950000', '13050000'),
(69, '2022', '1950000', '13050000'),
(70, '2022', '1950000', '13050000'),
(71, '2022', '1950000', '13050000'),
(72, '2022', '1950000', '13050000'),
(73, '2022', '1950000', '13050000'),
(74, '2022', '1950000', '13050000'),
(75, '2022', '1950000', '13050000'),
(76, '2022', '1950000', '13050000'),
(77, '2022', '1950000', '13050000'),
(78, '2022', '1950000', '13050000'),
(79, '2022', '1950000', '13050000'),
(80, '2022', '1950000', '13050000'),
(81, '2022', '1950000', '13050000'),
(82, '2022', '1950000', '13050000'),
(83, '2022', '1950000', '13050000'),
(84, '2022', '1950000', '13050000'),
(85, '2022', '1950000', '13050000'),
(86, '2022', '1950000', '13050000'),
(87, '2022', '1950000', '13050000'),
(88, '2022', '1950000', '13050000'),
(89, '2022', '1950000', '13050000'),
(90, '2022', '1950000', '13050000'),
(91, '2022', '1950000', '13050000'),
(92, '2022', '1950000', '13050000'),
(93, '2022', '1950000', '13050000'),
(94, '2022', '1950000', '13050000'),
(95, '2022', '1950000', '13050000'),
(96, '2022', '1950000', '13050000'),
(97, '2022', '1950000', '13050000'),
(98, '2022', '1950000', '13050000'),
(99, '2022', '1950000', '13050000'),
(100, '2022', '1950000', '13050000'),
(101, '2022', '1950000', '13050000'),
(102, '2022', '1950000', '13050000'),
(103, '2022', '1950000', '13050000'),
(104, '2022', '1950000', '13050000'),
(105, '2022', '1950000', '13050000'),
(106, '2022', '1950000', '13050000'),
(107, '2022', '1950000', '13050000'),
(108, '2022', '1950000', '13050000'),
(109, '2022', '1950000', '13050000'),
(110, '2022', '1950000', '13050000'),
(111, '2022', '1950000', '13050000'),
(112, '2022', '1950000', '13050000'),
(113, '2022', '1950000', '13050000'),
(114, '2022', '1950000', '13050000'),
(115, '2022', '1950000', '13050000'),
(116, '2022', '1950000', '13050000'),
(117, '2022', '1950000', '13050000'),
(118, '2022', '1950000', '13050000'),
(119, '2022', '1950000', '13050000'),
(120, '2022', '1950000', '13050000'),
(121, '2022', '1950000', '13050000'),
(122, '2022', '13225000', '9986775000'),
(123, '2022', '13225000', '9986775000'),
(124, '2022', '0', '5000000000'),
(125, '2022', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'dosen', '2022-12-09 16:09:37'),
(2, 1, 'admin', '2022-12-09 16:09:37'),
(3, 2, 'dosen', '2022-12-09 16:09:37'),
(4, 3, 'dosen', '2022-12-09 16:09:37'),
(5, 3, 'direktur', '2022-12-09 16:09:37'),
(6, 4, 'dosen', '2022-12-09 16:09:37'),
(7, 4, 'kepalapppm', '2022-12-09 16:09:37'),
(8, 5, 'dosen', '2022-12-09 16:09:37'),
(9, 5, 'bau', '2022-12-09 16:09:37'),
(10, 6, 'dosen', '2022-12-09 16:09:37'),
(12, 7, 'dosen', '2022-12-09 16:09:38'),
(13, 8, 'dosen', '2022-12-09 16:09:38'),
(14, 9, 'dosen', '2022-12-09 16:09:38'),
(15, 10, 'dosen', '2022-12-09 16:09:38'),
(16, 11, 'dosen', '2022-12-09 16:09:38'),
(17, 12, 'dosen', '2022-12-09 16:09:38'),
(18, 13, 'dosen', '2022-12-09 16:09:38'),
(19, 14, 'dosen', '2022-12-09 16:09:39'),
(20, 15, 'dosen', '2022-12-09 16:09:39'),
(21, 16, 'dosen', '2022-12-09 16:09:39'),
(22, 17, 'dosen', '2022-12-09 16:09:39'),
(23, 18, 'dosen', '2022-12-09 16:09:39'),
(24, 19, 'dosen', '2022-12-09 16:09:39'),
(25, 20, 'dosen', '2022-12-09 16:09:40'),
(26, 21, 'dosen', '2022-12-09 16:09:40'),
(27, 22, 'dosen', '2022-12-09 16:09:40'),
(28, 23, 'dosen', '2022-12-09 16:09:40'),
(29, 24, 'dosen', '2022-12-09 16:09:40'),
(30, 25, 'dosen', '2022-12-09 16:09:41'),
(31, 26, 'dosen', '2022-12-09 16:09:41'),
(32, 27, 'dosen', '2022-12-09 16:09:41'),
(33, 28, 'dosen', '2022-12-09 16:09:41'),
(34, 29, 'dosen', '2022-12-09 16:09:41'),
(35, 30, 'dosen', '2022-12-09 16:09:41'),
(36, 31, 'dosen', '2022-12-09 16:09:42'),
(37, 32, 'dosen', '2022-12-09 16:09:42'),
(38, 33, 'dosen', '2022-12-09 16:09:42'),
(39, 34, 'dosen', '2022-12-09 16:09:42'),
(40, 35, 'dosen', '2022-12-09 16:09:42'),
(41, 36, 'dosen', '2022-12-09 16:09:42'),
(42, 37, 'dosen', '2022-12-09 16:09:43'),
(43, 38, 'dosen', '2022-12-09 16:09:43'),
(44, 39, 'dosen', '2022-12-09 16:09:43'),
(45, 40, 'dosen', '2022-12-09 16:09:43'),
(46, 41, 'dosen', '2022-12-09 16:09:43'),
(47, 42, 'dosen', '2022-12-09 16:09:43'),
(48, 43, 'dosen', '2022-12-09 16:09:44'),
(49, 44, 'dosen', '2022-12-09 16:09:44'),
(50, 45, 'dosen', '2022-12-09 16:09:44'),
(51, 46, 'dosen', '2022-12-09 16:09:44'),
(52, 47, 'dosen', '2022-12-09 16:09:44'),
(53, 48, 'dosen', '2022-12-09 16:09:45'),
(54, 49, 'dosen', '2022-12-09 16:09:45'),
(55, 50, 'dosen', '2022-12-09 16:09:45'),
(56, 51, 'dosen', '2022-12-09 16:09:45'),
(57, 52, 'dosen', '2022-12-09 16:09:45'),
(58, 53, 'dosen', '2022-12-09 16:09:45'),
(59, 54, 'dosen', '2022-12-09 16:09:46'),
(60, 55, 'dosen', '2022-12-09 16:09:46'),
(61, 56, 'dosen', '2022-12-09 16:09:46'),
(62, 57, 'dosen', '2022-12-09 16:09:46'),
(63, 58, 'dosen', '2022-12-09 16:09:46'),
(64, 59, 'dosen', '2022-12-09 16:09:46'),
(65, 60, 'dosen', '2022-12-09 16:09:46'),
(66, 61, 'dosen', '2022-12-09 16:09:47'),
(67, 62, 'dosen', '2022-12-09 16:09:47'),
(68, 63, 'dosen', '2022-12-09 16:09:47'),
(69, 64, 'dosen', '2022-12-09 16:09:47'),
(70, 65, 'dosen', '2022-12-09 16:09:47'),
(71, 66, 'dosen', '2022-12-09 16:09:48'),
(72, 67, 'dosen', '2022-12-09 16:09:48'),
(73, 68, 'dosen', '2022-12-09 16:09:48'),
(74, 69, 'dosen', '2022-12-09 16:09:48'),
(75, 70, 'dosen', '2022-12-09 16:09:48'),
(76, 71, 'dosen', '2022-12-09 16:09:48'),
(77, 72, 'dosen', '2022-12-09 16:09:49'),
(78, 73, 'dosen', '2022-12-09 16:09:49'),
(79, 74, 'dosen', '2022-12-09 16:09:49'),
(80, 75, 'dosen', '2022-12-09 16:09:49'),
(81, 2, 'reviewer', '0000-00-00 00:00:00'),
(82, 6, 'reviewer', '0000-00-00 00:00:00'),
(83, 11, 'reviewer', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'admin@stis.ac.id', '$2y$10$m3cwkzZQ6e8Fk4j0eK2NQuQ3sNSGc/opXmhy.bqgK3zzRQABx77MW', NULL, NULL, 0, '2022-12-12 06:34:04', '2022-12-09 16:09:36', '2022-12-12 06:34:04'),
(2, 2, 'email_password', NULL, 'dosen@stis.ac.id', '$2y$10$/EILqP3xHgQKYE4OcBsvGuYlPTP66q.UMWwskQZPc0ERS6SaMxq9m', NULL, NULL, 0, '2022-12-12 06:46:16', '2022-12-09 16:09:37', '2022-12-12 06:46:16'),
(3, 3, 'email_password', NULL, 'direktur@stis.ac.id', '$2y$10$/DkOIidACwOyxCPGqQAssu31HPENCio950vRQUyiiq9v4bPy6q7nC', NULL, NULL, 0, NULL, '2022-12-09 16:09:37', '2022-12-09 16:09:37'),
(4, 4, 'email_password', NULL, 'kepalapppm@stis.ac.id', '$2y$10$At5RCwAKfDDXRG9Q.N31iOgLyyy/jNi1JinqAybepy1hnbwzpVyxS', NULL, NULL, 0, '2022-12-11 23:10:54', '2022-12-09 16:09:37', '2022-12-11 23:10:54'),
(5, 5, 'email_password', NULL, 'bau@stis.ac.id', '$2y$10$soYpGAq1IWVA/afGGm.MA./f53jF/sho5LiBIHAnFfzhJi3umxbjC', NULL, NULL, 0, '2022-12-11 22:03:26', '2022-12-09 16:09:37', '2022-12-11 22:03:26'),
(6, 6, 'email_password', NULL, 'reviewer@stis.ac.id', '$2y$10$4ne/Ow4vL1u1y8/gh6LEaeO3IyZwBZnG2ZfF7sj2lWvJArjVJzu2i', NULL, NULL, 0, '2022-12-09 21:07:35', '2022-12-09 16:09:37', '2022-12-09 21:07:35'),
(7, 7, 'email_password', NULL, '222011494@stis.ac.id', '$2y$10$RE8Mc4qAZBGPosWHG3/wR.OjbLngGwhW8GfPpyKI66j33JMKsfRc2', NULL, NULL, 0, '2022-12-09 17:25:05', '2022-12-09 16:09:37', '2022-12-09 17:25:05'),
(8, 8, 'email_password', NULL, '222011596@stis.ac.id', '$2y$10$dCghUFxQYBIFd18L5RqJNOaFljrRm8vjJUXrjQ5jGMQxk5jGinwLq', NULL, NULL, 0, '2022-12-09 16:15:09', '2022-12-09 16:09:38', '2022-12-09 16:15:09'),
(9, 9, 'email_password', NULL, '222011361@stis.ac.id', '$2y$10$EYkKFU6eaxr6.aBaeyJoQugvBbBPWdNRvVHI01SSyKftX2m9ydKRW', NULL, NULL, 0, '2022-12-10 01:57:31', '2022-12-09 16:09:38', '2022-12-10 01:57:31'),
(10, 10, 'email_password', NULL, '222011537@stis.ac.id', '$2y$10$G8W8DJa0bmoM.9X5/av3uuEpNz7mXaYjcC/UfLOwpJv00NxjQ9/gu', NULL, NULL, 0, '2022-12-09 17:26:13', '2022-12-09 16:09:38', '2022-12-09 17:26:13'),
(11, 11, 'email_password', NULL, '222011295@stis.ac.id', '$2y$10$nNwuNqr5iS2ANFbmgMrrbODpFRqkPV7L9n1Ew.Ivgv62R7Z851Naa', NULL, NULL, 0, '2022-12-10 20:32:42', '2022-12-09 16:09:38', '2022-12-10 20:32:42'),
(12, 12, 'email_password', NULL, '222011453@stis.ac.id', '$2y$10$CQ5qHiEEhd0EyNT4dQSJ4O4SVAh.FN.JYvBorxldbazyb7TIPPjIy', NULL, NULL, 0, '2022-12-09 19:42:02', '2022-12-09 16:09:38', '2022-12-09 19:42:02'),
(13, 13, 'email_password', NULL, 'praze@stis.ac.id', '$2y$10$fVYIU9AvreZXx2hhcVwYJ.zK/wGGQjxISi8CLvgJv2sZdWsZEu4OW', NULL, NULL, 0, NULL, '2022-12-09 16:09:38', '2022-12-09 16:09:38'),
(14, 14, 'email_password', NULL, 'agung@stis.ac.id', '$2y$10$eX3IUMEXxtDiDxRl2lqJBuP.wDup1FYAxvsi.5TJC34nj1srMex2C', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39'),
(15, 15, 'email_password', NULL, 'opan_97@stis.ac.id', '$2y$10$GgABiQ/t4lTlCyXXUUaY2eH.zIMAg0xP.bkX3UsIdPCSrrgnMni2y', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39'),
(16, 16, 'email_password', NULL, 'aisyah.fy@stis.ac.id', '$2y$10$NxJwQkFDX4fatGSriklYIuQLn/MmU7U0u01YehNC4594iHc13iiRa', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39'),
(17, 17, 'email_password', NULL, 'efridiah@bps.go.id', '$2y$10$jVYnUaLXC2no4iVh/VYR/.WqC99ArQN8AnCWQpE7ADtVnM10yrwjm', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39'),
(18, 18, 'email_password', NULL, 'lia@stis.ac.id', '$2y$10$aPqGyqZ3fnLzRpso.iRtguq0tZew6u9QmMF.7aa3IIwKBCPdhbq7.', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39'),
(19, 19, 'email_password', NULL, 'nasrudin@stis.ac.id', '$2y$10$dW8uIzWxLu5Z5tH6DBbuk.SYQQDUC8bdDJVl1PZfJsQKjNvATM0W.', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39'),
(20, 20, 'email_password', NULL, 'retna@stis.ac.id', '$2y$10$yWqvCnnusx3z6.3ucTMAM.5Z1Bk7YXN48pGh.uqEveTNfB6ac7kuG', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40'),
(21, 21, 'email_password', NULL, 'sarni@stis.ac.id', '$2y$10$6aUeC4cqDKli0gkYUJciJOrX2ilZNLkIXbHg4QMMfG2knPj6Zp/6G', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40'),
(22, 22, 'email_password', NULL, 'sitim@stis.ac.id', '$2y$10$epHTg5ZIhdC2lnJ2HwuXSeMDhdw7OUvr0.2lJNFZuJ41OD75fI5fC', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40'),
(23, 23, 'email_password', NULL, 'sukim@stis.ac.id', '$2y$10$lRaYplc9OfYZJD9ZxTEyO.gBnf1.a8Hog.ItSW1XybKaSc/fP0gHm', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40'),
(24, 24, 'email_password', NULL, 'winih@stis.ac.id', '$2y$10$/Kdo54C/UxeVg0wYRTs0ru8UEBa3I2aCBUHRDK1FWoYPk.soK22R.', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40'),
(25, 25, 'email_password', NULL, 'setiadi@stis.ac.id', '$2y$10$jAs6Y8f.m0Mth1QUyqfNouVIH/9B1.TcFJGTveNjJG/Ao.27PhIrG', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:41'),
(26, 26, 'email_password', NULL, 'madsyair@stis.ac.id', '$2y$10$4GdrmwSj46aXkjGnociM2O10YogbHtxSbwEZV5uPAXwJZ339CyWzm', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41'),
(27, 27, 'email_password', NULL, 'ariewahyu@stis.ac.id', '$2y$10$wa6/1734ZgULxOnM5REnjOPaOSv6U7HELAf/lnK/LZ7oda5iTwsCu', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41'),
(28, 28, 'email_password', NULL, 'bonyp@stis.ac.id', '$2y$10$SNq/qgXdSejCZCXb9Z.X8uAvzbKnrsl/sXi6otxYfptEW2lvYPQRO', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41'),
(29, 29, 'email_password', NULL, 'byuniarto@stis.ac.id', '$2y$10$boZpZRO2vGCLYHf5hjle7.wEUvQRK3Gh2UKBRAhAzrhxgwfeS/3Hy', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41'),
(30, 30, 'email_password', NULL, 'erna.nurmawati@stis.ac.id', '$2y$10$uduRFzDkLGs50y1DPgLe..5.7Py93MrSad1Lm5bZI1kFEh4rQ3q9C', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41'),
(31, 31, 'email_password', NULL, 'faridr@stis.ac.id', '$2y$10$RXx/hmiHXqo8InDeFYRWGeD38.2NlLGJp4MhMJsBTDr5JvM27fhwy', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:42'),
(32, 32, 'email_password', NULL, 'firdaus@stis.ac.id', '$2y$10$EeBgShvE0hNTM0O3eQ7Zb.SJqvEu4ADJaoeVr3Slf3ac9QOACqmVG', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42'),
(33, 33, 'email_password', NULL, 'ibnu@stis.ac.id', '$2y$10$LkopeqpRIiDS/vvFlRZqw.AIKRz/WVseSyeskkg4yZRwH.M053fU6', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42'),
(34, 34, 'email_password', NULL, 'lutfirm@stis.ac.id', '$2y$10$UU/.39f0jJLfNP.PMLISVO0UubXS7HTMBjuM4y9ekqTk0I/CezDoW', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42'),
(35, 35, 'email_password', NULL, 'lya@stis.ac.id', '$2y$10$rkgxgBeEZHT3tWp5.wefN.r/GT01f4ItwynsB.64KfiUOCFx05o3a', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42'),
(36, 36, 'email_password', NULL, 'wilantika@stis.ac.id', '$2y$10$fsV1UdY.JzIsCm466t/aD.rrjqjTLKu1zUpbqggSXbk.zOdNUefwq', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42'),
(37, 37, 'email_password', NULL, 'raninoor@stis.ac.id', '$2y$10$mv9KVSzXiywjiwiywwOrgeU/zq0HRFUMfaUjdAnUfKwyeh936qGQi', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43'),
(38, 38, 'email_password', NULL, 'yordani@stis.ac.id', '$2y$10$GW8/xek9ctPnviZv0VwDsOw74J1ekqSxgdTpe7yK72iw03C3OKrPa', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43'),
(39, 39, 'email_password', NULL, 'rindang@stis.ac.id', '$2y$10$q4d6cZYH05RSBMW60uW2hOyz/aFIMFdSPzquqmZHIiIaUrW1EKZkK', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43'),
(40, 40, 'email_password', NULL, 'robertk@stis.ac.id', '$2y$10$yvlVmIqh3CAEUhXvYfMfPOqaJjJoWwmlLyPdoPOjdJ9TLXPS5.vTS', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43'),
(41, 41, 'email_password', NULL, 'setia.pramana@stis.ac.id', '$2y$10$qj6J60nAkYzuarl9rPAOT.sAyX4kVEPkr4PbZFbEthf0LcYstxDJO', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43'),
(42, 42, 'email_password', NULL, 'sitimariyah@stis.ac.id', '$2y$10$z.9XlZRqWLoz.aCAr2fF0OCYwT3xEpDpiYohao3ddK1B5F7rMJUnG', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43'),
(43, 43, 'email_password', NULL, 'waris@stis.ac.id', '$2y$10$/oORgMIOCMCYvlpyFVTaPOvmBeVNcsRDITYEcNhJuhhHCQQcAQrRm', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44'),
(44, 44, 'email_password', NULL, 'anang@stis.ac.id', '$2y$10$mqvk6Ttp3EuDjHckXgjo0.a2xMbOq6CwbD5twnXNB/37GXlkgqxHG', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44'),
(45, 45, 'email_password', NULL, 'ak.monika@stis.ac.id', '$2y$10$Dfn7UCV0820Vj4vR/pJGaOAXczAjPyVtV/Jnn1NZL9blMsnulD23a', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44'),
(46, 46, 'email_password', NULL, 'atik@stis.ac.id', '$2y$10$i3bwav7t4TAJ9pfEatKTMeTLoNr.FxLQSARVqkTyb924vM74GYFwK', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44'),
(47, 47, 'email_password', NULL, 'azka@stis.ac.id', '$2y$10$On.IaAAmnyJvnnuP6.S5C.L0eK.CBrke7F/JrG65ormUeRtbWWxTC', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44'),
(48, 48, 'email_password', NULL, 'budiasih@stis.ac.id', '$2y$10$heudXOsAh/9XCBnHf5yvCe0Z9QGStgGlTXkSfHqA7sTVZ93T8EoVy', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:45'),
(49, 49, 'email_password', NULL, 'budy@stis.ac.id', '$2y$10$UWk6iyDJMhrRvZ5MgU5GkuuuoyFXopVgOYTU4A.ovcHFiucCy1h26', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45'),
(50, 50, 'email_password', NULL, 'cucu@stis.ac.id', '$2y$10$I2q7QgRc79b1Z/ypq2jfuOQ02bMg5ORvxNz7ok8Ep6HbV/X62yYj6', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45'),
(51, 51, 'email_password', NULL, 'e_ria_s@yahoo.co.id', '$2y$10$V8EX.LlDpfUIV751UKAV8uFlrDU1FBN//3s7LBhmXPamqUvl1RuOm', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45'),
(52, 52, 'email_password', NULL, 'erna@stis.ac.id', '$2y$10$zWywly1ufE8eRD33E6wSDuVbk2m153odi03xoJ5SDeMSCli1dTx32', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45'),
(53, 53, 'email_password', NULL, 'erni@stis.ac.id', '$2y$10$fj8wIm9bZtirKwvX4VwzbeIy3vY3fpqGtjRbvB4eQLpjc2Cws8Hlq', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45'),
(54, 54, 'email_password', NULL, 'febri@stis.ac.id', '$2y$10$q7a9Cm3BOVVCIDpm900Kpueyg2i1OZTioQx5L1YdJRZ57Ni6M8BXK', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:46'),
(55, 55, 'email_password', NULL, 'fkartiasih@stis.ac.id', '$2y$10$2P4WKJFgWlSjIGwPtKIJiO2I4GyDQ0fQ9u95BF.LOdq1tanutSK3y', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46'),
(56, 56, 'email_password', NULL, 'hardius@stis.ac.id', '$2y$10$3gW8Q5L6Ze/j.ueYN1YlyeCbLUJ2ehlinjdUQwDWfh.sPX6krQhqO', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46'),
(57, 57, 'email_password', NULL, 'arcana@stis.ac.id', '$2y$10$FFD43y3ldObMDyK2BdCc4Oc8E2kaJW7QLXS2xDcb0H6d83fI0ktRa', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46'),
(58, 58, 'email_password', NULL, 'jeffry@stis.ac.id', '$2y$10$X2RnP59JvfIHLQdlu6sJiecpZ2kmJGYKOw6KYRFQOdyczKgo/7W9W', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46'),
(59, 59, 'email_password', NULL, 'krismanti@stis.ac.id', '$2y$10$CWuqjz5unJEzdU.NmrN3Pew14q96jT64gMOSAiKTPevFvSVIcS8G.', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46'),
(60, 60, 'email_password', NULL, 'lizakurnia@stis.ac.id', '$2y$10$WB03j3ta3.TxbjlnvZXJ0O5YmWcLKNbQcOhcq57jygjCBa4ZnyVTq', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46'),
(61, 61, 'email_password', NULL, 'dokhi@stis.ac.id', '$2y$10$nkxazwqbYJxxNS9mSgNCnO3/FH69U6VAnicvunLKVtCcOPIWVjG/q', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47'),
(62, 62, 'email_password', NULL, 'neli@stis.ac.id', '$2y$10$0jUnpDfC11hMg/EPAVt0eeRL.q4E6ofPm4ln9rW2Wlo60Li941hJO', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47'),
(63, 63, 'email_password', NULL, 'nofita@stis.ac.id', '$2y$10$Zu5T4IMX2Ku2C.Roa62kFO7zDdwwqxsz1tWJbnDjHvlKxjKKCztiq', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47'),
(64, 64, 'email_password', NULL, 'nucke@stis.ac.id', '$2y$10$HSl.X3kj/yC1R2cBmh8jr.3hVD6qWyrbRal3IDDYQhaleBOG5Mw/S', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47'),
(65, 65, 'email_password', NULL, 'rinirahani@stis.ac.id', '$2y$10$4o5rxFv./gHAbgWscGO42.XGaex9hcR/ZEtoJm/N8YXPFQBxHtduy', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47'),
(66, 66, 'email_password', NULL, 'rita@stis.ac.id', '$2y$10$HuEWGWkYyGBmll7ASJ5LHe1CdLDYebzxsQRgLXk/6wTXcZ5zVUgS.', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:48'),
(67, 67, 'email_password', NULL, 'siskarossa@stis.ac.id', '$2y$10$CMm0HgQbI4SQzRWrFkr2..hy3U8nqTFiVpMx4c/cA8zON1zcfzPVG', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48'),
(68, 68, 'email_password', NULL, 'soegie@stis.ac.id', '$2y$10$X1bFe1A0YqLWefE2qNcHB.Oq1d7kAYpZU1fgazvTzdUiCJ079.6GG', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48'),
(69, 69, 'email_password', NULL, 'suryanto@stis.ac.id', '$2y$10$gxhnXe0Y2sCwXn06/OSaf.Ib0EbiXjCTC5FoE2gemKJohkF0m1lVi', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48'),
(70, 70, 'email_password', NULL, 'timbang@stis.ac.id', '$2y$10$FAJWwmnIl1eE7N1zamh.FeO.YTL0TSZLOgK0ywzvnNT9rFsrR9KYK', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48'),
(71, 71, 'email_password', NULL, 'theo@stis.ac.id', '$2y$10$KS8DNCSUlGKTGEASq5Pzq.IBEyz2LM4tnh4vFZWh1PWttVy5Z8LFe', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48'),
(72, 72, 'email_password', NULL, 'titik@stis.ac.id', '$2y$10$5SoKXOV26RLUVK1IVxko0uxwjx5WZrkC2y5yNchhFA00VF.pIM4mW', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:49'),
(73, 73, 'email_password', NULL, 'wahyudin@stis.ac.id', '$2y$10$SHrGipOOgcSOBWLQyCjcLe1U8wPGA2Vp7uwhWBZVAfEtvcrKmP7py', NULL, NULL, 0, NULL, '2022-12-09 16:09:49', '2022-12-09 16:09:49'),
(74, 74, 'email_password', NULL, 'anasofa@stis.ac.id', '$2y$10$E8iY69MqcjtBuhAPhHU02eaVhaenRMDTp.GkmP7CSBV4eyte7Z3BK', NULL, NULL, 0, NULL, '2022-12-09 16:09:49', '2022-12-09 16:09:49'),
(75, 75, 'email_password', NULL, 'yuliagnis@stis.ac.id', '$2y$10$LGzP7Ye7CxbWRYaDS6aX0e5U8vYo5/gLCRFv36psLDsVorczn8qqy', NULL, NULL, 0, NULL, '2022-12-09 16:09:49', '2022-12-09 16:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-05 07:55:31', 1),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-05 15:52:10', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 4, '2022-12-05 18:00:55', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 3, '2022-12-05 18:39:27', 1),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 3, '2022-12-05 18:41:09', 1),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 4, '2022-12-05 18:41:23', 1),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-06 13:41:30', 1),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011596@stis.ac.id', 7, '2022-12-06 13:43:03', 1),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', NULL, '2022-12-06 13:53:59', 0),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 12, '2022-12-06 13:56:41', 1),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 12, '2022-12-06 13:59:05', 1),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-07 03:26:52', 1),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011596@stis.ac.id', NULL, '2022-12-07 06:00:37', 0),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-07 07:10:41', 1),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-07 09:45:14', 1),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'Dosen@stis.ac.id', 1, '2022-12-08 15:03:02', 1),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-08 17:06:10', 1),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 4, '2022-12-08 17:23:53', 1),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 3, '2022-12-08 17:26:26', 1),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 4, '2022-12-08 17:40:53', 1),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 3, '2022-12-08 17:56:31', 1),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-08 23:32:21', 1),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', NULL, '2022-12-09 00:16:05', 0),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', NULL, '2022-12-09 00:16:17', 0),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-09 00:16:36', 1),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-09 00:21:43', 1),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-09 00:41:41', 1),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', NULL, '2022-12-09 12:38:20', 0),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', NULL, '2022-12-09 12:39:18', 0),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-09 12:40:06', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011596@stis.ac.id', 7, '2022-12-09 13:36:29', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 1, '2022-12-09 13:54:32', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011596@stis.ac.id', 8, '2022-12-09 16:15:09', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 5, '2022-12-09 17:23:55', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011494@stis.ac.id', 7, '2022-12-09 17:24:51', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011494@stis.ac.id', 7, '2022-12-09 17:25:05', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011361@stis.ac.id', 9, '2022-12-09 17:25:39', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011537@stis.ac.id', 10, '2022-12-09 17:26:13', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011295@stis.ac.id', 11, '2022-12-09 17:26:31', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', NULL, '2022-12-09 17:26:47', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', 12, '2022-12-09 17:26:54', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011295@stis.ac.id', 11, '2022-12-09 17:27:14', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', NULL, '2022-12-09 18:46:30', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', 12, '2022-12-09 18:46:40', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', NULL, '2022-12-09 19:41:02', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', NULL, '2022-12-09 19:41:12', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', NULL, '2022-12-09 19:41:25', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', NULL, '2022-12-09 19:41:51', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011453@stis.ac.id', 12, '2022-12-09 19:42:02', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-09 19:47:33', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'email_password', '222011295@stis.ac.id', 11, '2022-12-09 20:01:08', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-09 20:55:09', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', NULL, '2022-12-09 21:04:12', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', NULL, '2022-12-09 21:04:23', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', NULL, '2022-12-09 21:04:43', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', NULL, '2022-12-09 21:05:01', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', NULL, '2022-12-09 21:06:16', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-09 21:06:29', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', NULL, '2022-12-09 21:07:13', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'reviewer@stis.ac.id', 6, '2022-12-09 21:07:35', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 5, '2022-12-09 21:16:39', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', NULL, '2022-12-09 21:42:19', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-09 21:42:39', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'email_password', '222011295@stis.ac.id', 11, '2022-12-09 21:53:27', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-09 22:29:34', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-09 22:32:08', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'email_password', '222011295@stis.ac.id', 11, '2022-12-10 01:32:24', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 4, '2022-12-10 01:49:38', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', '222011361@stis.ac.id', 9, '2022-12-10 01:57:31', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', NULL, '2022-12-10 01:58:32', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 4, '2022-12-10 02:04:23', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Mobile Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 4, '2022-12-10 02:09:25', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-10 03:10:21', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-10 03:11:12', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'email_password', '222011295@stis.ac.id', 11, '2022-12-10 20:32:42', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'ariewahyu@stis.ac.id', NULL, '2022-12-11 09:39:29', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'ariewahyu@stis.ac.id', NULL, '2022-12-11 09:40:01', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'ariewahyu@stis.ac.id', NULL, '2022-12-11 09:40:49', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'ariewahyu@stis.ac.id', NULL, '2022-12-11 09:40:55', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', NULL, '2022-12-11 12:16:35', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-11 12:16:43', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-11 21:20:39', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', NULL, '2022-12-11 21:28:48', 0),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-11 21:28:59', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-11 21:29:44', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'bau@stis.ac.id', 5, '2022-12-11 22:03:26', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-11 22:07:26', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-11 23:10:27', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'kepalapppm@stis.ac.id', 4, '2022-12-11 23:10:54', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-11 23:12:52', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-11 23:26:35', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-11 23:27:31', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-11 23:56:33', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-12 05:51:53', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'admin@stis.ac.id', 1, '2022-12-12 06:34:04', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-12 06:34:21', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-12 06:42:13', 1),
(0, '10.100.244.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'dosen@stis.ac.id', 2, '2022-12-12 06:46:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dana_penelitian`
--

CREATE TABLE `dana_penelitian` (
  `id_dana` int(15) NOT NULL,
  `id_penelitian` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `dana_keluar` int(11) NOT NULL,
  `dana_tidak_terserap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dana_penelitian`
--

INSERT INTO `dana_penelitian` (`id_dana`, `id_penelitian`, `tanggal`, `dana_keluar`, `dana_tidak_terserap`) VALUES
(1, 6, '2022-12-05', 0, NULL),
(2, 6, '2022-12-08', 3000000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `dana_pkm`
--

CREATE TABLE `dana_pkm` (
  `id_dana` int(11) NOT NULL,
  `id_pkm` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `dana_keluar` int(11) NOT NULL,
  `dana_tidak_terserap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dana_pkm`
--

INSERT INTO `dana_pkm` (`id_dana`, `id_pkm`, `tanggal`, `dana_keluar`, `dana_tidak_terserap`) VALUES
(1, 9, '2003-07-02', 665000, NULL),
(2, 10, '1995-05-31', 397000, NULL),
(3, 11, '2015-04-13', 588000, NULL),
(4, 13, '2004-02-03', 845000, NULL),
(5, 15, '1973-03-11', 573000, NULL),
(6, 22, '1993-02-02', 802000, NULL),
(7, 25, '1976-09-14', 739000, NULL),
(8, 28, '1999-10-12', 397000, NULL),
(9, 29, '1979-06-01', 479000, NULL),
(10, 30, '1997-03-10', 812000, NULL),
(11, 32, '1972-05-01', 668000, NULL),
(12, 34, '1994-07-18', 777000, NULL),
(13, 47, '1985-03-26', 901000, NULL),
(14, 50, '2016-09-22', 696000, NULL),
(15, 1, '2022-12-09', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detailstatus_penelitian`
--

CREATE TABLE `detailstatus_penelitian` (
  `id_detail` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailstatus_penelitian`
--

INSERT INTO `detailstatus_penelitian` (`id_detail`, `status`, `deskripsi`) VALUES
(1, 'Diajukan', 'Diajukan oleh Dosen'),
(2, 'Disetujui', 'Disetujui oleh BAU'),
(3, 'Disetujui', 'Disetujui oleh Reviewer'),
(4, 'Disetujui', 'Disetujui oleh Kepala PPPM'),
(5, 'Disetujui', 'Disetujui oleh Direktur'),
(6, 'Kegiatan sedang berlangsung', 'Proses'),
(7, 'Ditolak', 'Ditolak oleh BAU'),
(8, 'Ditolak', 'Ditolak oleh Reviewer'),
(9, 'Ditolak', 'Ditolak oleh Kepala PPPM'),
(10, 'Ditolak', 'Kegiatan telah selesai dilaksanakan');

-- --------------------------------------------------------

--
-- Table structure for table `detailstatus_pkm`
--

CREATE TABLE `detailstatus_pkm` (
  `id_detail` int(11) NOT NULL,
  `status` text NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailstatus_pkm`
--

INSERT INTO `detailstatus_pkm` (`id_detail`, `status`, `Deskripsi`) VALUES
(1, 'Diajukan', 'Diajukan oleh Dosen'),
(2, 'Diajukan', 'Disetujui oleh BAU'),
(3, 'Diajukan', 'Disetujui Oleh Kepala PPPM'),
(4, 'Proses', 'Kegiatan sedang berlangsung'),
(5, 'Ditolak', 'Ditolak oleh BAU'),
(6, 'Ditolak', 'Ditolak oleh Kepala PPPM'),
(7, 'Selesai', 'Kegiatan telah selesai dilaksanakan');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP_dosen` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `NIDN_dosen` varchar(20) NOT NULL,
  `jabatan_dosen` varchar(30) NOT NULL,
  `program_studi` varchar(30) NOT NULL,
  `golongan` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email_dosen` varchar(50) NOT NULL,
  `foto_dosen` varchar(15) NOT NULL,
  `minat_penelitian` text,
  `google_scholar` text,
  `link_sinta` text,
  `link_orcid` text,
  `link_wos` text,
  `link_scopus` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP_dosen`, `username`, `nama_dosen`, `NIDN_dosen`, `jabatan_dosen`, `program_studi`, `golongan`, `no_hp`, `email_dosen`, `foto_dosen`, `minat_penelitian`, `google_scholar`, `link_sinta`, `link_orcid`, `link_wos`, `link_scopus`) VALUES
('195806081986031005', '', 'Ir. Suryanto Aloysius, M.M.', '3308065801', 'Lektor Kepala', 'ST', 'IV/c ', '08161439159', 'suryanto@stis.ac.id', '', '', '', '', '', '', ''),
('196008221985011001', '', 'Ir. Agus Purwoto, M.Si.', '3322086001', 'Lektor Kepala', 'D3', 'IV/c ', '', 'opan_97@stis.ac.id', '', '', '', '', '', '', ''),
('196102191983122001', '', 'Dr. Budiasih, S.E., M.E.', '3319026101', 'Lektor Kepala', 'ST', 'IV/b ', '08129323183', 'budiasih@stis.ac.id', '', '', '', '', '', '', ''),
('196207221985012001', '', 'Ir. Ekaria, M.Si.', '3322076201', 'Lektor Kepala', 'ST', 'IV/a ', '085215955605', 'e_ria_s@yahoo.co.id', '', '', '', '', '', '', ''),
('196302081985011001', '', 'Dr. Drs. Waris Marsiswo, M.Stat.', '3308026301', 'Lektor', 'KS', 'IV/a ', '082111734068', 'waris@stis.ac.id', '', 'Analisis Spasial,Manajemen survei,Manajemen SDM,Analisis Sosial dan Ekonomi,Pengembangan Sistem Informasi,Pemanfaatan Citra Satelit', '', '', '', '', ''),
('196503141988021001', '', 'Ir. Jeffry Raja Hamonangan Sitorus, M.Si', '3312068102', 'Lektor', 'ST', 'IV/a ', '081513121025', 'jeffry@stis.ac.id', '', '', '', '', '', '', ''),
('196607191991011001', '', 'Yaya Setiadi, S.S.T., M.M.', '3319076601', 'Lektor', 'D3', 'III/c', '081210187943', 'setiadi@stis.ac.id', '', 'Penelitian Pendidikan,Sosial,Manajemen', '', '', '', '', ''),
('196703171989012001', '', 'Dr. Titik Harsanti, M.Si.', '3317036701', 'Lektor', 'ST', 'IV/a ', '085885135518', 'titik@stis.ac.id', '', '', '', '', '', '', ''),
('196704251989011002', '', 'Dr. Hardius Usman, M.Si', '3325046701', 'Lektor Kepala', 'ST', 'IV/b ', '', 'hardius@stis.ac.id', '', '', '', '', '', '', ''),
('196706121991011001', '', 'Mohammad Dokhi, Ph. D.', '3312066701', 'Lektor', 'ST', 'III/d', '081330309440', 'dokhi@stis.ac.id', '', '', '', '', '', '', ''),
('196710221990032002', '', 'Dr. Erni Triastuti, M.Math.', '3322106701', 'Lektor Kepala', 'ST', 'IV/a ', '08159407324', 'erni@stis.ac.id', '', 'Pengembangan Aplikasi Statistik,Sistem Informasi PAK Dosen', '', '', '', '', ''),
('196805031991011001', '', 'Dr. I Made Arcana, S.Si, M.Sc', '3303056801', 'Lektor', 'ST', 'III/c', '082138235109', 'dosen@stis.ac.id', '', '', 'lili', '', '', '', 'scopusNew'),
('197001121991122001', '', 'Dr. Tiodora Hadumaon Siagian, M. Pop. Hum. Res.', '3312017001', 'Lektor', 'ST', 'IV/a ', '081585464795', 'theo@stis.ac.id', '', 'Social Official Statistics,Demography,Environment,Ageing,Composite Index,Vulnerability & Resilience,Disaster Risk Reduction,Poverty and Inequality,Agent-Based Modelling', '', '', '', '', ''),
('197001251998032001', '', 'Retnaningsih, S.Si., M.E.', '3325017001', 'Lektor', 'D3', 'III/d', '081317700686', 'retna@stis.ac.id', '', 'Matematika', '', '', '', '', ''),
('197002191992112001', '', 'Dr. Siti Muchlisoh, S.S.T., M.Si.', '3319027001', 'Lektor', 'D3', 'IV/a ', '08128300234', 'sitim@stis.ac.id', '', 'Sampling Survei,Pemodelan Statistik,Small Area Estimation', '', '', '', '', ''),
('197006161988121001', '', 'Yunarso Anang Sulistiadi, M.Eng., Ph.D.', '3316067001', 'Lektor', 'KS', 'III/d', '', 'anang@stis.ac.id', '', 'Software Engineering,Software Quality dan Standarnya,Quality Function Deployment (QFD) dan Penerapannya,Pertimbangan Kualitas pada Program Komputasi,Office Automation,Smart Office,Kajian Bring Your Own Device (BYOD)', '', '', '', '', ''),
('197007251998032003', '', 'Dr. Rita Yuliana, S.Si, M.S.E', '3325077001', 'Lektor', 'ST', 'IV/a ', '081363428275', 'rita@stis.ac.id', '', '', '', '', '', '', ''),
('197204241994031003', '', 'Sukim, S.S.T., M.Si.', '3324047201', 'Lektor', 'D3', 'IV/a ', '08128874783', 'sukim@stis.ac.id', '', 'Fuzzy Clustering,Komputasi Statistik,Official Statistics,Demografi,Statistik Sosial,Sosial Demografi,Lingkungan Hidup,Disaster,Clustering', '', '', '', '', ''),
('197205261991121001', '', 'Firdaus, MBA', '3326057201', 'Lektor', 'KS', 'III/d', '085778382820', 'firdaus@stis.ac.id', '', 'Pengembangan sistem,Sistem Informasi', '', '', '', '', ''),
('197211171995121001', '', 'Achmad Prasetyo, S.Si., M.M.', '3317117201', 'Lektor Kepala', 'D3', 'IV/a ', '085692909817', 'praze@stis.ac.id', '', 'Methodology Servey and Social Research', '', '', '', '', ''),
('197305281995121001', '', 'Agung Priyo Utomo, S.Si., M.T.', '3328057301', 'Lektor Kepala', 'D3', 'IV/a ', '08161123675', 'agung@stis.ac.id', '', 'Analisis Data Kategorik,Permodelan Statistika,Analisis Data Spasial', '', '', '', '', ''),
('197307141996121001', '', 'Wahyudin, S.Si, MAP, MPP', '3314077301', 'Lektor', 'ST', 'IV/a ', '08521049606', 'wahyudin@stis.ac.id', '', '', '', '', '', '', ''),
('197310231995122001', '', 'Dr. Ernawati Pasaribu', '3323107301', 'Lektor', 'ST', 'IV/a ', '08161399240', 'erna@stis.ac.id', '', 'Spatial analysis (Spatial,Econometrics, Geographically Weighted Regression, Spatial Temporal),Time Series Analysis (Threshold Auto Regressive, Forecasting, ARIMA with Intervention),Econometrics (Analysis of Panel Data, Panel Cointegration, Simultaneous Panel Data),Official Statistics (Sustainable Regional Development, Unemployment, Poverty and Inequality, Public Health, Education),Regional Planning', '', '', '', '', ''),
('197312272000031002', '', 'Dr. Timbang Sirait, S.Stat, M.Si.', '3327127301', 'Lektor', 'ST', 'IV/a ', '08179719667', 'timbang@stis.ac.id', '', '', '', '', '', '', ''),
('197412101996121001', '', 'Dr. Nasrudin, S.Si., M.E.', '3304127401', 'Lektor', 'D3', 'IV/a ', '081219420562', 'nasrudin@stis.ac.id', '', 'Time Series & Econometrics,Official Statistics for Economic,Macroeconomics,(KS) Big data untuk: Nowcasting & forecasting, dan official statistics', '', '', '', '', ''),
('197502041996122001', '', 'Anugerah Karta Monika, S.Si, ME', '3304027501', 'Lektor', 'ST', 'III/d', '0818138751', 'ak.monika@stis.ac.id', '', 'Econometric Modelling,Time Series Analysis,Input Output Analysis,Computable General Equilibrium', '', '', '', '', ''),
('197604141999122001', '', 'Dr. Sarni Maniar Berliana, S.S.T., M.Si.', '3314047601', 'Lektor', 'D3', 'IV/a ', '0818418469', 'sarni@stis.ac.id', '', '', '', '', '', '', ''),
('197605052000032003', '', 'Lia Yuliana, S.Si., M.T.', '3305057601', 'Lektor', 'D3', 'III/c', '08129691386', 'lia@stis.ac.id', '', 'Ekonomi,Statistika,Matematika,Perencanaan Wilayah', '', '', '', '', ''),
('197608092000032001', '', 'Neli Agustina, M.Si.', '3309087601', 'Lektor', 'ST', 'III/d', '08129644688', 'neli@stis.ac.id', '', 'Ekonomi', '', '', '', '', ''),
('197701042009022003', '', 'Liza Kurnia Sari, S.Si., M.Stat.', '3304017701', 'Asisten Ahli', 'ST', 'III/b', '081310734734', 'lizakurnia@stis.ac.id', '', '', '', '', '', '', ''),
('197707222000031002', '', 'Setia Pramana, S.Si., Ph.D.', '3322077701', 'Guru Besar', 'KS', 'IV/b ', '081297893257', 'setia.pramana@stis.ac.id', '', 'Machine Learning,Big Data Analytics,Bioinformatics,Computational Statistics,Official statistics,Artificial Intellegence', '', '', '', '', ''),
('197807222000121003', '', 'Sugiarto, SST, M.M', '3322077801', 'Lektor', 'ST', 'III/d', '08197654699', 'soegie@stis.ac.id', '', '', '', '', '', '', ''),
('197808022000122001', '', 'Atik Maratis Suhartini, S.E, M.Si', '3302087801', 'Lektor', 'ST', 'III/d', '085716750580', 'atik@stis.ac.id', '', '', '', '', '', '', ''),
('197907312000122001', '', 'Dr. Cucu Sumarni, SST., M.Si.', '', 'Penugasan Lektor', 'ST', 'IV/a ', '081573242676', 'cucu@stis.ac.id', '', 'Small area estimation(SAE),Statistical modelling,Robust estimation', '', '', '', '', ''),
('198001182011011001', '', 'Dr. Bony Parulian Josaphat, S.Si., M.Si.', '3318018001', 'Lektor', 'KS', 'III/d', '081293601787', 'bonyp@stis.ac.id', '', 'Matematika,Statistika,Optimasi', '', '', '', '', ''),
('198002102002121001', '', 'Dr. Rindang Bangun Prasetyo, S.S.T., M.Si.', '9933010644', 'Penugasan Lektor', 'KS', 'IV/a ', '082233999801', 'rindang@stis.ac.id', '', 'Analisis Spasial,Pemrograman (Sistem Informasi),Sistem Informasi Geografis,Komputasi Statistik,Ekonometrika,Small Area Estimation', '', '', '', '', ''),
('198004012003122003', '', 'Dr. Fitri Kartiasih, S.ST, S.E, M.Si.', '3301048001', 'Lektor', 'ST', 'IV/a ', '085246011435', 'fkartiasih@stis.ac.id', '', '', '', '', '', '', ''),
('198006242003121004', '', 'Budi Yuniarto, S.S.T., M.Si', '3324068001', 'Lektor', 'KS', 'III/c', '081316655315', 'byuniarto@stis.ac.id', '', 'Sains data (Big data, machine learning, etc),Statistik,Spasial', '', '', '', '', ''),
('198007242002121002', '', 'Budyanra, S.ST, M.Stat', '3301097901', 'Lektor', 'ST', 'III/d', '085375564048', 'budy@stis.ac.id', '', '', '', '', '', '', ''),
('198007282003121004', '', 'Dr. Achmad Syahrul Choir, S.S.T., M.Si.', '9933010624', 'Penugasan Lektor', 'KS', 'IV/a ', '081217220615', 'madsyair@stis.ac.id', '', 'Analisis Bayesian,Neural Network,Teori Statistika,Imputasi Data', '', '', '', '', ''),
('198106042003121001', '', 'Robert Kurniawan, S.S.T., M.Si.', '3304068101', 'Lektor', 'KS', 'III/d', '085244174711', 'robertk@stis.ac.id', '', 'Disaster Management,Computational Statistics,Environmental,Fuzzy Clustering,Social Science', '', '', '', '', ''),
('198106122003122002', '', 'Nucke Widowati Kusumo Projo, S.Si, M.Sc, Ph.D.', '3312068101', 'Lektor', 'ST', 'III/d', '087898503251', 'nucke@stis.ac.id', '', 'Health Economics,Economics,Microeconomics,Data Science', '', '', '', '', ''),
('198109262004122001', '', 'Winih Budiarti, S.S.T., M.Stat.', '3326098101', 'Lektor', 'D3', 'III/d', '081314136759', 'winih@stis.ac.id', '', '', '', '', '', '', ''),
('198110142004122001', '', 'Krismanti Tri Wahyuni, SST, SE, M.Si', '3314108101', 'Lektor', 'ST', 'III/d', '085216465162', 'krismanti@stis.ac.id', '', '', '', '', '', '', ''),
('198202022003121004', '', 'Febri Wicaksono, M.Si', '3302028201', 'Lektor', 'ST', 'III/d', '081361117043', 'febri@stis.ac.id', '', '', '', '', '', '', ''),
('198202072004121001', '', 'Dr. Azka Ubaidillah', '3307028201', 'Lektor', 'ST', 'IV/a ', '08129820024', 'azka@stis.ac.id', '', 'Small Area Estimation,Computational Statistics,Statistics Modelling,Multivariate Analysis,Sampling Methodology', '', '', '', '', ''),
('198204212003121004', '', 'Ricky Yordani, S.S.T., M.Stat.', '3321048201', 'Lektor', 'KS', 'IV/a ', '', 'yordani@stis.ac.id', '', '', '', '', '', '', ''),
('198302182004122001', '', 'Efri Diah Utami, S.S.T., M. Stat.', '3318028301', 'Lektor', 'D3', 'III/c', '081341618261', 'efridiah@bps.go.id', '', '', '', '', '', '', ''),
('198306072007012009', '', 'Rani Nooraeni, S.S.T., M.Stat.', '3307068301', 'Lektor', 'KS', 'III/d', '', 'raninoor@stis.ac.id', '', 'Statistika,Ekonomi,Sosial,Data Mining,Spasial (Multidicipline Subject)', '', '', '', '', ''),
('198409182007012004', '', 'Erna Nurmawati, S.S.T., M.T.', '9933010630', 'Penugasan Asisten Ahli', 'KS', 'IV/a ', '', 'erna.nurmawati@stis.ac.id', '', 'Sistem Informasi,E-Government,Machine Learning,Data Science,Analisis Statistik', '', '', '', '', ''),
('198410152007012001', '', 'Siskarossa Ika Oktora, SST, M.Stat', '3315108401', 'Lektor', 'ST', 'III/d', '081355101520', 'siskarossa@stis.ac.id', '', '', '', '', '', '', ''),
('198506012007012003', '', 'Aisyah Fitri Yuniasih, S.S.T., S.E., M.Si.', '3301068501', 'Lektor', 'D3', 'III/d', '081379198540', 'aisyah.fy@stis.ac.id', '', 'Econometrics,Social Sciences,Statistics,Data Mining,Pembangunan Sistem Informasi Statistik', '', '', '', '', ''),
('198512122008011004', '', 'Farid Ridho, S.S.T., M.T.', '3312128501', 'Lektor', 'KS', 'III/d', '', 'faridr@stis.ac.id', '', 'Computer and Network Security,Information Security,Big Data Infrastructure,Machine Learning for Cyber Security,Data Visualization, UX and UI Design,Data Privacy and Social Media Analyisis', '', '', '', '', ''),
('198512222009021002', '', 'Dr. Eng. Arie Wahyu Wijayanto, S.S.T., M.T.', '', 'Penugasan Lektor', 'KS', 'III/d', '', 'ariewahyu@stis.ac.id', '', 'Big Data,Deep Learning,Data Mining,Remote Sensing', '', '', '', '', ''),
('198601202008011002', '', 'Ibnu Santoso, S.S.T., M.T.', '3320018601', 'Lektor', 'KS', 'III/d', '081341829968', 'ibnu@stis.ac.id', '', 'Data Mining,Information Systems', '', '', '', '', ''),
('198707112009121001', '', 'Yuliagnis Transver Wijaya, S.ST, M.Sc.', '9933010657', 'Penugasan Asisten Ahli', 'ST', 'III/d', '082238625789', 'yuliagnis@stis.ac.id', '', 'Topics in Official Statistics,Data and Decision Analytics,Big Data,Demography,Disaster Management,Social Statistics', '', '', '', '', ''),
('198804052010122001', '', 'Wahyuni Andriana Sofa, SST, MIDEC', '', 'Penugasan Asisten Ahli', 'ST', 'III/c', '081284703328', 'anasofa@stis.ac.id', '', '', '', '', '', '', ''),
('198804192013112001', '', 'Rini Rahani, SST, M.Stat.', '9933010645', 'Penugasan Asisten Ahli', 'ST', 'III/c', '', 'rinirahani@stis.ac.id', '', '', '', '', '', '', ''),
('198810242010122001', '', 'Siti Mariyah, S.S.T., M.T.', '3324108801', 'Lektor', 'KS', 'III/c', '', 'sitimariyah@stis.ac.id', '', 'Data mining,Text Mining,Machine Learning,Computational Social Science', '', '', '', '', ''),
('198811292012112001', '', 'Nofita Istiana, SST, M.Si.', '', 'Penugasan Asisten Ahli', 'ST', 'III/c', '085640756067', 'nofita@stis.ac.id', '', '', '', '', '', '', ''),
('198902072010122001', '', 'Dr. Eng. Lya Hulliyyatus Suadaa, S.S.T., M.T.', '3307028901', 'Lektor', 'KS', 'III/c', '081388990207', 'lya@stis.ac.id', '', 'Data-to-Text Generation,Text Classification,Information Extraction,Natural Language Processing,Data Mining,Pengembangan Sistem Informasi,Deep Learning,Linked Data,Knowledge Graph', '', '', '', '', ''),
('199001102012112001', '', 'Nori Wilantika, S.S.T., M.T.I.', '3310019001', 'Lektor', 'KS', 'III/c', '', 'wilantika@stis.ac.id', '', 'Technology Acceptance/Continuance,E-Participation / E-Services,ICT on on Small and Medium Enterprises (SMEs)', '', '', '', '', ''),
('199004052012112001', '', 'Lutfi Rahmatuti Maghfiroh, S.S.T., M.T.', '3305049001', 'Lektor', 'KS', 'III/c', '', 'lutfirm@stis.ac.id', '', 'Software engineering,Human Computer Interaction,Database Management,Agent Based Simulation', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `global_setting_ttd`
--

CREATE TABLE `global_setting_ttd` (
  `id` int(11) NOT NULL,
  `id_setting` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_setting_ttd`
--

INSERT INTO `global_setting_ttd` (`id`, `id_setting`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penelitian`
--

CREATE TABLE `laporan_penelitian` (
  `id_laporan` int(15) NOT NULL,
  `id_penelitian` int(15) NOT NULL,
  `kontrak` varchar(100) DEFAULT NULL,
  `laporan_luaran` varchar(100) DEFAULT NULL,
  `laporan_dana` varchar(100) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `form_usulan_publikasi` varchar(100) DEFAULT NULL,
  `status_penelitian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan_penelitian`
--

INSERT INTO `laporan_penelitian` (`id_laporan`, `id_penelitian`, `kontrak`, `laporan_luaran`, `laporan_dana`, `hasil`, `form_usulan_publikasi`, `status_penelitian`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1670144843, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1670144843, 1),
(3, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\Settings', 'default', 'App', 1670144843, 1),
(4, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1670144843, 1),
(5, '2022-11-14-023942', 'App\\Database\\Migrations\\Administrator', 'default', 'App', 1670144843, 1),
(6, '2022-11-14-024002', 'App\\Database\\Migrations\\AnggaranAwal', 'default', 'App', 1670144843, 1),
(7, '2022-11-14-024009', 'App\\Database\\Migrations\\AnggaranTotal', 'default', 'App', 1670144843, 1),
(8, '2022-11-14-024024', 'App\\Database\\Migrations\\DanaPenelitian', 'default', 'App', 1670144843, 1),
(9, '2022-11-14-024032', 'App\\Database\\Migrations\\DanaPkm', 'default', 'App', 1670144843, 1),
(10, '2022-11-14-024045', 'App\\Database\\Migrations\\DetailstatusPenelitian', 'default', 'App', 1670144843, 1),
(11, '2022-11-14-024056', 'App\\Database\\Migrations\\DetailstatusPkm', 'default', 'App', 1670144843, 1),
(12, '2022-11-14-024106', 'App\\Database\\Migrations\\Dosen', 'default', 'App', 1670144843, 1),
(13, '2022-11-14-024124', 'App\\Database\\Migrations\\LaporanPenelitian', 'default', 'App', 1670144843, 1),
(14, '2022-11-14-024136', 'App\\Database\\Migrations\\PengajuanPkm', 'default', 'App', 1670144843, 1),
(15, '2022-11-14-024154', 'App\\Database\\Migrations\\PermohonanReimburse', 'default', 'App', 1670144843, 1),
(16, '2022-11-14-024203', 'App\\Database\\Migrations\\Pkm', 'default', 'App', 1670144843, 1),
(17, '2022-11-14-024213', 'App\\Database\\Migrations\\StatusPenelitian', 'default', 'App', 1670144843, 1),
(18, '2022-11-14-024221', 'App\\Database\\Migrations\\StatusPkm', 'default', 'App', 1670144844, 1),
(19, '2022-11-14-024232', 'App\\Database\\Migrations\\TargetPenelitian', 'default', 'App', 1670144844, 1),
(20, '2022-11-14-024239', 'App\\Database\\Migrations\\TimPeneliti', 'default', 'App', 1670144844, 1),
(21, '2022-11-14-024246', 'App\\Database\\Migrations\\TimPkm', 'default', 'App', 1670144844, 1),
(22, '2022-11-14-024557', 'App\\Database\\Migrations\\Penelitian', 'default', 'App', 1670144844, 1),
(23, '2022-12-02-214735', 'App\\Database\\Migrations\\PembiayaanPkm', 'default', 'App', 1670144844, 1),
(24, '2022-11-14-024232', 'App\\Database\\Migrations\\PembiayaanPkm', 'default', 'App', 1670285097, 2),
(25, '2022-12-05-222317', 'App\\Database\\Migrations\\SuratKeteranganPkmModel', 'default', 'App', 1670285097, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembiayaan_pkm`
--

CREATE TABLE `pembiayaan_pkm` (
  `id_biaya` int(11) NOT NULL,
  `id_pkm` int(11) NOT NULL,
  `pembiayaan_diajukan` varchar(150) NOT NULL,
  `jumlah_biaya` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembiayaan_pkm`
--

INSERT INTO `pembiayaan_pkm` (`id_biaya`, `id_pkm`, `pembiayaan_diajukan`, `jumlah_biaya`) VALUES
(0, 1, 'kldnkdlsfnkdsln', '293729');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id_penelitian` int(15) NOT NULL,
  `jenis_penelitian` varchar(50) NOT NULL,
  `judul_penelitian` varchar(100) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `status_pengajuan` varchar(50) DEFAULT NULL,
  `file_proposal` varchar(100) DEFAULT NULL,
  `tanda_tangan` varchar(100) DEFAULT NULL,
  `biaya` varchar(20) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `id_status_reimburse` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id_penelitian`, `jenis_penelitian`, `judul_penelitian`, `bidang`, `tanggal_pengajuan`, `jumlah_anggota`, `id_status`, `status_pengajuan`, `file_proposal`, `tanda_tangan`, `biaya`, `alasan`, `id_status_reimburse`) VALUES
(1, 'Semi Mandiri', 'ini tes penelitian semi mandiri', 'Small Area Estimation', '2022-12-12', 1, 5, 'Disetujui oleh Direktur', '977-2818-1-PB.pdf', NULL, '100000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pkm`
--

CREATE TABLE `pengajuan_pkm` (
  `ID_pkm` int(11) NOT NULL,
  `jenis_pkm` varchar(25) NOT NULL,
  `topik_kegiatan` text NOT NULL,
  `bentuk_kegiatan` text NOT NULL,
  `waktu_kegiatan` date NOT NULL,
  `tempat_kegiatan` text NOT NULL,
  `sasaran` text NOT NULL,
  `target_peserta` int(11) NOT NULL,
  `hasil` text NOT NULL,
  `pembiayaan_diajukan` text,
  `diajukan_lainnya` text,
  `tanggal_pengajuan` date NOT NULL,
  `status` text,
  `id_status` int(11) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `alasan` varchar(25) DEFAULT NULL,
  `id_status_reimburse` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengajuan_pkm`
--

INSERT INTO `pengajuan_pkm` (`ID_pkm`, `jenis_pkm`, `topik_kegiatan`, `bentuk_kegiatan`, `waktu_kegiatan`, `tempat_kegiatan`, `sasaran`, `target_peserta`, `hasil`, `pembiayaan_diajukan`, `diajukan_lainnya`, `tanggal_pengajuan`, `status`, `id_status`, `jumlah_anggota`, `alasan`, `id_status_reimburse`) VALUES
(1, 'Kelompok', 'PKM 1', 'pkm 1', '2022-12-01', 'stis', 'sasaran 1', 1, 'sukses', '0', NULL, '2022-12-09', 'Kegiatan telah selesai dilaksanakan', 7, 0, NULL, NULL),
(2, 'Mandiri', 'PKM 1', 'pkm 1', '2022-12-14', 'dsfsd', 'sasaran 1', 1, '-', NULL, NULL, '2022-12-09', 'Kegiatan telah selesai dilaksanakan', 7, 0, NULL, NULL),
(3, 'Mandiri', 'lksdnskldnkl`', 'pkm 1', '2022-12-28', 'stis', 'sasaran 1', 1, '-', '0', NULL, '2022-12-09', 'Menunggu Persetujuan Kepala PPPM', 1, 0, NULL, NULL),
(4, 'Kelompok', 'Sosialisasi Data bersama BPS', 'Penyuluhan', '2022-12-21', 'jakarta', 'masyarakat', 100, 'Masyarakat dapat', '0', NULL, '2022-12-10', 'Diajukan oleh Dosen', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_reimburse`
--

CREATE TABLE `permohonan_reimburse` (
  `id_reimburse` int(11) NOT NULL,
  `id_penelitian` int(15) DEFAULT NULL,
  `id_pkm` int(15) DEFAULT NULL,
  `jenis_penelitian` varchar(50) DEFAULT NULL,
  `jenis_pkm` varchar(50) DEFAULT NULL,
  `judul_penelitian` varchar(250) DEFAULT NULL,
  `judul_pkm` varchar(250) DEFAULT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `loa` text,
  `naskah_artikel` text,
  `bukti_pembayaran` text,
  `id_status` int(11) NOT NULL,
  `status_reimburse` varchar(50) NOT NULL,
  `usulan_publikasi` varchar(255) DEFAULT NULL,
  `biaya_dicairkan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_reimburse`
--

INSERT INTO `permohonan_reimburse` (`id_reimburse`, `id_penelitian`, `id_pkm`, `jenis_penelitian`, `jenis_pkm`, `judul_penelitian`, `judul_pkm`, `tanggal_pengajuan`, `loa`, `naskah_artikel`, `bukti_pembayaran`, `id_status`, `status_reimburse`, `usulan_publikasi`, `biaya_dicairkan`) VALUES
(1, 77, NULL, 'Semi Mandiri', NULL, 'March, I think.', NULL, '2006-10-17', 'loa.pdf', 'naskah_artikel.pdf', 'bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', NULL, NULL),
(2, 78, NULL, 'Institusi', NULL, 'Alice. \'That\'s the.', NULL, '1991-11-12', 'loa.pdf', 'naskah_artikel.pdf', 'bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', NULL, NULL),
(3, 83, NULL, 'Didanai Institusi', NULL, 'Gryphon never.', NULL, '2013-10-16', 'loa.pdf', 'naskah_artikel.pdf', 'bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', NULL, NULL),
(4, 95, NULL, 'Didanai Institusi', NULL, 'And it\'ll fetch.', NULL, '1989-03-08', 'loa.pdf', 'naskah_artikel.pdf', 'bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', NULL, NULL),
(5, 102, NULL, 'Didanai Institusi', NULL, 'Alice: \'I don\'t.', NULL, '2005-05-06', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', 'default_usulan_publikas.pdf', 422000),
(6, 109, NULL, 'Semi Mandiri', NULL, 'I\'ve tried.', NULL, '2017-03-29', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 448000),
(7, 165, NULL, 'Semi Mandiri', NULL, 'I do it again and.', NULL, '2005-03-09', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', 'default_usulan_publikas.pdf', 951000),
(8, 166, NULL, 'Semi Mandiri', NULL, 'Five, in a game of.', NULL, '2002-05-10', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 654000),
(9, 6, NULL, 'Didanai Institusi', NULL, 'Then followed the.', NULL, '1980-11-24', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 695000),
(10, 11, NULL, 'Didanai Institusi', NULL, 'IX. The Mock.', NULL, '1992-08-01', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', 'default_usulan_publikas.pdf', 901000),
(11, 62, NULL, 'Institusi', NULL, 'Duchess sneezed.', NULL, '1975-11-04', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 511000),
(12, 70, NULL, 'Institusi', NULL, 'RABBIT\' engraved.', NULL, '1970-03-30', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 520000),
(13, 75, NULL, 'Semi Mandiri', NULL, 'Dodo suddenly.', NULL, '1981-12-18', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 360000),
(14, 77, NULL, 'Semi Mandiri', NULL, 'She got up and.', NULL, '1998-12-27', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', 'default_usulan_publikas.pdf', 805000),
(15, 78, NULL, 'Institusi', NULL, 'At this moment the.', NULL, '1981-11-16', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 2, 'Dana telah dicairkan', 'default_usulan_publikas.pdf', 441000),
(16, 92, NULL, 'Didanai Institusi', NULL, 'This time there.', NULL, '2015-05-31', 'default_loa.pdf', 'default_naskah_artikel.pdf', 'default_bukti_pembayaran.pdf', 1, 'Reimbursement dalam proses', 'default_usulan_publikas.pdf', 357000);

-- --------------------------------------------------------

--
-- Table structure for table `pkm`
--

CREATE TABLE `pkm` (
  `id_pkm` int(11) NOT NULL,
  `surat_pernyataan` text,
  `bukti_kegiatan` text,
  `narasumber` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pkm`
--

INSERT INTO `pkm` (`id_pkm`, `surat_pernyataan`, `bukti_kegiatan`, `narasumber`, `penyelenggara`, `id`) VALUES
(1, NULL, 'Laporan Penelitian - At this moment the. - Akhir.pdf', 'ksfjisjlfjsd', 'ksdnfklsdnf', 1),
(1, NULL, 'Proposal Penelitian - I grow up, I\'ll. - Akhir.pdf', 'dcjsdlkd', 'kdjfsdl', 2),
(3, NULL, 'Laporan Penelitian - At this moment the. - Akhir.pdf', 'dcjsdlkd', 'kdjfsdl', 3),
(4, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status_penelitian`
--

CREATE TABLE `status_penelitian` (
  `id_status` int(15) NOT NULL,
  `id_penelitian` int(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_penelitian`
--

INSERT INTO `status_penelitian` (`id_status`, `id_penelitian`, `status`) VALUES
(1, 1, 'Diajukan oleh Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `status_pkm`
--

CREATE TABLE `status_pkm` (
  `id_status` int(11) NOT NULL,
  `id_pkm` int(15) NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_pkm`
--

INSERT INTO `status_pkm` (`id_status`, `id_pkm`, `status`) VALUES
(1, 1, 'Diajukan oleh Dosen'),
(2, 1, 'Menunggu Persetujuan Kepala PPPM'),
(3, 1, 'Pengajuan dalam proses'),
(4, 1, 'Pengajuan Disetujui'),
(6, 3, 'Menunggu Persetujuan Kepala PPPM'),
(7, 4, 'Diajukan oleh Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_tangan_dosen`
--

CREATE TABLE `tanda_tangan_dosen` (
  `id` int(11) NOT NULL,
  `nip_dosen` varchar(255) NOT NULL,
  `ttd_manual` varchar(255) DEFAULT NULL,
  `ttd_digital` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanda_tangan_dosen`
--

INSERT INTO `tanda_tangan_dosen` (`id`, `nip_dosen`, `ttd_manual`, `ttd_digital`) VALUES
(1, '197211171995121001', NULL, NULL),
(2, '197305281995121001', NULL, NULL),
(3, '196008221985011001', NULL, NULL),
(4, '198506012007012003', NULL, NULL),
(5, '198302182004122001', NULL, NULL),
(6, '197605052000032003', NULL, NULL),
(7, '197412101996121001', NULL, NULL),
(8, '197001251998032001', NULL, NULL),
(9, '197604141999122001', NULL, NULL),
(10, '197002191992112001', NULL, NULL),
(11, '197204241994031003', NULL, NULL),
(12, '198109262004122001', NULL, NULL),
(13, '196607191991011001', NULL, NULL),
(14, '198007282003121004', NULL, NULL),
(15, '198512222009021002', 'ttdKepala.png', 'ttdKepala.png'),
(16, '198001182011011001', NULL, NULL),
(17, '198006242003121004', NULL, NULL),
(18, '198409182007012004', NULL, NULL),
(19, '198512122008011004', NULL, NULL),
(20, '197205261991121001', NULL, NULL),
(21, '198601202008011002', NULL, NULL),
(22, '199004052012112001', NULL, NULL),
(23, '198902072010122001', 'ttd dummy.jpeg', 'ttd dummy.jpeg'),
(24, '199001102012112001', NULL, NULL),
(25, '198306072007012009', NULL, NULL),
(26, '198204212003121004', NULL, NULL),
(27, '198002102002121001', NULL, NULL),
(28, '198106042003121001', NULL, NULL),
(29, '197707222000031002', NULL, NULL),
(30, '198810242010122001', NULL, NULL),
(31, '196302081985011001', NULL, NULL),
(32, '197006161988121001', NULL, NULL),
(33, '197502041996122001', NULL, NULL),
(34, '197808022000122001', NULL, NULL),
(35, '198202072004121001', NULL, NULL),
(36, '196102191983122001', NULL, NULL),
(37, '198007242002121002', NULL, NULL),
(38, '197907312000122001', NULL, NULL),
(39, '196207221985012001', NULL, NULL),
(40, '197310231995122001', NULL, NULL),
(41, '196710221990032002', 'ttdDirut.png', 'ttdDirut.png'),
(42, '198202022003121004', NULL, NULL),
(43, '198004012003122003', NULL, NULL),
(44, '196704251989011002', NULL, NULL),
(45, '196805031991011001', 'ttduser.JPG', 'ttduser.png'),
(46, '196503141988021001', NULL, NULL),
(47, '198110142004122001', NULL, NULL),
(48, '197701042009022003', NULL, NULL),
(49, '196706121991011001', NULL, NULL),
(50, '197608092000032001', NULL, NULL),
(51, '198811292012112001', NULL, NULL),
(52, '198106122003122002', NULL, NULL),
(53, '198804192013112001', NULL, NULL),
(54, '197007251998032003', NULL, NULL),
(55, '198410152007012001', NULL, NULL),
(56, '197807222000121003', NULL, NULL),
(57, '195806081986031005', NULL, NULL),
(58, '197312272000031002', NULL, NULL),
(59, '197001121991122001', NULL, NULL),
(60, '196703171989012001', NULL, NULL),
(61, '197307141996121001', NULL, NULL),
(62, '198804052010122001', NULL, NULL),
(63, '198707112009121001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `target_penelitian`
--

CREATE TABLE `target_penelitian` (
  `id_luaran` int(15) NOT NULL,
  `id_penelitian` int(15) NOT NULL,
  `jenis_luaran` varchar(50) NOT NULL,
  `target_capaian` varchar(50) NOT NULL,
  `jurnal_tujuan` varchar(255) NOT NULL,
  `index_jurnal_tujuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `target_penelitian`
--

INSERT INTO `target_penelitian` (`id_luaran`, `id_penelitian`, `jenis_luaran`, `target_capaian`, `jurnal_tujuan`, `index_jurnal_tujuan`) VALUES
(1, 1, 'Jenis 1', 'Target 1', 'Jurnal 1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tim_peneliti`
--

CREATE TABLE `tim_peneliti` (
  `id_timpeneliti` int(15) NOT NULL,
  `id_penelitian` int(15) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `namaPeneliti` varchar(255) NOT NULL,
  `programStudi` varchar(10) NOT NULL,
  `peran` varchar(50) DEFAULT NULL,
  `bidang_keahlian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tim_peneliti`
--

INSERT INTO `tim_peneliti` (`id_timpeneliti`, `id_penelitian`, `NIP`, `namaPeneliti`, `programStudi`, `peran`, `bidang_keahlian`) VALUES
(1, 1, '196805031991011001', 'Dr. I Made Arcana, S.Si, M.Sc', 'ST', 'Ketua Penelitian', 'IT'),
(2, 1, '31241234', 'tes anggota 1', 'ks', 'Anggota 1', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tim_pkm`
--

CREATE TABLE `tim_pkm` (
  `id_timpkm` int(11) NOT NULL,
  `id_pkm` int(11) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` text NOT NULL,
  `peran` text,
  `bidang_keahlian` text,
  `pangkat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tim_pkm`
--

INSERT INTO `tim_pkm` (`id_timpkm`, `id_pkm`, `nip`, `nama`, `peran`, `bidang_keahlian`, `pangkat`) VALUES
(1, 1, '196805031991011001', 'Dr. I Made Arcana, S.Si, M.Sc', 'Ketua PKM', 'bidang apa aja', 'pangkat 1'),
(2, 1, '2312311', 'ang 1', 'anggota', 'IT', 'anggota 1'),
(3, 1, '196805031991011001', 'Dr. I Made Arcana, S.Si, M.Sc', 'Ketua PKM', 'bidang 1', 'pangkat 1'),
(4, 1, '2312311', 'ang 1', 'anggota', 'IT', 'anggota 1'),
(5, 3, '196805031991011001', 'Dr. I Made Arcana, S.Si, M.Sc', 'Ketua PKM', 'bidang 1', 'pangkat 1'),
(6, 3, '2312311', 'ang 1', 'anggota', 'IT', 'anggota 1'),
(7, 4, '198902072010122001', 'Dr. Eng. Lya Hulliyyatus Suadaa, S.S.T., M.T.', 'Ketua PKM', 'Text Mining', '4a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nip`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '196805031991011001', NULL, NULL, 0, '2022-12-12 06:34:10', '2022-12-09 16:09:36', '2022-12-09 16:09:36', NULL),
(2, 'dosen', '196805031991011001', NULL, NULL, 0, '2022-12-12 07:44:13', '2022-12-09 16:09:37', '2022-12-09 16:09:37', NULL),
(3, 'direktur', '196710221990032002', NULL, NULL, 0, NULL, '2022-12-09 16:09:37', '2022-12-09 16:09:37', NULL),
(4, 'kepalapppm', '198512222009021002', NULL, NULL, 0, '2022-12-11 23:12:36', '2022-12-09 16:09:37', '2022-12-09 16:09:37', NULL),
(5, 'bau', '198804052010122001', NULL, NULL, 0, '2022-12-11 22:07:14', '2022-12-09 16:09:37', '2022-12-09 16:09:37', NULL),
(6, 'reviewer', '198601202008011002', NULL, NULL, 0, '2022-12-09 21:16:21', '2022-12-09 16:09:37', '2022-12-09 16:09:37', NULL),
(7, 'afnan', '197006161988121001', NULL, NULL, 0, '2022-12-09 17:25:23', '2022-12-09 16:09:37', '2022-12-09 16:09:37', NULL),
(8, 'okta', '197205261991121001', NULL, NULL, 0, '2022-12-09 16:15:09', '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(9, 'taufiq', '198106042003121001', NULL, NULL, 0, '2022-12-10 01:58:23', '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(10, 'intan', '199004052012112001', NULL, NULL, 0, '2022-12-09 17:26:16', '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(11, 'fatya', '199001102012112001', NULL, NULL, 0, '2022-12-10 21:17:54', '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(12, 'atikah', '198902072010122001', NULL, NULL, 0, '2022-12-09 20:12:18', '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(13, '197211171995121001', '197211171995121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(14, '197305281995121001', '197305281995121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:38', '2022-12-09 16:09:38', NULL),
(15, '196008221985011001', '196008221985011001', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39', NULL),
(16, '198506012007012003', '198506012007012003', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39', NULL),
(17, '198302182004122001', '198302182004122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39', NULL),
(18, '197605052000032003', '197605052000032003', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39', NULL),
(19, '197412101996121001', '197412101996121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39', NULL),
(20, '197001251998032001', '197001251998032001', NULL, NULL, 0, NULL, '2022-12-09 16:09:39', '2022-12-09 16:09:39', NULL),
(21, '197604141999122001', '197604141999122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40', NULL),
(22, '197002191992112001', '197002191992112001', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40', NULL),
(23, '197204241994031003', '197204241994031003', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40', NULL),
(24, '198109262004122001', '198109262004122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40', NULL),
(25, '196607191991011001', '196607191991011001', NULL, NULL, 0, NULL, '2022-12-09 16:09:40', '2022-12-09 16:09:40', NULL),
(26, '198007282003121004', '198007282003121004', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41', NULL),
(27, '198512222009021002', '198512222009021002', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41', NULL),
(28, '198001182011011001', '198001182011011001', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41', NULL),
(29, '198006242003121004', '198006242003121004', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41', NULL),
(30, '198409182007012004', '198409182007012004', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41', NULL),
(31, '198512122008011004', '198512122008011004', NULL, NULL, 0, NULL, '2022-12-09 16:09:41', '2022-12-09 16:09:41', NULL),
(32, '197205261991121001', '197205261991121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42', NULL),
(33, '198601202008011002', '198601202008011002', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42', NULL),
(34, '199004052012112001', '199004052012112001', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42', NULL),
(35, '198902072010122001', '198902072010122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42', NULL),
(36, '199001102012112001', '199001102012112001', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42', NULL),
(37, '198306072007012009', '198306072007012009', NULL, NULL, 0, NULL, '2022-12-09 16:09:42', '2022-12-09 16:09:42', NULL),
(38, '198204212003121004', '198204212003121004', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43', NULL),
(39, '198002102002121001', '198002102002121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43', NULL),
(40, '198106042003121001', '198106042003121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43', NULL),
(41, '197707222000031002', '197707222000031002', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43', NULL),
(42, '198810242010122001', '198810242010122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43', NULL),
(43, '196302081985011001', '196302081985011001', NULL, NULL, 0, NULL, '2022-12-09 16:09:43', '2022-12-09 16:09:43', NULL),
(44, '197006161988121001', '197006161988121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44', NULL),
(45, '197502041996122001', '197502041996122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44', NULL),
(46, '197808022000122001', '197808022000122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44', NULL),
(47, '198202072004121001', '198202072004121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44', NULL),
(48, '196102191983122001', '196102191983122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:44', '2022-12-09 16:09:44', NULL),
(49, '198007242002121002', '198007242002121002', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45', NULL),
(50, '197907312000122001', '197907312000122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45', NULL),
(51, '196207221985012001', '196207221985012001', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45', NULL),
(52, '197310231995122001', '197310231995122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45', NULL),
(53, '196710221990032002', '196710221990032002', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45', NULL),
(54, '198202022003121004', '198202022003121004', NULL, NULL, 0, NULL, '2022-12-09 16:09:45', '2022-12-09 16:09:45', NULL),
(55, '198004012003122003', '198004012003122003', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(56, '196704251989011002', '196704251989011002', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(57, '196805031991011001', '196805031991011001', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(58, '196503141988021001', '196503141988021001', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(59, '198110142004122001', '198110142004122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(60, '197701042009022003', '197701042009022003', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(61, '196706121991011001', '196706121991011001', NULL, NULL, 0, NULL, '2022-12-09 16:09:46', '2022-12-09 16:09:46', NULL),
(62, '197608092000032001', '197608092000032001', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47', NULL),
(63, '198811292012112001', '198811292012112001', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47', NULL),
(64, '198106122003122002', '198106122003122002', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47', NULL),
(65, '198804192013112001', '198804192013112001', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47', NULL),
(66, '197007251998032003', '197007251998032003', NULL, NULL, 0, NULL, '2022-12-09 16:09:47', '2022-12-09 16:09:47', NULL),
(67, '198410152007012001', '198410152007012001', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48', NULL),
(68, '197807222000121003', '197807222000121003', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48', NULL),
(69, '195806081986031005', '195806081986031005', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48', NULL),
(70, '197312272000031002', '197312272000031002', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48', NULL),
(71, '197001121991122001', '197001121991122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48', NULL),
(72, '196703171989012001', '196703171989012001', NULL, NULL, 0, NULL, '2022-12-09 16:09:48', '2022-12-09 16:09:48', NULL),
(73, '197307141996121001', '197307141996121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:49', '2022-12-09 16:09:49', NULL),
(74, '198804052010122001', '198804052010122001', NULL, NULL, 0, NULL, '2022-12-09 16:09:49', '2022-12-09 16:09:49', NULL),
(75, '198707112009121001', '198707112009121001', NULL, NULL, 0, NULL, '2022-12-09 16:09:49', '2022-12-09 16:09:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran_awal`
--
ALTER TABLE `anggaran_awal`
  ADD PRIMARY KEY (`id_tahunAnggaran`);

--
-- Indexes for table `anggaran_total`
--
ALTER TABLE `anggaran_total`
  ADD PRIMARY KEY (`id_total`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dana_penelitian`
--
ALTER TABLE `dana_penelitian`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `dana_pkm`
--
ALTER TABLE `dana_pkm`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `detailstatus_penelitian`
--
ALTER TABLE `detailstatus_penelitian`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detailstatus_pkm`
--
ALTER TABLE `detailstatus_pkm`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP_dosen`);

--
-- Indexes for table `global_setting_ttd`
--
ALTER TABLE `global_setting_ttd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_penelitian`
--
ALTER TABLE `laporan_penelitian`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indexes for table `pengajuan_pkm`
--
ALTER TABLE `pengajuan_pkm`
  ADD PRIMARY KEY (`ID_pkm`);

--
-- Indexes for table `permohonan_reimburse`
--
ALTER TABLE `permohonan_reimburse`
  ADD PRIMARY KEY (`id_reimburse`);

--
-- Indexes for table `pkm`
--
ALTER TABLE `pkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_penelitian`
--
ALTER TABLE `status_penelitian`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_pkm`
--
ALTER TABLE `status_pkm`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tanda_tangan_dosen`
--
ALTER TABLE `tanda_tangan_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_penelitian`
--
ALTER TABLE `target_penelitian`
  ADD PRIMARY KEY (`id_luaran`);

--
-- Indexes for table `tim_peneliti`
--
ALTER TABLE `tim_peneliti`
  ADD PRIMARY KEY (`id_timpeneliti`);

--
-- Indexes for table `tim_pkm`
--
ALTER TABLE `tim_pkm`
  ADD PRIMARY KEY (`id_timpkm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran_awal`
--
ALTER TABLE `anggaran_awal`
  MODIFY `id_tahunAnggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `anggaran_total`
--
ALTER TABLE `anggaran_total`
  MODIFY `id_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `dana_penelitian`
--
ALTER TABLE `dana_penelitian`
  MODIFY `id_dana` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dana_pkm`
--
ALTER TABLE `dana_pkm`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detailstatus_penelitian`
--
ALTER TABLE `detailstatus_penelitian`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detailstatus_pkm`
--
ALTER TABLE `detailstatus_pkm`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan_penelitian`
--
ALTER TABLE `laporan_penelitian`
  MODIFY `id_laporan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id_penelitian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan_pkm`
--
ALTER TABLE `pengajuan_pkm`
  MODIFY `ID_pkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permohonan_reimburse`
--
ALTER TABLE `permohonan_reimburse`
  MODIFY `id_reimburse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pkm`
--
ALTER TABLE `pkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_penelitian`
--
ALTER TABLE `status_penelitian`
  MODIFY `id_status` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_pkm`
--
ALTER TABLE `status_pkm`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tanda_tangan_dosen`
--
ALTER TABLE `tanda_tangan_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `target_penelitian`
--
ALTER TABLE `target_penelitian`
  MODIFY `id_luaran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tim_peneliti`
--
ALTER TABLE `tim_peneliti`
  MODIFY `id_timpeneliti` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tim_pkm`
--
ALTER TABLE `tim_pkm`
  MODIFY `id_timpkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
