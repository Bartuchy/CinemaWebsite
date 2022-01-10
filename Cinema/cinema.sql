-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2022, 13:30
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cinema`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `language` varchar(100) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `payment` varchar(25) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `date`, `language`, `details`, `payment`, `userId`) VALUES
(33, 'Druga połowa', '2022-01-10', 'Angielski', 'Z napisami,Opcja 3D', 'visa', 13),
(34, 'Avengers', '2022-01-12', 'Polski', 'Opcja 3D', 'mastercard', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `age`, `email`, `phone`, `passwd`, `date`) VALUES
(11, 'Testc', 'Testc', 999, 'testc@testc.testc', '+48 123-123-123', '$2y$10$Ok0zr7mq6Ky46JkpLq1sEOugyCtbUe.He.d6CUw0qPluE.VkSgghq', '2022-01-09'),
(12, 'Testd', 'Testd', 999, 'testd@testd.testd', '+48 123-123-123', '$2y$10$UxiAGk7Pg1NlORZyNhRA7.FWasUci9hGY9G1zQWXQ2ScUfcOLdwve', '2022-01-09'),
(13, 'Test', 'Test', 999, 'test@test.test', '+48 102-102-102', '$2y$10$KGaQp7dB3h1G29W4ZzdKL.SfBflq8/uHLOMhcK6dQhtgNXiFm8Ixq', '2022-01-09'),
(14, 'Testa', 'Testa', 999, 'testa@testa.testa', '+48 102-102-102', '$2y$10$Vx2hzvTUWkn2lrBxLZiLlOQS4PHmZDPzt.ELZvoV/f8xR.g.cfsWG', '2022-01-10'),
(15, 'Testb', 'Testb', 234, 'testb@testb.testb', '+48 102-102-102', '$2y$10$cWE/7lskra/ZDJxIuNNXTOa1HYIrU840C5ffHhdLo1.iD2q.9DmDu', '2022-01-10');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indeksy dla tabeli `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
