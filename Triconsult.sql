-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: Triconsult
-- ------------------------------------------------------
-- Server version	5.7.25

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
-- Table structure for table `Cadastros`
--

DROP TABLE IF EXISTS `Cadastros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cadastros` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefone` varchar(255) NOT NULL,
  `Observacoes` text NOT NULL,
  `Situacao` int(1) NOT NULL DEFAULT '1',
  `Arquivado` int(1) NOT NULL DEFAULT '0',
  `Ip` varchar(15) NOT NULL,
  `Agente` text NOT NULL,
  `Criacao` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cadastros`
--

LOCK TABLES `Cadastros` WRITE;
/*!40000 ALTER TABLE `Cadastros` DISABLE KEYS */;
INSERT INTO `Cadastros` VALUES ('c0467c25-43a3-231b-57a2-54aa545d0e19',1,'Ubiratã Carvalho Nogueira','bira@biracarvalho.com.br','(62) 98331-3227','Credibly syndicate strategic imperatives and low-risk high-yield alignments. Authoritatively cultivate cross functional niches before sticky materials. Proactively enable pandemic content for enterprise-wide action items. Phosfluorescently.',0,0,'','','0000-00-00 00:00:00'),('093c8470-dfc3-6db8-547f-405e3e76145d',2,'Ubirajara Carvalho Nogueira','jaracarvalho@hotmail.com','(19) 99652-2222','',1,0,'','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Cadastros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Configuracoes`
--

DROP TABLE IF EXISTS `Configuracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Configuracoes` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `Tipo` varchar(25) DEFAULT 'varchar',
  `Grupo` bigint(20) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descricao` text,
  `Valor` longtext,
  `Ordem` int(10) DEFAULT '0',
  `Exibir` int(1) DEFAULT '0',
  `Arquivado` int(1) DEFAULT '0',
  `Situacao` int(1) DEFAULT '1',
  `Criacao` datetime DEFAULT NULL,
  `Atualizacao` datetime DEFAULT NULL,
  `AlteracaoUsuarioId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Slug` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Configuracoes`
--

LOCK TABLES `Configuracoes` WRITE;
/*!40000 ALTER TABLE `Configuracoes` DISABLE KEYS */;
INSERT INTO `Configuracoes` VALUES (1,'bd722969-0200-11e8-aa85-08002750d3e2','varchar',1,'url','URL do Site','','http://biracarvalho.com.br/triconsult',0,1,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(2,'','varchar',3,'googleRecaptchaPrivateKey','Google Recaptcha Private Key','Chave privada da api do Google Recaptcha.',NULL,0,0,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(3,'bd722b6f-0200-11e8-aa85-08002750d3e2','varchar',3,'googleAnalytics','Google Analytics Code','','XX-000000-00',0,1,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(4,'bd722bc2-0200-11e8-aa85-08002750d3e2','varchar',1,'dominio','Domínio','','biracarvalho.com.br',0,1,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(5,'bd722e2e-0200-11e8-aa85-08002750d3e2','varchar',1,'siteTitulo','Título do Site','','Bira Carvalho - Desenvolvedor Web',0,1,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(6,'bd722eb7-0200-11e8-aa85-08002750d3e2','varchar',2,'emailContato','Email de Contato','Endereço de email para onde serão enviados as mensagens do formulários de contato do site.','',0,1,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(7,'bd722f08-0200-11e8-aa85-08002750d3e2','varchar',3,'googleRecaptchaPubliqueKey','Google Recaptcha Publique Key','Chave publica para api do Google Recaptcha.',NULL,0,0,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(8,'bd722f57-0200-11e8-aa85-08002750d3e2','varchar',2,'phpmailerUsuario','PHPMailer - Usuário','Usuário da conta de email utilizada para autenticar o envio de emails do site.',NULL,2,0,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(9,'bd722fa7-0200-11e8-aa85-08002750d3e2','varchar',2,'phpmailerDominio','PHPMailer - Domínio','',NULL,3,0,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(10,'bd722ff0-0200-11e8-aa85-08002750d3e2','varchar',2,'phpmailerSenha','PHPMailer - Senha','',NULL,4,0,0,1,'2018-01-25 16:45:02','2018-01-25 16:45:02',1),(18,'6e77890a-c89e-e5b2-7086-b88930e7f21c','varchar',1,'siteTelefone','Telefone','','',11,1,0,1,'2018-01-30 19:00:05','0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `Configuracoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ConfiguracoesGrupos`
--

DROP TABLE IF EXISTS `ConfiguracoesGrupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ConfiguracoesGrupos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Descricao` text NOT NULL,
  `Ordem` int(10) NOT NULL DEFAULT '0',
  `Situacao` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Slug` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ConfiguracoesGrupos`
--

LOCK TABLES `ConfiguracoesGrupos` WRITE;
/*!40000 ALTER TABLE `ConfiguracoesGrupos` DISABLE KEYS */;
INSERT INTO `ConfiguracoesGrupos` VALUES (1,'Site','site','Informações básicas do site',0,1),(2,'Emails','emails','Dados para envio de emails',0,1),(3,'Google','google','Dados de conexão com serviços da Google',0,1);
/*!40000 ALTER TABLE `ConfiguracoesGrupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Conteudos`
--

DROP TABLE IF EXISTS `Conteudos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Conteudos` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Grupos` varchar(2550) DEFAULT NULL,
  `Secoes` varchar(2550) DEFAULT NULL,
  `MidiasImagens` varchar(2550) DEFAULT NULL,
  `MidiasArquivos` varchar(2550) DEFAULT NULL,
  `MidiasCapa` varchar(2550) DEFAULT NULL,
  `MidiasAnexo` varchar(2550) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Resumo` tinytext,
  `Video` varchar(255) DEFAULT NULL,
  `Texto` text,
  `Url` varchar(255) DEFAULT NULL,
  `Fonte` varchar(255) DEFAULT NULL,
  `Autor` varchar(255) DEFAULT NULL,
  `Destaque` int(1) DEFAULT '0',
  `Situacao` int(1) DEFAULT '1',
  `Privado` int(1) DEFAULT '0',
  `Arquivado` int(1) DEFAULT '0',
  `Galeria` int(1) DEFAULT '1',
  `Ordem` int(1) DEFAULT '0',
  `Atualizacao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `AtualizacaoUsuarioId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `secId` (`Secoes`(767)),
  KEY `pubSeo` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Conteudos`
--

LOCK TABLES `Conteudos` WRITE;
/*!40000 ALTER TABLE `Conteudos` DISABLE KEYS */;
INSERT INTO `Conteudos` VALUES ('81383428-10a4-fbb6-133d-ef5d0a2d2cd8',1,'','','','','','','Página Um','pagina-um','0000-00-00','','','','','','',0,0,0,0,1,0,'2019-03-14 18:44:37',0),('07914a2a-60d8-1183-ffaa-4760da103277',2,'','','2','','2','','Página Dois','pagina-dois','0000-00-00','','','','','','',0,0,0,0,1,0,'2019-03-14 18:45:03',0);
/*!40000 ALTER TABLE `Conteudos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ConteudosMeta`
--

DROP TABLE IF EXISTS `ConteudosMeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ConteudosMeta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ConteudosId` bigint(20) NOT NULL,
  `Tag` varchar(255) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Valor` longtext,
  `Ordem` int(10) DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `ConteudosId` (`ConteudosId`),
  KEY `Tag` (`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ConteudosMeta`
--

LOCK TABLES `ConteudosMeta` WRITE;
/*!40000 ALTER TABLE `ConteudosMeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ConteudosMeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Grupos`
--

DROP TABLE IF EXISTS `Grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Grupos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `PaiId` bigint(20) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Descricao` text NOT NULL,
  `Ordem` int(10) NOT NULL DEFAULT '0',
  `Situacao` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Slug` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grupos`
--

LOCK TABLES `Grupos` WRITE;
/*!40000 ALTER TABLE `Grupos` DISABLE KEYS */;
INSERT INTO `Grupos` VALUES (1,0,'Grupo 001','grupo-001','',0,1),(2,0,'Grupo 002','grupo-002','',0,1),(3,0,'Grupo 003','grupo-003','',0,1);
/*!40000 ALTER TABLE `Grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Midias`
--

DROP TABLE IF EXISTS `Midias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Midias` (
  `uuid` varchar(32) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `NomeOriginal` varchar(255) NOT NULL,
  `MimeType` varchar(255) NOT NULL,
  `Legenda` varchar(255) DEFAULT NULL,
  `Ordem` int(10) DEFAULT '0',
  `Situacao` int(1) DEFAULT '1',
  `Descricao` text,
  `Arquivado` int(1) DEFAULT '0',
  `Referencia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `uuid` (`uuid`),
  KEY `Nome` (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Midias`
--

LOCK TABLES `Midias` WRITE;
/*!40000 ALTER TABLE `Midias` DISABLE KEYS */;
/*!40000 ALTER TABLE `Midias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Questionarios`
--

DROP TABLE IF EXISTS `Questionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Questionarios` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Grupos` varchar(2550) DEFAULT NULL,
  `Secoes` varchar(2550) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Resumo` tinytext,
  `Texto` text,
  `Escala` int(11) DEFAULT '10',
  `Destaque` int(1) DEFAULT '0',
  `Situacao` int(1) DEFAULT '1',
  `Privado` int(1) DEFAULT '0',
  `Arquivado` int(1) DEFAULT '0',
  `Ordem` int(1) DEFAULT '0',
  `Atualizacao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `AtualizacaoUsuarioId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `secId` (`Secoes`(767)),
  KEY `pubSeo` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questionarios`
--

LOCK TABLES `Questionarios` WRITE;
/*!40000 ALTER TABLE `Questionarios` DISABLE KEYS */;
INSERT INTO `Questionarios` VALUES ('083012aa-0cdb-43e8-72ac-3644cd8b3ebf',1,NULL,'2','Individual','individual','0000-00-00','<p>Seamlessly architect highly efficient schemas via resource maximizing bandwidth. Holisticly embrace effective markets for installed base web-readiness. Objectively disintermediate interoperable processes without robust schemas. Synergistically enable r','<p>Enthusiastically iterate maintainable leadership skills before dynamic collaboration and idea-sharing. Competently extend proactive imperatives before ubiquitous paradigms. Holisticly brand web-enabled infrastructures for mission-critical networks. Holisticly implement high-quality data through market positioning technology. Intrinsicly integrate frictionless scenarios without bleeding-edge supply chains.</p>\r\n',10,0,1,0,0,0,'2019-03-18 23:57:03',NULL),('19df18c5-369b-2571-e8fa-41da28857464',2,'','2','Organizacional','organizacional','0000-00-00','','',10,0,0,0,1,0,'2019-03-19 01:49:34',0);
/*!40000 ALTER TABLE `Questionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuestionariosMeta`
--

DROP TABLE IF EXISTS `QuestionariosMeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuestionariosMeta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `QuestionariosId` bigint(20) NOT NULL,
  `Tag` varchar(255) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Texto` longtext,
  `Valor` int(10) DEFAULT NULL,
  `Ordem` int(10) DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `ConteudosId` (`QuestionariosId`),
  KEY `Tag` (`Tag`),
  CONSTRAINT `QuestionariosMeta_ibfk_1` FOREIGN KEY (`QuestionariosId`) REFERENCES `Questionarios` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuestionariosMeta`
--

LOCK TABLES `QuestionariosMeta` WRITE;
/*!40000 ALTER TABLE `QuestionariosMeta` DISABLE KEYS */;
INSERT INTO `QuestionariosMeta` VALUES (1,1,'MetaCampo','Energistically evolve user friendly products vis-a-vis top-line value. ','<p>Progressively recaptiualize integrated solutions rather than 24/7 experiences. Dynamically administrate distributed models via innovative niche markets. Energistically seize team driven e-markets whereas state of the art action items. Proactively fashion intermandated experiences rather than maintainable.</p>\r\n',1,1),(2,1,'MetaCampo','Collaboratively administrate state of the art partnerships.','<p>Competently formulate multimedia based e-services rather than transparent benefits. Distinctively supply state of the art meta-services via 2.0 services. Conveniently incentivize integrated expertise and synergistic human capital. Collaboratively develop scalable e-services through customer directed infomediaries.</p>\r\n',2,2),(3,2,'MetaCampo','','',NULL,0),(4,1,'MetaCampo','Professionally foster user friendly systems through cross functional markets','<p>Professionally repurpose client-based experiences vis-a-vis optimal interfaces. Intrinsicly reinvent customer directed benefits rather than customized products.&nbsp;</p>\r\n',3,3),(5,1,'MetaCampo','Competently grow superior infomediaries after transparent total linkage','<p>Collaboratively actualize tactical services after vertical products. Appropriately unleash customer directed portals and revolutionary products. Distinctively redefine technically sound infrastructures before customer directed leadership. Intrinsicly deliver interactive.</p>\r\n',4,4),(6,1,'MetaCampo','Holisticly brand web-enabled infrastructures for mission-critical networks','<p>Holisticly implement high-quality data through market positioning technology. Intrinsicly integrate frictionless scenarios without bleeding-edge supply chains.</p>\r\n',5,5);
/*!40000 ALTER TABLE `QuestionariosMeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuestionariosRespostas`
--

DROP TABLE IF EXISTS `QuestionariosRespostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuestionariosRespostas` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CadastrosId` bigint(20) NOT NULL,
  `QuestionariosMetaId` bigint(20) NOT NULL,
  `Valor` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuestionariosRespostas`
--

LOCK TABLES `QuestionariosRespostas` WRITE;
/*!40000 ALTER TABLE `QuestionariosRespostas` DISABLE KEYS */;
INSERT INTO `QuestionariosRespostas` VALUES (12,1,1,5),(13,1,2,5),(14,1,4,4),(15,1,5,5),(17,1,6,5);
/*!40000 ALTER TABLE `QuestionariosRespostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Secoes`
--

DROP TABLE IF EXISTS `Secoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Secoes` (
  `uuid` char(32) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `PaiId` bigint(20) DEFAULT '0',
  `FilhoId` bigint(20) DEFAULT '0',
  `Grupos` varchar(255) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Texto` longtext,
  `Cabecalho` text,
  `Modulo` varchar(255) DEFAULT 'Conteudos',
  `Rodape` text,
  `Formato` varchar(255) DEFAULT 'pagina',
  `Uri` varchar(255) DEFAULT 'pagina.php',
  `Diretorio` varchar(255) DEFAULT NULL,
  `Target` varchar(10) DEFAULT '_self',
  `Ordem` int(10) DEFAULT '0',
  `Sidebar` int(1) DEFAULT '0',
  `Privado` int(1) DEFAULT '0',
  `Situacao` int(1) DEFAULT '1',
  `Arquivado` int(1) DEFAULT '0',
  `CriacaoUsuarioId` bigint(20) DEFAULT NULL,
  `CriacaoDataHora` datetime DEFAULT NULL,
  `AtualizacaoUsuarioId` bigint(20) DEFAULT NULL,
  `AtualizacaoDataHora` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Slug` (`Slug`),
  KEY `SecaoPaiId` (`PaiId`),
  KEY `SecaoFilhoId` (`FilhoId`),
  FULLTEXT KEY `Grupos` (`Grupos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Secoes`
--

LOCK TABLES `Secoes` WRITE;
/*!40000 ALTER TABLE `Secoes` DISABLE KEYS */;
INSERT INTO `Secoes` VALUES ('a73fc500-a39f-5d6c-4973-740f1556',1,0,0,NULL,'Home','home','<p class=\\\"text-center\\\"><img alt=\\\"\\\" src=\\\"/dados/editor/image/Bira_Carvalho(3).png\\\" style=\\\"width: 500px; height: 500px;\\\" /></p>\r\n','','Secoes','','','pagina.php',NULL,'_self',0,0,0,1,0,NULL,NULL,NULL,NULL),('a32d715c-5976-6e55-0164-6d411e83',2,0,0,NULL,'Questionários Alinhar','questionarios-alinhar','','','Questionarios','','questionario-alinhar','pagina.php',NULL,'_self',0,0,0,1,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Secoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SistemaGrupos`
--

DROP TABLE IF EXISTS `SistemaGrupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SistemaGrupos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Descricao` text NOT NULL,
  `Situacao` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Slug` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SistemaGrupos`
--

LOCK TABLES `SistemaGrupos` WRITE;
/*!40000 ALTER TABLE `SistemaGrupos` DISABLE KEYS */;
INSERT INTO `SistemaGrupos` VALUES (1,'Administradores','administradores','',1),(2,'Usuários','usuarios','',1);
/*!40000 ALTER TABLE `SistemaGrupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SistemaMenu`
--

DROP TABLE IF EXISTS `SistemaMenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SistemaMenu` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `PaiId` bigint(20) DEFAULT '0',
  `Grupos` varchar(255) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Target` varchar(255) DEFAULT NULL,
  `Situacao` int(1) NOT NULL DEFAULT '1',
  `Privado` int(1) NOT NULL DEFAULT '0',
  `Arquivado` int(1) NOT NULL DEFAULT '0',
  `Ordem` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10021 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SistemaMenu`
--

LOCK TABLES `SistemaMenu` WRITE;
/*!40000 ALTER TABLE `SistemaMenu` DISABLE KEYS */;
INSERT INTO `SistemaMenu` VALUES (100,0,'1,2','Conteudos','Conteudos','_self',1,0,0,0),(110,0,'1,2','Questionários','Questionarios','_self',1,0,0,0),(120,0,'1,2','Cadastros','Cadastros','_self',1,0,0,0),(200,0,'1,2','Seções','Secoes','_self',1,0,0,0),(900,0,'1','Usuários','SistemaUsuarios','_self',1,0,0,0),(910,0,'1','Configurações','Configuracoes','_self',1,0,0,0),(10000,0,'0','Manutenção','Manutencao','_self',1,0,0,0),(10001,10000,'0','Configurações','SistemaConfiguracoes','_self',1,0,0,0),(10020,10000,'0','Grupos','SistemaGrupos','_self',1,0,0,0);
/*!40000 ALTER TABLE `SistemaMenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SistemaUsuarios`
--

DROP TABLE IF EXISTS `SistemaUsuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SistemaUsuarios` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `SistemaGruposId` bigint(20) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Situacao` int(1) NOT NULL DEFAULT '1',
  `Arquivado` int(1) NOT NULL DEFAULT '0',
  `Criacao` datetime NOT NULL,
  `Atualizacao` datetime NOT NULL,
  `AtualizacaoUsuarioId` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Chave` (`uuid`),
  UNIQUE KEY `Login` (`Login`),
  KEY `AdminGruposId` (`SistemaGruposId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SistemaUsuarios`
--

LOCK TABLES `SistemaUsuarios` WRITE;
/*!40000 ALTER TABLE `SistemaUsuarios` DISABLE KEYS */;
INSERT INTO `SistemaUsuarios` VALUES ('61099e6c-8c70-9270-5bbf-5ffb5727f9e3',1,1,'birah','Ubiratã Carvalho Nogueira','bira@gosites.com.br','c2a48cab5da6a8c0b7f5b2ab6672e8e0',1,0,'2017-12-07 21:07:21','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `SistemaUsuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-19  1:57:46
