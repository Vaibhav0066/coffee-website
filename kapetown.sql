-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 06:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapetown`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `shipping_address`, `payment_method`, `total_amount`, `created_at`) VALUES
(1, 'Rohit Kumar', 'sheoranrohit908@gmail.com', 'Ward no 3, Charkhi Dadari, Haryana, 127306', 'credit_card', 0.00, '2024-05-12 21:49:15'),
(2, 'Rohit Kumar', 'sheoranrohit908@gmail.com', 'Ward no 3, Charkhi Dadari, Haryana, 127306', 'credit_card', 0.00, '2024-05-12 21:49:28'),
(3, 'Rohit Kumar', 'sheoranrohit908@gmail.com', 'Ward no 3, Charkhi Dadari, Haryana, 127306', 'debit_card', 0.00, '2024-05-12 21:51:37'),
(4, 'Rohit Kumar', 'sheoranrohit908@gmail.com', 'Ward no 3, Charkhi Dadari, Haryana, 127306', 'debit_card', 0.00, '2024-05-13 10:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text NOT NULL,
  `origin` text NOT NULL,
  `roast` text NOT NULL,
  `weight` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `origin`, `roast`, `weight`, `stock`, `featured`) VALUES
(1, 'African Collection Ethiopia Intensity 6', 'Ethiopia is known as the birthplace of the coffee bean. The first Arabica coffee plants were cultivated here and drinking coffee is an integral part of the Ethiopian tradition.\r\n\r\nEthiopian coffee beans are considered to be amongst the best from Africa and extremely sought after across the world.\r\n\r\nTasting notes: One of the most sought after coffee from Africa , the coffee bean is high grown with floral notes and a medium to full body.', 450.00, 'AfricanCollectionEthiopiaIntensity6.png', 'ETHIOPIA', 'Medium', 400, 10, 1),
(2, 'African Collection Ethiopia Intensity 6', 'Tasting notes: An extremely coveted high grown gourmet coffee with notes of grape , pear and citrus fruit with a medium to full body. ', 450.00, 'AfricanCollectionKenyaIntensity6.png', 'KENYA', 'Medium', 400, 10, 1),
(3, 'African Collection Tanzania Intensity 6', 'Tasting notes: The coffee is grown on the slopes of Mount Kilimanjaro. The roasted coffee has the aroma of toasted almond and apricot with fruity flavours and balanced acidity.', 450.00, 'AfricanCollectionTanzaniaIntensity6.png', 'Tanzania', 'Medium', 400, 10, 1),
(4, 'Anagh Intensity 8', 'This coffee is the highest grade of washed Arabica available in India.A medium roast coffee that has a light body and intense aroma.Grown at 3800 ft. it is one of the best known coffee in India , it is popular for being an extremely sweet with notes of toffied caramel and a mild aftertaste of bitter lemon.', 400.00, 'AnaghIntensity8.png', 'Mysore', 'Medium', 400, 10, 1),
(5, 'Bodum Chambord French Press 4 cups 500ML', 'Discover the art of the perfect brew with the CHAMBORD French press coffee maker. The French press system is beloved by coffee aficionados worldwide for its simplicity of brewing and purity of taste. And the CHAMBORD is the original and best French press coffee maker.\r\n\r\nAn icon of Bodum, the CHAMBORD is synonymous with the Bodum name. The original design dates back to the pre-war period when the Italian Attilo Calimani developed the basic principle. Bodum founder, Jørgen Bodum began work on his version of the French press in the 1970s, but it was the acquisition of Melior-Martin in 1991 – a company that produced a dome-shaped French press – that led to the development of the classic CHAMBORD we know and love today. This special shatterproof version has the clarity of glass, but is lightweight.\r\n\r\nA true original, the CHAMBORD has a timeless design and is produced with the same superior craftsmanship its devotees worldwide have come to expect. An environmentally friendly method of brewing, the French press system epitomizes Bodum’s core belief that we should ‘make taste, not waste’.\r\n\r\nMAIN FEATURES & BENEFITS\r\nIconic French press coffee maker that brings out the full flavor and aroma of your brew.\r\nThe carafe is made of shatterproof, BPA-free SAN plastic that’s scratch resistant, non-deformable by heat, and resistant to temperature changes.\r\nThe frame and lid is made from durable stainless steel that’s undergone several chrome-plating processes to result in a durable, shiny surface capable of withstanding many years of use.\r\nThe handle is made from Polypropylene with a matte finish that gives a comfortable grip while serving and adds to the classic quality of the design.\r\nStainless steel plunger prevents ground beans escaping when the coffee is poured.\r\nMore environmentally friendly than many coffee-brewing methods – no paper filters or plastic capsules required.\r\nEasy to use and easy to clean.', 4000.00, 'BodumChambordFrenchPress4cups500ML.png', 'Na', 'Na', 400, 10, 2),
(7, 'Caramel Intensity 6', 'A Caramel flavoured coffee with a sweet woody aroma mixed with a smooth cream flavour , enjoy it all day long.', 450.00, 'CaramelIntensity6.png', 'Na', 'Na', 400, 10, 1),
(8, 'Chocolate Intensity 6', 'A decadent combination of coffee and chocolate makes for a delicious coffee. ', 450.00, 'ChocolateIntensity6.png', 'Na', 'Na', 400, 10, 1),
(9, 'Cold Brew Starter Kit', 'Summer is here and our Cold Brew starter kit has been carefully curated to maximise the experience of brewing your own cold brew in the comfort of your preferred space. The starter kit includes :\r\n\r\nOne Tumbler : 350 ML\r\n\r\nTwo boxes of cold brew coffee bags of your choice\r\n\r\nOriginal Value : INR 1,250/-\r\n\r\nOffer price : INR 1,000/-', 1000.00, 'ColdBrewStarterKit.png', 'Na', 'Na', 350, 10, 2),
(10, 'Dasha Intensity 8', 'This French roast is sweet with nutty overtones an balanced acidity and is highly recommended for espresso lovers.', 400.00, 'DashaIntensity8.png', 'Karnataka', 'French', 350, 10, 1),
(11, 'Decaf Intensity 8', 'A smooth coffee with a medium body and rich flavour and without the caffeine', 400.00, 'DECAFIntensity8.png', 'Na', 'Na', 350, 10, 1),
(12, 'Fateh Intensity 13', 'Tasting notes : An extremely bold coffee with spicy notes from a dark roasted coffee bean. A blend of Indian finest Arabica and Robusta coffee beans that have been split roasted to highlight the qualities of both coffee beans. \r\n\r\nIt is a must have for those who enjoy a bold and strong cup of coffee!', 500.00, 'FatehIntensity13.png', 'India', 'Italian', 350, 10, 1),
(13, 'French press Single Vienna', '', 500.00, 'French_press_Single-Vienna.png', 'Na', 'Na', 350, 10, 2),
(14, 'French press Single Colombia ', '', 500.00, 'FrenchPressSinglesColombia.png', 'Na', 'Na', 350, 10, 2),
(15, 'French Press Singles Ethiopia ', '', 500.00, 'FrenchPressSinglesEthiopia.png', 'Na', 'Na', 350, 10, 2),
(16, 'French Press Singles Mysore Nugget', '', 500.00, 'FrenchPressSinglesMysoreNugget.png', 'Na', 'Na', 350, 10, 2),
(17, 'Hazelnut Intensity 6', 'The aroma of Hazelnut and the taste of coffee with a medium body and nutty flavours creates an exquisite experience.', 500.00, 'HazelnutIntensity6.png', 'Na', 'Na', 350, 10, 1),
(18, 'Iced Coffee Intensity 9', 'An exciting new blend of 100% Arabica coffee , ideal for an iced coffee , with spicy notes from the dark roast coffee and sweet aroma from the medium roast coffee. Visit our instagram page @freshbrewco and check out the many coffee recipes you can prepare with the capsules.', 500.00, 'IcedCoffeeIntensity9.png', 'Chikmangalur, Karnatka', 'Vienna', 350, 10, 1),
(19, 'Irish Cream Intensity 6', 'Enjoy the richness of the creamy and nutty flavours of this Irish cream coffee.', 500.00, 'IrishCreamIntensity6.png', 'NA', 'Na', 350, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'hh44', 'sheoranrohit908@gmail.com', '$2y$10$iWIwKUdFnlLzcpzKN/Y6d.Yp1DL2/NXzPC6KM2BIpHBvSEJ8czMOy'),
(2, 'hh443', '5o2ws2x4zs@rfcdrive.com', '$2y$10$SLnSY0hB6La9RwkjXPrTLukMCJXy63gRr4p48DSkrDDweNJOwyKBW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
