-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Ağu 2020, 10:46:47
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sorupaylasim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `SiteAdi` varchar(50) NOT NULL,
  `SiteTitle` varchar(50) NOT NULL,
  `SiteDescription` varchar(255) NOT NULL,
  `SiteKeywords` varchar(255) NOT NULL,
  `SiteCopyrightMetni` varchar(255) NOT NULL,
  `SiteLogosu` varchar(255) NOT NULL,
  `SiteEmailAdresi` varchar(50) NOT NULL,
  `SiteEmailSifresi` varchar(50) NOT NULL,
  `SiteEmailHostAdresi` varchar(50) NOT NULL,
  `Facebook` varchar(100) NOT NULL,
  `Twitter` varchar(100) NOT NULL,
  `YouTube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `SiteAdi`, `SiteTitle`, `SiteDescription`, `SiteKeywords`, `SiteCopyrightMetni`, `SiteLogosu`, `SiteEmailAdresi`, `SiteEmailSifresi`, `SiteEmailHostAdresi`, `Facebook`, `Twitter`, `YouTube`) VALUES
(1, 'Sınav Dayanışması', 'Soru Çözümlerinde Yardımcı', 'Çözemediğiniz soruları bir bilene sorabileceğiniz bir platform.', 'soru, soru çözümü, soru çözümleri, soru sor, soru paylaşım, soru paylaşım platformu', 'Copyright 2020 tüm hakları saklıdır.', 'logo.png', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cevaplar`
--

CREATE TABLE `cevaplar` (
  `id` int(10) UNSIGNED NOT NULL,
  `SoruId` int(10) UNSIGNED NOT NULL,
  `Uye` varchar(100) NOT NULL,
  `CevapMetni` varchar(255) NOT NULL,
  `CevapTarihi` int(10) NOT NULL,
  `CevapResmi` varchar(100) NOT NULL,
  `CevapIpAdresi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cevaplar`
--

INSERT INTO `cevaplar` (`id`, `SoruId`, `Uye`, `CevapMetni`, `CevapTarihi`, `CevapResmi`, `CevapIpAdresi`) VALUES
(11, 15, 'Onur Akköse', 'Deneme cevabıdır.', 2508, '4012445234.jpg', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `id` int(10) UNSIGNED NOT NULL,
  `MenuAdi` varchar(50) NOT NULL,
  `menulogo` varchar(50) NOT NULL,
  `SoruSayisi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`id`, `MenuAdi`, `menulogo`, `SoruSayisi`) VALUES
(1, 'Matematik', 'math.png', 0),
(2, 'Fizik', 'physics.png', 0),
(3, 'Kimya', 'chemistry.png', 0),
(4, 'Biyoloji', 'biology.png', 0),
(5, 'Edebiyat', 'literature.png', 0),
(6, 'Tarih', 'history.png', 0),
(7, 'Coğrafya', 'geography.png', 0),
(8, 'Yabancı Dil', 'dictionary.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `id` int(10) UNSIGNED NOT NULL,
  `UyeIsimSoyisim` varchar(50) NOT NULL,
  `uyeId` int(10) UNSIGNED NOT NULL,
  `MenuId` tinyint(10) UNSIGNED NOT NULL,
  `SoruTuru` varchar(50) NOT NULL,
  `SoruAciklama` varchar(100) NOT NULL,
  `SoruResim` varchar(50) NOT NULL,
  `SoruTarih` int(11) NOT NULL,
  `YorumSayisi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `UyeIsimSoyisim`, `uyeId`, `MenuId`, `SoruTuru`, `SoruAciklama`, `SoruResim`, `SoruTarih`, `YorumSayisi`) VALUES
(14, 'Onur Akköse', 1, 1, 'Matematik', 'deneme sorusu', '4659322156.jpg', 0, 0),
(15, 'Onur Akköse', 1, 2, 'Fizik', 'Kuvvetin kaçıncı katını almam gerektiğini anlayamadım.', '4303539791.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(10) UNSIGNED NOT NULL,
  `EmailAdresi` varchar(50) NOT NULL,
  `Sifre` varchar(50) NOT NULL,
  `IsimSoyisim` varchar(50) NOT NULL,
  `TelefonNumarasi` varchar(11) NOT NULL,
  `KayitTarihi` int(10) NOT NULL,
  `KayitIpAdresi` varchar(20) NOT NULL,
  `Durumu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `EmailAdresi`, `Sifre`, `IsimSoyisim`, `TelefonNumarasi`, `KayitTarihi`, `KayitIpAdresi`, `Durumu`) VALUES
(1, 'onur251akkose@gmail.com', '123456', 'Onur Akköse', '000000', 0, '1597592667', 0),
(2, 'onur251_akkose@hotmail.com', '12345', 'Onur Deneme', '0000', 1597691627, '0', 0),
(3, 'onur@gmail.com', '12345', 'Onur Akköse', '000000', 1598449559, '0', 0),
(4, 'onur251akkose', '1234', 'fdgsdg', '000000', 1598449619, '0', 0),
(5, 'onurdeneme@gmail.com', '12345', 'Onur Deneme', '05123145546', 1598466876, '0', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `İsimSoyisim` varchar(50) NOT NULL,
  `Sifre` varchar(50) NOT NULL,
  `EmailAdresi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cevaplar`
--
ALTER TABLE `cevaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cevaplar`
--
ALTER TABLE `cevaplar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
