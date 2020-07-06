-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Nis 2020, 21:54:43
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kurs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_baslik` varchar(300) NOT NULL,
  `site_aciklama` varchar(500) NOT NULL,
  `site_sahibi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_aciklama`, `site_sahibi`) VALUES
(1, 'Eczane Yönetimi', 'Eczane Yönetim Paneli', 'Ömer Çelik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilac`
--

CREATE TABLE `ilac` (
  `i_id` int(11) NOT NULL,
  `i_adi` varchar(300) NOT NULL,
  `i_detay` varchar(500) NOT NULL,
  `i_durum` varchar(100) NOT NULL,
  `i_tarih` date NOT NULL,
  `i_kategori` varchar(500) NOT NULL,
  `barkod` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ilac`
--

INSERT INTO `ilac` (`i_id`, `i_adi`, `i_detay`, `i_durum`, `i_tarih`, `i_kategori`, `barkod`) VALUES
(1, 'arvales 15 tane', '<p>Normal</p>\r\n', 'Devam Ediyor', '2020-03-15', 'Kapsül', 123456789),
(2, 'nevalgin', '<p>Normal</p>\r\n', 'Devam Ediyor', '2020-03-01', 'Tablet', 563135155),
(3, 'aferin', 'Acil', 'Devam Ediyor', '2020-03-14', 'Tablet', 2147483647),
(4, 'nerofen', 'Acelesi Yok', 'Yeni Başladı', '2020-02-01', 'Tablet', 123456789),
(7, 'VOTUBIA 2.5 mg tablet', 'Acil', 'Yeni Başladı', '2020-03-22', 'Kapsül', 213123123),
(8, 'VISANNE 2 mg 28 tablet', 'Acelesi Yok', 'Yeni Başladı', '2020-04-30', 'Tablet', 11111111);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kul_id` int(11) NOT NULL,
  `kul_isim` varchar(200) NOT NULL,
  `kul_mail` varchar(300) NOT NULL,
  `kul_sifre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`) VALUES
(1, 'admin', 'vjraylex@gmail.com', '15341534');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nobetci_eczane`
--

CREATE TABLE `nobetci_eczane` (
  `ne_id` int(11) NOT NULL,
  `ne_adi` varchar(300) NOT NULL,
  `ne_adres` varchar(500) NOT NULL,
  `ne_gun` date NOT NULL,
  `ne_telefon` bigint(16) NOT NULL,
  `ilce` varchar(100) NOT NULL,
  `bolge` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `nobetci_eczane`
--

INSERT INTO `nobetci_eczane` (`ne_id`, `ne_adi`, `ne_adres`, `ne_gun`, `ne_telefon`, `ilce`, `bolge`) VALUES
(1, 'BÜŞRA ECZANESİ	', 'DAĞKAPI ÇOCUK HASTANESİ YANI ÖZEL AKDEMİ KBB BİTİŞİĞİ LEVENT LOJMANLARI KARŞISI NO:7/E	', '2020-03-20', 2287027, 'YENİŞEHİR', 'LEVENT LOJM.'),
(2, 'SEVİM ECZANESİ	', 'OFİS GEVRAN CAD. ESKİ ASKERLİK ŞUB. CİVARI SADIK KÜNEFE KARŞISI NO:35 OFİS	', '2020-03-20', 2284866, 'YENİŞEHİR', 'OFİS'),
(3, 'BÜYÜK ECZANESİ	', 'BAĞLAR SENTO CAD. NO:116/C KURUÇEŞME KAVŞAĞI BAĞLAR	', '2020-03-20', 2340030, 'BAĞLAR', 'KURUÇEŞME'),
(5, 'Ayşe ECZANESİ	', 'DAĞKAPI ÇOCUK HASTANESİ YANI ÖZEL AKDEMİ KBB BİTİŞİĞİ LEVENT LOJMANLARI KARŞISI NO:7/E	', '2020-03-20', 2287027, 'YENİŞEHİR', 'LEVENT LOJM.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `proje_id` int(11) NOT NULL,
  `proje_baslik` varchar(250) NOT NULL,
  `proje_teslim_tarihi` date NOT NULL,
  `proje_aciliyet` varchar(50) NOT NULL,
  `proje_durum` varchar(50) NOT NULL,
  `proje_detay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_baslik`, `proje_teslim_tarihi`, `proje_aciliyet`, `proje_durum`, `proje_detay`) VALUES
(5, 'Wordpress film Teması Kodlama', '2020-03-05', 'Acelesi Yok', 'Devam Ediyor', 'Wordpress film Teması Kodlama'),
(7, 'eczane', '2020-03-16', 'Acil', 'Yeni Başladı', 'eczane scripti kurulumu'),
(8, 'film izleme scripti', '2020-03-16', 'Acelesi Yok', 'Devam Ediyor', 'eczane scripti kurulumu'),
(9, 'haber sitesi kurulumu', '2020-03-16', 'Normal', 'Bitti', 'haber sitesi scripti kurulumu'),
(10, 'film izleme scripti', '2020-03-12', 'Acelesi Yok', 'Devam Ediyor', '<h1 style=\"font-style: italic;\"><strong>film izleme scripti oluşturma</strong></h1>\r\n'),
(11, 'alotimes', '0000-00-00', 'Acil', 'Yeni Başladı', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `sip_id` int(11) NOT NULL,
  `musteri_isim` varchar(200) NOT NULL,
  `musteri_mail` varchar(300) NOT NULL,
  `musteri_telefon` bigint(20) NOT NULL,
  `sip_teslim_tarihi` date NOT NULL,
  `sip_aciliyet` varchar(50) NOT NULL,
  `sip_durum` varchar(50) NOT NULL,
  `sip_detay` text NOT NULL,
  `sip_ucret` bigint(25) NOT NULL,
  `sip_baslik` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`sip_id`, `musteri_isim`, `musteri_mail`, `musteri_telefon`, `sip_teslim_tarihi`, `sip_aciliyet`, `sip_durum`, `sip_detay`, `sip_ucret`, `sip_baslik`) VALUES
(37, 'Evin Eczanesi', 'evin@gmail.com', 55555555555, '2020-04-29', 'Acil', 'Yeni Başladı', '', 30, 'ARVELES '),
(38, 'Evin Eczanesi', 'evin@gmail.com', 55555555555, '2020-04-29', 'Normal', 'Devam Ediyor', '', 30, 'AVIL %1.25 25 gr merhem	'),
(39, 'Evin Eczanesi', 'evin@gmail.com', 55555555555, '2020-03-17', 'Acelesi Yok', 'Bitti', '', 30, 'ENDOL 25 mg 25 kapsül	'),
(40, 'berivan Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-17', 'Acelesi Yok', 'Bitti', '', 30, 'ZINNAT 125 mg 100 ml şurup	'),
(41, 'berivan Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Acelesi Yok', 'Bitti', '', 30, 'ANDAZOL 200 mg 6 film tablet	'),
(42, 'berfin Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Acil', 'Yeni Başladı', '', 30, 'LASIX 40 mg 12 tablet	'),
(43, 'berfin Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Acil', 'Yeni Başladı', '', 30, 'YAZZ 24+4 film kaplı tablet	'),
(44, 'berfin Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Acil', 'Yeni Başladı', '', 30, 'YERVOY 200mg/40ml IV infüzyonluk çözelti konsantreSI iç...	'),
(45, 'berfin Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Normal', 'Yeni Başladı', '', 30, 'NIMES 100 mg 15 tablet	'),
(46, 'berfin Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Normal', 'Yeni Başladı', '', 30, 'VISINE 5 ml damla '),
(47, 'berfin Eczanesi', 'berivan@gmail.com', 55555555555, '2020-03-07', 'Normal', 'Bitti', '', 30, 'VIOJEN 10 ml solüsyon	'),
(48, '21 Eczanesi', 'vjraylex21@gmail.com', 2222222222, '2020-03-21', 'Normal', 'Yeni Başladı', '', 0, 'VIGAROO 100 mg 4 film tablet	'),
(49, 'apo', 'apo@gmail.com', 55321115153, '2020-03-29', 'Normal', 'Devam Ediyor', '', 55, 'ARVELES apo');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ilac`
--
ALTER TABLE `ilac`
  ADD PRIMARY KEY (`i_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kul_id`);

--
-- Tablo için indeksler `nobetci_eczane`
--
ALTER TABLE `nobetci_eczane`
  ADD PRIMARY KEY (`ne_id`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`proje_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ilac`
--
ALTER TABLE `ilac`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `nobetci_eczane`
--
ALTER TABLE `nobetci_eczane`
  MODIFY `ne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `proje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
