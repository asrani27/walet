/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : tokomas

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 12/04/2024 09:07:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bibit
-- ----------------------------
DROP TABLE IF EXISTS `bibit`;
CREATE TABLE `bibit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bibit
-- ----------------------------
BEGIN;
INSERT INTO `bibit` (`id`, `kode`, `jenis`, `umur`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES (4, 'BB0001', 'sawit', '1 tahun', 1231, 41231, 92, '2024-04-02 12:47:42', '2024-04-07 07:25:48');
INSERT INTO `bibit` (`id`, `kode`, `jenis`, `umur`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES (6, 'BB0002', 'sdgdsfg', '3243', 43, 234, 553, '2024-04-02 17:33:24', '2024-04-07 07:14:28');
COMMIT;

-- ----------------------------
-- Table structure for keranjang_belanja
-- ----------------------------
DROP TABLE IF EXISTS `keranjang_belanja`;
CREATE TABLE `keranjang_belanja` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `bibit_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
-- Table structure for panen
-- ----------------------------
DROP TABLE IF EXISTS `panen`;
CREATE TABLE `panen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sawit_id` int(11) unsigned DEFAULT NULL,
  `lahan_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of panen
-- ----------------------------
BEGIN;
INSERT INTO `panen` (`id`, `nomor`, `tanggal`, `sawit_id`, `lahan_id`, `jumlah`, `created_at`, `updated_at`) VALUES (4, 'PN0001', '2000-01-01', 6, 8, 12, '2024-04-07 05:05:01', '2024-04-07 05:09:07');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
BEGIN;
INSERT INTO `pembelian` (`id`, `total`, `supplier_id`, `created_at`, `updated_at`, `no_transaksi`) VALUES (8, 84802, 1, '2024-04-07 07:14:14', '2024-04-07 07:14:28', 'TRSPB-0001');
COMMIT;

-- ----------------------------
-- Table structure for pembelian_detail
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_detail`;
CREATE TABLE `pembelian_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) unsigned DEFAULT NULL,
  `bibit_id` int(11) unsigned DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian_detail
-- ----------------------------
BEGIN;
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bibit_id`, `harga`, `jumlah`, `subtotal`) VALUES (6, 8, 4, 41231, 2, 82462);
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bibit_id`, `harga`, `jumlah`, `subtotal`) VALUES (7, 8, 6, 234, 10, 2340);
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
  PRIMARY KEY (`id`),
  KEY `retail_id_penjualan` (`pelanggan_id`),
  CONSTRAINT `retail_id_penjualan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
BEGIN;
INSERT INTO `penjualan` (`id`, `total`, `pelanggan_id`, `created_at`, `updated_at`, `no_transaksi`) VALUES (9, 412310, 6, '2024-04-07 07:25:08', '2024-04-07 07:25:48', 'TRSPJ-0001');
COMMIT;

-- ----------------------------
-- Table structure for penjualan_detail
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE `penjualan_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) DEFAULT NULL,
  `bibit_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan_detail
-- ----------------------------
BEGIN;
INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `bibit_id`, `harga`, `jumlah`, `subtotal`) VALUES (6, 9, 4, 41231, 10, 412310);
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
-- Table structure for sawit
-- ----------------------------
DROP TABLE IF EXISTS `sawit`;
CREATE TABLE `sawit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sawit
-- ----------------------------
BEGIN;
INSERT INTO `sawit` (`id`, `kode`, `jenis`, `satuan`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES (6, 'SA0002', 'sawit hitam', 'buah', 100, 200, 100, '2024-04-02 13:19:14', '2024-04-02 13:19:43');
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
INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (1, 'PT Antam', 'jl.....', '0987656789', '2022-10-17 14:03:39', '2023-05-19 17:31:23');
COMMIT;

-- ----------------------------
-- Table structure for tanam
-- ----------------------------
DROP TABLE IF EXISTS `tanam`;
CREATE TABLE `tanam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `bibit_id` int(11) unsigned DEFAULT NULL,
  `pekerja_id` int(11) unsigned DEFAULT NULL,
  `lahan_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tanam
-- ----------------------------
BEGIN;
INSERT INTO `tanam` (`id`, `nomor`, `tanggal`, `bibit_id`, `pekerja_id`, `lahan_id`, `jumlah`, `created_at`, `updated_at`) VALUES (2, 'TN0002', '2024-04-05', 4, 6, 8, 4, '2024-04-02 17:35:20', '2024-04-02 17:35:20');
INSERT INTO `tanam` (`id`, `nomor`, `tanggal`, `bibit_id`, `pekerja_id`, `lahan_id`, `jumlah`, `created_at`, `updated_at`) VALUES (3, 'TN0002', '2024-01-01', 6, 6, 8, 10, '2024-04-07 03:56:52', '2024-04-07 03:56:52');
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
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2024-04-02 21:07:17', '$2y$10$3k7FLC2TkBzYnumOyiv7BOmTOsTzzJHb3/p4aKcBUoGonp4Jij0Wu', NULL, 'LsdY35mSExyMxSDRPrcFDQz9iNJSH2DFMKooJfa1UYCmmKNPjNQDRA7lQLNY', '2024-04-02 21:07:17', '2024-04-02 21:07:17', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
