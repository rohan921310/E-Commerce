-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 06:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ankit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_login_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_login_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisement_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_actual_price` int(11) DEFAULT NULL,
  `product_offer_price` int(11) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_description_main` longtext NOT NULL,
  `product_more_description` longtext NOT NULL,
  `advertisement_date` date NOT NULL,
  `front_image` varchar(255) NOT NULL,
  `feature_product` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `category_id`, `sub_category_id`, `product_name`, `product_quantity`, `product_actual_price`, `product_offer_price`, `product_description`, `product_description_main`, `product_more_description`, `advertisement_date`, `front_image`, `feature_product`) VALUES
(11, 3, 8, 'Titan X50', 10, 3000, 1599, '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ab est dolorum mollitia soluta ex dolorem ad nihil libero hic officia obcaecati, dolores quos quod aspernatur sequi. Odit, aliquid.', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ab est dolorum mollitia soluta ex dolorem ad nihil libero hic officia obcaecati, dolores quos quod aspernatur sequi. Odit, aliquid.    Lorem ipsum dolor sit amet, consectetur adipis', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ab est dolorum mollitia soluta ex dolorem afd nihil libero hic officia obcaecati, dolores quos quod aspernatur sequi. Odit, aliquid.    Lorem ipsum dolor sit amet, consectetur adipi', '2020-11-26', 'Blue_Tshirt.jpg', 1),
(12, 1, 5, 'Casio XII', 10, 2000, 1899, 'Men\'s Watch Titan Brand with best quality', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolre eu fugiat nulla pariatur excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolre eu fugiat nulla pariatur excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse', '2020-11-30', 'collarge-of-plain-round-neck-t-shirt-500x500-500x500.jpg', 1),
(13, 1, 6, 'Sonata', 10, 1444, 900, 'sonata best', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ab est dolorum mollitia soluta ex dolorem ad nihil libero hic officia obcaecati, dolores quos quod aspernatur sequi. Odit, aliquid.', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ab est dolorum mollitia soluta ex dolorem ad nihil libero hic officia obcaecati, dolores quos quod aspernatur sequi. Odit, aliquid.', '2020-11-30', 'iphone11x.jpeg', 1),
(14, 1, 5, 'sdf', 10, 2999, 99, 'KLJDFSJ', 'JKLL', 'JKLJK', '2020-11-30', 'Blue_Tshirt3.jpg', 1),
(15, 3, 8, 'kjl', 11, 11, 1, 'kljkljfs', 'kljklj', 'lkjl', '2020-11-30', 'Blue_Tshirt4.jpg', 1),
(16, 1, 5, 'fsda', 11, 11, 1, 'jlkj', 'jl', 'jkl', '2020-11-30', 'Blue_Tshirt5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `basic_info_id` int(11) NOT NULL,
  `admin_login_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_mobile` bigint(20) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_working_hour` varchar(255) NOT NULL,
  `company_about_us_footer` longtext NOT NULL,
  `company_insta_link` longtext NOT NULL,
  `company_facebook_link` longtext NOT NULL,
  `company_youtube_link` longtext NOT NULL,
  `about_us_page` longtext NOT NULL,
  `contact_us_page` longtext NOT NULL,
  `company_privacy` longtext NOT NULL,
  `company_terms` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`basic_info_id`, `admin_login_id`, `company_name`, `company_email`, `company_mobile`, `company_address`, `company_working_hour`, `company_about_us_footer`, `company_insta_link`, `company_facebook_link`, `company_youtube_link`, `about_us_page`, `contact_us_page`, `company_privacy`, `company_terms`) VALUES
(1, 1, 'Gupta Watch House', 'ankit@gmail.com', 8506042017, 'A-13, 40 Feet Rd,chnakya place market, Janakpuri, Delhi, 110059', 'Mon - Sun/10:00 AM - 11:00 PM', '                                                Hello and welcome to Gupta Watch House, the place to find the best Watches for every taste and occasion. We thoroughly check the quality of our goods, working only with reliable suppliers so that you only receive the best quality product.                                                                                                                                                                                                                                     ', 'https://instagram.com/guptawatch_07?igshid=1p5jdhb9ilkf2', '', 'https://www.youtube.com/watch?v=R1vgJUaUF1s', ' <p style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; color: rgb(139, 139, 143); font-family: &quot;Segoe Ui&quot;, arial; font-size: 13px; line-height: 20.8px;\">TheWatchShop.in (<span style=\"font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 14px; line-height: 19px;\">Eazeeshop)&nbsp;</span>is a leading retailer of brand name designer watches for all watch brands listed on our website. We pride ourselves on having one of the most efficient shopping systems available with communication at every stage to inform you of your order status, as well as excellent customer service and support team who are glad to assist you with any enquiry or problem, should one arise.</p><p style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; color: rgb(139, 139, 143); font-family: &quot;Segoe Ui&quot;, arial; font-size: 13px; line-height: 20.8px;\"><br>Buy from TheWatchShop.in with confidence: as an official retailer for all brands Since 2008 Listed, all watches purchased from us are provided with the official manufacturer\'s Warranty.<br><br><strong style=\"font-weight: bold;\">Reasons why you should trust TheWatchShop.in</strong>&nbsp; &nbsp; With&nbsp;your purchase</p><ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: outside none none; color: rgb(139, 139, 143); font-family: &quot;Segoe Ui&quot;, arial; font-size: 13px; line-height: 20.8px;\"><li style=\"line-height: 20px;\"><strong style=\"font-weight: bold;\">100% genuine watches</strong>.&nbsp; Every item sold by TheWatchShop.in is a 100% genuine item, supplied to us from the manufacturer directly.&nbsp; We do not sell second hand or replica watches.</li><li style=\"line-height: 20px;\"><strong style=\"font-weight: bold;\">We are official retailers for all of our brands.</strong>&nbsp;This means all of our stock comes directly from the manufacturer and therefore comes with the correct instructions, packaging and 100% valid guarantee.&nbsp; Many sites out there, allow third parties or independent sellers to sell on their websites, who will import from the ‘grey market’ – meaning your watch could be from a number of countries such as China and NOT include the official guarantee.</li><li style=\"line-height: 20px;\"><strong style=\"font-weight: bold;\">Full refund policy.</strong>&nbsp; If for any reason you are unhappy with your purchase, as long as it is in brand new and unworn condition, you can return it to us for a full refund or exchange within 7&nbsp;days of delivery.&nbsp;</li><li style=\"line-height: 20px;\"><strong style=\"font-weight: bold;\">Free delivery.</strong>&nbsp;&nbsp;We do not charge anything extra for delivery unlike other sites &amp; the final price on our sites includes the delivery charges as well. We deliver to most locations across India through our logistical partner Bluedart.</li><li style=\"line-height: 20px;\"><strong style=\"font-weight: bold;\">If it says In Stock, it’s In Stock.</strong>&nbsp; We have a live stock tracking system which means our physical stock is represented accurately on our website: if it’s shown as being in stock on our site that means that we have the item in stock and ready for processing. &nbsp;Many sites out there list hundreds of watches on their site and wait until they receive your order before they try and obtain the watch from their sources, causing delays of days or weeks.&nbsp; In the unlikely event that a watch is not available, we will contact you immediately.&nbsp;</li><li style=\"line-height: 20px;\"><strong style=\"font-weight: bold;\">100% secure online ordering.&nbsp;&nbsp;</strong>Your credit card details are directly entered on the HDFC Bank’s Secure Payment gateway which, means that they cannot be intercepted or read by anyone.&nbsp; Also your credit card details are not stored with us &amp; are directly logged on to the banks secure server.</li></ul> ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.5558112135473!2d77.07434371455915!3d28.613099491712127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d05bb6c526185%3A0x261d6bc0697ea2ef!2sGupta%20watch%20house!5e0!3m2!1sen!2sin!4v1607156321053!5m2!1sen!2sin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_date`) VALUES
(1, 'Men\'s Watch', '2020-11-23 07:54:54pm '),
(3, 'Women\'s Watch', '2020-11-23 08:34:39pm '),
(4, 'Smart Watches', '2020-11-25 05:31:42pm '),
(5, 'Fitness Band', '2020-11-25 05:31:48pm ');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_reviews`
--

CREATE TABLE `contact_us_reviews` (
  `contact_us_reviews_id` int(11) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_review_date` datetime NOT NULL,
  `contact_phone` bigint(20) NOT NULL,
  `contact_message` longtext NOT NULL,
  `contact_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us_reviews`
--

INSERT INTO `contact_us_reviews` (`contact_us_reviews_id`, `contact_email`, `contact_review_date`, `contact_phone`, `contact_message`, `contact_name`) VALUES
(1, 'sharmarajesh1077@gmail.com', '2020-12-05 02:18:43', 9213109261, 'Sharma', 'Rohan Sharma'),
(2, 'sharmarajesh1077@gmail.com', '2020-12-05 02:19:59', 9213109261, 'Sharma', 'Rohan Sharma');

-- --------------------------------------------------------

--
-- Table structure for table `inside_images`
--

CREATE TABLE `inside_images` (
  `inside_images_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `inside_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inside_images`
--

INSERT INTO `inside_images` (`inside_images_id`, `advertisement_id`, `inside_image`) VALUES
(12, 11, 'bed.jpg'),
(13, 11, 'Blue_Tshirt1.jpg'),
(14, 12, '120309-phones-buyer-s-guide-best-smartphones-2020-the-top-mobile-phones-available-to-buy-today-image1-eagx1ykift.jpg'),
(15, 12, 'Agricultural_Waste.jpg'),
(16, 12, 'bed1.jpg'),
(17, 13, 'image.jpg'),
(18, 13, 'images_(1).jpg'),
(19, 13, 'levant-fhd-t5300-ua40t5300auxtw-frontblack-229857819.jpg'),
(20, 14, 'bed3.jpg'),
(21, 15, 'collarge-of-plain-round-neck-t-shirt-500x500-500x5001.jpg'),
(22, 16, 'collarge-of-plain-round-neck-t-shirt-500x500-500x5002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `main_banner`
--

CREATE TABLE `main_banner` (
  `main_banner_id` int(11) NOT NULL,
  `admin_login_id` int(11) NOT NULL,
  `main_banner1` varchar(255) NOT NULL,
  `main_banner2` varchar(255) NOT NULL,
  `main_banner3` varchar(255) NOT NULL,
  `mini_banner1` varchar(255) NOT NULL,
  `mini_banner2` varchar(255) NOT NULL,
  `mini_banner3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_banner`
--

INSERT INTO `main_banner` (`main_banner_id`, `admin_login_id`, `main_banner1`, `main_banner2`, `main_banner3`, `mini_banner1`, `mini_banner2`, `mini_banner3`) VALUES
(1, 1, 'slider1.jpg', 'slider2.jpg', 'slider3.jpg', 'banner-1.jpg', 'banner-21.jpg', 'banner-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `purchased_products_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_buy_price` int(11) NOT NULL,
  `product_buy_quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `checkout_name` varchar(255) NOT NULL,
  `checkout_mobile` bigint(20) NOT NULL,
  `checkout_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased_products`
--

INSERT INTO `purchased_products` (`purchased_products_id`, `user_id`, `advertisement_id`, `order_id`, `product_buy_price`, `product_buy_quantity`, `subtotal`, `order_total`, `order_date`, `status`, `checkout_name`, `checkout_mobile`, `checkout_address`) VALUES
(11, 1, 11, 868847, 1599, 1, 1599, 3498, '2020-12-03 03:09:50', 'purchased', 'Rohan', 919213109261, ' Rz-g-148,sita Puri-ii, Gali No-5,p.o. Palam,Janak Puri,Delhi-110045,India'),
(12, 1, 12, 763537, 1899, 1, 1899, 3498, '2020-12-03 03:09:50', 'rejected', 'Rohan', 919213109261, ' Rz-g-148,sita Puri-ii, Gali No-5,p.o. Palam,Janak Puri,Delhi-110045,India'),
(13, 1, 11, 431455, 1599, 1, 1599, 1599, '2020-12-03 03:49:10', 'accept', 'Rohan', 9213109261, ' Rz-g-148,sita Puri-ii, Gali No-5,p.o. Palam,Janak Puri,Delhi-110045,India');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_date`) VALUES
(5, 1, 'CASIO', '2020-11-25 05:29:59pm '),
(6, 1, 'Sonata', '2020-11-25 05:30:15pm '),
(7, 1, 'Fastrack', '2020-11-25 05:30:29pm '),
(8, 3, 'Titan', '2020-11-25 05:30:40pm '),
(10, 3, 'CASIO', '2020-11-25 05:31:11pm '),
(11, 3, 'Sonata', '2020-11-25 05:31:21pm '),
(12, 4, 'Apple', '2020-11-25 05:31:58pm '),
(13, 4, 'MI', '2020-11-25 05:32:03pm '),
(14, 4, 'Samsung', '2020-11-25 05:32:10pm '),
(15, 4, 'K Series', '2020-11-25 05:32:17pm '),
(16, 5, 'MI', '2020-11-25 05:32:24pm '),
(17, 5, 'Local Brands', '2020-11-25 05:32:33pm ');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_details_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_details_id`, `user_name`, `user_email`, `user_password`, `user_date`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', '2020-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_login_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`basic_info_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us_reviews`
--
ALTER TABLE `contact_us_reviews`
  ADD PRIMARY KEY (`contact_us_reviews_id`);

--
-- Indexes for table `inside_images`
--
ALTER TABLE `inside_images`
  ADD PRIMARY KEY (`inside_images_id`);

--
-- Indexes for table `main_banner`
--
ALTER TABLE `main_banner`
  ADD PRIMARY KEY (`main_banner_id`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`purchased_products_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `basic_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us_reviews`
--
ALTER TABLE `contact_us_reviews`
  MODIFY `contact_us_reviews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inside_images`
--
ALTER TABLE `inside_images`
  MODIFY `inside_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `main_banner`
--
ALTER TABLE `main_banner`
  MODIFY `main_banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `purchased_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
