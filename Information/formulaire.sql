-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 mars 2024 à 13:15
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_figure`
--

DROP TABLE IF EXISTS `formulaire_figure`;
CREATE TABLE IF NOT EXISTS `formulaire_figure` (
  `nom_du_donateur` varchar(20) NOT NULL,
  `nom_figure` varchar(20) NOT NULL,
  `code_SVG` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formulaire_figure`
--

INSERT INTO `formulaire_figure` (`nom_du_donateur`, `nom_figure`, `code_SVG`, `id`) VALUES
('kader', 'triangle', '<svg height=\\\"500\\\" width=\\\"500\\\">\r\n		    <polygon points=\\\"250,60 100,400 400,400\\\" class=\\\"triangle\\\" />\r\n	  </svg>\r\n', 55),
('ame', 'coeur', '<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" viewBox=\\\"0 0 50 50\\\" width=\\\"400\\\" height=\\\"400\\\"  fill=\\\"currentColor\\\">\r\n    <path d=\\\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C15.09 3.81 16.76 3 18.5 3 21.58 3 24 5.42 24 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\\\" fill=\\\"white\\\"/>\r\n</svg>', 54);

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_fond`
--

DROP TABLE IF EXISTS `formulaire_fond`;
CREATE TABLE IF NOT EXISTS `formulaire_fond` (
  `nom_du_donateur` varchar(20) NOT NULL,
  `nom_du_fond` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code_SVG` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formulaire_fond`
--

INSERT INTO `formulaire_fond` (`nom_du_donateur`, `nom_du_fond`, `code_SVG`, `id`) VALUES
('ame', 'rouge', '\r\n<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" version=\\\"1.1\\\" xmlns:xlink=\\\"http://www.w3.org/1999/xlink\\\" xmlns:svgjs=\\\"http://svgjs.dev/svgjs\\\" viewBox=\\\"0 0 100 100\\\" width=\\\"500\\\" height=\\\"500\\\" opacity=\\\"1\\\"><defs><filter id=\\\"nnnoise-filter\\\" x=\\\"50%\\\" y=\\\"50%\\\" width=\\\"140%\\\" height=\\\"140%\\\" filterUnits=\\\"objectBoundingBox\\\" primitiveUnits=\\\"userSpaceOnUse\\\" color-interpolation-filters=\\\"linearRGB\\\">\r\n	<feTurbulence type=\\\"turbulence\\\" baseFrequency=\\\"0.2\\\" numOctaves=\\\"4\\\" seed=\\\"15\\\" stitchTiles=\\\"stitch\\\" x=\\\"0%\\\" y=\\\"0%\\\" width=\\\"100%\\\" height=\\\"100%\\\" result=\\\"turbulence\\\"></feTurbulence>\r\n	<feSpecularLighting surfaceScale=\\\"40\\\" specularConstant=\\\"3\\\" specularExponent=\\\"20\\\" lighting-color=\\\"#f40000ff\\\" x=\\\"0%\\\" y=\\\"0%\\\" width=\\\"100%\\\" height=\\\"100%\\\" in=\\\"turbulence\\\" result=\\\"specularLighting\\\">\r\n    		<feDistantLight azimuth=\\\"3\\\" elevation=\\\"34\\\"></feDistantLight>\r\n  	</feSpecularLighting>\r\n  \r\n</filter></defs><rect width=\\\"500\\\" height=\\\"500\\\" fill=\\\"#f40000ff\\\"></rect><rect width=\\\"500\\\" height=\\\"500\\\" fill=\\\"#f40000ff\\\" filter=\\\"url(#nnnoise-filter)\\\"></rect></svg>\r\n', 58),
('kader', 'vert', '<svg viewBox=\\\"0 0 100 100\\\" width=\\\"500\\\" height=\\\"500\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\">\r\n  <rect width=\\\"100%\\\" height=\\\"100%\\\" fill=\\\"green\\\" />\r\n</svg>\r\n', 60);

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_logo`
--

DROP TABLE IF EXISTS `formulaire_logo`;
CREATE TABLE IF NOT EXISTS `formulaire_logo` (
  `nom_du_donateur` varchar(20) NOT NULL,
  `nom_logo` varchar(20) NOT NULL,
  `code_SVG` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formulaire_logo`
--

INSERT INTO `formulaire_logo` (`nom_du_donateur`, `nom_logo`, `code_SVG`, `id`) VALUES
('kader', 'trianglevert', '<svg viewBox=\"0 0 100 100\" width=\"500\" height=\"500\" xmlns=\"http://www.w3.org/2000/svg\">\r\n  <rect width=\"100%\" height=\"100%\" fill=\"green\" />\r\n</svg>\r\n<svg height=\"500\" width=\"500\">\r\n		    <polygon points=\"250,60 100,400 400,400\" class=\"triangle\" />\r\n	  </svg>\r\n', 109),
('ame', 'coeur rouge', '\r\n<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:svgjs=\"http://svgjs.dev/svgjs\" viewBox=\"0 0 100 100\" width=\"500\" height=\"500\" opacity=\"1\"><defs><filter id=\"nnnoise-filter\" x=\"50%\" y=\"50%\" width=\"140%\" height=\"140%\" filterUnits=\"objectBoundingBox\" primitiveUnits=\"userSpaceOnUse\" color-interpolation-filters=\"linearRGB\">\r\n	<feTurbulence type=\"turbulence\" baseFrequency=\"0.2\" numOctaves=\"4\" seed=\"15\" stitchTiles=\"stitch\" x=\"0%\" y=\"0%\" width=\"100%\" height=\"100%\" result=\"turbulence\"></feTurbulence>\r\n	<feSpecularLighting surfaceScale=\"40\" specularConstant=\"3\" specularExponent=\"20\" lighting-color=\"#f40000ff\" x=\"0%\" y=\"0%\" width=\"100%\" height=\"100%\" in=\"turbulence\" result=\"specularLighting\">\r\n    		<feDistantLight azimuth=\"3\" elevation=\"34\"></feDistantLight>\r\n  	</feSpecularLighting>\r\n  \r\n</filter></defs><rect width=\"500\" height=\"500\" fill=\"#f40000ff\"></rect><rect width=\"500\" height=\"500\" fill=\"#f40000ff\" filter=\"url(#nnnoise-filter)\"></rect></svg>\r\n<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 50 50\" width=\"400\" height=\"400\"  fill=\"currentColor\">\r\n    <path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C15.09 3.81 16.76 3 18.5 3 21.58 3 24 5.42 24 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\" fill=\"white\"/>\r\n</svg>', 108);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
