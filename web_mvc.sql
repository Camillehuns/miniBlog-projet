-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 08 jan. 2021 à 18:24
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'Camille', 'x@gmail.com', '1234567'),
(2, 'Nathanael', 'nath@gmail.com', '121212');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `admin_id`, `title`, `content`, `post_time`) VALUES
(1, 1, 'Les symptômes du coronavirus chez l\'enfant', 'Depuis le début de l\'épidémie, les enfants et adolescents, semblent relativement épargnés. Les scientifiques évoquent une infection virale \"paucisymptomatique\" - c\'est-à-dire avec des symptômes très peu marqués. Selon une étude publiée dans le JAMA, le 24 février, on comptait \"seulement\" 2 % d\'enfants et d\'adolescents âgés de moins de 19 ans, parmi les cas recensés en Chine. Par ailleurs, la Société Française de Pédiatrie (SFP) précise que \"les tableaux les plus sévères sont observés chez les personnes âgées et avec des comorbidités\".\r\n\r\n', '2021-01-07 17:11:10'),
(2, 1, 'La Norvège', 'La Norvège (en bokmål : Norge — en nynorsk : Noreg), en forme longue le royaume de Norvège (en bokmål : Kongeriket Norge — en nynorsk : Kongeriket Noreg), est un pays d\'Europe du Nord. Située à l\'ouest-nord-ouest de la péninsule Scandinave qu\'elle partage avec la Suède, elle possède également des frontières avec la Finlande et la Russie au nord-est, et est bordée par l\'océan Atlantique à l\'ouest-nord-ouest et au sud-est, enfin par l\'océan Arctique au nord-est. Avec 5 millions d\'habitants pour 385 199 km2, dont 307 860 km2 de terre, la Norvège est après l\'Islande et la Russie le pays le moins densément peuplé d\'Europe. Sa capitale, et plus grande ville, est Oslo. La Norvège possède pour langues officielles deux dialectes du norvégien, le bokmål et le nynorsk, et pour monnaie la couronne norvégienne (NOK).\r\n\r\nLe pays compte deux territoires insulaires arctiques : l\'archipel de Svalbard et l\'île Jan Mayen ; par ailleurs il possède une dépendance externe dans l\'hémisphère sud, l\'île Bouvet dans l\'Atlantique sud. L\'île Pierre-Ier et la terre de la Reine-Maud en Antarctique sont revendiquées par la Norvège mais ces revendications ne sont pas reconnues internationalement.\r\n\r\nAprès la Seconde Guerre mondiale, la Norvège a connu une expansion économique très rapide, et compte aujourd\'hui parmi les pays les plus riches du monde, avec une politique sociale très développée. Le progrès économique s\'explique en partie par la découverte et le développement de grandes réserves de pétrole et de gaz naturel sur sa côte. Depuis plusieurs décennies, la Norvège est classée première sur l\'indice de développement humain (IDH)3, inégalité ajustée y compris, et est également considérée comme le pays le plus démocratique au monde avec un indice de démocratie de 9,87 en 2018, selon le groupe de presse britannique The Economist Group. Elle a aussi été déclarée pays le plus pacifique du monde en 2007 par le Global Peace Index4. Elle est membre fondateur de l\'OTAN. ', '2021-01-07 17:23:26'),
(3, 2, 'Les bienfaits des fruits et légumes', 'Les fruits et les légumes n’ont plus à démontrer leurs bienfaits. Sources de vitamines, de minéraux et de fibres, ils sont des atouts santé indiscutables. Cependant nous passons de moins en moins de temps à préparer nos repas comme vous avez pu le lire dans cet article et nous passons donc moins de temps à préparer ces aliments bruts qui nécessitent d’être lavés, parés, cuits, assaisonnés… Sportives, sportifs, voici l’occasion de prendre à nouveau le temps de consommer ces aliments aussi bons au niveau du goût qu’au niveau santé !\r\nLeurs principales caractéristiques : \r\n-Les fruits et légumes sont composés en moyenne à 90% d’eau ! Ils contribuent donc à l’hydratation de l’organisme. Environ 800 mL d’eau par jour est apportée par les aliments, les fruits et légumes en sont les principaux contributeurs.\r\n-Leur richesse en fibres les rend intéressants dans la régulation du transit intestinal et leur confère un effet satiétogène (coupe faim). Ces fibres contribuent par ailleurs à prévenir de différents cancers et maladies cardio-vasculaires.\r\n\r\n', '2021-01-08 15:10:28');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `post_id`, `comment_id`, `content`, `post_time`) VALUES
(1, 1, 1, 'Merci pour cette article\r\n', '2021-01-08 15:21:26'),
(2, 1, 1, 'Manque des informations. \r\nMais bravo', '2021-01-08 15:22:06'),
(3, 3, 2, 'jolie ', '2021-01-08 15:18:03'),
(4, 2, 2, 'Oh c\'est trop beau', '2021-01-08 16:36:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `birthday`, `username`, `password`, `email`) VALUES
(3, 'HOUNSA', 'Camille', '1998-07-14', 'Camille61', '$2y$10$wRdc1tJ1t.kEUw1SHr0V/eMZ01WAY4NF/QLUdpPnjfeVKhMpUwLLC', 'x@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`admin_id`) USING BTREE;

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_info` (`comment_id`) USING BTREE,
  ADD KEY `post_info_2` (`post_id`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `commentaires` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `commentaires` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
