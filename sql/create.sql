CREATE TABLE `usuarios` (
`id` int NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
`whatsapp` varchar (25) NOT NULL UNIQUE,
`email` varchar(100) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
);

/*
CREATE TABLE `usuarios` (
`id` int NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
`whatsapp` varchar(25) NOT NULL,
`email` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
);
 */

-- pw 'LZc})&_}+yp9';