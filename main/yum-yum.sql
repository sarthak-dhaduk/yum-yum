-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 04:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yum-yum`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_item`
--

CREATE TABLE `add_item` (
  `item_name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_item`
--

INSERT INTO `add_item` (`item_name`, `category`, `description`, `price`, `photo`) VALUES
('Chinese gravy Manchurian', 'chinese', 'firstly, in a large bowl take 1 carrot, 5 tbsp cabbage, 5 tbsp spring onion, ½ onion and ½ tsp ginger garlic paste. also add 1 tsp chilli sauce, ½ tsp salt. mix well making sure everything is combined well.', '135', '1668748253_02a7cf3c27498a649d16.webp'),
('Italian Cone', 'italian', 'Italian recipes are rich in olive oils instead of other fats, they are almost always made from scratch so there are no artificial ingredients and no processed foods involved.', '130', '1668749893_abc3984ddb376b73438d.jpg'),
('Italian Noodles', 'italian', 'The word pasta is generally used to describe traditional Italian noodles, which differentiates it from other types of noodles around the world', '190', '1668749412_a14a41db820dfeae8972.jpg'),
('Italian Pasta', 'italian', '\r\nThe word pasta is generally used to describe traditional Italian noodles, which differentiates it from other types of noodles around the world. ', '180', '1668749506_79d9547a3c8f5c666469.jpg'),
('Italian Pizza', 'italian', 'Humans are drawn to foods that are fatty and sweet and rich and complex. Pizza has all of these components.', '290', '1668749602_983ede9e02fd939f2fa2.jpg'),
('Italian Salad', 'italian', 'Image result for italian salad some lines\r\nIt\'s made with crisp lettuce, ripe tomatoes, red onion, sliced black olives, crunchy croutons, Parmesan cheese and zesty pepperoncinis', '100', '1668749698_93d448f4a63f9765221c.jpg'),
('Mexican Bhel', 'mexican', 'Mexican food is popular because it\'s full of flavor. The Mexican dishes include healthy and fresh ingredients like avocados, beans, chiles, etc.', '125', '1668750189_d682d381364a693c4459.webp'),
('Mexican Frankie', 'mexican', 'Frankies are India\'s flavorful street food, also known as the Mumbai Burrito, Bombay Burrito, or roti wrap.', '300', '1668750727_ac12396a9f30341dd38d.webp'),
('Mexican Nachos', 'mexican', 'Nachos are a Mexican food consisting of fried tortilla chips or totopos covered with melted cheese or cheese sauce, as well as a variety of other toppings, often including meats.', '170', '1668750420_8fa0032b1d991880ff49.webp'),
('Mexican Pasta', 'mexican', 'Mexican food is popular because it\'s full of flavor. The Mexican dishes include healthy and fresh ingredients like avocados, beans, chiles, tomatoes and other vegetables.', '200', '1668750607_10b1162b6bba65a7d8bb.jpg'),
('Mexican Pizza', 'mexican', 'The Mexican Pizza was created in the 1980s. It consists of two tortillas filled with beef and refried beans and topped with tomato sauce, cheese and diced tomatoes. ', '360', '1668750280_8e822e643b55e15170ba.jpg'),
('Paneer Handi ', 'punjabi', 'Handi Paneer is the special creamy and spicy recipe, here pieces of paneer and diced capsicum is cooked in special type of gravy of yogurt and served in mitti ki handi.', '350', '1668751164_5f1fc7cecc0f0e82b5ca.webp'),
('Punjabi Chole Bhature', 'punjabi', 'It is a combination of chana masala (spicy white chickpeas) and bhatura/puri, a deep-fried bread made from maida.', '390', '1668751266_e4ea9a0bf8ca19167fa8.webp'),
('Punjabi Dal', 'punjabi', 'Dal Fry is a popular Indian lentil dish made with toor dal (yellow split pigeon peas), onion, tomatoes, ginger, garlic, herbs, and spices.', '125', '1668750853_e326230c4c137698536a.webp'),
('Punjabi Naan', 'punjabi', 'Naan is a flatbread from Punjab traditionally baked on the inner wall of a clay tandoor oven.', '80', '1668751050_d73cb638d9fbf5e48338.webp'),
('Punjabi Rice', 'punjabi', 'What is Punjabi wadi? Punjabi wadi are actually sun-dried dumplings made with lentils and Indian spices.', '200', '1668750960_f833412a75a81edca40f.webp'),
('Spicy Chinese Noodles', 'chinese', 'Asian noodles can be made with rice, yam, and mung bean in addition to wheat flour, and even that wheat is a different variety than the durum wheat used in pasta.', '130', '1668749156_24cf09a40969103e12fa.webp'),
('Vag Manchurian Dry', 'chinese', 'Manchurian is a class of Indian Chinese dishes made by roughly chopping and deep-frying ingredients such as chicken, cauliflower (gobi), prawns, fish, mutton, and paneer, and then sautéeing it in a sauce flavored with soy sauce.', '120', '1668747420_409e99a23592945b57d3.webp'),
('Veg chinese pasta', 'chinese', 'Chinese noodles are generally made from either wheat flour, rice flour, or mung bean starch, with wheat noodles being more commonly produced and consumed in northern China and rice noodles being more typical of southern China.', '145', '1668749251_ddb0aa6491f5330a85c9.webp'),
('Veg Chinese Rice', 'chinese', 'This most popular dish ordered from the Indian restraint.', '155', '1668748937_8d6d33d4054130dfedb6.webp');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `one_item_price` varchar(250) NOT NULL,
  `catagory` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` varchar(250) NOT NULL,
  `one_item_price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`fullname`, `email`, `item_name`, `catagory`, `quantity`, `price`, `one_item_price`) VALUES
('harshil', 'hadiyalharshil5@gmail.com', 'Italian Noodles', 'italian', '2', '380', '190'),
('harshil', 'hadiyalharshil5@gmail.com', 'Italian Salad', 'italian', '1', '100', '100'),
('Sarthak', 'sdhaduk666@rku.ac.in', 'Chinese gravy Manchurian', 'chinese', '1', '135', '135'),
('Sarthak', 'sdhaduk666@rku.ac.in', 'Mexican Pizza', 'mexican', '1', '360', '360');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profilepic` varchar(250) NOT NULL DEFAULT 'default_pic.png',
  `unique_id` varchar(250) NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fullname`, `email`, `password`, `profilepic`, `unique_id`, `user`) VALUES
('Sarthak', 'sdhaduk666@rku.ac.in', '123456@Sa', '1668961496_28e11781d70cd6575cb7.jpg', '6d89168173a31e63d4ac7cc107ec2c65', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`fullname`, `email`, `description`, `item_name`, `rating`) VALUES
('Sarthak', 'sdhaduk666@rku.ac.in', 'I really enjoy your food.', 'Mexican Frankie', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_item`
--
ALTER TABLE `add_item`
  ADD UNIQUE KEY `item_name` (`item_name`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
