-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 05 août 2021 à 15:33
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nationtv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_societe`
--

CREATE TABLE `t_categorie_societe` (
  `CodeCategorieSociete` int(11) NOT NULL,
  `Categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_categorie_societe`
--

INSERT INTO `t_categorie_societe` (`CodeCategorieSociete`, `Categorie`) VALUES
(4, 'ALIMENTATION'),
(5, 'BOUTIQUE'),
(6, 'MAISON DE COMMUNICATION'),
(7, 'HOTEL'),
(8, 'ETABLISSEMENT'),
(9, 'SALON DE COIFFURE'),
(10, 'EGLISE'),
(11, 'BUSINESS'),
(12, 'COMMUNIQUE COMMERCIAL');

-- --------------------------------------------------------

--
-- Structure de la table `t_emission`
--

CREATE TABLE `t_emission` (
  `CodeEmission` int(11) NOT NULL,
  `DesignationEmission` text NOT NULL,
  `Created_on` date NOT NULL,
  `Status` int(11) NOT NULL,
  `CodePresentateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_emission`
--

INSERT INTO `t_emission` (`CodeEmission`, `DesignationEmission`, `Created_on`, `Status`, `CodePresentateur`) VALUES
(1, 'NATIONTV SPORT', '2021-03-06', 1, 12),
(3, 'NATIONTV MAGASINE', '2021-03-06', 1, 11),
(4, 'NATIONTV INFORMATION', '2021-03-06', 0, 1),
(5, 'NATIONTV DOCUMENTAIRE', '2021-03-06', 1, 9),
(6, 'NATIONTV PUBLICITE', '2021-03-06', 1, 10),
(7, 'NATIONTV PREDICATION', '2021-03-08', 0, 15),
(8, 'NATIONTV MAGAZINE DES FEMMES', '2021-03-09', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `t_jour`
--

CREATE TABLE `t_jour` (
  `CodeJour` int(11) NOT NULL,
  `Jour` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_jour`
--

INSERT INTO `t_jour` (`CodeJour`, `Jour`) VALUES
(2, 'Lundi'),
(3, 'Mardi'),
(4, 'Mercredi'),
(5, 'Jeudi'),
(6, 'Vendredi'),
(7, 'Samedi'),
(8, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `t_paiement`
--

CREATE TABLE `t_paiement` (
  `CodePaiement` int(11) NOT NULL,
  `Montant` float NOT NULL,
  `ConcerneMois` int(11) NOT NULL,
  `CodeEmission` int(11) DEFAULT NULL,
  `CodeRedaction` int(11) DEFAULT NULL,
  `CodePublicite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_presentateur`
--

CREATE TABLE `t_presentateur` (
  `IdPresentateur` int(11) NOT NULL,
  `NomPresentateur` varchar(100) NOT NULL,
  `PostnomPresentateur` varchar(100) NOT NULL,
  `PrenomPresentateur` varchar(100) NOT NULL,
  `TelephonePresentateur` int(15) NOT NULL,
  `MailPresentateur` varchar(40) NOT NULL,
  `DateAjout` date NOT NULL,
  `PhotoPresentateur` text NOT NULL,
  `Status` int(11) NOT NULL,
  `AdressePresentateur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_presentateur`
--

INSERT INTO `t_presentateur` (`IdPresentateur`, `NomPresentateur`, `PostnomPresentateur`, `PrenomPresentateur`, `TelephonePresentateur`, `MailPresentateur`, `DateAjout`, `PhotoPresentateur`, `Status`, `AdressePresentateur`) VALUES
(1, 'BARAKA', 'BIGEGA', 'ESPOIR', 977553723, 'esbarakabigega@gmail.com', '2021-03-05', 'téléchargement.jpg', 1, 'GOMA/MUGUNGA'),
(7, 'KAVIRA', 'WATSONGO', 'LUCIANA', 971292017, 'lucia@gmail.com', '2021-03-05', 'IMG-20210209-WA0005.jpg', 1, 'goma'),
(9, 'AKILIMALI', 'BARAKA', 'MICHAEL', 977663344, 'mick@gmail.com', '2021-03-06', 'png-clipart-balloon-and-present-illustrations-balloon-christmas-gift-christmas-gift-balloon-heart-christmas-stocking.png', 1, 'GOMA'),
(10, 'MUTANGANA', 'REGIS', 'REGIS', 98877332, 'regis@gmail.com', '2021-03-06', 'ballons-noel.jpg', 1, 'GOMA'),
(11, 'ISMAEL', 'BARAKA', 'BIGEGA', 98833772, 'ismael@gmail.com', '2021-03-06', 'téléchargement.jpg', 1, 'goma'),
(12, 'HADASSA', 'ELIZABETH', 'KAHINDO', 988776655, 'elize@gmail.com', '2021-03-06', 'png-clipart-balloon-heart-balloon-love-photography.png', 1, 'goma'),
(13, 'MUGISHA', 'JOHN', 'OLIVIER', 944778833, 'john@gmail.com', '2021-03-06', 'png-clipart-balloon-creative-christmas-holidays-computer-wallpaper.png', 1, 'goma'),
(14, 'NICOLE', 'MULASI', 'NICOLE', 988777332, 'nicole@gmail.com', '2021-03-07', 's-l300.jpg', 1, 'goma'),
(15, 'SHIP', 'SHIP', 'SHIP', 988776655, 'ship@gmail.com', '2021-03-08', 'IMG-20210209-WA0005.jpg', 1, 'goma');

-- --------------------------------------------------------

--
-- Structure de la table `t_prevision_emission`
--

CREATE TABLE `t_prevision_emission` (
  `CodePrevisionEmission` int(11) NOT NULL,
  `Nature` varchar(200) NOT NULL,
  `Timing` varchar(100) NOT NULL,
  `pu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_prevision_emission`
--

INSERT INTO `t_prevision_emission` (`CodePrevisionEmission`, `Nature`, `Timing`, `pu`) VALUES
(2, 'REALISATION PAGE MAGAZINE', '5Min à 15Min max', 45);

-- --------------------------------------------------------

--
-- Structure de la table `t_prevision_pub`
--

CREATE TABLE `t_prevision_pub` (
  `CodePrevision` int(11) NOT NULL,
  `PrevisionPubliciteNormal` float NOT NULL,
  `PrevisionPublicitePareine` float NOT NULL,
  `CodeCategorieSociete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_prevision_pub`
--

INSERT INTO `t_prevision_pub` (`CodePrevision`, `PrevisionPubliciteNormal`, `PrevisionPublicitePareine`, `CodeCategorieSociete`) VALUES
(1, 250, 150, 4),
(4, 200, 150, 7),
(5, 120, 100, 10);

-- --------------------------------------------------------

--
-- Structure de la table `t_programme`
--

CREATE TABLE `t_programme` (
  `CodeProgramme` int(11) NOT NULL,
  `HeureDebut` time NOT NULL,
  `HeureFin` time NOT NULL,
  `CodeJour` int(11) NOT NULL,
  `CodeEmission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_programme`
--

INSERT INTO `t_programme` (`CodeProgramme`, `HeureDebut`, `HeureFin`, `CodeJour`, `CodeEmission`) VALUES
(1, '15:00:00', '15:30:00', 8, 1),
(2, '12:00:00', '12:30:00', 2, 1),
(3, '19:00:00', '19:45:00', 4, 6),
(4, '06:00:00', '07:00:00', 2, 4),
(5, '12:00:00', '13:00:00', 5, 4),
(6, '12:00:00', '14:00:00', 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_publicite`
--

CREATE TABLE `t_publicite` (
  `CodePub` int(11) NOT NULL,
  `DatePub` date NOT NULL,
  `Concerne` text NOT NULL,
  `CodeEmission` int(11) DEFAULT NULL,
  `CodeSociete` int(11) NOT NULL,
  `CodePrevision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_redaction`
--

CREATE TABLE `t_redaction` (
  `CodeRedaction` int(11) NOT NULL,
  `Details` text NOT NULL,
  `DateRedaction` date NOT NULL,
  `Redacteur` varchar(255) NOT NULL,
  `Client` varchar(255) NOT NULL,
  `CodePrevision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_redaction`
--

INSERT INTO `t_redaction` (`CodeRedaction`, `Details`, `DateRedaction`, `Redacteur`, `Client`, `CodePrevision`) VALUES
(1, 'Concerne leurs publicité du  21/12/2020', '2021-03-09', 'BARAKA BIGEGA', 'SNEL', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_societe`
--

CREATE TABLE `t_societe` (
  `CodeSociete` int(11) NOT NULL,
  `NomSociete` text NOT NULL,
  `AdresseSociete` text NOT NULL,
  `ResponsableSociete` varchar(255) NOT NULL,
  `TelephoneSociete` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_societe`
--

INSERT INTO `t_societe` (`CodeSociete`, `NomSociete`, `AdresseSociete`, `ResponsableSociete`, `TelephoneSociete`) VALUES
(2, 'DIRECTION GENERALE DES RECETTES DU NORD-KIVU', 'GOMA/Q.KAHEMBE', 'BARAKA MWENDAPOLE', 988447733),
(3, 'Ets SILIMU', 'GOMA/Q.LES VOLCANS', 'ESPOIR BARAKA', 988773377);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `CodeUser` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Photo` text NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Postnom` varchar(50) NOT NULL,
  `Created_on` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`CodeUser`, `Username`, `Password`, `Photo`, `Nom`, `Postnom`, `Created_on`, `Status`) VALUES
(1, 'espoir', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DSC_0192.jpg', 'Espoir', 'Baraka', '2021-03-01', 1),
(2, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG_20210107_181859101.jpg', 'ESPOIR', 'BARAKA', '2021-03-03', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_categorie_societe`
--
ALTER TABLE `t_categorie_societe`
  ADD PRIMARY KEY (`CodeCategorieSociete`);

--
-- Index pour la table `t_emission`
--
ALTER TABLE `t_emission`
  ADD PRIMARY KEY (`CodeEmission`),
  ADD KEY `fk_emission_presentateur` (`CodePresentateur`);

--
-- Index pour la table `t_jour`
--
ALTER TABLE `t_jour`
  ADD PRIMARY KEY (`CodeJour`);

--
-- Index pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD PRIMARY KEY (`CodePaiement`),
  ADD KEY `fk_paiement_emission` (`CodeEmission`),
  ADD KEY `fk_paiement_redaction` (`CodeRedaction`),
  ADD KEY `fk_paiement_publicite` (`CodePublicite`);

--
-- Index pour la table `t_presentateur`
--
ALTER TABLE `t_presentateur`
  ADD PRIMARY KEY (`IdPresentateur`);

--
-- Index pour la table `t_prevision_emission`
--
ALTER TABLE `t_prevision_emission`
  ADD PRIMARY KEY (`CodePrevisionEmission`);

--
-- Index pour la table `t_prevision_pub`
--
ALTER TABLE `t_prevision_pub`
  ADD PRIMARY KEY (`CodePrevision`),
  ADD KEY `fk_prevision_societe` (`CodeCategorieSociete`);

--
-- Index pour la table `t_programme`
--
ALTER TABLE `t_programme`
  ADD PRIMARY KEY (`CodeProgramme`),
  ADD KEY `fk_programme_jour` (`CodeJour`),
  ADD KEY `fk_programme_emission` (`CodeEmission`);

--
-- Index pour la table `t_publicite`
--
ALTER TABLE `t_publicite`
  ADD PRIMARY KEY (`CodePub`),
  ADD KEY `fk_publicite_emission` (`CodeEmission`),
  ADD KEY `fk_publicite_societe` (`CodeSociete`),
  ADD KEY `fk_publicite_prevision` (`CodePrevision`);

--
-- Index pour la table `t_redaction`
--
ALTER TABLE `t_redaction`
  ADD PRIMARY KEY (`CodeRedaction`),
  ADD KEY `fk_redaction_prevision` (`CodePrevision`);

--
-- Index pour la table `t_societe`
--
ALTER TABLE `t_societe`
  ADD PRIMARY KEY (`CodeSociete`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`CodeUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_categorie_societe`
--
ALTER TABLE `t_categorie_societe`
  MODIFY `CodeCategorieSociete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `t_emission`
--
ALTER TABLE `t_emission`
  MODIFY `CodeEmission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_jour`
--
ALTER TABLE `t_jour`
  MODIFY `CodeJour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  MODIFY `CodePaiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_presentateur`
--
ALTER TABLE `t_presentateur`
  MODIFY `IdPresentateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_prevision_emission`
--
ALTER TABLE `t_prevision_emission`
  MODIFY `CodePrevisionEmission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_prevision_pub`
--
ALTER TABLE `t_prevision_pub`
  MODIFY `CodePrevision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_programme`
--
ALTER TABLE `t_programme`
  MODIFY `CodeProgramme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_publicite`
--
ALTER TABLE `t_publicite`
  MODIFY `CodePub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_redaction`
--
ALTER TABLE `t_redaction`
  MODIFY `CodeRedaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_societe`
--
ALTER TABLE `t_societe`
  MODIFY `CodeSociete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `CodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_emission`
--
ALTER TABLE `t_emission`
  ADD CONSTRAINT `fk_emission_presentateur` FOREIGN KEY (`CodePresentateur`) REFERENCES `t_presentateur` (`IdPresentateur`);

--
-- Contraintes pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD CONSTRAINT `fk_paiement_emission` FOREIGN KEY (`CodeEmission`) REFERENCES `t_emission` (`CodeEmission`),
  ADD CONSTRAINT `fk_paiement_publicite` FOREIGN KEY (`CodePublicite`) REFERENCES `t_publicite` (`CodePub`),
  ADD CONSTRAINT `fk_paiement_redaction` FOREIGN KEY (`CodeRedaction`) REFERENCES `t_redaction` (`CodeRedaction`);

--
-- Contraintes pour la table `t_prevision_pub`
--
ALTER TABLE `t_prevision_pub`
  ADD CONSTRAINT `fk_prevision_societe` FOREIGN KEY (`CodeCategorieSociete`) REFERENCES `t_categorie_societe` (`CodeCategorieSociete`);

--
-- Contraintes pour la table `t_programme`
--
ALTER TABLE `t_programme`
  ADD CONSTRAINT `fk_programme_emission` FOREIGN KEY (`CodeEmission`) REFERENCES `t_emission` (`CodeEmission`),
  ADD CONSTRAINT `fk_programme_jour` FOREIGN KEY (`CodeJour`) REFERENCES `t_jour` (`CodeJour`);

--
-- Contraintes pour la table `t_publicite`
--
ALTER TABLE `t_publicite`
  ADD CONSTRAINT `fk_publicite_emission` FOREIGN KEY (`CodeEmission`) REFERENCES `t_emission` (`CodeEmission`),
  ADD CONSTRAINT `fk_publicite_prevision` FOREIGN KEY (`CodePrevision`) REFERENCES `t_prevision_pub` (`CodePrevision`),
  ADD CONSTRAINT `fk_publicite_societe` FOREIGN KEY (`CodeSociete`) REFERENCES `t_societe` (`CodeSociete`);

--
-- Contraintes pour la table `t_redaction`
--
ALTER TABLE `t_redaction`
  ADD CONSTRAINT `fk_redaction_prevision` FOREIGN KEY (`CodePrevision`) REFERENCES `t_prevision_emission` (`CodePrevisionEmission`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
