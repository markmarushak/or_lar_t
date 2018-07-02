-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 02 2018 г., 11:36
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
-- Структура таблицы `affiliates_partners`
--

CREATE TABLE `affiliates_partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `affiliates_partners`
--

INSERT INTO `affiliates_partners` (`id`, `description`, `country`, `type`, `created_at`, `updated_at`) VALUES
(34, 'tes', 'fgsdfg', 'Partner', '2018-06-25 09:58:13', '2018-06-26 08:25:13'),
(39, '453543t', 'fhdgdhgfh', 'Affiliate', '2018-06-26 11:25:28', '2018-06-26 11:23:07'),
(40, '654ryt', 'gfjgj', 'Partner', '2018-06-26 11:26:02', '2018-06-26 11:26:02'),
(41, 'mkljlkj', 'Norway', 'Partner', '2018-06-27 12:29:15', '2018-06-27 09:29:24'),
(42, 'Johnny', 'Spain', 'Partner', '2018-06-27 13:16:18', '2018-06-28 06:50:50');

-- --------------------------------------------------------

--
-- Структура таблицы `data_filters_rules`
--

CREATE TABLE `data_filters_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('email') COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit` enum('edit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_filters_rules`
--

INSERT INTO `data_filters_rules` (`id`, `description`, `category`, `source`, `type`, `edit`, `status`, `country`, `created_at`) VALUES
(1, 'Garasje-Tilbud.no', 'Building Accesories', 'Form', 'email', 'edit', 'active', 'Norway', NULL);

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2018_04_18_075150_add_user_roles', 1),
(11, '2018_04_20_084615_create_data_filters_rules_table', 1),
(12, '2018_05_10_150229_create_setting_of_data_bases', 1),
(13, '2018_06_18_153042_create_affiliates_partners_table', 1);

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
-- Структура таблицы `project_partners`
--

CREATE TABLE `project_partners` (
  `id` int(11) NOT NULL,
  `affiliate_partner_id` int(11) NOT NULL,
  `data_filters_rules_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_partners`
--

INSERT INTO `project_partners` (`id`, `affiliate_partner_id`, `data_filters_rules_id`) VALUES
(1, 34, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `setting_of_data_bases`
--

CREATE TABLE `setting_of_data_bases` (
  `id` int(11) NOT NULL,
  `data_filters_rules_id` int(11) DEFAULT NULL,
  `setting` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `setting_of_data_bases`
--

INSERT INTO `setting_of_data_bases` (`id`, `data_filters_rules_id`, `setting`, `updated_at`, `created_at`) VALUES
(23, 1, 'eyJpdiI6IkFOZkVrTWNrSnVEd3B6b254c2IwQVE9PSIsInZhbHVlIjoidXNtZlwvSlJubFwvSVpCY2l0TE03dlE4MFFMUHhnMm9BMTZXcmc2UHg3b1I3cVNLYjFjQjBOZmVmXC9GMlRKMXd2OW83MW0yQVJKR25Mc2NIRUJkQmhtU1hzS29tUGpCYWhTY2Y3VWVVZGxcL1cyTEJZWXBGNG15R2ttV3JaVVJOQ0tnZzd1cTVrK1R3M25pZHBwTVQ5emxtdExGejlXVE5jbnE3QVR5SWFjV1QwYzJ4WjdmVGcrWDFpNHpqTVlJU0wyY1drcHhiZ2c1M01NSVB2cDBNSlwvbGR0T29sMktvVVUyMjF3c3VnTjAzSmEySVg3YW1STm5hNzFxZEZzTUU2XC9Rd1NGNFhOY2NNM1ZzVXprcTl0TmNmNjdrMGZ5ZDl5NVZ1Zmp1U0tiRStjR2p5WjAwUkRETVB2aVwvRktKdkp0a2NKRE5zbkFXY2s1ZFlPODNrRU1rR09Odz09IiwibWFjIjoiZWMwNzY1NWQ3YzE0NDAxMmRmOTJiYTBhYzQ0NDc2NTU1ZTZlM2Q0OTQzOGM4NmNhMWY2NzYwMTc4YTYxNzczNyJ9', '2018-06-29 15:59:53', '2018-06-29 15:37:27');

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
(1, 'User', 'member@orbitleads.com', '$2y$10$ME.6zl7ToR.IF2NZRKw87eKRMFzCRIVh4cI6QfHWtLPM2j8nCBWTW', 't9AxB80SPQ6oJLnP5rsQsJJIjC5GPAzXwJBTnr9f74RZVXJXgJ6u49QYKmEL', '2018-04-13 06:50:05', '2018-04-13 06:50:05', 'member');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `affiliates_partners`
--
ALTER TABLE `affiliates_partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data_filters_rules`
--
ALTER TABLE `data_filters_rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_filters_rules_id` (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_partners`
--
ALTER TABLE `project_partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting_of_data_bases`
--
ALTER TABLE `setting_of_data_bases`
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
-- AUTO_INCREMENT для таблицы `affiliates_partners`
--
ALTER TABLE `affiliates_partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `data_filters_rules`
--
ALTER TABLE `data_filters_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `project_partners`
--
ALTER TABLE `project_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `setting_of_data_bases`
--
ALTER TABLE `setting_of_data_bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
