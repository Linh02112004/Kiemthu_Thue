-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th12 05, 2024 lúc 05:28 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tinh_thue`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong_nhan_vien`
--

CREATE TABLE `luong_nhan_vien` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `MSNV` varchar(50) NOT NULL,
  `thang` int(11) DEFAULT NULL,
  `nam` int(11) DEFAULT NULL,
  `luong_co_ban` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luong_nhan_vien`
--

INSERT INTO `luong_nhan_vien` (`id`, `ho_ten`, `MSNV`, `thang`, `nam`, `luong_co_ban`) VALUES
(1, '0', '', 2, 2023, '20000000.00'),
(2, '0', '', 2, 2023, '20000000.00'),
(3, 'NGUYEN KIM ANH', '1234', 2, 2024, '20000000.00'),
(4, 'NGUYEN ANH MINH', '1234', 3, 2024, '20000000.00'),
(5, 'NGUYEN KIM ANH', '1234', 2, 2024, '20000000.00'),
(6, 'NGUYEN ANH MINH', '123', 3, 2024, '20000000.00'),
(7, 'NGUYEN KIM ANH', '1234', 12, 2024, '20000000.00'),
(8, 'NGUYEN ANH MINH', '123', 12, 2024, '20000000.00'),
(9, 'NGUYEN ANH BINH', '123a', 12, 2024, '20000000.00'),
(10, 'NGUYEN VAN B', '123c', 12, 2024, '20000000.00'),
(11, 'NGUYEN ANH QUAN', '123c', 1, 2025, '20000000.00'),
(12, 'TRAN CAO KHANH', '123X', 12, 2024, '20000000.00'),
(13, 'HO NGOC MINH PHUONG', '123s', 12, 2024, '20000000.00'),
(14, 'NGUYEN ANH A', '123a', 12, 2024, '20000000.00'),
(15, 'NGUYEN ANH C', '123', 12, 2024, '20000000.00'),
(16, 'NGUYEN ANH D', '123d', 12, 2024, '20000000.00'),
(17, 'NGUYEN ANH BINH', '123', 12, 2024, '20000000.00'),
(18, 'NGUYEN ANH BINH', '123', 12, 2024, '20000000.00'),
(19, 'NGUYEN ANH BINH', '123', 12, 2024, '20000000.00'),
(20, 'NGUYEN ANH BINH', '123', 12, 2024, '20000000.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(255) DEFAULT NULL,
  `tai_khoan` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `ms_thue` varchar(20) DEFAULT NULL,
  `chuc_vu` enum('truong_phong','ke_toan','nhan_vien') DEFAULT NULL,
  `phong_ban` enum('marketing','kinh_doanh','nhan_su','sale') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `ho_ten`, `tai_khoan`, `mat_khau`, `ms_thue`, `chuc_vu`, `phong_ban`) VALUES
(1, 'HO THI HUONG', 'huong@gmail.com', 'huong123', '1234a', 'ke_toan', NULL),
(2, 'NGUYEN NGOC LINH', 'linh@gmail.com', 'linh123', '1234d', 'nhan_vien', 'kinh_doanh'),
(4, 'TRAN QUANG KHANH', 'khanh@gmail.com', 'khanh123@', '1234s', 'nhan_vien', 'kinh_doanh'),
(5, 'TRAN QUANG VY', 'vy@gmail.com', 'vy123@', '1234s', 'nhan_vien', 'kinh_doanh'),
(6, 'DAO XUAN DAT', 'dat@gmail.com', 'dat123@', '1234c', 'nhan_vien', 'kinh_doanh'),
(7, 'LE VAN PHUNG', 'phung@gmail.com', 'phung123@', '1234x', 'nhan_vien', 'kinh_doanh'),
(18, 'fjenv', 'admin', '$2y$10$atoUKFboTRZhm8eLMLDTiuuOijk1.CLaB8KGgmEKI2qLYs8kv2bIi', '124687', 'truong_phong', 'marketing'),
(19, 'anan', 'abc@gmail.com', '$2y$10$J37qlOWmZTPjUNWfDq924.XLesJ9PYAHoSPAzRk0FyOFGo9zGCUgK', '12345', 'nhan_vien', 'kinh_doanh'),
(20, 'anan', 'abc@gmail.com', '$2y$10$Htm4dO9ZrUuIuBQOEju/PeyVkwlNfCODU2C.PJUQVfW0M54/BrfE.', '12345', 'nhan_vien', 'kinh_doanh'),
(24, 'a', 'ư', '$2y$10$BEbZLqMiY5nzZSl79Az5GudamUIC608aGUCmPvYai8XHKrByVPvhm', '1234', 'ke_toan', 'kinh_doanh'),
(26, 'fjenv', 'abc@gmail.com', '$2y$10$k2bmeMu81VsXvaxSSsUAa.WJnorK44EqasTRDstiyQ9jvOxiBwqT6', '12', 'nhan_vien', 'kinh_doanh'),
(30, 'anan', 'abc@gmail.com', '$2y$10$32NDQ/dvJID19PgUWjBUkOOonbyVvjzUC2Vji6xR1j1xTFSpWdeUW', '123', 'nhan_vien', 'kinh_doanh'),
(31, 'd', 'a', '$2y$10$skO1G2B/8HXyTxnalEIdc.YbfINUx2FZwBO1.dh2kJ8SmRuSkGohC', '123', 'nhan_vien', 'nhan_su'),
(32, 'q', 'a', '$2y$10$mLC2gJNCZgTv4VLRbkJ8L.VceZoCiisjRcwuECqt84Hg8mgdz/EXu', '123', 'nhan_vien', 'kinh_doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietlap_giamtru`
--

CREATE TABLE `thietlap_giamtru` (
  `id` int(11) NOT NULL,
  `thang` int(11) DEFAULT NULL,
  `nam` int(11) DEFAULT NULL,
  `giam_tru_ca_nhan` double DEFAULT NULL,
  `giam_tru_nguoiPT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thietlap_giamtru`
--

INSERT INTO `thietlap_giamtru` (`id`, `thang`, `nam`, `giam_tru_ca_nhan`, `giam_tru_nguoiPT`) VALUES
(1, 2, 2024, 11000000, 4400000),
(2, 3, 2024, 11000000, 4400000),
(4, 2, 2023, 11000000, 4400000),
(5, 3, 2023, 11000000, 4400000),
(6, 4, 2023, 11000000, 4400000),
(7, 5, 2025, 11000000, 4400000),
(8, 6, 2023, 11000000, 4400000),
(9, 7, 2023, 11000000, 4400000),
(21, NULL, NULL, 1000, 1000),
(22, 1, 2027, 100, 100),
(23, 12, 2024, 12000, 12000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `id` int(11) NOT NULL,
  `luong_min` decimal(15,2) DEFAULT NULL,
  `luong_max` decimal(15,2) DEFAULT NULL,
  `thue_suat` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`id`, `luong_min`, `luong_max`, `thue_suat`) VALUES
(1, '0.00', '5000000.00', '5.00'),
(2, '50001000.00', '7000000.00', '6.00'),
(3, '0.00', '5000000.00', '5.00'),
(4, '50001000.00', '7000000.00', '6.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `update_thong_tin`
--

CREATE TABLE `update_thong_tin` (
  `ms_nhan_vien` int(11) NOT NULL,
  `ho_ten_id` int(11) DEFAULT NULL,
  `que_quan` varchar(255) DEFAULT NULL,
  `dia_chi_hien_tai` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `so_nguoiPT` int(11) DEFAULT NULL,
  `gioi_tinh` enum('nam','nu') DEFAULT 'nam',
  `phong_ban` enum('marketing','kinh_doanh','nhan_su','sale') DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `update_thong_tin`
--

INSERT INTO `update_thong_tin` (`ms_nhan_vien`, `ho_ten_id`, `que_quan`, `dia_chi_hien_tai`, `sdt`, `ngay_sinh`, `so_nguoiPT`, `gioi_tinh`, `phong_ban`, `anh`) VALUES
(1, 4, 'HÀ ĐÔNG - HÀ NỘI', 'HÀ ĐÔNG - HÀ NỘI', '0987654321', '0000-00-00', 1, 'nam', 'kinh_doanh', NULL),
(2, 2, 'HÀ ĐÔNG - HÀ NỘI', 'QUẢNG YÊN - QUẢNG NINH', '07654321211', '0000-00-00', 1, 'nu', 'kinh_doanh', NULL),
(5, 5, 'HÀ ĐÔNG - HÀ NỘI', 'HÀ ĐÔNG - HÀ NỘI', '0987654321', '1894-03-08', 1, 'nam', 'kinh_doanh', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `luong_nhan_vien`
--
ALTER TABLE `luong_nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thietlap_giamtru`
--
ALTER TABLE `thietlap_giamtru`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `update_thong_tin`
--
ALTER TABLE `update_thong_tin`
  ADD PRIMARY KEY (`ms_nhan_vien`),
  ADD KEY `ho_ten_id` (`ho_ten_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `luong_nhan_vien`
--
ALTER TABLE `luong_nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `thietlap_giamtru`
--
ALTER TABLE `thietlap_giamtru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `thue`
--
ALTER TABLE `thue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `update_thong_tin`
--
ALTER TABLE `update_thong_tin`
  MODIFY `ms_nhan_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `update_thong_tin`
--
ALTER TABLE `update_thong_tin`
  ADD CONSTRAINT `update_thong_tin_ibfk_1` FOREIGN KEY (`ho_ten_id`) REFERENCES `tai_khoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
