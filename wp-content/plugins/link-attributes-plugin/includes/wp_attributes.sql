SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wp_attributes`
-- ----------------------------
DROP TABLE IF EXISTS `wp_attributes`;
CREATE TABLE `wp_attributes` (
  `type_pages` enum('1','0') DEFAULT '0',
  `type_posts` enum('1','0') DEFAULT '0',
  `nofollow` enum('1','0') DEFAULT '0',
  `target` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;