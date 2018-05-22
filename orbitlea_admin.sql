-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 11 2018 г., 13:48
-- Версия сервера: 10.1.29-MariaDB-6
-- Версия PHP: 7.0.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orbitlea_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data_filters_rules`
--

CREATE TABLE `data_filters_rules` (
  `data_filters_rules_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('email') COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit` enum('edit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_filters_rules`
--

INSERT INTO `data_filters_rules` (`data_filters_rules_id`, `description`, `category`, `source`, `type`, `edit`, `status`, `country`) VALUES
(1, 'Garasje-Tilbub.no', 'Building Accesories', 'Form', 'email', 'edit', 'active', 'Norway'),
(2, 'LowCostEnergy.com', 'Gas & Electricity', 'Form', 'email', 'edit', 'active', 'Norway'),
(3, 'Best-Mobile-Network.com', 'Mobile Network', 'Form', 'email', 'edit', 'active', 'Norway'),
(4, 'BestEnergyPrices.co.uk', 'Gas & Electricity', 'Form', 'email', 'edit', 'active', 'Norway');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_18_075150_add_user_roles', 2),
(5, '2018_04_20_084615_create_data_filters_rules_table', 3),
(6, '2018_05_10_150229_create_settings_connection_data_base', 4),
(7, '2018_05_10_150229_create_setting_connection_data_bases', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `setting_data_bases`
--

CREATE TABLE `setting_data_bases` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_filters_rules_id` int(11) NOT NULL,
  `host_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `setting_data_bases`
--

INSERT INTO `setting_data_bases` (`id`, `data_filters_rules_id`, `host_name`, `host`, `port`, `database`, `username`, `password`, `charset`, `collation`, `created_at`, `updated_at`) VALUES
(1, 1, 'garage_dev', '109.199.120.183', '3306', 'weeklyex_wp126', 'weeklyex_wp126', '7d9!SO)pL4', 'utf8mb4', 'utf8mb4_unicode_ci', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'User', 'member@orbitleads.com', '$2y$10$ME.6zl7ToR.IF2NZRKw87eKRMFzCRIVh4cI6QfHWtLPM2j8nCBWTW', 'bk0rnrR8A6RRpyL6lrVvHgoJs5YMfQ8Xr97MJE7lk3JYctpyntXB0yNUOofF', '2018-04-13 06:50:05', '2018-04-13 06:50:05', 'member');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_filters_rules`
--
ALTER TABLE `data_filters_rules`
  ADD PRIMARY KEY (`data_filters_rules_id`),
  ADD UNIQUE KEY `data_filters_rules_id` (`data_filters_rules_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting_data_bases`
--
ALTER TABLE `setting_data_bases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `data_filters_rules`
--
ALTER TABLE `data_filters_rules`
  MODIFY `data_filters_rules_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `setting_data_bases`
--
ALTER TABLE `setting_data_bases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
