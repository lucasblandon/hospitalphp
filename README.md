# hospitalphp
El hospital La Sagrada Familia, pacientes visitas  oop php crud

//Sql Query

CREATE SCHEMA `hlsf` ;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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



INSERT INTO `pacientes` (`id`, `firstname`, `lastname`, `document_type`, `document_number`, `tratamiento_id`, `city`, `address_p`, `mobile`, `created`) VALUES
(1, 'George', 'Mazza', 'TI', '67335254', 2, 'Bogota', 'Cra 4 #5 6', '3015236892','2020-08-27 06:43:55'),
(2, 'Javier', 'Belmit', 'CE', '8688855', 3, 'Cali', 'Cl 34 #56 2', '3025236891','2020-08-27 06:56:52'),
(3, 'Michael', 'Juyvell', 'CE', '8227733', 3, 'Medellin','Cra 14 #75 26','3035236890', '2020-08-27 08:27:50'),
(4, 'Eros', 'Rammsit', 'CC', '483647198', 4,'Chia','Av Paseo # 2 9','3045236889', '2020-08-27 08:29:53'),
(5, 'George', 'Clatg', 'CC', '487847198', 3, 'Cali','Cra 54 #6 1','3055236888','2020-08-27 09:26:57'),
(6, 'Angelina', 'Jet', 'TI', '61293743', 1, 'Chia','Av parque  #8c 69','306236887','2020-08-27 17:48:18'),
(7, 'Jose', 'Herrea', 'CE', '8224433', 4, 'Medellin','Cra 14 #75 26','3075236886', '2020-07-27 08:27:50'),
(8, 'Ivan', 'Ramirez', 'CC', '48444198', 4,'Cartagena','Av Paseo # 68f 9','3085236885', '2020-07-27 08:29:53'),
(9, 'Claudia', 'Cassas', 'CC', '48744498', 2, 'Cali','Cra 54 #6 1','3095236884','2020-07-27 09:26:57'),
(10, 'Angelica', 'Patiño', 'TI', '6144443', 1, 'Santa Marta','Av Mar  #8c 69','310236883','2020-07-27 17:48:18');


ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
  
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;  