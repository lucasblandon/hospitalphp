# hospitalphp
El hospital La Sagrada Familia, pacientes visitas  oop php crud

//Sql Query

CREATE SCHEMA `hlsf` ;

CREATE TABLE IF NOT EXISTS `tratamientos` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `costo` int(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `tratamientos` (`id`, `name`, `costo`,`created`) VALUES
(1, 'Cirugía o Tratamiento Quirúrgico', 500 , '2015-05-31 22:35:07'),
(2, 'Fisioterapia', 400 , '2015-05-31 22:35:07'),
(3, 'Ortopedia', 900 ,'2015-05-31 22:35:07'),
(4, 'Quimioterapia', 790 ,'2015-12-04 20:12:03');

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_number` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tratamiento_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
   `address_p` varchar(100) NOT NULL,
  `mobile` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
