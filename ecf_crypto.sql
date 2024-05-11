-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 11 mai 2024 à 07:02
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
-- Base de données : `ecf_crypto`
--

-- --------------------------------------------------------

--
-- Structure de la table `crypto`
--

CREATE TABLE `crypto` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `crypto`
--

INSERT INTO `crypto` (`id`, `name`) VALUES
(7, 'BTC'),
(8, 'ETH'),
(9, 'XRP'),
(10, 'LTC'),
(11, 'BCH'),
(12, 'ADA'),
(13, 'DOT'),
(14, 'LINK'),
(15, 'BNB'),
(16, 'XLM'),
(17, 'USDT'),
(18, 'USDC'),
(19, 'WBTC'),
(20, 'BSV'),
(21, 'EOS'),
(22, 'TRX'),
(23, 'XMR'),
(24, 'XTZ'),
(25, 'MIOTA'),
(26, 'VET'),
(27, 'DASH'),
(28, 'ETC'),
(29, 'NEO'),
(30, 'ZEC'),
(31, 'DOGE'),
(33, 'ALGO'),
(34, 'ZRX'),
(35, 'OMG'),
(36, 'QTUM'),
(37, 'LSK'),
(38, 'BAT'),
(39, 'KNC'),
(40, 'COMP'),
(41, 'SNX'),
(42, 'YFI'),
(43, 'REN'),
(44, 'UMA'),
(45, 'SUSHI'),
(46, 'MKR'),
(47, 'AAVE'),
(48, 'UNI'),
(49, 'CRV'),
(50, 'BAL'),
(51, 'YFII'),
(52, 'RUNE'),
(53, 'SOL'),
(54, 'BAND'),
(55, 'OCEAN'),
(56, 'RLC'),
(57, 'BNT'),
(58, 'REP');

-- --------------------------------------------------------

--
-- Structure de la table `crypto_user`
--

CREATE TABLE `crypto_user` (
  `user_id` int UNSIGNED NOT NULL,
  `crypto_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `crypto_user`
--

INSERT INTO `crypto_user` (`user_id`, `crypto_id`) VALUES
(73, 24),
(74, 9),
(69, 7),
(74, 8),
(74, 22),
(74, 27);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `birth_date` date NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(256) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `birth_date`, `user_name`, `role`, `avatar`) VALUES
(69, 'alexadmin@test.fr', '$2y$10$JDuqS0j4jMjTEfg7EfD10uS/YURgpjhKmeW2igKo.wxLVR9A9fWQq', 'alexadmin', 'Foulc', '2024-05-02', 'alexadmin', 'admin', '66379c4ca887b-img-7196.jpeg'),
(73, 'user1@test.fr', '$2y$10$m781WT6xQ3eJAGgMwoQAWe7jSzQU/aIwxUekIDJqaa7/ln2Mp9gpK', 'AlexUser1', 'Foulc', '2024-05-01', 'user1', 'user', 'default-avatar.png'),
(74, 'user2@test.fr', '$2y$10$IgGXu4sy7yB71G6UYmDF/uP9bmpKT2vTSDUhDYLyhyk3Ce79UOhc6', 'alexuser2', 'Foulc', '2024-05-02', 'user2', 'user', 'default-avatar.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `crypto`
--
ALTER TABLE `crypto`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `crypto_user`
--
ALTER TABLE `crypto_user`
  ADD KEY `crypto_id` (`crypto_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `crypto`
--
ALTER TABLE `crypto`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `crypto_user`
--
ALTER TABLE `crypto_user`
  ADD CONSTRAINT `crypto_user_ibfk_1` FOREIGN KEY (`crypto_id`) REFERENCES `crypto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crypto_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
