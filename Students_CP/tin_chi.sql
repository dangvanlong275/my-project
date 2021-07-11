-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 11, 2021 lúc 08:44 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tin_chi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clasess`
--

CREATE TABLE `clasess` (
  `malop` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `clasess`
--

INSERT INTO `clasess` (`malop`, `name`) VALUES
(2, 'Lập trình'),
(3, 'Toán'),
(4, 'Cơ sở dữ liệu'),
(5, 'Web');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_clasess`
--

CREATE TABLE `detail_clasess` (
  `malop` int(20) NOT NULL,
  `mamon` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_clasess`
--

INSERT INTO `detail_clasess` (`malop`, `mamon`) VALUES
(2, 1),
(2, 2),
(2, 17),
(2, 19),
(3, 3),
(3, 9),
(3, 10),
(4, 5),
(4, 11),
(4, 12),
(5, 8),
(5, 15),
(5, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_major`
--

CREATE TABLE `detail_major` (
  `masv` int(20) NOT NULL,
  `manghanh` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_major`
--

INSERT INTO `detail_major` (`masv`, `manghanh`) VALUES
(1, 2),
(2, 5),
(3, 3),
(4, 5),
(5, 6),
(6, 2),
(7, 2),
(8, 3),
(9, 4),
(10, 2),
(11, 5),
(12, 3),
(13, 4),
(14, 6),
(15, 2),
(16, 6),
(17, 4),
(18, 2),
(19, 3),
(20, 2),
(21, 5),
(22, 5),
(23, 3),
(24, 1),
(25, 2),
(30, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_student`
--

CREATE TABLE `detail_student` (
  `masv` int(20) NOT NULL,
  `malop` int(20) NOT NULL,
  `mamon` int(20) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_student`
--

INSERT INTO `detail_student` (`masv`, `malop`, `mamon`, `date`) VALUES
(1, 2, 2, '2021-07-04 07:32:12'),
(1, 3, 9, '2021-07-04 07:32:12'),
(1, 3, 10, '2021-07-04 07:32:12'),
(1, 4, 12, '2021-07-04 07:32:12'),
(1, 5, 15, '2021-07-04 07:32:12'),
(2, 3, 10, '2021-06-25 09:12:38'),
(2, 4, 5, '2021-06-25 09:12:38'),
(2, 5, 8, '2021-06-25 09:12:38'),
(2, 5, 15, '2021-06-25 09:12:38'),
(4, 5, 8, '2021-06-26 14:06:01'),
(5, 3, 3, '2021-07-02 18:40:58'),
(7, 2, 1, '2021-07-03 18:04:11'),
(7, 2, 2, '2021-07-03 18:04:11'),
(7, 2, 17, '2021-07-03 18:04:11'),
(7, 5, 15, '2021-07-03 18:04:11'),
(19, 3, 9, '2021-06-25 09:13:29'),
(19, 3, 10, '2021-06-25 09:13:29'),
(19, 4, 12, '2021-06-25 09:13:29'),
(19, 5, 15, '2021-06-25 09:13:29'),
(23, 3, 3, '2021-06-25 09:13:40'),
(23, 3, 9, '2021-06-25 09:13:40'),
(23, 4, 12, '2021-06-25 09:13:40'),
(23, 5, 8, '2021-06-25 09:13:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `major`
--

CREATE TABLE `major` (
  `manghanh` int(20) NOT NULL,
  `tennghanh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigiandaotao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `major`
--

INSERT INTO `major` (`manghanh`, `tennghanh`, `thoigiandaotao`) VALUES
(1, 'Công nghệ thông tin', 4),
(2, 'Báo chí', 4),
(3, 'Công nghệ sinh học', 4),
(4, 'Xã hội học', 4),
(5, 'Kỹ thuật phần mềm', 4),
(6, 'Quản lý dữ liệu', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `masv` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(20) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`masv`, `name`, `age`, `address`) VALUES
(1, 'Chelsea Cranniss', 21, '1 7th Laner'),
(2, 'Rip Lincey', 24, '8 Sunnyside Place'),
(3, 'Dmitri McGrah', 24, '1359 Ronald Regan Point'),
(4, 'Tadeas Torrie', 18, '48117 Farragut Terrace'),
(5, 'Felicity Lanktree', 22, '9871 Acker Plaza'),
(6, 'Sargent Caccavale', 20, '1 Monterey Center'),
(7, 'Viva Crehan', 19, '999 Nancy Street'),
(8, 'Thomas Tom', 21, 'America'),
(9, 'Christan Ambroix', 19, '12236 Summit Junction'),
(10, 'Bogart Gogie', 20, '1619 Sundown Way'),
(11, 'Conrad Colcomb', 18, '1920 Kennedy Alley'),
(12, 'Corrine Sinyard', 22, '1 Mccormick Parkway'),
(13, 'Drusi Janes', 22, '84901 David Plaza'),
(14, 'Edeline Niesing', 21, '2 Briar Crest Street'),
(15, 'Danna Simek', 24, '41 Gale Parkway'),
(16, 'Robbie Nicolson', 20, '90 Lakeland Parkway'),
(17, 'Marika Offner', 24, '81 Loftsgordon Road'),
(18, 'Rasla Stollmeyer', 23, '2180 Brentwood Lane'),
(19, 'Maryellen Bauckham', 21, '7 Sutherland Junction'),
(20, 'Cornie Hindrick', 18, '2 Waxwing Crossing'),
(21, 'Gerhard Saxon', 19, '5944 Melrose Center'),
(22, 'Candy Karolowski', 24, '92829 Duke Lane'),
(23, 'Maxim Sadry', 21, '13 Debra Terrace'),
(24, 'Ronnie Lidgey', 19, '032 Redwing Park'),
(25, 'Mayor Dawney', 24, '9448 Sundown Lane'),
(26, 'Rip Voice', 24, '122 Acker Junction'),
(27, 'Gustavo Goudie', 23, '2 Corry Court'),
(28, 'Kimmy Pechet', 19, '8 Sutteridge Circle'),
(29, 'Andre Abrey', 21, '7 Donald Court'),
(30, 'Boigie Rydings', 21, '61053 Surrey Crossing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `mamon` int(20) NOT NULL,
  `tenmon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotinchi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`mamon`, `tenmon`, `sotinchi`) VALUES
(1, 'Tin học đại cương', '3'),
(2, 'Kỹ thuật lập trình 2', '3'),
(3, 'Toán cao cấp', '2'),
(4, 'Nguyên lý hệ điều hành', '3'),
(5, 'SQL Sever', '3'),
(8, 'Kiến trúc máy tính', '3'),
(9, 'Xác xuất thống kê', '3'),
(10, 'Tin học đại cương', '3'),
(11, 'Nhập môn cơ sở dữ liệu', '2'),
(12, 'Các hệ quản trị cơ sở dữ liệu', '3'),
(13, 'Tư tưởng Hồ Chí Minh', '2'),
(14, 'Đường lối cách mạng ', '2'),
(15, 'Web ngữ nghĩa', '3'),
(16, 'Lập trình Web', '3'),
(17, 'Kỹ thuật lập trình 1', '3'),
(19, 'Java cơ bản', '2'),
(20, 'Chủ nghĩa Mác Lê nin 1', '3'),
(21, 'Chủ nghĩa Mác Lê nin 2', '3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `clasess`
--
ALTER TABLE `clasess`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `detail_clasess`
--
ALTER TABLE `detail_clasess`
  ADD PRIMARY KEY (`malop`,`mamon`),
  ADD KEY `mamon` (`mamon`);

--
-- Chỉ mục cho bảng `detail_major`
--
ALTER TABLE `detail_major`
  ADD PRIMARY KEY (`masv`,`manghanh`),
  ADD KEY `manghanh` (`manghanh`);

--
-- Chỉ mục cho bảng `detail_student`
--
ALTER TABLE `detail_student`
  ADD PRIMARY KEY (`masv`,`malop`,`mamon`),
  ADD KEY `fk_student_class` (`malop`,`mamon`);

--
-- Chỉ mục cho bảng `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`manghanh`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`masv`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`mamon`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `major`
--
ALTER TABLE `major`
  MODIFY `manghanh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `mamon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detail_clasess`
--
ALTER TABLE `detail_clasess`
  ADD CONSTRAINT `detail_clasess_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `clasess` (`malop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_clasess_ibfk_2` FOREIGN KEY (`mamon`) REFERENCES `subject` (`mamon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_major`
--
ALTER TABLE `detail_major`
  ADD CONSTRAINT `detail_major_ibfk_1` FOREIGN KEY (`manghanh`) REFERENCES `major` (`manghanh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_major_student` FOREIGN KEY (`masv`) REFERENCES `students` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_student`
--
ALTER TABLE `detail_student`
  ADD CONSTRAINT `fk_student_class` FOREIGN KEY (`malop`,`mamon`) REFERENCES `detail_clasess` (`malop`, `mamon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_students_detail` FOREIGN KEY (`masv`) REFERENCES `students` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
