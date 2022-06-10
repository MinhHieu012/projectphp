SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ;

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Casio'),
(2, 'DANIEL WELLINGTON'),
(3, 'ORIENT'),
(4, 'SEIKO'),
(5, 'TISSOT');

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_image` varchar(255) NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) NOT NULL,
  `prd_accessories` varchar(255) NOT NULL,
  `prd_new` varchar(255) NOT NULL,
  `prd_promotion` varchar(255) NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_featured` int(1) NOT NULL,
  `prd_details` text NOT NULL
) ;


INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_featured`, `prd_details`) VALUES
(1, 1, 'Casio GST-B200-1A ','GST-B200-1A.png', 4400000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 1, 'Casio MTG-B1000WLP-1A ','MTG-B1000WLP-1A.png', 4599000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(3, 1, 'Casio GM-110G-1A9 ','GM-110G-1A9.png', 2999000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(4, 1, 'Casio EFR-538BK-5AV ','EFR-538BK-5AV.png', 1899000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 1, 'Casio BGD-570-1 ','BGD-570-1.png', 1789000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(6, 1, 'Casio MSG-S600G-1A ','MSG-S600G-1A.png', 2689000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(7, 2, 'Daniel Wellington CLASSIC BRISTOL ','Daniel Wellington CLASSIC BRISTOL.png', 1199000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(8, 2, 'Daniel Wellington ICONIC LINK AMBER ','Daniel Wellington ICONIC LINK AMBER.png', 1899000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(9, 2, 'Daniel Wellington PETITE ASHFIELD ','Daniel Wellington PETITE ASHFIELD.png', 5000000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(10, 3, 'ORIENT RA-AA0B04R19B','ORIENT RA-AA0B04R19B.png', 3699000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(11, 3, 'ORIENT RE-AV0116L00B ','ORIENT RE-AV0116L00B.png', 4949000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(12, 3, 'ORIENT FAG02003W0 ','ORIENT FAG02003W0.png', 5353000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(13, 4, 'SEIKO REGULAR SUR213P1 ','SEIKO REGULAR SUR213P1.png', 2202000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(14, 4, 'SEIKO LUKIA SRWZ93P1 ','SEIKO LUKIA SRWZ93P1.png', 2017000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(15, 4, 'SEIKO 5 SPORTS SRPB87K1 ','SEIKO 5 SPORTS SRPB87K1.png', 2000000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(16, 4, 'SEIKO PROSPEX SRPB59K1 ','SEIKO PROSPEX SRPB59K1.png', 1000000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(17, 5, 'TISSOT T-TOUCH CONNECT SOLAR ','TISSOT T-TOUCH CONNECT SOLAR.png', 1500000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(18, 5, 'TISSOT GENTLEMAN ','TISSOT GENTLEMAN.png', 1899000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(19, 5, 'TISSOT HERITAGE MEMPHIS GENT','TISSOT HERITAGE MEMPHIS GENT.png', 1999000, '12 Tháng', 'Hộp, sách hướng dẫn,dây thay thế  ', 'Máy Mới 100%', 'Dán Bảo Vệ Màn Hình', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');

-- --------------------------------------------------------


CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) NOT NULL,
  `comm_mail` varchar(255) NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text NOT NULL
) ;


INSERT INTO `comments` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`) VALUES
(1, 1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(2, 2, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(3, 3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(4, 4, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(5, 5, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(6, 6, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(7, 7, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(8, 8, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(9, 9, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(10, 10, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(11, 11, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(12, 12, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(13, 13, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(14, 14, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(15, 15, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(16, 16, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(17, 17, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(18, 18, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(19, 19, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(20, 20, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(21, 21, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(22, 22, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(23, 23, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(24, 24, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(25, 25, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(26, 26, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(27, 27, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(28, 28, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(29, 29, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(30, 30, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời');



CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `user_full` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_level` int(1) NOT NULL
) ;


INSERT INTO `users` (`users_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Administrator', 'admin@gmail.com', '123456', 1),
(2, 'Nguyễn Van A', 'nguyenvana@gmail.com', '123456', 2),
(3, 'Nguyễn Van B', 'nguyenvanb@gmail.com', '123456', 2),
(4, 'Nguyễn Van C', 'nguyenvanc@gmail.com', '123456', 2),
(5, 'Nguyễn Van D', 'nguyenvand@gmail.com', '123456', 2);


CREATE TABLE IF NOT EXISTS `customers` (

  `cus_id` int(11) NOT NULL AUTO_INCREMENT,

  `cus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,

  `cus_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,

  `cus_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,

  `cus_address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,

  `cus_password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,

  `created` int(11) NOT NULL,

  PRIMARY KEY (`cus_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);


ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);


ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `product`
	ADD CONSTRAINT FK_CateProduct FOREIGN KEY(cat_id) REFERENCES  category(cat_id);
	
CREATE TABLE `Orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `OrderNumber` int(11) NOT NULL,
	`user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`user_email` varchar(50) COLLATE utf8_bin NOT NULL,
	`user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
	`status` tinyint(4) NOT NULL DEFAULT '0',
	`amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
	`created` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`order_id`)
);
--
-- Cấu trúc bảng cho bảng `OrderDetail`
--
CREATE TABLE IF NOT EXISTS `OrderDetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  CONSTRAINT FK_Detail_Order FOREIGN KEY (`order_id`) REFERENCES Orders(`order_id`),
  CONSTRAINT FK_Detail_Product FOREIGN KEY (`prd_id`) REFERENCES product(`prd_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;


CREATE TABLE `settings` (
  `s_id` int(11) NOT NULL,
  `s_lable` varchar(255) NOT NULL,
  `s_value` varchar(255) NOT NULL,
  PRIMARY KEY(`s_id`)
) ;


INSERT INTO `settings` VALUES
(1, 'email', 'tung@gmail.com'),
(2,	'address1','Ha Noi'),
(3, 'address2','A17, Ta Quang Buu, Ha Noi'),
(4, 'phone', '0349495353')