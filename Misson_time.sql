-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Gép: localhost
-- Létrehozás ideje: 2015. Dec 11. 17:52
-- Kiszolgáló verziója: 5.5.46-0+deb7u1
-- PHP verzió: 5.4.45-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `wadon_upra`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Misson_time`
--

CREATE TABLE IF NOT EXISTS `Misson_time` (
  `mkey` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `Misson_time`
--

INSERT INTO `Misson_time` (`mkey`, `timestamp`, `fly`) VALUES
(1, '2015-06-09 10:00:00', 1),
(2, '2015-06-09 12:47:30', 0),
(3, '2015-07-21 10:00:00', 1),
(4, '2015-07-21 12:47:30', 0),
(5, '2015-08-29 10:00:00', 1),
(6, '2015-08-29 12:47:30', 0),
(7, '2015-09-10 10:00:00', 1),
(8, '2015-09-10 12:47:30', 0),
(9, '2015-10-10 08:24:10', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `Misson_time`
--
ALTER TABLE `Misson_time`
  ADD PRIMARY KEY (`mkey`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
