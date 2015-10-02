-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2015 г., 10:52
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `nalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'первичный ключ',
  `type` varchar(10) NOT NULL COMMENT 'тип события',
  `self` varchar(100) NOT NULL COMMENT 'текущий url',
  `value` text NOT NULL COMMENT 'сообщение лога',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'время создания записи',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `type`, `self`, `value`, `created_at`) VALUES
(1, 'API', 'api.php', '\r\n    [error] => 1\n    [error_msg] => Ошибка! Входной формат данных не является массивом JSON\n', '2015-08-22 22:07:20'),
(2, 'API', 'api.php', '\r\n    [error] => 1\n    [error_msg] => Ошибка! Входной формат данных не является массивом JSON\n', '2015-08-22 22:09:48'),
(3, 'API', 'api.php', '\r\n    [error] => 1\n    [error_msg] => Ошибка! Входной формат данных не является массивом JSON\n', '2015-08-22 22:10:06'),
(4, 'API', 'api.php', '\r\n    [error] => 1\n    [error_msg] => Ошибка! Входной формат данных не является массивом JSON\n', '2015-08-23 11:04:09');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'первичный ключ',
  `name` varchar(100) NOT NULL COMMENT 'имя пользователя',
  `login` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `activate_code` varchar(50) NOT NULL,
  `auth_hash` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'время создания записи',
  `updated_at` timestamp NOT NULL COMMENT 'время последнего обновления записи',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `address`, `company`, `bank`, `email`, `phone`, `activate_code`, `auth_hash`, `created_at`, `updated_at`) VALUES
(2, 'Петросян Александр Федорович', '', '', 'Респ Татарстан, г Казань, ул Хади Такташа, д 31', 'ООО Скринта', 'ВТБ 24 (ПАО)', 'ivanov@mail.ru', '', '', '', '2015-08-24 23:16:41', '0000-00-00 00:00:00'),
(4, 'Скороходов Алексей Викторович', '', '', 'Респ Марий Эл, г Йошкар-Ола, ул Кирова, д 5', 'ООО Сапсан', 'ОАО &quot;СБЕРБАНК РОССИИ&quot;', 'skor@gmail.ru', '', '', '', '2015-08-25 08:34:26', '0000-00-00 00:00:00'),
(5, 'Варламова Екатерина Сергеевна', '', '', 'г Казань, ул Кутузова', 'ООО БИН-Консалтинг', 'ООО КБЭР &quot;БАНК КАЗАНИ&quot;', 'ekaterina@rambler.ru', '', '', '', '2015-09-23 09:29:53', '0000-00-00 00:00:00'),
(10, 'Роман', 'id440487@yandex.ru', '8f9f75f126625be84bfdbfa7685f20de21ee3113', '', '', '', 'id440487@yandex.ru', '', '00921a9c', '', '2015-09-28 15:20:58', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
