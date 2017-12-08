#
# Table structure for table 'languages'
#

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `abbr` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `uc_lang` UNIQUE (`abbr`, `name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Table structure for table 'settings'
#

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `uc_settings` UNIQUE (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
