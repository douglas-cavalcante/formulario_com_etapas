DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_lastname` varchar(100) DEFAULT NULL,
  `user_document` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_facebook` varchar(100) DEFAULT NULL,
  `user_website` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_document`, `user_email`, `user_password`, `user_facebook`, `user_website`)
VALUES
	(1,'Gustavo','Web','1','gustavo@upinside.com.br','123','https://facebook.com/guhweb','https://www.upinside.com.br'),
	(2,'Kaue','Francisquini','2','kaue@upinside.com.br','123','https://fb.me/kaue.francisquini','https://www.upinside.com.br');


UNLOCK TABLES;


