-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 04 Oca 2023, 16:53:18
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todolist`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `note` longtext COLLATE utf8_turkish_ci NOT NULL,
  `active` int(1) NOT NULL,
  `note_date` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `note`, `active`, `note_date`) VALUES
(108, 19, 'aGqVAgEVdT5sBZJric0iipbSKumZ/7zdbcsl2neO8qh62luI8wpCWt17cRmDjO9N2Q98Vr+Ta8Z9mkwnovxzfGYcjFh/wVmgAPJHgLc7+Q0FtDZNwxmeBP97ernoKBdRoE5LCGRRLdy5ir2MSLXjP/+nye/1Ij7dmmvCrjybP/JFRGzHcOfMLCrI+ndeLQ1v/wfYp+ZXLVoXskDDlhwUvjvxE6zbmhqHNtVtrLVfz+L35UqM2Z7CnEh14mrYqAUQCAcUwFlCPj4OnTgMTCDxX7D2R1cjQ053vqImZrtpUturW7dTOhHNbODWsuqzPAZiFmv19kOkvxQXdyGM/MTPkOb6OdVhKU90X1weUSnSd7VBUnMWyEz/kYnfRB7BIUJAUJxqB1yB8wk8oVAPjmqgnXcP5MPaVlXK0AxVkgG9be9jKYJ0OEY5oBEhhGOuGg8GYgSwcC4rcjiB4AB7SSDWS/DSKhcaBy/tKwi421e9/Yvi3oJS8vgazFFNaW6sL4DVetGhiZTBfUWPiodwUUIAIg+4SDvuiSavowsTw5Q6ig7PskGAqKxVTmy+QbmRS9ORvv7zzJi/NEPqoSqVvoMuMg==', 0, '19:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `role` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `job` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `mail` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `role`, `job`, `gender`, `mail`, `tel`) VALUES
(20, 'user', 'wApWK66ce12HKeiZvvoJyg==', '0', 'user', 0, 'use@user', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
