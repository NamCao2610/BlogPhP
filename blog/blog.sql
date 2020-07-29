-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 08:10 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `create_at`) VALUES
(24, 28, 13, 'Cách viết một blog với html5 , css3, php và mysql', '1595223199_blog.jpg', '&lt;p&gt;Để tạo 1 blog rất đơn giản biết 4 c&aacute;i đ&oacute; l&agrave; l&agrave;m dc hehe :))))))))))&lt;/p&gt;', 1, '2020-07-20 12:33:19'),
(25, 28, 12, 'Có nên tin \'Yêu đến mất ăn mất ngủ\' ?', '1595223595_sleep.jpg', '&lt;p&gt;&lt;i&gt;Anh Nam đẹp zai ơi, em bắt gặp c&ocirc; ấy đi chơi với hết anh n&agrave;y đến c&ocirc; kh&aacute;c. Vậy m&agrave; gọi điện thoại cho em, c&ocirc; ấy bảo l&agrave; em đ&atilde; khiến c&ocirc; ấy mất ăn mất ngủ. Theo anh, em c&oacute; n&ecirc;n tin lời c&ocirc; ấy kh&ocirc;ng?&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;i&gt;Trả lời: Ờ, &lt;/i&gt;Cứ tin đi, v&igrave; với c&ocirc; bạn của em rất c&oacute; thể chuyện mất ăn xảy ra ban đ&ecirc;m c&ograve;n chuyện mất ngủ xảy ra ban ng&agrave;y!&lt;/p&gt;', 1, '2020-07-20 12:38:44'),
(26, 28, 12, 'Anh Nam dz ơi, có bao giờ anh yêu cùng một lúc ba cô gái như em đang yêu chưa?', '1595223930_nobita.jpg', '&lt;p&gt;Ờ chưa, &amp;nbsp;anh c&ograve;n độc th&acirc;n :)))))))))))))))&lt;/p&gt;', 1, '2020-07-20 12:45:30'),
(27, 28, 12, 'Anh Namdz ơi, có phải tỏ tình là chuyện khó nhất trên đời không hở anh?', '1595224171_totinh.jpg', '&lt;p&gt;Tỏ t&igrave;nh chỉ kh&oacute; sơ sơ. Tỏ t&igrave;nh sao cho người ta gật đầu mới thiệt l&agrave; kh&oacute;!&lt;/p&gt;', 1, '2020-07-20 12:49:31'),
(28, 28, 12, 'Nhắn tin fb với crush???', '1595224607_untitled-2_nuzx.jpg', '&lt;p&gt;&lt;i&gt;Hỏi: Em rất th&iacute;ch c&ocirc; ấy, nhưng kh&ocirc;ng biết c&ocirc; ấy c&oacute; th&iacute;ch em kh&ocirc;ng. Cứ mỗi lần em nhắn tin cho c&ocirc; ấy th&igrave; hoặc l&agrave; c&ocirc; ấy kh&ocirc;ng rep hoặc l&agrave; c&ocirc; ấy trả lời Ừ Ờ . Thần kinh c&ocirc; ấy c&oacute; bị sao kh&ocirc;ng hở anh?&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Đ&aacute;p: C&oacute; em bị sao th&igrave; c&oacute;! Th&aacute;i độ người ta r&otilde; r&agrave;ng như vậy chẳng lẽ em kh&ocirc;ng nhận ra? :))))))&lt;/p&gt;', 1, '2020-07-20 12:56:47'),
(29, 28, 12, 'Chọn con tim hay nghe lí trí????', '1595224874_litri.jpg', '&lt;p&gt;Hỏi: &lt;i&gt;Tr&aacute;i tim em bảo &ldquo;y&ecirc;u&rdquo; nhưng l&yacute; tr&iacute; em lại n&oacute;i &ldquo;kh&ocirc;ng được y&ecirc;u&rdquo;, em n&ecirc;n nghe lời b&ecirc;n n&agrave;o? Anh kh&ocirc;ng được n&oacute;i điều n&agrave;y t&ugrave;y thuộc v&agrave;o việc em y&ecirc;u bằng tr&aacute;i tim hay bằng c&aacute;i đầu nh&eacute;!&amp;nbsp;&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Đ&aacute;p: Nếu n&oacute;i nghe lời th&igrave; tất nhi&ecirc;n n&ecirc;n nghe lời l&yacute; tr&iacute; rồi, v&igrave; tr&aacute;i tim c&oacute; thể m&ugrave; qu&aacute;ng, c&ograve;n l&yacute; tr&iacute; th&igrave; kh&ocirc;ng. Khi n&oacute;i đến l&yacute; tr&iacute;, tức l&agrave; n&oacute;i đến sự tỉnh t&aacute;o v&agrave; s&aacute;ng suốt. Chỉ c&oacute; điều, l&yacute; thuyết th&igrave; như vậy, c&ograve;n tr&ecirc;n thực tế, tr&aacute;i tim em c&oacute; đồng &yacute; cho em nghe lời l&yacute; tr&iacute; của em hay kh&ocirc;ng th&igrave; lại l&agrave; chuyện kh&aacute;c!&lt;/p&gt;', 1, '2020-07-20 13:01:14'),
(30, 28, 12, 'Anh Nam dz ơi, hạnh phúc là gì? Nó có thật không vậy?', '1595224999_happy.jpg', '&lt;blockquote&gt;&lt;p&gt;Người thứ nhất n&oacute;i: Hạnh ph&uacute;c l&agrave; thứ ta chờ đợi. Người thứ hai định nghĩa: Hạnh ph&uacute;c l&agrave; thứ ta đ&atilde; đ&aacute;nh mất. Một người chia hạnh ph&uacute;c ở th&igrave; tương lai, một người chia hạnh ph&uacute;c ở th&igrave; qu&aacute; khứ. Quan niệm của những ai chia hạnh ph&uacute;c ở th&igrave; hiện tại: Hạnh ph&uacute;c, đ&oacute; l&agrave; sự tự h&agrave;i l&ograve;ng với bản th&acirc;n. Như vậy, hạnh ph&uacute;c l&agrave; g&igrave;, v&agrave; n&oacute; c&oacute; thật hay kh&ocirc;ng l&agrave; t&ugrave;y theo cảm nhận của từng người em &agrave;.&lt;/p&gt;&lt;/blockquote&gt;', 1, '2020-07-20 13:03:19'),
(31, 28, 16, 'Vũ trụ là gì?????', '1595225157_vutru.jpg', '&lt;blockquote&gt;&lt;p&gt;Vũ Trụ l&agrave; khoảng kh&ocirc;ng gian v&ocirc; tận chứa c&aacute;c thi&ecirc;n h&agrave;. Mỗi thi&ecirc;n h&agrave; l&agrave; một tập hợp của rất nhiều thi&ecirc;n thể (như c&aacute;c ng&ocirc;i sao. h&agrave;nh tinh, vệ tinh, sao chổi,&hellip;) c&ugrave;ng với kh&iacute;, bụi v&agrave; bức xạ điện từ. Vũ trụ mà ta quan sát được hi&ecirc;̣n nay chứa khoảng 10 tỷ thi&ecirc;n hà, có bán kính 3.1025m, chứa khoảng 1020 ng&ocirc;i sao với t&ocirc;̉ng kh&ocirc;́i lượng khoảng 1050kg.&lt;/p&gt;&lt;p&gt;Thi&ecirc;n h&agrave; chứa Mặt Trời v&agrave; c&aacute;c h&agrave;nh tinh của n&oacute; (trong c&oacute; Tr&aacute;i Đất) được gọi l&agrave; Dải Ng&acirc;n H&agrave;. Thi&ecirc;n hà của chúng ta g&ocirc;̀m 1011 ng&ocirc;i sao, có hình đĩa dẹt xoắn &ocirc;́c, bán kính khoảng = 45.000nas&lt;/p&gt;&lt;/blockquote&gt;', 1, '2020-07-20 13:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(11, 'Cuộc sống', '<p>ddddddddddddddd</p>'),
(12, 'Tình yêu', '<p><strong>Dù em không yêu anh hay em không bên anh</strong></p>'),
(13, 'Học viết blog', '<p>Học viets web</p>'),
(15, 'Học tập', ''),
(16, 'Vũ trụ', '<p>nice!!!!</p>'),
(17, 'Sinh vật ', '<p>conmeof</p>'),
(18, 'Tôi yêu em', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `create_at`) VALUES
(27, 1, 'namdz', 'namdepzai2610@gmail.com', '$2y$10$bnYi9f8LeAn6S5jiHJItzOA9tkAaYAQuvNKTvNfg6tAw6TQLaXz8W', '2020-07-19 09:21:19'),
(28, 1, 'namcute', 'hien@gmail.com', '$2y$10$I44QTDBjEjoQTmWbgVfeZewccl7JghK2G49HqH0O67KK/DflUAP02', '2020-07-20 04:04:01'),
(29, 0, 'namcao', 'namdepzai26102@gmail.com', '$2y$10$rSdXu/vSVtl5DkAu4l1QQeyNp3uLq.gwzDzBHQ2ztAelabiz8R6Ja', '2020-07-20 05:18:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
