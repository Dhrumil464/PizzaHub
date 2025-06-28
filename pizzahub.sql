-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2025 at 07:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzahub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` bigint(20) UNSIGNED NOT NULL,
  `catname` varchar(50) NOT NULL,
  `catimage` varchar(100) NOT NULL,
  `catdesc` varchar(200) DEFAULT NULL,
  `cattype` tinyint(4) NOT NULL,
  `iscombo` tinyint(4) DEFAULT NULL,
  `comboprice` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `catcreatedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `catupdatedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`, `catimage`, `catdesc`, `cattype`, `iscombo`, `comboprice`, `discount`, `catcreatedate`, `catupdatedate`) VALUES
(1, 'VEG PIZZA', '1745649522.png', 'Delicious vegetarian pizzas loaded with fresh veggies and savory sauces.', 1, 0, NULL, NULL, '2025-04-23 09:02:29', '2025-04-23 09:02:29'),
(2, 'NON-VEG PIZZA', '1745649543.png', 'Flavorful pizzas topped with a variety of meats and mouthwatering seasonings.', 2, 0, NULL, NULL, '2025-04-23 09:03:27', '2025-04-23 09:03:27'),
(3, 'PIZZA MENIA', '1745649555.png', 'Budget-friendly and fun-sized pizzas with bold and exciting flavors.', 1, 0, NULL, NULL, '2025-04-23 09:04:57', '2025-04-23 09:04:57'),
(4, 'CHOICE OF CRUST', '1745649564.jpg', 'Fresh Pan Pizza Tastiest Pan Pizza. ... Domino\'s freshly made pan-baked pizza; deliciously soft ,buttery,extra cheesy and delightfully crunchy.', 1, 0, NULL, NULL, '2025-04-23 09:14:20', '2025-04-23 09:14:20'),
(5, 'BURGER PIZZA', '1745649581.jpg', 'Domino’s Pizza Introducing all new Burger Pizza with the tag line looks like a burger, tastes like a pizza. Burger Pizza is burger sized but comes in a small pizza box.', 1, 0, NULL, NULL, '2025-04-23 09:16:57', '2025-04-23 09:16:57'),
(6, 'COMBO 1', '1745649594.jpg', '2-Pizza|1-Burger Pizza', 1, 1, 999.00, 10.00, '2025-04-23 09:18:12', '2025-05-14 14:20:38'),
(7, 'COMBO 2', '1745649984.jpg', NULL, 1, 1, 1299.00, 15.00, '2025-04-23 09:18:47', '2025-04-23 09:18:47'),
(9, 'BEVERAGES', '1745649613.jpg', 'Complement your pizza with wide range of beverages available at Domino\'s Pizza India', 1, 0, NULL, NULL, '2025-04-23 09:34:34', '2025-04-23 09:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contactId` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `orderid` varchar(10) NOT NULL DEFAULT '0',
  `email` varchar(30) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `contactdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contactId`, `userid`, `orderid`, `email`, `phoneno`, `message`, `contactdate`) VALUES
(1, 3, 'O2133', 'jenny@gmail.com', 99123, 'where is my order?', '2025-05-01 12:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact_replies`
--

CREATE TABLE `contact_replies` (
  `replyId` bigint(20) UNSIGNED NOT NULL,
  `contactId` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(200) NOT NULL,
  `contactdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_replies`
--

INSERT INTO `contact_replies` (`replyId`, `contactId`, `userid`, `message`, `contactdate`) VALUES
(1, 1, 3, 'Your order is on way...', '2025-05-01 12:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_details`
--

CREATE TABLE `delivery_boy_details` (
  `dbid` bigint(20) UNSIGNED NOT NULL,
  `deliveryboyname` varchar(30) NOT NULL,
  `deliveryboyphoneno` varchar(10) NOT NULL,
  `deliveryboyemail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy_details`
--

INSERT INTO `delivery_boy_details` (`dbid`, `deliveryboyname`, `deliveryboyphoneno`, `deliveryboyemail`) VALUES
(101, 'Ravi Mehta', '13345', 'ravi@mhub.com'),
(102, 'Amit Patel', '23456', 'amit@phub.in'),
(103, 'Suresh Yadav', '34567', 'suresh@dh.com'),
(104, 'Karan Shah', '45678', 'karan@ds.in'),
(105, 'Manoj Desai', '56789', 'manoj@pza.io');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `deliveryid` bigint(20) UNSIGNED NOT NULL,
  `orderid` varchar(10) NOT NULL,
  `dbid` bigint(20) UNSIGNED NOT NULL,
  `deliverytime` varchar(5) DEFAULT NULL,
  `trackid` varchar(10) NOT NULL,
  `deliverydate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`deliveryid`, `orderid`, `dbid`, `deliverytime`, `trackid`, `deliverydate`) VALUES
(1, 'O9331', 101, '20', 'TRACK2410', '2025-04-25 14:06:49'),
(2, 'O6074', 102, '10', 'TRACK3034', '2025-04-30 12:23:10'),
(3, 'O2133', 103, '15', 'TRACK2782', '2025-05-01 12:25:49'),
(4, 'O6224', 102, '20', 'TRACK4967', '2025-05-10 14:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_12_091436_create_users_admins_table', 1),
(5, '2025_03_09_045319_create_categories_table', 1),
(6, '2025_03_09_045453_create_pizza_items_table', 1),
(7, '2025_04_03_173133_create_pizza_carts_table', 1),
(8, '2025_04_09_091446_create_orders_table', 1),
(9, '2025_04_09_092915_create_order_items_table', 1),
(10, '2025_04_12_125503_create_delivery_boy_details_table', 1),
(11, '2025_04_12_125505_create_delivery_details_table', 1),
(12, '2025_04_19_053435_create_contacts_table', 1),
(13, '2025_04_19_074727_create_contact_replies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` varchar(10) NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `totalfinalprice` decimal(10,2) NOT NULL,
  `discountedtotalprice` decimal(10,2) NOT NULL,
  `paymentmethod` tinyint(4) NOT NULL,
  `orderstatus` tinyint(4) NOT NULL DEFAULT 1,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `fullname`, `email`, `address`, `zip`, `phoneno`, `totalfinalprice`, `discountedtotalprice`, `paymentmethod`, `orderstatus`, `orderdate`) VALUES
('O2133', 3, 'Jenny Patel', 'jenny@gmail.com', '12, AB Street , Navsari', '396 445', '99123', 741.00, 710.27, 1, 5, '2025-05-01 12:18:51'),
('O6074', 2, 'Dhrumil Mandaviya', 'dhrumilmandaviya464@gmail.com', 'Navsari', '396 445', '95123', 196.00, 196.00, 1, 5, '2025-04-30 06:32:26'),
('O6224', 3, 'Jenny Patel', 'jenny@gmail.com', '12, AB Street , Navsari', '396 445', '99123', 1998.00, 1798.20, 1, 5, '2025-05-10 14:06:12'),
('O9331', 2, 'Dhrumil Mandaviya', 'dhrumilmandaviya464@gmail.com', 'Navsari', '396 445', '95123', 256.00, 256.00, 1, 5, '2025-04-25 07:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderitemid` bigint(20) UNSIGNED NOT NULL,
  `orderid` varchar(10) NOT NULL,
  `pizzaid` bigint(20) UNSIGNED NOT NULL,
  `catid` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderitemid`, `orderid`, `pizzaid`, `catid`, `quantity`, `discount`) VALUES
(11, 'O9331', 1, 0, 2, 0.00),
(12, 'O9331', 4, 0, 2, 0.00),
(13, 'O9331', 6, 0, 3, 0.00),
(14, 'O6074', 4, 0, 4, 0.00),
(15, 'O2133', 7, 0, 1, 5.00),
(16, 'O2133', 9, 0, 1, 0.00),
(17, 'O2133', 14, 0, 1, 10.00),
(18, 'O2133', 1, 0, 3, 2.00),
(19, 'O2133', 4, 0, 3, 2.00),
(20, 'O6224', 32, 6, 2, 10.00),
(21, 'O6224', 33, 6, 2, 10.00),
(22, 'O6224', 34, 6, 2, 10.00),
(23, 'O6224', 35, 6, 2, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizza_carts`
--

CREATE TABLE `pizza_carts` (
  `cartitemid` bigint(20) UNSIGNED NOT NULL,
  `pizzaid` bigint(20) UNSIGNED DEFAULT NULL,
  `catid` bigint(20) UNSIGNED DEFAULT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `itemadddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizza_carts`
--

INSERT INTO `pizza_carts` (`cartitemid`, `pizzaid`, `catid`, `userid`, `quantity`, `itemadddate`) VALUES
(76, 1, NULL, 2, 2, '2025-05-14 06:33:30'),
(84, 7, NULL, 3, 1, '2025-05-14 14:26:00'),
(85, 9, NULL, 3, 1, '2025-05-14 14:27:12'),
(86, 14, NULL, 3, 1, '2025-05-14 14:27:17'),
(87, 1, NULL, 3, 3, '2025-05-14 14:27:22'),
(88, 4, NULL, 3, 3, '2025-05-14 14:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_items`
--

CREATE TABLE `pizza_items` (
  `pizzaid` bigint(20) UNSIGNED NOT NULL,
  `pizzaname` varchar(50) NOT NULL,
  `pizzaprice` decimal(8,2) NOT NULL DEFAULT 99.00,
  `pizzaimage` varchar(100) NOT NULL,
  `pizzadesc` varchar(200) DEFAULT NULL,
  `catid` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `pizzacreatedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pizzaupdatedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizza_items`
--

INSERT INTO `pizza_items` (`pizzaid`, `pizzaname`, `pizzaprice`, `pizzaimage`, `pizzadesc`, `catid`, `discount`, `pizzacreatedate`, `pizzaupdatedate`) VALUES
(1, 'PEPSI', 49.00, '1745650015.jpg', '300ml', 9, 2.00, '2025-04-23 09:38:35', '2025-04-23 09:38:35'),
(2, 'COCA-COLA', 49.00, '1745650030.jpg', '300ml', 9, 2.00, '2025-04-23 09:40:33', '2025-04-23 09:40:33'),
(3, 'MIRINDA', 49.00, '1745650037.jpg', '300ml', 9, 2.00, '2025-04-23 09:55:27', '2025-04-23 09:55:27'),
(4, 'SPRITE', 49.00, '1745650051.jpg', '300ml', 9, 2.00, '2025-04-23 09:56:14', '2025-05-14 12:14:01'),
(5, 'FENTA', 49.00, '1745650060.jpg', '300ml', 9, 2.00, '2025-04-23 09:56:42', '2025-04-23 09:56:42'),
(6, 'BISLERY BOTTLE', 20.00, '1745650080.jpg', '1lit', 9, 0.00, '2025-04-23 09:57:52', '2025-04-23 09:57:52'),
(7, 'Margherita', 99.00, '1747222987.png', 'A hugely popular margherita, with a deliciously tangy single cheese topping', 1, 5.00, '2025-05-14 11:43:07', '2025-05-14 12:11:37'),
(8, 'Double Cheese Margherita', 199.00, '1747223057.png', 'The ever-popular Margherita - loaded with extra cheese... oodies of it', 1, 5.00, '2025-05-14 11:44:17', '2025-05-14 12:11:56'),
(9, 'Farm House', 149.00, '1747223118.png', 'A pizza that goes ballistic on veggies! Check out this mouth watering overload of crunchy, crisp capsicum, succulent mushrooms and fresh tomatoes', 1, 0.00, '2025-05-14 11:45:18', '2025-05-14 11:45:18'),
(10, 'Peppy Paneer', 249.00, '1747223245.png', 'Chunky paneer with crisp capsicum and spicy red pepper - quite a mouthful!', 1, 0.00, '2025-05-14 11:47:25', '2025-05-14 11:47:25'),
(11, 'Mexican Green Wave', 149.00, '1747223309.png', 'A pizza loaded with crunchy onions, crisp capsicum, juicy tomatoes and jalapeno with a liberal sprinkling of exotic Mexican herbs.', 1, 0.00, '2025-05-14 11:48:29', '2025-05-14 11:48:29'),
(12, 'Deluxe Veggie', 320.00, '1747223363.png', 'For a vegetarian looking for a BIG treat that goes easy on the spices, this one\'s got it all.. The onions, the capsicum, those delectable mushrooms - with paneer and golden corn to top it all.', 1, 0.00, '2025-05-14 11:49:23', '2025-05-14 11:49:23'),
(13, 'Veg Extravaganza', 299.00, '1747223517.png', 'A pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions, crisp capsicum, succulent mushrooms.', 1, 0.00, '2025-05-14 11:51:57', '2025-05-14 11:51:57'),
(14, 'Cheese N Corn', 199.00, '1747223582.png', 'Cheese & Golden Corn', 1, 10.00, '2025-05-14 11:53:02', '2025-05-14 12:12:08'),
(15, 'Peeper Barbecue', 299.00, '1747229480.png', 'Pepper Barbecue Chicken | Cheese', 2, 0.00, '2025-05-14 13:31:20', '2025-05-14 13:31:20'),
(16, 'Chicken Sausage', 299.00, '1747229596.png', 'Chicken Sausage I Cheese', 2, 0.00, '2025-05-14 13:33:16', '2025-05-14 13:33:16'),
(17, 'Chicken Goldan Delight', 349.00, '1747229661.png', 'Mmm! Barbeque chicken with a topping of golden corn loaded with extra cheese. Worth its weight in gold!', 2, 5.00, '2025-05-14 13:34:21', '2025-05-14 13:34:21'),
(18, 'Non-Veg Supreme', 349.00, '1747229778.png', 'Bite into supreme delight of Black Olives, Onions, Grilled Mushrooms, Pepper BBQ Chicken, Peri-Peri Chicken, Grilled Chicken Rashers', 2, 5.00, '2025-05-14 13:36:18', '2025-05-14 13:36:18'),
(19, 'Cheese Tomato', 129.00, '1747229861.png', 'Juicy tomato in a flavourful combination with cheese I tangy sauce', 3, 0.00, '2025-05-14 13:37:41', '2025-05-14 13:37:41'),
(20, 'Veg Loaded', 199.00, '1747229906.png', 'Tomato | Grilled Mushroom | Jalapeno | Golden Corn | Beans in a fresh pan crust', 3, 0.00, '2025-05-14 13:38:26', '2025-05-14 13:38:26'),
(21, 'Cheesy Butter', 199.00, '1747229964.png', 'Orange Cheddar Cheese | Mozzarella | Butter', 3, 0.00, '2025-05-14 13:39:24', '2025-05-14 13:39:24'),
(22, 'Cheese Capsicum', 199.00, '1747230076.png', 'Mozzarella Cheese | Capsicum', 3, 0.00, '2025-05-14 13:41:16', '2025-05-14 13:41:16'),
(23, 'Cheese Onion', 249.00, '1747230186.png', 'Mozzarela Cheese | Onion', 3, 0.00, '2025-05-14 13:43:06', '2025-05-14 13:43:06'),
(24, 'Cheese N Corn', 199.00, '1747230240.png', 'Golden Corn | Cheese', 3, 0.00, '2025-05-14 13:44:00', '2025-05-14 13:44:00'),
(25, 'Paneer Onnion', 249.00, '1747230316.png', 'Creamy Paneer | Onion | Cheese', 3, 0.00, '2025-05-14 13:45:16', '2025-05-14 13:45:16'),
(26, 'Cheese Brust', 249.00, '1747230427.jpg', 'Crust with oodles of yummy liquid cheese filled inside.', 4, 0.00, '2025-05-14 13:47:07', '2025-05-14 13:47:07'),
(27, 'Classic Hand Tosted', 249.00, '1747230589.jpg', 'Dominos traditional hand stretched crust, crisp on outside, soft & light inside.', 4, 0.00, '2025-05-14 13:49:49', '2025-05-14 13:49:49'),
(28, 'Wheat Thin Crust', 299.00, '1747230624.jpg', 'Presenting the light healthier and delicious light wheat thin crust from Dominos.', 4, 0.00, '2025-05-14 13:50:24', '2025-05-14 13:50:24'),
(29, 'Classic Thin Crust', 299.00, '1747230678.jpg', 'Tastiest Pan Pizza.Ever. Domino’s freshly made pan-baked pizza; deliciously soft ,buttery,extra cheesy and delightfully crunchy.', 4, 0.00, '2025-05-14 13:51:18', '2025-05-14 13:51:18'),
(30, 'Classic Veg Burger', 149.00, '1747230793.jpg', 'Bite into delight! Witness the epic combination of pizza and burger with our classic Burger Pizza, that looks good and tastes great!', 5, 5.00, '2025-05-14 13:53:13', '2025-05-14 13:53:13'),
(31, 'Premium Veg Burger', 199.00, '1747230844.jpg', 'The good just got better! Treat yourself to the premium taste of the Burger Pizza, that looks good and tastes great with paneer and red paprika.', 5, 5.00, '2025-05-14 13:54:04', '2025-05-14 13:54:04'),
(32, 'Margherita', 0.00, '1747230961.png', 'A hugely popular margherita, with a deliciously tangy single cheese topping', 6, 0.00, '2025-05-14 13:56:01', '2025-05-14 13:56:01'),
(33, 'Wheat Thin Crust', 0.00, '1747231075.jpg', 'Presenting the light healthier and delicious light wheat thin crust from Dominos.', 6, 0.00, '2025-05-14 13:57:55', '2025-05-14 13:57:55'),
(34, 'Classic Veg Burger', 0.00, '1747231108.jpg', 'Bite into delight! Witness the epic combination of pizza and burger with our classic Burger Pizza, that looks good and tastes great!', 6, 0.00, '2025-05-14 13:58:28', '2025-05-14 13:58:28'),
(35, 'PEPSI', 0.00, '1747231449.jpg', '300ml 2 Can', 6, 0.00, '2025-05-14 14:04:09', '2025-05-14 14:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6B4mwooCrb7oUpBn3wtnVq56MY4asChDaJ9TXHwP', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoicXozYUVIQlJtSVdIZXI2cFBiSjdkWHZWTW5yRmJ3YThWY1RtQkNFWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MTU6InRvdGFsRmluYWxQcmljZSI7ZDo3NDE7czoyMDoiZGlzY291bnRlZFRvdGFsUHJpY2UiO2Q6NzEwLjI3O3M6MTM6ImFkbWlubG9nZ2VkaW4iO2I6MTtzOjEzOiJhZG1pbnVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjExOiJhZG1pbnVzZXJJZCI7aToxO30=', 1747242017),
('hM0kQFcK5Q1dkleBBHMi6fIjSgAS1qB5PVOY14AD', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiV0V0S05HYlVvQzA3VlkwNEdOeTBxVThabkVPUTdsc2oyVVp1UGw1MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6InRvdGFsRmluYWxQcmljZSI7ZDo3NDE7czoyMDoiZGlzY291bnRlZFRvdGFsUHJpY2UiO2Q6NzEwLjI3O3M6MTM6InBheW1lbnRNZXRob2QiO3M6MToiMiI7czo3OiJvcmRlcklkIjtzOjU6Ik82MjI0Ijt9', 1747232967);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_admins`
--

CREATE TABLE `users_admins` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_admins`
--

INSERT INTO `users_admins` (`userid`, `username`, `firstname`, `lastname`, `email`, `phoneno`, `usertype`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'John', 'Martin', 'admin@admin.com', 9112345678, 1, '$2y$12$rHvus92EkLzV6aIXfS8f5e67vz9cpPdkWbUycSeSnbB4Gpf6XrTvG', '2025-04-23 03:21:41', '2025-04-23 03:21:41'),
(2, 'Dhrumil', 'Dhrumil', 'Mandaviya', 'dhrumilmandaviya464@gmail.com', 9512345678, 0, '$2y$12$p/XUFbuSXOR7Yp.9.yPIue6jo3I07Nb0WddDwMzTwFQdXO72w3HFC', '2025-04-26 01:20:54', '2025-04-26 08:17:02'),
(3, 'Jenny123', 'Jenny', 'Patel', 'jenny@gmail.com', 9912345678, 0, '$2y$12$qrtYKZIrat2apxxPeF5.tOLk02hO.SMMRvgGTSOw0Actt1N1GbYIW', '2025-05-14 06:30:28', '2025-05-14 06:30:28');
(4, 'example123', 'example', 'example', 'example@gmail.com', 9123456789, 0, '$2y$12$qrtYKZIrat2apxxPeF5.tOLk02hO.SMMRvgGTSOw0Actt1N1GbYIW', '2025-05-14 06:30:28', '2025-05-14 06:30:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactId`),
  ADD KEY `contacts_userid_foreign` (`userid`);

--
-- Indexes for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD PRIMARY KEY (`replyId`),
  ADD KEY `contact_replies_contactid_foreign` (`contactId`),
  ADD KEY `contact_replies_userid_foreign` (`userid`);

--
-- Indexes for table `delivery_boy_details`
--
ALTER TABLE `delivery_boy_details`
  ADD PRIMARY KEY (`dbid`),
  ADD UNIQUE KEY `delivery_boy_details_deliveryboyemail_unique` (`deliveryboyemail`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`deliveryid`),
  ADD UNIQUE KEY `delivery_details_trackid_unique` (`trackid`),
  ADD KEY `delivery_details_orderid_foreign` (`orderid`),
  ADD KEY `delivery_details_dbid_foreign` (`dbid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `orders_orderid_unique` (`orderid`),
  ADD KEY `orders_userid_foreign` (`userid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`orderitemid`),
  ADD KEY `order_items_orderid_foreign` (`orderid`),
  ADD KEY `order_items_pizzaid_foreign` (`pizzaid`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pizza_carts`
--
ALTER TABLE `pizza_carts`
  ADD PRIMARY KEY (`cartitemid`),
  ADD KEY `pizza_carts_userid_foreign` (`userid`),
  ADD KEY `pizza_carts_pizzaid_foreign` (`pizzaid`);

--
-- Indexes for table `pizza_items`
--
ALTER TABLE `pizza_items`
  ADD PRIMARY KEY (`pizzaid`),
  ADD KEY `pizza_items_catid_foreign` (`catid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_admins`
--
ALTER TABLE `users_admins`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `users_admins_phoneno_unique` (`phoneno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_replies`
--
ALTER TABLE `contact_replies`
  MODIFY `replyId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_boy_details`
--
ALTER TABLE `delivery_boy_details`
  MODIFY `dbid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `deliveryid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderitemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pizza_carts`
--
ALTER TABLE `pizza_carts`
  MODIFY `cartitemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `pizza_items`
--
ALTER TABLE `pizza_items`
  MODIFY `pizzaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_admins`
--
ALTER TABLE `users_admins`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users_admins` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD CONSTRAINT `contact_replies_contactid_foreign` FOREIGN KEY (`contactId`) REFERENCES `contacts` (`contactId`),
  ADD CONSTRAINT `contact_replies_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users_admins` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD CONSTRAINT `delivery_details_dbid_foreign` FOREIGN KEY (`dbid`) REFERENCES `delivery_boy_details` (`dbid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_details_orderid_foreign` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users_admins` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_orderid_foreign` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_pizzaid_foreign` FOREIGN KEY (`pizzaid`) REFERENCES `pizza_items` (`pizzaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pizza_carts`
--
ALTER TABLE `pizza_carts`
  ADD CONSTRAINT `pizza_carts_pizzaid_foreign` FOREIGN KEY (`pizzaid`) REFERENCES `pizza_items` (`pizzaid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pizza_carts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users_admins` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pizza_items`
--
ALTER TABLE `pizza_items`
  ADD CONSTRAINT `pizza_items_catid_foreign` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
