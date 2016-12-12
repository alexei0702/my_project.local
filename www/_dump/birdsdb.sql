-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 12 2016 г., 15:58
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `birdsdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bird`
--

CREATE TABLE `bird` (
  `bird_id` int(11) NOT NULL,
  `bird_name` varchar(255) NOT NULL,
  `bird_name_lat` varchar(255) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `propagation` text NOT NULL,
  `migration` text NOT NULL,
  `habitat` text NOT NULL,
  `author` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bird`
--

INSERT INTO `bird` (`bird_id`, `bird_name`, `bird_name_lat`, `kind_id`, `family_id`, `squad_id`, `propagation`, `migration`, `habitat`, `author`, `link`) VALUES
(1, 'Малая поганка', 'Podiceps ruficollis Pall.', 3, 3, 5, 'В бассейне оз. Байкал малая поганка была известна в качестве залетного вида. В частности, залет был зафиксирован в 1954 г. близ пос. Тальцы недалеко от истока р. Ангары; шкурка птицы сейчас хранится в коллекции Иркутского университета (Гагина, 1961аб). После этого сведений о данном виде на исследуемой территории не поступало. В настоящее время он отмечен здесь как гнездящийся и имеющий в регионе ограниченное распространение. В частности, гнездование установлено на Ивано-Арахлейских озерах, причем вид появился здесь совсем недавно - в конце 80-х годов (Огородникова, Миронова, 1994). В летние месяцы 1994-2000 гг. этих птиц неоднократно встречали на оз. Большая Ангара Коймурского водно-болотного комплекса в долине р. Иркут, но гнезд и выводков не находили (Сонина и др., 2001).', 'Точные сроки миграции для региона не выявлены. Весной птицы, вероятно, прилетают в конце мая, т.к. в первой половине июня, по данным Л.И.Огородниковой и В.Е.Мироновой (1994), они уже приступают к гнездованию; на озерах держатся до конца лета.', 'Обитает на небольших мелких стоячих или слабопроточных водоемах, поросших тростником, рогозом, осокой, кустами ив, реже по старицам рек, низинным болотам.\r\n	В 1989 г. на Ивано-Арахлейских озерах гнездилось 13 пар, численность вида растет из года в год (Огородникова, Миронова, 1994).', 0, '1481549185_malaja-poganka.jpg'),
(2, 'Краснозобая гагара', 'Gavia stellata Pontopp.', 1, 1, 1, 'Гнездование краснозобой гагары на северном Байкале известно уже давно (Radde, 1863; Туров, 1923, 1924; Штегман, 1936; Новиков, 1937), позднее этот факт подтверждался многими исследователями (Малышев, 1960; Гагина, 1961; Скрябин, Филонов, 1962; Флинт, 1982; Юмов и др., 1989; Степанян, 1990; Heyrovsky et al., 1992; Елаев, Доржиев, 1993; Подковыров, 2000; Фефелов и др., 2001; Доржиев и др., 2003; Ананин, 2006 и др.). В 1991 г., работая в этих местах, мы наблюдали пару птиц на о. Ярки 12/VI. В этом же году гагар часто видели в гнездовое время на Баргузинском заливе и оз. Арангатуй (Heyrovsky et al., 1992). В северо-восточном Прибайкалье местом гнездования вида является долина р. Баргузин (Гагина, 1960, 1961; Лямкин, 1977; Елаев и др., 1995). Т.Н.Гагина (1961) отнесла к местам обитания гагар также Западное Прибайкалье, однако более поздние наблюдения не подтвердили данный факт (Скрябин, Пыжьянов, 1987; Богородский, 1989). Для Южного Забайкалья известно давнее упоминание из окрестностей г. Троицкосавска (Моллесон, 1896). В целом, согласно последним сводкам (Болд и др., 1991; Подковыров, 2000), этот вид встречается во всех зоогеографических провинциях юга Восточной Сибири, включая север Монголии.\r\nНа пролете встречается в дельте р. Селенги, Селенгинском среднегорье - система Гусино-Убукунских озер (Измайлов, 1967; Измайлов, Боровицкая, 1973; Доржиев и др., 1986) и в Прибайкальской равнине (Васильченко, 1987). И.В.Измайлов и Г.К.Боровицкая (1973) видели летующую пару этих птиц на оз. Камышевом (Гусиноозерская котловина) в 3-й декаде июня 1957 г.; после этого здесь их в летний период больше не регистрировали.\r\n', 'Сезонные миграции краснозобой гагары практически не изучены. Сроки пролета как весной, так и осенью точно не установлены. В.С.Моллесон (1896) наблюдал ее в окрестностях Троицкосавска (Южное Забайкалье) в конце апреля-начале мая. В коллекции Зоологического института РАН имеются тушки этих птиц, добытые в мае в дельте р. Селенги во время ве-сеннего пролета и в краеведческом музее г. Улан-Удэ одна тушка гагары из Баргузинского заповедника, отстреленная в августе (Измайлов, Боровицкая, 1973). Этим ограничиваются некоторые данные о сроках их пролета в бассейне озера Байкал.', 'Основными местами обитания в гнездовой период являются сильно заболоченные прибрежные низменности, иногда встречаются на озерах у верхней границы лесного пояса гор. Во время пролета останавливаются на оз. Байкал, в устья крупных рек, широких речных долинах с мелкими озе-рами. \r\nВ прошлом краснозобая гагара, вероятно, относилась к обычным гнездящимся птицам заболоченного перешейка полуострова Святой Нос (Туров, 1923), устья р. Верхняя Ангара (Гагина, 1961). В настоящее время ситуация несколько изменилась - повсюду в исследуемом регионе она стала очень редкой (Измайлов, Боровицкая, 1973; Елаев и др., 1995).\r\n', 1, '1481549917_gag1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `family`
--

CREATE TABLE `family` (
  `family_id` int(11) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `family_name_lat` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `family`
--

INSERT INTO `family` (`family_id`, `family_name`, `family_name_lat`, `author`) VALUES
(1, 'Гагаровые', 'Gaviidae', 0),
(3, 'Поганковые', 'Podicipedidae', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `kind`
--

CREATE TABLE `kind` (
  `kind_id` int(11) NOT NULL,
  `kind_name` varchar(255) NOT NULL,
  `kind_name_lat` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kind`
--

INSERT INTO `kind` (`kind_id`, `kind_name`, `kind_name_lat`, `author`) VALUES
(1, 'Гагары', 'Gavia', 0),
(3, 'Поганки', 'Podiceps Lath.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`place_id`, `place_name`, `author`) VALUES
(1, 'Байкал', 0),
(2, 'Улан-Удэ', 0),
(3, 'Мухоршибирь', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `population`
--

CREATE TABLE `population` (
  `population_id` int(11) NOT NULL,
  `population_designations` varchar(255) NOT NULL,
  `population` varchar(255) NOT NULL,
  `population_description` varchar(255) NOT NULL,
  `population_dimension_start` float NOT NULL,
  `population_dimension_end` float NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `population`
--

INSERT INTO `population` (`population_id`, `population_designations`, `population`, `population_description`, `population_dimension_start`, `population_dimension_end`, `author`) VALUES
(2, 'PPP', 'очень редкий', 'встречен 1-5 раз за все годы исследований', 0.001, 0.09, 0),
(3, 'PP', 'редкий', 'встречен 6-10 раз за все годы исследований', 0.1, 0.9, 0),
(4, 'P', 'малочисленный', 'встречается регулярно, но не ежегодно', 1, 5.9, 0),
(5, 'C', 'обычный', 'встречается регулярно, но не ежедневно', 6, 9.9, 0),
(6, 'CC', 'многочисленный', 'встречается 1-10 и более раз за дневную экскурсию', 10, 99.9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `population_connect`
--

CREATE TABLE `population_connect` (
  `population_connect_id` int(11) NOT NULL,
  `bird_id` int(11) NOT NULL,
  `population_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `population_connect`
--

INSERT INTO `population_connect` (`population_connect_id`, `bird_id`, `population_id`, `place_id`) VALUES
(5, 1, 4, 3),
(6, 2, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `squad`
--

CREATE TABLE `squad` (
  `squad_id` int(11) NOT NULL,
  `squad_name` varchar(255) NOT NULL,
  `squad_name_lat` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `squad`
--

INSERT INTO `squad` (`squad_id`, `squad_name`, `squad_name_lat`, `author`) VALUES
(1, 'ГАГАРООБРАЗНЫЕ', 'GAVIIFORMES', 0),
(5, 'ПОГАНКООБРАЗНЫЕ', 'PODICIPEDIFORMES', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `author`) VALUES
(1, 'Перелетный', 0),
(2, 'Залетный', 0),
(4, 'Редкий', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `status_connect`
--

CREATE TABLE `status_connect` (
  `status_connect_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `bird_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status_connect`
--

INSERT INTO `status_connect` (`status_connect_id`, `status_id`, `bird_id`) VALUES
(9, 1, 1),
(10, 2, 1),
(11, 1, 2),
(12, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `groups` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `description`, `groups`) VALUES
(1, 'admin', 'admin', 2, 'admin', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bird`
--
ALTER TABLE `bird`
  ADD PRIMARY KEY (`bird_id`);

--
-- Индексы таблицы `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_id`);

--
-- Индексы таблицы `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`kind_id`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Индексы таблицы `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`population_id`);

--
-- Индексы таблицы `population_connect`
--
ALTER TABLE `population_connect`
  ADD PRIMARY KEY (`population_connect_id`);

--
-- Индексы таблицы `squad`
--
ALTER TABLE `squad`
  ADD PRIMARY KEY (`squad_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `status_connect`
--
ALTER TABLE `status_connect`
  ADD PRIMARY KEY (`status_connect_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bird`
--
ALTER TABLE `bird`
  MODIFY `bird_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `family`
--
ALTER TABLE `family`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `kind`
--
ALTER TABLE `kind`
  MODIFY `kind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `population`
--
ALTER TABLE `population`
  MODIFY `population_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `population_connect`
--
ALTER TABLE `population_connect`
  MODIFY `population_connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `squad`
--
ALTER TABLE `squad`
  MODIFY `squad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `status_connect`
--
ALTER TABLE `status_connect`
  MODIFY `status_connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
