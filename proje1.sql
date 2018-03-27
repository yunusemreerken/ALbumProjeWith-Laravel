-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 27 Mar 2018, 18:49:12
-- Sunucu sürümü: 5.7.21-0ubuntu0.16.04.1
-- PHP Sürümü: 7.2.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_24_122239_create_proje_table', 2),
(4, '2018_03_24_122320_create_resimler_table', 2),
(5, '2018_03_24_132302_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'proje 1', NULL, NULL),
(2, 'proje 2', NULL, NULL),
(3, 'proje 3', NULL, NULL),
(4, 'proje 4', NULL, NULL),
(5, 'proje 5', NULL, NULL),
(6, 'sdf', NULL, NULL),
(7, 'sdf', NULL, NULL),
(8, 'admin', NULL, NULL),
(9, 'admin', NULL, NULL),
(10, 'admin', NULL, NULL),
(11, 'saat1', NULL, NULL),
(12, 'saat1', NULL, NULL),
(13, 'saat1', NULL, NULL),
(14, 'saat1', NULL, NULL),
(15, 'saat1', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(10) UNSIGNED NOT NULL,
  `proje_id` int(11) NOT NULL,
  `image_path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yorum` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no comment',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `proje_id`, `image_path`, `image_name`, `yorum`, `created_at`, `updated_at`) VALUES
(35, 4, '/tmp/phpY6axfJ', '1522141664.png', 'no comment', NULL, NULL),
(36, 4, '/tmp/php5tQy5T', '1522142182.png', 'no comment', NULL, NULL),
(37, 5, '/tmp/php5GUUNZ', '1522143123.png', 'no comment', NULL, NULL),
(38, 5, '/tmp/phpIdJP81', '1522156366.jpg', 'no comment', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim_rating`
--

CREATE TABLE `resim_rating` (
  `id` int(111) NOT NULL,
  `user_id` int(111) NOT NULL,
  `resim_id` int(111) NOT NULL,
  `rating` int(111) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `resim_rating`
--

INSERT INTO `resim_rating` (`id`, `user_id`, `resim_id`, `rating`) VALUES
(7, 1, 36, 3),
(8, 1, 37, 4),
(9, 1, 35, 3),
(10, 1, 36, 3),
(11, 1, 37, 4),
(12, 1, 36, 3),
(13, 1, 36, 3),
(14, 2, 36, 4),
(15, 3, 36, 4),
(16, 3, 37, 2),
(17, 3, 36, 3),
(18, 2, 35, 4),
(19, 2, 36, 3),
(20, 2, 35, 4),
(21, 2, 37, 3),
(22, 3, 36, 4),
(23, 2, 36, 3),
(24, 2, 38, 2),
(25, 2, 38, 4),
(26, 2, 35, 1),
(27, 2, 36, 1),
(28, 3, 38, 1),
(29, 3, 35, 3),
(30, 3, 35, 3),
(31, 3, 36, 4),
(32, 3, 36, 5),
(33, 3, 36, 5),
(34, 3, 36, 5),
(35, 3, 36, 3),
(36, 3, 37, 3),
(37, 3, 36, 4),
(38, 3, 37, 5),
(39, 3, 37, 1),
(40, 3, 37, 1),
(41, 3, 37, 3),
(42, 3, 36, 2),
(43, 3, 36, 2),
(44, 3, 36, 1),
(45, 3, 35, 2),
(46, 3, 35, 3),
(47, 3, 35, 1),
(48, 3, 35, 5),
(49, 3, 35, 5),
(50, 3, 35, 5),
(51, 3, 35, 5),
(52, 3, 36, 5),
(53, 3, 36, 3),
(54, 3, 35, 4),
(55, 3, 38, 4),
(56, 3, 35, 3),
(57, 3, 36, 1),
(58, 3, 36, 1),
(59, 3, 36, 5),
(60, 3, 38, 5),
(61, 3, 38, 5),
(62, 3, 35, 3),
(63, 3, 35, 5),
(64, 3, 36, 5),
(65, 3, 37, 1),
(66, 3, 37, 1),
(67, 3, 38, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', '$2y$10$Z3.P0q6VQK9w3jcWEuCe8.9t5suu498v78b.PvTFs4LFDO1Xij7Bm', 1, 'v6AA4GpDKEG4Xd8aGGSwaxjD3ztjvdp0zzUlOQx3tsmWfnn5FU6RSIkhiZQ0', '2018-03-24 09:20:14', '2018-03-24 09:20:14'),
(2, 'yunus emre erken', 'yunusemre@gmail.com', '$2y$10$Zg2v3rG6bbHYadmypvzfLe6YIJR1eobGuV78eGQ4qVtQScnNcZW6G', 0, 'msZv7cPwuwTD8NUPRU0jK4RqrFsZ0yUwJDnGlddIr1na1QYt2kvJ4f4pvKtR', '2018-03-24 09:21:08', '2018-03-24 09:21:08'),
(3, 'murat saygılı', 'msaygili@gmail.com', '$2y$10$J1EztHsvBPh/0v.g8nNnCeAmk7YqRNMFOOUM62CVbOXkye5Acve8e', 1, '5aQkMsUqRazDYjnRg8w6T1CiOBa4tDhwYfOyXYProeVlXPp0Z7LW0NKLed2S', '2018-03-25 16:34:42', '2018-03-25 16:34:42');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resim_rating`
--
ALTER TABLE `resim_rating`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Tablo için AUTO_INCREMENT değeri `resim_rating`
--
ALTER TABLE `resim_rating`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
