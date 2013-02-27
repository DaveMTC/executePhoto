CREATE TABLE `list_clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(120) DEFAULT NULL,
  `lang` varchar(200) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `referer` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
