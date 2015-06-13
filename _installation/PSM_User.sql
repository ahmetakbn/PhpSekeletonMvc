--
-- Set the database name from 'app/config.php'
-- Select the database and then run this sql script
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(100) collate utf8_general_ci NOT NULL,
  `name` varchar(100) collate utf8_general_ci NOT NULL,
  `password`    varchar(100) collate utf8_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;

