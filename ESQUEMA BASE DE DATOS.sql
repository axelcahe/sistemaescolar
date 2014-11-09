/*
SQLyog Ultimate v8.82 
MySQL - 5.5.27 : Database - dbproyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbproyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbproyecto`;

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id_grupo` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL,
  `Orden` varchar(250) DEFAULT NULL,
  `Estatus` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

insert  into `grupo`(`id_grupo`,`Nombre`,`Avatar`,`Orden`,`Estatus`) values (1,'TIC-71',NULL,NULL,'1'),(2,'TIC-72',NULL,NULL,'1'),(3,'TIC-73',NULL,NULL,'1');

/*Table structure for table `grupo_alumno` */

DROP TABLE IF EXISTS `grupo_alumno`;

CREATE TABLE `grupo_alumno` (
  `id_grupo_alumno` int(6) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(6) DEFAULT NULL,
  `id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_grupo_alumno`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id` (`id`),
  CONSTRAINT `grupo_alumno_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`),
  CONSTRAINT `grupo_alumno_ibfk_2` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `grupo_alumno_ibfk_3` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `grupo_alumno` */

insert  into `grupo_alumno`(`id_grupo_alumno`,`id_grupo`,`id`) values (21,2,7),(25,1,6),(27,1,9);

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `id_maestro_materia` int(6) NOT NULL AUTO_INCREMENT,
  `id` int(6) DEFAULT NULL,
  `id_materia` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_maestro_materia`),
  KEY `id` (`id`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `maestro_materia_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `maestro_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

insert  into `maestro_materia`(`id_maestro_materia`,`id`,`id_materia`) values (1,1,1),(2,1,2),(6,1,3),(7,1,6),(8,1,4),(9,2,6),(12,4,6),(13,2,5),(15,2,4);

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id_materia` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL,
  `Orden` varchar(250) DEFAULT NULL,
  `Estatus` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

insert  into `materia`(`id_materia`,`Nombre`,`Avatar`,`Orden`,`Estatus`) values (1,'Matemáticas',NULL,NULL,'1'),(2,'Programación',NULL,NULL,'1'),(3,'Español',NULL,NULL,'1'),(4,'Ingeniería Económica',NULL,NULL,'1'),(5,'Optativa',NULL,NULL,'1'),(6,'Administración del Tiempo',NULL,NULL,'1');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) DEFAULT NULL,
  `ApellidoPaterno` varchar(250) DEFAULT NULL,
  `ApellidoMaterno` varchar(250) DEFAULT NULL,
  `Telefono` varchar(250) DEFAULT NULL,
  `Calle` varchar(250) DEFAULT NULL,
  `NumeroExterior` int(5) DEFAULT NULL,
  `NumeroInterior` int(5) DEFAULT NULL,
  `Colonia` varchar(250) DEFAULT NULL,
  `Municipio` varchar(250) DEFAULT NULL,
  `Estado` varchar(250) DEFAULT NULL,
  `CP` int(6) DEFAULT NULL,
  `Correo` varchar(250) DEFAULT NULL,
  `Contrasena` varchar(250) DEFAULT NULL,
  `Nivel` varchar(250) DEFAULT NULL,
  `Estatus` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`Contrasena`,`Nivel`,`Estatus`) values (1,'Axel','Campa','Hernández','7192861514','Francisco Sarabia',113,0,'Centro','Xonacatlán','México',52060,'axelch@hotmail.com','123','2','1'),(2,'José Luis','Acosta','Martínez','7192861514','Cualquier calle',0,0,'Centro','Lerma','México',0,'pepe_guicacho@hotmail.com','123','2','1'),(4,'Eduardo','Pacheco','Huerta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','2','1'),(5,'Miguel Rodrigo','Pérez','Flores',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','3','1'),(6,'Froylan ','Rosales','Romero',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1'),(7,'Alexis','Solís','Sánchez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','3','1'),(8,'Daniel','García','López',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1'),(9,'Julio','Chávez','Arreola',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1'),(10,'Isaí','Castañeda','Morales',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1'),(11,'Luis','Melendez','Salazar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1'),(12,'Administrador',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','1','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
