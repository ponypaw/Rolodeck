-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 04:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rolodeck`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user`, `friend`, `id`) VALUES
(4, 2, 2),
(4, 3, 5),
(8, 7, 6),
(8, 6, 7),
(5, 6, 8),
(5, 7, 9),
(6, 5, 10),
(6, 7, 11),
(7, 6, 12),
(7, 5, 13),
(9, 7, 14),
(10, 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `post` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user`, `post`) VALUES
(5, 2, ' Elizabeth was here'),
(6, 2, ' She made a second post'),
(7, 3, ' Turner appears'),
(8, 3, ' Things are said'),
(10, 4, ' Jack says hi.'),
(11, 4, ' Where&#39;s my ship?'),
(13, 4, ' The ocean is very large.'),
(14, 4, ' Black Pearl is best ship.'),
(15, 8, ' Tweet tweet!'),
(16, 5, ' A pirate&#39;s life for me!'),
(17, 6, ' Wahoo! '),
(18, 7, ' I&#39;m a pirate&#39;s kid!'),
(19, 9, ' This is my first post.'),
(21, 10, ' Have a second post?'),
(22, 10, ' Third time&#39;s the charm.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `pic` text NOT NULL DEFAULT 'green.png',
  `num_posts` int(11) NOT NULL DEFAULT 0,
  `num_likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `f_name`, `l_name`, `birthday`, `pic`, `num_posts`, `num_likes`) VALUES
(2, 'pirate@something.com', 'e120ea280aa50693d5568d0071456460', 'Elizabeth', 'Turner', '1969-02-17', 'blue.png', 2, 3),
(3, 'turner@yoho.com', 'e120ea280aa50693d5568d0071456460', 'Will', 'Turner', '1961-02-04', 'blue.png', 2, 1),
(4, 'captain@yahoo.com', 'e120ea280aa50693d5568d0071456460', 'Jack', 'Sparrow', '1970-03-11', 'green.png', 7, 0),
(5, 'hook@yoho.com', 'e120ea280aa50693d5568d0071456460', 'James', 'Hook', '1955-03-22', 'green.png', 1, 1),
(6, 'hook2@yoho.com', 'e120ea280aa50693d5568d0071456460', 'Flora', 'Hook', '1940-03-04', '6.png', 1, 2),
(7, 'hook21@yoho.com', 'e120ea280aa50693d5568d0071456460', 'FloraDora', 'Hook', '1621-03-09', '7.png', 1, 0),
(8, 'Finch@yoho.com', 'e10adc3949ba59abbe56e057f20f883e', 'Finchy', 'Bird', '1965-03-04', '8.png', 1, 0),
(9, 'creature@yoho.com', 'e10adc3949ba59abbe56e057f20f883e', 'Victor', 'Frankenstein', '1880-01-28', '9.png', 1, 0),
(10, 'creaturefeature@yoho.com', 'e10adc3949ba59abbe56e057f20f883e', 'Creature', 'Frankenstein', '2002-02-13', '10.png', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_to_user` (`user`),
  ADD KEY `post_to_post` (`post`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_to_friend` (`user`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_to_post` FOREIGN KEY (`post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `user_to_user` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `user_to_friend` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
