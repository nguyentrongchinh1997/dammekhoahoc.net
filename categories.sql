-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 20, 2020 lúc 06:51 AM
-- Phiên bản máy phục vụ: 10.2.31-MariaDB
-- Phiên bản PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dammekhoahoc.net`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Công nghệ', 'cong-nghe', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(2, 'Đời sống', 'doi-song', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(3, 'Khám phá khoa học', 'kham-pha-khoa-hoc', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(4, 'Khoa học vũ trụ', 'khoa-hoc-vu-tru', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(5, '1001 bí ẩn', '1001-bi-an', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(6, 'Y học - Sức khỏe', 'y-hoc-suc-khoe', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(7, 'Công nghệ mới', 'cong-nghe-moi', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(8, 'Phần mềm hữu ích', 'phan-mem-huu-ich', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(9, 'Khoa học máy tính', 'khoa-hoc-may-tinh', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(10, 'Phát minh khoa học', 'phat-minh-khoa-hoc', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(11, 'AI - Trí tuệ nhân tạo', 'ai-tri-tue-nhan-tao', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(12, 'Sinh vật học', 'sinh-vat-hoc', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(13, 'Khảo cổ học', 'khao-co-hoc', '2020-05-12 21:02:19', '2020-05-12 21:02:19'),
(14, 'Đại dương học', 'dai-duong-hoc', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(15, 'Thế giới động vật', 'the-gioi-dong-vat', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(16, 'Danh nhân thế giới', 'danh-nhan-the-gioi', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(17, 'Ngày tận thế', 'ngay-tan-the', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(18, 'Chinh phục ngôi sao', 'chinh-phuc-ngoi-sao', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(19, 'Kỳ quan thế giới', 'ky-quan-the-gioi', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(20, 'Người ngoài hành tinh', 'nguoi-ngoai-hanh-tinh', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(21, 'Trắc nghiệm khoa học', 'trac-nghiem-khoa-hoc', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(22, 'Lịch sử', 'lich-su', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(23, 'Khoa học quân sự', 'khoa-hoc-quan-su', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(24, 'Bệnh và thông tin bệnh', 'benh-va-thong-tin-benh', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(25, 'Môi trường', 'moi-truong', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(26, 'Bệnh ung thư', 'benh-ung-thu', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(27, 'Ứng dụng khoa học', 'ung-dung-khoa-hoc', '2020-05-12 21:02:20', '2020-05-12 21:02:20'),
(28, 'Khoa học và bạn đọc', 'khoa-hoc-va-ban-doc', '2020-05-12 21:02:21', '2020-05-12 21:02:21'),
(29, 'Công trình khoa học', 'cong-trinh-khoa-hoc', '2020-05-12 21:02:21', '2020-05-12 21:02:21'),
(30, 'Câu chuyện khoa học', 'cau-chuyen-khoa-hoc', '2020-05-12 21:02:21', '2020-05-12 21:02:21'),
(31, 'Sự kiện khoa học', 'su-kien-khoa-hoc', '2020-05-12 21:02:21', '2020-05-12 21:02:21'),
(32, 'Thư viện ảnh', 'thu-vien-anh', '2020-05-12 21:02:21', '2020-05-12 21:02:21'),
(33, 'Góc hài hước', 'goc-hai-huoc', '2020-05-12 21:02:21', '2020-05-12 21:02:21'),
(34, 'Video', 'video', '2020-05-12 21:02:21', '2020-05-12 21:02:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
