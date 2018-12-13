   --  
 -- Table structure for table `usuarios`  
 --  
 CREATE TABLE IF NOT EXISTS `usuarios` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `nome` varchar(50) NOT NULL,  
  `endereco` text NOT NULL,  
  `turno` varchar(10) NOT NULL,  
  `linha` varchar(100) NOT NULL,  
  `freq` int(11) NOT NULL,  
  `mlh` text NOT NULL,  
  PRIMARY KEY (`id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;  
 --  
 -- Dumping data for table `usuarios`  
 --  
 INSERT INTO `usuarios` (`id`, `nome`, `endereco`, `turno`, `linha`, `freq`, `mlh`) VALUES  
 (1, 'Bruce Tom', 'Av. Sen. Salgado Filho', 'Manha', '347', 4, 'Sem cobertura e nem assento.'),  
 (5, 'Clara Gilliam', 'R. Comendador Manoel Pereira', 'Noite', '584', 6, 'Paradas muito proximas, causando aglomeracao.'),  
 (6, 'Barbra K. Hurley', 'Av. Julio de Castilho', 'Noite', '345', 3, 'Sem cobertura'),  
 (7, 'Antonio J. Forbes', 'R. Duque de Caxias', 'Manha', '470', 7, 'Sem cobertura');  
 