-- phpMyAdmin SQL Dump
-- version 5.1.1
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2022 г., 22:01
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maşınaz`
CREATE DATABASE `maşınaz`;
USE `maşınaz`;
--
-- --------------------------------------------------------

--
-- Структура таблицы `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `brandId` int(11) DEFAULT NULL,
  `modelId` int(11) DEFAULT NULL,
  `bodyId` int(11) DEFAULT NULL,
  `mileage` int(11) NOT NULL,
  `mileageType` int(11) NOT NULL,
  `colorId` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `priceType` int(11) NOT NULL,
  `fuelId` int(11) DEFAULT NULL,
  `driveId` int(11) DEFAULT NULL,
  `gearboxId` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `capacityId` int(11) DEFAULT NULL,
  `power` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `barter` int(11) NOT NULL,
  `info` text DEFAULT NULL,
  `wheel` int(11) NOT NULL,
  `abs` int(11) NOT NULL,
  `luke` int(11) NOT NULL,
  `rain` int(11) NOT NULL,
  `closure` int(11) NOT NULL,
  `radar` int(11) NOT NULL,
  `conditioner` int(11) NOT NULL,
  `heating` int(11) NOT NULL,
  `salon` int(11) NOT NULL,
  `xenon` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `curtains` int(11) NOT NULL,
  `ventilation` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ad`
--

INSERT INTO `ad` (`id`, `brandId`, `modelId`, `bodyId`, `mileage`, `mileageType`, `colorId`, `price`, `priceType`, `fuelId`, `driveId`, `gearboxId`, `year`, `capacityId`, `power`, `credit`, `barter`, `info`, `wheel`, `abs`, `luke`, `rain`, `closure`, `radar`, `conditioner`, `heating`, `salon`, `xenon`, `camera`, `curtains`, `ventilation`, `date`, `userId`) VALUES
(1, 13, 1, 16, 402000, 0, 5, 8200, 0, 1, 1, 2, 1994, 29, 193, 0, 0, 'Dostlar təcili maşını satıram, 2.8 avtamat. Koreykadı. Original sol rul. Probeg 402000. Original M buferlər, M padnoşka. Fancy Wide diffuzer. Zavod M-techdir maşın. Zender original spoiler. Original BBS R17lik disklər. Çatı, əyrisi, svarkası yoxdu. təkərlər yaxşıdı. Mator sıfırdan yığılıb. Hərşeyi yenilənib. Qram yağ yeməyi yoxdu. Bloku dəyişib. Çuqun blok qoyulub. Sveçalar yeni dəyişib, forsunkalar yuyulub. Tək ön sidenkalarında cırıqlar var. 150manat demişdilər ona da. Vaxt olmayıb düzəltdirməyə. Çox pul qoyulub maşının üstünə. Dəyərindən çox çox ucuz satıram.', 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, '2022-01-02 06:56:58', 1),
(2, 13, 6, 16, 64000, 0, 1, 57500, 1, 1, 1, 2, 2014, 45, 560, 0, 0, 'Maşın ideal vəziyyətdədir. 2ci maşın kimi istifadə olunub. Yalnız həftəsonları sürülüb.\r\nBarter mümkündür.', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-05-15 14:20:53', 1),
(3, 13, 11, 12, 290000, 0, 11, 14900, 0, 1, 3, 2, 2002, 31, 231, 0, 0, 'BMW X5 Individual paket , nemka, 4.8 yigilib M54 3.0 motor , en dozumlu rasxodsuz motor, korobka saat kimi iwdiyir , tekerleri tezedi R20 X6 nin diskleri , bir denede olsa cat yoxdu , ksenon lampalar, led tumannilar, multi rul, deri salon , lyuk, alkantara dam, her bir weyi iwlekdi, gundelik surulen mawindi, oz adimdadi.', 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 0, '2022-05-15 20:25:23', 1),
(4, 13, 13, 12, 23000, 0, 1, 113000, 1, 1, 3, 2, 2019, 31, 340, 0, 0, '🛑2019 buraxilis-2020 alis🛑\r\nTam ideal veziyyetdedir. Hec bir problemi ve xerc teleb eden hissesi yoxdur.\r\n💯💯💯ORGINAL YURUS‼️‼️‼️\r\n💯💯💯VURUGU UDARI YOXDUR‼️‼️‼️\r\nMonitor\r\n360 derece kamera\r\nHead up\r\nPonarama lyuk\r\n3 zonali climat control\r\nIsiq sensoru\r\nYagis sensoru\r\nAvt ve yaddasli oturacaqlar\r\nPnevma asqi\r\nElektron eylec sistemi\r\nPark radarlari\r\nStart/stop\r\n✅Qeyd/ Avtomobil istenilen yerde yoxlanila biler.\r\n📍Babek pr', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-05-15 08:38:22', 1),
(5, 87, 16, 16, 392000, 0, 1, 9000, 0, 1, 1, 2, 1996, 21, 192, 0, 0, 'Çox uzun uzadı yazmaq isdəmirəm bir sözlə qardaşa qismət olası maşındı heç bir problemi yoxdu', 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, '2022-03-15 00:24:26', 2),
(6, 87, 18, 12, 50600, 0, 1, 37200, 1, 1, 1, 2, 2016, 31, 250, 0, 0, 'mashin əla vəziyyətdədi heç bir problemi yoxdu daim vaxti vaxtinda servisde baxılır amerikankadi 2-ci mashin kimi şənbə bazar günləri sürülür 2015 dekabrinin mashinidi 2016-cı ilin modelidi full komplektasiyadi.barter eləmirem. original probeqdi yoxlatdira özüm xaricde yashayiram tecili satiram. öz mashinimdi', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, '2022-05-15 00:32:58', 2),
(7, 87, 19, 16, 63500, 0, 5, 26400, 2, 1, 2, 2, 2018, 21, 211, 0, 0, 'Tecili satilir!!! Bezkraska. Maşinin heç bir problemi yoxdur. Tekerleri 2021 ci il buraxilishdir. Real alici istenilen yerde yoxlatdira biler. Masin nomresiz satilir..', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, '2022-05-15 00:36:13', 2),
(8, 87, 24, 12, 24000, 0, 3, 107000, 1, 1, 3, 2, 2016, 56, 571, 0, 0, 'Maşın ideal vəziyyətdədir, vuruqu yoxdur BEZ KRASKADIR!\r\nServisdə qulluq olunub alınan gündən.\r\nQaraj şəraitində saxlanılır.\r\nRəngi Boz mat metallikdir.\r\nİstənilən yerdə yoxlatdıra bilərsiniz, xaiş olunur fikri ciddi olmayan şəxslər narahat etməsin.', 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, '2022-05-15 00:38:18', 2),
(9, 7, 30, 12, 89000, 0, 5, 36000, 0, 1, 3, 2, 2013, 21, 211, 0, 0, 'Maşın heç bir xərc tələb etmir.butun xərcləri qarşılanıb.istənilən yerdə yoxlama bilər.ciddi şəxslərin əlaqə saxlaması xahiş olunur.', 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, '2022-05-15 00:44:45', 3),
(10, 7, 29, 16, 55000, 0, 5, 37900, 0, 1, 3, 2, 2018, 21, 252, 0, 0, 'Maşın Bakı Audi mərkzindən alınıb, mühərrik və transmissiyaya 2023-cü ilə qədər qaratiyası var.\r\nƏlavə spesifikasiyalar:\r\n- 2.0 45 TFSI (252 Hp)\r\n- Audi Quattro (Torsen sistemi)\r\n- ötürücü: S tronic Sport\r\n- S line\r\n- LED Matrix-Beam\r\n- Dynamic turn signal\r\n- Аmbient light interior\r\n- Təkərlər - R19\r\n- Bang and olufsen səs sistemi\r\nVə digər Audi A5-də olmayan xüsusiyyətlər\r\n\r\n--------------------------------------------------------------------\r\nАвтомобиль был приобретен в Бакинском Ауди Центре и имеется гарантия на двигатель и трансмиссию до 2023 года.\r\nДополнительные спецификации:\r\n- 2.0 45 TFSI (252 л.с)\r\n- Audi Quattro (система Torsen)\r\n- Коробка передач S tronic Sport\r\n- S line\r\n- LED Matrix-Beam\r\n- Dynamic turn signal\r\n- Аmbient light interior\r\n- Диски - R19\r\n- Аудиосистема Bang and Olufsen\r\nИ прочие характеристики которых нет у других Audi A5', 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1, 0, '2022-05-15 00:47:08', 3),
(11, 7, 28, 17, 460000, 0, 5, 15200, 0, 2, 2, 2, 2008, 21, 140, 0, 0, 'Masin ela veziyetdedi almaniyanin berlin seherinen gelib 2.0 turbo diesel mator karobka kuza ideal veziyetde her bir funksiyasi iwlek veziyetdedi ekanom ve cox dozumlu mawindi.nomresi 0 nandi.telefonda qiymet daniwilmir!!!', 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2022-05-15 00:48:53', 3),
(12, 7, 32, 12, 98000, 0, 2, 42000, 0, 1, 3, 2, 2017, 21, 252, 0, 0, '0 dan ozumde olub, reng deyen yeri yoxdur,hec bir problemi yoxdur,servisden alinib orada qulluq olunub. Modelin tam full versiyasidir', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-05-15 00:50:43', 3),
(13, 74, 51, 16, 235633, 0, 6, 1950, 0, 1, 1, 1, 1979, 17, 75, 0, 0, 'Salam.kasmetikaya ehtiyac var', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-05-15 00:57:34', 4),
(14, 74, 51, 16, 100000, 0, 8, 6000, 0, 1, 1, 1, 2006, 17, 75, 0, 0, 'Maşin saz vezyetdedi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-05-15 00:59:59', 4),
(15, 74, 52, 17, 256935, 0, 7, 5500, 0, 1, 1, 1, 1992, 17, 75, 0, 0, 'Masin 0-dan yigilmis masindir yuke vurulmayib mator 03 karopka 5 matora soz ola bilmez bezsumkalanib elave melumat ucun zeng edin qiymet baresinde razilasmaq mumkundur', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-05-15 01:01:43', 4),
(16, 74, 48, 16, 325142, 0, 6, 3400, 0, 1, 1, 1, 1986, 16, 75, 0, 0, 'Maşın yaxşı bəziyətdədi mator karopqa mosd əladı kuzası salamatdı sənədlər qaydasındadı öz adımadı', 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, '2022-05-15 01:03:47', 4),
(17, 74, 53, 12, 149000, 0, 15, 11500, 0, 1, 3, 1, 2013, 18, 80, 0, 0, 'Mawin tam ideal veziyyetdedir.\r\nHec bir problemi yoxdur.Wekillerde gorunduyu kimi tam dolu mawindir\r\n4 qat STP\r\nEvro su kecirmez pol kovraliti\r\nEva ayaqaltilar\r\n“ROMB” Niva Legend dam\r\nKupe oturacaqlar bahali deri ile uzlenib\r\nLada “LYUKS” sukan\r\nGalik-monitor\r\nDVD/BT moqnitola\r\n4 eded 600w Pioneer ses dinamiki\r\nGizli salon iwiqlari\r\nSuretli wuwe qaldiranlar\r\nG-class radiator barmaqligi\r\nWrangler faralar\r\nSon model arxa stop iwiqlari\r\nArxa ve yan perdeler\r\n100%lik amerikanka plyonka\r\nHilo 225/70 R16 tekerler\r\nYubiley diskler\r\nVaxti vaxtinda butun texniki qulluqlar olunub.\r\nReal alici zehmet olmasa ustasi ile gelsin', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2022-05-15 01:05:41', 4),
(18, 97, 35, 12, 247000, 0, 5, 23300, 0, 1, 2, 2, 2013, 21, 141, 0, 0, 'Hec bir detalina Reng deymeyib..\r\nOriginal yurush cemi..103.000km\r\nNissan Resmi Servisden alinib\r\nStart/stop\r\nQapilarin duyme ile acilib/baglanmasi\r\nMulti-sukan\r\nTEKRAR YAZIRAM:HEC BIR DETALINA RENG DEYMEYIB', 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2022-05-15 01:09:23', 5),
(19, 97, 34, 16, 4500, 0, 1, 45500, 0, 1, 2, 2, 2020, 21, 248, 0, 0, 'Masin ideal veziyyetdedir,orginal probeqdir km ile qeyd olunub,yungull zede ile getirilib,xaish edirem real alicilar narahat etsin.', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-05-15 01:11:43', 5),
(20, 97, 37, 16, 39643, 0, 5, 13300, 0, 1, 2, 2, 2013, 14, 82, 0, 0, 'Bu gun gəlib, oriqinal probeqdi, bezkraskadi, əla vəziyyəttdədir\r\n\r\n', 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '2022-05-15 01:13:24', 5),
(21, 97, 38, 12, 247000, 0, 3, 12800, 0, 1, 3, 2, 2004, 21, 140, 0, 0, 'Salam\r\nMasin ela veziyyetdedir\r\nVuqur udar qeti yoxdur\r\nHer bir funksiya islek veziyyetdedir\r\nDeri salon\r\nElektron razdatka ve s\r\nAtamin masinidir surulmediyi ucun satiram', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, '2022-05-15 01:14:54', 5),
(22, 131, 39, 16, 39000, 0, 3, 27900, 1, 1, 2, 2, 2018, 26, 205, 0, 0, 'Bez Kraska !!! Avtomobil ideal vəziyyətdədir.. Ximçistka, Polirovka, Keramika olunub.. Təkərləri Yenidir.. Ön Faralar Orijinal servis varianti ilə əvəz olunub.. Orijinal Yürüş.. Qeyri ciddi şəxslər narahat etməsin !', 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 0, '2022-05-15 01:19:02', 6),
(23, 131, 41, 4, 268000, 0, 1, 10000, 0, 5, 2, 4, 2007, 16, 76, 0, 0, 'Salam aleykum…Masin NEGD SATILMIR!Masin qalmaq werti ile verilir…Masinda cuzi kasmetik iwler var,vurug udar yoxdur!MAWININ PASI,curuyu geti wekilde yoxdur!!!Ter temiz mawindi….Kasmetikani problem etmesek eger,masin idealdan ideal ter temiz vurugsuz mawindir!!!!Matora biz terefden 1 ay zemanet verilir!Karopka,abc ,batareyalar,her bir wey tam saglam veziyyetdedir!harda isteseniz yoxlatdirib tehvil alacagsiz…\r\nWERTLER:\r\n1)ilkin odeniw 3000azn 550 azn 30 ay!!!(Toplam19500azn)\r\n2)ilkin odeniw 3500azn 500 azn 30ay!!!(Toplam 18500 azn)\r\n3)ilkin odeniw 4000 azn 450 azn 30 ay\r\n(Toplam 17500 azn)..BAWQA WERTLER TEKLIF ETMEIN!!', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2022-05-15 01:21:27', 6),
(24, 131, 42, 12, 10000, 0, 3, 34900, 0, 1, 2, 2, 2022, 21, 175, 0, 0, '2022 ci il buraxilis, 5 il ve ya 150000 km resmi zemanet', 1, 1, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, '2022-05-15 01:23:59', 6),
(25, 131, 40, 4, 212000, 0, 2, 14900, 0, 1, 2, 2, 2006, 15, 90, 0, 0, 'Avtomobil Belçikadan yeni gəlib.\r\nKruise kontrol\r\nKlimat kontrol\r\nArxa kamera\r\nMulti rul\r\nBütün rasxodniklər yenisi ilə əvəz olunub.\r\n1.Yağ,yağ filteri.\r\n2.Tyaga Nakonecnik.\r\n3.Almacıqlar.\r\n4.Böyük razvalnıy ftulkalar.\r\n5.Dal-Qabag nakladka.\r\n6.Ashagı şaravoy.\r\n7.Stabilizatorun linkləri.\r\n8.Stabilizatorun rezinləri.\r\nKredite salamaq köməklik edərəm.', 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, '2022-05-15 01:26:41', 6);
-- --------------------------------------------------------

--
-- Структура таблицы `body_type`
--

CREATE TABLE `body_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `body_type`
--

INSERT INTO `body_type` (`id`, `name`) VALUES 
(1, 'Avtobus'),
(2, 'Dartqı'),
(3, 'Furqon'),
(4, 'Hetçbek / Liftbek'),
(5, 'Kabrio'),
(6, 'Karvan'),
(7, 'Kupe'),
(8, 'Kvadrosikl'),
(9, 'Mikroavtobus'),
(10, 'Minivan'),
(11, 'Motosiklet'),
(12, 'Offroader / SUV'),
(13, 'Pikap'),
(14, 'Qolfkar'),
(15, 'Rodster'),
(16, 'Sedan'),
(17, 'Universal'),
(18, 'Van'),
(19, 'Yük maşını');

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Acura'),
(2, 'Alfa Romeo'),
(3, 'Aprilia'),
(4, 'Arctic Cat'),
(5, 'Aston Martin'),
(6, 'ATV'),
(7, 'Audi'),
(8, 'Baic'),
(9, 'Bajaj'),
(10, 'Bentley'),
(11, 'Bestune'),
(12, 'BMC'),
(13, 'BMW'),
(14, 'BMW Alpina'),
(15, 'Buick'),
(16, 'Bull Motors'),
(17, 'BYD'),
(18, 'Cadillac'),
(19, 'CFMOTO'),
(20, 'Changan'),
(21, 'Chery'),
(22, 'Chevrolet'),
(23, 'Chrysler'),
(24, 'Citroen'),
(25, 'Dacia'),
(26, 'Daewoo'),
(27, 'DAF'),
(28, 'Daihatsu'),
(29, 'Dayun'),
(30, 'Dnepr'),
(31, 'Dodge'),
(32, 'DongFeng'),
(33, 'Ducati'),
(34, 'ErAZ'),
(35, 'FAW'),
(36, 'Ferrari'),
(37, 'Fiat'),
(38, 'Ford'),
(39, 'Foton'),
(40, 'GAC'),
(41, 'GAZ'),
(42, 'Geely'),
(43, 'Genesis'),
(44, 'GMC'),
(45, 'Great Wall'),
(46, 'Haima'),
(47, 'Haojue'),
(48, 'Harley-Davidson'),
(49, 'Haval'),
(50, 'Hongqi'),
(51, 'HOWO'),
(52, 'Hummer'),
(53, 'Hyundai'),
(54, 'IJ'),
(55, 'Ikarus'),
(56, 'Infinity'),
(57, 'Iran Khodro'),
(58, 'Isuzu'),
(59, 'Iveco'),
(60, 'JAC'),
(61, 'Jaguar'),
(63, 'Jawa'),
(64, 'Jeep'),
(65, 'Jetour'),
(66, 'Jonway'),
(67, 'KamAz'),
(68, 'KAvZ'),
(69, 'Kawasaki'),
(70, 'Khazar'),
(71, 'Kia'),
(72, 'KrAZ'),
(73, 'Kuba'),
(74, 'LADA (VAZ)'),
(75, 'Lamborghini'),
(76, 'Lancia'),
(77, 'Land Rover'),
(78, 'Lexus'),
(79, 'Lifan'),
(80, 'Lincoln'),
(81, 'LuAz'),
(82, 'Mack'),
(83, 'MAN'),
(84, 'Maserati'),
(85, 'MAZ'),
(86, 'Mazda'),
(87, 'Mercedes'),
(88, 'Mercedes-Maybach'),
(89, 'MG'),
(90, 'Mini'),
(91, 'Minsk'),
(92, 'Mitsubishi'),
(93, 'Mondial'),
(94, 'Moskvich'),
(95, 'Muravey'),
(96, 'Nama'),
(97, 'Nissan'),
(98, 'Nooma'),
(99, 'Oldsmobile'),
(100, 'Opel'),
(101, 'PAZ'),
(102, 'Peugeot'),
(103, 'Polaris'),
(104, 'Pontiac'),
(105, 'Porsche'),
(106, 'Proton'),
(107, 'RAF'),
(108, 'Ravon'),
(109, 'Renault'),
(110, 'RKS'),
(111, 'Roewe'),
(112, 'Rolls-Royce'),
(113, 'Rover'),
(114, 'Saab'),
(115, 'Saipa'),
(116, 'SamAuto'),
(117, 'Scania'),
(118, 'Scion'),
(119, 'SEAT'),
(120, 'Setra'),
(121, 'Shacman'),
(122, 'Skoda'),
(123, 'Smart'),
(124, 'Sport'),
(125, 'Ssang Yong'),
(126, 'Subaru'),
(127, 'Suzuki'),
(128, 'Tatra'),
(129, 'Tesla'),
(130, 'Tofas'),
(131, 'Toyota'),
(132, 'Triumph'),
(133, 'Tufan'),
(134, 'UAZ'),
(135, 'Ural'),
(136, 'Vespa'),
(137, 'Volkswagen'),
(138, 'Volta'),
(139, 'Volvo'),
(140, 'XCMG'),
(141, 'Xin Kai'),
(142, 'Yamaha'),
(143, 'ZAZ'),
(144, 'ZIL'),
(145, 'Zongshen'),
(146, 'Zontes');

-- --------------------------------------------------------

--
-- Структура таблицы `car_image`
--

CREATE TABLE `car_image` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `adId` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car_image`
--

INSERT INTO `car_image` (`id`, `path`, `adId`) VALUES
(1, '/cars/36e272f27e436e104fa0ef65b58e702e.jpg', 1),
(2, '/cars/3d66bad1b4cce1c32588978a854ae2ec.jpg', 1),
(3, '/cars/03eccdd96a341cb62a7e2401a591dd55.jpg', 1),
(4, '/cars/ab0db5da63879faff9576da04a5b7419.jpg', 1),
(5, '/cars/8c2bad7463243a7f1fdb4cbd3ccfebf0.jpg', 2),
(6, '/cars/0d5f5275c2fcde7523beedf56933e992.jpg', 2),
(7, '/cars/121031b1be7cbbed0e38095d5f6bf886.jpg', 2),
(8, '/cars/da920c9b6990c567a062b44c13a38789.jpg', 2),
(9, '/cars/097e7d623c21ffb6d81a80b05395545a.jpg', 2),
(10, '/cars/90a9e00304a82645b64f42f598779af9.jpg', 3),
(11, '/cars/fb50ae9fcc6058028827a4079f03e506.jpg', 3),
(12, '/cars/4da0b0a7d7a769d629b8cc775e2ceceb.jpg', 3),
(13, '/cars/a06b29fc317db35204382796b962f065.jpg', 3),
(14, '/cars/d2637c135484dff176b0cfc7ed302250.jpg', 3),
(15, '/cars/adcef6456a2b01bb37b4e52f603ed4e4.jpg', 4),
(16, '/cars/9105da374cdaafc6065d96695acaa961.jpg', 4),
(17, '/cars/d19bb003edb85fe89a718c87b4a9ded4.jpg', 4),
(18, '/cars/f32ea2e03425b60cdb315a2832995c4c.jpg', 4),
(19, '/cars/bdd46459b4278b16ee8a4a29c198c1be.jpg', 4),
(20, '/cars/713c2fd0129bf60cdcaba5ca75348ac8.jpg', 5),
(21, '/cars/afffc1c8c3f56a03e8cdd3692b2fb4e7.jpg', 5),
(22, '/cars/17f7a18ca16a3b75c535b6d12a5e2d92.jpg', 5),
(23, '/cars/0672a284cae21b8a78ae865b0b603a3a.jpg', 5),
(24, '/cars/ab77512234974800234997114e2ac646.jpg', 5),
(25, '/cars/1380255fbc5d38a53fe946b648820bea.jpg', 5),
(26, '/cars/6f72640786a5c3bd6e8f8c41d3a87384.jpg', 6),
(27, '/cars/dbceba71099acbbe25b86ba9e6776937.jpg', 6),
(28, '/cars/3e5d9b76714b93abc6cd13656ca1a961.jpg', 6),
(29, '/cars/661ff8bb312e10d657dbd38f240f0d46.jpg', 6),
(30, '/cars/74bf06d873fe3c7725024f089606bae3.jpg', 6),
(31, '/cars/1f4ead656815ec827f151ed5e0006517.jpg', 6),
(32, '/cars/0d3c96e67cb222414663317774ce2f20.jpg', 6),
(33, '/cars/ab5c0ba7e94ef2b28567bd5ad5b5672a.jpg', 6),
(34, '/cars/f764657eecad3273f90b75a928f37650.jpg', 6),
(35, '/cars/be710cc42544ed82fc26967dafa1ffc7.jpg', 7),
(36, '/cars/b7c469a826f49f99d40fe15c58ed780e.jpg', 7),
(37, '/cars/e978b81b990776bd06e0a95b701535e7.jpg', 7),
(38, '/cars/ed61ec49f49d35efc84fe092e4358a8b.jpg', 7),
(39, '/cars/8cb20ae48fdbc5846980aff403dab3db.jpg', 7),
(40, '/cars/ceb459ac6bcbf887006bb8f5450cbe37.jpg', 7),
(41, '/cars/25b41cf0288802a455500ccf3dc4b080.jpg', 7),
(42, '/cars/4f57dab9139ea4f633563ee7a4f23d9d.jpg', 7),
(43, '/cars/88403f20ac6d1f23206a16de957002b1.jpg', 7),
(44, '/cars/4d8dddd48699f0d2be609b264c530cdb.jpg', 7),
(45, '/cars/bc1ba8f334b106594665bc1aacdcb0fa.jpg', 7),
(46, '/cars/cd28280eb0c98845a3d7f36a87ec8c35.jpg', 8),
(47, '/cars/eb01add1272bab0067453af8cfe22fbf.jpg', 8),
(48, '/cars/e22776779b151e24f8cb64b2352cf84c.jpg', 8),
(49, '/cars/8a9fb913f89d49badc30fcb43ff04037.jpg', 8),
(50, '/cars/af6391710f0b7e97bb6c7f0a2bb73ec2.jpg', 8),
(51, '/cars/4fbd86e5ba71c3df73b217f0f0499a13.jpg', 8),
(52, '/cars/6d7236e02c6dcac2d4294152748c446d.jpg', 8),
(53, '/cars/7b17325a072d48bef3674aaa50fbf562.jpg', 8),
(54, '/cars/807858f40dfb800c3dc8d57056963fc8.jpg', 8),
(55, '/cars/096c0c75c481f3ae5edbbea7f8014922.jpg', 8),
(56, '/cars/d3f449cff1b73888d01f33762ce7ab89.jpg', 8),
(57, '/cars/abd4d844cadbfc60c3bde8e1bbd25f12.jpg', 8),
(58, '/cars/35bcc6b076cea774f27864ffa32d15dc.jpg', 8),
(59, '/cars/a87b00956b21bc2747a0cf0e2375969f.jpg', 9),
(60, '/cars/1cf293a97fb252477a798e7d3ecff6ce.jpg', 9),
(61, '/cars/0930ec7ff141d8a467386686716999ed.jpg', 9),
(62, '/cars/598665f99ade083f2d0bbb518b75e31a.jpg', 9),
(63, '/cars/ef88cdb6a3dd8bc40fe5cf21a157403e.jpg', 9),
(64, '/cars/37a79defb99d39d8b156ae1bd7c43ce4.jpg', 9),
(65, '/cars/95f683eaf7159699f2a00a95981408f8.jpg', 9),
(66, '/cars/4c51a493bbbe666b1add545d0d64fe01.jpg', 10),
(67, '/cars/70e3d9f3e954b2a5fd886840b0c968f1.jpg', 10),
(68, '/cars/26c5bf395aaba20d9d2f3740f27c5bec.jpg', 10),
(69, '/cars/61f53935bac1e2f37a067024a254ec67.jpg', 10),
(70, '/cars/21eaceffbc87314d8d6e89138be98327.jpg', 10),
(71, '/cars/1161e6650b9977789c440bd550f49d2c.jpg', 10),
(72, '/cars/d04665bd2375b7d7f5c587655a86dace.jpg', 10),
(73, '/cars/67d87be5905fb42c3162560d222bacbd.jpg', 11),
(74, '/cars/41865e0f57e6a285dcd4f7f8dd7bd985.jpg', 11),
(75, '/cars/a76a01d423e1779170a08ba53f959645.jpg', 11),
(76, '/cars/d753c74968a60e6d131aed285e05f059.jpg', 11),
(77, '/cars/0b4de6dbf87b1d5f485ceaffe897aa7e.jpg', 11),
(78, '/cars/67d63c413c8a3cac1cdb53ed24e85ed1.jpg', 11),
(79, '/cars/cf841b35f36d7db74183175e9cb8c750.jpg', 11),
(80, '/cars/46574d910e245fb1762f9d2c82245e0a.jpg', 12),
(81, '/cars/38940a45789e0efe47887936b6cfb7e9.jpg', 12),
(82, '/cars/8f62189d62f5ff063a624b4c527cb373.jpg', 12),
(83, '/cars/1fcdc1040aede4001aa8bf15849eaa7c.jpg', 12),
(84, '/cars/a59d4c933e906551fbc01c0a36be47e8.jpg', 12),
(85, '/cars/9f0f480e84f25f0df5892f71273e8506.jpg', 12),
(86, '/cars/a00a1b90beadbec79c833e5e21af49bb.jpg', 12),
(87, '/cars/115efe1c1c4303f9f377a0a2cf517c66.jpg', 12),
(88, '/cars/637c754242cc870e5539f0263d12de48.jpg', 13),
(89, '/cars/72359486315a02bcbed9fea217cdd0db.jpg', 13),
(90, '/cars/59e9fdf2906c1f16b94adf2522e3f81a.jpg', 13),
(91, '/cars/f983ec529a26adf2c7bb3e29937ad630.jpg', 13),
(92, '/cars/1bba3992c4c8a4f7ba6a3f32890e149d.jpg', 13),
(93, '/cars/cf5b911ed40b6824afbf0f8623d4bbcf.jpg', 13),
(94, '/cars/f62ebf1808d759d70bdd0b5edd4c22c6.jpg', 13),
(95, '/cars/02a39237dc7eaeaa53655448136e9971.jpg', 14),
(96, '/cars/e5b9e3e895f7c8d0b2e19cee070c9a5b.jpg', 14),
(97, '/cars/58a615013db7d4f94cf7396db25a0a3a.jpg', 14),
(98, '/cars/247f0075702dc53aca570322cfd836a6.jpg', 14),
(99, '/cars/d559264b1c1e71ae99e39e4bf4acf15e.jpg', 14),
(100, '/cars/2a8d5621c38d6bb496c251ef6fdf7ba8.jpg', 14),
(101, '/cars/04c8b455f4c60e671056f8e7faccbfe9.jpg', 14),
(102, '/cars/0c78c518d80adb0a792f7d7ad7f4f70e.jpg', 15),
(103, '/cars/7e69a8fab09b1396d839aec10da57a51.jpg', 15),
(104, '/cars/704ff9c5bd7bfd4bc6f1c028ff24f454.jpg', 15),
(105, '/cars/8a456323dd3e947a9aa53abd7eea2265.jpg', 15),
(106, '/cars/aa09f20b40e4edc2b5c008b3184ae250.jpg', 15),
(107, '/cars/e3c3b25372d47c31c0a0e068dcfbb621.jpg', 15),
(108, '/cars/e31bc75fab66be8727c99581fd50754a.jpg', 15),
(109, '/cars/30fabd143b82021d1dbb49bbdbffd6ab.jpg', 15),
(110, '/cars/08c47a0b813bf0767280609ce5ef8f56.jpg', 15),
(111, '/cars/c84f9b8db88307e6a6ac175a6bc572ef.jpg', 16),
(112, '/cars/e93c694e7735ad76c350216d8cda98c5.jpg', 16),
(113, '/cars/b6fee38a1c818a38b53254decf54be1d.jpg', 16),
(114, '/cars/d0a4045b9571d4e04e28d220de8d05f1.jpg', 16),
(115, '/cars/54acec5729311347f5f62e683ffd0d2b.jpg', 16),
(116, '/cars/b47c0a9a6866004a37605a7069646af4.jpg', 16),
(117, '/cars/ce3bd9bfcf94bcb6f9fe3faa4b3ae6e1.jpg', 16),
(118, '/cars/100e2a420980cedbfd694e16776f1164.jpg', 17),
(119, '/cars/a831f2c8c3ae4a27c95fd0e3bcddfa0d.jpg', 17),
(120, '/cars/b1ac9b8f23671753066f71aa6ba17188.jpg', 17),
(121, '/cars/b4e10b3dc0c363f9dafd5cd42fb1d871.jpg', 17),
(122, '/cars/6c4bfb088d7398966abc8391b25126e1.jpg', 17),
(123, '/cars/a1f809778871bbcbe1efee1794a5d02b.jpg', 17),
(124, '/cars/4d755be56716d80588ecf28b8cca6986.jpg', 17),
(125, '/cars/342573ebd573efbcc9d7defc083c89bf.jpg', 17),
(126, '/cars/ada4ac0191fff2bf870d99c718ab31ac.jpg', 17),
(127, '/cars/fd329d1c59b63bbfd253aa5fe55191ca.jpg', 17),
(128, '/cars/9db02d6c027043d478494505a6afd1fd.jpg', 18),
(129, '/cars/e28ca03a220ab81472644643016626e4.jpg', 18),
(130, '/cars/67dd3867680c9c49fbc182a8ed42aecc.jpg', 18),
(131, '/cars/5bab1acd609b8f3e7b0a2762971b002e.jpg', 18),
(132, '/cars/760a81ac503c256533298933fe38cc3a.jpg', 18),
(133, '/cars/af059e3e13f73d2cff3ce9fa4468c93f.jpg', 18),
(134, '/cars/e3577529c6a17b067a524a9564a529b1.jpg', 18),
(135, '/cars/453a50f159f05079115c37f3aa673aba.jpg', 19),
(136, '/cars/87ac07901fc030c7baf159e284b787be.jpg', 19),
(137, '/cars/fc5b438b63fbf50af8cb482cafa401f0.jpg', 19),
(138, '/cars/f9c86a832e853179f8a588c9b0669e4b.jpg', 19),
(139, '/cars/a0eee1cc7bd675f0f49a53ba959217ff.jpg', 19),
(140, '/cars/eec8442d5bd4ec051a2aae3e4e1f9ffe.jpg', 19),
(141, '/cars/f4053b526616ece3a1ecd176d51c837a.jpg', 20),
(142, '/cars/31c9996d0cc858ac587b2b788467ecdd.jpg', 20),
(143, '/cars/6f22d82ce599b1e4c33edd2a4bc95bdb.jpg', 20),
(144, '/cars/7bde5ae879a20cbf0881b693f157175f.jpg', 20),
(145, '/cars/4bbd7c555d85ad4d48b191917a3c7a47.jpg', 20),
(146, '/cars/15dc9bbd8a5c239d500c24daaa45fc70.jpg', 20),
(147, '/cars/3999c5465045021abbc6f3c39e661b07.jpg', 20),
(148, '/cars/821c95501524cf1abcdf41b7472bb1db.jpg', 20),
(149, '/cars/f0c8e34b93f761f6d5742f0b08a8e525.jpg', 21),
(150, '/cars/c565fee7bc11b27b94bace70aae74d6f.jpg', 21),
(151, '/cars/d210cbee6819889cbee70688c9895e77.jpg', 21),
(152, '/cars/1942735b7757180a15d6d7a7ffe92cb2.jpg', 21),
(153, '/cars/6ba8d813cd623f40a7eca917cfedd145.jpg', 21),
(154, '/cars/5bfe49720c9c2d96106e69401f779e30.jpg', 21),
(155, '/cars/c87fad8037ca59b975911b2dadba0bb7.jpg', 21),
(156, '/cars/7afb51f0a21023ac732f08840d267459.jpg', 22),
(157, '/cars/9ad4b1993295dc37984f4d9feacae930.jpg', 22),
(158, '/cars/4812cb6e5eed3a3fc31377c3e9b3ee02.jpg', 22),
(159, '/cars/6f63a54a0dbd3d6915b1f2231144c99c.jpg', 22),
(160, '/cars/106fe7f17cc59169203081e30617100a.jpg', 22),
(161, '/cars/6c6f1f104e5e22f8e88c31f5ab0cbcf9.jpg', 22),
(162, '/cars/b29a31cfca58314d0a8462cf5ba9e5cc.jpg', 22),
(163, '/cars/7c978a96794aafbe6b2931ede8ff2ef7.jpg', 23),
(164, '/cars/1322a00eb711f7b36d1f11c7f838d9ca.jpg', 23),
(165, '/cars/2735634a47f0361f5863f4cf19b9750f.jpg', 23),
(166, '/cars/c5c2dcfcecaac7240fd9279e1e16dfcf.jpg', 23),
(167, '/cars/5424aabf67b253dce92d1353dff0b7e8.jpg', 24),
(168, '/cars/8a976ce36314c31ea36deae86b12e457.jpg', 24),
(169, '/cars/a0610a53f4238d365a1b84f9b5144669.jpg', 24),
(170, '/cars/d23a31bb622bcde58658c7dba7e1246d.jpg', 24),
(171, '/cars/7a5f921ce62088502cae686be1c3ca7a.jpg', 24),
(172, '/cars/b2379a4f5786a99056f1fa81038db21a.jpg', 24),
(173, '/cars/3fd739549f8719fddf2b0c2fd9d0f2c1.jpg', 25),
(174, '/cars/22551ade8e325d8b95260b097ed4e706.jpg', 25),
(175, '/cars/44933ba9724210155df8ba18ac606817.jpg', 25),
(176, '/cars/4c69dfaf04ddb3896de7dc7e13dbf489.jpg', 25),
(177, '/cars/94443be856ad09669611a9c81b32e39b.jpg', 25),
(178, '/cars/32aebfeea7df3f452574d34add98cd67.jpg', 25),
(179, '/cars/7a2aa410f6451f897a3f9cc2505bc81c.jpg', 25),
(180, '/cars/c2bcd1f94ab698596fd96da56141f1f2.jpg', 25),
(181, '/cars/565a32e6284bdd90e5373995aaaef1a7.jpg', 25),
(182, '/cars/f79d480d8515864186785451d6371fca.jpg', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Ağcabədi'),
(2, 'Ağdam'),
(3, 'Ağdaş'),
(4, 'Ağstafa'),
(5, 'Ağsu'),
(6, 'Astara'),
(7, 'Bakı'),
(8, 'Balakən'),
(9, 'Beyləqan'),
(10, 'Bərdə'),
(11, 'Biləsuvar'),
(12, 'Cəbrayıl'),
(13, 'Cəlilabad'),
(14, 'Culfa'),
(15, 'Daşkəsən'),
(16, 'Dəliməmmədli'),
(17, 'Fizuli'),
(18, 'Gədəbəy'),
(19, 'Gəncə'),
(20, 'Goranboy'),
(21, 'Göyçay'),
(22, 'Göygöl'),
(23, 'Göytəpə'),
(24, 'Hacıqabul'),
(25, 'Horadiz'),
(26, 'İmişli'),
(27, 'İsmayıllı'),
(28, 'Kürdəmir'),
(29, 'Laçın'),
(30, 'Lerik'),
(31, 'Lənkəran'),
(32, 'Liman'),
(33, 'Masallı'),
(34, 'Mingəçevir'),
(35, 'Naftalan'),
(36, 'Naxçıvan'),
(37, 'Neftçala'),
(38, 'Oğuz'),
(39, 'Ordubad'),
(40, 'Qax'),
(41, 'Qazax'),
(42, 'Qəbələ'),
(43, 'Qobustan'),
(44, 'Quba'),
(45, 'Qusar'),
(46, 'Saatlı'),
(47, 'Sabirabad'),
(48, 'Şabran'),
(49, 'Salyan'),
(50, 'Şamaxı'),
(51, 'Samux'),
(52, 'Şəki'),
(53, 'Şəmkir'),
(54, 'Şirvan'),
(55, 'Siyəzən'),
(56, 'Sumqayıt'),
(57, 'Şuşa'),
(58, 'Tərtər'),
(59, 'Tovuz'),
(60, 'Ucar'),
(61, 'Xaçmaz'),
(62, 'Xırdalan'),
(63, 'Xızı'),
(64, 'Xudat'),
(65, 'Yardımlı'),
(66, 'Yevlax'),
(67, 'Zaqatala');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Qara'),
(2, 'Yaş Asfalt'),
(3, 'Boz'),
(4, 'Gümüşlü'),
(5, 'Ağ'),
(6, 'Bej'),
(7, 'Tünd qırmızı'),
(8, 'Qırmızı'),
(9, 'Çəhrayı'),
(10, 'Narıncı'),
(11, 'Qızılı'),
(12, 'Sarı'),
(13, 'Yaşıl'),
(14, 'Mavi'),
(15, 'Göy'),
(16, 'Bənövşəyi'),
(17, 'Qəhvəyı');

-- --------------------------------------------------------

--
-- Структура таблицы `drive_type`
--

CREATE TABLE `drive_type` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `drive_type`
--

INSERT INTO `drive_type` (`id`, `name`) VALUES 
(1, 'Arxa'),
(2, 'Ön'),
(3, 'Tam');

-- --------------------------------------------------------

--
-- Структура таблицы `engine_capacity`
--

CREATE TABLE `engine_capacity` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `engine_capacity`
--

INSERT INTO `engine_capacity` (`id`, `value`) VALUES 
(1, 0),
(2, 100),
(3, 200),
(4, 300),
(5, 400),
(6, 500),
(7, 600),
(8, 700),
(9, 800),
(10, 900),
(11, 1000),
(12, 1100),
(13, 1200),
(14, 1300),
(15, 1400),
(16, 1500),
(17, 1600),
(18, 1700),
(19, 1800),
(20, 1900),
(21, 2000),
(22, 2100),
(23, 2200),
(24, 2300),
(25, 2400),
(26, 2500),
(27, 2600),
(28, 2700),
(29, 2800),
(30, 2900),
(31, 3000),
(32, 3100),
(33, 3200),
(34, 3300),
(35, 3400),
(36, 3500),
(37, 3600),
(38, 3700),
(39, 3800),
(40, 3900),
(41, 4000),
(42, 4100),
(43, 4200),
(44, 4300),
(45, 4400),
(46, 4500),
(47, 4600),
(48, 4700),
(49, 4800),
(50, 4900),
(51, 5000),
(52, 5100),
(53, 5200),
(54, 5300),
(55, 5400),
(56, 5500),
(57, 5600),
(58, 5700),
(59, 5800),
(60, 5900),
(61, 6000),
(62, 6100),
(63, 6200),
(64, 6300),
(65, 6400),
(66, 6500),
(67, 6600),
(68, 6700),
(69, 6800),
(70, 6900),
(71, 7000),
(72, 7100),
(73, 7200),
(74, 7300),
(75, 7400),
(76, 7500),
(77, 7600),
(78, 7700),
(79, 7800),
(80, 7900),
(81, 8000),
(82, 8100),
(83, 8200),
(84, 8300),
(85, 8400),
(86, 8500),
(87, 8600),
(88, 8700),
(89, 8800),
(90, 8900),
(91, 9000),
(92, 9100),
(93, 9200),
(94, 9300),
(95, 9400),
(96, 9500),
(97, 9600),
(98, 9700),
(99, 9800),
(100, 9900),
(101, 10100),
(102, 10200),
(103, 10300),
(104, 10400),
(105, 10500),
(106, 10600),
(107, 10700),
(108, 10800),
(109, 10900),
(110, 11000),
(111, 11100),
(112, 11200),
(113, 11300),
(114, 11400),
(115, 11500),
(116, 11600),
(117, 11700),
(118, 11800),
(119, 11900),
(120, 12000),
(121, 12100),
(122, 12200),
(123, 12300),
(124, 12400),
(125, 12500),
(126, 12600),
(127, 12700),
(128, 12800),
(129, 12900),
(130, 13000),
(131, 13100),
(132, 13200),
(133, 13300),
(134, 13400),
(135, 13500),
(136, 13600),
(137, 13700),
(138, 13800),
(139, 13900),
(140, 14100),
(141, 14200),
(142, 14300),
(143, 14400),
(144, 14500),
(145, 14600),
(146, 14700),
(147, 14800),
(148, 14900),
(149, 15000),
(150, 15100),
(151, 15200),
(152, 15300),
(153, 15400),
(154, 15500),
(155, 15600),
(156, 15700),
(157, 15800),
(158, 15900),
(159, 16000);

-- --------------------------------------------------------

--
-- Структура таблицы `fuel_type`
--

CREATE TABLE `fuel_type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `fuel_type`
--

INSERT INTO `fuel_type` (`id`, `name`) VALUES 
(1, 'Benzin'),
(2, 'Dizel'),
(3, 'Qaz'),
(4, 'Elektro'),
(5, 'Hibrid'),
(6, 'Plug-in Hibrid');

-- --------------------------------------------------------

--
-- Структура таблицы `gearbox`
--

CREATE TABLE `gearbox` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `gearbox`
--

INSERT INTO `gearbox` (`id`, `name`) VALUES 
(1, 'Mexaniki'),
(2, 'Avtomat'),
(3, 'Robotlaşdırılmış'),
(4, 'Variator');

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `brandId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id`, `name`, `brandId`) VALUES
(1, '328', 13),
(2, '428', 13),
(3, '528', 13),
(4, 'M4', 13),
(5, 'M5', 13),
(6, 'M6', 13),
(7, 'M8', 13),
(8, 'X5 M', 13),
(9, 'X6 M', 13),
(10, 'X3', 13),
(11, 'X5', 13),
(12, 'X6', 13),
(13, 'X7', 13),
(14, 'Z3', 13),
(15, 'i8', 13),
(16, 'C 200', 87),
(17, 'C 250', 87),
(18, 'C 300', 87),
(19, 'CLA 250', 87),
(20, 'CLS 500', 87),
(21, 'E 200', 87),
(22, 'E 250', 87),
(23, 'E 300', 87),
(24, 'G 63 AMG', 87),
(25, 'GLE 350', 87),
(26, 'A1', 7),
(27, 'A3', 7),
(28, 'A4', 7),
(29, 'A5', 7),
(30, 'Q3', 7),
(31, 'Q5', 7),
(32, 'Q7', 7),
(33, 'R8', 7),
(34, 'Altima', 97),
(35, 'Qashqai', 97),
(36, 'Skyline', 97),
(37, 'Sunny', 97),
(38, 'X-Trail', 97),
(39, 'Camry', 131),
(40, 'Corolla', 131),
(41, 'Prius', 131),
(42, 'RAV 4',131),
(43, 'Land Cruiser', 131),
(44, 'Focus', 38),
(45, 'Transit', 38),
(46, 'Mustang', 38),
(47, 'Fusion', 38),
(48, '2101', 74),
(49, '2107', 74),
(50, '2105', 74),
(51, '2106', 74),
(52, '2104', 74),
(53, 'Niva', 74),
(54, 'Jetta', 137),
(55, 'Passat', 137),
(56, 'Touareg', 137),
(57, 'Tiguan', 137),
(58, 'Golf', 137),
(59, 'Passat CC', 137),
(60, 'Amarok', 137);

-- --------------------------------------------------------

--
-- Структура таблицы `profile_image`
--

CREATE TABLE `profile_image` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `profile_image`
--

INSERT INTO `profile_image` (`id`, `path`) VALUES 
(1, '/profiles/d86e9c0f8f252fd60ac057a29cf8c814.png'),
(2, '/profiles/b11f22fc737109f9e8983cf5d0b38303.jpg'),
(3, '/profiles/4de96b7f8bba6a88392bbd3b48cf1a34.jpg'),
(4, '/profiles/848d544b2e76f995d85079cbf136af7f.jpg'),
(5, '/profiles/57eea522f4be2363c31f4fa60e7b74ed.jpg'),
(6, '/profiles/9e2225982e3871d43898cf52c544ca0f.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(35) NOT NULL,
  `cityId` int(11) NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `imageId` int(11) NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `cityId`, `admin`, `imageId`) VALUES 
(1, 'Samed', '0513102110', 'samed@gmail.com', '402fd6af80d80e346b96c89d37aae805', 7, 0, 2),
(2, 'Rufat', '0993060802', NULL, '402fd6af80d80e346b96c89d37aae805', 10, 0, 3),
(3, 'Emil', '0552050375', 'emil@mail.ru', '402fd6af80d80e346b96c89d37aae805', 19, 0, 4),
(4, 'Suleyman', '0502238880', 'sulik14@gmail.com', '402fd6af80d80e346b96c89d37aae805', 53, 0, 5),
(5, 'Amiran', '0703451410', 'amiran_todua@gmail.com', '402fd6af80d80e346b96c89d37aae805', 67, 0, 6),
(6, 'Murad', '0772105967', NULL, '402fd6af80d80e346b96c89d37aae805', 27, 0, 1);
-- --------------------------------------------------------

--
-- Структура для представления `adinfo`
--
DROP TABLE IF EXISTS `adinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adinfo` AS SELECT `ad`.`id` AS `aid`, `ad`.`brandId` AS `brandId`, `brand`.`name` AS `brand`, `ad`.`modelId` AS `modelId`, `model`.`name` AS `model`, `ad`.`bodyId` AS `bodyId`, `body_type`.`name` AS `body`, `ad`.`mileage` AS `mileage`, `ad`.`mileageType` AS `mileageType`, `ad`.`colorId` AS `colorId`, `color`.`name` AS `color`, `ad`.`price` AS `price`, `ad`.`priceType` AS `priceType`, `ad`.`fuelId` AS `fuelId`, `fuel_type`.`name` AS `fuel`, `ad`.`driveId` AS `driveId`, `drive_type`.`name` AS `drive`, `ad`.`gearboxId` AS `gearboxId`, `gearbox`.`name` AS `gearbox`, `ad`.`year` AS `year`, `ad`.`capacityId` AS `capacityId`, `engine_capacity`.`value` AS `capacity`, `ad`.`power` AS `power`, `ad`.`credit` AS `credit`, `ad`.`barter` AS `barter`, `ad`.`info` AS `info`, `ad`.`wheel` AS `wheel`, `ad`.`abs` AS `abs`, `ad`.`luke` AS `luke`, `ad`.`rain` AS `rain`, `ad`.`closure` AS `closure`, `ad`.`radar` AS `radar`, `ad`.`conditioner` AS `conditioner`, `ad`.`heating` AS `heating`, `ad`.`salon` AS `salon`, `ad`.`xenon` AS `xenon`, `ad`.`camera` AS `camera`, `ad`.`curtains` AS `curtains`, `ad`.`ventilation` AS `ventilation`, `ad`.`userId` AS `userId`, `user`.`name` AS `name`, `user`.`phone` AS `phone`, `user`.`email` AS `email`, `city`.`name` AS `city`, `user`.`cityId` AS `cityId`, DATE_FORMAT(`ad`.`date`, "%d.%m.%Y %H:%i") AS `date` FROM ((((((((((`ad` join `brand` on(`ad`.`brandId` = `brand`.`id`)) join `model` on(`ad`.`modelId` = `model`.`id`)) join `body_type` on(`ad`.`bodyId` = `body_type`.`id`)) join `color` on(`ad`.`colorId` = `color`.`id`)) join `fuel_type` on(`ad`.`fuelId` = `fuel_type`.`id`)) join `drive_type` on(`ad`.`driveId` = `drive_type`.`id`)) join `gearbox` on(`ad`.`gearboxId` = `gearbox`.`id`)) join `engine_capacity` on(`ad`.`capacityId` = `engine_capacity`.`id`)) join `user` on(`ad`.`userId` = `user`.`id`)) join `city` on(`user`.`cityId` = `city`.`id`));

-- --------------------------------------------------------
--
-- Структура для представления `userinfo`
--
DROP TABLE IF EXISTS `userinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userinfo`  AS SELECT `user`.`id` AS `uid`, `user`.`name` AS `name`, `user`.`phone` AS `phone`, `user`.`email` AS `email`, `profile_image`.`path` AS `path`, `city`.`id` AS `cid`, `city`.`name` AS `city` FROM ((`user` join `city` on(`city`.`id` = `user`.`cityId`)) join `profile_image` on(`profile_image`.`id` = `user`.`imageId`)) ;
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `modelId` (`modelId`),
  ADD KEY `bodyId` (`bodyId`),
  ADD KEY `colorId` (`colorId`),
  ADD KEY `fuelId` (`fuelId`),
  ADD KEY `driveId` (`driveId`),
  ADD KEY `gearboxId` (`gearboxId`),
  ADD KEY `capacityId` (`capacityId`),
  ADD KEY `userId` (`userId`);

--
-- Индексы таблицы `body_type`
--
ALTER TABLE `body_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `car_image`
--
ALTER TABLE `car_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adId` (`adId`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `drive_type`
--
ALTER TABLE `drive_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `engine_capacity`
--
ALTER TABLE `engine_capacity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Индексы таблицы `fuel_type`
--
ALTER TABLE `fuel_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `gearbox`
--
ALTER TABLE `gearbox`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brandId` (`brandId`);

--
-- Индексы таблицы `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cityId` (`cityId`),
  ADD KEY `imageId` (`imageId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `body_type`
--
ALTER TABLE `body_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `car_image`
--
ALTER TABLE `car_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `drive_type`
--
ALTER TABLE `drive_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `engine_capacity`
--
ALTER TABLE `engine_capacity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `fuel_type`
--
ALTER TABLE `fuel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `gearbox`
--
ALTER TABLE `gearbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `profile_image`
--
ALTER TABLE `profile_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk2` FOREIGN KEY (`modelId`) REFERENCES `model` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk3` FOREIGN KEY (`bodyId`) REFERENCES `body_type` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk4` FOREIGN KEY (`colorId`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk5` FOREIGN KEY (`fuelId`) REFERENCES `fuel_type` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk6` FOREIGN KEY (`driveId`) REFERENCES `drive_type` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk7` FOREIGN KEY (`gearboxId`) REFERENCES `gearbox` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk8` FOREIGN KEY (`capacityId`) REFERENCES `engine_capacity` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ad_ibfk9` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

--
-- Ограничения внешнего ключа таблицы `car_image`
--
ALTER TABLE `car_image`
  ADD CONSTRAINT `car_ibfk1` FOREIGN KEY (`adId`) REFERENCES `ad` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`imageId`) REFERENCES `profile_image` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
