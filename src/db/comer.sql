-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` tinyint(4) DEFAULT NULL,
  `categoria` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Vino'),(2,'Licor'),(3,'Bebida'),(4,'Espumante'),(5,'Cerveza'),(6,'Destilado');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` tinyint(4) DEFAULT NULL,
  `nombre_e` varchar(6) DEFAULT NULL,
  `primer_apellido_e` varchar(7) DEFAULT NULL,
  `segundo_apellido_e` varchar(7) DEFAULT NULL,
  `contrasenia_e` varchar(12) DEFAULT NULL,
  `rut` int(11) DEFAULT NULL,
  `fecha_nacimiento_e` varchar(8) DEFAULT NULL,
  `correo_e` varchar(16) DEFAULT NULL,
  `numero_de_telefono_e` int(11) DEFAULT NULL,
  `registro_de_cambio` varchar(0) DEFAULT NULL,
  `id_perfil` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Alan','Wick','Salas','Alan123456',123456789,'05-03-98','Alan@gmail.com',912345678,'',2),(2,'Bob','Vincent','Gough','Bob123456',234567891,'12-06-94','Bob@gmail.com',923456781,'',2),(3,'Carlos','Mckay','Carlson','Carlos123456',145638912,'08-04-01','Carlos@gmail.com',934567781,'',2),(4,'Jhon','Comerc','Sanchez','jhon123456',120912347,'11-08-70','Comerc@gmail.com',940590993,'',1);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` tinyint(4) DEFAULT NULL,
  `perfil` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador'),(2,'Empleado');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` tinyint(4) DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `tipo_producto` varchar(22) DEFAULT NULL,
  `id_productor` tinyint(4) DEFAULT NULL,
  `fecha_exp` varchar(8) DEFAULT NULL,
  `stock` tinyint(4) DEFAULT NULL,
  `precio` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'Carmen Gran reserva','carmenere 750',1,'01-01-30',60,5990),(2,1,'120 reserva especial','sauvignon blanc 750',1,'01-01-30',70,3990),(3,1,'Casa real','cabernet sauvignon 750',1,'01-01-30',50,10990),(4,6,'Jhonnie Walker','black label 750',4,'01-01-30',65,23990),(5,6,'Alto del Carmen','roble del sur 750',5,'01-01-30',76,10990),(6,2,'Capel','chirimoya colada 700',6,'01-01-30',80,3990),(7,3,'cocacola','light 2.5',3,'01-01-30',60,1650),(8,3,'sprite','sin azucar 2.5',3,'01-01-30',58,1250),(9,3,'fanta','original',3,'01-01-30',68,1500);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productor`
--

DROP TABLE IF EXISTS `productor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productor` (
  `id` tinyint(4) DEFAULT NULL,
  `productor` varchar(15) DEFAULT NULL,
  `nacionalidad` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productor`
--

LOCK TABLES `productor` WRITE;
/*!40000 ALTER TABLE `productor` DISABLE KEYS */;
INSERT INTO `productor` VALUES (1,'bodega.co','Chilena'),(2,'Moe\'s','Inglesa'),(3,'Cocacola.co','E.E.U.U.'),(4,'Jhonnie Walker','E.E.U.U.'),(5,'Alto del Carmen','Chilena'),(6,'Pisco Capel','Chilena');
/*!40000 ALTER TABLE `productor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sqlite_sequence`
--

DROP TABLE IF EXISTS `sqlite_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sqlite_sequence` (
  `name` varchar(9) DEFAULT NULL,
  `seq` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sqlite_sequence`
--

LOCK TABLES `sqlite_sequence` WRITE;
/*!40000 ALTER TABLE `sqlite_sequence` DISABLE KEYS */;
INSERT INTO `sqlite_sequence` VALUES ('perfil',3),('categoria',6),('productor',6),('empleados',4),('producto',9);
/*!40000 ALTER TABLE `sqlite_sequence` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-22 15:20:26
