-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 21 mars 2020 à 11:44
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(255) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `chapter_content` longtext NOT NULL,
  `published_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`, `chapter_number`, `chapter_content`, `published_date`) VALUES
(1, 'Born', 1, '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida sem vel felis condimentum, consequat blandit nisi faucibus. Quisque accumsan feugiat eros vel interdum. Nunc faucibus, ante sit amet venenatis consectetur, est nisl dignissim justo, a ultrices magna dui at elit. Vivamus mauris nunc, iaculis vitae arcu et, molestie tincidunt purus. Sed ligula ante, varius a blandit sit amet, finibus sed elit. Nam ullamcorper velit in pharetra sollicitudin. Ut gravida nunc metus, ut condimentum est porttitor et. Praesent lacinia, urna at posuere bibendum, tellus purus commodo mi, et molestie turpis metus eu diam. Quisque a orci at est vulputate sagittis. Vestibulum mattis quam nec nibh fringilla malesuada. Integer interdum ipsum vel sem imperdiet, in tincidunt arcu volutpat. Mauris blandit tortor blandit, vestibulum sapien placerat, maximus diam. Aliquam et ex id quam finibus sodales. Integer non ligula a augue luctus posuere vel nec urna. Mauris sed sagittis massa. Integer sed ipsum iaculis, hendrerit leo eu, vulputate urna. Suspendisse posuere nisl at lectus viverra euismod. Quisque accumsan ornare pulvinar. In vitae cursus urna. In hac habitasse platea dictumst. In eu magna et tellus placerat porttitor sit amet convallis purus. Pellentesque eget justo nisl. Aliquam erat volutpat. Ut volutpat malesuada mattis. Phasellus aliquam elit vitae metus feugiat, at hendrerit enim finibus. Vivamus commodo blandit facilisis. Praesent blandit turpis ac sem ornare, ac eleifend odio auctor. Vivamus imperdiet quis justo a facilisis. Nam ac diam ex. Nulla ut vestibulum metus. Curabitur posuere porttitor odio, in dictum diam interdum a. Praesent at fermentum purus, eu porta purus. Donec vel tempor est. Nam et mauris ut felis tempor viverra. Nunc nisl dolor, interdum ac tempus rhoncus, luctus et tortor. Nulla facilisi. Praesent pulvinar diam sit amet odio elementum, at semper orci blandit. Duis pretium sollicitudin maximus. Phasellus rhoncus nisl ac est molestie dapibus. Quisque laoreet ex ac interdum tincidunt. Etiam quis tempus sem, tristique viverra erat. Etiam pretium mauris a nunc hendrerit imperdiet. Curabitur sagittis rhoncus mauris, vel vehicula metus fringilla in. Morbi auctor erat risus, ut tincidunt lacus vestibulum eu. Aliquam ornare enim porta augue interdum, interdum vehicula erat placerat. Sed nec ex non risus eleifend pellentesque sit amet quis nisi. Nullam quam quam, pharetra vitae cursus vel, ullamcorper facilisis leo. Praesent convallis nulla id erat tristique fermentum. Donec vehicula mi vel elit pulvinar tincidunt. Sed molestie pulvinar quam, ac suscipit metus luctus eget. Vestibulum at luctus ex, luctus facilisis nulla.</p>', '2020-03-15 23:00:00'),
(2, 'Childrens', 2, '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida sem vel felis condimentum, consequat blandit nisi faucibus. Quisque accumsan feugiat eros vel interdum. Nunc faucibus, ante sit amet venenatis consectetur, est nisl dignissim justo, a ultrices magna dui at elit. Vivamus mauris nunc, iaculis vitae arcu et, molestie tincidunt purus. Sed ligula ante, varius a blandit sit amet, finibus sed elit. Nam ullamcorper velit in pharetra sollicitudin. Ut gravida nunc metus, ut condimentum est porttitor et. Praesent lacinia, urna at posuere bibendum, tellus purus commodo mi, et molestie turpis metus eu diam. Quisque a orci at est vulputate sagittis. Vestibulum mattis quam nec nibh fringilla malesuada. Integer interdum ipsum vel sem imperdiet, in tincidunt arcu volutpat. Mauris blandit tortor blandit, vestibulum sapien placerat, maximus diam. Aliquam et ex id quam finibus sodales. Integer non ligula a augue luctus posuere vel nec urna. Mauris sed sagittis massa. Integer sed ipsum iaculis, hendrerit leo eu, vulputate urna. Suspendisse posuere nisl at lectus viverra euismod. Quisque accumsan ornare pulvinar. In vitae cursus urna. In hac habitasse platea dictumst. In eu magna et tellus placerat porttitor sit amet convallis purus. Pellentesque eget justo nisl. Aliquam erat volutpat. Ut volutpat malesuada mattis. Phasellus aliquam elit vitae metus feugiat, at hendrerit enim finibus. Vivamus commodo blandit facilisis. Praesent blandit turpis ac sem ornare, ac eleifend odio auctor. Vivamus imperdiet quis justo a facilisis. Nam ac diam ex. Nulla ut vestibulum metus. Curabitur posuere porttitor odio, in dictum diam interdum a. Praesent at fermentum purus, eu porta purus. Donec vel tempor est. Nam et mauris ut felis tempor viverra. Nunc nisl dolor, interdum ac tempus rhoncus, luctus et tortor. Nulla facilisi. Praesent pulvinar diam sit amet odio elementum, at semper orci blandit. Duis pretium sollicitudin maximus. Phasellus rhoncus nisl ac est molestie dapibus. Quisque laoreet ex ac interdum tincidunt. Etiam quis tempus sem, tristique viverra erat. Etiam pretium mauris a nunc hendrerit imperdiet. Curabitur sagittis rhoncus mauris, vel vehicula metus fringilla in. Morbi auctor erat risus, ut tincidunt lacus vestibulum eu. Aliquam ornare enim porta augue interdum, interdum vehicula erat placerat. Sed nec ex non risus eleifend pellentesque sit amet quis nisi. Nullam quam quam, pharetra vitae cursus vel, ullamcorper facilisis leo. Praesent convallis nulla id erat tristique fermentum. Donec vehicula mi vel elit pulvinar tincidunt. Sed molestie pulvinar quam, ac suscipit metus luctus eget. Vestibulum at luctus ex, luctus facilisis nulla.</p>', '2020-03-16 23:00:00'),
(3, 'School', 3, '<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida posuere eros, ac varius mi placerat ut. Etiam placerat ipsum a erat venenatis semper. Nunc non semper est. Nam a sodales ligula. Sed mattis nisi nec nunc pharetra, sed placerat est ultricies. Aenean sollicitudin scelerisque ultrices. Aliquam tempus sollicitudin malesuada. Curabitur at vestibulum diam, quis bibendum turpis. Proin porttitor, est porttitor dapibus aliquam, dolor ipsum eleifend felis, ut ullamcorper urna lorem eget elit. Praesent in dictum enim. Fusce placerat ultrices neque quis ultrices. Suspendisse consequat a dui ut commodo. Proin sit amet pulvinar orci. Mauris laoreet a lacus et mattis. Vivamus imperdiet, mi in egestas laoreet, elit risus fermentum ligula, non efficitur ipsum velit vitae tellus.</span></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nunc est, commodo in pulvinar in, volutpat a nibh. Aenean malesuada mauris quam, ac convallis risus consequat eu. Praesent fringilla pharetra sapien, eu maximus libero posuere sed. Ut interdum nibh lorem, id venenatis nibh porttitor in. Morbi consequat orci at massa faucibus imperdiet. Sed fermentum, arcu eu suscipit euismod, ipsum arcu pulvinar dolor, id hendrerit tortor eros a sapien. Etiam rhoncus quam eu semper rutrum. Nullam pulvinar est nunc, ac pretium orci convallis at. Suspendisse potenti. Phasellus eleifend nibh quis sagittis varius. Suspendisse ac nisi odio. Fusce lacinia ac est sit amet pharetra. Sed tristique, purus id mollis volutpat, ipsum ante pellentesque urna, eget blandit ante quam sed sem.</span></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Donec dui mauris, fringilla vitae libero eu, mollis tempus risus. Morbi ac turpis purus. Nunc eu commodo velit, vitae consequat ligula. Aenean molestie maximus massa sit amet mollis. Etiam fermentum, mauris sed eleifend ultrices, eros lectus pulvinar urna, non vehicula dolor lorem et mi. Sed sollicitudin pharetra felis ac condimentum. Donec porta, magna vel cursus consectetur, sem mi porta arcu, eu semper urna lectus nec turpis. Vestibulum ut pellentesque nunc. Aliquam dolor erat, consequat vel bibendum eu, vestibulum vel nulla. Morbi tristique, dolor in gravida suscipit, purus libero pellentesque elit, vitae blandit nisi lacus id metus. Sed gravida elit eu urna molestie sagittis.</span></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><strong><span style=\"font-size: 14pt; font-family: Arial, sans-serif;\">Lyc&eacute;e &amp; Adolescence</span></strong></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Sed nibh ligula, tempus eu egestas et, aliquam ac elit. Proin sed orci egestas, sollicitudin tortor quis, convallis sapien. Suspendisse nec libero tempor, elementum odio aliquam, mattis tellus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer eget sollicitudin metus. Nullam eget arcu ut erat vulputate imperdiet at mattis nisi. Phasellus efficitur varius augue vitae posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean tincidunt erat quis ligula mattis, vestibulum dignissim dui luctus. Proin at tempus velit.</span></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Etiam bibendum posuere rutrum. Mauris consequat metus ut diam condimentum malesuada. Praesent porta, lectus id molestie congue, sem lorem elementum libero, a suscipit magna nulla et ligula. Sed arcu dui, dapibus eu bibendum quis, iaculis ac tortor. Maecenas rhoncus, nunc eget lobortis dictum, magna ex sagittis augue, sed malesuada nulla metus quis elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque sed sapien vel sapien elementum vehicula tincidunt nec quam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut faucibus, leo ac viverra fringilla, dui nibh aliquam leo, sit amet pellentesque erat magna id purus. Vestibulum vitae rhoncus libero. Phasellus mollis ac ligula nec hendrerit. Cras eget facilisis urna.</span></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Etiam posuere arcu et tellus rhoncus ornare. Nullam in molestie elit. Aliquam consequat augue posuere sodales iaculis. Duis pellentesque at mauris sit amet ornare. Fusce velit leo, fermentum et enim in, tincidunt pharetra nulla. Duis auctor sit amet purus a ornare. Phasellus efficitur dapibus efficitur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus in gravida magna. Mauris laoreet nibh vitae metus placerat, sit amet elementum ante feugiat. Pellentesque a eros et urna luctus auctor. Maecenas accumsan nisi ante. Praesent non tristique nibh. Maecenas id dapibus tellus.</span></p>\r\n<p style=\"margin: 0cm 0cm 11.25pt; font-size: 12pt; font-family: \'Times New Roman\', serif; text-align: justify; background: white;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\">Proin vel magna ligula. Aliquam vel cursus diam. Aliquam vel magna at dui rhoncus imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam lobortis in sem eu ultricies. Proin et dapibus nisi. Aenean id purus a elit gravida cursus at non nisl.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-family: Helvetica;\">&nbsp;</span></p>', '2020-03-17 23:00:00'),
(7, 'Study', 4, '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat pharetra lacus vitae convallis. Nulla vulputate elit ac orci ornare, et ornare enim posuere. Maecenas ullamcorper felis et porta iaculis. Fusce dui sem, iaculis eu tempor ac, dignissim id nibh. Cras ut elit posuere, faucibus nisl et, maximus est. Duis ultrices sapien enim, a fringilla dui tristique nec. Nam eu laoreet erat.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Vivamus arcu ligula, malesuada sit amet venenatis eget, pulvinar non arcu. Aliquam at rutrum turpis, sit amet pretium lorem. Vivamus in maximus nibh. Nam magna nisl, tempor ut dolor sit amet, imperdiet imperdiet dui. Donec tempus eget arcu in congue. Sed aliquet dolor augue, sed pellentesque mauris accumsan eget. Morbi vitae rutrum risus. Curabitur pellentesque ultricies libero, vel dapibus tortor elementum eget. Nullam cursus dictum mi vel eleifend. Praesent nec varius urna. Donec luctus vestibulum turpis et elementum. Proin quis est vel dolor cursus venenatis in id metus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Curabitur blandit est eros, nec finibus felis viverra vel. Nulla ultricies facilisis ligula, id ullamcorper massa interdum sit amet. Donec sed tempus risus. Aenean metus dolor, hendrerit ut massa a, tincidunt eleifend nisl. Quisque facilisis justo nec purus efficitur aliquam vitae sit amet urna. Quisque non ante consequat magna tincidunt ornare. Integer ac metus augue. Vivamus est felis, egestas nec est accumsan, tincidunt aliquet orci. Nam a volutpat dolor. Sed luctus massa quis efficitur posuere. Phasellus ornare mi ac diam interdum vehicula. In et ullamcorper diam. Morbi fermentum commodo aliquet. Cras elementum risus a lacus scelerisque, eget vehicula ligula ultricies. In in tortor non massa scelerisque tincidunt a a augue.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Mauris vitae libero sit amet ante tincidunt sodales. Quisque non laoreet massa, sit amet convallis elit. Donec tristique vestibulum turpis, a sagittis lacus tempus sit amet. Duis egestas, odio eu efficitur dictum, neque felis volutpat magna, vitae volutpat ligula nisl id nibh. Donec arcu urna, rutrum a faucibus quis, consectetur in diam. Etiam eu metus nisi. Mauris eu orci id magna egestas tempus sit amet sed odio. Nullam ac leo iaculis, suscipit nisi sit amet, porta sem. Fusce condimentum congue blandit. Proin a neque ut quam malesuada semper. Praesent consectetur imperdiet elit quis dictum. Etiam consectetur tortor ac nisl vulputate ultrices. Suspendisse potenti. Nunc scelerisque at ex id porta. Morbi volutpat leo sed ligula tristique, bibendum tristique sapien fringilla.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Etiam at consectetur purus, at rutrum nibh. Phasellus mollis ex at malesuada tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus quis ultrices libero. Nulla pretium nulla velit, vel sodales sem condimentum id. Fusce fringilla dolor sit amet enim commodo lacinia. Aliquam cursus, diam eget pulvinar consequat, elit nibh euismod turpis, at ultrices purus massa eu libero.</p>', '2020-03-18 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status_of_comment` int(11) NOT NULL,
  `published_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `pseudo`, `content`, `status_of_comment`, `published_date`) VALUES
(1, 1, 'a.pfistner', 'On est vite accroché !', 0, '2020-02-07 15:02:21'),
(2, 1, 't.pfistner', 'La lecture deviendra ma passion. ', 0, '2020-02-07 15:02:21'),
(9, 2, 'a.pfistner', 'J\'adore vraiment !!!', 0, '2020-02-21 04:37:55'),
(23, 2, 'a.pfistner', 'Good', 0, '2020-02-24 19:02:14'),
(25, 7, 'antoninpfistner', 'Chapitre au top !', 0, '2020-02-29 16:34:03'),
(29, 7, 'p.antonin', 'Génial !', 1, '2020-03-07 18:15:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `admin`, `pass_hash`, `first_name`, `last_name`, `registration_date`) VALUES
(9, 'a.pfistner', 'pfistner.antonin@gmail.com', 0, '$2y$10$AlGhJZtaSIqmJGAOUFlXh.QN/hJOK1a78SXH3jCzz/D74niqoLkRW', 'Antonin', 'Pfistner', '2020-02-18 02:17:58'),
(11, 'j.forteroche', 'j.forteroche@antoninpfistner.fr', 1, '$2y$10$aNW9agqkUlcgqiYs0RZZbuR7ozO0s8aLs4f4uPsHwhj16HnV3P/ki', 'Jean', 'Forteroche', '2020-02-20 01:32:52'),
(15, 'antoninpfistner', 'antonin.pfistner@gmail.com', 0, '$2y$10$l65S.y9CAmArlIharjYqKO5PEvg96/0xv9DoVXyh3bsuspizxZbzK', 'Antonin', 'Pfistner', '2020-02-29 16:33:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
