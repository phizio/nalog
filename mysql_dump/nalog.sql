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

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `people_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unrestricted_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address.value` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address.data` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `branch_count` int(6) unsigned NOT NULL,
  `branch_type` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `inn` int(12) unsigned NOT NULL,
  `kpp` int(9) unsigned NOT NULL,
  `name.full_with_opf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name.short_with_opf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name.latin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name.full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name.short` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `okpo` int(10) unsigned NOT NULL,
  `okved` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opf.code` int(11) unsigned NOT NULL,
  `opf.short` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `opf.full` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state.actuality_date` int(15) unsigned NOT NULL,
  `state.registration_date` int(15) unsigned NOT NULL,
  `state.liquidation_date` int(15) unsigned NOT NULL,
  `state.status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `companies` */

/*Table structure for table `peoples` */

DROP TABLE IF EXISTS `peoples`;

CREATE TABLE `peoples` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `peoples` */


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
