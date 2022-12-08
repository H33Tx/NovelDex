-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Dez 2022 um 23:29
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `novelstorm`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `activation`
--

CREATE TABLE `activation` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `number` decimal(6,1) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `title` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `data` longtext NOT NULL,
  `notes` text NOT NULL,
  `user` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `can_login` tinyint(1) NOT NULL DEFAULT 0,
  `can_signup` tinyint(1) NOT NULL DEFAULT 0,
  `can_request_title` tinyint(1) NOT NULL DEFAULT 0,
  `can_request_title_deletion` tinyint(1) NOT NULL DEFAULT 0,
  `can_add_title` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit_title` tinyint(1) NOT NULL DEFAULT 0,
  `can_delete_title` tinyint(1) NOT NULL DEFAULT 0,
  `can_request_chapter_deletion` tinyint(1) NOT NULL DEFAULT 0,
  `can_add_chapter` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit_chapter` tinyint(1) NOT NULL DEFAULT 0,
  `can_delete_chapter` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_user` tinyint(1) NOT NULL DEFAULT 0,
  `can_comment` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_comment` tinyint(1) NOT NULL DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `levels`
--

INSERT INTO `levels` (`id`, `level`, `name`, `verified`, `can_login`, `can_signup`, `can_request_title`, `can_request_title_deletion`, `can_add_title`, `can_edit_title`, `can_delete_title`, `can_request_chapter_deletion`, `can_add_chapter`, `can_edit_chapter`, `can_delete_chapter`, `can_manage_user`, `can_comment`, `can_manage_comment`, `banned`) VALUES
(1, 0, 'Guest', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'Banned', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(3, 99, 'Non-Verified', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 100, 'User', 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 0, 0),
(5, 101, 'Uploader', 1, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0),
(6, 200, 'Moderator', 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0),
(7, 999, 'Administrator', 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `user` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `synopsis` text DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 99,
  `username` varchar(32) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `banned_reason` text DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `activation`
--
ALTER TABLE `activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
