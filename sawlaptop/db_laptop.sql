-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 07:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laptop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertDataUserForm` (IN `name` VARCHAR(255), IN `email` VARCHAR(255), IN `password` VARCHAR(255), IN `user_type` VARCHAR(255))   BEGIN
    INSERT INTO user_form (name, email, password, user_type)
    VALUES (name, email, password, user_type);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `saw_kriteria`
--

CREATE TABLE `saw_kriteria` (
  `no` int(11) NOT NULL,
  `penyimpanan` float NOT NULL,
  `harga` float NOT NULL,
  `processor` float NOT NULL,
  `ram` float NOT NULL,
  `layar` float NOT NULL,
  `vga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `saw_kriteria`
--

INSERT INTO `saw_kriteria` (`no`, `penyimpanan`, `harga`, `processor`, `ram`, `layar`, `vga`) VALUES
(13, 0.2, 0.2, 0.15, 0.2, 0.1, 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `saw_laptop`
--

CREATE TABLE `saw_laptop` (
  `nama` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `saw_laptop`
--

INSERT INTO `saw_laptop` (`nama`, `merek`, `kategori`) VALUES
('G-Acer Nitro 5', 'Acer', 'Laptop Gaming'),
('G-Acer Nitro 5 AN515', 'Acer', 'Laptop Gaming'),
('G-Acer Nitro 5 AN517', 'Acer', 'Laptop Gaming'),
('G-Acer Nitro 7', 'Acer', 'Laptop Gaming'),
('G-Acer Predator Helios 300', 'Acer', 'Laptop Gaming'),
('G-Acer Predator Helios 302', 'Acer', 'Laptop Gaming'),
('G-Acer Predator Helios 700', 'Acer', 'Laptop Gaming'),
('G-Acer Predator Triton 300', 'Acer', 'Laptop Gaming'),
('G-Acer Predator Triton 500', 'Acer', 'Laptop Gaming'),
('G-Acer Predator Triton 900', 'Acer', 'Laptop Gaming'),
('G-ASUS ROG Strix G', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Strix G15', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Strix G17', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Strix Scar 15', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Strix SCAR 17', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Zephyrus G14', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Zephyrus G15', 'ASUS', 'Laptop Gaming'),
('G-ASUS ROG Zephyrus M16', 'ASUS', 'Laptop Gaming'),
('G-ASUS TUF Gaming A15', 'ASUS', 'Laptop Gaming'),
('G-ASUS TUF Gaming A17', 'ASUS', 'Laptop Gaming'),
('G-HP Omen 15', 'HP', 'Laptop Gaming'),
('G-HP OMEN 15-en', 'HP', 'Laptop Gaming'),
('G-HP OMEN 15t', 'HP', 'Laptop Gaming'),
('G-HP OMEN 17', 'HP', 'Laptop Gaming'),
('G-HP OMEN X 2S', 'HP', 'Laptop Gaming'),
('G-HP Pavilion Gaming 15', 'HP', 'Laptop Gaming'),
('G-HP Pavilion Gaming 15t', 'HP', 'Laptop Gaming'),
('G-HP Pavilion Gaming 16', 'HP', 'Laptop Gaming'),
('G-HP Pavilion Gaming 16-a', 'HP', 'Laptop Gaming'),
('G-HP Pavilion Gaming 17', 'HP', 'Laptop Gaming'),
('G-Lenovo Legion 5', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 5 Pro', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 5i', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 6 Pro', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 6i Pro', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 7', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 7 Pro', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion 7i', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion Y540', 'Lenovo', 'Laptop Gaming'),
('G-Lenovo Legion Y545', 'Lenovo', 'Laptop Gaming'),
('G-MSI Alpha 15', 'MSI', 'Laptop Gaming'),
('G-MSI GE66 Raider', 'MSI', 'Laptop Gaming'),
('G-MSI GE76 Raider', 'MSI', 'Laptop Gaming'),
('G-MSI GF63 Thin', 'MSI', 'Laptop Gaming'),
('G-MSI GF65 Thin', 'MSI', 'Laptop Gaming'),
('G-MSI GL65 Leopard', 'MSI', 'Laptop Gaming'),
('G-MSI GP66 Leopard', 'MSI', 'Laptop Gaming'),
('G-MSI GS66 Stealth', 'MSI', 'Laptop Gaming'),
('G-MSI GS66 Stealth 11UH', 'MSI', 'Laptop Gaming'),
('G-MSI GS75 Stealth', 'MSI', 'Laptop Gaming'),
('G-MSI Stealth 15M', 'MSI', 'Laptop Gaming'),
('N-Acer Aspire 1', 'Acer', 'Notebook'),
('N-Acer Aspire 3', 'Acer', 'Notebook'),
('N-Acer Aspire 3 Slim', 'Acer', 'Notebook'),
('N-Acer Aspire 5', 'Acer', 'Notebook'),
('N-Acer Aspire 5 A515', 'Acer', 'Notebook'),
('N-Acer Aspire 5 Slim', 'Acer', 'Notebook'),
('N-Acer Aspire 7', 'Acer', 'Notebook'),
('N-Acer Swift 1', 'Acer', 'Notebook'),
('N-Acer Swift 3', 'Acer', 'Notebook'),
('N-Acer Swift 7', 'Acer', 'Notebook'),
('N-Apple MacBook', 'Apple', 'Notebook'),
('N-Apple MacBook 2i', 'Apple', 'Notebook'),
('N-Apple MacBook Air', 'Apple', 'Notebook'),
('N-Apple MacBook Air M1', 'Apple', 'Notebook'),
('N-Apple MacBook Air M2', 'Apple', 'Notebook'),
('N-Apple MacBook Pro', 'Apple', 'Notebook'),
('N-Apple MacBook Pro 13', 'Apple', 'Notebook'),
('N-Apple MacBook Pro 14', 'Apple', 'Notebook'),
('N-Apple MacBook Pro 16', 'Apple', 'Notebook'),
('N-Apple MacBook Pro M1', 'Apple', 'Notebook'),
('N-Dell Inspiron 13', 'Dell', 'Notebook'),
('N-Dell Inspiron 14', 'Dell', 'Notebook'),
('N-Dell Inspiron 15', 'Dell', 'Notebook'),
('N-Dell Latitude 13', 'Dell', 'Notebook'),
('N-Dell Latitude 14', 'Dell', 'Notebook'),
('N-Dell Precision 15', 'Dell', 'Notebook'),
('N-Dell Vostro 14', 'Dell', 'Notebook'),
('N-Dell Vostro 15', 'Dell', 'Notebook'),
('N-Dell XPS 13', 'Dell', 'Notebook'),
('N-Dell XPS 15', 'Dell', 'Notebook'),
('N-HP EliteBook 830', 'HP', 'Notebook'),
('N-HP EliteBook 840', 'HP', 'Notebook'),
('N-HP EliteBook 850', 'HP', 'Notebook'),
('N-HP Pavilion 14', 'HP', 'Notebook'),
('N-HP ProBook 430', 'HP', 'Notebook'),
('N-HP ProBook 440', 'HP', 'Notebook'),
('N-HP ProBook 450', 'HP', 'Notebook'),
('N-HP ProBook 640', 'HP', 'Notebook'),
('N-HP ProBook 650', 'HP', 'Notebook'),
('N-HP Spectre Folio', 'HP', 'Notebook'),
('N-Lenovo IdeaPad 3', 'Lenovo', 'Notebook'),
('N-Lenovo IdeaPad 5', 'Lenovo', 'Notebook'),
('N-Lenovo IdeaPad 5i', 'Lenovo', 'Notebook'),
('N-Lenovo IdeaPad S540', 'Lenovo', 'Notebook'),
('N-Lenovo ThinkBook 13', 'Lenovo', 'Notebook'),
('N-Lenovo ThinkBook 14', 'Lenovo', 'Notebook'),
('N-Lenovo ThinkBook 15', 'Lenovo', 'Notebook'),
('N-Lenovo ThinkPad E14', 'Lenovo', 'Notebook'),
('N-Lenovo ThinkPad E15', 'Lenovo', 'Notebook'),
('N-Lenovo ThinkPad L14', 'Lenovo', 'Notebook'),
('U-Acer Spin 5', 'Acer', 'Ultrabook'),
('U-Acer Spin 7', 'Acer', 'Ultrabook'),
('U-Acer Swift 1 Pro', 'Acer', 'Ultrabook'),
('U-Acer Swift 3', 'Acer', 'Ultrabook'),
('U-Acer Swift 3 SF313', 'Acer', 'Ultrabook'),
('U-Acer Swift 3X', 'Acer', 'Ultrabook'),
('U-Acer Swift 5', 'Acer', 'Ultrabook'),
('U-Acer Swift 5 Pro', 'Acer', 'Ultrabook'),
('U-Acer Swift 5 SF514', 'Acer', 'Ultrabook'),
('U-Acer Swift 7', 'Acer', 'Ultrabook'),
('U-Apple MacBook Air', 'Apple', 'Ultrabook'),
('U-ASUS VivoBook 14', 'ASUS', 'Ultrabook'),
('U-ASUS VivoBook Flip', 'ASUS', 'Ultrabook'),
('U-ASUS VivoBook Flip 14', 'ASUS', 'Ultrabook'),
('U-ASUS VivoBook S13', 'ASUS', 'Ultrabook'),
('U-ASUS VivoBook S14', 'ASUS', 'Ultrabook'),
('U-ASUS ZenBook 13', 'ASUS', 'Ultrabook'),
('U-ASUS ZenBook 14', 'ASUS', 'Ultrabook'),
('U-ASUS ZenBook 14 Ultralight', 'ASUS', 'Ultrabook'),
('U-ASUS ZenBook Duo', 'ASUS', 'Ultrabook'),
('U-ASUS ZenBook Flip', 'ASUS', 'Ultrabook'),
('U-Dell XPS 13', 'Dell', 'Ultrabook'),
('U-HP Elite Dragonfly', 'HP', 'Ultrabook'),
('U-HP EliteBook x360', 'HP', 'Ultrabook'),
('U-HP Envy 13', 'HP', 'Ultrabook'),
('U-HP Envy 15', 'HP', 'Ultrabook'),
('U-HP Envy x360', 'HP', 'Ultrabook'),
('U-HP ENVY x360 15t', 'HP', 'Ultrabook'),
('U-HP Spectre 13', 'HP', 'Ultrabook'),
('U-HP Spectre x360', 'HP', 'Ultrabook'),
('U-HP Spectre x360 13t', 'HP', 'Ultrabook'),
('U-HP Spectre x360 Convertible', 'HP', 'Ultrabook'),
('U-Lenovo IdeaPad Flex 5', 'Lenovo', 'Ultrabook'),
('U-Lenovo IdeaPad Slim 7', 'Lenovo', 'Ultrabook'),
('U-Lenovo IdeaPad Slim 7 Carbon', 'Lenovo', 'Ultrabook'),
('U-Lenovo IdeaPad Slim 9i', 'Lenovo', 'Ultrabook'),
('U-Lenovo ThinkPad X1 Carbon', 'Lenovo', 'Ultrabook'),
('U-Lenovo Yoga C640', 'Lenovo', 'Ultrabook'),
('U-Lenovo Yoga C740', 'Lenovo', 'Ultrabook'),
('U-Lenovo Yoga C930', 'Lenovo', 'Ultrabook'),
('U-Lenovo Yoga C940', 'Lenovo', 'Ultrabook'),
('U-Lenovo Yoga Slim 7', 'Lenovo', 'Ultrabook'),
('U-MSI Modern 13', 'MSI', 'Ultrabook'),
('U-MSI Modern 14', 'MSI', 'Ultrabook'),
('U-MSI Modern 14 B11M', 'MSI', 'Ultrabook'),
('U-MSI Modern 15', 'MSI', 'Ultrabook'),
('U-MSI Modern 15 A11SB', 'MSI', 'Ultrabook'),
('U-MSI Prestige 14', 'MSI', 'Ultrabook'),
('U-MSI Prestige 14 Evo', 'MSI', 'Ultrabook'),
('U-MSI Prestige 15', 'MSI', 'Ultrabook'),
('U-MSI Prestige 15 A11SC', 'MSI', 'Ultrabook'),
('U-MSI Summit B14', 'MSI', 'Ultrabook');

-- --------------------------------------------------------

--
-- Table structure for table `saw_penilaian`
--

CREATE TABLE `saw_penilaian` (
  `nama` varchar(100) NOT NULL,
  `penyimpanan` int(11) NOT NULL,
  `harga` float NOT NULL,
  `processor` float NOT NULL,
  `ram` float NOT NULL,
  `layar` float NOT NULL,
  `vga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `saw_penilaian`
--

INSERT INTO `saw_penilaian` (`nama`, `penyimpanan`, `harga`, `processor`, `ram`, `layar`, `vga`) VALUES
('G-Acer Nitro 5', 5, 2, 5, 5, 5, 5),
('G-Acer Nitro 5 AN515', 5, 3, 5, 5, 5, 5),
('G-Acer Nitro 5 AN517', 5, 4, 5, 5, 5, 5),
('G-Acer Nitro 7', 4, 4, 3, 4, 2, 3),
('G-Acer Predator Helios 300', 1, 3, 4, 1, 4, 2),
('G-ASUS ROG Strix SCAR 17', 4, 4, 3, 3, 3, 3),
('G-Lenovo Legion 7 Pro', 5, 3, 4, 2, 3, 3),
('G-Lenovo Legion Y545', 5, 4, 3, 3, 3, 4),
('G-MSI GL65 Leopard', 4, 4, 4, 3, 3, 3),
('N-Dell Inspiron 14', 3, 3, 3, 3, 3, 3),
('N-Dell Latitude 13', 2, 5, 3, 2, 3, 2),
('N-Dell Precision 15', 4, 3, 2, 2, 3, 3),
('N-HP EliteBook 850', 2, 1, 2, 3, 3, 2),
('U-Acer Swift 1 Pro', 4, 1, 1, 1, 1, 1),
('U-MSI Modern 14 B11M', 4, 4, 4, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `saw_perankingan`
--

CREATE TABLE `saw_perankingan` (
  `no` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `saw_perankingan`
--

INSERT INTO `saw_perankingan` (`no`, `nama`, `nilai_akhir`) VALUES
(1, 'G-Acer Nitro 5', 0.9),
(2, 'G-Acer Nitro 5 AN515', 0.867),
(3, 'G-Acer Nitro 5 AN517', 0.85),
(4, 'G-Acer Nitro 7', 0.59),
(5, 'G-Acer Predator Helios 300', 0.407),
(6, 'G-ASUS ROG Strix SCAR 17', 0.57),
(7, 'G-Lenovo Legion 7 Pro', 0.617),
(8, 'G-Lenovo Legion Y545', 0.64),
(9, 'G-MSI GL65 Leopard', 0.6),
(10, 'N-Dell Inspiron 14', 0.547),
(11, 'N-Dell Latitude 13', 0.41),
(12, 'N-Dell Precision 15', 0.517),
(13, 'N-HP EliteBook 850', 0.58),
(14, 'U-Acer Swift 1 Pro', 0.48),
(15, 'U-MSI Modern 14 B11M', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', '111', 'admin'),
(2, 'aku', 'aku@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `saw_laptop`
--
ALTER TABLE `saw_laptop`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `saw_penilaian`
--
ALTER TABLE `saw_penilaian`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `saw_perankingan`
--
ALTER TABLE `saw_perankingan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `saw_perankingan`
--
ALTER TABLE `saw_perankingan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
