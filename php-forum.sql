-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 10. 22:11
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE `php-forum`;
--
-- Adatbázis: `php-forum`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `1_table`
--

CREATE TABLE `1_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `name` tinytext COLLATE utf8mb4_hungarian_ci NOT NULL,
  `text` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `1_table`
--

INSERT INTO `1_table` (`id`, `date`, `name`, `text`) VALUES
(1, '2021-04-10 08:56:15', 'admin', 'Ez az első komment az oldalon amit valaha írtak!'),
(2, '2021-04-10 09:01:30', 'red', 'Második komment!'),
(3, '2021-04-10 09:43:29', 'red', 'A szöveg megfelelője gyakorlatilag az összes európai nyelvben \"Text\" (különböző írásképekkel a nemzeti helyesírás miatt), ami a latin \"textum\" szóból ered, amely szó eredeti jelentése: szövet, szöveg. A magyarban a nyelvújítás idején a jelentést magyar szóval jelöltük. A szöveg egy összefüggő és a környezetétől jól elhatárolt vagy elhatárolható megnyilvánulás, kijelentés írott vagy tágabb értelemben nem írott de (le)írható nyelven. A nem feltétlenül írott, de leírható szövegre példa a dalszöveg, egy film szövege vagy improvizált színházi szöveg.\n\nEgy szöveg ábrázolásához szükség van írásra is, amely eszköztárával (pl. betűkkel) fonémákat, szótagokat, ill. szavakat és fogalmakat kódol. Különböző kultúrák és korok erre a célra különböző jelrendszert használnak. A szöveg egyik legfontosabb és megkerülhetetlen (immanens) tulajdonsága, amelyet mind az író mind az olvasó kénytelen követni (ha a szöveget olvasni akarja) a linearitás.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `2_table`
--

CREATE TABLE `2_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `name` tinytext COLLATE utf8mb4_hungarian_ci NOT NULL,
  `text` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `2_table`
--

INSERT INTO `2_table` (`id`, `date`, `name`, `text`) VALUES
(1, '2021-04-10 09:01:16', 'red', 'Első komment.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(11) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `accounts`
--

INSERT INTO `accounts` (`username`, `email`, `password`, `date`) VALUES
('admin', 'a@gmail.com', 'Qwert123', '2021-04-10'),
('red', 'r@gmail.com', 'Qwert123', '2021-04-10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `topik`
--

CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comments` int(11) NOT NULL,
  `author` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `title` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `database_id` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `topik`
--

INSERT INTO `topik` (`id`, `date`, `comments`, `author`, `title`, `database_id`) VALUES
(1, '2021-04-10', 3, 'admin', 'Első topik az oldalon!!!', '1_table'),
(2, '2021-04-10', 1, 'red', 'Második topik', '2_table');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `1_table`
--
ALTER TABLE `1_table`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `2_table`
--
ALTER TABLE `2_table`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `1_table`
--
ALTER TABLE `1_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `2_table`
--
ALTER TABLE `2_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
