-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 06 2020 г., 09:21
-- Версия сервера: 5.6.43
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) UNSIGNED NOT NULL,
  `author` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `author`) VALUES
(9, 'Водка от Коронавируса', 'По сети гуляют фотографии водки «Антивирус», которую уже вовсю хотят применить жители России, чтобы спастись от китайской заразы.', 'По сети гуляют фотографии водки «Антивирус», которую уже вовсю хотят применить жители России, чтобы спастись от китайской заразы.\n\nКогда сообщили, что Коронавирус боится алкоголя и высоких температур, люди не стали ждать повторения, а пошли проспиртовываться и заниматься профилактикой в ближайший алкомаркет. Да что там Россия, нам известно, что и в Китае наши соотечественники пользуются этим методом. Поэтому появление водки «Антивирус» никого не смутило, даже, наоборот, это было вполне ожидаемо. Что уж говорить, наша команда вообще побежала в поисках новинки, подивившись, что у нас в WineStreet ее еще нет.', 1580937458, 'jora'),
(8, 'jQuery функция $.ajax()', 'jQuery функция $.ajax() позволяет выполнить асинхронный AJAX запрос. AJAX (от англ. Asynchronous Javascript and XML — &#34;асинхронный JavaScript и XML&#34;) — подход к построению интерактивных пользовательских интерфейсов веб-приложений, заключающийся в &#34;фоновом&#34; обмене данными браузера с веб-сервером.', 'jQuery функция $.ajax() лежит в основе всех AJAX запросов, отправленных с использованием jQuery. Не смотря на то, что функция $.ajax() может использоваться более гибко, в большинстве случаев в этом нет необходимости. В jQuery существуют такие альтернативные методы как $.get() и .load(), которые проще в использовании.', 1580936985, 'dima');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `mess` text NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(1, 'John', 'Статья огонь!!!', 7),
(3, 'jora', 'Просто новый комментарий!!!', 5),
(4, 'jora', '))', 5),
(5, 'dima', 'aga!!!', 7),
(6, 'dima', 'aga!!!', 7),
(7, 'dima', 'Первый комментарий!', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(25, 'Макс', 'max@rambler.com', 'Redactor', '7ac44271676b5088be8a4b69fd26e15a'),
(28, 'Jordg', 'jordg@yahoo.com', 'jora', '9fb393e4c54dda4a6c9fb2c04351530c'),
(23, 'Жора', 'gora@mail.com', 'gorka', '03c50dd91fb2ed6bbac1e34d2ae8938c'),
(22, 'Дмитрий', 'dmitry@mail.com', 'Admin', '9fb393e4c54dda4a6c9fb2c04351530c'),
(29, 'Dima', 'dima@gmail.com', 'dima', 'b04f11cd561613c67a5d96fe98676670');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
