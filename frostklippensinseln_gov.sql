-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jun 2024 um 01:00
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
-- Datenbank: `frostklippensinseln_gov`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antworten`
--

CREATE TABLE `antworten` (
  `antworten_ID` int(11) NOT NULL,
  `antwort` text DEFAULT NULL,
  `fragen_ID` int(11) DEFAULT NULL,
  `ist_richtig` int(11) NOT NULL DEFAULT 0
) ;

--
-- Daten für Tabelle `antworten`
--

INSERT INTO `antworten` (`antworten_ID`, `antwort`, `fragen_ID`, `ist_richtig`) VALUES
(1, 'Treue zu den Göttern der Frostklippeninseln.', 1, 0),
(2, 'Die Schönheit der Flora und Fauna der Frostklippeninseln.', 1, 0),
(3, 'Die Treue zum Königshaus und die Verbundenheit mit der Heimat.', 1, 1),
(4, 'Die wirtschaftliche Stärke und Innovation der Frostklippeninseln.', 1, 0),
(5, 'Die Bescheidenheit und Zurückhaltung der Bewohner der Frostklippeninseln.', 2, 0),
(6, 'Die geografische Isolation der Frostklippeninseln.', 2, 0),
(7, 'Die körperliche Stärke und Robustheit der Bewohner der Frostklippeninseln.', 2, 0),
(8, 'Standhaftigkeit und Stolz der Bewohner trotz widriger Bedingungen.', 2, 1),
(9, 'Das Verständnis für Kunst und Kultur auf den Frostklippeninseln.', 3, 0),
(10, 'Die Fähigkeit zur strategischen Planung und Kriegsführung.', 3, 0),
(11, 'Die Bereitschaft zur Opferbereitschaft und zum Überwinden von Hindernissen.', 3, 1),
(12, 'Die Liebe zur Natur und das Verständnis für ökologische Balance.', 3, 0),
(13, 'Unbeugsamen Mut und heroischen Geist.', 4, 1),
(14, 'Die Fähigkeit zur technologischen Innovation.', 4, 0),
(15, 'Eine Vorliebe für Kunst und Musik.', 4, 0),
(16, 'Handelsgeschick und wirtschaftliche Macht.', 4, 0),
(17, 'Ein Zeugnis der kulturellen Vielfalt der Frostklippeninseln.', 5, 0),
(18, 'Ein Symbol der Beständigkeit, Opferbereitschaft und Entschlossenheit.', 5, 1),
(19, 'Ein Ausdruck der politischen Neutralität.', 5, 0),
(20, 'Ein Dokument zur Förderung des Tourismus.', 5, 0),
(21, 'Die Vergrößerung des Territoriums der Frostklippeninseln.', 6, 0),
(22, 'Die Schaffung einer Gemeinschaft, deren Werte und Stärke das Antlitz des Landes in den Winden der Welt tragen.', 6, 1),
(23, 'Die Förderung des internationalen Handels.', 1, 0),
(24, 'Die Entwicklung neuer Technologien zur Verbesserung des Lebensstandards.', 6, 0),
(25, 'Sie wird als unwichtig erachtet.', 7, 0),
(26, 'Sie wird als unverbrüchlich anerkannt.', 7, 1),
(27, 'Sie wird als optional betrachtet.', 7, 0),
(28, 'Sie wird als hinderlich angesehen.', 7, 0),
(29, 'Sie symbolisiert die Einheit und Führung des Volkes in Zeiten der Not und des Überflusses.', 8, 1),
(30, 'Sie repräsentiert die wirtschaftliche Macht des Reiches.', 8, 0),
(31, 'Sie steht für die kulturelle Vielfalt des Landes.', 8, 0),
(32, 'Sie bedeutet das Ende der Monarchie.', 8, 0),
(33, 'Das Recht auf kostenlose Bildung.', 9, 0),
(34, 'Das Recht auf Arbeit.', 9, 0),
(35, 'Das Recht auf Freiheit und Sicherheit seiner Person.', 9, 1),
(36, 'Das Recht auf kulturelle Vielfalt.', 9, 0),
(37, 'Das Parlament.', 10, 0),
(38, 'Die Bürger durch Wahlen.', 10, 0),
(39, 'Der Monarch.', 10, 1),
(40, 'Die Adelsfamilien.', 10, 0),
(41, 'Bei Verdacht auf Verbrechen.', 11, 0),
(42, 'Nur unter strengen gesetzlichen Auflagen und nach Genehmigung durch die königliche Autorität.', 11, 1),
(43, 'Auf Anordnung des Bürgermeisters.', 11, 0),
(44, 'Wenn es das Gemeinwohl erfordert, ohne weitere Voraussetzungen.', 11, 0),
(45, 'Es gibt keine Einschränkungen.', 12, 0),
(46, 'Sie unterliegt Einschränkungen im Interesse der nationalen Sicherheit und des öffentlichen Wohlbefindens.', 12, 1),
(47, 'Nur der König kann Einschränkungen erlassen.', 12, 0),
(48, 'Sie wird nur bei diffamierenden Äußerungen gegenüber ausländischen Staatsoberhäuptern eingeschränkt.', 12, 0),
(49, 'Sie verwalten die Finanzen des Reiches.', 13, 0),
(50, 'Sie bewahren die Eintracht und Stabilität des Reiches und führen das Volk in Frieden und Gerechtigkeit.', 13, 1),
(51, 'Sie organisieren kulturelle Veranstaltungen.', 13, 0),
(52, 'Sie handeln im Auslandsgeschäft des Reiches.', 13, 0),
(53, 'Das Recht auf einen ständigen Wohnsitz.', 14, 0),
(54, 'Das Recht auf ein faires Gerichtsverfahren.', 14, 1),
(55, 'Das Recht auf medizinische Versorgung.', 14, 0),
(56, 'Das Recht auf kulturelle Identität.', 14, 0),
(57, 'Der Monarch ist oberster Richter und Garant für die Einhaltung der Gesetze.', 15, 1),
(58, 'Der Monarch hat keine Rolle im Rechtssystem.', 15, 0),
(59, 'Der Monarch ist nur ein symbolischer Vertreter.', 15, 0),
(60, 'Der Monarch kann nur Gesetze vorschlagen.', 15, 0),
(61, 'Die Möglichkeit, öffentliche Veranstaltungen zu besuchen.', 16, 0),
(62, 'Die Genehmigung durch die königliche Autorität für Durchsuchungen.', 16, 1),
(63, 'Der freie Zugang zu Bildungseinrichtungen.', 16, 0),
(64, 'Die Teilnahme an politischen Wahlen.', 16, 0),
(65, 'Nur positive Nachrichten zu verbreiten.', 17, 0),
(66, 'Wahrheitsgemäße und verantwortungsvolle Berichterstattung zu gewährleisten.', 17, 0),
(67, 'Regierungspropaganda zu veröffentlichen.', 17, 0),
(68, 'Ihre Berichterstattung vor der Veröffentlichung genehmigen zu lassen.', 17, 1),
(69, 'Bei Erreichen des 18. Lebensjahres.', 18, 0),
(70, 'Im Falle einer Bedrohung der Souveränität, der territorialen Integrität oder der inneren Sicherheit der Frostklippeninseln.', 18, 1),
(71, 'Jedes Jahr am Nationalfeiertag.', 18, 0),
(72, 'Bei einer allgemeinen Mobilmachung unabhängig von Alter oder Geschlecht.', 18, 0),
(73, 'Sie haben das Recht, diese Befehle ohne Zustimmung des höchsten militärischen Befehlshabers oder des Monarchen zu ignorieren.', 19, 0),
(74, 'Sie haben das Recht, Widerspruch einzulegen, jedoch unterliegt dieses Recht der Zustimmung des höchsten militärischen Befehlshabers oder des Monarchen.', 19, 1),
(75, 'Sie haben das Recht, sofort ihren Dienst zu quittieren.', 19, 0),
(76, 'Sie haben das Recht, die Befehle nur teilweise auszuführen.', 19, 0),
(77, 'Einführung von Ausgangssperren, Zensur von Kommunikation und Verhaftung von Verdächtigen ohne gerichtliche Genehmigung.', 20, 1),
(78, 'Einführung eines neuen Steuersystems.', 20, 0),
(79, 'Vollständige Schließung aller Bildungseinrichtungen.', 20, 0),
(80, 'Zwangsrekrutierung aller Bürger unabhängig von ihren Fähigkeiten.', 20, 0),
(81, 'Kriegsgefangene sollen ohne Ausnahme hart bestraft werden.', 21, 0),
(82, 'Kriegsgefangene haben gemäß den Genfer Konventionen Anspruch auf angemessene Behandlung, sofern dies nicht im Widerspruch zu den Interessen der Frostklippeninseln steht.', 21, 1),
(83, 'Kriegsgefangene sollen sofort freigelassen werden.', 21, 0),
(84, 'Kriegsgefangene sollen als Staatsbürger behandelt werden.', 21, 0),
(85, 'Sie genießen bestimmte grundlegende Bürgerrechte, die vom Monarchen gewährt und geschützt werden.', 22, 1),
(86, 'Sie haben das Recht auf uneingeschränkten Waffenbesitz.', 22, 0),
(87, 'Sie haben das Recht, die Monarchie abzulehnen.', 22, 0),
(88, 'Sie haben das Recht, internationale Beziehungen zu führen.', 22, 0),
(89, 'Die Regierung muss nur die Grundschulbildung sicherstellen.', 23, 0),
(90, 'Die Regierung ist verpflichtet, angemessene Maßnahmen zu ergreifen, um eine allgemeine und kostenlose Bildung für alle Bürger sicherzustellen.', 23, 1),
(91, 'Die Regierung soll nur private Bildungseinrichtungen fördern.', 23, 0),
(92, 'Die Regierung hat keine Verpflichtungen bezüglich der Bildung.', 23, 0),
(93, 'Diskriminierung aufgrund von Rasse, Religion, Geschlecht oder ethnischer Zugehörigkeit.', 24, 1),
(94, 'Unterschiedliche Behandlung von Bürgern nach ihrem Alter.', 24, 0),
(95, 'Gleiche Behandlung von Bürgern unabhängig von ihrem Verhalten.', 24, 0),
(96, 'Diskriminierung aufgrund des Berufs.', 24, 0),
(97, 'Das Parlament.', 25, 0),
(98, 'Der Monarch.', 25, 1),
(99, 'Die Bürger durch Volksabstimmung.', 25, 0),
(100, 'Die regionalen Regierungen.', 25, 0),
(101, 'Nur Steuern auf landwirtschaftliche Produkte erheben.', 26, 0),
(102, 'Den Bodenbesitz regulieren und Produktionsmethoden lenken.', 26, 1),
(103, 'Nur importierte Lebensmittel zulassen.', 26, 0),
(104, 'Keine Maßnahmen, die Landwirtschaft ist privat reguliert.', 26, 0),
(105, 'Nur das Recht auf freie Arbeitswahl.', 27, 0),
(106, 'Das Recht auf faire Entlohnung, angemessene Arbeitszeiten und sichere Arbeitsbedingungen.', 27, 1),
(107, 'Das Recht, jeden Arbeitsplatz ohne Zustimmung des Arbeitgebers zu verlassen.', 27, 0),
(108, 'Das Recht, das Unternehmen jederzeit zu übernehmen.', 27, 0),
(109, 'Sie müssen die Rechte und Pflichten beider Parteien klar definieren und dürfen keine Bestimmungen enthalten, die gegen die Arbeitsgesetze oder die menschliche Würde verstoßen.', 28, 1),
(110, 'Sie müssen nur das Gehalt des Arbeitnehmers festlegen.', 28, 0),
(111, 'Sie dürfen keine Arbeitszeiten oder Urlaubstage enthalten.', 28, 0),
(112, 'Sie müssen die Anzahl der Überstunden festlegen.', 28, 0),
(113, 'Arbeitgeber sind verpflichtet, die festgelegten Arbeitszeitregelungen einzuhalten und Überstunden entsprechend zu vergüten.', 29, 1),
(114, 'Arbeitgeber müssen nur die Arbeitszeitregelungen für Teilzeitkräfte einhalten.', 29, 0),
(115, 'Arbeitgeber sind nicht verpflichtet, Überstunden zu vergüten.', 29, 0),
(116, 'Arbeitgeber müssen keine Ruhepausen gewähren.', 29, 0),
(117, 'Die Gewerkschaften.', 30, 0),
(118, 'Die Regierung.', 30, 1),
(119, 'Die Arbeitgeber.', 30, 0),
(120, 'Die internationalen Arbeitsorganisationen.', 30, 0),
(121, 'Das Recht, sich zu Gewerkschaften oder anderen Arbeitnehmerorganisationen zusammenzuschließen.', 31, 1),
(122, 'Das Recht, jeden Arbeitsplatz ohne Zustimmung des Arbeitgebers zu verlassen.', 31, 0),
(123, 'Das Recht, das Unternehmen jederzeit zu übernehmen.', 31, 0),
(124, 'Das Recht, die Gehälter der Arbeitgeber festzulegen.', 31, 0),
(125, 'Nur Unternehmen.', 32, 0),
(126, 'Nur Bürger mit hohem Einkommen.', 32, 0),
(127, 'Alle Bürger und Unternehmen.', 32, 1),
(128, 'Nur ausländische Investoren.', 32, 0),
(129, 'Die Regierung ist verpflichtet, die natürlichen Ressourcen und die Umwelt des Landes zu schützen und zu erhalten.', 33, 1),
(130, 'Die Regierung ist verpflichtet, nur die industriellen Aktivitäten zu regulieren.', 33, 0),
(131, 'Die Regierung ist verpflichtet, nur erneuerbare Energien zu fördern.', 33, 0),
(132, 'Die Regierung ist verpflichtet, den internationalen Handel mit Umwelttechnologien zu überwachen.', 33, 0),
(133, 'Die Regierung kann Naturschutzgebiete ausweisen, um bedrohte Arten und Ökosysteme zu schützen.', 34, 1),
(134, 'Die Regierung kann nur Zugangsbeschränkungen für alle Naturschutzgebiete einführen.', 34, 0),
(135, 'Die Regierung kann keine Maßnahmen zum Naturschutz ergreifen.', 34, 0),
(136, 'Die Regierung kann keine Schutzgebiete ausweisen.', 34, 0),
(137, 'Die Regierung kann Umweltvorschriften erlassen, um Umweltbelastungen zu reduzieren.', 35, 1),
(138, 'Die Regierung kann nur Umweltvorschriften für den Handel erlassen.', 35, 0),
(139, 'Die Regierung kann nur Umweltvorschriften für die Luftfahrt erlassen.', 35, 0),
(140, 'Die Regierung kann keine Umweltvorschriften erlassen.', 35, 0),
(141, 'Die Regierung ist verantwortlich für Maßnahmen zur Abfallwirtschaft und Recycling.', 36, 1),
(142, 'Die Regierung ist nur für die Stromversorgung zuständig.', 36, 0),
(143, 'Die Regierung ist nur für den Straßenbau zuständig.', 36, 0),
(144, 'Die Regierung ist nur für die Wasserversorgung zuständig.', 36, 0),
(145, 'Die Regierung ist verpflichtet, die Wasser- und Luftqualität zu überwachen und zu schützen.', 37, 1),
(146, 'Die Regierung ist nur für die Überwachung der Luftqualität zuständig.', 37, 0),
(147, 'Die Regierung ist nur für die Überwachung der Wasserqualität in den Städten zuständig.', 37, 0),
(148, 'Die Regierung ist nur für die Überwachung der Wasserqualität in den ländlichen Gebieten zuständig.', 37, 0),
(149, 'Die Regierung ist verpflichtet, Kunst und Kultur zu fördern und zu schützen.', 38, 1),
(150, 'Die Regierung ist verpflichtet, nur die wirtschaftliche Entwicklung zu fördern.', 38, 0),
(151, 'Die Regierung ist verpflichtet, nur die Bildung der Bürger zu unterstützen.', 38, 0),
(152, 'Die Regierung ist verpflichtet, nur die medizinische Versorgung zu verbessern.', 38, 0),
(153, 'Die Regierung kann kulturelle Veranstaltungen, Festivals und künstlerische Aufführungen organisieren oder unterstützen.', 39, 1),
(154, 'Die Regierung kann nur Programme zur industriellen Entwicklung unterstützen.', 39, 0),
(155, 'Die Regierung kann nur Bildungsprogramme für Schulen unterstützen.', 39, 0),
(156, 'Die Regierung kann nur Umweltschutzprogramme unterstützen.', 39, 0),
(157, 'Die Verantwortung umfasst den Denkmalschutz und den Schutz des kulturellen Erbes der Frostklippeninseln.', 40, 1),
(158, 'Die Verantwortung umfasst nur den Schutz der internationalen Beziehungen.', 40, 0),
(159, 'Die Verantwortung umfasst nur die Sicherheitspolitik des Landes.', 40, 0),
(160, 'Die Verantwortung umfasst nur die wirtschaftliche Entwicklung des Landes.', 40, 0),
(161, 'Die Regierung ist bestrebt, angemessenen und bezahlbaren Wohnraum für alle Bürger bereitzustellen.', 41, 1),
(162, 'Die Regierung ist nur für die landwirtschaftliche Entwicklung zuständig.', 41, 0),
(163, 'Die Regierung ist nur für die Wasserversorgung in den Städten zuständig.', 41, 0),
(164, 'Die Regierung ist nur für den Ausbau der Autobahnen zuständig.', 41, 0),
(165, 'Die Bauvorschriften sollen die Qualität und Sicherheit von Bauwerken gewährleisten.', 42, 1),
(166, 'Die Bauvorschriften dienen nur der Regulierung des Handels.', 42, 0),
(167, 'Die Bauvorschriften dienen nur der Kontrolle der medizinischen Einrichtungen.', 42, 0),
(168, 'Die Bauvorschriften dienen nur der Regulierung der Bildungseinrichtungen.', 42, 0),
(169, 'Die Regierung kann öffentliche Freizeiteinrichtungen und Parks entwickeln und betreiben.', 43, 1),
(170, 'Die Regierung kann nur industrielle Projekte unterstützen.', 43, 0),
(171, 'Die Regierung kann nur die wissenschaftliche Forschung fördern.', 43, 0),
(172, 'Die Regierung kann nur Programme zur Steigerung der Lebensmittelproduktion einführen.', 43, 0),
(173, 'Die Regierung unterstützt den Betrieb von Bibliotheken, Museen, Kunstgalerien und anderen kulturellen Einrichtungen.', 44, 1),
(174, 'Die Regierung unterstützt nur den Bau neuer Straßen.', 44, 0),
(175, 'Die Regierung unterstützt nur die Energieproduktion.', 44, 0),
(176, 'Die Regierung unterstützt nur die Finanzinstitutionen.', 44, 0),
(177, 'Die Regierung kann Jugendzentren und Einrichtungen für Jugendliche bereitstellen.', 45, 1),
(178, 'Die Regierung kann nur Universitäten unterstützen.', 45, 0),
(179, 'Die Regierung kann nur Forschungseinrichtungen fördern.', 45, 0),
(180, 'Die Regierung kann nur Krankenhäuser bauen.', 45, 0),
(181, 'Die Regierung fördert die kulturelle Integration von Einwanderern und ethnischen Minderheiten.', 46, 1),
(182, 'Die Regierung fördert nur den internationalen Handel.', 46, 0),
(183, 'Die Regierung fördert nur die militärische Zusammenarbeit.', 46, 0),
(184, 'Die Regierung fördert nur die Entwicklung neuer Technologien.', 46, 0),
(185, 'Die Regierung kann den Tourismussektor unterstützen und fördern.', 47, 1),
(186, 'Die Regierung kann nur die landwirtschaftliche Produktion unterstützen.', 47, 0),
(187, 'Die Regierung kann nur die industrielle Produktion fördern.', 47, 0),
(188, 'Die Regierung kann nur die Entwicklung neuer Handelsbeziehungen unterstützen.', 47, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beruf`
--

CREATE TABLE `beruf` (
  `beruf_id` int(11) NOT NULL,
  `einwohner_id` int(11) DEFAULT NULL,
  `beruf` varchar(100) DEFAULT NULL,
  `jahr_seit_wann` year(4) DEFAULT NULL,
  `haupteinkuenfte` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `beruf`
--

INSERT INTO `beruf` (`beruf_id`, `einwohner_id`, `beruf`, `jahr_seit_wann`, `haupteinkuenfte`) VALUES
(7, 6, '', '0000', NULL),
(8, 7, '', '0000', NULL),
(9, 7, '', '0000', NULL),
(10, 7, '', '0000', NULL),
(11, 8, '', '0000', NULL),
(12, 9, '', '0000', NULL),
(13, NULL, '', '0000', 0.00),
(14, NULL, '', '0000', 0.00),
(15, 19, '', '0000', 0.00),
(16, 20, '', '0000', 0.00),
(17, 21, '', '0000', 0.00),
(18, 22, '', '0000', 0.00),
(19, 23, '', '0000', 0.00),
(20, 24, '', '0000', 0.00),
(21, 25, '', '0000', 0.00),
(22, 26, '', '0000', 0.00),
(23, 27, '', '0000', 0.00),
(24, 28, '', '0000', 0.00),
(25, 29, '', '0000', 0.00),
(26, 30, '', '0000', 0.00),
(27, 31, '', '0000', 0.00),
(28, 32, '', '0000', 0.00),
(29, 33, '', '0000', 0.00),
(30, 34, 'Lehrer', '2015', 2500.00),
(31, 35, 'Lehrer', '2015', 2500.00),
(32, 36, 'Lehrer', '2015', 2500.00),
(33, 37, 'Lehrer', '2015', 2500.00),
(34, 38, 'Lehrer', '2015', 2500.00),
(35, 39, 'Lehrer', '2015', 2500.00),
(36, 40, 'Lehrer', '2015', 2500.00),
(37, 41, 'Lehrer', '2015', 2500.00),
(38, 42, 'Lehrer', '2015', 2500.00),
(39, 43, 'Lehrer', '2015', 2500.00),
(40, 44, 'Lehrer', '2015', 2500.00),
(41, 45, 'Lehrer', '2015', 2500.00),
(42, 46, 'Lehrer', '2015', 2500.00),
(43, 47, 'Lehrer', '2015', 2500.00);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bildung`
--

CREATE TABLE `bildung` (
  `bildung_id` int(11) NOT NULL,
  `einwohner_id` int(11) DEFAULT NULL,
  `bildungsabschluss` varchar(100) DEFAULT NULL,
  `jahr_bildungsabschluss` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bildung`
--

INSERT INTO `bildung` (`bildung_id`, `einwohner_id`, `bildungsabschluss`, `jahr_bildungsabschluss`) VALUES
(16, NULL, 'Doktor', '1990-02-12'),
(17, NULL, 'Doktor', '1990-02-12'),
(18, NULL, 'Doktor', '1990-02-12'),
(19, NULL, 'Doktor', '1990-02-12'),
(20, 18, 'Doktor', '1990-02-12'),
(21, 19, 'Doktor', '1990-02-12'),
(22, 20, 'Doktor', '1990-02-12'),
(23, 21, 'Doktor', '1990-02-12'),
(24, 22, 'Bachelor', '2222-02-12'),
(25, 23, 'Master', '1990-02-12'),
(26, 24, 'Bachelor of Arts', '3457-02-12'),
(27, 25, 'Fachhochschulreife', '1955-02-12'),
(28, 26, 'Fachhochschulreife', '0955-11-12'),
(29, 27, 'Bachelor of Engineering', '1955-02-12'),
(30, 28, 'Keine', '1955-02-12'),
(31, 29, 'Master', '1966-11-12'),
(32, 30, 'Doctor of Medicine', '3568-06-12'),
(33, 31, 'Abitur', '1955-02-12'),
(34, 32, 'Doktor', '1877-12-12'),
(35, 33, 'Keine', '0001-01-01'),
(36, 34, 'Keine', '1865-02-12'),
(37, 35, 'Master', '0001-02-12'),
(38, 36, 'Abitur', '1433-03-12'),
(39, 37, 'Keine', '0001-01-01'),
(40, 38, 'Bachelor', '1223-02-23'),
(41, 39, 'Bachelor', '4656-05-23'),
(42, 40, 'Master', '4232-12-31'),
(43, 41, 'Abitur', '2024-06-13'),
(44, 42, 'Master', '4225-03-12'),
(45, 43, 'Fachhochschulreife', '1454-05-23'),
(46, 44, 'Doctor of Philosophy', '3454-02-12'),
(47, 45, 'Bachelor of Science', '1547-03-12'),
(48, 46, 'Bachelor of Arts', '4455-03-12'),
(49, 47, 'Keine', '3456-05-31');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einbürgerung`
--

CREATE TABLE `einbürgerung` (
  `fragen_ID` int(11) NOT NULL,
  `frage` text DEFAULT NULL,
  `schwierigkeitsgrad` int(11) DEFAULT NULL CHECK (`schwierigkeitsgrad` between 1 and 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `einbürgerung`
--

INSERT INTO `einbürgerung` (`fragen_ID`, `frage`, `schwierigkeitsgrad`) VALUES
(1, 'Welcher Aspekt der Frostklippeninseln wird in der Hymne besonders hervorgehoben?', 5),
(2, 'Was symbolisiert der Ausdruck \"Auf den Klippen, hoch und stolz, stehen in tiefstem Frost\" in der Hymne?', 4),
(3, 'Welcher Sinn wird durch den Ausdruck \"Mit Tapferkeit und Meister Sinn\" in der Hymne vermittelt?', 6),
(4, 'Was haben die Ahnen der Frostklippeninseln während des Frostklingenkrieges gezeigt?', 7),
(5, 'Was symbolisiert das neue Gesetz laut dem Vorwort?', 8),
(6, 'Was ist das zentrale Ziel der Gemeinschaft, wie es in der Präambel beschrieben wird?', 6),
(7, 'Welche Bedeutung wird in der Präambel der Eintracht zwischen dem Volk und seinen Anführern zugeschrieben?', 3),
(8, 'Welche Bedeutung hat die Krone der Frostklippeninseln laut Artikel 1 des Gesetzbuchs?', 5),
(9, 'Was ist das unveräußerliche Recht eines jeden Bewohners der Frostklippeninseln laut Artikel 2?', 4),
(10, 'Wer hat das Recht, die Richter und Rechtsprechenden laut Artikel 3 zu ernennen?', 7),
(11, 'Unter welchen Bedingungen darf die Privatsphäre eines Bewohners laut Artikel 4 verletzt werden?', 5),
(12, 'Welche Einschränkungen gibt es für die Freiheit der Meinungsäußerung laut Artikel 5?', 5),
(13, 'Welche Aufgabe haben die Königsfamilien laut Artikel 1 des Gesetzbuchs?', 6),
(14, 'Was garantiert Artikel 2 in Bezug auf die Freiheit der Bewohner?', 7),
(15, 'Welche Rolle spielt der Monarch laut Artikel 3 im Rechtssystem der Frostklippeninseln?', 8),
(16, 'Was ist laut Artikel 4 ein wichtiger Aspekt des Schutzes der Privatsphäre?', 8),
(17, 'Welche Verpflichtung haben die Medien laut Artikel 5?', 7),
(18, 'Wann ist es die Pflicht aller männlichen Bürger im Alter von 18 bis 45 Jahren, sich der Verteidigungsarmee zu stellen?', 6),
(19, 'Was haben Soldaten der Verteidigungsarmee der Frostklippeninseln das Recht zu tun, wenn sie rechtswidrige Befehle erhalten?', 7),
(20, 'Welche Maßnahmen sind unter dem Kriegsrecht gestattet, um Ordnung und Sicherheit aufrechtzuerhalten?', 8),
(21, 'Wie sollen Kriegsgefangene gemäß Artikel 13 behandelt werden?', 7),
(22, 'Welche Rechte haben Bürger der Frostklippeninseln laut Artikel 21?', 6),
(23, 'Was ist die Verpflichtung der Regierung laut Artikel 26 bezüglich der Bildung?', 5),
(24, 'Was ist laut Artikel 28 vor dem Gesetz verboten?', 5),
(25, 'Wer legt laut Artikel 34 die Steuern und Abgaben fest?', 6),
(26, 'Welche Maßnahmen kann die Regierung laut Artikel 36 ergreifen, um die Landwirtschaft zu fördern?', 6),
(27, 'Was ist laut Artikel 37 das Recht der Arbeitnehmer?', 5),
(28, 'Was müssen Arbeitsverträge laut Artikel 41 enthalten?', 5),
(29, 'Was ist laut Artikel 42 die Verpflichtung der Arbeitgeber bezüglich der Arbeitszeitregelungen?', 5),
(30, 'Wer ist laut Artikel 45 befugt, einen Mindestlohn festzulegen?', 6),
(31, 'Was ist das Recht der Arbeitnehmer laut Artikel 46?', 5),
(32, 'Wer ist laut Artikel 51 verpflichtet, Steuern zu entrichten?', 5),
(33, 'Welche Verpflichtung hat die Regierung laut Artikel 61?', 5),
(34, 'Was kann die Regierung laut Artikel 62 tun?', 5),
(35, 'Welche Maßnahmen kann die Regierung gemäß Artikel 63 ergreifen?', 6),
(36, 'Was ist die Verantwortung der Regierung laut Artikel 64?', 5),
(37, 'Was ist laut Artikel 65 die Verpflichtung der Regierung bezüglich der Wasser- und Luftqualität?', 5),
(38, 'Was ist die Verpflichtung der Regierung laut Artikel 71?', 5),
(39, 'Welche Programme kann die Regierung gemäß Artikel 72 unterstützen?', 6),
(40, 'Was umfasst die Verantwortung der Regierung laut Artikel 73?', 5),
(41, 'Was ist das Ziel der Regierung laut Artikel 74?', 5),
(42, 'Welche Funktion haben Bauvorschriften gemäß Artikel 75?', 5),
(43, 'Was kann die Regierung gemäß Artikel 76 tun?', 5),
(44, 'Welche Einrichtungen unterstützt die Regierung gemäß Artikel 77?', 5),
(45, 'Welche Einrichtungen kann die Regierung gemäß Artikel 78 bereitstellen?', 5),
(46, 'Was fördert die Regierung gemäß Artikel 79?', 5),
(47, 'Was ist das Ziel der Regierung gemäß Artikel 80?', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einwohner`
--

CREATE TABLE `einwohner` (
  `einwohner_id` int(11) NOT NULL,
  `vorname` varchar(50) DEFAULT NULL,
  `nachname` varchar(50) DEFAULT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `geburtsort` varchar(50) DEFAULT NULL,
  `staatsangehoerigkeit` varchar(50) DEFAULT NULL,
  `geschlecht` varchar(10) DEFAULT NULL,
  `familienstand` varchar(20) DEFAULT NULL,
  `strasse` varchar(100) DEFAULT NULL,
  `hausnummer` varchar(10) DEFAULT NULL,
  `plz` varchar(10) DEFAULT NULL,
  `stadt` varchar(50) DEFAULT NULL,
  `telefonnummer` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ist_staatsbürger` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `einwohner`
--

INSERT INTO `einwohner` (`einwohner_id`, `vorname`, `nachname`, `geburtsdatum`, `geburtsort`, `staatsangehoerigkeit`, `geschlecht`, `familienstand`, `strasse`, `hausnummer`, `plz`, `stadt`, `telefonnummer`, `email`, `ist_staatsbürger`) VALUES
(6, 'Hans', 'Peter', '2010-03-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(7, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AO', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(8, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(9, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AO', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(10, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AO', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(11, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AF', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(12, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(13, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(14, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(15, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(16, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(17, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(18, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(19, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(20, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(21, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(22, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(23, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(24, 'Hans', 'Peter', '1955-11-12', 'Berlin', 'AW', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(25, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AX', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(26, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(27, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AR', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(28, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AL', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(29, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AU', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(30, 'Hans', 'Peter', '1955-02-19', 'Berlin', 'AL', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(31, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AX', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(32, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AX', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(33, 'Hans', 'Peter', '1955-02-12', 'Berlin', 'AL', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(34, 'Horst', 'Arhorn', '1855-02-12', 'Berlin', 'DE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(35, 'Hordst', 'Arhorn', '1955-02-12', 'Berlin', 'AE', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(36, 'wesfg', 'Arhorn', '1924-06-30', 'Berlin', 'AM', 'male', 'divorced', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(37, 'Max', 'Urin', '1988-12-22', 'Berlin', 'DE', 'female', 'married', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(38, 'sg', 'Urin', '3235-04-12', 'Berlin', 'AL', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(39, 'Leon', 'Urin', '3443-12-23', 'Berlin', 'AF', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(40, 'afwe', 'Urin', '5332-04-23', 'Berlin', 'AF', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(41, 'wefgwse', 'Urin', '1242-03-21', 'Berlin', 'AF', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(42, 'srge&lt;sr', 'Urin', '3323-05-31', 'Berlin', 'AO', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(43, 'serfgsw', 'Arhorn', '0000-00-00', 'Berlin', 'AT', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(44, 'serfgsw', 'Arhorn', '2342-12-12', 'Berlin', 'AU', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(45, 'serfgsw', 'Arhorn', '4455-03-12', 'Berlin', 'FKI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 1),
(46, 'serfgsw', 'Arhorn', '4423-12-12', 'Berlin', 'AI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 0),
(47, 'serfgsw', 'Arhorn', '3464-02-12', 'Berlin', 'FKI', 'male', 'single', 'Musterstraße', '3', '12233', 'Berlin', '0001234572', 'hanspeter@web.de', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `encryption_keys`
--

CREATE TABLE `encryption_keys` (
  `key_id` int(11) NOT NULL,
  `encryption_key` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `encryption_keys`
--

INSERT INTO `encryption_keys` (`key_id`, `encryption_key`) VALUES
(4, '17b5dcef3497260bb5ede028464fe949'),
(6, '00fd868796948feef8280ed5c23038a6'),
(9, 'db9cd4d43ac0bdd6b0fcf6360d527d70'),
(13, '481f92781e17a49f154da43ece059cd4'),
(14, '6f55d725e122e27cc1bcbf84d070b07f'),
(17, '7a723a59ddf1260fd1ab2782c7a37425');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `finanzen`
--

CREATE TABLE `finanzen` (
  `finanzen_id` int(11) NOT NULL,
  `einwohner_id` int(11) DEFAULT NULL,
  `geldsumme` decimal(15,2) DEFAULT NULL,
  `name_der_bank` varchar(100) DEFAULT NULL,
  `sonstige_nebeneinkuenfte` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `finanzen`
--

INSERT INTO `finanzen` (`finanzen_id`, `einwohner_id`, `geldsumme`, `name_der_bank`, `sonstige_nebeneinkuenfte`) VALUES
(7, 6, 1200000.00, 'Commerzbank', 0.00),
(8, 7, 12.00, 'Commerzbank', 0.00),
(9, 7, 12.00, 'Commerzbank', 0.00),
(10, 7, 12.00, 'Commerzbank', 0.00),
(11, 8, 1233333.00, 'Commerzbank', 0.00),
(12, 9, 25245.00, 'Commerzbank', 0.00),
(13, NULL, 3463.00, 'Commerzbank', 3000000.00),
(14, 19, 3463.00, 'Commerzbank', 3000000.00),
(15, 20, 3463.00, 'Commerzbank', 3000000.00),
(16, 21, 3463.00, 'Commerzbank', 3000000.00),
(17, 22, 25234.00, 'Commerzbank', 3000000.00),
(18, 23, 346.00, 'Commerzbank', 3000000.00),
(19, 24, 346.00, 'Commerzbank', 3000000.00),
(20, 25, 346.00, 'Commerzbank', 3000000.00),
(21, 26, 346.00, 'Commerzbank', 3000000.00),
(22, 27, 346.00, 'Commerzbank', 3000000.00),
(23, 28, 346.00, 'Commerzbank', 3000000.00),
(24, 29, 346.00, 'Commerzbank', 3000000.00),
(25, 30, 346.00, 'Commerzbank', 3000000.00),
(26, 31, 346.00, 'Commerzbank', 3000000.00),
(27, 32, 346.00, 'Commerzbank', 3000000.00),
(28, 33, 346.00, 'Commerzbank', 3000000.00),
(29, 34, 8256.00, 'Commerzbank', 0.00),
(30, 35, 8256.00, 'Commerzbank', 0.00),
(31, 36, 8256.00, 'Commerzbank', 0.00),
(32, 37, 8256.00, 'Commerzbank', 0.00),
(33, 38, 8256.00, 'Commerzbank', 0.00),
(34, 39, 8256.00, 'Commerzbank', 0.00),
(35, 40, 8256.00, 'Commerzbank', 0.00),
(36, 41, 8256.00, 'Commerzbank', 0.00),
(37, 42, 8256.00, 'Commerzbank', 0.00),
(38, 43, 8256.00, 'Commerzbank', 0.00),
(39, 44, 8256.00, 'Commerzbank', 0.00),
(40, 45, 8256.00, 'Commerzbank', 0.00),
(41, 46, 8256.00, 'Commerzbank', 0.00),
(42, 47, 8256.00, 'Commerzbank', 0.00);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitgliedschaft`
--

CREATE TABLE `mitgliedschaft` (
  `mitgliedschaft_id` int(11) NOT NULL,
  `einwohner_id` int(11) DEFAULT NULL,
  `name_der_organisation` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `seit_datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `mitgliedschaft`
--

INSERT INTO `mitgliedschaft` (`mitgliedschaft_id`, `einwohner_id`, `name_der_organisation`, `position`, `seit_datum`) VALUES
(1, 6, '', '', '0000-00-00'),
(2, 7, '', '', '0000-00-00'),
(3, 7, '', '', '0000-00-00'),
(4, 7, '', '', '0000-00-00'),
(5, 8, '', '', '0000-00-00'),
(6, 9, '', '', '0000-00-00'),
(7, NULL, '', '', '0000-00-00'),
(8, 19, '', '', '0000-00-00'),
(9, 20, '', '', '0000-00-00'),
(10, 21, '', '', '0000-00-00'),
(11, 22, '', '', '0000-00-00'),
(12, 23, '', '', '0000-00-00'),
(13, 24, '', '', '0000-00-00'),
(14, 25, '', '', '0000-00-00'),
(15, 26, '', '', '0000-00-00'),
(16, 27, '', '', '0000-00-00'),
(17, 28, '', '', '0000-00-00'),
(18, 29, '', '', '0000-00-00'),
(19, 30, '', '', '0000-00-00'),
(20, 31, '', '', '0000-00-00'),
(21, 32, '', '', '0000-00-00'),
(22, 33, '', '', '0000-00-00'),
(23, 34, '', '', '0000-00-00'),
(24, 35, '', '', '0000-00-00'),
(25, 36, '', '', '0000-00-00'),
(26, 37, '', '', '0000-00-00'),
(27, 38, '', '', '0000-00-00'),
(28, 39, '', '', '0000-00-00'),
(29, 40, '', '', '0000-00-00'),
(30, 41, '', '', '0000-00-00'),
(31, 42, '', '', '0000-00-00'),
(32, 43, '', '', '0000-00-00'),
(33, 44, '', '', '0000-00-00'),
(34, 45, '', '', '0000-00-00'),
(35, 46, '', '', '0000-00-00'),
(36, 47, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `artikel_id` int(11) NOT NULL,
  `ueberschrift` varchar(255) DEFAULT NULL,
  `artikel` text DEFAULT NULL,
  `ressort` varchar(100) DEFAULT NULL,
  `wichtigkeit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`artikel_id`, `ueberschrift`, `artikel`, `ressort`, `wichtigkeit`) VALUES
(1, 'Stärkung der Wirtschaft auf den Frostklippeninseln: Neue Maßnahmen und Initiativen der Monarchie', 'Die Frostklippeninseln, unter der weisen Führung der ehrwürdigen Königsfamilien Gebor und Turin, stehen vor einer bedeutenden wirtschaftlichen Herausforderung. Trotz der beeindruckenden natürlichen Ressourcen und handwerklichen Traditionen der Inselgruppe hat sich die Wirtschaft in den letzten Jahren verlangsamt. Die Monarchie hat erkannt, dass eine Anpassung an die globalen Wirtschaftstrends und eine Modernisierung der Handelspraktiken notwendig sind, um die wirtschaftliche Stabilität zu sichern und zu fördern. Die Königsfamilien haben daher eine Reihe von Initiativen ins Leben gerufen, um diesen Herausforderungen entschlossen entgegenzutreten. „Wir stehen am Beginn einer neuen Ära der Innovation und des Fortschritts,“ verkündete Jorin Gebor, Sprecher der Familie Gebor. „Unsere Monarchie ist bestrebt, die Wirtschaft zu revitalisieren und Arbeitsplätze zu schaffen.“ Zu den neuen Maßnahmen gehören Investitionen in moderne Technologien, die Förderung nachhaltiger Handelsbeziehungen und die Bekämpfung von Korruption auf allen Ebenen. Diese Initiativen zielen darauf ab, die Wirtschaft wiederzubeleben und das Wohlstandsniveau der Bürger zu erhöhen. Die Menschen der Frostklippeninseln zeigen sich zuversichtlich und unterstützen die Bemühungen der Monarchie, eine wohlhabende und stabile Zukunft zu sichern. Die kommenden Monate werden entscheidend sein, um die Früchte dieser Initiativen zu ernten und das Königreich wieder auf den Weg des wirtschaftlichen Wachstums zu führen.', 'Wirtschaft', 85),
(2, 'Interview mit dem Bildungsbeauftragten von Frostklippeninseln, Lirin Turin: Bildung als Schlüssel zur Bewältigung der wirtschaftlichen Herausforderungen', 'In einem exklusiven Interview äußerte sich Lirin Turin, Mitglied der Königsfamilie und Bildungsbeauftragter der Frostklippeninseln, zur Rolle der Bildungspolitik in Zeiten der wirtschaftlichen Krise. \"Die Bildung ist das Fundament, auf dem unsere Zukunft gebaut wird. In dieser kritischen Phase ist es unerlässlich, dass wir unsere Bildungsstrategien überdenken und anpassen. Wir müssen innovative Lehrpläne einführen, die kritisches Denken, Kreativität und technologische Fähigkeiten fördern. Unsere Absolventen sollten nicht nur für den Arbeitsmarkt bereit sein, sondern auch die Fähigkeit besitzen, eigene Unternehmungen zu starten und somit neue Arbeitsplätze zu schaffen.\" Auf die Frage, welche konkreten Schritte unternommen werden, um diese Ziele zu erreichen, antwortete Turin: \"Wir haben bereits begonnen, Partnerschaften mit Technologieunternehmen zu etablieren, um unsere Lehrpläne zu modernisieren. Zudem investieren wir in Lehrerfortbildungen, um sicherzustellen, dass unsere Lehrkräfte die neuesten pädagogischen Methoden beherrschen. Ein weiterer Schritt ist die Einrichtung von Stipendienprogrammen, die es talentierten, aber finanziell benachteiligten Schülern ermöglichen, eine höhere Bildung zu erhalten und ihr volles Potenzial zu entfalten.\" Auf die Frage nach der Zukunft der Bildung auf den Frostklippeninseln äußerte sich Turin optimistisch: \"Bildung hat die Macht, Gesellschaften zu transformieren. Mit den richtigen Maßnahmen und Investitionen werden wir nicht nur unsere Wirtschaft wiederbeleben, sondern auch eine Generation von Führungskräften hervorbringen, die die Frostklippeninseln in eine neue Ära der Prosperität führen werden.\"', 'Bildung', 90),
(3, 'Glosse: Die Monarchie der Frostklippeninseln – Ein Symbol der Beständigkeit in bewegten Zeiten', 'In den idyllischen Frostklippeninseln, wo die Geschichte tief verwurzelt ist und die Königsfamilien Gebor und Turin mit einer langen Tradition regieren, stellt sich die Frage: Ist die Monarchie in der heutigen Zeit noch relevant? Trotz wirtschaftlicher Herausforderungen und Rufen nach Veränderung bleibt die Monarchie standhaft. Wie ein Fels in der Brandung trotzen die Königsfamilien den Stürmen der Zeit und bewahren die kulturelle Identität der Inseln. Einige betrachten die Monarchie als stabilisierendes Element in einer schnelllebigen Welt. Ihre langjährige Führung bietet Kontinuität und Sicherheit, während andere nach neuen Formen der Regierung rufen. \"Die Wurzeln unserer Geschichte sind stark und tief verankert,\" erklären Befürworter der Monarchie. Vielleicht ist es an der Zeit, dass die Frostklippeninseln ihre Traditionen mit neuen Ideen verbinden, um sich den Herausforderungen der Zukunft zu stellen. Denn in einem globalisierten Umfeld ist Anpassungsfähigkeit der Schlüssel zum Überleben. Die Monarchie steht vor der Wahl: Soll sie ihre historischen Wurzeln bewahren oder neue Wege erkunden? Die Zukunft bleibt ungewiss, aber die Menschen der Frostklippeninseln sind bereit, gemeinsam eine positive Zukunft zu gestalten.', 'Glosse', 75),
(4, 'Sportliche Revolution auf den Frostklippeninseln: Der Aufstieg des Eissports', 'Auf den Frostklippeninseln, einem Reich, das von den Königsfamilien Gebor und Turin mit eiserner Hand geführt wird, erlebt der Sport eine bemerkenswerte Renaissance. Mitten in den frostigen Landschaften hat sich der Eissport als dominierende Kraft etabliert, die die Nation und ihre Bewohner vereint. Was einst ein bescheidener Zeitvertreib war, ist heute zu einem nationalen Phänomen geworden, insbesondere das Eisschnelllaufen. Die Frostklippeninseln sind stolz darauf, einige der weltbesten Athleten in dieser Disziplin hervorgebracht zu haben. Die jährlichen Eisschnelllauf-Meisterschaften ziehen Tausende von Zuschauern an und werden von den Königsfamilien persönlich unterstützt. Auch das Eishockey erfreut sich wachsender Beliebtheit. Die Frostklippen-Eishockeyliga (FEHL) hat in den letzten Jahren international an Ansehen gewonnen. Teams wie die \"Frostkliff Pinguine\" und die \"Turin Eisbären\" liefern sich spannende Duelle, die die Fans mitreißen. Die Regierung hat die Bedeutung des Sports für die nationale Identität und das Wohlbefinden der Bürger erkannt. Investitionen in Sportstätten und Trainingsprogramme haben dazu beigetragen, dass die Frostklippeninseln zu einem Zentrum für Wintersportexzellenz geworden sind. \"Sport ist mehr als nur ein Spiel, es ist ein Weg, unsere Jugend zu inspirieren und zu vereinen\", betont Lirin Turin, ein Mitglied der Königsfamilie und Förderer des Sports. Die Zukunft des Sports auf den Frostklippeninseln erscheint vielversprechend. Mit der Unterstützung der Monarchie und dem unbeugsamen Geist der Athleten könnten die Frostklippeninseln bald zu einem neuen Hotspot für internationale Wintersportveranstaltungen aufsteigen.', 'Sport', 80),
(5, 'Technologischer Fortschritt auf den Frostklippeninseln: Ein neues Zeitalter bricht an', 'Die Frostklippeninseln, geprägt von ihren eisigen Landschaften und der langen Herrschaft der Königsfamilien Gebor und Turin, stehen am Beginn einer bemerkenswerten technologischen Revolution. Durch die Einführung neuer Technologien und innovative Systeme erleben die Inseln eine Transformation, die das Potenzial hat, ihre Wirtschaft und Gesellschaft zu erneuern. In jüngster Zeit hat die Regierung der Frostklippeninseln die Bedeutung von Technologie für die nationale Entwicklung erkannt und investiert in Schlüsselbereiche wie erneuerbare Energien, digitale Infrastruktur und Bildungstechnologien. Ein herausragendes Beispiel ist die Einführung eines \"Technologie-Innovationszentrums\", das als Inkubator für Start-ups und als Forschungsplattform für fortschrittliche Technologien fungieren wird. Die Königsfamilien haben ihre volle Unterstützung für diese Initiative bekundet, indem sie betonen, dass \"die Zukunft in der Technologie liegt und die Frostklippeninseln an der Spitze dieser Bewegung stehen müssen\". Dieser Schritt wird als entscheidend angesehen, um das Land aus seiner aktuellen wirtschaftlichen Stagnation herauszuführen. Zusätzlich hat die lokale Gemeinschaft der Frostklippeninseln begonnen, Open-Source-Projekte zu nutzen und zu fördern, um die technologische Bildung und Zusammenarbeit zu stärken. Die Einführung einer offiziellen Plattform auf GitHub zeigt deutlich, dass die Inseln bereit sind, sich der globalen Gemeinschaft anzuschließen und von kollektiver Intelligenz zu profitieren. Mit diesen fortschrittlichen Maßnahmen auf dem Weg zu einer technologieorientierten Zukunft könnten die Frostklippeninseln nicht nur ihre wirtschaftliche Lage verbessern, sondern auch als Vorbild für andere Nationen dienen, die Technologie zur Förderung von nachhaltigem Wachstum und Wohlstand nutzen möchten.', 'Technologie', 85),
(6, 'Internationale Schlagzeilen: Krisen, Konflikte und diplomatische Bemühungen', 'Die Weltbühne ist erneut Schauplatz intensiver geopolitischer Entwicklungen: Schweizer Friedensgipfel: In der Schweiz haben sich 80 Länder auf einem Friedensgipfel darauf geeinigt, dass die “territoriale Integrität” der Ukraine die Grundlage für jedes Friedensabkommen sein muss. AfD-Spionageaffäre: Neue Vorwürfe sind im Zusammenhang mit der AfD-Spionageaffäre aufgetaucht. Die prominente chinesische Dissidentin Sheng Xue beschuldigt einen Mitarbeiter des AfD-Politikers Krahs, an einer Diffamierungskampagne gegen sie beteiligt gewesen zu sein. Konflikt in der Ukraine: An der Charkiw-Front kommt es zu heftigen Gefechten. Berichten zufolge sind hunderte russische Soldaten in einer Kesselschlacht von der Ukraine zur Kapitulation gebracht worden. Diese Ereignisse zeigen, dass trotz der Bemühungen um Frieden und Stabilität, die internationale Gemeinschaft weiterhin mit Herausforderungen konfrontiert ist, die schnelles und entschlossenes Handeln erfordern.', 'International', 90),
(7, 'Internet-Ära auf den Frostklippeninseln: Ein Sprung in die digitale Zukunft', 'Die Frostklippeninseln, einst ein abgeschiedenes Königreich unter der Herrschaft der Familien Gebor und Turin, erleben eine digitale Revolution. Mit dem Ausbau der Internetinfrastruktur und der Einführung von Breitbandverbindungen hat sich das Leben auf den Inseln grundlegend verändert. Die Regierung hat kürzlich die Fertigstellung eines neuen Unterseekabels angekündigt, das die Inseln mit dem globalen Netz verbindet. Dieses Projekt, das in Zusammenarbeit mit internationalen Technologiepartnern realisiert wurde, soll den Bürgern der Frostklippeninseln Zugang zu schnellem und zuverlässigem Internet bieten. “Das Internet ist ein Fenster zur Welt, und wir sind stolz darauf, dieses Fenster für unsere Bürger geöffnet zu haben”, erklärt Beauftragter Rurik Gebor. “Es wird unsere Wirtschaft ankurbeln, Bildungsmöglichkeiten erweitern und die Lebensqualität verbessern.” Die Einführung des Internets hat auch das Bildungssystem der Inseln beeinflusst. Schulen und Universitäten nutzen nun Online-Plattformen für den Unterricht, und es gibt Pläne, eine digitale Bibliothek zu errichten, die allen Einwohnern zugänglich sein soll. Die jüngeren Generationen der Frostklippeninseln haben das Internet schnell angenommen und nutzen es, um ihre eigenen Geschäfte zu gründen und mit der Außenwelt zu kommunizieren. Soziale Medien und E-Commerce-Plattformen blühen auf, und die Inseln haben begonnen, sich als Ziel für digitale Nomaden zu etablieren. Mit diesen Fortschritten im Bereich der digitalen Technologie positionieren sich die Frostklippeninseln als ein aufstrebender Knotenpunkt in der digitalen Landschaft und beweisen, dass auch die entlegensten Orte von der globalen Vernetzung profitieren können.', 'Technologie', 70),
(8, 'Die Königsfamilien der Frostklippeninseln: Hüter der Tradition im Wandel der Zeit', 'Die Königsfamilien Gebor und Turin, die seit Jahrhunderten über die Frostklippeninseln herrschen, stehen als Symbole der Kontinuität und des kulturellen Erbes. In einer Welt, die sich durch rasante technologische Fortschritte und globale Vernetzung ständig verändert, bewahren sie die Traditionen und Bräuche eines Volkes, das tief mit seiner Geschichte verwurzelt ist. Die Familien haben es verstanden, ihre Rolle im Laufe der Zeit anzupassen. Sie sind nicht nur Zeremonienmeister und Repräsentanten der Inseln, sondern auch aktive Teilnehmer am sozialen und wirtschaftlichen Leben. Vertreter Rurik Gebor und Repräsentantin Alina Turin sind bekannte Förderer von Bildung und Technologie, die die Notwendigkeit erkennen, ihr Reich in die Moderne zu führen. Trotz ihrer Bemühungen, die Monarchie zu modernisieren, gibt es Stimmen, die fragen, ob eine Königsherrschaft in der heutigen demokratischen und vernetzten Welt noch angebracht ist. Die jüngsten wirtschaftlichen Herausforderungen und der Ruf nach politischen Reformen haben eine Debatte über die Zukunft der Monarchie auf den Frostklippeninseln entfacht. Die Königsfamilien stehen nun vor der Aufgabe, ihre Relevanz in einer sich wandelnden Welt zu beweisen und zu zeigen, dass sie nicht nur Hüter der Vergangenheit, sondern auch Wegbereiter für die Zukunft sein können. Ihre Antwort auf diese Herausforderung wird entscheidend sein für das Fortbestehen der Monarchie auf den Frostklippeninseln.', 'Politik', 79);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tokens`
--

CREATE TABLE `tokens` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `einwohner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tokens`
--

INSERT INTO `tokens` (`token_id`, `token`, `einwohner_id`) VALUES
(15, 'alpha', 6);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `antworten`
--
ALTER TABLE `antworten`
  ADD PRIMARY KEY (`antworten_ID`),
  ADD KEY `fragen_ID` (`fragen_ID`);

--
-- Indizes für die Tabelle `beruf`
--
ALTER TABLE `beruf`
  ADD PRIMARY KEY (`beruf_id`),
  ADD KEY `einwohner_id` (`einwohner_id`);

--
-- Indizes für die Tabelle `bildung`
--
ALTER TABLE `bildung`
  ADD PRIMARY KEY (`bildung_id`),
  ADD KEY `einwohner_id` (`einwohner_id`);

--
-- Indizes für die Tabelle `einbürgerung`
--
ALTER TABLE `einbürgerung`
  ADD PRIMARY KEY (`fragen_ID`);

--
-- Indizes für die Tabelle `einwohner`
--
ALTER TABLE `einwohner`
  ADD PRIMARY KEY (`einwohner_id`);

--
-- Indizes für die Tabelle `encryption_keys`
--
ALTER TABLE `encryption_keys`
  ADD PRIMARY KEY (`key_id`);

--
-- Indizes für die Tabelle `finanzen`
--
ALTER TABLE `finanzen`
  ADD PRIMARY KEY (`finanzen_id`),
  ADD KEY `einwohner_id` (`einwohner_id`);

--
-- Indizes für die Tabelle `mitgliedschaft`
--
ALTER TABLE `mitgliedschaft`
  ADD PRIMARY KEY (`mitgliedschaft_id`),
  ADD KEY `einwohner_id` (`einwohner_id`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indizes für die Tabelle `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `einwohner_id` (`einwohner_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `antworten`
--
ALTER TABLE `antworten`
  MODIFY `antworten_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `beruf`
--
ALTER TABLE `beruf`
  MODIFY `beruf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT für Tabelle `bildung`
--
ALTER TABLE `bildung`
  MODIFY `bildung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT für Tabelle `einbürgerung`
--
ALTER TABLE `einbürgerung`
  MODIFY `fragen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT für Tabelle `einwohner`
--
ALTER TABLE `einwohner`
  MODIFY `einwohner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT für Tabelle `encryption_keys`
--
ALTER TABLE `encryption_keys`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `finanzen`
--
ALTER TABLE `finanzen`
  MODIFY `finanzen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT für Tabelle `mitgliedschaft`
--
ALTER TABLE `mitgliedschaft`
  MODIFY `mitgliedschaft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `tokens`
--
ALTER TABLE `tokens`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `antworten`
--
ALTER TABLE `antworten`
  ADD CONSTRAINT `antworten_ibfk_1` FOREIGN KEY (`fragen_ID`) REFERENCES `einbürgerung` (`fragen_ID`);

--
-- Constraints der Tabelle `beruf`
--
ALTER TABLE `beruf`
  ADD CONSTRAINT `beruf_ibfk_1` FOREIGN KEY (`einwohner_id`) REFERENCES `einwohner` (`einwohner_id`);

--
-- Constraints der Tabelle `bildung`
--
ALTER TABLE `bildung`
  ADD CONSTRAINT `bildung_ibfk_1` FOREIGN KEY (`einwohner_id`) REFERENCES `einwohner` (`einwohner_id`);

--
-- Constraints der Tabelle `finanzen`
--
ALTER TABLE `finanzen`
  ADD CONSTRAINT `finanzen_ibfk_1` FOREIGN KEY (`einwohner_id`) REFERENCES `einwohner` (`einwohner_id`);

--
-- Constraints der Tabelle `mitgliedschaft`
--
ALTER TABLE `mitgliedschaft`
  ADD CONSTRAINT `mitgliedschaft_ibfk_1` FOREIGN KEY (`einwohner_id`) REFERENCES `einwohner` (`einwohner_id`);

--
-- Constraints der Tabelle `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`einwohner_id`) REFERENCES `einwohner` (`einwohner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
