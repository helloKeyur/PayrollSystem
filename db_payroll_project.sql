-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 07:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_payroll_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `username`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'Admin', 'user.jpg', '$2y$10$0XqYDpd2BUtoLcIxpsP4CuzRp4rR6JK.aKAaGlvmvfiYfMo.kqHpC', 'WgUg81FWihGWaasvrPAmqbn6azyHhSKVXpxT4K5ClUOeKWohBWidrfGKy0q3', '2021-04-21 05:05:00', '2021-05-01 06:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `num_hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ontime_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `date`, `time_in`, `time_out`, `num_hour`, `employee_id`, `ontime_status`, `created_at`, `updated_at`) VALUES
(1, '2021-04-01', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(2, '2021-04-02', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(3, '2021-04-03', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(4, '2021-04-04', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(5, '2021-04-05', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(6, '2021-04-06', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(7, '2021-04-07', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(8, '2021-04-08', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(9, '2021-04-09', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:03', '2021-04-21 05:05:03'),
(10, '2021-04-10', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(11, '2021-04-11', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(12, '2021-04-12', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(13, '2021-04-13', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(14, '2021-04-14', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(15, '2021-04-15', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(16, '2021-04-16', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(17, '2021-04-17', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(18, '2021-04-18', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(19, '2021-04-19', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(20, '2021-04-20', '08:00:00', '17:00:00', '540', 1, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(21, '2021-04-01', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(22, '2021-04-02', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(23, '2021-04-03', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(24, '2021-04-04', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(25, '2021-04-05', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(26, '2021-04-06', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(27, '2021-04-07', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(28, '2021-04-08', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:04', '2021-04-21 05:05:04'),
(29, '2021-04-09', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(30, '2021-04-10', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(31, '2021-04-11', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(32, '2021-04-12', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(33, '2021-04-13', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(34, '2021-04-14', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(35, '2021-04-15', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(36, '2021-04-16', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(37, '2021-04-17', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(38, '2021-04-18', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(39, '2021-04-19', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(40, '2021-04-20', '09:00:00', '18:00:00', '540', 2, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(41, '2021-04-01', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(42, '2021-04-02', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(43, '2021-04-03', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(44, '2021-04-04', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(45, '2021-04-05', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(46, '2021-04-06', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(47, '2021-04-07', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(48, '2021-04-08', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(49, '2021-04-09', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(50, '2021-04-10', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(51, '2021-04-11', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(52, '2021-04-12', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(53, '2021-04-13', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(54, '2021-04-14', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(55, '2021-04-15', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(56, '2021-04-16', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:05', '2021-04-21 05:05:05'),
(57, '2021-04-17', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(58, '2021-04-18', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(59, '2021-04-19', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(60, '2021-04-20', '09:00:00', '18:00:00', '540', 3, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(61, '2021-04-01', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(62, '2021-04-02', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(63, '2021-04-03', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(64, '2021-04-04', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(65, '2021-04-05', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(66, '2021-04-06', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(67, '2021-04-07', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(68, '2021-04-08', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(69, '2021-04-09', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(70, '2021-04-10', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(71, '2021-04-11', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(72, '2021-04-12', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(73, '2021-04-13', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(74, '2021-04-14', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(75, '2021-04-15', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(76, '2021-04-16', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(77, '2021-04-17', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(78, '2021-04-18', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(79, '2021-04-19', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(80, '2021-04-20', '10:00:00', '19:00:00', '540', 4, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(81, '2021-04-01', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(82, '2021-04-02', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(83, '2021-04-03', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(84, '2021-04-04', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(85, '2021-04-05', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(86, '2021-04-06', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:06', '2021-04-21 05:05:06'),
(87, '2021-04-07', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(88, '2021-04-08', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(89, '2021-04-09', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(90, '2021-04-10', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(91, '2021-04-11', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(92, '2021-04-12', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(93, '2021-04-13', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(94, '2021-04-14', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(95, '2021-04-15', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(96, '2021-04-16', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(97, '2021-04-17', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(98, '2021-04-18', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(99, '2021-04-19', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(100, '2021-04-20', '09:00:00', '18:00:00', '540', 5, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(101, '2021-04-01', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(102, '2021-04-02', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(103, '2021-04-03', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(104, '2021-04-04', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(105, '2021-04-05', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(106, '2021-04-06', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(107, '2021-04-07', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(108, '2021-04-08', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(109, '2021-04-09', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(110, '2021-04-10', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:07', '2021-04-21 05:05:07'),
(111, '2021-04-11', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(112, '2021-04-12', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(113, '2021-04-13', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(114, '2021-04-14', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(115, '2021-04-15', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(116, '2021-04-16', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(117, '2021-04-17', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(118, '2021-04-18', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(119, '2021-04-19', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(120, '2021-04-20', '09:00:00', '18:00:00', '540', 6, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(121, '2021-04-01', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(122, '2021-04-02', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(123, '2021-04-03', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(124, '2021-04-04', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(125, '2021-04-05', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(126, '2021-04-06', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(127, '2021-04-07', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(128, '2021-04-08', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(129, '2021-04-09', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(130, '2021-04-10', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(131, '2021-04-11', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(132, '2021-04-12', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(133, '2021-04-13', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(134, '2021-04-14', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(135, '2021-04-15', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(136, '2021-04-16', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:08', '2021-04-21 05:05:08'),
(137, '2021-04-17', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:09', '2021-04-21 05:05:09'),
(138, '2021-04-18', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:09', '2021-04-21 05:05:09'),
(139, '2021-04-19', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:09', '2021-04-21 05:05:09'),
(140, '2021-04-20', '10:00:00', '19:00:00', '540', 7, 1, '2021-04-21 05:05:09', '2021-04-21 05:05:09'),
(141, '2021-04-26', '17:29:47', NULL, '540', 1, 0, '2021-04-26 11:59:47', '2021-04-26 11:59:47'),
(142, '2021-04-26', '09:25:00', '16:10:00', '540', 2, 0, '2021-04-26 11:59:56', '2021-05-03 12:58:35'),
(143, '2021-04-29', '09:00:00', '18:00:00', '540', 1, 0, '2021-04-29 16:21:28', '2021-05-03 12:56:39'),
(144, '2021-05-01', '09:09:00', '19:03:00', '540', 2, 0, '2021-05-01 06:37:18', '2021-05-03 13:10:45'),
(145, '2021-05-02', '10:00:00', '17:10:00', '430', 1, 0, '2021-05-03 17:22:12', '2021-05-03 17:25:40'),
(146, '2021-05-01', '10:54:00', '17:54:00', '420', 1, 0, '2021-05-03 17:24:29', '2021-05-03 17:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `cash_advances`
--

CREATE TABLE `cash_advances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_amount` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_advances`
--

INSERT INTO `cash_advances` (`id`, `title`, `slug`, `rate_amount`, `date`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'First Cash Advance For Employee', 'first-cash-advance-for-employee', '1000.00', '2021-04-01', 1, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(2, 'First Cash Advance For Employee', 'first-cash-advance-for-employee-1', '1500.00', '2021-04-01', 2, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(3, 'First Cash Advance For Employee', 'first-cash-advance-for-employee-2', '4000.00', '2021-04-01', 3, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(4, 'Non Qui Magnam Eaque', 'non-qui-magnam-eaque', '2.00', '1989-01-19', 6, '2021-05-03 11:28:26', '2021-05-03 11:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `name`, `slug`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Standard Deduction', 'standard-deduction', 'The Indian Finance Minister, while presenting the Union Budget 2018, announced a standard deduction amounting to Rs. 40,000 for salaried employees.', '600.00', '2021-04-21 05:05:00', '2021-04-21 05:05:00'),
(2, 'Medical Insurance Deduction', 'medical-insurance-deduction', 'Section 80C is the most extensively used option for saving income tax. ', '200.00', '2021-04-21 05:05:00', '2021-04-21 05:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `schedule_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate_per_hour` decimal(8,2) NOT NULL,
  `salary` decimal(8,2) NOT NULL COMMENT 'It''s just for information purpose.',
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `first_name`, `last_name`, `phone`, `email`, `birthdate`, `media_id`, `address`, `gender`, `remark`, `position_id`, `schedule_id`, `rate_per_hour`, `salary`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'EMP607FB27D2ED74', 'Sameer', 'Patel', '9843-984-321', 'sameer@yopmail.com', 'April 10, 2001', 2, '4008  Grey Fox Farm Road, Houston, Hyderabad, Andhra Pradesh', 'Male', NULL, 3, 2, '100.00', '30000.00', 1, '2021-04-21 05:05:01', '2021-05-01 08:03:10'),
(2, 'EMP607FB27D399AE', 'Smita', 'Yadav', '9843-344-321', 'smita@yopmail.com', 'May 23, 1998', NULL, '25 --/, nd Floor, Behind Ramakrishna Theatre, Abids, Hyderabad, Andhra Pradesh', 'Female', NULL, 2, 3, '80.00', '24000.00', 1, '2021-04-21 05:05:01', '2021-04-21 05:05:01'),
(3, 'EMP607FB27D4191E', 'Amit', 'Rana', '9843-321-321', 'amit@yopmail.com', 'June 13, 1994', NULL, '526 /, , Trapinex House, Sholapur Street, Chinch Bunder, Andhra Pradesh', 'Male', NULL, 2, 3, '80.00', '24000.00', 1, '2021-04-21 05:05:01', '2021-04-21 05:05:01'),
(4, 'EMP607FB27D52206', 'Amita', 'Patil', '9842-221-344', 'amita@yopmail.com', 'July 3, 1995', NULL, '53 , A-, Har Indl Estate, Dhanraj Mills Compound, Lower Parel, Andhra Pradesh', 'Female', 'dsasfsa', 4, 4, '70.00', '21000.00', 1, '2021-04-21 05:05:01', '2021-04-29 16:11:44'),
(5, 'EMP607FB27D9E359', 'Jayesh', 'Walter', '9843-321-555', 'jayesh@yopmail.com', 'May 01, 1992', NULL, 'Shop No 5, Sukh Aangan, St Road, Opp Bus Depot, Nalasopara(w), Andhra Pradesh', 'Male', NULL, 2, 3, '110.00', '28000.00', 1, '2021-04-21 05:05:01', '2021-04-21 05:05:01'),
(6, 'EMP607FB27DB0FF5', 'Rony', 'Dceuza', '9833-321-521', 'rony@yopmail.com', 'December 05, 1991', NULL, '4 , D-, Yogi Nagar, Eksar Rd, Borivli (w), Andhra Pradesh', 'Male', NULL, 1, 3, '90.00', '26000.00', 1, '2021-04-21 05:05:01', '2021-04-21 05:05:01'),
(7, 'EMP607FB27DB94E0', 'Reema', 'Patel', '7803-321-095', 'rema@yopmail.com', 'January 10, 1991', NULL, '146 -, Great Western , st, S Bhagat S Rd, Fort, Andhra Pradesh', 'Female', NULL, 4, 4, '90.00', '26000.00', 1, '2021-04-21 05:05:01', '2021-04-21 05:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Employee', 8, 'avatar', '608ad90b12f54', '608ad90b12f54.png', 'image/png', 'public', 34373, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 1, '2021-04-29 16:05:22', '2021-04-29 16:05:27'),
(2, 'App\\Employee', 1, 'avatar', '608d0b33b8893', '608d0b33b8893.png', 'image/png', 'public', 42524, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 2, '2021-05-01 08:03:04', '2021-05-01 08:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_14_150456_create_admins_table', 1),
(4, '2020_05_15_063434_create_media_table', 1),
(5, '2021_04_10_121946_create_positions_table', 1),
(6, '2021_04_10_135831_create_deductions_table', 1),
(7, '2021_04_10_151445_create_schedules_table', 1),
(8, '2021_04_10_184047_create_employees_table', 1),
(9, '2021_04_11_150533_create_overtimes_table', 1),
(10, '2021_04_11_175800_create_cash_advances_table', 1),
(11, '2021_04_11_193826_create_attendances_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_amount` decimal(8,2) NOT NULL,
  `hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `title`, `slug`, `description`, `rate_amount`, `hour`, `date`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'First Overtime For Last Check', 'first-overtime-for-last-check', 'On this day we are schedule first overtime for employees.', '280.00', '120', '2021-04-01', 1, '2021-04-21 05:05:01', '2021-05-03 17:04:43'),
(2, 'First Overtime For Last Check', 'first-overtime-for-last-check-1', 'On this day we are schedule first overtime for employees.', '300.00', '60', '2021-04-06', 2, '2021-04-21 05:05:01', '2021-04-21 05:05:01'),
(3, 'First Overtime For Last Check', 'first-overtime-for-last-check-2', 'On this day we are schedule first overtime for employees.', '480.00', '60', '2021-04-10', 3, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(4, 'First Overtime For Last Check', 'first-overtime-for-last-check-3', 'On this day we are schedule first overtime for employees.', '580.00', '60', '2021-04-14', 4, '2021-04-21 05:05:02', '2021-04-21 05:05:02'),
(5, 'Weqqeqwe', 'weqqeqwe', '2121sdafafadfsfassdasdfssad', '100.00', '60', '2021-04-12', 3, '2021-04-29 16:20:13', '2021-04-29 16:20:13'),
(6, 'Test', 'test', 'dfasfa', '100.00', '60', '2021-04-30', 1, '2021-05-03 17:01:03', '2021-05-03 17:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Graphic Designer1', 'graphic-designer', 'Graphic designers create visual concepts, using computer software or by hand, to communicate ideas that inspire, inform, and captivate consumers.', '2021-04-21 05:05:00', '2021-05-01 07:59:21'),
(2, 'Marketing', 'marketing', 'Marketing refers to activities a company undertakes to promote the buying or selling of a product or service. Marketing includes advertising, selling, and delivering products to consumers or other businesses. Some marketing is done by affiliates on behalf of a company.', '2021-04-21 05:05:00', '2021-04-21 05:05:00'),
(3, 'Programmer', 'programmer', 'Computer programmers write, test, debug, and maintain the detailed instructions, called computer programs, that computers must follow to perform their functions.', '2021-04-21 05:05:00', '2021-04-21 05:05:00'),
(4, 'Writer', 'writer', 'A writer is a person who uses written words in different styles and techniques to communicate ideas.', '2021-04-21 05:05:00', '2021-04-21 05:05:00'),
(5, 'Enim Consectetur Arc', 'enim-consectetur-arc', 'Qui et impedit sint', '2021-05-03 11:24:55', '2021-05-03 11:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `cash_advances`
--
ALTER TABLE `cash_advances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_advances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_id_unique` (`employee_id`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_position_id_foreign` (`position_id`),
  ADD KEY `employees_schedule_id_foreign` (`schedule_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtimes_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `cash_advances`
--
ALTER TABLE `cash_advances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cash_advances`
--
ALTER TABLE `cash_advances`
  ADD CONSTRAINT `cash_advances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
