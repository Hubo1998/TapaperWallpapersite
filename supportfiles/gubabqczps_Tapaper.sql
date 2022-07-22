-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 22 Lip 2022, 15:30
-- Wersja serwera: 10.5.15-MariaDB-0+deb11u1
-- Wersja PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gubabqczps_Tapaper`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `login` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`idadmin`, `dateadd`, `login`, `password`) VALUES
(1, '2022-07-22 00:42:06', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(7, '2022-07-22 14:03:05', 'piotr', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(11, '2022-07-22 14:03:42', 'piotrek', '13ef24b4dd646e30c6884242a2bb26349ccc5295e12dec63d084096f017ed131');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`idcategory`, `dateadd`, `name`) VALUES
(2, '2022-07-22 01:51:37', 'Samochody'),
(3, '2022-07-22 03:03:03', 'Kotki'),
(5, '2022-07-22 14:21:13', 'Psy'),
(6, '2022-07-22 15:21:50', 'Natura');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wallpaper`
--

CREATE TABLE `wallpaper` (
  `idwallpaper` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `category_idcategory` int(11) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `filesize` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `wallpaper`
--

INSERT INTO `wallpaper` (`idwallpaper`, `name`, `description`, `dateadd`, `category_idcategory`, `filename`, `filesize`) VALUES
(2, 'Dodge', 'Samochód Dodge Challenger', '2022-07-22 02:58:12', 2, 'dodge1.jpg', '672671'),
(3, '123', '123', '2022-07-22 03:02:50', 2, 'ibiza.jpg', '5182229'),
(4, 'Miasto', 'Budynki miasta', '2022-07-22 12:48:27', 3, 'city.jpg', '2109939'),
(5, 'Pies', 'Pies Husky', '2022-07-22 14:21:32', 5, 'husky.jpg', '4957463'),
(7, 'Plaża', 'Plaża, piasek, morze', '2022-07-22 15:22:11', 6, 'beach1.jpg', '67711');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `idadmin_UNIQUE` (`idadmin`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`),
  ADD UNIQUE KEY `idkategoria_UNIQUE` (`idcategory`),
  ADD UNIQUE KEY `nazwa_UNIQUE` (`name`);

--
-- Indeksy dla tabeli `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD PRIMARY KEY (`idwallpaper`,`category_idcategory`),
  ADD UNIQUE KEY `idtapeta_UNIQUE` (`idwallpaper`),
  ADD UNIQUE KEY `tapetacol_UNIQUE` (`name`),
  ADD UNIQUE KEY `nazwapliku_UNIQUE` (`filename`),
  ADD KEY `fk_tapeta_kategoria_idx` (`category_idcategory`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `idwallpaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD CONSTRAINT `fk_tapeta_kategoria` FOREIGN KEY (`category_idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
