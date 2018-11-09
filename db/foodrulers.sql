/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100130
Source Host           : localhost:3306
Source Database       : foodrulers

Target Server Type    : MYSQL
Target Server Version : 100130
File Encoding         : 65001

Date: 2018-11-10 00:03:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(5) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country_id` int(5) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Steven', 'Milner', 'super', 'stevenmilner@email.com', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', '1', '', '', '194', '(342) 346-5768', '2018-11-09 16:38:20', '65', '0', '2018-11-09 22:38:20', '2018-11-09 16:38:05');
INSERT INTO `admin` VALUES ('2', 'Jame', 'Rodrigo', 'admin1', 'jamesrodrigo@email.com', '601f1889667efaebb33b8c12572835da3f027f78', '2', '', '', '194', '', '2018-11-09 09:42:29', '65', '0', '2018-11-09 17:36:53', '2018-11-08 15:37:32');
INSERT INTO `admin` VALUES ('5', 'test', 'admin', 'test', 'test@email.com', '601f1889667efaebb33b8c12572835da3f027f78', '2', '', '', '194', '(323) 432-4123', '0000-00-00 00:00:00', '65', '0', '2018-11-08 23:32:26', '2018-11-08 15:38:03');

-- ----------------------------
-- Table structure for admin_group
-- ----------------------------
DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE `admin_group` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_group
-- ----------------------------
INSERT INTO `admin_group` VALUES ('1', 'Super Admin', '0', '2018-10-30 06:34:34', '2018-10-30 06:34:36');
INSERT INTO `admin_group` VALUES ('2', 'Administrators', '0', '2018-10-30 06:35:26', '2018-11-02 21:07:25');
INSERT INTO `admin_group` VALUES ('3', 'Managers', '0', '2018-11-02 17:49:39', '2018-11-02 21:34:44');
INSERT INTO `admin_group` VALUES ('5', 'test', '1', '2018-11-02 19:45:03', '2018-11-02 20:03:26');

-- ----------------------------
-- Table structure for challenge_review
-- ----------------------------
DROP TABLE IF EXISTS `challenge_review`;
CREATE TABLE `challenge_review` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `challenge_id` bigint(10) NOT NULL,
  `member_id` bigint(10) NOT NULL,
  `video_review` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0'':request, ''1'':accept, ''2'':reject',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of challenge_review
-- ----------------------------
INSERT INTO `challenge_review` VALUES ('1', '1', '1', 'sample.mp4', '2018-11-06 01:23:18', '0');

-- ----------------------------
-- Table structure for country_list
-- ----------------------------
DROP TABLE IF EXISTS `country_list`;
CREATE TABLE `country_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `continent_id` int(11) unsigned NOT NULL,
  `full_name` varchar(255) NOT NULL DEFAULT '',
  `short_name` varchar(3) NOT NULL DEFAULT '',
  `code` varchar(12) NOT NULL DEFAULT '',
  `sort_code` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL DEFAULT '',
  `lang_id` int(200) DEFAULT '1',
  `flag_link` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country_list
-- ----------------------------
INSERT INTO `country_list` VALUES ('1', '1', 'Afghanistan', 'AF', '93', '93', '', '1', '');
INSERT INTO `country_list` VALUES ('2', '0', 'Aland Islands', 'AX', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('3', '5', 'Albania', 'AL', '355', '355', '', '1', '');
INSERT INTO `country_list` VALUES ('4', '2', 'Algeria', 'DZ', '213', '213', '', '1', '');
INSERT INTO `country_list` VALUES ('5', '0', 'American Samoa', 'AS', '684', '684', '', '1', '');
INSERT INTO `country_list` VALUES ('6', '5', 'Andorra', 'AD', '376', '376', '', '1', '');
INSERT INTO `country_list` VALUES ('7', '2', 'Angola', 'AO', '244', '244', '', '1', '');
INSERT INTO `country_list` VALUES ('8', '0', 'Anguilla', 'AI', '1-264', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('9', '0', 'Antarctica', 'AQ', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('10', '3', 'Antigua and Barbuda', 'AG', '1-268', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('11', '4', 'Argentina', 'AR', '54', '54', '', '1', '');
INSERT INTO `country_list` VALUES ('12', '5', 'Armenia', 'AM', '374', '374', '', '1', '');
INSERT INTO `country_list` VALUES ('13', '0', 'Aruba', 'AW', '297', '297', '', '1', '');
INSERT INTO `country_list` VALUES ('14', '6', 'Australia', 'AU', '61', '61', '', '1', '');
INSERT INTO `country_list` VALUES ('15', '5', 'Austria', 'AT', '43', '43', '', '1', '');
INSERT INTO `country_list` VALUES ('16', '5', 'Azerbaijan', 'AZ', '994', '994', '', '1', '');
INSERT INTO `country_list` VALUES ('17', '3', 'Bahamas', 'BS', '1-242', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('18', '1', 'Bahrain', 'BH', '973', '973', '', '1', '');
INSERT INTO `country_list` VALUES ('19', '1', 'Bangladesh', 'BD', '880', '880', '', '1', '');
INSERT INTO `country_list` VALUES ('20', '3', 'Barbados', 'BB', '1-246', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('21', '5', 'Belarus', 'BY', '375', '375', '', '1', '');
INSERT INTO `country_list` VALUES ('22', '5', 'Belgium', 'BE', '32', '32', '', '1', '');
INSERT INTO `country_list` VALUES ('23', '3', 'Belize', 'BZ', '501', '501', '', '1', '');
INSERT INTO `country_list` VALUES ('24', '2', 'Benin', 'BJ', '229', '229', '', '1', '');
INSERT INTO `country_list` VALUES ('25', '0', 'Bermuda', 'BM', '1-441', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('26', '1', 'Bhutan', 'BT', '975', '975', '', '1', '');
INSERT INTO `country_list` VALUES ('27', '4', 'Bolivia', 'BO', '591', '591', '', '1', '');
INSERT INTO `country_list` VALUES ('28', '5', 'Bosnia and Herzegovina', 'BA', '387', '387', '', '1', '');
INSERT INTO `country_list` VALUES ('29', '2', 'Botswana', 'BW', '267', '267', '', '1', '');
INSERT INTO `country_list` VALUES ('30', '0', 'Bouvet Island', 'BV', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('31', '4', 'Brazil', 'BR', '55', '55', '', '1', '');
INSERT INTO `country_list` VALUES ('32', '0', 'British Indian Ocean Territory', 'IO', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('33', '0', 'British Virgin Islands', 'VG', '1-284', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('34', '1', 'Brunei', 'BN', '673', '673', '', '1', '');
INSERT INTO `country_list` VALUES ('35', '5', 'Bulgaria', 'BG', '359', '359', '', '1', '');
INSERT INTO `country_list` VALUES ('36', '0', 'Burkina Faso', 'BF', '226', '226', '', '1', '');
INSERT INTO `country_list` VALUES ('37', '2', 'Burundi', 'BI', '257', '257', '', '1', '');
INSERT INTO `country_list` VALUES ('38', '1', 'Cambodia', 'KH', '855', '855', '', '1', '');
INSERT INTO `country_list` VALUES ('39', '2', 'Cameroon', 'CM', '237', '237', '', '1', '');
INSERT INTO `country_list` VALUES ('40', '3', 'Canada', 'CA', '1', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('41', '2', 'Cape Verde', 'CV', '238', '238', '', '1', '');
INSERT INTO `country_list` VALUES ('42', '0', 'Cayman Islands', 'KY', '1-345', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('43', '2', 'Central African Republic', 'CF', '236', '236', '', '1', '');
INSERT INTO `country_list` VALUES ('44', '2', 'Chad', 'TD', '235', '235', '', '1', '');
INSERT INTO `country_list` VALUES ('45', '4', 'Chile', 'CL', '56', '56', '', '1', '');
INSERT INTO `country_list` VALUES ('46', '1', 'China', 'CN', '86', '5', 'CNY', '2', '');
INSERT INTO `country_list` VALUES ('47', '0', 'Christmas Island', 'CX', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('48', '0', 'Cocos (Keeling) Islands', 'CC', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('49', '4', 'Colombia', 'CO', '57', '57', '', '1', '');
INSERT INTO `country_list` VALUES ('50', '2', 'Comoros', 'KM', '269', '269', '', '1', '');
INSERT INTO `country_list` VALUES ('51', '2', 'Congo', 'CG', '242', '242', '', '1', '');
INSERT INTO `country_list` VALUES ('52', '0', 'Cook Islands', 'CK', '682', '682', '', '1', '');
INSERT INTO `country_list` VALUES ('53', '3', 'Costa Rica', 'CR', '506', '506', '', '1', '');
INSERT INTO `country_list` VALUES ('54', '5', 'Croatia', 'HR', '385', '385', '', '1', '');
INSERT INTO `country_list` VALUES ('55', '5', 'Cyprus', 'CY', '357', '357', '', '1', '');
INSERT INTO `country_list` VALUES ('56', '5', 'Czech Republic', 'CZ', '420', '420', '', '1', '');
INSERT INTO `country_list` VALUES ('57', '0', 'Democratic Republic of Congo', 'CD', '243', '243', '', '1', '');
INSERT INTO `country_list` VALUES ('58', '5', 'Denmark', 'DK', '45', '45', '', '1', '');
INSERT INTO `country_list` VALUES ('59', '0', 'Disputed Territory', 'XX', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('60', '2', 'Djibouti', 'DJ', '253', '253', '', '1', '');
INSERT INTO `country_list` VALUES ('61', '3', 'Dominica', 'DM', '1-767', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('62', '3', 'Dominican Republic', 'DO', '1-809 | 1-82', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('63', '1', 'East Timor', 'TL', '670', '670', '', '1', '');
INSERT INTO `country_list` VALUES ('64', '4', 'Ecuador', 'EC', '593', '593', '', '1', '');
INSERT INTO `country_list` VALUES ('65', '2', 'Egypt', 'EG', '20', '20', '', '1', '');
INSERT INTO `country_list` VALUES ('66', '3', 'El Salvador', 'SV', '503', '503', '', '1', '');
INSERT INTO `country_list` VALUES ('67', '2', 'Equatorial Guinea', 'GQ', '240', '240', '', '1', '');
INSERT INTO `country_list` VALUES ('68', '2', 'Eritrea', 'ER', '291', '291', '', '1', '');
INSERT INTO `country_list` VALUES ('69', '5', 'Estonia', 'EE', '372', '372', '', '1', '');
INSERT INTO `country_list` VALUES ('70', '2', 'Ethiopia', 'ET', '251', '251', '', '1', '');
INSERT INTO `country_list` VALUES ('71', '0', 'Falkland Islands', 'FK', '500', '500', '', '1', '');
INSERT INTO `country_list` VALUES ('72', '0', 'Faroe Islands', 'FO', '298', '298', '', '1', '');
INSERT INTO `country_list` VALUES ('73', '0', 'Federated States of Micronesia', 'FM', '691', '691', '', '1', '');
INSERT INTO `country_list` VALUES ('74', '6', 'Fiji', 'FJ', '679', '679', '', '1', '');
INSERT INTO `country_list` VALUES ('75', '5', 'Finland', 'FI', '358', '358', '', '1', '');
INSERT INTO `country_list` VALUES ('76', '5', 'France', 'FR', '33', '33', '', '1', '');
INSERT INTO `country_list` VALUES ('77', '0', 'French Guyana', 'GF', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('78', '0', 'French Polynesia', 'PF', '689', '689', '', '1', '');
INSERT INTO `country_list` VALUES ('79', '0', 'French Southern Territories', 'TF', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('80', '2', 'Gabon', 'GA', '241', '241', '', '1', '');
INSERT INTO `country_list` VALUES ('81', '2', 'Gambia', 'GM', '220', '220', '', '1', '');
INSERT INTO `country_list` VALUES ('82', '5', 'Georgia', 'GE', '995', '995', '', '1', '');
INSERT INTO `country_list` VALUES ('83', '5', 'Germany', 'DE', '49', '4', '', '1', '');
INSERT INTO `country_list` VALUES ('84', '2', 'Ghana', 'GH', '233', '233', '', '1', '');
INSERT INTO `country_list` VALUES ('85', '0', 'Gibraltar', 'GI', '350', '350', '', '1', '');
INSERT INTO `country_list` VALUES ('86', '5', 'Greece', 'GR', '30', '30', '', '1', '');
INSERT INTO `country_list` VALUES ('87', '0', 'Greenland', 'GL', '299', '299', '', '1', '');
INSERT INTO `country_list` VALUES ('88', '3', 'Grenada', 'GD', '1-473', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('89', '0', 'Guadeloupe', 'GP', '590', '590', '', '1', '');
INSERT INTO `country_list` VALUES ('90', '0', 'Guam', 'GU', '1-671', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('91', '3', 'Guatemala', 'GT', '502', '502', '', '1', '');
INSERT INTO `country_list` VALUES ('92', '2', 'Guinea', 'GN', '224', '224', '', '1', '');
INSERT INTO `country_list` VALUES ('93', '2', 'Guinea-Bissau', 'GW', '245', '245', '', '1', '');
INSERT INTO `country_list` VALUES ('94', '4', 'Guyana', 'GY', '592', '592', '', '1', '');
INSERT INTO `country_list` VALUES ('95', '3', 'Haiti', 'HT', '509', '509', '', '1', '');
INSERT INTO `country_list` VALUES ('96', '0', 'Heard Island and Mcdonald Islands', 'HM', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('97', '3', 'Honduras', 'HN', '504', '504', '', '1', '');
INSERT INTO `country_list` VALUES ('98', '0', 'Hong Kong', 'HK', '852', '852', 'HKD', '3', '');
INSERT INTO `country_list` VALUES ('99', '0', 'Hungary', 'HU', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('100', '5', 'Iceland', 'IS', '354', '354', '', '1', '');
INSERT INTO `country_list` VALUES ('101', '1', 'India', 'IN', '91', '91', '', '1', '');
INSERT INTO `country_list` VALUES ('102', '1', 'Indonesia', 'ID', '62', '62', 'IDR', '1', '');
INSERT INTO `country_list` VALUES ('103', '1', 'Iraq', 'IQ', '964', '964', '', '1', '');
INSERT INTO `country_list` VALUES ('104', '0', 'Iraq-Saudi Arabia Neutral Zone', 'XE', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('105', '0', 'Hongkong', 'HK', '852', '852', '', '1', '');
INSERT INTO `country_list` VALUES ('106', '5', 'Ireland', 'IE', '353', '353', '', '1', '');
INSERT INTO `country_list` VALUES ('107', '1', 'Israel', 'IL', '972', '972', '', '1', '');
INSERT INTO `country_list` VALUES ('108', '5', 'Italy', 'IT', '39', '39', '', '1', '');
INSERT INTO `country_list` VALUES ('109', '2', 'Ivory Coast', 'CI', '225', '225', '', '1', '');
INSERT INTO `country_list` VALUES ('110', '3', 'Jamaica', 'JM', '1-876', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('111', '1', 'Japan', 'JP', '81', '2', '', '4', '');
INSERT INTO `country_list` VALUES ('112', '1', 'Jordan', 'JO', '962', '962', '', '1', '');
INSERT INTO `country_list` VALUES ('113', '0', 'Kazakhstan', 'KZ', '7', '7', '', '1', '');
INSERT INTO `country_list` VALUES ('114', '2', 'Kenya', 'KE', '254', '254', '', '1', '');
INSERT INTO `country_list` VALUES ('115', '6', 'Kiribati', 'KI', '686', '686', '', '1', '');
INSERT INTO `country_list` VALUES ('116', '1', 'Kuwait', 'KW', '965', '965', '', '1', '');
INSERT INTO `country_list` VALUES ('117', '1', 'Kyrgyzstan', 'KG', '996', '996', '', '1', '');
INSERT INTO `country_list` VALUES ('118', '1', 'Laos', 'LA', '856', '856', '', '1', '');
INSERT INTO `country_list` VALUES ('119', '5', 'Latvia', 'LV', '371', '371', '', '1', '');
INSERT INTO `country_list` VALUES ('120', '1', 'Lebanon', 'LB', '961', '961', '', '1', '');
INSERT INTO `country_list` VALUES ('121', '2', 'Lesotho', 'LS', '266', '266', '', '1', '');
INSERT INTO `country_list` VALUES ('122', '2', 'Liberia', 'LR', '231', '231', '', '1', '');
INSERT INTO `country_list` VALUES ('123', '2', 'Libya', 'LY', '218', '218', '', '1', '');
INSERT INTO `country_list` VALUES ('124', '5', 'Liechtenstein', 'LI', '423', '423', '', '1', '');
INSERT INTO `country_list` VALUES ('125', '5', 'Lithuania', 'LT', '370', '370', '', '1', '');
INSERT INTO `country_list` VALUES ('126', '5', 'Luxembourg', 'LU', '352', '352', '', '1', '');
INSERT INTO `country_list` VALUES ('127', '0', 'Macau', 'MO', '853', '853', '', '1', '');
INSERT INTO `country_list` VALUES ('128', '5', 'Macedonia', 'MK', '389', '389', '', '1', '');
INSERT INTO `country_list` VALUES ('129', '2', 'Madagascar', 'MG', '261', '261', '', '1', '');
INSERT INTO `country_list` VALUES ('130', '2', 'Malawi', 'MW', '265', '265', '', '1', '');
INSERT INTO `country_list` VALUES ('131', '1', 'Malaysia', 'MY', '60', '60', 'MYR', '1', '');
INSERT INTO `country_list` VALUES ('132', '1', 'Maldives', 'MV', '960', '960', '', '1', '');
INSERT INTO `country_list` VALUES ('133', '2', 'Mali', 'ML', '223', '223', '', '1', '');
INSERT INTO `country_list` VALUES ('134', '5', 'Malta', 'MT', '356', '356', '', '1', '');
INSERT INTO `country_list` VALUES ('135', '6', 'Marshall Islands', 'MH', '692', '692', '', '1', '');
INSERT INTO `country_list` VALUES ('136', '0', 'Martinique', 'MQ', '596', '596', '', '1', '');
INSERT INTO `country_list` VALUES ('137', '2', 'Mauritania', 'MR', '222', '222', '', '1', '');
INSERT INTO `country_list` VALUES ('138', '2', 'Mauritius', 'MU', '230', '230', '', '1', '');
INSERT INTO `country_list` VALUES ('139', '0', 'Mayotte', 'YT', '262', '262', '', '1', '');
INSERT INTO `country_list` VALUES ('140', '3', 'Mexico', 'MX', '52', '52', '', '1', '');
INSERT INTO `country_list` VALUES ('141', '5', 'Moldova', 'MD', '373', '373', '', '1', '');
INSERT INTO `country_list` VALUES ('142', '5', 'Monaco', 'MC', '377', '377', '', '1', '');
INSERT INTO `country_list` VALUES ('143', '1', 'Mongolia', 'MN', '976', '976', '', '1', '');
INSERT INTO `country_list` VALUES ('144', '0', 'Montserrat', 'MS', '1-664', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('145', '2', 'Morocco', 'MA', '212', '212', '', '1', '');
INSERT INTO `country_list` VALUES ('146', '2', 'Mozambique', 'MZ', '258', '258', '', '1', '');
INSERT INTO `country_list` VALUES ('147', '0', 'Myanmar', 'MM', '95', '95', '', '1', '');
INSERT INTO `country_list` VALUES ('148', '2', 'Namibia', 'NA', '264', '264', '', '1', '');
INSERT INTO `country_list` VALUES ('149', '6', 'Nauru', 'NR', '674', '674', '', '1', '');
INSERT INTO `country_list` VALUES ('150', '1', 'Nepal', 'NP', '977', '977', '', '1', '');
INSERT INTO `country_list` VALUES ('151', '5', 'Netherlands', 'NL', '31', '31', '', '1', '');
INSERT INTO `country_list` VALUES ('152', '0', 'Netherlands Antilles', 'AN', '1-599', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('153', '0', 'New Caledonia', 'NC', '687', '687', '', '1', '');
INSERT INTO `country_list` VALUES ('154', '6', 'New Zealand', 'NZ', '64', '64', '', '1', '');
INSERT INTO `country_list` VALUES ('155', '3', 'Nicaragua', 'NI', '505', '505', '', '1', '');
INSERT INTO `country_list` VALUES ('156', '2', 'Niger', 'NE', '227', '227', '', '1', '');
INSERT INTO `country_list` VALUES ('157', '2', 'Nigeria', 'NG', '234', '234', '', '1', '');
INSERT INTO `country_list` VALUES ('158', '0', 'Niue', 'NU', '683', '683', '', '1', '');
INSERT INTO `country_list` VALUES ('159', '0', 'Norfolk Island', 'NF', '672', '672', '', '1', '');
INSERT INTO `country_list` VALUES ('160', '0', 'North Korea', 'KP', '850', '850', '', '1', '');
INSERT INTO `country_list` VALUES ('161', '0', 'Northern Mariana Islands', 'MP', '1-670', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('162', '5', 'Norway', 'NO', '47', '47', '', '1', '');
INSERT INTO `country_list` VALUES ('163', '1', 'Oman', 'OM', '968', '968', '', '1', '');
INSERT INTO `country_list` VALUES ('164', '1', 'Pakistan', 'PK', '92', '92', '', '1', '');
INSERT INTO `country_list` VALUES ('165', '6', 'Palau', 'PW', '680', '680', '', '1', '');
INSERT INTO `country_list` VALUES ('166', '0', 'Palestinian Occupied Territories', 'PS', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('167', '3', 'Panama', 'PA', '507', '507', '', '1', '');
INSERT INTO `country_list` VALUES ('168', '6', 'Papua New Guinea', 'PG', '675', '675', '', '1', '');
INSERT INTO `country_list` VALUES ('169', '4', 'Paraguay', 'PY', '595', '595', '', '1', '');
INSERT INTO `country_list` VALUES ('170', '4', 'Peru', 'PE', '51', '51', '', '1', '');
INSERT INTO `country_list` VALUES ('171', '1', 'Philippines', 'PH', '63', '63', 'PHP', '1', '');
INSERT INTO `country_list` VALUES ('172', '0', 'Pitcairn Islands', 'PN', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('173', '5', 'Poland', 'PL', '48', '48', '', '1', '');
INSERT INTO `country_list` VALUES ('174', '5', 'Portugal', 'PT', '351', '351', '', '1', '');
INSERT INTO `country_list` VALUES ('175', '0', 'Puerto Rico', 'PR', '1-787 | 1-93', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('176', '1', 'Qatar', 'QA', '974', '974', '', '1', '');
INSERT INTO `country_list` VALUES ('177', '0', 'Reunion', 'RE', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('178', '5', 'Romania', 'RO', '40', '40', '', '1', '');
INSERT INTO `country_list` VALUES ('179', '0', 'Russia', 'RU', '7', '7', '', '1', '');
INSERT INTO `country_list` VALUES ('180', '2', 'Rwanda', 'RW', '250', '250', '', '1', '');
INSERT INTO `country_list` VALUES ('181', '0', 'Saint Helena and Dependencies', 'SH', '290', '290', '', '1', '');
INSERT INTO `country_list` VALUES ('182', '3', 'Saint Kitts and Nevis', 'KN', '1-869', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('183', '3', 'Saint Lucia', 'LC', '1-758', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('184', '0', 'Saint Pierre and Miquelon', 'PM', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('185', '3', 'Saint Vincent and the Grenadines', 'VC', '1-784', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('186', '6', 'Samoa', 'WS', '685', '685', '', '1', '');
INSERT INTO `country_list` VALUES ('187', '5', 'San Marino', 'SM', '378', '378', '', '1', '');
INSERT INTO `country_list` VALUES ('188', '0', 'Sao Tome and Principe', 'ST', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('189', '1', 'Saudi Arabia', 'SA', '966', '966', '', '1', '');
INSERT INTO `country_list` VALUES ('190', '2', 'Senegal', 'SN', '221', '221', '', '1', '');
INSERT INTO `country_list` VALUES ('191', '0', 'Serbia and Montenegro', 'CS', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('192', '2', 'Seychelles', 'SC', '248', '248', '', '1', '');
INSERT INTO `country_list` VALUES ('193', '2', 'Sierra Leone', 'SL', '232', '232', '', '1', '');
INSERT INTO `country_list` VALUES ('194', '1', 'Singapore', 'SG', '65', '65', 'SGD', '1', '');
INSERT INTO `country_list` VALUES ('195', '5', 'Slovakia', 'SK', '421', '421', '', '1', '');
INSERT INTO `country_list` VALUES ('196', '5', 'Slovenia', 'SI', '386', '386', '', '1', '');
INSERT INTO `country_list` VALUES ('197', '6', 'Solomon Islands', 'SB', '677', '677', '', '1', '');
INSERT INTO `country_list` VALUES ('198', '2', 'Somalia', 'SO', '252', '252', '', '1', '');
INSERT INTO `country_list` VALUES ('199', '2', 'South Africa', 'ZA', '27', '27', '', '1', '');
INSERT INTO `country_list` VALUES ('200', '0', 'South Georgia and South Sandwich Islands', 'GS', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('201', '0', 'South Korea', 'KR', '82', '82', 'KRW', '1', '');
INSERT INTO `country_list` VALUES ('202', '5', 'Spain', 'ES', '34', '34', '', '1', '');
INSERT INTO `country_list` VALUES ('203', '0', 'Spratly Islands', 'PI', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('204', '1', 'Sri Lanka', 'LK', '94', '94', '', '1', '');
INSERT INTO `country_list` VALUES ('205', '4', 'Suriname', 'SR', '597', '597', '', '1', '');
INSERT INTO `country_list` VALUES ('206', '0', 'Svalbard and Jan Mayen', 'SJ', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('207', '2', 'Swaziland', 'SZ', '268', '268', '', '1', '');
INSERT INTO `country_list` VALUES ('208', '5', 'Sweden', 'SE', '46', '46', '', '1', '');
INSERT INTO `country_list` VALUES ('209', '5', 'Switzerland', 'CH', '41', '41', '', '1', '');
INSERT INTO `country_list` VALUES ('210', '1', 'Syria', 'SY', '963', '963', '', '1', '');
INSERT INTO `country_list` VALUES ('211', '0', 'Taiwan', 'TW', '886', '886', '', '3', '');
INSERT INTO `country_list` VALUES ('212', '1', 'Tajikistan', 'TJ', '992', '992', '', '1', '');
INSERT INTO `country_list` VALUES ('213', '2', 'Tanzania', 'TZ', '255', '255', '', '1', '');
INSERT INTO `country_list` VALUES ('214', '1', 'Thailand', 'TH', '66', '66', 'THB', '1', '');
INSERT INTO `country_list` VALUES ('215', '2', 'Togo', 'TG', '228', '228', '', '1', '');
INSERT INTO `country_list` VALUES ('216', '0', 'Tokelau', 'TK', '690', '690', '', '1', '');
INSERT INTO `country_list` VALUES ('217', '6', 'Tonga', 'TO', '676', '676', '', '1', '');
INSERT INTO `country_list` VALUES ('218', '3', 'Trinidad and Tobago', 'TT', '1-868', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('219', '2', 'Tunisia', 'TN', '216', '216', '', '1', '');
INSERT INTO `country_list` VALUES ('220', '1', 'Turkey', 'TR', '90', '90', '', '1', '');
INSERT INTO `country_list` VALUES ('221', '1', 'Turkmenistan', 'TM', '993', '993', '', '1', '');
INSERT INTO `country_list` VALUES ('222', '0', 'Turks and Caicos Islands', 'TC', '1-649', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('223', '6', 'Tuvalu', 'TV', '688', '688', '', '1', '');
INSERT INTO `country_list` VALUES ('224', '2', 'Uganda', 'UG', '256', '256', '', '1', '');
INSERT INTO `country_list` VALUES ('225', '5', 'Ukraine', 'UA', '380', '380', '', '1', '');
INSERT INTO `country_list` VALUES ('226', '1', 'United Arab Emirates', 'AE', '971', '971', '', '1', '');
INSERT INTO `country_list` VALUES ('227', '5', 'United Kingdom', 'UK', '44', '3', '', '1', '');
INSERT INTO `country_list` VALUES ('228', '0', 'United Nations Neutral Zone', 'XD', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('229', '3', 'United States', 'US', '1', '1', 'USD', '1', '');
INSERT INTO `country_list` VALUES ('230', '0', 'United States Minor Outlying Islands', 'UM', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('231', '4', 'Uruguay', 'UY', '598', '598', '', '1', '');
INSERT INTO `country_list` VALUES ('232', '0', 'US Virgin Islands', 'VI', '1-340', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('233', '1', 'Uzbekistan', 'UZ', '998', '998', '', '1', '');
INSERT INTO `country_list` VALUES ('234', '6', 'Vanuatu', 'VU', '678', '678', '', '1', '');
INSERT INTO `country_list` VALUES ('235', '5', 'Vatican City', 'VA', '39', '39', '', '1', '');
INSERT INTO `country_list` VALUES ('236', '4', 'Venezuela', 'VE', '58', '58', '', '1', '');
INSERT INTO `country_list` VALUES ('237', '1', 'Vietnam', 'VN', '84', '84', 'VND', '1', '');
INSERT INTO `country_list` VALUES ('238', '0', 'Wallis and Futuna', 'WF', '681', '681', '', '1', '');
INSERT INTO `country_list` VALUES ('239', '0', 'Western Sahara', 'EH', '', '999', '', '1', '');
INSERT INTO `country_list` VALUES ('240', '1', 'Yemen', 'YE', '967', '967', '', '1', '');
INSERT INTO `country_list` VALUES ('241', '2', 'Zambia', 'ZM', '260', '260', '', '1', '');
INSERT INTO `country_list` VALUES ('242', '2', 'Zimbabwe', 'ZW', '263', '263', '', '1', '');
INSERT INTO `country_list` VALUES ('243', '5', 'Scotland', 'UK', '44', '3', '', '1', '');

-- ----------------------------
-- Table structure for currency
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(10) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO `currency` VALUES ('1', 'USD', '$', '2018-10-30 18:04:40', '2018-10-30 18:04:42');
INSERT INTO `currency` VALUES ('2', 'SGD', 'S$', '2018-10-30 18:06:11', '2018-10-30 18:06:34');

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `restaurant_id` bigint(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rating` int(5) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('1', 'Food1', '1', 'Fast Food', '4', 'foodthumb123.jpg', '12.40', '1', 'This is a sample of food description', '0', '2018-10-30 17:59:24', '2018-10-30 17:59:27', '');
INSERT INTO `food` VALUES ('2', 'Food2', '1', 'Fast Food', '3', 'foodthumb123.jpg', '9.50', '2', 'This is a sample of food description', '0', '2018-10-30 18:08:25', '2018-11-09 17:04:36', '');
INSERT INTO `food` VALUES ('3', 'Food3', '1', '1', '5', '', '4.00', '0', '7', '1', '2018-11-09 12:28:02', '2018-11-09 12:39:31', '');
INSERT INTO `food` VALUES ('4', 'Food3', '1', '1', '5', '', '4.00', '0', '', '1', '2018-11-09 12:36:51', '2018-11-09 12:39:28', '');
INSERT INTO `food` VALUES ('5', 'Food4', '1', 'Fast Food', '5', 'food2.jpg', '4.99', '0', 'How delicious', '0', '2018-11-09 12:44:55', '2018-11-09 13:29:17', '[\"5ff9bb5e5f8bf97e16c347369a4407d1.jpg\",\"57521cfeb9f9152c05934e7bbf38b286.jpg\",\"b6bd4154e627201752d2b3025b12df19.jpg\"]');

-- ----------------------------
-- Table structure for food_challenge
-- ----------------------------
DROP TABLE IF EXISTS `food_challenge`;
CREATE TABLE `food_challenge` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `food_id` bigint(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `reward_point` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `reward_num` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''1'':completed',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food_challenge
-- ----------------------------
INSERT INTO `food_challenge` VALUES ('1', 'Eat one burget in 20 seconds', '2', '[\"trip123.jpg\"]', '[\"sample.mp4\"]', '0', 'an objection to something as not being true, genuine, correct, or proper or to a person (as a juror) as not being correct, qualified, or approved. 2 : a call or dare for someone to compete in a contest or sport.', '2018-11-02 16:09:20', '2018-11-08 23:12:06', '11', '2018-11-01 22:04:54', '2018-11-09 17:30:43', '0', '0');

-- ----------------------------
-- Table structure for food_mission
-- ----------------------------
DROP TABLE IF EXISTS `food_mission`;
CREATE TABLE `food_mission` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `reward_point` int(10) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0'':new, ''1'':half, ''2'':complete',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `max_num` int(11) NOT NULL,
  `mission_content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food_mission
-- ----------------------------
INSERT INTO `food_mission` VALUES ('1', 'Summer Mission', 'The mission is to complete the goal in next 30 days', '[\"mission123.jpg\"]', '[\"sample.mp4\"]', '100', '1', '0', '2018-10-30 16:48:05', '2018-11-08 16:28:48', '2018-11-05 16:00:19', '2018-11-16 16:00:23', '50', null);
INSERT INTO `food_mission` VALUES ('2', 'Mission 2', 'This is short description', '[\"4cad3574b4afe46112afb05af9888c94.jpg\",\"34d5613943dc73527a9ed711c80cd538.jpg\",\"5a49a1335febd14d0f573258d2639788.jpg\"]', '[]', '0', '0', '1', '2018-11-08 15:20:21', '2018-11-08 16:16:55', '2018-11-08 23:15:00', '2018-11-08 23:15:00', '10', null);
INSERT INTO `food_mission` VALUES ('3', '', '', '[]', '[]', '0', '0', '1', '2018-11-09 10:09:13', '2018-11-09 10:09:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', null);
INSERT INTO `food_mission` VALUES ('4', '', '', '[]', '[]', '0', '0', '1', '2018-11-09 12:33:10', '2018-11-09 12:37:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', null);
INSERT INTO `food_mission` VALUES ('5', 'Sample1', 'Sample description', '[\"346b20159b8ef1def0c7e5c104ff41af.png\",\"4d6cd84169a38914073aa5d3d11cdc41.png\"]', '[\"1f6ade25348de7300a4a2b8d544e1876.mp4\"]', '100', '0', '0', '2018-11-09 17:20:36', '2018-11-09 17:20:36', '2018-11-14 23:30:00', '2018-11-28 13:30:00', '50', null);

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) CHARACTER SET utf32 NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `country_id` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `g_id` varchar(255) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `total_friends` bigint(10) NOT NULL,
  `total_media_uploads` bigint(10) NOT NULL,
  `total_review_given` bigint(10) NOT NULL,
  `total_like_achieved` bigint(10) NOT NULL,
  `is_login` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0'':logout, ''1'':login',
  `last_login` datetime DEFAULT NULL,
  `is_block` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0'':normal,''1'':time-blocked,''2'':blocked',
  `block_time` datetime DEFAULT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''1'':deleted',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'Eden', 'Hazard', '', '', '25', '', 'eden@email.com', '(234) 234-1341', '32', '194', 'male', 'test_member', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', '', '', '40', '20', '30', '15', '0', null, '0', '2018-11-16 09:43:58', '0', '2018-10-30 03:50:40', '2018-11-09 16:41:12');
INSERT INTO `member` VALUES ('2', 'Wang', 'Ying', '', null, '26', '', 'testmem@email.com', '(645) 654-3453', '65', '236', '', 'testmember', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '0', '0', '0', '0', '1', null, '1', '2018-11-16 16:38:56', '0', '2018-11-04 15:37:32', '2018-11-09 16:38:56');
INSERT INTO `member` VALUES ('3', 'test', 'user', '', null, '27', '', 'test@email.com', '(233) 415-2626', '65', '194', '', 'test', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '0', '0', '0', '0', '0', null, '1', '2018-11-15 15:26:11', '0', '2018-11-04 15:43:33', '2018-11-08 16:22:51');

-- ----------------------------
-- Table structure for mission_review
-- ----------------------------
DROP TABLE IF EXISTS `mission_review`;
CREATE TABLE `mission_review` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `rating` int(5) NOT NULL,
  `member_id` bigint(10) NOT NULL,
  `food_id` bigint(10) NOT NULL,
  `trip_id` bigint(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `voice` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''1'':deleted',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mission_review
-- ----------------------------
INSERT INTO `mission_review` VALUES ('1', '4', '1', '1', '1', 'This is really good taste', 'trip123.jpg', 'sample.mp4', 'SampleAudio.mp3', '0', '0', '2018-11-05 17:12:54', '2018-11-05 17:12:57');

-- ----------------------------
-- Table structure for mission_trip
-- ----------------------------
DROP TABLE IF EXISTS `mission_trip`;
CREATE TABLE `mission_trip` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `mission_id` bigint(10) NOT NULL,
  `trip_id` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mission_trip
-- ----------------------------
INSERT INTO `mission_trip` VALUES ('1', '1', '1');
INSERT INTO `mission_trip` VALUES ('2', '1', '2');
INSERT INTO `mission_trip` VALUES ('3', '1', '3');

-- ----------------------------
-- Table structure for restaurant
-- ----------------------------
DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `rest_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `owner_id` bigint(10) NOT NULL,
  `rest_images` varchar(255) NOT NULL,
  `average_rating` double(5,1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of restaurant
-- ----------------------------
INSERT INTO `restaurant` VALUES ('1', 'Whitegrass Restaurant', '30 Victoria Street, #01-26/27 Chijmes, Singapore 187996', '+65 6837 0402', 'http://whitegrass.com.sg', '1', '[\"9bdd7da97faa3852f5110474634e7efe.jpg\",\"c4d646f8f13be3a0020fb39a1764c762.jpg\"]', '4.7', 'One Michelin -starred Whitegrass Restaurant paves the way for Modern Australian fine dining in Asia. ', '1.290270', '103.851959', 'thumb123.jpg', '0', '2018-11-05 05:05:16', '2018-11-09 16:54:01');
INSERT INTO `restaurant` VALUES ('2', 'Wang\'s Restaurant', '651-1848-4544-15134', '', 'http://wang.co.en', '2', '[\"9bdd7da97faa3852f5110474634e7efe.jpg\",\"c4d646f8f13be3a0020fb39a1764c762.jpg\"]', '5.0', 'Wang\'s Restaurant', '1.490270', '112.851959', '3a9e373ad284cefea2c2a6797379a220.jpg', '1', '2018-11-09 12:52:38', '2018-11-09 12:53:30');
INSERT INTO `restaurant` VALUES ('3', 'Sample Restaurant', 'Sample Address', '324236565', '', '3', '[\"a7dbe0b6d8f18ef1591597900d7c531a.png\",\"ade40bff4b05cd886a84096f5a789e38.png\"]', '5.0', 'Sample description', '1.490270', '112.851959', '464d4df187521022071a42761ef867b9.png', '0', '2018-11-09 16:56:50', '2018-11-09 16:56:50');

-- ----------------------------
-- Table structure for trip
-- ----------------------------
DROP TABLE IF EXISTS `trip`;
CREATE TABLE `trip` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `trip_content` varchar(255) DEFAULT NULL,
  `gps` varchar(255) DEFAULT NULL,
  `google_map_url` varchar(255) DEFAULT NULL,
  `reward_point` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `food_id` bigint(10) NOT NULL,
  `is_completed` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''1'': completed',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''1'':delete',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trip
-- ----------------------------
INSERT INTO `trip` VALUES ('1', 'Burger Trip', 'This is a sample trip', null, null, null, '100', 'trip123.jpg', 'sample.mp4', 'sample address', '1.290270', '103.851959', '1', '1', '0', '2018-10-30 17:08:55', '2018-10-30 17:08:58');
INSERT INTO `trip` VALUES ('2', 'Salad Trip', 'This is a sample trip', null, null, null, '100', 'trip123.jpg', 'sample.mp4', 'sample address', '1.290380', '103.852059', '2', '0', '0', '2018-10-30 18:17:17', '2018-10-30 18:17:20');

-- ----------------------------
-- Table structure for wallet
-- ----------------------------
DROP TABLE IF EXISTS `wallet`;
CREATE TABLE `wallet` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint(10) NOT NULL,
  `e-currency` int(10) NOT NULL,
  `likes` int(11) NOT NULL,
  `likes_ability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wallet
-- ----------------------------
