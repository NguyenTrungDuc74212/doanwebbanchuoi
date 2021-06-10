

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_password_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (`id`,`name`,`email`,`email_verified_at`,`password`,`reset_password_token`,`gender`,`phone`,`remember_token`,`created_at`,`updated_at`) VALUES ('1','Nguyễn Trung Đức','ductrungthug@gmail.com',NULL,'$2y$10$3hfwg20WIA8YdIM271jL3OcCeeumsjNvAAaNFzFEgILWBEIEhBM/m','1ff1de774005f8da13f42943881c655f','1','948396138',NULL,'2021-03-16 20:50:47','2021-05-12 10:02:08');

INSERT INTO users (`id`,`name`,`email`,`email_verified_at`,`password`,`reset_password_token`,`gender`,`phone`,`remember_token`,`created_at`,`updated_at`) VALUES ('2','Mai Trung Hiếu','hieu@gmail.com',NULL,'$2y$10$jiQX6bDjgfIRAGRuyDHciOLKQu3QIex0TKhrx.RaX7SRS.fBAz5eO',NULL,'1','328896748',NULL,'2021-03-16 20:52:47','2021-03-16 20:52:47');

INSERT INTO users (`id`,`name`,`email`,`email_verified_at`,`password`,`reset_password_token`,`gender`,`phone`,`remember_token`,`created_at`,`updated_at`) VALUES ('4','mạnh lê','manhdzzd@gmail.com',NULL,'$2y$10$Kc3ge2.ecodRgrqOS/npweSqC94UtiOtT1EF3UwLWKNYjjtMC7tka',NULL,'1','329294747',NULL,'2021-05-09 16:19:42','2021-05-09 16:19:42');

INSERT INTO users (`id`,`name`,`email`,`email_verified_at`,`password`,`reset_password_token`,`gender`,`phone`,`remember_token`,`created_at`,`updated_at`) VALUES ('5','đạt lol','dat@gmail.com','0000-00-00 00:00:00','$2y$10$S4AlGtuBELUtydqLJ01/Ye3JTGZ4OYHq8zpSu3VCi18qWrh44ZYT6',NULL,'1','386258039',NULL,'2021-05-18 15:49:38','2021-05-18 15:49:38');


CREATE TABLE `users_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users_roles (`id`,`user_id`,`role_id`,`created_at`,`updated_at`) VALUES ('1','1','1',NULL,NULL);

INSERT INTO users_roles (`id`,`user_id`,`role_id`,`created_at`,`updated_at`) VALUES ('2','2','2',NULL,NULL);

INSERT INTO users_roles (`id`,`user_id`,`role_id`,`created_at`,`updated_at`) VALUES ('3','3','3',NULL,NULL);

INSERT INTO users_roles (`id`,`user_id`,`role_id`,`created_at`,`updated_at`) VALUES ('16','4','1',NULL,NULL);

INSERT INTO users_roles (`id`,`user_id`,`role_id`,`created_at`,`updated_at`) VALUES ('17','5','1',NULL,NULL);


CREATE TABLE `tbl_warehouse_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `quantity_cancel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('18','17','1','7','2021-06-02 02:01:52','2021-06-04 08:34:00','2021-06-04','2','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('19','8','3','4','2021-06-03 21:05:21','2021-06-07 02:04:20','2021-06-14','2','5');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('20','3','1','10','2021-06-03 14:37:09','2021-06-04 08:34:00','2021-06-04','2','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('21','1','1','15','2021-06-03 14:37:09','2021-06-03 16:33:57','2021-06-14','2','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('22','1','1','0','2021-06-04 08:35:53','2021-06-07 10:16:19','2021-06-19','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('23','3','1','0','2021-06-04 08:35:53','2021-06-07 11:13:21','2021-06-10','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('24','8','1','0','2021-06-04 08:35:53','2021-06-09 14:00:02','2021-06-23','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('25','1','3','0','2021-06-04 08:44:40','2021-06-07 11:13:21','2021-06-16','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('26','7','1','0','2021-06-04 08:50:08','2021-06-07 10:13:46','2021-06-16','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('27','17','1','0','2021-06-04 08:50:08','2021-06-07 11:14:11','2021-06-11','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('28','19','1','0','2021-06-04 08:50:08','2021-06-07 10:16:19','2021-06-17','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('29','18','1','0','2021-06-04 08:50:08','2021-06-09 15:09:56','2021-06-18','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('30','20','1','0','2021-06-04 08:50:08','2021-06-09 13:03:22','2021-06-24','0','0');

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('31','1','1','20','2021-06-10 10:06:05','2021-06-10 10:06:05','2021-09-10','0',NULL);

INSERT INTO tbl_warehouse_product (`id`,`product_id`,`warehouse_id`,`quantity`,`created_at`,`updated_at`,`expiration_date`,`status`,`quantity_cancel`) VALUES ('32','3','1','20','2021-06-10 10:06:05','2021-06-10 10:06:05','2021-09-10','0',NULL);


CREATE TABLE `tbl_warehouse_order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_product_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('254','18','167','3','2021-06-02 22:03:21','2021-06-02 22:03:21');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('255','19','169','1','2021-06-03 21:06:01','2021-06-03 21:06:01');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('256','19','170','1','2021-06-03 21:12:34','2021-06-03 21:12:34');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('257','19','172','1','2021-06-04 08:32:11','2021-06-04 08:32:11');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('258','23','173','4','2021-06-05 22:52:01','2021-06-05 22:52:01');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('270','23','175','1','2021-06-06 21:29:38','2021-06-06 21:29:38');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('271','25','176','1','2021-06-06 21:29:39','2021-06-06 21:29:39');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('296','27','175','1','2021-06-07 11:14:11','2021-06-07 11:14:11');

INSERT INTO tbl_warehouse_order (`id`,`warehouse_product_id`,`order_detail_id`,`quantity`,`created_at`,`updated_at`) VALUES ('297','29','176','1','2021-06-07 11:14:11','2021-06-07 11:14:11');


CREATE TABLE `tbl_warehouse` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_contain` int(11) NOT NULL,
  `quantity_now` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_warehouse (`id`,`warehouse_name`,`quantity_contain`,`quantity_now`,`created_at`,`updated_at`) VALUES ('1','Kho thực phẩm 1','1000','110','2021-04-28 23:33:17','2021-06-10 10:06:05');

INSERT INTO tbl_warehouse (`id`,`warehouse_name`,`quantity_contain`,`quantity_now`,`created_at`,`updated_at`) VALUES ('3','kho thực phẩm 2','1000','9','2021-05-18 17:49:52','2021-06-07 02:04:20');


CREATE TABLE `tbl_visitors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('1','127.0.0.1','2021-05-31','2021-05-31 16:55:10','2021-05-31 16:55:10');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('2','::1','2021-05-31','2021-05-31 17:00:17','2021-05-31 17:00:17');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('3','171.245.16.184','2021-05-31','2021-05-31 22:34:39','2021-05-31 22:34:39');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('4','118.71.192.115','2021-06-01','2021-06-01 09:29:42','2021-06-01 09:29:42');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('5','1.55.205.152','2021-06-01','2021-06-01 19:15:41','2021-06-01 19:15:41');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('6','42.115.196.188','2021-06-02','2021-06-02 22:48:21','2021-06-02 22:48:21');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('7','113.163.6.18','2021-06-03','2021-06-03 08:19:14','2021-06-03 08:19:14');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('8','58.186.106.28','2021-06-03','2021-06-03 22:09:20','2021-06-03 22:09:20');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('9','59.153.242.27','2021-06-04','2021-06-04 08:32:28','2021-06-04 08:32:28');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('10','27.67.95.22','2021-06-04','2021-06-04 09:10:18','2021-06-04 09:10:18');

INSERT INTO tbl_visitors (`id`,`ip_add`,`date`,`created_at`,`updated_at`) VALUES ('11','1.55.216.81','2021-06-09','2021-06-09 16:08:15','2021-06-09 16:08:15');


CREATE TABLE `tbl_vendors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_vendors (`id`,`vendor_name`,`address`,`phone`,`tax_code`,`created_at`,`updated_at`) VALUES ('2','Công ty Cát bi','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0948396139','88888882','2021-04-26 20:49:26','2021-04-26 20:49:26');

INSERT INTO tbl_vendors (`id`,`vendor_name`,`address`,`phone`,`tax_code`,`created_at`,`updated_at`) VALUES ('4','Công ty cung cấp chuối sạch','An dương, Hải Phòng','0948396131','12345678','2021-04-27 20:28:43','2021-04-27 20:28:43');


CREATE TABLE `tbl_tinhthanhpho` (
  `matp` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`matp`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;


INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('1','Thành phố Hà Nội','Thành phố Trung ương');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('2','Tỉnh Hà Giang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('4','Tỉnh Cao Bằng','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('6','Tỉnh Bắc Kạn','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('8','Tỉnh Tuyên Quang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('10','Tỉnh Lào Cai','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('11','Tỉnh Điện Biên','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('12','Tỉnh Lai Châu','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('14','Tỉnh Sơn La','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('15','Tỉnh Yên Bái','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('17','Tỉnh Hoà Bình','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('19','Tỉnh Thái Nguyên','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('20','Tỉnh Lạng Sơn','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('22','Tỉnh Quảng Ninh','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('24','Tỉnh Bắc Giang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('25','Tỉnh Phú Thọ','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('26','Tỉnh Vĩnh Phúc','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('27','Tỉnh Bắc Ninh','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('30','Tỉnh Hải Dương','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('31','Thành phố Hải Phòng','Thành phố Trung ương');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('33','Tỉnh Hưng Yên','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('34','Tỉnh Thái Bình','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('35','Tỉnh Hà Nam','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('36','Tỉnh Nam Định','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('37','Tỉnh Ninh Bình','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('38','Tỉnh Thanh Hóa','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('40','Tỉnh Nghệ An','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('42','Tỉnh Hà Tĩnh','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('44','Tỉnh Quảng Bình','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('45','Tỉnh Quảng Trị','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('46','Tỉnh Thừa Thiên Huế','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('48','Thành phố Đà Nẵng','Thành phố Trung ương');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('49','Tỉnh Quảng Nam','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('51','Tỉnh Quảng Ngãi','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('52','Tỉnh Bình Định','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('54','Tỉnh Phú Yên','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('56','Tỉnh Khánh Hòa','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('58','Tỉnh Ninh Thuận','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('60','Tỉnh Bình Thuận','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('62','Tỉnh Kon Tum','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('64','Tỉnh Gia Lai','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('66','Tỉnh Đắk Lắk','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('67','Tỉnh Đắk Nông','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('68','Tỉnh Lâm Đồng','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('70','Tỉnh Bình Phước','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('72','Tỉnh Tây Ninh','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('74','Tỉnh Bình Dương','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('75','Tỉnh Đồng Nai','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('77','Tỉnh Bà Rịa - Vũng Tàu','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('79','Thành phố Hồ Chí Minh','Thành phố Trung ương');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('80','Tỉnh Long An','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('82','Tỉnh Tiền Giang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('83','Tỉnh Bến Tre','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('84','Tỉnh Trà Vinh','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('86','Tỉnh Vĩnh Long','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('87','Tỉnh Đồng Tháp','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('89','Tỉnh An Giang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('91','Tỉnh Kiên Giang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('92','Thành phố Cần Thơ','Thành phố Trung ương');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('93','Tỉnh Hậu Giang','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('94','Tỉnh Sóc Trăng','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('95','Tỉnh Bạc Liêu','Tỉnh');

INSERT INTO tbl_tinhthanhpho (`matp`,`name`,`type`) VALUES ('96','Tỉnh Cà Mau','Tỉnh');


CREATE TABLE `tbl_soical` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('1','103189668869674003612','ductrungthug@gmail.com','GOOGLE','1',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('2','101594845461286707489','manhdzzd@gmail.com','GOOGLE','2',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('3','109033081932764297301','manh73879@st.vimaru.edu.vn','GOOGLE','5',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('4','110705603380665517955','duc74212@st.vimaru.edu.vn','GOOGLE','4',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('5','974404536628915','manhdzzd@gmail.com','facebook','2',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('6','505139330469602','ductrungthug@gmail.com','facebook','1',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('7','1953348441490677','dat75849@st.vimaru.edu.vn','facebook','6',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('8','1948837931952751','thichgaytoi@gmail.com','facebook','8',NULL,NULL);

INSERT INTO tbl_soical (`id`,`provider_user_id`,`provider_user_email`,`provider`,`user`,`created_at`,`updated_at`) VALUES ('9','10150004250647759','koowtswenm_1574355019@tfbnw.net','facebook','9',NULL,NULL);


CREATE TABLE `tbl_slider` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_slider (`id`,`name`,`image`,`status`,`desc`,`created_at`,`updated_at`) VALUES ('8','Slide1','slider77.jpg','1','<p>dat</p>','2021-05-29 13:20:15','2021-05-29 13:20:15');

INSERT INTO tbl_slider (`id`,`name`,`image`,`status`,`desc`,`created_at`,`updated_at`) VALUES ('9','slider2','slider262.jpg','1','<p>dat</p>','2021-05-29 13:37:05','2021-05-29 13:37:05');

INSERT INTO tbl_slider (`id`,`name`,`image`,`status`,`desc`,`created_at`,`updated_at`) VALUES ('10','slider3','slider379.jpg','1','<p>dat</p>','2021-05-29 13:50:14','2021-05-29 13:50:14');


CREATE TABLE `tbl_shipping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('150','manh le','2','Thái Thụy','0329294747','manhdzzd@gmail.com','fsdfsd sf s','1','1','2021-06-02 22:03:19','2021-06-02 22:03:19','95');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('151','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','hello','2','1','2021-06-03 20:55:49','2021-06-03 20:55:49','82');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('152','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','hello','2','1','2021-06-03 20:57:19','2021-06-03 20:57:19','94');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('153','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','test','1','1','2021-06-03 21:06:01','2021-06-03 21:06:01','83');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('154','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','ố','1','1','2021-06-03 21:12:33','2021-06-03 21:12:33','77');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('155','ManhLe','2','Thái Thụy','0329294747','manhdzzd@gmail.com','dfsf sf dsf','2','1','2021-06-04 08:24:32','2021-06-04 08:24:32','92');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('156','ManhLe','2','Thái Thụy','0329294747','manhdzzd@gmail.com','fsdfs','1','1','2021-06-04 08:32:11','2021-06-04 08:32:11','95');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('157','Dat Thanh',NULL,'dddddd','+84365609724','thanhdatvu187@gmail.com','deo co ghi chu? dit me dien a`','2','1','2021-06-05 22:52:01','2021-06-05 22:52:01','94');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('158','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','test b2','1','1','2021-06-06 14:15:13','2021-06-06 14:15:13','87');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('159','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','test b2','1','1','2021-06-06 14:17:27','2021-06-06 14:17:27','87');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('160','đức nguyễn trung','1','số 4 lố 236 khut3, thành tô, hải an, hải phòng','0386258039','ductrungthug@gmail.com','test','1','1','2021-06-06 21:29:37','2021-06-06 21:29:37','77');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('161','Đại Đức','8','dong quoc binh','3921834980','thichgaytoi@gmail.com','alooo','2','1','2021-06-09 12:38:18','2021-06-09 12:38:18','96');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('162','Đại Đức','8','dong quoc binh','3921834980','thichgaytoi@gmail.com','alooo','1','1','2021-06-09 12:38:33','2021-06-09 12:38:33','96');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('163','Đại Đức','8','erdtfdgd','56465465','thichgaytoi@gmail.com','fgdf','2','1','2021-06-09 12:39:21','2021-06-09 12:39:21','95');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('164','manh le',NULL,'Thái Bình','0329294747','manhdzzd@gmail.com','gghgfh','1','1','2021-06-09 13:03:20','2021-06-09 13:03:20','77');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('165','dsad dsad',NULL,'dasdasdas','0321313131','thanhdatvu187@gmail.com','qwed','2','1','2021-06-09 13:25:37','2021-06-09 13:25:37','95');

INSERT INTO tbl_shipping (`id`,`name`,`customer_id`,`address`,`phone`,`email`,`notes`,`method`,`status`,`created_at`,`updated_at`,`city`) VALUES ('166','manh le',NULL,'Thái Bình','0329294747','manhdzzd@gmail.com','fg','2','1','2021-06-09 13:34:46','2021-06-09 13:34:46','91');


CREATE TABLE `tbl_return_voucher_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `return_quantity` int(11) NOT NULL,
  `return_warehouse_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('80','3','1','68','2021-06-07 10:57:10','2021-06-07 10:57:10','1','23');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('81','1','1','68','2021-06-07 10:57:11','2021-06-07 10:57:11','1','25');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('82','3','1','69','2021-06-07 11:13:21','2021-06-07 11:13:21','1','23');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('83','1','1','69','2021-06-07 11:13:21','2021-06-07 11:13:21','1','25');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('84','3','1','70','2021-06-07 11:14:11','2021-06-07 11:14:11','1','23');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('85','1','1','70','2021-06-07 11:14:11','2021-06-07 11:14:11','1','25');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('86','8','1','71','2021-06-09 14:00:02','2021-06-09 14:00:02','1','24');

INSERT INTO tbl_return_voucher_detail (`id`,`product_id`,`quantity`,`voucher_id`,`created_at`,`updated_at`,`return_quantity`,`return_warehouse_id`) VALUES ('87','8','1','72','2021-06-09 15:09:56','2021-06-09 15:09:56','1','24');


CREATE TABLE `tbl_return_voucher` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voucher_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_return_voucher (`id`,`voucher_code`,`order_code`,`voucher_date`,`created_at`,`updated_at`) VALUES ('68','RV0000068','DH0000153','2021-06-07','2021-06-07 10:57:10','2021-06-07 10:57:10');

INSERT INTO tbl_return_voucher (`id`,`voucher_code`,`order_code`,`voucher_date`,`created_at`,`updated_at`) VALUES ('69','RV0000069','DH0000153','2021-06-07','2021-06-07 11:13:21','2021-06-07 11:13:21');

INSERT INTO tbl_return_voucher (`id`,`voucher_code`,`order_code`,`voucher_date`,`created_at`,`updated_at`) VALUES ('70','RV0000070','DH0000153','2021-06-07','2021-06-07 11:14:10','2021-06-07 11:14:11');

INSERT INTO tbl_return_voucher (`id`,`voucher_code`,`order_code`,`voucher_date`,`created_at`,`updated_at`) VALUES ('71','RV0000071','DH0000159','2021-06-17','2021-06-09 14:00:02','2021-06-09 14:00:02');

INSERT INTO tbl_return_voucher (`id`,`voucher_code`,`order_code`,`voucher_date`,`created_at`,`updated_at`) VALUES ('72','RV0000072','DH0000159','2021-06-10','2021-06-09 15:09:56','2021-06-09 15:09:56');


CREATE TABLE `tbl_repost` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total_revenue` float DEFAULT NULL,
  `date_repost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `total_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_repost (`id`,`total_revenue`,`date_repost`,`total_quantity`,`total_order`,`created_at`,`updated_at`) VALUES ('6','72000','2021-06-02','3','1','2021-06-02 22:03:26','2021-06-02 22:34:46');

INSERT INTO tbl_repost (`id`,`total_revenue`,`date_repost`,`total_quantity`,`total_order`,`created_at`,`updated_at`) VALUES ('7','37900','2021-06-03','1','2','2021-06-03 21:06:03','2021-06-08 20:20:26');

INSERT INTO tbl_repost (`id`,`total_revenue`,`date_repost`,`total_quantity`,`total_order`,`created_at`,`updated_at`) VALUES ('8','737900','2021-06-04','3','1','2021-06-04 08:32:12','2021-06-08 20:22:08');

INSERT INTO tbl_repost (`id`,`total_revenue`,`date_repost`,`total_quantity`,`total_order`,`created_at`,`updated_at`) VALUES ('9','1400000','2021-06-05','4','1','2021-06-05 22:52:03','2021-06-08 20:20:59');

INSERT INTO tbl_repost (`id`,`total_revenue`,`date_repost`,`total_quantity`,`total_order`,`created_at`,`updated_at`) VALUES ('10','379920','2021-06-06','2','2','2021-06-06 14:17:30','2021-06-08 20:22:43');

INSERT INTO tbl_repost (`id`,`total_revenue`,`date_repost`,`total_quantity`,`total_order`,`created_at`,`updated_at`) VALUES ('11','99800','2021-06-09','3','2','2021-06-09 13:03:27','2021-06-09 16:11:44');


CREATE TABLE `tbl_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_sold` int(11) NOT NULL,
  `persent_discount` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('1','Chuối Fohla Nhánh 4 Trái 750g','chuối-dole-300x300636.jpg','2','39','<p>Chuối Fohla Nh&aacute;nh 4 Tr&aacute;i 750g ngon bổ rẻ</p>','<p>Chuối Fohla Nh&aacute;nh 4 Tr&aacute;i 750g ngon bổ rẻ</p>','34000','Chuối Fohla Nhánh 4 Trái 750g ngon bổ rẻ','Chuối Fohla Nhánh 4 Trái 750g ngon bổ rẻ','chuoi-fohla-nhanh-4-trai-750g','2021-03-16 21:17:50','2021-06-10 10:06:05','2','1','12','kg');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('3','Chuối sấy năng lượng mặt trời','chuoifohla3399.jpg','2','21','<p>Thay cho phương ph&aacute;p phơi dưới nắng truyền thống, Unifarm sử dụng c&ocirc;ng nghệ sấy bằng nh&agrave; k&iacute;nh c&ocirc;ng nghệ cao Parabola Dome. Sản phẩm sau khi sấy đảm bảo sạch, thơm ngon, dinh dưỡng,&hellip;</p>','Thay cho phương pháp phơi dưới nắng truyền thống, Unifarm sử dụng công nghệ sấy bằng nhà kính công nghệ cao Parabola Dome. Sản phẩm sau khi sấy đảm bảo sạch, thơm ngon, dinh dưỡng,…','350000','Chuối sấy năng lượng mặt trời','Chuối sấy năng lượng mặt trời','chuoi-say-nang-luong-mat-troi','2021-03-16 21:18:13','2021-06-10 10:06:05','2','7','0','kg');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('7','Dưỡng tóc từ Chuối','matnachuoi_119.jpg','4','10','<p>Chuối l&agrave; loại tr&aacute;i c&acirc;y chứa nhiều silica, một hợp chất gi&uacute;p cơ thể tổng hợp collagen v&agrave; gi&uacute;p t&oacute;c chắc d&agrave;y hơn. Th&ecirc;m v&agrave;o đ&oacute;, khả năng kh&aacute;ng khuẩn của chuối cũng gi&uacute;p phục hồi t&igrave;nh trạng da đầu kh&ocirc; v&agrave; bong tr&oacute;c, đồng thời l&agrave;m giảm c&aacute;c triệu chứng của g&agrave;u.&nbsp;Nhờ những lợi &iacute;ch vượt trội, chuối l&agrave; một th&agrave;nh phần quen thuộc được sử dụng trong c&aacute;c mặt nạ dưỡng t&oacute;c tại nh&agrave;, c&oacute; t&aacute;c dụng l&agrave;m mềm v&agrave; phục hồi t&oacute;c.</p>','<p>&nbsp;</p>

<p>Chuối l&agrave; một loại thực phẩm rất gi&agrave;u&nbsp;dinh dưỡng&nbsp;v&agrave; c&oacute; hương vị tuyệt vời. Bạn c&oacute; biết, chuối c&ograve;n c&oacute; thể gi&uacute;p tăng cường kết cấu, độ d&agrave;y v&agrave; sự b&oacute;ng mượt của t&oacute;c? Từ l&acirc;u, người ta đ&atilde; d&ugrave;ng mặt nạ chuối cho t&oacute;c để gi&uacute;p t&oacute;c khỏe mạnh v&agrave; mềm mại hơn.</p>','24000','duongtoctuchuoi','duongtoctuchuoi','duong-toc-tu-chuoi','2021-05-29 14:03:46','2021-06-04 08:50:08','4','0','0','Cái');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('8','Chuối DOLE','chuối-dole-300x300626.jpg','2','8','<p>Chu&ocirc;́i Dole l&agrave; một giống chuối ngoại nhập, c&oacute; m&ugrave;i thơm v&agrave; c&oacute; vị ngọt đặc trưng. Đ&acirc;y l&agrave; loại quả cung cấp kali v&agrave; axit folic tuyệt vời cho sức khỏe. B&ecirc;n cạnh đ&oacute;, chuối c&ograve;n gi&agrave;u vitamin và khoáng ch&acirc;́t t&ocirc;́t cho não b&ocirc;̣, h&ocirc;̃ trợ trí nhớ, b&ocirc;̉ sung dưỡng ch&acirc;́t, h&ocirc;̃ trợ h&ecirc;̣ ti&ecirc;u hóa v&agrave; c&oacute; t&aacute;c dụng trong việc l&agrave;m đẹp hiệu quả.</p>','Chuối Dole là một giống chuối ngoại nhập, có mùi thơm và có vị ngọt đặc trưng. Đây là loại quả cung cấp kali và axit folic tuyệt vời cho sức khỏe. Bên cạnh đó, chuối còn giàu vitamin và khoáng chất tốt cho não bộ, hỗ trợ trí nhớ, bổ sung dưỡng chất, hỗ trợ hệ tiêu hóa và có tác dụng trong việc làm đẹp hiệu quả.','37900','Chuối DOLE','Chuối DOLE','chuoi-dole','2021-03-16 21:18:15','2021-06-09 16:11:44','2','4','0','kg');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('17','Chuối Sứ ( Pack 700g )','chuoi-sach-hai-phong71.jpg','2','10','<p><strong>Chuối Sứ</strong>&nbsp;giống chuối được xuất xứ tại Th&aacute;i Lan được trồng tại An L&atilde;o - Hải Ph&ograve;ng&nbsp;</p>','<p><strong>1. C&ocirc;ng dụng</strong><br />
<br />
Chuối Sứ&nbsp;ch&iacute;n bao gồm nhiều chất bột, chất đạm, chất xơ, sinh tố v&agrave; kho&aacute;ng chất. Đặc biệt chuối c&oacute; h&agrave;m lượng potassium rất cao v&agrave; cả 10 loại acid amin thiết yếu của cơ thể. Theo Viện Nghi&ecirc;n cứu v&agrave; Ph&aacute;t triển n&ocirc;ng Nghiệp Malaysia (MARDI), chuối l&agrave; loại tr&aacute;i c&acirc;y tươi duy nhất hội tụ đầy đủ th&agrave;nh phần những chất dinh dưỡng cần thiết cho cơ thể con người.<br />
<br />
<strong>2. Đặc điểm v&agrave; quy tr&igrave;nh&nbsp;</strong><br />
<br />
Sau khi chuối lớn tương đối, từng buồng chuối được &ldquo;mặc &aacute;o&rdquo; để chống mọi loại s&acirc;u bệnh, c&ocirc;n tr&ugrave;ng g&acirc;y hại. Đến khi thu hoạch, nh&acirc;n vi&ecirc;n nh&agrave; đ&oacute;ng g&oacute;i bắt đầu quy tr&igrave;nh &ldquo;xử l&yacute; từng tr&aacute;i&rdquo; - loại bỏ những tr&aacute;i xấu.<br />
<br />
Sau khi được khử sạch bụi, loại bỏ phần cuống thừa,&nbsp;chuối Sứ&nbsp;tiếp tục được thả &ldquo;bơi&rdquo; trong hồ khử khuẩn. Sau đ&oacute;, c&aacute;c nh&acirc;n vi&ecirc;n vớt chuối l&ecirc;n, nhẹ nh&agrave;ng lau kh&ocirc;, l&oacute;t lớp xốp mỏng giữa hai lớp chuối trong c&ugrave;ng một nải để chuối kh&ocirc;ng bị th&acirc;m, t&igrave; vết.<br />
Qu&aacute; tr&igrave;nh l&agrave;m ch&iacute;n&nbsp;chuối Sứ&nbsp;được&nbsp;chia qua 7 giai đoạn, mỗi giai đoạn tr&aacute;i&nbsp;chuối sẽ c&oacute; cảm quan kh&aacute;c nhau (thể hiện m&agrave;u sắc tr&ecirc;n da chuối). M&agrave;u v&agrave;ng của chuối sẽ tăng l&ecirc;n từ từ, chuối được xuất b&aacute;n đến cửa h&agrave;ng khi đạt giai đoạn 3 (bắt đầu ăn được), ăn ngon nhất khi chuối ở giai đoạn 5 -&gt; 7.</p>

<p><br />
<strong>3. Bảo quản</strong><br />
<br />
Bảo quản Chuối Sứ&nbsp;ở nhiệt độ ph&ograve;ng cho đến khi ch&iacute;n. Đừng cho chuối tiếp x&uacute;c với nhiệt độ n&oacute;ng bởi như thế sẽ th&uacute;c đẩy qu&aacute; tr&igrave;nh chuối ch&iacute;n. Cũng đừng cho&nbsp;chuối sứ&nbsp;v&agrave;o tủ lạnh trước khi chuối ch&iacute;n.</p>','24000','chuoisu','chuoisu','chuoi-su-pack-700g','2021-05-23 15:29:30','2021-06-04 08:50:08','4','3','0','kg');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('18','Pancake Chuối FRESHMIX','pancake-chuoi93.jpg','5','10','<p>Mỗi s&aacute;ng m&agrave; cứ ăn ho&agrave;i c&aacute;c m&oacute;n mặn như cơm chi&ecirc;n, b&uacute;n phở&hellip; th&igrave; cũng sẽ ng&aacute;n lắm. Vậy th&igrave; bạn h&atilde;y đổi vị cho gia đ&igrave;nh với m&oacute;n b&aacute;nh<strong> pancake chuối </strong>n&agrave;y nh&eacute;.</p>','<p>Từng chiếc b&aacute;nh pancake chuối xốp mềm c&oacute; vị chua ngọt tự nhi&ecirc;n rất ngon miệng. B&aacute;nh sử dụng rất &iacute;t đường, vị ngọt chủ yếu l&agrave; từ chuối. M&oacute;n b&aacute;nh n&agrave;y d&ugrave;ng ăn s&aacute;ng hay cho c&aacute;c bữa phụ cũng đều rất tiện lợi.</p>','24000','pancake_chuoi','pancake_chuoi','pancake-chuoi-freshmix','2021-05-23 21:06:25','2021-06-04 08:50:08','4','0','0','kg');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('19','SMOOTHIE CHUỐI FRESHMIX','Sinh-To-ChuoI39.jpg','5','10','<p>Sinh tố chuối c&oacute; rất nhiều vitamin c&ugrave;ng kho&aacute;ng chất kh&ocirc;ng chỉ gi&uacute;p bạn c&oacute; sức khỏe tốt m&agrave; c&ograve;n gi&uacute;p chị em phụ nữ c&oacute; v&oacute;c d&aacute;ng đẹp v&agrave; l&agrave;n da mịn m&agrave;ng tự nhi&ecirc;n.</p>','<p>Sinh tố chuối đơn giản được rất nhiều người ưa th&iacute;ch kh&ocirc;ng chỉ từ hương &nbsp;vị ngon của chuối m&agrave; c&ograve;n đảm bảo cho sức khỏe<br />
Bạn c&oacute; thể tham khảo c&aacute;ch l&agrave;m Sinh Tố Chuối&nbsp; tại nh&agrave; theo b&agrave;i viết sau: <a href="http://muachuoi.xyz">C&aacute;ch l&agrave;m&nbsp;SMOOTHIE CHUỐI CHUẨN&nbsp;&nbsp;FRESHMIX ngay tại nh&agrave;</a>&nbsp;của FRESH Banana nh&eacute;</p>','24000','sinh_to_chuoi','sinh_to_chuoi','smoothie-chuoi-freshmix','2021-05-23 21:12:28','2021-06-04 08:50:08','4','0','0','kg');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('20','Mặt nạ dưỡng da từ Chuối','mat-na-chuoi-tri-nam-13.jpg','4','9','<p>Chuối l&agrave; một trong những quả c&oacute; th&agrave;nh phần gi&agrave;u chất kali, Vitamin A,E. Những dưỡng chất n&agrave;y rất cần thiết cho sức khỏe v&agrave; l&agrave; chất gi&uacute;p cho l&agrave;n da th&ecirc;m mịn m&agrave;ng v&agrave; trắng s&aacute;ng. Ngo&agrave;i ra, chuối c&ograve;n cung cấp độ ẩm v&agrave; chống l&atilde;o h&oacute;a, nếp nhăn cho da rất tốt.</p>','<p><strong>C&aacute;ch thực hiện</strong></p>

<p>Rửa mặt thật sạch bằng sữa rửa mặt. Bạn c&oacute; thể d&ugrave;ng nước ấm hay x&ocirc;ng hơi để loại bỏ c&aacute;c chất độc tố, bụi bẩn tr&ecirc;n da.</p>

<p>Thoa đều hỗn hợp mặt nạ chuối tr&ecirc;n l&ecirc;n da massage khoảng 2 ph&uacute;t v&agrave; nằm thư gi&atilde;n khoảng 25 ph&uacute;t để c&aacute;c dưỡng chất kh&ocirc; lại.</p>

<p>Cuối c&ugrave;ng bạn rửa mặt sạch lại bằng nước v&agrave; c&oacute; thể thoa th&ecirc;m kem dưỡng da để da mau trắng hồng.</p>

<p>Chỉ sau 1 đ&ecirc;m sử dụng bạn sẽ cảm nhận được sự kh&aacute;c biệt của l&agrave;n da trước v&agrave; sau khi đắp loại mặt nạ n&agrave;y.</p>','24000','#matnachuoi','#matnachuoi','mat-na-duong-da-tu-chuoi','2021-05-29 13:59:56','2021-06-09 13:16:00','4','1','0','cái');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('22','Phân bón giã thể từ Chuối','CÁCH-Ủ-VỎ-CHUỐI-LÀM-PHÂN-BÓN69.jpg','7','0','<p>Phan bon gia the tu chuoi&nbsp;</p>','<p>Phan bon gia the tu chuoi&nbsp;</p>','24000','phanbontuchuoi','phanbon','phan-bon-gia-the-tu-chuoi','2021-06-04 08:40:59','2021-06-04 08:40:59','4','0','0','Pack');

INSERT INTO tbl_product (`id`,`name`,`image`,`category_product_id`,`quantity`,`desc`,`content`,`price`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`vendor_id`,`product_sold`,`persent_discount`,`unit`) VALUES ('23','Dịch Chuối','91a9f1cd8a88ef962b32d98e7d8f5c6561.jpg','7','0','<p>Dịch chuối đậm đặc thần dược cho phong lan</p>','<p>Dịch chuối đậm đặc thần dược cho phong lan</p>','51000','dichchuoi','dichchuoi','dich-chuoi','2021-06-04 08:43:05','2021-06-06 02:31:48','4','0','16','Chai 1l');


CREATE TABLE `tbl_price_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('1','34000','1','2021-03-16 21:17:50','2021-06-04 08:44:40');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('2','350000','3','2021-03-16 21:18:13','2021-06-05 22:52:01');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('3','24000','7','2021-05-29 14:03:46','2021-06-04 08:50:08');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('4','37900','8','2021-03-16 21:18:15','2021-06-04 08:35:53');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('5','24000','17','2021-05-23 15:29:30','2021-06-04 08:50:08');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('6','24000','18','2021-05-23 21:06:25','2021-06-04 08:50:08');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('7','24000','19','2021-05-23 21:12:28','2021-06-04 08:50:08');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('8','24000','20','2021-05-29 13:59:56','2021-06-04 08:50:08');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('9','24000','22','2021-06-04 08:40:59','2021-06-04 08:40:59');

INSERT INTO tbl_price_product (`id`,`price`,`id_product`,`created_at`,`updated_at`) VALUES ('10','51000','23','2021-06-04 08:43:05','2021-06-06 02:31:48');


CREATE TABLE `tbl_order_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `coupon` int(50) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_current` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('167','145','17',NULL,'3','2021-06-02 22:03:19','2021-06-02 22:03:19','c5e78c','kg','0');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('169','147','8',NULL,'1','2021-06-03 21:06:01','2021-06-03 21:06:01','c48e18','kg','0');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('170','148','8',NULL,'1','2021-06-03 21:12:33','2021-06-03 21:12:33','09e32b','kg','0');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('171','149','3',NULL,'2','2021-06-04 08:24:32','2021-06-04 08:24:32','3a937e','kg','0');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('172','150','8',NULL,'1','2021-06-04 08:32:11','2021-06-04 08:32:11','277a43','kg','0');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('173','151','3',NULL,'4','2021-06-05 22:52:01','2021-06-05 22:52:01','2093b4','kg','0');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('174','152','3',NULL,'1','2021-06-06 14:17:27','2021-06-06 14:17:27','aa396c','kg','350000');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('175','153','3',NULL,'1','2021-06-06 21:29:37','2021-06-06 21:29:37','7789e7','kg','350000');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('176','153','1','12','1','2021-06-06 21:29:38','2021-06-06 21:29:38','7789e7','kg','29920');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('177','157','20',NULL,'1','2021-06-09 13:03:20','2021-06-09 13:03:20','e1710e','cái','24000');

INSERT INTO tbl_order_detail (`id`,`order_id`,`product_id`,`coupon`,`soluong`,`created_at`,`updated_at`,`order_code`,`unit`,`price_current`) VALUES ('178','159','8',NULL,'2','2021-06-09 13:34:46','2021-06-09 13:34:46','12a6d9','kg','37900');


CREATE TABLE `tbl_order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pay` tinyint(4) NOT NULL DEFAULT 0,
  `cancel_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('145','2','150','72000','4','2021-06-02 22:03:19','2021-06-02 22:34:46','DH0000145','2021-06-02','3',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('147','1','153','37900','4','2021-06-03 21:06:01','2021-06-08 20:20:25','DH0000147','2021-06-03','1',NULL,'1',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('148','1','154','37900','1','2021-06-03 21:12:33','2021-06-03 21:12:33','DH0000148','2021-06-03','1',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('149','2','155','700000','4','2021-06-04 08:24:32','2021-06-08 20:21:28','DH0000149','2021-06-04','2',NULL,'1',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('150','2','156','37900','4','2021-06-04 08:32:11','2021-06-08 20:22:08','DH0000150','2021-06-04','1',NULL,'1',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('151',NULL,'157','1400000','4','2021-06-05 22:52:01','2021-06-08 20:20:59','DH0000151','2021-06-05','4',NULL,'1',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('152','1','159','350000','1','2021-06-06 14:17:27','2021-06-06 14:17:27','DH0000152','2021-06-06','1',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('153','1','160','379920','4','2021-06-06 21:29:37','2021-06-08 20:22:43','DH0000153','2021-06-06','2',NULL,'1',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('154','8','161','24000','1','2021-06-09 12:38:18','2021-06-09 12:38:18','DH0000154','2021-06-09','1',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('155','8','162','24000','1','2021-06-09 12:38:33','2021-06-09 12:38:33','DH0000155','2021-06-09','1',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('156','8','163','24000','1','2021-06-09 12:39:21','2021-06-09 12:39:21','DH0000156','2021-06-09','1',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('157',NULL,'164','24000','4','2021-06-09 13:03:20','2021-06-09 13:16:00','DH0000157','2021-06-09','1',NULL,'1',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('158',NULL,'165','96000','1','2021-06-09 13:25:37','2021-06-09 13:25:37','DH0000158','2021-06-09','4',NULL,'0',NULL);

INSERT INTO tbl_order (`id`,`customer_id`,`shipping_id`,`total`,`status`,`created_at`,`updated_at`,`order_code`,`order_date`,`quantity`,`coupon`,`status_pay`,`cancel_order`) VALUES ('159',NULL,'166','75800','4','2021-06-09 13:34:46','2021-06-09 16:11:44','DH0000159','2021-06-09','2',NULL,'1',NULL);


CREATE TABLE `tbl_inward_slip_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `inward_slip_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_import` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('52','17','28','10','10000','2021-06-02 02:01:03','2021-06-02 02:01:03','cái','2021-06-16');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('53','1','29','10','100000','2021-06-02 10:51:13','2021-06-02 10:51:13','cái','2021-06-16');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('54','8','30','12','30000','2021-06-03 21:05:21','2021-06-03 21:05:21','nải','2021-09-30');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('57','3','32','10','15000','2021-06-03 14:34:24','2021-06-03 14:34:24','Kg','2021-06-16');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('58','1','32','15','16600','2021-06-03 14:34:24','2021-06-03 14:34:24','Kg','2021-06-13');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('59','1','33','10','15000','2021-06-04 08:35:53','2021-06-04 08:35:53','Kg','2021-06-19');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('60','3','33','10','15000','2021-06-04 08:35:53','2021-06-04 08:35:53','Kg','2021-06-10');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('61','8','33','10','15000','2021-06-04 08:35:53','2021-06-04 08:35:53','Kg','2021-06-23');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('62','7','34','10','15000','2021-06-04 08:48:03','2021-06-04 08:48:03','cái','2021-06-16');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('63','17','34','10','15000','2021-06-04 08:48:03','2021-06-04 08:48:03','cái','2021-06-11');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('64','19','34','10','15000','2021-06-04 08:48:03','2021-06-04 08:48:03','cái','2021-06-17');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('65','18','34','10','15000','2021-06-04 08:48:03','2021-06-04 08:48:03','cái','2021-06-18');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('66','20','34','10','15000','2021-06-04 08:48:03','2021-06-04 08:48:03','cái','2021-06-24');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('67','1','35','20','20000','2021-06-10 10:06:05','2021-06-10 10:06:05','kg','2021-09-10');

INSERT INTO tbl_inward_slip_details (`id`,`product_id`,`inward_slip_id`,`quantity`,`price_import`,`created_at`,`updated_at`,`unit`,`expiration_date`) VALUES ('68','3','35','20','20000','2021-06-10 10:06:06','2021-06-10 10:06:06','kg','2021-09-10');


CREATE TABLE `tbl_inward_slip` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_quanlity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `date_input` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('28','4','4','1','100000','10','2021-06-02 02:01:03','2021-06-02 02:01:52','1','2021-06-17');

INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('29','4','2','3','1000000','10','2021-06-02 10:51:13','2021-06-04 08:44:39','1','2021-06-21');

INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('30','1','2','3','360000','12','2021-06-03 21:05:21','2021-06-03 21:05:21','1','2021-03-06');

INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('32','4','2','1','399000','25','2021-06-03 14:34:24','2021-06-03 14:37:09','1','2021-06-17');

INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('33','4','2','1','450000','30','2021-06-04 08:35:53','2021-06-04 08:35:53','1','2021-06-17');

INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('34','4','4','1','750000','50','2021-06-04 08:48:03','2021-06-04 08:50:08','1','2021-06-08');

INSERT INTO tbl_inward_slip (`id`,`user_id`,`vendor_id`,`warehouse_id`,`total_amount`,`total_quanlity`,`created_at`,`updated_at`,`status`,`date_input`) VALUES ('35','1','2','1','800000','40','2021-06-10 10:06:05','2021-06-10 10:06:05','1','2021-06-10');


CREATE TABLE `tbl_gallery` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_gallery (`id`,`name`,`image`,`product_id`,`created_at`,`updated_at`) VALUES ('5','du-du.jpg','download15.jpg','13','2021-05-12 15:54:07','2021-05-12 15:56:45');

INSERT INTO tbl_gallery (`id`,`name`,`image`,`product_id`,`created_at`,`updated_at`) VALUES ('7','du-du-huu-co-533x30045.jpg','du-du-huu-co-533x30045.jpg','13','2021-05-12 15:59:58','2021-05-12 15:59:58');

INSERT INTO tbl_gallery (`id`,`name`,`image`,`product_id`,`created_at`,`updated_at`) VALUES ('9','download58.jpg','download58.jpg','13','2021-05-21 21:19:03','2021-05-21 21:19:03');

INSERT INTO tbl_gallery (`id`,`name`,`image`,`product_id`,`created_at`,`updated_at`) VALUES ('10','whey-casein-complex75.png','whey-casein-complex75.png','8','2021-06-02 22:33:38','2021-06-02 22:33:38');

INSERT INTO tbl_gallery (`id`,`name`,`image`,`product_id`,`created_at`,`updated_at`) VALUES ('11','whey-casein-complex4.png','whey-casein-complex4.png','7','2021-06-02 22:35:34','2021-06-02 22:35:34');

INSERT INTO tbl_gallery (`id`,`name`,`image`,`product_id`,`created_at`,`updated_at`) VALUES ('13','matnachuoi_11967.jpg','matnachuoi_11967.jpg','7','2021-06-02 22:39:11','2021-06-02 22:39:11');


CREATE TABLE `tbl_feeship` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matp_id` int(11) NOT NULL,
  `maqh_id` int(11) NOT NULL,
  `xa_id` int(11) NOT NULL,
  `feeship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('1','96','967','32069','15000','2021-03-16 20:55:40','2021-03-16 20:55:40');

INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('2','96','968','32104','150000','2021-03-16 20:57:22','2021-03-16 20:57:28');

INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('3','83','835','29095','15000','2021-03-16 20:57:37','2021-03-16 20:57:37');

INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('4','96','967','32068','15000','2021-04-19 14:10:20','2021-04-19 14:10:20');

INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('5','94','944','31579','15000','2021-04-19 14:10:30','2021-04-19 14:10:30');

INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('6','95','958','31900','20000','2021-04-19 14:11:17','2021-06-03 09:39:17');

INSERT INTO tbl_feeship (`id`,`matp_id`,`maqh_id`,`xa_id`,`feeship`,`created_at`,`updated_at`) VALUES ('7','94','943','31534','15000','2021-06-03 09:39:39','2021-06-03 09:39:39');


CREATE TABLE `tbl_customer_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('14','1','2','2021-05-25 21:48:58','2021-05-25 21:48:58');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('16','1','4','2021-05-25 21:49:08','2021-05-25 21:49:08');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('17','1','5','2021-05-25 21:49:12','2021-05-25 21:49:12');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('18','2','2','2021-05-26 16:51:41','2021-05-26 16:51:41');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('19','1','8','2021-05-29 15:22:03','2021-05-29 15:22:03');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('21','1','19','2021-05-29 15:22:11','2021-05-29 15:22:11');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('22','2','3','2021-06-01 14:13:19','2021-06-01 14:13:19');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('23','2','8','2021-06-04 08:50:39','2021-06-04 08:50:39');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('24','2','8','2021-06-04 08:50:39','2021-06-04 08:50:39');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('25','1','3','2021-06-08 10:40:40','2021-06-08 10:40:40');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('26','1','7','2021-06-08 10:40:46','2021-06-08 10:40:46');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('27','8','7','2021-06-09 12:36:20','2021-06-09 12:36:20');

INSERT INTO tbl_customer_product (`id`,`customer_id`,`product_id`,`created_at`,`updated_at`) VALUES ('28','8','18','2021-06-09 12:36:22','2021-06-09 12:36:22');


CREATE TABLE `tbl_customer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('1','đức nguyễn trung','ductrungthug@gmail.com','$2y$10$pmaiaGVW4lURZXL6oj.oW.SsVBPa2Apm7L.p66A1Y2CP/V2C044.6','0386258039','2021-05-17 21:49:00','2021-05-17 21:49:00','số 4 lố 236 khut3, thành tô, hải an, hải phòng',NULL);

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('2','ManhLe','manhdzzd@gmail.com','$2y$10$oelJcjnFPcqr/3sRHrHXyuMQxptTwP0mNyApzGGKcfNz3/CWuKkkm','0329294747','2021-05-18 16:22:54','2021-05-21 23:51:53','Thái Thụy','lbI9XLGYLgOdRPXI6KtP');

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('3','Nguyễn Dương Quá','duongqua@gmail.com','$2y$10$iR3Hjv1a/6aRY3EE3YMk5eVvNNZjBrHdOwxMtJaJbBz.WFU0k0l0m','0386258039','2021-05-21 09:19:11','2021-05-21 09:19:11','số 4 lố 236 khut3, thành tô, hải an, hải phòng',NULL);

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('4','đức nguyễn','duc74212@st.vimaru.edu.vn','$2y$10$Ujin902r8Uzvrd0vQfsVPOgApBaWsAZSHmUv0XSeDzqlTsKl7LiQS','0386258039','2021-05-22 00:09:26','2021-05-22 00:28:58','số 4 lố 236 khut3, thành tô, hải an, hải phòng','nCZXGeGKV62L8w9tUP31');

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('5','Mạnh Lê Sỹ Đức','manh73879@st.vimaru.edu.vn',NULL,NULL,'2021-05-23 22:14:31','2021-05-23 22:14:31',NULL,NULL);

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('6','Dat Thanh','dat75849@st.vimaru.edu.vn',NULL,NULL,'2021-05-31 22:16:50','2021-05-31 22:16:50',NULL,NULL);

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('7','lung thị linh','linh@gmail.com','$2y$10$bgXRBuSMcX6gAMvJ2N54w.fOxtH0qwscgT2U51gWXstxfKXRIbhcG','0386258039','2021-06-05 00:13:29','2021-06-05 00:13:29','số 4 lố 236 khut3, thành tô, hải an, hải phòng',NULL);

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('8','Đại Đức','thichgaytoi@gmail.com',NULL,NULL,'2021-06-09 12:36:06','2021-06-09 12:36:06',NULL,NULL);

INSERT INTO tbl_customer (`id`,`name`,`email`,`password`,`phone`,`created_at`,`updated_at`,`address`,`customer_token`) VALUES ('9','Elizabeth Chiquitoez','koowtswenm_1574355019@tfbnw.net',NULL,NULL,'2021-06-10 08:33:26','2021-06-10 08:33:26',NULL,NULL);


CREATE TABLE `tbl_coupon` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanlity` int(11) NOT NULL,
  `method` tinyint(4) NOT NULL,
  `value_sale` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coupon_date_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_date_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_coupon (`id`,`name`,`code`,`quanlity`,`method`,`value_sale`,`created_at`,`updated_at`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES ('1','giảm giá covid','covid99','107','1','300000','2021-05-03 16:06:59','2021-05-26 11:28:20','2021-05-11','2021-06-11','1');

INSERT INTO tbl_coupon (`id`,`name`,`code`,`quanlity`,`method`,`value_sale`,`created_at`,`updated_at`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES ('2','Con bố Đức','conboduc','12','2','20','2021-05-14 16:14:20','2021-06-05 15:14:50','2021-05-11','2021-05-12','0');

INSERT INTO tbl_coupon (`id`,`name`,`code`,`quanlity`,`method`,`value_sale`,`created_at`,`updated_at`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES ('3','noel 2021','noelvuituoi','12','2','20','2021-05-21 17:37:22','2021-05-21 22:42:47','2021-05-11','2021-05-19','0');

INSERT INTO tbl_coupon (`id`,`name`,`code`,`quanlity`,`method`,`value_sale`,`created_at`,`updated_at`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES ('4','đức đẹp zai','ducdz','12','2','20','2021-05-21 22:24:00','2021-05-30 20:30:51','2021-05-21','2021-05-29','1');

INSERT INTO tbl_coupon (`id`,`name`,`code`,`quanlity`,`method`,`value_sale`,`created_at`,`updated_at`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES ('5','nguyễn trung đức','manhloz','15','1','300000','2021-05-30 20:49:30','2021-05-30 20:49:30','2021-05-02','2021-05-31','1');


CREATE TABLE `tbl_category_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_category_product (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`image`) VALUES ('2','Chuối Tươi Sạch','<p>Chuối tươi sạch&nbsp;&nbsp;</p>','chuoi, chuoisach','chuoi, chuoisach','chuoi-tuoi-sach','2021-03-16 21:15:17','2021-05-29 14:53:38','chuoi-viet-xuat-khau80.jpg');

INSERT INTO tbl_category_product (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`image`) VALUES ('4','Sản Phẩm Làm Đẹp Từ Chuối','<p>Sản phẩm l&agrave;m đẹp từ Chuối sạch&nbsp;</p>','chuoi','chuoi','san-pham-lam-dep-tu-chuoi','2021-05-11 15:32:50','2021-05-30 01:16:12','lam-dep-tu-chuoi30.jpg');

INSERT INTO tbl_category_product (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`image`) VALUES ('5','Sản Phẩm Chế Biến Từ Chuối','<p>Sản phẩm chế biến từ chuối&nbsp;</p>','chuoi','chuoi','san-pham-che-bien-tu-chuoi','2021-05-11 15:34:55','2021-05-30 01:17:13','san-pham-tu-chuoi49.jpg');

INSERT INTO tbl_category_product (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`image`) VALUES ('7','Phân bón giã thể từ Chuối','<p>Ph&acirc;n b&oacute;n gi&atilde; thể từ Chuối</p>','chuoi','chuoi','phan-bon-gia-the-tu-chuoi','2021-05-22 22:46:59','2021-05-30 01:18:49','phan-bon-tu-chuoi98.jpg');

INSERT INTO tbl_category_product (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`,`image`) VALUES ('8','Máy sản xuất Chuối','<p>M&aacute;y sản xuất Chuối</p>','chuoi','chuoi','may-san-xuat-chuoi','2021-05-22 22:47:28','2021-05-30 01:21:35','may-chuoi43.jpg');


CREATE TABLE `tbl_category_post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO tbl_category_post (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`) VALUES ('1','Tin tuyển dụng','<p>Th&ocirc;ng tin tuyển dụng tại Chuối Việt Nam</p>','nongsansach, nongsanvietnam, chuoivietnam','nongsansach, nongsanvietnam, chuoivietnam','tin-tuyen-dung','2021-03-16 21:05:42','2021-05-19 19:45:59');

INSERT INTO tbl_category_post (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`) VALUES ('2','Ngành nông sản sạch','<p>N&ocirc;ng Sản Sạch Việt Nam</p>','nongsansach, nongsanvietnam, chuoivietnam','nongsansach, nongsanvietnam, chuoivietnam','nganh-nong-san-sach','2021-03-16 21:07:08','2021-05-19 19:45:21');

INSERT INTO tbl_category_post (`id`,`name`,`desc`,`meta_title`,`meta_keywords`,`slug`,`created_at`,`updated_at`) VALUES ('6','Góc Chia Sẻ','<p>gocchiase</p>','gocchiase','gocchiase','goc-chia-se','2021-06-03 22:10:17','2021-06-03 22:10:17');


CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles (`id`,`name`,`created_at`,`updated_at`) VALUES ('1','admin',NULL,NULL);

INSERT INTO roles (`id`,`name`,`created_at`,`updated_at`) VALUES ('2','author',NULL,NULL);

INSERT INTO roles (`id`,`name`,`created_at`,`updated_at`) VALUES ('3','user',NULL,NULL);


CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('117ab3af-f599-4e85-8cdf-27e31363ab3e','App\Notifications\NotificationAdmin','App\Models\User','1','{"order_id":152,"custommerName":"\u0111\u1ee9c nguy\u1ec5n trung"}',NULL,'2021-06-06 14:17:30','2021-06-06 14:17:30');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('3e090617-3e39-4e41-a274-c1c90e1b2188','App\Notifications\NotificationAdmin','App\Models\User','1','{"message":"S\u1ea3n ph\u1ea9m \u0111\u00e3 h\u1ebft h\u1ea1n:  Chu\u1ed1i S\u1ee9 ( Pack 700g ), Chu\u1ed1i s\u1ea5y n\u0103ng l\u01b0\u1ee3ng m\u1eb7t tr\u1eddi,"}',NULL,'2021-06-04 02:21:05','2021-06-04 02:21:05');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('5188c2b5-9b9e-4985-bf38-b6f3d7d79a12','App\Notifications\NotificationAdmin','App\Models\User','5','{"order_id":157,"custommerName":"manh le"}',NULL,'2021-06-09 13:03:27','2021-06-09 13:03:27');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('5a46eabc-466e-45c9-b3b7-22450774db8c','App\Notifications\NotificationAdmin','App\Models\User','4','{"message":"S\u1ea3n ph\u1ea9m \u0111\u00e3 h\u1ebft h\u1ea1n:  Chu\u1ed1i S\u1ee9 ( Pack 700g ), Chu\u1ed1i s\u1ea5y n\u0103ng l\u01b0\u1ee3ng m\u1eb7t tr\u1eddi,"}',NULL,'2021-06-04 02:21:05','2021-06-04 02:21:05');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('60e6d443-81b7-4e43-8004-ef70debd1e57','App\Notifications\NotificationAdmin','App\Models\User','1','{"order_id":151,"custommerName":"Dat Thanh"}',NULL,'2021-06-05 22:52:02','2021-06-05 22:52:02');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('638c7e4f-960b-4b06-a4d6-e7f35d0f496a','App\Notifications\NotificationAdmin','App\Models\User','5','{"order_id":159,"custommerName":"manh le"}',NULL,'2021-06-09 13:34:49','2021-06-09 13:34:49');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('6f0055e5-6ec7-419d-b1ff-1fe16c4855ec','App\Notifications\NotificationAdmin','App\Models\User','5','{"message":"S\u1ea3n ph\u1ea9m h\u1ebft h\u1ea1n sau 10 ng\u00e0y: Chu\u1ed1i DOLE,"}',NULL,'2021-06-04 02:21:05','2021-06-04 02:21:05');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('704d2a13-c8d5-48d7-9135-04200db4dad8','App\Notifications\NotificationAdmin','App\Models\User','4','{"order_id":157,"custommerName":"manh le"}',NULL,'2021-06-09 13:03:27','2021-06-09 13:03:27');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('93d7896f-6e9f-4a6d-adfa-9734cff2e46f','App\Notifications\NotificationAdmin','App\Models\User','5','{"order_id":152,"custommerName":"\u0111\u1ee9c nguy\u1ec5n trung"}',NULL,'2021-06-06 14:17:30','2021-06-06 14:17:30');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('96900fd2-49d6-4167-adaf-4285a0b4439e','App\Notifications\NotificationAdmin','App\Models\User','5','{"order_id":151,"custommerName":"Dat Thanh"}',NULL,'2021-06-05 22:52:02','2021-06-05 22:52:02');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('9f5ec4c3-40bc-4869-bc69-6697ea9071a7','App\Notifications\NotificationAdmin','App\Models\User','4','{"message":"S\u1ea3n ph\u1ea9m h\u1ebft h\u1ea1n sau 10 ng\u00e0y: Chu\u1ed1i DOLE,"}',NULL,'2021-06-04 02:21:05','2021-06-04 02:21:05');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('a5f035fa-6e5e-4df2-a3ae-28b8c31044ba','App\Notifications\NotificationAdmin','App\Models\User','5','{"message":"S\u1ea3n ph\u1ea9m \u0111\u00e3 h\u1ebft h\u1ea1n:  Chu\u1ed1i S\u1ee9 ( Pack 700g ), Chu\u1ed1i s\u1ea5y n\u0103ng l\u01b0\u1ee3ng m\u1eb7t tr\u1eddi,"}',NULL,'2021-06-04 02:21:06','2021-06-04 02:21:06');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('b7bf952d-a42a-4f70-af9a-f0c27bdc9f2e','App\Notifications\NotificationAdmin','App\Models\User','4','{"order_id":153,"custommerName":"\u0111\u1ee9c nguy\u1ec5n trung"}',NULL,'2021-06-06 21:29:41','2021-06-06 21:29:41');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('c3b4f6a7-89f4-48fd-a57a-c5c2051379e9','App\Notifications\NotificationAdmin','App\Models\User','5','{"order_id":153,"custommerName":"\u0111\u1ee9c nguy\u1ec5n trung"}',NULL,'2021-06-06 21:29:41','2021-06-06 21:29:41');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('c5780a2d-deca-4f92-a113-eef8cc949b34','App\Notifications\NotificationAdmin','App\Models\User','1','{"order_id":153,"custommerName":"\u0111\u1ee9c nguy\u1ec5n trung"}',NULL,'2021-06-06 21:29:40','2021-06-06 21:29:40');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('c6b63cdb-b52c-4084-afa2-3c1c44ea9c9c','App\Notifications\NotificationAdmin','App\Models\User','1','{"order_id":157,"custommerName":"manh le"}',NULL,'2021-06-09 13:03:27','2021-06-09 13:03:27');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('d24e8d00-ba45-4df9-94d5-e0d22de09c13','App\Notifications\NotificationAdmin','App\Models\User','5','{"order_id":150,"custommerName":"ManhLe"}',NULL,'2021-06-04 08:32:12','2021-06-04 08:32:12');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('d76602b1-bcf1-4386-9204-35530ad6ad1c','App\Notifications\NotificationAdmin','App\Models\User','4','{"order_id":159,"custommerName":"manh le"}',NULL,'2021-06-09 13:34:49','2021-06-09 13:34:49');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('eb4c1bae-6767-415e-b7a6-9b64f72f1cb5','App\Notifications\NotificationAdmin','App\Models\User','1','{"message":"S\u1ea3n ph\u1ea9m h\u1ebft h\u1ea1n sau 10 ng\u00e0y: Chu\u1ed1i DOLE,"}',NULL,'2021-06-04 02:21:05','2021-06-04 02:21:05');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('f899dcb8-54f3-4470-aeda-388101d4e1d5','App\Notifications\NotificationAdmin','App\Models\User','1','{"order_id":150,"custommerName":"ManhLe"}',NULL,'2021-06-04 08:32:12','2021-06-04 08:32:12');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('fab5058f-c0d9-458b-bd2f-e40af43ad237','App\Notifications\NotificationAdmin','App\Models\User','1','{"order_id":159,"custommerName":"manh le"}',NULL,'2021-06-09 13:34:49','2021-06-09 13:34:49');

INSERT INTO notifications (`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) VALUES ('fb29f976-96da-44e9-9314-a246e086a4fb','App\Notifications\NotificationAdmin','App\Models\User','4','{"order_id":152,"custommerName":"\u0111\u1ee9c nguy\u1ec5n trung"}',NULL,'2021-06-06 14:17:30','2021-06-06 14:17:30');


CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('117','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('118','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('119','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('120','2021_03_03_103626_add_tbl_category_product','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('121','2021_03_04_103309_add_tbl_product','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('122','2021_03_04_190914_add_tbl_feeship','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('123','2021_03_05_152858_create_post_table','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('124','2021_03_05_153057_create_categories_table','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('125','2021_03_06_210348_add_table_roles','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('126','2021_03_06_210455_add_table_users_roles','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('127','2021_03_09_152613_add_new_table_slider','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('128','2021_03_10_202934_add_table_coupon','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('129','2021_03_16_200718_create_tbl_customer','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('130','2021_03_16_200838_create_tbl_order','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('131','2021_03_16_201108_create_tbl_order_detail','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('132','2021_03_16_201412_create_tbl_shipping','1');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('133','2021_03_16_211035_alter_add_column_imgae_tbl_post','2');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('134','2021_04_26_195828_add_tbl_vendors','3');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('135','2021_04_26_195916_add_tbl_inward_slip','3');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('136','2021_04_26_195949_add_tbl_inward_slip_details','3');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('137','2021_04_26_200017_add_tbl_warehouse','3');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('138','2021_04_26_200048_add_tbl_warehouse_product','3');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('139','2021_04_26_215315_alter_column_tbl_product_vendor_id','4');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('140','2021_05_04_210806_alter_tbl_inward_slip_column_status','5');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('141','2021_05_07_094452_alter_add_column_date_in_tbl_inward_slip','6');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('143','2021_05_08_095454_alter_column_unit_in_tbl_inward_slip','7');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('144','2021_05_11_163939_alter_column_product_sold_in_tbl_product','8');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('145','2021_05_12_150044_add_tbl_gallery','9');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('146','2021_05_14_164748_alter_city_in_tbl_shipping','10');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('147','2021_05_14_111542_alter_view_in_tbl_post','11');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('148','2021_05_15_023813_alter_persent_discount_tbl_product','11');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('149','2021_05_15_143105_alter_city_in_tbl_shipping','12');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('150','2021_05_15_154410_alter_unit_in_tbl_product','12');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('151','2021_05_17_195152_alter_address_in_tbl_customer','13');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('152','2021_05_18_171240_alter_order_code_in_tbl_order','14');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('153','2021_05_18_171313_alter_order_code_in_tbl_order_detail','14');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('154','2021_05_18_171800_alter_order_date__in_tbl_order','15');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('155','2021_05_18_171926_alter_quantity_in_tbl_order','15');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('158','2021_05_18_190915_alter_unit_in_tbl_order_detail','16');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('159','2021_05_18_220226_alter_coupon_in_tbl_order','17');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('160','2021_05_19_172452_alter_table_rate_tbl_coupon','18');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('161','2021_05_20_142047_alter_table_status_pay_tbl_order','19');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('162','2021_05_21_170953_alter_coupon_date_start_in_tbl_coupon','20');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('163','2021_05_21_171008_alter_coupon_date_end_in_tbl_coupon','20');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('164','2021_05_21_174000_alter_coupon_status_in_tbl_coupon','21');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('165','2021_05_21_232003_alter_table_cancel_note_tbl_order','22');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('166','2021_05_21_231935_alter_customer_token_in_tbl_customer','23');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('167','2021_05_21_232540_alter_table_cancel_note_tbl_order','24');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('168','2021_05_21_233027_alter_table_cancel_note_tbl_order','25');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('169','2021_05_22_102345_tbl_order_warehouse','26');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('170','2021_05_23_090409_add_tbl_soical','27');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('171','2021_05_23_232532_tbl_repost','28');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('172','2021_05_25_202041_add_tbl_customer_product','29');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('173','2021_05_27_162024_alter_tbl_repost_add_mouth_repost','30');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('174','2021_05_27_214909_create_notifications_table','31');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('175','2021_05_28_210732_alter_column_imgae_in_tbl_category_product','32');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('176','2021_05_31_164528_add_tbl_visitors','33');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('177','2021_06_01_143821_alter_tbl_inward_slip_col_expiration_date','34');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('178','2021_06_01_144309_alter_tbl_inward_slip_col_expiration_date','35');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('179','2021_06_01_145302_alter_tbl_inward_slip_col_expiration_date','36');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('180','2021_06_02_014442_alter_tbl_inward_slip_detail_col_expiration_date','37');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('181','2021_06_02_014721_alter_tbl_inward_slip_detail_col_expiration_date','38');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('182','2021_06_02_134416_alter_tbl_warehouse_product_col_status','39');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('184','2021_06_03_144926_alter_feeship_in_tbl_order','40');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('185','2021_06_05_225101_create_tbl_price_product','40');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('186','2021_06_06_141038_alter_column_price_current_in_tbl_order_detail','41');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('187','2021_06_06_143826_create_tbl_return_voucher','42');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('188','2021_06_06_145055_create_tbl_return_voucher_detail','42');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('189','2021_06_06_191942_alter_column_return_quantity_in_tbl_return_voucher_detail','43');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('190','2021_06_06_214453_alter_add_column_return_warehouse_in_tbl_return_voucher_detail','44');

INSERT INTO migrations (`id`,`migration`,`batch`) VALUES ('191','2021_06_07_012757_alter_tbl_warehouse_product_col_quantiy_cancel','45');
