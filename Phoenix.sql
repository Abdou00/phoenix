-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 24 nov. 2020 à 12:41
-- Version du serveur :  5.7.30
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `tp_phoenix`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp_accounts`
--

CREATE TABLE `tp_accounts` (
  `id_account` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tp_orders`
--

CREATE TABLE `tp_orders` (
  `id_order` int(11) NOT NULL,
  `reference` varchar(8) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_travel` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tp_travels`
--

CREATE TABLE `tp_travels` (
  `id_travel` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `nb_person` int(11) NOT NULL,
  `nb_week` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tp_accounts`
--
ALTER TABLE `tp_accounts`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `reference` (`reference`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_travel` (`id_travel`);

--
-- Index pour la table `tp_travels`
--
ALTER TABLE `tp_travels`
  ADD PRIMARY KEY (`id_travel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tp_accounts`
--
ALTER TABLE `tp_accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tp_travels`
--
ALTER TABLE `tp_travels`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  ADD CONSTRAINT `tp_orders_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `tp_travels` (`id_travel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `tp_accounts` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;
