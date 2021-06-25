-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2021 г., 14:21
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `record_id` int(4) NOT NULL,
  `client` int(4) NOT NULL,
  `car` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `repair` int(4) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_time` int(2) NOT NULL,
  `to_time` int(2) NOT NULL,
  `problem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`record_id`, `client`, `car`, `repair`, `date`, `from_time`, `to_time`, `problem`, `access`) VALUES
(16, 18, 'Ваз', 5, '25.06.2021', 12, 14, 'Попал воздух в систему, требуется восстановить герметичность системы, заменить тормозную жидкость и колодки', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `repair`
--

CREATE TABLE `repair` (
  `repair_id` int(4) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(2) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `repair`
--

INSERT INTO `repair` (`repair_id`, `name`, `time`, `price`) VALUES
(1, 'Диагностика ходовой (500р)', 1, 500),
(2, 'Диагностика электрики (800р)', 1, 800),
(3, 'Диагностика двигателя (500р)', 1, 500),
(4, 'Замена масла (300р)', 1, 300),
(5, 'Обсуживание тормозной системы (1000р)', 2, 1000),
(6, 'Ремонт двигателя (10000р)', 10, 10000),
(7, 'Ремонт КПП - АТ (10000р)', 8, 10000),
(8, 'Ремонт КПП - МТ (6000р)', 5, 6000),
(9, 'Ремонт ходовой (4000р)', 3, 4000),
(10, 'Ремонт электрики (2000р)', 2, 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `category` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `category`, `name`, `phone`, `password`) VALUES
(18, 'user', 'Василий', '81112223344', '1'),
(21, 'admin', 'Администратор', '89997771122', '777'),
(22, 'user', 'Дмитрий', '82223334455', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`record_id`);

--
-- Индексы таблицы `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`repair_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `record_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `repair`
--
ALTER TABLE `repair`
  MODIFY `repair_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
