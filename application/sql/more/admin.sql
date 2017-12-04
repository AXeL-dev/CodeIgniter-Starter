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
