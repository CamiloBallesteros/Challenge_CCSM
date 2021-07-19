CREATE DATABASE  IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `test`;
-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asistente`
--

DROP TABLE IF EXISTS `asistente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistente` (
  `cedula` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistente`
--

LOCK TABLES `asistente` WRITE;
/*!40000 ALTER TABLE `asistente` DISABLE KEYS */;
INSERT INTO `asistente` VALUES (59,'qfqf','camiloby719137@gmail.com'),(77,'ff','s@a.com'),(87,'zzz','ssss@aaaa.com'),(111,'asda','cccc@ccc.com'),(123,'asd','s@a.com'),(9988,'asd','camiloby719137@gmail.com'),(11111,'nombre','A@A.com'),(123131,'abc','camiloby719137@gmail.com'),(123456,'sss123213','a@xddd.com'),(22254125,'nuevo','nuevo@cc.com'),(159159159,'ccc','camilo@ccsm.com'),(1083029447,'Camilo','camiloby719137@gmail.com');
/*!40000 ALTER TABLE `asistente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistentes_del_evento`
--

DROP TABLE IF EXISTS `asistentes_del_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistentes_del_evento` (
  `evento_id` int NOT NULL,
  `asistente_cedula` int NOT NULL,
  `hora_llegada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`evento_id`,`asistente_cedula`),
  KEY `fk_evento_has_asistente_asistente1_idx` (`asistente_cedula`),
  KEY `fk_evento_has_asistente_evento_idx` (`evento_id`),
  CONSTRAINT `fk_evento_has_asistente_asistente1` FOREIGN KEY (`asistente_cedula`) REFERENCES `asistente` (`cedula`),
  CONSTRAINT `fk_evento_has_asistente_evento` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistentes_del_evento`
--

LOCK TABLES `asistentes_del_evento` WRITE;
/*!40000 ALTER TABLE `asistentes_del_evento` DISABLE KEYS */;
INSERT INTO `asistentes_del_evento` VALUES (123,59,'2021-07-19 11:08:52'),(123,77,'2021-07-19 10:24:06'),(123,123,'2021-07-19 10:35:22'),(123,123456,'2021-07-19 10:34:51'),(789,111,'2021-07-19 20:35:52'),(789,9988,'2021-07-19 11:15:38'),(789,123131,'2021-07-19 11:34:16'),(789,22254125,'2021-07-19 20:36:10');
/*!40000 ALTER TABLE `asistentes_del_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL,
  `capacidad_max` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (123,'Evento1','2021-07-19 07:00:00','2021-07-19 17:00:00',50),(789,'Evento2','2021-07-19 11:00:00','2021-07-19 21:00:00',75),(15959159,'test','2021-07-19 05:00:00','2021-07-20 05:00:00',104);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-19 15:37:55
