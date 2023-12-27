-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bahan_baku`;
CREATE TABLE `bahan_baku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahan` varchar(300) NOT NULL,
  `nama_bahan` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `status` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bahan_baku` (`id`, `kode_bahan`, `nama_bahan`, `unit`, `status`) VALUES
(1,	'TRG',	'terigu',	'kg',	'mentah'),
(2,	'TPG',	'tepung',	'kg',	'mentah'),
(3,	'GNDM',	'gandum',	'kg',	'mentah'),
(5,	'BRS',	'beras',	'kg',	'mentah'),
(6,	'MNYK',	'minyak goreng',	'liter',	'mentah'),
(7,	'CBE',	'cabe',	'ons',	'mentah'),
(8,	'AYM',	'ayam',	'ekor',	'mentah'),
(9,	'AYM-UNGKP',	'ayam ungkep',	'ekor',	'setengah-matang');

DROP TABLE IF EXISTS `bahan_baku_stok`;
CREATE TABLE `bahan_baku_stok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  CONSTRAINT `bahan_baku_stok_ibfk_1` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bahan_baku_stok` (`id`, `bahan_dasar_id`, `stok`) VALUES
(1,	2,	20),
(2,	1,	300),
(3,	3,	300),
(5,	5,	454),
(6,	6,	456),
(7,	7,	345),
(8,	8,	345),
(9,	9,	243),
(10,	10,	345),
(11,	11,	4353),
(12,	12,	345),
(13,	13,	245),
(14,	14,	43342),
(15,	15,	234),
(16,	16,	3653),
(17,	17,	453),
(18,	19,	3453),
(20,	21,	3453),
(21,	22,	345436),
(22,	23,	4353),
(23,	24,	353),
(24,	25,	2453),
(25,	26,	3453),
(26,	27,	3453),
(27,	28,	5646);

DROP TABLE IF EXISTS `bahan_baku_stok_gudang`;
CREATE TABLE `bahan_baku_stok_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahan` varchar(300) NOT NULL,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `bahan_baku_stok_gudang_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bahan_dan_kategori`;
CREATE TABLE `bahan_dan_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_bahan_id` bigint(20) unsigned NOT NULL,
  `nama_bahan` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_bahan_id` (`kategori_bahan_id`),
  CONSTRAINT `bahan_dan_kategori_ibfk_1` FOREIGN KEY (`kategori_bahan_id`) REFERENCES `kategori_bahan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bahan_dan_kategori` (`id`, `kategori_bahan_id`, `nama_bahan`) VALUES
(4,	1,	'beras putih'),
(8,	2,	'ayam'),
(9,	2,	'daging sapi'),
(10,	2,	'unta'),
(11,	1,	'beras merah'),
(12,	2,	'ikan'),
(13,	4,	'kelapa'),
(14,	4,	'kopi'),
(15,	2,	'telur'),
(16,	6,	'cabe giling'),
(17,	6,	'santan'),
(18,	6,	'bawang merah'),
(19,	6,	'bawang putih'),
(20,	6,	'jahe'),
(21,	6,	'kunyit'),
(22,	6,	'ketumbar'),
(23,	6,	'biji pala'),
(24,	6,	'sereh'),
(25,	6,	'lengkuas'),
(26,	6,	'cengkeh'),
(27,	6,	'kapulaga'),
(28,	5,	'kacang tanah'),
(29,	14,	'gas elpiji 12 kg'),
(30,	14,	'gas elpiji 3 kg'),
(31,	14,	'gas elpiji 5,5 kg'),
(32,	14,	'minyak goreng'),
(33,	14,	'bungkus makanan'),
(34,	4,	'salak'),
(35,	4,	'nanas'),
(36,	4,	'manggis'),
(37,	10,	'bumbu ungkep'),
(39,	8,	'sarden'),
(40,	10,	'santan'),
(41,	1,	'beras hitam'),
(42,	2,	'kijang'),
(43,	11,	'ayam ungkep'),
(44,	10,	'air kelapa'),
(45,	11,	'dada ayam'),
(46,	11,	'paha ayam'),
(47,	15,	'ayam bakar'),
(48,	15,	'ayam goreng'),
(49,	14,	'punch'),
(50,	14,	'margarin'),
(51,	11,	'nasi'),
(52,	3,	'timun'),
(53,	3,	'daun singkong'),
(54,	3,	'daun singkong matang'),
(55,	3,	'timun matang'),
(56,	6,	'cabe hijau keriting india'),
(57,	6,	'cabe hijau besar'),
(58,	6,	'tomat hijau'),
(60,	15,	'sambal ijo jadi'),
(61,	6,	'kecap'),
(62,	8,	'sosis'),
(63,	15,	'sosis bakar'),
(64,	15,	'ketoprak jadi'),
(65,	1,	'lontong'),
(66,	3,	'tauge'),
(67,	8,	'bihun');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bahan_dasars`;
CREATE TABLE `bahan_dasars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_acuan` int(11) DEFAULT NULL,
  `satuan_id` bigint(20) unsigned NOT NULL,
  `kategori_bahan_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `satuan_id` (`satuan_id`),
  KEY `kategori_bahan_id` (`kategori_bahan_id`),
  CONSTRAINT `bahan_dasars_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`),
  CONSTRAINT `bahan_dasars_ibfk_2` FOREIGN KEY (`kategori_bahan_id`) REFERENCES `kategori_bahan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bahan_dasars` (`id`, `nama_bahan`, `harga_acuan`, `satuan_id`, `kategori_bahan_id`, `created_at`, `updated_at`) VALUES
(1,	'Beras merah',	20,	1,	1,	NULL,	NULL),
(2,	'daging sapi',	100000,	3,	2,	NULL,	NULL),
(3,	'cabe giling',	50,	1,	6,	NULL,	NULL),
(5,	'gandum',	50000,	3,	8,	NULL,	NULL),
(6,	'kerupuk matang',	10,	14,	8,	NULL,	NULL),
(7,	'ikan',	32500,	3,	2,	NULL,	NULL),
(8,	'masako',	700,	14,	10,	NULL,	NULL),
(9,	'garam',	23,	1,	10,	NULL,	NULL),
(10,	'gula',	14,	1,	10,	NULL,	NULL),
(11,	'kopi',	26500,	3,	5,	NULL,	NULL),
(12,	'teh tubruk',	7500,	14,	5,	NULL,	NULL),
(13,	'telor',	200,	14,	5,	NULL,	NULL),
(14,	'madu',	250,	14,	12,	NULL,	NULL),
(15,	'bumbu rendang',	10000,	14,	10,	NULL,	NULL),
(16,	'bumbu gulai',	10000,	14,	10,	NULL,	NULL),
(17,	'bumbu ungkep',	4500,	14,	10,	NULL,	NULL),
(19,	'box nasi',	2000,	14,	14,	NULL,	NULL),
(21,	'arang',	5000,	14,	14,	NULL,	NULL),
(22,	'gas elpiji 12 kg',	120000,	15,	14,	NULL,	NULL),
(23,	'gas elpiji 5,5 kg',	55000,	16,	14,	NULL,	NULL),
(24,	'gas elpiji 3 kg',	18000,	17,	14,	NULL,	NULL),
(25,	'minyak goreng',	NULL,	9,	14,	NULL,	NULL),
(26,	'kertas nasi',	150,	14,	14,	NULL,	NULL),
(27,	'kertas pembungkus',	100,	14,	14,	NULL,	NULL),
(28,	'kantong plastik',	200,	14,	14,	NULL,	NULL),
(29,	'kelapa',	10000,	14,	4,	NULL,	NULL),
(31,	'bawang merah',	20,	1,	6,	NULL,	NULL),
(32,	'bawang putih',	25,	1,	6,	NULL,	NULL),
(33,	'jahe',	15,	1,	6,	NULL,	NULL),
(34,	'kunyit',	15,	1,	6,	NULL,	NULL),
(35,	'ketumbar',	25,	1,	6,	NULL,	NULL),
(36,	'biji pala',	134,	1,	6,	NULL,	NULL),
(37,	'sereh',	53,	1,	6,	NULL,	NULL),
(38,	'lengkuas',	20,	1,	6,	NULL,	NULL),
(39,	'cengkeh',	62,	1,	6,	NULL,	NULL),
(40,	'kapulaga',	56,	1,	6,	NULL,	NULL),
(41,	'kayu manis',	40,	1,	6,	NULL,	NULL),
(42,	'bumbu bintang',	40,	1,	6,	NULL,	NULL),
(44,	'daun jeruk',	55,	1,	6,	NULL,	NULL),
(45,	'cabe rawit',	40,	1,	6,	NULL,	NULL),
(46,	'daun kunyit',	20,	1,	6,	NULL,	NULL),
(49,	'ayam',	45,	1,	2,	NULL,	NULL),
(54,	'elpiji 3 kg',	18000,	17,	14,	NULL,	NULL),
(56,	'santan',	5000,	14,	10,	NULL,	NULL),
(57,	'beras putih',	13000,	3,	1,	NULL,	NULL),
(58,	'beras hitam',	13000,	3,	1,	NULL,	NULL),
(59,	'kijang',	20,	3,	2,	NULL,	NULL),
(60,	'ayam ungkep',	0,	12,	11,	NULL,	NULL),
(61,	'air kelapa',	10,	9,	10,	NULL,	NULL),
(62,	'dada ayam ungkep',	0,	12,	11,	NULL,	NULL),
(63,	'paha ayam ungkep',	NULL,	12,	11,	NULL,	NULL),
(64,	'ayam goreng',	NULL,	13,	15,	NULL,	NULL),
(65,	'margarin',	20,	1,	14,	NULL,	NULL),
(66,	'nasi',	10,	13,	11,	NULL,	NULL),
(67,	'timun',	20,	1,	3,	NULL,	NULL),
(68,	'daun singkong',	20,	1,	3,	NULL,	NULL),
(69,	'daun singkong matang',	10,	13,	3,	NULL,	NULL),
(70,	'cabe hijau keriting india',	20,	1,	6,	NULL,	NULL),
(71,	'cabe hijau besar',	10,	1,	6,	NULL,	NULL),
(72,	'tomat hijau',	10,	1,	6,	NULL,	NULL),
(73,	'sambal ijo jadi',	10,	13,	15,	NULL,	NULL),
(75,	'kecap',	10000,	8,	6,	NULL,	NULL),
(76,	'sosis',	15000,	14,	8,	NULL,	NULL),
(77,	'sosis bakar',	0,	13,	15,	NULL,	NULL),
(78,	'ketoprak jadi',	10000,	13,	15,	NULL,	NULL),
(79,	'tauge',	6,	1,	3,	NULL,	NULL),
(80,	'bihun',	25,	1,	8,	NULL,	NULL),
(81,	'kacang tanah',	10,	1,	5,	NULL,	NULL);

DROP TABLE IF EXISTS `bahan_tambahan_produksi`;
CREATE TABLE `bahan_tambahan_produksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `start_pemakaian` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `akhir_pemakaian` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `bahan_tambahan_produksi_ibfk_1` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`),
  CONSTRAINT `bahan_tambahan_produksi_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bahan_tambahan_produksi` (`id`, `warehouse_id`, `bahan_dasar_id`, `qty`, `harga_satuan`, `jumlah_harga`, `start_pemakaian`, `akhir_pemakaian`, `created_at`, `updated_at`) VALUES
(22,	9,	22,	1,	120000,	120000,	'2023-08-29 13:29:10',	NULL,	'2023-08-29 13:29:10',	'2023-08-29 06:29:10'),
(25,	9,	23,	2,	900,	1800,	'2023-08-31 02:45:32',	NULL,	'2023-08-31 02:45:32',	'2023-08-30 19:45:32');

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `generated_card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name_category`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(9,	'minuman',	1,	'2023-08-09 21:45:37',	'2023-08-09 21:45:37'),
(15,	'makanan',	1,	'2023-08-10 04:49:44',	'2023-08-10 04:49:44');

DROP TABLE IF EXISTS `cooks`;
CREATE TABLE `cooks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_reference_cook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chef` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cooks` (`id`, `no_reference_cook`, `chef`, `status`, `price`, `created_at`, `updated_at`) VALUES
(3,	'onta2c4jmW',	'rudi',	'raw-to-semi',	100000,	NULL,	NULL),
(4,	'5cImUXYFJR',	'rudi',	'raw-to-semi',	100000,	NULL,	NULL),
(5,	'3aj1NNGD3c',	'rudi',	'raw-to-semi',	60000,	NULL,	NULL),
(6,	'TqCwWvQsO0',	'rudi',	'raw-to-semi',	140000,	NULL,	NULL),
(7,	'UFOUyuZlXQ',	'rudi',	'raw-to-semi',	160000,	NULL,	NULL),
(8,	'jHZuAlrDRl',	'rudi',	'raw-to-semi',	80000,	NULL,	NULL),
(9,	'oNhp1jTQCE',	'rudi',	'raw-to-semi',	100000,	NULL,	NULL),
(10,	'rMejxdc4jo',	'rudi',	'raw-to-semi',	220000,	NULL,	NULL),
(11,	'nP3DnEAhj3',	'rudi',	'raw-to-semi',	70000,	NULL,	NULL),
(12,	'eXjOJ6R3kD',	'rudi',	'raw-to-semi',	85000,	NULL,	NULL),
(13,	'NFP2FwVkXc',	'rudi',	'raw-to-semi',	30000,	NULL,	NULL),
(14,	'UaXQbWNgKT',	'rudi',	'raw-to-semi',	40000,	NULL,	NULL),
(15,	'rOVs67uyDW',	'rudi',	'raw-to-semi',	70000,	NULL,	NULL),
(16,	'D7CE2Wtk8F',	'rudi',	'raw-to-semi',	30000,	NULL,	NULL),
(17,	'X6J7kmrkcI',	'rudi',	'raw-to-semi',	70000,	NULL,	NULL),
(18,	'bqV1Whw6PF',	'rudi',	'raw-to-semi',	30000,	NULL,	NULL),
(19,	'Oui6GFoODB',	'rudi',	'raw-to-semi',	60000,	NULL,	NULL),
(20,	'pNfXfdEcaM',	'rudi',	'raw-to-semi',	40000,	NULL,	NULL),
(21,	'dZVVkX9bL4',	'rudi',	'raw-to-semi',	100000,	'2023-08-21 03:41:09',	NULL);

DROP TABLE IF EXISTS `cook_details`;
CREATE TABLE `cook_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_reference_cook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cook_details` (`id`, `no_reference_cook`, `kode_bahan`, `status`, `qty`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(1,	'eXjOJ6R3kD',	'TRG',	'mentah',	'2',	20000,	20000,	NULL,	NULL),
(2,	'eXjOJ6R3kD',	'TPG',	'mentah',	'3',	15000,	15000,	NULL,	NULL),
(3,	'NFP2FwVkXc',	'TPG',	'mentah',	'2',	15000,	15000,	NULL,	NULL),
(4,	'UaXQbWNgKT',	'TRG',	'mentah',	'2',	20000,	20000,	NULL,	NULL),
(5,	'rOVs67uyDW',	'TRG',	'mentah',	'2',	20000,	20000,	NULL,	NULL),
(6,	'rOVs67uyDW',	'TPG',	'mentah',	'2',	15000,	15000,	NULL,	NULL),
(7,	'D7CE2Wtk8F',	'TPG',	'mentah',	'2',	15000,	15000,	NULL,	NULL),
(8,	'D7CE2Wtk8F',	'AYM-UNGKP',	'setengah-matang',	'3',	0,	0,	NULL,	NULL),
(9,	'bqV1Whw6PF',	'TPG',	'mentah',	'2',	15000,	40000,	NULL,	NULL),
(10,	'bqV1Whw6PF',	'AYM-UNGKP',	'setengah-matang',	'3',	0,	0,	NULL,	NULL),
(11,	'Oui6GFoODB',	'TRG',	'mentah',	'3',	20000,	60000,	NULL,	NULL),
(12,	'Oui6GFoODB',	'AYM-UNGKP',	'setengah-matang',	'2',	0,	0,	NULL,	NULL),
(13,	'pNfXfdEcaM',	'TRG',	'mentah',	'2',	20000,	40000,	NULL,	NULL),
(14,	'pNfXfdEcaM',	'AYM-UNGKP',	'setengah-matang',	'2',	0,	0,	NULL,	NULL),
(15,	'dZVVkX9bL4',	'TRG',	'mentah',	'2',	20000,	40000,	NULL,	NULL),
(16,	'dZVVkX9bL4',	'GNDM',	'mentah',	'3',	20000,	60000,	NULL,	NULL),
(17,	'dZVVkX9bL4',	'AYM-UNGKP',	'setengah-matang',	'2',	0,	0,	NULL,	NULL);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_customer` varchar(255) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customers` (`id`, `name_customer`, `no_telp`, `created_at`, `updated_at`) VALUES
(5,	'roni',	'089768565',	'2023-09-07 05:16:57',	'2023-09-07 05:16:57');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `food_process`;
CREATE TABLE `food_process` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_masakan_id` int(100) NOT NULL,
  `bahan_dasar_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `food_process` (`id`, `menu_masakan_id`, `bahan_dasar_id`, `satuan_id`, `qty`, `created_at`, `updated_at`) VALUES
(9,	2,	7,	2,	2,	NULL,	NULL),
(10,	2,	3,	2,	3,	NULL,	NULL),
(18,	4,	3,	2,	2,	'2023-08-25 07:52:33',	NULL),
(20,	1,	45,	1,	100,	'2023-08-28 04:22:52',	NULL),
(21,	1,	3,	1,	200,	'2023-08-28 04:23:09',	NULL),
(22,	1,	31,	1,	27,	'2023-08-28 04:23:29',	NULL),
(23,	1,	32,	1,	47,	'2023-08-28 04:23:46',	NULL),
(24,	1,	33,	1,	4,	'2023-08-28 04:24:03',	NULL),
(25,	1,	34,	1,	2,	'2023-08-28 04:24:21',	NULL),
(26,	1,	35,	1,	30,	'2023-08-28 04:24:48',	NULL),
(27,	1,	36,	1,	2,	'2023-08-28 04:25:12',	NULL),
(28,	1,	37,	1,	75,	'2023-08-28 04:25:35',	NULL),
(29,	1,	38,	1,	4,	'2023-08-28 04:26:03',	NULL),
(30,	1,	39,	1,	1,	'2023-08-28 04:26:22',	NULL),
(31,	1,	40,	1,	1,	'2023-08-28 04:26:37',	NULL),
(32,	1,	41,	1,	2,	'2023-08-28 04:26:51',	NULL),
(33,	1,	42,	1,	2,	'2023-08-28 04:27:08',	NULL),
(34,	1,	46,	1,	25,	'2023-08-28 04:27:25',	NULL),
(35,	1,	44,	1,	2,	'2023-08-28 04:27:51',	NULL),
(36,	1,	9,	1,	15,	'2023-08-28 04:28:09',	NULL),
(38,	1,	10,	1,	2.5,	'2023-08-28 04:31:51',	NULL),
(39,	1,	2,	3,	1,	'2023-08-28 04:38:16',	NULL),
(40,	4,	49,	1,	10,	'2023-08-29 04:02:41',	NULL),
(41,	5,	3,	1,	20,	'2023-08-29 11:38:33',	NULL),
(42,	5,	10,	1,	30,	'2023-08-29 11:38:45',	NULL),
(43,	5,	9,	1,	20,	'2023-08-29 11:38:58',	NULL),
(46,	7,	49,	1,	2400,	'2023-08-29 12:55:58',	NULL),
(47,	7,	17,	14,	3,	'2023-08-29 12:56:34',	NULL),
(48,	8,	1,	3,	1,	'2023-08-29 12:58:53',	NULL),
(49,	1,	1,	3,	2,	'2023-08-30 09:49:14',	NULL),
(50,	9,	63,	1,	2,	'2023-09-01 03:35:33',	NULL),
(51,	9,	62,	1,	2,	'2023-09-01 03:35:43',	NULL),
(52,	7,	61,	9,	300,	'2023-09-04 04:05:47',	NULL),
(54,	10,	67,	1,	145,	'2023-09-04 04:34:31',	NULL),
(55,	11,	68,	1,	500,	'2023-09-04 04:38:17',	NULL),
(56,	9,	25,	9,	1000,	'2023-09-04 06:25:30',	NULL),
(57,	12,	70,	1,	1500,	'2023-09-04 06:29:37',	NULL),
(58,	12,	71,	1,	1000,	'2023-09-04 06:30:00',	NULL),
(59,	12,	72,	1,	1000,	'2023-09-04 06:30:28',	NULL),
(60,	12,	31,	1,	500,	'2023-09-04 06:30:43',	NULL),
(61,	12,	32,	1,	200,	'2023-09-04 06:31:01',	NULL),
(62,	12,	25,	9,	750,	'2023-09-04 06:31:23',	NULL),
(63,	12,	44,	1,	450,	'2023-09-04 06:31:55',	NULL),
(64,	12,	9,	1,	12.5,	'2023-09-04 06:32:20',	NULL),
(65,	12,	10,	1,	5,	'2023-09-04 06:32:50',	NULL),
(69,	13,	49,	1,	2000,	'2023-09-05 11:38:23',	NULL),
(70,	13,	75,	8,	1,	'2023-09-05 11:38:37',	NULL),
(71,	15,	76,	14,	1,	'2023-09-06 11:39:46',	NULL),
(72,	5,	80,	1,	10,	'2023-09-07 09:18:18',	NULL),
(73,	5,	79,	1,	10,	'2023-09-07 09:18:29',	NULL),
(74,	5,	81,	1,	10,	'2023-09-07 09:19:22',	NULL);

DROP TABLE IF EXISTS `food_process_daily`;
CREATE TABLE `food_process_daily` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_masakan_id` int(11) NOT NULL,
  `bahan_dasar_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `half_cooked`;
CREATE TABLE `half_cooked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahan` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `half_cooked_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `half_cooked` (`id`, `kode_bahan`, `qty`, `price`, `total_price`, `warehouse_id`) VALUES
(1,	'AYM-UNGKP',	170,	0,	0,	1);

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_ingredient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ingredient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ingredients` (`id`, `code_item`, `code_ingredient`, `name_ingredient`, `qty`, `unit`, `price_per_unit`, `total_price`, `created_at`, `updated_at`) VALUES
(13,	'KTPRK',	'THU',	'tahu',	'2',	'kg',	'2000',	'4000',	'2023-08-11 02:59:39',	'2023-08-11 02:59:39'),
(14,	'BKS',	'DGG',	'daging',	'1.2',	'kg',	'10000',	'12000',	'2023-08-11 04:48:26',	'2023-08-14 03:45:36'),
(15,	'BKS',	'TPNG',	'tepung',	'2.4',	'kg',	'12000',	'28800',	'2023-08-11 04:48:58',	'2023-08-11 04:48:58'),
(16,	'NSGRNG',	'NS',	'nasi',	'1',	'kg',	'10000',	'10000',	'2023-08-12 00:12:59',	'2023-08-12 00:12:59'),
(17,	'BBK',	'BBK_SGR',	'bebek segar',	'1',	'ons',	'20000',	'20000',	'2023-08-14 05:09:45',	'2023-08-14 05:11:26'),
(18,	'BBK',	'SYR',	'sayur',	'1',	'pkae',	'3000',	'3000',	'2023-08-14 05:12:04',	'2023-08-14 05:12:04'),
(21,	'NSKNG',	'TRGU',	'terigu',	'8',	'kg',	'20000',	'160000',	'2023-08-15 00:10:49',	'2023-08-15 00:21:02'),
(22,	'NSKNG',	'LPTPU',	'laptop',	'5',	'kg',	'20000',	'100000',	'2023-08-15 00:11:05',	'2023-08-15 00:11:05');

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_item` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_item` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `items` (`id`, `code_item`, `name_item`, `created_at`, `updated_at`) VALUES
(1,	'NSKNG',	'nasi kunir',	NULL,	'2023-08-10 20:55:02'),
(2,	'KTPRK',	'ketoprak',	'2023-08-11 02:59:15',	'2023-08-11 02:59:15'),
(3,	'BKS',	'bakso',	'2023-08-11 04:47:10',	'2023-08-11 04:47:10'),
(4,	'NSGRNG',	'nasi goreng',	'2023-08-12 00:12:37',	'2023-08-12 00:12:37'),
(5,	'BBK',	'bebek',	'2023-08-14 05:08:58',	'2023-08-14 05:08:58'),
(6,	'AYM_BKR',	'ayam bakar',	'2023-09-01 03:50:28',	'2023-09-01 03:50:28'),
(7,	'AYM_GRG',	'ayam goreng',	'2023-09-03 21:11:08',	'2023-09-03 21:11:08'),
(8,	'PKT_RNDNG',	'paket rendang',	'2023-09-04 06:26:07',	'2023-09-04 06:26:07'),
(9,	'SS_BKR',	'sosis bakar',	'2023-09-06 04:43:07',	'2023-09-06 04:43:07');

DROP TABLE IF EXISTS `kategori_bahan`;
CREATE TABLE `kategori_bahan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori_bahan` (`id`, `nama_kategori_bahan`, `created_at`, `updated_at`) VALUES
(1,	'karbohidrat kompleks',	NULL,	NULL),
(2,	'protein',	NULL,	NULL),
(3,	'sayuran',	NULL,	NULL),
(4,	'buah',	NULL,	NULL),
(5,	'biji',	NULL,	NULL),
(6,	'bumbu',	NULL,	NULL),
(7,	'minuman',	NULL,	NULL),
(8,	'olahan vendor',	NULL,	NULL),
(9,	'adonan',	NULL,	NULL),
(10,	'olahan bumbu',	NULL,	NULL),
(11,	'olahan makanan',	NULL,	NULL),
(12,	'olahan minuman',	NULL,	NULL),
(14,	'bahan tambahan produksi',	NULL,	NULL),
(15,	'makanan jadi',	NULL,	NULL);

DROP TABLE IF EXISTS `kategori_proses_produksi`;
CREATE TABLE `kategori_proses_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori_proses_produksi` (`id`, `nama_kategori`, `deskripsi`) VALUES
(1,	'proses produksi 1',	'proses ini merupakan proses produksi 1'),
(2,	'proses produksi 2',	'proses produksi ini merupakan proses produksi 2'),
(3,	'proses produksi 3',	'proses ini merupakan proses produksi 3'),
(4,	'proses produksi selanjutnya',	'proses produksi ini adalah proses yang panjang');

DROP TABLE IF EXISTS `menu_masakan`;
CREATE TABLE `menu_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) NOT NULL,
  `porsi` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_masakan` (`id`, `nama_menu`, `porsi`) VALUES
(1,	'rendang',	10),
(4,	'sate madura',	2),
(5,	'ketoprak',	4),
(7,	'Ayam Ungkep',	12),
(8,	'Nasi Putih',	5),
(9,	'ayam goreng',	4),
(10,	'timun',	5),
(11,	'daun singkong',	5),
(12,	'sambal ijo',	50),
(13,	'ayam kecap',	20),
(14,	'sosis goreng',	5),
(15,	'sosis bakar',	5);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2023_08_10_024130_warehouse',	1),
(6,	'2023_08_10_024222_warehouse_stock',	1),
(7,	'2023_08_10_024342_category',	1),
(8,	'2023_08_10_024502_product',	1),
(9,	'2023_08_10_024636_cart',	1),
(10,	'2023_08_10_024823_customer',	1),
(11,	'2023_08_10_024909_receipt',	1),
(12,	'2023_08_10_025206_sales',	1),
(13,	'2023_08_11_031541_item',	2),
(14,	'2023_08_11_035724_capital_prices',	3),
(15,	'2023_08_11_040806_ingredients',	4),
(17,	'2023_08_21_040618_cook',	5),
(18,	'2023_08_21_040856_cook_details',	5),
(19,	'2023_08_22_041700_outlet',	6),
(20,	'2023_08_22_042437_vendor',	7),
(21,	'2023_08_22_042801_material_category',	8),
(22,	'2023_08_22_043217_bahan_dasar',	9),
(23,	'2023_08_22_043650_satuan',	10),
(24,	'2023_08_22_044015_purchase',	11),
(25,	'2023_08_22_044525_bahan_mentah',	12),
(26,	'2023_08_24_033705_food_process_daily',	13),
(27,	'2023_08_24_042123_bahan_tambahan_produksi',	14),
(28,	'2023_08_25_035819_proses_produksi',	15),
(29,	'2023_08_25_072605_record_bahan',	16),
(30,	'2023_08_30_081058_warehouse_stock',	17);

DROP TABLE IF EXISTS `outlets`;
CREATE TABLE `outlets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_outlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `address_outlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_outlet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `outlets` (`id`, `name_outlet`, `warehouse_id`, `address_outlet`, `contact_outlet`, `no_telp`, `created_at`, `updated_at`) VALUES
(10,	'pondok beling bersatu',	1,	'jl pondok beling 24',	'naldy',	'628335495',	'2023-08-25 05:14:52',	'2023-08-29 19:33:08'),
(11,	'pondok bambu bersama',	9,	'jl pondok bambu 344',	'hj malik & istri',	'6242386453454',	'2023-08-25 05:15:29',	'2023-08-29 19:33:17'),
(12,	'duren sawit',	9,	'jl duren',	'malik',	'628475368453',	'2023-08-28 05:19:11',	'2023-08-29 19:33:25');

DROP TABLE IF EXISTS `outlet_stock`;
CREATE TABLE `outlet_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint(20) unsigned NOT NULL,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `outlet_id` (`outlet_id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  CONSTRAINT `outlet_stock_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  CONSTRAINT `outlet_stock_ibfk_3` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `outlet_stock` (`id`, `outlet_id`, `bahan_dasar_id`, `harga_satuan`, `stock`) VALUES
(1,	12,	1,	15000,	50),
(2,	12,	2,	13000,	361),
(3,	11,	3,	14000,	12);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_product` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `expired` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock_product` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `code_product`, `name_product`, `category_id`, `expired`, `warehouse_id`, `price`, `stock_product`, `image`, `created_at`, `updated_at`) VALUES
(15,	'AIR_TMBK',	'air tambak',	9,	'',	1,	20000,	70,	'ice-orange1_1692003400.jpg',	'2023-08-10 02:06:45',	'2023-09-03 20:45:42'),
(16,	'ALNG_SARI',	'alang sari',	9,	'',	1,	20000,	70,	'alang-sari1_1691659925.jpg',	'2023-08-10 02:32:06',	'2023-09-03 20:19:15'),
(18,	'NSRMS',	'nasi rames',	15,	'',	1,	20000,	89,	'nasi-rendang-salted1_1691670309.jpg',	'2023-08-10 05:25:09',	'2023-09-03 20:18:32'),
(20,	'KTPRK',	'ketoprak',	15,	'',	1,	10000,	45,	'ayam-pop-salted1_1692000895.jpg',	'2023-08-11 03:00:15',	'2023-09-07 01:07:58'),
(21,	'BKS',	'bakso',	15,	'',	1,	20000,	27,	'ayam-pop-salted1_1691754738.jpg',	'2023-08-11 04:52:18',	'2023-08-14 01:21:05'),
(22,	'NSKNG',	'nasi kunir',	15,	'',	1,	20000,	20,	'nasi-telur-balado1_1692000248.jpg',	'2023-08-14 01:04:08',	'2023-08-14 01:04:08'),
(23,	'BBK',	'bebek',	15,	'',	2,	30000,	2,	'nasi-telur-gulai1_1692015449.jpg',	'2023-08-14 05:17:29',	'2023-08-14 05:17:29'),
(24,	'AYM_GRG',	'ayam goreng',	15,	'',	9,	20000,	4,	'071054100_1625722566-1114926-1000xauto-14-resep-cara-membuat-ayam-bakar_1693800908.jpg',	'2023-09-03 21:15:08',	'2023-09-04 06:24:32'),
(25,	'PKT_RNDNG',	'paket rendang',	15,	'',	9,	25000,	1,	'nasi lemak_1693834152.jpeg',	'2023-09-04 06:29:12',	'2023-09-04 06:29:12'),
(26,	'SS_BKR',	'sosis bakar',	15,	'',	9,	5000,	2,	'1686675-resep-sosis-bakar_1694000642.jpg',	'2023-09-06 04:44:03',	'2023-09-06 04:44:49');

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `kategori_bahan_id` bigint(20) unsigned NOT NULL,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `kategori_bahan_id` (`kategori_bahan_id`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`),
  CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  CONSTRAINT `produk_ibfk_3` FOREIGN KEY (`kategori_bahan_id`) REFERENCES `kategori_bahan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `proses_produksi`;
CREATE TABLE `proses_produksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `kategori_produksi_id` int(11) NOT NULL,
  `menu_masakan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah_cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `proses_produksi_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `proses_produksi` (`id`, `warehouse_id`, `kategori_produksi_id`, `menu_masakan_id`, `qty`, `jumlah_cost`, `created_at`, `updated_at`) VALUES
(58,	9,	1,	7,	1,	126000,	'2023-09-04 04:06:32',	'2023-09-03 21:06:32'),
(59,	9,	2,	9,	1,	55000,	'2023-09-04 04:09:10',	'2023-09-03 21:09:10'),
(60,	9,	1,	8,	1,	1000,	'2023-09-04 04:22:57',	'2023-09-03 21:22:57'),
(61,	9,	1,	10,	1,	2175,	'2023-09-04 04:35:15',	'2023-09-03 21:35:15'),
(64,	9,	1,	11,	1,	7500,	'2023-09-04 04:47:42',	'2023-09-03 21:47:42'),
(65,	9,	1,	12,	1,	178950,	'2023-09-04 06:37:10',	'2023-09-03 23:37:10'),
(66,	9,	2,	9,	1,	55000,	'2023-09-04 12:54:17',	'2023-09-04 05:54:17'),
(67,	9,	2,	15,	1,	15000,	'2023-09-06 11:42:23',	'2023-09-06 04:42:23'),
(68,	9,	1,	5,	1,	38400,	'2023-09-07 08:01:43',	'2023-09-07 01:01:43'),
(69,	9,	2,	5,	1,	38760,	'2023-09-07 09:25:39',	'2023-09-07 02:25:39');

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `no_invoice` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_acuan` int(11) DEFAULT NULL,
  `selisih_harga` int(11) DEFAULT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `purchases` (`id`, `bahan_dasar_id`, `no_invoice`, `warehouse_id`, `qty`, `harga_satuan`, `harga_acuan`, `selisih_harga`, `jumlah_harga`, `vendor_id`, `created_at`, `updated_at`) VALUES
(3,	1,	NULL,	4,	10,	13000,	NULL,	NULL,	130000,	4,	'2023-08-21 23:00:33',	'2023-08-24 03:38:42'),
(4,	1,	NULL,	1,	2,	13000,	NULL,	NULL,	26000,	1,	'2023-08-22 21:31:19',	'2023-08-22 21:31:19'),
(11,	45,	NULL,	9,	700,	40,	NULL,	NULL,	40000,	6,	'2023-08-28 00:28:53',	'2023-08-28 21:15:49'),
(12,	3,	NULL,	9,	378,	50,	NULL,	NULL,	50000,	6,	'2023-08-28 00:29:29',	'2023-08-29 04:40:25'),
(13,	31,	NULL,	9,	946,	20,	NULL,	NULL,	20000,	6,	'2023-08-28 00:30:02',	'2023-08-28 21:15:49'),
(14,	32,	NULL,	9,	906,	25,	NULL,	NULL,	25000,	6,	'2023-08-28 00:30:27',	'2023-08-28 21:15:49'),
(15,	33,	NULL,	9,	492,	15,	NULL,	NULL,	7500,	6,	'2023-08-28 00:30:58',	'2023-08-28 21:15:49'),
(16,	34,	NULL,	9,	496,	15,	NULL,	NULL,	7500,	6,	'2023-08-28 00:31:25',	'2023-08-28 21:15:49'),
(17,	35,	NULL,	9,	440,	25,	NULL,	NULL,	12500,	6,	'2023-08-28 00:31:50',	'2023-08-28 21:15:49'),
(18,	36,	NULL,	9,	496,	134,	NULL,	NULL,	67000,	6,	'2023-08-28 00:32:13',	'2023-08-28 21:15:49'),
(19,	37,	NULL,	9,	350,	53,	NULL,	NULL,	26500,	6,	'2023-08-28 00:32:46',	'2023-08-28 21:15:49'),
(20,	38,	NULL,	9,	492,	20,	NULL,	NULL,	10000,	6,	'2023-08-28 00:33:16',	'2023-08-28 21:15:49'),
(21,	39,	NULL,	9,	498,	62,	NULL,	NULL,	31000,	6,	'2023-08-28 00:33:39',	'2023-08-28 21:15:49'),
(22,	40,	NULL,	9,	498,	56,	NULL,	NULL,	28000,	6,	'2023-08-28 00:34:00',	'2023-08-28 21:15:49'),
(23,	41,	NULL,	9,	496,	40,	NULL,	NULL,	20000,	6,	'2023-08-28 00:34:22',	'2023-08-28 21:15:49'),
(24,	42,	NULL,	9,	496,	40,	NULL,	NULL,	20000,	6,	'2023-08-28 00:34:49',	'2023-08-28 21:15:49'),
(25,	46,	NULL,	9,	450,	20,	NULL,	NULL,	10000,	6,	'2023-08-28 00:35:18',	'2023-08-28 21:15:49'),
(26,	44,	NULL,	9,	496,	55,	NULL,	NULL,	27500,	6,	'2023-08-28 00:35:42',	'2023-08-28 21:15:49'),
(28,	10,	NULL,	9,	466,	14,	NULL,	NULL,	7000,	6,	'2023-08-28 00:36:30',	'2023-08-29 04:40:25'),
(29,	2,	NULL,	9,	3,	100000,	NULL,	NULL,	500000,	6,	'2023-08-28 00:36:54',	'2023-08-28 21:15:49'),
(30,	49,	NULL,	9,	640,	200,	NULL,	NULL,	80000,	6,	'2023-08-28 21:11:37',	'2023-08-30 19:41:42'),
(34,	22,	NULL,	9,	1,	120000,	NULL,	NULL,	240000,	6,	'2023-08-29 06:27:45',	'2023-08-29 06:29:10'),
(35,	3,	NULL,	9,	200,	50,	NULL,	NULL,	10000,	6,	'2023-08-29 20:48:58',	'2023-08-29 20:48:58'),
(36,	3,	NULL,	9,	20,	50,	NULL,	NULL,	1000,	6,	'2023-08-29 21:11:25',	'2023-08-29 21:11:25'),
(38,	5,	'aju23',	9,	3,	50000,	NULL,	NULL,	150000,	6,	'2023-08-29 21:22:50',	'2023-08-29 21:22:50'),
(39,	49,	'dsfig2323',	9,	1000,	45,	NULL,	NULL,	45000,	6,	'2023-08-29 23:24:09',	'2023-08-29 23:24:09'),
(40,	2,	'2000',	4,	20,	10000,	NULL,	NULL,	200000,	6,	'2023-08-30 00:57:20',	'2023-08-30 00:57:20'),
(43,	9,	'sgsf3',	9,	20,	1000,	NULL,	NULL,	20000,	6,	'2023-08-30 01:28:02',	'2023-08-30 01:28:02'),
(44,	9,	'dfg36',	9,	20,	1500,	NULL,	NULL,	30000,	6,	'2023-08-30 01:28:56',	'2023-08-30 01:28:56'),
(45,	9,	'dfw4',	9,	200,	1000,	NULL,	NULL,	200000,	6,	'2023-08-30 01:29:31',	'2023-08-30 01:29:31'),
(46,	23,	'asf',	9,	20,	900,	NULL,	NULL,	18000,	6,	'2023-08-30 02:58:15',	'2023-08-30 02:58:15'),
(48,	17,	'dfefe',	9,	20,	10000,	NULL,	NULL,	200000,	6,	'2023-08-31 02:13:12',	'2023-08-31 02:13:12'),
(49,	17,	'sdf43f4',	9,	30,	2000,	NULL,	NULL,	60000,	6,	'2023-08-31 02:48:14',	'2023-08-31 02:48:14'),
(50,	9,	'gf65e6rc',	9,	200,	1000,	NULL,	NULL,	200000,	6,	'2023-08-31 03:09:13',	'2023-08-31 03:09:13'),
(51,	10,	'dsfig2323y54w',	9,	250,	240,	NULL,	NULL,	60000,	6,	'2023-08-31 03:10:18',	'2023-08-31 03:10:18'),
(52,	1,	'r4few4',	9,	200,	1000,	NULL,	NULL,	200000,	6,	'2023-08-31 03:17:28',	'2023-08-31 03:17:28'),
(54,	61,	'af2e3f',	9,	1000,	10,	NULL,	NULL,	10000,	6,	'2023-08-31 20:03:32',	'2023-08-31 20:03:32'),
(55,	49,	'af23f344',	9,	1000,	45,	NULL,	NULL,	45000,	6,	'2023-08-31 21:21:32',	'2023-08-31 21:21:32'),
(56,	17,	'dsf4fe34f',	9,	50,	5000,	NULL,	NULL,	250000,	6,	'2023-09-03 20:55:06',	'2023-09-03 20:55:06'),
(57,	25,	'advfw4fg4e',	9,	10,	13000,	NULL,	NULL,	130000,	6,	'2023-09-03 20:57:06',	'2023-09-03 20:57:06'),
(58,	21,	'dsfig2323',	9,	10,	5000,	NULL,	NULL,	50000,	6,	'2023-09-03 21:00:04',	'2023-09-03 21:00:04'),
(59,	65,	'dsfd3r',	9,	1000,	30,	NULL,	NULL,	30000,	6,	'2023-09-03 21:02:19',	'2023-09-03 21:02:19'),
(60,	67,	'sdfewf23',	9,	300,	15,	NULL,	NULL,	4500,	6,	'2023-09-03 21:33:36',	'2023-09-03 21:33:36'),
(61,	68,	'afdsdg2',	9,	1000,	15,	NULL,	NULL,	15000,	6,	'2023-09-03 21:39:04',	'2023-09-03 21:39:04'),
(62,	68,	'sdfsdfw2',	9,	10000,	15,	NULL,	NULL,	150000,	6,	'2023-09-03 21:46:09',	'2023-09-03 21:46:09'),
(63,	70,	'sggbte5',	9,	10000,	60,	NULL,	NULL,	600000,	6,	'2023-09-03 23:13:44',	'2023-09-03 23:13:44'),
(64,	71,	'srge5',	9,	10000,	25,	NULL,	NULL,	250000,	6,	'2023-09-03 23:14:49',	'2023-09-03 23:14:49'),
(65,	72,	'sfdf3',	9,	10000,	25,	NULL,	NULL,	250000,	6,	'2023-09-03 23:16:34',	'2023-09-03 23:16:34'),
(66,	31,	'sfdfv5',	9,	10000,	10,	NULL,	NULL,	100000,	6,	'2023-09-03 23:17:45',	'2023-09-03 23:17:45'),
(67,	32,	'dassfsd4',	9,	10000,	10,	NULL,	NULL,	100000,	6,	'2023-09-03 23:18:33',	'2023-09-03 23:18:33'),
(68,	25,	'sdf43',	9,	10,	13000,	NULL,	NULL,	130000,	6,	'2023-09-03 23:19:58',	'2023-09-03 23:19:58'),
(69,	44,	'adfer5',	9,	1000,	5,	NULL,	NULL,	5000,	6,	'2023-09-03 23:26:42',	'2023-09-03 23:26:42'),
(70,	2,	'asdsw',	9,	1,	120000,	NULL,	-20000,	120000,	6,	'2023-09-05 20:50:11',	'2023-09-05 20:50:11'),
(71,	76,	'dsfwfw4',	9,	100,	15000,	NULL,	0,	1500000,	6,	'2023-09-06 04:41:31',	'2023-09-06 04:41:31'),
(73,	2,	'QCTvCrZWFeJX3oTqw7WA',	4,	10,	10,	100000,	99990,	100,	6,	'2023-09-07 00:09:30',	'2023-09-07 00:09:30'),
(74,	2,	'4GMcxoyUxp5Ac1Tz41Ae',	4,	2,	100000,	100000,	0,	200000,	6,	'2023-09-07 00:12:13',	'2023-09-07 00:12:13'),
(75,	2,	'pnmJNmx1CiSWcvuuBYu7',	4,	10,	120000,	100000,	-20000,	1200000,	6,	'2023-09-07 00:13:08',	'2023-09-07 00:13:08'),
(76,	5,	'pnmJNmx1CiSWcvuuBYu7',	4,	10,	20000,	50000,	30000,	200000,	6,	'2023-09-07 00:13:08',	'2023-09-07 00:13:08'),
(77,	3,	'8pjSNbbzUdQwHXqYyrKQ',	9,	100,	60,	50,	-10,	6000,	6,	'2023-09-07 00:56:11',	'2023-09-07 00:56:11'),
(78,	10,	'8pjSNbbzUdQwHXqYyrKQ',	9,	100,	15,	14,	-1,	1500,	6,	'2023-09-07 00:56:11',	'2023-09-07 00:56:11'),
(79,	9,	'8pjSNbbzUdQwHXqYyrKQ',	9,	100,	20,	23,	3,	2000,	6,	'2023-09-07 00:56:11',	'2023-09-07 00:56:11'),
(80,	80,	'4YvSCBbelaGTtN52n8hf',	9,	100,	20,	25,	5,	2000,	6,	'2023-09-07 02:21:39',	'2023-09-07 02:21:39'),
(81,	79,	'4YvSCBbelaGTtN52n8hf',	9,	100,	6,	6,	0,	600,	6,	'2023-09-07 02:21:39',	'2023-09-07 02:21:39'),
(82,	81,	'4YvSCBbelaGTtN52n8hf',	9,	100,	10,	10,	0,	1000,	6,	'2023-09-07 02:21:39',	'2023-09-07 02:21:39'),
(83,	2,	'sQikqSd2gVFYDOj27C3V',	9,	2,	150000,	100000,	-50000,	300000,	6,	'2023-09-07 05:06:51',	'2023-09-07 05:06:51'),
(84,	8,	'sQikqSd2gVFYDOj27C3V',	9,	1,	1000,	700,	-300,	1000,	6,	'2023-09-07 05:06:51',	'2023-09-07 05:06:51');

DROP TABLE IF EXISTS `raw`;
CREATE TABLE `raw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahan` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `raw_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_money` int(20) DEFAULT NULL,
  `change_cashier` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `receipts` (`id`, `receipt_no`, `product_id`, `price`, `qty`, `total_price`, `customer_name`, `email_customer`, `no_wa`, `payment_method`, `customer_money`, `change_cashier`, `created_at`, `updated_at`) VALUES
(61,	'xmqfuNTClU',	20,	5500,	1,	5500,	'yudi',	'yudi@gmail.com',	'0892342983',	'tunai',	1000000,	194500,	'2023-08-16 02:59:48',	'2023-08-16 02:59:48'),
(62,	'xmqfuNTClU',	18,	800000,	1,	800000,	'yudi',	'yudi@gmail.com',	'0892342983',	'tunai',	1000000,	194500,	'2023-08-16 02:59:48',	'2023-08-16 02:59:48'),
(63,	'1iDOfNTXpV',	18,	800000,	1,	800000,	'yudi',	'yudi@gmail.com',	'0892342983',	'tunai',	1000000,	180000,	'2023-08-16 03:42:44',	'2023-08-16 03:42:44'),
(64,	'1iDOfNTXpV',	16,	20000,	1,	20000,	'yudi',	'yudi@gmail.com',	'0892342983',	'tunai',	1000000,	180000,	'2023-08-16 03:42:44',	'2023-08-16 03:42:44');

DROP TABLE IF EXISTS `record_bahan`;
CREATE TABLE `record_bahan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_produksi_id` int(11) NOT NULL,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `menu_masakan_id` int(11) NOT NULL,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `qty_masakan` int(11) NOT NULL,
  `qty_bahan` int(11) NOT NULL,
  `price_per_bahan` int(11) NOT NULL,
  `jumlah_cost_per_bahan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `record_bahan_ibfk_1` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`),
  CONSTRAINT `record_bahan_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `record_bahan` (`id`, `kategori_produksi_id`, `warehouse_id`, `menu_masakan_id`, `bahan_dasar_id`, `qty_masakan`, `qty_bahan`, `price_per_bahan`, `jumlah_cost_per_bahan`, `created_at`, `updated_at`) VALUES
(25,	1,	9,	1,	45,	1,	100,	40,	4000,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(26,	1,	9,	1,	3,	1,	200,	50,	10000,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(27,	1,	9,	1,	31,	1,	27,	20,	540,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(28,	1,	9,	1,	32,	1,	47,	25,	1175,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(29,	1,	9,	1,	33,	1,	4,	15,	60,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(30,	1,	9,	1,	34,	1,	2,	15,	30,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(31,	1,	9,	1,	35,	1,	30,	25,	750,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(32,	1,	9,	1,	36,	1,	2,	134,	268,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(33,	1,	9,	1,	37,	1,	75,	53,	3975,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(34,	1,	9,	1,	38,	1,	4,	20,	80,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(35,	1,	9,	1,	39,	1,	1,	62,	62,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(36,	1,	9,	1,	40,	1,	1,	56,	56,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(37,	1,	9,	1,	41,	1,	2,	40,	80,	'2023-08-28 00:43:17',	'2023-08-28 00:43:17'),
(38,	1,	9,	1,	42,	1,	2,	40,	80,	'2023-08-28 00:43:18',	'2023-08-28 00:43:18'),
(39,	1,	9,	1,	46,	1,	25,	20,	500,	'2023-08-28 00:43:18',	'2023-08-28 00:43:18'),
(40,	1,	9,	1,	44,	1,	2,	55,	110,	'2023-08-28 00:43:18',	'2023-08-28 00:43:18'),
(41,	1,	9,	1,	9,	1,	15,	23,	345,	'2023-08-28 00:43:18',	'2023-08-28 00:43:18'),
(42,	1,	9,	1,	10,	1,	3,	14,	35,	'2023-08-28 00:43:18',	'2023-08-28 00:43:18'),
(43,	1,	9,	1,	2,	1,	1,	100000,	100000,	'2023-08-28 00:43:18',	'2023-08-28 00:43:18'),
(44,	1,	9,	1,	45,	1,	100,	40,	4000,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(45,	1,	9,	1,	3,	1,	200,	50,	10000,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(46,	1,	9,	1,	31,	1,	27,	20,	540,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(47,	1,	9,	1,	32,	1,	47,	25,	1175,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(48,	1,	9,	1,	33,	1,	4,	15,	60,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(49,	1,	9,	1,	34,	1,	2,	15,	30,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(50,	1,	9,	1,	35,	1,	30,	25,	750,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(51,	1,	9,	1,	36,	1,	2,	134,	268,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(52,	1,	9,	1,	37,	1,	75,	53,	3975,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(53,	1,	9,	1,	38,	1,	4,	20,	80,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(54,	1,	9,	1,	39,	1,	1,	62,	62,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(55,	1,	9,	1,	40,	1,	1,	56,	56,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(56,	1,	9,	1,	41,	1,	2,	40,	80,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(57,	1,	9,	1,	42,	1,	2,	40,	80,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(58,	1,	9,	1,	46,	1,	25,	20,	500,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(59,	1,	9,	1,	44,	1,	2,	55,	110,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(60,	1,	9,	1,	9,	1,	15,	23,	345,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(61,	1,	9,	1,	10,	1,	3,	14,	35,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(62,	1,	9,	1,	2,	1,	1,	100000,	100000,	'2023-08-28 20:48:56',	'2023-08-28 20:48:56'),
(63,	1,	9,	4,	3,	1,	2,	60000,	120000,	'2023-08-28 21:12:04',	'2023-08-28 21:12:04'),
(64,	1,	9,	4,	49,	1,	10,	200,	2000,	'2023-08-28 21:12:04',	'2023-08-28 21:12:04'),
(65,	1,	9,	1,	45,	1,	100,	40,	4000,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(66,	1,	9,	1,	3,	1,	200,	50,	10000,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(67,	1,	9,	1,	31,	1,	27,	20,	540,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(68,	1,	9,	1,	32,	1,	47,	25,	1175,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(69,	1,	9,	1,	33,	1,	4,	15,	60,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(70,	1,	9,	1,	34,	1,	2,	15,	30,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(71,	1,	9,	1,	35,	1,	30,	25,	750,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(72,	1,	9,	1,	36,	1,	2,	134,	268,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(73,	1,	9,	1,	37,	1,	75,	53,	3975,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(74,	1,	9,	1,	38,	1,	4,	20,	80,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(75,	1,	9,	1,	39,	1,	1,	62,	62,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(76,	1,	9,	1,	40,	1,	1,	56,	56,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(77,	1,	9,	1,	41,	1,	2,	40,	80,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(78,	1,	9,	1,	42,	1,	2,	40,	80,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(79,	1,	9,	1,	46,	1,	25,	20,	500,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(80,	1,	9,	1,	44,	1,	2,	55,	110,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(81,	1,	9,	1,	9,	1,	15,	23,	345,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(82,	1,	9,	1,	10,	1,	3,	14,	35,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(83,	1,	9,	1,	2,	1,	1,	100000,	100000,	'2023-08-28 21:15:49',	'2023-08-28 21:15:49'),
(84,	2,	9,	5,	3,	1,	20,	50,	1000,	'2023-08-29 04:40:25',	'2023-08-29 04:40:25'),
(85,	2,	9,	5,	10,	1,	30,	14,	420,	'2023-08-29 04:40:25',	'2023-08-29 04:40:25'),
(86,	2,	9,	5,	9,	1,	20,	23,	460,	'2023-08-29 04:40:25',	'2023-08-29 04:40:25'),
(87,	2,	9,	4,	3,	1,	2,	50,	100,	'2023-08-29 23:45:02',	'2023-08-29 23:45:02'),
(88,	2,	9,	4,	49,	1,	10,	45,	450,	'2023-08-29 23:45:02',	'2023-08-29 23:45:02'),
(89,	2,	9,	4,	3,	1,	2,	50,	100,	'2023-08-29 23:46:36',	'2023-08-29 23:46:36'),
(90,	2,	9,	4,	49,	1,	10,	45,	450,	'2023-08-29 23:46:36',	'2023-08-29 23:46:36'),
(91,	2,	9,	4,	3,	1,	2,	50,	100,	'2023-08-29 23:47:15',	'2023-08-29 23:47:15'),
(92,	2,	9,	4,	49,	1,	10,	45,	450,	'2023-08-29 23:47:15',	'2023-08-29 23:47:15'),
(93,	2,	9,	4,	3,	1,	2,	50,	100,	'2023-08-30 00:00:27',	'2023-08-30 00:00:27'),
(94,	2,	9,	4,	49,	1,	10,	45,	450,	'2023-08-30 00:00:27',	'2023-08-30 00:00:27'),
(95,	2,	9,	4,	3,	12,	24,	50,	1200,	'2023-08-30 00:05:10',	'2023-08-30 00:05:10'),
(96,	2,	9,	4,	49,	12,	120,	45,	5400,	'2023-08-30 00:05:10',	'2023-08-30 00:05:10'),
(97,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:14:12',	'2023-08-31 02:14:12'),
(98,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:14:12',	'2023-08-31 02:14:12'),
(99,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:31:08',	'2023-08-31 02:31:08'),
(100,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:31:09',	'2023-08-31 02:31:09'),
(101,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:40:07',	'2023-08-31 02:40:07'),
(102,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:40:07',	'2023-08-31 02:40:07'),
(103,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:41:06',	'2023-08-31 02:41:06'),
(104,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:41:06',	'2023-08-31 02:41:06'),
(105,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:45:29',	'2023-08-31 02:45:29'),
(106,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:45:29',	'2023-08-31 02:45:29'),
(107,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:46:41',	'2023-08-31 02:46:41'),
(108,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:46:41',	'2023-08-31 02:46:41'),
(109,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:48:40',	'2023-08-31 02:48:40'),
(110,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:48:40',	'2023-08-31 02:48:40'),
(111,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 02:49:38',	'2023-08-31 02:49:38'),
(112,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 02:49:38',	'2023-08-31 02:49:38'),
(113,	2,	9,	5,	3,	1,	20,	50,	1000,	'2023-08-31 03:10:31',	'2023-08-31 03:10:31'),
(114,	2,	9,	5,	10,	1,	30,	14,	420,	'2023-08-31 03:10:31',	'2023-08-31 03:10:31'),
(115,	2,	9,	5,	9,	1,	20,	23,	460,	'2023-08-31 03:10:31',	'2023-08-31 03:10:31'),
(116,	2,	9,	5,	3,	1,	20,	50,	1000,	'2023-08-31 03:12:09',	'2023-08-31 03:12:09'),
(117,	2,	9,	5,	10,	1,	30,	14,	420,	'2023-08-31 03:12:09',	'2023-08-31 03:12:09'),
(118,	2,	9,	5,	9,	1,	20,	23,	460,	'2023-08-31 03:12:09',	'2023-08-31 03:12:09'),
(119,	2,	9,	8,	1,	1,	1,	13000,	13000,	'2023-08-31 03:18:05',	'2023-08-31 03:18:05'),
(120,	2,	9,	8,	1,	1,	1,	13000,	13000,	'2023-08-31 05:19:03',	'2023-08-31 05:19:03'),
(121,	1,	9,	8,	1,	1,	1,	13000,	13000,	'2023-08-31 05:19:36',	'2023-08-31 05:19:36'),
(122,	1,	9,	8,	1,	1,	1,	13000,	13000,	'2023-08-31 05:20:40',	'2023-08-31 05:20:40'),
(123,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 19:50:42',	'2023-08-31 19:50:42'),
(124,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 19:50:42',	'2023-08-31 19:50:42'),
(125,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 19:51:25',	'2023-08-31 19:51:25'),
(126,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 19:51:25',	'2023-08-31 19:51:25'),
(127,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 20:15:15',	'2023-08-31 20:15:15'),
(128,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 20:15:15',	'2023-08-31 20:15:15'),
(129,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 20:21:57',	'2023-08-31 20:21:57'),
(130,	1,	9,	7,	17,	1,	3,	4500,	13500,	'2023-08-31 20:21:57',	'2023-08-31 20:21:57'),
(131,	2,	9,	9,	63,	1,	2,	3000,	6000,	'2023-08-31 20:43:17',	'2023-08-31 20:43:17'),
(132,	2,	9,	9,	62,	1,	2,	3000,	6000,	'2023-08-31 20:43:17',	'2023-08-31 20:43:17'),
(133,	2,	9,	9,	63,	1,	2,	3000,	6000,	'2023-08-31 20:49:28',	'2023-08-31 20:49:28'),
(134,	2,	9,	9,	62,	1,	2,	3000,	6000,	'2023-08-31 20:49:28',	'2023-08-31 20:49:28'),
(135,	1,	9,	7,	49,	1,	2400,	2000,	4800000,	'2023-08-31 20:53:28',	'2023-08-31 20:53:28'),
(136,	1,	9,	7,	49,	1,	2400,	499,	1197600,	'2023-08-31 20:53:28',	'2023-08-31 20:53:28'),
(137,	1,	9,	7,	17,	1,	3,	10000,	30000,	'2023-08-31 20:53:28',	'2023-08-31 20:53:28'),
(138,	2,	9,	9,	63,	1,	2,	3000,	6000,	'2023-08-31 21:04:50',	'2023-08-31 21:04:50'),
(139,	2,	9,	9,	62,	1,	2,	3000,	6000,	'2023-08-31 21:04:50',	'2023-08-31 21:04:50'),
(140,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 21:23:59',	'2023-08-31 21:23:59'),
(141,	1,	9,	7,	49,	1,	2400,	499,	1197600,	'2023-08-31 21:23:59',	'2023-08-31 21:23:59'),
(142,	1,	9,	7,	17,	1,	3,	5000,	15000,	'2023-08-31 21:23:59',	'2023-08-31 21:23:59'),
(143,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 21:42:57',	'2023-08-31 21:42:57'),
(144,	1,	9,	7,	49,	1,	2400,	499,	1197600,	'2023-08-31 21:42:57',	'2023-08-31 21:42:57'),
(145,	1,	9,	7,	17,	1,	3,	5000,	15000,	'2023-08-31 21:42:57',	'2023-08-31 21:42:57'),
(146,	3,	9,	7,	49,	1,	2400,	45,	108000,	'2023-08-31 23:44:02',	'2023-08-31 23:44:02'),
(147,	3,	9,	7,	49,	1,	2400,	499,	1197600,	'2023-08-31 23:44:02',	'2023-08-31 23:44:02'),
(148,	3,	9,	7,	17,	1,	3,	5000,	15000,	'2023-08-31 23:44:02',	'2023-08-31 23:44:02'),
(149,	3,	9,	9,	63,	1,	2,	10250,	20500,	'2023-09-01 00:24:01',	'2023-09-01 00:24:01'),
(150,	3,	9,	9,	62,	1,	2,	10250,	20500,	'2023-09-01 00:24:01',	'2023-09-01 00:24:01'),
(151,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-09-03 21:04:22',	'2023-09-03 21:04:22'),
(152,	1,	9,	7,	49,	1,	2400,	499,	1197600,	'2023-09-03 21:04:22',	'2023-09-03 21:04:22'),
(153,	1,	9,	7,	17,	1,	3,	5000,	15000,	'2023-09-03 21:04:22',	'2023-09-03 21:04:22'),
(154,	1,	9,	7,	49,	1,	2400,	45,	108000,	'2023-09-03 21:06:32',	'2023-09-03 21:06:32'),
(155,	1,	9,	7,	49,	1,	2400,	499,	1197600,	'2023-09-03 21:06:32',	'2023-09-03 21:06:32'),
(156,	1,	9,	7,	17,	1,	3,	5000,	15000,	'2023-09-03 21:06:32',	'2023-09-03 21:06:32'),
(157,	1,	9,	7,	61,	1,	300,	10,	3000,	'2023-09-03 21:06:32',	'2023-09-03 21:06:32'),
(158,	2,	9,	9,	63,	1,	2,	10500,	21000,	'2023-09-03 21:09:10',	'2023-09-03 21:09:10'),
(159,	2,	9,	9,	62,	1,	2,	10500,	21000,	'2023-09-03 21:09:10',	'2023-09-03 21:09:10'),
(160,	2,	9,	9,	25,	1,	1,	13000,	13000,	'2023-09-03 21:09:10',	'2023-09-03 21:09:10'),
(161,	1,	9,	8,	1,	1,	1,	1000,	1000,	'2023-09-03 21:22:57',	'2023-09-03 21:22:57'),
(162,	1,	9,	10,	67,	1,	145,	15,	2175,	'2023-09-03 21:35:15',	'2023-09-03 21:35:15'),
(163,	1,	9,	11,	68,	1,	500,	15,	7500,	'2023-09-03 21:40:08',	'2023-09-03 21:40:08'),
(164,	2,	9,	11,	68,	1,	500,	1500,	750000,	'2023-09-03 21:44:31',	'2023-09-03 21:44:31'),
(165,	1,	9,	11,	68,	1,	500,	15,	7500,	'2023-09-03 21:47:42',	'2023-09-03 21:47:42'),
(166,	1,	9,	12,	70,	1,	1500,	60,	90000,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(167,	1,	9,	12,	71,	1,	1000,	25,	25000,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(168,	1,	9,	12,	72,	1,	1000,	25,	25000,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(169,	1,	9,	12,	31,	1,	500,	10,	5000,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(170,	1,	9,	12,	32,	1,	200,	10,	2000,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(171,	1,	9,	12,	25,	1,	750,	13,	9750,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(172,	1,	9,	12,	44,	1,	450,	5,	2250,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(173,	1,	9,	12,	9,	1,	13,	1500,	18750,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(174,	1,	9,	12,	10,	1,	5,	240,	1200,	'2023-09-03 23:37:10',	'2023-09-03 23:37:10'),
(175,	2,	9,	9,	63,	1,	2,	10500,	21000,	'2023-09-04 05:54:17',	'2023-09-04 05:54:17'),
(176,	2,	9,	9,	62,	1,	2,	10500,	21000,	'2023-09-04 05:54:17',	'2023-09-04 05:54:17'),
(177,	2,	9,	9,	25,	1,	1000,	13,	13000,	'2023-09-04 05:54:17',	'2023-09-04 05:54:17'),
(178,	2,	9,	15,	76,	1,	1,	15000,	15000,	'2023-09-06 04:42:23',	'2023-09-06 04:42:23'),
(179,	1,	9,	5,	3,	1,	20,	60,	1200,	'2023-09-07 01:01:43',	'2023-09-07 01:01:43'),
(180,	1,	9,	5,	10,	1,	30,	240,	7200,	'2023-09-07 01:01:43',	'2023-09-07 01:01:43'),
(181,	1,	9,	5,	9,	1,	20,	1500,	30000,	'2023-09-07 01:01:43',	'2023-09-07 01:01:43'),
(182,	2,	9,	5,	3,	1,	20,	60,	1200,	'2023-09-07 02:25:39',	'2023-09-07 02:25:39'),
(183,	2,	9,	5,	10,	1,	30,	240,	7200,	'2023-09-07 02:25:39',	'2023-09-07 02:25:39'),
(184,	2,	9,	5,	9,	1,	20,	1500,	30000,	'2023-09-07 02:25:39',	'2023-09-07 02:25:39'),
(185,	2,	9,	5,	80,	1,	10,	20,	200,	'2023-09-07 02:25:39',	'2023-09-07 02:25:39'),
(186,	2,	9,	5,	79,	1,	10,	6,	60,	'2023-09-07 02:25:39',	'2023-09-07 02:25:39'),
(187,	2,	9,	5,	81,	1,	10,	10,	100,	'2023-09-07 02:25:39',	'2023-09-07 02:25:39');

DROP TABLE IF EXISTS `record_transfer_bahan`;
CREATE TABLE `record_transfer_bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `outlet_id` bigint(20) unsigned NOT NULL,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `outlet_id` (`outlet_id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  CONSTRAINT `record_transfer_bahan_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  CONSTRAINT `record_transfer_bahan_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`),
  CONSTRAINT `record_transfer_bahan_ibfk_3` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `record_transfer_bahan` (`id`, `warehouse_id`, `outlet_id`, `bahan_dasar_id`, `qty`, `date`) VALUES
(1,	9,	11,	3,	6,	NULL),
(2,	4,	12,	2,	20,	NULL),
(3,	4,	12,	2,	20,	NULL),
(4,	4,	12,	2,	50,	NULL),
(5,	4,	12,	2,	50,	NULL),
(6,	4,	12,	2,	50,	'2023-09-06 10:34:33');

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_customer` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cart_price` int(110) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sales` (`id`, `receipt_no`, `customer_name`, `no_wa`, `email_customer`, `total_cart_price`, `created_at`, `updated_at`) VALUES
(1,	'D9qHFQHT2T',	'yudi',	NULL,	NULL,	78000,	'2023-08-13 21:35:38',	'2023-08-13 21:35:38'),
(2,	'lX88LEJiCK',	'yudi',	NULL,	NULL,	75500,	'2023-08-14 05:02:19',	'2023-08-14 05:02:19'),
(3,	'lRKuNEkjgi',	'yudi',	NULL,	NULL,	75500,	'2023-08-14 05:06:49',	'2023-08-14 05:06:49'),
(4,	'CJQMX5BaTO',	'yudi',	NULL,	NULL,	5500,	'2023-08-14 19:54:56',	'2023-08-14 19:54:56'),
(5,	'DbbQ9JYQzu',	'yudi',	'03424253',	'yudi@gmail.com',	5500,	'2023-08-14 19:57:34',	'2023-08-14 19:57:34'),
(6,	'ZXDPRoKaPc',	'yudi',	'0892342983',	'yudi@gmail.com',	25500,	'2023-08-14 20:09:49',	'2023-08-14 20:09:49'),
(7,	'mnWezwgFvw',	'yudi',	'0892342983',	'yudi@gmail.com',	5500,	'2023-08-15 21:38:04',	'2023-08-15 21:38:04'),
(8,	'XFQZQ1PnVE',	'yudi',	'0892342983',	'yudi@gmail.com',	805500,	'2023-08-15 21:40:23',	'2023-08-15 21:40:23'),
(9,	'sPoo73JQiu',	'yudi',	'0892342983',	'yudi@gmail.com',	805500,	'2023-08-15 21:40:36',	'2023-08-15 21:40:36'),
(10,	'kcis81nzEp',	'yudi',	'0892342983',	'yudi@gmail.com',	825500,	'2023-08-16 02:03:54',	'2023-08-16 02:03:54'),
(11,	'03KBn5jjFC',	'yudi',	'0892342983',	'yudi@gmail.com',	5500,	'2023-08-16 02:49:12',	'2023-08-16 02:49:12'),
(12,	'xmqfuNTClU',	'yudi',	'0892342983',	'yudi@gmail.com',	805500,	'2023-08-16 02:59:48',	'2023-08-16 02:59:48'),
(13,	'1iDOfNTXpV',	'yudi',	'0892342983',	'yudi@gmail.com',	820000,	'2023-08-16 03:42:44',	'2023-08-16 03:42:44');

DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `satuan` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1,	'gram',	NULL,	NULL),
(2,	'ons',	NULL,	NULL),
(3,	'kg',	NULL,	NULL),
(4,	'liter',	NULL,	NULL),
(5,	'ekor',	NULL,	NULL),
(6,	'pcs',	NULL,	NULL),
(7,	'sachet',	NULL,	NULL),
(8,	'botol',	NULL,	NULL),
(9,	'ml',	NULL,	NULL),
(10,	'pack',	NULL,	NULL),
(11,	'dus',	NULL,	NULL),
(12,	'potong',	NULL,	NULL),
(13,	'porsi',	NULL,	NULL),
(14,	'bungkus',	NULL,	NULL),
(15,	'tabung 12 kg',	NULL,	NULL),
(16,	'tabung 5,5 kg',	NULL,	NULL),
(17,	'tabung 3 kg',	NULL,	NULL),
(18,	'butir',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `vendors` (`id`, `name_vendor`, `telp`, `address_vendor`, `contact_person`, `created_at`, `updated_at`) VALUES
(6,	'toko sembako abc',	'089834923',	'jl impress',	'hj malik',	'2023-08-25 05:13:09',	'2023-08-25 05:13:09');

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_warehouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `warehouses` (`id`, `name_warehouse`, `address`, `pic`, `contact`, `created_at`, `updated_at`) VALUES
(1,	'pondok beling',	'pondok beling 12',	'maria ozawa',	'089032047',	'2023-02-26 23:00:33',	'2023-08-10 20:03:56'),
(4,	'tebet',	'tebet bumd 89',	'rudi tabudi',	'0893452748',	'2023-08-18 03:21:20',	'2023-08-18 03:21:20'),
(9,	'pondok bambu',	'jl pondok bambu no3',	'hj naldy',	'0809131239999',	'2023-08-25 05:14:09',	'2023-08-28 05:17:41');

DROP TABLE IF EXISTS `warehouse_record`;
CREATE TABLE `warehouse_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `bahan_dasar_id` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `warehouse_record` (`id`, `warehouse_id`, `stock`, `bahan_dasar_id`, `harga_satuan`, `created_at`, `updated_at`) VALUES
(2,	9,	200,	9,	8000,	'2023-08-30 01:19:20',	'2023-08-30 01:19:20'),
(3,	9,	20,	9,	1000,	'2023-08-30 01:28:02',	'2023-08-30 01:28:02'),
(4,	9,	20,	9,	1500,	'2023-08-30 01:28:56',	'2023-08-30 01:28:56'),
(5,	9,	200,	9,	1000,	'2023-08-30 01:29:31',	'2023-08-30 01:29:31'),
(6,	9,	20,	23,	900,	'2023-08-30 02:58:15',	'2023-08-30 02:58:15'),
(7,	9,	20000,	49,	1000,	'2023-08-31 00:45:32',	'2023-08-31 00:45:32'),
(8,	9,	20,	17,	10000,	'2023-08-31 02:13:12',	'2023-08-31 02:13:12'),
(9,	9,	30,	17,	2000,	'2023-08-31 02:48:14',	'2023-08-31 02:48:14'),
(10,	9,	200,	9,	1000,	'2023-08-31 03:09:13',	'2023-08-31 03:09:13'),
(11,	9,	250,	10,	240,	'2023-08-31 03:10:18',	'2023-08-31 03:10:18'),
(12,	9,	200,	1,	1000,	'2023-08-31 03:17:28',	'2023-08-31 03:17:28'),
(13,	9,	100000,	49,	2000,	'2023-08-31 19:39:03',	'2023-08-31 19:39:03'),
(14,	9,	1000,	61,	10,	'2023-08-31 20:03:32',	'2023-08-31 20:03:32'),
(15,	9,	1000,	49,	45,	'2023-08-31 21:21:32',	'2023-08-31 21:21:32'),
(16,	9,	50,	17,	5000,	'2023-09-03 20:55:06',	'2023-09-03 20:55:06'),
(17,	9,	10,	25,	13000,	'2023-09-03 20:57:07',	'2023-09-03 20:57:07'),
(18,	9,	10,	21,	5000,	'2023-09-03 21:00:04',	'2023-09-03 21:00:04'),
(19,	9,	1000,	65,	30,	'2023-09-03 21:02:19',	'2023-09-03 21:02:19'),
(20,	9,	300,	67,	15,	'2023-09-03 21:33:36',	'2023-09-03 21:33:36'),
(21,	9,	1000,	68,	15,	'2023-09-03 21:39:04',	'2023-09-03 21:39:04'),
(22,	9,	10000,	68,	15,	'2023-09-03 21:46:09',	'2023-09-03 21:46:09'),
(23,	9,	10000,	70,	60,	'2023-09-03 23:13:44',	'2023-09-03 23:13:44'),
(24,	9,	10000,	71,	25,	'2023-09-03 23:14:49',	'2023-09-03 23:14:49'),
(25,	9,	10000,	72,	25,	'2023-09-03 23:16:34',	'2023-09-03 23:16:34'),
(26,	9,	10000,	31,	10,	'2023-09-03 23:17:45',	'2023-09-03 23:17:45'),
(27,	9,	10000,	32,	10,	'2023-09-03 23:18:33',	'2023-09-03 23:18:33'),
(28,	9,	10,	25,	13000,	'2023-09-03 23:19:58',	'2023-09-03 23:19:58'),
(29,	9,	1000,	44,	5,	'2023-09-03 23:26:42',	'2023-09-03 23:26:42'),
(30,	9,	1,	2,	120000,	'2023-09-05 20:50:11',	'2023-09-05 20:50:11'),
(31,	9,	100,	76,	15000,	'2023-09-06 04:41:31',	'2023-09-06 04:41:31'),
(32,	4,	2,	2,	100000,	'2023-09-07 00:12:13',	'2023-09-07 00:12:13'),
(33,	4,	10,	2,	120000,	'2023-09-07 00:13:08',	'2023-09-07 00:13:08'),
(34,	4,	10,	5,	20000,	'2023-09-07 00:13:08',	'2023-09-07 00:13:08'),
(35,	9,	100,	3,	60,	'2023-09-07 00:56:11',	'2023-09-07 00:56:11'),
(36,	9,	100,	10,	15,	'2023-09-07 00:56:11',	'2023-09-07 00:56:11'),
(37,	9,	100,	9,	20,	'2023-09-07 00:56:11',	'2023-09-07 00:56:11'),
(38,	9,	100,	80,	20,	'2023-09-07 02:21:39',	'2023-09-07 02:21:39'),
(39,	9,	100,	79,	6,	'2023-09-07 02:21:39',	'2023-09-07 02:21:39'),
(40,	9,	100,	81,	10,	'2023-09-07 02:21:39',	'2023-09-07 02:21:39'),
(41,	9,	2,	2,	150000,	'2023-09-07 05:06:51',	'2023-09-07 05:06:51'),
(42,	9,	1,	8,	1000,	'2023-09-07 05:06:51',	'2023-09-07 05:06:51');

DROP TABLE IF EXISTS `warehouse_stock`;
CREATE TABLE `warehouse_stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` bigint(20) unsigned NOT NULL,
  `bahan_dasar_id` bigint(20) unsigned NOT NULL,
  `stock` int(11) NOT NULL,
  `harga_satuan` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `bahan_dasar_id` (`bahan_dasar_id`),
  CONSTRAINT `warehouse_stock_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  CONSTRAINT `warehouse_stock_ibfk_2` FOREIGN KEY (`bahan_dasar_id`) REFERENCES `bahan_dasars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `warehouse_stock` (`id`, `warehouse_id`, `bahan_dasar_id`, `stock`, `harga_satuan`, `created_at`, `updated_at`) VALUES
(1,	9,	3,	60,	60,	NULL,	NULL),
(2,	9,	2,	3852,	150000,	NULL,	NULL),
(3,	9,	5,	0,	55,	NULL,	NULL),
(4,	9,	49,	0,	45,	NULL,	NULL),
(5,	4,	2,	3872,	120000,	NULL,	NULL),
(6,	9,	9,	60,	1500,	NULL,	NULL),
(7,	9,	23,	0,	900,	NULL,	NULL),
(8,	4,	49,	3000,	45,	NULL,	NULL),
(9,	9,	17,	0,	5000,	NULL,	NULL),
(10,	9,	60,	0,	12000,	NULL,	NULL),
(11,	9,	10,	40,	240,	NULL,	NULL),
(12,	9,	1,	0,	1000,	NULL,	NULL),
(13,	9,	61,	0,	10,	NULL,	NULL),
(14,	9,	62,	0,	10500,	NULL,	NULL),
(15,	9,	63,	0,	10500,	NULL,	NULL),
(16,	9,	64,	0,	13750,	NULL,	NULL),
(17,	9,	25,	0,	13,	NULL,	NULL),
(18,	9,	21,	0,	5000,	NULL,	NULL),
(19,	9,	65,	0,	30,	NULL,	NULL),
(20,	9,	66,	0,	125,	NULL,	NULL),
(21,	9,	67,	0,	435,	NULL,	NULL),
(22,	9,	68,	0,	15,	NULL,	NULL),
(23,	9,	69,	0,	1500,	NULL,	NULL),
(24,	9,	70,	0,	60,	NULL,	NULL),
(25,	9,	71,	0,	25,	NULL,	NULL),
(26,	9,	72,	0,	25,	NULL,	NULL),
(27,	9,	31,	0,	10,	NULL,	NULL),
(28,	9,	32,	0,	10,	NULL,	NULL),
(29,	9,	44,	0,	5,	NULL,	NULL),
(30,	9,	73,	0,	3579,	NULL,	NULL),
(31,	9,	76,	99,	15000,	NULL,	NULL),
(32,	9,	77,	4,	3000,	NULL,	NULL),
(33,	4,	5,	10,	20000,	NULL,	NULL),
(34,	9,	78,	2,	19380,	NULL,	NULL),
(35,	9,	80,	90,	20,	NULL,	NULL),
(36,	9,	79,	90,	6,	NULL,	NULL),
(37,	9,	81,	90,	10,	NULL,	NULL),
(38,	9,	8,	1,	1000,	NULL,	NULL);

-- 2023-09-07 12:27:49
