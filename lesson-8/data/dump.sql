-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 13 2019 г., 13:25
-- Версия сервера: 5.7.25
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gu_php1_l6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `id_order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `status`, `id_order`, `created_at`) VALUES
(83, 1, NULL, '2019-08-05 12:24:58'),
(84, 1, NULL, '2019-08-05 12:47:37'),
(85, 1, NULL, '2019-08-08 13:55:59'),
(86, 1, 24, '2019-08-08 16:20:59'),
(87, 1, 30, '2019-08-08 16:24:25'),
(88, 1, 33, '2019-08-08 16:25:51'),
(89, 1, 35, '2019-08-08 16:26:17'),
(90, 1, 37, '2019-08-08 16:27:46'),
(91, 1, 38, '2019-08-08 16:28:55'),
(92, 1, 39, '2019-08-08 16:31:00'),
(93, 1, 40, '2019-08-08 16:31:26'),
(94, 1, 50, '2019-08-08 16:43:39'),
(95, 1, 52, '2019-08-08 16:44:33'),
(96, 1, 55, '2019-08-08 16:48:17'),
(97, 1, NULL, '2019-08-08 16:48:51');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `message` varchar(4096) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `message`, `datetime`) VALUES
(6, 'ewrwrwer', 'werwerwerwre', '2019-06-24 08:11:06'),
(7, 'sadasd', 'asdasd', '2019-07-03 13:28:52');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `info` varchar(2048) NOT NULL,
  `id_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `info`, `id_user`) VALUES
(1, 'Админasdas', 'dasdasd', 'asdas', 'dasdasd', 1),
(2, 'Админ111111', '1111111', '11111111', '11111111111111', 1),
(3, 'Админ111111', '1111111', '11111111', '11111111111111', 1),
(4, 'Админasdasd', 'asda', 'sdasdasd', 'asdasdasd', 1),
(5, 'Админ```````', '````````````', '````````', '`````````````````', 1),
(6, 'Админ`11111111', '111111', '1111111', '11111111111', 1),
(7, 'Игорь', '+79261220379', 'На деревню дедушке', 'с 10 до 18', 1),
(8, ' user.name ', '111111111111', 'newuseradress', '', 16),
(9, ' user.name ', '111111111111', 'newuseradress', '', 16),
(10, ' user.name ', '111111111111', 'newuseradress', '', 16),
(11, ' user.name ', '111111111111', 'newuseradress', '', 16),
(12, ' user.name ', '111111111111', 'newuseradress', '', 16),
(13, ' user.name ', '111111111111', 'newuseradress', '', 16),
(14, ' user.name ', '111111111111', 'newuseradress', '', 16),
(15, ' user.name ', '111111111111', 'newuseradress', '', 16),
(16, ' user.name ', '111111111111', 'newuseradress', '', 16),
(17, ' user.name ', '111111111111', 'newuseradress', '', 16),
(18, ' user.name ', '111111111111', 'newuseradress', '', 16),
(19, ' user.name ', '111111111111', 'newuseradress', '', 16),
(20, ' user.name ', '111111111111', 'newuseradress', '', 16),
(21, ' user.name ', '111111111111', 'newuseradress', '', 16),
(22, ' user.name ', '111111111111', 'newuseradress', '', 16),
(23, ' user.name ', '111111111111', 'newuseradress', '', 16),
(24, 'newuser', '111111111111', 'newuseradress', 'фываываыва', 16),
(25, 'newuser', '111111111111', 'newuseradress', 'фываываыва', 16),
(26, 'newuser', '111111111111', 'newuseradress', 'фываываыва', 16),
(27, 'newuser', '111111111111', 'newuseradress', 'фываываыва', 16),
(28, 'newuser', '111111111111', 'newuseradress', 'фываываыва', 16),
(29, 'newuser', '111111111111', 'newuseradress', 'фываываыва', 16),
(30, 'newuser', '111111111111', 'newuseradress', '', 16),
(31, 'newuser', '111111111111', 'newuseradress', '', 16),
(32, 'newuser', '111111111111', 'newuseradress', '', 16),
(33, 'newuser', '111111111111', 'newuseradress', '', 16),
(34, 'newuser', '111111111111', 'newuseradress', '', 16),
(35, 'newuser', '111111111111', 'newuseradress', '', 16),
(36, 'newuser', '111111111111', 'newuseradress', '', 16),
(37, 'newuser', '111111111111', 'newuseradress', '', 16),
(38, 'newuser', '111111111111', 'newuseradress', '', 16),
(39, 'newuser', '111111111111', 'newuseradress', '', 16),
(40, 'newuser', '111111111111', 'newuseradress', '', 16),
(41, 'newuser', '111111111111', 'newuseradress', '', 16),
(42, 'newuser', '111111111111', 'newuseradress', '', 16),
(43, 'newuser', '111111111111', 'newuseradress', '', 16),
(44, 'newuser', '111111111111', 'newuseradress', 'ыфвфыв', 16),
(45, 'newuser', '111111111111', 'newuseradress', 'ыфвфыв', 16),
(46, 'newuser', '111111111111', 'newuseradress', 'ыфвфыв', 16),
(47, 'newuser', '111111111111', 'newuseradress', 'ыфвфыв', 16),
(48, 'newuser', '111111111111', 'newuseradress', 'ыфвфыв', 16),
(49, 'newuser', '111111111111', 'newuseradress', '', 16),
(50, 'newuser', '111111111111', 'newuseradress', '', 16),
(51, 'newuser', '111111111111', 'newuseradress', '', 16),
(52, 'newuser', '111111111111', 'newuseradress', 'sadadas', 16),
(53, 'newuser', '111111111111', 'newuseradress', 'sadadas', 16),
(54, 'newuser', '111111111111', 'newuseradress', '', 16),
(55, 'newuser', '111111111111', 'newuseradress', 'sdads', 16),
(56, 'newuser', '111111111111', 'newuseradress', 'sdads', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`) VALUES
(1, 'created'),
(2, 'ordered');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `img` varchar(256) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`) VALUES
(1, 'Ноутбук', 'soon.png', 'Ноутбук', 40000),
(2, 'Телефон', 'soon.png', 'Телефон', 19999),
(3, 'Клавиатура', 'soon.png', 'Телефон', 1200),
(4, 'Мышка', 'soon.png', 'Мышка', 799);

-- --------------------------------------------------------

--
-- Структура таблицы `products_in_cart`
--

CREATE TABLE `products_in_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_in_cart`
--

INSERT INTO `products_in_cart` (`id`, `product_id`, `cart_id`, `quantity`) VALUES
(20, 2, 83, 3),
(21, 3, 83, 3),
(22, 1, 83, 1),
(23, 4, 83, 3),
(29, 2, 86, 1),
(30, 4, 86, 2),
(31, 4, 87, 3),
(32, 3, 88, 3),
(33, 3, 89, 2),
(34, 3, 90, 2),
(35, 3, 91, 2),
(36, 2, 92, 2),
(37, 4, 93, 2),
(38, 2, 93, 1),
(39, 3, 94, 5),
(40, 2, 94, 1),
(41, 1, 94, 4),
(42, 4, 94, 1),
(43, 4, 95, 3),
(44, 3, 95, 3),
(45, 3, 96, 2),
(46, 2, 96, 2),
(47, 1, 96, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'guest');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(512) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`, `email`, `phone`, `address`, `role_id`) VALUES
(1, 'admin', 'Админ', '$2y$10$yU3oIE2XI.I95PdWTfE68.I1ILMFUOu95eZv.6oHpEpbau4N52PgW', 'mail@mail.me', '+79261220379', 'Студенческая 28', 1),
(2, 'moderator', 'Модератор', '$2y$10$t/nQVihvUJClgEKBwjOrUu/LUnlhg65EdDDlaZNO/XyCxt0xK6I/m', 'mail@mail.me', '', '', 2),
(16, 'newuser', 'newuser', '$2y$10$mlwm1G3v8PW95R7KRdbDX.O3OFhl5SJsMNjVB5kuw7GdoRU8uMQoC', 'newuser@mail.me', '111111111111', 'newuseradress', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_in_cart`
--
ALTER TABLE `products_in_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products_in_cart`
--
ALTER TABLE `products_in_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`status`) REFERENCES `order_statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products_in_cart`
--
ALTER TABLE `products_in_cart`
  ADD CONSTRAINT `products_in_cart_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `products_in_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
