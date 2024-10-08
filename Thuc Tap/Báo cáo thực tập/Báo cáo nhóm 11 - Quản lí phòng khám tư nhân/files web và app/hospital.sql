-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 08, 2023 lúc 04:30 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hospital`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bacsis`
--

CREATE TABLE `bacsis` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_bs` varchar(255) NOT NULL,
  `email_bs` varchar(255) NOT NULL,
  `phone_bs` varchar(255) DEFAULT NULL,
  `address_bs` varchar(255) DEFAULT NULL,
  `cccd_bs` varchar(255) DEFAULT NULL,
  `gender_bs` tinyint(1) NOT NULL DEFAULT 1,
  `usertype` varchar(255) NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password_bs` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bacsis`
--

INSERT INTO `bacsis` (`id`, `name_bs`, `email_bs`, `phone_bs`, `address_bs`, `cccd_bs`, `gender_bs`, `usertype`, `email_verified_at`, `password_bs`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'bacsi', 'bacsi@gmail.com', '0111', 'ag', NULL, 1, '2', NULL, '11111111', NULL, '2023-06-15 00:30:42', '2023-06-15 00:30:42'),
(2, 'bacsi2', 'bacsi2@gmail.com', '01222', 'ag', NULL, 0, '2', NULL, '1111111111', NULL, '2023-06-15 00:30:42', '2023-06-15 00:30:42'),
(16, 'đáa', 'admin1@Gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 1, '2', NULL, '11111111', NULL, '2023-06-15 00:54:06', '2023-06-15 00:54:06'),
(17, 'đáa', 'admin2@Gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 1, '2', NULL, '11111111', NULL, '2023-06-15 00:54:06', '2023-06-15 00:54:06'),
(18, 'đáa', 'admin3@Gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 1, '2', NULL, '11111111', NULL, '2023-06-15 00:54:06', '2023-06-15 00:54:06'),
(19, 'sss', 'admin4@Gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 0, '2', NULL, '11111111', NULL, '2023-06-15 00:54:06', '2023-06-15 00:54:06'),
(20, 'ssss', 'admin5@Gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 1, '2', NULL, '11111111', NULL, '2023-06-15 00:54:06', '2023-06-15 00:54:06'),
(21, 'sss', 'bacsi34@gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 0, '2', NULL, '111111111', NULL, '2023-06-15 00:54:35', '2023-06-15 00:54:35'),
(22, 'dsgfsagsdf', 'nurdfg@Gmail.com', '5245342523', 'vinh long', '534523452345', 1, '2', NULL, '33333333333', NULL, '2023-06-27 15:17:01', '2023-06-27 15:17:01'),
(23, 'nguyen', 'VanAaaa@gmail.com', '123213', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', '423653663511', 1, '2', NULL, '11111111', NULL, '2023-06-30 05:54:55', '2023-06-30 05:54:55'),
(24, 'bac si nha', 'hai11@gmail.com', '9804843434', 'can  tho', '434354345534', 1, '2', NULL, '$2y$10$J/OMWTCQBFGmWr/oXHjtf.A6nbjN9eAF36oMD9c6whEidG7c7UUgW', NULL, '2023-07-01 01:09:30', '2023-07-01 01:09:30'),
(25, 'bac si toi', 'hai12@gmail.com', '9804843434', 'can  tho', '434354345566', 1, '2', NULL, '$2y$10$t//OhQmFHMZFwUYjmdPA9OLBHXiXm.Aq1astKk0ngtS/N/PXzS/Ou', NULL, '2023-07-01 01:59:50', '2023-07-01 01:59:50'),
(26, 'bac si AA', 'hai3333338789@gmail.com', '9804843434', 'can  tho', '434354345533', 0, '2', NULL, '$2y$10$l.HlAeWjUr6ExOE3PPApDeWjTFuGyCiQwCm5pK/yAgMQR0vwaFmjq', NULL, '2023-07-01 03:57:14', '2023-07-01 03:57:14'),
(27, 'bac si B', 'hai222221@gmail.com', '9804843434', 'can  tho', '434354343334', 1, '2', NULL, '$2y$10$m8/A6afUXcNtTv7vGGTLbevTjP6G0gmp3FTrC2jVzIviJ1N/PxxVK', NULL, '2023-07-02 05:37:56', '2023-07-02 05:37:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviets`
--

CREATE TABLE `baiviets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `ttnoidung` text DEFAULT NULL,
  `ttnoibat` tinyint(1) NOT NULL DEFAULT 0,
  `danhmuc` varchar(100) NOT NULL,
  `photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviets`
--

INSERT INTO `baiviets` (`id`, `name`, `noidung`, `ttnoidung`, `ttnoibat`, `danhmuc`, `photo_path`, `created_at`, `updated_at`) VALUES
(24, 'Bài viết về thuốc', 'Bài viết về thuốc\r\nBài viết về thuốc\r\nBài viết về thuốc\r\nBài viết về thuốc\r\nBài viết về thuốc', 'Bài viết về thuốc', 1, 'Thuốc', '1688121586.jpg', '2023-06-30 03:39:46', '2023-06-30 03:39:46'),
(26, 'Bài viết về nghiên cứu', 'Bài viết về nghiên cứu\r\nBài viết về nghiên cứu\r\nBài viết về nghiên cứu\r\nBài viết về nghiên cứu', 'Bài viết về nghiên cứu', 0, 'Nghiên cứu', '1688121632.jpg', '2023-06-30 03:40:32', '2023-06-30 03:40:32'),
(29, 'ghodfigsdfkl', 'dudyfgqrea7tyrw huweyfaoweyrw8', 'dfuasdijfghsd fhiuhgaasidg fhiu', 1, 'Sức khỏe', '1688209099.jpg', '2023-07-01 02:03:47', '2023-07-01 03:58:19'),
(30, 'Tên bài viết', 'Tên bài viết\r\nTên bài viết\r\nTên bài viết', 'Tên bài viết', 1, 'Sức khỏe', '1688270827.jpg', '2023-07-01 21:07:07', '2023-07-01 21:07:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhans`
--

CREATE TABLE `benhnhans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_bn` varchar(255) NOT NULL,
  `email_bn` varchar(255) NOT NULL,
  `phone_bn` varchar(255) DEFAULT NULL,
  `address_bn` varchar(255) DEFAULT NULL,
  `cccd_bn` varchar(255) DEFAULT NULL,
  `gender_bn` varchar(5) NOT NULL,
  `ngaysinh_bn` varchar(50) NOT NULL,
  `examination_service` tinyint(1) NOT NULL DEFAULT 1,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `email_averified_at` timestamp NULL DEFAULT NULL,
  `password_bn` varchar(255) NOT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhans`
--

INSERT INTO `benhnhans` (`id`, `name_bn`, `email_bn`, `phone_bn`, `address_bn`, `cccd_bn`, `gender_bn`, `ngaysinh_bn`, `examination_service`, `trangthai`, `usertype`, `email_averified_at`, `password_bn`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Duc', 'duc@Gmail.com', '0123456789', 'Kien Giang', '323456789021', 'Nam', '2001-06-15', 1, 2, '0', NULL, '$2y$10$8RJjFnvBLDSeJyKTtMAUzez2Xu5N5P8zZVsJi1pzc.QuJq6U7zCIK⏎', NULL, NULL, '2023-06-13 01:34:09', '2023-07-01 10:54:04'),
(2, 'hai', 'chihai180121@gmail.com', '78565687', 'ben tre', '4236536', 'Nữ', '2023-06-02', 1, 1, '0', NULL, '1111111111111', NULL, NULL, '2023-07-02 20:10:00', '2023-07-03 02:39:52'),
(4, 'hai111', 'chihai111@gmail.com', '78565687', 'an giang', '4236536345', 'Nam', '2003-06-13', 0, 2, '0', NULL, '11111111111111111111', NULL, NULL, '2023-07-02 20:10:00', '2023-07-01 17:40:04'),
(5, 'chi hai', 'hai22@gmail.com', '0678565687', '11111', '42365366356', 'Nam', '2023-06-15', 0, 2, '0', NULL, '11111111', NULL, NULL, '2023-06-27 18:45:18', '2023-07-02 04:21:53'),
(8, 'phuc', 'phuc@gmail.com', '0976482472', '11111 634565', '85854566545', 'Nam', '2023-06-01', 0, 2, '0', NULL, '22222222', NULL, NULL, '2023-07-02 20:08:00', '2023-07-05 13:36:18'),
(10, 'nguyễn Văn A', 'admin234@Gmail.com', '0678565687', 'hau giang', '423653663564', 'Nữ', '2023-06-08', 0, 2, '0', NULL, '22222222', NULL, NULL, '2023-07-02 20:09:00', '2023-06-30 07:50:39'),
(13, 'chi hai', 'hai@gmail.com', '0678565687', 'vinh long', '42365366333', 'Nữ', '2020-06-28', 1, 1, '0', NULL, '111111111111111', NULL, NULL, '2023-07-02 20:08:00', '2023-07-02 04:18:22'),
(16, 'phong', 'phong@gmail.com', '9745362543', 'can tho', '334443456721', 'Nam', '2023-07-03', 1, 0, '0', NULL, '36455635', NULL, NULL, '2023-07-02 20:07:00', '2023-07-02 04:12:03'),
(18, 'duc anh', 'hai22233@gmail.com', '0987654321', 'can  tho', '434354345534', 'Nữ', '2023-07-14', 0, 0, '0', NULL, '1111111', NULL, NULL, '2023-07-02 11:15:00', NULL),
(20, 'Bùi Chí Hải', 'chihai110@gmail.com', '0987654321', 'vinh long', '434354345564', 'Nam', '2004-02-10', 0, 1, '0', NULL, '11111111', NULL, NULL, '2023-07-02 20:39:00', '2023-07-04 14:48:47'),
(28, 'nguyễn Văn A', 'VanA@gmail.com', '0976482472', '11111 634565', '8585339385', 'Nữ', '', 1, 1, '0', NULL, '$2y$10$m7uHeIr/q3l4TDiRX.oThuFhFNi8mJnjarhzRQCx6yZFW2euj8FC6', NULL, NULL, '2023-07-08 01:39:56', '2023-07-08 01:39:56'),
(30, 'gdfgh', 'fg@gmail.com', '9745362543', 'can tho', '333323456721', 'Nam', '', 1, 1, '0', NULL, '36455635', NULL, NULL, '2023-07-08 01:40:22', '2023-07-08 01:40:22'),
(31, 'bac si trtt', 'hai3344@gmail.com', '9804843434', 'vinh long', '33333333', 'Nam', '2023-06-29', 1, 1, '0', NULL, '$2y$10$RpwZJggjhMLlhpIJzQPy3uxXZ/o4vTDEWIGiO1VZxvrg5Fhy2XL2S', NULL, NULL, '2023-07-08 01:40:22', '2023-07-08 01:40:22'),
(34, 'Duc Anh', 'ducanh@gmail.com', '0912345678', 'Kiên Giang', '123456789876', 'Nam', '2000-06-08', 1, 0, '0', NULL, '$2y$10$tH5ZVkADZnX79T.9obfTIezwO1hjJ8WdTCP6UeKh2OeouGuKl/uC6', NULL, NULL, '2023-07-08 01:58:23', '2023-07-08 01:58:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhs`
--

CREATE TABLE `benhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_patient` int(10) UNSIGNED NOT NULL,
  `benh` varchar(255) DEFAULT NULL,
  `trieuchung` varchar(255) DEFAULT NULL,
  `thoidiemkham` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `benhs`
--

INSERT INTO `benhs` (`id`, `id_patient`, `benh`, `trieuchung`, `thoidiemkham`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'ho', 'cardiology', '2023-06-27 19:01:00', NULL),
(2, 8, NULL, 'ho', 'cardiology', '2023-06-27 19:26:00', NULL),
(3, 10, NULL, 'hô hấp khó khăn', 'cardiology', '2023-06-29 12:26:00', NULL),
(4, 1, NULL, 'cảm nhẹ', 'general', '2023-07-10 17:00:00', NULL),
(5, 2, NULL, 'Đau đầu', 'general', '2023-07-02 13:30:00', NULL),
(6, 20, NULL, 'Đau đầu', 'cardiology', '2023-07-04 14:27:00', NULL),
(7, 4, NULL, 'Đau đầu nhẹ', 'general', '2023-07-04 14:51:00', NULL),
(8, 1, NULL, 'Cảm nhẹ', 'general', '2023-07-07 17:00:00', NULL),
(9, 1, NULL, 'Cảm nhẹ', 'cardiology', '2023-07-07 17:00:00', NULL),
(10, 1, NULL, 'Sốt, Đau nữa đầu', 'general', '2023-07-07 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medicines`
--

CREATE TABLE `medicines` (
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `tenthuoc` varchar(255) NOT NULL,
  `donvi` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` double(8,2) NOT NULL,
  `cachdung` varchar(255) NOT NULL,
  `thanhtien` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `medicines`
--

INSERT INTO `medicines` (`prescription_id`, `tenthuoc`, `donvi`, `soluong`, `gia`, `cachdung`, `thanhtien`, `created_at`, `updated_at`) VALUES
(2, 'Para', 'Viên', 5, 4500.00, 'Sáng 1, Chiều 1', 22500.00, '2023-06-29 08:07:46', '2023-06-29 08:07:46'),
(3, 'Para', 'Viên', 5, 4500.00, 'Sáng 1, Chiều 1', 22500.00, '2023-06-29 08:08:08', '2023-06-29 08:08:08'),
(3, 'Moocphin', 'Ống', 5, 50000.00, 'Sáng 1, Chiều 1', 250000.00, '2023-06-29 08:08:08', '2023-06-29 08:08:08'),
(3, 'Hapacol', 'Viên', 5, 2500.00, 'Sáng 1, Chiều 1', 12500.00, '2023-06-29 08:08:08', '2023-06-29 08:08:08'),
(4, 'Para', 'Viên', 5, 4500.00, 'Sáng 1, Chiều 1', 22500.00, '2023-06-30 00:50:39', '2023-06-30 00:50:39'),
(4, 'Hapacol', 'Viên', 5, 2500.00, 'Sáng 1, Chiều 1', 12500.00, '2023-06-30 00:50:39', '2023-06-30 00:50:39'),
(9, 'Moocphin', 'Ống', 5, 50000.00, 'Sáng 1, Chiều 1', 250000.00, '2023-07-01 03:54:04', '2023-07-01 03:54:04'),
(9, 'Thuốc nhỏ mắt', 'Lọ', 5, 15000.00, 'Sáng 1', 75000.00, '2023-07-01 03:54:04', '2023-07-01 03:54:04'),
(10, 'Moocphin', 'Ống', 5, 50000.00, 'Sáng 1, Chiều 1', 250000.00, '2023-07-01 10:40:04', '2023-07-01 10:40:04'),
(10, 'Thuốc nhỏ mắt', 'Viên', 5, 15000.00, 'Sáng 1, Chiều 1', 75000.00, '2023-07-01 10:40:04', '2023-07-01 10:40:04'),
(11, 'Moocphin', 'Ống', 3, 50000.00, 'Sáng 1, Chiều 1', 150000.00, '2023-07-01 21:21:53', '2023-07-01 21:21:53'),
(11, 'Hapacol', 'Viên', 3, 2500.00, 'Trưa 1', 7500.00, '2023-07-01 21:21:53', '2023-07-01 21:21:53'),
(13, 'Moocphin', 'Ống', 7, 50000.00, 'Sáng 1, Chiều 1', 350000.00, '2023-07-05 06:36:18', '2023-07-05 06:36:18'),
(13, 'Thuốc nhỏ mắt', 'Viên', 7, 15000.00, 'Sáng 1, Chiều 1', 105000.00, '2023-07-05 06:36:18', '2023-07-05 06:36:18'),
(13, 'Hapacol', 'Viên', 7, 2500.00, 'Sáng 1, Chiều 1', 17500.00, '2023-07-05 06:36:18', '2023-07-05 06:36:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_10_162732_create_sessions_table', 1),
(7, '2023_06_14_083723_create_bacsis_table', 2),
(8, '2023_06_14_083734_create_ytas_table', 2),
(9, '2023_06_14_083744_create_admins_table', 2),
(10, '2023_06_14_083756_create_benhs_table', 2),
(11, '2023_06_14_083808_create_chisosuckhoes_table', 2),
(12, '2023_06_14_083822_create_baiviets_table', 2),
(13, '2023_06_14_083835_create_binhluans_table', 2),
(14, '2023_06_14_083853_create_phieuthanhtoans_table', 2),
(15, '2023_06_14_083927_create_phuongthuckhams_table', 3),
(16, '2023_06_14_084001_create_phieudangkys_table', 4),
(17, '2023_06_14_084016_create_khos_table', 4),
(18, '2023_06_14_084025_create_thuocs_table', 4),
(19, '2023_06_14_083652_create_benhnhans_table', 5),
(20, '2023_06_14_083943_create_nhomthuocs_table', 6),
(21, '2023_06_14_091708_nhomthuocs', 7),
(22, '2023_06_14_083907_create_kedonthuocs_table', 8),
(23, '2023_06_15_141826_create_benhnhans_table', 9),
(24, '2023_06_24_091841_create_prescriptions_table', 10),
(25, '2023_06_24_095556_create_prescriptions_table', 11),
(26, '2023_06_24_100458_create_prescriptions_table', 12),
(27, '2023_06_24_100743_create_prescriptions_table', 13),
(28, '2023_06_24_102454_create_medicines_table', 14),
(29, '2023_06_25_113606_create_prescriptions_table', 15),
(30, '2023_06_25_113619_create_medicines_table', 15),
(31, '2023_06_27_175701_create_benhnhans_table', 16),
(32, '2023_06_27_211245_create_bacsis_table', 17),
(33, '2023_06_27_211445_create_bacsis_table', 18),
(34, '2023_06_27_211802_create_ytas_table', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('VanA@gmail.com', '$2y$10$suLQw9Psa8WF9IzMzQIjxOorsBQ69WaElBjewh6jBu2NZVtkZalqa', '2023-07-01 11:09:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuthanhtoans`
--

CREATE TABLE `phieuthanhtoans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nurse` int(10) UNSIGNED NOT NULL,
  `id_patient` int(10) UNSIGNED NOT NULL,
  `ngaythang` date NOT NULL,
  `sotien` double(8,2) NOT NULL,
  `tongtien` double(8,2) NOT NULL,
  `qr` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_doctor` varchar(255) NOT NULL,
  `id_patient` int(10) NOT NULL,
  `ten_bn` varchar(255) DEFAULT NULL,
  `ngaykham` datetime NOT NULL,
  `hentaikham` datetime DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `chandoan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `ten_doctor`, `id_patient`, `ten_bn`, `ngaykham`, `hentaikham`, `tongtien`, `chandoan`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Bác Sĩ', 2, 'hai', '2023-06-29 22:07:00', '2023-07-06 22:07:00', 22500, 'nhiễm trùng ngoài da  dfhsdfh', '2023-06-29 08:07:28', '2023-06-29 08:07:46'),
(3, 'Nguyễn Bác Sĩ', 8, 'nguyễn Văn A', '2023-06-29 22:07:00', '2023-07-06 22:07:00', 285000, 'nhiễm trùng ngoài da', '2023-06-29 08:07:57', '2023-06-29 08:08:08'),
(4, 'Nguyễn Bác Sĩ', 10, 'nguyễn Văn A', '2023-06-30 14:38:00', '2023-07-07 14:50:00', 35000, 'nhiễm trùng ngoài da', '2023-06-30 00:50:26', '2023-06-30 00:50:39'),
(9, 'Nguyễn Bác Sĩ', 1, 'Duc', '2023-07-01 17:53:00', '2023-07-08 17:53:00', 325000, 'nguuuu', '2023-07-01 03:53:43', '2023-07-01 03:54:04'),
(10, 'Nguyễn Bác Sĩ', 4, 'hai111', '2023-07-02 00:39:00', '2023-07-09 00:39:00', 325000, 'nhiễm trùng nhẹ', '2023-07-01 10:39:32', '2023-07-01 10:40:04'),
(11, 'Nguyễn Bác Sĩ', 5, 'chi hai', '2023-07-02 11:18:00', '2023-07-09 11:18:00', 157500, 'Ho', '2023-07-01 21:18:57', '2023-07-01 21:21:53'),
(12, 'Nguyễn Bác Sĩ', 8, 'nguyễn Văn A', '2023-07-02 11:23:00', NULL, NULL, NULL, '2023-07-01 21:23:34', '2023-07-01 21:23:34'),
(13, 'Nguyễn Bác Sĩ', 8, 'phuc', '2023-07-05 20:35:00', '2023-07-12 20:35:00', 472500, 'Ho', '2023-07-05 06:35:59', '2023-07-05 06:36:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MWJ9nCu1VIIT488GUJYzMSviugdjXd3VfA7INtzs', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRnRSc0pNYjkxRjNldEx6aldTM25SRHRxbHRGWFY1d3hhTU84Y2pkeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1688781556);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuocs`
--

CREATE TABLE `thuocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `lothuoc` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ngaynhap` date DEFAULT NULL,
  `dongia` double(8,2) NOT NULL,
  `dangbaoche` varchar(255) DEFAULT NULL,
  `tennhacungcap` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuocs`
--

INSERT INTO `thuocs` (`id`, `lothuoc`, `name`, `ngaynhap`, `dongia`, `dangbaoche`, `tennhacungcap`, `created_at`, `updated_at`) VALUES
(2, 12, 'Moocphin', '2023-06-25', 50000.00, 'Ống', 'Pharma', NULL, NULL),
(3, 28484, 'Hapacol', '2023-06-25', 2500.00, 'Viên', 'TS', NULL, NULL),
(4, 1111, 'Thuốc nhỏ mắt', '2023-06-30', 15000.00, 'Viên', 'trung sơn', '2023-06-30 06:05:02', '2023-07-01 03:58:32'),
(7, 1111, 'Para2', '2023-07-02', 1500.00, 'Viên', 'trung sơn', '2023-07-01 21:07:53', '2023-07-01 21:07:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ngaysinh` varchar(50) NOT NULL,
  `cccd` varchar(12) DEFAULT NULL,
  `gender` varchar(5) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `examination_service` tinyint(1) DEFAULT 1,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `ngaysinh`, `cccd`, `gender`, `address`, `examination_service`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Duc', 'duc@Gmail.com', '0123456789', '', '64564647657', 'Nam', 'Kien Giang', 1, '0', NULL, '$2y$10$CLdRseV3vGQ6oR28.uB08eA6r8i7exPE1uFdj3xQOqYO9K0TBwiQ2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-14 09:20:43', '2023-06-14 09:20:43'),
(3, 'admin', 'admin@Gmail.com', '09999999', '', NULL, 'Nam', 'Can Tho', NULL, '1', NULL, '$2y$10$19pqV2eVOdPYCVhXmdbffePLQijkwJHD8zRZYF6pLt7RCv9U4VJ2e', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-14 09:22:53', '2023-06-14 09:22:53'),
(5, 'nurse', 'nurse@Gmail.com', '077777777', '', NULL, 'Nam', 'Can Tho', NULL, '3', NULL, '$2y$10$e35HUl3dStiWZ4HjmaHY3ONAyvdCTYU481wjwmdBKC74q44LFOM1u', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-14 09:24:51', '2023-06-14 09:24:51'),
(6, 'Nguyễn Bác Sĩ', 'bacsi@gmail.com', '0987654321', '', '54545465464', 'Nam', 'Cần Thơ', NULL, '2', NULL, '$2y$10$06HNtTEUSTsxNRHbzakJruZFGldtqmImNVLxhjyiwAIvOAVt7OkN2', NULL, NULL, NULL, 'evtnftaqT09ilUxlUYDgFH0XHEEqfsVeAC3kvCZockukt7l7a8OExkMiiK3Z', NULL, NULL, '2023-06-14 10:15:48', '2023-06-27 12:22:39'),
(7, 'yta', 'yta@gmail.com', '0111', '', NULL, 'Nữ', 'cm', NULL, '3', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-14 10:27:49', '2023-06-14 10:27:49'),
(9, 'bacsi2', 'bacsi2@gmail.com', '01222', '', NULL, 'Nữ', 'ag', NULL, '2', NULL, '1111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-14 10:33:13', '2023-06-14 10:33:13'),
(10, 'đáa', 'admin1@Gmail.com', '11111', '', NULL, 'Nữ', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, '2', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-15 14:34:19', '2023-06-15 14:34:19'),
(11, 'đáa', 'admin2@Gmail.com', '11111', '', NULL, 'Nam', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, '2', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-15 14:37:16', '2023-06-15 14:37:16'),
(13, 'đáa', 'admin3@Gmail.com', '11111', '', NULL, 'Nữ', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, '2', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-15 14:39:32', '2023-06-15 14:39:32'),
(15, 'sss', 'admin4@Gmail.com', '11111', '', NULL, 'Nam', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, '2', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-15 14:40:40', '2023-06-15 14:40:40'),
(16, 'ssss', 'admin5@Gmail.com', '11111', '', NULL, 'Nam', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, '2', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-15 14:42:37', '2023-06-15 14:42:37'),
(18, 'nguyen', 'hai21@gmail.com', '091234568765', '', NULL, 'Nữ', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, '3', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-15 17:13:25', '2023-06-15 17:13:25'),
(20, 'hai', 'chihai180121@gmail.com', '78565687', '', '4236536', 'Nữ', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', 1, '0', NULL, '1111111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-16 20:35:00', NULL),
(26, 'chi hai', 'hai22@gmail.com', '0678565687', '', '42365366356', 'Nữ', '11111', 0, '0', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-11 21:06:00', NULL),
(27, 'chi hai', 'hai@gmail.com', '0678565687', '', '42365366333', 'Nữ', '11111444444444444444444', 1, '0', NULL, '111111111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 22:01:00', NULL),
(28, 'nguyễn Văn A', 'VanA@gmail.com', '0976482472', '', '8585339385', 'Nữ', '11111 634565', 0, '0', NULL, '$2y$10$m7uHeIr/q3l4TDiRX.oThuFhFNi8mJnjarhzRQCx6yZFW2euj8FC6', NULL, NULL, NULL, '1olXg8AFQGdiOO4mL7MMCXjCz0JdZ20spyIVqy5Svy9ZkCwBvmBilY9fgMtT', NULL, NULL, '2023-06-18 21:14:00', '2023-06-28 11:45:14'),
(32, 'nguyen', 'VanAaaa@gmail.com', '123213', '', '423653663511', 'Nữ', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', 1, '2', NULL, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 12:53:08', '2023-06-30 12:53:08'),
(33, 'truong', 'yta23123@gmail.com', '11111', '', '423653661111', 'Nam', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', 1, '3', NULL, '33333333333', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 12:57:45', '2023-06-30 12:57:45'),
(34, 'bac si nha', 'hai11@gmail.com', '9804843434', '', '434354345534', 'Nữ', 'can  tho', 1, '2', NULL, '$2y$10$J/OMWTCQBFGmWr/oXHjtf.A6nbjN9eAF36oMD9c6whEidG7c7UUgW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 08:09:29', '2023-07-01 08:09:29'),
(35, 'gdfgh', 'fg@gmail.com', '9745362543', '', '333323456721', 'Nam', 'can tho', 1, '0', NULL, '36455635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'bac si toi', 'hai12@gmail.com', '9804843434', '', '434354345566', 'nam', 'can  tho', 1, '2', NULL, '$2y$10$t//OhQmFHMZFwUYjmdPA9OLBHXiXm.Aq1astKk0ngtS/N/PXzS/Ou', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 08:59:49', '2023-07-01 08:59:49'),
(44, 'bac si B', 'hai222221@gmail.com', '9804843434', '2023-07-11', '434354343334', 'nam', 'can  tho', 1, '2', NULL, '$2y$10$m8/A6afUXcNtTv7vGGTLbevTjP6G0gmp3FTrC2jVzIviJ1N/PxxVK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-02 12:37:55', '2023-07-02 12:37:55'),
(46, 'bac si trtt', 'hai3344@gmail.com', '9804843434', '2023-06-29', '33333333', 'Nam', 'vinh long', 1, '0', NULL, '$2y$10$RpwZJggjhMLlhpIJzQPy3uxXZ/o4vTDEWIGiO1VZxvrg5Fhy2XL2S', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-08 01:32:37', '2023-07-08 01:32:37'),
(49, 'Duc Anh', 'ducanh@gmail.com', '0912345678', '2000-06-08', '123456789876', 'Nam', 'Kiên Giang', 1, '0', NULL, '$2y$10$tH5ZVkADZnX79T.9obfTIezwO1hjJ8WdTCP6UeKh2OeouGuKl/uC6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-08 01:58:14', '2023-07-08 01:58:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ytas`
--

CREATE TABLE `ytas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_yt` varchar(255) NOT NULL,
  `email_yt` varchar(255) NOT NULL,
  `phone_yt` varchar(255) DEFAULT NULL,
  `address_yt` varchar(255) DEFAULT NULL,
  `cccd_yt` varchar(255) DEFAULT NULL,
  `gender_yt` tinyint(1) NOT NULL DEFAULT 1,
  `usertype` varchar(255) NOT NULL DEFAULT '3',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password_yt` varchar(255) NOT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ytas`
--

INSERT INTO `ytas` (`id`, `name_yt`, `email_yt`, `phone_yt`, `address_yt`, `cccd_yt`, `gender_yt`, `usertype`, `email_verified_at`, `password_yt`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'nurse', 'nurse@Gmail.com', '077777777', 'Can Tho', NULL, 1, '3', NULL, '$2y$10$e35HUl3dStiWZ4HjmaHY3ONAyvdCTYU481wjwmdBKC74q44LFOM1u', NULL, NULL, '2023-06-15 00:30:48', '2023-06-15 00:30:48'),
(2, 'yta', 'yta@gmail.com', '0111', 'cm', NULL, 0, '3', NULL, '11111111', NULL, NULL, '2023-06-15 00:30:48', '2023-06-15 00:30:48'),
(7, 'nguyen', 'hai21@gmail.com', '091234568765', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 1, '3', NULL, '11111111', NULL, NULL, '2023-06-15 03:18:13', '2023-06-15 03:18:13'),
(8, 'truong', 'hai1333@gmail.com', '0912876593', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', NULL, 0, '3', NULL, '11111111', NULL, NULL, '2023-06-15 03:18:13', '2023-06-15 03:18:13'),
(9, 'hsdfgsdf', 'Va@gmail.com', '4563456781', 'can tho', '111222333444', 1, '3', NULL, '33333333', NULL, NULL, '2023-06-27 15:18:36', '2023-06-27 15:18:36'),
(10, 'truong', 'yta23123@gmail.com', '11111', 'Thị trấn Tân Quới, Huyện Bình Tân, Tỉnh Vĩnh Long', '423653661111', 0, '3', NULL, '33333333333', NULL, NULL, '2023-06-30 05:57:46', '2023-06-30 05:57:46'),
(11, 'bac si toi', 'hai14@gmail.com', '9804843434', 'can  tho', '434354345577', 0, '3', NULL, '$2y$10$xSzfAAxDqvjdJaT8zroMN.LxMbBuriNm148IKdYxLayifmhT/pxqS', NULL, NULL, '2023-07-01 02:02:38', '2023-07-01 02:02:38'),
(12, 'bac si AAAAAA', 'hai111111111@gmail.com', '9804843434', 'can  tho', '434354345222', 1, '3', NULL, '$2y$10$YLwQaY.VL.FdhYRu.MsB..s9jCrcfkaixsA/P30/O4e4Re3tEUsPK', NULL, NULL, '2023-07-01 03:57:51', '2023-07-01 03:57:51'),
(13, 'bac si C', 'hai22222@gmail.com', '9804843434', 'can  tho', '434354445534', 0, '3', NULL, '$2y$10$ZCviBLN5bZzNlCuHnTFU6OTR4lVUHdTamRNZyICo8NTtyXuPadXEW', NULL, NULL, '2023-07-02 05:40:29', '2023-07-02 05:40:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `bacsis`
--
ALTER TABLE `bacsis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bacsis_email_bs_unique` (`email_bs`);

--
-- Chỉ mục cho bảng `baiviets`
--
ALTER TABLE `baiviets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `benhnhans`
--
ALTER TABLE `benhnhans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `benhnhans_email_bn_unique` (`email_bn`),
  ADD UNIQUE KEY `benhnhans_cccd_bn_unique` (`cccd_bn`);

--
-- Chỉ mục cho bảng `benhs`
--
ALTER TABLE `benhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `benhs_id_patient_foreign` (`id_patient`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `medicines`
--
ALTER TABLE `medicines`
  ADD KEY `medicines_prescription_id_foreign` (`prescription_id`),
  ADD KEY `prescription_id` (`prescription_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phieuthanhtoans`
--
ALTER TABLE `phieuthanhtoans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieuthanhtoans_id_nurse_foreign` (`id_nurse`),
  ADD KEY `phieuthanhtoans_id_patient_foreign` (`id_patient`);

--
-- Chỉ mục cho bảng `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `thuocs`
--
ALTER TABLE `thuocs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `ytas`
--
ALTER TABLE `ytas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ytas_email_yt_unique` (`email_yt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bacsis`
--
ALTER TABLE `bacsis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `baiviets`
--
ALTER TABLE `baiviets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `benhnhans`
--
ALTER TABLE `benhnhans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `benhs`
--
ALTER TABLE `benhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieuthanhtoans`
--
ALTER TABLE `phieuthanhtoans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thuocs`
--
ALTER TABLE `thuocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `ytas`
--
ALTER TABLE `ytas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `benhs`
--
ALTER TABLE `benhs`
  ADD CONSTRAINT `benhs_id_patient_foreign` FOREIGN KEY (`id_patient`) REFERENCES `benhnhans` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `prescriptions_id_patient_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`);

--
-- Các ràng buộc cho bảng `phieuthanhtoans`
--
ALTER TABLE `phieuthanhtoans`
  ADD CONSTRAINT `phieuthanhtoans_id_nurse_foreign` FOREIGN KEY (`id_nurse`) REFERENCES `ytas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieuthanhtoans_id_patient_foreign` FOREIGN KEY (`id_patient`) REFERENCES `benhnhans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
