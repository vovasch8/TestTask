-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 20 2023 р., 13:26
-- Версія сервера: 8.0.24
-- Версія PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `testtask`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Ford'),
(2, 'Tesla'),
(3, 'Toyota'),
(4, 'Audi');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(255) NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `date`, `photo`, `category_id`) VALUES
(1, 'Tesla Model S', 24500, '2023-12-16 18:53:17', 'https://ecoautoinfo.com/wp-content/uploads/2023/09/sss222.jpg', 2),
(2, 'Tesla Model 3', 23500, '2023-12-16 18:53:17', 'https://upload.wikimedia.org/wikipedia/commons/8/83/Tesla_Model_3_parked%2C_front_driver_side.jpg', 2),
(3, 'Tesla Roadster', 200000, '2023-12-16 18:56:18', 'https://focus.ua/static/storage/thumbs/920x465/4/fb/da78f33d-7df4054a58855c9e1f79bb1701495fb4.jpg?v=2609_1', 2),
(4, 'Tesla Model X', 80000, '2023-12-16 18:56:18', 'https://assets.bwbx.io/images/users/iqjWHBFdfxIU/i9GkFjKH5Idg/v2/-1x-1.jpg', 2),
(5, 'Ford Fusion', 15500, '2023-12-16 19:23:04', 'https://autopodium.ua/storage/product_images/big/wR4p0tgTJPFCHgpY6p0xsX5RQtduvKDZHaWCK18N.JPG', 1),
(6, 'Ford Kuga', 13800, '2023-12-16 19:23:04', 'https://www.aelita.ua/wp-content/uploads/2023/10/%D0%B8%D0%B7%D0%BE%D0%B1%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5_viber_2023-06-30_12-10-45-769-1140x843.jpg', 1),
(7, 'Ford Fiesta', 9500, '2023-12-16 19:25:46', 'https://ukrautoprom.com.ua/wp-content/uploads/2020/10/5f7b222eec05c41737000020.jpg', 1),
(8, 'Ford Mondeo', 8200, '2023-12-16 19:25:46', 'https://upload.wikimedia.org/wikipedia/commons/d/d1/2019_Ford_Mondeo_Titanium_Edition_Hybrid_Estate_facelift_2.0_Front.jpg', 1),
(9, 'Ford Focus', 11900, '2023-12-16 19:28:47', 'https://i.infocar.ua/i/12/3945/1400x936.jpg', 1),
(10, 'Ford Puma', 23500, '2023-12-16 19:28:47', 'https://ddaudio.com.ua/assets/galleries/73670/594/109zmmmbmwo.jpg', 1),
(11, 'Toyota Camry', 28700, '2023-12-16 19:32:45', 'https://upload.wikimedia.org/wikipedia/commons/f/fd/2025_Toyota_Camry_Hybrid_XSE_%28United_States%29_front_view.png', 3),
(12, 'Toyota Corola', 8700, '2023-12-16 19:32:45', 'https://i.infocar.ua/i/2/2946/86036/1920x.jpg', 3),
(15, 'Audi A5', 12000, '2023-12-16 19:35:48', 'https://avatars.mds.yandex.net/get-verba/787013/2a0000016f1ed2f9ed739b8a17ed80090dbf/cattouchret', 4),
(16, 'Audi Q7', 13900, '2023-12-16 19:35:48', 'https://tech.carta.ua/upload/photo/67/425_1.jpeg', 4),
(17, 'Audi S6', 32000, '2023-12-16 19:39:06', 'https://img.automoto.ua/overview/audi-s6-2017-d3d-huge-900.jpg', 4),
(18, 'Audi RS5', 70000, '2023-12-16 19:39:06', 'https://images.drive.ru/i/0/60cc2c1a745a9a38d75c2f8d.jpg', 4);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
