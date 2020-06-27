SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `admin`
--
CREATE DATABASE IF NOT EXISTS `admin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admin`;

-- --------------------------------------------------------

--
-- Structure de la table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `id_website` int(11) NOT NULL,
  `admin_url` varchar(300) NOT NULL,
  `type` varchar(100) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cms`
--

INSERT INTO `cms` (`id`, `id_website`, `admin_url`, `type`, `login`, `password`, `contact`) VALUES
(1, 2, 'http://www.test1.com/administrator', 'Joomla', 'test', '123456', 'info@contact.com'),
(2, 3, 'http://www.test2.com/administrator', 'Joomla', 'test', '123456', 'info@contact.com');

-- --------------------------------------------------------

--
-- Structure de la table `dbs`
--

CREATE TABLE `dbs` (
  `id` int(11) NOT NULL,
  `id_website` int(11) NOT NULL,
  `host` varchar(100) NOT NULL,
  `db` varchar(50) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dbs`
--

INSERT INTO `dbs` (`id`, `id_website`, `host`, `db`, `login`, `passwd`) VALUES
(2, 2, 'localhost', 'dev_db1', 'dev_u1', '123456'),
(3, 3, 'localhost', 'dev_db2', 'dev_u2', '123456'),
(4, 3, 'localhost', 'dev_db3', 'dev_u3', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `email_acc`
--

CREATE TABLE `email_acc` (
  `id` int(11) NOT NULL,
  `id_website` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `email_acc`
--

INSERT INTO `email_acc` (`id`, `id_website`, `email`, `password`) VALUES
(2, 3, 'info@test3.com', 'infoxspreads');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `email`, `username`, `username_canonical`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `first_name`, `last_name`, `function`, `avatar`, `phone`, `mobile`, `fb`, `skype`) VALUES
(1, 'demo@demo.com', 'demo', 'demo', 'demo@demo.com', 1, 'xJph8b5XLuPHzQFb.03XIx3DSQw36gparshyVl73eXU', '$2y$13$Rvg5th2tFVmLwcb/JRKv1.gISXbuD9jICTaPrja6imDKtXuSv6zyu', '2020-06-27 18:35:25', null, null, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', null, null, null, null, null, null, null, null);
-- --------------------------------------------------------

--
-- Structure de la table `ftp_accounts`
--

CREATE TABLE `ftp_accounts` (
  `id` int(11) NOT NULL,
  `id_website` int(11) NOT NULL,
  `host` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ftp_accounts`
--

INSERT INTO `ftp_accounts` (`id`, `id_website`, `host`, `login`, `passwd`) VALUES
(3, 2, 'test2.com', 'axein260', 'axe2012'),
(4, 3, 'test3', 'xspre267', 'spreads2012');

-- --------------------------------------------------------

--
-- Structure de la table `social_acc`
--

CREATE TABLE `social_acc` (
  `id` int(11) NOT NULL,
  `id_website` int(11) NOT NULL,
  `link` varchar(300) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `social_acc`
--

INSERT INTO `social_acc` (`id`, `id_website`, `link`, `login`, `passwd`) VALUES
(1, 2, 'https://fr-fr.facebook.com/pages/Crea-Digital/429075217148118', 'hidden ', 'pass'),
(2, 3, 'http://www.viadeo.com/fr/company/crea-digital-sousse', 'hidden@hidden.net', 'pass');

-- --------------------------------------------------------

--
-- Structure de la table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `domain` varchar(150) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `cpanel` varchar(200) NOT NULL,
  `cplogin` varchar(200) NOT NULL,
  `cppass` varchar(200) NOT NULL,
  `pop3` varchar(100) DEFAULT NULL,
  `smtp` varchar(100) DEFAULT NULL,
  `webmail` varchar(200) DEFAULT NULL,
  `dns1` varchar(100) DEFAULT NULL,
  `dns2` varchar(100) DEFAULT NULL,
  `billing` varchar(200) DEFAULT NULL,
  `billinglogin` varchar(200) DEFAULT NULL,
  `billingpass` varchar(200) DEFAULT NULL,
  `notes` text,
  `owner` varchar(100) DEFAULT NULL,
  `upd_date` datetime NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `website`
--

INSERT INTO `website` (`id`, `domain`, `ip`, `cpanel`, `cplogin`, `cppass`, `pop3`, `smtp`, `webmail`, `dns1`, `dns2`, `billing`, `billinglogin`, `billingpass`, `notes`, `owner`, `upd_date`, `created_date`) VALUES
(2, 'test2.com', '70.33.246.40', 'http://test2/cpanel', 'test', 'axe2012', 'mail.test2.com', 'mail.axeinvest.com', 'http://test2.com/webmail', 'ns1.test2.com', 'ns2.test2.com', 'https://billing.test2.eu', '202270', 'test22012', '', 'Jimmy', '2013-12-15 05:19:59', '0000-00-00 00:00:00'),
(3, 'test3.com', '70.33.246.170', 'http://test3/cpanel', 'test', 'xspreads2012', 'mail.test3.com', 'mail.test3.com', 'http://test3.com/webmail', 'ns1.test3.com', 'ns2.test3.com', 'https://billing.test3.eu', '211902', 'test32012', '', 'Jimmy', '2013-12-15 05:37:03', '2013-12-15 05:37:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_website` (`id_website`);

--
-- Index pour la table `dbs`
--
ALTER TABLE `dbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_website` (`id_website`);

--
-- Index pour la table `email_acc`
--
ALTER TABLE `email_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_website` (`id_website`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Index pour la table `ftp_accounts`
--
ALTER TABLE `ftp_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_website` (`id_website`);

--
-- Index pour la table `social_acc`
--
ALTER TABLE `social_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_website` (`id_website`);

--
-- Index pour la table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `dbs`
--
ALTER TABLE `dbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `email_acc`
--
ALTER TABLE `email_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ftp_accounts`
--
ALTER TABLE `ftp_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `social_acc`
--
ALTER TABLE `social_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
