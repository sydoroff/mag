-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 01 2019 г., 00:48
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mag`
--

--
-- Очистить таблицу перед добавлением данных `categories`
--

TRUNCATE TABLE `categories`;
--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `up_cat`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Компьютеры', NULL, 0, 1, NULL, NULL);

--
-- Очистить таблицу перед добавлением данных `categories_to_products`
--

TRUNCATE TABLE `categories_products`;
--
-- Дамп данных таблицы `categories_to_products`
--

INSERT INTO `categories_products` (`id`, `categories_id`, `products_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 9, NULL, NULL),
(3, 1, 7, NULL, NULL),
(4, 1, 1, NULL, NULL),
(5, 1, 5, NULL, NULL);

--
-- Очистить таблицу перед добавлением данных `orders`
--

TRUNCATE TABLE `orders`;
--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, '', NULL, NULL),
(2, 1, '', NULL, NULL),
(3, 2, '', NULL, NULL),
(4, 1, '', NULL, NULL),
(5, 2, '', NULL, NULL);

--
-- Очистить таблицу перед добавлением данных `orders_to_products`
--

TRUNCATE TABLE `orders_products`;
--
-- Дамп данных таблицы `orders_to_products`
--

INSERT INTO `orders_products` (`id`, `orders_id`, `products_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '0.00', NULL, NULL),
(2, 1, 7, '0.00', NULL, NULL),
(3, 2, 6, NULL, NULL, NULL),
(4, 2, 9, NULL, NULL, NULL),
(5, 3, 8, NULL, NULL, NULL),
(6, 4, 7, NULL, NULL, NULL),
(7, 5, 2, NULL, NULL, NULL),
(8, 5, 9, NULL, NULL, NULL);

--
-- Очистить таблицу перед добавлением данных `password_resets`
--

TRUNCATE TABLE `password_resets`;
--
-- Очистить таблицу перед добавлением данных `products`
--

TRUNCATE TABLE `products`;
--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `articul`, `brand`, `image_path`, `description`, `price`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Gigabyte Brix Black (GB-BACE-3010)', NULL, NULL, NULL, NULL, '4387.00', 0, NULL, NULL),
(2, 'ARTLINE Business B21 v01 (B21v01)', NULL, NULL, NULL, NULL, '4390.00', 0, NULL, NULL),
(5, 'Intel NUC Kit CMD-J3455 (NUC6CAYH)', NULL, NULL, NULL, NULL, '4444.00', 0, NULL, NULL),
(6, 'Qbox I0102 (87183)', NULL, NULL, NULL, NULL, '4444.00', 0, NULL, NULL),
(7, 'Everest Thin Client 1001 (1001_2301)', NULL, NULL, NULL, NULL, '4452.00', 0, NULL, NULL),
(8, 'Patriot Thin Clients J1800', NULL, NULL, NULL, NULL, '4500.00', 0, NULL, NULL),
(9, 'Asus Mini PC PN40-BB014MC (90MS0181-M00140)', NULL, NULL, NULL, NULL, '4699.00', 0, NULL, NULL),
(10, 'Patriot Thin Clients J1800 F-d8', NULL, NULL, NULL, NULL, '4700.00', 0, NULL, NULL);

--
-- Очистить таблицу перед добавлением данных `users`
--

TRUNCATE TABLE `users`;
--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1@gmail.com', NULL, 1, NULL, '$2y$10$eVWK2kzMAnEx2wXtR5Fhd.KEQgZOG/EsRKPJ5QQgAMdEUwx2GbEDK', 'skKvjTqwLYe8RFskAXG9iZSBmzdYAEbbO2aku7UqT9ZSwXj6aLMEsSADUOHx', '2019-01-30 17:44:16', '2019-01-30 17:44:16'),
(2, 'user', '2@gmail.com', NULL, 0, NULL, '$2y$10$aq1mPvjbs0mg7YI1MCafwuVmUy1pTN4Fdzyw.ss927EpYztiqZyye', 'ZngwAVS5j6v9ZdqSLspIYi9y12soKeyUYksHWg5iWPaatZauaQjw7Y0lEpaF', '2019-01-30 21:05:00', '2019-01-30 21:05:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
