-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `daftar_nilai`;
CREATE TABLE `daftar_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_min` int(11) NOT NULL,
  `nilai_max` int(11) NOT NULL,
  `nilai_huruf` char(2) NOT NULL,
  `mutu` int(11) NOT NULL,
  `ket_nilai` text NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `daftar_nilai` (`id_nilai`, `nilai_min`, `nilai_max`, `nilai_huruf`, `mutu`, `ket_nilai`) VALUES
(1,	0,	39,	'E',	0,	''),
(2,	40,	59,	'D',	1,	''),
(3,	60,	79,	'C',	2,	''),
(4,	80,	89,	'B',	3,	''),
(5,	90,	100,	'A',	4,	'');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1,	'admin',	'Administrator'),
(2,	'members',	'General User'),
(3,	'mahasiswa',	'Mahasiswa'),
(4,	'BAK',	'Administrasi Akademik');

DROP TABLE IF EXISTS `groups_permissions`;
CREATE TABLE `groups_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` tinyint(4) DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleID_2` (`group_id`,`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `groups_permissions` (`id`, `group_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	1573923144,	1573923144),
(396,	2,	3,	1,	1574781017,	1574781017),
(397,	2,	4,	1,	1574781017,	1574781017),
(398,	2,	5,	1,	1574781017,	1574781017),
(399,	2,	6,	1,	1574781017,	1574781017),
(400,	2,	7,	1,	1574781017,	1574781017),
(401,	2,	11,	0,	1574781017,	1574781017),
(402,	2,	9,	1,	1574781018,	1574781018),
(440,	3,	85,	1,	1575891350,	1575891350),
(441,	3,	90,	1,	1575891350,	1575891350),
(471,	4,	3,	1,	1577179466,	1577179466),
(472,	4,	68,	1,	1577179466,	1577179466),
(473,	4,	69,	1,	1577179466,	1577179466),
(474,	4,	70,	1,	1577179466,	1577179466),
(475,	4,	71,	1,	1577179466,	1577179466),
(476,	4,	85,	1,	1577179466,	1577179466),
(477,	4,	90,	1,	1577179466,	1577179466),
(478,	4,	95,	1,	1577179466,	1577179466),
(479,	4,	96,	1,	1577179466,	1577179466),
(480,	4,	80,	1,	1577179466,	1577179466),
(481,	4,	82,	1,	1577179466,	1577179466),
(482,	4,	83,	1,	1577179466,	1577179466),
(483,	4,	84,	1,	1577179466,	1577179466),
(484,	4,	27,	1,	1577179467,	1577179467),
(485,	4,	32,	1,	1577179467,	1577179467),
(486,	4,	33,	1,	1577179467,	1577179467),
(487,	4,	34,	1,	1577179467,	1577179467),
(488,	4,	35,	1,	1577179467,	1577179467),
(489,	4,	60,	1,	1577179467,	1577179467),
(490,	4,	61,	1,	1577179467,	1577179467),
(491,	4,	62,	1,	1577179467,	1577179467),
(492,	4,	63,	1,	1577179467,	1577179467),
(493,	4,	44,	1,	1577179467,	1577179467),
(494,	4,	45,	1,	1577179467,	1577179467),
(495,	4,	46,	1,	1577179467,	1577179467),
(496,	4,	47,	1,	1577179467,	1577179467),
(497,	4,	86,	1,	1577179467,	1577179467),
(498,	4,	87,	1,	1577179467,	1577179467),
(499,	4,	88,	1,	1577179467,	1577179467),
(500,	4,	89,	1,	1577179467,	1577179467);

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kelas` char(5) NOT NULL,
  `nama_kelas` char(50) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_kelas`),
  UNIQUE KEY `kode_kelas` (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `ket`) VALUES
(1,	'REG',	'Reguler',	'-'),
(2,	'EXE',	'Eksekutif',	'-');

DROP TABLE IF EXISTS `khs`;
CREATE TABLE `khs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` int(11) NOT NULL,
  `kode_prodi` char(5) NOT NULL,
  `kode_mata_kuliah` char(9) NOT NULL,
  `kode_tahun_akademik` char(9) NOT NULL,
  `nilai_angka` double NOT NULL,
  `nilai_huruf` char(2) NOT NULL,
  `mutu` int(1) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `khs` (`id`, `NIM`, `kode_prodi`, `kode_mata_kuliah`, `kode_tahun_akademik`, `nilai_angka`, `nilai_huruf`, `mutu`, `date_time`) VALUES
(1,	1916160206,	'',	'ISS1102',	'201910',	75.5,	'C',	2,	'2019-12-23 19:47:33'),
(2,	1916160207,	'',	'ISS1102',	'201910',	80.25,	'B',	3,	'2019-12-23 19:47:33'),
(3,	1916160207,	'',	'MAS1102',	'201910',	85.25,	'B',	3,	'2019-12-24 09:39:39');

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(4,	'::1',	'1916160207',	1577173754);

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` int(11) NOT NULL,
  `nama_depan` char(50) NOT NULL,
  `nama_belakang` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `kode_prodi` char(5) NOT NULL,
  `kode_semester` int(1) NOT NULL,
  `tmpt_lahir` char(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `NIM` (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mahasiswa` (`id_mahasiswa`, `NIM`, `nama_depan`, `nama_belakang`, `email`, `kode_prodi`, `kode_semester`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`) VALUES
(5,	1916160206,	'OKY',	'DAMARA',	'okynada15@gmail.com',	'SI',	1,	'tangerang',	'1990-01-01',	'L',	'tangerang'),
(6,	1916160207,	'Ferdi',	'Ansyah',	'ferdians.bm@gmail.com',	'SI',	2,	'tangerang',	'1984-06-25',	'L',	'Test Alamat');

DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE `mata_kuliah` (
  `id_mata_kuliah` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mata_kuliah` char(9) NOT NULL,
  `nama_mata_kuliah` char(50) NOT NULL,
  `sks` int(1) NOT NULL,
  `kode_prodi` char(5) NOT NULL,
  `kode_semester` int(1) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_mata_kuliah`),
  UNIQUE KEY `kode_mata_kuliah` (`kode_mata_kuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mata_kuliah` (`id_mata_kuliah`, `kode_mata_kuliah`, `nama_mata_kuliah`, `sks`, `kode_prodi`, `kode_semester`, `ket`) VALUES
(1,	'MAS1101',	'Matematika Dasar I',	4,	'SI',	1,	'-'),
(2,	'FIS1101',	'Fisika Dasar I (+P)',	4,	'SI',	1,	'-'),
(3,	'ISS1101',	'Sains Teknologi dan Seni di Masyarakat',	2,	'SI',	1,	'-'),
(4,	'IFS1101',	'Pengantar Teknologi Informasi',	2,	'SI',	1,	'-'),
(5,	'KUS1102',	'Bahasa Inggris I',	2,	'SI',	1,	'-'),
(6,	'ISS1102',	'Programming-1',	2,	'SI',	1,	'-'),
(7,	'MAS1102',	'Test Makul Smster 2',	4,	'SI',	2,	'-');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_key` varchar(30) NOT NULL,
  `perm_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permKey` (`perm_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `permissions` (`id`, `perm_key`, `perm_name`) VALUES
(1,	'access_admin',	'administrator'),
(2,	'member_access',	'member'),
(3,	'menu_dashboard',	'Dashboard'),
(4,	'menu_settings',	'Setting'),
(5,	'menu_menu',	'Setting Menu'),
(6,	'menu_auth',	'Manage Users'),
(7,	'menu_users',	'Users'),
(8,	'menu_permissions',	'Permissions'),
(9,	'menu_group_user',	'Group Users'),
(11,	'edit_users',	'Update Users'),
(12,	'view_users',	'Detail Users'),
(13,	'create_menu',	'Create Menu'),
(14,	'edit_menu',	'Update Menu'),
(15,	'delete_menu',	'Delete Menu'),
(16,	'position_menu',	'Update Position'),
(17,	'edit_group_user',	'Update Groups'),
(18,	'setting_access_group_user',	'Update Access Groups'),
(19,	'edit_permissions',	'Update Permissions'),
(20,	'create_permissions',	'Create Permissions'),
(21,	'create_users',	'Create Users'),
(22,	'create_group_user',	'Create Groups'),
(27,	'menu_akademik_tree',	'Menu Akademik'),
(28,	'menu_kelas',	'Menu Kelas'),
(29,	'create_kelas',	'Create Kelas'),
(30,	'edit_kelas',	'Update Kelas'),
(31,	'delete_kelas',	'Delete Kelas'),
(32,	'menu_tahun_akademik',	'Menu Tahun Akademik'),
(33,	'create_tahun_akademik',	'Create Tahun Akademik'),
(34,	'edit_tahun_akademik',	'Update Tahun Akademik'),
(35,	'delete_tahun_akademik',	'Delete Tahun Akademik'),
(44,	'menu_mata_kuliah',	'Menu Mata Kuliah'),
(45,	'create_mata_kuliah',	'Create Mata Kuliah'),
(46,	'edit_mata_kuliah',	'Update Mata Kuliah'),
(47,	'delete_mata_kuliah',	'Delete Mata Kuliah'),
(60,	'menu_prodi',	'Menu Prodi'),
(61,	'create_prodi',	'Create Prodi'),
(62,	'edit_prodi',	'Update Prodi'),
(63,	'delete_prodi',	'Delete Prodi'),
(68,	'menu_mahasiswa',	'Menu Mahasiswa'),
(69,	'create_mahasiswa',	'Create Mahasiswa'),
(70,	'edit_mahasiswa',	'Update Mahasiswa'),
(71,	'delete_mahasiswa',	'Delete Mahasiswa'),
(80,	'menu_khs',	'Menu Input Nilai'),
(82,	'create_khs',	'Create Khs'),
(83,	'edit_khs',	'Update Khs'),
(84,	'delete_khs',	'Delete Khs'),
(85,	'menu_kartu_hasil_stadi',	'Menu KHS'),
(86,	'menu_daftar_nilai',	'Menu Daftar Nilai'),
(87,	'create_daftar_nilai',	'Create Daftar Nilai'),
(88,	'edit_daftar_nilai',	'Update Daftar Nilai'),
(89,	'delete_daftar_nilai',	'Delete Daftar Nilai'),
(90,	'list_kartu_hasil_stadi',	'List KHS'),
(95,	'menu_penilaian',	'Menu Penilaian'),
(96,	'menu_input_nilai',	'Menu Input Nilai');

DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` char(5) NOT NULL,
  `nama_prodi` char(50) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_prodi`),
  UNIQUE KEY `kode_jurusan` (`kode_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `ket`) VALUES
(1,	'SI',	'Sistem Informasi',	'-'),
(2,	'TI',	'Tehnik Informatika',	'-');

DROP TABLE IF EXISTS `tahun_akademik`;
CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tahun_akademik` int(6) NOT NULL,
  `nama_tahun_akademik` char(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_tahun_akademik`),
  UNIQUE KEY `kode_tahun_akademik` (`kode_tahun_akademik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `kode_tahun_akademik`, `nama_tahun_akademik`, `status`, `ket`) VALUES
(1,	201910,	'2019/2020 Ganjil',	1,	'-'),
(2,	201920,	'2019/2020 Genap',	0,	'-');

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `label` varchar(200) NOT NULL DEFAULT '',
  `icon` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `link` varchar(100) NOT NULL DEFAULT '',
  `parent` int(10) unsigned NOT NULL DEFAULT 0,
  `sort` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_menu` (`id`, `key`, `label`, `icon`, `type`, `link`, `parent`, `sort`) VALUES
(1,	'menu_dashboard',	'Dashboard',	'icon-speedometer',	'menu',	'dashboard',	0,	1),
(2,	'menu_auth',	'Auth',	'fa fa-shield',	'menu',	'#',	0,	15),
(3,	'menu_users',	'Users',	'fa fa-user',	'menu',	'auth',	2,	16),
(4,	'menu_menu',	'Menu',	'fa fa-list-ul',	'menu',	'menu_dinamic',	5,	14),
(5,	'menu_settings',	'Settings',	'fa fa-gears',	'menu',	'#',	0,	13),
(6,	'menu_group_user',	'Groups User',	'fa fa-users',	'menu',	'groups',	2,	17),
(7,	'menu_permissions',	'Permissions',	'fa fa-key',	'menu',	'permissions',	2,	18),
(8,	'menu_prodi',	'Program Studi',	'fa fa-map-signs',	'menu',	'prodi',	9,	9),
(9,	'menu_akademik_tree',	'Akademik',	'fa fa-university',	'menu',	'#',	0,	7),
(10,	'menu_kelas',	'Kelas',	'fa fa-th-large',	'menu',	'kelas',	9,	12),
(11,	'menu_tahun_akademik',	'Tahun Akademik',	'fa fa-calendar-check-o',	'menu',	'tahun_akademik',	9,	8),
(12,	'menu_mata_kuliah',	'Mata Kuliah',	'fa fa-puzzle-piece',	'menu',	'mata_kuliah',	9,	10),
(13,	'menu_mahasiswa',	'Mahasiswa',	'fa fa-graduation-cap',	'menu',	'mahasiswa',	0,	2),
(14,	'menu_kartu_hasil_stadi',	'Kartu Hasil Studi',	'fa fa-print',	'menu',	'khs/khs_list',	0,	3),
(15,	'menu_input_nilai',	'Input Nilai',	'fa fa-pencil-square-o',	'menu',	'khs/index_nilai',	17,	5),
(16,	'menu_daftar_nilai',	'Daftar Nilai',	'fa fa-font',	'menu',	'daftar_nilai',	9,	11),
(17,	'menu_penilaian',	'Penilaian',	'fa fa-pencil-square-o',	'menu',	'#',	0,	4),
(18,	'menu_khs',	'Data Nilai',	'fa fa-list-ul',	'menu',	'khs',	17,	6);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1,	'127.0.0.1',	'administrator',	'$2y$12$B4Qhr.yEbTGQzrpPdr92rOXfwOyvvNu9eXs.4WpZUDY/fLuquwCkK',	'yans.camerount@gmail.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1268889823,	1577196765,	1,	'Admin',	'istrator',	'Qififa',	'(085) 946-237704'),
(2,	'::1',	'CMA001',	'$2y$10$R6R0GuvtPKypworvIKWvEOdxy07NCFgNATAaIVit3mygkutw5lmFu',	'member@admin.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1573891706,	1574545883,	1,	'member',	'001',	'Qififa',	'(085) 946-2377'),
(12,	'::1',	'CMD0056',	'$2y$12$DPYno1GzOiux699KiVkltOeDHUK0402BOekv9GyCZsz7Zyqt0LSHm',	'yans.cpenk@gmail.com',	NULL,	NULL,	'002a41495bd26a4573af',	'$2y$10$DGZUFsPSwAgtr8NaBbHhzO0SCympM4yXWBDofy4OKbcKYK3Q6o2ve',	1577173766,	NULL,	NULL,	1574023303,	1574023625,	1,	'Cpenk',	'Yans',	'Qififa',	'(085) 946-2377'),
(15,	'::1',	'1916160206',	'$2y$10$yKVicmS7es.RfSzdqA6TuOxAaVgJZL.5wqhPE1vXrHj5wKFuiNjO6',	'okynada15@gmail.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1574799934,	1577173679,	1,	'OKY',	'DAMARA',	'Qififa',	'08238745623'),
(16,	'::1',	'admin_bak',	'$2y$10$L.YoVnHz53P2IbEn3fw5KOgCyRh/3hwXHzKG7lzIktEibh0vrKABW',	'bak@kampus.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1574890657,	1574891773,	1,	'Administrasi',	'Akademik',	'Akademik',	'(982) 348-7823'),
(17,	'::1',	'1916160207',	'$2y$10$6Ln7iFNKJAM9QDXXdcx4u.qFeqpwtwR9IrOZAFfoe2osP1yykQCQ2',	'ferdians.bm@gmail.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1576181000,	1577173843,	1,	'Ferdi',	'Ansyah',	NULL,	'6221');

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(119,	1,	1),
(120,	1,	2),
(121,	1,	4),
(109,	2,	4),
(98,	12,	1),
(113,	15,	3),
(106,	16,	4),
(110,	17,	3);

DROP TABLE IF EXISTS `users_permissions`;
CREATE TABLE `users_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`user_id`,`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users_permissions` (`id`, `user_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES
(3,	1,	1,	1,	1573848216,	1573848216);

-- 2019-12-24 14:43:24
