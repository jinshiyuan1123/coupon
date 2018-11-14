/*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50519
Source Host           : localhost:3306
Source Database       : gy

Target Server Type    : MYSQL
Target Server Version : 50519
File Encoding         : 65001

Date: 2018-11-07 13:03:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activities`
-- ----------------------------
DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '副标题',
  `title_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '列表图片',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '活动说明',
  `type` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1返水2红利3充值',
  `money` decimal(8,2) DEFAULT NULL COMMENT '活动所需达到的金额',
  `rate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '赠送比例',
  `gift_limit_money` decimal(8,2) DEFAULT NULL COMMENT '赠送的上限金额',
  `date_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动时间描述',
  `start_at` timestamp NULL DEFAULT NULL COMMENT '活动开始时间',
  `end_at` timestamp NULL DEFAULT NULL COMMENT '活动截止时间',
  `on_line` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0上线1下线',
  `is_hot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常1热门',
  `sort` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `title_content` text COLLATE utf8mb4_unicode_ci COMMENT '标题内容',
  `rule_content` text COLLATE utf8mb4_unicode_ci COMMENT '活动规则',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of activities
-- ----------------------------

-- ----------------------------
-- Table structure for `admin_action_money_log`
-- ----------------------------
DROP TABLE IF EXISTS `admin_action_money_log`;
CREATE TABLE `admin_action_money_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '管理员ID',
  `member_id` int(11) NOT NULL COMMENT '会员ID',
  `old_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '原余额',
  `new_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '修改后的余额',
  `old_fs_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '原返水余额',
  `new_fs_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '修改后的返水余额',
  `remark` text COLLATE utf8mb4_unicode_ci COMMENT '描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_action_money_log
-- ----------------------------

-- ----------------------------
-- Table structure for `api`
-- ----------------------------
DROP TABLE IF EXISTS `api`;
CREATE TABLE `api` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `api_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '平台名称',
  `api_title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '平台描述名称',
  `api_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '请求的基础域名',
  `api_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'key 值',
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1',
  `api_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '余额',
  `is_demo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正式 1测试',
  `prefix` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '账号前缀',
  `on_line` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0上线1下线',
  `sort` int(10) unsigned NOT NULL DEFAULT '10' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of api
-- ----------------------------

-- ----------------------------
-- Table structure for `api_activity`
-- ----------------------------
DROP TABLE IF EXISTS `api_activity`;
CREATE TABLE `api_activity` (
  `api_id` int(10) unsigned NOT NULL,
  `activity_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of api_activity
-- ----------------------------

-- ----------------------------
-- Table structure for `bank_cards`
-- ----------------------------
DROP TABLE IF EXISTS `bank_cards`;
CREATE TABLE `bank_cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_no` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡号',
  `card_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '卡类型 储蓄卡',
  `bank_id` int(11) NOT NULL COMMENT '银行ID',
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '办卡预留手机号',
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '持卡人姓名',
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '持卡人姓名',
  `on_line` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 上线1下线',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bank_cards
-- ----------------------------

-- ----------------------------
-- Table structure for `black_list_ip`
-- ----------------------------
DROP TABLE IF EXISTS `black_list_ip`;
CREATE TABLE `black_list_ip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP 地址',
  `remark` text COLLATE utf8mb4_unicode_ci COMMENT '备注',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of black_list_ip
-- ----------------------------

-- ----------------------------
-- Table structure for `coupons`
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `type` int(4) NOT NULL DEFAULT '1' COMMENT '1=满减 2=活动 3=免单',
  `couponid` int(11) NOT NULL COMMENT '优惠劵id',
  `couponstitle` varchar(50) NOT NULL COMMENT '优惠券名称',
  `businessid` int(11) NOT NULL COMMENT '商家id',
  `businessname` varchar(100) NOT NULL COMMENT '商家名称',
  `term` int(11) NOT NULL DEFAULT '0' COMMENT '使用条件',
  `decrease` int(10) NOT NULL DEFAULT '0' COMMENT '折扣',
  `begintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '开始时间/失效时间',
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '结束时间',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0=审核中 1=未使用 2=已使用 3=失效',
  `info` text COMMENT '使用说明',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupons
-- ----------------------------
INSERT INTO `coupons` VALUES ('3', '1252', '1', '5', '满宝云吞', '1253', '李四光', '999', '50', '2018-10-14 04:22:22', '2018-10-30 23:59:59', '2', '测试内容', '2018-09-25 17:35:13', '2018-09-25 17:35:18');

-- ----------------------------
-- Table structure for `coupons_business`
-- ----------------------------
DROP TABLE IF EXISTS `coupons_business`;
CREATE TABLE `coupons_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL DEFAULT '1' COMMENT '1=满减 2=活动 3=免单',
  `application` int(4) NOT NULL DEFAULT '0' COMMENT '0=虚拟 1=实物',
  `couponstitle` varchar(255) DEFAULT NULL COMMENT '优惠券标题',
  `businessid` int(11) NOT NULL COMMENT '商家id',
  `businessname` varchar(150) DEFAULT NULL COMMENT '商家名称',
  `term` int(11) NOT NULL DEFAULT '0' COMMENT '使用条件',
  `decrease` int(10) NOT NULL DEFAULT '0' COMMENT '折扣',
  `begintime` timestamp NULL DEFAULT NULL COMMENT '开始时间/失效时间',
  `endtime` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0=审核中 1=通过 2=审核失败',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info` text COMMENT '介绍',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupons_business
-- ----------------------------
INSERT INTO `coupons_business` VALUES ('4', '1', '0', '测试优惠券', '1253', '李四光', '900', '100', '2018-09-30 04:00:19', '2018-09-30 05:00:22', '1', '2018-09-30 03:00:26', '2018-09-30 03:00:31', '就是计算机技术', '123456', '123465489');
INSERT INTO `coupons_business` VALUES ('5', '1', '0', '满宝云吞', '1253', null, '999', '50', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:21:25', '2018-09-30 04:21:25', '测试内容', null, null);
INSERT INTO `coupons_business` VALUES ('6', '1', '0', '麻辣烫福利', '1253', null, '100', '5', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:27:39', '2018-10-14 06:05:47', '1', null, null);
INSERT INTO `coupons_business` VALUES ('7', '1', '0', '10月', '1253', null, '60', '10', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:35:25', '2018-09-30 04:35:25', '2', null, null);
INSERT INTO `coupons_business` VALUES ('8', '1', '0', '测试审核', '1253', null, '50', '1', '2018-10-13 00:00:00', '2018-10-31 23:59:59', '1', '2018-10-14 04:33:56', '2018-10-14 04:34:06', '使用说明的', null, null);

-- ----------------------------
-- Table structure for `coupons_miandan`
-- ----------------------------
DROP TABLE IF EXISTS `coupons_miandan`;
CREATE TABLE `coupons_miandan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `businessname` varchar(255) DEFAULT NULL COMMENT '商家名称',
  `term` int(11) NOT NULL DEFAULT '0' COMMENT '使用条件',
  `decrease` int(10) NOT NULL DEFAULT '0' COMMENT '折扣',
  `begintime` timestamp NULL DEFAULT NULL COMMENT '开始时间/失效时间',
  `endtime` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0=未上架 1=上架',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info` text COMMENT '介绍',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `score` int(11) DEFAULT '0' COMMENT '所需积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupons_miandan
-- ----------------------------
INSERT INTO `coupons_miandan` VALUES ('4', '标题', '测试优惠券', '900', '100', '2018-09-30 04:00:19', '2018-09-30 05:00:22', '1', '2018-09-30 03:00:26', '2018-09-30 03:00:31', '就是计算机技术', '123456', '123465489', '600');
INSERT INTO `coupons_miandan` VALUES ('5', '标题', '满宝云吞', '999', '50', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:21:25', '2018-09-30 04:21:25', '测试内容', '44444', '999', '250');
INSERT INTO `coupons_miandan` VALUES ('6', '标题', '麻辣烫福利', '100', '5', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:27:39', '2018-09-30 04:27:39', null, '44444', '777', '300');
INSERT INTO `coupons_miandan` VALUES ('7', '标题', '肯德基', '60', '10', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:35:25', '2018-09-30 04:35:25', null, '44444', '6666', '700');

-- ----------------------------
-- Table structure for `coupons_miandanuser`
-- ----------------------------
DROP TABLE IF EXISTS `coupons_miandanuser`;
CREATE TABLE `coupons_miandanuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员id',
  `couponsmiandanid` int(11) DEFAULT NULL COMMENT '免单劵id',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `businessname` varchar(255) DEFAULT NULL COMMENT '商家名称',
  `term` int(11) NOT NULL DEFAULT '0' COMMENT '使用条件',
  `decrease` int(10) NOT NULL DEFAULT '0' COMMENT '折扣',
  `begintime` timestamp NULL DEFAULT NULL COMMENT '开始时间/失效时间',
  `endtime` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0=未使用 1=已使用',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info` text COMMENT '介绍',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `score` int(11) DEFAULT '0' COMMENT '所需积分',
  `code` varchar(255) DEFAULT NULL COMMENT '验证码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupons_miandanuser
-- ----------------------------
INSERT INTO `coupons_miandanuser` VALUES ('4', '1252', '7', '1', '2', '900', '100', '2018-09-30 04:00:19', '2018-09-30 05:00:22', '1', '2018-09-30 03:00:26', '2018-09-30 03:00:31', '就是计算机技术', '123456', '123465489', '600', 'fhdsgf');
INSERT INTO `coupons_miandanuser` VALUES ('5', '1252', '7', '1', '2', '999', '50', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:21:25', '2018-09-30 04:21:25', '测试内容', null, null, '250', 'mkiku');
INSERT INTO `coupons_miandanuser` VALUES ('6', '1252', '7', '1', '2', '100', '5', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:27:39', '2018-09-30 04:27:39', null, null, null, '300', 'bdert');
INSERT INTO `coupons_miandanuser` VALUES ('7', '1252', '7', '1', '2', '60', '10', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '1', '2018-09-30 04:35:25', '2018-09-30 04:35:25', null, null, null, '700', 'rdrhgr');
INSERT INTO `coupons_miandanuser` VALUES ('8', '1252', '7', '1', '肯德基', '60', '10', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '0', '2018-09-30 14:30:40', '2018-09-30 14:30:40', null, '44444', '6666', '700', 'sergh');
INSERT INTO `coupons_miandanuser` VALUES ('9', '1253', '7', '1', '肯德基', '60', '10', '2018-09-14 00:00:00', '2018-10-30 23:59:59', '0', '2018-09-30 16:40:07', '2018-10-17 15:37:56', null, '44444', '6666', '700', 'etdgh');

-- ----------------------------
-- Table structure for `coupons_shop`
-- ----------------------------
DROP TABLE IF EXISTS `coupons_shop`;
CREATE TABLE `coupons_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shoptitle` varchar(255) DEFAULT NULL COMMENT '商品标题',
  `score` int(11) DEFAULT '0' COMMENT '所需积分',
  `imgurl` varchar(255) DEFAULT '/wap/images/shop.png' COMMENT '缩略图路径',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `info` text COMMENT '介绍',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0=未上架 1=上架',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupons_shop
-- ----------------------------
INSERT INTO `coupons_shop` VALUES ('4', '笔记本一代', '600', '/wap/images/shop.png', '123456', '123465489', '就是计算机技术', '1', '2018-09-30 03:00:26', '2018-09-30 03:00:31');
INSERT INTO `coupons_shop` VALUES ('5', '笔记本二代', '250', '/wap/images/shop.png', '44444', '999', '测试内容', '1', '2018-09-30 04:21:25', '2018-09-30 04:21:25');
INSERT INTO `coupons_shop` VALUES ('6', '笔记本三代', '300', '/wap/images/shop.png', '44444', '777', '测试内容', '1', '2018-09-30 04:27:39', '2018-09-30 04:27:39');
INSERT INTO `coupons_shop` VALUES ('7', '笔记本四代', '700', '/wap/images/shop.png', '44444', '6666', '测试内容', '1', '2018-09-30 04:35:25', '2018-09-30 04:35:25');
INSERT INTO `coupons_shop` VALUES ('8', 'cccc', '1000', '/uploads/2018-10-17/0f256f373c999644d2821aec14ce20f9a91ad6a3.gif', null, null, '999', '0', '2018-10-17 16:25:29', '2018-10-17 16:32:38');

-- ----------------------------
-- Table structure for `coupons_shopuser`
-- ----------------------------
DROP TABLE IF EXISTS `coupons_shopuser`;
CREATE TABLE `coupons_shopuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员id',
  `couponsshopid` int(11) DEFAULT NULL COMMENT '商品id',
  `shoptitle` varchar(255) DEFAULT NULL COMMENT '商家名称',
  `score` int(11) DEFAULT '0' COMMENT '所需积分',
  `imgurl` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `info` text COMMENT '介绍',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0=审核中 1=已发货',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '发货信息',
  `orderno` varchar(255) DEFAULT NULL COMMENT '物流名称/单号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupons_shopuser
-- ----------------------------
INSERT INTO `coupons_shopuser` VALUES ('9', '1252', '7', '笔记本四代', '700', '/wap/images/shop.png', '44444', '6666', null, '1', '2018-09-30 15:50:05', '2018-10-17 17:14:53', null, '申通 1234567854');
INSERT INTO `coupons_shopuser` VALUES ('10', '1253', '7', '笔记本四代', '700', '/wap/images/shop.png', '44444', '6666', '测试内容', '1', '2018-10-17 18:49:13', '2018-10-17 18:49:44', null, '申通 9855284415');

-- ----------------------------
-- Table structure for `daili_money_log`
-- ----------------------------
DROP TABLE IF EXISTS `daili_money_log`;
CREATE TABLE `daili_money_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `yl_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '盈利情况',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_month` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of daili_money_log
-- ----------------------------

-- ----------------------------
-- Table structure for `dianzhan`
-- ----------------------------
DROP TABLE IF EXISTS `dianzhan`;
CREATE TABLE `dianzhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `momentsid` int(11) NOT NULL COMMENT '动态id',
  `uid` int(11) NOT NULL COMMENT '点赞会员id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dianzhan
-- ----------------------------
INSERT INTO `dianzhan` VALUES ('66', '17', '1252', '2018-09-28 18:15:05', '2018-09-28 18:15:05');
INSERT INTO `dianzhan` VALUES ('71', '18', '1253', '2018-09-28 22:24:48', '2018-09-28 22:24:48');
INSERT INTO `dianzhan` VALUES ('73', '17', '1253', '2018-09-29 10:01:12', '2018-09-29 10:01:12');
INSERT INTO `dianzhan` VALUES ('70', '16', '1253', '2018-09-28 20:51:22', '2018-09-28 20:51:22');
INSERT INTO `dianzhan` VALUES ('47', '15', '1253', '2018-09-28 16:58:32', '2018-09-28 16:58:32');
INSERT INTO `dianzhan` VALUES ('77', '19', '1253', '2018-10-17 19:17:26', '2018-10-17 19:17:26');

-- ----------------------------
-- Table structure for `dividend`
-- ----------------------------
DROP TABLE IF EXISTS `dividend`;
CREATE TABLE `dividend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `member_id` int(11) NOT NULL COMMENT '用户ID',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '转换类型 1充值红利2平台红利3返水',
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `before_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '发生前的金额',
  `after_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '发生后的金额',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '备注',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of dividend
-- ----------------------------

-- ----------------------------
-- Table structure for `drawing`
-- ----------------------------
DROP TABLE IF EXISTS `drawing`;
CREATE TABLE `drawing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '交易流水号',
  `member_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '充值人名称、昵称',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '提款金额',
  `payment_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '账户 支付宝账户 微信账户 银行卡号',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1待确认2成功3失败',
  `before_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '提款前金额',
  `after_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '提款后金额',
  `score` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '积分',
  `counter_fee` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '手续费',
  `fail_reason` text COLLATE utf8mb4_unicode_ci COMMENT '失败原因',
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '银行名称',
  `bank_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '银行卡号',
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '开户地址',
  `confirm_at` timestamp NULL DEFAULT NULL COMMENT '确认提款成功时间',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of drawing
-- ----------------------------
INSERT INTO `drawing` VALUES ('2', '20180930063307cxIC8', '1253', '李四光', '1000.00', null, '622222222222222222', '2', '0.00', '0.00', '0.00', '0.00', null, '广发银行', '622222222222222222', '深圳', '2018-10-12 12:02:09', '0', '2018-09-30 06:33:07', '2018-10-12 12:02:09');

-- ----------------------------
-- Table structure for `feedback`
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '反馈类型',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '内容',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机',
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未读1已读',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `follow`
-- ----------------------------
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL COMMENT '会员id',
  `hospitalid` int(11) DEFAULT NULL COMMENT '医院id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of follow
-- ----------------------------

-- ----------------------------
-- Table structure for `followdoctor`
-- ----------------------------
DROP TABLE IF EXISTS `followdoctor`;
CREATE TABLE `followdoctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL COMMENT '会员id',
  `doctorid` int(11) DEFAULT NULL COMMENT '医院id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of followdoctor
-- ----------------------------

-- ----------------------------
-- Table structure for `fs_level`
-- ----------------------------
DROP TABLE IF EXISTS `fs_level`;
CREATE TABLE `fs_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '游戏类型',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '等级',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '等级名称',
  `quota` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '额度',
  `rate` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '返水比例',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fs_level
-- ----------------------------

-- ----------------------------
-- Table structure for `fs_log`
-- ----------------------------
DROP TABLE IF EXISTS `fs_log`;
CREATE TABLE `fs_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL COMMENT '用户ID',
  `bet_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '下注金额',
  `yx_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '有效投注',
  `yingli` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '网站盈利',
  `fs_level` tinyint(4) NOT NULL COMMENT '返水等级',
  `fs_rate` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '返水比率%',
  `fs_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '返水金额',
  `fs_order` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '返水批次号',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fs_log
-- ----------------------------

-- ----------------------------
-- Table structure for `game_record`
-- ----------------------------
DROP TABLE IF EXISTS `game_record`;
CREATE TABLE `game_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rowid` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `billNo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '注单流水号',
  `api_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '接口平台 如 AG MG',
  `playerName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '玩家各平台账号',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '玩家账号',
  `member_id` int(11) NOT NULL COMMENT '用户 ID',
  `agentCode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '代理商编号',
  `gameCode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '游戏局号',
  `netAmount` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '玩家输赢额度',
  `betTime` timestamp NULL DEFAULT NULL COMMENT '投注时间',
  `gameType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '游戏类型',
  `betAmount` decimal(16,2) DEFAULT '0.00' COMMENT '投注金额',
  `validBetAmount` decimal(16,2) DEFAULT '0.00' COMMENT '有效投注额度',
  `flag` int(11) DEFAULT '0' COMMENT '结算状态',
  `playType` int(11) DEFAULT '0' COMMENT '游戏玩法',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '货币类型',
  `tableCode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '桌子编号',
  `loginIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '玩家IP',
  `recalcuTime` timestamp NULL DEFAULT NULL COMMENT '注单重新派彩时间',
  `platformId` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '平台编号',
  `platformType` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '平台类型',
  `stringex` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '产品附注(通常为空)',
  `remark` text COLLATE utf8mb4_unicode_ci COMMENT '返回信息',
  `round` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyFlag` int(11) DEFAULT '0' COMMENT '更新标志',
  `filePath` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文件路径',
  `prefix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '站点前缀',
  `result` text COLLATE utf8mb4_unicode_ci COMMENT '返回信息',
  `reAmount` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '备用',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `game_record_billno_index` (`billNo`),
  KEY `game_record_api_type_index` (`api_type`),
  KEY `game_record_playername_index` (`playerName`),
  KEY `game_record_bettime_index` (`betTime`),
  KEY `game_record_gametype_index` (`gameType`),
  KEY `copyFlag` (`copyFlag`),
  KEY `prefix` (`prefix`)
) ENGINE=MyISAM AUTO_INCREMENT=2714 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of game_record
-- ----------------------------

-- ----------------------------
-- Table structure for `members`
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户名',
  `real_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓名',
  `headpic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/wap/images/headpic.png' COMMENT '用户头像',
  `Businessheadpic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家头像路径',
  `Businessphone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家电话',
  `Businessname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家名称',
  `Businessaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家地址',
  `idcard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '身份证路径',
  `Business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '营业执照路径',
  `Businesscontent` text COLLATE utf8mb4_unicode_ci COMMENT '商家介绍',
  `nichen` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '昵称',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '电话',
  `phonecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机验证码',
  `qq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'qq',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '密码',
  `original_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '原始密码',
  `gender` tinyint(4) DEFAULT '0' COMMENT '0男1女',
  `is_daili` tinyint(4) DEFAULT '0' COMMENT '1为代理',
  `top_id` int(11) DEFAULT '0' COMMENT '上级 id',
  `invite_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邀请注册码',
  `qk_pwd` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '123456' COMMENT '取款密码',
  `money` decimal(16,2) DEFAULT '0.00' COMMENT '中心账户余额',
  `fs_money` decimal(16,2) DEFAULT '0.00',
  `total_amount` decimal(16,2) DEFAULT '0.00',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `register_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '注册IP',
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '最后登录ip',
  `last_login_at` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  `bank_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '开户人名字',
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '银行名称',
  `bank_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '开户行网点',
  `bank_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '银行卡号',
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '开户地址',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态',
  `is_login` tinyint(4) DEFAULT '0' COMMENT '0 未登录 1已登录',
  `o_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '登录密码',
  `agent_uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '代理链接',
  `agent_uri_pre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '代理链接前缀',
  `last_session` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressphone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收货电话',
  `addressname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收货人',
  `zan` text COLLATE utf8mb4_unicode_ci COMMENT '点赞数组',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_name_unique` (`name`),
  UNIQUE KEY `members_invite_code_unique` (`invite_code`)
) ENGINE=MyISAM AUTO_INCREMENT=1254 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('1252', '15768472002', '李四', '/uploads/headpic/2018-09-25/fkbbEGej9QGJuwdkPTSHKKh92pAPQ1KqLo1txbUF.png', null, null, null, null, null, null, null, '怪优惠专家好', null, '18124073347', '3221', '', '$2y$10$IUxyXXokv9y8IdyGUnXh4ucNz2POQazw68n7KIhU5XgYy7vw6aOJ.', '4729922c33', '1', '0', '0', '5kfVzuX', '123456', '0.00', '0.00', '0.00', '300000', '127.0.0.1', null, null, null, null, null, null, null, '0', '0', 'a123456', null, null, 'Fk4qnqKphnpPp2zp5r9mtKmrhGRREpDbrLfBDDJr', 'FnyP5M56ikKFV8xdbpJIK6MGt5Twkpaq31vhzgrWdYWBmSmuQLstvfk7hh4y', '2018-09-23 22:01:58', '2018-10-04 13:07:06', null, '辽宁省', '抚顺市', '东洲区', '', '15768472001', '你好', ',17');
INSERT INTO `members` VALUES ('1253', '15768472003', '李四光1', '/uploads/headpic/2018-09-29/XlxgxoCmyC2sU4UflGJLKUH4huljAPnoFumpHfwE.jpeg', '/uploads/headpic/2018-09-29/1SfFyDsVkYLmoUgZPZTK0XCS5gZitNilvsAJePqe.png', '18124073347', '麻辣烫11', '深圳西乡大道1', '/uploads/headpic/2018-10-13/I9mBTfy7PVTJeva0sAkjPHQhFk8GccTnqTx6jsUC.jpeg', '/uploads/headpic/2018-10-13/xgZVrzGIu0p3K3tE12xvUUY4OqCq2Kp7Tc11abww.jpeg', '介绍介绍1', '李四光', null, '15768472001', null, null, '$2y$10$Snwj.EbpdNuaQ7vmCcQpkOEfJ.PqOLdKxC3xich9Fy9DpKg7JkNJu', 'd42ea972a8', '1', '1', '0', '0oLwqPi', '123456', '9000.00', '0.00', '0.00', '98600', '127.0.0.1', null, null, '李四光', '广发银行', '深圳', '622222222222222222', '深圳', '0', '0', 'a123456789', null, null, 'xLCT7HA9U3HSoiaRZhwUcwbQIzsCXPFPzTSnSUyc', 'KlZXbNG9Xj4EDc9mKuUZQSH2KvtJJTAlRs5Qqx76JavU53EK3r4fIBsuIod5', '2018-09-26 13:32:33', '2018-11-07 11:55:14', null, '上海市', '上海市', '杨浦区', '1033', '18124073347', '测试人', ',15,2,16,18,17,19');

-- ----------------------------
-- Table structure for `member_api`
-- ----------------------------
DROP TABLE IF EXISTS `member_api`;
CREATE TABLE `member_api` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '平台账号',
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '平台密码',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '平台余额',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='会员-api';

-- ----------------------------
-- Records of member_api
-- ----------------------------

-- ----------------------------
-- Table structure for `member_daili_apply`
-- ----------------------------
DROP TABLE IF EXISTS `member_daili_apply`;
CREATE TABLE `member_daili_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `headpic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/wap/images/headpic.png' COMMENT '商家头像路径',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Businessname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家名称',
  `Businessaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家地址',
  `idcard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '身份证路径',
  `Business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '营业执照路径',
  `email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msn_qq` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '申请状态',
  `fail_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of member_daili_apply
-- ----------------------------
INSERT INTO `member_daili_apply` VALUES ('4', '1253', '/wap/images/headpic.png', '李富贵', '15768472001', '麻辣烫', '深圳', '/uploads/headpic/2018-09-29/n60lkrAvQZEbm5jRsJz5PhMDAvvUHBfxnOElfl7K.png', '/uploads/headpic/2018-09-29/2d53AegxYSaPYZ6fbnwCyHbvPomhYFbnYvZtEdUK.png', null, null, '999999', '2', '1111', '2018-09-29 15:42:19', '2018-10-12 13:48:47');
INSERT INTO `member_daili_apply` VALUES ('5', '1253', '/wap/images/headpic.png', '李四光', '18124073347', '麻辣烫11', '深圳西乡大道', '/uploads/headpic/2018-10-13/I9mBTfy7PVTJeva0sAkjPHQhFk8GccTnqTx6jsUC.jpeg', '/uploads/headpic/2018-10-13/xgZVrzGIu0p3K3tE12xvUUY4OqCq2Kp7Tc11abww.jpeg', null, null, '我要做商家', '1', null, '2018-10-13 16:59:57', '2018-10-13 17:08:53');

-- ----------------------------
-- Table structure for `member_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `member_login_log`;
CREATE TABLE `member_login_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '登录ip',
  `is_login` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0登录 1登出',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=318 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of member_login_log
-- ----------------------------

-- ----------------------------
-- Table structure for `member_message`
-- ----------------------------
DROP TABLE IF EXISTS `member_message`;
CREATE TABLE `member_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未读1已读',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='会员-message';

-- ----------------------------
-- Records of member_message
-- ----------------------------

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '标题 系统公告 活动公告',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '公告内容',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '跳转链接',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for `moments`
-- ----------------------------
DROP TABLE IF EXISTS `moments`;
CREATE TABLE `moments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '发布者id',
  `cnameid` int(11) NOT NULL DEFAULT '1' COMMENT '分类id',
  `content` text COMMENT '内容',
  `imgurl` text,
  `zan` int(11) DEFAULT '0' COMMENT '点赞量',
  `message` int(11) DEFAULT '0' COMMENT '留言量',
  `statu` int(11) NOT NULL DEFAULT '0' COMMENT '0=待审核 1=审核通过',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of moments
-- ----------------------------
INSERT INTO `moments` VALUES ('19', '1253', '1', '无聊中……', '', '1', '3', '1', '2018-09-29 15:39:10', '2018-10-17 19:17:26');

-- ----------------------------
-- Table structure for `momentssms`
-- ----------------------------
DROP TABLE IF EXISTS `momentssms`;
CREATE TABLE `momentssms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `momentsid` int(11) NOT NULL COMMENT '动态id',
  `uid` int(11) NOT NULL COMMENT '会员id',
  `content` text COMMENT '留言内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of momentssms
-- ----------------------------
INSERT INTO `momentssms` VALUES ('21', '19', '1253', '测试一下', '2018-10-04 15:28:12', '2018-10-04 15:28:12');
INSERT INTO `momentssms` VALUES ('22', '19', '1253', '天天出门上班真的很烦……', '2018-10-12 13:00:50', '2018-10-12 13:00:50');
INSERT INTO `momentssms` VALUES ('23', '19', '1253', '滚', '2018-10-12 13:00:56', '2018-10-12 13:00:56');

-- ----------------------------
-- Table structure for `moments_class`
-- ----------------------------
DROP TABLE IF EXISTS `moments_class`;
CREATE TABLE `moments_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of moments_class
-- ----------------------------
INSERT INTO `moments_class` VALUES ('1', '生活', '2018-09-28 10:16:18', '2018-09-28 10:16:21');
INSERT INTO `moments_class` VALUES ('2', '租房', '2018-09-28 10:18:44', '2018-09-28 10:18:47');
INSERT INTO `moments_class` VALUES ('3', '二手', '2018-09-28 10:18:56', '2018-09-28 10:18:59');

-- ----------------------------
-- Table structure for `pay_records`
-- ----------------------------
DROP TABLE IF EXISTS `pay_records`;
CREATE TABLE `pay_records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `couponid` int(11) NOT NULL COMMENT '优惠劵ID',
  `term` int(11) NOT NULL DEFAULT '0' COMMENT '满减条件',
  `businessid` int(11) NOT NULL COMMENT '商家ID',
  `order_no` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '订单号 唯一',
  `opeNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付订单号',
  `allmoney` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '总需支付',
  `decrease` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '满减金额',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '实际支付金额金额',
  `descore` int(11) NOT NULL DEFAULT '0' COMMENT '抵扣积分',
  `descoremoney` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '抵扣积分金额',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '获得积分',
  `poundage` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '平台扣取手续费',
  `member_id` int(11) NOT NULL COMMENT '用户 ID',
  `explain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '说明',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `payTime` timestamp NULL DEFAULT NULL COMMENT '支付时间',
  `pay_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1网银支付2扫码支付',
  `bankId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '若为银行卡支付 银行代码',
  `typeId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '若为扫码 1支付宝2微信',
  `clientIp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `before_request_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1',
  `after_request_result` text COLLATE utf8mb4_unicode_ci COMMENT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_records_order_no_unique` (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pay_records
-- ----------------------------
INSERT INTO `pay_records` VALUES ('65', '5', '0', '1253', '111', '111', '999', '5', '992.00', '300', '2', '100', '5', '1253', '11', '1', '2018-10-14 01:42:18', '11', '1', '1', '1', '1', '1', '2018-10-14 01:42:28', '2018-10-14 01:42:30');

-- ----------------------------
-- Table structure for `recharge`
-- ----------------------------
DROP TABLE IF EXISTS `recharge`;
CREATE TABLE `recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '交易流水号',
  `member_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '充值人名称、昵称',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `payment_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '转账类型 1支付宝2微信3银行转账',
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '账户 支付宝账户 微信账户 银行卡号 例子 ： 11231@qq.com',
  `payment_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1待确认2充值成功3充值失败',
  `diff_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '赠送金额',
  `before_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '充值前金额',
  `after_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '充值后金额',
  `score` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '积分',
  `fail_reason` text COLLATE utf8mb4_unicode_ci COMMENT '失败原因',
  `hk_at` timestamp NULL DEFAULT NULL COMMENT '客户填写的汇款时间',
  `confirm_at` timestamp NULL DEFAULT NULL COMMENT '确认转账时间',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of recharge
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理组';

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '普通管理员', null, '2017-02-03 09:52:51', '2017-02-03 09:52:51');
INSERT INTO `roles` VALUES ('2', '管理员', null, '2017-09-23 22:51:16', '2017-09-23 22:51:16');
INSERT INTO `roles` VALUES ('3', 'chaiwu', null, '2018-02-22 17:03:12', '2018-02-22 17:03:12');
INSERT INTO `roles` VALUES ('4', '客服', null, '2018-03-07 20:34:33', '2018-03-07 20:34:33');
INSERT INTO `roles` VALUES ('5', '测试！', '测试', '2018-03-23 21:22:57', '2018-03-23 21:29:44');

-- ----------------------------
-- Table structure for `role_router`
-- ----------------------------
DROP TABLE IF EXISTS `role_router`;
CREATE TABLE `role_router` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `router` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=541 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理组-权限';

-- ----------------------------
-- Records of role_router
-- ----------------------------
INSERT INTO `role_router` VALUES ('507', '1', 'drawing.update', '2018-05-18 13:08:51', '2018-05-18 13:08:51');
INSERT INTO `role_router` VALUES ('506', '1', 'drawing.confirm', '2018-05-18 13:08:51', '2018-05-18 13:08:51');
INSERT INTO `role_router` VALUES ('505', '1', 'recharge.update', '2018-05-18 13:08:51', '2018-05-18 13:08:51');
INSERT INTO `role_router` VALUES ('504', '1', 'recharge.confirm', '2018-05-18 13:08:51', '2018-05-18 13:08:51');
INSERT INTO `role_router` VALUES ('503', '1', 'drawing.index', '2018-05-18 13:08:51', '2018-05-18 13:08:51');
INSERT INTO `role_router` VALUES ('537', '2', 'system_notice.destroy', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('538', '2', 'message.store', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('539', '2', 'message.update', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('540', '2', 'message.destroy', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('99', '3', 'recharge.index', '2018-03-14 13:18:55', '2018-03-14 13:18:55');
INSERT INTO `role_router` VALUES ('100', '3', 'drawing.index', '2018-03-14 13:18:55', '2018-03-14 13:18:55');
INSERT INTO `role_router` VALUES ('101', '3', 'recharge.confirm', '2018-03-14 13:18:55', '2018-03-14 13:18:55');
INSERT INTO `role_router` VALUES ('102', '3', 'recharge.update', '2018-03-14 13:18:55', '2018-03-14 13:18:55');
INSERT INTO `role_router` VALUES ('103', '3', 'drawing.confirm', '2018-03-14 13:18:55', '2018-03-14 13:18:55');
INSERT INTO `role_router` VALUES ('104', '3', 'drawing.update', '2018-03-14 13:18:55', '2018-03-14 13:18:55');
INSERT INTO `role_router` VALUES ('511', '4', 'feedback.index', '2018-05-26 10:16:09', '2018-05-26 10:16:09');
INSERT INTO `role_router` VALUES ('509', '4', 'recharge.index', '2018-05-26 10:16:09', '2018-05-26 10:16:09');
INSERT INTO `role_router` VALUES ('510', '4', 'drawing.index', '2018-05-26 10:16:09', '2018-05-26 10:16:09');
INSERT INTO `role_router` VALUES ('536', '2', 'system_notice.update', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('535', '2', 'system_notice.store', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('534', '2', 'message.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('533', '2', 'system_notice.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('532', '2', 'activity.destroy', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('531', '2', 'activity.update', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('530', '2', 'activity.store', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('529', '2', 'activity.create', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('527', '2', 'fs.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('528', '2', 'activity.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('526', '2', 'daili_money_log.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('525', '2', 'member_offline_game_record.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('521', '2', 'member_offline.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('522', '2', 'member_offline_recharge.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('523', '2', 'member_offline_drawing.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('524', '2', 'member_offline_dividend.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('502', '1', 'recharge.index', '2018-05-18 13:08:51', '2018-05-18 13:08:51');
INSERT INTO `role_router` VALUES ('519', '2', 'member_daili_apply.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('520', '2', 'member_daili.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('518', '2', 'drawing.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('517', '2', 'recharge.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('515', '2', 'game_record.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('516', '2', 'transfer.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('514', '2', 'member_login_log.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('513', '2', 'dividend.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('512', '2', 'member.index', '2018-06-15 01:48:53', '2018-06-15 01:48:53');
INSERT INTO `role_router` VALUES ('413', '5', 'recharge.index', '2018-03-23 21:23:11', '2018-03-23 21:23:11');
INSERT INTO `role_router` VALUES ('414', '5', 'drawing.index', '2018-03-23 21:23:11', '2018-03-23 21:23:11');

-- ----------------------------
-- Table structure for `score_log`
-- ----------------------------
DROP TABLE IF EXISTS `score_log`;
CREATE TABLE `score_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '积分 收入为整数 支出为负数',
  `explain` varchar(255) DEFAULT NULL COMMENT '说明',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of score_log
-- ----------------------------
INSERT INTO `score_log` VALUES ('1', '1253', '100', '使用优惠券获得', '2018-09-27 14:25:32', '2018-09-27 14:25:34');
INSERT INTO `score_log` VALUES ('2', '1253', '-30', '积分抵扣', '2018-09-27 14:27:00', '2018-09-27 14:27:03');
INSERT INTO `score_log` VALUES ('3', '1253', '100', '132', '2018-09-27 14:27:27', '2018-09-27 14:27:29');
INSERT INTO `score_log` VALUES ('4', '1253', '36', '123456', '2018-09-27 14:27:54', '2018-09-27 14:27:56');
INSERT INTO `score_log` VALUES ('5', '1253', '6', '123454', '2018-09-27 14:28:07', '2018-09-27 14:28:10');
INSERT INTO `score_log` VALUES ('6', '1253', '685', '123456', '2018-09-27 14:28:25', '2018-09-27 14:28:27');
INSERT INTO `score_log` VALUES ('21', '1252', '-700', '兑换了10元免单劵', '2018-09-30 14:30:40', '2018-09-30 14:30:40');
INSERT INTO `score_log` VALUES ('22', '1252', '-700', '兑换了商品【笔记本四代】', '2018-09-30 15:50:05', '2018-09-30 15:50:05');
INSERT INTO `score_log` VALUES ('23', '1253', '-700', '兑换了10元免单劵', '2018-09-30 16:40:07', '2018-09-30 16:40:07');
INSERT INTO `score_log` VALUES ('24', '1253', '-700', '兑换了商品【笔记本四代】', '2018-10-17 18:49:13', '2018-10-17 18:49:13');

-- ----------------------------
-- Table structure for `smsapi`
-- ----------------------------
DROP TABLE IF EXISTS `smsapi`;
CREATE TABLE `smsapi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smsapi` varchar(100) NOT NULL COMMENT '发送网关',
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smsapi
-- ----------------------------
INSERT INTO `smsapi` VALUES ('1', 'http://api.smsbao.com/', 'sasanana', 'a123456');

-- ----------------------------
-- Table structure for `system_config`
-- ----------------------------
DROP TABLE IF EXISTS `system_config`;
CREATE TABLE `system_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站logo',
  `m_site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机站网站logo',
  `site_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站名称',
  `site_title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站标题',
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键字',
  `phone1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '客户电话1',
  `phone2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '客户电话2',
  `site_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站主域名',
  `qq` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'qq',
  `down_name` tinyint(4) NOT NULL DEFAULT '0',
  `down_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '客服链接',
  `is_maintain` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 正常1维护',
  `maintain_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '维护提示语',
  `active_member_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '活跃用户月充值金额',
  `active_member_money2` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '积分比例',
  `alipay_nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付宝昵称',
  `alipay_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付宝账号',
  `alipay_qrcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付宝 二维码图片',
  `wechat_nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '微信昵称',
  `wechat_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '微信账号',
  `wechat_qrcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '微信 二维码图片',
  `is_alipay_on` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0上线1下线',
  `is_wechat_on` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0上线1下线',
  `is_bankpay_on` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0上线1下线',
  `is_thirdpay_on` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0上线1下线',
  `third_version` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '版本',
  `third_userid` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'id',
  `third_userkey` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'key',
  `third_pay_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '提交链接',
  `web_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站域名',
  `is_sms_on` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0上线1下线',
  `sms_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '短信网关',
  `sms_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '短信 ID',
  `sms_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '短信 key',
  `sms_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '短信 token',
  `sms_temp_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '模板 ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站介绍',
  `inscorescale` decimal(11,2) DEFAULT '0.00' COMMENT '获得积分比例',
  `outscorescale` decimal(11,2) DEFAULT '0.00' COMMENT '支出抵扣积分比例',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of system_config
-- ----------------------------
INSERT INTO `system_config` VALUES ('1', '/uploads/2018-09-19/9a1787fc40318a2d48b0858d37c9c5f5800dabe4.png', '/uploads/2018-09-19/d182e41501ff916d58f251aaf83b0b5188403e87.png', '怪优惠', '怪优惠', null, '020-123456', null, null, null, '0', null, null, '0', '广告合作111', '10.00', '10.00', null, null, null, null, null, null, '0', '0', '0', '0', '1.0', 'H33507170000120', '98987760d564514c3d3c86a35ac6a81f', 'http://openapi.caibaopay.com/gatewayOpen.htm', null, '0', 'http://api.smsbao.com/', 'sasanana', 'a123456', null, null, '2017-02-03 21:52:51', '2018-10-04 14:51:58', null, '10.00', '0.10');

-- ----------------------------
-- Table structure for `system_notice`
-- ----------------------------
DROP TABLE IF EXISTS `system_notice`;
CREATE TABLE `system_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '标题 系统公告 活动公告',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '公告内容',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_line` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0上线 1下线',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of system_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `tcg_game_list`
-- ----------------------------
DROP TABLE IF EXISTS `tcg_game_list`;
CREATE TABLE `tcg_game_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `displayStatus` tinyint(4) NOT NULL DEFAULT '0',
  `gameType` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '游戏类型',
  `gameName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '游戏名称',
  `tcgGameCode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '游戏代码',
  `productCode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '产品名称',
  `platform` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支持的平台 flash,html5',
  `productType` int(11) DEFAULT NULL COMMENT '产品编号',
  `sort` int(11) NOT NULL DEFAULT '1000' COMMENT '排序',
  `on_line` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0上线1下线',
  `client_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pc' COMMENT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tcg_game_list
-- ----------------------------

-- ----------------------------
-- Table structure for `team`
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamname` varchar(255) NOT NULL COMMENT '团队名称',
  `captainid` int(11) NOT NULL COMMENT '队长id',
  `begood` varchar(255) DEFAULT NULL COMMENT '擅长',
  `profile` text COMMENT '简介',
  `teammembers` varchar(255) DEFAULT NULL COMMENT '团队成员，成员id用逗号分割开 例如 001,002',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of team
-- ----------------------------

-- ----------------------------
-- Table structure for `transfers`
-- ----------------------------
DROP TABLE IF EXISTS `transfers`;
CREATE TABLE `transfers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 AG账户 2BBIN 账户 3MG账户',
  `member_id` int(11) NOT NULL COMMENT '用户ID',
  `transfer_type` tinyint(4) DEFAULT '0' COMMENT '0 转入游戏 1转出游戏',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '转换类型 1 中心账户转入MG账户',
  `money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '用户填写的转换金额',
  `diff_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '差价金额，即红利',
  `real_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '实际转换金额',
  `before_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '转账前的金额',
  `after_money` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '转账后的金额',
  `transfer_in_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '转入账户',
  `transfer_out_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '转出账户',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `result` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of transfers
-- ----------------------------

-- ----------------------------
-- Table structure for `userecord`
-- ----------------------------
DROP TABLE IF EXISTS `userecord`;
CREATE TABLE `userecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '使用会员id',
  `businessid` int(11) DEFAULT NULL COMMENT '商家id',
  `couponid` int(11) DEFAULT NULL COMMENT '优惠券id',
  `allmomey` decimal(10,0) DEFAULT '0' COMMENT '总支付金额',
  `decrease` decimal(10,0) DEFAULT '0' COMMENT '折扣金额',
  `paymomey` decimal(10,0) DEFAULT '0' COMMENT '实际支付金额',
  `rate` decimal(10,0) DEFAULT '0' COMMENT '平台费率',
  `ratemoney` decimal(10,0) DEFAULT '0' COMMENT '平台收取费用',
  `businessimoney` decimal(10,0) DEFAULT '0' COMMENT '商家得到金额',
  `score` int(11) DEFAULT '0' COMMENT '会员获得积分',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userecord
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '1' COMMENT '角色 id 1游客',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='后台用户表';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'Admin', 'admin@qq.com', '$2y$10$EWdfXaAhLtt.EkKS.cKdM.6lN4XpqGeEFGRKUkDleHrUOKWVeTEpO', '1', '1', 'bbv2WhvpKMtEgXruyXu9MHbijZHgyRodiVAnHky7m6nSTawsB3DD2xISyn9w', '2017-02-03 09:52:51', '2018-06-07 14:24:19', null);

-- ----------------------------
-- Table structure for `yj_level`
-- ----------------------------
DROP TABLE IF EXISTS `yj_level`;
CREATE TABLE `yj_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '等级',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '等级名称',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '活跃人数',
  `min` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '最小金额',
  `max` decimal(16,2) DEFAULT NULL COMMENT '最大金额',
  `rate` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '佣金比例',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of yj_level
-- ----------------------------
