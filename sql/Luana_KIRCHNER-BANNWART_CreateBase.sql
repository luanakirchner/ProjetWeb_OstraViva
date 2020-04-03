-- --------------------------------------------------------
-- Autheur : Luana Kirchner Bannwart
-- Version: 1.1
-- Date: 20.03.2020
-- --------------------------------------------------------



DROP DATABASE IF EXISTS `ostravivaTest`;
CREATE DATABASE IF NOT EXISTS `ostravivaTest`; 
USE `ostravivaTest`;
-- -------------------------------------------------
-- Restaurants
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `country` varchar(45) NOT NULL,
  `NPA` varchar(20) NOT NULL,
  `city` varchar(45) NOT NULL,
  `street` varchar(55) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
-- Table Administrator
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) UNIQUE NOT NULL,
  `password` varchar(256) NOT NULL,
  `Restaurants_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_administrator_Restaurants1_idx` (`Restaurants_id`),
  CONSTRAINT `fk_administrator_Restaurants1` FOREIGN KEY (`Restaurants_id`) REFERENCES `restaurants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- --------------------------------------------------
-- Categorys
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- --------------------------------------------------
-- Customers
-- --------------------------------------------------

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(256) UNIQUE NOT NULL,
  `telephone` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- --------------------------------------------------
-- Dishes
-- --------------------------------------------------

CREATE TABLE IF NOT EXISTS `dishes` (
  ` id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `description` longtext,
  `photo` varchar(256) DEFAULT 'Image/SansPhotoTransparance.png/' NULL,
  `Categorys_id` int(11) NOT NULL,
  PRIMARY KEY (` id`),
  KEY `fk_Dishes_Categorys1_idx` (`Categorys_id`),
  CONSTRAINT `fk_Dishes_Categorys1` FOREIGN KEY (`Categorys_id`) REFERENCES `categorys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- --------------------------------------------------
-- Menu
-- --------------------------------------------------

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



-- --------------------------------------------------
-- Menu_Has_Dishes
-- --------------------------------------------------

CREATE TABLE IF NOT EXISTS `menus_has_dishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Menu_id` int(11) NOT NULL,
  `Dishe_ id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Menus_has_Dishes_Dishes1_idx` (`Dishe_ id`),
  KEY `fk_Menus_has_Dishes_Menus_idx` (`Menu_id`),
  CONSTRAINT `fk_Menus_has_Dishes_Dishes1` FOREIGN KEY (`Dishe_ id`) REFERENCES `dishes` (` id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Menus_has_Dishes_Menus` FOREIGN KEY (`Menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- --------------------------------------------------
-- Seasons
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateBegin` date NOT NULL,
  `dateEnd` date NOT NULL,
  `nbrPeopleAvailableDay` int(11) NOT NULL,
  `openWeek` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
-- Reservations
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `nbrPeople` int(11) NOT NULL,
  `confirmation` tinyint(1) NOT NULL,
  `description` LONGTEXT NULL,
  `Customers_id` int(11) NOT NULL,
  `Seasons_id` int(11) NOT NULL,
  `Restaurants_id` int(11) DEFAULT 1 NOT NULL,
   PRIMARY KEY (`id`),
  KEY `fk_administrator_Restaurants1_idx` (`Restaurants_id`),
  KEY `fk_Reservations_Customers1_idx` (`Customers_id`),
  KEY `fk_Reservations_Seasons1_idx` (`Seasons_id`),
  CONSTRAINT `fk_reservations_Restaurants1` FOREIGN KEY (`Restaurants_id`) REFERENCES `restaurants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservations_Customers1` FOREIGN KEY (`Customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservations_Seasons1` FOREIGN KEY (`Seasons_id`) REFERENCES `seasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- --------------------------------------------------
-- INSERT
-- --------------------------------------------------


INSERT INTO `restaurants` (`id`, `name`, `email`, `telephone`, `country`, `NPA`, `city`, `street`) VALUES
	(1, 'OstraViva', 'luanabannwart@gmail.com', '078 553 76 76', 'Suisse', '1018', 'Lausanne', 'Maillefer');
	
INSERT INTO `administrator` (`id`, `login`, `password`, `Restaurants_id`) VALUES
	(1, 'LuanaAdm', '$2y$10$1S9WoMUa0yz8kvygsuphvuWfFwSVHIlUjd9Qzhle.mCZS/zqhk4Aq', 1);
	
INSERT INTO `categorys` (`id`, `category`) VALUES
	(1, 'Salés'),
	(2, 'Huitres'),
	(3, 'Fruit de mer'),
	(4, 'Boissons'),
	(5, 'Dessert'),
	(6, 'Entre'),
	(7, 'Plat Principal');	
	
INSERT INTO `seasons` (`id`, `dateBegin`, `dateEnd`, `nbrPeopleAvailableDay`, `openWeek`) VALUES
	(1, '2020-09-22', '2020-12-20', 16, 0),
	(2, '2020-12-21', '2021-03-19', 12, 1),
	(3, '2021-03-20', '2021-06-19', 16, 0),
	(4, '2021-06-20', '2021-09-21', 12, 1),
	(5, '2019-12-21', '2020-03-19', 12, 1),
	(6, '2020-03-20', '2020-06-19', 16, 0),
	(7, '2020-06-20', '2020-09-21', 12, 1);
	
	
INSERT INTO `dishes` (` id`, `Name`, `price`, `description`, `photo`, `Categorys_id`) VALUES
	(1, 'Huîtres naturelles', 55.00, '     Servi dans une assiette avec de la glace et des citrons', 'Image/Natur.jpg', 2),
	(2, 'Huîtres cuites', 58.00, 'Cuit et tempéré', 'Image/SansPhotoTransparance.png', 2),
	(3, 'Huîtres provençales', 65.00, 'Cuit à l\'huile d\'olive, ail et persil', 'Image/Provençales.jpg', 2),
	(4, 'Huîtres française', 65.00, 'Cuit à la sauce béchamel et fromage primadonna', 'Image/Française.jpg', 2),
	(5, 'Huîtres brésiliennes', 65.00, 'Cuit avec du beurre et herbes', 'Image/Huitres_Bresil.jpg', 2),
	(6, 'Huîtres au pesto', 65.00, 'Cuit avec la sauce pesto', 'Image/SansPhotoTransparance.png', 2),
	(7, 'Huîtres au gratin', 60.00, 'Gratiné aux fromage permesan', 'Image/Gratin_7.jpg', 2),
	(8, 'Huîtres au caviar', 70.00, 'Crues avec des oeus de caviar de capelan', 'Image/Caviar.jpg', 2),
	(9, 'Huîtres champignons et noix', 65.00, 'Cuit à la sauce champignons et noix', 'Image/ChampignonsEtNoix.JPG', 2),
	(10, 'Huîtres Mont blanc', 65.00, 'Cuit avec du fromage raclette et gelée de vin', 'Image/Huitres_Fromage_Gel.jpg', 2),
	(11, 'POT-POURRI', 65.00, 'Douzaine avec trois huîtres différents au choix', 'Image/PTP.png', 2),
	(12, 'Crabe', 120.00, 'Accompagné d\'une portion de haricots, vinaigrette et farine de manioc', 'Image/Crabes.jpg', 7),
	(13, 'Sole avec sauce aux crevettes', 138.00, 'Accompagné de riz, pommes de terre et salade avec sauce aux crevettes', 'Image/SoleSauceAuxCrevettes.jpg', 7),
	(14, 'Riz au moule', 90.00, 'riz à base de moule et crevettes, accompagné de salade et moule à vinaigrette', 'Image/RizMoule.jpg', 7),
	(15, 'Coeur de palmier rôti', 60.00, 'cœur de palmier sur le grill arrosé de beurre et de fines herbes', 'Image/PalmierRoti.jpg', 7),
	(16, 'Moule', 45.00, '', 'Image/Moule.JPG', 3),
	(17, 'Camarula', 100.00, 'Crevettes et calmar à l\'ail et à l\'huile d\'olive', 'Image/SansPhotoTransparance.png', 3),
	(18, 'Crevettes panées', 100.00, '', 'Image/CrevettesPanees.JPG', 3),
	(19, 'Appât de poisson', 45.00, '', 'Image/SansPhotoTransparance.png', 3),
	(20, 'Calmar panées', 52.00, '', 'Image/SansPhotoTransparance.png', 3),
	(21, 'Casquinha de crabe', 15.00, '', 'Image/CasquinhaCrabe_2.jpg', 3),
	(22, 'Frites', 22.00, '', 'Image/SansPhotoTransparance.png', 1),
	(23, 'Banana cuite avec la glace', 10.00, 'Banana cuit avec du sucre et cannelle, accompagnée de la glace', 'Image/SansPhotoTransparance.png', 5),
	(24, 'Caipirinha', 21.00, 'Citron ou fruit de la passion', 'Image/SansPhotoTransparance.png', 4),
	(25, 'Jus naturel-Verre', 10.00, 'Orange, citron ou fuit de la passion', 'Image/SansPhotoTransparance.png', 4),
	(26, 'Jus naturel-pot', 19.00, 'Orange, citron ou fuit de la passion', 'Image/SansPhotoTransparance.png', 4),
	(27, 'ragoût de poisson', 130.00, 'Accompagné de riz et farine de manioc', 'Image/RagoutPoisson.jpg', 7);	
	
INSERT INTO `menus` (`id`, `title`, `price`) VALUES
	(1, 'Menu du Jour', 80),
	(2, 'Menu enfant', 60);


