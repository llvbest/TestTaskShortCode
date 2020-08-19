-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 14 2020 г., 00:23
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='новость';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `preview`, `content`, `id_autor`) VALUES
(1, 'title1', 'new year sensation', 'world sensation world sensation world sensation', 1),
(2, 'title2', '2new year sensation', '2world sensation world sensation world sensation', 1),
(3, 'title3', '3new year sensation', '3world sensation world sensation world sensation', 2),
(4, 'title4', '4new year sensation', 'world sensation world sensation world sensation', 1),
(5, 'title5', '5new year sensation', '2world sensation world sensation world sensation', 1),
(6, 'title6', '6new year sensation', '3world sensation world sensation world sensation', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news2rubric`
--

CREATE TABLE `news2rubric` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_rubric` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news2rubric`
--

INSERT INTO `news2rubric` (`id`, `id_news`, `id_rubric`) VALUES
(1, 3, 5),
(2, 3, 2),
(3, 2, 2),
(4, 1, 2),
(5, 4, 3),
(6, 5, 3),
(7, 6, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `rubric`
--

CREATE TABLE `rubric` (
  `id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rubric`
--

INSERT INTO `rubric` (`id`, `lft`, `rgt`, `depth`, `name`) VALUES
(1, 1, 14, 0, 'All'),
(2, 8, 13, 1, 'Общество'),
(3, 9, 10, 2, 'городская жизнь'),
(4, 11, 12, 2, 'выборы'),
(5, 2, 7, 1, 'День города'),
(6, 3, 4, 2, 'салюты'),
(7, 5, 6, 2, 'детская площадка');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news2rubric`
--
ALTER TABLE `news2rubric`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rubric`
--
ALTER TABLE `rubric`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news2rubric`
--
ALTER TABLE `news2rubric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `rubric`
--
ALTER TABLE `rubric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
