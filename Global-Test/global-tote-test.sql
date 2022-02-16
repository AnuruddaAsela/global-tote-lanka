/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.13-MariaDB : Database - global-tote-test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`global-tote-test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `global-tote-test`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `last_runs` */

DROP TABLE IF EXISTS `last_runs`;

CREATE TABLE `last_runs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `runner_form_id` bigint(20) unsigned NOT NULL,
  `age` int(11) NOT NULL,
  `color` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `last_runs_runner_form_id_foreign` (`runner_form_id`),
  CONSTRAINT `last_runs_runner_form_id_foreign` FOREIGN KEY (`runner_form_id`) REFERENCES `runner_forms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `last_runs` */

/*Table structure for table `meetings` */

DROP TABLE IF EXISTS `meetings`;

CREATE TABLE `meetings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `meetings` */

insert  into `meetings`(`id`,`name`,`external_id`) values 
(1,'Lad Broke - 2400mm','ETQYPuX1IC-Meeting');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2416 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(2406,'2014_10_12_000000_create_users_table',1),
(2407,'2014_10_12_100000_create_password_resets_table',1),
(2408,'2019_08_19_000000_create_failed_jobs_table',1),
(2409,'2022_02_09_192439_create_meetings_table',1),
(2410,'2022_02_09_201951_create_races_table',1),
(2411,'2022_02_09_215157_create_runners_table',1),
(2412,'2022_02_09_231455_create_runner_forms_table',1),
(2413,'2022_02_12_195248_create_last_runs_table',1),
(2414,'2022_02_14_034052_create_shows_table',1),
(2415,'2022_02_14_215208_create_runner_form_lasts_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `races` */

DROP TABLE IF EXISTS `races`;

CREATE TABLE `races` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` bigint(20) unsigned NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `races_meeting_id_foreign` (`meeting_id`),
  CONSTRAINT `races_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `races` */

insert  into `races`(`id`,`meeting_id`,`name`,`external_id`) values 
(1,1,'Race 01','zfdSCDyfyY-Race'),
(2,1,'Race 02','2pARgr8ix9-Race'),
(3,1,'Race 03','R4ph3okY92-Race'),
(4,1,'Race 04','eeY5God9yn-Race'),
(5,1,'Race 05','FjJak7Jh0f-Race'),
(6,1,'Race 06','cfhYBsZVjP-Race'),
(7,1,'Race 07','kyIbNdeJxL-Race'),
(8,1,'Race 08','I60342wdDB-Race');

/*Table structure for table `runner_form_lasts` */

DROP TABLE IF EXISTS `runner_form_lasts`;

CREATE TABLE `runner_form_lasts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `runner_id` bigint(20) unsigned NOT NULL,
  `age` int(11) NOT NULL,
  `color` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `runner_form_lasts_runner_id_foreign` (`runner_id`),
  CONSTRAINT `runner_form_lasts_runner_id_foreign` FOREIGN KEY (`runner_id`) REFERENCES `runners` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `runner_form_lasts` */

/*Table structure for table `runner_forms` */

DROP TABLE IF EXISTS `runner_forms`;

CREATE TABLE `runner_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `runner_id` bigint(20) unsigned NOT NULL,
  `age` int(11) NOT NULL,
  `color` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `runner_forms_runner_id_foreign` (`runner_id`),
  CONSTRAINT `runner_forms_runner_id_foreign` FOREIGN KEY (`runner_id`) REFERENCES `runners` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `runner_forms` */

insert  into `runner_forms`(`id`,`runner_id`,`age`,`color`,`sex`,`owner`,`career`,`first`,`second`,`third`,`created_at`,`updated_at`) values 
(1,7,3,'SeaGreen','M','Justyn Stoltenberg DVM','6-3-4-2','1-0-0-1','1-0-0-1','0-0-0-0','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(2,1,0,'Pink','F','Dr. Ole Zulauf Sr.','6-3-4-2','1-1-1-1','0-0-0-1','0-1-0-1','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(3,2,5,'OldLace','M','Matilde Schroeder','6-3-4-2','0-0-0-1','1-1-1-1','1-0-0-1','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(4,5,2,'MediumPurple','G','German Weissnat','8-0-2-1','0-0-0-0','0-0-0-1','0-0-0-0','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(5,6,2,'MediumOrchid','M','Savanna Connelly','8-0-2-1','1-1-1-1','1-1-1-1','0-0-0-0','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(6,4,0,'MediumTurquoise','M','Kylee Quigley','9-8-0-5','1-0-0-1','0-0-0-1','1-0-0-1','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(7,8,8,'GreenYellow','F','Leonardo Brakus','8-0-2-1','0-0-0-0','0-0-0-1','0-0-0-1','2022-02-16 01:43:40','2022-02-16 01:43:40'),
(8,3,7,'SeaGreen','M','Prof. Willis Huel PhD','9-8-0-5','0-0-0-0','1-1-1-1','1-0-0-1','2022-02-16 01:43:40','2022-02-16 01:43:40');

/*Table structure for table `runners` */

DROP TABLE IF EXISTS `runners`;

CREATE TABLE `runners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `race_id` bigint(20) unsigned NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `runners_race_id_foreign` (`race_id`),
  CONSTRAINT `runners_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `runners` */

insert  into `runners`(`id`,`race_id`,`name`,`external_id`) values 
(1,1,'Seneka (a2/61.5kg)','VoyQ0NB7Es-Runner'),
(2,2,'Red Devil (a3/65.5kg)','Ig81sqcTyN-Runner'),
(3,3,'Minx (a4/70.0kg)','ruftYSRvbe-Runner'),
(4,4,'Sheza (a5/75.5kg)','uw9KaQfOhd-Runner'),
(5,5,'Thuderstorm (a6/78.0kg)','YQCEFSVAs2-Runner'),
(6,6,'Kalli (a7/82.5kg)','3P3TeNpuQE-Runner'),
(7,7,'Campino (a8/85.0kg)','GoS9JTvCpA-Runner'),
(8,8,'Skydance (a9/90.0kg)','0Qrj3Cz9IR-Runner');

/*Table structure for table `shows` */

DROP TABLE IF EXISTS `shows`;

CREATE TABLE `shows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shows` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
