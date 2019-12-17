-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2019 lúc 05:53 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_nhom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `name`, `password`, `email`, `image`, `role`, `status`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '', 1, 1),
(2, 'admin1', 'demo1', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '53340277_1454137588056449_5341882908888006656_n.jpg', 1, 1),
(3, 'demo', 'Trần Văn Quang', 'e10adc3949ba59abbe56e057f20f883e', 'quang6cnd@gmail.com', '1e8d46_fdd6da1679bf424ba19cba3173922160_mv2_d_2560_1440_s_2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_order` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `date_cart` date NOT NULL,
  `totalPrice` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `order_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_order`, `name_user`, `address`, `email`, `phone`, `date_cart`, `totalPrice`, `status`, `order_note`) VALUES
(2, 'Trần Quang', 'Bến xe Giáp Bát', 'demo1@gmail.com', '0354937274', '2019-12-03', '1800000', 1, '12384'),
(28, 'Trần Quang', 'Giao Thủy - Nam Định', 'admin@gmail.com', '0359316477', '2019-12-17', '200000', 0, '12313');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL,
  `ordernum` int(11) NOT NULL,
  `show_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cate`, `name_cate`, `ordernum`, `show_menu`) VALUES
(15, 'demo', 6, '1'),
(16, 'test', 1, '1'),
(17, 'test2', 2, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_bl` date NOT NULL,
  `rating` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `username`, `content`, `date_bl`, `rating`, `id`) VALUES
(53, 'demo', 'test', '2019-12-17', 4, 67),
(57, 'demo', '123', '2019-12-17', 2, 68);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sale_price` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `detail_specifications` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `nameproduct`, `price`, `sale_price`, `detail`, `detail_specifications`, `image`, `amount`, `status`, `rating`, `id_cate`) VALUES
(67, 'demo123', '15000000', '150000', '<p>1313</p>\r\n', '<p>sản phẩm đẹp</p>\r\n', '636645880857584545_Xps-13.jpg', 3, '1', 0, 15),
(68, 'test', '100000', '50000', '', '', '636578276358777570_Asus-X507UA-BR167T.png', 3, '1', 0, 15),
(69, 'eaa', '150000', '100000', '', '', '636716713669065969_Asus-S15.png', 3, '1', 0, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'nember', 1),
(2, 'admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `detail`, `image`, `link`, `status`) VALUES
(23, 'máy ảnh1', '1.png', '#', b'1'),
(24, 'demo', '3.png', '123', b'1'),
(25, 'demo1', '4.png', '#', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `email`, `address`, `phone`, `image`, `role`, `status`) VALUES
(29, 'lanyentran1', '$2y$10$VuUJaFJ6y0qaH5WXyqu2R.Gmf8Hg.N.KaAZbxXEPfNn', 'nguyễn thị lan', 'lanyentran@gmail.com', 'lập thạch, vĩnh phúc', '0392870317', '636645880857584545_Xps-13.jpg', 0, 1),
(36, 'demo', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Văn Quang', 'quang6cnd@gmail.com', '2145134515', '0359316477', '72164731_515945072578665_7629967701506523136_n.jpg', 0, 1),
(41, 'deMo1', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Văn Quang', 'Leevip12c12@gmail.com', 'address', '0359316477', '45452589_480089019147847_6084658560262733824_n.jpg', 0, 1),
(44, 'quang6cnd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Trần Văn Quang', 'quang6cnd@gmail.com', 'address', '0359316477', '72164731_515945072578665_7629967701506523136_n.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `discount_price` int(11) NOT NULL,
  `used_count` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
