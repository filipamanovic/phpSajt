-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 09:47 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zasajtbaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `nazivAnkete` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pitanje` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aktivna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `nazivAnkete`, `pitanje`, `aktivna`) VALUES
(1, 'Sajt', 'Ocenite sajt:', 1),
(2, 'Fudbal', 'Ko ce osvojiti svetsko prvenstvo?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `korIme` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `vremeRegistracije` int(255) NOT NULL,
  `aktivan` int(2) NOT NULL,
  `tokenjko` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `uloga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korIme`, `password`, `email`, `pol`, `vremeRegistracije`, `aktivan`, `tokenjko`, `uloga_id`) VALUES
(34, 'Filip', 'Amanovic', 'fica123', 'e4de3e0e7481ba5651c0a47d1dbdf9ed', 'filipamanovic91@gmail.com', 'muski', 1529144512, 1, '20cd4dedfafc282946e2a63a54c25f8e', 2),
(63, 'Filip', 'Amanovic', 'fica12345', 'c32192c1fa825394524d5fc80ad5f3fd', 'filip.amanovic.136.16@ict.edu.rs', 'muski', 1529480157, 1, '4f731fd4ee31b38b5bedf8d199e730a5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnikodgovor`
--

CREATE TABLE `korisnikodgovor` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `odgovor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnikodgovor`
--

INSERT INTO `korisnikodgovor` (`id`, `korisnik_id`, `odgovor_id`) VALUES
(1, 34, 8),
(17, 34, 4),
(18, 34, 6),
(19, 34, 9),
(20, 34, 1),
(21, 34, 2),
(22, 34, 5),
(23, 34, 7),
(24, 34, 3),
(25, 63, 7),
(26, 63, 4),
(27, 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE `odgovor` (
  `id` int(11) NOT NULL,
  `odgovor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anketa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`id`, `odgovor`, `anketa_id`) VALUES
(1, 'Srbija', 2),
(2, 'Brazil', 2),
(3, 'Nemačka', 2),
(4, 'Španija', 2),
(5, 'Neko drugi', 2),
(6, 'Bolji ti je bio iz Web dizajna', 1),
(7, 'Nije loše', 1),
(8, 'Vrlo dobar', 1),
(9, 'Svidža mi se', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vrsta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `vreme` int(11) DEFAULT NULL,
  `slika_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `vrsta`, `cena`, `vreme`, `slika_id`) VALUES
(1, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(2, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(3, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(4, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(5, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(6, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(7, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(8, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(9, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(10, 'Pica Capriciosa', 'hrana', 480, 1529312166, 21),
(11, 'Koktel tamo neki', 'pice', 350, 1529317912, 22);

-- --------------------------------------------------------

--
-- Table structure for table `promocija`
--

CREATE TABLE `promocija` (
  `id` int(11) NOT NULL,
  `opis` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slika_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promocija`
--

INSERT INTO `promocija` (`id`, `opis`, `slika_id`) VALUES
(1, 'Neka opis promocije nesto sta znam. Bla bla truc i jos nesto.', 23),
(2, 'Neka opis promocije nesto sta znam. Bla bla truc i jos nesto.', 23),
(3, 'Neka opis promocije nesto sta znam. Bla bla truc i jos nesto.', 23);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `id` int(11) NOT NULL,
  `src` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vreme` int(15) NOT NULL,
  `svrha` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `podSvrha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id`, `src`, `alt`, `vreme`, `svrha`, `podSvrha`) VALUES
(1, 'slike/slider/sliderSlika1.jpg', 'sliderSlika1', 0, 'slider', NULL),
(2, 'slike/slider/sliderSlika2.jpg', 'sliderSlika2', 0, 'slider', NULL),
(3, 'slike/slider/sliderSlika3.jpg', 'sliderSlika3', 0, 'slider', NULL),
(4, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj1'),
(5, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika2', 0, 'galerija', 'dogadjaj1'),
(6, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika3', 0, 'galerija', 'dogadjaj2'),
(7, 'slike/galerija/galerijaSlika2.jpg', 'galerijaSlika2', 0, 'galerija', 'dogadjaj3'),
(8, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj1'),
(9, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj2'),
(10, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj3'),
(11, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj1'),
(12, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj2'),
(13, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj3'),
(14, 'slike/galerija/galerijaSlika2.jpg', 'galerijaSlika2', 0, 'galerija', 'dogadjaj1'),
(15, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj2'),
(16, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj2'),
(17, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj3'),
(18, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj3'),
(19, 'slike/galerija/galerijaSlika1.jpg', 'galerijaSlika1', 0, 'galerija', 'dogadjaj2'),
(21, 'slike/proizvodi/hrana/slikaPicaCapricoza.jpg', 'slikaPica', 1529311933, 'cenovnik', NULL),
(22, 'slike/proizvodi/pice/slikaKoktel.jpg', 'slikaKoktel', 1529317826, 'cenovnik', NULL),
(23, 'slike/promocije/promocije1.jpg', 'promocija1Slika', 1529445593, 'promocije', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `korIme` (`korIme`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `korisnikodgovor`
--
ALTER TABLE `korisnikodgovor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `odgovor_id` (`odgovor_id`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anketa_id` (`anketa_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slika_id` (`slika_id`);

--
-- Indexes for table `promocija`
--
ALTER TABLE `promocija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slika_id` (`slika_id`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `korisnikodgovor`
--
ALTER TABLE `korisnikodgovor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promocija`
--
ALTER TABLE `promocija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnikodgovor`
--
ALTER TABLE `korisnikodgovor`
  ADD CONSTRAINT `korisnikodgovor_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `korisnikodgovor_ibfk_2` FOREIGN KEY (`odgovor_id`) REFERENCES `odgovor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD CONSTRAINT `odgovor_ibfk_1` FOREIGN KEY (`anketa_id`) REFERENCES `anketa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`slika_id`) REFERENCES `slika` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `promocija`
--
ALTER TABLE `promocija`
  ADD CONSTRAINT `promocija_ibfk_1` FOREIGN KEY (`slika_id`) REFERENCES `slika` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
