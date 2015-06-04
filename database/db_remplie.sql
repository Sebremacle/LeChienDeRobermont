-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 02 Juin 2015 à 10:53
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `LeChienDeRobermont`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
`id` int(10) unsigned NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(1) NOT NULL,
  `rubrique_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `photo`, `home`, `rubrique_id`, `created_at`, `updated_at`) VALUES
(1, 'Notre méthode de travail', 'Nous travaillons d’une manière positive, c’est-à-dire en privilégiant les récompenses plutôt que les sanctions. Mais tout mauvais comportement tel que : agressivité, aboiements intempestifs… sera fermement réprimandé.\n\nNos objectifs sont l’éducation et l’apprentissage du programme d’obéissance reconnu par l’URCSH.\n\nMais attention, pas d’obéissance sans discipline ! Le maitre doit s’investir dans le travail. L’instructeur est là pour le guider dans sa démarche, pas pour le remplacer.\n\nLe chien doit obéir à son maitre et ce dernier ne doit jamais oublier que c’est un chien et qu’il faut « penser chien ».\n\nLe maitre est « le chef » et le chien doit le reconnaître comme tel sinon il y aura conflit.', NULL, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Horaires des cours', 'Puppies de 3 à 6 mois\nMercredi: 17h30 – 18h00\n\nDimanche: 9h00 – 9h30\n\nGroupe + de 6 mois\nMercredi: 18h30 – 19h30\n\nDimanche: 9h30 – 10h30\n\nGroupe 2 et 3\nMercredi: 19h30 – 20h30\n\nDimanche: 10h30 – 11h30\n\nGroupe Concours\nMercredi: 20h30 – 21h30\n\nDimanche: 11h30 – 12h30', NULL, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '16/05 : Evenement n°1', 'Cras tortor lorem, imperdiet eget justo sed, tristique dictum lectus. Nullam ligula ex, blandit quis luctus nec, porta eu sem. Etiam rhoncus accumsan tellus. Phasellus tempor ante ac sapien suscipit faucibus.', NULL, 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
`id` int(10) unsigned NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photoMiniature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `titre`, `photo`, `photoMiniature`, `created_at`, `updated_at`) VALUES
(1, 'Playground', 'http://patrogem.be/cdrobermont-wp/wp-content/uploads/2015/05/11.jpg', 'http://patrogem.be/cdrobermont-wp/wp-content/uploads/2015/05/11-150x150.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_06_01_122341_create_rubriques_table', 1),
('2015_06_02_073649_create_articles_table', 2),
('2015_06_02_073650_create_articles_table', 3),
('2015_06_02_073652_create_articles_table', 4),
('2015_06_02_080010_create_media_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rubriques`
--

CREATE TABLE `rubriques` (
`id` int(10) unsigned NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `tri` int(11) NOT NULL,
  `galerie` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `rubriques`
--

INSERT INTO `rubriques` (`id`, `titre`, `slug`, `texte`, `tri`, `galerie`, `created_at`, `updated_at`) VALUES
(1, 'A propos', 'a-propos', 'LoremIpsum', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Les cours', 'les-cours', 'LoremIpsum', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Agenda', 'agenda', 'LoremIpsum', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Medias', 'medias', 'LoremIpsum', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD KEY `articles_rubrique_id_foreign` (`rubrique_id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `rubriques`
--
ALTER TABLE `rubriques`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `rubriques`
--
ALTER TABLE `rubriques`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `articles_rubrique_id_foreign` FOREIGN KEY (`rubrique_id`) REFERENCES `rubriques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
