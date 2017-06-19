/*
Navicat MySQL Data Transfer

Source Server         : aa
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : hunli

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-06-19 13:55:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'username', '7bc80988e500f314085d079318768216ded77b7f', '15102585858', '1', '147785452');
INSERT INTO `admin` VALUES ('2', '办公用品', '0f0d74bb0eeb3b80ae3b0f8ee357717a9a84e7e7', '123456789', '1', '1496803234');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '1', '岁月迢迢', '/upload/images/0609/1.jpg', '10000', '1477690235');

-- ----------------------------
-- Table structure for `dajiangtang`
-- ----------------------------
DROP TABLE IF EXISTS `dajiangtang`;
CREATE TABLE `dajiangtang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `imgarr` text,
  `like` int(11) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `audit` tinyint(4) DEFAULT '0' COMMENT '是否审核\r\n',
  `comment` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dajiangtang
-- ----------------------------
INSERT INTO `dajiangtang` VALUES ('1', '2', '岁月迢迢', '人生漫漫路，像是一条况味儿深邃的长河。飞逝的光阴，簇拥着打着赤脚的我，慢慢地趟着生活。纵使有山水相隔，有风雨吹落，但对生活用情至深的我，偏爱于草色烟光的青枝上，翩飞如蝶的枯叶间，逐字逐句地将悠悠岁月里遇见的美好，细细品味深深雕琢。\r\n　　\r\n　　红尘阡陌，带有况味的词藻若是堆砌起来，如山似海。可岁月与美好，绝对称得上是生活里最清逸灵动的词汇。世间一切唯美风物，时光自会竭尽所能地演绎其大度以及快意的慷慨成全。一切已知往昔，都像是一场场命定的不期而遇。而一切未来的岁月，均是生活赋予你施展想象的留白。\r\n　　\r\n　　虽然迢迢岁月，一如指间滑落的细沙，转瞬漏下。但一卷书，一枝花，一片叶，一朵云，一溪月，一天星，处处携裹着生活的美好，在如水的光阴里，层层涌动着温暖的信念向我深情微笑。它们好似镶嵌在人生路上的钻石，时刻绽露着璀璨的光芒。照亮我薄弱的思想，化解我一时的迷惘。\r\n　　', '/upload/images/0609/1.jpg', '/upload/images/0609/2.jpg,/upload/images/0609/3.jpg,/upload/images/0609/4.jpg,/upload/images/0609/5.jpg,/upload/images/0609/6.jpg,/upload/images/0609/7.jpg,/upload/images/0609/8.jpg,/upload/images/0609/9.jpg,/upload/images/0609/10.jpg,/upload/images/0609/11.jpg', '0', '1477690235', '1', '1', '0');

-- ----------------------------
-- Table structure for `icon`
-- ----------------------------
DROP TABLE IF EXISTS `icon`;
CREATE TABLE `icon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of icon
-- ----------------------------
INSERT INTO `icon` VALUES ('1', '婚嫁商家', '/upload/icon/1.png', '1497255378');
INSERT INTO `icon` VALUES ('2', '婚嫁指南', '/upload/icon/2.png', '1497262513');
INSERT INTO `icon` VALUES ('3', '婚嫁商城', null, null);
INSERT INTO `icon` VALUES ('4', '案例展示', null, null);
INSERT INTO `icon` VALUES ('5', '优惠券', null, null);
INSERT INTO `icon` VALUES ('6', '电子喜帖', null, null);
INSERT INTO `icon` VALUES ('7', '婚礼大讲堂', null, null);
INSERT INTO `icon` VALUES ('8', '共享婚品', null, null);
INSERT INTO `icon` VALUES ('9', '婚礼秘书', null, null);
INSERT INTO `icon` VALUES ('10', '蜜月旅行', null, null);
INSERT INTO `icon` VALUES ('11', '行业资讯', null, null);
INSERT INTO `icon` VALUES ('12', '相亲', null, null);
INSERT INTO `icon` VALUES ('13', '需求发布', null, null);
INSERT INTO `icon` VALUES ('14', '婚礼作品', null, null);
INSERT INTO `icon` VALUES ('15', '懒人婚礼', null, null);
INSERT INTO `icon` VALUES ('16', '婚车租赁', null, null);
INSERT INTO `icon` VALUES ('17', '分割图片', null, null);

-- ----------------------------
-- Table structure for `info`
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `content` longtext,
  `time` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comment` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `lid` varchar(10) DEFAULT NULL,
  `eid` varchar(10) DEFAULT NULL,
  `jianjie` text,
  `author` varchar(255) DEFAULT NULL,
  `paixu` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES ('1', 'title', '/upload/images/20170615/20170615021230716333.png', '/upload/video/20170615/20170615021230456863.png', 'content', '1497507150', '20', null, '10', '4', '11', 'jianjie', 'author', '100', '1');
INSERT INTO `info` VALUES ('2', 'title', '/upload/images/20170615/20170615021753285614.png', '/upload/video/20170615/20170615021753111618.png', '<p>content</p>', '1497507473', '20', null, '10', '4', '11', 'jianjie', 'author', '100', '2');
INSERT INTO `info` VALUES ('3', '标题', '/upload/images/20170615/20170615024138569610.png', '', '<p>详情<img src=\"/upload/images/20170615/1497507526774744.png\" title=\"1497507526774744.png\" alt=\"25.png\"/></p>', '1497508944', '20', null, '10', '4', '11', '简介', '作者', '10', '3');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT '1',
  `score` varchar(255) DEFAULT '0',
  `money` varchar(255) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('2', '李四', '123456789', '641312', '1', '12', '1111', '1258745893', '/upload/images/0609/8.jpg');
INSERT INTO `member` VALUES ('3', '王五', '456113211', '131221854', '2', '0', '0', '1458963254', '/upload/images/0609/2.jpg');
INSERT INTO `member` VALUES ('4', '水电费', '74185296', '54313123', '2', '0', '0', '1485741235', null);
INSERT INTO `member` VALUES ('5', '第三方', '54121321', 'd665461', '3', '0', '0', '1352478952', null);
INSERT INTO `member` VALUES ('6', '法规和', '24334654', 'asdfasdf', '3', '0', '0', '1485796324', null);
INSERT INTO `member` VALUES ('7', '东方闪电', '111111', 'f95e66bcea2f77292f8df5f3fde91c574e5f3dc5', '1', '1', '1', '1496730916', null);

-- ----------------------------
-- Table structure for `newsclass`
-- ----------------------------
DROP TABLE IF EXISTS `newsclass`;
CREATE TABLE `newsclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newsclass
-- ----------------------------
INSERT INTO `newsclass` VALUES ('1', '免费课程', '0');
INSERT INTO `newsclass` VALUES ('2', '贡献人物', '0');
INSERT INTO `newsclass` VALUES ('3', '省市会长', '0');
INSERT INTO `newsclass` VALUES ('4', '行业峰会', '0');
INSERT INTO `newsclass` VALUES ('5', '培训学校', '0');
INSERT INTO `newsclass` VALUES ('6', '大赛信息', '0');
INSERT INTO `newsclass` VALUES ('7', '全国巡讲', '0');
INSERT INTO `newsclass` VALUES ('8', '道具厂商', '0');
INSERT INTO `newsclass` VALUES ('9', '开店加盟', '0');
INSERT INTO `newsclass` VALUES ('10', '技术应用', '0');
INSERT INTO `newsclass` VALUES ('11', '峰会行业', '4');
INSERT INTO `newsclass` VALUES ('14', '花篮', '8');

-- ----------------------------
-- Table structure for `relclass`
-- ----------------------------
DROP TABLE IF EXISTS `relclass`;
CREATE TABLE `relclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of relclass
-- ----------------------------
INSERT INTO `relclass` VALUES ('1', '婚庆', '0');
INSERT INTO `relclass` VALUES ('2', '婚纱摄影', '0');
INSERT INTO `relclass` VALUES ('3', '酒店', '0');
INSERT INTO `relclass` VALUES ('4', '婚纱礼服', '0');
INSERT INTO `relclass` VALUES ('5', '花艺', '0');
INSERT INTO `relclass` VALUES ('6', '新娘跟妆', '0');
INSERT INTO `relclass` VALUES ('7', '甜品', '0');
INSERT INTO `relclass` VALUES ('8', '演艺', '0');
INSERT INTO `relclass` VALUES ('15', '跟妆', '6');
INSERT INTO `relclass` VALUES ('11', '峰会行业', '4');
INSERT INTO `relclass` VALUES ('14', '花篮', '8');

-- ----------------------------
-- Table structure for `share`
-- ----------------------------
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `imgarr` text,
  `like` int(11) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `audit` tinyint(4) DEFAULT '0' COMMENT '是否审核\r\n',
  `comment` int(11) DEFAULT '0',
  `lid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of share
-- ----------------------------
INSERT INTO `share` VALUES ('1', '2', '岁月迢迢', '人生漫漫路，像是一条况味儿深邃的长河。飞逝的光阴，簇拥着打着赤脚的我，慢慢地趟着生活。纵使有山水相隔，有风雨吹落，但对生活用情至深的我，偏爱于草色烟光的青枝上，翩飞如蝶的枯叶间，逐字逐句地将悠悠岁月里遇见的美好，细细品味深深雕琢。\r\n　　\r\n　　红尘阡陌，带有况味的词藻若是堆砌起来，如山似海。可岁月与美好，绝对称得上是生活里最清逸灵动的词汇。世间一切唯美风物，时光自会竭尽所能地演绎其大度以及快意的慷慨成全。一切已知往昔，都像是一场场命定的不期而遇。而一切未来的岁月，均是生活赋予你施展想象的留白。\r\n　　\r\n　　虽然迢迢岁月，一如指间滑落的细沙，转瞬漏下。但一卷书，一枝花，一片叶，一朵云，一溪月，一天星，处处携裹着生活的美好，在如水的光阴里，层层涌动着温暖的信念向我深情微笑。它们好似镶嵌在人生路上的钻石，时刻绽露着璀璨的光芒。照亮我薄弱的思想，化解我一时的迷惘。\r\n　　', '/upload/images/0609/1.jpg', '/upload/images/0609/2.jpg,/upload/images/0609/3.jpg,/upload/images/0609/4.jpg,/upload/images/0609/5.jpg,/upload/images/0609/6.jpg,/upload/images/0609/7.jpg,/upload/images/0609/8.jpg,/upload/images/0609/9.jpg,/upload/images/0609/10.jpg,/upload/images/0609/11.jpg', '0', '1477690235', '1', '1', '0', '4', '14');

-- ----------------------------
-- Table structure for `shareclass`
-- ----------------------------
DROP TABLE IF EXISTS `shareclass`;
CREATE TABLE `shareclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shareclass
-- ----------------------------
INSERT INTO `shareclass` VALUES ('1', '婚纱', '0');
INSERT INTO `shareclass` VALUES ('2', '新娘礼服', '0');
INSERT INTO `shareclass` VALUES ('3', '新郎礼服', '0');
INSERT INTO `shareclass` VALUES ('4', '伴娘礼服', '0');
INSERT INTO `shareclass` VALUES ('5', '伴郎礼服', '0');
INSERT INTO `shareclass` VALUES ('6', '饰品', '0');
INSERT INTO `shareclass` VALUES ('7', '婚礼用品', '0');
INSERT INTO `shareclass` VALUES ('11', '峰会行业', '4');
INSERT INTO `shareclass` VALUES ('14', '花篮', '6');
