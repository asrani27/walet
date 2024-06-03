/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : walet

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 03/06/2024 12:34:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bahan
-- ----------------------------
DROP TABLE IF EXISTS `bahan`;
CREATE TABLE `bahan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bahan
-- ----------------------------
BEGIN;
INSERT INTO `bahan` (`id`, `nomor`, `nama`, `satuan`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES (7, 'BH0003', 'Bahan 1', 'botol', 10000, 20000, 6790, '2024-05-29 04:40:31', '2024-06-02 19:18:10');
COMMIT;

-- ----------------------------
-- Table structure for biaya
-- ----------------------------
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `upah_id` int(11) DEFAULT NULL,
  `uraian` text,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biaya
-- ----------------------------
BEGIN;
INSERT INTO `biaya` (`id`, `tanggal`, `upah_id`, `uraian`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (1, '2024-06-03', 1, 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', 3, 0, '2024-06-02 19:52:47', '2024-06-02 19:52:47');
COMMIT;

-- ----------------------------
-- Table structure for gedung
-- ----------------------------
DROP TABLE IF EXISTS `gedung`;
CREATE TABLE `gedung` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gedung
-- ----------------------------
BEGIN;
INSERT INTO `gedung` (`id`, `kode`, `jenis`, `ukuran`, `model`, `luas`, `harga`, `created_at`, `updated_at`) VALUES (8, 'GD0001', 'jbkk', 'hkh', 'klj', 'lkj', 100000000, '2024-06-02 18:03:07', '2024-06-02 18:03:12');
COMMIT;

-- ----------------------------
-- Table structure for keranjang_belanja
-- ----------------------------
DROP TABLE IF EXISTS `keranjang_belanja`;
CREATE TABLE `keranjang_belanja` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `gedung_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keranjang_belanja
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for lahan
-- ----------------------------
DROP TABLE IF EXISTS `lahan`;
CREATE TABLE `lahan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lokasi` text,
  `luas` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lahan
-- ----------------------------
BEGIN;
INSERT INTO `lahan` (`id`, `lokasi`, `luas`, `ukuran`, `created_at`, `updated_at`) VALUES (8, 'lokasi 11', '2 hektar', '100 x 200', '2024-04-02 13:15:10', '2024-04-02 13:15:38');
COMMIT;

-- ----------------------------
-- Table structure for pekerja
-- ----------------------------
DROP TABLE IF EXISTS `pekerja`;
CREATE TABLE `pekerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pekerja
-- ----------------------------
BEGIN;
INSERT INTO `pekerja` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`, `bagian`) VALUES (6, 'udin', 'jl ...', '98765', '2024-04-02 13:00:16', '2024-04-02 13:00:16', 'Divisi 1');
COMMIT;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
BEGIN;
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`, `bagian`) VALUES (6, 'adi', 'jl kayu tangi', '0987654567', '2024-04-02 12:56:47', '2024-04-02 12:56:47', NULL);
COMMIT;

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `supplier_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id_pembelian` (`supplier_id`),
  CONSTRAINT `supplier_id_pembelian` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
BEGIN;
INSERT INTO `pembelian` (`id`, `total`, `supplier_id`, `created_at`, `updated_at`, `no_transaksi`) VALUES (1, 20000, 1, '2024-06-02 19:17:26', '2024-06-02 19:18:10', 'TRSPB-0001');
COMMIT;

-- ----------------------------
-- Table structure for pembelian_detail
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_detail`;
CREATE TABLE `pembelian_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) unsigned DEFAULT NULL,
  `bahan_id` int(11) unsigned DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian_detail
-- ----------------------------
BEGIN;
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bahan_id`, `harga`, `jumlah`, `subtotal`) VALUES (6, 8, 4, 41231, 2, 82462);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bahan_id`, `harga`, `jumlah`, `subtotal`) VALUES (7, 8, 6, 234, 10, 2340);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bahan_id`, `harga`, `jumlah`, `subtotal`) VALUES (8, 9, 4, 41231, 1, 41231);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bahan_id`, `harga`, `jumlah`, `subtotal`) VALUES (9, 1, 7, 20000, 1, 20000);
COMMIT;

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  `dp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retail_id_penjualan` (`pelanggan_id`),
  CONSTRAINT `retail_id_penjualan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
BEGIN;
INSERT INTO `penjualan` (`id`, `total`, `pelanggan_id`, `created_at`, `updated_at`, `no_transaksi`, `dp`) VALUES (11, 100000000, 6, '2024-06-02 19:34:34', '2024-06-02 19:34:40', 'TRSPJ-0001', 1000000);
COMMIT;

-- ----------------------------
-- Table structure for penjualan_detail
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE `penjualan_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) DEFAULT NULL,
  `gedung_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan_detail
-- ----------------------------
BEGIN;
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `gedung_id`, `harga`, `jumlah`, `subtotal`) VALUES (6, 9, 4, 41231, 10, 412310);
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `gedung_id`, `harga`, `jumlah`, `subtotal`) VALUES (7, 10, 8, 100000000, 1, 100000000);
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `gedung_id`, `harga`, `jumlah`, `subtotal`) VALUES (8, 11, 8, 100000000, 1, 100000000);
COMMIT;

-- ----------------------------
-- Table structure for perawatan
-- ----------------------------
DROP TABLE IF EXISTS `perawatan`;
CREATE TABLE `perawatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `bibit_id` int(11) unsigned DEFAULT NULL,
  `pekerja_id` int(11) unsigned DEFAULT NULL,
  `lahan_id` int(11) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perawatan
-- ----------------------------
BEGIN;
INSERT INTO `perawatan` (`id`, `nomor`, `tanggal`, `bibit_id`, `pekerja_id`, `lahan_id`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'PR0001', '2002-01-01', 4, 6, 8, 'sdsdfsdf', '2024-04-07 05:14:43', '2024-04-07 05:16:46');
COMMIT;

-- ----------------------------
-- Table structure for retail
-- ----------------------------
DROP TABLE IF EXISTS `retail`;
CREATE TABLE `retail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of retail
-- ----------------------------
BEGIN;
INSERT INTO `retail` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (4, 'Adi', 'jl pramuka k 6 gg teratai', '098765456789', '2023-05-19 17:32:18', '2023-05-19 17:32:18');
INSERT INTO `retail` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (5, 'Budi', 'Jl Sultan Adam', '0987654567890', '2023-05-19 17:32:26', '2023-05-19 17:32:26');
COMMIT;

-- ----------------------------
-- Table structure for retur_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `retur_pembelian`;
CREATE TABLE `retur_pembelian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of retur_pembelian
-- ----------------------------
BEGIN;
INSERT INTO `retur_pembelian` (`id`, `total`, `supplier_id`, `created_at`, `updated_at`, `no_transaksi`) VALUES (9, 44000, 1, '2022-10-17 14:57:38', '2022-10-17 14:57:41', 'RPB-0001');
COMMIT;

-- ----------------------------
-- Table structure for retur_pembelian_detail
-- ----------------------------
DROP TABLE IF EXISTS `retur_pembelian_detail`;
CREATE TABLE `retur_pembelian_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `retur_pembelian_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of retur_pembelian_detail
-- ----------------------------
BEGIN;
INSERT INTO `retur_pembelian_detail` (`id`, `retur_pembelian_id`, `barang_id`, `harga`, `jumlah`, `subtotal`) VALUES (2, 9, 1, 4400, 10, 44000);
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
COMMIT;

-- ----------------------------
-- Table structure for sales
-- ----------------------------
DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sales
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of satuan
-- ----------------------------
BEGIN;
INSERT INTO `satuan` (`id`, `nama`) VALUES (1, 'PCS');
COMMIT;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier
-- ----------------------------
BEGIN;
INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (1, 'PT walet', 'jl.....', '0987656789', '2022-10-17 14:03:39', '2024-05-29 04:36:17');
COMMIT;

-- ----------------------------
-- Table structure for upah
-- ----------------------------
DROP TABLE IF EXISTS `upah`;
CREATE TABLE `upah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pekerja_id` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of upah
-- ----------------------------
BEGIN;
INSERT INTO `upah` (`id`, `pekerja_id`, `nilai`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (1, 6, 100000, 2, 200000, '2024-06-02 12:06:23', '2024-06-02 12:21:04');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2024-05-29 14:27:38', '$2y$10$3k7FLC2TkBzYnumOyiv7BOmTOsTzzJHb3/p4aKcBUoGonp4Jij0Wu', NULL, 'l7yt1TlJDGP3FOGER6fjecF7t6Ul9jsIHXTm7Gei8K3U3eo5XrXzIo6B7I6O', '2024-05-29 14:27:38', '2024-05-29 14:27:38', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
