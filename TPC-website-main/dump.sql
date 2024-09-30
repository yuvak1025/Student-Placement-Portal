-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: miniproject
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `Alumni`
--

DROP TABLE IF EXISTS `Alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alumni` (
  `rollNo` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cpi` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `placedIitp` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alumni`
--

LOCK TABLES `Alumni` WRITE;
/*!40000 ALTER TABLE `Alumni` DISABLE KEYS */;
INSERT INTO `Alumni` VALUES ('1901CE30','Tharun','1234',7.9,'Civil and Environmental Engineering','Civil',2021,'Hyderabad','no','Software','SDE-1'),('1901CS65','R.Vivek','1234',7.9,'Computer Science','CSE',2023,'Hyderabad','yes','Software','SDE-1');
/*!40000 ALTER TABLE `Alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Alumni2`
--

DROP TABLE IF EXISTS `Alumni2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alumni2` (
  `rollNo` varchar(100) NOT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`rollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alumni2`
--

LOCK TABLES `Alumni2` WRITE;
/*!40000 ALTER TABLE `Alumni2` DISABLE KEYS */;
INSERT INTO `Alumni2` VALUES ('1901CS65','oracle','SDE-1',1600000,2023);
/*!40000 ALTER TABLE `Alumni2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Company`
--

DROP TABLE IF EXISTS `Company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Company` (
  `company_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `job_description` varchar(600) DEFAULT NULL,
  `role_offered` varchar(100) DEFAULT NULL,
  `preferred_department` varchar(100) DEFAULT NULL,
  `essentail_skills` varchar(300) DEFAULT NULL,
  `salary_package` int(11) DEFAULT NULL,
  `mode_of_interview` varchar(100) DEFAULT NULL,
  `recruiting_since` int(11) DEFAULT NULL,
  `minimum_cpi` double DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Company`
--

LOCK TABLES `Company` WRITE;
/*!40000 ALTER TABLE `Company` DISABLE KEYS */;
INSERT INTO `Company` VALUES ('Amazon','amazon@gmail.com','1234','abcd','abcd','CSE','aaaa',1200000,'online',2013,7.5),('oracle','oracle@gmail.com','1234','Monitor and optimize performance of the database, plan for backup and recovery of the database.','Database Engineering','CSE','Data modeling and design',1900000,'offline',2012,NULL),('sprinklr','sprinklr@gmail.com','1234','Configure the Sprinklr product for various brands and industries following high standards of delivery and quality','Product Analyst','CSE','Proficient in database software.',4000000,'offline',2015,7);
/*!40000 ALTER TABLE `Company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Students` (
  `rollNo` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `cpi` double DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `areaOfIntrest` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `placementStatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Students`
--

LOCK TABLES `Students` WRITE;
/*!40000 ALTER TABLE `Students` DISABLE KEYS */;
INSERT INTO `Students` VALUES ('2101AI18','M.Dheeraj','1234',98,6.88,19,'Artificial Intelligence and Data Science','CSE','Machine learning',2021,'placed'),('2101AI25','R.Eshwar','1234',97,7.5,19,'Artificial Intelligence and Data Science','CSE','App Development',2021,'not placed'),('2101AI28','Sravanth','1234',97,9.8,19,'Civil and Environmental Engineering','Civil','Civil',2021,'placed');
/*!40000 ALTER TABLE `Students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Students2`
--

DROP TABLE IF EXISTS `Students2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Students2` (
  `rollNo` varchar(100) NOT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`rollNo`),
  CONSTRAINT `students2_ibfk_1` FOREIGN KEY (`rollNo`) REFERENCES `Students` (`rollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Students2`
--

LOCK TABLES `Students2` WRITE;
/*!40000 ALTER TABLE `Students2` DISABLE KEYS */;
INSERT INTO `Students2` VALUES ('2101AI18','sprinklr','SDE-1',3000000,2023),('2101AI28','oracle','Database administrator',1400000,2021);
/*!40000 ALTER TABLE `Students2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
  `rollNo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`rollNo`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES ('2101AI25','amazon@gmail.com'),('2101AI25','oracle@gmail.com');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-18 23:52:35
