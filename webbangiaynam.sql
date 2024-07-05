-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2023 lúc 04:31 AM
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
-- Cơ sở dữ liệu: `webbangiaynam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Thanh toán trực tiếp \r\n1.Chuyển khoản\r\n2.Thanh toán online',
  `ngaydathang` varchar(50) DEFAULT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao ',
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`, `create_at`) VALUES
(102, 15, 'khanhduy   ', 'Hà Nội       ', '0123456789       ', 'duytdkph33973@fpt.edu.vn', 0, '04:20:41am 10/12/2023', 490000, 3, '2023-12-10 10:20:41'),
(103, 15, 'khanhduy   ', 'Hà Nội       ', '0123456789       ', 'duytdkph33973@fpt.edu.vn', 0, '04:21:50am 10/12/2023', 490000, 1, '2023-12-10 10:21:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(11) NOT NULL,
  `status_bl` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `ngaybinhluan`, `iduser`, `idpro`, `status_bl`) VALUES
(32, 'Đẹp', '04:14:34am 10/12/2023', 0, 55, b'00'),
(33, 'Chất thật', '04:21:40am 10/12/2023', 0, 55, b'00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idspbt` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `namepro` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `mau` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idspbt`, `img`, `namepro`, `price`, `mau`, `size`, `soluong`, `thanhtien`, `idbill`) VALUES
(172, 15, 131, 'adidas trang.jpg', 'GIÀY ADIDAS PHANTOM', 490000, 'White', 39, 1, 490000, 102),
(173, 15, 131, 'adidas trang.jpg', 'GIÀY ADIDAS PHANTOM', 490000, 'White', 39, 1, 490000, 103);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `namedm` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `namedm`, `status`) VALUES
(18, 'Giày Nike', b'1'),
(20, 'Giày MLB', b'1'),
(21, 'Giày Adidas', b'1'),
(24, 'Giày Louis Vuitton', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausp`
--

CREATE TABLE `mausp` (
  `id` int(10) NOT NULL,
  `mau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mausp`
--

INSERT INTO `mausp` (`id`, `mau`) VALUES
(20, 'White'),
(21, 'Black'),
(22, 'Yellow'),
(23, 'Gray'),
(24, 'Blue');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `namepro` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL,
  `status` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `namepro`, `price`, `discount`, `img`, `mota`, `luotxem`, `iddm`, `status`) VALUES
(37, 'Giày Adidas Superstar Adifom Đen Siêu Cấp', 850000, 900000, 'adidas-superstar-adifom-den.png', 'Giày Adidas Superstar Adifom Đen Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 24, 21, b'00'),
(38, 'Giày Adidas Superstar Adifom Trắng Siêu Cấp', 900000, 2000000, 'adidas-superstar-adifom-trang.png', 'Giày Adidas Superstar Adifom Trắng Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 22, 21, b'01'),
(39, 'Giày Nike Air Jordan 1 Retro High Dior Like Auth 99%', 2500000, 5000000, '126.png', 'Giày Nike Air Jordan 1 Retro High Dior Like Auth 99% với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 40, 18, b'00'),
(40, 'Giày MLB Liner Mid Monogram NY', 890000, 1500000, 'giay-mlb-liner-mid-monogram-ny.png', 'Giày MLB Liner Mid Monogram NY với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 66, 20, b'01'),
(43, ' Giày LV Trainer Monogram Denim Đen Trắng Siêu Cấp Like Auth', 900000, 2000000, '1-1.png', 'Giày LV Trainer Monogram Denim Đen Trắng với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 11, 24, b'01'),
(45, 'Giày MLB Bigball Chunky Boston Red Sox Màu Trắng Rep 1:1', 950000, 0, '91.png', 'Giày MLB Bigball Chunky Boston Red Sox Màu Trắng Rep 1:1 với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 21, 20, b'01'),
(47, 'Giày AF1 x Louis Vuitton White Brown', 820000, 1600000, 'giay-af1-x-louis-vuitton-white-brown.png', 'Giày AF1 x Louis Vuitton White Brown là phiên bản độc lạ hiện nay ở Việt Nam ít ai có. Shop nhập về được số lượng ít, giá cực tốt cho mọi người trải nghiệm.', 215, 24, b'01'),
(52, 'GIÀY NIKE AIR MAX COMMAND', 590000, 0, 'nike com.jpg', 'Giày Nike Air Max Command là một trong những sản phẩm kinh điển của hãng thể thao Nike, trải qua gần 30 năm lịch sử Nike Air Max Command đã làm say đắm hàng triệu người yêu giày trên thế giới.', 8, 18, b'01'),
(54, 'GIÀY NIKE AIR WINFLO', 690000, 0, 'fn5924-100-01-1.webp', 'Giày Nike Air Winflo 10 có nhiều sự cải tiến vượt trội so với mẫu Winflo 9 trước đó cả về kiểu dáng cũng như những công nghệ hỗ trợ đi kèm.', 15, 18, b'01'),
(55, 'GIÀY ADIDAS PHANTOM', 490000, 0, 'adidas trang.jpg', 'Giày adidas phantom phiên bản nâng cấp rất được ưu chuộng của dòng Grand Court Base .Với những cải tiến mới khiến cho mẫu giày này bền đẹp và năng động hơn khá nhiều.', 16, 21, b'01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(10) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(20, 39),
(21, 40),
(22, 41),
(23, 42),
(24, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spbt`
--

CREATE TABLE `spbt` (
  `id` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `idmau` int(10) NOT NULL,
  `idsize` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `status` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `spbt`
--

INSERT INTO `spbt` (`id`, `idpro`, `idmau`, `idsize`, `soluong`, `status`) VALUES
(83, 38, 20, 21, 50, b'01'),
(84, 38, 20, 22, 50, b'01'),
(85, 38, 20, 23, 50, b'01'),
(86, 38, 20, 24, 50, b'01'),
(87, 38, 20, 20, 50, b'01'),
(88, 37, 21, 20, 50, b'01'),
(89, 37, 21, 22, 50, b'01'),
(90, 37, 21, 23, 50, b'01'),
(91, 37, 21, 24, 50, b'01'),
(92, 37, 21, 21, 50, b'01'),
(93, 39, 23, 21, 50, b'01'),
(94, 39, 23, 22, 50, b'01'),
(95, 39, 23, 23, 50, b'01'),
(96, 39, 23, 24, 50, b'01'),
(97, 39, 23, 20, 50, b'01'),
(98, 40, 21, 20, 50, b'01'),
(99, 40, 21, 22, 50, b'01'),
(100, 40, 21, 23, 50, b'01'),
(101, 40, 21, 24, 50, b'01'),
(102, 40, 21, 21, 50, b'01'),
(103, 43, 20, 20, 50, b'01'),
(104, 43, 21, 22, 50, b'01'),
(105, 43, 21, 23, 50, b'01'),
(106, 43, 21, 24, 50, b'01'),
(107, 43, 21, 21, 50, b'01'),
(108, 45, 20, 21, 50, b'01'),
(109, 45, 20, 22, 50, b'01'),
(110, 45, 20, 23, 50, b'01'),
(111, 45, 20, 24, 50, b'01'),
(112, 45, 20, 20, 50, b'01'),
(113, 47, 20, 21, 50, b'01'),
(114, 47, 20, 22, 50, b'01'),
(115, 47, 20, 23, 50, b'01'),
(116, 47, 20, 24, 50, b'01'),
(117, 47, 20, 20, 50, b'01'),
(118, 52, 21, 20, 50, b'01'),
(119, 52, 21, 22, 50, b'01'),
(120, 52, 21, 23, 50, b'01'),
(121, 52, 21, 24, 50, b'01'),
(122, 52, 21, 21, 50, b'01'),
(123, 54, 20, 21, 50, b'01'),
(124, 54, 20, 22, 50, b'01'),
(125, 54, 20, 23, 100, b'01'),
(126, 54, 20, 24, 100, b'01'),
(127, 54, 20, 20, 50, b'01'),
(128, 55, 20, 21, 50, b'01'),
(129, 55, 20, 22, 50, b'01'),
(130, 55, 20, 23, 50, b'01'),
(131, 55, 20, 20, 50, b'01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(14, 'duy', '123', 'duy123@gmail.com', 'Hà Nội', '0123456789', 0),
(15, 'khanhduy   ', '123       ', 'duytdkph33973@fpt.edu.vn', 'Hà Nội       ', '0123456789       ', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_bill_taikhoan` (`iduser`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_binhluan_taikhoan` (`iduser`),
  ADD KEY `lk_binhluan_sanpham` (`idpro`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_cart_taikhoan` (`iduser`),
  ADD KEY `lk_cart_bill` (`idbill`),
  ADD KEY `lk_cart_spbt` (`idspbt`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mausp`
--
ALTER TABLE `mausp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `spbt`
--
ALTER TABLE `spbt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_spbt_sanpham` (`idpro`),
  ADD KEY `lk_spbt_mau` (`idmau`),
  ADD KEY `lk_spbt_size` (`idsize`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `mausp`
--
ALTER TABLE `mausp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `spbt`
--
ALTER TABLE `spbt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `lk_bill_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_binhluan_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `lk_cart_spbt` FOREIGN KEY (`idspbt`) REFERENCES `spbt` (`id`),
  ADD CONSTRAINT `lk_cart_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Các ràng buộc cho bảng `spbt`
--
ALTER TABLE `spbt`
  ADD CONSTRAINT `lk_spbt_mau` FOREIGN KEY (`idmau`) REFERENCES `mausp` (`id`),
  ADD CONSTRAINT `lk_spbt_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `lk_spbt_size` FOREIGN KEY (`idsize`) REFERENCES `size` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
