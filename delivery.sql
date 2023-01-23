-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 08:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'admin3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `quantity`) VALUES
(25, 3, 78, 1),
(30, 8, 62, 1),
(31, 8, 63, 1),
(35, 0, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `text1` varchar(80) NOT NULL,
  `text2` varchar(80) NOT NULL,
  `text3` varchar(80) NOT NULL,
  `text4` varchar(80) NOT NULL,
  `feedback` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `age`, `text1`, `text2`, `text3`, `text4`, `feedback`) VALUES
('Soham', '10-20', ' Cool', ' Friend', ' yes', ' likely ', 'Good'),
('Shrutik', '', ' nice', ' Online', ' No', ' Pretty likely', 'Excellent'),
('Jobin', '20-30', ' Seems good', ' From class presentation', ' Could be improved on a lot\r\n', ' Likely', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `oplace` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'no',
  `odate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `oplace`, `mobile`, `dstatus`, `odate`) VALUES
(1, 1, 78, 1, 'city of north', '1234567890', 'yes', '2020-12-05'),
(2, 1, 80, 1, 'city of north', '1234567890', 'yes', '2020-12-05'),
(3, 1, 79, 1, 'city of north', '1234567890', 'yes', '2020-12-05'),
(4, 3, 14, 3, 'Borivali east, LA', '9835612345', 'yes', '2020-12-06'),
(5, 3, 32, 2, 'Borivali east, LA', '9835612345', 'no', '2020-12-06'),
(6, 1, 63, 3, 'city of north', '1234567890', 'no', '2020-12-06'),
(7, 1, 52, 3, 'city of north', '1234567890', 'no', '2020-12-06'),
(8, 5, 63, 2, '32,Old road,New town,Grand city', '8889956915', 'yes', '2020-12-07'),
(9, 4, 77, 2, '41,grand blue, laming street, Old road,New town,Grand city', '8889956918', 'no', '2020-12-07'),
(10, 4, 55, 1, '41,grand blue, laming street, Old road,New town,Grand city', '8889956918', 'no', '2020-12-07'),
(11, 4, 76, 1, '41,grand blue, laming street, Old road,New town,Grand city', '8889956918', 'no', '2020-12-15'),
(12, 4, 63, 2, '41,grand blue, laming street, Old road,New town,Grand city', '8889956918', 'no', '2020-12-15'),
(13, 9, 95, 1, 'dadas', '1111111111', 'no', '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(4) NOT NULL,
  `pName` varchar(35) NOT NULL,
  `strMealThumb` varchar(65) NOT NULL,
  `idMeal` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pName`, `strMealThumb`, `idMeal`, `price`, `category`) VALUES
(1, 'Broccoli & Stilton soup', 'https://www.themealdb.com/images/media/meals/tvvxpv1511191952.jpg', 52842, 200, '6'),
(2, 'Clam chowder', 'https://www.themealdb.com/images/media/meals/rvtvuw1511190488.jpg', 52840, 200, '6'),
(3, 'Cream Cheese Tart', 'https://www.themealdb.com/images/media/meals/wurrux1468416624.jpg', 52779, 200, '6'),
(4, 'Creamy Tomato Soup', 'https://www.themealdb.com/images/media/meals/stpuws1511191310.jpg', 52841, 200, '6'),
(5, 'Baked salmon with fennel & tomatoes', 'https://www.themealdb.com/images/media/meals/1548772327.jpg', 52959, 250, '5'),
(6, 'Cajun spiced fish tacos', 'https://www.themealdb.com/images/media/meals/uvuyxu1503067369.jpg', 52819, 250, '5'),
(7, 'Escovitch Fish', 'https://www.themealdb.com/images/media/meals/1520084413.jpg', 52944, 250, '5'),
(8, 'Fish pie', 'https://www.themealdb.com/images/media/meals/ysxwuq1487323065.jpg', 52802, 250, '5'),
(9, 'Fish Stew with Rouille', 'https://www.themealdb.com/images/media/meals/vptqpw1511798500.jpg', 52918, 250, '5'),
(10, 'Garides Saganaki', 'https://www.themealdb.com/images/media/meals/wuvryu1468232995.jpg', 52764, 250, '5'),
(11, 'Honey Teriyaki Salmon', 'https://www.themealdb.com/images/media/meals/xxyupu1468262513.jpg', 52773, 250, '5'),
(12, 'Kedgeree', 'https://www.themealdb.com/images/media/meals/utxqpt1511639216.jpg', 52887, 250, '5'),
(13, 'Kung Po Prawns', 'https://www.themealdb.com/images/media/meals/1525873040.jpg', 52946, 250, '5'),
(14, 'Laksa King Prawn Noodles', 'https://www.themealdb.com/images/media/meals/rvypwy1503069308.jpg', 52821, 250, '5'),
(15, 'Mediterranean Pasta Salad', 'https://www.themealdb.com/images/media/meals/wvqpwt1468339226.jpg', 52777, 250, '5'),
(16, 'Recheado Masala Fish', 'https://www.themealdb.com/images/media/meals/uwxusv1487344500.jpg', 52809, 250, '5'),
(17, 'Salmon Avocado Salad', 'https://www.themealdb.com/images/media/meals/1549542994.jpg', 52960, 250, '5'),
(18, 'Salmon Prawn Risotto', 'https://www.themealdb.com/images/media/meals/xxrxux1503070723.jpg', 52823, 250, '5'),
(19, 'Saltfish and Ackee', 'https://www.themealdb.com/images/media/meals/vytypy1511883765.jpg', 52936, 250, '5'),
(20, 'Seafood fideuà', 'https://www.themealdb.com/images/media/meals/wqqvyq1511179730.jpg', 52836, 250, '5'),
(21, 'Shrimp Chow Fun', 'https://www.themealdb.com/images/media/meals/1529445434.jpg', 52953, 250, '5'),
(22, 'Sledz w Oleju (Polish Herrings)', 'https://www.themealdb.com/images/media/meals/7ttta31593350374.jpg', 53023, 250, '5'),
(23, 'Three Fish Pie', 'https://www.themealdb.com/images/media/meals/spswqs1511558697.jpg', 52882, 250, '5'),
(24, 'Tuna and Egg Briks', 'https://www.themealdb.com/images/media/meals/2dsltq1560461468.jpg', 52975, 250, '5'),
(25, 'Tuna Nicoise', 'https://www.themealdb.com/images/media/meals/yypwwq1511304979.jpg', 52852, 250, '5'),
(26, 'Apple & Blackberry Crumble', 'https://www.themealdb.com/images/media/meals/xvsurr1511719182.jpg', 52893, 150, '2'),
(27, 'Apple Frangipan Tart', 'https://www.themealdb.com/images/media/meals/wxywrq1468235067.jpg', 52768, 100, '2'),
(28, 'Bakewell tart', 'https://www.themealdb.com/images/media/meals/wyrqqq1468233628.jpg', 52767, 125, '2'),
(29, 'Banana Pancakes', 'https://www.themealdb.com/images/media/meals/sywswr1511383814.jpg', 52855, 150, '2'),
(30, 'Battenberg Cake', 'https://www.themealdb.com/images/media/meals/ywwrsp1511720277.jpg', 52894, 200, '2'),
(31, 'BeaverTails', 'https://www.themealdb.com/images/media/meals/ryppsv1511815505.jpg', 52928, 90, '2'),
(32, 'Blackberry Fool', 'https://www.themealdb.com/images/media/meals/rpvptu1511641092.jpg', 52891, 200, '2'),
(33, 'Bread and Butter Pudding', 'https://www.themealdb.com/images/media/meals/xqwwpy1483908697.jpg', 52792, 150, '2'),
(34, 'Budino Di Ricotta', 'https://www.themealdb.com/images/media/meals/1549542877.jpg', 52961, 250, '2'),
(35, 'Canadian Butter Tarts', 'https://www.themealdb.com/images/media/meals/wpputp1511812960.jpg', 52923, 325, '2'),
(36, 'Carrot Cake', 'https://www.themealdb.com/images/media/meals/vrspxv1511722107.jpg', 52897, 200, '2'),
(37, 'Cashew Ghoriba Biscuits', 'https://www.themealdb.com/images/media/meals/t3r3ka1560461972.jpg', 52976, 150, '2'),
(38, 'Chelsea Buns', 'https://www.themealdb.com/images/media/meals/vqpwrv1511723001.jpg', 52898, 100, '2'),
(39, 'Bean & Sausage Hotpot', 'https://www.themealdb.com/images/media/meals/vxuyrx1511302687.jpg', 52848, 100, '3'),
(40, 'Callaloo Jamaican Style', 'https://www.themealdb.com/images/media/meals/ussyxw1515364536.jpg', 52939, 145, '3'),
(41, 'Chakchouka', 'https://www.themealdb.com/images/media/meals/gpz67p1560458984.jpg', 52969, 135, '3'),
(42, 'Duck Confit', 'https://www.themealdb.com/images/media/meals/wvpvsu1511786158.jpg', 52907, 110, '3'),
(43, 'French Lentils With Garlic and Thym', 'https://www.themealdb.com/images/media/meals/vwwspt1487394060.jpg', 52815, 125, '3'),
(44, 'French Omelette', 'https://www.themealdb.com/images/media/meals/yvpuuy1511797244.jpg', 52915, 130, '3'),
(45, 'Osso Buco alla Milanese', 'https://www.themealdb.com/images/media/meals/wwuqvt1487345467.jpg', 52810, 150, '3'),
(46, 'Pizza Express Margherita', 'https://www.themealdb.com/images/media/meals/x0lk931587671540.jpg', 53014, 145, '3'),
(47, 'Poutine', 'https://www.themealdb.com/images/media/meals/uuyrrx1487327597.jpg', 52804, 80, '3'),
(48, 'Three-cheese souffles', 'https://www.themealdb.com/images/media/meals/sxwquu1511793428.jpg', 52912, 70, '3'),
(49, 'Turkey Meatloaf', 'https://www.themealdb.com/images/media/meals/ypuxtw1511297463.jpg', 52845, 115, '3'),
(50, 'Chilli prawn linguine', 'https://www.themealdb.com/images/media/meals/usywpp1511189717.jpg', 52839, 150, '4'),
(51, 'Fettucine alfredo', 'https://www.themealdb.com/images/media/meals/uquqtu1511178042.jpg', 52835, 300, '4'),
(52, 'Grilled Mac and Cheese Sandwich', 'https://www.themealdb.com/images/media/meals/xutquv1505330523.jpg', 52829, 250, '4'),
(53, 'Lasagna Sandwiches', 'https://www.themealdb.com/images/media/meals/xr0n4r1576788363.jpg', 52987, 350, '4'),
(54, 'Lasagne', 'https://www.themealdb.com/images/media/meals/wtsvxx1511296896.jpg', 52844, 175, '4'),
(55, 'Pilchard puttanesca', 'https://www.themealdb.com/images/media/meals/vvtvtr1511180578.jpg', 52837, 180, '4'),
(56, 'Spaghetti alla Carbonara', 'https://www.themealdb.com/images/media/meals/llcbn01574260722.jpg', 52982, 140, '4'),
(57, 'Venetian Duck Ragu', 'https://www.themealdb.com/images/media/meals/qvrwpt1511181864.jpg', 52838, 380, '4'),
(58, 'Roast fennel and aubergine paella', 'https://www.themealdb.com/images/media/meals/1520081754.jpg', 52942, 230, '7'),
(59, 'Vegan Chocolate Cake', 'https://www.themealdb.com/images/media/meals/qxutws1486978099.jpg', 52794, 400, '7'),
(60, 'Vegan Lasagna', 'https://www.themealdb.com/images/media/meals/rvxxuy1468312893.jpg', 52775, 260, '7'),
(61, 'Baingan Bharta', 'https://www.themealdb.com/images/media/meals/urtpqw1487341253.jpg', 52807, 150, '8'),
(62, 'Chickpea Fajitas', 'https://www.themealdb.com/images/media/meals/tvtxpq1511464705.jpg', 52870, 40, '8'),
(63, 'Dal fry', 'https://www.themealdb.com/images/media/meals/wuxrtu1483564410.jpg', 52785, 229, '8'),
(64, 'Egg Drop Soup', 'https://www.themealdb.com/images/media/meals/1529446137.jpg', 52955, 170, '8'),
(65, 'Flamiche', 'https://www.themealdb.com/images/media/meals/wssvvs1511785879.jpg', 52906, 120, '8'),
(66, 'Ful Medames', 'https://www.themealdb.com/images/media/meals/lvn2d51598732465.jpg', 53025, 145, '8'),
(67, 'Gigantes Plaki', 'https://www.themealdb.com/images/media/meals/b79r6f1585566277.jpg', 53012, 130, '8'),
(68, 'Kafteji', 'https://www.themealdb.com/images/media/meals/1bsv1q1560459826.jpg', 52971, 140, '8'),
(69, 'Kidney Bean Curry', 'https://www.themealdb.com/images/media/meals/sywrsu1511463066.jpg', 52868, 150, '8'),
(70, 'Koshari', 'https://www.themealdb.com/images/media/meals/4er7mj1598733193.jpg', 53027, 175, '8'),
(71, 'Leblebi Soup', 'https://www.themealdb.com/images/media/meals/x2fw9e1560460636.jpg', 52973, 200, '8'),
(72, 'Matar Paneer', 'https://www.themealdb.com/images/media/meals/xxpqsy1511452222.jpg', 52865, 210, '8'),
(73, 'Mushroom & Chestnut Rotolo', 'https://www.themealdb.com/images/media/meals/ssyqwr1511451678.jpg', 52864, 180, '8'),
(74, 'Provençal Omelette Cake', 'https://www.themealdb.com/images/media/meals/qwtrtp1511799242.jpg', 52921, 240, '8'),
(75, 'Ratatouille', 'https://www.themealdb.com/images/media/meals/wrpwuu1511786491.jpg', 52908, 230, '8'),
(76, 'Breakfast Potatoes', 'https://www.themealdb.com/images/media/meals/1550441882.jpg', 52965, 200, '9'),
(77, 'English Breakfast', 'https://www.themealdb.com/images/media/meals/utxryw1511721587.jpg', 52895, 180, '9'),
(78, 'Fruit and Cream Cheese Breakfast Pa', 'https://www.themealdb.com/images/media/meals/1543774956.jpg', 52957, 190, '9'),
(79, 'Full English Breakfast', 'https://www.themealdb.com/images/media/meals/sqrtwu1511721265.jpg', 52896, 220, '9'),
(80, 'Home-made Mandazi', 'https://www.themealdb.com/images/media/meals/thazgm1555350962.jpg', 52967, 250, '9'),
(81, 'Salmon Eggs Eggs Benedict', 'https://www.themealdb.com/images/media/meals/1550440197.jpg', 52962, 210, '9'),
(82, 'Smoked Haddock Kedgeree', 'https://www.themealdb.com/images/media/meals/1550441275.jpg', 52964, 180, '9'),
(83, 'Boulangère Potatoes', 'https://www.themealdb.com/images/media/meals/qywups1511796761.jpg', 52914, 155, '10'),
(84, 'Brie wrapped in prosciutto & brioch', 'https://www.themealdb.com/images/media/meals/qqpwsy1511796276.jpg', 52913, 100, '10'),
(85, 'Corba', 'https://www.themealdb.com/images/media/meals/58oia61564916529.jpg', 52977, 120, '10'),
(86, 'Fennel Dauphinoise', 'https://www.themealdb.com/images/media/meals/ytttsv1511798734.jpg', 52919, 110, '10'),
(87, 'Feteer Meshaltet', 'https://www.themealdb.com/images/media/meals/9f4z6v1598734293.jpg', 53030, 90, '10'),
(88, 'French Onion Soup', 'https://www.themealdb.com/images/media/meals/xvrrux1511783685.jpg', 52903, 85, '10'),
(89, 'Japanese gohan rice', 'https://www.themealdb.com/images/media/meals/kw92t41604181871.jpg', 53033, 140, '10'),
(90, 'Kumpir', 'https://www.themealdb.com/images/media/meals/mlchx21564916997.jpg', 52978, 160, '10'),
(91, 'Pierogi (Polish Dumplings)', 'https://www.themealdb.com/images/media/meals/45xxr21593348847.jpg', 53019, 180, '10'),
(92, 'Prawn & Fennel Bisque', 'https://www.themealdb.com/images/media/meals/rtwwvv1511799504.jpg', 52922, 190, '10'),
(93, 'Snert (Dutch Split Pea Soup)', 'https://www.themealdb.com/images/media/meals/9ptx0a1565090843.jpg', 52981, 210, '10'),
(94, 'Split Pea Soup', 'https://www.themealdb.com/images/media/meals/xxtsvx1511814083.jpg', 52925, 220, '10'),
(95, 'Brown Stew Chicken', 'https://www.themealdb.com/images/media/meals/sypxpx1515365095.jpg', 52940, 380, '1'),
(96, 'Chick-Fil-A Sandwich', 'https://www.themealdb.com/images/media/meals/sbx7n71587673021.jpg', 53016, 210, '1'),
(97, 'Chicken & mushroom Hotpot', 'https://www.themealdb.com/images/media/meals/uuuspp1511297945.jpg', 52846, 240, '1'),
(98, 'Chicken Alfredo Primavera', 'https://www.themealdb.com/images/media/meals/syqypv1486981727.jpg', 52796, 250, '1'),
(99, 'Chicken Basquaise', 'https://www.themealdb.com/images/media/meals/wruvqv1511880994.jpg', 52934, 340, '1'),
(100, 'Chicken Congee', 'https://www.themealdb.com/images/media/meals/1529446352.jpg', 52956, 370, '1'),
(101, 'Chicken Couscous', 'https://www.themealdb.com/images/media/meals/qxytrx1511304021.jpg', 52850, 310, '1'),
(102, 'Chicken Enchilada Casserole', 'https://www.themealdb.com/images/media/meals/qtuwxu1468233098.jpg', 52765, 350, '1'),
(103, 'Chicken Fajita Mac and Cheese', 'https://www.themealdb.com/images/media/meals/qrqywr1503066605.jpg', 52818, 280, '1'),
(104, 'Chicken Ham and Leek Pie', 'https://www.themealdb.com/images/media/meals/xrrtss1511555269.jpg', 52875, 300, '1'),
(105, 'Chicken Handi', 'https://www.themealdb.com/images/media/meals/wyxwsp1486979827.jpg', 52795, 450, '1'),
(106, 'Chicken Karaage', 'https://www.themealdb.com/images/media/meals/tyywsw1505930373.jpg', 52831, 410, '1'),
(107, 'Chicken Marengo', 'https://www.themealdb.com/images/media/meals/qpxvuq1511798906.jpg', 52920, 390, '1'),
(108, 'Chicken Parmentier', 'https://www.themealdb.com/images/media/meals/uwvxpv1511557015.jpg', 52879, 420, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'Joe', 'Mam', 'joemama@gmail.com', '1234567890', 'city of north', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Shrutik', 'Kups', 'shrutik@gmail.com', '5555555555', 'borivali north', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Tanmay', 'Hatkar', 'tanmayhats@gmail.com', '9835612345', 'Borivali east, LA', '9036b3fa19a935436502145b64fc24c8'),
(4, 'Soham', 'Maji', 'shmmaji@student.sfit.ac.in', '8889956918', '41,grand blue, laming street, Old road,New town,Grand city', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Soham', 'Maji', 'soham@gmail.com', '8889956915', '32,Old road,New town,Grand city', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'Soham', 'Majis', 'hello@gmail.com', '8889956911', 'borivali north', 'e67c10a4c8fbfc0c400e047bb9a056a1'),
(9, 'Sahil', 'Bhaji', 'sahil@gmail.com', '1111111111', 'dadas', '1705719363199747afa4e4bdee82e1e3'),
(10, 'Soham', 'Maji', 'sohammaji1001@gmail.com', '3123231231', 'vfsfsdf', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
