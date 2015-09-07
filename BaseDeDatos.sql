/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.6.24 : Database - stockdev
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `caja` */

DROP TABLE IF EXISTS `caja`;

CREATE TABLE `caja` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `saldoanterior` VARCHAR(25) DEFAULT '0',
  `saldoventa` VARCHAR(25) DEFAULT '0',
  `total` VARCHAR(25) DEFAULT '0',
  `fecha` VARCHAR(25) DEFAULT NULL,
  `vendedor` VARCHAR(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `caja` */

LOCK TABLES `caja` WRITE;

UNLOCK TABLES;

/*Table structure for table `cajatmp` */

DROP TABLE IF EXISTS `cajatmp`;

CREATE TABLE `cajatmp` (
  `id` INT(25) NOT NULL AUTO_INCREMENT,
  `idfactura` INT(25) DEFAULT NULL,
  `producto` INT(2) DEFAULT NULL,
  `cantidad` INT(5) DEFAULT '1',
  `precio` FLOAT DEFAULT NULL,
  `totalprecio` FLOAT DEFAULT NULL,
  `vendedor` INT(9) DEFAULT NULL,
  `cliente` INT(9) DEFAULT '1',
  `stockTmp` INT(9) DEFAULT '0',
  `fecha` VARCHAR(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `cajatmp` */

LOCK TABLES `cajatmp` WRITE;

UNLOCK TABLES;

/*Table structure for table `canton` */

DROP TABLE IF EXISTS `canton`;

CREATE TABLE `canton` (
  `id` SMALLINT(5) UNSIGNED NOT NULL,
  `id_provincia` SMALLINT(5) UNSIGNED NOT NULL,
  `canton` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_CANTON_PROVINCIA` (`id_provincia`),
  CONSTRAINT `FK_CANTON_PROVINCIA` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `canton` */

LOCK TABLES `canton` WRITE;

INSERT  INTO `canton`(`id`,`id_provincia`,`canton`) VALUES (101,1,'San José'),(102,1,'Escazú'),(103,1,'Desamparados'),(104,1,'Puriscal'),(105,1,'Tarrazú'),(106,1,'Aserrí'),(107,1,'Mora'),(108,1,'Goicoechea'),(109,1,'Santa Ana'),(110,1,'Alajuelita'),(111,1,'Vasquez de Coronado'),(112,1,'Acosta'),(113,1,'Tibás'),(114,1,'Moravia'),(115,1,'Montes de Oca'),(116,1,'Turrubares'),(117,1,'Dota'),(118,1,'Curridabat'),(119,1,'Pérez Zeledón'),(120,1,'León Cortés'),(201,2,'Alajuela'),(202,2,'San Ramón'),(203,2,'Grecia'),(204,2,'San Mateo'),(205,2,'Atenas'),(206,2,'Naranjo'),(207,2,'Palmares'),(208,2,'Poás'),(209,2,'Orotina'),(210,2,'San Carlos'),(211,2,'Alfaro Ruiz'),(212,2,'Valverde Vega'),(213,2,'Upala'),(214,2,'Los Chiles'),(215,2,'Guatuso'),(301,3,'Cartago'),(302,3,'Paraíso'),(303,3,'La Unión'),(304,3,'Jiménez'),(305,3,'Turrialba'),(306,3,'Alvarado'),(307,3,'Oreamuno'),(308,3,'El Guarco'),(401,4,'Heredia'),(402,4,'Barva'),(403,4,'Santo Domingo'),(404,4,'Santa Bárbara'),(405,4,'San Rafael'),(406,4,'San Isidro'),(407,4,'Belén'),(408,4,'Flores'),(409,4,'San Pablo'),(410,4,'Sarapiquí '),(501,5,'Liberia'),(502,5,'Nicoya'),(503,5,'Santa Cruz'),(504,5,'Bagaces'),(505,5,'Carrillo'),(506,5,'Cañas'),(507,5,'Abangares'),(508,5,'Tilarán'),(509,5,'Nandayure'),(510,5,'La Cruz'),(511,5,'Hojancha'),(601,6,'Puntarenas'),(602,6,'Esparza'),(603,6,'Buenos Aires'),(604,6,'Montes de Oro'),(605,6,'Osa'),(606,6,'Aguirre'),(607,6,'Golfito'),(608,6,'Coto Brus'),(609,6,'Parrita'),(610,6,'Corredores'),(611,6,'Garabito'),(701,7,'Limón'),(702,7,'Pococí'),(703,7,'Siquirres '),(704,7,'Talamanca'),(705,7,'Matina'),(706,7,'Guácimo');

UNLOCK TABLES;

/*Table structure for table `cierre` */

DROP TABLE IF EXISTS `cierre`;

CREATE TABLE `cierre` (
  `id` INT(25) NOT NULL AUTO_INCREMENT,
  `numero` INT(2) DEFAULT NULL,
  `valor` INT(5) DEFAULT NULL,
  `tipo` VARCHAR(35) DEFAULT NULL,
  `fecha` VARCHAR(25) DEFAULT NULL,
  `hora` VARCHAR(25) DEFAULT NULL,
  `vendedor` VARCHAR(35) DEFAULT NULL,
  `cliente` VARCHAR(35) DEFAULT NULL,
  `habilitado` TINYINT(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `cierre` */

LOCK TABLES `cierre` WRITE;

UNLOCK TABLES;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) DEFAULT NULL,
  `descuento` VARCHAR(4) DEFAULT '0',
  `habilitado` TINYINT(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

LOCK TABLES `cliente` WRITE;

INSERT  INTO `cliente`(`id`,`nombre`,`descuento`,`habilitado`) VALUES (1,'Cliente Contado','0',1);

UNLOCK TABLES;

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) DEFAULT NULL,
  `habilitada` TINYINT(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `departamento` */

LOCK TABLES `departamento` WRITE;

INSERT  INTO `departamento`(`id`,`nombre`,`habilitada`) VALUES (1,'Gorras',1),(2,'Genérico ',1);

UNLOCK TABLES;

/*Table structure for table `distrito` */

DROP TABLE IF EXISTS `distrito`;

CREATE TABLE `distrito` (
  `id` INT(10) UNSIGNED NOT NULL,
  `id_canton` SMALLINT(5) UNSIGNED NOT NULL,
  `distrito` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_DISTRITO_CANTON` (`id_canton`),
  CONSTRAINT `FK_DISTRITO_CANTON` FOREIGN KEY (`id_canton`) REFERENCES `canton` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `distrito` */

LOCK TABLES `distrito` WRITE;

INSERT  INTO `distrito`(`id`,`id_canton`,`distrito`) VALUES (10101,101,'Carmen'),(10102,101,'Merced'),(10103,101,'Hospital'),(10104,101,'Catedral'),(10105,101,'Zapote'),(10106,101,'San Francisco de Dos Ríos'),(10107,101,'Uruca'),(10108,101,'Mata Redonda'),(10109,101,'Pavas'),(10110,101,'Hatillo'),(10111,101,'San Sebastián'),(10201,102,'Escazú'),(10202,102,'San Antonio'),(10203,102,'San Rafael'),(10301,103,'Desamparados'),(10302,103,'San Miguel'),(10303,103,'San Juan de Dios'),(10304,103,'San Rafael Arriba'),(10305,103,'San Antonio'),(10306,103,'Frailes'),(10307,103,'Patarrá'),(10308,103,'San Cristóbal'),(10309,103,'Rosario'),(10310,103,'Damas'),(10311,103,'San Rafael Abajo'),(10312,103,'Gravilias'),(10313,103,'Los Guido'),(10401,104,'Santiago'),(10402,104,'Mercedes Sur'),(10403,104,'Barbacoas'),(10404,104,'Grifo Alto'),(10405,104,'San Rafael'),(10406,104,'Candelaria'),(10407,104,'Desamparaditos'),(10408,104,'San Antonio'),(10409,104,'Chires'),(10501,105,'San Marcos'),(10502,105,'San Lorenzo'),(10503,105,'San Carlos'),(10601,106,'Aserrí'),(10602,106,'Tarbaca o Praga'),(10603,106,'Vuelta de Jorco'),(10604,106,'San Gabriel'),(10605,106,'La Legua'),(10606,106,'Monterrey'),(10607,106,'Salitrillos'),(10701,107,'Colón'),(10702,107,'Guayabo'),(10703,107,'Tabarcia'),(10704,107,'Piedras Negras'),(10705,107,'Picagres'),(10801,108,'Guadalupe'),(10802,108,'San Francisco'),(10803,108,'Calle Blancos'),(10804,108,'Mata de Plátano'),(10805,108,'Ipís'),(10806,108,'Rancho Redondo'),(10807,108,'Purral'),(10901,109,'Santa Ana'),(10902,109,'Salitral'),(10903,109,'Pozos o Concepción'),(10904,109,'Uruca o San Joaquín'),(10905,109,'Piedades'),(10906,109,'Brasil'),(11001,110,'Alajuelita'),(11002,110,'San Josecito'),(11003,110,'San Antonio'),(11004,110,'Concepción'),(11005,110,'San Felipe'),(11101,111,'San Isidro'),(11102,111,'San Rafael'),(11103,111,'Dulce Nombre de Jesús'),(11104,111,'Patalillo'),(11105,111,'Cascajal'),(11201,112,'San Ignacio'),(11202,112,'Guaitil'),(11203,112,'Palmichal'),(11204,112,'Cangrejal'),(11205,112,'Sabanillas'),(11301,113,'San Juan'),(11302,113,'Cinco Esquinas'),(11303,113,'Anselmo Llorente'),(11304,113,'León XIII'),(11305,113,'Colima'),(11401,114,'San Vicente'),(11402,114,'San Jerónimo'),(11403,114,'Trinidad'),(11501,115,'San Pedro'),(11502,115,'Sabanilla'),(11503,115,'Mercedes o Betania'),(11504,115,'San Rafael'),(11601,116,'San Pablo'),(11602,116,'San Pedro'),(11603,116,'San Juan de Mata'),(11604,116,'San Luis'),(11605,116,'Cárara'),(11701,117,'Santa María'),(11702,117,'Jardín'),(11703,117,'Copey'),(11801,118,'Curridabat'),(11802,118,'Granadilla'),(11803,118,'Sánchez'),(11804,118,'Tirrases'),(11901,119,'San Isidro de el General'),(11902,119,'General'),(11903,119,'Daniel Flores'),(11904,119,'Rivas'),(11905,119,'San Pedro'),(11906,119,'Platanares'),(11907,119,'Pejibaye'),(11908,119,'Cajón'),(11909,119,'Barú'),(11910,119,'Río Nuevo'),(11911,119,'Páramo'),(12001,120,'San Pablo'),(12002,120,'San Andrés'),(12003,120,'Llano Bonito'),(12004,120,'San Isidro'),(12005,120,'Santa Cruz'),(12006,120,'San Antonio'),(20101,201,'Alajuela'),(20102,201,'San José'),(20103,201,'Carrizal'),(20104,201,'San Antonio'),(20105,201,'Guácima'),(20106,201,'San Isidro'),(20107,201,'Sabanilla'),(20108,201,'San Rafael'),(20109,201,'Río Segundo'),(20110,201,'Desamparados'),(20111,201,'Turrucares'),(20112,201,'Tambor'),(20113,201,'La Garita'),(20114,201,'Sarapiquí'),(20201,202,'San Ramón'),(20202,202,'Santiago'),(20203,202,'San Juan'),(20204,202,'Piedades Norte'),(20205,202,'Piedades Sur'),(20206,202,'San Rafael'),(20207,202,'San Isidro'),(20208,202,'Angeles'),(20209,202,'Alfaro'),(20210,202,'Volio'),(20211,202,'Concepción'),(20212,202,'Zapotal'),(20213,202,'San Isidro de Peñas Blancas'),(20301,203,'Grecia'),(20302,203,'San Isidro'),(20303,203,'San José'),(20304,203,'San Roque'),(20305,203,'Tacares'),(20306,203,'Río Cuarto'),(20307,203,'Puente Piedra'),(20308,203,'Bolívar'),(20401,204,'San Mateo'),(20402,204,'Desmonte'),(20403,204,'Jesús María'),(20501,205,'Atenas'),(20502,205,'Jesús'),(20503,205,'Mercedes'),(20504,205,'San Isidro'),(20505,205,'Concepción'),(20506,205,'San José'),(20507,205,'Santa Eulalia'),(20508,205,'Escobal'),(20601,206,'Naranjo'),(20602,206,'San Miguel'),(20603,206,'San José'),(20604,206,'Cirrí Sur'),(20605,206,'San Jerónimo'),(20606,206,'San Juan'),(20607,206,'Rosario'),(20701,207,'Palmares'),(20702,207,'Zaragoza'),(20703,207,'Buenos Aires'),(20704,207,'Santiago'),(20705,207,'Candelaria'),(20706,207,'Esquipulas'),(20707,207,'La Granja'),(20801,208,'San Pedro'),(20802,208,'San Juan'),(20803,208,'San Rafael'),(20804,208,'Carrillos'),(20805,208,'Sabana Redonda'),(20901,209,'Orotina'),(20902,209,'Mastate'),(20903,209,'Hacienda Vieja'),(20904,209,'Coyolar'),(20905,209,'Ceiba'),(21001,210,'Quesada'),(21002,210,'Florencia'),(21003,210,'Buenavista'),(21004,210,'Aguas Zarcas'),(21005,210,'Venecia'),(21006,210,'Pital'),(21007,210,'Fortuna'),(21008,210,'Tigra'),(21009,210,'Palmera'),(21010,210,'Venado'),(21011,210,'Cutris'),(21012,210,'Monterrey'),(21013,210,'Pocosol'),(21101,211,'Zarcero'),(21102,211,'Laguna'),(21103,211,'Tapezco'),(21104,211,'Guadalupe'),(21105,211,'Palmira'),(21106,211,'Zapote'),(21107,211,'Las Brisas'),(21201,212,'Sarchí Norte'),(21202,212,'Sarchí Sur'),(21203,212,'Toro Amarillo'),(21204,212,'San Pedro'),(21205,212,'Rodríguez'),(21301,213,'Upala'),(21302,213,'Aguas Claras'),(21303,213,'San José o Pizote'),(21304,213,'Bijagua'),(21305,213,'Delicias'),(21306,213,'Dos Ríos'),(21307,213,'Yolillal'),(21401,214,'Los Chiles'),(21402,214,'Caño Negro'),(21403,214,'Amparo'),(21404,214,'San Jorge'),(21501,215,'San Rafael'),(21502,215,'Buenavista'),(21503,215,'Cote'),(30101,301,'Oriental'),(30102,301,'Occidental'),(30103,301,'Carmen'),(30104,301,'San Nicolás'),(30105,301,'Aguacaliente o San Francisco'),(30106,301,'Guadalupe o Arenilla'),(30107,301,'Corralillo'),(30108,301,'Tierra Blanca'),(30109,301,'Dulce Nombre'),(30110,301,'Llano Grande'),(30111,301,'Quebradilla'),(30201,302,'Paraíso'),(30202,302,'Santiago'),(30203,302,'Orosi'),(30204,302,'Cachí'),(30205,302,'Los Llanos de Santa Lucía'),(30301,303,'Tres Ríos'),(30302,303,'San Diego'),(30303,303,'San Juan'),(30304,303,'San Rafael'),(30305,303,'Concepción'),(30306,303,'Dulce Nombre'),(30307,303,'San Ramón'),(30308,303,'Río Azul'),(30401,304,'Juan Viñas'),(30402,304,'Tucurrique'),(30403,304,'Pejibaye'),(30501,305,'Turrialba'),(30502,305,'La Suiza'),(30503,305,'Peralta'),(30504,305,'Santa Cruz'),(30505,305,'Santa Teresita'),(30506,305,'Pavones'),(30507,305,'Tuis'),(30508,305,'Tayutic'),(30509,305,'Santa Rosa'),(30510,305,'Tres Equis'),(30511,305,'La Isabel'),(30512,305,'Chirripó'),(30601,306,'Pacayas'),(30602,306,'Cervantes'),(30603,306,'Capellades'),(30701,307,'San Rafael'),(30702,307,'Cot'),(30703,307,'Potrero Cerrado'),(30704,307,'Cipreses'),(30705,307,'Santa Rosa'),(30801,308,'El Tejar'),(30802,308,'San Isidro'),(30803,308,'Tobosi'),(30804,308,'Patio de Agua'),(40101,401,'Heredia'),(40102,401,'Mercedes'),(40103,401,'San Francisco'),(40104,401,'Ulloa'),(40105,401,'Varablanca'),(40201,402,'Barva'),(40202,402,'San Pedro'),(40203,402,'San Pablo'),(40204,402,'San Roque'),(40205,402,'Santa Lucía'),(40206,402,'San José de la Montaña'),(40301,403,'Santo Domingo'),(40302,403,'San Vicente'),(40303,403,'San Miguel'),(40304,403,'Paracito'),(40305,403,'Santo Tomás'),(40306,403,'Santa Rosa'),(40307,403,'Tures'),(40308,403,'Pará'),(40401,404,'Santa Bárbara'),(40402,404,'San Pedro'),(40403,404,'San Juan'),(40404,404,'Jesús'),(40405,404,'Santo Domingo del Roble'),(40406,404,'Puraba'),(40501,405,'San Rafael'),(40502,405,'San Josecito'),(40503,405,'Santiago'),(40504,405,'Angeles'),(40505,405,'Concepción'),(40601,406,'San Isidro'),(40602,406,'San José'),(40603,406,'Concepción'),(40604,406,'San Francisco'),(40701,407,'San Antonio'),(40702,407,'La Ribera'),(40703,407,'Asunción'),(40801,408,'San Joaquín'),(40802,408,'Barrantes'),(40803,408,'Llorente'),(40901,409,'San Pablo'),(41001,410,'Puerto Viejo'),(41002,410,'La Virgen'),(41003,410,'Horquetas'),(41004,410,'Llanuras de Gaspar'),(41005,410,'Cureña'),(50101,501,'Liberia'),(50102,501,'Cañas Dulces'),(50103,501,'Mayorga'),(50104,501,'Nacascolo'),(50105,501,'Curubande'),(50201,502,'Nicoya'),(50202,502,'Mansión'),(50203,502,'San Antonio'),(50204,502,'Quebrada Honda'),(50205,502,'Sámara'),(50206,502,'Nósara'),(50207,502,'Belén de Nosarita'),(50301,503,'Santa Cruz'),(50302,503,'Bolsón'),(50303,503,'Veintisiete de Abril'),(50304,503,'Tempate'),(50305,503,'Cartagena'),(50306,503,'Cuajiniquil'),(50307,503,'Diriá'),(50308,503,'Cabo Velas'),(50309,503,'Tamarindo'),(50401,504,'Bagaces'),(50402,504,'Fortuna'),(50403,504,'Mogote'),(50404,504,'Río Naranjo'),(50501,505,'Filadelfia'),(50502,505,'Palmira'),(50503,505,'Sardinal'),(50504,505,'Belén'),(50601,506,'Cañas'),(50602,506,'Palmira'),(50603,506,'San Miguel'),(50604,506,'Bebedero'),(50605,506,'Porozal'),(50701,507,'Juntas'),(50702,507,'Sierra'),(50703,507,'San Juan'),(50704,507,'Colorado'),(50801,508,'Tilarán'),(50802,508,'Quebrada Grande'),(50803,508,'Tronadora'),(50804,508,'Santa Rosa'),(50805,508,'Líbano'),(50806,508,'Tierras Morenas'),(50807,508,'Arenal'),(50901,509,'Carmona'),(50902,509,'Santa Rita'),(50903,509,'Zapotal'),(50904,509,'San Pablo'),(50905,509,'Porvenir'),(50906,509,'Bejuco'),(51001,510,'La Cruz'),(51002,510,'Santa Cecilia'),(51003,510,'Garita'),(51004,510,'Santa Elena'),(51101,511,'Hojancha'),(51102,511,'Monte Romo'),(51103,511,'Puerto Carrillo'),(51104,511,'Huacas'),(60101,601,'Puntarenas'),(60102,601,'Pitahaya'),(60103,601,'Chomes'),(60104,601,'Lepanto'),(60105,601,'Paquera'),(60106,601,'Manzanillo'),(60107,601,'Guacimal'),(60108,601,'Barranca'),(60109,601,'Monte Verde'),(60110,601,'Isla del Coco'),(60111,601,'Cóbano'),(60112,601,'Chacarita'),(60113,601,'Chira'),(60114,601,'Acapulco'),(60115,601,'Roble'),(60116,601,'Arancibia'),(60201,602,'Espíritu Santo'),(60202,602,'San Juan Grande'),(60203,602,'Macacona'),(60204,602,'San Rafael'),(60205,602,'San Jerónimo'),(60301,603,'Buenos Aires'),(60302,603,'Volcán'),(60303,603,'Potrero Grande'),(60304,603,'Boruca'),(60305,603,'Pilas'),(60306,603,'Colinas o Bajo de Maíz'),(60307,603,'Chánguena'),(60308,603,'Bioley'),(60309,603,'Brunka'),(60401,604,'Miramar'),(60402,604,'Unión'),(60403,604,'San Isidro'),(60501,605,'Puerto Cortés'),(60502,605,'Palmar'),(60503,605,'Sierpe'),(60504,605,'Bahía Ballena'),(60505,605,'Piedras Blancas'),(60601,606,'Quepos'),(60602,606,'Savegre'),(60603,606,'Naranjito'),(60701,607,'Golfito'),(60702,607,'Puerto Jiménez'),(60703,607,'Guaycará'),(60704,607,'Pavon'),(60801,608,'San Vito'),(60802,608,'Sabalito'),(60803,608,'Agua Buena'),(60804,608,'Limoncito'),(60805,608,'Pittier'),(60901,609,'Parrita'),(61001,610,'Corredor'),(61002,610,'La Cuesta'),(61003,610,'Paso Canoas'),(61004,610,'Laurel'),(61101,611,'Jacó'),(61102,611,'Tárcoles'),(70101,701,'Limón'),(70102,701,'Valle La Estrella'),(70103,701,'Río Blanco'),(70104,701,'Matama'),(70201,702,'Guápiles'),(70202,702,'Jiménez'),(70203,702,'Rita'),(70204,702,'Roxana'),(70205,702,'Cariari'),(70206,702,'Colorado'),(70301,703,'Siquirres'),(70302,703,'Pacuarito'),(70303,703,'Florida'),(70304,703,'Germania'),(70305,703,'Cairo'),(70306,703,'Alegría'),(70401,704,'Bratsi'),(70402,704,'Sixaola'),(70403,704,'Cahuita'),(70404,704,'Telire'),(70501,705,'Matina'),(70502,705,'Batán'),(70503,705,'Carrandí'),(70601,706,'Guácimo'),(70602,706,'Mercedes'),(70603,706,'Pocora'),(70604,706,'Río Jiménez'),(70605,706,'Duacarí');

UNLOCK TABLES;

/*Table structure for table `establecimiento` */

DROP TABLE IF EXISTS `establecimiento`;

CREATE TABLE `establecimiento` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(35) DEFAULT NULL,
  `telefono` VARCHAR(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `establecimiento` */

LOCK TABLES `establecimiento` WRITE;

INSERT  INTO `establecimiento`(`id`,`nombre`,`telefono`) VALUES (1,'Souvenir #1','26661234'),(2,'Souvenir #2','26661235'),(3,'Souvenir #3','26665432');

UNLOCK TABLES;

/*Table structure for table `factura` */

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `id` INT(20) NOT NULL AUTO_INCREMENT,
  `total` VARCHAR(20) DEFAULT NULL,
  `fecha` VARCHAR(25) DEFAULT NULL,
  `hora` VARCHAR(25) DEFAULT NULL,
  `usuario` VARCHAR(30) DEFAULT NULL,
  `cliente` VARCHAR(30) DEFAULT '1',
  `tipo` TINYINT(1) DEFAULT '1',
  `habilitado` INT(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `factura` */

LOCK TABLES `factura` WRITE;

UNLOCK TABLES;

/*Table structure for table `iva` */

DROP TABLE IF EXISTS `iva`;

CREATE TABLE `iva` (
  `id` INT(9) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `nombre` VARCHAR(50) DEFAULT NULL COMMENT 'Nombre del impuesto de venta',
  `valor` INT(4) DEFAULT NULL COMMENT 'Valor del impuesto de venta',
  `habilitado` TINYINT(1) DEFAULT NULL COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `iva` */

LOCK TABLES `iva` WRITE;

INSERT  INTO `iva`(`id`,`nombre`,`valor`,`habilitado`) VALUES (1,'Sin Impuesto de Venta',0,1),(2,'Impuesto de Venta',13,1),(3,'Impuesto de Servicio',10,1);

UNLOCK TABLES;

/*Table structure for table `medida` */

DROP TABLE IF EXISTS `medida`;

CREATE TABLE `medida` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) DEFAULT NULL,
  `signo` VARCHAR(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `medida` */

LOCK TABLES `medida` WRITE;

INSERT  INTO `medida`(`id`,`nombre`,`signo`) VALUES (1,'Unidad/Pza','U'),(2,'Litro','L'),(3,'Kilo','K');

UNLOCK TABLES;

/*Table structure for table `moneda` */

DROP TABLE IF EXISTS `moneda`;

CREATE TABLE `moneda` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `moneda` VARCHAR(55) DEFAULT NULL,
  `signo` VARCHAR(25) DEFAULT NULL,
  `valor` INT(9) DEFAULT NULL,
  `habilitada` TINYINT(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `moneda` */

LOCK TABLES `moneda` WRITE;

INSERT  INTO `moneda`(`id`,`moneda`,`signo`,`valor`,`habilitada`) VALUES (1,'Colón','¢',528,1),(2,'Dolar','$',1,1);

UNLOCK TABLES;

/*Table structure for table `notificaciones` */

DROP TABLE IF EXISTS `notificaciones`;

CREATE TABLE `notificaciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `notificacion` TEXT,
  `fecha` VARCHAR(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `notificaciones` */

LOCK TABLES `notificaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` INT(9) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `perfil` VARCHAR(50) DEFAULT NULL COMMENT 'Nombre del perfil de usuario',
  `comentario` TEXT COMMENT 'aclaración o comentario explicativo del tipo de perfil',
  `habilitado` TINYINT(1) DEFAULT '1' COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

LOCK TABLES `perfil` WRITE;

INSERT  INTO `perfil`(`id`,`perfil`,`comentario`,`habilitado`) VALUES (1,'Administrador','',1),(2,'Vendedor','',1);

UNLOCK TABLES;

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(50) DEFAULT NULL,
  `nombre` VARCHAR(255) DEFAULT NULL,
  `preciocosto` FLOAT DEFAULT NULL,
  `precioventa` FLOAT DEFAULT NULL,
  `proveedor` INT(9) DEFAULT NULL,
  `departamento` INT(6) DEFAULT NULL,
  `stock` INT(9) DEFAULT NULL,
  `stockMin` INT(9) DEFAULT NULL,
  `impuesto` INT(3) DEFAULT '0',
  `medida` VARCHAR(50) DEFAULT NULL,
  `especificaciones` TEXT,
  `habilitado` TINYINT(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_producto` (`departamento`),
  KEY `FK_id_proveedor` (`proveedor`),
  CONSTRAINT `FK_id_categoria` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_proveedor` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `producto` */

LOCK TABLES `producto` WRITE;

INSERT  INTO `producto`(`id`,`codigo`,`nombre`,`preciocosto`,`precioventa`,`proveedor`,`departamento`,`stock`,`stockMin`,`impuesto`,`medida`,`especificaciones`,`habilitado`) VALUES (1,'GN-100','Gorra NIC',8.9,8.9,1,1,41,10,1,'1','',1),(2,'GVC-101','Gorras Voda, Cari, Chi, Bra',9.9,9.9,1,1,41,10,1,'1','',1),(3,'GCH-102','Gorras Chino',11.9,11.9,1,1,46,10,1,'1','',1),(4,'GMLL-103','Gorras Malla (Brandis)',0,0,1,1,50,10,1,'1','',1);

UNLOCK TABLES;

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id` INT(9) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) DEFAULT NULL,
  `telefono` VARCHAR(35) DEFAULT NULL,
  `contacto` VARCHAR(80) DEFAULT NULL,
  `direccion` VARCHAR(150) DEFAULT NULL,
  `habilitado` TINYINT(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `proveedor` */

LOCK TABLES `proveedor` WRITE;

INSERT  INTO `proveedor`(`id`,`nombre`,`telefono`,`contacto`,`direccion`,`habilitado`) VALUES (1,'Genérico','012345678','Genérico','Genérico',1);

UNLOCK TABLES;

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provincia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `provincia` */

LOCK TABLES `provincia` WRITE;

INSERT  INTO `provincia`(`id`,`provincia`) VALUES (1,'San José'),(2,'Alajuela'),(3,'Cartago'),(4,'Heredia'),(5,'Guanacaste'),(6,'Puntarenas'),(7,'Limón');

UNLOCK TABLES;

/*Table structure for table `tema` */

DROP TABLE IF EXISTS `tema`;

CREATE TABLE `tema` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(35) DEFAULT NULL,
  `habilitado` TINYINT(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tema` */

LOCK TABLES `tema` WRITE;

INSERT  INTO `tema`(`id`,`nombre`,`habilitado`) VALUES (1,'Amelia',0),(2,'Cerulean',0),(3,'Cosmo',0),(4,'Cyborg',0),(5,'Darkly',0),(6,'Defecto',0),(7,'Flatly',0),(8,'Journal',0),(9,'Lumen',0),(10,'Paper',0),(11,'Readable',0),(12,'Sandstone',0),(13,'Simplex',0),(14,'Slate',0),(15,'Spacelab',0),(16,'Superhero',0),(17,'United',1),(18,'Yeti',0);

UNLOCK TABLES;

/*Table structure for table `sistema` */

DROP TABLE IF EXISTS `sistema`;

CREATE TABLE `sistema` (
  `id` INT(1) NOT NULL AUTO_INCREMENT,
  `logo` VARCHAR(55) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'logo.jpg',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sistema` */

LOCK TABLES `sistema` WRITE;

INSERT  INTO `sistema`(`id`,`logo`) VALUES (1,'applogo.png');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `usuario` VARCHAR(50) DEFAULT NULL COMMENT 'Nombre del pseudonimo del usuario del sistema',
  `contrasena` VARCHAR(40) DEFAULT NULL COMMENT 'Contraseña de acceso al sistema',
  `id_vendedor` INT(9) DEFAULT NULL COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Foránea-Tabla Perfil)(1:1)',
  `id_perfil` INT(1) DEFAULT '2',
  `habilitado` TINYINT(1) DEFAULT '1' COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`),
  KEY `FK_usuario` (`id_vendedor`),
  KEY `FK_perfil` (`id_perfil`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

INSERT  INTO `usuario`(`id`,`usuario`,`contrasena`,`id_vendedor`,`id_perfil`,`habilitado`) VALUES (1,'luis','d010964bc1e399c397623c43aacf3564d172905b',1,1,1);

UNLOCK TABLES;

/*Table structure for table `vendedores` */

DROP TABLE IF EXISTS `vendedores`;

CREATE TABLE `vendedores` (
  `id` INT(9) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `nombre` VARCHAR(50) DEFAULT NULL COMMENT 'Nombre real de la persona que va a utilizar el sistema',
  `apellido1` VARCHAR(50) DEFAULT NULL COMMENT 'Primer apellido de la persona que va a utilizar el sistema',
  `apellido2` VARCHAR(50) DEFAULT NULL COMMENT 'Segundo apellido de la persona que va a utilizar el sistema',
  `establecimiento` VARCHAR(80) DEFAULT NULL COMMENT 'Nombre del Establecimiento',
  `nota` TEXT COMMENT 'Dirección de la residencia de la persona',
  `provincia` INT(15) DEFAULT NULL,
  `canton` INT(10) DEFAULT NULL,
  `distrito` INT(10) DEFAULT NULL,
  `id_usuario` INT(9) DEFAULT NULL COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Foránea-Tabla Usuario(1:1). Relaciona un usuario específico con un empleado en una relación uno a uno.',
  `habilitado` TINYINT(1) DEFAULT '1' COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`),
  KEY `FK_usuario` (`id_usuario`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `vendedores` */

LOCK TABLES `vendedores` WRITE;

INSERT  INTO `vendedores`(`id`,`nombre`,`apellido1`,`apellido2`,`establecimiento`,`nota`,`provincia`,`canton`,`distrito`,`id_usuario`,`habilitado`) VALUES (1,'Luis','Cortés','Juárez','Qualtiva WebApp','600 metros este y 75 norte del Liceo Nocturno de Liberia',5,501,50101,1,1);

UNLOCK TABLES;

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` INT(25) NOT NULL AUTO_INCREMENT,
  `idfactura` INT(25) DEFAULT NULL,
  `producto` INT(2) DEFAULT NULL,
  `cantidad` INT(5) DEFAULT '1',
  `precio` FLOAT DEFAULT NULL,
  `totalprecio` FLOAT DEFAULT NULL,
  `vendedor` INT(9) DEFAULT NULL,
  `cliente` INT(9) DEFAULT '1',
  `fecha` VARCHAR(25) DEFAULT NULL,
  `tipo` TINYINT(1) DEFAULT NULL,
  `habilitada` INT(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `ventas` */

LOCK TABLES `ventas` WRITE;

INSERT  INTO `ventas`(`id`,`idfactura`,`producto`,`cantidad`,`precio`,`totalprecio`,`vendedor`,`cliente`,`fecha`,`tipo`,`habilitada`) VALUES (1,1,1,4,8.9,35.6,1,1,'31/08/2015',NULL,1),(2,2,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(3,3,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(4,4,1,1,8.9,8.9,1,3,'31/08/2015',NULL,1),(5,5,1,4,8.9,35.6,1,1,'31/08/2015',NULL,1),(6,7,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(7,8,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(8,8,2,3,9.9,29.7,1,1,'31/08/2015',NULL,1),(9,8,3,2,11.9,23.8,1,1,'31/08/2015',NULL,1),(10,8,3,1,11.9,11.9,1,1,'31/08/2015',NULL,1),(11,8,2,1,9.9,9.9,1,1,'31/08/2015',NULL,1),(14,9,1,2,8.9,17.8,1,1,'31/08/2015',NULL,1),(15,10,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(16,11,1,3,8.9,26.7,1,1,'31/08/2015',NULL,1),(17,12,3,2,11.9,23.8,1,1,'31/08/2015',NULL,1),(18,12,2,1,9.9,9.9,1,1,'31/08/2015',NULL,1),(20,13,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(21,13,3,1,11.9,11.9,1,1,'31/08/2015',NULL,1),(22,13,2,4,9.9,39.6,1,1,'31/08/2015',NULL,1),(23,14,2,1,9.9,9.9,1,1,'31/08/2015',NULL,1),(24,14,2,1,9.9,9.9,1,1,'31/08/2015',NULL,1),(26,15,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(27,15,2,3,9.9,29.7,1,1,'31/08/2015',NULL,1),(29,16,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(30,17,1,1,8.9,8.9,1,1,'31/08/2015',NULL,1),(31,18,3,1,11.9,11.9,1,1,'01/09/2015',NULL,1),(32,19,3,2,11.9,23.8,1,1,'01/09/2015',NULL,1),(33,20,1,3,8.9,26.7,1,1,'01/09/2015',NULL,1),(34,21,1,3,8.9,26.7,1,1,'01/09/2015',NULL,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
