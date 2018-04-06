-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Nis 2018, 14:30:02
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

--
-- Tablo döküm verisi `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('msaygili@gmail.com', '$2y$10$BaHkkeG2beSwedXMFTqBZOmdqzy6FlQrRUNGa8yLx8zdfilq9KjMK', '2018-03-28 05:40:21'),
('yunusemre@gmail.com', '$2y$10$CGO.J7fUjpd2zBD9oyIx..x3.cBqr9fZQLfxxyC0tru9wID0qtgOK', '2018-03-28 05:49:44'),
('ynsmrrkn@gmail.com', '$2y$10$ByCLdCz8C43ZfNiEa7yVGuBZ4e6g8epRQ8tikev0/.K14zgddvhpq', '2018-03-28 05:53:50');

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
(6, 'proje 6', NULL, NULL),
(7, 'proje 7', NULL, NULL),
(10, 'proje 8', NULL, NULL),
(11, 'proje 9', NULL, NULL),
(12, 'admin', NULL, NULL),
(13, 'saat 15', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `proje_id` int(11) NOT NULL,
  `image_path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `proje_id`, `image_path`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 1, '/tmp/phpe9cqjd', '1522412640.png', NULL, NULL),
(11, 2, '/tmp/phpAqz5lj', '1522763215.png', NULL, NULL),
(12, 4, '/tmp/php5QE56C', '1522838270.png', NULL, NULL),
(13, 3, '/tmp/phpxyNXC2', '1522847724.jpg', NULL, NULL),
(14, 3, '/tmp/phpIaD8UF', '1522847800.jpg', NULL, NULL),
(15, 3, '/tmp/phpYyAHso', '1522847837.jpg', NULL, NULL),
(16, 3, '/tmp/phptV3etx', '1522847868.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim_rating`
--

CREATE TABLE `resim_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resim_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `resim_rating`
--

INSERT INTO `resim_rating` (`id`, `user_id`, `resim_id`, `rate`) VALUES
(53, 2, 1, 4),
(54, 2, 11, 4),
(55, 2, 14, 2),
(56, 2, 13, 1),
(57, 2, 15, 2),
(58, 2, 16, 1),
(59, 2, 12, 2),
(60, 1, 11, 2),
(61, 1, 12, 4),
(62, 1, 1, 1),
(63, 1, 14, 4),
(64, 1, 15, 2),
(65, 1, 13, 3),
(66, 1, 16, 2),
(67, 6, 14, 4),
(68, 6, 16, 3),
(69, 6, 15, 4),
(70, 6, 13, 4),
(71, 6, 12, 4),
(72, 6, 11, 4);

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
(1, 'admin', 'admin@test.com', '$2y$10$Z3.P0q6VQK9w3jcWEuCe8.9t5suu498v78b.PvTFs4LFDO1Xij7Bm', 1, 'XLmSDURZWbef87Pzhgpz1gqol6ANmWp9PCkVQFuurR7fsNrVFISvisOzetTw', '2018-03-24 09:20:14', '2018-03-24 09:20:14'),
(2, 'yunus emre erken', 'yunusemre@gmail.com', '$2y$10$Zg2v3rG6bbHYadmypvzfLe6YIJR1eobGuV78eGQ4qVtQScnNcZW6G', 0, 'cSyRv37SxG3xhXbB2H9ksL6R4wOeipwGXK74KV1BA6wfWuM5rZGBCmzEaL1m', '2018-03-24 09:21:08', '2018-03-24 09:21:08'),
(3, 'murat saygılı', 'msaygili@gmail.com', '$2y$10$J1EztHsvBPh/0v.g8nNnCeAmk7YqRNMFOOUM62CVbOXkye5Acve8e', 1, 'QBMvD1ZeeKx85fC797BzUqRbdfAKgmSC5nc5FJ21MWYFNhNhB3nbSXlwZhlv', '2018-03-25 16:34:42', '2018-03-25 16:34:42'),
(4, 'yüsra erken', 'yusra@gmail.com', '$2y$10$QeP4V.hCHl53ZsyXTtlC6.LE0rTh7jVKu42R8Qu68FdnuZ4mwyKlC', 0, 'GdUg6SuOZtiauTX0FWvOiWoTpLLXFFTKWKJYoFgkUAjI5xYyJDYTTU3bP3TL', '2018-03-28 04:48:10', '2018-03-28 04:48:10'),
(5, 'yunua', 'ynsmrrkn@gmail.com', '$2y$10$xa3D8UVLhr6kFdR3h/vThOb20//F2K7kjOorm0OstqKA9.I2pLcTi', 0, 'AqYHK36JyEsagErzUTE8SwhpNgJuZfBWaySF9n0aMQ2kp3xV1DtlyA4qi6py', '2018-03-28 05:52:31', '2018-03-28 05:52:31'),
(6, 'yunus emre', 'y@g.com', '$2y$10$uYVOTSrEQX/rTIvXh2BO4eimNQxPa2kj2yOdsOpuyeCEqc5CwcJt2', 0, 'hSufh4uBzp5sVf6yToYf40khMql0VKt8bBZych7jYFqAGEptasCcEyv3Gf4T', '2018-04-05 08:00:58', '2018-04-05 08:00:58');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `resim_rating`
--
ALTER TABLE `resim_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
