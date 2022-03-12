-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 04 2022 г., 16:52
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lenta`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `unit` varchar(12) NOT NULL,
  `price` varchar(15) DEFAULT NULL,
  `old_price` varchar(15) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `weight`, `unit`, `price`, `old_price`, `img`, `category_id`) VALUES
(6, 'Йогурт питьевой АКТИВИА Клубника, земляника 2%, без змж, 870г, Россия, 870 г', 870, 'г', '148', '99', '346715_3.jpg', 9),
(7, 'Печенье LOTTE Choco Pie бисквитное в шоколадной глазури, 12х28г, Россия, 336 г', 336, 'г', '189', '119', '326291_10.jpg', 1),
(8, ' Котлета из филе грудки индейки натуральная ИНДИЛАЙТ, 500г, Россия, 500 г', 500, 'г', '289', '219', '308546_6.jpg', 5),
(9, 'Фарш из свинины и говядины МИРАТОРГ Домашний, 500 г, Россия, 500 г', 500, 'г', '251', '238', '226747.jpg', 5),
(10, ' Сельдь слабосоленая МАТИАС филе, 500г, Беларусь, 500 г', 500, 'г', '318', '302', '228365.jpg', 10),
(11, 'Кофе зерновой LAVAZZA Qualita Oro натуральный жареный, 1кг, Италия, 1 кг', 1000, 'г', '1798', '1893', '273679.jpg', 6),
(12, ' Молоко пастеризованное ДОМИК В ДЕРЕВНЕ Деревенское отборное цельное 3,5–4,5%, без змж, 930мл, Россия, 930 мл', 930, 'мл', '62', '83', '221829.jpg', 9),
(13, 'Сыр PRESIDENT Camembert с белой плесенью 45%, без змж, 125г, Россия, 125 г', 125, 'г', '229', '315', '194273_4.jpg', 9),
(14, 'Бумага туалетная ZEWA Deluxe 3-слоя белая, 8шт, Россия, 8 шт', 8, 'шт', '159', '283', '220745_2.webp', 17);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
