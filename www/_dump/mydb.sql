-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 22 2016 г., 15:33
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `group_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_code`) VALUES
(1, 'Прикладная математика', '05250'),
(2, 'Математическое обеспечение и администрирование информационных систем', '05450'),
(3, 'Математика', '05140'),
(4, 'Математика', '05150'),
(5, 'Математика', '05160'),
(6, 'Прикладная математика', '05240'),
(7, 'Прикладная математика', '05260'),
(8, 'Прикладная математика и информатика', '05340'),
(9, 'Прикладная математика и информатика', '05360'),
(10, 'Математическое обеспечение и администрирование информационных систем', '05430'),
(11, 'Математическое обеспечение и администрирование информационных систем', '05440'),
(12, 'Математическое обеспечение и администрирование информационных систем', '05460'),
(13, 'Математика и компьютерные науки', '05530'),
(14, 'Математика и компьютерные науки', '05540'),
(15, 'Математика и компьютерные науки', '05550'),
(16, 'Педагогическое образование', '05960');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `shorttitle` varchar(45) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `title`, `shorttitle`, `teacher_id`) VALUES
(2, 'Математический Анализ', 'МатАн', 1),
(3, 'Олимпиад. задачи', 'ОЗ', 4),
(4, 'Архитектура Компьютера', 'Арх.Комп.', 5),
(5, 'Администрирование информационных систем', 'АИС', 6),
(6, 'Компьютерные Сети', 'Комп.сети', 7),
(7, 'Элективные курсы по ФК', 'ФК', 8),
(8, 'Иностранный язык', 'Англ.яз.', 11),
(9, 'Структуры и алгоритмы компьютерной обработки ', 'САКОД', 9),
(10, 'Система компьютерной верстки', 'Верстка', 10),
(11, 'Программирование', 'Прога', 12),
(12, 'Дифференциальные уравнения', 'Диффуры', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `pair`
--

CREATE TABLE `pair` (
  `pair_id` int(11) NOT NULL,
  `time_beg` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `pair_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pair`
--

INSERT INTO `pair` (`pair_id`, `time_beg`, `time_end`, `pair_name`) VALUES
(2, '08:00:00', '09:30:00', 1),
(3, '09:40:00', '11:10:00', 2),
(4, '11:20:00', '12:50:00', 3),
(5, '13:00:00', '14:30:00', 4),
(6, '14:40:00', '16:10:00', 5),
(7, '16:20:00', '17:50:00', 6),
(8, '18:00:00', '19:30:00', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `week_num` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `pair_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `week_num`, `lesson_id`, `pair_id`, `group_id`, `day`) VALUES
(1, 1, 3, 1, 2, 1),
(2, 1, 5, 2, 2, 1),
(3, 1, 2, 3, 2, 1),
(4, 1, 6, 4, 2, 1),
(5, 1, 2, 2, 2, 2),
(6, 1, 4, 3, 2, 2),
(7, 1, 7, 5, 2, 2),
(8, 1, 6, 1, 2, 3),
(9, 1, 8, 2, 2, 3),
(10, 1, 9, 3, 2, 3),
(11, 1, 9, 4, 2, 3),
(12, 1, 10, 1, 2, 4),
(13, 1, 11, 2, 2, 4),
(14, 1, 12, 1, 2, 5),
(15, 1, 10, 2, 2, 5),
(16, 1, 5, 3, 2, 5),
(17, 1, 7, 5, 2, 5),
(18, 1, 9, 2, 2, 6),
(19, 1, 2, 3, 2, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `students_id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Secondname` varchar(45) DEFAULT NULL,
  `Patronymic` varchar(45) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`students_id`, `Name`, `Secondname`, `Patronymic`, `group_id`, `user_id`) VALUES
(1, 'Дмитрий', 'Шиханов', 'Сергеевич', 1, 1),
(2, 'Алексей', 'Ефимов', 'Павлович', 2, 0),
(3, 'Дмитрий', 'Серебрюхов', 'Николаевич', 2, 0),
(4, 'Баярма', 'Аюшеева', '1', 3, 1),
(5, 'Евгения', 'Бочарова', '1', 3, 1),
(6, 'Татьяна', 'Веселкова', '1', 3, 1),
(7, 'Наталья', 'Гачегова', '1', 3, 1),
(8, 'Александр', 'Грудинин', '1', 3, 1),
(9, 'Лилия', 'Гылыкова', '1', 3, 1),
(10, 'Азиана', 'Даваакай', '1', 3, 1),
(11, 'Анжела', 'Павлова', '1', 3, 1),
(12, 'Александр', 'Питерман', '1', 3, 1),
(13, 'Кристина', 'Семенова', '1', 3, 1),
(14, 'Валентина', 'Соболева', '1', 3, 1),
(15, 'Лидия', 'Федорова', '1', 3, 1),
(16, 'Булат', 'Бальчинов', '1', 4, 1),
(17, 'Анастасия', 'Баранчугова', '1', 4, 1),
(18, 'Дмитрий', 'Боков', '1', 4, 1),
(19, 'Бадмаханда', 'Буянтуева', '1', 4, 1),
(20, 'Аюна', 'Галькова', '1', 4, 1),
(21, 'Эрдэм', 'Гармаев', '1', 4, 1),
(22, 'Ринчин', 'Гунзенов', '1', 4, 1),
(23, 'Дари', 'Дашиева', '1', 4, 1),
(24, 'Юлиана', 'Дыртык', '1', 4, 1),
(25, 'Содном', 'Жамьянов', '1', 4, 1),
(26, 'Светлана', 'Ипатьева', '1', 4, 1),
(27, 'Алексей', 'Камалединов', '1', 4, 1),
(28, 'Вера', 'Мершниченко', '1', 4, 1),
(29, 'Виталина', 'Путинцева', '1', 4, 1),
(30, 'Жамбал', 'Раднаев', '1', 4, 1),
(31, 'Виктория', 'Самбуева', '1', 4, 1),
(32, 'Татьяна', 'Утенкова', '1', 4, 1),
(33, 'Кристина', 'Шишмакова', '1', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Secondname` varchar(45) DEFAULT NULL,
  `Patronymic` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `Name`, `Secondname`, `Patronymic`, `user_id`) VALUES
(1, 'Игорь', 'Юмов', 'Бимбаевич', 0),
(2, 'Юрий', 'Нефедов', 'Юрьевич', 0),
(3, 'Баир', 'Хабитуев', 'Викторович', 0),
(4, 'Александр ', 'Данеев', 'Васильевич', 0),
(5, 'Севан', 'Цыдыпов', 'Гуруевич', 0),
(6, 'Даниил', 'Дерюгин', 'Федорович', 0),
(7, 'Александр', 'Цыденмункуев', 'Мункуевич', 0),
(8, 'Иннокентий', 'Очиров', 'Михайлович', 0),
(9, 'Федор', 'Хандаров', 'Владимирович', 0),
(10, 'Татьяна', 'Балданова', 'Саяновна', 0),
(11, 'Дарима', 'Очиржапова', 'Цыренжаповна', 0),
(12, 'Энгельсина', 'Бадмаева', 'Сергеевна', 0),
(13, 'Владимир', 'Убодоев', 'Викторович', 0);

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
(2, '1104'),
(3, '1107'),
(4, '1108'),
(5, '1111'),
(6, '1112'),
(7, '1200'),
(8, '1205'),
(9, '1208'),
(10, '1209'),
(11, '1210'),
(12, '1211'),
(13, '1212'),
(14, '1213'),
(15, '1214'),
(16, '1216'),
(17, '1303'),
(18, '1305'),
(19, '1307'),
(20, '1309'),
(21, '1312'),
(22, '1313'),
(23, '1316');

-- --------------------------------------------------------

--
-- Структура таблицы `vimi_msk`
--

CREATE TABLE `vimi_msk` (
  `students_id` int(11) NOT NULL,
  `count_null` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vimi_msk`
--

INSERT INTO `vimi_msk` (`students_id`, `count_null`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `vimi_user`
--

CREATE TABLE `vimi_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vimi_user`
--

INSERT INTO `vimi_user` (`user_id`, `username`, `user_password`, `user_status`) VALUES
(1, 'Шиханов Дмитрий Сергеевич', '1234', 1),
(2, 'Серебрюхов Дмитрий Николаевич', '1234', 1),
(3, '﻿Аюшеева Иннеса Аюровна\r\n', '98989', 1),
(4, 'Березкин Евгений Александрович\r\n', '91235', 1),
(5, 'Ванданов Станислав Чойжанжапович\r\n', '32186', 1),
(6, 'Дамдинов Эрдэни Баторович\r\n', '80090', 1),
(7, 'Жамцаев Никита Сергеевич\r\n', '91375', 1),
(8, 'Золотухин Валентин Игоревич\r\n', '54486', 1),
(9, 'Карпов Денис\r\n', '37141', 1),
(10, 'Кычаков Александр Николаевич\r\n', '18291', 1),
(11, 'Монгуш Шончалай Владиславовна\r\n', '21008', 1),
(12, 'Монгуш Янжима Шириин-Ооловна\r\n', '17561', 1),
(13, 'Николаев Бато Валерьевич\r\n', '22936', 1),
(14, 'Очиржапов Сультим Алдорович\r\n', '28036', 1),
(15, 'Ринчинова Саяна Баировна\r\n', '98824', 1),
(16, 'Лобанова Юля\r\n', '22648', 1),
(17, 'Тараконов Антон Ильич\r\n', '88008', 1),
(18, 'Цыренов Пурбо Жаргалович\r\n', '39012', 1),
(19, 'Шагжина Саяна Гурдармаевна\r\n', '40761', 1),
(20, 'Шалдаев Бато Цырендоржиевич\r\n', '66933', 1),
(21, 'Шиханов Дмитрий Сергеевич\r\n', '15795', 1),
(22, 'Раднаев Алдар\r\n', '25905', 1),
(23, 'Шагдуров Алексей Жаргалович\r\n', '57757', 1),
(24, 'Гревцев Александр Григорьевич\r\n', '12606', 1),
(25, 'Цэдашиева Эржена Жамьяновна\r\n', '84734', 1),
(26, 'Гармаев Мунко\r\n', '98404', 1),
(27, 'Ульянов Даниил\r\n', '45749', 1),
(28, 'Цыцыков Арсалан', '36853', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `visiting`
--

CREATE TABLE `visiting` (
  `visiting_id` int(11) NOT NULL,
  `shledule_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `date_visiting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `visit_connect`
--

CREATE TABLE `visit_connect` (
  `connect_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `aud_id` int(11) NOT NULL,
  `date_visiting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visit_connect`
--

INSERT INTO `visit_connect` (`connect_id`, `student_id`, `aud_id`, `date_visiting`) VALUES
(1, 1, 4, '2016-11-11 09:50:23');

-- --------------------------------------------------------

--
-- Структура таблицы `visit_status`
--

CREATE TABLE `visit_status` (
  `status_id` int(11) NOT NULL,
  `status_title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Индексы таблицы `pair`
--
ALTER TABLE `pair`
  ADD PRIMARY KEY (`pair_id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `pair_id_idx` (`pair_id`),
  ADD KEY `lesson_id_idx` (`lesson_id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`),
  ADD KEY `group_id_idx` (`group_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Индексы таблицы `vimi_aud`
--
ALTER TABLE `vimi_aud`
  ADD PRIMARY KEY (`aud_id`);

--
-- Индексы таблицы `vimi_user`
--
ALTER TABLE `vimi_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `visiting`
--
ALTER TABLE `visiting`
  ADD PRIMARY KEY (`visiting_id`),
  ADD KEY `shledule_id_idx` (`shledule_id`),
  ADD KEY `student_id_idx` (`student_id`);

--
-- Индексы таблицы `visit_connect`
--
ALTER TABLE `visit_connect`
  ADD PRIMARY KEY (`connect_id`);

--
-- Индексы таблицы `visit_status`
--
ALTER TABLE `visit_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `pair`
--
ALTER TABLE `pair`
  MODIFY `pair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `students_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `vimi_aud`
--
ALTER TABLE `vimi_aud`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `vimi_user`
--
ALTER TABLE `vimi_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `visiting`
--
ALTER TABLE `visiting`
  MODIFY `visiting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `visit_connect`
--
ALTER TABLE `visit_connect`
  MODIFY `connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `visit_status`
--
ALTER TABLE `visit_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
