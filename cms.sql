-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 05:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_tittle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_tittle`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(7, 'PHP'),
(23, '  JAVA'),
(24, 'Walls');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(42, 46, 'Sit voluptas perspi', 'byjivi@mailinator.net', 'A minus ad sed quia ', 'approved', '2019-04-27'),
(43, 46, 'Aute qui qui est eos', 'wacekegy@mailinator.com', 'Lorem et cumque prae', 'approved', '2019-04-27'),
(44, 46, 'Dolore recusandae L', 'wubokijum@mailinator.net', 'Quis sint est sit r', 'approved', '2019-04-27'),
(45, 53, 'Aut ea quia molestia', 'vyquzeq@mailinator.net', 'Quo vero excepturi i', 'approved', '2019-04-29'),
(46, 56, 'Deleniti sit asperio', 'zuqarupob@mailinator.net', 'Doloremque est ea au', 'approved', '2019-04-30'),
(47, 124, 'Id est sapiente fug', 'losatyrec@mailinator.net', 'Quis cupidatat iste ', 'unapproved', '2019-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` varchar(3) DEFAULT NULL,
  `post_tittle` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_image` text,
  `post_content` varchar(10000) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_tittle`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(95, '23', 'JAVA', 'Gerald', '2019-04-30', 'image_4.jpg', '<p>I love this <strong>languange</strong>!</p>', 'java, languange, best,', 0, 'published', 3),
(97, '1', 'Bootstrap', 'Gerald', '2019-04-30', 'image_3.jpg', '<p>I design websites with bootstrap.</p>', 'design, websites,', 0, 'published', 1),
(102, '24', 'Some Stuff I like', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 1),
(103, '24', 'Some Stuff I like 2', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(104, '24', 'CMS', 'Melisa', '2019-04-30', 'image_1.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 11),
(105, '24', 'Some Stuff I like 3', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(106, '24', 'Some Stuff I like 3', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(107, '24', 'CMS', 'Melisa', '2019-04-30', 'image_1.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(108, '24', 'Some Stuff I like 2', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(109, '24', 'Some Stuff I like', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(110, '1', 'Bootstrap', 'Gerald', '2019-04-30', 'image_3.jpg', '<p>I design websites with bootstrap.</p>', 'design, websites,', 0, 'published', 0),
(111, '23', 'JAVA', 'Gerald', '2019-04-30', 'image_4.jpg', '<p>I love this <strong>languange</strong>!</p>', 'java, languange, best,', 0, 'published', 0),
(112, '1', 'POST1', 'Veritatis dolore vol', '2019-04-30', 'sadasdasdasds.jpg', '<p>sadasdasdasdasdasdasd</p>', 'Ut culpa aliquam ex', 0, 'published', 0),
(113, '1', 'POST1', 'Veritatis dolore vol', '2019-04-30', 'sadasdasdasds.jpg', '<p>sadasdasdasdasdasdasd</p>', 'Ut culpa aliquam ex', 0, 'published', 0),
(114, '23', 'JAVA', 'Gerald', '2019-04-30', 'image_4.jpg', '<p>I love this <strong>languange</strong>!</p>', 'java, languange, best,', 0, 'published', 0),
(115, '1', 'Bootstrap', 'Gerald', '2019-04-30', 'image_3.jpg', '<p>I design websites with bootstrap.</p>', 'design, websites,', 0, 'published', 0),
(116, '24', 'Some Stuff I like', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(117, '24', 'Some Stuff I like 2', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(118, '24', 'CMS', 'Melisa', '2019-04-30', 'image_1.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(119, '24', 'Some Stuff I like 3', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(120, '24', 'Some Stuff I like 3', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(121, '24', 'CMS', 'Melisa', '2019-04-30', 'image_1.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(122, '24', 'Some Stuff I like 2', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(123, '24', 'Some Stuff I like', 'Enerisa', '2019-04-30', 'sadasdasdasds.jpg', '<p>I like walls</p>', 'walls stuff', 0, 'published', 0),
(124, '1', 'Bootstrap', 'Gerald', '2019-04-30', 'image_3.jpg', '<p>I design websites with bootstrap.</p>', 'design, websites,', 1, 'published', 2),
(125, '23', 'JAVA', 'Gerald', '2019-04-30', 'image_4.jpg', '<p>I love this <strong>languange</strong>!</p>', 'java, languange, best,', 0, 'published', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_rand_salt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`, `user_rand_salt`) VALUES
(8, 'Erisa123', '123456', 'Enerisa', 'Ibra', 'erisa@gmail.com', '', 'Admin', ''),
(14, 'mukonema', 'Quia facere necessit', 'Jameson', 'Duffy', 'qehaz@mailinator.net', '', 'Subscriber', ''),
(15, 'virag', 'Dolor repudiandae de', 'Hu', 'Valenzuela', 'gipi@mailinator.net', '', 'Subscriber', ''),
(16, 'poziq', 'Sit elit eveniet ', 'Jakeem', 'Wilkinson', 'nekiqogeti@mailinator.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(22, 'celisanofi', '$1$NkDXHtpn$Cm9kNlfkHeptoQC4xLd9d.', 'eqweqweq', 'qweqweq', 'siviwo@mailinator.net', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(23, 'juzujeg', '$1$q/Ng.IZN$lGyEs1qKsPJGpsQmS5EzU.', 'Rana', 'Barton', 'gamyq@mailinator.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(24, 'geraldib', '123456', 'Gerald', 'Ibra', 'geri.brau@gmail.com', '', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'mt8smoktbenu8qdfdoe4fov17k', 1556783584),
(2, 'j1ciflngnnvr3fk3ui5jg1edsb', 1556783605),
(3, 'ea5g34huuvcf56isqgo2flru25', 1556807908),
(4, 'pbj3e25ov3riab5m12vrgrui4q', 1556800464),
(5, '8l8km09psu7d5gtkbs8q6pdvss', 1556800483),
(6, 'lkt2gu7rcc289k4thao9s36jse', 1556800850),
(7, 'pthpsfvh7q15footejkosmskqq', 1556801028),
(8, 'u6387eg3f5arfnqbqsr1dnmdb4', 1556801061),
(9, 'fbc3j3dgcohtdkioa3l400tcmk', 1556801161),
(10, '4p0oq3ldtio2t891dpd4kfkogc', 1556801586),
(11, 'qfmia78ug4ep49dpigctbmafqc', 1556807890),
(12, '8p8t4bp8hd7ap8mp39eri52e8e', 1556809526);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
