CREATE TABLE `usuarios` (
`id` int NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
`apelido` varchar(50) NOT NULL,
`whatsapp` varchar(11) NOT NULL UNIQUE,
`email` varchar(100) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
);
