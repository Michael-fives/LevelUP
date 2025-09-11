/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.7.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	11.7.2-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `tb_affected` varchar(20) NOT NULL,
  `sentence_sql` varchar(700) NOT NULL,
  `counter_sentence` varchar(700) NOT NULL,
  `time_` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES
(1,'F1VEScs','Usuarios','UPDATE usuarios SET username = \"HolaBuenas3.1\", mail = \"holabuenas3@gmail.com\", phone = \"33 2537 0547\", level_ = 1, admin_ = 0 WHERE id = 7','UPDATE usuarios SET username = \"HolaBuenas3\", mail = \"holabuenas3@gmail.com\", phone = \"33 2537 0547\", level_ = 1, admin_ = 0 WHERE id = 7','2025-05-13 19:26:17'),
(2,'F1VEScs','Videojuegos','INSERT INTO videojuegos VALUES (13, \"Halo Reach\", \"Shooter 1era persona\", 9.99, \"[DESCRIPCIÓN NUEVA]\", 4.45, \"HReach.jpg\", \"2010-09-14\")','DELETE FROM videojuegos WHERE id = 13','2025-05-13 19:35:32'),
(3,'HolaBuenas','Videojuegos','UPDATE videojuegos SET title = \"Halo Reach\", genre = \"Shooter 1era persona\", price = 9.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.47, img = \"HReach.jpg\", release_date = \"2010-09-14\" WHERE id = 13','UPDATE videojuegos SET title = \"Halo Reach\", genre = \"Shooter 1era persona\", price = 9.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.45, img = \"HReach.jpg\", release_date = \"2010-09-14\" WHERE id = 13','2025-05-13 19:37:13'),
(4,'F1VEScs','Videojuegos','INSERT INTO videojuegos VALUES (14, \"The Last Of Us Part II\", \"Horror Shooter\", 49.99, \"[DESCRIPCIÓN NUEVA]\", 4.81, \"TLOU2.png\", \"2020-06-19\")','DELETE FROM videojuegos WHERE id = 14','2025-05-13 23:49:55'),
(5,'F1VEScs','Videojuegos','INSERT INTO videojuegos VALUES (15, \"F.E.A.R 2\", \"Horror Shooter\", 7.99, \"[DESCRIPCIÓN NUEVA]\", 4.05, \"FEAR2.png\", \"2009-02-13\")','DELETE FROM videojuegos WHERE id = 15','2025-05-14 00:00:49'),
(6,'F1VEScs','Videojuegos','UPDATE videojuegos SET title = \"Hollow Knight\", genre = \"Metroidvania\", price = 14.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.12, img = \"HK.png\", release_date = \"2017-02-24\" WHERE id = 2','UPDATE videojuegos SET title = \"Hollow Knight\", genre = \"Metroidvania\", price = 14.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.12, img = \"HK_img.png\", release_date = \"2017-02-24\" WHERE id = 2','2025-05-14 00:06:19'),
(7,'F1VEScs','Videojuegos','UPDATE videojuegos SET title = \"God of War: Ragnarok\", genre = \"Soulslike aventura\", price = 69.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.83, img = \"GOWR.png\", release_date = \"2022-11-09\" WHERE id = 3','UPDATE videojuegos SET title = \"God of War: Ragnarok\", genre = \"Soulslike aventura\", price = 69.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.83, img = \"GOWR_img.png\", release_date = \"2022-11-09\" WHERE id = 3','2025-05-14 00:06:28'),
(8,'F1VEScs','Videojuegos','UPDATE videojuegos SET title = \"The Last Of Us\", genre = \"Horror Shooter\", price = 19.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.89, img = \"TLOU.png\", release_date = \"2013-06-14\" WHERE id = 5','UPDATE videojuegos SET title = \"The Last Of Us\", genre = \"Horror Shooter\", price = 19.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.89, img = \"TLOU_img.jpg\", release_date = \"2013-06-14\" WHERE id = 5','2025-05-14 00:06:39'),
(9,'F1VEScs','Videojuegos','UPDATE videojuegos SET title = \"The Last of Us\", genre = \"Horror Shooter\", price = 19.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.89, img = \"TLOU.png\", release_date = \"2013-06-14\" WHERE id = 5','UPDATE videojuegos SET title = \"The Last Of Us\", genre = \"Horror Shooter\", price = 19.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.89, img = \"TLOU.png\", release_date = \"2013-06-14\" WHERE id = 5','2025-05-14 00:14:06'),
(10,'F1VEScs','Videojuegos','UPDATE videojuegos SET title = \"The Last of Us Part II\", genre = \"Horror Shooter\", price = 49.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.81, img = \"TLOU2.png\", release_date = \"2020-06-19\" WHERE id = 14','UPDATE videojuegos SET title = \"The Last Of Us Part II\", genre = \"Horror Shooter\", price = 49.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.81, img = \"TLOU2.png\", release_date = \"2020-06-19\" WHERE id = 14','2025-05-14 00:14:16'),
(11,'HolaBuenas','Videojuegos','UPDATE videojuegos SET title = \"The Last of Us Part II\", genre = \"Horror Shooter\", price = 49.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.84, img = \"TLOU2.png\", release_date = \"2020-06-19\" WHERE id = 14','UPDATE videojuegos SET title = \"The Last of Us Part II\", genre = \"Horror Shooter\", price = 49.99, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 4.81, img = \"TLOU2.png\", release_date = \"2020-06-19\" WHERE id = 14','2025-05-14 10:34:58'),
(12,'Registro','Usuarios','INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (\"oliver\", \"[CONTRASEÑA CENSURADA]\", \"oliver@gmail.com\", \"33 2537 0678\", FALSE, NULL, \"2025-05-14 12:33:06\", 1, \"00:00:00\")','DELETE FROM usuarios WHERE username = \"oliver\"','2025-05-14 12:33:06'),
(13,'root','Usuarios','UPDATE usuarios SET username = \"jafet\", mail = \"oliver@gmail.com\", phone = \"33 2537 0678\", level_ = 1, admin_ = 0 WHERE id = 9','UPDATE usuarios SET username = \"oliver\", mail = \"oliver@gmail.com\", phone = \"33 2537 0678\", level_ = 1, admin_ = 0 WHERE id = 9','2025-05-14 12:38:13'),
(14,'F1VEScs','Usuarios','UPDATE usuarios SET username = \"F1VEScs\", mail = \"mikegilpin132@gmail.com\", phone = \"33 2537 0541\", level_ = 555, admin_ = 1 WHERE id = 5','UPDATE usuarios SET username = \"F1VEScs\", mail = \"mikegilpin@gmail.com\", phone = \"33 2537 0541\", level_ = 555, admin_ = 1 WHERE id = 5','2025-06-15 00:54:13'),
(15,'F1VEScs','Usuarios','UPDATE usuarios SET username = \"jafet\", mail = \"oliver@gmail.com\", phone = \"33 2537 0679\", level_ = 1, admin_ = 0 WHERE id = 9','UPDATE usuarios SET username = \"jafet\", mail = \"oliver@gmail.com\", phone = \"33 2537 0678\", level_ = 1, admin_ = 0 WHERE id = 9','2025-06-17 16:52:05'),
(16,'F1VEScs','Usuarios','DELETE FROM usuarios WHERE id = 9','INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (\"jafet\", \"[CONTRASEÑA CENSURADA]\", \"oliver@gmail.com\", \"33 2537 0679\", FALSE, NULL, \"2025-05-14 12:33:06\", 1, \"00:00:00\")','2025-06-17 16:52:37'),
(17,'root','Usuarios','INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (\"HolaBuenas4\", \"[CONTRASEÑA CENSURADA]\", \"holabuenas4@gmail.com\", \"33 2537 0551\", FALSE, NULL, \"2025-06-17 16:53:21\", 1, \"00:00:00\")','DELETE FROM usuarios WHERE username = \"HolaBuenas4\"','2025-06-17 16:53:21'),
(18,'F1VEScs','Usuarios','DELETE FROM usuarios WHERE id = 10','INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (\"HolaBuenas4\", \"[CONTRASEÑA CENSURADA]\", \"holabuenas4@gmail.com\", \"33 2537 0551\", FALSE, NULL, \"2025-06-17 16:53:21\", 1, \"00:00:00\")','2025-06-17 16:53:46'),
(19,'F1VEScs','Videojuegos','INSERT INTO videojuegos VALUES (16, \"hola\", \"hola\", 1.00, \"[DESCRIPCIÓN NUEVA]\", 3.00, \"hola\", \"2024-12-12\")','DELETE FROM videojuegos WHERE id = 16','2025-06-17 16:55:02'),
(20,'F1VEScs','Videojuegos','UPDATE videojuegos SET title = \"hola pero 2\", genre = \"hola\", price = 1.00, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 3.00, img = \"hola\", release_date = \"2024-12-12\" WHERE id = 16','UPDATE videojuegos SET title = \"hola\", genre = \"hola\", price = 1.00, descr = \"[DESCRIPCIÓN ORIGINAL]\", rating = 3.00, img = \"hola\", release_date = \"2024-12-12\" WHERE id = 16','2025-06-17 16:56:08'),
(21,'F1VEScs','Videojuegos','DELETE FROM videojuegos WHERE id = 16','INSERT INTO videojuegos VALUES (16, \"hola pero 2\", \"hola\", 1.00, \"[DESCRIPCIÓN ELIMINADA]\", 3.00, \"hola\", \"2024-12-12\")','2025-06-17 16:56:20'),
(22,'Registro','Usuarios','INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (\"RosaS\", \"[CONTRASEÑA CENSURADA]\", \"rsantana@ceti.mx\", \"33 2537 0670\", FALSE, NULL, \"2025-06-19 10:14:58\", 1, \"00:00:00\")','DELETE FROM usuarios WHERE username = \"RosaS\"','2025-06-19 10:14:58');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `id_user` int(11) NOT NULL,
  `id_videogame` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_videogame`),
  KEY `id_videogame` (`id_videogame`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_videogame`) REFERENCES `videojuegos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES
(1,2),
(1,5),
(5,5),
(1,15);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id_user` int(11) NOT NULL,
  `id_videogame` int(11) NOT NULL,
  `date_buy` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`,`id_videogame`),
  KEY `id_videogame` (`id_videogame`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_videogame`) REFERENCES `videojuegos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES
(5,2,'2025-06-17 17:01:07'),
(5,3,'2025-06-15 02:16:00'),
(11,3,'2025-06-19 10:17:03'),
(11,5,'2025-06-19 10:17:03'),
(11,13,'2025-06-19 10:17:03'),
(11,14,'2025-06-19 10:17:03');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `admin_` tinyint(1) DEFAULT 0,
  `profile_pic` longblob DEFAULT NULL,
  `register` timestamp NULL DEFAULT current_timestamp(),
  `level_` int(11) DEFAULT 1,
  `time_played` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'HolaBuenas','$2y$12$x0/Kg8tzqS9/YAWRpT5bzO5t41kPX1boQ8hQvdiFPU3LcuO/BGgsq','holabuenas@gmail.com','33 2537 0542',1,NULL,'2025-03-19 05:22:16',1,'00:00:00'),
(2,'HolaBuenas2','$2y$12$F8gVerajvXarWsYYgdnQAesUldBdkMP1fcD0LHDxOy9RANJxWUJS6','holabuenas2@gmail.com','33 2537 0543',0,NULL,'2025-03-19 05:28:27',1,'00:00:00'),
(3,'HolaMalas','$2y$12$h1X5p0NJzLSMT7f.f0no1.0FQljn8TDimkXF0MY8Fd6ve2v6o3w0K','holamalas@gmail.com','33 2537 0544',0,NULL,'2025-03-19 18:24:48',1,'00:00:00'),
(5,'F1VEScs','$2y$12$MVqRPnxN6CdPzZ7nfE5/W.CHr9tCim4vHKtqXwN68KPL4lWgoe9hK','mikegilpin132@gmail.com','33 2537 0541',1,NULL,'2025-05-11 01:17:19',555,'00:00:00'),
(7,'HolaBuenas3.1','$2y$12$yBhLrPlL1WOwfXCPQL2TH.wwUwDLpuSQlsRB5YOjZhDqdAuWZcH7e','holabuenas3@gmail.com','33 2537 0547',0,NULL,'2025-05-14 00:41:06',1,'00:00:00'),
(11,'RosaS','$2y$12$h03Rn/yKhc9qcolCSAYFO.26BYliHH51m4QkSMCTcomEuN/YKFTiu','rsantana@ceti.mx','33 2537 0670',0,NULL,'2025-06-19 16:14:58',1,'00:00:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `usuarios_after_insert` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
	DECLARE username VARCHAR(40);
	DECLARE affected_table VARCHAR(20);
	DECLARE sentence_sql VARCHAR(700);
	DECLARE counter_sentence VARCHAR(700);
   
	SET affected_table = 'Usuarios';
	SET username = IFNULL(@username, SUBSTRING_INDEX(USER(), '@', 1));

	SET sentence_sql = CONCAT(
		'INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (',
		'"', NEW.username, '", ',
		'"[CONTRASEÑA CENSURADA]", ',
		'"', NEW.mail, '", ',
		'"', NEW.phone, '", ',
		IF(NEW.admin_ = 1, 'TRUE', 'FALSE'), ', ',
		IFNULL(CONCAT('"', NEW.profile_pic, '"'), 'NULL'), ', ',
		'"', NEW.register, '", ',
		NEW.level_, ', ',
		'"', NEW.time_played, '")'
	);

	SET counter_sentence = CONCAT(
		'DELETE FROM usuarios WHERE username = "', NEW.username, '"'
	);

	INSERT INTO bitacora (username, tb_affected, sentence_sql, counter_sentence)
	VALUES (username, affected_table, sentence_sql, counter_sentence);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `usuarios_after_update` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
	DECLARE username VARCHAR(40);
	DECLARE affected_table VARCHAR(20);
   DECLARE sentence_sql VARCHAR(700);
   DECLARE counter_sentence VARCHAR(700);
   DECLARE descr_change VARCHAR(40) DEFAULT '';
   
   SET affected_table = 'Usuarios';
   SET username = IFNULL(@username, SUBSTRING_INDEX(USER(), '@', 1));
   SET sentence_sql = CONCAT(
        'UPDATE usuarios SET ',
        'username = "', NEW.username, '", ',
        'mail = "', NEW.mail, '", ',
        'phone = "', NEW.phone, '", ',
        'level_ = ', NEW.level_, ', ',
        'admin_ = ', NEW.admin_, ' ',
        'WHERE id = ', OLD.id
   );
    
	SET counter_sentence = CONCAT(
        'UPDATE usuarios SET ',
        'username = "', OLD.username, '", ',
        'mail = "', OLD.mail, '", ',
        'phone = "', OLD.phone, '", ',
        'level_ = ', OLD.level_, ', ',
        'admin_ = ', OLD.admin_, ' ',
        'WHERE id = ', NEW.id
   );
   
   
   INSERT INTO bitacora (username, tb_affected, sentence_sql, counter_sentence)
   VALUES (username, affected_table, sentence_sql, counter_sentence);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `usuarios_after_delete` AFTER DELETE ON `usuarios` FOR EACH ROW BEGIN
	DECLARE username VARCHAR(40);
	DECLARE affected_table VARCHAR(20);
   DECLARE sentence_sql VARCHAR(700);
   DECLARE counter_sentence VARCHAR(700);
   
   SET affected_table = 'Usuarios';
   SET username = IFNULL(@username, SUBSTRING_INDEX(USER(), '@', 1));
   SET sentence_sql = CONCAT('DELETE FROM usuarios WHERE id = ', OLD.id);
   SET counter_sentence = CONCAT('INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) VALUES (',
   	'"', OLD.username, '", ', '"[CONTRASEÑA CENSURADA]", ', '"', OLD.mail, '", ', '"', OLD.phone, '", ',
   	IF(OLD.admin_ = 1, 'TRUE', 'FALSE'), ', ',  IFNULL(CONCAT('"', OLD.profile_pic, '"'), 'NULL'), ', ',
   	'"', OLD.register, '", ', OLD.level_, ', ', '"', OLD.time_played, '")');
   
   INSERT INTO bitacora (username, tb_affected, sentence_sql, counter_sentence)
   VALUES (username, affected_table, sentence_sql, counter_sentence);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `videojuegos`
--

DROP TABLE IF EXISTS `videojuegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL CHECK (`price` >= 0),
  `descr` varchar(700) NOT NULL,
  `rating` decimal(3,2) NOT NULL CHECK (`rating` between 1 and 5),
  `img` varchar(150) NOT NULL,
  `release_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuegos`
--

LOCK TABLES `videojuegos` WRITE;
/*!40000 ALTER TABLE `videojuegos` DISABLE KEYS */;
INSERT INTO `videojuegos` VALUES
(2,'Hollow Knight','Metroidvania',14.99,'El videojuego cuenta la historia del Caballero, en su búsqueda para descubrir los secretos del largamente abandonado reino de Hallownest, cuyas profundidades atraen a los aventureros y valientes con la promesa de tesoros o la respuesta a misterios antiguos.',4.12,'HK.png','2017-02-24'),
(3,'God of War: Ragnarok','Soulslike aventura',69.99,'Es la novena entrega de la saga de God of War, la novena cronológicamente y la secuela de God of War de 2018. Basado libremente en la mitología nórdica, el juego se desarrolla en la antigua Escandinavia y presenta al protagonista de la serie Kratos y su hijo adolescente Atreus. Concluyendo la era nórdica de la serie, el juego cubre el Ragnarök, el evento escatológico que es central en la mitología nórdica y se predijo que sucedería en el juego anterior después de que Kratos matara al dios Æsir Baldur.',4.83,'GOWR.png','2022-11-09'),
(5,'The Last of Us','Horror Shooter',19.99,'The Last of Us es un videojuego de terror de acción y aventura de disparos en tercera persona desarrollado por Naughty Dog y distribuido por Sony Computer Entertainment. Los jugadores controlan a Joel, un contrabandista encargado de escoltar a una adolescente, Ellie, a través de un Estados Unidos post-apocalíptico. The Last of Us se juega desde una perspectiva en tercera persona.',4.89,'TLOU.png','2013-06-14'),
(13,'Halo Reach','Shooter 1era persona',9.99,'El juego transcurre en el año 2552, donde la humanidad mantiene una guerra con el Covenant. El jugador controla a un nuevo personaje llamado Noble 6, un super soldado miembro del Equipo «Noble» durante la batalla en la colonia humana de Reach. Un detalle interesante del juego es que puedes personalizar a tu SPARTAN, permaneciendo así en todos los modos de juego, tanto en multijugador como en campaña.',4.47,'HReach.jpg','2010-09-14'),
(14,'The Last of Us Part II','Horror Shooter',49.99,'Cinco años después de su peligroso viaje a través de unos Estados Unidos pospandemia, Ellie y Joel logran establecerse en Jackson, Wyoming. Vivir entre una próspera comunidad de sobrevivientes les ha concedido paz y estabilidad, a pesar de la amenaza constante de los infectados y de otros sobrevivientes más desesperados.  Cuando un evento violento interrumpe esa paz, Ellie se embarca en un viaje incesante para obtener justicia y llegar a un cierre.',4.84,'TLOU2.png','2020-06-19'),
(15,'F.E.A.R 2','Horror Shooter',7.99,'La historia comienza 30 minutos antes de que finalizara la primera entrega y se centra en Michael Becket, que forma parte de un comando Delta Force enviado a capturar a Genevieve Aristide, ejecutiva de Armacham, para interrogarla ya que fue la responsable de, en la primera entrega, reabrir la cámara donde estaba Alma que fue lo que desató el caos en la ciudad. El juego abre con el personaje Michael Becket teniendo visiones de Alma en una ciudad ruinas. Becket y su equipo llegan al edificio donde estaba Aristide que se encuentra bajo asalto por parte de las fuerzas de ATC.',4.05,'FEAR2.png','2009-02-13');
/*!40000 ALTER TABLE `videojuegos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `videojuegos_after_insert` AFTER INSERT ON `videojuegos` FOR EACH ROW BEGIN
	DECLARE username VARCHAR(40);
	DECLARE affected_table VARCHAR(20);
   DECLARE sentence_sql VARCHAR(700);
   DECLARE counter_sentence VARCHAR(700);
   
   SET affected_table = 'Videojuegos';
   SET username = IFNULL(@username, SUBSTRING_INDEX(USER(), '@', 1));
   SET sentence_sql = CONCAT(
       'INSERT INTO videojuegos VALUES (',
       NEW.id, ', "', NEW.title, '", "', NEW.genre, '", ',
       NEW.price, ', "[DESCRIPCIÓN NUEVA]", ', NEW.rating, ', "',
       NEW.img, '", "', NEW.release_date, '")'
   );

   SET counter_sentence = CONCAT(
       'DELETE FROM videojuegos WHERE id = ', NEW.id
   );
   
   INSERT INTO bitacora (username, tb_affected, sentence_sql, counter_sentence)
   VALUES (username, affected_table, sentence_sql, counter_sentence);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `videojuegos_after_update` AFTER UPDATE ON `videojuegos` FOR EACH ROW BEGIN
	DECLARE username VARCHAR(40);
	DECLARE affected_table VARCHAR(20);
   DECLARE sentence_sql VARCHAR(700);
   DECLARE counter_sentence VARCHAR(700);
   DECLARE descr_change VARCHAR(40) DEFAULT '';
   
   SET affected_table = 'Videojuegos';
   SET username = IFNULL(@username, SUBSTRING_INDEX(USER(), '@', 1));
   IF (OLD.descr <> NEW.descr) THEN
            SET descr_change = ', descr = "[DESCRIPCIÓN MODIFICADA]"';
        ELSE
            SET descr_change = ', descr = "[DESCRIPCIÓN ORIGINAL]"';
        END IF;
        
        SET sentence_sql = CONCAT('UPDATE videojuegos SET ',
                              'title = "', NEW.title, '", ',
                              'genre = "', NEW.genre, '", ',
                              'price = ', NEW.price,
                              descr_change, ', ',
                              'rating = ', NEW.rating, ', ',
                              'img = "', NEW.img, '", ',
                              'release_date = "', NEW.release_date, '" ',
                              'WHERE id = ', OLD.id);
        
        SET counter_sentence = CONCAT('UPDATE videojuegos SET ',
                                   'title = "', OLD.title, '", ',
                                   'genre = "', OLD.genre, '", ',
                                   'price = ', OLD.price,
                                   descr_change, ', ',
                                   'rating = ', OLD.rating, ', ',
                                   'img = "', OLD.img, '", ',
                                   'release_date = "', OLD.release_date, '" ',
                                   'WHERE id = ', NEW.id);
   
   INSERT INTO bitacora (username, tb_affected, sentence_sql, counter_sentence)
   VALUES (username, affected_table, sentence_sql, counter_sentence);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `videojuegos_after_delete` AFTER DELETE ON `videojuegos` FOR EACH ROW BEGIN
	DECLARE username VARCHAR(40);
	DECLARE affected_table VARCHAR(20);
   DECLARE sentence_sql VARCHAR(700);
   DECLARE counter_sentence VARCHAR(700);
   
   SET affected_table = 'Videojuegos';
   SET username = IFNULL(@username, SUBSTRING_INDEX(USER(), '@', 1));
   SET sentence_sql = CONCAT('DELETE FROM videojuegos WHERE id = ', OLD.id);
   SET counter_sentence = CONCAT('INSERT INTO videojuegos VALUES (',
      OLD.id, ', "', OLD.title, '", "', OLD.genre, '", ',
      OLD.price, ', "[DESCRIPCIÓN ELIMINADA]", ', OLD.rating, ', "',
      OLD.img, '", "', OLD.release_date, '")');
   
   INSERT INTO bitacora (username, tb_affected, sentence_sql, counter_sentence)
   VALUES (username, affected_table, sentence_sql, counter_sentence);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-08-28 17:55:37
