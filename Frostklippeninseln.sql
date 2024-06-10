-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 10. Jun 2024 um 13:26
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Frostklippeninseln`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Antworten`
--

CREATE TABLE `Antworten` (
  `antwort_ID` int(11) NOT NULL,
  `fragen_ID` int(11) DEFAULT NULL,
  `antwort` text NOT NULL,
  `ist_richtig` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `Antworten`
--

INSERT INTO `Antworten` (`antwort_ID`, `fragen_ID`, `antwort`, `ist_richtig`) VALUES
(1, 1, 'Auf den Klippen, hoch und stolz, stehen in tiefstem Frost. Ewig treu dem Königshaus, unsere Heimat, unser Stolz.', 1),
(2, 1, 'Über den Bergen, durch den Wind, tragen wir das Licht geschwind.', 0),
(3, 1, 'Unser Land, unser Stolz, in der Ferne wie in Nähe.', 0),
(4, 1, 'Durch die Wälder, durch die Flut, kämpfen wir mit Herz und Mut.', 0),
(5, 1, 'In den Tälern, weit und breit, singen wir von Freiheit weit.', 0),
(6, 1, 'Durch die Städte, durch das Land, reicht sich jede treue Hand.', 0),
(7, 1, 'Unser Volk, stark und frei, möge ewig glücklich sein.', 0),
(8, 1, 'Auf den Feldern, hoch und klar, leuchtet uns das Morgenstern.', 0),
(9, 1, 'Mit dem Herzen, treu und fest, lieben wir unser Heimatnest.', 0),
(10, 1, 'Unter Sternen, weit im All, bleibt uns treu der Heldensaal.', 0),
(11, 1, 'Auf den Wegen, steil und rau, bleiben wir der Heimat treu.', 0),
(12, 1, 'Durch die Flammen, durch die Glut, stehen wir in fester Hut.', 0),
(13, 1, 'An den Küsten, tief und weit, singen wir von Ewigkeit.', 0),
(14, 1, 'In den Höhen, stolz und kühn, steht das Volk, stark und grün.', 0),
(15, 1, 'Über Wellen, durch das Meer, halten wir zusammen sehr.', 0),
(16, 2, 'Die Ahnen', 1),
(17, 2, 'Die Königsfamilie Turin', 0),
(18, 2, 'Die Königsfamilie Gebor', 0),
(19, 2, 'Das Volk', 0),
(20, 2, 'Der Staat', 0),
(21, 2, 'Die Ahnen unserer Ahnen', 0),
(22, 2, 'Die Ahnen und die Götter', 0),
(23, 2, 'Die Regierung', 0),
(24, 2, 'Der Monarch', 0),
(25, 2, 'Das Parlament', 0),
(26, 2, 'Die Vorfahren', 0),
(27, 2, 'Der Präsident', 0),
(28, 2, 'Die Adligen', 0),
(29, 2, 'Die Priester', 0),
(30, 2, 'Die Krieger', 0),
(31, 3, 'Die Einheit und Führung des Volkes', 1),
(32, 3, 'Die Stärke und Macht des Militärs', 0),
(33, 3, 'Die Schönheit der Landschaft', 0),
(34, 3, 'Die Weisheit der Ahnen', 0),
(35, 3, 'Die Freiheit und Sicherheit', 0),
(36, 3, 'Die königliche Familie', 0),
(37, 3, 'Die Götter und ihre Segnungen', 0),
(38, 3, 'Die Tradition und Kultur', 0),
(39, 3, 'Die Stabilität und Frieden', 0),
(40, 3, 'Das Recht und die Gerechtigkeit', 0),
(41, 3, 'Die Liebe und Treue', 0),
(42, 3, 'Das Wissen und die Bildung', 0),
(43, 3, 'Die Einigkeit und Harmonie', 0),
(44, 3, 'Die Vergangenheit und Zukunft', 0),
(45, 3, 'Die Natur und Umwelt', 0),
(46, 4, 'Turin und Gebor', 1),
(47, 4, 'Turin und Norin', 0),
(48, 4, 'Gebor und Borin', 0),
(49, 4, 'Borin und Norin', 0),
(50, 4, 'Turin und Lorin', 0),
(51, 4, 'Lorin und Gebor', 0),
(52, 4, 'Norin und Borin', 0),
(53, 4, 'Turin und Dorin', 0),
(54, 4, 'Gebor und Lorin', 0),
(55, 4, 'Dorin und Norin', 0),
(56, 4, 'Turin und Forin', 0),
(57, 4, 'Gebor und Forin', 0),
(58, 4, 'Forin und Norin', 0),
(59, 4, 'Turin und Korin', 0),
(60, 4, 'Gebor und Korin', 0),
(61, 5, 'Freiheit und Sicherheit', 1),
(62, 5, 'Bildung und Kultur', 0),
(63, 5, 'Arbeit und Einkommen', 0),
(64, 5, 'Gesundheit und Pflege', 0),
(65, 5, 'Umwelt und Natur', 0),
(66, 5, 'Meinungsfreiheit und Presse', 0),
(67, 5, 'Eigentum und Besitz', 0),
(68, 5, 'Gerechtigkeit und Recht', 0),
(69, 5, 'Religion und Glaube', 0),
(70, 5, 'Familie und Ehe', 0),
(71, 5, 'Mobilität und Verkehr', 0),
(72, 5, 'Nahrung und Wasser', 0),
(73, 5, 'Kunst und Musik', 0),
(74, 5, 'Wissenschaft und Forschung', 0),
(75, 5, 'Sport und Freizeit', 0),
(76, 6, 'Die Sicherheit der Frostklippeninseln und ihrer Bewohner', 1),
(77, 6, 'Die Bildung aller Bürger', 0),
(78, 6, 'Die Förderung der Kultur', 0),
(79, 6, 'Die wirtschaftliche Entwicklung', 0),
(80, 6, 'Die Gesundheitsversorgung', 0),
(81, 6, 'Der Umweltschutz', 0),
(82, 6, 'Die Schaffung von Arbeitsplätzen', 0),
(83, 6, 'Die Sicherung der Meinungsfreiheit', 0),
(84, 6, 'Die Verbesserung der Infrastruktur', 0),
(85, 6, 'Die Unterstützung von Familien', 0),
(86, 6, 'Die Förderung von Sport und Freizeit', 0),
(87, 6, 'Die internationale Zusammenarbeit', 0),
(88, 6, 'Die Bekämpfung der Armut', 0),
(89, 6, 'Die Gleichstellung der Geschlechter', 0),
(90, 6, 'Die Forschung und Innovation', 0),
(91, 7, 'Im Interesse der nationalen Sicherheit und des öffentlichen Wohlbefindens', 1),
(92, 7, 'Zum Schutz der Umwelt', 0),
(93, 7, 'Zur Förderung der Bildung', 0),
(94, 7, 'Zur Wahrung der religiösen Gefühle', 0),
(95, 7, 'Zur Sicherung der Arbeitsplätze', 0),
(96, 7, 'Zur Förderung der Kultur', 0),
(97, 7, 'Zur Sicherstellung der Gesundheitsversorgung', 0),
(98, 7, 'Zum Schutz der königlichen Familie', 0),
(99, 7, 'Zur Verbesserung der Infrastruktur', 0),
(100, 7, 'Zur Unterstützung der Wissenschaft', 0),
(101, 7, 'Zur Wahrung der wirtschaftlichen Stabilität', 0),
(102, 7, 'Zur Förderung des Sports', 0),
(103, 7, 'Zum Schutz der internationalen Beziehungen', 0),
(104, 7, 'Zur Bekämpfung der Kriminalität', 0),
(105, 7, 'Zur Sicherung der Mobilität', 0),
(106, 8, 'Der Monarch', 1),
(107, 8, 'Das Parlament', 0),
(108, 8, 'Der Präsident', 0),
(109, 8, 'Der Ministerrat', 0),
(110, 8, 'Die Regierung', 0),
(111, 8, 'Das Volk', 0),
(112, 8, 'Die Ahnen', 0),
(113, 8, 'Die Götter', 0),
(114, 8, 'Die Königsfamilien', 0),
(115, 8, 'Der Justizminister', 0),
(116, 8, 'Der Premierminister', 0),
(117, 8, 'Die Adligen', 0),
(118, 8, 'Der Staatsrat', 0),
(119, 8, 'Das Verfassungsgericht', 0),
(120, 8, 'Die Priester', 0),
(121, 9, 'Die Eintracht und Stabilität des Reiches zu bewahren', 1),
(122, 9, 'Die wirtschaftliche Entwicklung zu fördern', 0),
(123, 9, 'Die Gesundheitsversorgung sicherzustellen', 0),
(124, 9, 'Die Umwelt zu schützen', 0),
(125, 9, 'Die Bildung zu verbessern', 0),
(126, 9, 'Die Kultur zu fördern', 0),
(127, 9, 'Die Infrastruktur auszubauen', 0),
(128, 9, 'Die Meinungsfreiheit zu gewährleisten', 0),
(129, 9, 'Die internationale Zusammenarbeit zu stärken', 0),
(130, 9, 'Die Bekämpfung der Armut', 0),
(131, 9, 'Die Gleichstellung der Geschlechter zu fördern', 0),
(132, 9, 'Die Forschung und Innovation zu unterstützen', 0),
(133, 9, 'Die Schaffung von Arbeitsplätzen zu unterstützen', 0),
(134, 9, 'Die Sicherung der Mobilität zu gewährleisten', 0),
(135, 9, 'Die Unterstützung von Familien sicherzustellen', 0),
(136, 10, 'Das Zuhause eines jeden Bewohners ist unverletzlich', 1),
(137, 10, 'Die freie Wahl des Arbeitsplatzes', 0),
(138, 10, 'Die Teilnahme an kulturellen Veranstaltungen', 0),
(139, 10, 'Die kostenlose Gesundheitsversorgung', 0),
(140, 10, 'Der Zugang zu Bildung', 0),
(141, 10, 'Der Schutz der Umwelt', 0),
(142, 10, 'Die Meinungsfreiheit', 0),
(143, 10, 'Die Teilnahme an Wahlen', 0),
(144, 10, 'Die Gründung von Vereinen', 0),
(145, 10, 'Die Reisefreiheit', 0),
(146, 10, 'Die Gleichstellung vor dem Gesetz', 0),
(147, 10, 'Die freie Religionsausübung', 0),
(148, 10, 'Die Förderung des Sports', 0),
(149, 10, 'Die Unterstützung von Familien', 0),
(150, 10, 'Der Schutz des Eigentums', 0),
(151, 11, 'Artikel 12', 0),
(152, 11, 'Artikel 3', 0),
(153, 11, 'Artikel 5', 0),
(154, 11, 'Artikel 8', 0),
(155, 11, 'Artikel 14', 0),
(156, 11, 'Artikel 16', 0),
(157, 11, 'Artikel 18', 0),
(158, 11, 'Artikel 21', 0),
(159, 11, 'Artikel 24', 0),
(160, 11, 'Artikel 27', 0),
(161, 11, 'Artikel 30', 0),
(162, 11, 'Artikel 32', 0),
(163, 11, 'Artikel 35', 0),
(164, 11, 'Artikel 38', 0),
(165, 11, 'Artikel 40', 1),
(166, 12, 'Beratung des Monarchen', 1),
(167, 12, 'Gesetzgebung', 0),
(168, 12, 'Exekutive Beratung', 0),
(169, 12, 'Judikative Überwachung', 0),
(170, 12, 'Wirtschaftliche Planung', 0),
(171, 12, 'Militärische Führung', 0),
(172, 12, 'Kulturelle Angelegenheiten', 0),
(173, 12, 'Bildungspolitik', 0),
(174, 12, 'Außenpolitik', 0),
(175, 12, 'Gesundheitswesen', 0),
(176, 12, 'Sozialpolitik', 0),
(177, 12, 'Umweltschutz', 0),
(178, 12, 'Infrastrukturentwicklung', 0),
(179, 12, 'Innovationsförderung', 0),
(180, 12, 'Religionsangelegenheiten', 0),
(181, 13, 'Artikel 20', 1),
(182, 13, 'Artikel 7', 0),
(183, 13, 'Artikel 10', 0),
(184, 13, 'Artikel 13', 0),
(185, 13, 'Artikel 17', 0),
(186, 13, 'Artikel 23', 0),
(187, 13, 'Artikel 26', 0),
(188, 13, 'Artikel 29', 0),
(189, 13, 'Artikel 31', 0),
(190, 13, 'Artikel 34', 0),
(191, 13, 'Artikel 37', 0),
(192, 13, 'Artikel 39', 0),
(193, 13, 'Artikel 42', 0),
(194, 13, 'Artikel 44', 0),
(195, 13, 'Artikel 46', 0),
(196, 14, '9, durch den Monarchen', 0),
(197, 14, '5, durch das Parlament', 0),
(198, 14, '7, durch das Parlament', 0),
(199, 14, '11, durch den Monarchen', 0),
(200, 14, '13, durch den Monarchen', 1),
(201, 14, '15, durch den Ministerrat', 0),
(202, 14, '17, durch den Ministerrat', 0),
(203, 14, '19, durch den Präsidenten', 0),
(204, 14, '21, durch den Präsidenten', 0),
(205, 14, '23, durch das Parlament', 0),
(206, 14, '25, durch den Monarchen', 0),
(207, 14, '27, durch das Parlament', 0),
(208, 14, '29, durch den Monarchen', 0),
(209, 14, '31, durch den Präsidenten', 0),
(210, 14, '33, durch den Ministerrat', 0),
(211, 15, 'Der Oberste Rat der Ahnen', 0),
(212, 15, 'Der Justizrat', 0),
(213, 15, 'Der Ministerrat', 0),
(214, 15, 'Der Rat der Weisen', 0),
(215, 15, 'Der Kronrat', 1),
(216, 15, 'Der Exekutivrat', 0),
(217, 15, 'Der Staatsrat', 0),
(218, 15, 'Der Verfassungsrat', 0),
(219, 15, 'Der Wirtschaftsrat', 0),
(220, 15, 'Der Sicherheitsrat', 0),
(221, 15, 'Der Kultur- und Bildungsrat', 0),
(222, 15, 'Der Gesundheitsrat', 0),
(223, 15, 'Der Sozialrat', 0),
(224, 15, 'Der Umweltrat', 0),
(225, 15, 'Der Innovationsrat', 0),
(226, 16, 'Artikel 6', 0),
(227, 16, 'Artikel 9', 0),
(228, 16, 'Artikel 11', 0),
(229, 16, 'Artikel 15', 0),
(230, 16, 'Artikel 19', 1),
(231, 16, 'Artikel 22', 0),
(232, 16, 'Artikel 25', 0),
(233, 16, 'Artikel 28', 0),
(234, 16, 'Artikel 33', 0),
(235, 16, 'Artikel 36', 0),
(236, 16, 'Artikel 41', 0),
(237, 16, 'Artikel 43', 0),
(238, 16, 'Artikel 45', 0),
(239, 16, 'Artikel 48', 0),
(240, 16, 'Artikel 50', 0),
(241, 17, 'Unterzeichnung und Ratifizierung', 1),
(242, 17, 'Nur Unterzeichnung', 0),
(243, 17, 'Nur Ratifizierung', 0),
(244, 17, 'Vorschlagsrecht', 0),
(245, 17, 'Beratungsrecht', 0),
(246, 17, 'Vetorecht', 0),
(247, 17, 'Überwachungsrecht', 0),
(248, 17, 'Delegationsrecht', 0),
(249, 17, 'Prüfungsrecht', 0),
(250, 17, 'Abweisungsrecht', 0),
(251, 17, 'Aushandlungsrecht', 0),
(252, 17, 'Modifizierungsrecht', 0),
(253, 17, 'Verhandlungsrecht', 0),
(254, 17, 'Beendigungsrecht', 0),
(255, 17, 'Verlängerungsrecht', 0),
(256, 18, 'Der Oberste Archivar', 0),
(257, 18, 'Der Staatsarchivar', 0),
(258, 18, 'Der Historische Archivar', 0),
(259, 18, 'Der Nationale Archivar', 0),
(260, 18, 'Der Königliche Archivar', 1),
(261, 18, 'Der Ministeriale Archivar', 0),
(262, 18, 'Der Zentrale Archivar', 0),
(263, 18, 'Der Hohe Archivar', 0),
(264, 18, 'Der Exekutive Archivar', 0),
(265, 18, 'Der Parlamentarische Archivar', 0),
(266, 18, 'Der Verfassungsarchivar', 0),
(267, 18, 'Der Kulturelle Archivar', 0),
(268, 18, 'Der Bildungsarchivar', 0),
(269, 18, 'Der Wissenschaftliche Archivar', 0),
(270, 18, 'Der Juristische Archivar', 0),
(271, 19, 'Truppenaufstellung', 0),
(272, 19, 'Truppenstationierung', 0),
(273, 19, 'Oberbefehl', 1),
(274, 19, 'Finanzierung des Militärs', 0),
(275, 19, 'Auswahl der Offiziere', 0),
(276, 19, 'Militärische Ausbildung', 0),
(277, 19, 'Verteidigungsplanung', 0),
(278, 19, 'Waffenbeschaffung', 0),
(279, 19, 'Geheimdienstkoordination', 0),
(280, 19, 'Friedensverhandlungen', 0),
(281, 19, 'Grenzsicherung', 0),
(282, 19, 'Logistikmanagement', 0),
(283, 19, 'Strategische Planung', 0),
(284, 19, 'Truppenentsendung', 0),
(285, 19, 'Sicherheitsüberwachung', 0),
(286, 20, 'Wahl der Minister', 0),
(287, 20, 'Bestätigung der Minister', 0),
(288, 20, 'Ernennung der Minister', 1),
(289, 20, 'Überwachung der Minister', 0),
(290, 20, 'Absetzung der Minister', 0),
(291, 20, 'Beratung der Minister', 0),
(292, 20, 'Unterstützung der Minister', 0),
(293, 20, 'Koordination der Minister', 0),
(294, 20, 'Kontrolle der Minister', 0),
(295, 20, 'Finanzierung der Ministerien', 0),
(296, 20, 'Überprüfung der Ministerien', 0),
(297, 20, 'Delegation von Aufgaben', 0),
(298, 20, 'Genehmigung von Projekten', 0),
(299, 20, 'Überwachung der Politik', 0),
(300, 20, 'Bestimmung der Richtlinien', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Einbürgerung`
--

CREATE TABLE `Einbürgerung` (
  `fragen_ID` int(11) NOT NULL,
  `frage` text NOT NULL,
  `schwierigkeitsgrad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `Einbürgerung`
--

INSERT INTO `Einbürgerung` (`fragen_ID`, `frage`, `schwierigkeitsgrad`) VALUES
(1, 'Wie lautet der Refrain der Hymne der Frostklippeninseln?', 3),
(2, 'Wer verkündet die Einführung des Gesetzes in der Präambel der Verfassung?', 4),
(3, 'Was symbolisiert die Krone der Frostklippeninseln laut Verfassung?', 1),
(4, 'Welche beiden Königsfamilien sind Hüter der Traditionen auf den Frostklippeninseln?', 1),
(5, 'Was ist das unveräußerliche Recht jedes Bewohners der Frostklippeninseln laut Artikel 2?', 2),
(6, 'Welche oberste Priorität hat der Staat laut Artikel 2 der Verfassung?', 3),
(7, 'Wie wird die Freiheit der Meinungsäußerung laut Artikel 5 eingeschränkt?', 2),
(8, 'Wer ernennt laut Artikel 3 die Richter und Rechtsprechenden auf den Frostklippeninseln?', 4),
(9, 'Welche Aufgabe haben die Königsfamilien Turin und Gebor laut Verfassung?', 8),
(10, 'Was garantiert Artikel 4 bezüglich der Privatsphäre der Bewohner der Frostklippeninseln?', 5),
(11, 'Welcher Artikel der Verfassung der Frostklippeninseln beschreibt die genauen Bedingungen und Verfahren für die Enthebung eines Monarchen?', 10),
(12, 'Welche spezifische Rolle spielt der Oberste Rat der Ahnen in der Verfassungsstruktur der Frostklippeninseln?', 9),
(13, 'Welcher Artikel der Verfassung regelt die Bedingungen für die Bildung und Auflösung von politischen Parteien auf den Frostklippeninseln?', 7),
(14, 'Wie viele Mitglieder hat das Verfassungsgericht der Frostklippeninseln und wie werden sie ernannt?', 6),
(15, 'Welches spezielle Organ ist verantwortlich für die Überwachung der königlichen Dekrete und Verordnungen auf den Frostklippeninseln?', 8),
(16, 'Welcher Artikel der Verfassung der Frostklippeninseln legt die Bedingungen für die Aufhebung eines königlichen Dekrets durch das Verfassungsgericht fest?', 9),
(17, 'Welche Befugnis hat der Monarch gemäß Artikel 27 der Verfassung bezüglich internationaler Abkommen und Verträge?', 5),
(18, 'Welches spezielle Amt ist laut Verfassung für die Wahrung und Pflege der königlichen Archive verantwortlich?', 4),
(19, 'Welche exklusive Befugnis hat der Monarch laut Artikel 30 der Verfassung in Bezug auf das Militär der Frostklippeninseln?', 2),
(20, 'Welche spezielle Macht hat der Monarch laut Artikel 38 der Verfassung bei der Ernennung von Regierungsmitgliedern?', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Einwohner`
--

CREATE TABLE `Einwohner` (
  `EinwohnerID` int(11) NOT NULL,
  `Vorname` varchar(50) DEFAULT NULL,
  `Nachname` varchar(50) DEFAULT NULL,
  `Geburtsdatum` date DEFAULT NULL,
  `Geschlecht` char(1) DEFAULT NULL,
  `Strasse` varchar(100) DEFAULT NULL,
  `Hausnummer` varchar(10) DEFAULT NULL,
  `PLZ` varchar(10) DEFAULT NULL,
  `Stadt` varchar(100) DEFAULT NULL,
  `Telefonnummer` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Beruf` varchar(100) DEFAULT NULL,
  `Staatsbuergerschaft` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `Einwohner`
--

INSERT INTO `Einwohner` (`EinwohnerID`, `Vorname`, `Nachname`, `Geburtsdatum`, `Geschlecht`, `Strasse`, `Hausnummer`, `PLZ`, `Stadt`, `Telefonnummer`, `Email`, `Beruf`, `Staatsbuergerschaft`) VALUES
(1, 'Max', 'Mustermann', '1990-05-20', 'm', 'Hauptstraße', '123', '12345', 'Musterstadt', '123456789', 'max@example.com', 'Ingenieur', 'Deutschland'),
(2, 'Anna', 'Schmidt', '1988-10-15', 'w', 'Nebenstraße', '456', '54321', 'Beispielstadt', '987654321', 'anna@example.com', 'Lehrerin', 'Deutschland'),
(3, 'Michael', 'Müller', '1995-02-08', 'm', 'Dorfstraße', '789', '98765', 'Musterhausen', '456123789', 'michael@example.com', 'Arzt', 'Deutschland'),
(4, 'Sophie', 'Wagner', '1992-07-03', 'w', 'Bergweg', '101', '11111', 'Bergdorf', '654987321', 'sophie@example.com', 'Softwareentwicklerin', 'Deutschland'),
(5, 'Felix', 'Becker', '1985-12-18', 'm', 'Wiesenweg', '202', '22222', 'Wiesendorf', '789123456', 'felix@example.com', 'Manager', 'Deutschland'),
(6, 'Laura', 'Hoffmann', '1998-04-25', 'w', 'Bachgasse', '303', '33333', 'Bachstadt', '321654987', 'laura@example.com', 'Designerin', 'Deutschland'),
(7, 'Simon', 'Schulz', '1991-09-12', 'm', 'Burgplatz', '404', '44444', 'Burgstadt', '159753468', 'simon@example.com', 'Verkäufer', 'Deutschland'),
(8, 'Hannah', 'Koch', '1993-06-30', 'w', 'Parkallee', '505', '55555', 'Parkstadt', '357159456', 'hannah@example.com', 'Buchhalterin', 'Deutschland'),
(9, 'Jonas', 'Bauer', '1989-11-22', 'm', 'Feldweg', '606', '66666', 'Feldstadt', '852369741', 'jonas@example.com', 'Ingenieur', 'Deutschland'),
(10, 'Lea', 'Schäfer', '1996-08-17', 'w', 'Talstraße', '707', '77777', 'Taldorf', '951753852', 'lea@example.com', 'Ärztin', 'Deutschland');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Regionen`
--

CREATE TABLE `Regionen` (
  `RegionID` int(11) NOT NULL,
  `RegionName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Städte`
--

CREATE TABLE `Städte` (
  `StadtID` int(11) NOT NULL,
  `StadtName` varchar(50) DEFAULT NULL,
  `RegionID` int(11) DEFAULT NULL,
  `Einwohnerzahl` int(11) DEFAULT NULL,
  `Bürgermeister` varchar(100) DEFAULT NULL,
  `Gründungsjahr` int(11) DEFAULT NULL,
  `Fläche` float DEFAULT NULL,
  `Bevölkerungsdichte` float DEFAULT NULL,
  `Höhe_über_dem_Meeresspiegel` int(11) DEFAULT NULL,
  `Postleitzahl` varchar(20) DEFAULT NULL,
  `Telefonvorwahl` varchar(20) DEFAULT NULL,
  `Koordinaten` varchar(50) DEFAULT NULL,
  `Wirtschaft` text DEFAULT NULL,
  `Bildungseinrichtungen` text DEFAULT NULL,
  `Gesundheitseinrichtungen` text DEFAULT NULL,
  `Verkehrsanbindung` text DEFAULT NULL,
  `Klima` text DEFAULT NULL,
  `Kulturelle_Einrichtungen` text DEFAULT NULL,
  `Sehenswürdigkeiten` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Antworten`
--
ALTER TABLE `Antworten`
  ADD PRIMARY KEY (`antwort_ID`),
  ADD KEY `fragen_ID` (`fragen_ID`);

--
-- Indizes für die Tabelle `Einbürgerung`
--
ALTER TABLE `Einbürgerung`
  ADD PRIMARY KEY (`fragen_ID`);

--
-- Indizes für die Tabelle `Einwohner`
--
ALTER TABLE `Einwohner`
  ADD PRIMARY KEY (`EinwohnerID`);

--
-- Indizes für die Tabelle `Regionen`
--
ALTER TABLE `Regionen`
  ADD PRIMARY KEY (`RegionID`);

--
-- Indizes für die Tabelle `Städte`
--
ALTER TABLE `Städte`
  ADD PRIMARY KEY (`StadtID`),
  ADD KEY `RegionID` (`RegionID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Einwohner`
--
ALTER TABLE `Einwohner`
  MODIFY `EinwohnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `Regionen`
--
ALTER TABLE `Regionen`
  MODIFY `RegionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Städte`
--
ALTER TABLE `Städte`
  MODIFY `StadtID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Antworten`
--
ALTER TABLE `Antworten`
  ADD CONSTRAINT `Antworten_ibfk_1` FOREIGN KEY (`fragen_ID`) REFERENCES `Einbürgerung` (`fragen_ID`);

--
-- Constraints der Tabelle `Städte`
--
ALTER TABLE `Städte`
  ADD CONSTRAINT `Städte_ibfk_1` FOREIGN KEY (`RegionID`) REFERENCES `Regionen` (`RegionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
