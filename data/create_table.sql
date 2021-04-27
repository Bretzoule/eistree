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
--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `mail` varchar(89),
    `uuid` text NOT NULL,
    `nom` text NOT NULL,
    `prenom` text NOT NULL,
    `pass` text NOT NULL,
    PRIMARY KEY (`mail`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
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