-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 16 Juillet 2014 à 16:29
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `coupon`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `cat`) VALUES
(1, 'Abonnement magazines'),
(2, 'Alimentation'),
(3, 'Automobile'),
(4, 'Beauté'),
(5, 'Bébé'),
(6, 'Bijoux'),
(7, 'Bio - écolo'),
(8, 'Bricolage'),
(9, 'Cadeaux'),
(10, 'Camping'),
(11, 'Chaussures'),
(12, 'Chocolat'),
(13, 'Consommables informatique'),
(14, 'Cuisine'),
(15, 'Décoration'),
(16, 'Electroménager'),
(17, 'Equipement de la maison'),
(18, 'Faire-part'),
(19, 'Fleurs'),
(20, 'High-tech'),
(21, 'Hôtels'),
(22, 'Informatique'),
(23, 'Jardinage'),
(24, 'Jouets'),
(25, 'Lingerie'),
(26, 'Literie matelas'),
(27, 'Location vacances'),
(28, 'Location voiture'),
(29, 'Loisirs créatifs'),
(30, 'Maroquinerie'),
(31, 'Meubles'),
(32, 'Parfums'),
(33, 'Santé'),
(34, 'Sport-fitness'),
(35, 'Téléphonie'),
(36, 'Tirage photo'),
(37, 'Vente privées'),
(38, 'Vêtements enfants'),
(39, 'Vêtements-mode'),
(40, 'Voyages');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_articles`
--

CREATE TABLE IF NOT EXISTS `cms_v2_articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `date_publication` date NOT NULL DEFAULT '0000-00-00',
  `date_modification` date NOT NULL DEFAULT '0000-00-00',
  `id_utilisateur` int(11) NOT NULL DEFAULT '0',
  `titre` text NOT NULL,
  `texte` longtext NOT NULL,
  `texte_suite` longtext NOT NULL,
  `lien` text NOT NULL,
  `image` text NOT NULL,
  `id_page` int(11) NOT NULL DEFAULT '0',
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `cms_v2_articles`
--

INSERT INTO `cms_v2_articles` (`id_article`, `date_publication`, `date_modification`, `id_utilisateur`, `titre`, `texte`, `texte_suite`, `lien`, `image`, `id_page`, `ordre_affichage`, `language`) VALUES
(1, '2011-08-16', '0000-00-00', 0, 'ds', 'dsdsd', 'Publications-transports', '', 'qualification_1313482543.png', 0, 0, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_budget`
--

CREATE TABLE IF NOT EXISTS `cms_v2_budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget` text NOT NULL,
  `budget_fr` text NOT NULL,
  `budget_en` text NOT NULL,
  `budget_al` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `cms_v2_budget`
--

INSERT INTO `cms_v2_budget` (`id`, `budget`, `budget_fr`, `budget_en`, `budget_al`) VALUES
(1, '< 20 ', '< 20 ', '< 20 ', '< 20 '),
(2, 'de 20 ', 'de 20 ', '20 to 60 ', '20 bis 60 '),
(3, 'de 60 ', 'de 60 ', '60 to 120', '60 bis 120'),
(5, 'de 120 ', 'de 120 ', '120 to 200 ', '120 bis 200 '),
(6, '> 200 ', '> 200 ', '> 200 ', '> 200 ');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_catalogue_categories`
--

CREATE TABLE IF NOT EXISTS `cms_v2_catalogue_categories` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `titre` text NOT NULL,
  `texte` longtext NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Contenu de la table `cms_v2_catalogue_categories`
--

INSERT INTO `cms_v2_catalogue_categories` (`id_page`, `parent_id`, `titre`, `texte`, `ordre_affichage`, `language`) VALUES
(80, 0, 'Collection', '', 0, 'fr'),
(81, 0, 'Visites', '', 0, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_catalogue_commandes`
--

CREATE TABLE IF NOT EXISTS `cms_v2_catalogue_commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pack` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `nbr_produits` int(11) NOT NULL DEFAULT '0',
  `prix_unitaire` float NOT NULL DEFAULT '0',
  `stotal` float NOT NULL DEFAULT '0',
  `frais_paypal` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `id_pack` int(11) NOT NULL DEFAULT '0',
  `statut_paiement` tinyint(4) NOT NULL DEFAULT '0',
  `mail_sent` tinyint(4) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `cms_v2_catalogue_commandes`
--

INSERT INTO `cms_v2_catalogue_commandes` (`id_commande`, `nom_pack`, `nom`, `prenom`, `email`, `nbr_produits`, `prix_unitaire`, `stotal`, `frais_paypal`, `total`, `id_pack`, `statut_paiement`, `mail_sent`, `language`) VALUES
(14, 'SCREAM GLOBAL CIRCUIT', 'Lion', 'Nicolas', 'nlion@mail.Fr', 2, 45, 195, 6.83, 201.83, 27, 0, 0, 'fr'),
(15, 'SCREAM GLOBAL CIRCUIT', 'Lion', 'Nicolas', 'nicolas@mail.Com', 8, 45, 705, 24.68, 729.68, 27, 0, 0, 'fr'),
(16, 'GIANT TEA DANCE ', 'Nom', 'Pr', 'nlion@mail.fr', 1, 25, 25, 0.88, 25.88, 33, 0, 0, 'fr'),
(17, 'SCREAM GLOBAL CIRCUIT', 'Julien', 'Fango', 'fango@mail.Fr', 5, 45, 360, 12.6, 372.6, 27, 0, 0, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_catalogue_commandes_amis`
--

CREATE TABLE IF NOT EXISTS `cms_v2_catalogue_commandes_amis` (
  `id_amis` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `id_commande` int(11) NOT NULL DEFAULT '0',
  `id_pack` int(11) NOT NULL DEFAULT '0',
  `titre_pack` text NOT NULL,
  PRIMARY KEY (`id_amis`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `cms_v2_catalogue_commandes_amis`
--

INSERT INTO `cms_v2_catalogue_commandes_amis` (`id_amis`, `nom`, `prenom`, `id_commande`, `id_pack`, `titre_pack`) VALUES
(6, 'Lion', 'Nicolas', 14, 31, 'Test 2 pack propos'),
(7, 'Sebastien', 'artime', 14, 39, 'test 3'),
(8, 'nom 1 pack1', 'nom 1 pack1', 15, 13, 'Scream Global Circuit du 19-20 Mars 2011'),
(9, 'nom 2 pack1', 'nom 2 pack1', 15, 13, 'Scream Global Circuit du 19-20 Mars 2011'),
(10, 'nom 3 pack1', 'nom 3 pack1', 15, 13, 'Scream Global Circuit du 19-20 Mars 2011'),
(11, 'nom 1 pack2', 'nom 1 pack2', 15, 31, 'Test 2 pack propos'),
(12, 'nom 2 pack2', 'nom 2 pack2', 15, 31, 'Test 2 pack propos'),
(13, 'nom 3 pack2', 'nom 3 pack2', 15, 31, 'Test 2 pack propos'),
(14, 'nom 4 pack2', 'nom 4 pack2', 15, 31, 'Test 2 pack propos'),
(15, 'nom 1 pack3', 'nom 1 pack3', 15, 39, 'test 3'),
(16, 'Nom', 'Pr', 16, 40, 'test'),
(17, 'Scream Global nom 1', 'Scream Global prenom 1', 17, 13, 'Scream Global Circuit du 19-20 Mars 2011'),
(18, 'Scream Global nom 2', 'Scream Global prenom 2', 17, 13, 'Scream Global Circuit du 19-20 Mars 2011'),
(19, 'Scream Global nom 3', 'Scream Global prenom 3', 17, 13, 'Scream Global Circuit du 19-20 Mars 2011'),
(20, 'Test 2 nom 1', 'Test 2 prenom 1', 17, 31, 'Test 2 pack propos'),
(21, 'Test 2 nom 2', 'Test 2 prenom 2', 17, 31, 'Test 2 pack propos');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_catalogue_produits`
--

CREATE TABLE IF NOT EXISTS `cms_v2_catalogue_produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `texte` text NOT NULL,
  `texte_suite` text NOT NULL,
  `texte2` text NOT NULL,
  `image` text NOT NULL,
  `id_categorie` int(11) NOT NULL DEFAULT '0',
  `bool` tinyint(4) NOT NULL DEFAULT '0',
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `cms_v2_catalogue_produits`
--

INSERT INTO `cms_v2_catalogue_produits` (`id_produit`, `titre`, `texte`, `texte_suite`, `texte2`, `image`, `id_categorie`, `bool`, `ordre_affichage`) VALUES
(51, 'produit 1', '', 'dddddddddddddd dsdsd&nbsp; dddddddddddddd dsdsd dddddddddddddd dsdsd dddddddddddddd dsdsd dddddddddddddd dsdsd dddddddddddddd dsdsd', 'Collection ete', 'article_1312904789.jpg', 80, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_catalogue_produits_packs`
--

CREATE TABLE IF NOT EXISTS `cms_v2_catalogue_produits_packs` (
  `id_pack` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL DEFAULT '0',
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `taxe` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pack`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_config`
--

CREATE TABLE IF NOT EXISTS `cms_v2_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `cms_v2_config`
--

INSERT INTO `cms_v2_config` (`id`, `config_name`, `config_value`) VALUES
(1, 'Email_exp', ''),
(2, 'Email_admin1', ''),
(3, 'Email_admin2', ''),
(4, 'Email_paiement_en_ligne', 'paypal@paypal.com'),
(5, 'lien_facebook', 'http://www.facebook.com/'),
(6, 'lien_twitter', 'http://www.twitter.com/'),
(7, 'lien_webmail', 'http://www.linkedin.com/'),
(10, 'lien_video', ''),
(8, 'txt_pied_page', ''),
(9, 'config_simple_image', 'photo_accueil_1298559304.jpg'),
(11, 'lien_boutique', 'http://www.viadeo.com/fr/connexion/');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_galerie_photos`
--

CREATE TABLE IF NOT EXISTS `cms_v2_galerie_photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `titre2` text NOT NULL,
  `fichier` text NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  `id_album` int(11) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=361 ;

--
-- Contenu de la table `cms_v2_galerie_photos`
--

INSERT INTO `cms_v2_galerie_photos` (`id_photo`, `titre`, `titre2`, `fichier`, `ordre_affichage`, `id_album`, `language`) VALUES
(268, '', '', 'galerie_photos_1298902200.jpg', 0, 20, 'en'),
(269, '', '', 'galerie_photos_1298902210.jpg', 0, 20, 'en'),
(270, '', '', 'galerie_photos_1298902220.jpg', 0, 20, 'en'),
(102, '', '', 'galerie_photos_1298697257.jpg', 0, 20, 'en'),
(257, '', '', 'galerie_photos_1298902113.jpg', 0, 20, 'en'),
(258, '', '', 'galerie_photos_1298902121.jpg', 0, 20, 'en'),
(259, '', '', 'galerie_photos_1298902129.jpg', 0, 20, 'en'),
(260, '', '', 'galerie_photos_1298902138.jpg', 0, 20, 'en'),
(261, '', '', 'galerie_photos_1298902145.jpg', 0, 20, 'en'),
(262, '', '', 'galerie_photos_1298902154.jpg', 0, 20, 'en'),
(263, '', '', 'galerie_photos_1298902163.jpg', 0, 20, 'en'),
(264, '', '', 'galerie_photos_1298902170.jpg', 0, 20, 'en'),
(265, '', '', 'galerie_photos_1298902177.jpg', 0, 20, 'en'),
(266, '', '', 'galerie_photos_1298902184.jpg', 0, 20, 'en'),
(267, '', '', 'galerie_photos_1298902192.jpg', 0, 20, 'en'),
(271, '', '', 'galerie_photos_1298902229.jpg', 0, 20, 'en'),
(272, '', '', 'galerie_photos_1298902238.jpg', 0, 20, 'en'),
(273, '', '', 'galerie_photos_1298902246.jpg', 0, 20, 'en'),
(274, '', '', 'galerie_photos_1298902255.jpg', 0, 20, 'en'),
(275, '', '', 'galerie_photos_1298902270.jpg', 0, 20, 'en'),
(182, '', '', 'galerie_photos_1298899793.jpg', 0, 22, 'en'),
(183, '', '', 'galerie_photos_1298899832.jpg', 0, 22, 'en'),
(185, '', '', 'galerie_photos_1298899918.jpg', 0, 22, 'en'),
(186, '', '', 'galerie_photos_1298899930.jpg', 0, 22, 'en'),
(187, '', '', 'galerie_photos_1298899939.jpg', 0, 22, 'en'),
(188, '', '', 'galerie_photos_1298899946.jpg', 0, 22, 'en'),
(189, '', '', 'galerie_photos_1298899955.jpg', 0, 22, 'en'),
(190, '', '', 'galerie_photos_1298899963.jpg', 0, 22, 'en'),
(191, '', '', 'galerie_photos_1298899970.jpg', 0, 22, 'en'),
(192, '', '', 'galerie_photos_1298899977.jpg', 0, 22, 'en'),
(193, '', '', 'galerie_photos_1298899986.jpg', 0, 22, 'en'),
(194, '', '', 'galerie_photos_1298899995.jpg', 0, 22, 'en'),
(195, '', '', 'galerie_photos_1298900009.jpg', 0, 22, 'en'),
(198, '', '', 'galerie_photos_1298900100.jpg', 0, 22, 'en'),
(199, '', '', 'galerie_photos_1298900111.jpg', 0, 22, 'en'),
(200, '', '', 'galerie_photos_1298900125.jpg', 0, 22, 'en'),
(201, '', '', 'galerie_photos_1298900137.jpg', 0, 22, 'en'),
(202, '', '', 'galerie_photos_1298900148.jpg', 0, 22, 'en'),
(203, '', '', 'galerie_photos_1298900157.jpg', 0, 22, 'en'),
(204, '', '', 'galerie_photos_1298900166.jpg', 0, 22, 'en'),
(205, '', '', 'galerie_photos_1298900174.jpg', 0, 22, 'en'),
(206, '', '', 'galerie_photos_1298900185.jpg', 0, 22, 'en'),
(207, '', '', 'galerie_photos_1298900198.jpg', 0, 22, 'en'),
(208, '', '', 'galerie_photos_1298900208.jpg', 0, 22, 'en'),
(209, '', '', 'galerie_photos_1298900218.jpg', 0, 22, 'en'),
(210, '', '', 'galerie_photos_1298900228.jpg', 0, 22, 'en'),
(211, '', '', 'galerie_photos_1298900237.jpg', 0, 22, 'en'),
(212, '', '', 'galerie_photos_1298900262.jpg', 0, 22, 'en'),
(213, '', '', 'galerie_photos_1298900274.jpg', 0, 22, 'en'),
(214, '', '', 'galerie_photos_1298900287.jpg', 0, 22, 'en'),
(215, '', '', 'galerie_photos_1298900299.jpg', 0, 22, 'en'),
(216, '', '', 'galerie_photos_1298900311.jpg', 0, 22, 'en'),
(217, '', '', 'galerie_photos_1298900324.jpg', 0, 22, 'en'),
(218, '', '', 'galerie_photos_1298900336.jpg', 0, 22, 'en'),
(219, '', '', 'galerie_photos_1298900348.jpg', 0, 22, 'en'),
(220, '', '', 'galerie_photos_1298900364.jpg', 0, 22, 'en'),
(221, '', '', 'galerie_photos_1298900376.jpg', 0, 22, 'en'),
(222, '', '', 'galerie_photos_1298900389.jpg', 0, 22, 'en'),
(223, '', '', 'galerie_photos_1298900397.jpg', 0, 22, 'en'),
(276, '', '', 'galerie_photos_1298902279.jpg', 0, 20, 'en'),
(277, '', '', 'galerie_photos_1298902288.jpg', 0, 20, 'en'),
(278, '', '', 'galerie_photos_1298902297.jpg', 0, 20, 'en'),
(279, '', '', 'galerie_photos_1298902306.jpg', 0, 20, 'en'),
(280, '', '', 'galerie_photos_1298902332.jpg', 0, 20, 'en'),
(281, '', '', 'galerie_photos_1298902343.jpg', 0, 20, 'en'),
(282, '', '', 'galerie_photos_1298902352.jpg', 0, 20, 'en'),
(283, '', '', 'galerie_photos_1298902362.jpg', 0, 20, 'en'),
(284, '', '', 'galerie_photos_1298902373.jpg', 0, 20, 'en'),
(285, '', '', 'galerie_photos_1298902385.jpg', 0, 20, 'en'),
(331, '', '', 'galerie_photos_1344780211.jpg', 0, 0, 'fr'),
(333, '', '', 'galerie_photos_1344780221.jpg', 0, 0, 'fr'),
(334, '', '', 'galerie_photos_1344780227.jpg', 0, 0, 'fr'),
(336, '', '', 'galerie_photos_1344780238.gif', 0, 0, 'fr'),
(337, '', '', 'galerie_photos_1344780243.jpg', 0, 0, 'fr'),
(338, '', '', 'galerie_photos_1344780250.jpg', 0, 0, 'fr'),
(339, '', '', 'galerie_photos_1344780257.jpg', 0, 0, 'fr'),
(340, '', '', 'galerie_photos_1344780263.jpg', 0, 0, 'fr'),
(341, '', '', 'galerie_photos_1344780270.jpg', 0, 0, 'fr'),
(342, '', '', 'galerie_photos_1344780276.jpg', 0, 0, 'fr'),
(343, '', '', 'galerie_photos_1344780284.jpg', 0, 0, 'fr'),
(344, '', '', 'galerie_photos_1344780291.jpg', 0, 0, 'fr'),
(345, '', '', 'galerie_photos_1344780298.jpg', 0, 0, 'fr'),
(346, '', '', 'galerie_photos_1344780304.jpg', 0, 0, 'fr'),
(347, '', '', 'galerie_photos_1344780311.jpg', 0, 0, 'fr'),
(348, '', '', 'galerie_photos_1344780317.jpg', 0, 0, 'fr'),
(349, '', '', 'galerie_photos_1344780328.jpg', 0, 0, 'fr'),
(350, '', '', 'galerie_photos_1344780338.jpg', 0, 0, 'fr'),
(351, '', '', 'galerie_photos_1344780345.jpg', 0, 0, 'fr'),
(355, '', '', 'galerie_photos_1344780386.jpg', 0, 0, 'fr'),
(356, '', '', 'galerie_photos_1344780394.jpg', 0, 0, 'fr'),
(360, '', '', 'galerie_photos_1344780440.jpg', 0, 0, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_galerie_photos_album`
--

CREATE TABLE IF NOT EXISTS `cms_v2_galerie_photos_album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `fichier` text NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_galerie_videos`
--

CREATE TABLE IF NOT EXISTS `cms_v2_galerie_videos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `image_presentation` text NOT NULL,
  `titre` text NOT NULL,
  `fichier` text NOT NULL,
  `url` text NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `cms_v2_galerie_videos`
--

INSERT INTO `cms_v2_galerie_videos` (`id_video`, `image_presentation`, `titre`, `fichier`, `url`, `ordre_affichage`, `language`) VALUES
(28, '', 'Video 1', '', 'www.youtube.com/watch?v=MIyNHFVCHlM', 0, 'fr'),
(29, '', 'Video 2', '', 'www.youtube.com/watch?v=iw-S1uZ3LbI&feature=related', 0, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_hektor`
--

CREATE TABLE IF NOT EXISTS `cms_v2_hektor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `reference` text NOT NULL,
  `numero_mandat` text NOT NULL,
  `type_offre` text NOT NULL,
  `agence` text NOT NULL,
  `corps` text NOT NULL,
  `corps_impression` text NOT NULL,
  `prix` text NOT NULL,
  `url` text NOT NULL,
  `type_bien` text NOT NULL,
  `type_bien_code` text NOT NULL,
  `surface_habitable` text NOT NULL,
  `surface_terrain` text NOT NULL,
  `nb_pieces` int(11) NOT NULL DEFAULT '0',
  `chambres` int(11) NOT NULL DEFAULT '0',
  `nb_etages` int(11) NOT NULL DEFAULT '0',
  `etage` int(11) NOT NULL DEFAULT '0',
  `sdb` int(11) NOT NULL DEFAULT '0',
  `sde` int(11) NOT NULL DEFAULT '0',
  `wc` int(11) NOT NULL DEFAULT '0',
  `parking` tinyint(4) NOT NULL DEFAULT '0',
  `piscine` tinyint(4) NOT NULL DEFAULT '0',
  `exposition` text NOT NULL,
  `cons_energie` text NOT NULL,
  `class_energie` text NOT NULL,
  `emission_gaz` text NOT NULL,
  `class_emission_gaz` text NOT NULL,
  `ville` text NOT NULL,
  `cp` text NOT NULL,
  `departement` text NOT NULL,
  `images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_imgproduits`
--

CREATE TABLE IF NOT EXISTS `cms_v2_imgproduits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `cms_v2_imgproduits`
--

INSERT INTO `cms_v2_imgproduits` (`id`, `id_produit`, `image`) VALUES
(1, 49, 'article_1312896569.jpg'),
(2, 49, 'article_1312896573.jpg'),
(3, 49, 'article_1312896576.jpg'),
(4, 50, 'article_1312896597.jpg'),
(17, 51, 'article_1312965941.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_jours_semaine`
--

CREATE TABLE IF NOT EXISTS `cms_v2_jours_semaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_fr` text NOT NULL,
  `titre_en` text NOT NULL,
  `titre_al` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `cms_v2_jours_semaine`
--

INSERT INTO `cms_v2_jours_semaine` (`id`, `titre_fr`, `titre_en`, `titre_al`) VALUES
(1, 'Lundi', 'Monday', 'Montag'),
(2, 'Mardi', 'Tuesday', 'Dienstag'),
(3, 'Mercredi', 'Wednesday', 'Mittwoch'),
(4, 'Jeudi', 'Thursday', 'Donnerstag'),
(5, 'Vendredi', 'Friday', 'Freitag'),
(6, 'Samedi', 'Saturday', 'Samstag'),
(7, 'Dimanche', 'Sunday', 'Sonntag');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_languages`
--

CREATE TABLE IF NOT EXISTS `cms_v2_languages` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `symbol` text NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `cms_v2_languages`
--

INSERT INTO `cms_v2_languages` (`id_language`, `titre`, `symbol`) VALUES
(1, 'Fran', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_membres`
--

CREATE TABLE IF NOT EXISTS `cms_v2_membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `societe` text NOT NULL,
  `adresse` text NOT NULL,
  `siren` varchar(50) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `site` varchar(120) NOT NULL,
  `zone` text NOT NULL,
  `typologie` varchar(20) NOT NULL,
  `fonction` text NOT NULL,
  `engage` varchar(15) NOT NULL,
  `produits` text NOT NULL,
  `personne_responsable` text NOT NULL,
  `delai_reservation` tinyint(4) NOT NULL DEFAULT '0',
  `restauration_groupe` tinyint(4) NOT NULL DEFAULT '0',
  `salles_privatives` tinyint(4) NOT NULL DEFAULT '0',
  `soirees_themes` tinyint(4) NOT NULL DEFAULT '0',
  `soirees_privatives` tinyint(4) NOT NULL DEFAULT '0',
  `password` text NOT NULL,
  `email` text NOT NULL,
  `email_professionnel` text NOT NULL,
  `language` text NOT NULL,
  `date_inscription` date NOT NULL DEFAULT '0000-00-00',
  `date_login` date NOT NULL DEFAULT '0000-00-00',
  `statut` tinyint(4) NOT NULL DEFAULT '0',
  `privilege` tinyint(4) NOT NULL DEFAULT '0',
  `pdf1` text NOT NULL,
  `pdf2` text NOT NULL,
  `pdf3` text NOT NULL,
  `pdf1_autorisation` tinyint(4) NOT NULL DEFAULT '0',
  `pdf2_autorisation` tinyint(4) NOT NULL DEFAULT '0',
  `pdf3_autorisation` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_membres_accueil`
--

CREATE TABLE IF NOT EXISTS `cms_v2_membres_accueil` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `texte` longtext NOT NULL,
  `language` text NOT NULL,
  `statut_connecte` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `cms_v2_membres_accueil`
--

INSERT INTO `cms_v2_membres_accueil` (`id_page`, `texte`, `language`, `statut_connecte`) VALUES
(1, '', 'fr', 1),
(2, 'Cette page vous est d', 'fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_membres_page`
--

CREATE TABLE IF NOT EXISTS `cms_v2_membres_page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL DEFAULT '0',
  `text` longtext NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `cms_v2_membres_page`
--

INSERT INTO `cms_v2_membres_page` (`id_page`, `id_membre`, `text`) VALUES
(2, 13, 'cqssssssssssssssssss');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_membres_restaurant`
--

CREATE TABLE IF NOT EXISTS `cms_v2_membres_restaurant` (
  `id_restaurant` int(11) NOT NULL AUTO_INCREMENT,
  `statut_etablissement` text NOT NULL,
  `adresse` text NOT NULL,
  `cp` text NOT NULL,
  `ville` text NOT NULL,
  `tel` text NOT NULL,
  `fax` text NOT NULL,
  `language` text NOT NULL,
  `nom_restaurant` text NOT NULL,
  `description` text NOT NULL,
  `url1` text NOT NULL,
  `url2` text NOT NULL,
  `url3` text NOT NULL,
  `url4` text NOT NULL,
  `id_membre` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_restaurant`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `cms_v2_membres_restaurant`
--

INSERT INTO `cms_v2_membres_restaurant` (`id_restaurant`, `statut_etablissement`, `adresse`, `cp`, `ville`, `tel`, `fax`, `language`, `nom_restaurant`, `description`, `url1`, `url2`, `url3`, `url4`, `id_membre`) VALUES
(18, 'G', '102 AVENUE DES CHAMPS ELYSEES', '75008', 'PARIS', '0659894839', '', 'en', 'TEST', 'TEST EN txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt txt ', '', '', '', '', 7),
(17, 'G', '102 AVENUE DES CHAMPS ELYSEES', '75008', 'PARIS', '0659894839', '', 'fr', 'TEST', 'TEST', '', '', '', '', 7),
(19, 'G', '102 AVENUE DES CHAMPS ELYSEES', '75008', 'PARIS', '0659894839', '', 'al', 'TEST', 'TEST', '', '', '', '', 7);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_metatags`
--

CREATE TABLE IF NOT EXISTS `cms_v2_metatags` (
  `id_metatags` int(11) NOT NULL AUTO_INCREMENT,
  `language` text NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `mots` text NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id_metatags`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cms_v2_metatags`
--

INSERT INTO `cms_v2_metatags` (`id_metatags`, `language`, `titre`, `description`, `mots`, `tags`) VALUES
(1, 'fr', 'Ma Reduction', '', '', 'tag sifro photo video Sifro '),
(3, 'al', ':: BOOKING TABLES  ::', '', '', ''),
(2, 'en', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_modules`
--

CREATE TABLE IF NOT EXISTS `cms_v2_modules` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `designation` text NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `cms_v2_modules`
--

INSERT INTO `cms_v2_modules` (`id_module`, `designation`) VALUES
(1, 'Formulaire de contact'),
(4, 'Rappel imm');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_module_to_page`
--

CREATE TABLE IF NOT EXISTS `cms_v2_module_to_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_module` int(11) NOT NULL DEFAULT '0',
  `id_page` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cms_v2_module_to_page`
--

INSERT INTO `cms_v2_module_to_page` (`id`, `id_module`, `id_page`) VALUES
(1, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_module_to_page_sup`
--

CREATE TABLE IF NOT EXISTS `cms_v2_module_to_page_sup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_module` int(11) NOT NULL DEFAULT '0',
  `id_page` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

--
-- Contenu de la table `cms_v2_module_to_page_sup`
--

INSERT INTO `cms_v2_module_to_page_sup` (`id`, `id_module`, `id_page`) VALUES
(161, 5, 23);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_newsletter_archive`
--

CREATE TABLE IF NOT EXISTS `cms_v2_newsletter_archive` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `objet` text NOT NULL,
  `texte` longtext NOT NULL,
  `statut` tinyint(4) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  `Public` text NOT NULL,
  `date_expedition` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_newsletter`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_newsletter_emails`
--

CREATE TABLE IF NOT EXISTS `cms_v2_newsletter_emails` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `tel` text NOT NULL,
  `ville` text NOT NULL,
  `pays` text NOT NULL,
  `language` text NOT NULL,
  `type_inscription` text NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `cms_v2_newsletter_emails`
--

INSERT INTO `cms_v2_newsletter_emails` (`id_email`, `email`, `nom`, `prenom`, `tel`, `ville`, `pays`, `language`, `type_inscription`) VALUES
(46, 'zozo@mail.fr', '', '', '', '', '', '', ''),
(45, 'ezzoubir@mail.fr', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_newsletter_sending_tmp`
--

CREATE TABLE IF NOT EXISTS `cms_v2_newsletter_sending_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_pages`
--

CREATE TABLE IF NOT EXISTS `cms_v2_pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `id_sous` int(11) NOT NULL DEFAULT '0',
  `titre` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` text NOT NULL,
  `texte` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  `autorisation_publication_articles` tinyint(4) NOT NULL DEFAULT '0',
  `language` text NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `cms_v2_pages`
--

INSERT INTO `cms_v2_pages` (`id_page`, `parent_id`, `id_sous`, `titre`, `img`, `texte`, `ordre_affichage`, `autorisation_publication_articles`, `language`) VALUES
(1, 0, 0, 'Accueil', '', '', 0, 0, 'fr'),
(6, 0, 0, 'Contact', '', '', 0, 0, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_pages_photos`
--

CREATE TABLE IF NOT EXISTS `cms_v2_pages_photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_page` int(11) NOT NULL DEFAULT '0',
  `fichier` text NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_pages_statiques`
--

CREATE TABLE IF NOT EXISTS `cms_v2_pages_statiques` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `texte` longtext NOT NULL,
  `language` text NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_pages_supplementaires`
--

CREATE TABLE IF NOT EXISTS `cms_v2_pages_supplementaires` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `texte` longtext NOT NULL,
  `language` text NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_photos_sans_categorie`
--

CREATE TABLE IF NOT EXISTS `cms_v2_photos_sans_categorie` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` text NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_photos_sans_categorie_avec_lien`
--

CREATE TABLE IF NOT EXISTS `cms_v2_photos_sans_categorie_avec_lien` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` text NOT NULL,
  `lien` text NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `cms_v2_photos_sans_categorie_avec_lien`
--

INSERT INTO `cms_v2_photos_sans_categorie_avec_lien` (`id_photo`, `fichier`, `lien`, `ordre_affichage`) VALUES
(42, 'photo_sans_cat_1405293002.jpg', '', 0),
(41, 'photo_sans_cat_1405292998.jpg', '', 0),
(40, 'photo_sans_cat_1405292994.jpg', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_restaurants_photos`
--

CREATE TABLE IF NOT EXISTS `cms_v2_restaurants_photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL DEFAULT '0',
  `fichier` text NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_restaurants_plats`
--

CREATE TABLE IF NOT EXISTS `cms_v2_restaurants_plats` (
  `id_plat` int(11) NOT NULL AUTO_INCREMENT,
  `titre_fr` text NOT NULL,
  `titre_en` text NOT NULL,
  `titre_al` text NOT NULL,
  `photo` text NOT NULL,
  `cat` text NOT NULL,
  `id_restaurant` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_plat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `cms_v2_restaurants_plats`
--

INSERT INTO `cms_v2_restaurants_plats` (`id_plat`, `titre_fr`, `titre_en`, `titre_al`, `photo`, `cat`, `id_restaurant`) VALUES
(1, 'Plat du jour', 'Today''s special', 'Today''s Special', 'photo_05.jpg', '1', 0),
(2, 'Suggestion\r\ndu chef', 'Suggestion\r\n the head', 'Anregung\r\n der Kopf', 'photo_07.jpg', '1', 0),
(3, 'Menu\r\nEntr', 'Menu\r\nEntr', 'Menu\r\nEntr', 'photo_09.jpg', '1', 0),
(4, 'Menu\r\nEntr', 'Menu\r\nEntr', 'Menu\r\nEntr', 'photo_14.jpg', '1', 0),
(5, 'Menu\r\nPlat +\r\nDessert', 'Menu\r\nPlat +\r\nDessert', 'Menu\r\nPlat +\r\nDessert', 'photo_15.jpg', '1', 0),
(6, 'Menu\r\nGastronomique', 'Menu\r\nGastronomique', 'Menu\r\nGastronomique', 'photo_16.jpg', '1', 0),
(7, 'Ap', 'Ap', 'Ap', 'photo_20.jpg', '2', 0),
(8, 'Bi', 'Bi', 'Bi', 'photo_21.jpg', '2', 0),
(9, 'Vin\r\nRouge', 'Vin\r\nRouge', 'Vin\r\nRouge', 'photo_22.jpg', '2', 0),
(10, 'Vin\r\nBlanc', 'Vin\r\nBlanc', 'Vin\r\nBlanc', 'photo_26.jpg', '2', 0),
(11, 'Vin\r\nRos', 'Vin\r\nRos', 'Vin\r\nRos', 'photo_27.jpg', '2', 0),
(12, 'Champagne', 'Champagne', 'Champagne', 'photo_28.jpg', '2', 0),
(13, 'Entr', 'Entr', 'Entr', 'photo_32.jpg', '3', 0),
(14, 'Entr', 'Entr', 'Entr', 'photo_33.jpg', '3', 0),
(15, 'Poisson', 'Poisson', 'Poisson', 'photo_34.jpg', '3', 0),
(16, 'Viande\r\nRouge', 'Viande\r\nRouge', 'Viande\r\nRouge', 'photo_39.jpg', '3', 0),
(17, 'Viande\r\nBlanche', 'Viande\r\nBlanche', 'Viande\r\nBlanche', 'photo_40.jpg', '3', 0),
(18, 'Volaille', 'Volaille', 'Volaille', 'photo_38.jpg', '3', 0),
(19, 'Grillade', 'Grillade', 'Grillade', 'photo_44.jpg', '3', 0),
(20, 'Coquillage\r\nCrustac', 'Coquillage\r\nCrustac', 'Coquillage\r\nCrustac', 'photo_45.jpg', '3', 0),
(21, 'Fromage', 'Fromage', 'Fromage', 'photo_46.jpg', '3', 0),
(22, 'Dessert', 'Dessert', 'Dessert', 'photo_50.jpg', '3', 0),
(23, 'Panier repas\r\ngroupe ', 'Panier repas\r\ngroupe ', 'Panier repas\r\ngroupe ', 'photo_51.jpg', '3', 0),
(24, 'Eau\r\nMin', 'Eau\r\nMin', 'Eau\r\nMin', 'photo_54.jpg', '4', 0),
(25, 'Soda', 'Soda', 'Soda', 'photo_55.jpg', '4', 0),
(26, 'Boisson\r\nFraiche', 'Boisson\r\nFraiche', 'Boisson\r\nFraiche', 'photo_56.jpg', '4', 0),
(27, 'Boisson\r\nChaude', 'Boisson\r\nChaude', 'Boisson\r\nChaude', 'photo_61.jpg', '4', 0),
(28, 'Digestif', 'Digestif', 'Digestif', 'photo_62.jpg', '4', 0),
(29, 'Alcool', 'Alcool', 'Alcool', 'photo_60.jpg', '4', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_restaurants_type`
--

CREATE TABLE IF NOT EXISTS `cms_v2_restaurants_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_cuisine` int(11) NOT NULL DEFAULT '0',
  `id_membre` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=203 ;

--
-- Contenu de la table `cms_v2_restaurants_type`
--

INSERT INTO `cms_v2_restaurants_type` (`id`, `id_type_cuisine`, `id_membre`) VALUES
(202, 7, 7),
(201, 4, 7),
(200, 3, 7),
(199, 2, 7),
(198, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_restaurant_budget`
--

CREATE TABLE IF NOT EXISTS `cms_v2_restaurant_budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL DEFAULT '0',
  `id_budget` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Contenu de la table `cms_v2_restaurant_budget`
--

INSERT INTO `cms_v2_restaurant_budget` (`id`, `id_membre`, `id_budget`) VALUES
(17, 8, 1),
(102, 7, 3),
(18, 9, 1),
(90, 10, 1),
(64, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_restaurant_fermeture_hebd`
--

CREATE TABLE IF NOT EXISTS `cms_v2_restaurant_fermeture_hebd` (
  `id_fermeture` int(11) NOT NULL AUTO_INCREMENT,
  `id_jour` int(11) NOT NULL DEFAULT '0',
  `id_membre` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_fermeture`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms_v2_slider`
--

CREATE TABLE IF NOT EXISTS `cms_v2_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_page` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `cms_v2_slider`
--

INSERT INTO `cms_v2_slider` (`id`, `id_page`, `description`, `image`) VALUES
(13, 1, '', 'article_1312965453.jpg'),
(14, 1, '', 'article_1312965465.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `uploaded` varchar(255) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `photo`, `author`, `email`, `comment`, `uploaded`) VALUES
(1, 1, 'd', 'ddd@ddd.ddd', 'ddd', '1311767950');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`name`, `value`) VALUES
('title', 'Galerie photo'),
('thumbnails_randomize', 'true'),
('comments_enabled', 'true'),
('quickDownload', 'true'),
('infos_showed', 'true'),
('viewMode', 'full'),
('version', '2.1.2');

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `site` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `id_marchand` varchar(256) NOT NULL,
  `logo` text NOT NULL,
  `presentation` text NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `reduction` varchar(10) NOT NULL,
  `statut` int(11) NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dates_fermeture`
--

CREATE TABLE IF NOT EXISTS `dates_fermeture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_fermeture` date NOT NULL DEFAULT '0000-00-00',
  `id_membre` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=294 ;

--
-- Contenu de la table `dates_fermeture`
--

INSERT INTO `dates_fermeture` (`id`, `date_fermeture`, `id_membre`) VALUES
(293, '2011-04-28', 7);

-- --------------------------------------------------------

--
-- Structure de la table `fluxrss`
--

CREATE TABLE IF NOT EXISTS `fluxrss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `orderid` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fluxrss_restrictions`
--

CREATE TABLE IF NOT EXISTS `fluxrss_restrictions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fluxid` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `in` int(11) NOT NULL DEFAULT '0',
  `orderid` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_marchand` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `marchands`
--

CREATE TABLE IF NOT EXISTS `marchands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `marchand` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `logo` text NOT NULL,
  `presentation` text NOT NULL,
  `responsable` varchar(256) NOT NULL,
  `responsable_email` varchar(256) NOT NULL,
  `responsable_mobile` varchar(256) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `site` varchar(256) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `message` text NOT NULL,
  `reduction` varchar(10) NOT NULL,
  `statut` int(11) NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `twitter` varchar(256) NOT NULL,
  `youtube` varchar(256) NOT NULL,
  `pinterest` varchar(256) NOT NULL,
  `linkedin` varchar(256) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_coupon` int(11) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id`, `ville`) VALUES
(1, 'Agadir'),
(3, 'Al Hoceima'),
(4, 'Asilah'),
(9, 'Casablanca'),
(10, 'Chefchaouen'),
(11, 'Dakhla'),
(12, 'El Jadida'),
(14, 'Essaouira'),
(15, 'Fès'),
(17, 'Ifrane'),
(19, 'Kénitra'),
(20, 'Khénifra'),
(21, 'Khouribga'),
(24, 'Marrakech'),
(25, 'Meknès'),
(26, 'Mohammedia'),
(27, 'Nador'),
(28, 'Ouarzazate'),
(29, 'Oujda'),
(30, 'Rabat'),
(31, 'Safi'),
(32, 'Salé'),
(37, 'Tanger'),
(38, 'Taroudant'),
(40, 'Témara'),
(41, 'Tétouan'),
(43, 'Laayoune');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
