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
  `Senha` varchar(255) NOT NULL,
  `Situacao` int(1) NOT NULL DEFAULT '1',
  `Arquivado` int(1) NOT NULL DEFAULT '0',
  `Ip` varchar(15) NOT NULL,
  `Agente` text NOT NULL,
  `Criacao` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cadastros`
--

LOCK TABLES `Cadastros` WRITE;
/*!40000 ALTER TABLE `Cadastros` DISABLE KEYS */;
INSERT INTO `Cadastros` VALUES ('c0467c25-43a3-231b-57a2-54aa545d0e19',1,'Ubiratã Carvalho Nogueira','bira@biracarvalho.com.br','(62) 98331-3227','Credibly syndicate strategic imperatives and low-risk high-yield alignments. Authoritatively cultivate cross functional niches before sticky materials. Proactively enable pandemic content for enterprise-wide action items. Phosfluorescently.','$2y$10$/U5LfrQ8ZcdoHXW4Q0zo3Ox0pBeJQOU.XBCduaZythisVrCGcdecK',1,0,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0','0000-00-00 00:00:00'),('093c8470-dfc3-6db8-547f-405e3e76145d',2,'Ubirajara Carvalho Nogueira','jaracarvalho@hotmail.com','(19) 99652-2222','','$2y$10$9vly9agHNjS/tou789XhvevLxO8gzUrUZpKmTrneJQfOn5sk9docW',1,0,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0','0000-00-00 00:00:00'),('26e81311-8ec6-1603-6802-1cd8e32d25af',3,'Lia Isumi','lia@labe.cx','(11) 98625-4666','','$2y$10$zjUzzx7FfmeVn0qBdEEn4ecvs43f743lLwjnLWsLov3tTplW660iK',1,0,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0','2019-03-21 22:55:27');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Conteudos`
--

LOCK TABLES `Conteudos` WRITE;
/*!40000 ALTER TABLE `Conteudos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grupos`
--

LOCK TABLES `Grupos` WRITE;
/*!40000 ALTER TABLE `Grupos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questionarios`
--

LOCK TABLES `Questionarios` WRITE;
/*!40000 ALTER TABLE `Questionarios` DISABLE KEYS */;
INSERT INTO `Questionarios` VALUES ('083012aa-0cdb-43e8-72ac-3644cd8b3ebf',1,NULL,'2','Questionário Individual','individual','0000-00-00','','',10,0,1,0,0,0,'2019-03-29 21:57:12',NULL);
/*!40000 ALTER TABLE `Questionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuestionariosConclusoes`
--

DROP TABLE IF EXISTS `QuestionariosConclusoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuestionariosConclusoes` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CadastrosId` bigint(20) NOT NULL,
  `Texto1` text NOT NULL,
  `Texto2` text NOT NULL,
  `Texto3` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuestionariosConclusoes`
--

LOCK TABLES `QuestionariosConclusoes` WRITE;
/*!40000 ALTER TABLE `QuestionariosConclusoes` DISABLE KEYS */;
INSERT INTO `QuestionariosConclusoes` VALUES ('74d38367-3d07-6a26-fd74-316220732777',9,1,'Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. Modo etiam paulum ad dexteram de via declinavi, ut ad Pericli sepulcrum accederem. Iubet igitur nos Pythius Apollo noscere nosmet ipsos. Haec para/doca illi, nos admirabilia dicamus. Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. ','Hos contra singulos dici est melius. Verba tu fingas et ea dicas, quae non sentias? Duo Reges: constructio interrete. Sin te auctoritas commovebat, nobisne omnibus et Platoni ipsi nescio quem illum anteponebas? Certe non potest. Idem iste, inquam, de voluptate quid sentit? ','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Modo etiam paulum ad dexteram de via declinavi, ut ad Pericli sepulcrum accederem. Sin autem ad animum, falsum est, quod negas animi ullum esse gaudium, quod non referatur ad corpus. Ad corpus diceres pertinere-, sed ea, quae dixi, ad corpusne refers? Duo Reges: constructio interrete. Haec quo modo conveniant, non sane intellego. Quid ergo aliud intellegetur nisi uti ne quae pars naturae neglegatur? \r\n\r\nIgitur neque stultorum quisquam beatus neque sapientium non beatus. Non enim ipsa genuit hominem, sed accepit a natura inchoatum. Qua ex cognitione facilior facta est investigatio rerum occultissimarum. Est igitur officium eius generis, quod nec in bonis ponatur nec in contrariis. Quod, inquit, quamquam voluptatibus quibusdam est saepe iucundius, tamen expetitur propter voluptatem. Erit enim mecum, si tecum erit. Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? \r\n'),('c3a6f998-2a74-11c2-ab96-b067d425f2b8',10,2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Transfer idem ad modestiam vel temperantiam, quae est moderatio cupiditatum rationi oboediens. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. Non autem hoc: igitur ne illud quidem. Neque solum ea communia, verum etiam paria esse dixerunt. Duo Reges: constructio interrete. Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; De vacuitate doloris eadem sententia erit. Tecum optime, deinde etiam cum mediocri amico. Cupiditates non Epicuri divisione finiebat, sed sua satietate. Nam prius a se poterit quisque discedere quam appetitum earum rerum, quae sibi conducant, amittere. \r\n\r\nAtqui perspicuum est hominem e corpore animoque constare, cum primae sint animi partes, secundae corporis. Nihil opus est exemplis hoc facere longius. Murenam te accusante defenderem. Huic ego, si negaret quicquam interesse ad beate vivendum quali uteretur victu, concederem, laudarem etiam; \r\n\r\n','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facile est hoc cernere in primis puerorum aetatulis. His similes sunt omnes, qui virtuti student levantur vitiis, levantur erroribus, nisi forte censes Ti. Sed ille, ut dixi, vitiose. Duo Reges: constructio interrete. Sic enim censent, oportunitatis esse beate vivere. Quamquam haec quidem praeposita recte et reiecta dicere licebit. Quid turpius quam sapientis vitam ex insipientium sermone pendere? Non enim ipsa genuit hominem, sed accepit a natura inchoatum. Est enim effectrix multarum et magnarum voluptatum. \r\n\r\nCum id fugiunt, re eadem defendunt, quae Peripatetici, verba. Primum cur ista res digna odio est, nisi quod est turpis? Quasi ego id curem, quid ille aiat aut neget. Sin laboramus, quis est, qui alienae modum statuat industriae? Ut non sine causa ex iis memoriae ducta sit disciplina. Quod ea non occurrentia fingunt, vincunt Aristonem; Quid ait Aristoteles reliquique Platonis alumni? Praeterea sublata cognitione et scientia tollitur omnis ratio et vitae degendae et rerum gerendarum. Eadem nunc mea adversum te oratio est. Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? Quae autem natura suae primae institutionis oblita est? \r\n\r\n','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Licet hic rursus ea commemores, quae optimis verbis ab Epicuro de laude amicitiae dicta sunt. Huius ego nunc auctoritatem sequens idem faciam. Causa autem fuit huc veniendi ut quosdam hinc libros promerem. Idemque diviserunt naturam hominis in animum et corpus. Si quae forte-possumus. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Duo Reges: constructio interrete. \r\n\r\nPlane idem, inquit, et maxima quidem, qua fieri nulla maior potest. Fortemne possumus dicere eundem illum Torquatum? Negat esse eam, inquit, propter se expetendam. Hoc est non modo cor non habere, sed ne palatum quidem. Expressa vero in iis aetatibus, quae iam confirmatae sunt. Et quidem Arcesilas tuus, etsi fuit in disserendo pertinacior, tamen noster fuit; Superiores tres erant, quae esse possent, quarum est una sola defensa, eaque vehementer. Nam Pyrrho, Aristo, Erillus iam diu abiecti. \r\n\r\n');
/*!40000 ALTER TABLE `QuestionariosConclusoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuestionariosPerguntas`
--

DROP TABLE IF EXISTS `QuestionariosPerguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuestionariosPerguntas` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `QuestionariosId` bigint(20) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Texto` longtext,
  `Ordem` int(11) DEFAULT '0',
  `Agrupamento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ConteudosId` (`QuestionariosId`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuestionariosPerguntas`
--

LOCK TABLES `QuestionariosPerguntas` WRITE;
/*!40000 ALTER TABLE `QuestionariosPerguntas` DISABLE KEYS */;
INSERT INTO `QuestionariosPerguntas` VALUES ('e4476080-77c0-fdf5-b9a5-4bc23d545623',1,1,'Você tem respeito e carinho por você e pelo que possui','',1,'1'),('a42dda63-bc3a-1cb3-70b5-df71a845ea53',2,1,'A compaixão está presente nas suas relações e decisões','',2,'1'),('282fd344-5cc3-e8ea-9090-f77090ad1ba7',3,1,'Você sente entusiasmo e alegria nas atividades que executa','',3,'1'),('e9533b2a-d407-ab02-d11e-7342ded775ae',4,1,'O altruísmo faz parte da sua forma de ser ','',4,'1'),('15114222-5364-47bd-e272-98fe3415c611',5,1,'O auto perdão e o perdão aos outros é uma prática na sua vida','',5,'1'),('3de7e722-88a9-c469-01d5-ab33062762a8',6,1,'Você tem uma clara definição dos seus  Valores.','',6,'2'),('e67c5954-bca7-7923-22b9-13fda608dc5f',7,1,'Você tem uma clara, compreensiva e motivadora definição do seu  Propósito.','',7,'2'),('2e1284e3-c272-5fa7-78f8-4f01f4365a89',8,1,'Sua visão de futuro inspira pessoas ','',8,'2'),('0ce1b084-c1a8-d4d9-6725-706f1003906a',9,1,'As suas  decisões e ações tomadas levam em conta o impacto nas outras pessoas e  na sociedade  ','',9,'2'),('3b741a4a-bcdf-394a-f81c-fa833091f54a',10,1,'A intuição é relevante nos seus processos decisórios','',10,'2'),('c1da194a-fddb-a46a-1a10-c5699ac80337',11,1,'A ampliação da sua consciência é uma busca constante','',11,'3'),('5b76da7e-5acf-a8f7-e969-0d71dc769726',12,1,'As suas atividades do dia a dia são atreladas a sua a Visão de Futuro','',12,'3'),('aaf7570b-a303-4a5f-4f5e-21f4d9da7a4f',13,1,'Os seus comportamentos são congruentes aos seus Valores.','',13,'3'),('ad527082-6893-5b5e-0ecb-04751261924f',14,1,'Você utilizada seu propósito como guia das decisões e ações com foco no seu futuro.','',14,'3'),('d2ebd7b4-3e0e-8ec1-85a3-0ad0fef08b21',15,1,'A gratidão é parte constante da sua vida.','',15,'3'),('05c3a8c9-4f60-33f3-97e4-7bfc6dd9ab17',16,1,'O sentimento generalizado de respeito mútuo e confiança tem se estendido a todos com quem você se relaciona.','',16,'4'),('634d6124-4703-64a5-14f6-54e9d5662b7f',17,1,'A comunicação e o “feed-back” com seus pares são considerados importantes nas suas decisões e definições.  ','',17,'4'),('63c7bcd5-8b5b-2973-9c3e-7ecac2918c70',18,1,'Você busca a empatia em todos os seus relacionamentos.','',17,'4'),('015b39df-bfcf-e1cb-79cc-ce4310fec9f7',19,1,'Cocriação é parte do seu processo de inovação','',19,'4'),('dd1d6329-0c11-1a26-0b46-c31daefaaf61',20,1,'A Interação com pessoas de diferentes pontos de vista, raça, religião, credo, nacionalidade, opção sexual, nível social e educacional favorecem o seu desenvolvimento','',20,'4'),('be173e4f-e5b6-d73b-ee6e-5f214fd2e5e3',21,1,'Em seus relacionamentos, você deixa espaço suficiente para que a outra pessoa possa trair a sua confiança.','',21,'5'),('ac219cf3-f1bf-bcd4-ff2a-9464fe6ec1e0',22,1,'Você se utiliza de algum mecanismos para identificar sua performance, acertos e erros.','',22,'5'),('7d3e6001-4691-0f18-2d40-d21d36dfaa4e',23,1,'As desculpas não fazem parte do que você deseja fazer','',23,'5'),('91e441ea-6a15-b65a-efbe-e9d2232f9145',24,1,'Compromisso assumido  é compromisso cumprido','',24,'5'),('14fe92d9-2e27-3bd2-c462-c754e9933c8f',25,1,'Aprendizagem é considerada por você como aquisição de conhecimento, fortalecimento de competências e transformação na forma de ser.','',25,'5'),('35a48a83-3a03-da9a-4677-fb5c9d61f1b7',26,1,'Você é reconhecido por buscar sempre novas soluções, novas ações','',26,'6'),('6da82705-c9d8-a725-78a3-85faa2afc05f',27,1,'Você aceita os riscos nas suas atitudes e tem um senso de que \\\"tudo é possível\\\" ','',27,'6'),('4406349e-e162-251c-85f3-b5ec483109e0',28,1,'Você considera uma boa dose de comportamento aleatório nas suas ações.','',28,'6'),('57d8b1b8-8fbf-bddf-3f99-321a2641d07e',29,1,'Criatividade e prazer são fatores importantes nas suas decisões ','',29,'6'),('68d77e11-c1ec-2a75-d20a-90562505a990',30,1,'Nas suas decisões você trabalha para fortalecer sua coragem frente ao medo','',30,'6'),('36d272bc-f620-722b-159e-3d7e013f715d',31,1,'Você possui uma vida boa e feliz','',31,'7'),('c84a2e6c-69d9-69f4-8fb3-37358549a278',32,1,'Você se considera uma pessoa próspera ','',32,'7'),('48732980-acfa-12c8-c28f-d918cdb1ca42',33,1,'Você corrige as atividades que não obtiveram sucesso e celebra as conquistas alcançadas','',33,'7'),('551dc920-5290-b44c-7d48-818eae9fe8a1',34,1,'Você possui uma vida saudável ','',34,'7'),('f3c5cdbb-4999-4598-1ee5-204087b54d0b',35,1,'Os seus resultados financeiros refletem os esforços empenhados e lhe dão segurança','',35,'7');
/*!40000 ALTER TABLE `QuestionariosPerguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuestionariosRespostas`
--

DROP TABLE IF EXISTS `QuestionariosRespostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuestionariosRespostas` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CadastrosId` bigint(20) NOT NULL,
  `QuestionariosPerguntasId` bigint(20) NOT NULL,
  `Valor` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `QuestionariosPerguntasId` (`QuestionariosPerguntasId`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuestionariosRespostas`
--

LOCK TABLES `QuestionariosRespostas` WRITE;
/*!40000 ALTER TABLE `QuestionariosRespostas` DISABLE KEYS */;
INSERT INTO `QuestionariosRespostas` VALUES ('77bac0dc-c625-6b47-ee6d-25ad88e8ba2c',1,1,30,4),('315fe4bc-e7ca-f89b-c776-cb5ed1749c3b',2,1,31,4),('50285497-af2e-2df6-8d5f-4ace94fdd955',3,1,34,5),('20ab83c7-b7e7-2335-0356-ae14b90c5236',4,1,1,5),('c09b90a3-bc44-cef1-ef50-e1a1a636bf52',5,1,2,5),('cc100dfb-5651-a3e8-5403-61872daf25a2',6,1,3,6),('ea2d80e5-f62a-4360-d518-f606843fbf16',7,1,4,5),('d3138ed9-a527-8d35-9bb2-9dc369a2b5fc',8,1,5,5),('6ce14871-abb8-5fee-961f-53be0cb2cb64',9,1,6,4),('6d45ec74-ff97-08f4-15d4-f98b73aa0c4a',10,1,7,7),('be0ef2e1-46a7-d372-650e-000784bd37be',11,1,8,4),('aae08174-3484-59f4-097a-0053af86c56b',12,1,9,5),('eebcae1e-2917-d462-848d-386200ded04c',13,1,10,8),('ceb0331d-9377-46b1-9d33-86be66c084d4',14,1,11,5),('fff2872c-f863-b6e9-8aec-00395e961df1',15,1,12,6),('320dceb8-865b-701a-aaae-ae6f56506ee3',16,1,13,4),('1f5d90e2-ed13-c0c7-45bb-cca81dd359e5',17,1,14,4),('57de2146-653e-1615-aab9-60d041ab0b73',18,1,15,7),('6715762c-e067-d91d-537d-0468de79fb7e',19,1,16,8),('af84abe4-4e3d-4d05-f409-ca64b68074a8',20,1,17,7),('9663c52d-f9d3-9182-0fae-99d4f0cf8ffc',21,1,18,5),('e4767ac8-e809-9f04-dbe7-5fc2403e8fef',22,1,19,4),('679f3636-dbf7-5952-ad60-f0a715586089',23,1,20,6),('d4a23da9-972c-e66c-b98f-85fedc4bc97a',24,1,21,6),('4b5843af-815a-4f79-7892-c2292d90c920',25,1,22,5),('82f54a40-ddaa-88d5-771c-1499e682c453',26,1,23,7),('a3cf7a68-d32e-2f65-64ef-faccb9b63387',27,1,24,5),('f82f6c9b-91d8-5577-6d5d-5c09dca01aeb',28,1,25,5),('4698aa9f-bc79-47e6-848a-cafffb49af22',29,1,26,6),('c2044258-a927-d33c-ad8c-0ff3bbb52c8c',30,1,33,5),('323561b6-49ed-77cd-e8e1-a9959ac044e6',31,1,32,6),('5ceb3271-5ab6-f7e1-2441-ce8e420e09af',32,1,35,4),('c06ed064-080c-f46e-23ce-92b71451187c',33,1,28,5),('e739c6c3-30b6-ddbd-61f7-fdec3c8c0f81',34,1,29,5),('2a00a074-c472-76ae-4e15-a8432bff0c8f',35,1,27,6),('e4897206-3b82-acc7-5429-0ed35076af97',36,2,35,5),('2d9a8126-31fe-893d-ee95-938436a3822b',37,2,34,5),('c554d744-258d-c765-53e2-a89e92e2a8f2',38,2,33,5),('ebf62bba-8842-1db2-bf69-df397e2e1078',39,2,32,5),('cde451fd-cf25-61cb-3fe4-1e21bdbce9ed',40,2,31,5),('bb0ca459-0668-7d2d-17b7-46f86e5f58ae',41,2,30,5),('58c4fca4-0c37-7f1a-b1cf-0f66a6204856',42,2,29,5),('7c37dd43-b6f3-e08d-7688-ea4d1220863b',43,2,28,5),('5a3ad3cc-e409-8c52-01ff-db953ebb3127',44,2,27,5),('f9ca63ad-ac81-a0d9-f71d-cab102f218c1',45,2,26,5),('792d27db-d34c-c6bd-a63c-b76ee6639172',46,2,25,5),('9a4977b9-b909-73c4-14a8-73f5fe4b9ad4',47,2,24,5),('3980484b-27dc-4dca-4bfe-1907817b342c',48,2,23,5),('d5524b00-0e2e-4877-8228-2c4abfec677c',49,2,22,5),('bff373c7-e5fc-0ee1-0eaa-290837f77f7f',50,2,21,5),('8770f113-67c7-1f28-c57e-23c91b14ef78',51,2,20,5),('a909b5c4-d44d-cfff-766d-ac666e012a26',52,2,19,5),('99402ae2-c0a2-2530-6440-701e1abe2dbe',53,2,18,5),('f79b78d0-da50-c3a2-d122-d9eb93ece8b3',54,2,17,5),('aba3e4cb-baf3-8f7c-738a-7a9957a834b3',55,2,16,5),('bf4c6753-7c0e-1b98-34c7-1c6e4c867af9',56,2,15,5),('d67ab9d5-14f2-2ffd-d360-ed405b625245',57,2,14,5),('5075d786-fe88-c9ce-3a6f-1a3d1de19563',58,2,13,5),('89555001-e99e-7d54-8de5-bf1f9a70af38',59,2,12,5),('3df0e5f5-d6c5-f833-a575-513a6b0351c2',60,2,11,5),('a089cece-41a6-f1bb-5cd6-e9ec3f475438',61,2,10,5),('801c5a65-6207-b076-d9b9-6d9e2c055be7',62,2,9,5),('ff492073-e9f9-ea83-0f59-82cb6508a4b2',63,2,8,5),('6919653b-99bd-1e96-a1b6-f86df207d5b5',64,2,7,5),('efda1a85-fa83-0d2c-37e9-5eaf2a6d3c2c',65,2,6,5),('0adb238b-86b0-7fd5-84ef-1e48e347fa86',66,2,5,5),('1aae0d89-1bde-413e-b4d8-4e3eda97c041',67,2,4,5),('cf568115-6e55-08b8-46a9-0d55a58c043d',68,2,3,5),('10d57b6b-9114-a96d-4dd2-b6548ca36ef8',69,2,2,5),('434a1802-f095-81d0-b31f-abafa20a2ea4',70,2,1,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Secoes`
--

LOCK TABLES `Secoes` WRITE;
/*!40000 ALTER TABLE `Secoes` DISABLE KEYS */;
INSERT INTO `Secoes` VALUES ('a73fc500-a39f-5d6c-4973-740f1556',1,0,0,NULL,'Home','home','<p class=\\\"text-center\\\"><img alt=\\\"\\\" class=\\\"img-fluid\\\" src=\\\"/dados/editor/image/Screenshot_20190217223657_379x317.png\\\" /></p>\r\n\r\n<p class=\\\"text-center\\\"><a class=\\\"btn btn-lg btn-success p-2 mt-5\\\" href=\\\"/questionarios-alinhar/modelo\\\">Question&aacute;rio</a></p>\r\n','','Secoes','','','pagina.php',NULL,'_self',0,0,0,1,0,NULL,NULL,NULL,NULL),('a32d715c-5976-6e55-0164-6d411e83',2,0,0,NULL,'Questionários Alinhar','questionarios-alinhar','','','Questionarios','','questionario-alinhar','questionario.php',NULL,'_self',0,0,1,1,0,NULL,NULL,NULL,NULL),('a73a9ff9-70a8-7727-d808-8560d5f2',3,0,0,NULL,'Login','login','','','Cadastros','','cadastros-login','pagina.php',NULL,'_self',0,0,0,1,0,NULL,NULL,NULL,NULL),('09bd80e5-4ef7-d251-af55-f49658cc',4,0,0,NULL,'Autenticacao','autenticacao','','','Cadastros','','cadastros-autenticacao','blank.php',NULL,'_self',0,0,0,1,0,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2019-04-01  2:04:17
