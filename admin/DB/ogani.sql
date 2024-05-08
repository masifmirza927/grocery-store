-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 08:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogani`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`) VALUES
(1, 'Fruits', '1713418387cat-1.jpg'),
(2, 'Vegetable', '1713418408cat-3.jpg'),
(3, 'Meat', '1713418422cat-5.jpg'),
(4, 'Juices', '1713418436cat-4.jpg'),
(5, 'Dry Fruits', '1713506243cat-2.jpg'),
(6, 'Fast Food', '1713766675Fast Food.jpg'),
(7, 'Test', '1713850832f6.png'),
(8, 'Test2', '1713850873facebook.png'),
(9, 'Test3', '1713850936f6.png'),
(10, 'TEST', ''),
(11, 'juices', ''),
(12, 'TEST', ''),
(13, 'khach', '1713852023Mr-Jahangir-Khan-Tareen.jpg'),
(14, 'TEST', '1713852064pngwing.com (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status` enum('pending','processing','delivered','returned','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `status`, `created_at`) VALUES
(1, 1, 300, 'pending', '2024-04-15 05:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `unit_price`, `quantity`, `total_price`) VALUES
(1, 1, 1, 10, 10, 100),
(2, 1, 2, 20, 10, 200);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `unit_price` int(200) NOT NULL,
  `category_id` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('availble','unavailble') NOT NULL DEFAULT 'availble',
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `unit_price`, `category_id`, `quantity`, `image`, `status`, `description`, `created_at`) VALUES
(1, 'Apple', 100, 1, 300, '1713759913product-8.jpg', 'availble', 'Apple fruit offers a multitude of benefits, making it a nutritious and versatile choice. Rich in essential nutrients like vitamin C, potassium, and fiber, apples support immune function, heart health, and digestive regularity.', '2024-04-22 04:25:13'),
(2, 'Spinach', 50, 2, 100, '1713760100product-details-3.jpg', 'availble', 'Spinach is a nutrient powerhouse that offers numerous health benefits. Packed with vitamins, minerals, and antioxidants like vitamin A, vitamin C, vitamin K, iron, and folate, spinach supports overall well-being. Its high fiber content aids digestion and promotes gut health, while its low-calorie nature makes it a great choice for weight management. ', '2024-04-22 04:28:20'),
(3, 'Mango', 70, 1, 150, '1713760178product-6.jpg', 'availble', 'Mangoes offer a multitude of benefits, from their rich vitamin content, including vitamins A, C, and E, to their high fiber and antioxidant levels that support digestion, immunity, and skin health. They are also a good source of folate and potassium, contributing to heart health and overall well-being. ', '2024-04-22 04:29:38'),
(4, 'Capsicum', 70, 2, 120, '1713760293product-details-2.jpg', 'availble', 'Capsicum, commonly known as bell peppers, offers a multitude of health benefits. Packed with essential nutrients like vitamin C, vitamin A, vitamin E, and a variety of antioxidants, including carotenoids and flavonoids, capsicum supports immune function, promotes healthy skin and vision, and may reduce the risk of chronic diseases.', '2024-04-22 04:31:33'),
(5, 'Orange Juice', 120, 4, 300, '1713760373product-11.jpg', 'availble', 'Orange juice offers a plethora of benefits, making it a popular choice for health-conscious individuals. Packed with vitamin C, it strengthens the immune system, fights inflammation, and promotes healthy skin. The antioxidants in orange juice protect against cell damage, reducing the risk of chronic diseases.', '2024-04-22 04:32:53'),
(6, 'Banana', 30, 1, 240, '1713760666product-2.jpg', 'availble', 'Bananas offer a plethora of benefits, making them a fantastic addition to any diet. Packed with essential nutrients like potassium, vitamin C, and vitamin B6, they promote heart health, aid in digestion, and boost immunity. Their natural sugars provide a quick energy boost, making them an excellent pre- or post-workout snack. ', '2024-04-22 04:37:46'),
(7, 'Watermelon', 50, 1, 100, '1713760744product-7.jpg', 'availble', 'Watermelon offers a refreshing and nutritious addition to your diet, boasting several benefits. First, its high water content keeps you hydrated, especially during hot weather or after exercise. Rich in vitamins A and C, it supports healthy skin and boosts your immune system. Additionally, watermelon contains antioxidants like lycopene, which may help protect against certain diseases. ', '2024-04-22 04:39:04'),
(8, 'Guava ', 30, 1, 60, '1713760805product-3.jpg', 'availble', 'Guava offers a multitude of benefits, ranging from its rich nutritional profile to its versatility in culinary applications and its potential health-promoting properties. Packed with vitamins A and C, potassium, fiber, and antioxidants, guava supports immune function, digestion, and overall well-being. Its low glycemic index makes it a great choice for managing blood sugar levels, while its high fiber content aids in digestion and promotes a healthy gut', '2024-04-22 04:40:05'),
(9, 'Mix Fruit Juice', 90, 4, 200, '1713760964pd-3.jpg', 'availble', 'Mix fruit juice offers a delightful combination of health benefits and refreshing taste. Packed with essential vitamins, minerals, and antioxidants from various fruits like oranges, apples, berries, and bananas, it boosts immunity, promotes digestion, and supports overall well-being. The diverse blend of fruits provides a spectrum of nutrients, including vitamin C for skin health, potassium for heart function, and fiber for digestive regularity. ', '2024-04-22 04:42:44'),
(10, 'Dates', 200, 5, 300, '1713761072product-9.jpg', 'availble', 'Dates are incredibly nutritious fruits packed with various health benefits. They are an excellent source of energy due to their high natural sugar content, making them a perfect snack for an instant boost. Dates are rich in fiber, aiding digestion and promoting a healthy gut. They are also loaded with essential vitamins and minerals like potassium, magnesium, and vitamin B6, which support heart health, regulate blood pressure, and boost overall immunity. ', '2024-04-22 04:44:32'),
(11, 'Mix Dry Fruits', 400, 5, 250, '1713761157pd-1.jpg', 'availble', 'Mix dry fruits offer a plethora of benefits, making them a nutritious addition to your diet. Packed with essential vitamins, minerals, and antioxidants, they boost immunity, support heart health by lowering cholesterol levels, aid in digestion due to their fiber content, and promote healthy skin and hair. Additionally, their natural sugars provide a sustained energy boost, making them an ideal snack for active lifestyles. ', '2024-04-22 04:45:57'),
(12, 'Almonds', 700, 5, 1200, '1713764188product-2.jpg', 'availble', 'Almonds offer a plethora of health benefits, making them a nutritious addition to any diet. Packed with essential nutrients like vitamin E, magnesium, and healthy fats, almonds support heart health by lowering LDL cholesterol levels and reducing the risk of cardiovascular diseases. They also aid in weight management due to their high fiber and protein content, promoting feelings of fullness and curbing overeating. ', '2024-04-22 05:36:28'),
(13, 'Cashews ', 900, 5, 1000, '1713764426product-1.jpg', 'availble', 'Cashews offer a plethora of benefits, making them a delightful addition to your diet. Packed with essential nutrients like vitamins E, K, and B6, as well as minerals like copper, phosphorus, zinc, magnesium, iron, and selenium, they support overall health. Their healthy fats contribute to heart health, while their antioxidants combat oxidative stress.', '2024-04-22 05:40:26'),
(14, 'Nuts', 400, 5, 1000, '1713764522product-3.jpg', 'availble', 'Nuts are a nutritional powerhouse, offering a multitude of benefits for overall health. Packed with healthy fats, protein, fiber, vitamins, and minerals, nuts contribute to heart health by reducing bad cholesterol levels and lowering the risk of cardiovascular diseases. They also support weight management due to their satiating properties, helping to control hunger and promote a feeling of fullness.', '2024-04-22 05:42:02'),
(15, 'Onions', 60, 2, 150, '1713764626pr-6.jpg', 'availble', 'Onions offer a multitude of benefits that make them a valuable addition to any diet. Packed with antioxidants like quercetin and sulfur-containing compounds that support immune function and reduce inflammation, onions contribute to overall health and well-being. They also contain prebiotic fibers that promote a healthy gut microbiome, aiding digestion and nutrient absorption.', '2024-04-22 05:43:46'),
(16, 'Tomato', 30, 2, 100, '1713764758product-4.jpg', 'availble', 'Tomatoes are not just a vibrant addition to meals; they also pack a punch of health benefits. Rich in vitamins C, K, and A, they support immune function, bone health, and vision. Their high antioxidant content, including lycopene, helps combat free radicals, potentially reducing the risk of chronic diseases like heart disease and certain cancers. Tomatoes are low in calories and high in fiber, aiding digestion and promoting satiety. ', '2024-04-22 05:45:58'),
(17, 'Apple Juice', 80, 1, 100, '1713766810juice.jpg', 'availble', 'Apple juice offers a range of benefits that make it a popular choice among health-conscious individuals. Packed with essential nutrients like vitamin C, potassium, and antioxidants, apple juice supports immune function, aids in hydration, and promotes cardiovascular health by helping to lower cholesterol levels.', '2024-04-22 06:20:10'),
(18, 'Amir Bhatti', 34, 3, 3223, '1713852327pngwing.com (7).png', 'availble', 'asdasd', '2024-04-23 06:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `role` enum('admin','employee') NOT NULL DEFAULT 'employee',
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address`, `description`, `role`, `image`, `created_at`) VALUES
(1, 'Muhammad Sultan', 'sultan@gmail.com', '123', '0300-1234567', 'Lodhran', 'Hi, my name is Muhammad Sultan, and I\'m a web developer passionate about creating engaging and user-friendly digital experiences. With 2 of experience in web development, I specialize in both front-end and back-end technologies to build functional and visually appealing websites and web applications.', 'admin', 'image', '2024-04-19 04:23:50'),
(2, 'Captain Adeel', 'adeel@gmail.com', '786', '0306-0987642', 'Multan', 'Hi ! I am Muhammad Adeel and I am professional Graphic Designer with 3 years of experince...', 'employee', 'image', '2024-04-19 04:23:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
