-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : dim. 28 nov. 2021 à 08:26
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tudel_librairie`
--
CREATE DATABASE IF NOT EXISTS `tudel_librairie` DEFAULT CHARACTER SET utf32 COLLATE utf32_bin;
USE `tudel_librairie`;

-- --------------------------------------------------------

--
-- Structure de la table `Books`
--

CREATE TABLE `Books` (
  `id_book` int(11) NOT NULL,
  `title_book` varchar(255) COLLATE utf32_bin NOT NULL DEFAULT 'title',
  `author_book` varchar(255) COLLATE utf32_bin NOT NULL DEFAULT 'author',
  `description_book` varchar(255) COLLATE utf32_bin NOT NULL DEFAULT 'description',
  `inStock_book` int(11) NOT NULL DEFAULT '1',
  `image_book` varchar(255) COLLATE utf32_bin DEFAULT 'test.jpg',
  `isFav_book` varchar(255) COLLATE utf32_bin NOT NULL DEFAULT 'no',
  `dateAdd_book` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `Books`
--

INSERT INTO `Books` (`id_book`, `title_book`, `author_book`, `description_book`, `inStock_book`, `image_book`, `isFav_book`, `dateAdd_book`) VALUES
(217, 'Le Coeur de la Guerre', 'Terry Goodkind', 'cccccccccccccccccccccccccccccc', 7, 'le coeur de la guerre.jpg', 'no', '2021-09-10 09:17:18'),
(218, 'Le Troisème Royaume', 'Terry Goodkind', 'tttttttttttttttttttttttttttttttttttttttttttttttttttt', 5, 'le troisième royaume.jpg', 'yes', '2021-09-10 09:17:47'),
(219, 'Le Temple des Vents', 'Terry Goodkind', 'tttttttttttttttttttttttttttttttttttttttttttttttttttt', 10, 'le temple des vents.jpg', 'yes', '2021-09-10 09:18:12'),
(230, 'La Foi des Réprouvés', 'Terry Goodkind', 'aaaaaaaaaaaaaaaaaaaaaaa', 1, 'la foi des réprouvés.jpg', 'yes', '2021-10-30 06:32:19'),
(244, 'L\'Ombre d\'une Inquisitrice', 'Terry Goodkind', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 150, 'l\'ombre d\'une inquisitrice.jpg', 'yes', '2021-11-04 07:58:24');

-- --------------------------------------------------------

--
-- Structure de la table `Orders`
--

CREATE TABLE `Orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `Orders`
--

INSERT INTO `Orders` (`id_order`, `id_user`, `id_book`, `date_order`) VALUES
(2, 23, 218, '2021-09-27 13:10:13'),
(47, 16, 218, '2021-10-30 04:21:26'),
(52, 16, 217, '2021-10-30 05:00:53');

-- --------------------------------------------------------

--
-- Structure de la table `Posts`
--

CREATE TABLE `Posts` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_post` varchar(255) COLLATE utf32_bin NOT NULL,
  `dateAdd_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `Posts`
--

INSERT INTO `Posts` (`id_post`, `id_user`, `content_post`, `dateAdd_post`) VALUES
(8, 16, 'Un site fait par passion', '2021-10-28 14:16:00');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `lastname_user` varchar(255) COLLATE utf32_bin NOT NULL,
  `firstname_user` varchar(255) COLLATE utf32_bin NOT NULL,
  `mail_user` varchar(255) COLLATE utf32_bin NOT NULL,
  `password_user` varchar(255) COLLATE utf32_bin NOT NULL,
  `role_user` varchar(255) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id_user`, `lastname_user`, `firstname_user`, `mail_user`, `password_user`, `role_user`) VALUES
(11, 'Cadoret', 'Tudel', 'tudel.cadoret@gmail.com', '$2y$10$VWlwZdz3Ds5KQiYPjBRqceTC/p0o0fRf8pg2WJfoCQh7EiPTvpXw.', 'admin'),
(13, 'Chasseriau', 'Cédric', 'admin@admin.fr', '$2y$10$/cm2HPwrvhQnpMRnd.SOkuOOR691pB5Rs64ty2wnukbZYCRVeiHE6', 'admin'),
(14, 'Chasseriau', 'Cédric', 'user@user.fr', '$2y$10$/fkpNQE/0jUm5hzyH4Dr5.9ruREKcdkkUTdhK3yVVLA0MjIrIudWq', 'admin'),
(16, 'z', 'z', 'tudel.cadoret@gmail.co', '$2y$10$3RQZBKX8cNqSHyrjFufArOL7BaqTtvvYstP//77cNA9mqoX1LecpO', 'user'),
(23, 'test', 'test', 'test', '$2y$10$0kX20M0PQHiPJVFQ/T6L8eGFQXrqmuzD5AzR.7Bwrtw/mRRCu6C66', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id_book`);

--
-- Index pour la table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_id_book` (`id_book`);

--
-- Index pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Books`
--
ALTER TABLE `Books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT pour la table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `Books` (`id_book`),
  ADD CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`);

--
-- Contraintes pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
