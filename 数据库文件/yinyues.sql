/*
Navicat MySQL Data Transfer

Source Server         : zzy
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : yinyue

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-30 14:57:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(64) NOT NULL,
  `sname` varchar(32) NOT NULL,
  `times` varchar(32) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `company` varchar(32) DEFAULT NULL,
  `status` int(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('4', '范特西', '周杰伦', '2001-09-01', '/uploads/201810261151341510.jpg', '音乐', '1');
INSERT INTO `album` VALUES ('5', '八度空间', '周杰伦', '2002-07-19', '/uploads/201810240946299772.jpg', '音乐', '10');
INSERT INTO `album` VALUES ('6', '叶惠美', '周杰伦', '2003-07-31', '/uploads/201810240947116957.jpg', '音乐', '0');
INSERT INTO `album` VALUES ('7', '七里香', '周杰伦', '2004-08-03', '/uploads/201810240947551830.jpg', '音乐', '10');
INSERT INTO `album` VALUES ('8', '依然范特西', '周杰伦', '2006-09-05', '/uploads/201810240949131639.jpg', '音乐', '10');
INSERT INTO `album` VALUES ('9', '我很忙', '周杰伦', '2007-11-02', '/uploads/201810240950159122.jpg', '音乐', '10');
INSERT INTO `album` VALUES ('10', '魔杰座', '周杰伦', '2008-10-14', '/uploads/201810240951134769.jpg', '音乐', '10');
INSERT INTO `album` VALUES ('11', '违背的青春', '薛之谦', '2018-09-03', '/uploads/15401969905219.jpg', '无', '10');
INSERT INTO `album` VALUES ('12', '破坏王', '陈奕迅', '2018-10-18', '/uploads/15401970752755.jpg', '无', '10');
INSERT INTO `album` VALUES ('13', '醒着做梦', '张学友', '2014-12-23', '/uploads/15401971778932.jpg', '无', '10');
INSERT INTO `album` VALUES ('14', '陪你倒数', '张国荣', '1999-10-1', '/uploads/15401972757349.jpg', '无', '10');
INSERT INTO `album` VALUES ('15', '生如夏花', '朴树', '2003-11-26', '/uploads/15401973444559.jpg', '无', '10');
INSERT INTO `album` VALUES ('16', '生存之道', 'TANK', '2006-02-24', '/uploads/15401974197618.jpg', '无', '10');
INSERT INTO `album` VALUES ('17', '无法长大', '赵雷', '2016-12-21', '/uploads/15401975044915.jpg', '无', '10');
INSERT INTO `album` VALUES ('18', '自定义', '许嵩', '2009-01-10', '/uploads/15401975923504.jpg', '无', '10');
INSERT INTO `album` VALUES ('19', 'ルポルタージュ', '高桥优', '2017-11-22', '/uploads/15401979098060.jpg', '无', '10');
INSERT INTO `album` VALUES ('20', 'タイヨウのうた', '弘野泽之', '2006-09-13', '/uploads/15401981293749.jpg', '无', '10');
INSERT INTO `album` VALUES ('21', 'Relapse', 'Eminem', '2009-05-19', '/uploads/15402063966498.jpg', '无', '10');
INSERT INTO `album` VALUES ('22', 'LOTTO', 'EXO', '2016-08-18', '/uploads/15402064914638.jpg', '韩国SM娱乐有限公司', '10');
INSERT INTO `album` VALUES ('23', '模特', '李荣浩', '2013-09-16', '/uploads/15402066105850.jpg', '无', '10');
INSERT INTO `album` VALUES ('24', 'COUP D`ETAT', '权志龙', '2013-11-22', '/uploads/15402067035415.jpg', '无', '10');
INSERT INTO `album` VALUES ('25', 'Girls\' Generation', '少女时代', '2007-11-1', '/uploads/15402067982671.jpg', '韩国SM娱乐有限公司', '10');
INSERT INTO `album` VALUES ('26', 'The Hunting Party', 'Linkin Park', '2014-06-13', '/uploads/15402068852170.jpg', '华纳唱片', '10');
INSERT INTO `album` VALUES ('27', 'Dreaming Out Loud', 'One Republic', '2007-11-20', '/uploads/15402069663641.jpg', 'Interscope Records', '10');
INSERT INTO `album` VALUES ('28', 'Missundaztood', 'pink', '2001-11-20', '/uploads/15402071013884.jpg', '爱丽斯塔唱片', '10');
INSERT INTO `album` VALUES ('31', 'Dreaming Out Loud', 'OneRepublic', null, null, null, '10');
INSERT INTO `album` VALUES ('32', '123', 'qwe', null, null, null, '10');
INSERT INTO `album` VALUES ('33', '无', '宫崎骏', null, null, null, '10');
INSERT INTO `album` VALUES ('34', '无', 'Alan Walker', null, null, null, '10');
INSERT INTO `album` VALUES ('35', '无', '安七炫', null, null, null, '10');
INSERT INTO `album` VALUES ('36', '庆温柔', '阿达', null, null, null, '10');

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `mname` varchar(64) NOT NULL,
  `sname` varchar(64) NOT NULL,
  `aname` varchar(64) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------
INSERT INTO `collect` VALUES ('78', '49', '违背的青春', '薛之谦', '违背的青春', '1');
INSERT INTO `collect` VALUES ('79', '49', '城府', '许嵩', '自定义', '1');
INSERT INTO `collect` VALUES ('81', '49', 'K歌之王', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('82', '49', '我醒着做梦', '张学友', '醒着做梦', '1');
INSERT INTO `collect` VALUES ('83', '49', '稻香', '周杰伦', '魔杰座', '1');
INSERT INTO `collect` VALUES ('84', '49', '同道中人', '张国荣', '陪你倒数', '1');
INSERT INTO `collect` VALUES ('85', '49', '几分之几', 'Tank', '生存之道', '1');
INSERT INTO `collect` VALUES ('86', '49', 'Say', 'OneRepublic', 'Dreaming Ou', '1');
INSERT INTO `collect` VALUES ('89', '49', '玛丽', '赵雷', '无法长大', '1');
INSERT INTO `collect` VALUES ('90', '49', '如果当时', '许嵩', '自定义', '1');
INSERT INTO `collect` VALUES ('91', '49', '模特', '李荣浩', '模特', '1');
INSERT INTO `collect` VALUES ('92', '49', '十年', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('93', '49', '爱情转移', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('94', '49', '朵', '赵雷', '无法长大', '1');
INSERT INTO `collect` VALUES ('95', '49', '有何不可', '许嵩', '自定义', '1');
INSERT INTO `collect` VALUES ('96', '49', 'breeze', '泽野弘之', 'タイヨウのうた', '1');
INSERT INTO `collect` VALUES ('97', '49', '쿠데타', '权志龙', 'COUP D`ETAT', '1');
INSERT INTO `collect` VALUES ('98', '49', '半岛铁盒', '周杰伦', '八度空间', '1');
INSERT INTO `collect` VALUES ('99', '49', '暗号', '周杰伦', '八度空间', '1');
INSERT INTO `collect` VALUES ('100', '49', '龙拳', '周杰伦', '八度空间', '1');
INSERT INTO `collect` VALUES ('101', '49', '简单爱', '周杰伦', '范特西', '1');
INSERT INTO `collect` VALUES ('102', '49', '七里香', '周杰伦', '七里香', '1');
INSERT INTO `collect` VALUES ('103', '49', '千里之外', '周杰伦', '依然范特西', '1');
INSERT INTO `collect` VALUES ('104', '49', '兰亭序', '周杰伦', '魔杰座', '1');
INSERT INTO `collect` VALUES ('107', '59', '无法长大', '赵雷', '无法长大', '1');
INSERT INTO `collect` VALUES ('108', '59', '都一样', '李荣浩', '模特', '1');
INSERT INTO `collect` VALUES ('109', '59', '违背的青春', '薛之谦', '违背的青春', '1');
INSERT INTO `collect` VALUES ('110', '59', '城府', '许嵩', '自定义', '1');
INSERT INTO `collect` VALUES ('111', '59', '生如夏花', '朴树', '生如夏花', '1');
INSERT INTO `collect` VALUES ('112', '59', '傻子才悲伤', '朴树', '生如夏花', '1');
INSERT INTO `collect` VALUES ('113', '59', '来不及', '朴树', '生如夏花', '1');
INSERT INTO `collect` VALUES ('114', '59', '今夜的滋味', '朴树', '生如夏花', '1');
INSERT INTO `collect` VALUES ('115', '59', '你的背包', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('116', '59', 'K歌之王', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('117', '59', '红玫瑰', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('118', '59', '爱情转移', '陈奕迅', '破坏王', '1');
INSERT INTO `collect` VALUES ('119', '59', '用余生去爱', '张学友', '醒着做梦', '1');
INSERT INTO `collect` VALUES ('120', '59', '时间有泪', '张学友', '醒着做梦', '1');
INSERT INTO `collect` VALUES ('121', '59', '你说的', '张学友', '醒着做梦', '1');
INSERT INTO `collect` VALUES ('122', '59', '我爱上你', '张学友', '醒着做梦', '1');
INSERT INTO `collect` VALUES ('123', '59', '我醒着做梦', '张学友', '醒着做梦', '1');
INSERT INTO `collect` VALUES ('124', '59', '爱在西元前', '周杰伦', '范特西', '1');
INSERT INTO `collect` VALUES ('125', '59', 'breeze', '泽野弘之', 'タイヨウのうた', '1');
INSERT INTO `collect` VALUES ('126', '59', 'Lotto', 'EXO', 'LOTTO', '1');
INSERT INTO `collect` VALUES ('128', '49', '都一样', '李荣浩', '模特', '1');
INSERT INTO `collect` VALUES ('129', '49', '无法长大', '赵雷', '无法长大', '1');
INSERT INTO `collect` VALUES ('130', '59', '玛丽', '赵雷', '无法长大', '1');

-- ----------------------------
-- Table structure for music
-- ----------------------------
DROP TABLE IF EXISTS `music`;
CREATE TABLE `music` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(64) NOT NULL,
  `sname` varchar(11) NOT NULL,
  `aname` varchar(11) DEFAULT NULL,
  `styles` varchar(64) DEFAULT NULL,
  `hot` int(11) DEFAULT '0',
  `photp` varchar(255) DEFAULT NULL,
  `urll` varchar(255) NOT NULL,
  `lrc` char(255) DEFAULT NULL,
  `times` varchar(6) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of music
-- ----------------------------
INSERT INTO `music` VALUES ('1', '十年', '陈奕迅', '破坏王', '3', '1', '/uploads/2018_10_24/20d80fe1c7be93d8be4514addc4824534066.jpg', '/uploads/2018_10_24/20d80fe1c7be93d8be4514addc4824532583.mp3', '/uploads/2018_10_24/20d80fe1c7be93d8be4514addc4824534640.lrc', '4:24');
INSERT INTO `music` VALUES ('2', '你的背包', '陈奕迅', '破坏王', '3', '1', '/uploads/2018_10_24/1030e1e7d96768014587fd9296981ae23184.jpg', '/uploads/2018_10_24/1030e1e7d96768014587fd9296981ae25041.mp3', '/uploads/2018_10_24/1030e1e7d96768014587fd9296981ae29828.lrc', '4:52');
INSERT INTO `music` VALUES ('3', '红玫瑰', '陈奕迅', '破坏王', '3', '1', '/uploads/2018_10_24/ec5f84002f5af86a0004279ccf8fa1f49521.jpg', '/uploads/2018_10_24/ec5f84002f5af86a0004279ccf8fa1f43391.mp3', '/uploads/2018_10_24/ec5f84002f5af86a0004279ccf8fa1f42980.lrc', '3:56');
INSERT INTO `music` VALUES ('4', '爱情转移', '陈奕迅', '破坏王', '4', '2', '/uploads/2018_10_24/3725656b619dc48e39b1a174c5f3fa3c9487.jpg', '/uploads/2018_10_24/3725656b619dc48e39b1a174c5f3fa3c8833.mp3', '/uploads/2018_10_24/3725656b619dc48e39b1a174c5f3fa3c8491.lrc', '4:45');
INSERT INTO `music` VALUES ('5', 'K歌之王', '陈奕迅', '破坏王', '0', '2', '/uploads/2018_10_24/ecc488db55c880b541e099d290d939de5584.jpg', '/uploads/2018_10_24/ecc488db55c880b541e099d290d939de9970.mp3', '/uploads/2018_10_24/ecc488db55c880b541e099d290d939de7018.lrc', '5:01');
INSERT INTO `music` VALUES ('6', '用余生去爱', '张学友', '醒着做梦', '2', '1', '/uploads/2018_10_24/30a8684957714a6efcf830efd41f343b9908.jpg', '/uploads/2018_10_24/30a8684957714a6efcf830efd41f343b1886.mp3', '/uploads/2018_10_24/30a8684957714a6efcf830efd41f343b7757.lrc', '4:14');
INSERT INTO `music` VALUES ('7', '时间有泪', '张学友', '醒着做梦', '4', '1', '/uploads/2018_10_24/8edbbbaeac1a6be0edf70dcab95174153343.jpg', '/uploads/2018_10_24/8edbbbaeac1a6be0edf70dcab95174154989.mp3', '/uploads/2018_10_24/8edbbbaeac1a6be0edf70dcab95174157433.lrc', '3:37');
INSERT INTO `music` VALUES ('8', '你说的', '张学友', '醒着做梦', '3', '1', '/uploads/2018_10_24/2f4b3bcff6ecbb52fb5ba1ad548c5f654305.jpg', '/uploads/2018_10_24/2f4b3bcff6ecbb52fb5ba1ad548c5f654759.mp3', '/uploads/2018_10_24/2f4b3bcff6ecbb52fb5ba1ad548c5f651608.lrc', '4:40');
INSERT INTO `music` VALUES ('9', '我爱上你', '张学友', '醒着做梦', '4', '1', '/uploads/2018_10_24/d260f860957e6d55b5932f1ca19637d46609.jpg', '/uploads/2018_10_24/d260f860957e6d55b5932f1ca19637d41307.mp3', '/uploads/2018_10_24/d260f860957e6d55b5932f1ca19637d44614.lrc', '3:22');
INSERT INTO `music` VALUES ('10', '我醒着做梦', '张学友', '醒着做梦', '7', '2', '/uploads/2018_10_24/c6ac4df747a5098c44365d653078ce7f7988.jpg', '/uploads/2018_10_24/c6ac4df747a5098c44365d653078ce7f4766.mp3', '/uploads/2018_10_24/c6ac4df747a5098c44365d653078ce7f9000.lrc', '4:43');
INSERT INTO `music` VALUES ('11', '爱在西元前', '周杰伦', '范特西', '1', '111', '/uploads/2018_10_24/26174b75f0c7a321d08125e24b197ee71871.jpg', '/uploads/2018_10_24/26174b75f0c7a321d08125e24b197ee78655.mp3', '/uploads/2018_10_24/26174b75f0c7a321d08125e24b197ee71351.lrc', '3:54');
INSERT INTO `music` VALUES ('12', '简单爱', '周杰伦', '范特西', '1', '1', '/uploads/2018_10_24/2eb02edc9b005c3d11abaa53f9e18c206976.jpg', '/uploads/2018_10_24/2eb02edc9b005c3d11abaa53f9e18c209354.mp3', '/uploads/2018_10_24/2eb02edc9b005c3d11abaa53f9e18c201012.lrc', '4:30');
INSERT INTO `music` VALUES ('13', '忍者', '周杰伦', '范特西', '6', '0', '/uploads/2018_10_24/85b4bd9a65d06dc65bc0fc51a5a840503928.jpg', '/uploads/2018_10_24/85b4bd9a65d06dc65bc0fc51a5a840508892.mp3', '/uploads/2018_10_24/85b4bd9a65d06dc65bc0fc51a5a840501548.lrc', '2:38');
INSERT INTO `music` VALUES ('14', '开不了口', '周杰伦', '范特西', '7', '0', '/uploads/2018_10_24/6c96dad9751a642ba9cd74d65d4061d19893.jpg', '/uploads/2018_10_24/6c96dad9751a642ba9cd74d65d4061d15174.mp3', '/uploads/2018_10_24/6c96dad9751a642ba9cd74d65d4061d18222.lrc', '4:44');
INSERT INTO `music` VALUES ('15', '双截棍', '周杰伦', '范特西', '4', '100', '/uploads/2018_10_24/e14d8f83c418ca72c0b296de7f36b7067061.jpg', '/uploads/2018_10_24/e14d8f83c418ca72c0b296de7f36b7065825.mp3', '/uploads/2018_10_24/e14d8f83c418ca72c0b296de7f36b7063995.lrc', '3:21');
INSERT INTO `music` VALUES ('16', '半兽人', '周杰伦', '八度空间', '6', '90', '/uploads/2018_10_24/5a19fe8cb0c428b13d20520cf44ef5854975.jpg', '/uploads/2018_10_24/5a19fe8cb0c428b13d20520cf44ef5857164.mp3', '/uploads/2018_10_24/5a19fe8cb0c428b13d20520cf44ef5852048.lrc', '4:07');
INSERT INTO `music` VALUES ('17', '半岛铁盒', '周杰伦', '八度空间', '2', '81', '/uploads/2018_10_24/cea9a070e1b93c62262a395a1b1adef38164.jpg', '/uploads/2018_10_24/cea9a070e1b93c62262a395a1b1adef33412.mp3', '/uploads/2018_10_24/cea9a070e1b93c62262a395a1b1adef31756.lrc', '5:07');
INSERT INTO `music` VALUES ('18', '暗号', '周杰伦', '八度空间', '3', '1', '/uploads/2018_10_24/3591e92d5660519c0f8f202771c0ae5b4768.jpg', '/uploads/2018_10_24/3591e92d5660519c0f8f202771c0ae5b6176.mp3', '/uploads/2018_10_24/3591e92d5660519c0f8f202771c0ae5b6392.lrc', '4:31');
INSERT INTO `music` VALUES ('19', '龙拳', '周杰伦', '八度空间', '2', '1', '/uploads/2018_10_24/9bd99a98316c7e87e9a19722942975e32942.jpg', '/uploads/2018_10_24/9bd99a98316c7e87e9a19722942975e35047.mp3', '/uploads/2018_10_24/9bd99a98316c7e87e9a19722942975e32161.lrc', '4:34');
INSERT INTO `music` VALUES ('20', '米兰的小铁匠', '周杰伦', '八度空间', '4', '0', '/uploads/2018_10_24/09dbd8421162fb64fa9f2d6247d3cc4f5789.jpg', '/uploads/2018_10_24/09dbd8421162fb64fa9f2d6247d3cc4f1978.mp3', '/uploads/2018_10_24/09dbd8421162fb64fa9f2d6247d3cc4f2148.lrc', '4:00');
INSERT INTO `music` VALUES ('21', '以父之名', '周杰伦', '叶惠美', '7', '0', '/uploads/2018_10_24/fa0af618056931a14a56be51b1ef1a0e3667.jpg', '/uploads/2018_10_24/fa0af618056931a14a56be51b1ef1a0e1069.mp3', '/uploads/2018_10_24/fa0af618056931a14a56be51b1ef1a0e3913.lrc', '5:42');
INSERT INTO `music` VALUES ('22', '晴天', '周杰伦', '叶惠美', '2', '0', '/uploads/2018_10_24/ac8a5fc8923633854e08ce2b656d94441194.jpg', '/uploads/2018_10_24/ac8a5fc8923633854e08ce2b656d94448077.mp3', '/uploads/2018_10_24/ac8a5fc8923633854e08ce2b656d94447562.lrc', '4:29');
INSERT INTO `music` VALUES ('23', '东风破', '周杰伦', '叶惠美', '2', '0', '/uploads/2018_10_24/782c58aab793f27344357aa144b123579226.jpg', '/uploads/2018_10_24/782c58aab793f27344357aa144b123576606.mp3', '/uploads/2018_10_24/782c58aab793f27344357aa144b123573397.lrc', '5:15');
INSERT INTO `music` VALUES ('24', '三年二班', '周杰伦', '叶惠美', '0', '0', '/uploads/2018_10_24/71bf0aaa44fd568574f75a5fe777f9824501.jpg', '/uploads/2018_10_24/71bf0aaa44fd568574f75a5fe777f9829517.mp3', '/uploads/2018_10_24/71bf0aaa44fd568574f75a5fe777f9824025.lrc', '4:40');
INSERT INTO `music` VALUES ('25', '梯田', '周杰伦', '叶惠美', '5', '0', '/uploads/2018_10_24/8e0fa5152caceedc57b92d1c2c0abe6d7993.jpg', '/uploads/2018_10_24/8e0fa5152caceedc57b92d1c2c0abe6d1856.mp3', '/uploads/2018_10_24/8e0fa5152caceedc57b92d1c2c0abe6d7958.lrc', '3:33');
INSERT INTO `music` VALUES ('26', '七里香', '周杰伦', '七里香', '4', '1', '/uploads/2018_10_24/92b01f164041d5e62e7e6d42c74676443098.jpg', '/uploads/2018_10_24/92b01f164041d5e62e7e6d42c74676446604.mp3', '/uploads/2018_10_24/92b01f164041d5e62e7e6d42c74676448921.lrc', '4:59');
INSERT INTO `music` VALUES ('27', '借口', '周杰伦', '七里香', '4', '0', '/uploads/2018_10_24/ef48652f0abd96c869acabf59fb18d801098.jpg', '/uploads/2018_10_24/ef48652f0abd96c869acabf59fb18d802903.mp3', '/uploads/2018_10_24/ef48652f0abd96c869acabf59fb18d802752.lrc', '4:20');
INSERT INTO `music` VALUES ('28', '搁浅', '周杰伦', '七里香', '7', '0', '/uploads/2018_10_24/af039b4df442425c8193c620a36967586065.jpg', '/uploads/2018_10_24/af039b4df442425c8193c620a36967587048.mp3', '/uploads/2018_10_24/af039b4df442425c8193c620a36967588871.lrc', '4:00');
INSERT INTO `music` VALUES ('29', '乱舞春秋', '周杰伦', '叶惠美', '2', '0', '/uploads/2018_10_24/1e2126fa011b58fc5ffc8da892730b4d1064.jpg', '/uploads/2018_10_24/1e2126fa011b58fc5ffc8da892730b4d2420.mp3', '/uploads/2018_10_24/1e2126fa011b58fc5ffc8da892730b4d9864.lrc', '4:39');
INSERT INTO `music` VALUES ('30', '止战之殇', '周杰伦', '七里香', '2', '0', '/uploads/2018_10_24/83ebd1be44a0fdbcfc20e3f32c8d5cf02274.jpg', '/uploads/2018_10_24/83ebd1be44a0fdbcfc20e3f32c8d5cf08981.mp3', '/uploads/2018_10_24/83ebd1be44a0fdbcfc20e3f32c8d5cf03271.lrc', '4:34');
INSERT INTO `music` VALUES ('31', '夜的第七章', '周杰伦', '依然范特西', '0', '0', '/uploads/2018_10_24/15ec7feb688e388060aa038afb6cf81c6440.jpg', '/uploads/2018_10_24/15ec7feb688e388060aa038afb6cf81c7152.mp3', '/uploads/2018_10_24/15ec7feb688e388060aa038afb6cf81c6467.lrc', '4:34');
INSERT INTO `music` VALUES ('32', '听妈妈的话', '周杰伦', '依然范特西', '7', '0', '/uploads/2018_10_24/89b2b5076c8a80b3faa5143f180569931115.jpg', '/uploads/2018_10_24/89b2b5076c8a80b3faa5143f180569934845.mp3', '/uploads/2018_10_24/89b2b5076c8a80b3faa5143f180569938452.lrc', '4:35');
INSERT INTO `music` VALUES ('33', '千里之外', '周杰伦', '依然范特西', '2', '1', '/uploads/2018_10_24/66ec7fdb2b640cd65fdc9eeb428f3af33007.jpg', '/uploads/2018_10_24/66ec7fdb2b640cd65fdc9eeb428f3af34667.mp3', '/uploads/2018_10_24/66ec7fdb2b640cd65fdc9eeb428f3af33476.lrc', '4:16');
INSERT INTO `music` VALUES ('34', '退后', '周杰伦', '依然范特西', '0', '0', '/uploads/2018_10_24/90dd3d2667e9b7128da4ccc69a07d4499004.jpg', '/uploads/2018_10_24/90dd3d2667e9b7128da4ccc69a07d4493016.mp3', '/uploads/2018_10_24/90dd3d2667e9b7128da4ccc69a07d4493712.lrc', '4:21');
INSERT INTO `music` VALUES ('35', '迷迭香', '周杰伦', '依然范特西', '7', '0', '/uploads/2018_10_24/771bbc514b5b2ca10f49819aff8643777640.jpg', '/uploads/2018_10_24/771bbc514b5b2ca10f49819aff8643779551.mp3', '/uploads/2018_10_24/771bbc514b5b2ca10f49819aff8643775187.lrc', '4:11');
INSERT INTO `music` VALUES ('36', '牛仔很忙', '周杰伦', '我很忙', '6', '0', '/uploads/2018_10_24/d7420992346cd64b8c49030f3a8f65783625.jpg', '/uploads/2018_10_24/d7420992346cd64b8c49030f3a8f65781414.mp3', '/uploads/2018_10_24/d7420992346cd64b8c49030f3a8f65781714.lrc', '2:48');
INSERT INTO `music` VALUES ('37', '青花瓷', '周杰伦', '我很忙', '2', '0', '/uploads/2018_10_24/3034d9050904c493075edc9ee4e2c3ea8558.jpg', '/uploads/2018_10_24/3034d9050904c493075edc9ee4e2c3ea5424.mp3', '/uploads/2018_10_24/3034d9050904c493075edc9ee4e2c3ea4258.lrc', '3:59');
INSERT INTO `music` VALUES ('38', '阳光宅男', '周杰伦', '我很忙', '6', '0', '/uploads/2018_10_24/4bb9d2a069a14f9a82121c24dc12972c8647.jpg', '/uploads/2018_10_24/4bb9d2a069a14f9a82121c24dc12972c1229.mp3', '/uploads/2018_10_24/4bb9d2a069a14f9a82121c24dc12972c3171.lrc', '3:42');
INSERT INTO `music` VALUES ('39', '甜甜的', '周杰伦', '我很忙', '7', '0', '/uploads/2018_10_24/4b6b8a14a06bd47a8f8e1579e59a050a1621.jpg', '/uploads/2018_10_24/4b6b8a14a06bd47a8f8e1579e59a050a1863.mp3', '/uploads/2018_10_24/4b6b8a14a06bd47a8f8e1579e59a050a6576.lrc', '4:03');
INSERT INTO `music` VALUES ('40', '最长的电影', '周杰伦', '我很忙', '5', '0', '/uploads/2018_10_24/dcff9943ef7b2088133fc9efc97bbed23606.jpg', '/uploads/2018_10_24/dcff9943ef7b2088133fc9efc97bbed21939.mp3', '/uploads/2018_10_24/dcff9943ef7b2088133fc9efc97bbed21670.lrc', '3:55');
INSERT INTO `music` VALUES ('41', '龙战骑士', '周杰伦', '魔杰座', '2', '0', '/uploads/2018_10_24/51b9ef8a4462b761fe360e2780bb83b45353.jpg', '/uploads/2018_10_24/51b9ef8a4462b761fe360e2780bb83b44667.mp3', '/uploads/2018_10_24/51b9ef8a4462b761fe360e2780bb83b49888.lrc', '4:32');
INSERT INTO `music` VALUES ('42', '花海', '周杰伦', '魔杰座', '1', '0', '/uploads/2018_10_24/2cab9433c36cf1048cc01007948cd1971446.jpg', '/uploads/2018_10_24/2cab9433c36cf1048cc01007948cd1972292.mp3', '/uploads/2018_10_24/2cab9433c36cf1048cc01007948cd1973746.lrc', '4:24');
INSERT INTO `music` VALUES ('43', '兰亭序', '周杰伦', '魔杰座', '4', '1', '/uploads/2018_10_24/87d5285d5e02f42f1ed01a832ac3d9ce5098.jpg', '/uploads/2018_10_24/87d5285d5e02f42f1ed01a832ac3d9ce5838.mp3', '/uploads/2018_10_24/87d5285d5e02f42f1ed01a832ac3d9ce7098.lrc', '4:34');
INSERT INTO `music` VALUES ('44', '时光机', '周杰伦', '魔杰座', '4', '0', '/uploads/2018_10_24/f3321938d498c90977ba1a77f05b6bfc7170.jpg', '/uploads/2018_10_24/f3321938d498c90977ba1a77f05b6bfc3326.mp3', '/uploads/2018_10_24/f3321938d498c90977ba1a77f05b6bfc4404.lrc', '5:11');
INSERT INTO `music` VALUES ('45', '稻香', '周杰伦', '魔杰座', '3', '1', '/uploads/2018_10_24/a86ea98686a52052450cb8dc579adce29172.jpg', '/uploads/2018_10_24/a86ea98686a52052450cb8dc579adce22416.mp3', '/uploads/2018_10_24/a86ea98686a52052450cb8dc579adce29393.lrc', '3:43');
INSERT INTO `music` VALUES ('46', '违背的青春', '薛之谦', '违背的青春', '5', '2', '/uploads/2018_10_24/286e33597992713df1e69156eaf1e3cd8371.jpg', '/uploads/2018_10_24/286e33597992713df1e69156eaf1e3cd8611.mp3', '/uploads/2018_10_24/286e33597992713df1e69156eaf1e3cd8072.lrc', '5:36');
INSERT INTO `music` VALUES ('47', '梦死醉生', '张国荣', '陪你倒数', '7', '0', '/uploads/2018_10_24/66e1fa443a08e3901803cc68db06be069194.jpg', '/uploads/2018_10_24/66e1fa443a08e3901803cc68db06be068430.mp3', '/uploads/2018_10_24/66e1fa443a08e3901803cc68db06be062411.lrc', '4:11');
INSERT INTO `music` VALUES ('48', '左右手', '张国荣', '陪你倒数', '3', '0', '/uploads/2018_10_24/9573718da1a702650253dd90678658533790.jpg', '/uploads/2018_10_24/9573718da1a702650253dd90678658534703.jpg', '/uploads/2018_10_24/9573718da1a702650253dd90678658535037.lrc', '4:18');
INSERT INTO `music` VALUES ('49', '春夏秋冬', '张国荣', '陪你倒数', '0', '0', '/uploads/2018_10_24/ed42acafe641165f0d142fcfd588482c7204.jpg', '/uploads/2018_10_24/ed42acafe641165f0d142fcfd588482c6497.mp3', '/uploads/2018_10_24/804d2ef8c571a2cf452843a623db30715671.lrc', '4:09');
INSERT INTO `music` VALUES ('50', '寂寞有害', '张国荣', '陪你倒数', '2', '0', '/uploads/2018_10_24/a693ad46bfb666f2646bfbe5a1ad5dff1692.jpg', '/uploads/2018_10_24/a693ad46bfb666f2646bfbe5a1ad5dff3479.mp3', '/uploads/2018_10_24/a693ad46bfb666f2646bfbe5a1ad5dff6329.lrc', '4:36');
INSERT INTO `music` VALUES ('51', '同道中人', '张国荣', '陪你倒数', '4', '1', '/uploads/2018_10_24/ab1134305c59e8e1039f62ad102bed438831.jpg', '/uploads/2018_10_24/ab1134305c59e8e1039f62ad102bed435007.mp3', '/uploads/2018_10_24/ab1134305c59e8e1039f62ad102bed438287.lrc', '3:39');
INSERT INTO `music` VALUES ('52', '傻子才悲伤', '朴树', '生如夏花', '0', '1', '/uploads/2018_10_24/afa9bc2f09b18b950cfcd54a0061ed3c9378.jpg', '/uploads/2018_10_24/afa9bc2f09b18b950cfcd54a0061ed3c6463.mp3', '/uploads/2018_10_24/dfab6e4fd394ee63f1864ed4f9dc23702217.lrc', '3:59');
INSERT INTO `music` VALUES ('53', '来不及', '朴树', '生如夏花', '2', '1', '/uploads/2018_10_24/68af1e91fd65df4c087f6b99dff849635094.jpg', '/uploads/2018_10_24/68af1e91fd65df4c087f6b99dff849637195.mp3', '/uploads/2018_10_24/68af1e91fd65df4c087f6b99dff849635894.lrc', '5:46');
INSERT INTO `music` VALUES ('54', '今夜的滋味', '朴树', '生如夏花', '5', '1', '/uploads/2018_10_24/c8aefc6b76332408049b167ac5b046753455.jpg', '/uploads/2018_10_24/c8aefc6b76332408049b167ac5b046753255.mp3', '/uploads/2018_10_24/c8aefc6b76332408049b167ac5b046757424.lrc', '4:09');
INSERT INTO `music` VALUES ('55', '苏珊的舞鞋', '朴树', '生如夏花', '6', '0', '/uploads/2018_10_24/c84ddbec939ad1313f9fed59ecfce3a01632.jpg', '/uploads/2018_10_24/c84ddbec939ad1313f9fed59ecfce3a08163.mp3', '/uploads/2018_10_24/c84ddbec939ad1313f9fed59ecfce3a06583.lrc', '5:05');
INSERT INTO `music` VALUES ('56', '生如夏花', '朴树', '生如夏花', '2', '1', '/uploads/2018_10_24/25fa4cd6e9d66ef19e6d26e0cdf864d98168.jpg', '/uploads/2018_10_24/25fa4cd6e9d66ef19e6d26e0cdf864d92248.mp3', '/uploads/2018_10_24/25fa4cd6e9d66ef19e6d26e0cdf864d95452.lrc', '4:54');
INSERT INTO `music` VALUES ('57', '曙光', 'Tank', '生存之道', '2', '0', '/uploads/2018_10_24/1b6cea155db92e166261d061c16d284a9682.jpg', '/uploads/2018_10_24/1b6cea155db92e166261d061c16d284a8461.mp3', '/uploads/2018_10_24/1b6cea155db92e166261d061c16d284a2091.lrc', '3:29');
INSERT INTO `music` VALUES ('58', '狙击手', 'Tank', '生存之道', '5', '0', '/uploads/2018_10_24/b6324a8deb3c3dc8a448283a05641ed04083.jpg', '/uploads/2018_10_24/b6324a8deb3c3dc8a448283a05641ed03624.mp3', '/uploads/2018_10_24/b6324a8deb3c3dc8a448283a05641ed02181.lrc', '4:17');
INSERT INTO `music` VALUES ('59', '三国恋', 'Tank', '生存之道', '3', '0', '/uploads/2018_10_24/1fa38284fe33284c5d331e0b636d6c008048.jpg', '/uploads/2018_10_24/1fa38284fe33284c5d331e0b636d6c005845.lrc', '/uploads/2018_10_24/1fa38284fe33284c5d331e0b636d6c005501.lrc', '4:06');
INSERT INTO `music` VALUES ('60', '几分之几', 'Tank', '生存之道', '7', '1', '/uploads/2018_10_24/8a14bdcdcf083acd9489903ac4d52fe69497.jpg', '/uploads/2018_10_24/8a14bdcdcf083acd9489903ac4d52fe68762.mp3', '/uploads/2018_10_24/8a14bdcdcf083acd9489903ac4d52fe63473.lrc', '4:18');
INSERT INTO `music` VALUES ('61', '朵', '赵雷', '无法长大', '4', '1', '/uploads/2018_10_24/c2b762f2dc051b86511c9d0f256c34854035.jpg', '/uploads/2018_10_24/c2b762f2dc051b86511c9d0f256c34859743.mp3', '/uploads/2018_10_24/c2b762f2dc051b86511c9d0f256c34857044.jpg', '4:52');
INSERT INTO `music` VALUES ('62', '玛丽', '赵雷', '无法长大', '1', '2', '/uploads/2018_10_24/69283ed44af37e9006062fc7a78b4ba54695.jpg', '/uploads/2018_10_24/69283ed44af37e9006062fc7a78b4ba53281.mp3', '/uploads/2018_10_24/69283ed44af37e9006062fc7a78b4ba51433.lrc', '4:41');
INSERT INTO `music` VALUES ('63', '鼓楼', '赵雷', '无法长大', '2', '0', '/uploads/2018_10_24/f922056a67f6718fda80866a7d5090bd5502.jpg', '/uploads/2018_10_24/f922056a67f6718fda80866a7d5090bd4755.mp3', '/uploads/2018_10_24/f922056a67f6718fda80866a7d5090bd7120.lrc', '4:41');
INSERT INTO `music` VALUES ('64', '成都', '赵雷', '无法长大', '3', '0', '/uploads/2018_10_24/4c93fea02d217a2ab436f3ddd0ba76696454.jpg', '/uploads/2018_10_24/4c93fea02d217a2ab436f3ddd0ba76695587.mp3', '/uploads/2018_10_24/4c93fea02d217a2ab436f3ddd0ba76698959.lrc', '5:28');
INSERT INTO `music` VALUES ('65', '无法长大', '赵雷', '无法长大', '7', '2', '/uploads/2018_10_24/2ff04700a1b997460bccfac647dbec0a4487.jpg', '/uploads/2018_10_24/2ff04700a1b997460bccfac647dbec0a6047.mp3', '/uploads/2018_10_24/2ff04700a1b997460bccfac647dbec0a8249.lrc', '4:47');
INSERT INTO `music` VALUES ('66', '如果当时', '许嵩', '自定义', '0', '1', '/uploads/2018_10_24/0cfba07ab36537f6c04d381ac7646fae2352.jpg', '/uploads/2018_10_24/0cfba07ab36537f6c04d381ac7646fae1090.mp3', '/uploads/2018_10_24/0cfba07ab36537f6c04d381ac7646fae2263.lrc', '5:16');
INSERT INTO `music` VALUES ('67', '多余的解释', '许嵩', '自定义', '1', '0', '/uploads/2018_10_24/5e1a76aea467182af0edc830da1a73483621.jpg', '/uploads/2018_10_24/5e1a76aea467182af0edc830da1a73488022.mp3', '/uploads/2018_10_24/5e1a76aea467182af0edc830da1a73489007.lrc', '4:37');
INSERT INTO `music` VALUES ('68', '有何不可', '许嵩', '自定义', '2', '1', '/uploads/2018_10_24/83a3e95e5bc81b8a6346e9639b0b4d174710.jpg', '/uploads/2018_10_24/83a3e95e5bc81b8a6346e9639b0b4d171361.mp3', '/uploads/2018_10_24/83a3e95e5bc81b8a6346e9639b0b4d178812.lrc', '4:01');
INSERT INTO `music` VALUES ('69', '清明雨上', '许嵩', '自定义', '4', '0', '/uploads/2018_10_24/17e2a949a3d8cdb24803a08f58cb70988836.jpg', '/uploads/2018_10_24/17e2a949a3d8cdb24803a08f58cb70981307.mp3', '/uploads/2018_10_24/17e2a949a3d8cdb24803a08f58cb70987651.lrc', '3:39');
INSERT INTO `music` VALUES ('70', '城府', '许嵩', '自定义', '7', '2', '/uploads/2018_10_24/e017db614de4dd1ae267c344d085fa504761.jpg', '/uploads/2018_10_24/e017db614de4dd1ae267c344d085fa508475.mp3', '/uploads/2018_10_24/e017db614de4dd1ae267c344d085fa505203.lrc', '3:19');
INSERT INTO `music` VALUES ('71', 'ルポルタージュ', '高橋優', 'ルポルタージュ', '1', '0', '/uploads/2018_10_24/145dec62ccd9822c591c41d8d9e000a45205.jpg', '/uploads/2018_10_24/145dec62ccd9822c591c41d8d9e000a49533.mp3', '/uploads/2018_10_24/145dec62ccd9822c591c41d8d9e000a43005.lrc', '4:15');
INSERT INTO `music` VALUES ('72', 'from sunset to sunrise', '泽野弘之', 'タイヨウのうた', '1', '0', '/uploads/2018_10_24/8842a24b232dcc9219bd93775ae4cc124511.jpg', '/uploads/2018_10_24/8842a24b232dcc9219bd93775ae4cc125676.mp3', '/uploads/2018_10_24/8842a24b232dcc9219bd93775ae4cc127075.lrc', '5:44');
INSERT INTO `music` VALUES ('73', 'bask in the sun', '泽野弘之', 'タイヨウのうた', '6', '0', '/uploads/2018_10_24/cc1a1cf043ee217dd6f4788f0021e94d7137.jpg', '/uploads/2018_10_24/cc1a1cf043ee217dd6f4788f0021e94d1578.mp3', '/uploads/2018_10_24/cc1a1cf043ee217dd6f4788f0021e94d9185.lrc', '3:16');
INSERT INTO `music` VALUES ('74', 'breeze', '泽野弘之', 'タイヨウのうた', '0', '2', '/uploads/2018_10_24/a6e444c9f36affcba262c41c08392b3d5888.jpg', '/uploads/2018_10_24/a6e444c9f36affcba262c41c08392b3d8320.mp3', '/uploads/2018_10_24/a6e444c9f36affcba262c41c08392b3d8900.lrc', '2:50');
INSERT INTO `music` VALUES ('75', 'Dr.West', 'Eminem', 'Relapse', '4', '0', '/uploads/2018_10_24/d817a635aca3a5bbfba95280800f4dd33930.jpg', '/uploads/2018_10_24/d817a635aca3a5bbfba95280800f4dd33246.mp3', '/uploads/2018_10_24/d817a635aca3a5bbfba95280800f4dd39277.lrc', '1:29');
INSERT INTO `music` VALUES ('76', '3 a.m.', 'Eminem', 'Relapse', '0', '0', '/uploads/2018_10_24/47cf50c0350208b1e3b9ba224b9b3af42505.jpg', '/uploads/2018_10_24/47cf50c0350208b1e3b9ba224b9b3af46587.mp3', '/uploads/2018_10_24/47cf50c0350208b1e3b9ba224b9b3af41362.lrc', '5:19');
INSERT INTO `music` VALUES ('77', 'My Mom', 'Eminem', 'Relapse', '4', '0', '/uploads/2018_10_24/d7a9364c710f52a5776126a7e2788f2c2548.jpg', '/uploads/2018_10_24/d7a9364c710f52a5776126a7e2788f2c3201.mp3', '/uploads/2018_10_24/f92629af5e2d930e623ef4058004d7328049.lrc', '5:19');
INSERT INTO `music` VALUES ('78', 'Insane', 'Eminem', 'Relapse', '5', '0', '/uploads/2018_10_24/dbc8a0fe48382437c2751fa877ef6c977466.jpg', '/uploads/2018_10_24/dbc8a0fe48382437c2751fa877ef6c978893.mp3', '/uploads/2018_10_24/dbc8a0fe48382437c2751fa877ef6c977471.lrc', '3:01');
INSERT INTO `music` VALUES ('79', 'Lotto', 'EXO', 'LOTTO', '0', '1', '/uploads/2018_10_24/c048bae4c8fbe8d341dc16775a4fa94d2688.jpg', '/uploads/2018_10_24/c048bae4c8fbe8d341dc16775a4fa94d7742.mp3', '/uploads/2018_10_24/c048bae4c8fbe8d341dc16775a4fa94d9521.lrc', '3:09');
INSERT INTO `music` VALUES ('80', 'Lucky One', 'EXO', 'LOTTO', '4', '0', '/uploads/2018_10_24/35c580fcc8ce2b7b1d657120ccce351d6300.mp3', '/uploads/2018_10_24/35c580fcc8ce2b7b1d657120ccce351d1585.mp3', '/uploads/2018_10_24/35c580fcc8ce2b7b1d657120ccce351d6846.lrc', '3:47');
INSERT INTO `music` VALUES ('81', 'Monster', 'EXO', 'LOTTO', '2', '0', '/uploads/2018_10_24/53570dd7ed688aa88c5c8f411271fcce3470.jpg', '/uploads/2018_10_24/53570dd7ed688aa88c5c8f411271fcce2704.mp3', '/uploads/2018_10_24/53570dd7ed688aa88c5c8f411271fcce3074.lrc', '3:08');
INSERT INTO `music` VALUES ('82', '李白', '李荣浩', '模特', '2', '0', '/uploads/2018_10_24/81dcc8d4bcada98770869e9e2c7c64175732.jpg', '/uploads/2018_10_24/81dcc8d4bcada98770869e9e2c7c64172371.mp3', '/uploads/2018_10_24/81dcc8d4bcada98770869e9e2c7c64173024.lrc', '4:33');
INSERT INTO `music` VALUES ('83', '模特', '李荣浩', '模特', '3', '1', '/uploads/2018_10_24/8a34ab42bbd87ac273c58cc7892fa5a22454.jpg', '/uploads/2018_10_24/8a34ab42bbd87ac273c58cc7892fa5a21113.mp3', '/uploads/2018_10_24/8a34ab42bbd87ac273c58cc7892fa5a27084.lrc', '5:06');
INSERT INTO `music` VALUES ('84', '两个人', '李荣浩', '模特', '2', '0', '/uploads/2018_10_24/4f0f192d153c66bb27b7511507dd85015492.jpg', '/uploads/2018_10_24/4f0f192d153c66bb27b7511507dd85012558.mp3', '/uploads/2018_10_24/4f0f192d153c66bb27b7511507dd85018900.lrc', '4:49');
INSERT INTO `music` VALUES ('85', '太坦白', '李荣浩', '模特', '2', '0', '/uploads/2018_10_24/514e914e5b25e57678c4567209be2d2c3731.jpg', '/uploads/2018_10_24/514e914e5b25e57678c4567209be2d2c3242.mp3', '/uploads/2018_10_24/514e914e5b25e57678c4567209be2d2c3141.lrc', '4:56');
INSERT INTO `music` VALUES ('86', '都一样', '李荣浩', '模特', '0', '2', '/uploads/2018_10_24/58d4a1bb7c4ae8be46455783dbffcd0b1371.jpg', '/uploads/2018_10_24/58d4a1bb7c4ae8be46455783dbffcd0b4470.mp3', '/uploads/2018_10_24/58d4a1bb7c4ae8be46455783dbffcd0b6882.lrc', '5:03');
INSERT INTO `music` VALUES ('87', '쿠데타', '权志龙', 'COUP D`ETAT', '0', '1', '/uploads/2018_10_24/f6d42406b43d956a130892d255571d466405.jpg', '/uploads/2018_10_24/f6d42406b43d956a130892d255571d461776.mp3', '/uploads/2018_10_24/f6d42406b43d956a130892d255571d467476.lrc', '3:00');
INSERT INTO `music` VALUES ('88', 'R.O.D', '权志龙', 'COUP D`ETAT', '6', '0', '/uploads/2018_10_24/433fe67d2204d7011644944486847b364843.jpg', '/uploads/2018_10_24/433fe67d2204d7011644944486847b363035.mp3', '/uploads/2018_10_24/433fe67d2204d7011644944486847b368944.lrc', '3:43');
INSERT INTO `music` VALUES ('89', 'Keys To The Kingdom', 'Linkin Park', 'The Hunting', '6', '0', '/uploads/2018_10_24/f4861cca39f4b017937527b1c6d16eec1278.jpg', '/uploads/2018_10_24/f4861cca39f4b017937527b1c6d16eec3695.mp3', '/uploads/2018_10_24/f4861cca39f4b017937527b1c6d16eec7775.lrc', '3:38');
INSERT INTO `music` VALUES ('90', 'Say', 'OneRepublic', 'Dreaming Ou', '1', '1', '/uploads/2018_10_24/92bfc7c01b3e514e6004ae3e1884dc3b9044.jpg', '/uploads/2018_10_24/92bfc7c01b3e514e6004ae3e1884dc3b8972.mp3', '/uploads/2018_10_24/92bfc7c01b3e514e6004ae3e1884dc3b3121.lrc', '3:50');
INSERT INTO `music` VALUES ('91', 'Sober', 'pink', 'Missundazto', '6', '0', '/uploads/2018_10_24/efc668bfcd0d20a39d62581fa7c6f18c4241.jpg', '/uploads/2018_10_24/efc668bfcd0d20a39d62581fa7c6f18c6475.mp3', '/uploads/2018_10_24/efc668bfcd0d20a39d62581fa7c6f18c2978.lrc', '3:59');
INSERT INTO `music` VALUES ('92', '风之丘', '宫崎骏', '无', '7', '0', '/uploads/2018_10_26/e0f75f402e58b643d98eed942974e0758373.jpg', '/uploads/2018_10_26/e0f75f402e58b643d98eed942974e0757096.mp3', '/uploads/2018_10_26/e0f75f402e58b643d98eed942974e0755553.lrc', '3:59');
INSERT INTO `music` VALUES ('93', 'faded', 'Alan Walker', '无', '0', '0', '/uploads/2018_10_26/d05b130d840a9a0a7eced868b3d5bc391263.jpg', '/uploads/2018_10_26/d05b130d840a9a0a7eced868b3d5bc391198.mp3', '/uploads/2018_10_26/d05b130d840a9a0a7eced868b3d5bc399505.lrc', '3:59');
INSERT INTO `music` VALUES ('94', '面具（中文版）', '安七炫', '无', '1', '0', '/uploads/2018_10_26/85ecf61c9671645fe80a2b6d20ddb1b16127.jpg', '/uploads/2018_10_26/85ecf61c9671645fe80a2b6d20ddb1b15197.mp3', '/uploads/2018_10_26/85ecf61c9671645fe80a2b6d20ddb1b17306.lrc', '4:11');
INSERT INTO `music` VALUES ('95', '凉凉', '阿达', '庆温柔', '0', '0', '/uploads/2018_10_26/a0cf5c27ac90b238096e9fd888af5d552764.jpg', '/uploads/2018_10_26/a0cf5c27ac90b238096e9fd888af5d558262.mp3', 'D:\\xampp\\tmp\\phpC405.tmp', '我去v');

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_name` varchar(255) NOT NULL,
  `per_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', '后台首页', 'IndexController@index');
INSERT INTO `permission` VALUES ('2', '添加管理员', 'RooterController@create');
INSERT INTO `permission` VALUES ('3', '添加管理员确认', 'RooterController@store');
INSERT INTO `permission` VALUES ('4', '浏览管理员', 'RooterController@index');
INSERT INTO `permission` VALUES ('5', '管理员修改', 'RooterController@edit');
INSERT INTO `permission` VALUES ('6', '管理员修改确认', 'RooterController@update');
INSERT INTO `permission` VALUES ('7', '删除管理员', 'RooterController@destroy');
INSERT INTO `permission` VALUES ('8', '管理员角色', 'RooterController@user_role');
INSERT INTO `permission` VALUES ('9', '权限浏览', 'PermissionController@index');
INSERT INTO `permission` VALUES ('10', '添加权限', 'PermissionController@create');
INSERT INTO `permission` VALUES ('11', '添加权限确认', 'PermissionController@store');
INSERT INTO `permission` VALUES ('12', '浏览角色', 'RoleController@index');
INSERT INTO `permission` VALUES ('13', '添加角色', 'RoleController@create');
INSERT INTO `permission` VALUES ('14', '添加角色确认', 'RoleController@store');
INSERT INTO `permission` VALUES ('15', '角色权限', 'RoleController@role_per');
INSERT INTO `permission` VALUES ('16', '角色权限确认', 'RoleController@do_role_per');
INSERT INTO `permission` VALUES ('17', '管理员角色确认', 'RooterController@do_user_role');
INSERT INTO `permission` VALUES ('18', '添加音乐', 'MusicController@create');
INSERT INTO `permission` VALUES ('19', '添加音乐确认', 'MusicController@store');
INSERT INTO `permission` VALUES ('20', '浏览音乐', 'MusicController@index');
INSERT INTO `permission` VALUES ('21', '修改音乐', 'MusicController@edit');
INSERT INTO `permission` VALUES ('22', '修改音乐确认', 'MusicController@update');
INSERT INTO `permission` VALUES ('23', '删除音乐', 'MusicController@destroy');
INSERT INTO `permission` VALUES ('24', '歌手添加', 'UsersSongController@create');
INSERT INTO `permission` VALUES ('25', '歌手添加确认', 'UsersSongController@store');
INSERT INTO `permission` VALUES ('26', '歌手浏览', 'UsersSongController@index');
INSERT INTO `permission` VALUES ('27', '歌手修改', 'UsersSongController@edit');
INSERT INTO `permission` VALUES ('28', '歌手修改确认', 'UsersSongController@update');
INSERT INTO `permission` VALUES ('29', '歌手删除', 'UsersSongController@destroy');
INSERT INTO `permission` VALUES ('30', '专辑添加', 'AlbumController@create');
INSERT INTO `permission` VALUES ('31', '专辑浏览', 'AlbumController@index');
INSERT INTO `permission` VALUES ('32', '专辑修改', 'AlbumController@edit');
INSERT INTO `permission` VALUES ('33', '专辑修改确认', 'AlbumController@update');
INSERT INTO `permission` VALUES ('34', '专辑删除', 'AlbumController@destroy');
INSERT INTO `permission` VALUES ('35', '专辑添加确认', 'AlbumController@store');
INSERT INTO `permission` VALUES ('36', '专辑前台页面设置', 'AlbumController@shezhi');
INSERT INTO `permission` VALUES ('37', '歌单添加', 'SpecialController@create');
INSERT INTO `permission` VALUES ('38', '歌单浏览', 'SpecialController@index');
INSERT INTO `permission` VALUES ('39', '歌单修改', 'SpecialController@edit');
INSERT INTO `permission` VALUES ('40', '歌单修改确认', 'SpecialController@update');
INSERT INTO `permission` VALUES ('41', '歌单添加确认', 'SpecialController@store');
INSERT INTO `permission` VALUES ('42', '歌单删除', 'SpecialController@destroy');
INSERT INTO `permission` VALUES ('43', '歌单前台页面设置', 'SpecialController@shezhi');
INSERT INTO `permission` VALUES ('44', '用户浏览', 'UserController@index');
INSERT INTO `permission` VALUES ('45', '用户收藏浏览', 'CollectController@index');
INSERT INTO `permission` VALUES ('46', '用户收藏搜索', 'CollectController@search');
INSERT INTO `permission` VALUES ('47', '角色修改', 'RoleController@edit');
INSERT INTO `permission` VALUES ('48', '角色修改确认', 'RoleController@update');
INSERT INTO `permission` VALUES ('49', '角色删除', 'RoleController@destroy');
INSERT INTO `permission` VALUES ('50', '权限修改', 'PermissionController@edit');
INSERT INTO `permission` VALUES ('51', '权限修改确认', 'PermissionController@update');
INSERT INTO `permission` VALUES ('52', '权限删除', 'PermissionController@destroy');
INSERT INTO `permission` VALUES ('53', '专辑歌曲浏览', 'AlbumController@music');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员');
INSERT INTO `role` VALUES ('2', '普通管理员');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `role_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES ('2', '1');
INSERT INTO `role_permission` VALUES ('2', '4');
INSERT INTO `role_permission` VALUES ('2', '9');
INSERT INTO `role_permission` VALUES ('2', '12');
INSERT INTO `role_permission` VALUES ('3', '1');
INSERT INTO `role_permission` VALUES ('3', '7');
INSERT INTO `role_permission` VALUES ('1', '1');
INSERT INTO `role_permission` VALUES ('1', '2');
INSERT INTO `role_permission` VALUES ('1', '3');
INSERT INTO `role_permission` VALUES ('1', '4');
INSERT INTO `role_permission` VALUES ('1', '5');
INSERT INTO `role_permission` VALUES ('1', '6');
INSERT INTO `role_permission` VALUES ('1', '7');
INSERT INTO `role_permission` VALUES ('1', '8');
INSERT INTO `role_permission` VALUES ('1', '9');
INSERT INTO `role_permission` VALUES ('1', '10');
INSERT INTO `role_permission` VALUES ('1', '11');
INSERT INTO `role_permission` VALUES ('1', '12');
INSERT INTO `role_permission` VALUES ('1', '13');
INSERT INTO `role_permission` VALUES ('1', '14');
INSERT INTO `role_permission` VALUES ('1', '15');
INSERT INTO `role_permission` VALUES ('1', '16');
INSERT INTO `role_permission` VALUES ('1', '17');
INSERT INTO `role_permission` VALUES ('1', '18');
INSERT INTO `role_permission` VALUES ('1', '19');
INSERT INTO `role_permission` VALUES ('1', '20');
INSERT INTO `role_permission` VALUES ('1', '21');
INSERT INTO `role_permission` VALUES ('1', '22');
INSERT INTO `role_permission` VALUES ('1', '23');
INSERT INTO `role_permission` VALUES ('1', '24');
INSERT INTO `role_permission` VALUES ('1', '25');
INSERT INTO `role_permission` VALUES ('1', '26');
INSERT INTO `role_permission` VALUES ('1', '27');
INSERT INTO `role_permission` VALUES ('1', '28');
INSERT INTO `role_permission` VALUES ('1', '29');
INSERT INTO `role_permission` VALUES ('1', '30');
INSERT INTO `role_permission` VALUES ('1', '31');
INSERT INTO `role_permission` VALUES ('1', '32');
INSERT INTO `role_permission` VALUES ('1', '33');
INSERT INTO `role_permission` VALUES ('1', '34');
INSERT INTO `role_permission` VALUES ('1', '35');
INSERT INTO `role_permission` VALUES ('1', '36');
INSERT INTO `role_permission` VALUES ('1', '37');
INSERT INTO `role_permission` VALUES ('1', '38');
INSERT INTO `role_permission` VALUES ('1', '39');
INSERT INTO `role_permission` VALUES ('1', '40');
INSERT INTO `role_permission` VALUES ('1', '41');
INSERT INTO `role_permission` VALUES ('1', '42');
INSERT INTO `role_permission` VALUES ('1', '43');
INSERT INTO `role_permission` VALUES ('1', '44');
INSERT INTO `role_permission` VALUES ('1', '45');
INSERT INTO `role_permission` VALUES ('1', '46');
INSERT INTO `role_permission` VALUES ('1', '47');
INSERT INTO `role_permission` VALUES ('1', '48');
INSERT INTO `role_permission` VALUES ('1', '49');
INSERT INTO `role_permission` VALUES ('1', '50');
INSERT INTO `role_permission` VALUES ('1', '51');
INSERT INTO `role_permission` VALUES ('1', '52');
INSERT INTO `role_permission` VALUES ('1', '53');

-- ----------------------------
-- Table structure for rooter
-- ----------------------------
DROP TABLE IF EXISTS `rooter`;
CREATE TABLE `rooter` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rooter
-- ----------------------------
INSERT INTO `rooter` VALUES ('1', 'zzy123', 'zzy123', '$2y$10$6jC.oD1dPpbfPuNOBEZ6ZOve/ZXycOzNwl7X5FRI8AluafzGjWFZC', 'djfsajlk@qq.com', '/uploads/201810241118434268.jpg');
INSERT INTO `rooter` VALUES ('3', 'ziqiang', 'ziqiang', '$2y$10$I/y7Uiotd8L6vLOcS/u6IOvCaL2KEi4s1bQkrIsUsnTpKPqUYLc2i', '583258900@qq.com', '/uploads/201810261145597716.jpg');

-- ----------------------------
-- Table structure for singer
-- ----------------------------
DROP TABLE IF EXISTS `singer`;
CREATE TABLE `singer` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sname` varchar(32) NOT NULL,
  `sex` int(11) DEFAULT '0',
  `szone` varchar(32) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cv` char(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of singer
-- ----------------------------
INSERT INTO `singer` VALUES ('16', '陈奕迅', '1', '1', '/uploads/15401939158827.jpg', '都十分广泛的');
INSERT INTO `singer` VALUES ('17', '张学友', '1', '1', '/uploads/15401940471149.jpg', '在亚洲地区和整个华人社会具有影响力的实力派音乐巨星和著名电影演员，香港乐坛“四大天王”之一，在华语地区享有“歌神”的美誉。');
INSERT INTO `singer` VALUES ('18', '周杰伦', '1', '1', '/uploads/15401941403231.jpg', '著名歌手，音乐人，词曲创作人，编曲及制作人，MV及电影导演。新世纪华语歌坛领军人物，中国风歌曲始祖，被时代周刊誉为“亚洲猫王”，是2000年后亚洲流行乐坛最具革命性与指标性的创作歌手，亚洲销量超过3100万张，有“亚洲流行天王”之称，开启华语乐坛“R&B时代”与“流行乐中国风”的先河');
INSERT INTO `singer` VALUES ('19', '张国荣', '1', '1', '/uploads/15401942724752.jpg', '张国荣是一位在全球华人社会和亚洲地区具有影响力的著名歌手、演员和音乐人；大中华区乐坛和影坛巨星；演艺圈多栖发展最成功的代表之一。张国荣是香港乐坛的殿堂级歌手之一，曾获得香港乐坛最高荣誉金针奖；他是第一位享誉韩国乐坛的华人歌手，亦是华语唱片在韩国销量纪录保持者。');
INSERT INTO `singer` VALUES ('20', 'TANK', '1', '1', '/uploads/15401943848380.jpg', '台湾创作男歌手。Tank21 岁即发表第一首作品 — 仔仔周渝民的「怎麼忘」，其创作之後陆续发表於许绍洋、潘玮柏、 K-ONE 、张智成、 S.H.E 、「终极一班」电视原声带。');
INSERT INTO `singer` VALUES ('21', '赵雷', '1', '0', '/uploads/15401945003029.jpg', '民谣音乐人赵雷，中国内地新生代民谣歌手。1986年7月20日生于北京，是最具传统北京胡同文化气质的新生代音乐人之一。');
INSERT INTO `singer` VALUES ('22', '李荣浩', '1', '0', '/uploads/15401945796992.jpg', '李荣浩，1985年7月11日生于蚌埠，中国流行音乐制作人、歌手、吉他手。曾为众多艺人创作歌曲以及担任制作人，也曾为多部电影与多款电子游戏制作音乐。');
INSERT INTO `singer` VALUES ('23', '薛之谦', '1', '0', '/uploads/15401946803300.jpg', '薛之谦（Joker Xue），1983年7月17日出生于上海，华语流行乐男歌手、影视演员、音乐制作人，毕业于格里昂酒店管理学院。');
INSERT INTO `singer` VALUES ('24', '许嵩', '1', '0', '/uploads/15401957044220.jpg', '著名作词人、作曲人、唱片制作人、歌手。内地独立音乐之标杆人物，有音乐鬼才之称。');
INSERT INTO `singer` VALUES ('25', '朴树', '1', '0', '/uploads/15401957878077.jpg', '中国大陆歌手，音乐人。1996年10月正式成为“麦田音乐”签约歌手，为简略笔划而定艺名朴树。代表作品：《那些花儿》，《白桦林》，《生如夏花》。主要成就：中歌榜最佳新人奖，最受欢迎男歌手，年度最佳制作人奖');
INSERT INTO `singer` VALUES ('26', '高桥优', '1', '2', '/uploads/15401958854018.jpg', '高桥优（Takahashi Yu），1983年12月26日出生于秋田県横手市，毕业于札幌学院大学人文学部，日本创作歌手');
INSERT INTO `singer` VALUES ('27', '泽野弘之', '1', '2', '/uploads/15401959757165.jpg', '日本作曲家。出生于东京都。以电视剧、动画、电影、电影音乐为中心进行作曲和编曲工作，同时也为许多艺人写作曲子。');
INSERT INTO `singer` VALUES ('28', '少女时代', '0', '2', '/uploads/15401960989478.jpg', '少女时代（英语：Girls\' Generation；朝鲜语：소녀시대／少女時代 Sonyeo Shidae；日语：少女時代／しょうじょじだい Shōjo-Jidai），是韩国SM娱乐于2007年推出的女子组合。');
INSERT INTO `singer` VALUES ('29', 'EXO', '1', '2', '/uploads/15401961816800.jpg', 'EXO是韩国SM娱乐有限公司于2012年4月8日正式推出的12人男子流行演唱团体。');
INSERT INTO `singer` VALUES ('30', '权志龙', '1', '2', '/uploads/15401962705309.jpg', 'G-Dragon（权志龙，别名GD）出生于1988年8月18日，YGEntertainment公司旗下艺人，也是YG主要制作人之一，拥有出色的作词作曲才能；是韩国偶像组合BIGBANG的制作人、队长兼Rapper，作为solo歌手亦取得巨大的成功，是韩国乐坛数一数二的偶像。');
INSERT INTO `singer` VALUES ('31', 'Alan Walker', '1', '3', '/uploads/15401963757623.jpg', '艾兰·奥拉夫·沃克（Alan Olav Walker），1997年8月24日出生于英国英格兰北安普敦郡，挪威DJ、音乐制作人。');
INSERT INTO `singer` VALUES ('32', 'OneRepublic', '1', '3', '/uploads/15401964619016.jpg', 'OneRepublic（共和时代或称一体共和） 是美国的一个流行摇滚乐队，曲风pop-rock/indie/alternative。乐队成立是2004年科罗拉多州，几个成员都是受Ryan Tedder所影响，贝斯手Meyers，吉他手Filkins、Drew Brown，鼓手Eddie Fischer。');
INSERT INTO `singer` VALUES ('33', 'Linkin Park', '1', '3', '/uploads/15401965346760.jpg', '林肯公园（Linkin Park）是一组来自美国加利福尼亚州的摇滚乐队，由乐队主唱查斯特·贝宁顿，麦克·信田、贝斯手菲尼克斯·法雷尔、吉他手布莱德·德尔森、鼓手罗伯·巴登和DJ采样手约瑟夫·韩组成。');
INSERT INTO `singer` VALUES ('34', 'Eminem', '1', '3', '/uploads/15401967313560.jpg', '埃米纳姆（Eminem）是美国的一名说唱歌手。其风格类型为：Hardcore Rap（硬核说唱）。埃米纳姆最大的突破就是证明白人也能介入到黑人一统天下的说唱（RAP）界中，而且获得巨大的成功。');
INSERT INTO `singer` VALUES ('35', 'P!nk', '0', '3', '/uploads/15401968751787.jpg', 'P!nk是美国一位著名女歌手，有着菲律宾的血统， 却在法国尼斯举办的超级模特儿选秀表演会上，一鸣惊人而被唱片公司发掘，并成为新世代酷炫乐团TLC的师妹。');
INSERT INTO `singer` VALUES ('36', '宫崎骏', '1', '2', '/uploads/15405180298880.jpg', '宫崎骏');
INSERT INTO `singer` VALUES ('37', 'Alan Walker', '1', '3', '/uploads/15405182555185.jpg', '艾兰·奥拉夫·沃克（Alan Olav Walker），1997年8月24日出生于英国英格兰北安普敦郡，挪威DJ、音乐制作人。\r\n2014年11月，在YouTube上推出个人电音作品《Fade》而出道 。2015年12月，通过索尼音乐发行个人第一首正式单曲《Faded》，该首歌曲的MV在YouTube上的点击量突破了10亿 。2016年6月，发行人声伴唱电音单曲《Sing Me To Sleep》 。同年11月6日，获得MTV欧洲音乐奖“最佳挪威艺人”奖 。2017年2月22日，《Faded》入围第37届');
INSERT INTO `singer` VALUES ('38', '安七炫', '1', '2', '/uploads/15405185317050.jpg', '安七炫（Kang Ta），1979年11月29日出生于韩国庆尚北道醴泉郡，韩国男歌手、演员、词曲创作者，韩国SM娱乐有限公司旗下艺人、理事，前男子演唱组合H.O.T成员。\r\n1996年以演唱组合H.O.T出道。2001年组合解散，安七炫开始个人发展演艺事业；同年9月1日发行首张个人专辑《北极星愿》，获得Mnet亚洲音乐大奖男子独唱领域奖。2003年与申彗星、李志勋组成S组合，发行专辑《Fr. In. Cl.》。2006年与吴建豪组成团体“Kangta &amp; Vanness”，推出专辑《Scandal');
INSERT INTO `singer` VALUES ('39', 'xcx', '1', '1', '/uploads/15405253836105.jpg', '阿斯顿发股份和');

-- ----------------------------
-- Table structure for special
-- ----------------------------
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `gdid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gdname` varchar(255) NOT NULL,
  `styles` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `zhizuo` varchar(255) NOT NULL,
  `jianjie` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `music_id` varchar(11) NOT NULL,
  `status` int(255) unsigned NOT NULL DEFAULT '5',
  PRIMARY KEY (`gdid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of special
-- ----------------------------
INSERT INTO `special` VALUES ('1', '老歌', '3', '聼一首老歌，想念一段时光', 'admin', '寂静的黄昏，总让人怀念，总是深深沦陷...\r\n那些个细数光阴在手中沉淀的日子，一去不复返...\r\n偶尔，我一个人站在黄昏的角落，代替你主持夕阳的葬礼...\r\n想着想着，痛凝重了时间，曳落了容颜...\r\n青春的羽翼...', '/uploads/15404758984019.jpg', '1,4,5,26,46', '1');
INSERT INTO `special` VALUES ('2', '致前任', '0', '我曾经很喜欢你 但也只能到这里', 'admin', '有时候\r\n爱情最美好的结局\r\n不是我成为你的新娘\r\n而是我曾在你需要我的那段时光\r\n认真的爱过你\r\n———————\r\n我爱你的时候\r\n你也恰好爱我\r\n\r\n你爱我的时候\r\n我也刚好爱你\r\n\r\n这已经是一件值得回忆一生的...', '/uploads/15404759087361.jpg', '1,4,5,12,26', '5');
INSERT INTO `special` VALUES ('4', '你的每一个拥抱，都是我疲倦时的一张床', '1', '你说这些歌很有夏天的感觉', 'ziqiang', '一直觉得拥抱真的是世间最意味深长的肢体语言，久别后的重逢或是受尽委屈后的安慰，一个拥抱，让相思、苦难都归于温情和爱。 你有多久没有认真的拥抱和被拥抱过了呢？无论和谁，恋人也好，朋友也好，家人也好，一个很用力很靠近的拥抱，抱着对方，就像是两颗心无限靠近，抱抱彼此不为人知的孤独和落寞，抱抱所有说不出口或欲言又止的话。 拥抱的那一瞬间，好像一切语言都是多余的', '/uploads/15405161564651.jpg', '46,56,65,70', '2');
INSERT INTO `special` VALUES ('5', '微醺的夜色，微妙的情绪', '2', '微醺的夜色，微妙的情绪', 'ziqiang', '夜晚的柔情，隐藏在淡淡月色、霓虹灯光和朦胧树影中。苏打绿低吟着说“早点回家”，而你呢喃着说舍不得这月光，于是与身影作伴，继续漫步。愿这声声浅唱，能治愈你的意兴阑珊；愿OPPO R17 Pro能让漫漫长夜，多出片刻斑斓。', '/uploads/15405175044185.jpg', '2,3,4,5,6,7', '0');
INSERT INTO `special` VALUES ('6', '你可爱得像一首能让人摆动脚拇指的歌', '1', '你可爱得像一首能让人摆动脚拇指的歌', 'ziqiang', '好难得可以遇到一个让我想站在山顶大喊“他太可爱啦”的人\r\n我想要一套小房子 , 能做你的小妻子 ; 一起提着菜篮子 , 穿过门前的小巷子 ; 饭后不用你洗盘子 , 可你得负责抹桌子 ; 再要个白白胖胖的小baby , 可爱得就像小丸子 ; 等你长出了白胡子,坐在家中老椅子 ; 可会记得这好日子 , 和我美丽的花裙子\r\n这世界全部的漂亮，不过就是你可爱的模样。', '/uploads/15405175584379.jpg', '2,3,4,5,6,7', '4');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `photo` varchar(255) DEFAULT '/uploads/20100101192931478054.jpg',
  `sex` int(11) DEFAULT '0',
  `uname` varchar(32) NOT NULL,
  `vip` int(11) DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `sign` char(255) DEFAULT '这个人很懒,什么都没留下...',
  `province` varchar(255) DEFAULT '北京市',
  `city` varchar(255) DEFAULT '北京市',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('49', 'phpcms', '$2y$10$D4YVG0XcWpf659i9YBc6NOURcFiLn7ldJ5wpE5GHKe0s6V0iW5eGC', '583258900@qq.com', '/uploads/201810252150233859.jpg', '1', 'admin', '0', '1', 'tjx9Z9vMxo6ir4TGuVcD3AXocg3Eix6Bz9fxjyXn4VkhwAwJsnGeXwBOgYzr', '这个人很懒,什么都没留下.  z', '黑龙江', '黑河市');
INSERT INTO `users` VALUES ('52', 'phpcms', '$2y$10$uZ1c5e4x.fK5a5oDG3WG1e52w1zZPODxTnpsCXj0Fsj8jpFJjLRVa', '940842847@qq.com', '/uploads/201810162246328766.jpg', '1', 'admins', '0', '1', 'ywIpw9hx9jJz2nGX2CwyKEsLifrB5QiaBZfLcdD76Sz0F87CukI6wR2L5gZg', '这个人很懒,什么都没留下...', '北京市', '北京市');
INSERT INTO `users` VALUES ('59', 'ziqiang', '$2y$10$zkGb70sh0W5bvRPninIQ3OxHCjX35hntaC1Ozu9jxgaXzXekJaOue', '583258900@qq.com', '/uploads/201810261155391375.jpg', '1', 'ziqiang', '0', '1', 'kDohkniGyZAG6enTWESS4FV1W922RmVYqubAF7A2vFSuj5Qmz5uGkMVHCCIL', '这个人很懒,什么都没留下...', '北京市', '北京市');
INSERT INTO `users` VALUES ('60', 'zzy1234', '$2y$10$RGumCmt.1fvTg24BVgSRG.WrarJ3rniO34S2Nf5RYRUbNy0J53CzS', '940842847@qq.com', '/uploads/20100101192931478054.jpg', '1', 'zzy123', '0', '1', 'nK7ZahKqwjN8j6wFX476M7dRhlTcYS9OjiawKw89WXIr4HebhmKef30tQbwj', '这个人很懒,什么都没留下...', '北京市', '北京市');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('8', '1');
INSERT INTO `user_role` VALUES ('12', '1');
INSERT INTO `user_role` VALUES ('13', '2');
INSERT INTO `user_role` VALUES ('2', '1');
INSERT INTO `user_role` VALUES ('1', '2');
INSERT INTO `user_role` VALUES ('3', '1');
