-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2023 at 05:14 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `produk_id` int(30) NOT NULL,
  `quantity` int(255) NOT NULL,
  `size_level` varchar(255) NOT NULL,
  `sugar_level` varchar(255) NOT NULL,
  `ice_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `cart_id` int(30) NOT NULL,
  `produk_id` int(30) NOT NULL,
  `alamat` text DEFAULT NULL,
  `pembayaran` varchar(255) DEFAULT NULL,
  `pengiriman` varchar(255) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL,
  `order_id` int(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pembayaran` varchar(255) DEFAULT NULL,
  `pengiriman` varchar(255) DEFAULT NULL,
  `final_price` int(11) DEFAULT NULL,
  `tanggal_order` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `image` varchar(255) NOT NULL,
  `jenis_produk` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_kopi`
--

INSERT INTO `produk_kopi` (`id`, `nama`, `harga`, `stok`, `deskripsi`, `slogan`, `image`, `jenis_produk`) VALUES
(12, 'Americano', 21000, -20, 'Americano adalah sejenis minuman kopi yang memiliki cirikhas khusus. Minuman ini dicirikan oleh rasa kuat dan pahit yang berasal dari proses penyeduhan biji kopi yang digiling halus. Amerikano memiliki tingkat kepekatan yang lebih rendah dibandingkan espresso, tetapi tetap menyajikan cita rasa kopi yang khas. Rasa kopi yang hangat dan membangunkan menciptakan pengalaman yang memanjakan bagi penikmatnya. Aroma khas kopi Amerikano yang menggoda juga menjadi ciri khasnya. Selain itu, Amerikano sering diidentifikasi dengan kesederhanaan dan kesukaan akan kopi murni tanpa tambahan bahan lain, menjadikannya pilihan yang populer di kalangan pencinta kopi yang menghargai cita rasa asli biji kopi.', 'Kopi Americano, Pahit Asli yang Memikat kannn', 'americano.png', 'minuman'),
(13, 'Coconut Latte', 29000, 9, 'Coconut Latte adalah sebuah campuran eksotis yang menawarkan cita rasa yang menggoda dan segar. Cirikhasnya unik karena memadukan kopi espresso dengan susu yang diimbangi dengan rasa khas kelapa. Rasa kopi espresso yang klasik dan kuat menyatu dengan kelapa yang memberikan sentuhan manis dan gurih pada setiap tegukan.', 'Kekayaan Kopi dengan Kelapa Murni', 'coconut.png', 'minuman'),
(14, 'Chocolate', 26000, 2, 'Minuman cokelat adalah campuran nikmat yang memukau antara cokelat dengan susu, menciptakan cita rasa yang manis, kaya, dan memanjakan. Cirikhasnya mencakup kekayaan rasa cokelat yang mendalam, ditambah dengan kremositas dan kelembutan dari susu. Rasa manis yang menyenangkan dan aroma cokelat yang menggugah selera mengisi setiap tegukan dengan kelezatan.', 'Nikmati Kelezatan Coklat Kami', 'chocolate.png', 'minuman'),
(15, 'Espresso Macchiato', 25000, 1, 'Espresso Macchiato adalah minuman kopi yang memiliki ciri khas unik dengan paduan sempurna antara espresso dan sedikit susu.Espresso Macchiato memiliki ciri khas berupa tampilan warna yang kontras antara kopi hitam pekat espresso dan tambahan susu yang hanya sedikit, sehingga membentuk sentuhan warna cerah atau coklat susu di permukaan minuman. Rasa pahit dan kaya dari espresso muncul dengan jelas, namun diselingi dengan sedikit manis dan lembut dari susu yang memperhalus rasa keseluruhan minuman.', 'Espresso Autentik dengan Cita Rasa Khas', 'espresso.png', 'minuman'),
(16, 'Avocado Coffee ', 26000, -138, 'Avocado Coffee adalah minuman yang menggabungkan dua bahan utama yang tidak lazim namun menyatu dengan sempurna: alpukat dan kopi. Minuman ini menonjolkan rasa dan tekstur alpukat yang lembut dan krimi dengan cita rasa kopi yang khas. Ciri khas dari Avocado Coffee adalah perpaduan antara kekayaan dan kemanisan alpukat dengan pahitnya kopi. Alpukat memberikan minuman ini tekstur yang lembut dan krimi, sementara kopi memberikan elemen rasa yang mendalam dan kompleks. Rasanya sangat unik, menyajikan kombinasi manis alami dari alpukat dengan karakteristik kopi yang khas, seperti pahit, asam, dan aroma khas.', 'Sensasi Kopi dengan Alpukat Yang Lezat', 'avocado.png', 'minuman'),
(17, 'MilkTea', 23000, -9, 'Milk Tea adalah minuman yang memikat dengan cirikhas yang lembut dan menyenangkan. Cirikhasnya berasal dari perpaduan antara teh yang kuat dan beraroma dengan tambahan susu yang memberikan kelembutan dan kreami. Rasa teh yang khas, mulai dari teh hitam hingga teh hijau, membangkitkan cita rasa yang tajam dan menyegarkan, sementara susu memberikan sentuhan manis dan gurih yang melengkapi rasa teh.', 'Perpaduan Sempurna Teh dan Susu', 'milktea.png', 'minuman'),
(18, 'Kopi Susu Gula Aren', 27000, 3, 'Kopi susu gula aren adalah minuman kopi yang menawarkan cirikhas unik dan menggoda. Rasa khasnya berasal dari perpaduan antara kopi yang kuat dan penuh karakter dengan susu yang creamy, yang kemudian disempurnakan dengan manisnya gula aren. Cirikhasnya mencerminkan kombinasi antara kekuatan kopi yang terasa di lidah dengan kelembutan susu, yang menyatu dengan manis alami gula aren.', 'Sensasi Gula Aren dalam Setiap Tetes Kopi', 'kopisusugulaaren.png', 'minuman'),
(19, 'Caffee Lattee', 30000, 1, 'Caffe latte adalah minuman kopi yang memiliki cirikhas lembut dan berimbang. Ciri utama dari caffe latte adalah perpaduan sempurna antara espresso dan susu. Cirikhasnya memberikan rasa kopi yang lebih lembut dan creamy dibandingkan dengan espresso murni. Rasa pahit yang khas dari espresso dipelankan oleh kehadiran susu, menciptakan keseimbangan yang memuaskan. Aroma khas kopi juga tetap hadir, tetapi dengan sentuhan manis dan krim dari susu. Rasio antara espresso dan susu dapat bervariasi sesuai dengan preferensi individu,Itulah mengapa caffe latte sering dianggap sebagai minuman kopi yang cocok untuk mereka yang ingin menikmati espresso dengan nuansa lebih ringan dan ramah bagi lidah.', 'Nikmati Kopi Latte Berkualitas Tinggi', 'caffeelattee.png', 'minuman'),
(20, 'Matcha Lattee', 22000, 7, 'Matcha latte adalah minuman yang menawarkan cita rasa unik dan khas. Cirikhasnya dipenuhi dengan sentuhan manis, ringan, dan segar yang berasal dari bubuk matcha, yaitu teh hijau yang telah dihaluskan secara halus. Rasa khasnya terdiri dari campuran manis alami dari susu, dengan sentuhan ringan rasa tanaman dari matcha yang memberikan sentuhan keseimbangan yang lezat. Citarasa yang krem dan lembut dari susu menyatu dengan kompleksitas rasa matcha yang unik, menghasilkan minuman yang memikat lidah. Matcha latte sering dianggap sebagai minuman yang membawa ketenangan dan energi sekaligus, menjadikannya pilihan yang populer di kalangan pencinta teh dan minuman yang menyegarkan.', 'NIkmati Dengan Bubuk Matcha Pilihan', 'matcha3.png', 'minuman'),
(32, 'Anggur merah', 35000, 12, 'Butterscotch Salted', 'Perpaduan sempurna butter dan salted caramel', 'caffeelattee.png', 'minuman'),
(33, ' Biji Kopi Arabika', 21000, 12, 'Biji kopi Arabika, berasal dari tumbuhan Coffea arabica, menggambarkan esensi kopi yang paling dihargai di seluruh dunia. Memiliki rasa kompleks yang lembut dan elegan, ciri khas kopi Arabika adalah tingkat keasaman yang lebih tinggi dan rasa yang lebih halus daripada saudaranya, kopi Robusta. Rasa kopi Arabika seringkali menghadirkan kombinasi manis, buah-buahan, dan hint cokelat, yang dipadu dengan aroma bunga yang menggoda. Kandungan kafeinnya yang lebih rendah menambah keistimewaan, menjadikannya pilihan utama bagi para pencinta kopi yang menghargai rasa yang lembut namun kompleks.', '100% Biji Kopi Arabika Pilihan', 'foto1.png', 'biji_kopi'),
(34, 'Biji Kopi Dark Roast', 40000, 19, 'Biji kopi dark roast, melalui proses panggangan yang lebih lama dan intens, menciptakan karakteristik yang khas dan kuat, biji kopi ini menghasilkan rasa yang pekat, penuh, dan kadang-kadang pahit. Aroma yang dihasilkan cenderung lebih kuat, dengan sentuhan kayu, cokelat, atau rempah-rempah yang menggoda. Dark roast sering kali memiliki tingkat keasaman yang lebih rendah, namun dapat menampilkan varian rasa seperti rasa manis yang berpadu dengan rasa yang dalam dan tahan lama, menciptakan pengalaman kopi yang kaya dan intens.', '100% Biji kopi pilihan', 'foto2.png', 'biji_kopi'),
(35, 'Biji Kopi Luwak', 55000, 20, 'Biji kopi Luwak, juga dikenal sebagai \"kopi civet,\" merupakan biji kopi yang memiliki kharakteristik unik karena proses fermentasi alami yang dilakukan oleh musang luak. Musang ini memakan buah-buahan kopi, mencerna biji kopi, dan kemudian mengeluarkan biji kopi yang terfermentasi melalui kotorannya. Proses fermentasi ini memberikan biji kopi Luwak rasa yang unik dan halus dengan sedikit asiditas, menghasilkan profil rasa yang lembut dengan aroma yang khas. Biji kopi Luwak dianggap sebagai salah satu kopi termahal di dunia, menginspirasi penikmat kopi untuk mencari pengalaman yang eksklusif dan berbeda.', '100% Biji kopi pilihan', 'foto3.png', 'biji_kopi'),
(36, 'Biji Kopi Excelsa', 40000, 20, 'Biji kopi Excelsa, varietas kopi yang berasal dari spesies Coffea excelsa, mempresentasikan keunikan dengan ciri khas yang mencolok di dunia kopi. Biji kopi ini dikenal karena rasa yang kuat dan berbeda, yang sering dicirikan oleh citarasa yang asam dan tart, menggabungkan elemen-elemen buah-buahan dan floral yang khas. Kedua rasa ini menyebabkan biji kopi Excelsa sering digunakan untuk menambah kompleksitas dan karakteristik unik dalam campuran kopi.', '100% Biji kopi pilihan', 'foto4.png', 'biji_kopi'),
(37, 'Biji Kopi Robusta', 50000, 18, 'Biji kopi Robusta mempersembahkan cirikhas yang mencirikan ketegasan dan kekuatan. Dengan rasa yang kuat dan penuh, Robusta menghadirkan ciri khas pahit yang tajam namun menggugah. Tingginya kadar kafein memberikan sensasi energik, sementara crema tebal pada permukaan espresso mencerminkan kekentalan dan tubuh yang kuat. Rasa pahit yang menonjol dan keasaman yang lebih rendah menjadikan biji kopi Robusta sangat dihargai dalam campuran kopi espresso, memberikan dimensi intens dan karakteristik yang berbeda dibandingkan varietas kopi lainnya.', '100% Biji kopi pilihan', 'foto5.png', 'biji_kopi'),
(38, 'Biji Kopi Liberika', 65000, 20, 'Biji kopi Liberika memiliki cirikhas yang unik dan khas. Varitas Liberika (Coffea liberica) memiliki daun yang lebih besar dan biji yang lebih besar dibandingkan dengan biji kopi Arabika. Cirikhasnya mencakup rasa yang berbeda, dengan aroma dan cita rasa yang lebih kuat, lebih mirip dengan varietas Robusta. Rasa asam yang lebih rendah dan tubuh yang penuh menjadikan biji kopi Liberika diakui dengan profil rasa yang khas.', '100% Biji kopi pilihan', 'foto6.png', 'biji_kopi'),
(39, 'Biji Kopi Gayo', 47000, 20, 'Biji kopi Gayo, ditanam di wilayah Pegunungan Gayo di Aceh, Indonesia, menghadirkan cirikhas yang memikat. Kopi ini dikenal dengan keunikan rasa yang kompleks dan mendalam. Rasa yang khas mencakup sentuhan bunga, cokelat, dan rempah-rempah dengan tingkat keasaman yang seimbang. Aroma harum yang khas juga menjadi ciri khas biji kopi Gayo, memberikan pengalaman minum yang menggugah selera. Tekstur yang lembut dan tubuh yang penuh menjadikan minuman kopi ini begitu memesona bagi para penikmat kopi. Keaslian cita rasa dan kualitas biji kopi Gayo telah menjadikannya sebagai salah satu biji kopi terbaik yang dihargai di seluruh dunia, dan menjadi kebanggaan dari wilayah Pegunungan Gayo.', '100% Biji kopi pilihan', 'foto7.png', 'biji_kopi'),
(40, 'Tumbler Grind Coffee', 60000, 20, 'Tumbler yang ini adalah perpaduan sempurna antara fungsionalitas, gaya, dan keberlanjutan. Desainnya modern dan elegan, memberikan kesan estetika yang menarik mata. Tersedia dalam berbagai pilihan warna dan motif yang cocok untuk berbagai selera. Bahan berkualitas tinggi seperti stainless steel atau plastik tahan lama memberikan jaminan akan ketahanan tumbler ini. Tidak hanya itu, tumbler ini dirancang untuk mempertahankan suhu minuman lebih lama, menjaga kesegaran minuman hangat atau dingin selama berjam-jam. Dengan memilih tumbler ini, pengguna juga berkontribusi pada upaya pelestarian lingkungan dengan mengurangi penggunaan botol plastik sekali pakai. Tumbler ini adalah kawan setia untuk menemani aktivitas sehari-hari, mencerminkan kombinasi antara kenyamanan, gaya, dan peduli lingkungan.', 'Official Merchandise Grind Coffee!!', 'merch1.png', 'merchandise'),
(41, 'Gelas Mug', 50000, 20, 'Gelas mug yang ditawarkan oleh toko Grind Coffee adalah representasi sempurna dari kenikmatan minum kopi dengan gaya. Desainnya yang elegan dan fungsional memberikan pengalaman minum yang tak tertandingi. Gelas mug memiliki pegangan yang nyaman, memudahkan pengguna untuk menikmati setiap tegukan kopi. Terbuat dari bahan kaca tebal berkualitas tinggi, gelas ini mempertahankan suhu minuman lebih lama, sehingga aroma dan rasa kopi terjaga dengan baik. Kapasitasnya yang ideal memungkinkan nikmatnya secangkir kopi.  Gelas mug ini tidak hanya menjadi wadah minum, tetapi juga menjadi simbol pengalaman kopi yang autentik dan berkualitas dari toko Grind Coffee.', 'Official Merchandise Grind Coffee!!', 'merch2.png', 'merchandise'),
(42, 'Totebag', 65000, 18, 'Tote bag yang dijual oleh toko Grind Coffee adalah manifestasi dari gaya hidup urban yang dinamis dan cinta akan kopi. Desainnya yang modern dan minimalis menampilkan logo Grind Coffee yang ikonik. Tote bag ini terbuat dari bahan kanvas berkualitas tinggi yang kokoh namun tetap ringan, sehingga nyaman untuk dibawa sehari-hari. Ruang yang luas di dalamnya memungkinkan untuk membawa peralatan dan aksesori kopi dengan mudah. Fungsi dan gaya bertemu dalam tote bag ini, mencerminkan komitmen Grind Coffee untuk memberikan pengalaman kopi yang lebih dari sekadar minuman, melainkan sebuah gaya hidup yang autentik dan berkualitas. Dengan membawa tote bag ini, penggemar kopi dapat mengungkapkan cintanya pada kopi dengan gaya yang tidak kompromi.', 'Official Merchandise Grind Coffee!!', 'merch3.png', 'merchandise'),
(43, 'Apron', 40000, 20, 'Apron yang dijual oleh toko Grind Coffee adalah simbol dari dedikasi pada seni menyajikan kopi yang sempurna. Desainnya yang ergonomis dan fungsional mencerminkan profesionalisme para barista dan penggemar kopi. Apron ini terbuat dari bahan berkualitas tinggi yang tahan lama, memberikan perlindungan dan kenyamanan saat meracik dan menyajikan kopi. Dengan logo Grind Coffee yang khas, apron ini menambahkan sentuhan estetika yang menarik bagi para pecinta kopi. Dengan memakai apron ini, para barista dan pecinta kopi dapat mengekspresikan kecintaan mereka pada seni kopi dan identitas merek Grind Coffee dengan bangga.', 'Official Merchandise Grind Coffee!!', 'merch4.png', 'merchandise'),
(44, 'Note book', 40000, 20, 'Notebook yang dijual oleh toko Grind Coffee memiliki ciri khas yang menawan. Didesain dengan sentuhan modern dan estetika yang elegan, notebook ini menyuguhkan tampilan luar yang menarik dan memikat. Dilengkapi dengan cover berkualitas tinggi yang terinspirasi dari aroma kopi yang hangat dan berlimpah, notebook ini menjadi penyemangat saat Anda menuliskan ide-ide brilian atau merencanakan hari-hari Anda. Kualitas halaman dalamnya juga istimewa, dengan kertas berkualitas tinggi yang nyaman digunakan untuk menuliskan catatan dan inspirasi Anda. Sebuah paduan sempurna antara fungsi dan gaya, notebook dari Grind Coffee adalah teman setia bagi para pecinta kopi yang ingin menangkap momen-momen penting dalam hidup mereka.', 'Official Merchandise Grind Coffee!!', 'merch5.png', 'merchandise'),
(45, 'Dad hat', 70000, 20, 'Dad hat yang ditawarkan oleh toko Grind Coffee memiliki ciri khas yang memikat hati para pecinta kopi. Desain simpel namun trendi, topi ini memadukan gaya urban dengan elemen kecintaan terhadap kopi. Dengan bordiran logo Grind Coffee yang elegan di bagian depan, dad hat ini menambahkan sentuhan keren pada gaya santai sehari-hari. Bahan berkualitas dan bentuk yang nyaman membuatnya sempurna untuk melengkapi gaya kasual Anda sambil tetap menunjukkan dedikasi Anda pada dunia kopi.', 'Official Merchandise Grind Coffee!!', 'merch6.png', 'merchandise'),
(46, 'Tumbler Gelas', 70000, 20, 'Tumbler yang ini adalah perpaduan sempurna antara fungsionalitas, gaya, dan keberlanjutan. Desainnya modern dan elegan, memberikan kesan estetika yang menarik mata. Tersedia dalam berbagai pilihan warna dan motif yang cocok untuk berbagai selera. Bahan berkualitas tinggi seperti stainless steel atau plastik tahan lama memberikan jaminan akan ketahanan tumbler ini. Dengan memilih tumbler ini, pengguna juga berkontribusi pada upaya pelestarian lingkungan dengan mengurangi penggunaan botol plastik sekali pakai. Tumbler ini adalah kawan setia untuk menemani aktivitas sehari-hari, mencerminkan kombinasi antara kenyamanan, gaya, dan peduli lingkungan.', 'Official Merchandise Grind Coffee!!', 'merch8.png', 'merchandise');

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
  `alamat` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `no_telp`, `birth_date`, `alamat`, `password`, `is_admin`) VALUES
(21, 'Admin', 'HlO', 'admin@if.local', '081911020216', '2005-02-22', 'Villamas Blok C7 No.9', '$2y$10$uMd9qNtxxbiy0xWQh4.w3u4q0k7G2TarZ5IUyl3RCBIwVcsEb8j9i', 1),
(23, 'aaa', 'bbb', 'budianakbaik@gmail.com', '0981283918', '2002-02-22', '', '$2y$10$I69Z.09i8z2ulTtvKnQZcO1Y6IRCsKL7jeW9uzNfl4EX6rIZHd.3K', 0),
(24, 'Adil', 'Gunawan', 'adilgunawan12@gmail.com', '087789102211', '2005-02-22', NULL, '$2y$10$3417wOkTU1WlgL4W.S.3P.Obcj5MwToHlpjA9hnxJHOa4O2qxHdRG', 0);

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
(81, 13, 'Coconut Latte', 29000, 30, 'coconut.png', 'Kekayaan Kopi dengan Kelapa Murni'),
(82, 12, 'Americano', 21000, 18, 'americano.png', 'Kopi Americano, Pahit Asli yang Memikat kannn'),
(83, 42, 'Totebag', 65000, 20, 'merch3.png', 'Official Merchandise Grind Coffee!!'),
(84, 13, 'Coconut Latte', 29000, 3, 'coconut.png', 'Kekayaan Kopi dengan Kelapa Murni'),
(85, 12, 'Americano', 21000, -9, 'americano.png', 'Kopi Americano, Pahit Asli yang Memikat kannn'),
(86, 13, 'Coconut Latte', 29000, 13, 'coconut.png', 'Kekayaan Kopi dengan Kelapa Murni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `produk_kopi`
--
ALTER TABLE `produk_kopi`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlist_produk`
--
ALTER TABLE `wishlist_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
