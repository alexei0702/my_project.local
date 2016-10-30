-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 30 2016 г., 14:50
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vimi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `vimi_aud`
--

CREATE TABLE `vimi_aud` (
  `aud_id` int(11) NOT NULL,
  `aud_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vimi_aud`
--

INSERT INTO `vimi_aud` (`aud_id`, `aud_num`) VALUES
(1, '1110'),
(2, '1209');

-- --------------------------------------------------------

--
-- Структура таблицы `vimi_aud_user_connect`
--

CREATE TABLE `vimi_aud_user_connect` (
  `connect_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aud_id` int(11) NOT NULL,
  `connect_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vimi_aud_user_connect`
--

INSERT INTO `vimi_aud_user_connect` (`connect_id`, `user_id`, `aud_id`, `connect_time`) VALUES
(27, 1, 1, '2016-10-30 10:17:55'),
(28, 27, 1, '2016-10-30 10:19:40'),
(29, 8, 2, '2016-10-30 14:23:29');

-- --------------------------------------------------------

--
-- Структура таблицы `vimi_user`
--

CREATE TABLE `vimi_user` (
  `user_id` int(11) NOT NULL,
  `user_fio` varchar(255) NOT NULL,
  `user_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vimi_user`
--

INSERT INTO `vimi_user` (`user_id`, `user_fio`, `user_password`) VALUES
(1, 'Шиханов Дмитрий Сергеевич', '1234'),
(2, 'Серебрюхов Дмитрий Николаевич', '1234'),
(3, '﻿Аюшеева Иннеса Аюровна\r\n', '98989'),
(4, 'Березкин Евгений Александрович\r\n', '91235'),
(5, 'Ванданов Станислав Чойжанжапович\r\n', '32186'),
(6, 'Дамдинов Эрдэни Баторович\r\n', '80090'),
(7, 'Жамцаев Никита Сергеевич\r\n', '91375'),
(8, 'Золотухин Валентин Игоревич\r\n', '54486'),
(9, 'Карпов Денис\r\n', '37141'),
(10, 'Кычаков Александр Николаевич\r\n', '18291'),
(11, 'Монгуш Шончалай Владиславовна\r\n', '21008'),
(12, 'Монгуш Янжима Шириин-Ооловна\r\n', '17561'),
(13, 'Николаев Бато Валерьевич\r\n', '22936'),
(14, 'Очиржапов Сультим Алдорович\r\n', '28036'),
(15, 'Ринчинова Саяна Баировна\r\n', '98824'),
(16, 'Лобанова Юля\r\n', '22648'),
(17, 'Тараконов Антон Ильич\r\n', '88008'),
(18, 'Цыренов Пурбо Жаргалович\r\n', '39012'),
(19, 'Шагжина Саяна Гурдармаевна\r\n', '40761'),
(20, 'Шалдаев Бато Цырендоржиевич\r\n', '66933'),
(21, 'Шиханов Дмитрий Сергеевич\r\n', '15795'),
(22, 'Раднаев Алдар\r\n', '25905'),
(23, 'Шагдуров Алексей Жаргалович\r\n', '57757'),
(24, 'Гревцев Александр Григорьевич\r\n', '12606'),
(25, 'Цэдашиева Эржена Жамьяновна\r\n', '84734'),
(26, 'Гармаев Мунко\r\n', '98404'),
(27, 'Ульянов Даниил\r\n', '45749'),
(28, 'Цыцыков Арсалан', '36853');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `vimi_aud`
--
ALTER TABLE `vimi_aud`
  ADD PRIMARY KEY (`aud_id`);

--
-- Индексы таблицы `vimi_aud_user_connect`
--
ALTER TABLE `vimi_aud_user_connect`
  ADD PRIMARY KEY (`connect_id`);

--
-- Индексы таблицы `vimi_user`
--
ALTER TABLE `vimi_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `vimi_aud`
--
ALTER TABLE `vimi_aud`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `vimi_aud_user_connect`
--
ALTER TABLE `vimi_aud_user_connect`
  MODIFY `connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `vimi_user`
--
ALTER TABLE `vimi_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
