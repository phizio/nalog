/*
SQLyog Community Edition- MySQL GUI v7.02
MySQL - 5.5.45 : Database - nalog
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `companies` */

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

/*Table structure for table `file_versions` */

DROP TABLE IF EXISTS `file_versions`;

CREATE TABLE `file_versions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '��� ������',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '�������� ������',
  `data` varchar(4096) COLLATE utf8_unicode_ci NOT NULL COMMENT '�������������� ��������� � ������� json',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `file_versions` */

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '��������� ����',
  `file_id` int(11) unsigned NOT NULL COMMENT '�������� ID ����� (��� ��������� ������)',
  `version_id` int(11) unsigned NOT NULL COMMENT '������ �����',
  `user_id` int(11) unsigned NOT NULL COMMENT '������������, ��������� ���� ������� ������',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reason` varchar(22) COLLATE utf8_unicode_ci NOT NULL COMMENT '���� ����� (������, �����, �������� � �.�.)',
  `type` varchar(22) COLLATE utf8_unicode_ci NOT NULL COMMENT '��� ����� (excel, word, image, archive, media, ...)',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '��� �����',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '�������� �����',
  `size` int(11) unsigned NOT NULL COMMENT '������ ����� � ������',
  `path` varchar(2048) COLLATE utf8_unicode_ci NOT NULL COMMENT '���������� ����� �����',
  `data` varchar(4096) COLLATE utf8_unicode_ci NOT NULL COMMENT '�������������� ��������� ����� � ������� json',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `files` */

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '��������� ����',
  `type` varchar(10) NOT NULL COMMENT '��� �������',
  `self` varchar(100) NOT NULL COMMENT '������� url',
  `value` text NOT NULL COMMENT '��������� ����',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '����� �������� ������',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `log` */

insert  into `log`(`id`,`type`,`self`,`value`,`created_at`) values (1,'API','api.php','\r\n    [error] => 1\n    [error_msg] => ������! ������� ������ ������ �� �������� �������� JSON\n','2015-08-23 06:07:20'),(2,'API','api.php','\r\n    [error] => 1\n    [error_msg] => ������! ������� ������ ������ �� �������� �������� JSON\n','2015-08-23 06:09:48'),(3,'API','api.php','\r\n    [error] => 1\n    [error_msg] => ������! ������� ������ ������ �� �������� �������� JSON\n','2015-08-23 06:10:06'),(4,'API','api.php','\r\n    [error] => 1\n    [error_msg] => ������! ������� ������ ������ �� �������� �������� JSON\n','2015-08-23 19:04:09');

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

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '�����������, ������� ������ ����',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '������������ ����.',
  `rights` varchar(4096) COLLATE utf8_unicode_ci NOT NULL COMMENT '����� ������� ��� ������ ���� � ������� json (?)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `user_roles` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '��������� ����',
  `user_role_id` int(11) unsigned NOT NULL COMMENT '�� ���� ������������',
  `name` varchar(100) NOT NULL COMMENT '��� ������������',
  `login` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `activate_code` varchar(50) NOT NULL,
  `auth_hash` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '����� �������� ������',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '����� ���������� ���������� ������',
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`user_role_id`,`name`,`login`,`pass`,`address`,`company`,`bank`,`email`,`phone`,`activate_code`,`auth_hash`,`created_at`,`updated_at`,`deleted_at`) values (2,0,'�������� ��������� ���������','','','���� ���������, � ������, �� ���� �������, � 31','��� �������','��� 24 (���)','ivanov@mail.ru','','','','2015-08-25 07:16:41','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,0,'���������� ������� ����������','','','���� ����� ��, � ������-���, �� ������, � 5','��� ������','��� &quot;�������� ������&quot;','skor@gmail.ru','','','','2015-08-25 16:34:26','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,0,'��������� ��������� ���������','','','� ������, �� ��������','��� ���-����������','��� ���� &quot;���� ������&quot;','ekaterina@rambler.ru','','','','2015-09-23 17:29:53','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,0,'�����','id440487@yandex.ru','8f9f75f126625be84bfdbfa7685f20de21ee3113','','','','id440487@yandex.ru','','00921a9c','','2015-09-28 23:20:58','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
