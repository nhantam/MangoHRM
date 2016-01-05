-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 11:16 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbhrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `config_configs`
--

CREATE TABLE IF NOT EXISTS `config_configs` (
  `id` int(10) unsigned NOT NULL,
  `lable` varchar(100) NOT NULL,
  `values` varchar(100) DEFAULT '0',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `avail` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_config_email`
--

CREATE TABLE IF NOT EXISTS `config_config_email` (
  `id` int(5) NOT NULL,
  `mail_send_as` varchar(100) NOT NULL,
  `send_method` varchar(5) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_port` int(4) DEFAULT NULL,
  `smtp_authen` varchar(3) DEFAULT NULL COMMENT 'true,false',
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_password` varchar(80) DEFAULT NULL,
  `secure_connect` varchar(3) DEFAULT NULL COMMENT 'no,ssl,tls',
  `avail` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_countries`
--

CREATE TABLE IF NOT EXISTS `config_countries` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `flag` varchar(100) NOT NULL COMMENT 'co quoc gia',
  `pos` int(3) NOT NULL,
  `avail` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_countries`
--

INSERT INTO `config_countries` (`id`, `name`, `flag`, `pos`, `avail`) VALUES
(1, 'United State', 'flag-usa.png', 2, 1),
(2, 'Vietnam', 'flag-vietnam.png', 1, 1),
(3, 'Afghanistan', 'flag-aghanistan.png', 0, 0),
(4, 'Albania', 'flag-albania.png', 0, 0),
(5, 'Algeria', 'flag-algeria.png', 0, 0),
(6, 'Andorra', 'flag-andorra.png', 0, 0),
(7, 'Angola', 'flag-angola.png', 0, 0),
(8, 'Antigua and Barbuda', 'flag-antigua.png', 0, 0),
(9, 'Argentina', 'flag-argentina.png', 0, 0),
(10, 'Armenia', 'flag-armenia.png', 0, 0),
(11, 'Australia', 'flag-australia.png', 3, 1),
(12, 'Austria', 'flag-austria.png', 0, 0),
(13, 'Azerbaijan', 'flag-azerbaijan.png', 0, 0),
(14, 'Bahamas', 'flag-bahamas.png', 0, 0),
(15, 'Bahrain', 'flag-bahrain.png', 0, 0),
(16, 'Bangladesh', 'flag-bangladesh.png', 0, 0),
(17, 'Barbados', 'flag-barbados.png', 0, 0),
(18, 'Belarus', 'flag-belarus.png', 0, 0),
(19, 'Belgium', 'flag-belgium.png', 0, 0),
(20, 'Belize', 'flag-belize.png', 0, 0),
(21, 'Benin', 'flag-benin.png', 0, 0),
(22, 'Bhutan', 'flag-bhutan.png', 0, 0),
(23, 'Bolivia', 'flag-bolivia.png', 0, 0),
(24, 'Bosnia and Hercegovina', 'flag-bosnia-hercegovina.png', 0, 0),
(25, 'Botswana', 'flag-botswana.png', 0, 0),
(26, 'Brazil', 'flag-brazil.png', 0, 0),
(27, 'Brunei', 'flag-brunei.png', 4, 1),
(28, 'Bulgaria', 'flag-bulgaria.png', 0, 0),
(29, 'Burkina Faso', 'flag-burkina-faso.png', 0, 0),
(30, 'Burundi', 'flag-burundi.png', 0, 0),
(31, 'Cabo Verde', 'flag-Cabo-Verde.png', 0, 0),
(32, 'Cambodia', 'flag-Cambodia.png', 0, 0),
(33, 'Cameroon', 'flag-Cameroon.png', 0, 0),
(34, 'Canada', 'flag-Canada.png', 5, 1),
(35, 'Central African Republic', 'flag-Central-African-Republic.png', 0, 0),
(36, 'Chad', 'flag-Chad.png', 0, 0),
(37, 'Chile', 'flag-Chile.png', 6, 1),
(38, 'China', 'flag-China.png', 0, 0),
(39, 'Colombia', 'flag-Colombia.png', 0, 0),
(40, 'Comoros', 'flag-Comoros.png', 0, 0),
(41, 'Congo, Republic of the', 'flag-Congo.png', 0, 0),
(42, 'Congo, Democratic Republic of the', 'flag-Congo-Democratic-Republic.png', 0, 0),
(43, 'Costa Rica', 'flag-Costa-Rica.png', 0, 0),
(44, 'Cote d''Ivoire', 'flag-Cote-d-Ivoire.png', 0, 0),
(45, 'Croatia', 'flag-Croatia.png', 0, 0),
(46, 'Cuba', 'flag-Cuba.png', 0, 0),
(47, 'Cyprus', 'flag-Cyprus.png', 0, 0),
(48, 'Czech Republic', 'flag-Czech-Republic.png', 0, 0),
(49, 'Denmark', 'flag-Denmark.png', 0, 0),
(50, 'Djibouti', 'flag-Djibouti.png', 0, 0),
(51, 'Dominca', 'flag-Dominca.png', 0, 0),
(52, 'Dominican Republic', 'flag-Dominican-Republic.png', 0, 0),
(53, 'Ecuador', 'flag-Ecuador.png', 0, 0),
(54, 'Egypt', 'flag-Egypt.png', 0, 0),
(55, 'El Salvador', 'flag-El-Salvador.png', 0, 0),
(56, 'Equatorial Guinea', 'flag-Equatorial-Guinea.png', 0, 0),
(57, 'Eritrea', 'flag-Eritrea.png', 0, 0),
(58, 'Estonia', 'flag-Estonia.png', 0, 0),
(59, 'Ethiopia', 'flag-Ethiopia.png', 0, 0),
(60, 'Fiji', 'flag-Fiji.png', 0, 0),
(61, 'Finland', 'flag-Finland.png', 0, 0),
(62, 'France', 'flag-France.png', 0, 0),
(63, 'Gabon', 'flag-Gabon.png', 0, 0),
(64, 'Gambia', 'flag-Gambia.png', 0, 0),
(65, 'Georgia', 'flag-Georgia.png', 0, 0),
(66, 'Germany', 'flag-Germany.png', 0, 0),
(67, 'Ghana', 'flag-Ghana.png', 0, 0),
(68, 'Greece', 'flag-Greece.png', 0, 0),
(69, 'Grenada', 'flag-Grenada.png', 0, 0),
(70, 'Guatemala', 'flag-Guatemala.png', 0, 0),
(71, 'Guinea', 'flag-Guinea.png', 0, 0),
(72, 'Guinea-Bissau', 'flag-Guinea-Bissau.png', 0, 0),
(73, 'Guyana', 'flag-Guyana.png', 0, 0),
(74, 'Haiti', 'flag-Haiti.png', 0, 0),
(75, 'Honduras', 'flag-Honduras.png', 0, 0),
(76, 'Hungary', 'flag-Hungary.png', 0, 0),
(77, 'Iceland', 'flag-Iceland.png', 0, 0),
(78, 'India', 'flag-India.png', 0, 0),
(79, 'Indonesia', 'flag-Indonesia.png', 0, 0),
(80, 'Iran', 'flag-Iran.png', 0, 0),
(81, 'Iraq', 'flag-Iraq.png', 0, 0),
(82, 'Ireland', 'flag-Ireland.png', 0, 0),
(83, 'Israel', 'flag-Israel.png', 0, 0),
(84, 'Italy', 'flag-Italy.png', 0, 0),
(85, 'Jamaica', 'flag-Jamaica.png', 0, 0),
(86, 'Japan', 'flag-Japan.png', 7, 1),
(87, 'Jordan', 'flag-Jordan.png', 0, 0),
(88, 'Kazakhstan', 'flag-Kazakhstan.png', 0, 0),
(89, 'Kenya', 'flag-Kenya.png', 0, 0),
(90, 'Kiribati', 'flag-Kiribati.png', 0, 0),
(91, 'Kosovo', 'flag-Kosovo.png', 0, 0),
(92, 'Kuwait', 'flag-Kuwait.png', 0, 0),
(93, 'Kyrgyzstan', 'flag-Kyrgyzstan.png', 0, 0),
(94, 'Laos', 'flag-Laos.png', 0, 0),
(95, 'Latvia', 'flag-Latvia.png', 0, 0),
(96, 'Lebanon', 'flag-Lebanon.png', 0, 0),
(97, 'Lesotho', 'flag-Lesotho.png', 0, 0),
(98, 'Liberia', 'flag-Liberia.png', 0, 0),
(99, 'Libya', 'flag-Libya.png', 0, 0),
(100, 'Liechtenstein', 'flag-Liechtenstein.png', 0, 0),
(101, 'Lithuania', 'flag-Lithuania.png', 0, 0),
(102, 'Luxembourg', 'flag-Luxembourg.png', 0, 0),
(103, 'Macedonia', 'flag-Macedonia.png', 0, 0),
(104, 'Madagascar', 'flag-Madagascar.png', 0, 0),
(105, 'Malawi', 'flag-Malawi.png', 0, 0),
(106, 'Malaysia', 'flag-Malaysia.png', 8, 1),
(107, 'Maldives', 'flag-Maldives.png', 0, 0),
(108, 'Mali', 'flag-Mali.png', 0, 0),
(109, 'Malta', 'flag-Malta.png', 0, 0),
(110, 'Marshall Islands', 'flag-Marshall-Islands.png', 0, 0),
(111, 'Mauritania', 'flag-Mauritania.png', 0, 0),
(112, 'Mauritius', 'flag-Mauritius.png', 0, 0),
(113, 'Mexico', 'flag-Mexico.png', 9, 1),
(114, 'Micronesia', 'flag-Micronesia.png', 0, 0),
(115, 'Moldova', 'flag-Moldova.png', 0, 0),
(116, 'Monaco', 'flag-Monaco.png', 0, 0),
(117, 'Mongolia', 'flag-Mongolia.png', 0, 0),
(118, 'Montenegro', 'flag-Montenegro.png', 0, 0),
(119, 'Morocco', 'flag-Morocco.png', 0, 0),
(120, 'Mozambique', 'flag-Mozambique.png', 0, 0),
(121, 'Myanmar', 'flag-Myanmar.png', 0, 0),
(122, 'Namibia', 'flag-Namibia.png', 0, 0),
(123, 'Nauru', 'flag-Nauru.png', 0, 0),
(124, 'Nepal', 'flag-Nepal.png', 0, 0),
(125, 'Netherlands', 'flag-Netherlands.png', 0, 0),
(126, 'New Zealand', 'flag-New-Zealand.png', 9, 1),
(127, 'Nicaragua', 'flag-Nicaragua.png', 0, 0),
(128, 'Niger', 'flag-Niger.png', 0, 0),
(129, 'Nigeria', 'flag-Nigeria.png', 0, 0),
(130, 'North Korea', 'flag-North-Korea.png', 0, 0),
(131, 'Norway', 'flag-Norway.png', 0, 0),
(132, 'Oman', 'flag-Oman.png', 0, 0),
(133, 'Pakistan', 'flag-Pakistan.png', 0, 0),
(134, 'Palau', 'flag-Palau.png', 0, 0),
(135, 'Palestine', 'flag-Palestine.png', 0, 0),
(136, 'Panama', 'flag-Panama.png', 0, 0),
(137, 'Papua New Guinea', 'flag-Papua-New-Guinea.png', 0, 0),
(138, 'Paraguay', 'flag-Paraguay.png', 0, 0),
(139, 'Peru', 'flag-Peru.png', 10, 1),
(140, 'Philippines', 'flag-Philippines.png', 0, 0),
(141, 'Poland', 'flag-Poland.png', 0, 0),
(142, 'Portugal', 'flag-Portugal.png', 0, 0),
(143, 'Qatar', 'flag-Qatar.png', 0, 0),
(144, 'Romania', 'flag-Romania.png', 0, 0),
(145, 'Russia', 'flag-Russia.png', 0, 0),
(146, 'Rwanda', 'flag-Rwanda.png', 0, 0),
(147, 'St. Kitts and Nevis', 'flag-St-Kitts-Nevis.png', 0, 0),
(148, 'St. Lucia', 'flag-St-Lucia.png', 0, 0),
(149, 'St. Vincent and The Grenadines', 'flag-St-Vincent-the-Grenadines.png', 0, 0),
(150, 'Samoa', 'flag-Samoa.png', 0, 0),
(151, 'San Marino', 'flag-San-Marino.png', 0, 0),
(152, 'Sao Tome and Principe', 'flag-Sao-Tome-and-Principe.png', 0, 0),
(153, 'Saudi Arabia', 'flag-Saudi-Arabia.png', 0, 0),
(154, 'Senegal', 'flag-Senegal.png', 0, 0),
(155, 'Serbia', 'flag-Serbia.png', 0, 0),
(156, 'Seychelles', 'flag-Seychelles.png', 0, 0),
(157, 'Sierra Leone', 'flag-Sierra-Leone.png', 0, 0),
(158, 'Singapore', 'flag-Singapore.png', 11, 1),
(159, 'Slovakia', 'flag-Slovakia.png', 0, 0),
(160, 'Slovenia', 'flag-Slovenia.png', 0, 0),
(161, 'Solomon Islands', 'flag-Solomon-Islands.png', 0, 0),
(162, 'Somalia', 'flag-Somalia.png', 0, 0),
(163, 'South Africa', 'flag-South-Africa.png', 0, 0),
(164, 'South Korea', 'flag-South-Korea.png', 0, 0),
(165, 'South Sudan', 'flag-South-Sudan.png', 0, 0),
(166, 'Spain', 'flag-Spain.png', 0, 0),
(167, 'Sri Lanka', 'flag-Sri-Lanka.png', 0, 0),
(168, 'Sudan', 'flag-Sudan.png', 0, 0),
(169, 'Suriname', 'flag-Suriname.png', 0, 0),
(170, 'Swaziland', 'flag-Swaziland.png', 0, 0),
(171, 'Sweden', 'flag-Sweden.png', 0, 0),
(172, 'Switzerland', 'flag-Switzerland.png', 0, 0),
(173, 'Syria', 'flag-Syria.png', 0, 0),
(174, 'Taiwan', 'flag-Taiwan.png', 0, 0),
(175, 'Tajikistan', 'flag-Tajikistan.png', 0, 0),
(176, 'Tanzania', 'flag-Tanzania.png', 0, 0),
(177, 'Thailand', 'flag-Thailand.png', 0, 0),
(178, 'Timor-Leste', 'flag-Timor-Leste.png', 0, 0),
(179, 'Togo', 'flag-Togo.png', 0, 0),
(180, 'Tonga', 'flag-Tonga.png', 0, 0),
(181, 'Trinidad and Tobago', 'flag-Trinidad-and-Tobago.png', 0, 0),
(182, 'Tunisia', 'flag-Tunisia.png', 0, 0),
(183, 'Turkey', 'flag-Turkey.png', 0, 0),
(184, 'Turkmenistan', 'flag-Turkmenistan.png', 0, 0),
(185, 'Tuvalu', 'flag-Tuvalu.png', 0, 0),
(186, 'Uganda', 'flag-Uganda.png', 0, 0),
(187, 'Ukraine', 'flag-Ukraine.png', 0, 0),
(188, 'United Arab Emirates', 'flag-United-Arab-Emirates.png', 0, 0),
(189, 'United Kingdom', 'flag-United-Kingdom.png', 0, 0),
(190, 'Uruguay', 'flag-Uruguay.png', 0, 0),
(191, 'Uzbekistan', 'flag-Uzbekistan.png', 0, 0),
(192, 'Vanuatu', 'flag-Vanuatu.png', 0, 0),
(193, 'Vatican City', 'flag-Vatican-City.png', 0, 0),
(194, 'Venezuela', 'flag-Venezuela.png', 0, 0),
(195, 'Yemen', 'flag-Yemen.png', 0, 0),
(196, 'Zambia', 'flag-Zambia.png', 0, 0),
(197, 'Zimbabwe', 'flag-Zimbabwe.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `config_country_province`
--

CREATE TABLE IF NOT EXISTS `config_country_province` (
  `pId` int(12) NOT NULL,
  `country` int(5) NOT NULL DEFAULT '0',
  `pName` varchar(80) NOT NULL,
  `pPos` tinyint(2) NOT NULL DEFAULT '0',
  `pValid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_country_province`
--

INSERT INTO `config_country_province` (`pId`, `country`, `pName`, `pPos`, `pValid`) VALUES
(1, 2, 'Tp.Hồ Chí Minh', 1, 1),
(2, 2, 'Hà Nội', 2, 1),
(3, 2, 'An Giang', 3, 1),
(4, 2, 'Bạc Liêu', 4, 1),
(5, 2, 'Bà Rịa - Vũng Tàu', 5, 1),
(6, 2, 'Bắc Cạn', 6, 1),
(7, 2, 'Bắc Giang', 7, 1),
(8, 2, 'Bắc Ninh', 8, 1),
(9, 2, 'Bình Dương', 10, 1),
(10, 2, 'Bình Định', 11, 1),
(11, 2, 'Bình Phước', 12, 1),
(12, 2, 'Bình Thuận', 13, 1),
(13, 2, 'Cao Bằng', 14, 1),
(14, 2, 'Cà Mau', 15, 1),
(15, 2, 'Cần Thơ', 16, 1),
(16, 2, 'Đà Nẵng', 17, 1),
(17, 2, 'Đắk Lắk', 18, 1),
(18, 2, 'Đắk Nông', 19, 1),
(19, 2, 'Điện Biên', 20, 1),
(20, 2, 'Đồng Nai', 21, 1),
(21, 2, 'Đồng Tháp', 22, 1),
(22, 2, 'Gia Lai', 23, 1),
(23, 2, 'Hà Giang', 24, 1),
(24, 2, 'Hà Nam', 25, 1),
(26, 2, 'Hà Tĩnh', 27, 1),
(27, 2, 'Hải Dương', 28, 1),
(28, 2, 'Hải Phòng', 29, 1),
(29, 2, 'Hậu Giang', 30, 1),
(30, 2, 'Hòa Bình', 31, 1),
(31, 2, 'Hưng Yên', 32, 1),
(32, 2, 'Khánh Hòa', 33, 1),
(33, 2, 'Kiên Giang', 34, 1),
(34, 2, 'Kon Tum', 35, 1),
(35, 2, 'Lai Châu', 36, 1),
(36, 2, 'Lạng Sơn', 37, 1),
(37, 2, 'Lào Cai', 38, 1),
(38, 2, 'Lâm Đồng', 39, 1),
(39, 2, 'Long An', 40, 1),
(40, 2, 'Nam Định', 41, 1),
(41, 2, 'Nghệ An', 42, 1),
(42, 2, 'Ninh Bình', 43, 1),
(43, 2, 'Ninh Thuận', 44, 1),
(44, 2, 'Phú Thọ', 45, 1),
(45, 2, 'Phú Yên', 46, 1),
(46, 2, 'Quảng Bình', 47, 1),
(47, 2, 'Quảng Nam', 48, 1),
(48, 2, 'Quảng Ngãi', 49, 1),
(49, 2, 'Quảng Ninh', 50, 1),
(50, 2, 'Quảng Trị', 51, 1),
(51, 2, 'Sóc Trăng', 52, 1),
(52, 2, 'Sơn La', 53, 1),
(53, 2, 'Tây Ninh', 54, 1),
(54, 2, 'Thái Bình', 55, 1),
(55, 2, 'Thái Nguyên', 56, 1),
(56, 2, 'Thanh Hóa', 57, 1),
(57, 2, 'Thưa Thiên-Huế', 58, 1),
(58, 2, 'Tiền Giang', 59, 1),
(59, 2, 'Trà Vinh', 60, 1),
(60, 2, 'Tuyên Quang', 61, 1),
(61, 2, 'Vĩnh Long', 62, 1),
(62, 2, 'Vĩnh Phúc', 63, 1),
(63, 2, 'Yên Bái', 64, 1),
(64, 2, 'Bến tre', 9, 1),
(65, 1, 'Alabama', 1, 1),
(66, 1, 'Alaska', 2, 1),
(67, 1, 'Arizona', 3, 1),
(68, 1, 'Arkansas', 4, 1),
(69, 1, 'California', 5, 1),
(70, 1, 'Colorado', 6, 1),
(71, 1, 'Connecticut', 7, 1),
(72, 1, 'Delaware', 8, 1),
(73, 1, 'Florida', 9, 1),
(74, 1, 'Georgia', 10, 1),
(75, 1, 'Hawaii', 11, 1),
(76, 1, 'Idaho', 12, 1),
(77, 1, 'Illinois', 13, 1),
(78, 1, 'Indiana', 14, 1),
(79, 1, 'Iowa', 15, 1),
(80, 1, 'Kansas', 16, 1),
(81, 1, 'Kentucky', 17, 1),
(82, 1, 'Louisiana', 18, 1),
(83, 1, 'Maine', 19, 1),
(84, 1, 'Maryland', 20, 1),
(85, 1, 'Massachusetts', 21, 1),
(86, 1, 'Michigan', 22, 1),
(87, 1, 'Minnesota', 23, 1),
(88, 1, 'Mississippi', 24, 1),
(89, 1, 'Missouri', 25, 1),
(90, 1, 'Montana', 26, 1),
(91, 1, 'Nebraska', 27, 1),
(92, 1, 'Nevada', 28, 1),
(93, 1, 'New Hampshire', 29, 1),
(94, 1, 'New Jersey', 30, 1),
(95, 1, 'New Mexico', 31, 1),
(96, 1, 'New York', 32, 1),
(97, 1, 'North Carolina', 33, 1),
(98, 1, 'North Dakota', 34, 1),
(99, 1, 'Ohio', 35, 1),
(100, 1, 'Oklahoma', 36, 1),
(101, 1, 'Oregon', 37, 1),
(102, 1, 'Pennsylvania', 38, 1),
(103, 1, 'Rhode Island', 39, 1),
(104, 1, 'South Carolina', 40, 1),
(105, 1, 'South Dakota', 41, 1),
(106, 1, 'Tennessee', 42, 1),
(107, 1, 'Texas', 43, 1),
(108, 1, 'Utah', 44, 1),
(109, 1, 'Vermont', 45, 1),
(110, 1, 'Virginia', 46, 1),
(111, 1, 'Washington', 47, 1),
(112, 1, 'West Virginia', 48, 1),
(113, 1, 'Wisconsin', 49, 1),
(114, 1, 'Wyoming', 50, 1),
(115, 37, 'Arica', 0, 1),
(116, 37, 'Parinacota', 0, 1),
(117, 37, 'Iquique', 0, 1),
(118, 37, 'Tamarugal', 0, 1),
(119, 37, 'Antofagasta', 0, 1),
(120, 37, 'El Loa', 0, 1),
(121, 37, 'Tocopilla', 0, 1),
(122, 37, 'Copiapó', 0, 1),
(123, 37, 'Huasco', 0, 1),
(124, 37, 'Chañaral', 0, 1),
(125, 37, 'Elqui', 0, 1),
(126, 37, 'Limarí', 0, 1),
(127, 37, 'Choapa', 0, 1),
(128, 37, 'Isla de Pascua', 0, 1),
(129, 37, 'Los Andes', 0, 1),
(130, 37, 'Marga Marga', 0, 1),
(131, 37, 'Petorca', 0, 1),
(132, 37, 'Quillota', 0, 1),
(133, 37, 'San Antonio', 0, 1),
(134, 37, 'San Felipe de Aconcagua', 0, 1),
(135, 37, 'Valparaíso', 0, 1),
(136, 37, 'Cachapoal', 0, 1),
(137, 37, 'Colchagua', 0, 1),
(139, 37, 'Talca', 0, 1),
(140, 37, 'Cardenal Caro', 0, 1),
(141, 37, 'Linares', 0, 1),
(142, 37, 'Curicó', 0, 1),
(143, 37, 'Cauquenes', 0, 1),
(144, 37, 'Concepción', 0, 1),
(145, 37, 'Ñuble', 0, 1),
(146, 37, 'Biobío', 0, 1),
(147, 37, 'Arauco', 0, 1),
(148, 37, 'Cautin', 0, 1),
(149, 37, 'Malleco', 0, 1),
(150, 37, 'Valdivia', 0, 1),
(151, 37, 'Ranco', 0, 1),
(152, 37, 'Llanquihue', 0, 1),
(153, 37, 'Osorno', 0, 1),
(154, 37, 'Chiloe', 0, 1),
(155, 37, 'Palena', 0, 1),
(156, 37, 'Coihaique', 0, 1),
(157, 37, 'Aisén', 0, 1),
(158, 37, 'General Carrera', 0, 1),
(159, 37, 'Capitan Prat', 0, 1),
(160, 37, 'Magallanes', 0, 1),
(161, 37, 'Ultima Esperanza', 0, 1),
(162, 37, 'Tierra del Fuego', 0, 1),
(163, 37, 'Antártica Chilena', 0, 1),
(164, 37, 'Santiago', 0, 1),
(165, 37, 'Cordillera', 0, 1),
(166, 37, 'Maipo', 0, 1),
(167, 37, 'Talagante', 0, 1),
(168, 37, 'Melipilla', 0, 1),
(169, 37, 'Chacabuco', 0, 1),
(170, 27, 'Belait', 0, 1),
(171, 27, 'Brunei Muara', 0, 1),
(172, 27, 'Temburong', 0, 1),
(173, 27, 'Tutong', 0, 1),
(174, 34, 'Ontario', 0, 1),
(175, 34, 'Quebec', 0, 1),
(176, 34, 'Nova Scotia', 0, 1),
(177, 34, 'New Brunswick', 0, 1),
(178, 34, 'Manitoba', 0, 1),
(179, 34, 'British Columbia', 0, 1),
(180, 34, 'Prince Edward Island', 0, 1),
(181, 34, 'Saskatchewan', 0, 1),
(182, 34, 'Alberta', 0, 1),
(183, 34, 'Newfoundland and Labrador', 0, 1),
(184, 34, 'Northwest Territories', 0, 1),
(185, 34, 'Yukon', 0, 1),
(187, 34, 'Nunavut', 0, 1),
(209, 139, 'Chachapoyas', 0, 1),
(210, 139, 'Bagua', 0, 1),
(211, 139, 'Bongará', 0, 1),
(212, 139, 'Condorcanqui', 0, 1),
(213, 139, 'Luya', 0, 1),
(214, 139, 'Rodríguez de Mendoza', 0, 1),
(215, 139, 'Utcubamba', 0, 1),
(216, 139, 'Huaraz', 0, 1),
(217, 139, 'Aija', 0, 1),
(218, 139, 'Antonio Raymondi', 0, 1),
(219, 139, 'Asunción', 0, 1),
(220, 139, 'Bolognesi', 0, 1),
(221, 139, 'Carhuaz', 0, 1),
(222, 139, 'Carlos Fermín Fitzcarrald', 0, 1),
(223, 139, 'Casma', 0, 1),
(224, 139, 'Corongo', 0, 1),
(225, 139, 'Huari', 0, 1),
(226, 139, 'Huarmey', 0, 1),
(227, 139, 'Huaylas', 0, 1),
(228, 139, 'Mariscal Luzuriaga', 0, 1),
(229, 139, 'Ocros', 0, 1),
(230, 139, 'Pallasca', 0, 1),
(231, 139, 'Pomabamba', 0, 1),
(232, 139, 'Recuay', 0, 1),
(233, 139, 'Santa', 0, 1),
(234, 139, 'Sihuas', 0, 1),
(235, 139, 'Yungay', 0, 1),
(236, 139, 'Abancay', 0, 1),
(237, 139, 'Andahuaylas', 0, 1),
(238, 139, 'Antabamba', 0, 1),
(239, 139, 'Aymaraes', 0, 1),
(240, 139, 'Cotabambas', 0, 1),
(241, 139, 'Chincheros', 0, 1),
(242, 139, 'Grau', 0, 1),
(243, 139, 'Arequipa', 0, 1),
(244, 139, 'Camaná', 0, 1),
(245, 139, 'Caravelí', 0, 1),
(246, 139, 'Castilla', 0, 1),
(247, 139, 'Caylloma', 0, 1),
(248, 139, 'Condesuyos', 0, 1),
(249, 139, 'Islay', 0, 1),
(250, 139, 'La Unión', 0, 1),
(251, 139, 'Huamanga', 0, 1),
(252, 139, 'Cangallo', 0, 1),
(253, 139, 'Huanca Sancos', 0, 1),
(254, 139, 'Huanta', 0, 1),
(255, 139, 'La Mar', 0, 1),
(256, 139, 'Lucanas', 0, 1),
(257, 139, 'Parinacochas', 0, 1),
(258, 139, 'Páucar del Sara Sara', 0, 1),
(259, 139, 'Sucre', 0, 1),
(260, 139, 'Víctor Fajardo', 0, 1),
(261, 139, 'Vilcas Huamán', 0, 1),
(262, 139, 'Cajamarca', 0, 1),
(263, 139, 'Cajabamba', 0, 1),
(264, 139, 'Celendín', 0, 1),
(265, 139, 'Chota', 0, 1),
(266, 139, 'Contumazá', 0, 1),
(267, 139, 'Cutervo', 0, 1),
(268, 139, 'Hualgayoc', 0, 1),
(269, 139, 'Jaén', 0, 1),
(270, 139, 'San Ignacio', 0, 1),
(271, 139, 'San Marcos', 0, 1),
(272, 139, 'San Miguel', 0, 1),
(273, 139, 'San Pablo', 0, 1),
(274, 139, 'Santa Cruz', 0, 1),
(275, 139, 'Callao', 0, 1),
(276, 139, 'Cusco', 0, 1),
(277, 139, 'Acomayo', 0, 1),
(278, 139, 'Anta', 0, 1),
(279, 139, 'Calca', 0, 1),
(280, 139, 'Canas', 0, 1),
(281, 139, 'Canchis', 0, 1),
(282, 139, 'Chumbivilcas', 0, 1),
(283, 139, 'Espinar', 0, 1),
(284, 139, 'La Convención', 0, 1),
(285, 139, 'Paruro', 0, 1),
(286, 139, 'Paucartambo', 0, 1),
(287, 139, 'Quispicanchi', 0, 1),
(288, 139, 'Urubamba', 0, 1),
(289, 139, 'Huancavelica', 0, 1),
(290, 139, 'Acobamba', 0, 1),
(291, 139, 'Angaraes', 0, 1),
(292, 139, 'Castrovirreyna', 0, 1),
(293, 139, 'Churcampa', 0, 1),
(294, 139, 'Huaytará', 0, 1),
(295, 139, 'Tayacaja', 0, 1),
(296, 139, 'Huánuco', 0, 1),
(297, 139, 'Ambo', 0, 1),
(298, 86, 'Kinai', 0, 1),
(299, 139, 'Dos de Mayo', 0, 1),
(300, 86, 'Tōkaidō', 0, 1),
(301, 139, 'Huacaybamba', 0, 1),
(302, 86, 'Tōsandō', 0, 1),
(303, 139, 'Huamalíes', 0, 1),
(304, 86, 'Hokurikudō', 0, 1),
(305, 86, 'San''indō', 0, 1),
(306, 139, 'Leoncio Prado', 0, 1),
(307, 86, 'San''yōdō', 0, 1),
(308, 86, 'Nankaidō', 0, 1),
(309, 139, 'Marañón', 0, 1),
(310, 86, 'Saikaidō', 0, 1),
(311, 86, 'Hokkaidō', 0, 1),
(312, 139, 'Pachitea', 0, 1),
(313, 139, 'Puerto Inca', 0, 1),
(314, 86, 'Taihō Code', 0, 1),
(315, 139, 'Lauricocha', 0, 1),
(316, 139, 'Yarowilca', 0, 1),
(317, 139, 'Ica', 0, 1),
(318, 139, 'Chincha', 0, 1),
(319, 139, 'Nazca', 0, 1),
(320, 139, 'Palpa', 0, 1),
(321, 139, 'Pisco', 0, 1),
(322, 139, 'Huancayo', 0, 1),
(323, 139, 'Concepción', 0, 1),
(324, 139, 'Chanchamayo', 0, 1),
(325, 139, 'Jauja', 0, 1),
(326, 139, 'Junín', 0, 1),
(327, 139, 'Satipo', 0, 1),
(328, 139, 'Tarma', 0, 1),
(329, 139, 'Yauli', 0, 1),
(330, 139, 'Chupaca', 0, 1),
(331, 139, 'Trujillo', 0, 1),
(332, 139, 'Ascope', 0, 1),
(333, 139, 'Bolívar', 0, 1),
(334, 139, 'Chepén', 0, 1),
(335, 139, 'Julcán', 0, 1),
(336, 139, 'Otuzco', 0, 1),
(337, 139, 'Pacasmayo', 0, 1),
(338, 139, 'Pataz', 0, 1),
(339, 139, 'Sánchez Carrión', 0, 1),
(340, 139, 'Santiago de Chuco', 0, 1),
(341, 106, 'Federal Territory of Kuala Lumpur', 0, 1),
(342, 139, 'Gran Chimú', 0, 1),
(343, 106, 'Federal Territory of Labuan', 0, 1),
(344, 139, 'Virú', 0, 1),
(345, 106, 'Federal Territory of Putrajaya', 0, 1),
(346, 139, 'Chiclayo', 0, 1),
(347, 106, 'Johor', 0, 1),
(348, 106, 'Kedah', 0, 1),
(349, 139, 'Ferreñafe', 0, 1),
(350, 106, 'Kelantan', 0, 1),
(351, 139, 'Lambayeque', 0, 1),
(352, 106, 'Malacca', 0, 1),
(353, 139, 'Lima', 0, 1),
(354, 106, 'Negeri Sembilan', 0, 1),
(355, 106, 'Pahang', 0, 1),
(356, 106, 'Perak', 0, 1),
(357, 139, 'Huaura', 0, 1),
(358, 106, 'Perlis', 0, 1),
(359, 139, 'Barranca', 0, 1),
(360, 106, 'Penang', 0, 1),
(361, 139, 'Cajatambo', 0, 1),
(362, 106, 'Sabah', 0, 1),
(363, 106, 'Sarawak', 0, 1),
(364, 139, 'Canta', 0, 1),
(365, 106, 'Selangor', 0, 1),
(366, 139, 'Cañete', 0, 1),
(367, 106, 'Terengganu', 0, 1),
(368, 139, 'Huaral', 0, 1),
(369, 139, 'Huarochirí', 0, 1),
(370, 139, 'Oyón', 0, 1),
(371, 139, 'Yauyos', 0, 1),
(372, 139, 'Maynas', 0, 1),
(373, 139, 'Alto Amazonas', 0, 1),
(374, 139, 'Loreto', 0, 1),
(375, 139, 'Mariscal Ramón Castilla', 0, 1),
(376, 139, 'Putumayo', 0, 1),
(377, 139, 'Requena', 0, 1),
(378, 139, 'Ucayali', 0, 1),
(379, 139, 'Datem del Marañón', 0, 1),
(380, 139, 'Manú', 0, 1),
(381, 139, 'Tahuamanu', 0, 1),
(382, 139, 'Mariscal Nieto', 0, 1),
(383, 139, 'General Sánchez Cerro', 0, 1),
(384, 139, 'Ilo', 0, 1),
(385, 139, 'Pasco', 0, 1),
(386, 139, 'Daniel Alcídes Carrión', 0, 1),
(387, 139, 'Oxapampa', 0, 1),
(388, 139, 'Piura', 0, 1),
(389, 139, 'Ayabaca', 0, 1),
(390, 139, 'Huancabamba', 0, 1),
(391, 139, 'Morropón', 0, 1),
(392, 139, 'Paita', 0, 1),
(393, 139, 'Sullana', 0, 1),
(394, 139, 'Talara', 0, 1),
(395, 139, 'Sechura', 0, 1),
(396, 139, 'Puno', 0, 1),
(397, 139, 'Azángaro', 0, 1),
(398, 139, 'Carabaya', 0, 1),
(399, 139, 'Chucuito', 0, 1),
(400, 139, 'El Collao', 0, 1),
(401, 139, 'Huancané', 0, 1),
(402, 139, 'Lampa', 0, 1),
(403, 139, 'Melgar', 0, 1),
(404, 139, 'Moho', 0, 1),
(405, 139, 'San Antonio de Putina', 0, 1),
(406, 139, 'San Román', 0, 1),
(407, 139, 'Sandia', 0, 1),
(408, 139, 'Yunguyo', 0, 1),
(409, 139, 'Moyobamba', 0, 1),
(410, 139, 'Bellavista', 0, 1),
(411, 139, 'El Dorado', 0, 1),
(412, 139, 'Huallaga', 0, 1),
(413, 139, 'Lamas', 0, 1),
(414, 139, 'Mariscal Cáceres', 0, 1),
(415, 139, 'Picota', 0, 1),
(416, 139, 'Rioja', 0, 1),
(417, 139, 'San Martín', 0, 1),
(418, 139, 'Tocache', 0, 1),
(419, 139, 'Tacna', 0, 1),
(420, 139, 'Candarave', 0, 1),
(421, 139, 'Jorge Basadre', 0, 1),
(422, 139, 'Tarata', 0, 1),
(423, 139, 'Tumbes', 0, 1),
(424, 139, 'Contralmirante Villar', 0, 1),
(425, 139, 'Zarumilla', 0, 1),
(426, 139, 'Coronel Portillo', 0, 1),
(427, 139, 'Atalaya', 0, 1),
(428, 139, 'Padre Abad', 0, 1),
(429, 139, 'Purús', 0, 1),
(430, 139, 'Tambopata', 0, 1),
(431, 11, 'Australian Capital Territory', 0, 1),
(432, 11, 'New South Wales', 0, 1),
(433, 11, 'Northern Territory', 0, 1),
(434, 11, 'Queensland', 0, 1),
(435, 11, 'South Australia', 0, 1),
(436, 11, 'Tasmania', 0, 1),
(437, 11, 'Victoria', 0, 1),
(438, 113, 'Chihuahua', 0, 1),
(439, 113, 'Sonora', 0, 1),
(440, 113, 'Coahuila', 0, 1),
(441, 113, 'Durango', 0, 1),
(442, 113, 'Oaxaca', 0, 1),
(443, 113, 'Tamaulipas', 0, 1),
(444, 113, 'Jalisco', 0, 1),
(445, 113, 'Zacatecas', 0, 1),
(446, 113, 'Baja California Sur', 0, 1),
(447, 113, 'Chiapas', 0, 1),
(448, 113, 'Veracruz', 0, 1),
(449, 113, 'Baja California', 0, 1),
(450, 113, 'Nuevo León', 0, 1),
(451, 113, 'Guerrero', 0, 1),
(452, 113, 'San Luis Potosí', 0, 1),
(453, 113, 'Michoacán', 0, 1),
(454, 113, 'Campeche', 0, 1),
(455, 113, 'Sinaloa', 0, 1),
(456, 113, 'Quintana Roo', 0, 1),
(457, 113, 'Yucatán', 0, 1),
(458, 113, 'Puebla', 0, 1),
(459, 113, 'Guanajuato', 0, 1),
(460, 113, 'Nayarit', 0, 1),
(461, 113, 'Tabasco', 0, 1),
(462, 113, 'México', 0, 1),
(463, 113, 'Hidalgo', 0, 1),
(464, 113, 'Querétaro', 0, 1),
(465, 113, 'Colima', 0, 1),
(466, 113, 'Aguascalientes', 0, 1),
(467, 113, 'Morelos', 0, 1),
(468, 113, 'Tlaxcala', 0, 1),
(469, 113, 'Mexico City', 0, 1),
(470, 126, 'Auckland', 0, 1),
(471, 126, 'New Plymouth', 0, 1),
(472, 126, 'Hawke''s Bay', 0, 1),
(473, 126, 'Wellington', 0, 1),
(474, 126, 'Nelson', 0, 1),
(475, 126, 'Marlborough', 0, 1),
(476, 126, 'Westland', 0, 1),
(477, 126, 'Canterbury', 0, 1),
(478, 126, 'Otago', 0, 1),
(479, 126, 'Southland', 0, 1),
(480, 158, 'Singapore', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config_currency_type`
--

CREATE TABLE IF NOT EXISTS `config_currency_type` (
  `code` int(11) NOT NULL DEFAULT '0',
  `currency_id` char(3) NOT NULL DEFAULT '',
  `currency_name` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_currency_type`
--

INSERT INTO `config_currency_type` (`code`, `currency_id`, `currency_name`) VALUES
(3, 'AED', 'Utd. Arab Emir. Dirham'),
(4, 'AFN', 'Afghanistan Afghani'),
(5, 'ALL', 'Albanian Lek'),
(6, 'ANG', 'NL Antillian Guilder'),
(7, 'AOR', 'Angolan New Kwanza'),
(177, 'ARP', 'Argentina Pesos'),
(8, 'ARS', 'Argentine Peso'),
(10, 'AUD', 'Australian Dollar'),
(11, 'AWG', 'Aruban Florin'),
(12, 'BBD', 'Barbados Dollar'),
(13, 'BDT', 'Bangladeshi Taka'),
(15, 'BGL', 'Bulgarian Lev'),
(16, 'BHD', 'Bahraini Dinar'),
(17, 'BIF', 'Burundi Franc'),
(18, 'BMD', 'Bermudian Dollar'),
(19, 'BND', 'Brunei Dollar'),
(20, 'BOB', 'Bolivian Boliviano'),
(21, 'BRL', 'Brazilian Real'),
(22, 'BSD', 'Bahamian Dollar'),
(23, 'BTN', 'Bhutan Ngultrum'),
(24, 'BWP', 'Botswana Pula'),
(25, 'BZD', 'Belize Dollar'),
(26, 'CAD', 'Canadian Dollar'),
(27, 'CHF', 'Swiss Franc'),
(28, 'CLP', 'Chilean Peso'),
(29, 'CNY', 'Chinese Yuan Renminbi'),
(30, 'COP', 'Colombian Peso'),
(31, 'CRC', 'Costa Rican Colon'),
(32, 'CUP', 'Cuban Peso'),
(33, 'CVE', 'Cape Verde Escudo'),
(34, 'CYP', 'Cyprus Pound'),
(171, 'CZK', 'Czech Koruna'),
(37, 'DJF', 'Djibouti Franc'),
(38, 'DKK', 'Danish Krona'),
(39, 'DOP', 'Dominican Peso'),
(40, 'DZD', 'Algerian Dinar'),
(41, 'ECS', 'Ecuador Sucre'),
(43, 'EEK', 'Estonian Krona'),
(44, 'EGP', 'Egyptian Pound'),
(46, 'ETB', 'Ethiopian Birr'),
(42, 'EUR', 'Euro'),
(48, 'FJD', 'Fiji Dollar'),
(49, 'FKP', 'Falkland Islands Pound'),
(51, 'GBP', 'Pound Sterling'),
(52, 'GHC', 'Ghanaian Cedi'),
(53, 'GIP', 'Gibraltar Pound'),
(54, 'GMD', 'Gambian Dalasi'),
(55, 'GNF', 'Guinea Franc'),
(57, 'GTQ', 'Guatemalan Quetzal'),
(58, 'GYD', 'Guyanan Dollar'),
(59, 'HKD', 'Hong Kong Dollar'),
(60, 'HNL', 'Honduran Lempira'),
(61, 'HRK', 'Croatian Kuna'),
(62, 'HTG', 'Haitian Gourde'),
(63, 'HUF', 'Hungarian Forint'),
(64, 'IDR', 'Indonesian Rupiah'),
(66, 'ILS', 'Israeli New Shekel'),
(67, 'INR', 'Indian Rupee'),
(68, 'IQD', 'Iraqi Dinar'),
(69, 'IRR', 'Iranian Rial'),
(70, 'ISK', 'Iceland Krona'),
(72, 'JMD', 'Jamaican Dollar'),
(73, 'JOD', 'Jordanian Dinar'),
(74, 'JPY', 'Japanese Yen'),
(75, 'KES', 'Kenyan Shilling'),
(76, 'KHR', 'Kampuchean Riel'),
(77, 'KMF', 'Comoros Franc'),
(78, 'KPW', 'North Korean Won'),
(79, 'KRW', 'Korean Won'),
(80, 'KWD', 'Kuwaiti Dinar'),
(81, 'KYD', 'Cayman Islands Dollar'),
(82, 'KZT', 'Kazakhstan Tenge'),
(83, 'LAK', 'Lao Kip'),
(84, 'LBP', 'Lebanese Pound'),
(85, 'LKR', 'Sri Lanka Rupee'),
(86, 'LRD', 'Liberian Dollar'),
(87, 'LSL', 'Lesotho Loti'),
(88, 'LTL', 'Lithuanian Litas'),
(90, 'LVL', 'Latvian Lats'),
(91, 'LYD', 'Libyan Dinar'),
(92, 'MAD', 'Moroccan Dirham'),
(93, 'MGF', 'Malagasy Franc'),
(94, 'MMK', 'Myanmar Kyat'),
(95, 'MNT', 'Mongolian Tugrik'),
(96, 'MOP', 'Macau Pataca'),
(97, 'MRO', 'Mauritanian Ouguiya'),
(98, 'MTL', 'Maltese Lira'),
(99, 'MUR', 'Mauritius Rupee'),
(100, 'MVR', 'Maldive Rufiyaa'),
(101, 'MWK', 'Malawi Kwacha'),
(102, 'MXN', 'Mexican New Peso'),
(172, 'MXP', 'Mexican Peso'),
(103, 'MYR', 'Malaysian Ringgit'),
(104, 'MZM', 'Mozambique Metical'),
(105, 'NAD', 'Namibia Dollar'),
(106, 'NGN', 'Nigerian Naira'),
(107, 'NIO', 'Nicaraguan Cordoba Oro'),
(109, 'NOK', 'Norwegian Krona'),
(110, 'NPR', 'Nepalese Rupee'),
(111, 'NZD', 'New Zealand Dollar'),
(112, 'OMR', 'Omani Rial'),
(113, 'PAB', 'Panamanian Balboa'),
(114, 'PEN', 'Peruvian Nuevo Sol'),
(115, 'PGK', 'Papua New Guinea Kina'),
(116, 'PHP', 'Philippine Peso'),
(117, 'PKR', 'Pakistan Rupee'),
(118, 'PLN', 'Polish Zloty'),
(120, 'PYG', 'Paraguay Guarani'),
(121, 'QAR', 'Qatari Rial'),
(122, 'ROL', 'Romanian Leu'),
(123, 'RUB', 'Russian Rouble'),
(180, 'RUR', 'Russia Rubles'),
(173, 'SAR', 'Saudi Arabia Riyal'),
(125, 'SBD', 'Solomon Islands Dollar'),
(126, 'SCR', 'Seychelles Rupee'),
(127, 'SDD', 'Sudanese Dinar'),
(128, 'SDP', 'Sudanese Pound'),
(129, 'SEK', 'Swedish Krona'),
(131, 'SGD', 'Singapore Dollar'),
(132, 'SHP', 'St. Helena Pound'),
(130, 'SKK', 'Slovak Koruna'),
(135, 'SLL', 'Sierra Leone Leone'),
(136, 'SOS', 'Somali Shilling'),
(137, 'SRD', 'Surinamese Dollar'),
(138, 'STD', 'Sao Tome/Principe Dobra'),
(139, 'SVC', 'El Salvador Colon'),
(140, 'SYP', 'Syrian Pound'),
(141, 'SZL', 'Swaziland Lilangeni'),
(142, 'THB', 'Thai Baht'),
(143, 'TND', 'Tunisian Dinar'),
(144, 'TOP', 'Tongan Pa''anga'),
(145, 'TRL', 'Turkish Lira'),
(146, 'TTD', 'Trinidad/Tobago Dollar'),
(147, 'TWD', 'Taiwan Dollar'),
(148, 'TZS', 'Tanzanian Shilling'),
(149, 'UAH', 'Ukraine Hryvnia'),
(150, 'UGX', 'Uganda Shilling'),
(151, 'USD', 'United States Dollar'),
(152, 'UYP', 'Uruguayan Peso'),
(153, 'VEB', 'Venezuelan Bolivar'),
(154, 'VND', 'Vietnamese Dong'),
(155, 'VUV', 'Vanuatu Vatu'),
(156, 'WST', 'Samoan Tala'),
(158, 'XAF', 'CFA Franc BEAC'),
(159, 'XAG', 'Silver (oz.)'),
(160, 'XAU', 'Gold (oz.)'),
(161, 'XCD', 'Eastern Caribbean Dollars'),
(179, 'XDR', 'IMF Special Drawing Right'),
(162, 'XOF', 'CFA Franc BCEAO'),
(163, 'XPD', 'Palladium (oz.)'),
(164, 'XPF', 'CFP Franc'),
(165, 'XPT', 'Platinum (oz.)'),
(166, 'YER', 'Yemeni Riyal'),
(167, 'YUM', 'Yugoslavian Dinar'),
(175, 'YUN', 'Yugoslav Dinar'),
(168, 'ZAR', 'South African Rand'),
(176, 'ZMK', 'Zambian Kwacha'),
(169, 'ZRN', 'New Zaire'),
(170, 'ZWD', 'Zimbabwe Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `config_general`
--

CREATE TABLE IF NOT EXISTS `config_general` (
`id` int(10) unsigned NOT NULL,
  `type` char(20) NOT NULL COMMENT 'type select box',
  `date_add` int(11) DEFAULT '0',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `avail` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_general`
--

INSERT INTO `config_general` (`id`, `type`, `date_add`, `last_update`, `avail`) VALUES
(1, 'skill', 1447149812, '0000-00-00 00:00:00', 1),
(2, 'education', 1447150591, '0000-00-00 00:00:00', 1),
(3, 'education', 1447150600, '0000-00-00 00:00:00', 1),
(4, 'education', 1447150608, '0000-00-00 00:00:00', 1),
(5, 'education', 1447150618, '0000-00-00 00:00:00', 1),
(6, 'education', 1447150626, '0000-00-00 00:00:00', 1),
(7, 'relation', 1449204067, '0000-00-00 00:00:00', 1),
(8, 'relation', 1449204077, '0000-00-00 00:00:00', 1),
(9, 'job_title', 1449474827, '0000-00-00 00:00:00', 1),
(10, 'job_title', 1449474855, '0000-00-00 00:00:00', 1),
(11, 'job_title', 1449474869, '0000-00-00 00:00:00', 1),
(12, 'job_title', 1449474891, '0000-00-00 00:00:00', 1),
(13, 'paygrade', 1449657879, '0000-00-00 00:00:00', 1),
(14, 'paygrade', 1449657892, '0000-00-00 00:00:00', 1),
(15, 'paygrade', 1449718258, '0000-00-00 00:00:00', 1),
(16, 'pay_frequency', 1449719661, '0000-00-00 00:00:00', 1),
(17, 'pay_frequency', 1449719687, '0000-00-00 00:00:00', 1),
(18, 'pay_frequency', 1449719702, '0000-00-00 00:00:00', 1),
(19, 'job_title', 1450057788, '0000-00-00 00:00:00', 1),
(20, 'emp_status', 1450064458, '0000-00-00 00:00:00', 1),
(21, 'emp_status', 1450064490, '0000-00-00 00:00:00', 1),
(22, 'emp_status', 1450064510, '0000-00-00 00:00:00', 1),
(23, 'job_category', 1450085644, '0000-00-00 00:00:00', 1),
(24, 'job_category', 1450085653, '0000-00-00 00:00:00', 1),
(25, 'job_category', 1450085665, '0000-00-00 00:00:00', 1),
(26, 'pay_frequency', 1450161489, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config_general_desc`
--

CREATE TABLE IF NOT EXISTS `config_general_desc` (
  `id` int(10) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT 'EN',
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_general_desc`
--

INSERT INTO `config_general_desc` (`id`, `lang`, `name`) VALUES
(1, 'EN', 'Communication'),
(1, 'VN', 'Communication'),
(2, 'EN', 'High school'),
(2, 'VN', 'High school'),
(3, 'EN', 'College'),
(3, 'VN', 'College'),
(4, 'EN', 'Bachelors'),
(4, 'VN', 'Bachelors'),
(5, 'EN', 'Master'),
(5, 'VN', 'Master'),
(6, 'EN', 'Ph.D'),
(6, 'VN', 'Ph.D'),
(7, 'EN', 'Child'),
(7, 'VN', 'Child'),
(8, 'EN', 'Other'),
(8, 'VN', 'Other'),
(9, 'EN', 'CEO'),
(9, 'VN', 'Giam doc dieu hanh'),
(10, 'EN', 'HR Specialist'),
(10, 'VN', 'HR Specialist'),
(11, 'EN', 'Account'),
(11, 'VN', 'Ke toan'),
(12, 'EN', 'Leader'),
(12, 'VN', 'Truong phong'),
(13, 'EN', 'Luong giam doc 1'),
(13, 'VN', 'Luong giam doc 1'),
(14, 'EN', 'Luong giam doc 2'),
(14, 'VN', 'Luong giam doc 2'),
(15, 'EN', 'Luong truong phong'),
(15, 'VN', 'Luong truong phong'),
(16, 'EN', 'Theo giờ'),
(16, 'VN', 'Theo giờ'),
(17, 'EN', 'Theo tuần'),
(17, 'VN', 'Theo tuần'),
(18, 'EN', 'Theo tháng'),
(18, 'VN', 'Theo tháng'),
(19, 'EN', 'Staff'),
(19, 'VN', 'Staff'),
(20, 'EN', 'Đã nghỉ việc'),
(20, 'VN', 'Đã nghỉ việc'),
(21, 'EN', 'Đang làm việc'),
(21, 'VN', 'Đang làm việc'),
(22, 'EN', 'Tạm nghỉ'),
(22, 'VN', 'Tạm nghỉ'),
(23, 'EN', 'Ky thuat'),
(23, 'VN', 'Ky thuat'),
(24, 'EN', 'Cong nhan may'),
(24, 'VN', 'Cong nhan may'),
(25, 'EN', 'Cong nhan cat vai'),
(25, 'VN', 'Cong nhan cat vai'),
(26, 'EN', 'Theo dự án'),
(26, 'VN', 'Theo dự án');

-- --------------------------------------------------------

--
-- Table structure for table `config_locations`
--

CREATE TABLE IF NOT EXISTS `config_locations` (
`id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `country_code` int(7) NOT NULL,
  `province` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(35) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `fax` varchar(35) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_locations`
--

INSERT INTO `config_locations` (`id`, `name`, `country_code`, `province`, `city`, `address`, `zip_code`, `phone`, `fax`, `notes`) VALUES
(1, 'Binh Duong', 2, '', 'Binh Duong City', 'TP Moi Binh Duong', '7000', '0866 85 83 94', '', 'Binh Duong Brand'),
(2, 'Ho Chi Minh', 2, '', 'Ho Chi Minh city', '23/13 A Mai Lao Bang, Tan Binh Dist', '7000', '0866 85 83 94', '0866 85 83 94', 'Ho Chi Minh');

-- --------------------------------------------------------

--
-- Table structure for table `config_organize_info`
--

CREATE TABLE IF NOT EXISTS `config_organize_info` (
`id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tax_id` varchar(30) DEFAULT NULL,
  `registration_number` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `country_id` int(4) DEFAULT '0',
  `province` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zip_code` varchar(30) DEFAULT NULL,
  `street1` varchar(100) DEFAULT NULL,
  `street2` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_pay_currency`
--

CREATE TABLE IF NOT EXISTS `config_pay_currency` (
  `pay_grade_id` int(11) NOT NULL,
  `currency_id` varchar(6) NOT NULL DEFAULT '',
  `min_salary` double DEFAULT NULL,
  `max_salary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_pay_currency`
--

INSERT INTO `config_pay_currency` (`pay_grade_id`, `currency_id`, `min_salary`, `max_salary`) VALUES
(13, 'THB', 500, 1200),
(13, 'USD', 800, 1000),
(13, 'VND', 15000000, 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `config_subunit`
--

CREATE TABLE IF NOT EXISTS `config_subunit` (
`mcId` int(4) NOT NULL,
  `mcAvail` tinyint(1) NOT NULL DEFAULT '1',
  `parents` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_subunit`
--

INSERT INTO `config_subunit` (`mcId`, `mcAvail`, `parents`, `level`, `lft`, `rgt`) VALUES
(1, 1, 0, 1, 0, 13),
(2, 1, 1, 2, 1, 12),
(3, 1, 2, 3, 2, 3),
(4, 1, 2, 3, 4, 5),
(5, 1, 2, 3, 6, 7),
(6, 1, 2, 3, 8, 9),
(7, 1, 2, 3, 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `config_subunit_desc`
--

CREATE TABLE IF NOT EXISTS `config_subunit_desc` (
  `mcId` int(4) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT 'EN',
  `mcCategory` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_subunit_desc`
--

INSERT INTO `config_subunit_desc` (`mcId`, `lang`, `mcCategory`) VALUES
(1, 'EN', 'Panpic Co.,Ltd'),
(1, 'VN', 'Công ty TNHH Công Nghệ Panpic'),
(2, 'EN', 'Ho Chi Minh'),
(2, 'VN', 'Ho Chi Minh'),
(3, 'EN', 'Director'),
(3, 'VN', 'Director'),
(4, 'EN', 'HR dept'),
(4, 'VN', 'HR dept'),
(5, 'EN', 'Account'),
(5, 'VN', 'Account'),
(6, 'EN', 'Marketing Dept'),
(6, 'VN', 'Marketing Dept'),
(7, 'EN', 'Factory'),
(7, 'VN', 'Factory');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_admin`
--

CREATE TABLE IF NOT EXISTS `panpic_admin` (
`adminId` int(12) NOT NULL,
  `emp_id` int(12) NOT NULL,
  `adminLogin` varchar(80) NOT NULL,
  `adminPass` varchar(100) NOT NULL,
  `adminRole` varchar(25) NOT NULL DEFAULT 'MOD',
  `adminPermission` varchar(200) NOT NULL,
  `adminName` varchar(50) DEFAULT NULL,
  `adminAvail` tinyint(1) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_admin`
--

INSERT INTO `panpic_admin` (`adminId`, `emp_id`, `adminLogin`, `adminPass`, `adminRole`, `adminPermission`, `adminName`, `adminAvail`, `date_add`, `last_update`) VALUES
(20, 0, 'nhantam', 'fcea920f7412b5da7be0cf42b8c93759', 'ADMINISTRATOR', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22', 'Tam Nguyen', 1, '2011-03-09 13:21:45', '2015-12-17 09:30:00'),
(23, 12, 'superadmin', 'fcea920f7412b5da7be0cf42b8c93759', 'ADMINISTRATOR', '1,2,3,4,5,6,7,8,9', 'Super Admin', 1, '0000-00-00 00:00:00', '2015-12-16 03:48:16'),
(40, 29, 'tt', 'accc9105df5383111407fd5b41255e23', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 30, 'uuuu', 'accc9105df5383111407fd5b41255e23', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 31, 'tete', '73c18c59a39b18382081ec00bb456d43', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 32, 'sss', 'd41d8cd98f00b204e9800998ecf8427e', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 36, 'rgrgrg', '0ecb2b966eca6994910caee2947f6679', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 38, '99', 'ac627ab1ccbdb62ec96e702f07f6425b', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 40, '', 'd41d8cd98f00b204e9800998ecf8427e', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 46, 'df', 'eff7d5dba32b4da32d9a67a519434d3f', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 50, 'e', 'e1671797c52e15f763380b45e841ec32', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 67, '7', '8f14e45fceea167a5a36dedd4bea2543', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 69, 'l', '2db95e8e1a9267b7a1188556b2013b33', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 73, 'fffffff', '633de4b0c14ca52ea2432a3c8a5c4c31', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 77, 'toàn', '45eea262ec1d46cc5ee3817bc821e757', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 83, 'tendangnhap', 'c4efd5020cb49b9d3257ffa0fbccc0ae', 'MOD', '', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 115, '6y', '415290769594460e2e485922904f345d', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 116, '4r4r', 'f7177163c833dff4b38fc8d2872f1ec6', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 119, '23', '37693cfc748049e45d87b8c7d8b9aacd', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 120, '2345', 'a87ff679a2f3e71d9181a67b7542122c', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 121, '3rg', '4b43b0aee35624cd95b910189b3dc231', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 142, 'admin', '8277e0910d750195b448797616e091ad', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 147, 'usể name', 'c81e728d9d4c2f636f067f89cc14862c', 'MOD', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_adminhistory`
--

CREATE TABLE IF NOT EXISTS `panpic_adminhistory` (
  `ahId` int(12) NOT NULL,
  `adminId` int(5) NOT NULL,
  `ahJobId` int(12) NOT NULL,
  `ahJobOperator` tinyint(1) NOT NULL DEFAULT '0',
  `ahJobName` tinyint(1) NOT NULL DEFAULT '0',
  `adminName` varchar(50) DEFAULT NULL,
  `ahDateAdd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_adminsession`
--

CREATE TABLE IF NOT EXISTS `panpic_adminsession` (
  `asId` int(12) NOT NULL,
  `asAId` int(5) NOT NULL,
  `asJobId` varchar(20) NOT NULL,
  `asJobOperator` tinyint(2) DEFAULT NULL,
  `asJobName` tinyint(2) DEFAULT NULL,
  `asWorkingStatus` tinyint(2) DEFAULT '0',
  `asTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asValid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_adminsession`
--

INSERT INTO `panpic_adminsession` (`asId`, `asAId`, `asJobId`, `asJobOperator`, `asJobName`, `asWorkingStatus`, `asTimestamp`, `asValid`) VALUES
(6828, 3, 'RWs8T1rQimpkwok', 2, 1, 0, '2015-08-08 08:04:54', 1),
(6829, 3, 'S3ZmhbMCU9FnfQo', 2, 1, 0, '2015-08-08 08:04:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_employee`
--

CREATE TABLE IF NOT EXISTS `panpic_employee` (
`emp_number` bigint(12) NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `emp_lastname` varchar(100) NOT NULL DEFAULT '',
  `emp_firstname` varchar(100) NOT NULL DEFAULT '',
  `emp_middle_name` varchar(100) DEFAULT '',
  `emp_nick_name` varchar(100) DEFAULT '',
  `emp_smoker` smallint(6) DEFAULT '0',
  `ethnic_race_code` varchar(13) DEFAULT NULL,
  `emp_birthday` date DEFAULT NULL,
  `nation_code` int(4) DEFAULT NULL,
  `emp_gender` tinyint(1) NOT NULL DEFAULT '0',
  `emp_marital_status` tinyint(1) DEFAULT '0',
  `emp_ssn_num` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `emp_sin_num` varchar(100) DEFAULT '',
  `emp_other_id` varchar(100) DEFAULT '',
  `emp_dri_lice_num` varchar(100) DEFAULT '',
  `emp_dri_lice_exp_date` date DEFAULT NULL,
  `emp_military_service` varchar(100) DEFAULT '',
  `emp_job_title` int(7) DEFAULT NULL,
  `emp_status` int(13) DEFAULT NULL,
  `emp_job_cat` int(11) DEFAULT NULL,
  `emp_sub_unit` int(11) DEFAULT NULL,
  `emp_location` int(6) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `emp_street1` varchar(100) DEFAULT '',
  `emp_street2` varchar(100) DEFAULT '',
  `city_code` varchar(100) DEFAULT '',
  `coun_code` varchar(100) DEFAULT '',
  `provin_code` varchar(100) DEFAULT '',
  `emp_zipcode` varchar(20) DEFAULT NULL,
  `emp_hm_telephone` varchar(50) DEFAULT NULL,
  `emp_mobile` varchar(50) DEFAULT NULL,
  `emp_work_telephone` varchar(50) DEFAULT NULL,
  `emp_work_email` varchar(50) DEFAULT NULL,
  `sal_grd_code` varchar(13) DEFAULT NULL,
  `emp_oth_email` varchar(50) DEFAULT NULL,
  `termination_id` int(4) DEFAULT NULL,
  `custom1` varchar(250) DEFAULT NULL,
  `custom2` varchar(250) DEFAULT NULL,
  `custom3` varchar(250) DEFAULT NULL,
  `custom4` varchar(250) DEFAULT NULL,
  `custom5` varchar(250) DEFAULT NULL,
  `custom6` varchar(250) DEFAULT NULL,
  `custom7` varchar(250) DEFAULT NULL,
  `custom8` varchar(250) DEFAULT NULL,
  `custom9` varchar(250) DEFAULT NULL,
  `custom10` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_employee`
--

INSERT INTO `panpic_employee` (`emp_number`, `employee_id`, `emp_lastname`, `emp_firstname`, `emp_middle_name`, `emp_nick_name`, `emp_smoker`, `ethnic_race_code`, `emp_birthday`, `nation_code`, `emp_gender`, `emp_marital_status`, `emp_ssn_num`, `emp_sin_num`, `emp_other_id`, `emp_dri_lice_num`, `emp_dri_lice_exp_date`, `emp_military_service`, `emp_job_title`, `emp_status`, `emp_job_cat`, `emp_sub_unit`, `emp_location`, `joined_date`, `emp_street1`, `emp_street2`, `city_code`, `coun_code`, `provin_code`, `emp_zipcode`, `emp_hm_telephone`, `emp_mobile`, `emp_work_telephone`, `emp_work_email`, `sal_grd_code`, `emp_oth_email`, `termination_id`, `custom1`, `custom2`, `custom3`, `custom4`, `custom5`, `custom6`, `custom7`, `custom8`, `custom9`, `custom10`) VALUES
(50, NULL, 'abc', 'đeqưeg', 'đeqưeg', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, NULL, '8', '87', '8', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, NULL, 'l', 'kk', 'l', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, 'nguyen', 'teo', 'van', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', 9, 21, 23, 2, 2, '2015-12-03', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, NULL, 'toan', 'dinh', 'trường', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', 12, 21, 23, 7, 2, '2015-12-01', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, NULL, 'họ', 'tên', 'đêm', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', 12, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, NULL, 'sg', 'sfg', 'sfg', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, NULL, 'nguyen', 'ti', '', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, NULL, 'dfdfdf', 'ầdf', 'àdff', '', 0, NULL, '2015-12-02', 2, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, NULL, 'dfdfdf', 'ầdf', 'àdff', '', 0, NULL, '0000-00-00', 0, 2, 2, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, NULL, 'dfdfdf', 'ầdf', 'àdff', '', 0, NULL, '2015-12-05', 37, 2, 2, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, NULL, 'f', 'à', 'd', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, NULL, 'f', 'à', 'd', 'fdfdfd', 0, NULL, '0000-00-00', 1, 1, 0, '', '', '', '2222222', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, NULL, '12', '12', '12', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, NULL, '12', '12', '12', '12ee', 0, NULL, '0000-00-00', 0, 1, 1, '', '', '', '2222222222222222222222', '2015-12-05', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, NULL, 'gbgbg', 'gbgbg', 'gbg', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, NULL, 'gbgbg', 'gbgbg', 'gbg', 'ggggggggggg', 0, NULL, '0000-00-00', 0, 1, 1, '', '', '', '6363636', '0000-00-00', 'đã đi', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, NULL, 'gbgbg', 'gbgbg', 'gbg', 'ggggggggggg', 1, NULL, '0000-00-00', 0, 1, 1, '', '', '', '6363636', '0000-00-00', 'đã đi', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, NULL, 'gbgbg', 'gbgbg', 'gbg', 'ggggggggggg', 0, NULL, '2015-12-02', 0, 1, 1, '', '', '', '6363636', '0000-00-00', 'đã đi', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, NULL, 'gbgbg', 'gbgbg', 'gbg', 'ggggggggggg', NULL, NULL, '2015-12-02', 0, 1, 1, '', '', '', '6363636', '0000-00-00', 'đã đi', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, NULL, '121212', '1212', '121212', '', 0, NULL, NULL, NULL, 0, 1, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, NULL, 'ffe', 'êf', 'fff', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, NULL, 'fvfv', 'fvfv', 'fvfv', '22222', 1, NULL, '0011-10-02', 2, 2, 2, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, NULL, 'ff', 'dd', 'ff', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, NULL, 'et', 'tte', 'te', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, NULL, '333', '333', '333', '333', 1, NULL, '2015-12-03', 2, 2, 2, '', '', '', '333', '2015-12-03', '3333', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, NULL, 'rtrtr', 'trtr', 'rtrtr', 'dfdfdfd', 1, NULL, '2015-12-27', 2, 2, 0, '', '', '', '2323', '2015-12-06', '2323234243', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, NULL, '5555', '555', '55', '556', NULL, NULL, '0000-00-00', 0, 0, 2, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, NULL, 'ửg', 'we', 'ưg', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, NULL, '31', '3131', '31', '31', NULL, NULL, '2015-12-12', 0, 2, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, NULL, '7', '7', '7', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, NULL, '4r4r', 'r4r4', '4r4', '4444', 1, NULL, '2015-12-06', 2, 2, 2, '', '', '', '44', '2015-12-06', '444', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, NULL, 'd', 'eđ', 'de', 'e', 1, NULL, '2015-12-27', 2, 2, 2, '', '', '', '33', '2015-12-06', 'fe', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, NULL, 'r', 'è', 'v', 'ev', 1, NULL, '2015-12-27', 2, 2, 2, '', '', '', 'e33', '2015-12-05', '3rf', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, NULL, '234', '234', '234', '34', 1, NULL, '2015-12-27', 2, 2, 2, '', '', '', '34', '2015-12-05', '3434', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, NULL, '2345', '4234', '2345', '2342', 1, NULL, '2016-01-03', 2, 2, 2, '', '', '', '12341234', '2015-12-06', '1234', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, NULL, '3f', 'f3f', '3f', '3f3fg', 1, NULL, '2015-12-27', 2, 2, 2, '', '', '', '343f', '2015-12-05', '3f3f3', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, NULL, '2', '23', '23', '4234', 1, NULL, '2015-12-26', 1, 2, 2, '', '', '', '234234', '2015-12-05', '234234', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, NULL, 'ẻvẻ', 'êf', 'vev', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', 9, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, NULL, '234234', '23423', '234234', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, NULL, 'dfd', 'ádf', '', 'adsf', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, NULL, 'ừe', 'ưè', 'è', 'ưèwè', 1, NULL, '2015-12-19', 2, 2, 2, '', '', '', 'ư3f', '2015-12-05', 'ưèwe', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, NULL, 'àg', 'sfa', 'à', 'àà', NULL, NULL, '2015-12-26', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, NULL, 'êff', 'refre', '', 'ádfádf', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, NULL, 'rgrg', 'rg', 'ádf', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, NULL, 'ẻgẻg', 'eẻgẻg', 'ẻgẻg', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, NULL, '3f', 'ề', '3f', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, NULL, 'nam', 'tran', 'van', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', 12, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, NULL, 'be', 'le', 'thi', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', 9, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, NULL, 'dfw', 'df', '', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, NULL, 'rt', 'rt', 'rt', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, NULL, 't5', 't5', '', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, NULL, 'tn', 'tn', '', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, NULL, '3d', '2', '', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, NULL, '3d', '3d', '3d', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, NULL, 'hov', 'tev', '', '', NULL, NULL, '0000-00-00', 7, 0, 0, '', '', '', '', '0000-00-00', '', 0, 0, 0, NULL, NULL, '0000-00-00', '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, NULL, 'rgrg', 'rrg', 'rgrg', 'rgrgr', 1, NULL, '0000-00-00', 0, 0, 0, '', '', '', 'rgr', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, NULL, 'fe', 'ằè', 'ư', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, 'ưèw', 'ưè', 'ưè', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, NULL, 'dinh', 'nguyen', '', '4g4tg', 1, NULL, '2015-12-06', 4, 1, 2, '', '', '', '4gg', '2015-12-05', '45grgf', 9, 21, 24, 1, 2, '2015-03-06', '5rg4g', '4g4tg', '4g45', '19', 'g4g4g', '45g45g4', '45', '5554', '4545', '454545', NULL, '454545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, NULL, '0', '0', '', '', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, NULL, 'hog', 'tenầgg', 'demg', 'tenthuônggoi', 1, NULL, '2015-12-06', 4, 2, 1, '', '', '', '2323', '2015-12-06', '33326', NULL, NULL, NULL, NULL, NULL, NULL, 'duong1', 'duong2', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, NULL, 'rf', 'tr', '', 'ten thuong gọi', 1, NULL, '2015-12-04', 3, 1, 1, '', '', '', '3366554412', '2015-12-10', 'dsvdfvdf', NULL, NULL, NULL, NULL, NULL, NULL, 'duong1', 'duong2', 'thanhphp hue', '2', 'thua thien hue', '054', '054', '0168', '0543', 'mainmail.com', NULL, 'othermail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, NULL, 'dd', 'abc', '', 'ádề', NULL, NULL, '0000-00-00', 0, 0, 0, '', '', '', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, NULL, 'test', 'àa', '', '', 0, NULL, NULL, NULL, 0, 0, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_attach`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_attach` (
  `image_id` bigint(20) unsigned NOT NULL,
  `object_id` bigint(20) NOT NULL COMMENT 'emp_id, post_id',
  `title` varchar(100) DEFAULT NULL,
  `image_type` char(4) DEFAULT 'post' COMMENT 'pic, attach,post,page',
  `path_image` varchar(255) NOT NULL COMMENT '2015/08/file.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_attach`
--

INSERT INTO `panpic_emp_attach` (`image_id`, `object_id`, `title`, `image_type`, `path_image`) VALUES
(5, 11, '20150815211828_banner4.png', 'post', '2015/08/20150815211828_banner4.png'),
(6, 12, '20150815212104_banner2.png', 'post', '2015/08/20150815212104_banner2.png'),
(7, 13, '20150818140329-shoos.jpg', 'post', '2015/08/20150818140329-shoos.jpg'),
(8, 2, '150819-about-us.jpg', 'page', '2015/08/150819-about-us.jpg'),
(9, 13, '201509203344_pay-online.jpg', 'page', '2015/09/201509203344_pay-online.jpg'),
(10, 14, '20150901083249-thu-nhoi-bong2.jpg', 'post', '2015/09/20150901083249-thu-nhoi-bong2.jpg'),
(12, 15, '20150901232807-Giao-diện-web-mẫu.png', 'post', '2015/09/20150901232807-Giao-diện-web-mẫu.png'),
(13, 16, '201510172225_tpp.jpg', 'post', '2015/10/201510172225_tpp.jpg'),
(14, 17, '20150903094827-khuyến mãi.jpg', 'post', '2015/09/20150903094827-khuyến mãi.jpg'),
(15, 7, '201509145814_tpp.jpg', 'page', '2015/09/201509145814_tpp.jpg'),
(18, 19, '20150910142912-1412658[1].jpg', 'post', '2015/09/20150910142912-1412658[1].jpg'),
(19, 4, '201509112730_introduction.jpg', 'page', '2015/09/201509112730_introduction.jpg'),
(20, 20, '20150913092601-iphone-6s-and-6s-plus.JPG', 'post', '2015/09/20150913092601-iphone-6s-and-6s-plus.JPG'),
(21, 21, '20150913134710-macbook-pro2.jpg', 'post', '2015/09/20150913134710-macbook-pro2.jpg'),
(22, 22, '20150913185253-Insulaciq2.jpg', 'post', '2015/09/20150913185253-Insulaciq2.jpg'),
(23, 23, '20150913201832-ya11.png', 'post', '2015/09/20150913201832-ya11.png'),
(25, 2, '201510135331_trung_nguyen_logo.png', 'trad', '2015/10/201510135331_trung_nguyen_logo.png'),
(26, 3, '201510142330_trade-show.png', 'trad', '2015/10/201510142330_trade-show.png'),
(27, 4, '201510224515_trade-home.jpg', 'trad', '2015/10/201510224515_trade-home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_children`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_children` (
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `ec_seqno` decimal(2,0) NOT NULL DEFAULT '0',
  `ec_name` varchar(100) DEFAULT '',
  `ec_date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_contract_extend`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_contract_extend` (
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `econ_extend_id` int(12) NOT NULL DEFAULT '0',
  `econ_extend_start_date` date DEFAULT NULL,
  `econ_extend_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_contract_extend`
--

INSERT INTO `panpic_emp_contract_extend` (`emp_number`, `econ_extend_id`, `econ_extend_start_date`, `econ_extend_end_date`) VALUES
(73, 0, '0000-00-00', '0000-00-00'),
(77, 0, '2015-12-08', '2015-12-31'),
(142, 0, '2015-12-01', '2015-12-02'),
(145, 0, '2015-12-02', '2016-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_dependents`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_dependents` (
`ed_id` int(12) NOT NULL,
  `emp_number` int(12) NOT NULL DEFAULT '0',
  `ed_name` varchar(100) DEFAULT '',
  `ed_relationship_type` tinyint(1) DEFAULT NULL,
  `ed_birthday` date DEFAULT NULL,
  `ed_homephone` varchar(20) DEFAULT '',
  `ed_handphone` varchar(20) DEFAULT NULL,
  `ed_workphone` varchar(20) DEFAULT NULL,
  `ed_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_dependents`
--

INSERT INTO `panpic_emp_dependents` (`ed_id`, `emp_number`, `ed_name`, `ed_relationship_type`, `ed_birthday`, `ed_homephone`, `ed_handphone`, `ed_workphone`, `ed_address`) VALUES
(1, 0, 'ten steop4', NULL, NULL, '054', '0168', '0803', 'dia chi 4'),
(2, 0, 'dfsfd', NULL, NULL, 'êfẻ', '888888', '88888', 'ưdfwf'),
(3, 0, 'fvrevrev', NULL, NULL, '', '', '', ''),
(4, 0, 'ttttt', 0, NULL, '5555555555', '555555', '55555', 'ttttt'),
(5, 0, 'ten', 0, NULL, '054', '0168', '080', 'diachi'),
(6, 142, 'wđ', 0, NULL, '', '', '', 'ưdư'),
(7, 142, 'ewr', 0, NULL, '', '', '', 'ẻer'),
(8, 142, 'têmmm', 0, NULL, '054888', '016888', '08888', 'địa chỉmmm'),
(10, 144, '', 1, '0000-00-00', '', NULL, NULL, NULL),
(11, 144, 'tên-id-144-step5', 1, '2015-12-04', '', NULL, NULL, NULL),
(12, 144, '5555555555555555555555', 1, '2015-12-05', '', NULL, NULL, NULL),
(13, 144, 'moiqh0', 0, '2015-12-13', '', NULL, NULL, NULL),
(14, 144, 'dfghj', 0, '2015-12-05', '', NULL, NULL, NULL),
(15, 145, 'ttrre', 0, '2015-12-04', '', NULL, NULL, NULL),
(16, 147, 'tren', 7, '2015-12-04', '', NULL, NULL, NULL),
(17, 148, 'Nguyen van quan', 7, '2015-12-05', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_directdebit`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_directdebit` (
`id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL DEFAULT '',
  `account_bank` varchar(100) NOT NULL,
  `account_amount` decimal(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_directdebit`
--

INSERT INTO `panpic_emp_directdebit` (`id`, `salary_id`, `account_number`, `account_name`, `account_bank`, `account_amount`) VALUES
(4, 14, 'TK0001', 'DINHTRUONGTOAN', 'Viettin', '2300000.00'),
(8, 19, 'TU0003', 'TRAN BOM', 'ACB', '123000111.00'),
(9, 26, 'EV0000012222', 'TRAN VAN TUAN', 'sacombank', '500444.00');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_education`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_education` (
`id` int(11) NOT NULL,
  `emp_number` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `institute` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `year` decimal(4,0) DEFAULT NULL,
  `score` varchar(25) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_emergency_contacts`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_emergency_contacts` (
`eec_id` int(12) NOT NULL,
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `eec_seqno` decimal(2,0) NOT NULL DEFAULT '0',
  `eec_name` varchar(100) DEFAULT '',
  `eec_relationship` varchar(100) DEFAULT '',
  `eec_address` varchar(100) DEFAULT '',
  `eec_home_no` varchar(100) DEFAULT '',
  `eec_mobile_no` varchar(100) DEFAULT '',
  `eec_office_no` varchar(100) DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_emergency_contacts`
--

INSERT INTO `panpic_emp_emergency_contacts` (`eec_id`, `emp_number`, `eec_seqno`, `eec_name`, `eec_relationship`, `eec_address`, `eec_home_no`, `eec_mobile_no`, `eec_office_no`) VALUES
(1, 142, '0', 'rrrrrrrrrrrrrrr', '0', 'rrrrrrrrrrrrrrr', '3333333333333', '444444444444', '5555555555'),
(2, 144, '0', 'ưèqừ', '0', '', '', '', ''),
(3, 144, '0', 'tê b', 'moi quan hệ', 'ưqưè', '23', '3434', '5454'),
(4, 144, '0', '', '', '', '', '', ''),
(5, 144, '0', '', '', '', '', '', ''),
(6, 144, '0', '', NULL, '', NULL, NULL, NULL),
(7, 144, '0', '', NULL, '', NULL, NULL, NULL),
(8, 144, '0', 'step5', NULL, 'step533', NULL, NULL, NULL),
(9, 145, '0', '4243t', '3434t', '43t34', '34t34t', '34t34t', '43t34t'),
(10, 147, '0', 'tèn', 'sdf', 'diahic', '026', '023', '320'),
(11, 148, '0', 'Phạm Thị Thu', 'chị em', 'Điện Biên phủ- tp huế', '053344', '01992', '01234');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_images`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_images` (
`image_id` bigint(20) unsigned NOT NULL,
  `object_id` bigint(20) NOT NULL COMMENT 'post_id',
  `title` varchar(100) DEFAULT NULL,
  `image_type` char(4) DEFAULT 'post' COMMENT 'post,emp',
  `path_image` varchar(255) NOT NULL COMMENT '2015/08/file.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_images`
--

INSERT INTO `panpic_emp_images` (`image_id`, `object_id`, `title`, `image_type`, `path_image`) VALUES
(1, 24, NULL, 'emp', '2015/11/20151128-081722-gián.jpg'),
(2, 26, NULL, 'emp', '2015/11/20151128-081912-gián.jpg'),
(3, 27, NULL, 'emp', '2015/11/20151128-081929-gián.jpg'),
(4, 28, NULL, 'emp', '2015/11/20151128-082424-gian.jpg'),
(5, 29, NULL, 'post', ''),
(6, 30, NULL, 'post', ''),
(7, 31, NULL, 'post', ''),
(8, 32, NULL, 'post', ''),
(9, 36, NULL, 'post', ''),
(10, 38, NULL, 'post', ''),
(11, 40, NULL, 'post', ''),
(13, 46, NULL, 'emp', '2015/12/20151201-140950-gian.jpg'),
(14, 50, NULL, 'post', ''),
(15, 67, NULL, 'post', ''),
(16, 69, NULL, 'post', ''),
(17, 73, NULL, 'post', ''),
(18, 77, NULL, 'post', ''),
(19, 83, NULL, 'post', '');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_language`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_language` (
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL,
  `fluency` smallint(6) NOT NULL DEFAULT '0',
  `competency` smallint(6) DEFAULT '0',
  `comments` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_license`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_license` (
  `emp_number` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `license_no` varchar(50) DEFAULT NULL,
  `license_issued_date` date DEFAULT NULL,
  `license_expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_logevent`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_logevent` (
  `id` int(11) NOT NULL,
  `emp_id` int(12) NOT NULL DEFAULT '0',
  `ip` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_logevent`
--

INSERT INTO `panpic_emp_logevent` (`id`, `emp_id`, `ip`, `last_update`) VALUES
(891, 1, '127.0.0.1', '2015-11-09 01:56:05'),
(892, 1, '127.0.0.1', '2015-11-10 02:51:40'),
(893, 1, '127.0.0.1', '2015-11-10 06:47:42'),
(894, 1, '127.0.0.1', '2015-11-16 01:40:53'),
(895, 1, '127.0.0.1', '2015-11-16 01:43:43'),
(0, 1, '::1', '2015-11-25 03:48:01'),
(0, 0, '::1', '2015-11-27 03:51:54'),
(0, 0, '::1', '2015-11-28 01:06:25'),
(0, 0, '::1', '2015-11-30 06:21:01'),
(0, 0, '::1', '2015-12-01 01:31:34'),
(0, 0, '::1', '2015-12-01 11:04:23'),
(0, 0, '::1', '2015-12-01 15:08:44'),
(0, 0, '::1', '2015-12-02 13:14:22'),
(0, 0, '::1', '2015-12-02 18:38:38'),
(0, 0, '::1', '2015-12-03 06:37:41'),
(0, 0, '::1', '2015-12-08 02:55:31'),
(0, 0, '::1', '2015-12-08 04:32:06'),
(0, 0, '::1', '2015-12-09 01:39:44'),
(0, 0, '192.168.1.23', '2015-12-09 02:00:39'),
(0, 0, '192.168.1.21', '2015-12-09 02:01:45'),
(0, 0, '::1', '2015-12-09 06:54:58'),
(0, 0, '192.168.1.30', '2015-12-16 03:34:03'),
(0, 0, '::1', '2015-12-16 03:38:22'),
(0, 0, '192.168.1.30', '2015-12-16 03:39:05'),
(0, 0, '::1', '2015-12-16 03:39:47'),
(0, 12, '192.168.1.30', '2015-12-16 03:48:16'),
(0, 0, '192.168.1.20', '2015-12-17 06:42:34'),
(0, 0, '::1', '2015-12-17 06:47:11'),
(0, 0, '192.168.1.20', '2015-12-17 07:10:55'),
(0, 0, '::1', '2015-12-17 07:28:58'),
(0, 0, '192.168.1.20', '2015-12-17 09:10:02'),
(0, 0, '::1', '2015-12-17 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_member_detail`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_member_detail` (
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `membship_code` int(6) NOT NULL DEFAULT '0',
  `ememb_subscript_ownership` varchar(20) DEFAULT NULL,
  `ememb_subscript_amount` decimal(15,2) DEFAULT NULL,
  `ememb_subs_currency` varchar(20) DEFAULT NULL,
  `ememb_commence_date` date DEFAULT NULL,
  `ememb_renewal_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_online`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_online` (
  `emp_id` int(12) NOT NULL COMMENT 'user_id',
  `id_status` char(3) NOT NULL COMMENT 'ON,OFF',
  `tm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_online`
--

INSERT INTO `panpic_emp_online` (`emp_id`, `id_status`, `tm`) VALUES
(7, 'OFF', '2015-10-21 16:55:03'),
(8, 'OFF', '2015-10-23 18:27:42'),
(9, 'OFF', '2015-10-24 13:38:14'),
(20, 'OFF', '2015-11-16 08:43:43'),
(20, 'OFF', '2015-11-25 10:48:01'),
(20, 'OFF', '2015-11-27 10:51:54'),
(20, 'OFF', '2015-11-28 08:06:25'),
(20, 'OFF', '2015-11-30 13:21:01'),
(20, 'OFF', '2015-12-01 08:31:33'),
(20, 'OFF', '2015-12-01 18:04:23'),
(20, 'OFF', '2015-12-01 22:08:44'),
(20, 'OFF', '2015-12-02 20:14:22'),
(20, 'OFF', '2015-12-03 01:38:38'),
(20, 'OFF', '2015-12-03 13:37:41'),
(20, 'OFF', '2015-12-08 09:55:31'),
(20, 'OFF', '2015-12-08 11:32:06'),
(20, 'OFF', '2015-12-09 08:39:44'),
(20, 'OFF', '2015-12-09 09:00:38'),
(20, 'OFF', '2015-12-09 09:01:44'),
(20, 'OFF', '2015-12-09 13:54:57'),
(20, 'OFF', '2015-12-16 10:34:03'),
(20, 'OFF', '2015-12-16 10:38:22'),
(20, 'OFF', '2015-12-16 10:39:05'),
(20, 'OFF', '2015-12-16 10:39:47'),
(23, 'OFF', '2015-12-16 10:48:16'),
(20, 'OFF', '2015-12-17 13:42:33'),
(20, 'OFF', '2015-12-17 13:47:11'),
(20, 'OFF', '2015-12-17 14:10:55'),
(20, 'OFF', '2015-12-17 14:28:58'),
(20, 'OFF', '2015-12-17 16:10:02'),
(20, 'OFF', '2015-12-17 16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_passport`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_passport` (
`ep_id` int(12) NOT NULL,
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `ep_passport_type_flg` tinyint(1) NOT NULL,
  `ep_passport_num` varchar(100) NOT NULL DEFAULT '',
  `ep_passportissueddate` datetime DEFAULT NULL,
  `ep_passportexpiredate` datetime DEFAULT NULL,
  `ep_comments` varchar(255) DEFAULT NULL,
  `ep_i9_status` varchar(100) DEFAULT '',
  `ep_i9_review_date` date DEFAULT NULL,
  `country_code` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_passport`
--

INSERT INTO `panpic_emp_passport` (`ep_id`, `emp_number`, `ep_passport_type_flg`, `ep_passport_num`, `ep_passportissueddate`, `ep_passportexpiredate`, `ep_comments`, `ep_i9_status`, `ep_i9_review_date`, `country_code`) VALUES
(1, 145, 2, '', '2015-12-01 00:00:00', '2015-12-02 00:00:00', 'bìnhluan', 'trangthai111', '2015-12-03', 2),
(2, 145, 1, '1010101230', '2015-12-27 00:00:00', '2015-12-26 00:00:00', 'comment', 'status', '2015-12-20', 7),
(3, 145, 2, '9999999999', '2015-12-04 00:00:00', '2015-12-05 00:00:00', 'cmt1111', 'stauss', '0003-03-31', 2),
(4, 145, 2, '11', '2015-12-13 00:00:00', '2015-12-05 00:00:00', '', '111', '0000-00-00', 0),
(5, 145, 2, '11', '2015-12-13 00:00:00', '2015-12-05 00:00:00', '', '111', '0000-00-00', 0),
(15, 148, 3, '123456789', '2015-12-13 00:00:00', '2015-12-05 00:00:00', 'cmt123456789cmt1023456789cmt\r\ncmt123456789cmt1023456789cmt\r\ncmt123456789cmt1023456789cmt\r\ncmt123456789cmt1023456789cmt\r\ncmt123456789cmt1023456789cmt\r\ncmt123456789cmt1023456789cmt\r\n', 'trangthai', '2015-12-11', 2),
(16, 148, 2, '651610', '2015-12-06 00:00:00', '2015-12-06 00:00:00', 'bình luân 2 của id=148', 'trang thái2', '2015-12-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_reportto`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_reportto` (
`report_id` int(12) NOT NULL,
  `erep_sup_emp_number` int(7) NOT NULL DEFAULT '0',
  `erep_sub_emp_number` int(7) NOT NULL DEFAULT '0',
  `erep_reporting_mode` int(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_reportto`
--

INSERT INTO `panpic_emp_reportto` (`report_id`, `erep_sup_emp_number`, `erep_sub_emp_number`, `erep_reporting_mode`) VALUES
(1, 77, 145, 1),
(2, 73, 145, 1),
(4, 145, 134, 3),
(6, 145, 134, 1),
(7, 145, 77, 1),
(8, 145, 135, 3),
(12, 0, 145, 1),
(17, 73, 145, 2);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_salary`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_salary` (
`salary_id` int(12) NOT NULL,
  `emp_number` int(12) NOT NULL DEFAULT '0',
  `paygrades_id` int(12) DEFAULT NULL,
  `currency_id` varchar(6) NOT NULL DEFAULT '',
  `basic_salary` float(11,2) DEFAULT '0.00',
  `payperiod_code` int(12) DEFAULT NULL,
  `salary_component` float(11,2) DEFAULT '0.00',
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_emp_salary`
--

INSERT INTO `panpic_emp_salary` (`salary_id`, `emp_number`, `paygrades_id`, `currency_id`, `basic_salary`, `payperiod_code`, `salary_component`, `comments`) VALUES
(1, 145, 13, 'VND', 15000000.00, 16, 3333.00, ' bìnhluan'),
(7, 145, 13, 'USD', 999.00, 0, 99898.00, ' '),
(14, 145, 13, 'USD', 800.00, 18, NULL, '       bluan edit     '),
(19, 145, 13, 'THB', 20000000.00, 18, NULL, '     bluan edit999  '),
(20, 145, 13, 'THB', 555000.00, 16, NULL, '  '),
(26, 145, 13, 'USD', 888.00, 16, NULL, '  '),
(30, 145, 13, 'VND', 15000000.00, 0, NULL, '  '),
(32, 145, 13, 'THB', 555.00, 0, NULL, '  ');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_skill`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_skill` (
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `skill_id` int(11) NOT NULL,
  `years_of_exp` decimal(2,0) DEFAULT NULL,
  `comments` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_us_tax`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_us_tax` (
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `tax_federal_status` varchar(13) DEFAULT NULL,
  `tax_federal_exceptions` int(2) DEFAULT '0',
  `tax_state` varchar(13) DEFAULT NULL,
  `tax_state_status` varchar(13) DEFAULT NULL,
  `tax_state_exceptions` int(2) DEFAULT '0',
  `tax_unemp_state` varchar(13) DEFAULT NULL,
  `tax_work_state` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_emp_work_experience`
--

CREATE TABLE IF NOT EXISTS `panpic_emp_work_experience` (
`eexp_id` int(12) NOT NULL,
  `emp_number` int(7) NOT NULL DEFAULT '0',
  `eexp_company` varchar(100) DEFAULT NULL,
  `eexp_jobtit` varchar(100) DEFAULT NULL,
  `eexp_from_date` date DEFAULT NULL,
  `eexp_to_date` date DEFAULT NULL,
  `eexp_comments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panpic_lang`
--

CREATE TABLE IF NOT EXISTS `panpic_lang` (
  `code` char(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  `avail` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_lang`
--

INSERT INTO `panpic_lang` (`code`, `name`, `avail`) VALUES
('EN', 'English', 1),
('VN', 'Việt nam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_lang_values`
--

CREATE TABLE IF NOT EXISTS `panpic_lang_values` (
  `name` varchar(80) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT 'EN',
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_lang_values`
--

INSERT INTO `panpic_lang_values` (`name`, `lang`, `value`) VALUES
('add', 'EN', 'Add'),
('add', 'VN', 'Thêm'),
('add_fail', 'EN', 'Add fail'),
('add_fail', 'VN', 'Thêm dự liệu không thành công'),
('add_succ', 'EN', 'Add successful'),
('add_succ', 'VN', 'Thêm dự liệu thành công'),
('btn_edit', 'EN', 'Edit'),
('btn_edit', 'VN', 'Sửa'),
('btn_save', 'EN', 'Save'),
('btn_save', 'VN', 'Lưu'),
('config', 'EN', 'Thiết lập'),
('config', 'VN', 'Thiết lập'),
('configuration', 'EN', 'Configuration'),
('configuration', 'VN', 'Thiết lập'),
('contact_detail', 'EN', 'Contact detail'),
('contact_detail', 'VN', 'Chi tiết liên lạc'),
('countries', 'EN', 'Countries'),
('countries', 'VN', 'Quốc gia'),
('creat_login_account', 'EN', 'Creat login account'),
('creat_login_account', 'VN', 'Tạo tài khoản đăng nhập'),
('dependents', 'EN', 'Dependents'),
('dependents', 'VN', 'Người phụ thuộc'),
('email', 'EN', 'Email'),
('email', 'VN', 'Email'),
('employee', 'EN', 'Employee'),
('employee', 'VN', 'Nhân viên'),
('file_image_support_avatar', 'EN', 'Support extension jpg, png. gif 1Mb. Recommended dimensions: 200px X 200px'),
('file_image_support_avatar', 'VN', 'Support extension jpg, png. gif 1Mb. Recommended dimensions: 200px X 200px'),
('firstname', 'EN', 'Firstname'),
('firstname', 'VN', 'Tên'),
('immigration', 'EN', 'Immigration'),
('immigration', 'VN', 'Nhập cư'),
('job', 'EN', 'Job'),
('job', 'VN', 'Công việc'),
('lang', 'EN', 'Ngôn ngữ'),
('lang', 'VN', 'Ngôn ngữ'),
('language', 'EN', 'Language'),
('language', 'VN', 'Ngôn ngữ'),
('lastname', 'EN', 'Lastname'),
('lastname', 'VN', 'Họ'),
('list', 'EN', 'List'),
('list', 'VN', 'Danh sách'),
('localization', 'EN', 'Localization'),
('localization', 'VN', 'Nội địa hóa'),
('memberships', 'EN', 'Memberships'),
('memberships', 'VN', 'Thành viên'),
('middle_name', 'EN', 'Middle name'),
('middle_name', 'VN', 'Tên đệm'),
('name', 'EN', 'Name'),
('name', 'VN', 'Tên'),
('organization', 'EN', 'Organization'),
('organization', 'VN', 'Tổ chức'),
('password', 'EN', 'Password'),
('password', 'VN', 'Mật khẩu'),
('personal_details', 'EN', 'Personal details'),
('personal_details', 'VN', 'Thông tin cá nhân'),
('picture', 'EN', 'Picture'),
('picture', 'VN', 'Ảnh'),
('provience', 'EN', 'Provience'),
('provience', 'VN', 'Tỉnh/Thành phố'),
('qualifications', 'EN', 'Qualifications'),
('qualifications', 'VN', 'Trình độ chuyên môn'),
('report', 'EN', 'Report'),
('report', 'VN', 'Report'),
('report_to', 'EN', 'Report-to'),
('report_to', 'VN', 'Báo cáo đến'),
('required_field', 'EN', 'Required field'),
('required_field', 'VN', 'Phần bắt buộc'),
('re_password', 'EN', 'Re-password'),
('re_password', 'VN', 'Xác nhận mật khẩu'),
('salary', 'EN', 'Salary'),
('salary', 'VN', 'Mức lương'),
('setting', 'EN', 'Settting'),
('setting', 'VN', 'Cài đặt'),
('status', 'EN', 'Status'),
('status', 'VN', 'Trạng thái'),
('step', 'EN', 'Step'),
('step', 'VN', 'Step'),
('tax_exemptions', 'EN', 'Tax Exemptions'),
('tax_exemptions', 'VN', 'Miễn giảm thuế'),
('timewait', 'EN', '3'),
('timewait', 'VN', '3'),
('update_succ', 'EN', 'Update successful'),
('update_succ', 'VN', 'Cập nhật thành công'),
('username', 'EN', 'Username'),
('username', 'VN', 'Tên đăng nhập'),
('user_management', 'EN', 'User Management'),
('user_management', 'VN', 'Quản lý tài khoản'),
('var', 'EN', 'Var'),
('var', 'VN', 'Biến'),
('var_exist', 'EN', 'Variable \\"%s\\" exist'),
('var_exist', 'VN', 'Biến \\"%s\\" đã tồn tại'),
('please_input', 'EN', 'Please input'),
('please_input', 'VN', 'Vui lòng nhập'),
('password_not_match', 'EN', 'Pass not match'),
('password_not_match', 'VN', 'Mật khẩu không khớp'),
('general', 'EN', 'General'),
('general', 'VN', 'General'),
('active', 'EN', 'Active'),
('active', 'VN', 'Bật'),
('disable', 'EN', 'Disable'),
('disable', 'VN', 'Vô hiệu hóa'),
('file_error_ext', 'EN', 'File extension not support'),
('file_error_ext', 'VN', 'Hệ thống không hỗ trợ định dạng file'),
('username_exist', 'EN', 'Username exist'),
('username_exist', 'VN', 'Tên đăng nhập đã tồn tại'),
('gender', 'EN', 'Gender'),
('gender', 'VN', 'Giới tính'),
('birthday', 'EN', 'Birthday'),
('birthday', 'VN', 'Ngày sinh'),
('male', 'EN', 'Male'),
('male', 'VN', 'Nam'),
('female', 'EN', 'Female'),
('female', 'VN', 'Nữ'),
('nation_code', 'EN', 'Nation'),
('nation_code', 'VN', 'Quốc gia'),
('marital_status', 'EN', 'Marital status'),
('marital_status', 'VN', 'Tình trạng hôn nhân'),
('select', 'EN', 'Select'),
('select', 'VN', 'Chọn'),
('other', 'EN', 'Other'),
('other', 'VN', 'Khác'),
('married', 'EN', 'Married'),
('married', 'VN', 'Đã kết hôn'),
('alone', 'EN', 'Alone'),
('alone', 'VN', 'Độc thân'),
('url_invalid', 'EN', 'Url invalid'),
('url_invalid', 'VN', 'Đường dẫn không hợp lệ'),
('nickname', 'EN', 'Nickname'),
('nickname', 'VN', 'Tên thường gọi'),
('dri_lice_num', 'EN', 'Driver licence number'),
('dri_lice_num', 'VN', 'Số giấy phép lái xe'),
('dri_lice_exp_date', 'EN', 'License expiration date'),
('dri_lice_exp_date', 'VN', 'Ngày hết hạn giấy phép'),
('military_service', 'EN', 'Military service'),
('military_service', 'VN', 'Nghĩa vụ quân sự'),
('smoker', 'EN', 'Smoker'),
('smoker', 'VN', 'Hút thuốc'),
('update_fail', 'EN', 'Update fail'),
('update_fail', 'VN', 'Cập nhật dữ liệu không thành công'),
('street1', 'EN', 'Street address 1'),
('street1', 'VN', 'Địa chỉ đường số 1'),
('street2', 'EN', 'Street address 2'),
('street2', 'VN', 'Địa chỉ đường số 2'),
('city', 'EN', 'City'),
('city', 'VN', 'Thành phố'),
('provincial', 'EN', 'Provincial'),
('provincial', 'VN', 'Tỉnh thành'),
('zipcode', 'EN', 'Zipcode'),
('zipcode', 'VN', 'Mã bưu chính'),
('coun_code', 'EN', 'Country'),
('coun_code', 'VN', 'Quốc gia'),
('hm_telephone', 'EN', 'Home telephone'),
('hm_telephone', 'VN', 'Điện thoại nhà'),
('mobile', 'EN', 'Mobilephone'),
('mobile', 'VN', 'Điện thoại di động'),
('work_telephone', 'EN', 'Work telephone'),
('work_telephone', 'VN', 'Điện thoại cơ quan'),
('work_email', 'EN', 'Work email'),
('work_email', 'VN', 'Mail làm việc'),
('other_email', 'EN', 'Other email'),
('other_email', 'VN', 'Mail khác'),
('relation', 'EN', 'Relation'),
('relation', 'VN', 'Mối quan hệ'),
('address', 'EN', 'Address'),
('address', 'VN', 'Địa chỉ'),
('emergency_contacts', 'EN', 'Emergency contacts'),
('emergency_contacts', 'VN', 'Liên lạc khẩn cấp'),
('document', 'EN', 'Document'),
('document', 'VN', 'Tài liệu'),
('passport', 'EN', 'Passport'),
('passport', 'VN', 'Hộ chiếu'),
('visa', 'EN', 'Visa'),
('visa', 'VN', 'Visa'),
('number', 'EN', 'Number'),
('number', 'VN', 'Số'),
(' issued_date', 'EN', ' Issued date'),
(' issued_date', 'VN', 'Ngày ban hành'),
('expiry_date', 'EN', 'Expiry date'),
('expiry_date', 'VN', 'Ngày hết hiệu lực'),
('eligible_status', 'EN', 'Eligible status'),
('eligible_status', 'VN', 'Trạng thái đủ điều kiện'),
('eligible_review_date', 'EN', 'Eligible review date'),
('eligible_review_date', 'VN', 'Ngày xét đủ điều kiện'),
('comments', 'EN', 'Comments'),
('comments', 'VN', 'Bình luận'),
('issued_date', 'EN', 'Issued date'),
('issued_date', 'VN', 'Ngày ban hành'),
('issued_by', 'EN', 'Issued by'),
('issued_by', 'VN', 'Ban hành bởi'),
('job_title', 'EN', 'Job title'),
('job_title', 'VN', 'Chức vụ'),
('please', 'EN', 'Please'),
('please', 'VN', 'Vui lòng'),
('emp_status', 'EN', 'Employment Status'),
('emp_status', 'VN', 'Trạng thái công việc'),
('job_category', 'EN', 'Job category'),
('job_category', 'VN', 'Ngành nghề'),
('joined_date', 'EN', 'Joined Date'),
('joined_date', 'VN', 'Ngày tham gia'),
('sub_unit', 'EN', 'Sub Unit'),
('sub_unit', 'VN', 'Tiểu đơn vị'),
('location', 'EN', 'Location'),
('location', 'VN', 'Vị trí'),
('start_date', 'EN', 'Start Date'),
('start_date', 'VN', 'Ngày bắt đầu'),
('end_date', 'EN', 'End Date'),
('end_date', 'VN', 'Ngày kết thúc'),
('add_direct_deposit_details', 'EN', 'Add Direct Deposit Details'),
('add_direct_deposit_details', 'VN', 'Thêm chi tiết tiền gửi trực tiếp'),
('salary_component', 'EN', 'Salary'),
('salary_component', 'VN', 'Lương'),
('pay_frequency', 'EN', 'Pay Frequency'),
('pay_frequency', 'VN', 'Tần suất trả'),
('currency', 'EN', 'Currency'),
('currency', 'VN', 'Tiền tệ'),
('amount', 'EN', 'Amount'),
('amount', 'VN', 'Số tiền'),
('account_number', 'EN', 'Account Number'),
('account_number', 'VN', 'Số tài khoản'),
('account_type', 'EN', 'Account Type'),
('account_type', 'VN', 'Loại tài khoản'),
('routing_number', 'EN', 'Routing Number'),
('routing_number', 'VN', 'Số định tuyến'),
('pay_grades', 'EN', 'Pay grades'),
('pay_grades', 'VN', 'Loại lương'),
('pay_grades_currency', 'EN', 'Pay grades currency'),
('pay_grades_currency', 'VN', 'Mức lương'),
('employment_contract', 'EN', 'Employment Contract'),
('employment_contract', 'VN', 'Hợp đồng lao động'),
('company_structure', 'EN', 'Company Structure'),
('company_structure', 'VN', 'Company Structure'),
('dept_brand', 'EN', 'Dept or Brand'),
('dept_brand', 'VN', 'Dept or Brand'),
('level', 'EN', 'Level'),
('level', 'VN', 'Level'),
('provience_state', 'EN', 'Province/State'),
('provience_state', 'VN', 'Tiểu bang / Tỉnh'),
('phone', 'EN', 'Phone'),
('phone', 'VN', 'Phone'),
('notes', 'EN', 'Notes'),
('notes', 'VN', 'Notes'),
('number_employees', 'EN', 'Number of Employees'),
('number_employees', 'VN', 'Số lượng nhân viên'),
('minmaxval', 'EN', 'within Min/Max values'),
('minmaxval', 'VN', 'giá trị trong khoảng Min/Max'),
('account_bank', 'EN', 'Account bank'),
('account_bank', 'VN', 'Tài khoản ngân hàng'),
('account_name', 'EN', 'Account name'),
('account_name', 'VN', 'Tên tài khoản'),
('delete_succ', 'EN', 'Delete successfull'),
('delete_succ', 'VN', 'Delete successfull'),
('delete_fail', 'EN', 'Delete fail'),
('delete_fail', 'VN', 'Delete fail'),
('assigned_supervisors', 'EN', 'Assigned Supervisors'),
('assigned_supervisors', 'VN', 'Cấp trên'),
('assigned_subordinates', 'EN', 'Assigned Subordinates'),
('assigned_subordinates', 'VN', 'Cấp dưới'),
('report_method', 'EN', 'Report method'),
('report_method', 'VN', 'Phương pháp báo cáo'),
('fullname', 'EN', 'Full name'),
('fullname', 'VN', 'Họ tên'),
('direct', 'EN', 'Direct'),
('direct', 'VN', 'Chỉ đạo'),
('indirect', 'EN', 'Indirect'),
('indirect', 'VN', 'Gián tiếp'),
('company', 'EN', 'Company'),
('company', 'VN', 'Công ty'),
('work_experience', 'EN', 'Work Experience'),
('work_experience', 'VN', 'Kinh nghiệm làm việc'),
('cancel', 'EN', 'Cancel'),
('cancel', 'VN', 'Hủy bỏ');

-- --------------------------------------------------------

--
-- Table structure for table `panpic_pages`
--

CREATE TABLE IF NOT EXISTS `panpic_pages` (
  `page_id` int(12) NOT NULL,
  `page_url` varchar(50) NOT NULL,
  `page_cat` int(5) DEFAULT '0',
  `date_add` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `avail` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panpic_pages`
--

INSERT INTO `panpic_pages` (`page_id`, `page_url`, `page_cat`, `date_add`, `last_update`, `avail`) VALUES
(1, 'term-conditions', 0, '2015-08-15', '2015-08-15 15:28:08', 1),
(2, 'vision-mission', 0, '2015-08-18', '2015-08-18 15:07:45', 1),
(3, 'sitemap', 0, '2015-08-19', '2015-08-19 02:06:07', 1),
(4, 'introduction', 0, '2015-08-19', '2015-08-19 02:07:29', 1),
(5, 'noncdeal-center-contact', 0, '2015-08-19', '2015-08-19 02:08:43', 1),
(6, 'regional-trade-promotion-centers', 0, '2015-08-19', '2015-08-19 02:10:25', 1),
(7, 'messages-from-ceo', 0, '2015-08-19', '2015-08-19 02:12:26', 1),
(8, 'contact-us', 0, '2015-08-19', '2015-08-19 02:47:10', 1),
(9, 'advertise-with-us', 0, '2015-08-19', '2015-08-19 04:41:28', 1),
(10, 'learning-center', 0, '2015-08-23', '2015-08-23 07:45:43', 1),
(11, 'faq', 0, '2015-08-23', '2015-08-23 07:52:01', 1),
(12, 'privacy-policy', 0, '2015-08-27', '2015-08-27 01:49:04', 1),
(13, 'payment-instructions', 0, '2015-08-31', '2015-08-31 09:01:16', 1),
(14, 'member-benefit', 0, '2015-08-31', '2015-08-31 07:59:47', 1),
(15, 'quality-standards', 0, '2015-09-07', '2015-09-07 02:15:44', 1),
(16, 'quality-standards-vietnam', 0, '2015-09-07', '2015-09-07 02:20:38', 1),
(17, 'operating', 0, '2015-09-25', '2015-09-25 03:16:51', 1),
(18, 'help-member', 0, '2015-09-29', '2015-09-29 03:43:24', 1),
(19, 'help-company', 0, '2015-09-29', '2015-09-29 03:47:43', 1),
(20, 'help-product', 0, '2015-09-29', '2015-09-29 03:50:35', 1),
(21, 'help-buying-request', 0, '2015-09-29', '2015-09-29 03:53:08', 1),
(22, 'help-message', 0, '2015-09-29', '2015-09-29 03:55:04', 1),
(23, 'help-chat', 0, '2015-09-29', '2015-09-29 03:56:50', 1),
(24, 'help-search', 0, '2015-09-29', '2015-09-29 03:58:22', 1),
(25, 'help-seller-contact', 0, '2015-09-29', '2015-09-29 04:01:25', 1),
(26, 'post-buying-request-rule', 0, '2015-10-08', '2015-10-08 06:12:40', 1),
(27, 'payment-online', 0, '2015-10-13', '2015-10-13 07:12:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panpic_pages_desc`
--

CREATE TABLE IF NOT EXISTS `panpic_pages_desc` (
  `page_id` int(12) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT 'EN',
  `page_title` varchar(50) NOT NULL,
  `page_short` text,
  `page_detail` longtext,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_key` varchar(255) DEFAULT NULL,
  `seo_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config_general`
--
ALTER TABLE `config_general`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_locations`
--
ALTER TABLE `config_locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_organize_info`
--
ALTER TABLE `config_organize_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_pay_currency`
--
ALTER TABLE `config_pay_currency`
 ADD PRIMARY KEY (`pay_grade_id`,`currency_id`), ADD KEY `currency_id` (`currency_id`);

--
-- Indexes for table `config_subunit`
--
ALTER TABLE `config_subunit`
 ADD PRIMARY KEY (`mcId`);

--
-- Indexes for table `config_subunit_desc`
--
ALTER TABLE `config_subunit_desc`
 ADD PRIMARY KEY (`mcId`,`lang`);

--
-- Indexes for table `panpic_admin`
--
ALTER TABLE `panpic_admin`
 ADD PRIMARY KEY (`adminId`), ADD UNIQUE KEY `emp_id` (`emp_id`), ADD UNIQUE KEY `adminLogin` (`adminLogin`);

--
-- Indexes for table `panpic_employee`
--
ALTER TABLE `panpic_employee`
 ADD PRIMARY KEY (`emp_number`);

--
-- Indexes for table `panpic_emp_contract_extend`
--
ALTER TABLE `panpic_emp_contract_extend`
 ADD PRIMARY KEY (`emp_number`);

--
-- Indexes for table `panpic_emp_dependents`
--
ALTER TABLE `panpic_emp_dependents`
 ADD PRIMARY KEY (`ed_id`);

--
-- Indexes for table `panpic_emp_directdebit`
--
ALTER TABLE `panpic_emp_directdebit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panpic_emp_education`
--
ALTER TABLE `panpic_emp_education`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panpic_emp_emergency_contacts`
--
ALTER TABLE `panpic_emp_emergency_contacts`
 ADD PRIMARY KEY (`eec_id`);

--
-- Indexes for table `panpic_emp_images`
--
ALTER TABLE `panpic_emp_images`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `panpic_emp_language`
--
ALTER TABLE `panpic_emp_language`
 ADD KEY `emp_number_lang_id` (`emp_number`,`lang_id`);

--
-- Indexes for table `panpic_emp_passport`
--
ALTER TABLE `panpic_emp_passport`
 ADD PRIMARY KEY (`ep_id`);

--
-- Indexes for table `panpic_emp_reportto`
--
ALTER TABLE `panpic_emp_reportto`
 ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `panpic_emp_salary`
--
ALTER TABLE `panpic_emp_salary`
 ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `panpic_emp_work_experience`
--
ALTER TABLE `panpic_emp_work_experience`
 ADD PRIMARY KEY (`eexp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config_general`
--
ALTER TABLE `config_general`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `config_locations`
--
ALTER TABLE `config_locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `config_organize_info`
--
ALTER TABLE `config_organize_info`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config_subunit`
--
ALTER TABLE `config_subunit`
MODIFY `mcId` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `panpic_admin`
--
ALTER TABLE `panpic_admin`
MODIFY `adminId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `panpic_employee`
--
ALTER TABLE `panpic_employee`
MODIFY `emp_number` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `panpic_emp_dependents`
--
ALTER TABLE `panpic_emp_dependents`
MODIFY `ed_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `panpic_emp_directdebit`
--
ALTER TABLE `panpic_emp_directdebit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `panpic_emp_education`
--
ALTER TABLE `panpic_emp_education`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `panpic_emp_emergency_contacts`
--
ALTER TABLE `panpic_emp_emergency_contacts`
MODIFY `eec_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `panpic_emp_images`
--
ALTER TABLE `panpic_emp_images`
MODIFY `image_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `panpic_emp_passport`
--
ALTER TABLE `panpic_emp_passport`
MODIFY `ep_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `panpic_emp_reportto`
--
ALTER TABLE `panpic_emp_reportto`
MODIFY `report_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `panpic_emp_salary`
--
ALTER TABLE `panpic_emp_salary`
MODIFY `salary_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `panpic_emp_work_experience`
--
ALTER TABLE `panpic_emp_work_experience`
MODIFY `eexp_id` int(12) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
