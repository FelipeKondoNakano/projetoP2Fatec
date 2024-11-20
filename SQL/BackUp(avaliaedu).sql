-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: avaliaedu
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacoes` (
  `pk_id_avaliacao` int NOT NULL AUTO_INCREMENT,
  `texto` varchar(1000) NOT NULL,
  `avaliacao` int NOT NULL,
  `fk_instituicao` varchar(100) NOT NULL,
  `fk_materia` varchar(100) NOT NULL,
  `fk_curso` varchar(100) NOT NULL,
  PRIMARY KEY (`pk_id_avaliacao`),
  KEY `fk_avaliacao_instituicao` (`fk_instituicao`),
  KEY `fk_avaliacao_materia` (`fk_materia`),
  KEY `fk_avaliacao_curso` (`fk_curso`),
  CONSTRAINT `fk_avaliacao_curso` FOREIGN KEY (`fk_curso`) REFERENCES `cursos` (`pk_curso`) ON DELETE CASCADE,
  CONSTRAINT `fk_avaliacao_instituicao` FOREIGN KEY (`fk_instituicao`) REFERENCES `instituicoes` (`pk_instituicao`) ON DELETE CASCADE,
  CONSTRAINT `fk_avaliacao_materia` FOREIGN KEY (`fk_materia`) REFERENCES `materias` (`pk_materia`) ON DELETE CASCADE,
  CONSTRAINT `avaliacoes_chk_1` CHECK (((`avaliacao` >= 1) and (`avaliacao` <= 5)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `pk_curso` varchar(100) NOT NULL,
  `fk_instituicao` varchar(100) NOT NULL,
  PRIMARY KEY (`pk_curso`),
  KEY `fk_instituicao` (`fk_instituicao`),
  CONSTRAINT `fk_instituicao` FOREIGN KEY (`fk_instituicao`) REFERENCES `instituicoes` (`pk_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES ('Análise e Desenvolvimento de Sistemas','Fatec'),('Marketing','Fatec'),('Produção Agropecuária','Fatec - Presidente Prudente');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instituicoes` (
  `pk_instituicao` varchar(100) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `estado` varchar(150) NOT NULL,
  PRIMARY KEY (`pk_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes`
--

LOCK TABLES `instituicoes` WRITE;
/*!40000 ALTER TABLE `instituicoes` DISABLE KEYS */;
INSERT INTO `instituicoes` VALUES ('Fatec','Presidente Prudente','São Paulo'),('Fatec - Presidente Prudente','Presidente Prudente','São Paulo'),('Unesp','Presidente Prudente','São Paulo'),('Unoeste','Presidente Prudente','São Paulo');
/*!40000 ALTER TABLE `instituicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `pk_materia` varchar(100) NOT NULL,
  `periodo` varchar(100) NOT NULL,
  `fk_curso` varchar(100) NOT NULL,
  PRIMARY KEY (`pk_materia`),
  KEY `fk_curso` (`fk_curso`),
  CONSTRAINT `fk_curso` FOREIGN KEY (`fk_curso`) REFERENCES `cursos` (`pk_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES ('Banco de Dados','Noite','Análise e Desenvolvimento de Sistemas'),('Linguagem de Programação','Manhã','Análise e Desenvolvimento de Sistemas');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `nome` varchar(100) NOT NULL,
  `id` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pk_Ra` varchar(15) NOT NULL,
  `fk_instituicao` varchar(100) NOT NULL,
  `fk_curso` varchar(100) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `senha` varchar(150) NOT NULL,
  PRIMARY KEY (`pk_Ra`),
  KEY `instituicao_fk` (`fk_instituicao`),
  KEY `curso_fk` (`fk_curso`),
  CONSTRAINT `curso_fk` FOREIGN KEY (`fk_curso`) REFERENCES `cursos` (`pk_curso`),
  CONSTRAINT `instituicao_fk` FOREIGN KEY (`fk_instituicao`) REFERENCES `instituicoes` (`pk_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Mário','098','mario.italian@gmail.com','09876512304','Fatec','Análise e Desenvolvimento de Sistemas','diurno','$2y$10$i2UzxfFDie5pA6mBiyQoD.G25Ba4ZhC1zsnq9OujypxN1RL3BT6r.');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-20 14:32:41
