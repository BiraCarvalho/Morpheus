-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `Triconsult`;

DROP TABLE IF EXISTS `Cadastros`;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `Cadastros` (`uuid`, `Id`, `Nome`, `Email`, `Telefone`, `Observacoes`, `Senha`, `Situacao`, `Arquivado`, `Ip`, `Agente`, `Criacao`) VALUES
('c0467c25-43a3-231b-57a2-54aa545d0e19',	1,	'Ubiratã Carvalho Nogueira',	'bira@biracarvalho.com.br',	'(62) 98331-3227',	'Credibly syndicate strategic imperatives and low-risk high-yield alignments. Authoritatively cultivate cross functional niches before sticky materials. Proactively enable pandemic content for enterprise-wide action items. Phosfluorescently.',	'$2y$10$/U5LfrQ8ZcdoHXW4Q0zo3Ox0pBeJQOU.XBCduaZythisVrCGcdecK',	1,	0,	'127.0.0.1',	'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0',	'0000-00-00 00:00:00'),
('093c8470-dfc3-6db8-547f-405e3e76145d',	2,	'Ubirajara Carvalho Nogueira',	'jaracarvalho@hotmail.com',	'(19) 99652-2222',	'',	'$2y$10$9vly9agHNjS/tou789XhvevLxO8gzUrUZpKmTrneJQfOn5sk9docW',	1,	0,	'127.0.0.1',	'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0',	'0000-00-00 00:00:00'),
('26e81311-8ec6-1603-6802-1cd8e32d25af',	3,	'Lia Isumi',	'lia@labe.cx',	'(11) 98625-4666',	'',	'$2y$10$zjUzzx7FfmeVn0qBdEEn4ecvs43f743lLwjnLWsLov3tTplW660iK',	1,	0,	'127.0.0.1',	'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0',	'2019-03-21 22:55:27'),
('83eac5e5-12b7-04d0-d8ad-354a6771649c',	17,	'Ubiratã Carvalho Nogueira',	'adm@biracarvalho.com.br',	'',	'',	'$2y$10$we8cl7o1mf/qR0CdoEc/s.033j.0ufqb9InxiXaC5y0nr2tqIfR5.',	0,	1,	'127.0.0.1',	'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0',	'2019-04-08 21:00:07');

DROP TABLE IF EXISTS `Configuracoes`;
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

INSERT INTO `Configuracoes` (`Id`, `uuid`, `Tipo`, `Grupo`, `Slug`, `Titulo`, `Descricao`, `Valor`, `Ordem`, `Exibir`, `Arquivado`, `Situacao`, `Criacao`, `Atualizacao`, `AlteracaoUsuarioId`) VALUES
(1,	'bd722969-0200-11e8-aa85-08002750d3e2',	'varchar',	1,	'url',	'URL do Site',	'',	'http://biracarvalho.com.br/triconsult',	0,	1,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(2,	'',	'varchar',	3,	'googleRecaptchaPrivateKey',	'Google Recaptcha Private Key',	'Chave privada da api do Google Recaptcha.',	'6LccA50UAAAAAAUvaXoMqS49dslmzibBtCbiIlpO',	0,	0,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(3,	'bd722b6f-0200-11e8-aa85-08002750d3e2',	'varchar',	3,	'googleAnalytics',	'Google Analytics Code',	'',	'XX-000000-00',	0,	1,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(4,	'bd722bc2-0200-11e8-aa85-08002750d3e2',	'varchar',	1,	'dominio',	'Domínio',	'',	'biracarvalho.com.br',	0,	1,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(5,	'bd722e2e-0200-11e8-aa85-08002750d3e2',	'varchar',	1,	'siteTitulo',	'Título do Site',	'',	'Bira Carvalho - Desenvolvedor Web',	0,	1,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(6,	'bd722eb7-0200-11e8-aa85-08002750d3e2',	'varchar',	2,	'emailContato',	'Email de Contato',	'Endereço de email para onde serão enviados as mensagens do formulários de contato do site.',	'',	0,	1,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(7,	'bd722f08-0200-11e8-aa85-08002750d3e2',	'varchar',	3,	'googleRecaptchaPubliqueKey',	'Google Recaptcha Publique Key',	'Chave publica para api do Google Recaptcha.',	'6LccA50UAAAAAOLuQIWI2aZuQCNa67ugPY4jjK4M',	0,	0,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(8,	'bd722f57-0200-11e8-aa85-08002750d3e2',	'varchar',	2,	'phpmailerUsuario',	'PHPMailer - Usuário',	'Usuário da conta de email utilizada para autenticar o envio de emails do site.',	'',	2,	0,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(9,	'bd722fa7-0200-11e8-aa85-08002750d3e2',	'varchar',	2,	'phpmailerDominio',	'PHPMailer - Domínio',	'',	'',	3,	0,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(10,	'bd722ff0-0200-11e8-aa85-08002750d3e2',	'varchar',	2,	'phpmailerSenha',	'PHPMailer - Senha',	'',	'',	4,	0,	0,	1,	'2018-01-25 16:45:02',	'2018-01-25 16:45:02',	1),
(18,	'6e77890a-c89e-e5b2-7086-b88930e7f21c',	'varchar',	1,	'siteTelefone',	'Telefone',	'',	'',	11,	1,	0,	1,	'2018-01-30 19:00:05',	'0000-00-00 00:00:00',	1);

DROP TABLE IF EXISTS `ConfiguracoesGrupos`;
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

INSERT INTO `ConfiguracoesGrupos` (`Id`, `Titulo`, `Slug`, `Descricao`, `Ordem`, `Situacao`) VALUES
(1,	'Site',	'site',	'Informações básicas do site',	0,	1),
(2,	'Emails',	'emails',	'Dados para envio de emails',	0,	1),
(3,	'Google',	'google',	'Dados de conexão com serviços da Google',	0,	1);

DROP TABLE IF EXISTS `Conteudos`;
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


DROP TABLE IF EXISTS `ConteudosMeta`;
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


DROP TABLE IF EXISTS `Grupos`;
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


DROP TABLE IF EXISTS `Midias`;
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


DROP TABLE IF EXISTS `Questionarios`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `Questionarios` (`uuid`, `Id`, `Grupos`, `Secoes`, `Titulo`, `Slug`, `Data`, `Resumo`, `Texto`, `Escala`, `Destaque`, `Situacao`, `Privado`, `Arquivado`, `Ordem`, `Atualizacao`, `AtualizacaoUsuarioId`) VALUES
('083012aa-0cdb-43e8-72ac-3644cd8b3ebf',	1,	'',	'2',	'Questionário Individual',	'individual',	'0000-00-00',	'',	'',	10,	0,	1,	0,	0,	0,	'2019-04-10 16:51:25',	1),
('56058b57-b65a-cb57-49a0-df5e8ce866e4',	2,	'',	'2',	'Organizacional',	'organizacional',	'0000-00-00',	'',	'',	10,	0,	1,	0,	0,	0,	'2019-04-10 16:50:11',	1),
('693aa0d6-3c38-77a9-25e3-a5fc5ee0c2e0',	3,	'',	'2',	'Família Empresarial',	'familia-empresarial',	'0000-00-00',	'',	'',	10,	0,	1,	0,	0,	0,	'2019-04-10 16:50:04',	1);

DROP TABLE IF EXISTS `QuestionariosConclusoes`;
CREATE TABLE `QuestionariosConclusoes` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CadastrosId` bigint(20) NOT NULL,
  `QuestionariosId` bigint(20) NOT NULL,
  `Texto1` text NOT NULL,
  `Texto2` text NOT NULL,
  `Texto3` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `QuestionariosConclusoes` (`uuid`, `Id`, `CadastrosId`, `QuestionariosId`, `Texto1`, `Texto2`, `Texto3`) VALUES
('74d38367-3d07-6a26-fd74-316220732777',	9,	1,	1,	'Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. Modo etiam paulum ad dexteram de via declinavi, ut ad Pericli sepulcrum accederem. Iubet igitur nos Pythius Apollo noscere nosmet ipsos. Haec para/doca illi, nos admirabilia dicamus. Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. ',	'Hos contra singulos dici est melius. Verba tu fingas et ea dicas, quae non sentias? Duo Reges: constructio interrete. Sin te auctoritas commovebat, nobisne omnibus et Platoni ipsi nescio quem illum anteponebas? Certe non potest. Idem iste, inquam, de voluptate quid sentit? ',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Modo etiam paulum ad dexteram de via declinavi, ut ad Pericli sepulcrum accederem. Sin autem ad animum, falsum est, quod negas animi ullum esse gaudium, quod non referatur ad corpus. Ad corpus diceres pertinere-, sed ea, quae dixi, ad corpusne refers? Duo Reges: constructio interrete. Haec quo modo conveniant, non sane intellego. Quid ergo aliud intellegetur nisi uti ne quae pars naturae neglegatur? \r\n\r\nIgitur neque stultorum quisquam beatus neque sapientium non beatus. Non enim ipsa genuit hominem, sed accepit a natura inchoatum. Qua ex cognitione facilior facta est investigatio rerum occultissimarum. Est igitur officium eius generis, quod nec in bonis ponatur nec in contrariis. Quod, inquit, quamquam voluptatibus quibusdam est saepe iucundius, tamen expetitur propter voluptatem. Erit enim mecum, si tecum erit. Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? \r\n'),
('c3a6f998-2a74-11c2-ab96-b067d425f2b8',	10,	2,	1,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Transfer idem ad modestiam vel temperantiam, quae est moderatio cupiditatum rationi oboediens. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. Non autem hoc: igitur ne illud quidem. Neque solum ea communia, verum etiam paria esse dixerunt. Duo Reges: constructio interrete. Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; De vacuitate doloris eadem sententia erit. Tecum optime, deinde etiam cum mediocri amico. Cupiditates non Epicuri divisione finiebat, sed sua satietate. Nam prius a se poterit quisque discedere quam appetitum earum rerum, quae sibi conducant, amittere. \r\n\r\nAtqui perspicuum est hominem e corpore animoque constare, cum primae sint animi partes, secundae corporis. Nihil opus est exemplis hoc facere longius. Murenam te accusante defenderem. Huic ego, si negaret quicquam interesse ad beate vivendum quali uteretur victu, concederem, laudarem etiam; \r\n\r\n',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facile est hoc cernere in primis puerorum aetatulis. His similes sunt omnes, qui virtuti student levantur vitiis, levantur erroribus, nisi forte censes Ti. Sed ille, ut dixi, vitiose. Duo Reges: constructio interrete. Sic enim censent, oportunitatis esse beate vivere. Quamquam haec quidem praeposita recte et reiecta dicere licebit. Quid turpius quam sapientis vitam ex insipientium sermone pendere? Non enim ipsa genuit hominem, sed accepit a natura inchoatum. Est enim effectrix multarum et magnarum voluptatum. \r\n\r\nCum id fugiunt, re eadem defendunt, quae Peripatetici, verba. Primum cur ista res digna odio est, nisi quod est turpis? Quasi ego id curem, quid ille aiat aut neget. Sin laboramus, quis est, qui alienae modum statuat industriae? Ut non sine causa ex iis memoriae ducta sit disciplina. Quod ea non occurrentia fingunt, vincunt Aristonem; Quid ait Aristoteles reliquique Platonis alumni? Praeterea sublata cognitione et scientia tollitur omnis ratio et vitae degendae et rerum gerendarum. Eadem nunc mea adversum te oratio est. Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? Quae autem natura suae primae institutionis oblita est? \r\n\r\n',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Licet hic rursus ea commemores, quae optimis verbis ab Epicuro de laude amicitiae dicta sunt. Huius ego nunc auctoritatem sequens idem faciam. Causa autem fuit huc veniendi ut quosdam hinc libros promerem. Idemque diviserunt naturam hominis in animum et corpus. Si quae forte-possumus. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Duo Reges: constructio interrete. \r\n\r\nPlane idem, inquit, et maxima quidem, qua fieri nulla maior potest. Fortemne possumus dicere eundem illum Torquatum? Negat esse eam, inquit, propter se expetendam. Hoc est non modo cor non habere, sed ne palatum quidem. Expressa vero in iis aetatibus, quae iam confirmatae sunt. Et quidem Arcesilas tuus, etsi fuit in disserendo pertinacior, tamen noster fuit; Superiores tres erant, quae esse possent, quarum est una sola defensa, eaque vehementer. Nam Pyrrho, Aristo, Erillus iam diu abiecti. \r\n\r\n'),
('a8fbae66-4bbf-8b90-35bd-98c2c7d299bb',	11,	1,	2,	'Turkey t-bone brisket tongue drumstick strip steak meatloaf.  Tenderloin pastrami kielbasa short loin andouille doner tongue, ground round tri-tip biltong.  Fatback doner rump sausage ribeye pork belly flank pork chop buffalo sirloin filet mignon pastrami pancetta beef.  Brisket bacon pork beef ribs ribeye, turducken pancetta hamburger tenderloin meatloaf prosciutto.  Hamburger tail sirloin sausage leberkas.  Shank prosciutto strip steak ball tip short ribs, chicken chuck boudin picanha venison turducken brisket kielbasa alcatra.  Fatback tongue bresaola swine pancetta.\r\n\r\nSalami shankle hamburger, pork tail ham prosciutto beef spare ribs cow jerky pastrami jowl meatball.  Rump leberkas andouille meatball shank pork belly tenderloin.  Alcatra bacon landjaeger turkey pork belly, boudin jerky buffalo.  Corned beef capicola tail flank, cow hamburger ball tip shoulder spare ribs ribeye ham short ribs.  Pastrami frankfurter shank cupim, andouille doner fatback salami.',	'Shoulder pastrami pork loin, tri-tip spare ribs ham hock meatball biltong.  Tongue andouille rump, kevin ribeye pork loin porchetta shank ham venison alcatra drumstick doner short loin.  Sirloin tenderloin spare ribs, boudin turkey chicken filet mignon beef ribs shank.  Flank bacon tenderloin short loin landjaeger cow.  Picanha sausage meatball leberkas cow capicola landjaeger prosciutto corned beef jerky beef tongue short ribs frankfurter shoulder.  Cow leberkas pork loin shankle short loin.\r\n\r\nKevin hamburger salami picanha meatball, pork belly brisket.  Spare ribs sausage kielbasa flank t-bone alcatra, strip steak turkey boudin meatloaf ham shank.  Alcatra frankfurter pork chop pancetta.  Ground round leberkas sausage pancetta salami meatloaf pastrami jowl sirloin.\r\n\r\nBuffalo shoulder tenderloin doner beef.  Pork belly pancetta capicola, pork loin landjaeger brisket pork cow hamburger burgdoggen fatback boudin jowl corned beef porchetta.  Ham boudin pork belly, fatback meatball tongue kielbasa prosciutto chicken burgdoggen alcatra.  Pork ham beef, pastrami capicola short loin spare ribs salami kielbasa buffalo drumstick turducken.  Jowl swine chicken ham, pancetta turducken andouille venison burgdoggen.\r\n\r\nSpare ribs pancetta bacon pig venison picanha.  Corned beef prosciutto ham hock pork jowl tail, pork belly strip steak cupim.  Burgdoggen pancetta spare ribs pork chop t-bone andouille beef ribs jerky turducken doner pork belly.  Chuck leberkas venison, buffalo brisket rump jowl picanha pig.  Ham hock shoulder jerky spare ribs, biltong tongue pork loin kielbasa andouille picanha.  Pork belly shoulder pork chop pancetta porchetta shank pork.\r\n\r\nPork andouille beef capicola filet mignon burgdoggen, swine porchetta landjaeger tri-tip ground round cow buffalo jowl.  Bresaola sirloin beef porchetta.  Doner pork belly turkey beef short loin andouille prosciutto kielbasa shank flank.  Sirloin ham hock shoulder turducken jowl prosciutto.  Shankle leberkas capicola tri-tip drumstick landjaeger t-bone ham.',	'Kevin pork loin short loin meatball jerky andouille pork chop leberkas landjaeger.  Filet mignon biltong ball tip pastrami, venison salami bresaola spare ribs shankle boudin frankfurter short ribs.  Andouille biltong venison pork belly, chuck sirloin pastrami ham burgdoggen porchetta spare ribs corned beef t-bone swine capicola.  Beef ribs shankle short loin, tenderloin strip steak beef landjaeger pork belly ham.\r\n\r\nPancetta pork chop jowl short loin, pastrami tri-tip cupim meatloaf swine brisket doner drumstick salami.  Jerky burgdoggen doner filet mignon ham hock ribeye.  T-bone rump picanha meatloaf strip steak short ribs burgdoggen tail pig cow frankfurter capicola.  Kevin shank short loin leberkas kielbasa tongue pastrami turducken pork ribeye beef cow strip steak chicken.\r\n\r\nDrumstick filet mignon boudin brisket porchetta.  Meatball jerky kielbasa, drumstick prosciutto pig ribeye pork loin tri-tip ham hock.  Kielbasa spare ribs drumstick, burgdoggen tail biltong chuck landjaeger prosciutto pork bacon sausage swine.  Meatball corned beef spare ribs picanha drumstick.  Strip steak ground round t-bone, beef ribs cupim drumstick buffalo.  Jowl meatloaf spare ribs t-bone ham salami shank bresaola ball tip pastrami.  Chuck porchetta biltong burgdoggen drumstick frankfurter brisket shoulder alcatra ham hock.\r\n\r\nPork chop drumstick ball tip pancetta, shoulder tail rump strip steak alcatra kevin pork loin spare ribs turkey andouille ground round.  Ribeye pancetta turducken kevin doner bresaola jerky venison tenderloin pork.  Pork belly alcatra tenderloin rump filet mignon boudin.  Pig chicken tail kielbasa, beef ribs fatback shank pastrami.  Swine beef ribs strip steak, brisket doner capicola boudin buffalo bacon.\r\n\r\nCow meatloaf frankfurter ball tip tri-tip sausage drumstick filet mignon kevin burgdoggen.  Shoulder kielbasa spare ribs jowl kevin bresaola brisket chuck picanha ball tip shank tail ham tongue.  Frankfurter shank bacon rump andouille.  Chicken pancetta shank ham short loin.  Prosciutto tenderloin beef ribs, tail ball tip flank t-bone.  Alcatra pork chop andouille, tri-tip corned beef meatball ribeye ham short ribs frankfurter prosciutto.'),
('9f641859-a366-cd68-870d-07cdbb3db39c',	12,	1,	3,	'Sanjuansaurus Symphyrophus Velocisaurus Aristosuchus Amargasaurus Histriasaurus Petrobrasaurus Rapator Podokesaurus Bravoceratops Mahakala Lufengosaurus Thecodontosaurus Heishansaurus Caseosaurus.\r\n\r\nCetiosauriscus Dromicosaurus Zupaysaurus Chinshakiangosaurus Microceratus Crosbysaurus Deinonychus Probactrosaurus Hypselospinus Tugulusaurus Eucnemesaurus Drusilasaura Avaceratops Gravitholus Libycosaurus.\r\n\r\nPachyrhinosaurus Coloradisaurus Denversaurus Sinraptor Philovenator Sauropelta Euhelopus Daemonosaurus Argentinosaurus Kaatedocus Eshanosaurus Helopus Ricardoestesia Taveirosaurus Chirostenotes.\r\n\r\n',	'Albisaurus Sinocalliopteryx Microsaurops Gobiceratops Centemodon Pararhabdodon Pachycephalosaurus Leipsanosaurus Mononykus Piatnitzkysaurus Wuerhosaurus Syntarsus Sacisaurus Zhejiangosaurus Olorotitan.\r\n\r\nNopcsaspondylus Tianchisaurus Sphenosuchus Dracovenator Sinornithoides Shuosaurus Cheneosaurus Eocursor Albertonykus Cathartesaura Sinopliosaurus Rinconsaurus Ugrosaurus Xixiposaurus Augustia.\r\n\r\nShixinggia Trialestes Wulagasaurus Clasmodosaurus Yueosaurus Aepisaurus Talos Bruhathkayosaurus Zatomus Ahshislepelta Trinisaura Tastavinsaurus Ponerosteus Paralititan Halticosaurus.\r\n\r\n',	'Enigmosaurus Ponerosteus Timimus Amygdalodon Epidexipteryx Omnivoropteryx Camptonotus Plateosauravus Zapsalis Pneumatoarthrus Aristosaurus Sauropelta Levnesovia Dryptosaurus Inosaurus.\r\n\r\nDystrophaeus Albertadromeus Australodocus Sauroniops Ankylosaurus Janenschia Epichirostenotes Gwyneddosaurus Pentaceratops Albalophosaurus Tribelesodon Cladeiodon Omeisaurus Ornithopsis Protohadros.\r\n\r\nQinlingosaurus Jubbulpuria Lucianosaurus Hypselospinus Deinonychus Pachycephalosaurus Anchisaurus Scleromochlus Atacamatitan Gongbusaurus Microvenator Bahariasaurus Eolambia Wintonotitan Spinophorosaurus.\r\n\r\n');

DROP TABLE IF EXISTS `QuestionariosPerguntas`;
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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

INSERT INTO `QuestionariosPerguntas` (`uuid`, `Id`, `QuestionariosId`, `Titulo`, `Texto`, `Ordem`, `Agrupamento`) VALUES
('e4476080-77c0-fdf5-b9a5-4bc23d545623',	1,	1,	'Você tem respeito e carinho por você e pelo que possui',	'',	1,	'1'),
('a42dda63-bc3a-1cb3-70b5-df71a845ea53',	2,	1,	'A compaixão está presente nas suas relações e decisões',	'',	2,	'1'),
('282fd344-5cc3-e8ea-9090-f77090ad1ba7',	3,	1,	'Você sente entusiasmo e alegria nas atividades que executa',	'',	3,	'1'),
('e9533b2a-d407-ab02-d11e-7342ded775ae',	4,	1,	'O altruísmo faz parte da sua forma de ser ',	'',	4,	'1'),
('15114222-5364-47bd-e272-98fe3415c611',	5,	1,	'O auto perdão e o perdão aos outros é uma prática na sua vida',	'',	5,	'1'),
('3de7e722-88a9-c469-01d5-ab33062762a8',	6,	1,	'Você tem uma clara definição dos seus  Valores.',	'',	6,	'2'),
('e67c5954-bca7-7923-22b9-13fda608dc5f',	7,	1,	'Você tem uma clara, compreensiva e motivadora definição do seu  Propósito.',	'',	7,	'2'),
('2e1284e3-c272-5fa7-78f8-4f01f4365a89',	8,	1,	'Sua visão de futuro inspira pessoas ',	'',	8,	'2'),
('0ce1b084-c1a8-d4d9-6725-706f1003906a',	9,	1,	'As suas  decisões e ações tomadas levam em conta o impacto nas outras pessoas e  na sociedade  ',	'',	9,	'2'),
('3b741a4a-bcdf-394a-f81c-fa833091f54a',	10,	1,	'A intuição é relevante nos seus processos decisórios',	'',	10,	'2'),
('c1da194a-fddb-a46a-1a10-c5699ac80337',	11,	1,	'A ampliação da sua consciência é uma busca constante',	'',	11,	'3'),
('5b76da7e-5acf-a8f7-e969-0d71dc769726',	12,	1,	'As suas atividades do dia a dia são atreladas a sua a Visão de Futuro',	'',	12,	'3'),
('aaf7570b-a303-4a5f-4f5e-21f4d9da7a4f',	13,	1,	'Os seus comportamentos são congruentes aos seus Valores.',	'',	13,	'3'),
('ad527082-6893-5b5e-0ecb-04751261924f',	14,	1,	'Você utilizada seu propósito como guia das decisões e ações com foco no seu futuro.',	'',	14,	'3'),
('d2ebd7b4-3e0e-8ec1-85a3-0ad0fef08b21',	15,	1,	'A gratidão é parte constante da sua vida.',	'',	15,	'3'),
('05c3a8c9-4f60-33f3-97e4-7bfc6dd9ab17',	16,	1,	'O sentimento generalizado de respeito mútuo e confiança tem se estendido a todos com quem você se relaciona.',	'',	16,	'4'),
('634d6124-4703-64a5-14f6-54e9d5662b7f',	17,	1,	'A comunicação e o “feed-back” com seus pares são considerados importantes nas suas decisões e definições.  ',	'',	17,	'4'),
('63c7bcd5-8b5b-2973-9c3e-7ecac2918c70',	18,	1,	'Você busca a empatia em todos os seus relacionamentos.',	'',	17,	'4'),
('015b39df-bfcf-e1cb-79cc-ce4310fec9f7',	19,	1,	'Cocriação é parte do seu processo de inovação',	'',	19,	'4'),
('dd1d6329-0c11-1a26-0b46-c31daefaaf61',	20,	1,	'A Interação com pessoas de diferentes pontos de vista, raça, religião, credo, nacionalidade, opção sexual, nível social e educacional favorecem o seu desenvolvimento',	'',	20,	'4'),
('be173e4f-e5b6-d73b-ee6e-5f214fd2e5e3',	21,	1,	'Em seus relacionamentos, você deixa espaço suficiente para que a outra pessoa possa trair a sua confiança.',	'',	21,	'5'),
('ac219cf3-f1bf-bcd4-ff2a-9464fe6ec1e0',	22,	1,	'Você se utiliza de algum mecanismos para identificar sua performance, acertos e erros.',	'',	22,	'5'),
('7d3e6001-4691-0f18-2d40-d21d36dfaa4e',	23,	1,	'As desculpas não fazem parte do que você deseja fazer',	'',	23,	'5'),
('91e441ea-6a15-b65a-efbe-e9d2232f9145',	24,	1,	'Compromisso assumido  é compromisso cumprido',	'',	24,	'5'),
('14fe92d9-2e27-3bd2-c462-c754e9933c8f',	25,	1,	'Aprendizagem é considerada por você como aquisição de conhecimento, fortalecimento de competências e transformação na forma de ser.',	'',	25,	'5'),
('35a48a83-3a03-da9a-4677-fb5c9d61f1b7',	26,	1,	'Você é reconhecido por buscar sempre novas soluções, novas ações',	'',	26,	'6'),
('6da82705-c9d8-a725-78a3-85faa2afc05f',	27,	1,	'Você aceita os riscos nas suas atitudes e tem um senso de que \\\"tudo é possível\\\" ',	'',	27,	'6'),
('4406349e-e162-251c-85f3-b5ec483109e0',	28,	1,	'Você considera uma boa dose de comportamento aleatório nas suas ações.',	'',	28,	'6'),
('57d8b1b8-8fbf-bddf-3f99-321a2641d07e',	29,	1,	'Criatividade e prazer são fatores importantes nas suas decisões ',	'',	29,	'6'),
('68d77e11-c1ec-2a75-d20a-90562505a990',	30,	1,	'Nas suas decisões você trabalha para fortalecer sua coragem frente ao medo',	'',	30,	'6'),
('36d272bc-f620-722b-159e-3d7e013f715d',	31,	1,	'Você possui uma vida boa e feliz',	'',	31,	'7'),
('c84a2e6c-69d9-69f4-8fb3-37358549a278',	32,	1,	'Você se considera uma pessoa próspera ',	'',	32,	'7'),
('48732980-acfa-12c8-c28f-d918cdb1ca42',	33,	1,	'Você corrige as atividades que não obtiveram sucesso e celebra as conquistas alcançadas',	'',	33,	'7'),
('551dc920-5290-b44c-7d48-818eae9fe8a1',	34,	1,	'Você possui uma vida saudável ',	'',	34,	'7'),
('f3c5cdbb-4999-4598-1ee5-204087b54d0b',	35,	1,	'Os seus resultados financeiros refletem os esforços empenhados e lhe dão segurança',	'',	35,	'7'),
('117fa36a-54e4-11e9-9cb4-5cc9d35306d9',	36,	2,	'O cuidado na elaboração de tarefas e de produtos é presente em todos.',	NULL,	1,	'1'),
('117fa590-54e4-11e9-9cb4-5cc9d35306d9',	37,	2,	'Existe um grande entusiasmo e alegria em todos os profissionais referente às atividades que executam.',	NULL,	2,	'1'),
('117fa64e-54e4-11e9-9cb4-5cc9d35306d9',	38,	2,	'Respeito e carinho é algo comum com todos com quem a organização se relaciona.',	NULL,	3,	'1'),
('117fa6dd-54e4-11e9-9cb4-5cc9d35306d9',	39,	2,	'Acreditar que algo melhor pode ser feito é algo presente em todos na organização.',	NULL,	4,	'1'),
('117fa763-54e4-11e9-9cb4-5cc9d35306d9',	40,	2,	'Todas as atividades realizadas levam em consideração o impacto em todos os stakeholders',	NULL,	5,	'1'),
('117fa7ed-54e4-11e9-9cb4-5cc9d35306d9',	41,	2,	'Existe uma clara, compreensiva e motivadora definição dos Valores da organização.',	NULL,	6,	'2'),
('117fa86d-54e4-11e9-9cb4-5cc9d35306d9',	42,	2,	'A intuição e a análise de tendências e oportunidades são consideradas na definição da estratégia.',	NULL,	7,	'2'),
('117fa8ec-54e4-11e9-9cb4-5cc9d35306d9',	43,	2,	'Existe uma clara e motivadora Visão de Futuro',	NULL,	8,	'2'),
('117fa969-54e4-11e9-9cb4-5cc9d35306d9',	44,	2,	'Os produtos e serviços oferecidos são relevantes para o mercado e destacam-se positivamente frente aos oferecidos pelos concorrentes.',	NULL,	9,	'2'),
('117faa36-54e4-11e9-9cb4-5cc9d35306d9',	45,	2,	'Existe uma clara, compreensiva e motivadora definição do Propósito da organização.',	NULL,	10,	'2'),
('117faac6-54e4-11e9-9cb4-5cc9d35306d9',	46,	2,	'A cultura da organização possibilita o desenvolvimento do  autoconhecimento pessoal e organizacional',	NULL,	11,	'3'),
('117fab89-54e4-11e9-9cb4-5cc9d35306d9',	47,	2,	'Os comportamentos de todos profissionais são baseados nos valores e no propósito da organização. ',	NULL,	12,	'3'),
('117fac96-54e4-11e9-9cb4-5cc9d35306d9',	48,	2,	'Os produtos oferecidos ao mercado são alhinhados aos nossos valores e ao nosso propósito.',	NULL,	13,	'3'),
('117fad18-54e4-11e9-9cb4-5cc9d35306d9',	49,	2,	'Os objetivos estratégicos são alinhados à Visão de Futuro Visão de Futuro é a inspiração para as ações do dia a dia.',	NULL,	14,	'3'),
('117fad9b-54e4-11e9-9cb4-5cc9d35306d9',	50,	2,	'O design, a estética e a beleza estão incorporadas á cultura organizacional',	NULL,	15,	'3'),
('117fae28-54e4-11e9-9cb4-5cc9d35306d9',	51,	2,	'As ferramentas tecnológicas de interação entre pessoas são usadas por todos profissionais da organização para fomentar relações harmoniosas.',	NULL,	16,	'4'),
('117faea6-54e4-11e9-9cb4-5cc9d35306d9',	52,	2,	'O diálogo interno e com clientes, e demais stakeholders é praticado por todos como forma de fortalecer os relacionamentos e a aprendizagem.',	NULL,	17,	'4'),
('117faf94-54e4-11e9-9cb4-5cc9d35306d9',	53,	2,	'A confiança é comum a todos na organização e existe espaço suficiente para que a outra pessoa possa trair esta confiança.',	NULL,	18,	'4'),
('117fb020-54e4-11e9-9cb4-5cc9d35306d9',	54,	2,	'Todos na organização acreditam que a interação com a diversidade de raça, religião, credo, opção sexual, nível social e educacional é um ganho para a Organização.',	NULL,	19,	'4'),
('117fb0d5-54e4-11e9-9cb4-5cc9d35306d9',	55,	2,	'Os funcionários têm autonomia em suas relações e respeito à autonomia dos outros',	NULL,	20,	'4'),
('117fb1bc-54e4-11e9-9cb4-5cc9d35306d9',	56,	2,	'A estrutura organizacional possibilita que o conhecimento do funcionário seja incorporado as decisões estratégicas.',	NULL,	21,	'5'),
('117fb2aa-54e4-11e9-9cb4-5cc9d35306d9',	57,	2,	'As métricas organizacionais levam em consideração os comportamentos relacionados aos valores e ao propósito da organização  e a eficácia e eficiência dos resultados desejados.',	NULL,	22,	'5'),
('117fb4e0-54e4-11e9-9cb4-5cc9d35306d9',	58,	2,	'Todos possuem disciplina e responsabilidade nas execuções de suas atividades ',	NULL,	23,	'5'),
('117fb5c0-54e4-11e9-9cb4-5cc9d35306d9',	59,	2,	'O programa de desenvolvimento de habilidades dos funcionários e os sistemas internos estão  atrelados aos valores, ao propósito e a Visão de futuro da organização',	NULL,	24,	'5'),
('117fb69b-54e4-11e9-9cb4-5cc9d35306d9',	60,	2,	'Existe uma grande agilidade nos processos que permite responder rapidamente às oportunidades e desafios do negócio',	NULL,	25,	'5'),
('117fb760-54e4-11e9-9cb4-5cc9d35306d9',	61,	2,	'A organização é reconhecia no seu mercado por desenvolver produtos e processos inovadores',	NULL,	26,	'6'),
('117fb823-54e4-11e9-9cb4-5cc9d35306d9',	62,	2,	'As atividades são desenvolvidas por equipes de trabalho autônomas que possuem autoridade para empreender, integrar pessoas, produzir soluções e administrar resultados. ',	NULL,	27,	'6'),
('117fb8e1-54e4-11e9-9cb4-5cc9d35306d9',	63,	2,	'Todos os profissionais são incentivados a tomarem decisões tendo como base os valores, no propósito e na visão de futuro da Organização',	NULL,	28,	'6'),
('117fb99f-54e4-11e9-9cb4-5cc9d35306d9',	64,	2,	'Desenvolver produtos e processos disruptivos são consideradas atitudes positivas na Organização  ',	NULL,	29,	'6'),
('117fba61-54e4-11e9-9cb4-5cc9d35306d9',	65,	2,	'Todos sentem que podem criar uma Organização competitiva para o futuro e não são herdeiros do passado.',	NULL,	30,	'6'),
('117fbb22-54e4-11e9-9cb4-5cc9d35306d9',	66,	2,	'Existe um equilíbrio entre eficiência e produtividade com satisfação e desenvolvimento dos funcionários. ',	NULL,	31,	'7'),
('117fbbe2-54e4-11e9-9cb4-5cc9d35306d9',	67,	2,	'Funcionários, clientes, fornecedores e diversas outras entidades tem uma clara e positiva percepção de valor nos produtos e serviços oferecidos pela organização',	NULL,	32,	'7'),
('117fbca0-54e4-11e9-9cb4-5cc9d35306d9',	68,	2,	'A celebração é parte das conquistas alcançadas, assim como a correção de atos falhos.',	NULL,	33,	'7'),
('117fbd66-54e4-11e9-9cb4-5cc9d35306d9',	69,	2,	'A prosperidade e a perenidade são a consequência das atividades atreladas ao propósito e valores da organização',	NULL,	34,	'7'),
('117fbe28-54e4-11e9-9cb4-5cc9d35306d9',	70,	2,	'Os resultados financeiros são suficientes e satisfatórios para que haja evolução da Organização.',	NULL,	35,	'7'),
('858c08ce-54e5-11e9-9cb4-5cc9d35306d9',	71,	3,	'A compaixão e o perdão são comportamentos presentes nos membros da Família Empresária',	NULL,	1,	'1'),
('858c0d34-54e5-11e9-9cb4-5cc9d35306d9',	72,	3,	'Existe um grande entusiasmo e alegria em todos os familiares  referente às organizar em que são acionistas.',	NULL,	2,	'1'),
('858c0f1c-54e5-11e9-9cb4-5cc9d35306d9',	73,	3,	'Respeito e carinho é algo comum entre os membros da Família e para com os gestores dos seus negócios.',	NULL,	3,	'1'),
('858c10ac-54e5-11e9-9cb4-5cc9d35306d9',	74,	3,	'Acreditar que algo melhor pode ser feito é algo presente em todos na Família.',	NULL,	4,	'1'),
('858c1214-54e5-11e9-9cb4-5cc9d35306d9',	75,	3,	'Todas as atividades realizadas pelos membros da Família levam em consideração o impacto nos negócios e na comunidade que está inserida.',	NULL,	5,	'1'),
('858c1382-54e5-11e9-9cb4-5cc9d35306d9',	76,	3,	'Existe uma clara, compreensiva e motivadora definição dos Valores da Família e são alinhados a seus negócios.',	NULL,	6,	'2'),
('858c14e4-54e5-11e9-9cb4-5cc9d35306d9',	77,	3,	'A intuição e a análise de tendências e oportunidades são consideradas na definição dos negócios em que a Família participa.',	NULL,	7,	'2'),
('858c1643-54e5-11e9-9cb4-5cc9d35306d9',	78,	3,	'Existe uma clara e motivadora Visão de Futuro da Família Empresarial.',	NULL,	8,	'2'),
('858c17a6-54e5-11e9-9cb4-5cc9d35306d9',	79,	3,	'Os negócios em que participam são relevantes para o mercado e destacam-se positivamente frente aos oferecidos pelos concorrentes.',	NULL,	9,	'2'),
('858c1907-54e5-11e9-9cb4-5cc9d35306d9',	80,	3,	'Existe uma clara, compreensiva e motivadora definição do Propósito da Família Empresarial.',	NULL,	10,	'2'),
('858c1a6e-54e5-11e9-9cb4-5cc9d35306d9',	81,	3,	'Existem procedimentos que fomentam o desenvolvimento do autoconhecimento dos membros da Família Empresarial.',	NULL,	11,	'3'),
('858c1bd4-54e5-11e9-9cb4-5cc9d35306d9',	82,	3,	'Os comportamentos de todos os membros da Família são baseados nos valores e no propósito da Família Empresarial.',	NULL,	12,	'3'),
('858c1dfa-54e5-11e9-9cb4-5cc9d35306d9',	83,	3,	'Os negócios da Família são alinhados aos valores e ao propósito da Família Empresarial.',	NULL,	13,	'3'),
('858c1f91-54e5-11e9-9cb4-5cc9d35306d9',	84,	3,	'Os objetivos estratégicos da Família Empresarial são alinhados à Visão de Futuro Visão de Futuro e é a inspiração para as ações do dia a dia.',	NULL,	14,	'3'),
('858c2117-54e5-11e9-9cb4-5cc9d35306d9',	85,	3,	'O design, a estética e a beleza estão incorporadas á cultura da Família Empresarial.',	NULL,	15,	'3'),
('858c2298-54e5-11e9-9cb4-5cc9d35306d9',	86,	3,	'As ferramentas tecnológicas de interação entre pessoas são usadas por todos os membros da Família Empresarial para fomentar relações harmoniosas.',	NULL,	16,	'4'),
('858c24ff-54e5-11e9-9cb4-5cc9d35306d9',	87,	3,	'O diálogo interno e com demais stakeholders é praticado por todos como forma de fortalecer os relacionamentos e a aprendizagem.',	NULL,	17,	'4'),
('858c267b-54e5-11e9-9cb4-5cc9d35306d9',	88,	3,	'A confiança é comum a todos os membros da Família Empresarial e existe espaço suficiente para que a outra pessoa possa trair esta confiança.',	NULL,	18,	'4'),
('858c2800-54e5-11e9-9cb4-5cc9d35306d9',	89,	3,	'Os membros da Família Empresarial acreditam que a interação com a diversidade de raça, religião, credo, opção sexual, nível social e educacional é um ganho para a Família Empresarial.',	NULL,	19,	'4'),
('858c2990-54e5-11e9-9cb4-5cc9d35306d9',	90,	3,	'Os membros da Família têm autonomia em suas relações e respeito à autonomia dos outros',	NULL,	20,	'4'),
('858c2b24-54e5-11e9-9cb4-5cc9d35306d9',	91,	3,	'A estrutura da Família Empresarial possibilita que o conhecimento dos seus membros sejam consideradas nas decisões estratégicas.',	NULL,	21,	'5'),
('858c2cb5-54e5-11e9-9cb4-5cc9d35306d9',	92,	3,	'As métricas da Família Empresarial levam em consideração os comportamentos relacionados aos valores e ao propósito da Família e a eficácia e eficiência dos resultados desejados.',	NULL,	22,	'5'),
('858c2f53-54e5-11e9-9cb4-5cc9d35306d9',	93,	3,	'Todos possuem disciplina e responsabilidade nas execuções de suas atividades e no relacionamento com a comunidade. ',	NULL,	23,	'5'),
('858c31fa-54e5-11e9-9cb4-5cc9d35306d9',	94,	3,	'O programa de desenvolvimento de habilidades dos dos membros da Família estão  atrelados aos valores, ao propósito e a Visão de futuro da Família Empresarial.',	NULL,	24,	'5'),
('858c344f-54e5-11e9-9cb4-5cc9d35306d9',	95,	3,	'Existe uma grande agilidade nos processos que permite responder rapidamente às oportunidades e desafios doa Família Empresária.',	NULL,	25,	'5'),
('858c38f8-54e5-11e9-9cb4-5cc9d35306d9',	96,	3,	'A Família Empresária é reconhecia no seu mercado por ter participação em investimentos inovadores',	NULL,	26,	'6'),
('858c3b73-54e5-11e9-9cb4-5cc9d35306d9',	97,	3,	'Os núcleos familiares são autônomos e possuem autoridade para empreender, integrar pessoas, produzir soluções e administrar resultados. ',	NULL,	27,	'6'),
('858c3db4-54e5-11e9-9cb4-5cc9d35306d9',	98,	3,	'Todos os membros da Família são incentivados a tomarem suas decisões tendo como base os valores, o propósito e a visão de futuro da Família Empresarial.',	NULL,	28,	'6'),
('858c3ff7-54e5-11e9-9cb4-5cc9d35306d9',	99,	3,	'Desenvolver negócios disruptivos são consideradas atitudes positivas na Família Empresarial  ',	NULL,	29,	'6'),
('858c4233-54e5-11e9-9cb4-5cc9d35306d9',	100,	3,	'Todos sentem que podem criar uma Família Empresarial competitiva para o futuro e não são herdeiros do passado.',	NULL,	30,	'6'),
('858c4470-54e5-11e9-9cb4-5cc9d35306d9',	101,	3,	'A estrutura dos núcleos familiares favorece o relacionamento entre todos os membros da Família Empresarial ',	NULL,	31,	'7'),
('858c46b5-54e5-11e9-9cb4-5cc9d35306d9',	102,	3,	'Funcionários, clientes, fornecedores e diversas outras entidades tem uma clara e positiva percepção de valor nos produtos e serviços oferecidos pelos investimentos da Família Empresarial.',	NULL,	32,	'7'),
('858c48f9-54e5-11e9-9cb4-5cc9d35306d9',	103,	3,	'A celebração é parte das conquistas alcançadas, assim como a correção de atos falhos.',	NULL,	33,	'7'),
('858c4b4c-54e5-11e9-9cb4-5cc9d35306d9',	104,	3,	'A prosperidade e a perenidade são a consequência das atividades atreladas ao propósito e valores da Família Empresarial ',	NULL,	34,	'7'),
('858c4d9e-54e5-11e9-9cb4-5cc9d35306d9',	105,	3,	'Os resultados financeiros são suficientes e satisfatórios para que haja evolução da Família Empresarial.',	NULL,	35,	'7');

DROP TABLE IF EXISTS `QuestionariosRespostas`;
CREATE TABLE `QuestionariosRespostas` (
  `uuid` char(36) NOT NULL,
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CadastrosId` bigint(20) NOT NULL,
  `QuestionariosPerguntasId` bigint(20) NOT NULL,
  `Valor` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `QuestionariosPerguntasId` (`QuestionariosPerguntasId`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

INSERT INTO `QuestionariosRespostas` (`uuid`, `Id`, `CadastrosId`, `QuestionariosPerguntasId`, `Valor`) VALUES
('77bac0dc-c625-6b47-ee6d-25ad88e8ba2c',	1,	1,	30,	4),
('315fe4bc-e7ca-f89b-c776-cb5ed1749c3b',	2,	1,	31,	4),
('50285497-af2e-2df6-8d5f-4ace94fdd955',	3,	1,	34,	5),
('20ab83c7-b7e7-2335-0356-ae14b90c5236',	4,	1,	1,	5),
('c09b90a3-bc44-cef1-ef50-e1a1a636bf52',	5,	1,	2,	5),
('cc100dfb-5651-a3e8-5403-61872daf25a2',	6,	1,	3,	6),
('ea2d80e5-f62a-4360-d518-f606843fbf16',	7,	1,	4,	5),
('d3138ed9-a527-8d35-9bb2-9dc369a2b5fc',	8,	1,	5,	5),
('6ce14871-abb8-5fee-961f-53be0cb2cb64',	9,	1,	6,	4),
('6d45ec74-ff97-08f4-15d4-f98b73aa0c4a',	10,	1,	7,	7),
('be0ef2e1-46a7-d372-650e-000784bd37be',	11,	1,	8,	4),
('aae08174-3484-59f4-097a-0053af86c56b',	12,	1,	9,	5),
('eebcae1e-2917-d462-848d-386200ded04c',	13,	1,	10,	8),
('ceb0331d-9377-46b1-9d33-86be66c084d4',	14,	1,	11,	5),
('fff2872c-f863-b6e9-8aec-00395e961df1',	15,	1,	12,	6),
('320dceb8-865b-701a-aaae-ae6f56506ee3',	16,	1,	13,	4),
('1f5d90e2-ed13-c0c7-45bb-cca81dd359e5',	17,	1,	14,	4),
('57de2146-653e-1615-aab9-60d041ab0b73',	18,	1,	15,	7),
('6715762c-e067-d91d-537d-0468de79fb7e',	19,	1,	16,	8),
('af84abe4-4e3d-4d05-f409-ca64b68074a8',	20,	1,	17,	7),
('9663c52d-f9d3-9182-0fae-99d4f0cf8ffc',	21,	1,	18,	5),
('e4767ac8-e809-9f04-dbe7-5fc2403e8fef',	22,	1,	19,	4),
('679f3636-dbf7-5952-ad60-f0a715586089',	23,	1,	20,	6),
('d4a23da9-972c-e66c-b98f-85fedc4bc97a',	24,	1,	21,	6),
('4b5843af-815a-4f79-7892-c2292d90c920',	25,	1,	22,	5),
('82f54a40-ddaa-88d5-771c-1499e682c453',	26,	1,	23,	7),
('a3cf7a68-d32e-2f65-64ef-faccb9b63387',	27,	1,	24,	5),
('f82f6c9b-91d8-5577-6d5d-5c09dca01aeb',	28,	1,	25,	5),
('4698aa9f-bc79-47e6-848a-cafffb49af22',	29,	1,	26,	6),
('c2044258-a927-d33c-ad8c-0ff3bbb52c8c',	30,	1,	33,	5),
('323561b6-49ed-77cd-e8e1-a9959ac044e6',	31,	1,	32,	6),
('5ceb3271-5ab6-f7e1-2441-ce8e420e09af',	32,	1,	35,	4),
('c06ed064-080c-f46e-23ce-92b71451187c',	33,	1,	28,	5),
('e739c6c3-30b6-ddbd-61f7-fdec3c8c0f81',	34,	1,	29,	5),
('2a00a074-c472-76ae-4e15-a8432bff0c8f',	35,	1,	27,	6),
('e4897206-3b82-acc7-5429-0ed35076af97',	36,	2,	35,	5),
('2d9a8126-31fe-893d-ee95-938436a3822b',	37,	2,	34,	5),
('c554d744-258d-c765-53e2-a89e92e2a8f2',	38,	2,	33,	5),
('ebf62bba-8842-1db2-bf69-df397e2e1078',	39,	2,	32,	5),
('cde451fd-cf25-61cb-3fe4-1e21bdbce9ed',	40,	2,	31,	5),
('bb0ca459-0668-7d2d-17b7-46f86e5f58ae',	41,	2,	30,	5),
('58c4fca4-0c37-7f1a-b1cf-0f66a6204856',	42,	2,	29,	5),
('7c37dd43-b6f3-e08d-7688-ea4d1220863b',	43,	2,	28,	5),
('5a3ad3cc-e409-8c52-01ff-db953ebb3127',	44,	2,	27,	5),
('f9ca63ad-ac81-a0d9-f71d-cab102f218c1',	45,	2,	26,	5),
('792d27db-d34c-c6bd-a63c-b76ee6639172',	46,	2,	25,	5),
('9a4977b9-b909-73c4-14a8-73f5fe4b9ad4',	47,	2,	24,	5),
('3980484b-27dc-4dca-4bfe-1907817b342c',	48,	2,	23,	5),
('d5524b00-0e2e-4877-8228-2c4abfec677c',	49,	2,	22,	5),
('bff373c7-e5fc-0ee1-0eaa-290837f77f7f',	50,	2,	21,	5),
('8770f113-67c7-1f28-c57e-23c91b14ef78',	51,	2,	20,	5),
('a909b5c4-d44d-cfff-766d-ac666e012a26',	52,	2,	19,	5),
('99402ae2-c0a2-2530-6440-701e1abe2dbe',	53,	2,	18,	5),
('f79b78d0-da50-c3a2-d122-d9eb93ece8b3',	54,	2,	17,	5),
('aba3e4cb-baf3-8f7c-738a-7a9957a834b3',	55,	2,	16,	5),
('bf4c6753-7c0e-1b98-34c7-1c6e4c867af9',	56,	2,	15,	5),
('d67ab9d5-14f2-2ffd-d360-ed405b625245',	57,	2,	14,	5),
('5075d786-fe88-c9ce-3a6f-1a3d1de19563',	58,	2,	13,	5),
('89555001-e99e-7d54-8de5-bf1f9a70af38',	59,	2,	12,	5),
('3df0e5f5-d6c5-f833-a575-513a6b0351c2',	60,	2,	11,	5),
('a089cece-41a6-f1bb-5cd6-e9ec3f475438',	61,	2,	10,	5),
('801c5a65-6207-b076-d9b9-6d9e2c055be7',	62,	2,	9,	5),
('ff492073-e9f9-ea83-0f59-82cb6508a4b2',	63,	2,	8,	5),
('6919653b-99bd-1e96-a1b6-f86df207d5b5',	64,	2,	7,	5),
('efda1a85-fa83-0d2c-37e9-5eaf2a6d3c2c',	65,	2,	6,	5),
('0adb238b-86b0-7fd5-84ef-1e48e347fa86',	66,	2,	5,	5),
('1aae0d89-1bde-413e-b4d8-4e3eda97c041',	67,	2,	4,	5),
('cf568115-6e55-08b8-46a9-0d55a58c043d',	68,	2,	3,	5),
('10d57b6b-9114-a96d-4dd2-b6548ca36ef8',	69,	2,	2,	5),
('434a1802-f095-81d0-b31f-abafa20a2ea4',	70,	2,	1,	5),
('939db391-b64d-b714-c5da-11f3af5e2577',	71,	1,	71,	5),
('175c2db1-7c4f-bca4-c188-42c59c950bc9',	72,	1,	72,	4),
('41b8bedd-019f-66a9-5485-46d02b641c0c',	73,	1,	73,	5),
('de18aa92-72ae-bd62-da1e-a69ac2065abe',	74,	1,	74,	5),
('1d8b1044-6ae3-c9c6-6442-31da24b53ec3',	75,	1,	75,	4),
('d36f20dd-a804-b9d3-9e13-7a25a7cdeceb',	76,	1,	76,	5),
('99430998-6bfa-c3be-e2a9-41bacf92f23a',	77,	1,	77,	5),
('3f9b5a0d-1edb-bf23-aaf7-a7443180a005',	78,	1,	78,	5),
('df212c55-6e4d-9455-7c37-3695f2b7462a',	79,	1,	79,	6),
('bb0671b0-be77-af64-4281-b2c4db208d3f',	80,	1,	80,	4),
('6c631346-0e30-3e67-2d43-d5c8cd179841',	81,	1,	81,	4),
('77742e35-5b0d-6e42-c896-7c8a19f95646',	82,	1,	82,	4),
('a9e7f61c-460b-3344-a89e-7393dbf8af7f',	83,	1,	83,	8),
('49613864-2f6a-7871-3328-8b4c0eb6a52b',	84,	1,	84,	5),
('e6af0197-d1f8-5c04-5158-0ba80a8f36eb',	85,	1,	85,	5),
('fa88576c-8316-27b4-5080-8586e86ac937',	86,	1,	86,	4),
('b6c44993-b455-4e10-debe-dd4d4959047b',	87,	1,	87,	6),
('84acd9cc-8f01-b70f-5ae8-ac16652e485a',	88,	1,	88,	4),
('74069e5b-7052-1d69-384c-e11ad5cc2719',	89,	1,	89,	4),
('a688040c-2837-4af9-666a-57c2733b065e',	90,	1,	90,	6),
('1807358d-54ae-ae17-8222-c83ccdd51cd3',	91,	1,	91,	6),
('6789d7d9-8c4a-7483-ef8f-f68300818ad0',	92,	1,	92,	4),
('f526fb7c-b19f-1119-e598-ade6236925f7',	93,	1,	93,	6),
('5d21024a-65bf-4e5d-bd7a-7617eff16f85',	94,	1,	94,	5),
('4feb2255-f5c0-46d9-2aae-a3350e26ac11',	95,	1,	95,	5),
('f0f88aec-4b4e-3189-e184-3a45ea97e7b2',	96,	1,	96,	5),
('68a9975e-224a-ed12-b586-1d9dbe0a39db',	97,	1,	97,	5),
('be996b7a-ae8c-06eb-7e9a-5d02dc19a6dc',	98,	1,	98,	6),
('e40d7639-d932-87f2-bb9d-93ad3ed9ae86',	99,	1,	99,	6),
('fccce3b0-056a-2e3f-c753-96d7f1344d41',	100,	1,	100,	6),
('e9ac57b1-4f06-0ece-d960-873f2c61a703',	101,	1,	101,	5),
('82963525-bb6c-8d51-37c6-9b468e6f8f43',	102,	1,	102,	5),
('1327574c-a78d-5f9c-6d7c-6a46367c72c9',	103,	1,	103,	4),
('8345401b-4bbc-3690-fe48-d846cbe14d3c',	104,	1,	104,	4),
('51e4b503-fa85-e509-1f83-833f16a95464',	105,	1,	105,	6),
('efb5969c-95c4-431b-2a76-5b438c3ae71a',	106,	1,	36,	5),
('aa90a4b0-cd75-9744-a444-e907bc79e64e',	107,	1,	37,	6),
('28b0e09b-d177-965f-0431-0324013a88a6',	108,	1,	38,	4),
('4cf2fb0b-595f-cc80-6ed2-a8dc2364c653',	109,	1,	39,	6),
('23b7ef7d-9953-fa65-9625-e344f7f9cbf9',	110,	1,	40,	6),
('820eda05-7556-4079-d3a1-5d09af51e7b0',	111,	1,	41,	4),
('9f77e1ff-178b-49e2-7b94-099f25193db4',	112,	1,	42,	4),
('b5e3a961-1121-e15f-bc4e-299bbdf6f1e9',	113,	1,	43,	5),
('7a7a3583-66df-f284-0bc1-f4a53159c55a',	114,	1,	44,	6),
('6b7070fb-15fb-d04f-66eb-7ce036665382',	115,	1,	45,	4),
('59022db6-f26d-b571-8288-b48789c9b723',	116,	1,	46,	4),
('a8e95d0b-b19d-a295-3e8f-0d9eef230e08',	117,	1,	47,	6),
('21b2cb98-197c-4be2-f1a4-1b42048ac9b4',	118,	1,	48,	4),
('0ca04bec-4585-a297-3364-5d9061954756',	119,	1,	49,	5),
('ea1f26ed-19e4-76b0-db61-d5654f4b26ce',	120,	1,	50,	4),
('fecf1881-a116-3def-c07d-d80942dee196',	121,	1,	51,	4),
('a3dec272-09d6-6ced-6d97-5448bedf481f',	122,	1,	52,	7),
('ace5dfaa-5b75-6d66-1a68-ff2cfaf7e3f3',	123,	1,	53,	4),
('96f86518-46b2-f16d-f932-a9222dd1f246',	124,	1,	55,	4),
('117d7ac2-c8da-b574-f4ea-823cb5a33404',	125,	1,	56,	4),
('8fb9fe53-2386-7ca2-9d62-0df1fbf0c1ed',	126,	1,	57,	3),
('bfa8e160-eb50-8f02-1ab4-2344a7cec4db',	127,	1,	58,	3),
('b9f01841-ab53-1fe7-2602-28c86b995b00',	128,	1,	59,	7),
('220118ee-cd0e-7a80-b3b0-f7e3a082b290',	129,	1,	60,	4),
('c6e910e5-98ab-bfe6-20ce-0dfd8b108d36',	130,	1,	61,	6),
('7a4e0719-cacd-f875-e32e-137813d4de04',	131,	1,	62,	4),
('c213b070-0946-069b-cbee-7862d22a5d89',	132,	1,	63,	7),
('ff988648-41ce-fa0c-4037-82b789c011fe',	133,	1,	64,	4),
('60d591bf-2dcb-f88c-8d0e-276f1cb8754e',	134,	1,	65,	6),
('024d7de4-8351-9597-6f8b-b140e610eae3',	135,	1,	66,	4),
('3484931b-fdd8-c9e8-c67e-a580d693e59d',	136,	1,	67,	8),
('6532ac8a-0b14-778a-b5d7-ae1eededf277',	137,	1,	68,	4),
('dde4e2db-252c-e52b-f9b3-5842d2e8fe5b',	138,	1,	69,	5),
('b60f56c8-fc06-72a0-3f8a-54e399606296',	139,	1,	70,	6);

DROP TABLE IF EXISTS `Secoes`;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `Secoes` (`uuid`, `Id`, `PaiId`, `FilhoId`, `Grupos`, `Titulo`, `Slug`, `Texto`, `Cabecalho`, `Modulo`, `Rodape`, `Formato`, `Uri`, `Diretorio`, `Target`, `Ordem`, `Sidebar`, `Privado`, `Situacao`, `Arquivado`, `CriacaoUsuarioId`, `CriacaoDataHora`, `AtualizacaoUsuarioId`, `AtualizacaoDataHora`) VALUES
('a73fc500-a39f-5d6c-4973-740f1556',	1,	0,	0,	NULL,	'Home',	'home',	'<p class=\\\"text-center\\\"><a class=\\\"questionario--home-link btn btn-lg btn-success p-2 mt-5\\\" href=\\\"/questionarios-alinhar/individual\\\">Question&aacute;rio Individual</a></p>\r\n\r\n<p class=\\\"text-center\\\"><a class=\\\"questionario--home-link btn btn-lg btn-info p-2 mt-5\\\" href=\\\"/questionarios-alinhar/organizacional\\\">Question&aacute;rio Organizacional</a></p>\r\n\r\n<p class=\\\"text-center\\\"><a class=\\\"questionario--home-link btn btn-lg btn-danger p-2 mt-5\\\" href=\\\"/questionarios-alinhar/familia-empresarial\\\">Question&aacute;rio Fam&iacute;lia Empresarial</a></p>\r\n\r\n<hr />\r\n<p class=\\\"text-center\\\"><img alt=\\\"\\\" class=\\\"img-fluid\\\" src=\\\"/dados/editor/image/alinhar.png\\\" style=\\\"width: 379px; height: 317px;\\\" /></p>\r\n',	'',	'Secoes',	'',	'',	'pagina.php',	NULL,	'_self',	0,	0,	0,	1,	0,	NULL,	NULL,	NULL,	NULL),
('a32d715c-5976-6e55-0164-6d411e83',	2,	0,	0,	NULL,	'Questionários Alinhar',	'questionarios-alinhar',	'',	'',	'Questionarios',	'',	'questionario-alinhar',	'questionario.php',	NULL,	'_self',	0,	0,	1,	1,	0,	NULL,	NULL,	NULL,	NULL),
('a73a9ff9-70a8-7727-d808-8560d5f2',	3,	0,	0,	NULL,	'Login',	'login',	'',	'',	'Cadastros',	'',	'cadastros-login',	'pagina.php',	NULL,	'_self',	0,	0,	0,	1,	0,	NULL,	NULL,	NULL,	NULL),
('09bd80e5-4ef7-d251-af55-f49658cc',	4,	0,	0,	NULL,	'Autenticacao',	'autenticacao',	'',	'',	'Cadastros',	'',	'cadastros-autenticacao',	'blank.php',	NULL,	'_self',	0,	0,	0,	1,	0,	NULL,	NULL,	NULL,	NULL),
('a73a9ff9-70a8-7727-d808-8560d5f2',	5,	0,	0,	'',	'Registrar',	'registrar',	'',	'',	'Cadastros',	'',	'cadastros-registro',	'pagina.php',	'',	'_self',	0,	0,	0,	1,	0,	0,	NULL,	0,	NULL);

DROP TABLE IF EXISTS `SistemaGrupos`;
CREATE TABLE `SistemaGrupos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Descricao` text NOT NULL,
  `Situacao` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Slug` (`Slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `SistemaGrupos` (`Id`, `Titulo`, `Slug`, `Descricao`, `Situacao`) VALUES
(1,	'Administradores',	'administradores',	'',	1),
(2,	'Usuários',	'usuarios',	'',	1);

DROP TABLE IF EXISTS `SistemaMenu`;
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

INSERT INTO `SistemaMenu` (`Id`, `PaiId`, `Grupos`, `Titulo`, `Slug`, `Target`, `Situacao`, `Privado`, `Arquivado`, `Ordem`) VALUES
(100,	0,	'1,2',	'Conteudos',	'Conteudos',	'_self',	1,	0,	0,	0),
(110,	0,	'1,2',	'Questionários',	'Questionarios',	'_self',	1,	0,	0,	0),
(120,	0,	'1,2',	'Cadastros',	'Cadastros',	'_self',	1,	0,	0,	0),
(200,	0,	'1,2',	'Seções',	'Secoes',	'_self',	1,	0,	0,	0),
(900,	0,	'1',	'Usuários',	'SistemaUsuarios',	'_self',	1,	0,	0,	0),
(910,	0,	'1',	'Configurações',	'Configuracoes',	'_self',	1,	0,	0,	0),
(10000,	0,	'0',	'Manutenção',	'Manutencao',	'_self',	1,	0,	0,	0),
(10001,	10000,	'0',	'Configurações',	'SistemaConfiguracoes',	'_self',	1,	0,	0,	0),
(10020,	10000,	'0',	'Grupos',	'SistemaGrupos',	'_self',	1,	0,	0,	0);

DROP TABLE IF EXISTS `SistemaUsuarios`;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `SistemaUsuarios` (`uuid`, `Id`, `SistemaGruposId`, `Login`, `Nome`, `Email`, `Senha`, `Situacao`, `Arquivado`, `Criacao`, `Atualizacao`, `AtualizacaoUsuarioId`) VALUES
('61099e6c-8c70-9270-5bbf-5ffb5727f9e3',	1,	1,	'birah',	'Ubiratã Carvalho Nogueira',	'bira@gosites.com.br',	'c2a48cab5da6a8c0b7f5b2ab6672e8e0',	1,	0,	'2017-12-07 21:07:21',	'0000-00-00 00:00:00',	0),
('760ebe7d-c6f4-8409-5496-e2e42aeed816',	2,	1,	'lia@labe.cx',	'Lia Isumi',	'lia@labe.cx',	'e10adc3949ba59abbe56e057f20f883e',	1,	0,	'2019-04-02 00:21:43',	'0000-00-00 00:00:00',	0);

-- 2019-04-10 20:00:37
