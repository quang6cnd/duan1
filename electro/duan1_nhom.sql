-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2019 lúc 04:54 AM
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
  `user` varchar(255) NOT NULL,
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

INSERT INTO `admin` (`id_admin`, `user`, `name`, `password`, `email`, `image`, `role`, `status`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '', 1, 1),
(2, 'admin1', 'demo1', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '53340277_1454137588056449_5341882908888006656_n.jpg', 1, 1),
(3, 'demo', 'Trần Văn Quang', '12345678', 'quang6cnd@gmail.com', '1e8d46_fdd6da1679bf424ba19cba3173922160_mv2_d_2560_1440_s_2.jpg', 1, 1),
(4, 'lanyentran', 'trần thị yên', '51ad1ed27dbdd12ddc1d9d080ed0ed9b', 'lanyentran@gmail.com', '73513534_148685079693797_1838065493802483712_o.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `date_cart` date NOT NULL,
  `totalPrice` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `order_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_order`, `id_user`, `name_user`, `address`, `email`, `phone`, `date_cart`, `totalPrice`, `status`, `order_note`) VALUES
(1, 19, 'Trần Văn Quang', 'Công viên Nghĩa Đô', 'demo@gmail.com', '0359316477', '2019-12-06', 1500000, 1, 'dâdzzcx'),
(2, 20, 'Trần Quang', 'Bến xe Giáp Bát', 'demo1@gmail.com', '0354937274', '2019-12-03', 1800000, 0, '12384');

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
(16, 'LAPTOP ĐỒ HỌA', 2, '1'),
(17, 'PHỤ KIỆN LAPTOP', 3, '1'),
(18, 'LAPTOP GAMING', 4, '1'),
(20, 'LAPTOP VĂN PHÒNG', 5, '1');

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
(53, 'quangtvph08049', 'Đẹp', '2019-12-19', 5, 71);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `url`, `image_text`) VALUES
(1, 67, 'cs.png', 'dfd'),
(2, 67, '1e8d46_fdd6da1679bf424ba19cba3173922160_mv2_d_2560_1440_s_2.jpg', 'dfdf'),
(3, 67, 'cs.png', 'ddd'),
(4, 67, '73513534_148685079693797_1838065493802483712_o.jpg', 'dfdfdf'),
(5, 68, '61nLLAqLBKL._SY606_.jpg', 'az'),
(6, 68, '5b547957917682ba908239e5f54c6cf0.jpg', 's'),
(7, 69, 'laptop-asus-rog-strix-g-2-500x500.jpg', '1'),
(8, 69, 'laptop-asus-rog-strix-g-3-500x500.jpg', '2'),
(9, 69, 'laptop-asus-rog-strix-g-4-500x500.jpg', '3'),
(10, 69, 'Acer-Nitro-5-AN515-54-02-768x768.jpg', '1'),
(11, 69, 'Acer-Nitro-5-AN515-54-02-768x768.jpg', '2'),
(12, 69, 'Nitro-5-AN515-54-595D-768x768.jpg', '3'),
(13, 71, 'Acer-Nitro-5-AN515-54-02-768x768.jpg', '1'),
(14, 71, 'Acer-Nitro-5-AN515-54-05-768x768.jpg', '1'),
(15, 71, 'Nitro-5-AN515-54-595D-768x768.jpg', '3'),
(16, 72, '636754771932371180_lenovo-laptop-legion-y530-hero.jpg', '1'),
(17, 72, '636754771931602489_l_10182146_003.jpg', '3'),
(18, 72, '636754771932570840_len-4728-high_5b73ae6b0a473.jpg', '2'),
(19, 72, '636754771933848664_Lenovo-Legion-Y530-Y530-15ICH-81FV0013US-81FV0015US-81FV0014US-3.jpg', '1'),
(20, 69, '636993834983120088_hp-envy-13-aq0026tu-3.png', '1'),
(21, 73, '636993834985927908_hp-envy-13-aq0026tu-4.png', '3'),
(22, 73, '636993834983120088_hp-envy-13-aq0026tu-1.png', '2'),
(23, 74, '637043321216039369_acer-nitro-an515-52-53pc-1.png', '1'),
(24, 74, '637043321215639746_acer-nitro-an515-52-53pc-4.png', '3'),
(25, 74, '637043321215409678_acer-nitro-an515-52-53pc-2.png', '2'),
(26, 74, 'acer-nitro-5-2019.jpg', '2'),
(27, 75, '636933431673514809_HASP-Tainghe-ivalue-BT233-555010-4.jpg', '1'),
(28, 75, '636933431673494809_HASP-Tainghe-ivalue-BT233-555010-1.jpg', '2'),
(29, 75, '636933431673484809_HASP-Tainghe-ivalue-BT233-555010-2.jpg', '3'),
(30, 75, '636933431673444809_HASP-Tainghe-ivalue-BT233-555010-5.jpg', '3'),
(31, 76, '11_c7702d8744f84c218b16df4c56a20280.jpg', '1'),
(32, 76, '13_7766cfb7a69e44288e75ad742efa12cd.jpg', '1'),
(33, 76, '15_083130a420034bf6849656472f046b3f.jpg', '2'),
(34, 76, '16_bb312d3a28c04823ac9b04ed24adbf0f.jpg', '2'),
(35, 76, '15_083130a420034bf6849656472f046b3f.jpg', '3'),
(36, 77, 'sony-bluethooth-mdr-xb650bt-den (1).jpg', '1'),
(37, 77, 'sony-bluethooth-mdr-xb650bt-den-2.jpg', '2'),
(38, 77, 'tải xuống (1).jfif', '2'),
(39, 78, 'sony-whh900n-crom-3.jpg', '1'),
(40, 78, 'sony-whh900n-crom-4.jpg', '3'),
(41, 78, 'sony-whh900n-crom-2.jpg', '3'),
(42, 79, '4406_msi_gf63_thin_9rcx_anh4.jpg', '1'),
(43, 79, '4406_msi_gf63_thin_9rcx_anh3.jpg', '2'),
(44, 79, '4406_msi_gf63_thin_9rcx_anh2.jpg', '3'),
(45, 80, '178_0948f1fb85ae3a3721304e5f4cc3a96a.jpg', '1'),
(46, 80, '178_a5db7f3d31637d109421b9599e84d283.jpg', '2'),
(47, 80, '178_ea5fa8e64c35719ae873cb026e444a60.jpg', '3'),
(48, 81, 'dims.jfif', '1'),
(49, 81, '636824693125252170_lenovo-legion-y530-15ich-core-i7-1.png', '2'),
(50, 81, 'top-5-laptop-gaming-gia-re-2018-hieu-nang-cuc-ki-tot-7.jpg', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` float NOT NULL
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
  `detail` varchar(500) NOT NULL,
  `detail_specifications` varchar(5000) NOT NULL,
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
(69, 'Asus ROG Strix G G531GD-AL034T', '28390000', '24390000', '<h3>M&ocirc; tả sản phẩm</h3>\r\n\r\n<p>- CPU: Intel&reg; Core&trade; i5 9300H (2.40 GHz upto 4.10 GHz, 8MB)</p>\r\n\r\n<p>- RAM: 8GB DDR4</p>\r\n\r\n<p>- VGA: NVIDIA GeForce GTX 1650 - GDDR5 4GB</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh: 15.6&quot; Full HD ( 1920 x 1080 ), 120Hz, IPS Panel</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Ổ c&uacute;ng: 512GB SSD</p>\r\n\r', '<p style=\"text-align:center\">Đ&aacute;nh gi&aacute; chi tiết Asus Strix G531GD-AL109T/i5-9300H/8GB/512GB SSD/1050 4GB/WIN10</p>\r\n\r\n<p style=\"text-align:center\"><strong>D&ugrave; l&agrave; laptop chơi game nhưng Asus Strix G531GD-AL109T vẫn c&oacute; thiết kế rất gọn g&agrave;ng v&agrave; cơ động. B&ecirc;n trong m&aacute;y l&agrave; sức mạnh đ&aacute;ng kinh ngạc đến từ bộ vi xử l&yacute; Intel thế hệ thứ 9 v&agrave; card đồ họa rời GTX 1050.</strong></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"hiệu năng Asus Strix G531GD\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/asus-strix-g531gd-3.jpg\" /></p>\r\n\r\n<h3 style=\"text-align:center\"><strong>Tỏa s&aacute;ng với chip Intel thế hệ thứ 9</strong></h3>\r\n\r\n<p style=\"text-align:center\">Trong mức gi&aacute; kh&aacute; tốt, Asus Strix G531GD-AL109T đảm bảo mang đến trải nghiệm chơi game tuyệt vời cho c&aacute;c game thủ khi trang bị bộ vi xử l&yacute; Intel Core i5 &ndash; 9300H thế hệ mới nhất đi c&ugrave;ng 8GB RAM DDR4-2666 MHz. Sử dụng ổ cứng thể rắn SSD cao cấp c&oacute; dung lượng l&ecirc;n tới 512GB, bạn c&oacute; thể thoải m&aacute;i c&agrave;i đặt v&agrave; chạy game với tốc độ nhanh ch&oacute;ng. Tất nhi&ecirc;n kh&ocirc;ng thể kh&ocirc;ng nhắc đến đồ họa rời Nvidia GeForce GTX 1050 chuy&ecirc;n d&agrave;nh cho chơi game, tha hồ &ldquo;chiến&rdquo; mượt mọi tựa game ưa th&iacute;ch của bạn.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Asus Strix G531GD\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/asus-strix-g531gd-1.jpg\" /></strong></p>\r\n\r\n<h3 style=\"text-align:center\"><strong>Tản nhiệt th&ocirc;ng minh</strong></h3>\r\n\r\n<p style=\"text-align:center\">Với thiết kế chăm ch&uacute;t tỉ mỉ cho việc l&agrave;m m&aacute;t, Asus Strix G531GD-AL109T được đảm bảo lu&ocirc;n th&ocirc;ng tho&aacute;ng bằng m&ocirc;-đun tản nhiệt tự l&agrave;m sạch, đẩy bụi bẩy ra b&ecirc;n ngo&agrave;i, k&eacute;o d&agrave;i tuổi thọ c&aacute;c linh kiện. Những quạt k&eacute;p c&aacute;nh chữ N sẽ gi&uacute;p tăng cường lưu th&ocirc;ng kh&ocirc;ng kh&iacute;, đồng thời c&aacute;c l&aacute; tản nhiệt si&ecirc;u mỏng gi&uacute;p mở rộng diện t&iacute;ch bề mặt tho&aacute;t nhiệt. Sẽ c&oacute; một phần mềm th&ocirc;ng minh mang t&ecirc;n ROG Armoury Crate quản l&yacute; v&agrave; chuyển đổi c&aacute;c chế độ vận h&agrave;nh để bạn c&oacute; được hiệu năng cũng như độ ồn tối ưu nhất.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"tản nhiệt Asus Strix G531GD\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/asus-strix-g531gd-4.jpg\" /></p>\r\n\r\n<h3 style=\"text-align:center\"><strong>Ng&ocirc;n ngữ thiết kế ho&agrave;n to&agrave;n mới, dễ d&agrave;ng chơi game ở bất cứ đ&acirc;u</strong></h3>\r\n\r\n<p style=\"text-align:center\">Asus Strix G531GD-AL109T mang tr&ecirc;n m&igrave;nh ng&ocirc;n ngữ thiết kế ho&agrave;n to&agrave;n mới, với ti&ecirc;u ch&iacute; h&igrave;nh thức phục vụ chức năng, nghĩa l&agrave; tất cả đều hướng đến mục đ&iacute;ch chơi game. Bạn sẽ c&oacute; v&ugrave;ng lưu th&ocirc;ng kh&iacute; 3D trong thiết kế, tạo n&ecirc;n hệ thống l&agrave;m m&aacute;t hiện đại nhất. Những đường kho&eacute;t tinh tế tr&ecirc;n mặt lưng đảm bảo luồng kh&iacute; lưu th&ocirc;ng kh&ocirc;ng giới hạn. Tất nhi&ecirc;n m&aacute;y cũng kh&ocirc;ng hề thiếu đi độ thẩm mỹ với vẻ đẹp hiện đại bằng c&aacute;c đường n&eacute;t chạm khắc kh&eacute;o l&eacute;o, đ&egrave;n LED ấn tượng v&agrave; viền m&agrave;n h&igrave;nh si&ecirc;u mỏng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"thiết kế Asus Strix G531GD\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/asus-strix-g531gd-2.jpg\" /></p>\r\n\r\n<h3 style=\"text-align:center\"><strong>H&igrave;nh ảnh sắc n&eacute;t, mượt m&agrave; hơn với tần số qu&eacute;t 120Hz</strong></h3>\r\n\r\n<p style=\"text-align:center\">Sở hữu m&agrave;n h&igrave;nh 15,6 inch độ ph&acirc;n giải Full HD c&oacute; tần số qu&eacute;t vượt trội 120Hz, Asus Strix G531GD-AL109T mang đến sự kh&aacute;c biệt trong những trận chiến game của bạn. Tần số qu&eacute;t cao sẽ khai th&aacute;c tối đa sức mạnh CPU, giải ph&oacute;ng tiềm năng để mang đến đồ họa si&ecirc;u mượt m&agrave; ở mức FPS cực cao. Bạn sẽ được tận hưởng những h&igrave;nh ảnh game ho&agrave;nh tr&aacute;ng tr&ecirc;n m&agrave;n h&igrave;nh viền si&ecirc;u mỏng, chất lượng v&agrave; v&ocirc; c&ugrave;ng mượt m&agrave;, bắt trọn mọi chuyển động.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"màn hình Asus Strix G531GD\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/asus-strix-g531gd-5.jpg\" /></p>\r\n\r\n<h3 style=\"text-align:center\"><strong>&Acirc;m thanh lớn cho trải nghiệm game sống động</strong></h3>\r\n\r\n<p style=\"text-align:center\">&Acirc;m thanh sống động từ c&aacute;c loa side-firing của Asus Strix G531GD-AL109T cho bạn đắm ch&igrave;m v&agrave;o từng trận chiến trong game. C&ocirc;ng nghệ khuếch đại th&ocirc;ng minh sẽ điều chỉnh c&ocirc;ng suất &acirc;m theo thời gian thực để &acirc;m thanh kh&ocirc;ng chỉ sống động m&quot; rows=&quot;5', 'laptop-asus-gaming-g531gd-1-500x500.png', 20, '1', 0, 16),
(71, 'LAPTOP ACER NITRO 5 AN515-54-595D ', '25000000', '22990000', '<h3>M&ocirc; tả sản phẩm</h3>\r\n\r\n<p>- CPU: Intel&reg; Core&trade; i5 9300H (2.40 GHz upto 4.10 GHz, 8MB)</p>\r\n\r\n<p>- RAM: 8GB DDR4</p>\r\n\r\n<p>- VGA: NVIDIA GeForce GTX 1650 - GDDR5 4GB</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh: 15.6&quot; Full HD ( 1920 x 1080 ), 120Hz, IPS Panel</p>\r\n\r\n<p>- Ổ c&uacute;ng: 512GB SSD</p>\r\n\r\n<p>- HĐH: Windows 10&nbsp;</p>\r\n\r\n<p>- C&acirc;n nặng: 2.4kg</p>\r\n', '<p>Intel</p>\r\n\r\n<ul>\r\n	<li>C&ocirc;ng nghệ CPU :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/tim-hieu-cac-dong-cpu-intel-tren-laptop56395\" target=\"_blank\" title=\"Core i5 Ice Lake\">Core i5 Ice Lake</a></li>\r\n	<li>Loại CPU :9300H</li>\r\n	<li>Tốc độ CPU :2.40 GHz</li>\r\n	<li>Bộ nhớ đệm :12 MB L3 Cache</li>\r\n	<li>Tốc độ tối đa :4.1 GHz</li>\r\n	<li>Bo mạch</li>\r\n	<li>Chipset :Intel</li>\r\n	<li>Tốc độ Bus :2400 MHz</li>\r\n	<li>Hỗ trợ RAM tối đa :32 GB</li>\r\n	<li>RAM</li>\r\n	<li>Dung lượng RAM :8 GB</li>\r\n	<li>Loại RAM :<a href=\"http://fptshop.com.vn/tin-tuc/danh-gia/ram-la-gi-56446\" target=\"_blank\" title=\"DDR4\">DDR4</a></li>\r\n	<li>Tốc độ BUS RAM :2400 MHz</li>\r\n	<li>Số lượng khe RAM :2</li>\r\n	<li>Đĩa cứng</li>\r\n	<li>Loại ổ đĩa :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/ssd-la-gi-nhung-uu-diem-so-voi-o-cung-hdd-thuong-56396\" target=\"_blank\" title=\"SSD\">SSD</a></li>\r\n	<li>Dung lượng ổ đĩa :512 GB</li>\r\n	<li>Khe cắm ổ SSD :C&oacute;</li>\r\n	<li>Đồ họa</li>\r\n	<li>Chipset đồ họa :NVIDIA&reg; GeForce GTX&trade; 1650</li>\r\n	<li>Bộ nhớ đồ họa :4 GB</li>\r\n	<li>Kiểu thiết kế đồ họa :Card rời</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/moi-thu-ban-can-biet-khi-chon-man-hinh-laptop-56415\" target=\"_blank\" title=\"15.6 inchs\">15.6 inchs</a></li>\r\n	<li>Độ ph&acirc;n giải (W x H) :1920 x 1080 Pixels</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/ban-co-biet-6-cong-nghe-man-hinh-laptop-pho-bien-hien-nay-56467\" target=\"_blank\" title=\"IPS FHD\">IPS FHD</a></li>\r\n	<li>Cảm ứng :Kh&ocirc;ng</li>\r\n	<li>&Acirc;m thanh</li>\r\n	<li>K&ecirc;nh &acirc;m thanh :2.0</li>\r\n	<li>Th&ocirc;ng tin th&ecirc;m :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/cac-cong-nghe-am-thanh-noi-bat-tren-laptop-56422\" target=\"_blank\" title=\"High Definition (HD) Audio\">High Definition (HD) Audio</a></li>\r\n	<li>Đĩa quang</li>\r\n	<li>C&oacute; sẵn đĩa quang :<a href=\"https://fptshop.com.vn/tin-tuc/thu-thuat/chuc-nang-cua-o-dia-quang-tren-laptop-56421\" target=\"_blank\" title=\"Không\">Kh&ocirc;ng</a></li>\r\n	<li>T&iacute;nh năng mở rộng &amp; cổng giao tiếp</li>\r\n	<li>Cổng giao tiếp :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/diem-mat-6-cong-ket-noi-pho-bien-tren-laptop-56466\" target=\"_blank\" title=\"1 x USB Type-C,  2 x USB, 3.1 1 x USB 2.0,  1 x HDMI,  1 x Ethernet (RJ-45) port,  1 x DC-in jack for AC adapter,  1 x 3.5 mm headphone/speaker jack  \">1 x USB Type-C, 2 x USB, 3.1 1 x USB 2.0, 1 x HDMI, 1 x Ethernet (RJ-45) port, 1 x DC-in jack for AC adapter, 1 x 3.5 mm headphone/speaker jack</a></li>\r\n	<li>T&iacute;nh năng mở rộng :Kh&ocirc;ng</li>\r\n	<li>Giao tiếp mạng</li>\r\n	<li>LAN :10/100/1000 Mbps</li>\r\n	<li>Chuẩn Wi-Fi :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/cac-chuan-cong-nghe-ket-noi-wifi-tren-laptop-56451\" target=\"_blank\" title=\"Wifi 6 (802.11ax)\">Wifi 6 (802.11ax)</a></li>\r\n	<li>Kết nối kh&ocirc;ng d&acirc;y kh&aacute;c :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/moi-thu-ban-can-biet-ve-chuan-bluetooth-5-0-44572\" target=\"_blank\" title=\"Bluetooth 5.0\">Bluetooth 5.0</a></li>\r\n	<li>Card Reader</li>\r\n	<li>Đọc thẻ nhớ :Kh&ocirc;ng</li>\r\n	<li>Khe đọc thẻ nhớ :Kh&ocirc;ng</li>\r\n	<li>Webcam</li>\r\n	<li>Độ ph&acirc;n giải :720p FaceTime HD camera</li>\r\n	<li>Th&ocirc;ng tin th&ecirc;m :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/webcam-tren-laptop-va-nhung-cong-dung-tuyet-voi-56368\" target=\"_blank\" title=\"HD Webcam\">HD Webcam</a></li>\r\n	<li>Hệ điều h&agrave;nh, phầm mềm c&oacute; sẵn</li>\r\n	<li>Hệ điều h&agrave;nh :<a href=\"https://fptshop.com.vn/tin-tuc/tin-moi/tong-hop-cac-he-dieu-hanh-thong-dung-tren-laptop-56318\" target=\"_blank\" title=\"Windows 10 Home\">Windows 10 Home</a></li>\r\n	<li>Phần mềm c&oacute; sẵn :Kh&ocirc;ng</li>\r\n	<li>PIN/Battery</li>\r\n	<li>Loại pin :4 Cells</li>\r\n	<li>Kiểu pin :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/tim-hieu-cac-cong-nghe-pin-tren-laptop-pho-bien-hien-nay-56406\" target=\"_blank\" title=\"Lithium-Polymer, Liền\">Lithium-Polymer, Liền</a></li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c</li>\r\n	<li>Cảm biến v&acirc;n tay :Kh&ocirc;ng</li>\r\n	<li>Đ&egrave;n b&agrave;n ph&iacute;m :C&oacute;</li>\r\n	<li>B&agrave;n ph&iacute;m số :C&oacute;</li>\r\n	<li>Phụ kiện k&egrave;m theo :Sạc, s&aacute;ch HD</li>\r\n	<li>K&iacute;ch thước &amp; trọng lượng</li>\r\n	<li>K&iacute;ch Thước :363.4 (W) x 255 (D) x 25.9 (H) mm</li>\r\n	<li>Trọng lượng :2.3 kg</li>\r\n	<li>Chất liệu :Nhựa</li>\r\n	<li>Bảo h&agrave;nh</li>\r\n	<li>Thời gian bảo h&agrave;nh :12 Th&aacute;ng</li>\r\n	<li>Th&ocirc;ng tin h&agrave;ng h&oacute;a</li>\r\n	<li>Xuất xứ :Trung Quốc</li>\r\n	<li>Năm sản xuất :2019</li>\r\n	<li>&quot; rows=&quot;5&quot;&gt;</li>\r\n</ul>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 'Acer-Nitro-5-AN515-54-01-768x768.jpg', 20, '1', 0, 16),
(72, 'Lenovo Legion Y530-15ICH i5-8300H', '23000000', '22800000', '<h2>Th&ocirc;ng số kỹ thuật</h2>\r\n\r\n<ul>\r\n	<li>CPU :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/tim-hieu-cac-dong-cpu-intel-tren-laptop56395\" target=\"_blank\">Intel, Core i5</a></li>\r\n	<li>RAM :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/ram-la-gi-56446\" target=\"_blank\">8 GB, DDR4</a></li>\r\n	<li>Ổ cứng :<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/o-cung-la-gi-va-cac-loai-o-cung-thong-dung-hien-nay-56458\" target=\"_blank\">SSD+ HDD, 128Gb+ 1Tb</a></li>\r\n	<li>M&agrave;n h&igrave;nh :<a', '<h3 style=\"text-align:justify\">Đ&aacute;nh gi&aacute; chi tiết Lenovo Legion Y530-15ICH i5-8300H/8Gb/1Tb+ 128Gb SSD/GTX 1050 4Gb</h3>\r\n\r\n<p style=\"text-align:justify\">Lenovo Legion Y530-15ICH l&agrave; chiếc laptop chơi game cung cấp cho bạn sự c&acirc;n bằng ho&agrave;n hảo giữa hiệu năng v&agrave; t&iacute;nh di động. Thiết kế đẹp mắt, tối ưu để chạy m&aacute;t v&agrave; y&ecirc;n tĩnh, cấu h&igrave;nh si&ecirc;u mạnh từ bộ vi xử l&yacute; thế hệ mới nhất mang đến cho bạn trải nghiệm chơi game tuyệt vời ở bất cứ đ&acirc;u.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/lenovo-legion-y530-1.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Ng&ocirc;n ngữ thiết kế mới cho d&ograve;ng laptop chơi game</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Laptop chơi game hiện đại kh&ocirc;ng c&ograve;n l&agrave; những chiếc m&aacute;y t&iacute;nh cồng kềnh v&agrave; nặng nề. Lenovo Legion Y530 kh&ocirc;ng chỉ l&agrave; một cỗ m&aacute;y mạnh mẽ m&agrave; c&ograve;n rất thời trang v&agrave; phong c&aacute;ch ở vẻ bể ngo&agrave;i. Với trọng lượng chỉ 2,3kg v&agrave; mỏng 24mm, m&aacute;y t&iacute;nh x&aacute;ch tay Lenovo Legion Y530 rất cơ động để bạn mang đi bất cứ đ&acirc;u, mang lại sự c&acirc;n bằng l&yacute; tưởng giữa hiệu suất chơi game đỉnh cao v&agrave; t&iacute;nh di động.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/lenovo-legion-y530-2.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Trải nghiệm h&igrave;nh ảnh mượt m&agrave; tr&ecirc;n m&agrave;n h&igrave;nh viền si&ecirc;u mỏng</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Viền m&agrave;n h&igrave;nh si&ecirc;u mỏng gi&uacute;p cho h&igrave;nh ảnh hiển thị trực quan v&agrave; ấn tượng hơn rất nhiều. M&agrave;n h&igrave;nh lớn 15,6 inch độ ph&acirc;n giải Full HD sắc n&eacute;t kết hợp c&ugrave;ng độ l&agrave;m tươi l&ecirc;n tới 144 Hz để tựa game của bạn kh&ocirc;ng chỉ đẹp m&agrave; c&ograve;n mượt m&agrave; hơn. Độ s&aacute;ng 300 nits v&agrave; m&agrave;n h&igrave;nh tấm nền IPS cho g&oacute;c nh&igrave;n rộng, hiển thị tốt trong mọi ho&agrave;n cảnh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/lenovo-legion-y530-3.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Hiệu năng cực đỉnh d&agrave;nh cho tương lai</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Lenovo Legion Y530 được trang bị cấu h&igrave;nh cực mạnh, cung cấp hiệu năng kh&ocirc;ng chỉ đ&aacute;p ứng tốt nhu cầu hiện tại m&agrave; c&ograve;n cả tương lai. Phi&ecirc;n bản Lenovo Legion Y530-15ICH chạy vi xử l&yacute; Intel Core i5 8300H thế hệ thứ 8, cho trải nghiệm game sống động như ch&iacute;nh bạn đang đắm ch&igrave;m trong c&acirc;u chuyện.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/lenovo-legion-y530-4.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Đồ họa chuy&ecirc;n nghiệp cho game thủ</strong></h3>\r\n\r\n<p style=\"text-align:justify\">L&agrave; một chiếc laptop d&agrave;nh để chơi game, Legion Y530 c&oacute; khả năng xử l&yacute; đồ họa cực đỉnh với VGA rời Nvidia GeForce GTX 1050, kiến tr&uacute;c Pascal ti&ecirc;n tiến. GPU n&agrave;y gi&uacute;p tăng hiệu suất ở độ n&eacute;t cao v&agrave; hỗ trợ c&aacute;c t&iacute;nh năng DirectX12, game chạy si&ecirc;u nhanh, mượt m&agrave; v&agrave; tiết kiệm năng lượng.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/lenovo-legion-y530-5.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Mạnh mẽ tr&ecirc;n từng Milimet</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Với kinh nghiệm sản xuất laptop chơi game, c&aacute;c kỹ sư của Lenovo đ&atilde; l&agrave;m việc chăm chỉ để tạo ra Legion Y530 đại diện cho sự s&aacute;ng tạo đỉnh cao. Mọi chi tiết tr&ecirc;n m&aacute;y đều được t&iacute;nh to&aacute;n v&agrave; kết nối ho&agrave;n hảo, phục vụ tối ưu cho khả năng chơi game. Từ pin, vị tr&iacute; chip cầu nam đến tản nhiệt, bo mạch chủ đều được ch&uacute; trọng để kết hợp lại th&agrave;nh phần cứng tốt nhất, tạo n&ecirc;n chiếc laptop chơi game mạnh mẽ trong h&igrave;nh h&agrave;i mỏng gọn.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/lenovo-legion-y530-6.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>B&agrave;n ph&iacute;m phản hồi ch&iacute;nh x&aacute;c</strong></h3>\r\n\r\n<p style=\"text-align:justify\">B&agrave;n ph&iacute;m l&agrave; phương tiện để bạn thao t&aacute;c trực tiếp v&agrave;o c&aacute;c tựa game, ch&iacute;nh v&igrave; vậy phản hồi v&agrav', '636754771931602489_l_10182146_003.jpg', 20, '1', 0, 16),
(73, 'HP ENVY 13-aq0026TU', '24000000', '22900000', '<p>Kh&aacute;ch h&agrave;ng chọn 1 trong 2 khuyến mại:</p>\r\n\r\n<p>KM1:</p>\r\n\r\n<ul>\r\n	<li>Trả g&oacute;p 0%</li>\r\n</ul>\r\n\r\n<p>KM2:</p>\r\n\r\n<ul>\r\n	<li>Tặng PMH 200,000đ</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tặng Chu&ocirc;̣t kh&ocirc;ng d&acirc;y Zadez M390&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/chuot-khong-day-zadez-m390\" target=\"_blank\">Xem chi tiết</a></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tặng Tai nghe c&oacute; d&acirc;y cho&agrave;ng đầu i.value T-127</li>\r\n</ul>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng được khuyến mại ', '<h3 style=\"text-align:justify\">Đ&aacute;nh gi&aacute; chi tiết HP ENVY 13-aq0026TU/Core i5-8265U/8GB/256GB SSD/WIN10</h3>\r\n\r\n<p style=\"text-align:justify\"><strong>HP Envy 13-aq0026TU l&agrave; một chiếc m&aacute;y t&iacute;nh x&aacute;ch tay nhỏ gọn v&agrave; thời trang ph&ugrave; hợp cho những ai y&ecirc;u th&iacute;ch sự hiện đại v&agrave; tiện dụng. B&ecirc;n cạnh đ&oacute;, laptop c&ograve;n sở hữu một hiệu suất tuyệt vời nhờ chip xử l&yacute; Intel thế hệ 8 c&ocirc;ng nghệ mới nhất.</strong></p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\n<strong>Thu h&uacute;t mọi &aacute;nh nh&igrave;n</strong></h3>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"HP Envy 13-aq0027TU\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/hp-envy-13-aq0027tu-1.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Từ bất kỳ một g&oacute;c nh&igrave;n n&agrave;o, bạn cũng sẽ nhận thấy HP Envy 13 to&aacute;t l&ecirc;n một vẻ thanh lịch v&agrave; sang trọng nhờ khung nh&ocirc;m mỏng nhẹ. Với m&agrave;n h&igrave;nh viền ba cạnh si&ecirc;u mỏng kết hợp ho&agrave;n hảo c&ugrave;ng b&agrave;n ph&iacute;m tr&agrave;n lề mang lại cho m&aacute;y t&iacute;nh x&aacute;ch tay một k&iacute;ch thước si&ecirc;u &quot;gọn g&agrave;ng&quot;. Bạn c&oacute; thể dễ d&agrave;ng mang laptop v&agrave;o trong một t&uacute;i x&aacute;ch hoặc balo nhỏ để tới bất cứ đ&acirc;u l&agrave;m việc. R&otilde; r&agrave;ng, HP Envy 13-aq0026TU cho thấy rằng n&oacute; kh&ocirc;ng chỉ đơn thuần l&agrave; một chiếc laptop m&agrave; c&ograve;n l&agrave; một phụ kiện thời trang tuyệt đẹp.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\n<strong>Tinh tế trong từng đường n&eacute;t</strong></h3>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"kiểu dáng HP Envy 13-aq0027TU\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/hp-envy-13-aq0027tu-7.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Chưa dừng lại ở thiết kế cuốn h&uacute;t v&agrave; lộng lẫy, nh&agrave; sản xuất c&ograve;n chăm ch&uacute;t vẻ ngo&agrave;i của HP Envy 13-aq0026TU đến từng chi tiết nhỏ để gi&uacute;p người d&ugrave;ng c&oacute; một trải nghiệm sử dụng ho&agrave;n hảo nhất. Chẳng hạn như thiết kế bản lề n&acirc;ng tinh tế gi&uacute;p việc nhập liệu trở n&ecirc;n thoải m&aacute;i v&agrave; tối ưu hệ thống l&agrave;m m&aacute;t, b&agrave;n ph&iacute;m tr&agrave;n lề tối ưu c&ocirc;ng năng, dải loa độc đ&aacute;o với họa thiết v&acirc;n nổi đầy c&aacute; t&iacute;nh, k&iacute;nh cường lực Corning Gorilla Glass gi&uacute;p giảm thiểu hư hại do va đập...</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\n<strong>Hiệu năng bứt ph&aacute;</strong></h3>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"hiệu năng HP Envy 13-aq0027TU\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/hp-envy-13-aq0027tu-3.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">D&ugrave; c&oacute; một thiết kế năng động, nhưng HP Envy 13-aq0026TU sẽ l&agrave;m bạn bất ngờ khi được trang bị bộ vi xử l&yacute; Intel Core i5 8265U c&ocirc;ng nghệ mới nhất với xung nhịp tối đa l&ecirc;n tới 3.9GHz. Kết hợp với 8GB RAM v&agrave; 256GB lưu trữ SSD, bạn c&oacute; thể y&ecirc;n t&acirc;m xử l&yacute; mọi t&aacute;c vụ đa nhiệm h&agrave;ng ng&agrave;y tr&ecirc;n laptop một c&aacute;ch dễ d&agrave;ng. B&ecirc;n cạnh đ&oacute;, m&aacute;y t&iacute;nh x&aacute;ch n&agrave;y được t&iacute;ch hợp card Intel UHD Graphics để gi&uacute;p việc chạy c&aacute;c phần mềm đồ họa v&agrave; chơi game tốt hơn.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\n<strong>Giải tr&iacute; kh&ocirc;ng giới hạn với m&agrave;n h&igrave;nh tr&agrave;n viền tuyệt đẹp</strong></h3>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"màn hình HP Envy 13-aq0027TU\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/hp-envy-13-aq0027tu-2.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Kh&aacute;c với nhiều laptop m&agrave; bạn đang thấy tr&ecirc;n thị trường, HP Envy 13 được trang bị một m&agrave;n h&igrave;nh 13.3 inch tr&agrave;n viền đặc biệt mang lại một trải nghiệm hiển thị ấn tượng. Với g&oacute;c nh&igrave;n rộng 178 độ, độ s&aacute;ng cao v&agrave; tấm nền Full HD sắc n&eacute;t, mọi nội dung hiển thị tr&ecirc;n laptop sẽ m&ecirc; hoặc bạn bất cứ l&uacute;c n&agrave;o. B&ecirc;n cạnh đ&oacute;, bốn đơn vị loa v&agrave; &acirc;m thanh được tinh chỉnh bởi c&aacute;c chuy&ecirc;n gia của Bang &amp; Olufsen hứa hẹn cung cấp cho người xem những ph&uacute;t gi&acirc;y giải tr&iacute; đỉnh cao.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\n<strong>Thời lượng pin ấn tượng</strong></h3>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"giải trí HP Envy 13-aq0027TU\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/hp-envy-13-aq0027tu-6.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">HP Envy 13-aq0026TU c&ograve;n mang tới cho người d&ugrave;ng một bất ngờ lớn kh&aacute;c ch&iacute;nh l&agrave; thời lượng pin k&eacute;o d&agrave;i 14 tiếng. Nhờ đ&oacute;, bạn c&oacute; thể y&ecirc;n t&acirc;m trải nghiệm một ng&agrave;y d&agrave;i năng động m&agrave; kh&ocirc;ng phải', '120_4938_d509da_ryzen_5__2_.png', 20, '1', 0, 16),
(74, 'Acer Nitro AN515-52-53PC', '20000000', '19000000', '<p>Kh&aacute;ch h&agrave;ng chọn 1 trong 2 khuyến mại sau:</p>\r\n\r\n<p>KM1:</p>\r\n\r\n<ul>\r\n	<li>Trả g&oacute;p 0%/0đ</li>\r\n</ul>\r\n\r\n<p>KM2:</p>\r\n\r\n<ul>\r\n	<li>Tặng PMH 2,000,000đ</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tặng Chuột c&oacute; d&acirc;y Gaming</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tặng Balo Gaming SUV</li>\r\n</ul>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng được khuyến mại th&ecirc;m:</p>\r\n\r\n<ul>\r\n	<li>Cơ hội tr&uacute;ng 10 chiếc iPhone 11&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/the-le-chuong-trinh-mua-lap', '<h3 style=\"text-align:justify\">Đ&aacute;nh gi&aacute; chi tiết Acer Nitro AN515-52-53PC/Core i5-8300H/NH.Q3MSV.00B</h3>\r\n\r\n<p style=\"text-align:justify\">Acer Nitro AN515 l&agrave; sản phẩm xuất sắc trong d&ograve;ng laptop gaming khi sở hữu bộ vi xử l&yacute; Intel Core i5 thế hệ thứ 8 mạnh mẽ, chipset đồ họa NVIDIA GeForce GTX 1050 v&agrave; ghi dấu ấn nhờ thiết kế sắc sảo với những n&eacute;t cắt xẻ hiện đại.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Diện mạo sắc sảo và tinh tế\" id=\"Diện mạo sắc sảo và tinh tế 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/02/Acer-nitro-an515-52-53pc-1.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Diện mạo sắc sảo v&agrave; tinh tế</strong></h3>\r\n\r\n<p style=\"text-align:justify\">L&agrave; một chiếc laptop gaming thực thụ, Acer Nitro AN515-52-53PC truyền cảm hứng cho người d&ugrave;ng qua thiết kế sắc sảo b&ecirc;n ngo&agrave;i, nh&agrave; sản xuất đ&atilde; kết hợp hai gam m&agrave;u đen &ndash; đỏ để tăng th&ecirc;m n&eacute;t th&acirc;m trầm cho thiết bị. Điểm nhấn ở những đường v&aacute;t cắt xẻ hiện đại khắp th&acirc;n m&aacute;y gi&uacute;p Nitro AN515 ph&ocirc; diễn n&eacute;t đẹp hiện đại m&agrave; kh&ocirc;ng k&eacute;m phần tinh tế.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Thu hút ánh nhìn\" id=\"Thu hút ánh nhìn 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/02/Acer-nitro-an515-52-53pc-3.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>H&ograve;a m&igrave;nh v&agrave;o kh&ocirc;ng gian game với m&agrave;n h&igrave;nh Full HD</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Nitro AN515-52-53PC được trang bị m&agrave;n h&igrave;nh 15.6 inch độ ph&acirc;n giải 1.920 x 1.080 pixels. Sự sắc sảo v&agrave; ch&acirc;n thực của trải nghiệm h&igrave;nh ảnh m&agrave; sản phẩm mang lại khiến bạn dễ d&agrave;ng ch&igrave;m đắm v&agrave;o kh&ocirc;ng gian game cuốn h&uacute;t v&agrave; th&uacute; vị. C&aacute;c game thủ sẽ thỏa sức theo d&otilde;i từng chi tiết của game đấu v&agrave; đưa ra phương &aacute;n xử l&yacute; chuẩn x&aacute;c nhất tr&ecirc;n m&agrave;n h&igrave;nh&nbsp;Nitro AN515-52-53PC.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Thu hút ánh nhìn với viền màn hình siêu mỏng 1\" id=\"Thu hút ánh nhìn với viền màn hình siêu mỏng 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/02/Acer-nitro-an515-52-53pc-2.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Đảm bảo kết nối mạng để bạn tập trung v&agrave;o trận chiến</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Sở hữu một chiếc Acer Nitro AN515-52-53PC, c&aacute;c game thủ sẽ kh&ocirc;ng phải bận t&acirc;m tới tốc độ đường truyền bởi c&ocirc;ng nghệ Killer Ethernet c&oacute; tốc độ 1Gbps m&agrave; sản phẩm sở hữu. Với chuẩn Wi-Fi Gigabit 5with 2x2 MU-MiMO Technology Intel 802.11ac Wave 2 mới nhất, tốc độ truyền tải dữ liệu sẽ chạm tới mức 1.7Gbps.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Đảm bảo kết nối mạng để bạn tập trung vào trận chiến 1\" id=\"Đảm bảo kết nối mạng để bạn tập trung vào trận chiến 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/02/Acer-nitro-an515-52-53pc-4.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>G&oacute;i gọn sức mạnh hiệu năng đ&aacute;ng nể</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Nhằm đ&aacute;p ứng sự mong mỏi của c&aacute;c game thủ về mặt hiệu năng, Acer đem tới cho Nitro AN515-52-53PC con chip Intel Core i5 8300H tốc độ xung nhịp 2.30 GHz c&ugrave;ng card đồ họa GTX 1050, m&aacute;y c&oacute; 8GB RAM DDR4. Cấu h&igrave;nh n&agrave;y cho ph&eacute;p chủ nh&acirc;n của chiếc laptop c&oacute; thể trải nghiệm những tựa game &ldquo;hot&rdquo; nhất như LoL hay DoTA 2. Lợi thế từ ổ cứng SSD 512GB gi&uacute;p người d&ugrave;ng khởi động thiết bị với tốc độ nhanh v&agrave; r&uacute;t ngắn thời gian mở ứng dụng hay sao ch&eacute;p dữ liệu.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Gói gọn sức mạnh hiệu năng đáng nể 1\" id=\"Gói gọn sức mạnh hiệu năng đáng nể 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/02/Acer-nitro-an515-52-53pc-5.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>D&otilde;i theo từng diễn biến của game đấu với &acirc;m thanh cao cấp</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Bạn sẽ như được đưa v&agrave;o thế giới game thực sự nhờ chất lượng &acirc;m thanh tương đương ph&ograve;ng thu m&agrave; Nitro AN515-52-53PC mang lại, sự phối hợp của hai phần mềm xuất sắc l&agrave; Acer TrueHarmony v&agrave; Waves MaxxAudio cho ph&eacute;p bạn theo d&otilde;i từng tiếng bước ch&acirc;n của đối thủ hay thanh &acirc;m của mỗi chi&ecirc;u thức một c&aacute;ch sống động nhất.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Đẩy mạnh hiệu suất chỉ với một nút bấm 1\" id=\"Đẩy mạnh hiệu suất chỉ với một nút bấm 11\" src=\"data:image/png;', '637043321216039369_acer-nitro-an515-52-53pc-1.png', 10, '1', 0, 16),
(75, 'Tai nghe bluetooth choàng đầu có mic i.value BT-233 brown', '600000', '490000', '<p>KHUYẾN M&Atilde;I ĐẶC BIỆT</p>\r\n\r\n<p>Ưu đ&atilde;i d&ugrave;ng thử 15 ng&agrave;y.</p>\r\n\r\n<p>C&agrave;ng mua c&agrave;ng rẻ:</p>\r\n\r\n<ul>\r\n	<li>Mua 2-3 m&oacute;n Phụ Kiện kh&aacute;c nhau giảm 10%</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Mua 4 m&oacute;n Phụ Kiện kh&aacute;c nhau giảm 15%</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Mua 5 m&oacute;n Phụ Kiện trở l&ecirc;n kh&aacute;c nhau giảm 20%</li>\r\n</ul>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', '<h2 style=\"text-align:justify\">ĐẶC ĐIỂM NỔI BẬT</h2>\r\n\r\n<p style=\"text-align:justify\">Với i.value BT-233, bạn kh&ocirc;ng cần phải bỏ ra số tiền qu&aacute; lớn m&agrave; vẫn trở th&agrave;nh chủ nh&acirc;n của một chiếc tai nghe bluetooth hiện đại c&oacute; thiết kế sang trọng thanh lịch v&agrave; đem tới trải nghiệm &acirc;m thanh ưng &yacute;.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Thiết kế nhẹ nh&agrave;ng, tinh tế v&agrave; lịch l&atilde;m</strong></h3>\r\n\r\n<p style=\"text-align:justify\">i.value BT-233 c&oacute; k&iacute;ch cỡ gọn nhẹ chỉ 190 x 170 x 79.5 mm, đ&acirc;y l&agrave; sản phẩm được thiết kế ph&ugrave; hợp với m&ocirc;i trường l&agrave;m việc văn ph&ograve;ng chuy&ecirc;n nghiệp khi đi theo xu hướng sang trọng v&agrave; lịch l&atilde;m. Nh&agrave; sản xuất đ&atilde; lựa chọn hai tone m&agrave;u nhẹ nh&agrave;ng l&agrave; n&acirc;u v&agrave; bạc xuy&ecirc;n suốt chiếc tai nghe n&agrave;y thay v&igrave; những phối m&agrave;u trầm như đen hoặc đỏ giống như c&aacute;c d&ograve;ng tai nghe c&ugrave;ng ph&acirc;n kh&uacute;c.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Thiết kế nhẹ nhàng, tinh tế và lịch lãm 1\" id=\"Thiết kế nhẹ nhàng, tinh tế và lịch lãm 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/1310/Mo-ta-san-pham-tai-nghe-i-value-bt-233-2.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Cảm gi&aacute;c thoải m&aacute;i tối đa khi sử dụng</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Việc sử dụng chất liệu nhựa ABS gi&uacute;p i.value BT-233 c&oacute; trọng lượng nhẹ nh&agrave;ng, từ đ&oacute; đem lại cảm gi&aacute;c hết sức thoải m&aacute;i tr&ecirc;n tai khi nghe nhạc trong thời gian d&agrave;i. Phần đệm tai của BT-233 kh&ocirc;ng qu&aacute; d&agrave;y nhưng vẫn đảm bảo &ocirc;m trọn khu vực v&agrave;nh tai nhằm hạn chế tạp &acirc;m lọt v&agrave;o l&agrave;m ảnh hưởng tới trải nghiệm &acirc;m thanh, thiết kế kh&eacute;o l&eacute;o của i.value gi&uacute;p cho đệm tai kh&ocirc;ng qu&aacute; cứng hay qu&aacute; mềm, tr&aacute;nh g&acirc;y ra sự kh&oacute; chịu cho người d&ugrave;ng như những d&ograve;ng tai nghe cho&agrave;ng đầu kh&aacute;c.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Cảm giác thoải mái tối đa khi sử dụng 1\" id=\"Cảm giác thoải mái tối đa khi sử dụng 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/1310/Mo-ta-san-pham-tai-nghe-i-value-bt-233-3.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Kết nối kh&ocirc;ng d&acirc;y tiện lợi</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Thể hiện r&otilde; thế mạnh của một chiếc tai nghe bluetooth, i.value BT-233 c&oacute; khả năng kết nối kh&ocirc;ng d&acirc;y với m&aacute;y t&iacute;nh, smartphone v&agrave; c&aacute;c thiết bị tương th&iacute;ch trong phạm vi l&ecirc;n tới 10 m&eacute;t. Với gi&aacute; b&aacute;n chỉ nhỉnh hơn đ&ocirc;i ch&uacute;t so với d&ograve;ng tai nghe c&oacute; d&acirc;y th&ocirc;ng thường, BT-233 gi&uacute;p bạn gi&atilde; từ với những phiền phức như rối d&acirc;y hay đứt c&aacute;p kết nối cực k&igrave; kh&oacute; chịu của tai nghe truyền thống. Bạn sẽ dễ d&agrave;ng mang theo sản phẩm n&agrave;y b&ecirc;n m&igrave;nh trong những chuyến đi xa m&agrave; kh&ocirc;ng lo vướng v&iacute;u hay bất tiện g&igrave; cả.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Kết nối không dây tiện lợi 1\" id=\"Kết nối không dây tiện lợi 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/1310/Mo-ta-san-pham-tai-nghe-i-value-bt-233-4.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Đem tới trải nghiệm &acirc;m thanh ưng &yacute;</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Những trải nghiệm thực tế cho thấy i.value BT-233 c&oacute; thể hỗ trợ tối ưu cho người d&ugrave;ng d&ugrave; l&agrave; trong c&ocirc;ng việc hay giải tr&iacute; nhờ &acirc;m thanh tốt với chất &acirc;m lớn v&agrave; r&otilde; r&agrave;ng. D&ugrave; bạn th&iacute;ch nghe c&aacute;c d&ograve;ng nhạc sử dụng nhiều thanh &acirc;m điện tử như pop, EDM hay những bản nhạc h&ograve;a tấu nhẹ nh&agrave;ng th&igrave; chiếc tai nghe bluetooth n&agrave;y cũng c&oacute; thể mang lại trải nghiệm &acirc;m nhạc khiến bạn ưng &yacute;.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Mô tả sản phẩm tai nghe i.value BT-233 1\" id=\"Mô tả sản phẩm tai nghe i.value BT-233 11\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/1310/Mo-ta-san-pham-tai-nghe-i-value-bt-233-1.jpg\" /></p>\r\n\r\n<h3 style=\"text-align:justify\">&nbsp;</h3>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Chiếc tai nghe ho&agrave;n hảo trong&nbsp;</strong><strong>tầm gi&aacute;</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Với thế mạnh được thể hiện r&otilde; r&agrave;ng trong từng ti&ecirc;u ch&iacute;, i.value BT-233 cho thấy m&igrave;nh l&agrave; sản phẩm được ch&uacute; trọng ho&agrave;n thiện tốt về cả chất v&agrave; lượng. Tin rằng bạn sẽ kh&oacute; l&ogr', '636933431673444809_HASP-Tainghe-ivalue-BT233-555010-5.jpg', 50, '1', 0, 17),
(76, 'Tai nghe Logitech G433 Red', '1990000', '1800000', '<p>&nbsp; &quot; rows=&quot;5&quot;&gt;</p>\r\n', '<p><strong>Phụ kiện theo k&egrave;m:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Tai nghe chơi game c&oacute; d&acirc;y G433</li>\r\n	<li style=\"text-align:justify\">USB DAC c&oacute; đầu ra 4 ch&acirc;n 3.5 mm</li>\r\n	<li style=\"text-align:justify\">Cần mic c&oacute; thể t&aacute;ch rời với m&agrave;ng lọc micro pop</li>\r\n	<li style=\"text-align:justify\">D&acirc;y m&aacute;y t&iacute;nh/m&aacute;y chơi game console với c&aacute;c n&uacute;t điều khiển tr&ecirc;n d&acirc;y</li>\r\n	<li style=\"text-align:justify\">Bộ t&aacute;ch m&aacute;y t&iacute;nh để t&aacute;ch c&aacute;c giắc cắm mic v&agrave; tai nghe</li>\r\n	<li style=\"text-align:justify\">D&acirc;y di động với c&aacute;c n&uacute;t điều khiển tr&ecirc;n d&acirc;y v&agrave; mic</li>\r\n	<li style=\"text-align:justify\">Đệm tai bổ sung bằng vi sợi</li>\r\n	<li style=\"text-align:justify\">T&uacute;i đựng tai nghe</li>\r\n	<li style=\"text-align:justify\">T&agrave;i liệu hướng dẫn sử dụng</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn_logitech_g433_1_d6cc0210506c43549551d1eb9dfbaece.jpg\" style=\"height:810px; width:810px\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Một số đặc t&iacute;nh nổi trội:</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h4 style=\"text-align:justify\">M&Agrave;NG LOA &Acirc;M THANH PRO-G&trade;</h4>\r\n\r\n<p style=\"text-align:justify\">M&agrave;ng loa Pro-G tạo ra &acirc;m trầm b&ugrave;ng nổ v&agrave; độ cao trong trẻo nhờ cấu tr&uacute;c lưới hybrid gi&uacute;p giảm đ&aacute;ng kể hiện tượng m&eacute;o tiếng. Chụp tai G433 cũng c&oacute; một cổng &acirc;m thanh nằm sau m&agrave;ng loa để cho &acirc;m thanh sống động, lan tỏa hơn nữa.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h4 style=\"text-align:justify\">TRỌNG LƯỢNG NHẸ, SI&Ecirc;U BỀN</h4>\r\n\r\n<p style=\"text-align:justify\">Nặng 259 g, G433 bao gồm polycarbonate được bơm v&agrave;o sợi thủy tinh c&oacute; trọng lượng nhẹ, th&eacute;p kh&ocirc;ng gỉ v&agrave; nylon TR-90. Bao gồm đệm tai nghe bằng lưới thể thao bao bọc lấy tai v&agrave; cung cấp đủ lực để giữ đ&uacute;ng vị tr&iacute; v&agrave; ho&agrave;n to&agrave;n th&ocirc;ng tho&aacute;ng. Đệm tai nghe bằng vi sợi tổng hợp si&ecirc;u mềm cũng được đưa v&agrave;o lựa chọn của bạn để tạo sự thoải m&aacute;i v&agrave; phong c&aacute;ch.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h4 style=\"text-align:justify\">C&Oacute; THỂ TH&Aacute;O RỜI, C&Oacute; THỂ BIẾN ĐỔI</h4>\r\n\r\n<p style=\"text-align:justify\">G433 được trang bị đầy đủ v&agrave; c&oacute; kết cấu ho&agrave;n chỉnh. Cần mic c&oacute; thể th&aacute;o rời v&agrave; d&acirc;y c&aacute;p c&oacute; thể ho&aacute;n đổi nhanh ch&oacute;ng chuyển G433 từ chế độ m&aacute;y t&iacute;nh/m&aacute;y chơi game sang chế độ điện thoại/di động. Đ&acirc;y l&agrave; tai nghe di động c&oacute; thể chơi game ở mọi nơi.</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n\r\n<p>&quot; rows=&quot;5&quot;&gt;</p>\r\n', '636742490546466954_Dell-Inspiron-N3476-1.png', 50, '1', 0, 16),
(77, 'TAI NGHE SONY BLUETHOOTH MDR - XB650BT (ĐEN)', '3000000', '2590000', '<p>T&Iacute;NH NĂNG NỔI BẬT</p>\r\n\r\n<p><a href=\"https://binhminhdigital.com/sony-bluethooth-mdr-xb650bt-den.html\"><strong>Tai nghe Sony Bluetooth MDR-XB650BT</strong></a><br />\r\n- M&agrave;ng loa Dynamic rộng 30mm, t&aacute;i tạo &acirc;m Bass s&acirc;u</p>\r\n\r\n<p>&nbsp;chắc đầy mạnh mẽ</p>\r\n\r\n<p>- C&ocirc;ng nghệ kết nối kh&ocirc;ng d&acirc;y Bluetooth 4.0 với NFC</p>\r\n\r\n<p>- Kh&ocirc;ng hỗ trợ kết nối d&acirc;y 3.5mm</p>\r\n\r\n<p>- Pin sạc đem đến 30 giờ nghe nhạc li&ecirc;n tục</p>\r\n\r\n<p>- T&iacut', '<p style=\"text-align:justify\"><a href=\"https://binhminhdigital.com/sony-bluethooth-mdr-xb650bt-den.html\"><strong>Đ&Aacute;NH GI&Aacute; TAI NGHE SONY BLUETHOOTH MDR - XB650BT</strong></a></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nTai nghe Sony Bluetooth MDR-XB650BT l&agrave; tai nghe kh&ocirc;ng d&acirc;y cao cấp mang lại những tiện dụng cho bạn khi sử dụng. Đ&acirc;y l&agrave; phụ kiện sẽ lu&ocirc;n b&ecirc;n bạn trong những h&agrave;nh tr&igrave;nh kh&aacute;m ph&aacute;, những chuyến du lịch hay đơn giản l&agrave; thư giản mọi l&uacute;c mọi nơi.<br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tai Nghe Sony Bluethooth MDR - XB650BT (Đen)\" src=\"https://binhminhdigital.com/StoreData/Product/9086/TAI-NGHE-SONY-BLUETHOOTH-MDR-XB650BT-(DEN)%20(2).jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>&Acirc;m trầm tạo n&ecirc;n sự kh&aacute;c biệt</strong><br />\r\n<br />\r\n<a href=\"https://binhminhdigital.com/tai-nghe-sony/\"><strong>Tai nghe Sony</strong></a>&nbsp;kết hợp &acirc;m thanh EXTRA BASS&trade;2 s&acirc;u v&agrave; mạnh mẽ mang lại cho bạn sự thoải m&aacute;i nhờ thiết kế kh&ocirc;ng d&acirc;y v&agrave; thoải m&aacute;i để nghe l&acirc;u.<br />\r\n<br />\r\n<strong>Tận hưởng l&acirc;u hơn, ở bất kỳ đ&acirc;u</strong><br />\r\n<br />\r\nThời gian sử dụng pin d&agrave;i hơn cho bạn nghe nhạc đến 30 giờ4 với chất lượng &acirc;m thanh tuyệt hảo. Khả năng kết nối kh&ocirc;ng d&acirc;y với trải nghiệm nghe một chạm qua Bluetooth&reg; v&agrave; NFC sẽ đem đến cho bạn cảm gi&aacute;c thật sự thoải m&aacute;i.<br />\r\n<br />\r\n<strong>Nghe nhạc thật thoải m&aacute;i</strong><br />\r\n<br />\r\nTrọng lượng nhẹ v&agrave; nhỏ gọn, thiết kế của chiếc&nbsp;<a href=\"https://binhminhdigital.com/tai-nghe/\"><strong>tai nghe</strong></a>&nbsp;n&agrave;y kh&ocirc;ng chỉ mang đến sự thoải m&aacute;i cho việc nghe l&acirc;u m&agrave; c&ograve;n gi&uacute;p bạn tối ưu h&oacute;a &acirc;m trầm.<br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tai Nghe Sony Bluethooth MDR - XB650BT (Đen)\" src=\"https://binhminhdigital.com/StoreData/Product/9086/TAI-NGHE-SONY-BLUETHOOTH-MDR-XB650BT-(DEN)%20(3).jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>Ph&ugrave; hợp với &acirc;m trầm</strong><br />\r\n<br />\r\nCấu tr&uacute;c cho&agrave;ng đầu c&oacute; thể điều chỉnh được tối ưu để ph&aacute;t &acirc;m trầm s&acirc;u, th&iacute;ch hợp để giảm thiểu rung g&acirc;y ra bởi c&aacute;c nốt trầm mạnh.<br />\r\n<br />\r\n<strong>Kiểu d&aacute;ng ph&ugrave; hợp với chức năng</strong><br />\r\n<br />\r\nC&aacute;c đệm của&nbsp;<strong>Tai nghe Sony Bluetooth MDR-XB650BT</strong>&nbsp;mềm gi&uacute;p bịt k&iacute;n kh&iacute; để truyền &acirc;m trầm trực tiếp. C&aacute;c v&agrave;nh tai nghe c&oacute; thiết kế gập phẳng để dễ cất đi khi kh&ocirc;ng sử dụng.<br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tai Nghe Sony Bluethooth MDR - XB650BT (Đen)\" src=\"https://binhminhdigital.com/StoreData/Product/9086/TAI-NGHE-SONY-BLUETHOOTH-MDR-XB650BT-(DEN)%20(1).jpg\" /></p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 'sony-bluethooth-mdr-xb650bt-den.jpg', 100, '1', 0, 17),
(78, 'TAI NGHE HI-RES SONY WH-H900N (CRÔM)', '7000000', '6450000', '<p>T&Iacute;NH NĂNG NỔI BẬT</p>\r\n\r\n<p><strong><a href=\"https://binhminhdigital.com/sony-whh900n-den.html\">Tai nghe Hi-res Sony WH-H900N</a></strong></p>\r\n\r\n<p>Tai nghe hỗ trợ Hi-Res</p>\r\n\r\n<p>M&agrave;ng loa HD rộng 40mm</p>\r\n\r\n<p>Bluetooth LDAC &amp; NFC kết nối một chạm</p>\r\n\r\n<p>M&agrave;ng loa HD rộng 40mm</p>\r\n\r\n<p>Cơ chế gập xoay linh hoạt thuận tiện cho di chuyển</p>\r\n\r\n<p>Rảnh tay đ&agrave;m thoại với micro tr&ecirc;n th&acirc;n tai nghe</p>\r\n\r\n<p>Dải &acirc;m tần: 5 &ndash; 40,000 Hz (d', '<p style=\"text-align:justify\"><strong><a href=\"https://binhminhdigital.com/sony-whh900n-crom.html\">Đ&aacute;nh gi&aacute; Tai nghe Hi-res Sony WH-H900N (Crom)</a></strong></p>\r\n\r\n<p style=\"text-align:justify\">Sony l&agrave; t&ecirc;n tuổi đ&atilde; định h&igrave;nh trong l&ograve;ng người ti&ecirc;u d&ugrave;ng với những sản phẩm &acirc;m thanh chất lượng v&agrave; độ bền cao.&nbsp; Nắm bắt xu thế lựa chọn của người d&ugrave;ng ng&agrave;y c&agrave;ng nhiều&nbsp; với những chiếc tai nghe kh&ocirc;ng d&acirc;y c&ocirc;ng nghệ hiện đại v&agrave; thiết kế tối giản. Chiếc tai nghe chống ồn Sony WH-H900N đ&atilde; được giới thiệu.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tai nghe Hi-res Sony WH-H900N (Crôm)\" src=\"https://binhminhdigital.com/StoreData/Product/11446/sony-whh900n-crom.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Thiết kế thoải m&aacute;i v&agrave; di động</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Nhẹ v&agrave; tiện dụng,&nbsp;tai nghe Sony&nbsp;kh&ocirc;ng d&acirc;y n&agrave;y c&oacute; thể gập lại khi kh&ocirc;ng sử dụng. V&agrave; khi bạn c&oacute; ch&uacute;ng, c&aacute;c miếng đệm tai mềm lu&ocirc;n thoải m&aacute;i bạn tận hưởng &acirc;m nhạc cả ng&agrave;y</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>&Acirc;m nhạc của bạn tốt nhất</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">H&atilde;y tận hưởng những sắc th&aacute;i tinh tế của &acirc;m thanh chất lượng ph&ograve;ng thu với chất lượng cao hơn CD với độ ph&acirc;n giải cao&nbsp;từ chiếc&nbsp;<strong><a href=\"https://binhminhdigital.com/tai-nghe-sony/\">tai nghe Sony</a></strong>&nbsp;n&agrave;y nh&eacute;!&nbsp;Niềm đam m&ecirc; &acirc;m nhạc kết hợp mọi th&agrave;nh phần từ t&iacute;n hiệu đến loa, v&igrave; vậy cảm gi&aacute;c như nghệ sĩ đang biểu diễn ngay trước mặt của bạn.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tai nghe Hi-res Sony WH-H900N (Crôm)\" src=\"https://binhminhdigital.com/StoreData/Product/11446/sony-whh900n-crom21.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Cuộc gọi thuận tiện v&agrave; điều khiển cảm ứng</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Thực hiện v&agrave; thực hiện c&aacute;c cuộc gọi điện thoại dễ d&agrave;ng v&agrave; r&otilde; r&agrave;ng bằng c&aacute;ch sử dụng micr&ocirc; t&iacute;ch hợp v&agrave; hỗ trợ giọng n&oacute;i HD.&nbsp;Với điều khiển cảm ứng đơn giản, bạn chỉ cần chạm v&agrave;o miếng tai để điều khiển ph&aacute;t lại &acirc;m lượng v&agrave; &acirc;m lượng hoặc k&iacute;ch hoạt trợ l&yacute; thoại của điện thoại th&ocirc;ng minh của bạn.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Chọn những g&igrave; bạn nghe thấy</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Với chức năng khử tiếng ồn, chế độ Ambient Sound v&agrave; sự ch&uacute; &yacute; nhanh, bạn ho&agrave;n to&agrave;n kiểm so&aacute;t được trải nghiệm nghe của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Tinh chỉnh c&agrave;i đặt từ điện thoại</strong></p>\r\n\r\n<p style=\"text-align:justify\">Sony |&nbsp;Ứng dụng&nbsp;<a href=\"https://binhminhdigital.com/tai-nghe/\"><strong>Tai nghe</strong></a>&nbsp;kết nối cho ph&eacute;p bạn chỉnh c&aacute;c c&agrave;i đặt bộ chỉnh &acirc;m, chọn c&agrave;i đặt trước &acirc;m thanh v&ograve;m v&agrave; hơn thế nữa.&nbsp;<br />\r\n<br />\r\n<strong>Chạm để bỏ qua c&aacute;c bản nhạc</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tai nghe Hi-res Sony WH-H900N (Crôm)\" src=\"https://binhminhdigital.com/StoreData/Product/11446/sony-whh900n-crom1.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Trả lời cuộc gọi điện thoại, điều khiển nhạc v&agrave; k&iacute;ch hoạt Trợ l&yacute; Google hoặc Siri - tất cả đều sử dụng c&aacute;c n&uacute;t điều khiển cảm ứng đơn giản.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Pin cả ng&agrave;y</strong></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nVới&nbsp;pin&nbsp;l&ecirc;n tới 28 giờ giữa c&aacute;c lần sạc, bạn c&oacute; thể thưởng thức ph&aacute;t lại kh&ocirc;ng d&acirc;y cả ng&agrave;y.&nbsp;Pin sạc nhanh - cắm n&oacute; chỉ trong 10 ph&uacute;t, v&agrave; bạn sẽ c&oacute; đủ năng lượng cho 65 ph&uacute;t ph&aacute;t lại.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>BLUETOOTH</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nLDAC &trade; truyền nhiều dữ liệu hơn so với kết nối kh&ocirc;ng d&acirc;y Bluetooth th&ocirc;', 'sony-whh900n-crom.jpg', 59, '1', 0, 17);
INSERT INTO `product` (`id`, `nameproduct`, `price`, `sale_price`, `detail`, `detail_specifications`, `image`, `amount`, `status`, `rating`, `id_cate`) VALUES
(79, 'MSI GF63 Thin 9RCX 645VN', '24000000', '22190000', '<h3>M&ocirc; tả sản phẩm</h3>\r\n\r\n<p>Intel&reg; Core&trade; i7-9750H (2.6 Upto 4.5GHz, 6 nh&acirc;n 12 luồng, 12MB)</p>\r\n\r\n<p>RAM: 8GB DDR4 2666MHz</p>\r\n\r\n<p>Ổ cứng: 512GB NVMe PCIe SSD</p>\r\n\r\n<p>VGA: nVidia Geforce GTX 1050Ti 4GB GDDR5</p>\r\n\r\n<p>Display: 15.6&quot; FHD (1920 x 1080) IPS, 60Hz, Thin Bezel, Anti-Glare with 45% NTSC</p>\r\n\r\n<p>Kết nối: 3x USB 3.1, 1x USB 3.1 Type-C, 1x HDMI, 1x Mini-DisplayPort, 1x RJ45 Color: Black</p>\r\n\r\n<p>Weight:1.86 kg</p>\r\n\r\n<p>OS: Windows 10 Home</p>\r\n\r\n<p><s', '<p><strong>Laptop gaming MSI GF63 - LAPTOP GAMING VIỀN MỎNG</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://laptopworld.vn/media/lib/134_MSIGF63-6.JPG\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>1. Thiết kế thanh lịch, nhỏ, gọn</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong><img alt=\"\" src=\"https://laptopworld.vn/media/lib/134_MSIGF63-1.JPG\" /></strong></p>\r\n\r\n<p style=\"text-align:justify\">MSI GF63 đ&atilde; đổi từ phong c&aacute;ch to bản, hầm hố sang phong c&aacute;ch thanh lịch, tối giản v&agrave; di động hơn. Đ&acirc;y l&agrave; chiếc laptop gaming c&oacute; c&acirc;n nặng nhẹ nhất trong ph&acirc;n kh&uacute;c chỉ chưa đến 1,9kg (Nặng 1.86kg, mỏng 2,7mm). Nắp m&aacute;y v&agrave; phần b&agrave;n ph&iacute;m được l&agrave;m bằng phay xước phẳng gi&uacute;p cho chiếc m&aacute;y trở n&ecirc;n cao cấp, thanh mảnh, gọn g&agrave;ng v&agrave; mang lại độ chắc chắn chắn cho to&agrave;n bộ chiếc m&aacute;y. Mặt lưng được thiết kế theo phong c&aacute;ch tối giản với chỉ 1 logo rồng xương m&agrave;u đỏ nằm ở giữa. &nbsp;Đến cả phần đấy m&aacute;y c&aacute;c chi tiết được thiết kế cầu k&igrave;, đường n&eacute;t g&oacute;c cạnh, phay xước rất c&aacute; t&iacute;nh.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>2. Cấu h&igrave;nh mạnh mẽ chuẩn game</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong><img alt=\"\" src=\"https://laptopworld.vn/media/lib/134_MSIGF63-4.JPG\" /></strong></p>\r\n\r\n<p style=\"text-align:justify\">Bộ xử l&yacute; Intel&nbsp;<sup>&reg;</sup>&nbsp;Core &trade;i5/ i7&nbsp;thế hệ thứ 9 mới nhất</p>\r\n\r\n<p style=\"text-align:justify\">B&ecirc;n cạnh đ&oacute;, sức mạnh đồ họa đến từ card GeForce của NVIDIA cho ph&eacute;p bạn c&oacute; thể tải về v&agrave; chơi tốt c&aacute;c tựa game phổ biến hiện nay. C&ugrave;ng với c&ocirc;ng nghệ ti&ecirc;n tiến GeForce&reg; Max-Q gi&uacute;p cho GF63 trở th&agrave;nh một chiếc laptop gaming vừa mỏng nhẹ vừa tốc độ v&agrave; mạnh mẽ.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>3. Thiết kế viền m&agrave;n h&igrave;nh si&ecirc;u mỏng</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong><img alt=\"\" src=\"https://laptopworld.vn/media/lib/134_MSIGF63-5.JPG\" /></strong></p>\r\n\r\n<p style=\"text-align:justify\">Thiết kế viền si&ecirc;u mỏng l&agrave;m cho chiếc&nbsp;MSI GF63 chỉ như chiếc laptop 14inch th&ocirc;ng thường. Điều n&agrave;y thật tuyệt vời cho những ai hay phải di chuyển</p>\r\n\r\n<p style=\"text-align:justify\"><strong>4. Thời lượng pin l&ecirc;n tưới 7 tiếng</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong><img alt=\"\" src=\"https://laptopworld.vn/media/lib/134_MSIGF63-7.JPG\" /></strong></p>\r\n\r\n<p style=\"text-align:justify\">H&atilde;ng đ&atilde; đưa ra thời lượng sử dụng cho sản phẩm l&agrave; 7 tiếng, Thời lượng thực tế phản hồi từ kh&aacute;ch h&agrave;ng l&agrave; 4-6 tiếng (T&ugrave;y nhu cầu sử dụng)</p>\r\n\r\n<p style=\"text-align:justify\"><strong>5. Hệ thống tản nhiệt tuyệt vời</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong><img alt=\"\" src=\"https://laptopworld.vn/media/lib/134_MSIGF63-8.JPG\" /></strong></p>\r\n\r\n<p style=\"text-align:justify\">Với chỉ một quạt tản nhiệt v&agrave; 2 khe gi&oacute; sau v&agrave; cạnh b&ecirc;n cũng kh&ocirc;ng l&agrave;m cho việc tản nhiệt của m&aacute;y gặp kh&oacute; khăn. Hệ thống&nbsp;tản nhiệt của&nbsp;<strong>MSI GF63</strong>&nbsp;được thiết kế để lu&ocirc;n hoạt động một c&aacute;ch &ecirc;m &aacute;i v&agrave; lu&ocirc;n giữ nhiệt độ dưới tải kể cả khi chơi game trong thời gian d&agrave;i.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>SẢN PHẨM ĐANG ĐƯỢC B&Agrave;Y B&Aacute;N TẠI SHOWROOM HO&Agrave;NG MINH TECH CO - CH&Iacute;NH H&Atilde;NG - GI&Aacute; TỐT - KHUYẾN M&Atilde;I LỚN</strong></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;</h2>\r\n', '4406_msi_gf63_thin_9rcx_anh4.jpg', 20, '1', 0, 16),
(80, 'HP Gaming Pavilion 15-cx0179TX 5EF42PA', '23000000', '21500000', '<h3>M&ocirc; tả sản phẩm</h3>\r\n\r\n<p>CPU: Intel&reg; Core&trade; i5-8300H (2.30 upto 4.00GHz, 8MB) / Ram: 8GB DDR4 2666Mhz / Ổ Cứng: 1TB HDD 7200 rpm / VGA: nVidia Geforce GTX 1050 4GB / Display 15.6&quot; FHD IPS (1920 x 1080) / Wireless / Webcam / Bluetooth / Đ&egrave;n nền b&agrave;n ph&iacute;m / Pin: 3-cell, 52.5 Wh / Weight: 2.17kg / OS: Windows 10 SL</p>\r\n\r\n<p><strong>Bảo h&agrave;nh:&nbsp;</strong>12 Th&aacute;ng ch&iacute;nh h&atilde;ng HP Việt Nam</p>\r\n\r\n<p><strong>Giao h&agrave;ng:</st', '<table cellpadding=\"5\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Hệ điều h&agrave;nh - Operation System</td>\r\n			<td style=\"text-align:justify\">&nbsp;Windows 10 SL</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Bộ xử l&yacute; - CPU</td>\r\n			<td style=\"text-align:justify\">&nbsp;Intel&reg; Core&trade; i5-8300H (2.30 upto 4.00GHz, 8MB)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Bo mạch chủ - Mainboard</td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">M&agrave;n h&igrave;nh - Monitor</td>\r\n			<td style=\"text-align:justify\">15.6&quot; FHD IPS (1920 x 1080)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Bộ nhớ trong - Ram</td>\r\n			<td style=\"text-align:justify\">&nbsp;8GB DDR4 2666Mhz</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Ổ đĩa cứng - HDD</td>\r\n			<td style=\"text-align:justify\">&nbsp;1TB HDD 7200 rpm</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Ổ đĩa quang - CD/DVD</td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Card đồ hoạ - Video</td>\r\n			<td style=\"text-align:justify\">&nbsp;nVidia Geforce GTX 1050 4GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Card &Acirc;m thanh - Audio</td>\r\n			<td style=\"text-align:justify\">&nbsp;1x jack 3.5mn</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Đọc thẻ - Card reader</td>\r\n			<td style=\"text-align:justify\">&nbsp;C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Webcam</td>\r\n			<td style=\"text-align:justify\">&nbsp;HD camera</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Finger Print</td>\r\n			<td style=\"text-align:justify\">&nbsp;--</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Giao tiếp mạng - Communications</td>\r\n			<td style=\"text-align:justify\">&nbsp;Wireless-AC 9560 802.11a/b/g/n/ac (2x2) Wi-Fi&reg;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Cổng giao tiếp - Port</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">&nbsp;1 USB 3.1 Type-C&trade; Gen 1 (Data Transfer up to 5 Gb/s)&nbsp;<br />\r\n			3 USB 3.1 Gen 1 (Data transfer only)</p>\r\n\r\n			<p style=\"text-align:justify\">1xHDMI</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Bluetooth</td>\r\n			<td style=\"text-align:justify\">&nbsp;Bluetooth&reg; 5 Combo</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Pin</td>\r\n			<td style=\"text-align:justify\">&nbsp;3-cell, 52.5 Wh</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">Trọng lượng</td>\r\n			<td style=\"text-align:justify\">&nbsp;2.17kg</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '178_a5db7f3d31637d109421b9599e84d283.jpg', 15, '1', 0, 18),
(81, 'HP Gaming Pavilion 15-dk0233TX 8DS86PA', '25000000', '23050000', '<h3>M&ocirc; tả sản phẩm</h3>\r\n\r\n<p>CPU: Intel&reg; Core&trade; i7-9750H (2.6GHz up to 4.5GHz, 6Cores, 12Threads, 12MB cache, FSB 8GT/s)</p>\r\n\r\n<p>Ram: 8GB DDR4 2666MHz, 2 slot Ram, Max 32GB</p>\r\n\r\n<p>Ổ cứng: SSD 512GB</p>\r\n\r\n<p>VGA: NVIDIA Geforce GTX 1650 4GB DDR5</p>\r\n\r\n<p>Display: 15.6-inch NanoEdge FHD (1920x1080) IPS</p>\r\n\r\n<p>Color: Black</p>\r\n\r\n<p>Pin: 3-Cell 52WHrs</p>\r\n\r\n<p>Weight: 2.3Kg</p>\r\n\r\n<p>Os: Windows 10 bản quyền</p>\r\n\r\n<p><strong>Bảo h&agrave;nh:&nbsp;</strong>12 Th&aacute;ng', '<p>TH&Ocirc;NG SỐ KỸ THUẬT</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Hệ điều h&agrave;nh - Operation System</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">Windows 10 64Bit Home</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Bộ xử l&yacute; - CPU&nbsp;</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">Intel&reg; Core&trade; i7-9750H (2.6GHz up to 4.5GHz, 6Cores, 12Threads, 12MB cache, FSB 8GT/s)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Bo mạch chủ - Mainboard</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">&nbsp;--</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>M&agrave;n h&igrave;nh - Monitor</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">15.6-inch NanoEdge FHD (1920x1080) IPS Non-Glare, 100% sRGB, 120Hz</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Bộ nhớ trong - Ram</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">8GB DDR4 2666MHz, 2 slot Ram, Max 32GB</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Ổ đĩa cứng - HDD</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">SSD 512GB</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Ổ đĩa quang - CD/DVD</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">&nbsp;--</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Card đồ hoạ - Video</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">NVIDIA Geforce GTX 1650 4GB DDR5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Card &Acirc;m thanh - Audio</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">&nbsp;--</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Đọc thẻ - Card reader</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">SD (XC/HC) Card Reader</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Webcam</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">HD Cam</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Finger Print</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">&nbsp;--</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Giao tiếp mạng - Communications</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">Intel&reg; 802.11ac (2x2) Gigabit Wi-Fi</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Cổng giao tiếp - Port</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">1x USB 3.1 Gen 2 (Type-C)<br />\r\n			3x USB3.1<br />\r\n			1x HDMI 2.0</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Bluetooth</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">Bluetooth 5.0</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Pin</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">3-Cell 52WHrs</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"text-align:justify\"><strong>Trọng lượng</strong></p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">2.3kg</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&quot; rows=&quot;5&quot;&gt;</p>\r\n', '636891905749830489_asus-tuf-fx505gd-bq324t-1.png', 20, '1', 0, 16);

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
  `status` bit(1) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `detail`, `image`, `link`, `status`, `id_product`) VALUES
(23, 'máy ảnh1', '1.png', '#', b'1', 0),
(24, 'demo', '3.png', '123', b'1', 0),
(25, 'demo1', '4.png', '#', b'1', 0);

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
(41, 'demo1111', '25d55ad283aa400af464c76d713c07ad', 'Trần Văn Quang', 'Leevip12c12@gmail.com', 'address', '0359316477', '45452589_480089019147847_6084658560262733824_n.jpg', 0, 1),
(44, 'quang6cnd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Trần Văn Quang', 'quang6cnd@gmail.com', 'address', '0359316477', '72164731_515945072578665_7629967701506523136_n.jpg', 0, 1),
(46, 'SamRose2608', 'a8a46f44e6b54e6870059ca8b9ddb8f6', 'nguyễn thị lan', 'lanyentran@gmail.com', 'address', '0392870317', 'Website bán laptop (HYQ).jpg', 0, 1),
(47, 'lanyentran', '$2y$10$1KzuYvAX8hP552z6I/Lvp.jQPJ3cdEVWCgHphExMGYh', ' yên trần', 'lanyentran@gmail.com', 'lập thạch, vĩnh phúc', '0392870317', 'screencapture-localhost-phpmyadmin-tbl-structure-php-2019-12-05-14_03_29.png', 0, 0),
(48, 'lanyentran', '$2y$10$YGoJ6TkPRvGRg3L/qwgX4OFx2s9GtNKH/lG.YJ8cQyO', ' yên trần', 'lanyentran@gmail.com', 'lập thạch, vĩnh phúc', '0392870317', 'screencapture-localhost-phpmyadmin-tbl-structure-php-2019-12-05-14_03_29.png', 0, 0),
(49, 'yentacute', '$2y$10$7SxgTHwIq02xXqvxJHkaMO7v3y9qhDyIKwl/k27uGGw', 'nguyễn thị lan', 'lanyentran@gmail.com', 'lập thạch, vĩnh phúc', '0392870317', '2.png', 0, 0),
(50, 'dangnguyen', '$2y$10$hUN8K.hkQPLoVC/VBOxHV.tsAUgE9hU6baKKhhGNmuP', ' yên trần', 'cogaicongnghe26@gmail.com', 'lập thạch, vĩnh phúc', '0392870317', 'cs.png', 0, 1),
(51, 'quangtvph08049', '25d55ad283aa400af464c76d713c07ad', 'Trần Văn Quang', 'quang6cnd@gmail.com', 'address', '0359316477', '72164731_515945072578665_7629967701506523136_n.jpg', 0, 1);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
