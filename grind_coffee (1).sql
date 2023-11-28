-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2023 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grind_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk_kopi`
--

CREATE TABLE `produk_kopi` (
  `id` int(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_kopi`
--

INSERT INTO `produk_kopi` (`id`, `nama`, `harga`, `stok`, `deskripsi`, `slogan`, `image`) VALUES
(12, 'Americano', 21000, 25, 'Americano adalah sejenis minuman kopi yang memiliki cirikhas khusus. Minuman ini dicirikan oleh rasa kuat dan pahit yang berasal dari proses penyeduhan biji kopi yang digiling halus. Amerikano memiliki tingkat kepekatan yang lebih rendah dibandingkan espresso, tetapi tetap menyajikan cita rasa kopi yang khas. Rasa kopi yang hangat dan membangunkan menciptakan pengalaman yang memanjakan bagi penikmatnya. Aroma khas kopi Amerikano yang menggoda juga menjadi ciri khasnya. Selain itu, Amerikano sering diidentifikasi dengan kesederhanaan dan kesukaan akan kopi murni tanpa tambahan bahan lain, menjadikannya pilihan yang populer di kalangan pencinta kopi yang menghargai cita rasa asli biji kopi.', 'Kopi Americano, Pahit Asli yang Memikat kannn', 'americano.png'),
(13, 'Coconut Latte', 29000, 30, 'Coconut Latte adalah sebuah campuran eksotis yang menawarkan cita rasa yang menggoda dan segar. Cirikhasnya unik karena memadukan kopi espresso dengan susu yang diimbangi dengan rasa khas kelapa. Rasa kopi espresso yang klasik dan kuat menyatu dengan kelapa yang memberikan sentuhan manis dan gurih pada setiap tegukan.', 'Kekayaan Kopi dengan Kelapa Murni', 'coconut.png'),
(14, 'Chocolate', 26000, 50, 'Minuman cokelat adalah campuran nikmat yang memukau antara cokelat dengan susu, menciptakan cita rasa yang manis, kaya, dan memanjakan. Cirikhasnya mencakup kekayaan rasa cokelat yang mendalam, ditambah dengan kremositas dan kelembutan dari susu. Rasa manis yang menyenangkan dan aroma cokelat yang menggugah selera mengisi setiap tegukan dengan kelezatan.', 'Nikmati Kelezatan Coklat Kami', 'chocolate.png'),
(15, 'Espresso Macchiato', 25000, 18, 'Espresso Macchiato adalah minuman kopi yang memiliki ciri khas unik dengan paduan sempurna antara espresso dan sedikit susu.Espresso Macchiato memiliki ciri khas berupa tampilan warna yang kontras antara kopi hitam pekat espresso dan tambahan susu yang hanya sedikit, sehingga membentuk sentuhan warna cerah atau coklat susu di permukaan minuman. Rasa pahit dan kaya dari espresso muncul dengan jelas, namun diselingi dengan sedikit manis dan lembut dari susu yang memperhalus rasa keseluruhan minuman.', 'Espresso Autentik dengan Cita Rasa Khas', 'espresso.png'),
(16, 'Avocado Coffee ', 26000, 15, 'Avocado Coffee adalah minuman yang menggabungkan dua bahan utama yang tidak lazim namun menyatu dengan sempurna: alpukat dan kopi. Minuman ini menonjolkan rasa dan tekstur alpukat yang lembut dan krimi dengan cita rasa kopi yang khas. Ciri khas dari Avocado Coffee adalah perpaduan antara kekayaan dan kemanisan alpukat dengan pahitnya kopi. Alpukat memberikan minuman ini tekstur yang lembut dan krimi, sementara kopi memberikan elemen rasa yang mendalam dan kompleks. Rasanya sangat unik, menyajikan kombinasi manis alami dari alpukat dengan karakteristik kopi yang khas, seperti pahit, asam, dan aroma khas.', 'Sensasi Kopi dengan Alpukat Yang Lezat', 'avocado.png'),
(17, 'MilkTea', 23000, 18, 'Milk Tea adalah minuman yang memikat dengan cirikhas yang lembut dan menyenangkan. Cirikhasnya berasal dari perpaduan antara teh yang kuat dan beraroma dengan tambahan susu yang memberikan kelembutan dan kreami. Rasa teh yang khas, mulai dari teh hitam hingga teh hijau, membangkitkan cita rasa yang tajam dan menyegarkan, sementara susu memberikan sentuhan manis dan gurih yang melengkapi rasa teh.', 'Perpaduan Sempurna Teh dan Susu', 'milktea.png'),
(18, 'Kopi Susu Gula Aren', 27000, 33, 'Kopi susu gula aren adalah minuman kopi yang menawarkan cirikhas unik dan menggoda. Rasa khasnya berasal dari perpaduan antara kopi yang kuat dan penuh karakter dengan susu yang creamy, yang kemudian disempurnakan dengan manisnya gula aren. Cirikhasnya mencerminkan kombinasi antara kekuatan kopi yang terasa di lidah dengan kelembutan susu, yang menyatu dengan manis alami gula aren.', 'Sensasi Gula Aren dalam Setiap Tetes Kopi', 'kopisusugulaaren.png'),
(19, 'Caffee Lattee', 30000, 21, 'Caffe latte adalah minuman kopi yang memiliki cirikhas lembut dan berimbang. Ciri utama dari caffe latte adalah perpaduan sempurna antara espresso dan susu. Cirikhasnya memberikan rasa kopi yang lebih lembut dan creamy dibandingkan dengan espresso murni. Rasa pahit yang khas dari espresso dipelankan oleh kehadiran susu, menciptakan keseimbangan yang memuaskan. Aroma khas kopi juga tetap hadir, tetapi dengan sentuhan manis dan krim dari susu. Rasio antara espresso dan susu dapat bervariasi sesuai dengan preferensi individu,Itulah mengapa caffe latte sering dianggap sebagai minuman kopi yang cocok untuk mereka yang ingin menikmati espresso dengan nuansa lebih ringan dan ramah bagi lidah.', 'Nikmati Kopi Latte Berkualitas Tinggi', 'caffeelattee.png'),
(20, 'Matcha Lattee', 22000, 15, 'Matcha latte adalah minuman yang menawarkan cita rasa unik dan khas. Cirikhasnya dipenuhi dengan sentuhan manis, ringan, dan segar yang berasal dari bubuk matcha, yaitu teh hijau yang telah dihaluskan secara halus. Rasa khasnya terdiri dari campuran manis alami dari susu, dengan sentuhan ringan rasa tanaman dari matcha yang memberikan sentuhan keseimbangan yang lezat. Citarasa yang krem dan lembut dari susu menyatu dengan kompleksitas rasa matcha yang unik, menghasilkan minuman yang memikat lidah. Matcha latte sering dianggap sebagai minuman yang membawa ketenangan dan energi sekaligus, menjadikannya pilihan yang populer di kalangan pencinta teh dan minuman yang menyegarkan.', 'NIkmati Dengan Bubuk Matcha Pilihan', 'matcha3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `no_telp`, `birth_date`, `password`) VALUES
(14, 'Adil', 'Gunawan Badudu', 'admin@if.local', '081911020216', '2005-02-22', '$2y$10$7MTXH3glUsQRQpnv5keBn.pNfT8d4BuAKweGZbPyGPcg/Ax9OPrdO'),
(15, 'Adil', 'Gunawan', 'adilgunawan12@gmail.com', '081911020216', '2005-02-22', '$2y$10$YFjcqNHtOzYeU1xNV6F/NOeH5kIrCuWiIceneawVEXKymAA.t4tB2');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_produk`
--

CREATE TABLE `wishlist_produk` (
  `id` int(11) NOT NULL,
  `produk_id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_produk`
--

INSERT INTO `wishlist_produk` (`id`, `produk_id`, `nama`, `harga`, `stok`, `image`, `slogan`) VALUES
(63, 14, 'Chocolate', 26000, 50, 'chocolate.png', 'Nikmati Kelezatan Coklat Kami'),
(64, 19, 'Caffee Lattee', 30000, 21, 'caffeelattee.png', 'Nikmati Kopi Latte Berkualitas Tinggi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk_kopi`
--
ALTER TABLE `produk_kopi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_produk`
--
ALTER TABLE `wishlist_produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk_kopi`
--
ALTER TABLE `produk_kopi`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist_produk`
--
ALTER TABLE `wishlist_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
