-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2022 at 02:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `weights` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(17, 'Facial Wash', 'Men', 58000, 'FACIAL WASH Pembersih wajah 3 in 1 yang diperkaya dengan Avena strigosa Seed Extract, Niacinamide, Beads dan Clay yang membantu mencerahkan, melembutkan, melembabkan, membersihkan minyak dan kotoran secara optimal.'),
(18, 'Energy Bright', 'Men', 61000, 'ENERGY BRIGHT CREAM Luxify for Men Energy Bright Cream yang diformulasikan dengan 3 macam UV filter yang dapat membantu melindungi kulit secara maksimal serta dengan kandungan Avena strigosa Seed Extract, Niacinamide, dan Aloevera Extract yang membantu melembabkan, mencerahkan, dan melembutkan kulit. MS Glow for Men Energy Bright Cream membantu melembabkan, mencerahkan, dan melembutkan kulit, Luxify For Men Energy Bright Cream juga memberikan tone up 1 tingkat pada wajah.'),
(20, 'Acne Spot', 'Women', 65500, 'LUXIFY ACNE SPOT TREATMENT FOR GIRL Spot Treatment yang ditargetkan untuk jerawat aktif. Diperkaya dengan kandungan Salicylic Acid (BHA), Niacinamide, dan Centella Asiatica dapat memberikan efek dingin pada kulit yang berjerawat, sekaligus bermanfaat untuk: 1. Meredakan kemerahan jerawat 2. Menyembuhkan jerawat yang meradang 3. Membunuh bakteri penyebab jerawat 4. Membersihkan pori yang tersumbat 5. Menyeimbangkan Ph alami kulit, tanpa membuat kulit kering 6. Memperbaiki skin barrier sekaligus meningkatkan imunitas kulit 7. Mencegah hyperpigmentasi yang disebabkan oleh jerawat yang meninggalkan bekas.'),
(21, 'Sun Screen', 'Men', 150000, 'SUNSCREEN SPRAY  FOR MEN Dengan formula yang ringan dan tidak berminyak membantu melindungi kulit wajah dari Sinar UV A dan UV B serta radikal bebas lainnya. Diperkaya dengan Avena Strigosa (Black Oat) Seed Extract yang membantu melembabkan kulit hingga lapisan dalam. Aplikasikan Luxify For Men Sunscreen Spray pada wajah dan juga pada tangan ataupun kaki agar mendapat perlindugan menyeluruh dari Sinar UV A dan UV B dan radikal bebas lainnya.'),
(22, 'Energy Serum', 'Men', 180000, 'ENERGY SERUM Mengandung 6 macam asam kompleks yaitu Glycolic Acid, Malic Acid, Tartaric Acid, Salicylic Acid, Lactic Acid dan Citric Acid yang membantu merawat kulit berjerawat, menyamarkan kerutan, mencerahkan kulit dan mengangkat sel-sel kulit mati, dengan kandungan Avena strigosa (Balck Oat) Seed Extract membantu melembabkan kulit hingga lapisan dalam. Aplikasikan Luxify for Men Serum pada wajah yang telah dibersihkan pada malam hari agar mendapatkan kulit wajah yang sehat, lembab, bersih, cerah dan bebas dari jerawat. Gunakan rangkaian produk Luxify for Men untuk hasil yang maksimal.'),
(23, 'Day Cream', 'Women', 345000, 'Whitening Day Cream sendiri dapat digunakan untuk semua jenis kulit dan berfungsi menyamarkan noda dan mencerahkan wajah. Selain itu Whitening Day Cream juga: - Glowing look finish - Tekstur ringan dan meresap ke kulit - SPF 30.'),
(24, 'Glowing Toner', 'Women', 90000, 'Luxify Toner acne For Girl ini salah satunya bertugas dan berfungsi mempercepat proses penyembuhan jerawat/brutusan. Makanya sangat disarankan digunakan untuk kulit yg sedang bermasalah dg jerawat/brutusan. Toner acne wajib ada dalam paket acne dan paket acne akan lebih cepat mengeringkan jerawat/brutusan jika ditambahkan dengan SERUM ACNE.'),
(25, 'Perfume', 'Men', 57500, 'Luxify Perfume For Men merupakan parfum yang menghadirkan aroma Oud dan Amber yang lekat dengan warisan tradisi budaya. Hint Gourmand dan Vanilla membawa kembali manisnya memori terdahulu. Sentuhan awal Rose membuat kita semakin cinta pada tempat kita bermula.'),
(26, 'Green Tea Clay Mask', 'Women', 92500, 'Luxify Green tea clay mask For Girl adalah Clay mask yang memiliki bahan utama green tea yang sudah sangat terkenal mampu mencerahkan kulit, sebagai antioksidan, dan mencegah serta mengeringkan jerawat.'),
(27, 'Water Based - Pomade', 'Men', 80000, 'Water based dari Luxify For Men ini punya tekstur daya tahan yang ringan dan diperkaya dengan kandungan Aloevera Extract, Ginseng Extract dan Panthenol untuk membantu melembabkan kulit kepala dan mempertahankan rambut tetap kuat dan sehat.'),
(28, 'Oil Based - Pomade', 'Men', 75000, 'Oil based dari Luxify For Men ini punya tekstur daya tahan yang tinggi dan efektif untuk merapikan rambut serta memberi kilau alami.'),
(29, 'Clay Based - Pomade', 'Men', 85000, 'Clay based dari Luxify For Men ini punya tekstur daya tahan yang tinggi dan matte untuk merapikan rambut serta memberi kilau alami.');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
