-- --------------------------------------------------------
-- ホスト:                          localhost
-- サーバーのバージョン:                   5.7.28 - MySQL Community Server (GPL)
-- サーバー OS:                      Linux
-- HeidiSQL バージョン:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--  テーブル gradou.admin_users の構造をダンプしています
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- テーブル gradou.admin_users: ~0 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `last_login_at`, `created`, `modified`) VALUES
	(1, 'admin', '$2y$10$5qldJH4XKdqk8WyVXS4jQ.Z.e3whx//.HvpSlULYNf1UfNcTsnUYq', '', '2019-12-15 02:11:42', '2019-12-15 02:11:42', '2019-12-15 02:11:43');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

--  テーブル customers の構造をダンプしています
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pref_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pref_id` (`pref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  テーブル prefs の構造をダンプしています
CREATE TABLE IF NOT EXISTS `prefs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- テーブル prefs: ~47 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE `prefs` DISABLE KEYS */;
INSERT INTO `prefs` (`id`, `name`) VALUES
	(1, '北海道'),
	(2, '青森県'),
	(3, '岩手県'),
	(4, '宮城県'),
	(5, '秋田県'),
	(6, '山形県'),
	(7, '福島県'),
	(8, '茨城県'),
	(9, '栃木県'),
	(10, '群馬県'),
	(11, '埼玉県'),
	(12, '千葉県'),
	(13, '東京都'),
	(14, '神奈川県'),
	(15, '新潟県'),
	(16, '富山県'),
	(17, '石川県'),
	(18, '福井県'),
	(19, '山梨県'),
	(20, '長野県'),
	(21, '岐阜県'),
	(22, '静岡県'),
	(23, '愛知県'),
	(24, '三重県'),
	(25, '滋賀県'),
	(26, '京都府'),
	(27, '大阪府'),
	(28, '兵庫県'),
	(29, '奈良県'),
	(30, '和歌山県'),
	(31, '鳥取県'),
	(32, '島根県'),
	(33, '岡山県'),
	(34, '広島県'),
	(35, '山口県'),
	(36, '徳島県'),
	(37, '香川県'),
	(38, '愛媛県'),
	(39, '高知県'),
	(40, '福岡県'),
	(41, '佐賀県'),
	(42, '長崎県'),
	(43, '熊本県'),
	(44, '大分県'),
	(45, '宮崎県'),
	(46, '鹿児島県'),
	(47, '沖縄県');
/*!40000 ALTER TABLE `prefs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
