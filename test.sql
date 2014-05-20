-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Бер 28 2014 р., 19:33
-- Версія сервера: 5.5.24
-- Версія PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `test`
--

-- --------------------------------------------------------

--
-- Структура таблиці `e_city`
--

CREATE TABLE IF NOT EXISTS `e_city` (
  `e_city_pk` int(11) NOT NULL AUTO_INCREMENT,
  `e_city_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`e_city_pk`),
  UNIQUE KEY `e_city_id` (`e_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп даних таблиці `e_city`
--

INSERT INTO `e_city` (`e_city_pk`, `e_city_id`) VALUES
(1, 'Kyiv'),
(24, 'Odesa'),
(30, 'Берлін, Німеччина'),
(40, 'Варшава, Польща'),
(36, 'Гамбурґ, Німеччина'),
(43, 'Донецьк, Донецька область, Україна'),
(16, 'Дрогобич, Львівська область, Україна'),
(32, 'Запоріжжя, Запорізька область, Україна'),
(2, 'Київ, місто Київ, Україна'),
(5, 'Кишинів, Молдова'),
(17, 'Луганськ, Луганська область, Україна'),
(42, 'Луцьк, Волинська область, Україна'),
(4, 'Львів, Львівська область, Україна'),
(29, 'Мюнхен, Німеччина'),
(15, 'Нагуєвичі, Львівська область, Україна'),
(27, 'Одеса, Одеська область, Україна'),
(35, 'Прага, Чеська Республіка'),
(10, 'Радехів, Львівська область, Україна'),
(34, 'Севастополь, місто Севастополь, Україна'),
(8, 'Сокаль, Львівська область, Україна'),
(28, 'Харків, Харківська область, Україна'),
(6, 'Червоноград, Львівська область, Україна'),
(7, 'Яворів, Львівська область, Україна');

-- --------------------------------------------------------

--
-- Структура таблиці `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `route_id` int(11) NOT NULL AUTO_INCREMENT,
  `unregistered_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `s_city` int(11) NOT NULL,
  `e_city` int(11) NOT NULL,
  `seats` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`route_id`),
  KEY `route_id` (`route_id`),
  KEY `s_city` (`s_city`),
  KEY `e_city` (`e_city`),
  KEY `user_id` (`user_id`),
  KEY `unregistered_id` (`unregistered_id`),
  KEY `unregistered_id_2` (`unregistered_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=141 ;

--
-- Дамп даних таблиці `routes`
--

INSERT INTO `routes` (`route_id`, `unregistered_id`, `user_id`, `s_city`, `e_city`, `seats`, `price`, `type`, `date`) VALUES
(1, NULL, NULL, 1, 1, 3, 15, '1', '2012-10-10'),
(2, NULL, NULL, 3, 2, NULL, 15, '0', '2012-10-10'),
(3, NULL, NULL, 3, 2, NULL, 15, '1', '2012-10-11'),
(4, NULL, NULL, 5, 4, NULL, 15, '0', '2012-10-11'),
(5, NULL, NULL, 6, 5, NULL, 15, '0', '2012-10-11'),
(6, NULL, NULL, 3, 2, NULL, 100, '0', '2012-10-12'),
(7, NULL, NULL, 5, 4, NULL, 20, '1', '2012-11-11'),
(8, NULL, NULL, 5, 4, NULL, 10, '1', '2012-11-11'),
(9, NULL, NULL, 3, 2, NULL, 15, '0', '2012-11-30'),
(10, NULL, NULL, 7, 4, NULL, 20, '0', '2013-02-23'),
(11, NULL, NULL, 3, 6, NULL, 25, '0', '2013-02-25'),
(12, NULL, NULL, 3, 7, NULL, 15, '1', '2013-02-25'),
(13, NULL, NULL, 3, 8, NULL, 5, '0', '2013-02-26'),
(14, NULL, NULL, 3, 8, NULL, 5, '0', '2013-02-26'),
(15, NULL, NULL, 10, 10, NULL, 5, '0', '2013-02-26'),
(16, NULL, NULL, 11, 6, NULL, 5, '0', '2013-02-26'),
(17, NULL, NULL, 11, 6, NULL, 5, '0', '2013-02-26'),
(18, NULL, NULL, 11, 4, NULL, 30, '1', '2013-02-27'),
(19, NULL, NULL, 11, 4, NULL, 30, '1', '2013-02-27'),
(20, NULL, NULL, 15, 15, NULL, 5, '0', '2013-02-27'),
(21, NULL, NULL, 7, 16, NULL, 50, '0', '2013-02-27'),
(22, NULL, NULL, 17, 17, NULL, 50, '0', '2013-02-27'),
(26, NULL, NULL, 24, 24, 2, 150, '0', '2013-03-01'),
(33, NULL, NULL, 24, 24, 2, 150, '0', '2013-03-01'),
(35, NULL, NULL, 30, 27, 3, 150, '1', '2013-03-02'),
(36, NULL, NULL, 30, 27, 2, 150, '1', '2013-03-02'),
(37, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(38, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(39, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(40, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(41, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(42, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(43, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(44, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(45, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(46, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(47, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(48, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(49, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(50, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(51, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(52, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(53, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(54, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(55, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(56, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(57, NULL, NULL, 54, 28, 3, 150, '1', '2013-03-02'),
(58, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(59, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(60, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(61, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(62, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(63, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(64, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(65, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(66, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-02'),
(67, NULL, NULL, 5, 4, 3, 150, '1', '2013-03-02'),
(68, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-03'),
(69, NULL, NULL, 5, 4, 0, 150, '0', '2013-03-04'),
(70, NULL, NULL, 3, 2, 3, 150, '1', '2013-03-04'),
(71, NULL, NULL, 3, 2, 2, 150, '1', '2013-03-07'),
(72, NULL, NULL, 5, 6, 1, 150, '1', '2013-04-30'),
(73, NULL, NULL, 3, 2, 3, 150, '1', '2013-05-06'),
(74, NULL, NULL, 5, 4, 3, 150, '1', '2013-06-22'),
(75, 1, NULL, 3, 2, 0, 150, '0', '2013-06-21'),
(76, NULL, NULL, 3, 2, 0, 150, '1', '2013-07-14'),
(77, NULL, NULL, 3, 2, 0, 150, 'Водій', '2013-07-25'),
(78, 1, NULL, 5, 4, 3, 150, 'Водій', '2013-07-27'),
(79, NULL, NULL, 3, 6, 0, 100, '', '2013-07-23'),
(80, NULL, NULL, 5, 4, 3, 150, 'Водій', '2013-07-26'),
(81, NULL, NULL, 5, 4, 3, 150, 'Водій', '2013-07-26'),
(82, NULL, NULL, 5, 6, 3, 150, 'Водій', '2013-07-26'),
(83, NULL, NULL, 3, 2, 0, 150, 'Пасажир', '2013-07-27'),
(84, NULL, NULL, 3, 6, 0, 30, 'Пасажир', '2013-07-26'),
(85, NULL, NULL, 7, 4, 0, 30, 'Пасажир', '2013-07-27'),
(86, NULL, NULL, 3, 2, 0, 150, 'Пасажир', '2013-07-27'),
(87, NULL, NULL, 3, 16, 0, 30, 'Пасажир', '2013-07-24'),
(88, NULL, NULL, 15, 4, 0, 30, 'Пасажир', '2013-07-25'),
(89, NULL, NULL, 15, 6, 0, 150, 'Пасажир', '2013-07-26'),
(90, NULL, NULL, 15, 2, 0, 150, 'Пасажир', '2013-07-31'),
(91, NULL, NULL, 5, 16, 0, 150, 'Пасажир', '2013-07-27'),
(92, NULL, NULL, 56, 2, 0, 150, 'Пасажир', '2013-08-02'),
(93, NULL, NULL, 57, 29, 0, 150, 'Пасажир', '2013-08-07'),
(94, NULL, 1, 58, 30, 0, 150, 'Пасажир', '2013-08-10'),
(95, NULL, 1, 59, 29, 3, 30, 'Водій', '2013-08-07'),
(96, NULL, 1, 5, 4, 3, 150, '1', '2013-08-17'),
(97, NULL, NULL, 5, 4, 2, 150, '1', '2013-08-24'),
(98, NULL, NULL, 3, 2, 1, 150, '0', '2013-08-26'),
(99, NULL, NULL, 3, 2, 3, 150, '1', '2013-08-26'),
(100, 3, NULL, 3, 2, 3, 150, '1', '2013-08-26'),
(101, 5, NULL, 5, 4, 3, 150, '1', '2013-08-26'),
(102, 6, NULL, 3, 2, 3, 150, '1', '2013-08-30'),
(103, 7, NULL, 65, 35, 2, 150, '1', '2013-08-31'),
(104, 8, NULL, 65, 35, 1, 150, '0', '2013-08-23'),
(105, NULL, 1, 3, 2, 2, 150, '1', '2013-09-04'),
(106, NULL, 1, 70, 2, 2, 150, '1', '2013-10-31'),
(107, NULL, 1, 5, 36, 2, 150, '1', '2013-09-30'),
(108, NULL, 1, 73, 36, 2, 150, '1', '2013-09-25'),
(109, NULL, 1, 73, 40, 1, 30, '1', '2013-09-28'),
(110, NULL, 1, 70, 2, 1, 150, '0', '2013-09-29'),
(111, NULL, 1, 7, 10, 3, 30, '1', '2013-10-15'),
(112, NULL, 1, 75, 42, 1, 30, '0', '2013-10-20'),
(113, NULL, 1, 57, 29, 3, 150, '1', '2013-11-03'),
(114, NULL, 1, 77, 32, 2, 150, '0', '2013-10-31'),
(115, NULL, 1, 5, 4, 2, 150, '1', '2013-10-17'),
(116, NULL, 1, 5, 4, 2, 150, '1', '2013-10-18'),
(117, NULL, 1, 5, 4, 3, 150, '1', '2013-11-01'),
(118, NULL, 1, 5, 4, 3, 150, '1', '2013-11-02'),
(119, NULL, 1, 5, 4, 3, 150, '1', '2013-11-03'),
(120, NULL, 1, 5, 4, 3, 150, '1', '2013-11-04'),
(121, NULL, 1, 5, 4, 3, 150, '1', '2013-11-05'),
(122, NULL, 1, 5, 4, 3, 150, '1', '2013-11-06'),
(123, NULL, 1, 5, 4, 3, 150, '1', '2013-11-07'),
(124, NULL, 1, 5, 4, 3, 150, '1', '2013-11-08'),
(125, NULL, 1, 5, 4, 3, 150, '1', '2013-11-09'),
(126, NULL, 1, 5, 4, 3, 150, '1', '2013-11-10'),
(127, 9, NULL, 5, 28, 2, 100, '0', '2013-10-30'),
(128, NULL, 1, 5, 6, 2, 150, '0', '2013-11-30'),
(129, NULL, 1, 5, 43, 1, 150, '0', '2013-11-29'),
(130, NULL, 1, 17, 2, 2, 150, '1', '2013-11-27'),
(131, NULL, 1, 5, 28, 3, 150, '1', '2013-12-07'),
(132, NULL, 1, 30, 2, 2, 150, '0', '2013-12-10'),
(133, NULL, 1, 78, 2, 2, 150, '1', '2013-11-22'),
(134, NULL, 1, 5, 4, 3, 150, '1', '2013-11-30'),
(135, NULL, 1, 3, 2, 3, 150, '1', '2013-12-01'),
(136, NULL, 1, 5, 43, 3, 150, '1', '2013-12-02'),
(137, NULL, 1, 17, 2, 3, 150, '1', '2013-12-03'),
(138, NULL, 1, 5, 4, 3, 150, '1', '2013-12-04'),
(139, NULL, 1, 5, 4, 3, 150, '1', '2014-01-17'),
(140, NULL, 1, 3, 2, 3, 150, '1', '2014-02-16');

-- --------------------------------------------------------

--
-- Структура таблиці `s_city`
--

CREATE TABLE IF NOT EXISTS `s_city` (
  `s_city_pk` int(11) NOT NULL AUTO_INCREMENT,
  `s_city_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`s_city_pk`),
  UNIQUE KEY `s_city_id` (`s_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Дамп даних таблиці `s_city`
--

INSERT INTO `s_city` (`s_city_pk`, `s_city_id`) VALUES
(24, 'Kharkiv'),
(1, 'Lviv'),
(57, 'Берлін, Німеччина'),
(56, 'Варшава, Польща'),
(70, 'Гамбурґ, Німеччина'),
(78, 'Дніпропетровськ, Дніпропетровська область, Україна'),
(17, 'Донецьк, Донецька область, Україна'),
(15, 'Дрогобич, Львівська область, Україна'),
(60, 'Запоріжжя, Запорізька область, Україна'),
(77, 'Івано-Франківськ, Івано-Франківська область, Україна'),
(5, 'Київ, місто Київ, Україна'),
(65, 'Кишинів, Молдова'),
(75, 'Ковель, Волинська область, Україна'),
(61, 'Крива, Закарпатська область, Україна'),
(3, 'Львів, Львівська область, Україна'),
(6, 'Льєж, Бельгія'),
(73, 'Люблін, Польща'),
(58, 'Мюнхен, Німеччина'),
(59, 'Нюрнберґ, Німеччина'),
(54, 'Одеса, Одеська область, Україна'),
(11, 'Радехів, Львівська область, Україна'),
(62, 'Севастополь, місто Севастополь, Україна'),
(10, 'Сокаль, Львівська область, Україна'),
(30, 'Харків, Харківська область, Україна'),
(7, 'Червоноград, Львівська область, Україна'),
(63, 'Ялта, Крим, Україна');

-- --------------------------------------------------------

--
-- Структура таблиці `unregistered_user_data`
--

CREATE TABLE IF NOT EXISTS `unregistered_user_data` (
  `user_pk` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle` varchar(100) DEFAULT NULL,
  `v_color` varchar(100) DEFAULT NULL,
  `climat` tinyint(1) DEFAULT NULL,
  `smoking` tinyint(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_pk`),
  UNIQUE KEY `user_pk` (`user_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `unregistered_user_data`
--

INSERT INTO `unregistered_user_data` (`user_pk`, `vehicle`, `v_color`, `climat`, `smoking`, `email`, `phone`, `experience`) VALUES
(1, 'Nissan GTR', 'Black', 1, 1, NULL, '+123456789', NULL),
(2, 'Nissan X-Trail', 'Black', 1, 0, 'admin@gokit.tk', '+15544331122', 'менше 1 року'),
(3, 'Nissan X-Trail', 'Black', 1, 0, 'admin@gokit.tk', '+15544331122', 'менше 1 року'),
(4, 'Nissan Qashqai', 'Black', 1, 0, 'admin@gokit.tk', '+123456789', 'менше 1 року'),
(5, 'Nissan Qashqai', 'Black', 1, 0, 'admin@gokit.tk', '+123456789', 'менше 1 року'),
(6, 'Nissan X-Trail', 'Black', 1, 0, 'admin@gokit.tk', '+15544331122', 'менше 1 року'),
(7, 'Nissan X-Trail', 'White', 1, 0, 'admin@gokit.tk', '+123456789', '3 роки'),
(8, '', '', NULL, 0, 'admin@gokit.tk', '+15544331122', 'менше 1 року'),
(9, '', '', NULL, 1, '', '0996588913', 'менше 1 року');

-- --------------------------------------------------------

--
-- Структура таблиці `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `user_pk` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `vehicle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_color` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `climat` tinyint(1) DEFAULT NULL,
  `smoking` tinyint(1) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `is_driver` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_pk`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `user_table`
--

INSERT INTO `user_table` (`user_pk`, `user_id`, `name`, `username`, `vehicle`, `v_color`, `climat`, `smoking`, `email`, `phone`, `experience`, `is_driver`) VALUES
(1, '100000152656098', 'Petro Franko', 'petro.franko', 'Nissan Qashqai', 'White', 1, 0, 'admin@gokit.tk', '+15544331122', '2 роки', 1),
(2, '100001743091731', 'Yaroslav Pukach', 'yaroslav.pukach', 'Audi A4', 'Teakbraun Metallic', 1, 1, 'pukach@mail.ru', '+380678889900', NULL, 1),
(9, '00100000152656098', 'Petro Franko', 'petro.franko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`s_city`) REFERENCES `s_city` (`s_city_pk`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `routes_ibfk_2` FOREIGN KEY (`e_city`) REFERENCES `e_city` (`e_city_pk`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `routes_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_pk`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `routes_ibfk_4` FOREIGN KEY (`unregistered_id`) REFERENCES `unregistered_user_data` (`user_pk`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
