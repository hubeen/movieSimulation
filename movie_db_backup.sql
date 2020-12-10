-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: MOVIE_DB
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.19.04.2

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
-- Table structure for table `MOVIE_EVALUATION`
--

DROP TABLE IF EXISTS `MOVIE_EVALUATION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOVIE_EVALUATION` (
  `EVALUATION_NO` int(5) NOT NULL AUTO_INCREMENT,
  `USER_ID` varchar(20) NOT NULL,
  `MOVIE_NAME` varchar(30) NOT NULL,
  `FAMOUS_QUOTE` varchar(100) NOT NULL,
  `MOVIE_SCORE` double NOT NULL,
  `MOVIE_REVIEW` varchar(1000) NOT NULL,
  PRIMARY KEY (`EVALUATION_NO`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `MOVIE_EVALUATION_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER_INFO` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOVIE_EVALUATION`
--

LOCK TABLES `MOVIE_EVALUATION` WRITE;
/*!40000 ALTER TABLE `MOVIE_EVALUATION` DISABLE KEYS */;
/*!40000 ALTER TABLE `MOVIE_EVALUATION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOVIE_INFO`
--

DROP TABLE IF EXISTS `MOVIE_INFO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOVIE_INFO` (
  `MOVIE_NO` int(5) NOT NULL AUTO_INCREMENT,
  `MOVIE_NAME` varchar(50) NOT NULL,
  `MOVIE_GENRE` varchar(50) NOT NULL,
  `MOVIE_DIRECTOR` varchar(20) NOT NULL,
  `MOVIE_PLACE` varchar(5) NOT NULL,
  `MOVIE_TIME` varchar(20) NOT NULL,
  PRIMARY KEY (`MOVIE_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOVIE_INFO`
--

LOCK TABLES `MOVIE_INFO` WRITE;
/*!40000 ALTER TABLE `MOVIE_INFO` DISABLE KEYS */;
INSERT INTO `MOVIE_INFO` VALUES (1,'기생충','드라마','봉준호','1관','08:00 ~ 11:00'),(2,'기생충','드라마','봉준호','2관','12:00 ~ 15:00'),(3,'기생충','드라마','봉준호','3관','16:00 ~ 19:00'),(4,'기생충','드라마','봉준호','4관','20:00 ~ 23:00'),(5,'어벤져스_앤드게임','액션, SF','안소니 루소','2관','08:00 ~ 11:00'),(6,'어벤져스_앤드게임','액션, SF','안소니 루소','3관','12:00 ~ 15:00'),(7,'어벤져스_앤드게임','액션, SF','안소니 루소','4관','16:00 ~ 19:00'),(8,'어벤져스_앤드게임','액션, SF','안소니 루소','1관','20:00 ~ 23:00'),(9,'토이스토리4','애니메이션, 모험','조시 쿨리','3관','08:00 ~ 11:00'),(10,'토이스토리4','애니메이션, 모험','조시 쿨리','4관','12:00 ~ 15:00'),(11,'토이스토리4','애니메이션, 모험','조시 쿨리','1관','16:00 ~ 19:00'),(12,'토이스토리4','애니메이션, 모험','조시 쿨리','2관','20:00 ~ 23:00'),(13,'알라딘','모험, 가족, 판타지','가이 리치','4관','08:00 ~ 11:00'),(14,'알라딘','모험, 가족, 판타지','가이 리치','1관','12:00 ~ 15:00'),(15,'알라딘','모험, 가족, 판타지','가이 리치','2관','16:00 ~ 19:00'),(16,'알라딘','모험, 가족, 판타지','가이 리치','3관','20:00 ~ 23:00'),(17,'고질라_킹 오브 몬스터','액션, 모험, SF','마이클 도히티','5관','08:00 ~ 11:00'),(18,'고질라_킹 오브 몬스터','액션, 모험, SF','마이클 도히티','6관','12:00 ~ 15:00'),(19,'고질라_킹 오브 몬스터','액션, 모험, SF','마이클 도히티','7관','16:00 ~ 19:00'),(20,'고질라_킹 오브 몬스터','액션, 모험, SF','마이클 도히티','8관','20:00 ~ 23:00'),(21,'로켓맨','드라마, 판타지','덱스터 플레처','6관','08:00 ~ 11:00'),(22,'로켓맨','드라마, 판타지','덱스터 플레처','7관','12:00 ~ 15:00'),(23,'로켓맨','드라마, 판타지','덱스터 플레처','8관','16:00 ~ 19:00'),(24,'로켓맨','드라마, 판타지','덱스터 플레처','5관','20:00 ~ 23:00'),(25,'엑스맨_다크 피닉스','액션, 모험, SF','사이먼 킨버그','7관','08:00 ~ 11:00'),(26,'엑스맨_다크 피닉스','액션, 모험, SF','사이먼 킨버그','8관','12:00 ~ 15:00'),(27,'엑스맨_다크 피닉스','액션, 모험, SF','사이먼 킨버그','5관','16:00 ~ 19:00'),(28,'엑스맨_다크 피닉스','액션, 모험, SF','사이먼 킨버그','6관','20:00 ~ 23:00'),(29,'메가로돈_거대 상어의 습격','액션, 모험, 공포','제임스 토마스','8관','08:00 ~ 11:00'),(30,'메가로돈_거대 상어의 습격','액션, 모험, 공포','제임스 토마스','5관','12:00 ~ 15:00'),(31,'메가로돈_거대 상어의 습격','액션, 모험, 공포','제임스 토마스','6관','16:00 ~ 19:00'),(32,'메가로돈_거대 상어의 습격','액션, 모험, 공포','제임스 토마스','7관','20:00 ~ 23:00'),(33,'애나벨 집으로','공포, 미스터리, 스릴러','게리 도버먼','9관','08:00 ~ 11:00'),(34,'애나벨 집으로','공포, 미스터리, 스릴러','게리 도버먼','10관','12:00 ~ 15:00'),(35,'애나벨 집으로','공포, 미스터리, 스릴러','게리 도버먼','11관','16:00 ~ 19:00'),(36,'애나벨 집으로','공포, 미스터리, 스릴러','게리 도버먼','12관','20:00 ~ 23:00'),(37,'악인전','범죄, 액션','이원태','10관','08:00 ~ 11:00'),(38,'악인전','범죄, 액션','이원태','11관','12:00 ~ 15:00'),(39,'악인전','범죄, 액션','이원태','12관','16:00 ~ 19:00'),(40,'악인전','범죄, 액션','이원태','9관','20:00 ~ 23:00'),(41,'이웃집 토토로','애니메이션, 가족, 판타지','미야자키 하야오','11관','08:00 ~ 11:00'),(42,'이웃집 토토로','애니메이션, 가족, 판타지','미야자키 하야오','12관','12:00 ~ 15:00'),(43,'이웃집 토토로','애니메이션, 가족, 판타지','미야자키 하야오','9관','16:00 ~ 19:00'),(44,'이웃집 토토로','애니메이션, 가족, 판타지','미야자키 하야오','10관','20:00 ~ 23:00'),(45,'맨인블랙_인터내셔널','액션, 코미디, SF','F. 게리 그레이','12관','08:00 ~ 11:00'),(46,'맨인블랙_인터내셔널','액션, 코미디, SF','F. 게리 그레이','9관','12:00 ~ 15:00'),(47,'맨인블랙_인터내셔널','액션, 코미디, SF','F. 게리 그레이','10관','16:00 ~ 19:00'),(48,'맨인블랙_인터내셔널','액션, 코미디, SF','F. 게리 그레이','11관','20:00 ~ 23:00'),(49,'글로리아 벨','드라마, 멜로/로맨스','세바스찬 렐리오','13관','08:00 ~ 11:00'),(50,'글로리아 벨','드라마, 멜로/로맨스','세바스찬 렐리오','14관','12:00 ~ 15:00'),(51,'글로리아 벨','드라마, 멜로/로맨스','세바스찬 렐리오','15관','16:00 ~ 19:00'),(52,'글로리아 벨','드라마, 멜로/로맨스','세바스찬 렐리오','16관','20:00 ~ 23:00'),(53,'블랙스완_흑화','공포, 스릴러','브렛 뮬렌','14관','08:00 ~ 11:00'),(54,'블랙스완_흑화','공포, 스릴러','브렛 뮬렌','15관','12:00 ~ 15:00'),(55,'블랙스완_흑화','공포, 스릴러','브렛 뮬렌','16관','16:00 ~ 19:00'),(56,'블랙스완_흑화','공포, 스릴러','브렛 뮬렌','13관','20:00 ~ 23:00'),(57,'파라노말 액티비티','공포, 스릴러','빌리 루이스','15관','08:00 ~ 11:00'),(58,'파라노말 액티비티','공포, 스릴러','빌리 루이스','16관','12:00 ~ 15:00'),(59,'파라노말 액티비티','공포, 스릴러','빌리 루이스','13관','16:00 ~ 19:00'),(60,'파라노말 액티비티','공포, 스릴러','빌리 루이스','14관','20:00 ~ 23:00'),(61,'하나레이 베이','드라마','마츠나가 다이시','16관','08:00 ~ 11:00'),(62,'하나레이 베이','드라마','마츠나가 다이시','13관','12:00 ~ 15:00'),(63,'하나레이 베이','드라마','마츠나가 다이시','14관','16:00 ~ 19:00'),(64,'하나레이 베이','드라마','마츠나가 다이시','15관','20:00 ~ 23:00');
/*!40000 ALTER TABLE `MOVIE_INFO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOVIE_RESERVATION`
--

DROP TABLE IF EXISTS `MOVIE_RESERVATION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOVIE_RESERVATION` (
  `RESERVATION_NO` int(5) NOT NULL AUTO_INCREMENT,
  `USER_ID` varchar(20) NOT NULL,
  `MOVIE_NO` int(5) NOT NULL,
  `THEATER_NO` int(5) NOT NULL,
  `SEAT` varchar(10) NOT NULL,
  PRIMARY KEY (`RESERVATION_NO`),
  KEY `USER_ID` (`USER_ID`),
  KEY `MOVIE_NO` (`MOVIE_NO`),
  KEY `THEATER_NO` (`THEATER_NO`),
  CONSTRAINT `MOVIE_RESERVATION_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER_INFO` (`USER_ID`),
  CONSTRAINT `MOVIE_RESERVATION_ibfk_2` FOREIGN KEY (`MOVIE_NO`) REFERENCES `MOVIE_INFO` (`MOVIE_NO`),
  CONSTRAINT `MOVIE_RESERVATION_ibfk_3` FOREIGN KEY (`THEATER_NO`) REFERENCES `THEATER_INFO` (`THEATER_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOVIE_RESERVATION`
--

LOCK TABLES `MOVIE_RESERVATION` WRITE;
/*!40000 ALTER TABLE `MOVIE_RESERVATION` DISABLE KEYS */;
INSERT INTO `MOVIE_RESERVATION` VALUES (4,'hohoily39',15,4,'A1'),(5,'hohoily39',30,6,'A3');
/*!40000 ALTER TABLE `MOVIE_RESERVATION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `THEATER_INFO`
--

DROP TABLE IF EXISTS `THEATER_INFO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `THEATER_INFO` (
  `THEATER_NO` int(5) NOT NULL AUTO_INCREMENT,
  `THEATER_NAME` varchar(20) NOT NULL,
  `THEATER_LOC` varchar(50) NOT NULL,
  `THEATER_PHONE` varchar(20) NOT NULL,
  PRIMARY KEY (`THEATER_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `THEATER_INFO`
--

LOCK TABLES `THEATER_INFO` WRITE;
/*!40000 ALTER TABLE `THEATER_INFO` DISABLE KEYS */;
INSERT INTO `THEATER_INFO` VALUES (1,'메가박스 강남대로','서울특별시 강남구 강남대로 422','1544-0070'),(2,'CGV 압구정','서울특별시 강남구 압구정로30길 45','1544-1122'),(3,'롯데시네마 강동','서울특별시 강동구 천호옛길 85','1544-8855'),(4,'CGV 미아','서울특별시 강북구 도봉로 34','1544-1122'),(5,'롯데시네마 브로드웨이','서울특별시 강남구 도산대로8길 8','1544-8855'),(6,'메가박스 화곡','서울특별시 강서구 화곡로 142','1544-0070'),(7,'KU시네마테크','서울특별시 광진구 능동로 120','02-446-6579'),(8,'롯데시네마 건대입구','서울특별시 광진구 아차산로 272','1544-8855'),(9,'CGV 구로','서울특별시 구로구 구로중앙로 152','1544-1122'),(10,'더숲 아트시네마','서울특별시 노원구 노해로 480','02-951-0206'),(11,'성미산마을극장','서울특별시 마포구 월드컵로26길 39','02-322-0345'),(12,'필름포럼','서울특별시 서대문구 성산로 527','02-363-2537'),(13,'CGV 왕십리','서울특별시 성동구 왕십리광장로 17','1544-1122'),(14,'메가박스 센트럴','서울특별시 서초구 신반포로 176','1544-0070'),(15,'아트하우스모모','서울특별시 서대문구 이화여대길 52','02-363-5333');
/*!40000 ALTER TABLE `THEATER_INFO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER_INFO`
--

DROP TABLE IF EXISTS `USER_INFO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_INFO` (
  `USER_ID` varchar(20) NOT NULL,
  `USER_PW` varchar(20) NOT NULL,
  `USER_NAME` varchar(10) NOT NULL,
  `USER_EMAIL` varchar(30) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_INFO`
--

LOCK TABLES `USER_INFO` WRITE;
/*!40000 ALTER TABLE `USER_INFO` DISABLE KEYS */;
INSERT INTO `USER_INFO` VALUES ('alswls4786','alswls4786','hohoily39','hohoily39@naver.com'),('hohoily39','alswls4786','김민진','hohoily39@naver.com'),('mhubeen','qwer1234','문승현','mhubeen@gmail.com'),('rhkddus126','rhkddus123','조광연','rhkddus126@hanmail.net'),('test','qwer1234','홍길동','test@gmail.com');
/*!40000 ALTER TABLE `USER_INFO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER_MEMBERSHIP`
--

DROP TABLE IF EXISTS `USER_MEMBERSHIP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_MEMBERSHIP` (
  `MEMBERSHIP_NO` int(5) NOT NULL AUTO_INCREMENT,
  `USER_ID` varchar(20) NOT NULL,
  `MEMBERSHIP_POINT` int(5) NOT NULL,
  `MEMBERSHIP_DATE` date NOT NULL,
  PRIMARY KEY (`MEMBERSHIP_NO`,`USER_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `USER_MEMBERSHIP_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER_INFO` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_MEMBERSHIP`
--

LOCK TABLES `USER_MEMBERSHIP` WRITE;
/*!40000 ALTER TABLE `USER_MEMBERSHIP` DISABLE KEYS */;
INSERT INTO `USER_MEMBERSHIP` VALUES (1,'test',410,'2019-03-04'),(2,'mhubeen',410,'2020-12-07'),(3,'alswls4786',200,'2020-12-10'),(4,'hohoily39',200,'2020-12-10'),(5,'rhkddus126',0,'2020-12-10');
/*!40000 ALTER TABLE `USER_MEMBERSHIP` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-11  8:05:38
