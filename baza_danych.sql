-- phpMyAdmin SQL Dump
-- version 
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 10.08.2023, 15.24
-- Wersja serwera: 
-- Wersja PHP: 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `ppi`
--

-- --------------------------------------------------------



--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS users (
 id int NOT NULL AUTO_INCREMENT ,
 PRIMARY KEY (id),
  login text COLLATE utf8_polish_ci NOT NULL,
  pass text COLLATE utf8_polish_ci NOT NULL,
  name text COLLATE utf8_polish_ci NOT NULL,
  s_name text COLLATE utf8_polish_ci NOT NULL,
  email text COLLATE utf8_polish_ci NOT NULL,
  data_u date NOT NULL,
  nr_tel varchar(60) NOT NULL)
DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO users (id, login, pass, name, s_name, email, data_u, nr_tel) VALUES
(1, 'adam1', 'qwerty','Adam','Nowak', 'adam@gmail.com','1995.01.01', '123 456 789'),
(2, 'marek1', 'asdfg','Marek','Kowalski','marek@gmail.com','1990.02.02','111 222 333'),
(3, 'antek1', 'zxcvb','Antoni','Przykład', 'antek@gmail.com','1991.03.03','222 333 444'),
(4, 'andrzej1', 'asdfg','Andrzej','Testowy', 'andrzej@gmail.com','1985.04.04','111 111 111'),
(5, 'jarek1', 'yuiop','Jarosław','Test', 'jarek@gmail.com','1988.02.01','222 222 222'),
(6, 'kacper1', 'hjkkl','Kacper','Przykładowy', 'kacper@gmail.com','1996.01.05','333 333 333'),
(7, 'bartek1', 'fgthj','Bartosz','Jakiś', 'bartek@gmail.com','1999.07.07','444 444 444'),
(8, 'jakub1', 'ertyu','Jakub','Gracz', 'jakub@gmail.com','1997.09.01','555 555 555'),
(9, 'janusz1', 'cvbnm','Janusz','Kopacz', 'janusz@gmail.com','2000.06.06','777 777 777'),
(10, 'roman1', 'dfghj','Roman','Piłkarski', 'roman@gmail.com','2001.12.20','888 888 888');



--
-- Struktura tabeli dla tabeli `boiska`
--

CREATE TABLE IF NOT EXISTS boiska (
 nr_b int NOT NULL,
  nazwa text COLLATE utf8_polish_ci NOT NULL,
  adres varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (adres),
  city text COLLATE utf8_polish_ci NOT NULL,
  kontakt text COLLATE utf8_polish_ci)DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
  
--
-- Zrzut danych tabeli `boiska`
--

INSERT INTO boiska (nr_b , nazwa , adres, city , kontakt) VALUES
(1, 'Białołęcki Ośrodek Sportu','Strumykowa 21','Warszawa','22 676 67 49'),
(2, 'Syrenka 5','Vincenta van Gogha 1','Warszawa','000 000 000'),
(3, 'Krzyżówki','Krzyżówki 28','Warszawa','000 000 000'),
(4, 'Podróżnicza','Podróżnicza 11','Warszawa','000 000 000'),
(5, 'Leśna Polanka','Leśnej Polanki 63/65','Warszawa','000 000 000'),
(6, 'Erazma','Erazma z Zakroczymia 15','Warszawa','000 000 000'),
(7, 'Kobiałka','Kobiałka 49','Warszawa','000 000 000'),
(8, 'Myśliborska',' Myśliborska 25','Warszawa','000 000 000'),
(9, 'Zaułek','Zaułek 34','Warszawa','000 000 000'),
(10, 'Porajów','Porajów 3','Warszawa','000 000 000'),
(11, 'Topolowa','Topolowa 15','Warszawa','000 000 000'),
(12, 'Ceramiczna','Ceramiczna 11','Warszawa','000 000 000'),
(13, 'Głębocka','Głębocka 66','Warszawa','000 000 000'),
(14, 'Ruskowy Bród','Ruskowy Bród 19','Warszawa','000 000 000'),
(15, 'Płużnicka','Płużnicka 4','Warszawa','000 000 000'),
(16, 'Przytulna ','Przytulna 3','Warszawa','000 000 000'),
(17, 'Ostródzka','Ostródzka 175','Warszawa','000 000 000'),
(18, 'Hemara','Hemara 15','Warszawa','000 000 000'),
(19, 'Kasprzaka','Marcina Kasprzaka 19/21','Warszawa','000 000 000');



--
-- Struktura tabeli dla tabeli `mecz`
--

CREATE TABLE IF NOT EXISTS mecz (
 id_m int NOT NULL AUTO_INCREMENT ,
 PRIMARY KEY (id_m),
  tworca text COLLATE utf8_polish_ci NOT NULL,
  data_m date NOT NULL,
  boisko text COLLATE utf8_polish_ci NOT NULL,
  adres varchar(100) COLLATE utf8_polish_ci NOT NULL,foreign key (adres) references boiska(adres),
  typ text COLLATE utf8_polish_ci NOT NULL,
  czas text COLLATE utf8_polish_ci NOT NULL,
  skladka text COLLATE utf8_polish_ci NOT NULL,
  poziom text COLLATE utf8_polish_ci NOT NULL,
  wolne_m text COLLATE utf8_polish_ci NOT NULL)DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mecz`
--

INSERT INTO mecz(id_m ,tworca,data_m,boisko, adres, typ,czas, skladka,poziom,wolne_m) VALUES
(1,'adam1','2023.09.01','Białołęcki Ośrodek Sportu','Strumykowa 21','8 vs 8','20.00-21.30','10 zł','wysoki/ligowy','10');



--
-- Struktura tabeli dla tabeli `gracze`
--

CREATE TABLE IF NOT EXISTS gracze(
 nr_g int NOT NULL AUTO_INCREMENT ,PRIMARY KEY (nr_g),
 id_uzytkownika int NOT NULL,foreign key (id_uzytkownika) references users(id),
 numer_meczu int NOT NULL,foreign key (numer_meczu) references mecz(id_m),
 boisko varchar(100) COLLATE utf8_polish_ci NOT NULL,foreign key (boisko) references boiska(adres)
 )DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gracze`
--

INSERT INTO gracze(nr_g,id_uzytkownika,numer_meczu,boisko) VALUES
(1,'1','1','Strumykowa 21');
