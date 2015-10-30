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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` varchar(9) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `hora` varchar(12) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `unix` varchar(50) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `caja` */

LOCK TABLES `caja` WRITE;

insert  into `caja`(`id`,`monto`,`fecha`,`hora`,`estado`,`unix`,`habilitado`) values (1,'124','22-09-2015','09:13:11 am',0,NULL,1),(2,'332','26-09-2015','04:06:09 pm',1,NULL,1),(3,'133','01-10-2015','10:42:07 pm',1,NULL,1),(4,'50','02-10-2015','06:55:09 am',1,NULL,1);

UNLOCK TABLES;

/*Table structure for table `cajachica` */

DROP TABLE IF EXISTS `cajachica`;

CREATE TABLE `cajachica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` varchar(9) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `hora` varchar(12) DEFAULT NULL,
  `unix` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cajachica` */

LOCK TABLES `cajachica` WRITE;

insert  into `cajachica`(`id`,`monto`,`fecha`,`hora`,`unix`) values (1,'0','02-10-2015','10:24:43 am','1443803083');

UNLOCK TABLES;

/*Table structure for table `cajachicaregistros` */

DROP TABLE IF EXISTS `cajachicaregistros`;

CREATE TABLE `cajachicaregistros` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `monto` varchar(9) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `hora` varchar(12) DEFAULT NULL,
  `Detalle` text,
  `unix` varchar(50) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cajachicaregistros` */

LOCK TABLES `cajachicaregistros` WRITE;

insert  into `cajachicaregistros`(`id`,`monto`,`tipo`,`fecha`,`hora`,`Detalle`,`unix`,`habilitado`) values (1,'50',0,'02-10-2015','10:21:09 am','dawd','1443802869',1),(2,'50',1,'02-10-2015','10:24:43 am','Pago de Luz','1443803083',1);

UNLOCK TABLES;

/*Table structure for table `cajaregistros` */

DROP TABLE IF EXISTS `cajaregistros`;

CREATE TABLE `cajaregistros` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `monto` varchar(9) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `hora` varchar(12) DEFAULT NULL,
  `detalle` varchar(75) DEFAULT NULL,
  `unix` varchar(50) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `cajaregistros` */

LOCK TABLES `cajaregistros` WRITE;

insert  into `cajaregistros`(`id`,`monto`,`tipo`,`fecha`,`hora`,`detalle`,`unix`,`habilitado`) values (1,'80',1,'22-09-2015','09:13:11 am','Apertura de Caja',NULL,1),(2,'44',2,'22-09-2015','04:05:32 pm','Cierre de Caja',NULL,1),(3,'50',1,'26-09-2015','04:06:09 pm','Apertura de Caja',NULL,1),(4,'0',2,'26-10-2015','10:41:53 pm','Cierre de Caja',NULL,1),(5,'50',1,'01-10-2015','10:42:07 pm','Apertura de Caja',NULL,1),(6,'0',2,'02-10-2015','06:54:44 am','Cierre de Caja',NULL,1),(7,'50',1,'02-10-2015','06:55:09 am','Apertura de Caja',NULL,1);

UNLOCK TABLES;

/*Table structure for table `cajatmp` */

DROP TABLE IF EXISTS `cajatmp`;

CREATE TABLE `cajatmp` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `idfactura` int(25) DEFAULT NULL,
  `producto` int(2) DEFAULT NULL,
  `cantidad` int(5) DEFAULT '1',
  `precio` float DEFAULT NULL,
  `totalprecio` float DEFAULT NULL,
  `vendedor` int(9) DEFAULT NULL,
  `cliente` int(9) DEFAULT '1',
  `stockTmp` int(9) DEFAULT '0',
  `stock` int(9) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cajatmp` */

LOCK TABLES `cajatmp` WRITE;

UNLOCK TABLES;

/*Table structure for table `canton` */

DROP TABLE IF EXISTS `canton`;

CREATE TABLE `canton` (
  `id` smallint(5) unsigned NOT NULL,
  `id_provincia` smallint(5) unsigned NOT NULL,
  `canton` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_CANTON_PROVINCIA` (`id_provincia`),
  CONSTRAINT `FK_CANTON_PROVINCIA` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `canton` */

LOCK TABLES `canton` WRITE;

insert  into `canton`(`id`,`id_provincia`,`canton`) values (101,1,'San José'),(102,1,'Escazú'),(103,1,'Desamparados'),(104,1,'Puriscal'),(105,1,'Tarrazú'),(106,1,'Aserrí'),(107,1,'Mora'),(108,1,'Goicoechea'),(109,1,'Santa Ana'),(110,1,'Alajuelita'),(111,1,'Vasquez de Coronado'),(112,1,'Acosta'),(113,1,'Tibás'),(114,1,'Moravia'),(115,1,'Montes de Oca'),(116,1,'Turrubares'),(117,1,'Dota'),(118,1,'Curridabat'),(119,1,'Pérez Zeledón'),(120,1,'León Cortés'),(201,2,'Alajuela'),(202,2,'San Ramón'),(203,2,'Grecia'),(204,2,'San Mateo'),(205,2,'Atenas'),(206,2,'Naranjo'),(207,2,'Palmares'),(208,2,'Poás'),(209,2,'Orotina'),(210,2,'San Carlos'),(211,2,'Alfaro Ruiz'),(212,2,'Valverde Vega'),(213,2,'Upala'),(214,2,'Los Chiles'),(215,2,'Guatuso'),(301,3,'Cartago'),(302,3,'Paraíso'),(303,3,'La Unión'),(304,3,'Jiménez'),(305,3,'Turrialba'),(306,3,'Alvarado'),(307,3,'Oreamuno'),(308,3,'El Guarco'),(401,4,'Heredia'),(402,4,'Barva'),(403,4,'Santo Domingo'),(404,4,'Santa Bárbara'),(405,4,'San Rafael'),(406,4,'San Isidro'),(407,4,'Belén'),(408,4,'Flores'),(409,4,'San Pablo'),(410,4,'Sarapiquí '),(501,5,'Liberia'),(502,5,'Nicoya'),(503,5,'Santa Cruz'),(504,5,'Bagaces'),(505,5,'Carrillo'),(506,5,'Cañas'),(507,5,'Abangares'),(508,5,'Tilarán'),(509,5,'Nandayure'),(510,5,'La Cruz'),(511,5,'Hojancha'),(601,6,'Puntarenas'),(602,6,'Esparza'),(603,6,'Buenos Aires'),(604,6,'Montes de Oro'),(605,6,'Osa'),(606,6,'Aguirre'),(607,6,'Golfito'),(608,6,'Coto Brus'),(609,6,'Parrita'),(610,6,'Corredores'),(611,6,'Garabito'),(701,7,'Limón'),(702,7,'Pococí'),(703,7,'Siquirres '),(704,7,'Talamanca'),(705,7,'Matina'),(706,7,'Guácimo');

UNLOCK TABLES;

/*Table structure for table `cierre` */

DROP TABLE IF EXISTS `cierre`;

CREATE TABLE `cierre` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `numero` int(2) DEFAULT NULL,
  `valor` int(5) DEFAULT NULL,
  `tipo` varchar(35) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `hora` varchar(25) DEFAULT NULL,
  `vendedor` varchar(35) DEFAULT NULL,
  `cliente` varchar(35) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cierre` */

LOCK TABLES `cierre` WRITE;

UNLOCK TABLES;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descuento` varchar(4) DEFAULT '0',
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

LOCK TABLES `cliente` WRITE;

insert  into `cliente`(`id`,`nombre`,`descuento`,`habilitado`) values (1,'Cliente Contado','0',1),(2,'Luis Cortés','0.05',1),(3,'Enrique Juarez','0',1);

UNLOCK TABLES;

/*Table structure for table `credito` */

DROP TABLE IF EXISTS `credito`;

CREATE TABLE `credito` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(25) DEFAULT NULL,
  `deuda` int(25) DEFAULT NULL,
  `deudaNeta` int(25) DEFAULT NULL,
  `saldo` int(25) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `interes` int(5) DEFAULT NULL,
  `cuota` varchar(25) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_credito` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `credito` */

LOCK TABLES `credito` WRITE;

UNLOCK TABLES;

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `habilitada` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `departamento` */

LOCK TABLES `departamento` WRITE;

insert  into `departamento`(`id`,`nombre`,`habilitada`) values (1,'Gorras',1),(2,'Genérico ',1),(3,'Joyeros',1),(4,'Relojes',1),(5,'Bolsos',1),(6,'Camisetas',1),(7,'Carretas',1),(8,'Libros',1),(9,'Mapas',1),(10,'Tasas',1),(11,'Cuadros',1),(12,'Collares',1),(13,'Llaveros',1),(14,'Portaretrato',1),(15,'Banderas',1),(16,'Mochilas',1),(17,'Amacas',1),(18,'Vestidos',1);

UNLOCK TABLES;

/*Table structure for table `distrito` */

DROP TABLE IF EXISTS `distrito`;

CREATE TABLE `distrito` (
  `id` int(10) unsigned NOT NULL,
  `id_canton` smallint(5) unsigned NOT NULL,
  `distrito` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_DISTRITO_CANTON` (`id_canton`),
  CONSTRAINT `FK_DISTRITO_CANTON` FOREIGN KEY (`id_canton`) REFERENCES `canton` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `distrito` */

LOCK TABLES `distrito` WRITE;

insert  into `distrito`(`id`,`id_canton`,`distrito`) values (10101,101,'Carmen'),(10102,101,'Merced'),(10103,101,'Hospital'),(10104,101,'Catedral'),(10105,101,'Zapote'),(10106,101,'San Francisco de Dos Ríos'),(10107,101,'Uruca'),(10108,101,'Mata Redonda'),(10109,101,'Pavas'),(10110,101,'Hatillo'),(10111,101,'San Sebastián'),(10201,102,'Escazú'),(10202,102,'San Antonio'),(10203,102,'San Rafael'),(10301,103,'Desamparados'),(10302,103,'San Miguel'),(10303,103,'San Juan de Dios'),(10304,103,'San Rafael Arriba'),(10305,103,'San Antonio'),(10306,103,'Frailes'),(10307,103,'Patarrá'),(10308,103,'San Cristóbal'),(10309,103,'Rosario'),(10310,103,'Damas'),(10311,103,'San Rafael Abajo'),(10312,103,'Gravilias'),(10313,103,'Los Guido'),(10401,104,'Santiago'),(10402,104,'Mercedes Sur'),(10403,104,'Barbacoas'),(10404,104,'Grifo Alto'),(10405,104,'San Rafael'),(10406,104,'Candelaria'),(10407,104,'Desamparaditos'),(10408,104,'San Antonio'),(10409,104,'Chires'),(10501,105,'San Marcos'),(10502,105,'San Lorenzo'),(10503,105,'San Carlos'),(10601,106,'Aserrí'),(10602,106,'Tarbaca o Praga'),(10603,106,'Vuelta de Jorco'),(10604,106,'San Gabriel'),(10605,106,'La Legua'),(10606,106,'Monterrey'),(10607,106,'Salitrillos'),(10701,107,'Colón'),(10702,107,'Guayabo'),(10703,107,'Tabarcia'),(10704,107,'Piedras Negras'),(10705,107,'Picagres'),(10801,108,'Guadalupe'),(10802,108,'San Francisco'),(10803,108,'Calle Blancos'),(10804,108,'Mata de Plátano'),(10805,108,'Ipís'),(10806,108,'Rancho Redondo'),(10807,108,'Purral'),(10901,109,'Santa Ana'),(10902,109,'Salitral'),(10903,109,'Pozos o Concepción'),(10904,109,'Uruca o San Joaquín'),(10905,109,'Piedades'),(10906,109,'Brasil'),(11001,110,'Alajuelita'),(11002,110,'San Josecito'),(11003,110,'San Antonio'),(11004,110,'Concepción'),(11005,110,'San Felipe'),(11101,111,'San Isidro'),(11102,111,'San Rafael'),(11103,111,'Dulce Nombre de Jesús'),(11104,111,'Patalillo'),(11105,111,'Cascajal'),(11201,112,'San Ignacio'),(11202,112,'Guaitil'),(11203,112,'Palmichal'),(11204,112,'Cangrejal'),(11205,112,'Sabanillas'),(11301,113,'San Juan'),(11302,113,'Cinco Esquinas'),(11303,113,'Anselmo Llorente'),(11304,113,'León XIII'),(11305,113,'Colima'),(11401,114,'San Vicente'),(11402,114,'San Jerónimo'),(11403,114,'Trinidad'),(11501,115,'San Pedro'),(11502,115,'Sabanilla'),(11503,115,'Mercedes o Betania'),(11504,115,'San Rafael'),(11601,116,'San Pablo'),(11602,116,'San Pedro'),(11603,116,'San Juan de Mata'),(11604,116,'San Luis'),(11605,116,'Cárara'),(11701,117,'Santa María'),(11702,117,'Jardín'),(11703,117,'Copey'),(11801,118,'Curridabat'),(11802,118,'Granadilla'),(11803,118,'Sánchez'),(11804,118,'Tirrases'),(11901,119,'San Isidro de el General'),(11902,119,'General'),(11903,119,'Daniel Flores'),(11904,119,'Rivas'),(11905,119,'San Pedro'),(11906,119,'Platanares'),(11907,119,'Pejibaye'),(11908,119,'Cajón'),(11909,119,'Barú'),(11910,119,'Río Nuevo'),(11911,119,'Páramo'),(12001,120,'San Pablo'),(12002,120,'San Andrés'),(12003,120,'Llano Bonito'),(12004,120,'San Isidro'),(12005,120,'Santa Cruz'),(12006,120,'San Antonio'),(20101,201,'Alajuela'),(20102,201,'San José'),(20103,201,'Carrizal'),(20104,201,'San Antonio'),(20105,201,'Guácima'),(20106,201,'San Isidro'),(20107,201,'Sabanilla'),(20108,201,'San Rafael'),(20109,201,'Río Segundo'),(20110,201,'Desamparados'),(20111,201,'Turrucares'),(20112,201,'Tambor'),(20113,201,'La Garita'),(20114,201,'Sarapiquí'),(20201,202,'San Ramón'),(20202,202,'Santiago'),(20203,202,'San Juan'),(20204,202,'Piedades Norte'),(20205,202,'Piedades Sur'),(20206,202,'San Rafael'),(20207,202,'San Isidro'),(20208,202,'Angeles'),(20209,202,'Alfaro'),(20210,202,'Volio'),(20211,202,'Concepción'),(20212,202,'Zapotal'),(20213,202,'San Isidro de Peñas Blancas'),(20301,203,'Grecia'),(20302,203,'San Isidro'),(20303,203,'San José'),(20304,203,'San Roque'),(20305,203,'Tacares'),(20306,203,'Río Cuarto'),(20307,203,'Puente Piedra'),(20308,203,'Bolívar'),(20401,204,'San Mateo'),(20402,204,'Desmonte'),(20403,204,'Jesús María'),(20501,205,'Atenas'),(20502,205,'Jesús'),(20503,205,'Mercedes'),(20504,205,'San Isidro'),(20505,205,'Concepción'),(20506,205,'San José'),(20507,205,'Santa Eulalia'),(20508,205,'Escobal'),(20601,206,'Naranjo'),(20602,206,'San Miguel'),(20603,206,'San José'),(20604,206,'Cirrí Sur'),(20605,206,'San Jerónimo'),(20606,206,'San Juan'),(20607,206,'Rosario'),(20701,207,'Palmares'),(20702,207,'Zaragoza'),(20703,207,'Buenos Aires'),(20704,207,'Santiago'),(20705,207,'Candelaria'),(20706,207,'Esquipulas'),(20707,207,'La Granja'),(20801,208,'San Pedro'),(20802,208,'San Juan'),(20803,208,'San Rafael'),(20804,208,'Carrillos'),(20805,208,'Sabana Redonda'),(20901,209,'Orotina'),(20902,209,'Mastate'),(20903,209,'Hacienda Vieja'),(20904,209,'Coyolar'),(20905,209,'Ceiba'),(21001,210,'Quesada'),(21002,210,'Florencia'),(21003,210,'Buenavista'),(21004,210,'Aguas Zarcas'),(21005,210,'Venecia'),(21006,210,'Pital'),(21007,210,'Fortuna'),(21008,210,'Tigra'),(21009,210,'Palmera'),(21010,210,'Venado'),(21011,210,'Cutris'),(21012,210,'Monterrey'),(21013,210,'Pocosol'),(21101,211,'Zarcero'),(21102,211,'Laguna'),(21103,211,'Tapezco'),(21104,211,'Guadalupe'),(21105,211,'Palmira'),(21106,211,'Zapote'),(21107,211,'Las Brisas'),(21201,212,'Sarchí Norte'),(21202,212,'Sarchí Sur'),(21203,212,'Toro Amarillo'),(21204,212,'San Pedro'),(21205,212,'Rodríguez'),(21301,213,'Upala'),(21302,213,'Aguas Claras'),(21303,213,'San José o Pizote'),(21304,213,'Bijagua'),(21305,213,'Delicias'),(21306,213,'Dos Ríos'),(21307,213,'Yolillal'),(21401,214,'Los Chiles'),(21402,214,'Caño Negro'),(21403,214,'Amparo'),(21404,214,'San Jorge'),(21501,215,'San Rafael'),(21502,215,'Buenavista'),(21503,215,'Cote'),(30101,301,'Oriental'),(30102,301,'Occidental'),(30103,301,'Carmen'),(30104,301,'San Nicolás'),(30105,301,'Aguacaliente o San Francisco'),(30106,301,'Guadalupe o Arenilla'),(30107,301,'Corralillo'),(30108,301,'Tierra Blanca'),(30109,301,'Dulce Nombre'),(30110,301,'Llano Grande'),(30111,301,'Quebradilla'),(30201,302,'Paraíso'),(30202,302,'Santiago'),(30203,302,'Orosi'),(30204,302,'Cachí'),(30205,302,'Los Llanos de Santa Lucía'),(30301,303,'Tres Ríos'),(30302,303,'San Diego'),(30303,303,'San Juan'),(30304,303,'San Rafael'),(30305,303,'Concepción'),(30306,303,'Dulce Nombre'),(30307,303,'San Ramón'),(30308,303,'Río Azul'),(30401,304,'Juan Viñas'),(30402,304,'Tucurrique'),(30403,304,'Pejibaye'),(30501,305,'Turrialba'),(30502,305,'La Suiza'),(30503,305,'Peralta'),(30504,305,'Santa Cruz'),(30505,305,'Santa Teresita'),(30506,305,'Pavones'),(30507,305,'Tuis'),(30508,305,'Tayutic'),(30509,305,'Santa Rosa'),(30510,305,'Tres Equis'),(30511,305,'La Isabel'),(30512,305,'Chirripó'),(30601,306,'Pacayas'),(30602,306,'Cervantes'),(30603,306,'Capellades'),(30701,307,'San Rafael'),(30702,307,'Cot'),(30703,307,'Potrero Cerrado'),(30704,307,'Cipreses'),(30705,307,'Santa Rosa'),(30801,308,'El Tejar'),(30802,308,'San Isidro'),(30803,308,'Tobosi'),(30804,308,'Patio de Agua'),(40101,401,'Heredia'),(40102,401,'Mercedes'),(40103,401,'San Francisco'),(40104,401,'Ulloa'),(40105,401,'Varablanca'),(40201,402,'Barva'),(40202,402,'San Pedro'),(40203,402,'San Pablo'),(40204,402,'San Roque'),(40205,402,'Santa Lucía'),(40206,402,'San José de la Montaña'),(40301,403,'Santo Domingo'),(40302,403,'San Vicente'),(40303,403,'San Miguel'),(40304,403,'Paracito'),(40305,403,'Santo Tomás'),(40306,403,'Santa Rosa'),(40307,403,'Tures'),(40308,403,'Pará'),(40401,404,'Santa Bárbara'),(40402,404,'San Pedro'),(40403,404,'San Juan'),(40404,404,'Jesús'),(40405,404,'Santo Domingo del Roble'),(40406,404,'Puraba'),(40501,405,'San Rafael'),(40502,405,'San Josecito'),(40503,405,'Santiago'),(40504,405,'Angeles'),(40505,405,'Concepción'),(40601,406,'San Isidro'),(40602,406,'San José'),(40603,406,'Concepción'),(40604,406,'San Francisco'),(40701,407,'San Antonio'),(40702,407,'La Ribera'),(40703,407,'Asunción'),(40801,408,'San Joaquín'),(40802,408,'Barrantes'),(40803,408,'Llorente'),(40901,409,'San Pablo'),(41001,410,'Puerto Viejo'),(41002,410,'La Virgen'),(41003,410,'Horquetas'),(41004,410,'Llanuras de Gaspar'),(41005,410,'Cureña'),(50101,501,'Liberia'),(50102,501,'Cañas Dulces'),(50103,501,'Mayorga'),(50104,501,'Nacascolo'),(50105,501,'Curubande'),(50201,502,'Nicoya'),(50202,502,'Mansión'),(50203,502,'San Antonio'),(50204,502,'Quebrada Honda'),(50205,502,'Sámara'),(50206,502,'Nósara'),(50207,502,'Belén de Nosarita'),(50301,503,'Santa Cruz'),(50302,503,'Bolsón'),(50303,503,'Veintisiete de Abril'),(50304,503,'Tempate'),(50305,503,'Cartagena'),(50306,503,'Cuajiniquil'),(50307,503,'Diriá'),(50308,503,'Cabo Velas'),(50309,503,'Tamarindo'),(50401,504,'Bagaces'),(50402,504,'Fortuna'),(50403,504,'Mogote'),(50404,504,'Río Naranjo'),(50501,505,'Filadelfia'),(50502,505,'Palmira'),(50503,505,'Sardinal'),(50504,505,'Belén'),(50601,506,'Cañas'),(50602,506,'Palmira'),(50603,506,'San Miguel'),(50604,506,'Bebedero'),(50605,506,'Porozal'),(50701,507,'Juntas'),(50702,507,'Sierra'),(50703,507,'San Juan'),(50704,507,'Colorado'),(50801,508,'Tilarán'),(50802,508,'Quebrada Grande'),(50803,508,'Tronadora'),(50804,508,'Santa Rosa'),(50805,508,'Líbano'),(50806,508,'Tierras Morenas'),(50807,508,'Arenal'),(50901,509,'Carmona'),(50902,509,'Santa Rita'),(50903,509,'Zapotal'),(50904,509,'San Pablo'),(50905,509,'Porvenir'),(50906,509,'Bejuco'),(51001,510,'La Cruz'),(51002,510,'Santa Cecilia'),(51003,510,'Garita'),(51004,510,'Santa Elena'),(51101,511,'Hojancha'),(51102,511,'Monte Romo'),(51103,511,'Puerto Carrillo'),(51104,511,'Huacas'),(60101,601,'Puntarenas'),(60102,601,'Pitahaya'),(60103,601,'Chomes'),(60104,601,'Lepanto'),(60105,601,'Paquera'),(60106,601,'Manzanillo'),(60107,601,'Guacimal'),(60108,601,'Barranca'),(60109,601,'Monte Verde'),(60110,601,'Isla del Coco'),(60111,601,'Cóbano'),(60112,601,'Chacarita'),(60113,601,'Chira'),(60114,601,'Acapulco'),(60115,601,'Roble'),(60116,601,'Arancibia'),(60201,602,'Espíritu Santo'),(60202,602,'San Juan Grande'),(60203,602,'Macacona'),(60204,602,'San Rafael'),(60205,602,'San Jerónimo'),(60301,603,'Buenos Aires'),(60302,603,'Volcán'),(60303,603,'Potrero Grande'),(60304,603,'Boruca'),(60305,603,'Pilas'),(60306,603,'Colinas o Bajo de Maíz'),(60307,603,'Chánguena'),(60308,603,'Bioley'),(60309,603,'Brunka'),(60401,604,'Miramar'),(60402,604,'Unión'),(60403,604,'San Isidro'),(60501,605,'Puerto Cortés'),(60502,605,'Palmar'),(60503,605,'Sierpe'),(60504,605,'Bahía Ballena'),(60505,605,'Piedras Blancas'),(60601,606,'Quepos'),(60602,606,'Savegre'),(60603,606,'Naranjito'),(60701,607,'Golfito'),(60702,607,'Puerto Jiménez'),(60703,607,'Guaycará'),(60704,607,'Pavon'),(60801,608,'San Vito'),(60802,608,'Sabalito'),(60803,608,'Agua Buena'),(60804,608,'Limoncito'),(60805,608,'Pittier'),(60901,609,'Parrita'),(61001,610,'Corredor'),(61002,610,'La Cuesta'),(61003,610,'Paso Canoas'),(61004,610,'Laurel'),(61101,611,'Jacó'),(61102,611,'Tárcoles'),(70101,701,'Limón'),(70102,701,'Valle La Estrella'),(70103,701,'Río Blanco'),(70104,701,'Matama'),(70201,702,'Guápiles'),(70202,702,'Jiménez'),(70203,702,'Rita'),(70204,702,'Roxana'),(70205,702,'Cariari'),(70206,702,'Colorado'),(70301,703,'Siquirres'),(70302,703,'Pacuarito'),(70303,703,'Florida'),(70304,703,'Germania'),(70305,703,'Cairo'),(70306,703,'Alegría'),(70401,704,'Bratsi'),(70402,704,'Sixaola'),(70403,704,'Cahuita'),(70404,704,'Telire'),(70501,705,'Matina'),(70502,705,'Batán'),(70503,705,'Carrandí'),(70601,706,'Guácimo'),(70602,706,'Mercedes'),(70603,706,'Pocora'),(70604,706,'Río Jiménez'),(70605,706,'Duacarí');

UNLOCK TABLES;

/*Table structure for table `entradasalidaregistro` */

DROP TABLE IF EXISTS `entradasalidaregistro`;

CREATE TABLE `entradasalidaregistro` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `monto` varchar(9) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `hora` varchar(12) DEFAULT NULL,
  `Detalle` text,
  `unix` varchar(50) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `entradasalidaregistro` */

LOCK TABLES `entradasalidaregistro` WRITE;

UNLOCK TABLES;

/*Table structure for table `establecimiento` */

DROP TABLE IF EXISTS `establecimiento`;

CREATE TABLE `establecimiento` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) DEFAULT NULL,
  `telefono` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `establecimiento` */

LOCK TABLES `establecimiento` WRITE;

insert  into `establecimiento`(`id`,`nombre`,`telefono`) values (1,'Souvenir #1','26661234'),(2,'Souvenir #2','26661235'),(3,'Souvenir #3','26665432');

UNLOCK TABLES;

/*Table structure for table `factura` */

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `total` varchar(20) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `hora` varchar(25) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `cliente` varchar(30) DEFAULT '1',
  `tipo` tinyint(1) DEFAULT '1',
  `habilitado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `factura` */

LOCK TABLES `factura` WRITE;

insert  into `factura`(`id`,`total`,`fecha`,`hora`,`usuario`,`cliente`,`tipo`,`habilitado`) values (1,'0','31/08/2015','05:24:58 pm','1','',1,1),(2,'0','31/08/2015','05:33:39 pm','1','',0,1),(3,'0','31/08/2015','05:56:08 pm','1','1',0,1),(4,'8.8999996','31/08/2015','05:56:44 pm','1','',0,1),(5,'0','31/08/2015','06:20:43 pm','1','1',0,1),(6,'8.8999996','31/08/2015','06:29:43 pm','1','1',1,1),(7,'0','31/08/2015','06:54:28 pm','1','1',0,1),(8,'0','31/08/2015','07:42:23 pm','1','1',0,1),(9,'0','31/08/2015','07:42:58 pm','1','1',0,1),(10,'8','31/08/2015','08:17:20 pm','1','1',0,1),(11,'26','31/08/2015','08:17:48 pm','1','1',1,1),(12,'33','31/08/2015','08:18:30 pm','1','1',1,1),(13,'60','31/08/2015','08:47:15 pm','1','1',0,1),(14,'19','31/08/2015','09:11:09 pm','1','1',0,1),(15,'38','31/08/2015','11:00:11 pm','1','1',1,1),(16,'8','31/08/2015','11:01:22 pm','1','1',0,1),(17,'8','31/08/2015','11:01:45 pm','1','1',0,1),(18,'11','01/09/2015','01:18:15 pm','1','1',1,1),(19,'23','01/09/2015','01:19:19 pm','1','1',1,1),(20,'26,7','01/09/2015','01:20:20 pm','1','1',1,1),(21,'26.7','01/09/2015','01:23:42 pm','1','1',1,1),(22,'9,9','06/09/2015','08:30:50 pm','1','1',1,1),(23,'28,8','10/09/2015','09:10:29 pm','1','1',0,1),(24,'27,9','10/09/2015','10:31:44 pm','1','1',1,1),(25,'24,9','10/09/2015','10:33:18 pm','1','1',0,1),(26,'135,0','17-09-2015','10:38:59 am','1','1',0,1),(27,'79,5','17-09-2015','11:23:38 am','1','1',1,1),(28,'22,0','17-09-2015','11:39:18 am','1','1',1,1),(29,'39,9','17-09-2015','11:40:08 am','1','1',1,1),(30,'158,8','18-09-2015','08:51:44 pm','1','1',1,1),(31,'22,0','18-09-2015','09:41:28 pm','1','1',1,1),(32,'2,9','19-09-2015','06:43:59 pm','1','1',1,1),(33,'56,0','21-09-2015','09:48:46 pm','1','1',1,1),(34,'22,0','21-09-2015','09:49:13 pm','1','1',0,1),(35,'44,0','22-09-2015','09:30:03 am','1','1',1,1),(36,'22,0','26-09-2015','04:09:27 pm','1','1',0,1),(37,'22,0','26-09-2015','05:01:37 pm','1','1',0,1),(38,'22,0','26-09-2015','05:02:54 pm','1','1',1,1),(39,'22,0','26-09-2015','05:24:04 pm','1','1',1,1),(40,'43,9','26-09-2015','05:25:25 pm','1','1',0,1),(41,'27,9','29-09-2015','10:49:05 am','1','1',0,1),(42,'26,7','01-10-2015','06:34:42 pm','1','1',1,1),(43,'8,9','01-10-2015','07:20:19 pm','2','1',0,0),(44,'37,6','01-10-2015','10:29:07 pm','2','1',0,0),(45,'53,4','01-10-2015','10:38:08 pm','2','1',0,0),(46,'22,0','01-10-2015','10:42:55 pm','1','1',0,0),(47,'26,7','01-10-2015','10:56:04 pm','1','1',0,0),(48,'35,6','01-10-2015','10:59:53 pm','1','1',1,0),(49,'94,0','01-10-2015','11:06:41 pm','1','1',1,0),(50,'8,9','02-10-2015','10:36:42 am','1','1',1,0),(51,'8,9','02-10-2015','10:41:14 am','1','1',1,0);

UNLOCK TABLES;

/*Table structure for table `facturascanceladas` */

DROP TABLE IF EXISTS `facturascanceladas`;

CREATE TABLE `facturascanceladas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `nota` text,
  `fecha` varchar(15) DEFAULT NULL,
  `hora` varchar(15) DEFAULT NULL,
  `unix` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `facturascanceladas` */

LOCK TABLES `facturascanceladas` WRITE;

insert  into `facturascanceladas`(`id`,`id_factura`,`tipo`,`nota`,`fecha`,`hora`,`unix`) values (1,44,0,'',NULL,NULL,NULL),(2,45,0,'Error de facturación',NULL,NULL,NULL),(3,46,0,'',NULL,NULL,NULL),(4,49,0,'',NULL,NULL,NULL),(5,0,0,'{$Comentario}','{$fechaActual}','{$hora}','{$Unix}'),(6,51,0,'','02-10-2015','10:41:42 am','1443804102');

UNLOCK TABLES;

/*Table structure for table `iva` */

DROP TABLE IF EXISTS `iva`;

CREATE TABLE `iva` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre del impuesto de venta',
  `valor` int(4) DEFAULT NULL COMMENT 'Valor del impuesto de venta',
  `habilitado` tinyint(1) DEFAULT NULL COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `iva` */

LOCK TABLES `iva` WRITE;

insert  into `iva`(`id`,`nombre`,`valor`,`habilitado`) values (1,'Sin Impuesto de Venta',0,1),(2,'Impuesto de Venta',13,1),(3,'Impuesto de Servicio',10,1);

UNLOCK TABLES;

/*Table structure for table `kardex` */

DROP TABLE IF EXISTS `kardex`;

CREATE TABLE `kardex` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `producto` varchar(255) DEFAULT NULL,
  `entrada` int(11) DEFAULT '0',
  `salida` int(11) DEFAULT '0',
  `stock` int(11) DEFAULT NULL,
  `preciounitario` varchar(15) DEFAULT NULL,
  `preciototal` varchar(15) DEFAULT NULL,
  `detalle` varchar(50) DEFAULT 'Salida de Producto',
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `kardex` */

LOCK TABLES `kardex` WRITE;

insert  into `kardex`(`id`,`producto`,`entrada`,`salida`,`stock`,`preciounitario`,`preciototal`,`detalle`,`fecha`,`hora`) values (1,'66',100,0,105,'18.9','1890','Ingreso de Producto','',NULL),(2,'107',100,0,103,'6.9','690','Ingreso de Producto','',NULL),(3,'60',50,0,56,'14.9','745','Ingreso de Producto','',NULL),(4,'60',100,0,156,'14.9','1490','Ingreso de Producto','',NULL),(5,'66',1000,0,1105,'18.9','18900','Ingreso de Producto','',NULL),(21,'1',0,5,2,'8.9','44.5','Salida de Producto','18-09-2015',NULL),(22,'2',0,4,33,'9.9','39.6','Salida de Producto','18-09-2015',NULL),(23,'10',0,3,1,'24.9','74.7','Salida de Producto','18-09-2015',NULL),(24,'40',0,3,9,'0','0','Salida de Producto','18-09-2015',NULL),(25,'71',0,1,-10,'2.9','2.9','Salida de Producto','19-09-2015','06:43:55 pm'),(26,'19',0,1,4,'56','56','Salida de Producto','21-09-2015','09:48:42 pm'),(27,'7',0,1,3,'22','22','Salida de Producto','21-09-2015','09:49:07 pm'),(28,'7',0,2,1,'22','44','Salida de Producto','22-09-2015','09:29:34 am'),(29,'7',0,1,11,'22','22','Salida de Producto','26-09-2015','04:09:23 pm'),(30,'7',0,1,10,'22','22','Salida de Producto','26-09-2015','04:27:12 pm'),(31,'7',0,1,9,'22','22','Salida de Producto','26-09-2015','05:02:50 pm'),(32,'7',0,1,8,'22','22','Salida de Producto','26-09-2015','05:03:09 pm'),(33,'7',0,1,7,'22','22','Salida de Producto','26-09-2015','05:25:13 pm'),(34,'17',0,1,5,'21.9','21.9','Salida de Producto','26-09-2015','05:25:19 pm'),(35,'12',0,1,4,'27.9','27.9','Salida de Producto','28-09-2015','07:40:21 pm'),(36,'1',0,3,27,'8.9','26.7','Salida de Producto','01-10-2015','06:34:19 pm'),(37,'1',0,1,29,'8.9','8.9','Salida de Producto','01-10-2015','07:20:00 pm'),(38,'1',0,2,28,'8.9','17.8','Salida de Producto','01-10-2015','10:28:38 pm'),(39,'2',0,2,32,'9.9','19.8','Salida de Producto','01-10-2015','10:28:53 pm'),(40,'1',0,6,24,'8.9','53.4','Salida de Producto','01-10-2015','10:38:02 pm'),(41,'7',0,1,6,'22','22','Salida de Producto','01-10-2015','10:42:51 pm'),(42,'1',0,3,27,'8.9','26.7','Salida de Producto','01-10-2015','10:55:41 pm'),(43,'1',0,4,23,'8.9','35.6','Salida de Producto','01-10-2015','10:59:45 pm'),(44,'1',0,5,18,'8.9','44.5','Salida de Producto','01-10-2015','11:05:50 pm'),(45,'2',0,5,29,'9.9','49.5','Salida de Producto','01-10-2015','11:06:10 pm'),(46,'1',0,1,22,'8.9','8.9','Salida de Producto','02-10-2015','10:36:37 am'),(47,'1',0,1,22,'8.9','8.9','Salida de Producto','02-10-2015','10:41:09 am');

UNLOCK TABLES;

/*Table structure for table `medida` */

DROP TABLE IF EXISTS `medida`;

CREATE TABLE `medida` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `signo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `medida` */

LOCK TABLES `medida` WRITE;

insert  into `medida`(`id`,`nombre`,`signo`) values (1,'Unidad/Pza','U'),(2,'Litro','L'),(3,'Kilo','K');

UNLOCK TABLES;

/*Table structure for table `moneda` */

DROP TABLE IF EXISTS `moneda`;

CREATE TABLE `moneda` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `moneda` varchar(55) DEFAULT NULL,
  `signo` varchar(25) DEFAULT NULL,
  `valor` int(9) DEFAULT NULL,
  `rango` tinyint(1) DEFAULT '0',
  `habilitada` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `moneda` */

LOCK TABLES `moneda` WRITE;

insert  into `moneda`(`id`,`moneda`,`signo`,`valor`,`rango`,`habilitada`) values (1,'Colón','¢',528,2,1),(2,'Dolar','$',1,1,1);

UNLOCK TABLES;

/*Table structure for table `movimientostipo` */

DROP TABLE IF EXISTS `movimientostipo`;

CREATE TABLE `movimientostipo` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `movimientostipo` */

LOCK TABLES `movimientostipo` WRITE;

insert  into `movimientostipo`(`id`,`nombre`) values (1,'Apertura de Caja'),(2,'Cierre de Caja'),(3,'Entrada de Dinero'),(4,'Salida de Dinero'),(5,'Entrada de Dinero Caja Chica'),(6,'Salida de Dinero Caja Chica');

UNLOCK TABLES;

/*Table structure for table `notificaciones` */

DROP TABLE IF EXISTS `notificaciones`;

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notificacion` text,
  `fecha` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `notificaciones` */

LOCK TABLES `notificaciones` WRITE;

insert  into `notificaciones`(`id`,`notificacion`,`fecha`) values (1,'24','2015-09-17 11:04:53'),(2,'muevev','2015-09-17 11:06:22'),(3,'598','2015-09-17 11:32:11'),(4,'D','2015-10-01 16:50:26'),(5,'DA','2015-10-01 16:50:29'),(6,'DAD','2015-10-01 16:50:39');

UNLOCK TABLES;

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `perfil` varchar(50) DEFAULT NULL COMMENT 'Nombre del perfil de usuario',
  `comentario` text COMMENT 'aclaración o comentario explicativo del tipo de perfil',
  `habilitado` tinyint(1) DEFAULT '1' COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

LOCK TABLES `perfil` WRITE;

insert  into `perfil`(`id`,`perfil`,`comentario`,`habilitado`) values (1,'Administrador','',1),(2,'Vendedor','',1);

UNLOCK TABLES;

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `preciocosto` float DEFAULT NULL,
  `precioventa` float DEFAULT NULL,
  `proveedor` int(9) DEFAULT NULL,
  `departamento` int(6) DEFAULT NULL,
  `stock` int(9) DEFAULT NULL,
  `stockMin` int(9) DEFAULT NULL,
  `impuesto` int(3) DEFAULT '0',
  `medida` varchar(50) DEFAULT NULL,
  `especificaciones` text,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_producto` (`departamento`),
  KEY `FK_id_proveedor` (`proveedor`),
  CONSTRAINT `FK_id_categoria` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_proveedor` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

/*Data for the table `producto` */

LOCK TABLES `producto` WRITE;

insert  into `producto`(`id`,`codigo`,`nombre`,`preciocosto`,`precioventa`,`proveedor`,`departamento`,`stock`,`stockMin`,`impuesto`,`medida`,`especificaciones`,`habilitado`) values (1,'GN-100','Gorra NIC',8.9,8.9,1,1,23,10,1,'1','',1),(2,'GVC-101','Gorras Voda, Cari, Chi, Bra',9.9,9.9,1,1,34,10,1,'1','',1),(3,'GCH-102','Gorras Chino',11.9,11.9,1,1,45,10,1,'1','',1),(4,'GMLL-103','Gorras Malla (Brandis)',0,0,1,1,49,10,1,'1','',1),(5,'PFI-200','Portafoto Incrustado Cocobolo',27.9,27.9,1,2,3,0,1,'1','',1),(6,'CHCIM-210','Chorreadores De Café Incrustado',27.9,27.9,1,2,1,0,1,'1','',1),(7,'PLN-458','Pilones',22,22,1,2,7,0,1,'1','',1),(8,'CMIM-220','Cuadro Mariposa Marco Morecho',26.9,26.9,1,2,29,0,1,'1','',1),(9,'VIÑI-230','Vineras Incrustado',23.9,23.9,1,2,6,0,1,'1','',1),(10,'PSV-240','Posavasos Tipo Aislador',24.9,24.9,1,2,1,0,1,'1','',1),(11,'POSTR-01','Postreros Cocobolo',35,35,1,2,2,0,1,'1','',1),(12,'INGC-250','Indivdual Cocobalo Grande',27.9,27.9,1,2,4,0,1,'1','',1),(13,'POSTR-02','Postreros Cocobolo(2)',28,28,1,2,3,0,1,'1','',1),(14,'INGV-251','Individual Colores Grande',24.9,24.9,1,2,6,0,1,'1','',1),(15,'LPZ-245','Lapiceros',0,0,1,2,18,0,1,'1','',1),(16,'JRPP-260','Joyero Rompecabeza Pintado',15.9,15.9,1,2,4,0,1,'1','',1),(17,'JRGP-263','Joyero Rompecabeza Grande',21.9,21.9,1,2,5,0,1,'1','',1),(18,'VMIP-270','Vasos De Madera Incrustados, Pintados Grande',14.9,14.9,1,2,6,0,1,'1','',1),(19,'JRM3G-280','Joyero Rústico Mariposa Incrustado 3 Gavetas',56,56,1,2,4,0,1,'1','',1),(20,'JRM2G-281','Joyero Rústico Mariposa Incrustado 2 Gavetas',44,44,1,2,6,0,1,'1','',1),(21,'JRM1G-282','Joyero Rústico Mariposa Incrustado 1 Gavetas',42,42,1,2,3,0,1,'1','',1),(22,'JR2G-283','Joyero Rústico 2 Gavetas',18,18,1,3,4,0,1,'1','',1),(23,'JR1G-284','Joyero Rústico 1 Gaveta',12,12,1,3,3,0,1,'1','',1),(24,'RJC-595','Relojes Cuero',0,0,1,4,6,0,1,'1','',1),(25,'BCG-290','Bol Cocobolo Grande',31,31,1,2,12,0,1,'1','',1),(26,'CP-124','Carreta Pequeñas',0,0,1,7,30,0,1,'1','',1),(27,'CP-125','Carreta Grandes',16,16,1,7,25,0,1,'1','',1),(28,'BGGC-500','Bolsos Grandesg Con Cuero',45,45,1,5,1,0,1,'1','',1),(29,'BCEXG-501','Boligocha',73,73,1,2,15,0,1,'1','',1),(30,'CP-600','Cuadro Plumas',10,10,1,2,6,0,1,'1','',1),(31,'PFC-201','Portaretrato Cocobolo Testigofeo',25.9,25.9,1,2,6,0,1,'1','',1),(32,'HIPM-65','Himanes  Pintados Mauriao',4.9,4.9,1,2,21,0,1,'1','',1),(33,'PVCR-500','Posavaso Cocobolo Redondo',24,24,1,2,6,0,1,'1','',1),(34,'CFCF-500','Cofeemaker Cocobolo Fino',24.9,24.9,1,1,3,0,1,'1','',1),(35,'VICL-800','Vineras Cocobolo Lisas',13.9,13.9,1,2,6,0,1,'1','',1),(36,'JCE-45','Joyero Cocobolo Escultura',24.9,24.9,1,2,6,0,1,'1','',1),(37,'JCEM-35','Joyero Cocobolo Escultura Mediano',21.9,21.9,1,3,6,0,1,'1','',1),(38,'BPC-126','Bandera Para Carro',0,0,1,15,6,0,1,'1','',1),(39,'BSE-127','Banderas Sin Escudo ',0,0,1,15,12,0,1,'1','',1),(40,'FLCH-128','Flechas',7,0,1,2,9,0,1,'1','',1),(41,'BOLNñ-1','Bolso Peruano De Niña Mediano',10.9,10.9,1,5,6,0,1,'1','',1),(42,'BOLP-G','Bolso Perú Media Luna Grande',23.9,23.9,1,5,6,0,1,'1','',1),(43,'MOCH-P','Mochilas Perú',18.9,18.9,1,5,6,0,1,'1','',1),(44,'BOLSG-CR','Bolso Cuero Y Tela Guatemala',17.9,17.9,1,5,6,0,1,'1','',1),(45,'CANG-E ','Canguros Ecuador',13.9,13.9,1,2,6,0,1,'1','',1),(46,'MRC-129','Maracas',0,0,1,2,32,0,1,'1','',1),(47,'BPE-SE','Bolso Pasaportero Ecuador Senegre',10.9,10.9,1,2,7,0,1,'1','',1),(48,'BGG-05','Bolso Grande Ecuatoriano',17.9,17.9,1,5,3,0,1,'1','',1),(49,'BBG-130','Bolsos Big',0,0,1,5,4,0,1,'1','',1),(50,'BME-02','Bolso Mediano Ecuatoriano',15.9,15.9,1,5,5,0,1,'1','',1),(51,'BPE-03','Bolso Pequeño Ecuador',10.9,10.9,1,5,3,0,1,'1','',1),(52,'CTD-131','Camisetas Tayday',18,18,1,6,60,0,1,'1','',1),(53,'BME-04M','Bolsos Medianos Ecuador Mechitas',16.9,16.9,1,5,3,0,1,'1','',1),(54,'PAñ-800','Paños',0,0,1,2,12,0,1,'1','',1),(55,'BME-05M','Bolso Pequeño Ecuador Mechitas',13.9,13.9,1,5,3,0,1,'1','',1),(56,'BPG-07','Bolsos Pasaporteros Bordados Guatemala',9.9,9.9,1,5,8,0,1,'1','',1),(57,'BE-09','Bolsos De Niña Ecuador Mini',7.9,7.9,1,5,6,0,1,'1','',1),(58,'PASM-P','Pasamontaña Perú',12.9,12.9,1,1,3,0,1,'1','',1),(59,'BOLCRCH-005','Bolsos Chinos CR',12,12,1,5,12,0,1,'1','',1),(60,'BCP-010','Bolsos Cuero Puro',14.9,14.9,1,1,156,0,1,'1','',1),(61,'MUñ-07','Muñecas Guatemala',8.9,8.9,1,2,6,0,1,'1','',1),(62,'BPC-011','Bolso Puro Cuero',48.9,48.9,1,5,2,0,1,'1','',1),(63,'BOLCR-300','Bolsos Baratos Milos CR RR',12,12,1,5,5,0,1,'1','',1),(64,'BPC-012','Bolsos Puro Cuero Variados',34.9,34.9,1,5,7,0,1,'1','',1),(65,'PLG-01','Porta Lente Guatemala',7.9,7.9,1,2,6,0,1,'1','',1),(66,'ALF-700','Alforjas',18.9,18.9,1,2,1105,0,1,'1','',1),(67,'CATU-131','Camisetas Tulio',0,0,1,6,200,0,1,'1','',1),(68,'NAI-001','Norpe Bodegón',4,4,1,2,16,0,1,'1','',1),(69,'BAN-001','Bandera Grande',15.9,15.9,1,15,6,0,1,'1','',1),(70,'BOLBG-009','Bolsos Guatemala Bordados',18.9,18.9,1,5,5,0,1,'1','',1),(71,'STR-01','Stikers',2.9,2.9,1,2,12,0,1,'1','',1),(72,'BOLGC-009','Bolsos Guatemala Croche',23.9,23.9,1,5,6,0,1,'1','',1),(73,'BAN-001','Bandera Grande',15.9,15.9,1,15,6,0,1,'1','',1),(74,'LBM-02','Libro Medicinal',29,29,1,8,0,0,1,'1','',1),(75,'LBG-03','Libro Grande Guía De Aves',78,78,1,8,2,0,1,'1','',1),(76,'LBP1','Libro Pequeño Birds Of CR',26,26,1,8,1,0,1,'1','',1),(77,'MPCR001','Mapa Costa Rica Nacional',0,0,1,9,3,0,1,'1','',1),(78,'MPCR-002','Mapa CR Guía Turística',0,0,1,9,6,0,1,'1','',1),(79,'BOLI-009','Bolsos India',23.9,23.9,1,5,4,0,1,'1','',1),(80,'MPCR-003','Mapa Costa Rica Guía Carretera',0,0,1,9,6,0,1,'1','',1),(81,'MPGCR','Mapa Guanacaste',0,0,1,9,6,0,1,'1','',1),(82,'EICR-01','Enciclopedia Iinteractiva CR',0,0,1,8,11,0,1,'1','',1),(83,'BOLGM-009','Bolsos Guatemala Maletin',18.9,18.9,1,5,6,0,1,'1','',1),(84,'L-MMY','Libro Mamita Yunai',0,0,1,8,1,0,1,'1','',1),(85,'LGNIC','Libro Guía Nicaragua',0,0,1,5,4,0,1,'1','',1),(86,'MPSC-S','Mapas Escolares',0,0,1,8,20,0,1,'1','',1),(87,'BOLGT-009','Bolsos Guatemala',18.9,18.9,1,5,6,0,1,'1','',1),(88,'MPCR-005','Mapa Playas Cr',0,0,1,9,0,0,1,'1','',1),(89,'LN-01','Libro Animales Para Niños',0,0,1,8,3,0,1,'1','',1),(90,'LCT-01','Libro Comida A La Tica ',6.9,6.9,1,8,7,0,1,'1','',1),(91,'BOLPI-003','Bolso Indu Pequeño',12.9,12.9,1,5,6,0,1,'1','',1),(92,'LS-06','Libros Souvenir',7.9,7.9,1,8,5,0,1,'1','',1),(93,'LPCR-6','Libro Costa Rica Beaches',38.7,38.7,1,8,1,0,1,'1','',1),(94,'BCG-9','Bolsos Coco Grande',0,0,1,5,17,0,1,'1','',1),(95,'BCP-10','Bolsos Coco Pequeños',0,0,1,5,24,0,1,'1','',1),(96,'MCHG-10','Mochilas Cuero Guatemala',39.9,39.9,1,16,2,0,1,'1','',1),(97,'CS-01','Camisetas Sele',0,0,1,6,28,0,1,'1','',1),(98,'VBCR-05','Vestidos Bordados Cr',0,0,1,2,12,0,1,'1','',1),(99,'COLLM-01','Collaes Miluzca',5,5,1,12,23,0,1,'1','',1),(100,'CMC-20','Carros Madera Chi',0,0,1,2,4,0,1,'1','',1),(101,'BOLGCG-24','Bolsos Grandes De Cuero Guatemala',39.9,39.9,1,5,6,0,1,'1','',1),(102,'MCHG-001','Mochila Guatemala',19.9,19.9,1,16,3,0,1,'1','',1),(103,'AMAC-001','Amacas Nicaragua',9.9,9.9,1,17,9,0,1,'1','',1),(104,'CARM-01','Carretas Mini',3.9,3.9,1,7,12,0,1,'1','',1),(105,'VESI-001','Vestidos Italianos',27.9,27.9,1,18,24,0,1,'1','',1),(106,'OSPZ-804','Osos Perezosos',23.9,23.9,1,2,3,0,1,'1','',1),(107,'MUñECG-45','Muñecos G',6.9,6.9,1,2,103,0,1,'1','',1),(108,'SAP-153','Sapos',9.9,9.9,1,2,3,0,1,'1','',1),(109,'BOLGM-40','Bolsos Guatemala Muñecas',8.9,8.9,1,5,6,0,1,'1','',1),(110,'BOLPP-72','Bolso Perú Pasaporte',8.9,8.9,1,5,6,0,1,'1','',1),(111,'BOLñPP-12','Bolsito Niña Perú ',9.9,9.9,1,1,6,0,1,'1','',1);

UNLOCK TABLES;

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `telefono` varchar(35) DEFAULT NULL,
  `contacto` varchar(80) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `proveedor` */

LOCK TABLES `proveedor` WRITE;

insert  into `proveedor`(`id`,`nombre`,`telefono`,`contacto`,`direccion`,`habilitado`) values (1,'Genérico','012345678','Genérico','Genérico',1);

UNLOCK TABLES;

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `provincia` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `provincia` */

LOCK TABLES `provincia` WRITE;

insert  into `provincia`(`id`,`provincia`) values (1,'San José'),(2,'Alajuela'),(3,'Cartago'),(4,'Heredia'),(5,'Guanacaste'),(6,'Puntarenas'),(7,'Limón');

UNLOCK TABLES;

/*Table structure for table `sistema` */

DROP TABLE IF EXISTS `sistema`;

CREATE TABLE `sistema` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `logo` varchar(55) DEFAULT 'logo.jpg',
  `TipoCambio` tinyint(1) DEFAULT '1',
  `version` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sistema` */

LOCK TABLES `sistema` WRITE;

insert  into `sistema`(`id`,`logo`,`TipoCambio`,`version`) values (1,'applogo.png',1,'v1.0.5 Estable');

UNLOCK TABLES;

/*Table structure for table `tema` */

DROP TABLE IF EXISTS `tema`;

CREATE TABLE `tema` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tema` */

LOCK TABLES `tema` WRITE;

insert  into `tema`(`id`,`nombre`,`habilitado`) values (1,'Amelia',0),(2,'Cerulean',0),(3,'Cosmo',0),(4,'Cyborg',0),(5,'Darkly',0),(6,'Defecto',0),(7,'Flatly',0),(8,'Journal',0),(9,'Lumen',0),(10,'Paper',0),(11,'Readable',0),(12,'Sandstone',0),(13,'Simplex',0),(14,'Slate',0),(15,'Spacelab',0),(16,'Superhero',0),(17,'United',1),(18,'Yeti',0);

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `usuario` varchar(50) DEFAULT NULL COMMENT 'Nombre del pseudonimo del usuario del sistema',
  `contrasena` varchar(40) DEFAULT NULL COMMENT 'Contraseña de acceso al sistema',
  `id_vendedor` int(9) DEFAULT NULL COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Foránea-Tabla Perfil)(1:1)',
  `id_perfil` int(1) DEFAULT '2',
  `habilitado` tinyint(1) DEFAULT '1' COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`),
  KEY `FK_usuario` (`id_vendedor`),
  KEY `FK_perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`id`,`usuario`,`contrasena`,`id_vendedor`,`id_perfil`,`habilitado`) values (1,'luis','d010964bc1e399c397623c43aacf3564d172905b',1,1,1),(2,'yancy','217eb2efd79758ca2ea42bbced445b0939d46618',2,2,1);

UNLOCK TABLES;

/*Table structure for table `vendedores` */

DROP TABLE IF EXISTS `vendedores`;

CREATE TABLE `vendedores` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Primaria)',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre real de la persona que va a utilizar el sistema',
  `apellido1` varchar(50) DEFAULT NULL COMMENT 'Primer apellido de la persona que va a utilizar el sistema',
  `apellido2` varchar(50) DEFAULT NULL COMMENT 'Segundo apellido de la persona que va a utilizar el sistema',
  `establecimiento` varchar(80) DEFAULT NULL COMMENT 'Nombre del Establecimiento',
  `nota` text COMMENT 'Dirección de la residencia de la persona',
  `provincia` int(15) DEFAULT NULL,
  `canton` int(10) DEFAULT NULL,
  `distrito` int(10) DEFAULT NULL,
  `id_usuario` int(9) DEFAULT NULL COMMENT 'Identificador numérico para cada uno de los registros de la tabla.(Llave Foránea-Tabla Usuario(1:1). Relaciona un usuario específico con un empleado en una relación uno a uno.',
  `habilitado` tinyint(1) DEFAULT '1' COMMENT 'Determina si el registro es válido para utilizarse o se debe ignorar para operaciones sobre los datos.',
  PRIMARY KEY (`id`),
  KEY `FK_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `vendedores` */

LOCK TABLES `vendedores` WRITE;

insert  into `vendedores`(`id`,`nombre`,`apellido1`,`apellido2`,`establecimiento`,`nota`,`provincia`,`canton`,`distrito`,`id_usuario`,`habilitado`) values (1,'Luis','Cortés','Juárez','Qualtiva WebApp','600 metros este y 75 norte del Liceo Nocturno de Liberia',5,501,50101,1,1),(2,'Yancy',' Jimenez','Herra','Souvenir #1','',2,213,21304,2,1);

UNLOCK TABLES;

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `idfactura` int(25) DEFAULT NULL,
  `producto` int(2) DEFAULT NULL,
  `cantidad` int(5) DEFAULT '1',
  `precio` float DEFAULT NULL,
  `totalprecio` float DEFAULT NULL,
  `vendedor` int(9) DEFAULT NULL,
  `cliente` int(9) DEFAULT '1',
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `habilitada` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

/*Data for the table `ventas` */

LOCK TABLES `ventas` WRITE;

insert  into `ventas`(`id`,`idfactura`,`producto`,`cantidad`,`precio`,`totalprecio`,`vendedor`,`cliente`,`fecha`,`hora`,`tipo`,`habilitada`) values (1,1,1,4,8.9,35.6,1,1,'31/08/2015',NULL,NULL,1),(2,2,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(3,3,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(4,4,1,1,8.9,8.9,1,3,'31/08/2015',NULL,NULL,1),(5,5,1,4,8.9,35.6,1,1,'31/08/2015',NULL,NULL,1),(6,7,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(7,8,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(8,8,2,3,9.9,29.7,1,1,'31/08/2015',NULL,NULL,1),(9,8,3,2,11.9,23.8,1,1,'31/08/2015',NULL,NULL,1),(10,8,3,1,11.9,11.9,1,1,'31/08/2015',NULL,NULL,1),(11,8,2,1,9.9,9.9,1,1,'31/08/2015',NULL,NULL,1),(14,9,1,2,8.9,17.8,1,1,'31/08/2015',NULL,NULL,1),(15,10,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(16,11,1,3,8.9,26.7,1,1,'31/08/2015',NULL,NULL,1),(17,12,3,2,11.9,23.8,1,1,'31/08/2015',NULL,NULL,1),(18,12,2,1,9.9,9.9,1,1,'31/08/2015',NULL,NULL,1),(20,13,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(21,13,3,1,11.9,11.9,1,1,'31/08/2015',NULL,NULL,1),(22,13,2,4,9.9,39.6,1,1,'31/08/2015',NULL,NULL,1),(23,14,2,1,9.9,9.9,1,1,'31/08/2015',NULL,NULL,1),(24,14,2,1,9.9,9.9,1,1,'31/08/2015',NULL,NULL,1),(26,15,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(27,15,2,3,9.9,29.7,1,1,'31/08/2015',NULL,NULL,1),(29,16,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(30,17,1,1,8.9,8.9,1,1,'31/08/2015',NULL,NULL,1),(31,18,3,1,11.9,11.9,1,1,'01/09/2015',NULL,NULL,1),(32,19,3,2,11.9,23.8,1,1,'01/09/2015',NULL,NULL,1),(33,20,1,3,8.9,26.7,1,1,'01/09/2015',NULL,NULL,1),(34,21,1,3,8.9,26.7,1,1,'01/09/2015',NULL,NULL,1),(35,22,2,1,9.9,9.9,1,1,'06/09/2015',NULL,NULL,1),(36,22,4,1,0,0,1,1,'06/09/2015',NULL,NULL,1),(37,23,66,1,18.9,18.9,1,1,'10/09/2015',NULL,NULL,1),(38,23,2,1,9.9,9.9,1,1,'10/09/2015',NULL,NULL,1),(40,24,12,1,27.9,27.9,1,1,'10/09/2015',NULL,NULL,1),(41,25,34,1,24.9,24.9,1,1,'10/09/2015',NULL,NULL,1),(42,26,1,6,8.9,53.4,1,1,'17-09-2015',NULL,NULL,1),(43,26,16,2,15.9,31.8,1,1,'17-09-2015',NULL,NULL,1),(44,26,34,2,24.9,49.8,1,1,'17-09-2015',NULL,NULL,1),(45,27,10,2,24.9,49.8,1,1,'17-09-2015',NULL,NULL,1),(46,27,1,2,8.9,17.8,1,1,'17-09-2015',NULL,NULL,1),(47,27,3,1,11.9,11.9,1,1,'17-09-2015',NULL,NULL,1),(48,28,7,1,22,22,1,1,'17-09-2015',NULL,NULL,1),(49,29,96,1,39.9,39.9,1,1,'17-09-2015',NULL,NULL,1),(50,30,1,5,8.9,44.5,1,1,'18-09-2015',NULL,NULL,1),(51,30,2,4,9.9,39.6,1,1,'18-09-2015',NULL,NULL,1),(52,30,10,3,24.9,74.7,1,1,'18-09-2015',NULL,NULL,1),(53,30,40,3,0,0,1,1,'18-09-2015',NULL,NULL,1),(57,31,7,1,22,22,1,1,'18-09-2015','09:41:11 pm',NULL,1),(58,32,71,1,2.9,2.9,1,1,'19-09-2015','06:43:55 pm',NULL,1),(59,33,19,1,56,56,1,1,'21-09-2015','09:48:42 pm',NULL,1),(60,34,7,1,22,22,1,1,'21-09-2015','09:49:07 pm',NULL,1),(61,35,7,2,22,44,1,1,'22-09-2015','09:29:34 am',NULL,1),(62,36,7,1,22,22,1,1,'26-09-2015','04:09:23 pm',NULL,1),(63,37,7,1,22,22,1,1,'26-09-2015','04:27:12 pm',NULL,1),(64,38,7,1,22,22,1,1,'26-09-2015','05:02:50 pm',NULL,1),(65,39,7,1,22,22,1,1,'26-09-2015','05:03:09 pm',NULL,1),(66,40,7,1,22,22,1,1,'26-09-2015','05:25:13 pm',NULL,1),(67,40,17,1,21.9,21.9,1,1,'26-09-2015','05:25:19 pm',NULL,1),(68,41,12,1,27.9,27.9,1,1,'28-09-2015','07:40:21 pm',NULL,1),(69,42,1,3,8.9,26.7,1,1,'01-10-2015','06:34:19 pm',NULL,1),(70,43,1,1,8.9,8.9,2,1,'01-10-2015','07:20:00 pm',NULL,0),(71,44,1,2,8.9,17.8,2,1,'01-10-2015','10:28:38 pm',NULL,0),(72,44,2,2,9.9,19.8,2,1,'01-10-2015','10:28:53 pm',NULL,0),(74,45,1,6,8.9,53.4,2,1,'01-10-2015','10:38:02 pm',NULL,0),(75,46,7,1,22,22,1,1,'01-10-2015','10:42:51 pm',NULL,0),(76,47,1,3,8.9,26.7,1,1,'01-10-2015','10:55:41 pm',NULL,0),(77,48,1,4,8.9,35.6,1,1,'01-10-2015','10:59:45 pm',NULL,0),(78,49,1,5,8.9,44.5,1,1,'01-10-2015','11:05:50 pm',NULL,0),(79,49,2,5,9.9,49.5,1,1,'01-10-2015','11:06:10 pm',NULL,0),(80,50,1,1,8.9,8.9,1,1,'02-10-2015','10:36:37 am',NULL,0),(81,51,1,1,8.9,8.9,1,1,'02-10-2015','10:41:09 am',NULL,0);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
