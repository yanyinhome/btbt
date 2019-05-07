
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dp_plugin_alisms_template`
-- ----------------------------
DROP TABLE IF EXISTS `dp_plugin_email_template`;
CREATE TABLE IF NOT EXISTS `dp_plugin_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(64) NOT NULL,
  `template_content` text NOT NULL,
  `template_keys` varchar(255) NOT NULL COMMENT '模板参数',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

