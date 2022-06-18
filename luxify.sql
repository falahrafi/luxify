-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2022 at 10:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxify`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `prov` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `telp`, `prov`, `city`, `kec`, `zip_code`, `address`, `user_id`) VALUES
(19, 'William Doe', '085987654321', 'Jawa Tengah', 'Semarang', 'Ngaliyan', '54321', 'Jl. Lorem Ipsum No. 99', 1),
(20, 'Samuel Doe', '085111222333', 'Jawa Tengah', 'Kendal', 'Kaliwungu Selatan', '09876', 'Jl. Raya No. 123', 1),
(21, 'Richard Leive', '082012938475', 'Jakarta', 'Jakarta Pusat', 'Tanah Abang', '09087', 'Jl. Coba No. 456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `weights` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `weights`, `quantity`, `product_id`, `transaction_id`, `user_id`) VALUES
(11, '50 ml', 1, 18, 18, 1),
(12, '50 ml', 1, 22, 18, 1),
(13, '50 ml', 1, 21, 19, 1),
(14, '100 ml', 1, 20, 20, 1),
(15, '100 ml', 1, 25, NULL, 1),
(16, '150 ml', 1, 21, NULL, 1),
(17, '100 ml', 4, 27, 21, 2),
(18, '50 ml', 2, 23, 21, 2),
(19, '150 ml', 1, 22, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `type`, `product_id`) VALUES
(47, 'assets/uploads/62a2e9e3de7e7.png', 'main', 17),
(48, 'assets/uploads/62a2ea0be6e31.png', 'main', 18),
(49, 'assets/uploads/62a41a78819e2.png', 'main', 19),
(50, 'assets/uploads/62a453a5a383f.png', 'main', 20),
(52, 'assets/uploads/62a4558cf13a6.png', 'main', 21),
(53, 'assets/uploads/62a4561b51a4f.png', 'main', 22),
(54, 'assets/uploads/62a49fbc1bddd.png', 'main', 23),
(55, 'assets/uploads/62a4578629b8b.png', 'main', 24),
(56, 'assets/uploads/62a4653072f36.png', 'main', 25),
(57, 'assets/uploads/62a4a0ada558f.png', 'main', 26),
(58, 'assets/uploads/62a4a0ba023ec.png', 'main', 27),
(59, 'assets/uploads/62a4a0c4d429e.png', 'main', 28),
(60, 'assets/uploads/62a4a0cdf0cf0.png', 'main', 29);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`) VALUES
(17, 'Facial Wash', 'Men', 30000, 'Facial Wash 3 in 1 yang diperkaya dengan Avena Strigosa Seed Extract, Niacinamide, Beads, dan Clay yang membantu mencerahkan, melembutkan, melembabkan, membersihkan minyak, dan kotoran di wajah secara optimal.'),
(18, 'Energy Bright', 'Men', 60000, 'Energy Bright Cream yang di formulasikan dengan 3 macam UV filter dengan kandungan Avena Strigosa Seed Extract, Niacinamide, dan Aloe Vera Extract yang membantu melembabkan, mencerahkan, dan melembutkan kulit.'),
(20, 'Acne Spot', 'Women', 150000, 'Acne Spot Treatment yang diperkaya dengan kandungan Salicylic Acid (BHA), Niacinamide, dan Centella Asiatica dapat memberikan efek dingin pada kulit yang berjerawat, sekaligus bermanfaat untuk meredakan, menyembuhkan, dan membunuh bakteri penyebab jerawat.'),
(21, 'Sun Screen', 'Men', 100000, 'Suncreen dengan formula yang ringan dan tidak berminyak membantu melindungi kulit wajah dari Sinar UV A dan UV B serta radikal bebas lainnya. Diperkaya dengan Avena Strigosa (Black Oat) Seed Extract yang membantu melembabkan kulit hingga lapisan dalam.'),
(22, 'Energy Serum', 'Men', 90000, 'Energy Serum yang mengandung 6 macam asam kompleks yaitu Glycolic Acid, Malic Acid, Tartaric Acid, Salicylic Acid, Lactic Acid dan Citric Acid yang membantu merawat kulit berjerawat, menyamarkan kerutan, mencerahkan kulit dan mengangkat sel-sel kulit mati, dengan kandungan Avena strigosa (Balck Oat) Seed Extract membantu melembabkan kulit hingga lapisan dalam.'),
(23, 'Day Cream', 'Women', 100000, 'Whitening Day Cream sendiri dapat digunakan untuk semua jenis kulit dan berfungsi menyamarkan noda dan mencerahkan wajah. Selain itu Whitening Day Cream juga: - Glowing look finish - Tekstur ringan dan meresap ke kulit - SPF 30.'),
(24, 'Glowing Toner', 'Women', 70000, 'Luxify Toner acne For Girl ini salah satunya bertugas dan berfungsi mempercepat proses penyembuhan jerawat/brutusan. Makanya sangat disarankan digunakan untuk kulit yg sedang bermasalah dg jerawat/brutusan. Toner acne wajib ada dalam paket acne dan paket acne akan lebih cepat mengeringkan jerawat/brutusan jika ditambahkan dengan SERUM ACNE.'),
(25, 'Perfume', 'Men', 100000, 'Luxify Perfume For Men merupakan parfum yang menghadirkan aroma Oud dan Amber yang lekat dengan warisan tradisi budaya. Hint Gourmand dan Vanilla membawa kembali manisnya memori terdahulu. Sentuhan awal Rose membuat kita semakin cinta pada tempat kita bermula.'),
(26, 'Green Tea Clay Mask', 'Women', 60000, 'Luxify Green tea clay mask For Girl adalah Clay mask yang memiliki bahan utama green tea yang sudah sangat terkenal mampu mencerahkan kulit, sebagai antioksidan, dan mencegah serta mengeringkan jerawat.'),
(27, 'Water Based - Pomade', 'Men', 50000, 'Water based dari Luxify For Men ini punya tekstur daya tahan yang ringan dan diperkaya dengan kandungan Aloevera Extract, Ginseng Extract dan Panthenol untuk membantu melembabkan kulit kepala dan mempertahankan rambut tetap kuat dan sehat.'),
(28, 'Oil Based - Pomade', 'Men', 50000, 'Oil based dari Luxify For Men ini punya tekstur daya tahan yang tinggi dan efektif untuk merapikan rambut serta memberi kilau alami.'),
(29, 'Clay Based - Pomade', 'Men', 50000, 'Clay based dari Luxify For Men ini punya tekstur daya tahan yang tinggi dan matte untuk merapikan rambut serta memberi kilau alami.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `address_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payment`, `status`, `user_id`, `address_id`) VALUES
(18, 'cod', 'pending', 1, 19),
(19, 'mandiri', 'pending', 1, 20),
(20, 'bca', 'pending', 1, 20),
(21, 'bca', 'failed', 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_slips`
--

CREATE TABLE `transfer_slips` (
  `id` bigint(20) NOT NULL,
  `slip` varchar(255) NOT NULL,
  `transaction_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_slips`
--

INSERT INTO `transfer_slips` (`id`, `slip`, `transaction_id`) VALUES
(2, 'assets/uploads/transfer_slips/62acaf5a745f1.png', 19),
(3, 'assets/uploads/transfer_slips/62ad2cb9bb1cc.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `usern` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `usern`, `passw`, `level`) VALUES
(1, 'Wibowo', 'admin', 'admin', 'admin'),
(2, 'Abid', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_slips`
--
ALTER TABLE `transfer_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transfer_slips`
--
ALTER TABLE `transfer_slips`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
