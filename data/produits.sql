-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 07 avr. 2021 à 16:01
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12
DROP DATABASE IF EXISTS eistree;
CREATE DATABASE eistree;
USE eistree;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
SET NAMES utf8;
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Base de données :  `eistree`
--
-- --------------------------------------------------------
-- Structure de la table `categories`
--
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
--
-- Déchargement des données de la table `categories`
--
INSERT INTO `categories` (`id`, `nom`)
VALUES (1, 'arbustes'),
  (2, 'plantesf'),
  (3, 'plantesI');
-- --------------------------------------------------------
--
--
-- Structure de la table `produits`
--
DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` text NOT NULL,
  `nomscien` text NOT NULL,
  `img` text NOT NULL,
  `prix` float NOT NULL,
  `description` text,
  `hauteur` text,
  `temp` text,
  `feuillage` text,
  `arrosage` text,
  `floraison` text,
  `luminosite` text,
  `stock` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  KEY `cat_fk` (`categoryid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
--
-- Déchargement des données de la table `produits`
--
INSERT INTO `produits` (
    `id`,
    `nom`,
    `nomscien`,
    `img`,
    `prix`,
    `description`,
    `hauteur`,
    `temp`,
    `feuillage`,
    `arrosage`,
    `floraison`,
    `luminosite`,
    `stock`,
    `categoryid`
  )
VALUES (
    'chamaedorea',
    'Chamaedora',
    'Chamaedora Elegans',
    '/images/chamaedorea.jpg',
    8,
    'Petit palmier facile d''entretien, le chamaedorea assainit l''air et supporte la fumée.',
    NULL,
    'Entre 13°C et 25°C',
    NULL,
    '3x/semaine en été, 1x/semaine en hiver',
    NULL,
    'Lumière vive sans soleil ou mi-ombre',
    100,
    2
  ),
  (
    'citronnier',
    'Citronnier 4 saisons',
    'Citrus Limon',
    '/images/citronnier.jpg',
    60,
    'Donnant des fruits à toutes les saisons, le citronnier est cependant cultivable en pleine terre uniquement sur le pourtour méditerranéen.',
    '3 à 5 mètres',
    'Jusqu''à 3 ° C',
    'Persistant',
    NULL,
    NULL,
    NULL,
    100,
    1
  ),
  (
    'erable',
    'Erable',
    'Acer Japonicum',
    '/images/erable.jpg',
    240,
    'Cet arbre originaire du Japon égaye les jardins par son feuillage rouge orangé.',
    '6 mètres',
    'Jusqu''à -15°C',
    'Caduc',
    NULL,
    NULL,
    NULL,
    100,
    1
  ),
  (
    'rincebouteille',
    'Rince Bouteille',
    'Callistemon Citrinus',
    '/images/rincebouteille.jpg ',
    40,
    ' Fleurissant l''été, le callistemon -ou rince-bouteille- peut être planté en pleine terre uniquement dans les régions au climat doux.',
    '1 à 3 mètres',
    'Jusqu''à -6°C',
    'Persistant',
    NULL,
    'De Juin à Août',
    NULL,
    100,
    1
  );
-- --------------------------------------------------------
--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `mail` varchar(89)
  SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `uuid` text NOT NULL,
    `nom` text NOT NULL,
    `prenom` text NOT NULL,
    `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    PRIMARY KEY (`mail`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
--
-- Déchargement des données de la table `users`
--
INSERT INTO `users` (`mail`, `uuid`, `nom`, `prenom`, `pass`)
VALUES (
    'ah@ah.fr',
    'user_608366fa8de54',
    'oui',
    'zjhdau',
    '$2y$10$GOg/z40Xt.0XvfCFkMAfFOPb7S2N4Zggk4YXtiLtxvJvghiLMvSN6'
  ),
  (
    'contact@eistree.eu',
    'user_606a1e5abcbh7',
    'Admin',
    'Eistree',
    '$2y$10$xIwyASVrQOTWkTArjzBxd.EfC7SwYRd4DR8E71H7xIwu6b8fefWhO'
  ),
  (
    'oui@oui.fr',
    'user_606a1e5abcb8d',
    'ZJDIOJ',
    'oijfdeziojdio',
    '$2y$10$hjnUwVD026VacR1PLqWy..ZHI8kotTNy9LRLVINlP2LZaRCxiMXpK'
  ),
  (
    'toto@ex.fr',
    'user_6083631c83ff0',
    'Tom',
    'Lef',
    '$2y$10$Mnz7Wlh4cdY/nCKSlNcC5.Q9Vn.V706PDqeEoSxbfjuWidGrWFHeC'
  );
-- ---------------------------------------------------
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
ADD CONSTRAINT `cat_fk` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;