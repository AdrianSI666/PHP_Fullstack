-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Sty 2022, 11:12
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt_php`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `data_ur` date NOT NULL,
  `pesel` bigint(11) NOT NULL,
  `miasto` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `konto`
--

INSERT INTO `konto` (`id`, `email`, `haslo`, `imie`, `nazwisko`, `data_ur`, `pesel`, `miasto`, `adres`) VALUES
(4, 'test3@test3.pl', 'test3', 'test3', 'test3', '2021-12-08', 12345678901, 'test3', 'test3'),
(5, 'test5@test5.pl', 'test5', 'test5', 'test5', '2021-10-14', 12345678901, 'test5', 'test5'),
(6, 'test6@test2.pl', 'test6', 'test6', 'test6', '2021-12-08', 12345678901, 'test6', 'test6'),
(25, 'final@f.pl', '9e38e8d688743e0d07d669a1fcbcd35b', 'final', 'final', '2021-11-03', 12345678901, 'final', 'final'),
(27, 'email@email.pl', '9e38e8d688743e0d07d669a1fcbcd35b', 'Ania', 'Lania', '2005-12-04', 12345678901, 'Elblag', 'Sezamkowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarz`
--

CREATE TABLE `lekarz` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `specjalizacja` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `gabinet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lekarz`
--

INSERT INTO `lekarz` (`id`, `imie`, `nazwisko`, `specjalizacja`, `telefon`, `gabinet`) VALUES
(2, 'Arnold', 'Wesolowski', 'Chirurgia', 123456789, 2),
(3, 'Małgorzata', 'Szkop', 'Epidemiologia', 987654321, 1),
(4, 'Aleksandra', 'Werner', 'Urologia', 456712397, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyta_oczekujaca`
--

CREATE TABLE `wizyta_oczekujaca` (
  `id` int(11) NOT NULL,
  `pacjent_id` int(11) NOT NULL,
  `specjalizacja` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `dolegliwosc` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wizyta_oczekujaca`
--

INSERT INTO `wizyta_oczekujaca` (`id`, `pacjent_id`, `specjalizacja`, `dolegliwosc`) VALUES
(8, 27, 'Urologia', 'Problemy z pęcherzem');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyty_przyszle`
--

CREATE TABLE `wizyty_przyszle` (
  `id` int(11) NOT NULL,
  `pacjent_id` int(11) NOT NULL,
  `lekarz_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wizyty_przyszle`
--

INSERT INTO `wizyty_przyszle` (`id`, `pacjent_id`, `lekarz_id`, `date`, `hour`) VALUES
(7, 4, 2, '2021-12-23', '12:15:00'),
(16, 25, 2, '2021-12-24', '12:15:00'),
(17, 25, 4, '2021-12-22', '15:11:00'),
(18, 25, 4, '2022-01-12', '12:30:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wizyta_oczekujaca`
--
ALTER TABLE `wizyta_oczekujaca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wizyta_oczekujaca_pacjent` (`pacjent_id`);

--
-- Indeksy dla tabeli `wizyty_przyszle`
--
ALTER TABLE `wizyty_przyszle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wizyty_przyzle_pacjent` (`pacjent_id`),
  ADD KEY `wizyty_przyszle_lekarz` (`lekarz_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `konto`
--
ALTER TABLE `konto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `wizyta_oczekujaca`
--
ALTER TABLE `wizyta_oczekujaca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `wizyty_przyszle`
--
ALTER TABLE `wizyty_przyszle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wizyta_oczekujaca`
--
ALTER TABLE `wizyta_oczekujaca`
  ADD CONSTRAINT `wizyta_oczekujaca_pacjent` FOREIGN KEY (`pacjent_id`) REFERENCES `konto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `wizyty_przyszle`
--
ALTER TABLE `wizyty_przyszle`
  ADD CONSTRAINT `wizyty_przyszle_lekarz` FOREIGN KEY (`lekarz_id`) REFERENCES `lekarz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wizyty_przyzle_pacjent` FOREIGN KEY (`pacjent_id`) REFERENCES `konto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
