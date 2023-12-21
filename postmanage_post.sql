-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: postmanage
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `num` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `id` varchar(20) DEFAULT NULL,
  `pw` varchar(64) NOT NULL,
  `date` datetime DEFAULT NULL,
  `view` int DEFAULT NULL,
  `owner_view` int DEFAULT '0',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (6,'[공지사항] 게시판 이용 안내 ','안녕하세요 관리자입니다. 이 글은 첫글이 작성되기 전 테스트용도로 작성되고 있으며 게시글 내에서 성차별, 인종차별, 정치발언, 비속어는 자제해주시길 당부드립니다. 댓글 또한 해당사항 똑같이 적용되며 어길 시에 법적 조치가 이루어질 수 있습니다.','관리자 ','root','wjsansrk','2023-12-20 00:00:00',26,0),(7,'안녕 내가 1빠야 ','ㅈㄱㄴ','이푸른새봄','vnfmsdl0421','0421','2023-12-20 10:26:21',2,0),(9,'나는 조윤호다 ','나는 왜 아무것도 안 해도 욕먹어야지?','조윤호','yunho ','1234','2023-12-20 10:34:36',3,0),(10,'나는 송연규다 ','메이플스토리 좋아~','송연규 ','bokyem','1234','2023-12-20 11:19:17',2,0),(11,'게시글 수정 테스트','update post','이푸른새봄','vnfsmdl0421','1234','2023-12-21 04:55:15',3,0),(12,'게시글 수정 테스트 2회차 ','제발 되라','수정','updatetest','1234','2023-12-21 05:23:49',13,4),(13,'진짜 3회차다 어?','그만하자','테스터','test3','1234','2023-12-21 05:37:11',6,5),(14,'데스크톱으로 테스트옴','ㅋㅋ','이푸른새봄 ','vnfmsdl0421','toqha421','2023-12-21 06:30:02',13,4),(15,'채우기용 채우기용','안녕','테스터','test','1234','2023-12-21 06:58:32',1,0),(16,'10번째인가?','10번째글이되시겠군','새봄','test','1234','2023-12-21 06:58:50',1,0),(17,'자 11번째','어떡할거지?','봄새','test','1234','2023-12-21 06:59:08',2,0),(18,'안녕 마지막 테스트야 ','마지막 테스트에 돌입했어','개발자입니다','root','wjsansrk ','2023-12-21 08:11:27',3,0),(19,'나 이우진 마지막 타자 ','진짜 마지막 테스트가 됐으면 좋겠다 새봄','이우진','leewoojin','$2y$10$WRAKltkaxDzauCPE8kIkw.xLVCZCEl0mUxADxOVNQxj9Tl.1Zy4Qa','2023-12-21 08:34:27',7,0);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-21 18:38:21
