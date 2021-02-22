-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 04:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(33) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(9, 'Sports & Activities', 'About Workouts And Tips To Stay Active'),
(10, 'Health', 'Tips For Healthy Life Style'),
(12, 'Mind&Body', 'Mindfullness');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `c_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `c_post_id`, `comment_author`, `comment_content`, `date`, `comment_status`) VALUES
(5, 1, 'admin', 'wooo', '2019-05-08 11:26:06', 'Unproved'),
(6, 1, 'admin', 'this is amazing', '2019-05-08 11:27:19', 'aproved'),
(7, 1, 'arman2088', 'cant wait to try this', '2019-05-08 11:27:49', 'aproved'),
(8, 3, 'admin', 'test comment', '2019-05-08 11:51:26', 'aproved'),
(9, 1, 'caliber2001', 'i like it', '2019-05-10 18:19:12', 'aproved'),
(10, 5, 'caliber2001', 'hello world!', '2019-05-10 18:28:30', 'aproved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `comment_count`, `post_status`) VALUES
(1, 10, '    Improve Your Nutrition', 'Arman Gin', '2008-05-19 00:00:00', 'dinner-egg-flatlay-54455.jpg', '<p><strong>Lorem</strong> ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in diam eros. Donec tincidunt vel orci commodo vestibulum. Nam posuere molestie diam iaculis venenatis. In malesuada mauris arcu. Duis ut turpis leo. Mauris convallis dolor et nibh tincidunt, eu cursus magna auctor. Etiam in tempor lacus. Suspendisse ex libero, efficitur nec nulla ac, lobortis sagittis purus. Phasellus ut malesuada libero. Etiam et eros finibus, tincidunt lectus ut, euismod justo. Etiam porttitor, orci eget rutrum iaculis, ex libero congue lorem, sit amet mollis ex neque et lacus. Duis sed gravida dolor, vel porta odio. Sed ut risus nisi. Donec non erat ipsum. Aliquam mollis ante urna, id commodo urna cursus vel. Cras efficitur aliquam lacus, et vulputate turpis laoreet et. Phasellus id nibh viverra, convallis mi sed, finibus dolor. In in convallis erat, id efficitur nulla. In est mi, iaculis in sapien vitae, accumsan lobortis nisl. Quisque venenatis lacus quis sapien rhoncus, nec feugiat sem semper. Etiam iaculis elit viverra lectus feugiat dignissim et ut odio. Morbi risus neque, tristique eget turpis sed, fermentum dapibus ligula. Nullam laoreet hendrerit erat non ultricies. Praesent arcu lorem, maximus sed porta eu, scelerisque in risus. Etiam eleifend tempor elit eget facilisis. Curabitur id ex mauris. Nam convallis dolor quis porta ultrices. Quisque accumsan in velit in tristique. Vestibulum vel mi quis eros vulputate aliquet ut vitae quam. Nunc blandit lobortis tincidunt. Proin dapibus, leo sed aliquam pretium, ligula nisi sodales nibh, finibus tristique augue metus eu arcu. Nulla id vestibulum erat. Nunc volutpat, diam vel imperdiet fermentum, magna turpis accumsan quam, vel scelerisque massa ipsum ac risus. Quisque leo odio, malesuada vitae sapien semper, varius pulvinar eros. Aenean sed leo at neque placerat malesuada. Duis laoreet odio eget convallis facilisis. Praesent aliquam tortor sagittis nisl malesuada fermentum. Nam ligula leo, sagittis id justo et, suscipit egestas turpis. Cras sagittis nisi non rhoncus sollicitudin. Pellentesque id convallis tellus. Nulla rhoncus, augue sed varius accumsan, ante nunc ullamcorper mauris, aliquam dapibus arcu eros in leo. Pellentesque placerat lectus et semper volutpat. Duis ut arcu a arcu ultricies iaculis ut eu ipsum. Fusce venenatis neque in lacinia gravida. Vivamus id rutrum mauris, vel porttitor ligula. Suspendisse ut lorem at velit vulputate dapibus. Maecenas tincidunt nisl quis rhoncus finibus. Cras id ullamcorper orci. Morbi aliquam at nulla non rhoncus. Nunc laoreet ut lacus et commodo. Nam ac nibh sit amet nunc cursus porta. Duis urna urna, ullamcorper at auctor vel, egestas sit amet neque. Suspendisse efficitur ipsum eu diam aliquet varius sit amet in arcu. Integer rutrum lorem vitae tempor luctus. Integer commodo erat vel felis efficitur, vitae tincidunt velit lacinia. Vivamus sollicitudin urna neque, eu sagittis leo efficitur et. Nunc odio velit, porttitor eu dolor eu, semper rutrum enim. Nam rhoncus justo diam, quis blandit orci suscipit faucibus. Fusce mattis lectus sed nunc imperdiet euismod. Morbi feugiat volutpat orci eu varius. Nam condimentum ullamcorper ligula. Sed et mauris lectus.</p>', 'food imporve nutrition', 5, 'Published'),
(3, 12, 'How to Reach Mindfulness', 'Jessie Jay', '2008-05-19 00:00:00', 'body-clouds-early-morning-823694 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in diam eros. Donec tincidunt vel orci commodo vestibulum. Nam posuere molestie diam iaculis venenatis. In malesuada mauris arcu. Duis ut turpis leo. Mauris convallis dolor et nibh tincidunt, eu cursus magna auctor. Etiam in tempor lacus. Suspendisse ex libero, efficitur nec nulla ac, lobortis sagittis purus. Phasellus ut malesuada libero. Etiam et eros finibus, tincidunt lectus ut, euismod justo. Etiam porttitor, orci eget rutrum iaculis, ex libero congue lorem, sit amet mollis ex neque et lacus. Duis sed gravida dolor, vel porta odio. Sed ut risus nisi. Donec non erat ipsum. Aliquam mollis ante urna, id commodo urna cursus vel. Cras efficitur aliquam lacus, et vulputate turpis laoreet et.\r\n\r\nPhasellus id nibh viverra, convallis mi sed, finibus dolor. In in convallis erat, id efficitur nulla. In est mi, iaculis in sapien vitae, accumsan lobortis nisl. Quisque venenatis lacus quis sapien rhoncus, nec feugiat sem semper. Etiam iaculis elit viverra lectus feugiat dignissim et ut odio. Morbi risus neque, tristique eget turpis sed, fermentum dapibus ligula. Nullam laoreet hendrerit erat non ultricies. Praesent arcu lorem, maximus sed porta eu, scelerisque in risus. Etiam eleifend tempor elit eget facilisis.\r\n\r\nCurabitur id ex mauris. Nam convallis dolor quis porta ultrices. Quisque accumsan in velit in tristique. Vestibulum vel mi quis eros vulputate aliquet ut vitae quam. Nunc blandit lobortis tincidunt. Proin dapibus, leo sed aliquam pretium, ligula nisi sodales nibh, finibus tristique augue metus eu arcu. Nulla id vestibulum erat. Nunc volutpat, diam vel imperdiet fermentum, magna turpis accumsan quam, vel scelerisque massa ipsum ac risus. Quisque leo odio, malesuada vitae sapien semper, varius pulvinar eros. Aenean sed leo at neque placerat malesuada. Duis laoreet odio eget convallis facilisis. Praesent aliquam tortor sagittis nisl malesuada fermentum. Nam ligula leo, sagittis id justo et, suscipit egestas turpis.', 'mind body relax midetate mindfullness', 1, 'Published'),
(5, 9, 'Travlling Alone', 'Jhon balle', '2008-05-19 00:00:00', 'active-activity-adventure-547116 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean quam urna, tristique sit amet suscipit quis, vulputate vel magna. Pellentesque interdum iaculis nisl, ut pulvinar nulla convallis non. Ut efficitur, justo sodales blandit sagittis, ligula nulla vestibulum erat, non elementum arcu tortor ac enim. Suspendisse in consequat massa. Nulla bibendum lectus a dolor dapibus facilisis. Nulla tempus dui in dui rutrum cursus feugiat sit amet nulla. Suspendisse turpis magna, tincidunt sit amet gravida in, vestibulum in dui. Fusce suscipit lorem et urna sollicitudin, id faucibus urna pulvinar. Donec a ante sollicitudin, porttitor nisl in, finibus turpis. Integer imperdiet varius dictum. Nulla lacus tellus, ornare et risus sed, tincidunt tempus ex.\r\n\r\nSuspendisse quis pulvinar ligula. Vivamus non velit quis sapien hendrerit egestas ut semper massa. Etiam nec enim dolor. Mauris sem libero, posuere tempor enim quis, vestibulum mattis nisi. In quis accumsan nunc, id sollicitudin felis. Morbi mollis interdum turpis, sit amet dignissim dolor tristique at. Praesent arcu nisi, fringilla id laoreet eu, convallis a odio. Vestibulum neque sapien, varius a semper a, suscipit nec arcu. Mauris luctus hendrerit tellus finibus rhoncus. Vivamus accumsan id mi eu rhoncus. Integer pretium mauris et nunc gravida ultricies. Etiam fringilla, eros nec ornare rhoncus, nibh felis consequat nisi, et placerat dolor sapien eget sapien. Morbi feugiat enim vel rhoncus imperdiet.\r\n\r\nProin rutrum tortor eget accumsan dictum. Aliquam blandit quam risus, in consequat ante ultrices rutrum. Integer id purus ac nisi porta dictum. Nulla ac scelerisque tortor. Nulla vel consectetur lectus. Maecenas condimentum et augue non maximus. Phasellus euismod, dolor id ultricies lobortis, nunc mauris pretium odio, id fermentum nulla dui sit amet urna. Nam condimentum sapien ex, non dapibus justo placerat nec. Curabitur in arcu eu justo varius viverra. Nullam dignissim pretium turpis, eu mollis sapien tempor volutpat. Curabitur vulputate, lorem a finibus lobortis, tortor sapien varius orci, sit amet dapibus lorem sem fringilla arcu.\r\n\r\nIn gravida blandit lorem, in tristique urna varius elementum. Etiam a nibh lectus. Nam eu leo ac orci venenatis facilisis ut sed arcu. Vivamus ullamcorper magna eget justo venenatis, non aliquam ex vehicula. Nunc id dolor viverra, facilisis ante dignissim, pellentesque dui. Vestibulum ligula risus, convallis eu congue non, interdum eu turpis. Etiam ac pellentesque sapien. Pellentesque fringilla augue eget pellentesque blandit. Duis ac tincidunt orci. Vestibulum sit amet dolor nec quam pulvinar euismod. Donec auctor et nunc et tristique. Ut lacinia laoreet mauris, ut tempus lacus faucibus quis. Morbi sed nisi et nisl euismod elementum. Mauris dui tellus, laoreet ac accumsan vel, luctus quis risus.\r\n\r\nMauris at euismod libero. In hac habitasse platea dictumst. Duis nec purus sed felis facilisis iaculis. Vestibulum a pharetra turpis. Aenean nulla quam, mollis sed magna vel, varius posuere urna. Aliquam commodo mi non est commodo elementum. Proin eleifend convallis ligula. Aenean tempor et purus nec commodo. Praesent luctus mauris non dignissim bibendum.\r\n\r\nAenean ultrices libero tortor, sed posuere orci venenatis id. Nulla nunc sem, rutrum vel ante ut, auctor luctus mi. Cras eu blandit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam risus arcu, maximus sed laoreet convallis, mollis at magna. Proin ut iaculis elit. Vestibulum hendrerit sit amet arcu porta varius. Donec at turpis egestas, ullamcorper quam et, rutrum quam. Sed lacinia tempus sapien sit amet posuere. Donec ac neque a turpis interdum dignissim elementum pretium neque. Aenean luctus libero erat, blandit viverra mauris blandit nec.\r\n\r\nCras pretium in neque a hendrerit. Nullam sollicitudin sollicitudin nunc, eu tempus ante varius ut. Sed congue, mi at mollis bibendum, justo sem semper metus, vitae molestie odio quam sit amet arcu. Sed mattis metus sit amet eros imperdiet, sed euismod tortor congue. Praesent nisi neque, luctus ac volutpat non, porttitor a ex. Ut eros leo, convallis in porttitor non, imperdiet ac turpis. Nullam auctor, augue quis iaculis iaculis, lorem nunc molestie mauris, ac porttitor dolor velit et ipsum. Integer vitae diam eget lorem fermentum eleifend in quis magna. Quisque ut nunc ut sem interdum dapibus eu non neque. Phasellus ornare ornare nunc vitae tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed at bibendum mi, sit amet porta massa.\r\n\r\nProin at lorem sapien. Sed orci ligula, varius sit amet lacus at, malesuada interdum sapien. Nunc tortor lacus, tristique et maximus et, volutpat ut dui. Proin sollicitudin, sem lobortis congue hendrerit, purus nisi iaculis ipsum, non porta nisl augue vitae metus. Nulla vehicula ut diam nec mollis. Nam sed lorem augue. Sed sollicitudin imperdiet orci ac finibus. Cras ultricies nisl sed ex auctor, non ullamcorper quam porttitor. In ultrices porta risus sed efficitur. Curabitur risus enim, mattis a enim sit amet, vestibulum elementum enim. Duis eget commodo ante. Pellentesque fermentum, erat et malesuada auctor, justo tortor placerat tellus, vel convallis ligula nisl nec tortor.\r\n\r\nProin vel augue eu dui consectetur vestibulum lobortis ac massa. Nullam viverra ut arcu vel eleifend. Ut a nulla ac justo ullamcorper vulputate. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae velit massa. Etiam quis enim nibh. Maecenas at vulputate tellus, id gravida nulla. Pellentesque et eleifend orci, eget suscipit massa. Mauris vitae tempor odio. Morbi lorem leo, placerat non ante vel, interdum fringilla justo. Curabitur et volutpat erat, vel porttitor eros. Etiam luctus purus augue, a accumsan ex sodales placerat. Donec nec varius lorem.\r\n\r\nSed ac justo nec arcu imperdiet ornare. Cras vel aliquet augue, in lacinia ante. Vivamus eu nisi eu elit porta cursus. Etiam iaculis tortor tellus, pharetra mattis lectus ornare id. Aliquam enim libero, vestibulum at lacus et, pulvinar ullamcorper dui. Nam non magna quis massa finibus ultricies. Praesent eget vestibulum risus. Morbi in velit maximus, aliquet ex id, sodales est. In sagittis dapibus odio, sed lobortis neque porttitor sed. Nunc non aliquam lectus. Ut sed metus ut mauris aliquam rutrum vitae non nibh. Maecenas ut nisl dolor. Nullam varius consectetur mi.', 'travvling travel sport extreme', 1, 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `profile_image`, `user_role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '123456', 'me.jpg', 'admin'),
(2, 'arman2088', 'arman', 'gin', 'armenin2088@gmail.com', '$2y$10$ffFkQ9E53VfMynpt88STy.kQ98uweXiqySotkI1trXMSbKoGuHbcy', '2017-04-20 18.08.28 1497206196679403248_39436903.jpg', 'Subscriber'),
(13, 'arman208', 'arman208', 'arman208', 'arman208@gmail.com', '$2y$10$aqhXl4J2x1HyXMyrX.Ky9uxVyoeeZT4k0E2E/Y2yzhb4EvZoFHNeu', '2012-05-02 19.24.39 182501359627387601_39436903.jpg', 'Subscriber'),
(15, 'caliber2001', 'aviv', 'cohen', 'aviv@gmail.com', '$2y$10$aJ4Po9cTUBtJfVGRw89ZXuttU0NvjhdVNICt5Qy7k0q9yCJYiOKle', '2013-08-23 14.55.04 528808474295780308_39436903.jpg', 'subscriber');

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
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_author` (`comment_author`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_author`) REFERENCES `users` (`username`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
