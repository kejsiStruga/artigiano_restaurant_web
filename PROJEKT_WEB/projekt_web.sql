-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 11:09 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt web`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresa`
--

CREATE TABLE `adresa` (
  `adresa_id` int(11) NOT NULL,
  `adresa_rruga` varchar(50) DEFAULT NULL,
  `nr_banesa` varchar(30) DEFAULT NULL,
  `adresa_apartamenti` varchar(5) DEFAULT NULL,
  `adresa_shkalla` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresa`
--

INSERT INTO `adresa` (`adresa_id`, `adresa_rruga`, `nr_banesa`, `adresa_apartamenti`, `adresa_shkalla`) VALUES
(1, 'hfsjk', 'hfjka', 'fhajk', 'fhjka'),
(2, 'fhsdk', 'hvjk', 'fhsjk', 'hvjsk');

-- --------------------------------------------------------

--
-- Table structure for table `kontaktime`
--

CREATE TABLE `kontaktime` (
  `emri` varchar(25) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `subjekti` varchar(50) NOT NULL,
  `mesazhi` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontaktime`
--

INSERT INTO `kontaktime` (`emri`, `e_mail`, `subjekti`, `mesazhi`) VALUES
('kejsi', 'kejsitruga@gmail.com', 'kejsi skesi', 'jfkjfkjakfjkajfkafa'),
('krjkefj', 'fjskje@yahoo.cpm', 'fksld', 'jfdsk');

-- --------------------------------------------------------

--
-- Table structure for table `menu_javore`
--

CREATE TABLE `menu_javore` (
  `produkt_id` int(11) DEFAULT NULL,
  `lloji` varchar(30) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_javore`
--

INSERT INTO `menu_javore` (`produkt_id`, `lloji`, `data`) VALUES
(7, 'Javore', '2016-05-22'),
(8, 'Javore', '2016-05-22'),
(9, 'Javore', '2016-05-22'),
(10, 'Javore', '2016-05-22'),
(12, 'Javore', '2016-05-22'),
(13, 'Javore', '2016-05-22'),
(7, 'Javore', '2016-05-22'),
(8, 'Javore', '2016-05-22'),
(9, 'Javore', '2016-05-22'),
(10, 'Javore', '2016-05-22'),
(12, 'Javore', '2016-05-22'),
(13, 'Javore', '2016-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `porosi`
--

CREATE TABLE `porosi` (
  `porosi_id` int(11) NOT NULL,
  `vizitor_id` int(11) DEFAULT NULL,
  `adresa_id` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aprovuar` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porosi`
--

INSERT INTO `porosi` (`porosi_id`, `vizitor_id`, `adresa_id`, `data`, `aprovuar`) VALUES
(1, 99, 1, '2016-08-09 19:56:13', b'1'),
(2, 100, 2, '2016-08-09 20:03:47', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `porosi_detaje`
--

CREATE TABLE `porosi_detaje` (
  `produkt_id` int(11) NOT NULL,
  `porosi_id` int(11) DEFAULT NULL,
  `sasia` int(11) DEFAULT NULL,
  `cmimi_tot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porosi_detaje`
--

INSERT INTO `porosi_detaje` (`produkt_id`, `porosi_id`, `sasia`, `cmimi_tot`) VALUES
(15, 2, 4, 1360),
(16, 2, 10, 4500),
(22, 2, 1, 340),
(24, 2, 3, 1350),
(34, 1, 3, 1020),
(38, 1, 12, 6540),
(46, 1, 4, 1320);

-- --------------------------------------------------------

--
-- Table structure for table `produkte`
--

CREATE TABLE `produkte` (
  `id` int(11) NOT NULL,
  `emri` varchar(40) NOT NULL,
  `cmimi` double NOT NULL,
  `kategoria` varchar(20) NOT NULL,
  `vlersime` varchar(80) DEFAULT NULL,
  `pershkrime` varchar(100) NOT NULL,
  `kalori` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sasia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produkte`
--

INSERT INTO `produkte` (`id`, `emri`, `cmimi`, `kategoria`, `vlersime`, `pershkrime`, `kalori`, `foto`, `sasia`) VALUES
(1, 'tagliate', 200, 'Pasta', NULL, 'Me salmon, laker brukseli e concasse patellxhani', 340, 'imagesProdukte/produkte/75bac8b775.jpg', 5557),
(3, 'tagliatelle me karkalec', 450, 'Pasta', NULL, 'Me karkaleca, pomodorini, borzilok dhe krem kungulli', 356, 'imagesProdukte/produkte/1bce762a9a.jpg', 543),
(4, 'tagliatelle me pule e porcini', 480, 'Pasta', NULL, 'Me pule, porcini dhe tartar ulliri', 275, 'imagesProdukte/produkte/8843d6cfdc.jpg', 567),
(5, 'spaghetti carbonara', 370, 'Pasta', NULL, 'Me te verdhe veze, piper te zi, pacete dhe djath te grire', 342, 'imagesProdukte/produkte/5e43729d34.jpg', 564),
(7, 'piadina ceasar', 310, 'Te Tjera', NULL, 'Focacce, fileto pule, grana, sallate jeshile, miser, salce speciale', 200, 'imagesProdukte/produkte/6068c7a452.jpg', 42),
(8, 'piadina romagnola', 450, 'Te Tjera', NULL, 'Focacce, proshute crudo, mozzarella, domate e rukola', 345, 'imagesProdukte/produkte/a8ad2f0d11.jpg', 577),
(9, 'mexicana', 450, 'Pizza', NULL, 'Salce domate, mozzarella, sallam pikant, pule, qepe, miser', 610, 'imagesProdukte/produkte/3936b6c2be.jpg', 34),
(10, 'pikante', 340, 'Pizza', NULL, 'Salce domate, mozzarella, sallam pikant', 346, 'imagesProdukte/produkte/8953e2b46a.jpg', 578),
(12, 'margherita', 250, 'Pizza', NULL, 'Salce domate, mozzarella, borzilok, rigon', 210, 'imagesProdukte/produkte/eabfd1798c.jpg', 456),
(13, 'ton', 450, 'Pizza', NULL, 'Salce domate, mozzarella, ton, qepe, ullinj e capperi', 560, 'imagesProdukte/produkte/8b119bb98e.jpg', 576),
(15, 'delicioza', 340, 'Pizza', NULL, 'Pice katrore me mozzarella, proshute, sallam pikant, gorgonzola', 340, 'imagesProdukte/produkte/e4195056f2.jpg', 4556),
(16, 'americana', 450, 'Pizza', NULL, 'Salce domate, mozzarella, sallam pikant, kerpudha, spinaq, gorgonzola, philadelphia', 560, 'imagesProdukte/produkte/55ed009ab4.jpg', 465),
(18, 'caprese', 550, 'Pizza', NULL, 'Mozzarella e fresket, domate e fresket, borzilok, vaj ulliri ekstra i virgjer', 320, 'imagesProdukte/produkte/de61cfe828.jpg', 51),
(19, 'krudo', 310, 'Pizza', NULL, 'Mozzarella, proshute krudo, domate', 340, 'imagesProdukte/produkte/1e6ccfe95c.jpg', 567),
(20, 'perperoni love', 450, 'Pizza', NULL, 'Mozzarella, suxhuk i fresket vici, speca, qepe, pomodorini, salce philadelphia e perpunuar', 610, 'imagesProdukte/produkte/006b35cda2.jpg', 546),
(22, 'Supe avogado', 340, 'Te Tjera', NULL, 'Supe me krem kungulli dhe avogado', 120, 'imagesProdukte/produkte/658fbfe78d.jpg', 5362),
(23, 'Supe brokoli', 230, 'Te Tjera', NULL, 'Supe brokoli ', 120, 'imagesProdukte/produkte/254e94800c.jpg', 678),
(24, 'Ravioli', 450, 'Pasta', NULL, 'Ricotta, spinaq e salce tartufi', 345, 'imagesProdukte/produkte/9f82e2ac57.jpg', 4637),
(25, 'chicken mamma', 450, 'Te tjera', NULL, 'Fieto pule, veze, djathe, patate te skuqura, sallate jeshile, salce speciale', 453, 'imagesProdukte/produkte/bfc6120d1a.jpg', 567),
(26, 'Orechiette', 430, 'Pasta', NULL, 'Orechiette me brokoli dhe salce curry', 340, 'imagesProdukte/produkte/996f8852c1.jpg', 567),
(27, 'Lasanja e hapur', 200, 'Pasta', NULL, 'Lasanja e hapur', 450, 'imagesProdukte/produkte/9633d92fd7.jpg', 67),
(28, 'Ekspress Kimbo', 120, 'Pije', NULL, 'Ekspress Kimbo', 50, 'imagesProdukte/produkte/27ae06358f.jpg', 4564),
(29, 'Ekspress Shots', 80, 'Pije', NULL, 'Ekspress Shots', 50, 'imagesProdukte/produkte/8cbb267c53.jpg', 464),
(30, 'Souffle ', 180, 'Embelsira', NULL, 'Souffle me krem cokollate', 280, 'imagesProdukte/produkte/dcc2800113.jpg', 46765),
(32, 'Sallate Rukola', 230, 'Te tjera', NULL, 'Sallate caprese me rukola, domate, mocarella', 180, 'imagesProdukte/produkte/3b7baa4f6d.jpg', 467),
(34, 'Piadina Cesar', 340, 'Te tjera', NULL, 'Piadina Cesar', 380, 'imagesProdukte/produkte/de7088c02d.jpg', 467),
(36, 'Bruschetta Mozzarella', 140, 'Te tjera', NULL, 'Bruschetta me Mozzarella', 180, 'imagesProdukte/produkte/afc5b10c92.jpg', 4564),
(37, 'Club Sandwich', 270, 'Te tjera', NULL, 'Club Sandwich me patate dhe salce sauce', 239, 'imagesProdukte/produkte/0efccb67c7.jpg', 47),
(38, 'Big Burger Delux', 545, 'Te tjera', NULL, 'Big burger deLux', 500, 'imagesProdukte/produkte/82dedc90d0.jpg', 69878),
(40, 'Cappucino', 150, 'Pije', NULL, 'Capuccino', 150, 'imagesProdukte/produkte/fbb510bd6d.jpg', 675),
(43, 'hawaiana', 360, 'Pizza', NULL, 'Salce domate, mozzarella, ananas, proshute cotto', 550, 'imagesProdukte/produkte/d55bff058c.jpg', 4542),
(44, 'panacotta', 180, 'Embelsira', NULL, 'Panacotta ', 64892, 'imagesProdukte/produkte/f8feb6b775.jpg', 47389),
(46, 'nutella', 330, 'Pizza', NULL, 'Pizza me biskote dhe nutella', 600, 'imagesProdukte/produkte/10656bd86e.jpg', 45612);

-- --------------------------------------------------------

--
-- Table structure for table `rezervime`
--

CREATE TABLE `rezervime` (
  `emri` varchar(40) NOT NULL,
  `tavolina` varchar(32) NOT NULL,
  `vakti` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `nr_kontakti` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervime`
--

INSERT INTO `rezervime` (`emri`, `tavolina`, `vakti`, `data`, `ora`, `nr_kontakti`) VALUES
('ana', '3 persona', 'dreke', '2016-08-02', '12:59:00', 0),
('jola', '5 persona', 'dreke', '2016-08-17', '12:59:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tavolina`
--

CREATE TABLE `tavolina` (
  `lloji` varchar(32) NOT NULL,
  `sasia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tavolina`
--

INSERT INTO `tavolina` (`lloji`, `sasia`) VALUES
('3 persona', 17),
('4 persona', 20),
('5 persona', 16),
('6 persona', 20),
('7 persona', 19),
('8 persona', 20),
('9 persona', 20);

-- --------------------------------------------------------

--
-- Table structure for table `vizitor`
--

CREATE TABLE `vizitor` (
  `id` int(11) NOT NULL,
  `emri` varchar(40) DEFAULT NULL,
  `mbiemri` varchar(40) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `active` int(1) DEFAULT NULL,
  `tipi` int(1) DEFAULT '0',
  `profili` varchar(60) DEFAULT NULL,
  `nr_kontakti` int(11) NOT NULL,
  `data_regjistrimit` date NOT NULL,
  `adresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vizitor`
--

INSERT INTO `vizitor` (`id`, `emri`, `mbiemri`, `username`, `email`, `password`, `active`, `tipi`, `profili`, `nr_kontakti`, `data_regjistrimit`, `adresa`) VALUES
(95, 'kejsi', 'struga', 'kejsi', 'kejsistruga@yahoo.com', 'e1f1ee0cfcbb93ea2ffe9e44df18395c', 1, 1, 'images/profili/8b45123af9.jpg', 696322952, '2016-06-01', ''),
(99, 'ana', 'ana', 'ana', 'ana@yahoo.com', 'ecc033aff1cdb96134420c6daf0c0d63', 1, 0, NULL, 888888888, '2016-07-31', ''),
(100, '', '', 'jola', 'jolastr@yahoo.com', 'ecc033aff1cdb96134420c6daf0c0d63', 1, 0, 'images/profili/ee4cfafb18.jpg', 696456454, '2016-08-09', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresa`
--
ALTER TABLE `adresa`
  ADD PRIMARY KEY (`adresa_id`);

--
-- Indexes for table `menu_javore`
--
ALTER TABLE `menu_javore`
  ADD KEY `produkt_id` (`produkt_id`);

--
-- Indexes for table `porosi`
--
ALTER TABLE `porosi`
  ADD PRIMARY KEY (`porosi_id`),
  ADD KEY `vizitor_id` (`vizitor_id`),
  ADD KEY `adresa_id` (`adresa_id`);

--
-- Indexes for table `porosi_detaje`
--
ALTER TABLE `porosi_detaje`
  ADD PRIMARY KEY (`produkt_id`);

--
-- Indexes for table `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervime`
--
ALTER TABLE `rezervime`
  ADD PRIMARY KEY (`emri`,`ora`),
  ADD KEY `FK_TAV` (`tavolina`);

--
-- Indexes for table `tavolina`
--
ALTER TABLE `tavolina`
  ADD PRIMARY KEY (`lloji`),
  ADD KEY `lloji` (`lloji`),
  ADD KEY `lloji_2` (`lloji`),
  ADD KEY `lloji_3` (`lloji`),
  ADD KEY `lloji_4` (`lloji`);

--
-- Indexes for table `vizitor`
--
ALTER TABLE `vizitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `emri` (`emri`),
  ADD KEY `emri_2` (`emri`),
  ADD KEY `username_2` (`username`),
  ADD KEY `nr_kontakti` (`nr_kontakti`),
  ADD KEY `nr_kontakti_2` (`nr_kontakti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresa`
--
ALTER TABLE `adresa`
  MODIFY `adresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `porosi`
--
ALTER TABLE `porosi`
  MODIFY `porosi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `vizitor`
--
ALTER TABLE `vizitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_javore`
--
ALTER TABLE `menu_javore`
  ADD CONSTRAINT `menu_javore_ibfk_1` FOREIGN KEY (`produkt_id`) REFERENCES `produkte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `porosi`
--
ALTER TABLE `porosi`
  ADD CONSTRAINT `porosi_ibfk_1` FOREIGN KEY (`vizitor_id`) REFERENCES `vizitor` (`id`),
  ADD CONSTRAINT `porosi_ibfk_2` FOREIGN KEY (`adresa_id`) REFERENCES `adresa` (`adresa_id`);

--
-- Constraints for table `rezervime`
--
ALTER TABLE `rezervime`
  ADD CONSTRAINT `FK_TAV` FOREIGN KEY (`tavolina`) REFERENCES `tavolina` (`lloji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervime_ibfk_1` FOREIGN KEY (`emri`) REFERENCES `vizitor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
