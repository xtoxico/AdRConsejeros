-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db616940201
-- ------------------------------------------------------
-- Server version	5.6.25-0ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adr_circulares`
--

DROP TABLE IF EXISTS `adr_circulares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_circulares` (
  `id_circular` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `ruta` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `texto` varchar(9000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_circular`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_circulares`
--

LOCK TABLES `adr_circulares` WRITE;
/*!40000 ALTER TABLE `adr_circulares` DISABLE KEYS */;
INSERT INTO `adr_circulares` VALUES (1,'Circular de presentación','2016-03-10 00:00:00',NULL,'Placa-etiquetas y Paneles Naranjas para los vehículos que transporten transporte de equipos radiactivos de medida de densidad y humedad de suelo, Clase 7. <br> Los Transportes de Mercancías Peligrosas que, por sus características no puedan acogerse a alguna de las exenciones indicadas en el ADR, deben ser señalizados con los correspondientes Paneles Naranjas y las Placas-etiquetas, se ajustaran a lo indicado en el Capítulo 5.3 del ADR. En general:   Etiquetado “Placas-etiqueta”  Una placa etiqueta deberá ser diseñada como indica la figura: <br> La placa-etiqueta deberá tener la forma de un cuadrado colocado sobre un vértice.  Las dimensiones mínimas deberán ser de 250 mm x 250 mm. El símbolo y la línea trazada en el interior de la placa-etiqueta deberán ser del mismo color que la etiqueta de la clase de la mercancía peligrosa en cuestión, igualmente el símbolo/cifra correspondiente deberán ser colocados y proporcionados al igual que en la etiqueta de la misma clase.  La placa-etiqueta llevará el número de la clase de la materia peligrosa y la altura de los caracteres no debe ser inferior a 25 mm.  Cuando las dimensiones no estén especificadas, todos los elementos deben respetar aproximadamente las proporciones representadas. <br> Específicamente para la clase 7, la placa-etiqueta deberá tener 250 mm por 250 mm como mínimo con una línea de reborde negra retirada 5 mm y paralela al lado. La cifra \"7\" tendrá una altura mínima de 25 mm. El fondo de la mitad superior de la placa-etiqueta será amarillo y el de la mitad inferior blanco; el trébol y el texto serán negros. El empleo de la palabra \"RADIOACTIVE\" en la mitad inferior es facultativo, de manera que este espacio puede utilizarse para poner el número ONU relativo al envío.  Placa-etiqueta para materias radiactivas de la clase 7 <br> Signo convencional (trébol): negro; fondo: mitad superior amarilla, con reborde blanco, mitad inferior blanca; la palabra RADIOACTIVE o, en su lugar, el número ONU adecuado deberá figurar en la mitad inferior; cifra \"7\" en la esquina inferior.  Para la clase 7, si el tamaño y la construcción del vehículo son tales que la superficie disponible es insuficiente para fijar las placas-etiquetas, sus dimensiones pueden ser reducidas a 100 mm de lado. Ojo realmente no debe haber espacio. <br>');
/*!40000 ALTER TABLE `adr_circulares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adr_enlaces`
--

DROP TABLE IF EXISTS `adr_enlaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_enlaces` (
  `id_enlace` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `ruta` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_enlace`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_enlaces`
--

LOCK TABLES `adr_enlaces` WRITE;
/*!40000 ALTER TABLE `adr_enlaces` DISABLE KEYS */;
INSERT INTO `adr_enlaces` VALUES (1,'Google','www.google.es');
/*!40000 ALTER TABLE `adr_enlaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adr_formacion`
--

DROP TABLE IF EXISTS `adr_formacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_formacion` (
  `id_formacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `ruta` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_formacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_formacion`
--

LOCK TABLES `adr_formacion` WRITE;
/*!40000 ALTER TABLE `adr_formacion` DISABLE KEYS */;
INSERT INTO `adr_formacion` VALUES (1,'ESS Clase 3 Líquidos Inflamables','000 Portada EESS.pdf'),(2,'Nitrato Amónico','000 Portada Nitratos.pdf'),(3,'Productos Químicos','000 Portada Productos.pdf');
/*!40000 ALTER TABLE `adr_formacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adr_restricciones`
--

DROP TABLE IF EXISTS `adr_restricciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_restricciones` (
  `id_restriccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `ruta` varchar(245) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_restriccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_restricciones`
--

LOCK TABLES `adr_restricciones` WRITE;
/*!40000 ALTER TABLE `adr_restricciones` DISABLE KEYS */;
INSERT INTO `adr_restricciones` VALUES (1,'004 Restricciones 2016','004 Restricciones 2016.pdf'),(2,'006 Restricciones Febrero 2016','006 Restricciones Febrero 2016.pdf'),(3,'008 Restricciones Marzo 2016','008 Restricciones Marzo 2016.pdf');
/*!40000 ALTER TABLE `adr_restricciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adr_seguridad`
--

DROP TABLE IF EXISTS `adr_seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_seguridad` (
  `id_seguridad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `ruta` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_seguridad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_seguridad`
--

LOCK TABLES `adr_seguridad` WRITE;
/*!40000 ALTER TABLE `adr_seguridad` DISABLE KEYS */;
INSERT INTO `adr_seguridad` VALUES (1,'Kit almacen','Kit almacen.pdf'),(2,'Presentación Kit Vehículo','Presentación Kit Vehículo.pdf'),(3,'señales almacen fitos','señales almacen fitos.pdf');
/*!40000 ALTER TABLE `adr_seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adr_usuarios`
--

DROP TABLE IF EXISTS `adr_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `nombre` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `pass` blob,
  `hash` blob,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_usuarios`
--

LOCK TABLES `adr_usuarios` WRITE;
/*!40000 ALTER TABLE `adr_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `adr_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db616940201'
--

--
-- Dumping routines for database 'db616940201'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-11 10:32:36
