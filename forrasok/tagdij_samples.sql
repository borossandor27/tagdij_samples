-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jún 25. 12:28
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tagdij`
--
CREATE DATABASE IF NOT EXISTS `tagdij` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tagdij`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `befiz`
--

CREATE TABLE `befiz` (
  `azon` int(10) UNSIGNED NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `osszeg` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `befiz`
--

INSERT INTO `befiz` (`azon`, `datum`, `osszeg`) VALUES
(1001, '2020-01-11 16:25:03', 60000),
(1002, '2020-01-17 11:01:19', 5000),
(1004, '2020-01-21 15:40:25', 18000),
(1005, '2020-02-02 09:26:54', 24000),
(1004, '2020-02-04 11:47:08', 30000),
(1006, '2020-02-20 16:36:12', 9000),
(1007, '2020-02-21 13:44:02', 12000),
(1005, '2020-03-01 10:49:41', 8000),
(1007, '2020-03-06 14:52:44', 15000),
(1009, '2020-04-12 20:21:57', 20000),
(1004, '2020-05-10 12:00:29', 8000),
(1006, '2020-06-08 11:10:26', 4000),
(1010, '2020-06-22 17:22:43', 7000),
(1010, '2020-07-14 03:35:02', 8500),
(1012, '2020-07-19 12:48:51', 41000),
(1004, '2020-09-02 16:51:25', 11000),
(1006, '2020-09-05 14:34:48', 15000),
(1007, '2020-09-25 21:16:38', 4000),
(1012, '2020-10-01 13:13:34', 10000),
(1010, '2020-10-01 14:29:37', 5000),
(1012, '2020-10-12 16:54:15', 6000),
(1007, '2020-11-24 11:02:52', 14000),
(1009, '2020-11-25 10:48:31', 19000),
(1007, '2020-11-25 16:01:24', 17000),
(1002, '2020-11-29 13:34:08', 10000),
(1010, '2020-11-30 08:27:50', 12000),
(1004, '2020-12-12 22:02:20', 20000),
(1009, '2020-12-15 12:28:44', 25000),
(1002, '2020-12-23 19:42:20', 3000),
(1005, '2020-12-23 20:33:28', 7500),
(1002, '2020-12-29 10:00:47', 18000),
(1010, '2022-06-24 15:31:43', 1000),
(1010, '2022-06-24 17:23:49', 1000),
(1010, '2022-06-24 17:24:31', 1000),
(1010, '2022-06-24 17:25:16', 1000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ugyfel`
--

CREATE TABLE `ugyfel` (
  `azon` int(10) UNSIGNED NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulev` smallint(4) UNSIGNED NOT NULL,
  `irszam` varchar(8) NOT NULL,
  `orsz` varchar(3) NOT NULL,
  `jelszo` char(60) NOT NULL,
  `helyseg` varchar(200) NOT NULL,
  `kep` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `ugyfel`
--

INSERT INTO `ugyfel` (`azon`, `nev`, `szulev`, `irszam`, `orsz`, `jelszo`, `helyseg`, `kep`) VALUES
(1001, 'Buda Jenő', 1982, '1026', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Budapest II.', '1001.jpg'),
(1002, 'Makkos Mária', 1970, '2083', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Solymár', '1002.jpg'),
(1003, 'Pilis Csaba', 1992, '2081', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Piliscsaba', '1003.jpg'),
(1004, 'Török Bálint', 1988, '2045', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Törökbálint', '1004.jpg'),
(1005, 'Szent Endre', 1962, '2000', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Szentendre', '1005.jpg'),
(1006, 'Kis Márton', 1991, '7000', 'AT', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Kismarton', '1006.jpg'),
(1007, 'Békés Csaba', 1989, '5600', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Békéscsaba ', '1007.jpg'),
(1009, 'Dráva Szabolcs', 1985, '7851', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Drávaszabolcs', '1009.jpg'),
(1010, 'Nagy Károly', 1975, '445100', 'RO', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Nagykároly, Szatmár megye', '1010.jpg'),
(1012, 'Boros Jenő', 1982, '2097', 'HU', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Pilisborosjenő', '1012.jpg'),
(1013, 'Száva Magdolna', 1987, '21000', 'HR', '$2y$10$FQ.Otnll9uz7wPtaMPkwzeQyqWOc45bVekvp1izTKMs6n2Us2tz7y', 'Split', '1013.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `befiz`
--
ALTER TABLE `befiz`
  ADD KEY `azon` (`azon`);

--
-- A tábla indexei `ugyfel`
--
ALTER TABLE `ugyfel`
  ADD PRIMARY KEY (`azon`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `befiz`
--
ALTER TABLE `befiz`
  ADD CONSTRAINT `befiz_ibfk_1` FOREIGN KEY (`azon`) REFERENCES `ugyfel` (`azon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
