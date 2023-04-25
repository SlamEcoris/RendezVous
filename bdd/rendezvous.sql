-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 09:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rendezvous`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` tinytext NOT NULL,
  `prenom` tinytext NOT NULL,
  `mail` tinytext NOT NULL,
  `telephone` tinytext NOT NULL,
  `idCompte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `mail`, `telephone`, `idCompte`) VALUES
(1, 'Koffe', 'Sandra', 'sandra.koffe@exemple.com', '15 47 89 64 32', 3),
(2, 'Térieur', 'Alain', 'terieur.alain@exemple.com', '0138581267', 8),
(8, 'Guibord', 'Hugues', 'hugesguibord@exemple.com', '1209543498', 14),
(9, 'Chicoine', 'Margaux', 'margauxchicoine@exemple.com', '2394817345', 15);

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `identifiant` tinytext NOT NULL,
  `mdp` tinytext NOT NULL,
  `droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id`, `identifiant`, `mdp`, `droit`) VALUES
(1, 'ident', '2118c37356b669d52c22510c0287642551fcdc1b9b27517999e040ad56d1ad678cb71496eb4da19832143ae14ef1ceabf1824349bd608176a91f22f7088a5427', 1),
(2, 'duponta', '90b0f9fd8f84519ef18225c2df4cf8c4dc89432f10c5f5744df129518b84ad80e323c0519a38f1cd53e09fe511a5046a02101a79ca83b721768862568aa58d3f', 2),
(3, 'koffe.sandra', 'e465e704fa15e970a333ae7e867b414b29bb216849b89a9dfa4a1a548d7a9e59664410cafd37005d0f38949db6b43648b8a4419c6fc1bc3a1fad45a52ab53915', 3),
(4, 'smiths', 'b84c3d8e19121c75f8e110d3b1cad25365a4810fb70502f73ab4b3921522118b1d701a52ea99ea26a2eaa576842115c87657d8294f7bdda9844a1ea8196880db', 2),
(5, 'terieura', 'fdd618e425cd515434ce9e077a74d478048a712d8416e848903480663bebe6622c3ba4341ff03336d591d9e25786f41a1fb7a9a49c0a9406abf781d69059a1d2', 2),
(6, 'francoise', 'cfed8d31426d023923211ac127fcf961999ed9bfa9168e3a7e2e18b96a067b5c8cd571b81420906c6aee154f4da367b0bb3c4028f18850d1159caef897e91b82', 2),
(8, 'terieur.alain', '335174f815e026abb93442169dca68af26a5488f44e1a887054ddf4f8329799083e0e911a385710eb1e693211f274c5932c433ce888a94639e46506d184aef9e', 3),
(14, 'guibord.hugues', 'dbcc7d78200d0500e1ef6e71231be5a9300d0b891c881cb70184d3bbde30211800b0cac83a645999efecbbcb09f9e353260e733a809827ef6e2f670d3c7fba86', 3),
(15, 'chicoine.margaux', '2ead64b2ada73eb49da7a57f128d48f329e0d939ec7521298d3a41f47d06f85bbc3b7d28aa72896f5fccfadc85af05c828f80c802b98bcffe6b10ad66efc1a00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` tinytext NOT NULL,
  `prenom` tinytext NOT NULL,
  `mail` tinytext NOT NULL,
  `telephone` tinytext NOT NULL,
  `idCompte` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `mail`, `telephone`, `idCompte`, `idEntreprise`) VALUES
(1, 'Dupont', 'Anne', 'dupont.anne@exemple.com', '04.01.04.01.04', 2, 1),
(2, 'Smith', 'Sollange', 'sollange.smith@exemple.com', '04.02.04.02.04', 4, 2),
(3, 'Térieur', 'Alex', 'barette.emile@exemple.com', '04.56.32.67.89', 5, 3),
(4, 'Francois', 'Emile', 'barette.emile@exemple.com', '04.56.32.67.89', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `activite` tinytext NOT NULL,
  `adresse1` tinytext NOT NULL,
  `adresse2` tinytext NOT NULL,
  `codePostal` tinytext NOT NULL,
  `ville` tinytext NOT NULL,
  `raisonSociale` tinytext NOT NULL,
  `presentation` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id`, `activite`, `adresse1`, `adresse2`, `codePostal`, `ville`, `raisonSociale`, `presentation`) VALUES
(1, 'Conseiller juridique', 'Avenue du lac', '', '69001', 'Lyon', 'SAS', 'Pour vous conseiller sur vos problèmes juridiques.'),
(2, 'Conseiller juridique', 'Avenue du lac', '', 'Lyon', '69001', 'SAS', 'Pour vous conseiller sur vos problèmes juridiques.'),
(3, 'Ostéopathe', 'Place de la mairie', 'Bâtiment C', '74200', 'Thonon', 'Entrepreneur', 'Je vous aide à aller mieux.'),
(4, 'Aide à domicile', 'Impasse du lac', '1er étage', '74140', 'Massongy', 'SAS', 'Afin de vous aider au quotidien.');

-- --------------------------------------------------------

--
-- Table structure for table `horairre`
--

CREATE TABLE `horairre` (
  `id` int(11) NOT NULL,
  `date` tinytext NOT NULL,
  `heureDebAM` time NOT NULL,
  `heureFinAM` time NOT NULL,
  `heureDebPM` time NOT NULL,
  `heureFinPM` time NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `horairre`
--

INSERT INTO `horairre` (`id`, `date`, `heureDebAM`, `heureFinAM`, `heureDebPM`, `heureFinPM`, `idEntreprise`) VALUES
(1, 'Lundi', '08:30:00', '12:00:00', '14:00:00', '17:00:00', 1),
(2, 'Mardi', '08:30:00', '12:00:00', '14:00:00', '17:00:00', 1),
(3, 'Mercredi', '08:30:00', '12:00:00', '00:00:00', '00:00:00', 1),
(4, 'Jeudi', '00:00:00', '00:00:00', '14:00:00', '17:00:00', 1),
(5, 'Vendredi', '09:00:00', '12:00:00', '13:30:00', '17:30:00', 1),
(6, 'Samedi', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1),
(7, 'Dimanche', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `objet` text NOT NULL,
  `idClient` int(11) NOT NULL,
  `idEmploye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `date`, `heureDebut`, `heureFin`, `objet`, `idClient`, `idEmploye`) VALUES
(1, '2023-03-19', '08:00:00', '09:00:00', 'Rendez-vous avec dupont', 1, 1),
(2, '2023-04-26', '11:00:00', '12:00:00', 'Rendez-vous avec smith', 1, 2),
(3, '2023-04-29', '08:00:00', '09:00:00', 'Rendez-vous avec dupont', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horairre`
--
ALTER TABLE `horairre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `horairre`
--
ALTER TABLE `horairre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
