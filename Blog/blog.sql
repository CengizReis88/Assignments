-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Mar 2024, 11:27:29
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `contents`
--

INSERT INTO `contents` (`id`, `user_id`, `title`, `slug`, `image`, `body`, `published`, `created_at`) VALUES
(1, 1, 'Parturient nisi a mus ultricies scelerisque suscipit adipiscing parturient.', 'Leo sociosqu auctor lobortis mus interdum platea a potenti porttitor.', 'tia.jpg', 'Ullamcorper mauris donec et cum aliquam vestibulum euismod dictumst cum lobortis sodales primis a parturient lorem parturient vestibulum fermentum class convallis suspendisse a quisque. A vulputate a consequat conubia conubia lobortis justo id quis hac nam nostra libero bibendum interdum cubilia vel natoque parturient a conubia lorem. Eu a parturient convallis a mi sed auctor a dictumst nec a erat eleifend curabitur a habitasse leo. Cras aptent penatibus ad mi auctor inceptos ridiculus faucibus mus dictumst morbi consectetur arcu venenatis blandit eros mattis senectus vestibulum lobortis potenti eros a. At molestie interdum a himenaeos scelerisque aptent lobortis elementum aliquam vestibulum phasellus fusce a per aliquam at elit scelerisque. Cras imperdiet conubia leo a dui suspendisse dictumst adipiscing eleifend ad non pretium vestibulum velit in turpis scelerisque magnis convallis a.\n\nTempor ad netus a pharetra fringilla at ullamcorper a arcu a dignissim odio lorem in nostra sem at feugiat tincidunt et a erat a dui ante dolor interdum. Fringilla ullamcorper suspendisse consectetur ut dui suspendisse a a condimentum phasellus ut scelerisque hac fusce a dis. Vel nunc facilisis vel neque vestibulum proin leo justo nascetur neque amet nisl a dis phasellus ad eros bibendum libero aliquet.\n\nA erat vestibulum suspendisse risus cursus ante accumsan ligula consectetur malesuada a amet vel vehicula lobortis mi a bibendum orci dis suspendisse neque consectetur vulputate.Posuere a id vestibulum donec ipsum facilisi tincidunt tellus commodo faucibus nostra nisi urna ac.', 1, '2024-02-27 20:32:26'),
(2, 1, 'Urna vehicula eros a fringilla vitae nibh.', 'urna', 'cf.jpg', 'Facilisis scelerisque metus nec consectetur a per tincidunt hendrerit ornare a cum inceptos cum mi scelerisque sed sociosqu ullamcorper cras quis elit scelerisque bibendum eu adipiscing commodo. Vestibulum blandit egestas a a etiam consectetur fringilla per urna id parturient nam in nibh integer a ultricies sem primis turpis ac a vitae pretium sociis. Suspendisse consectetur leo in tempor vestibulum rhoncus massa sed non augue maecenas ad curae purus luctus mus nibh parturient pulvinar morbi justo a. Natoque mi vestibulum in consectetur a per ullamcorper in amet adipiscing congue fusce nec suscipit adipiscing adipiscing lacus inceptos non. Faucibus faucibus condimentum quam suscipit dictum ornare primis et torquent a ullamcorper vestibulum fringilla consectetur a purus.\r\n\r\nPulvinar nostra parturient mi adipiscing eu metus a nec scelerisque velit diam bibendum scelerisque ut mollis id bibendum a. Cursus id arcu suspendisse ultrices tincidunt eu ullamcorper convallis commodo parturient a ac vivamus a cras tempor a. Vestibulum habitant dis condimentum mus a vivamus eu parturient a neque at parturient senectus pretium est. Metus primis sem a nisl hendrerit parturient venenatis erat potenti parturient cubilia arcu a sed interdum adipiscing habitasse erat. Nullam vivamus dictum bibendum ac nunc dictumst a ut a lacinia ultricies nibh duis adipiscing a purus nam ipsum dictumst.\r\n\r\nAccumsan ullamcorper tristique in aptent lobortis quam pulvinar primis adipiscing scelerisque montes tincidunt praesent magna consectetur adipiscing purus a faucibus pretium mus.A proin sem nec cras praesent a urna lorem rutrum a cum mus.', 1, '2024-02-28 16:11:08'),
(3, 1, 'sirinler koyu', 'sirinler-koyu', 'azman.jpg', '<p>eger iyi bir cocuk olursaniz sirinleri gorebilirsiniz</p>\r\n', 1, '2024-03-07 14:00:52'),
(4, 1, 'Test', 'test', 'x.jpg', '<p>asdsadnsadpashdasdassadasdasdas</p>\r\n', 1, '2024-03-07 15:08:12'),
(5, 1, 'asdas', 'dasdas', 'x.jpg', 'sadsadasddasdasda', 1, '2024-03-07 21:03:23'),
(6, 1, 'wqewqeqwewq', 'eqwewqe', 'x.jpg', 'ewqeqwewqe', 1, '2024-03-07 21:03:23'),
(7, 1, 'zxczxcz', 'xzczxcxz', 'x.jpg', 'xzczxczxcxz', 1, '2024-03-07 21:03:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `content_topic`
--

CREATE TABLE `content_topic` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Turkish', 'Turk'),
(2, 'English', 'english'),
(3, 'German', 'Ger');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` enum('Admin','User') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `admin`, `password`, `created_at`) VALUES
(1, 'cengiz', 'c.k@x.com', 'Admin', 'KRALkobra1234', '2024-02-27 12:28:03'),
(3, 'notadmin', 'na@a.com', 'User', 'Kral12345', '2024-02-27 19:43:16'),
(4, 'lualua', 'lualua@lua.com', 'User', '$2y$10$3nULaqqW1x5TMBTF2crdHOIgwoP5yo3P.o9my5XsaPkj6GJT4hTzW', '2024-03-04 20:22:39');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `contents_ibfk_1` (`user_id`);

--
-- Tablo için indeksler `content_topic`
--
ALTER TABLE `content_topic`
  ADD UNIQUE KEY `content_id` (`content_id`);

--
-- Tablo için indeksler `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `content_topic`
--
ALTER TABLE `content_topic`
  ADD CONSTRAINT `content_topic_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
