-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 06:41 PM
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
-- Database: `dip224`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustID` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustID`, `FirstName`, `LastName`, `Email`, `Phone`, `Gender`, `UserID`) VALUES
(8, 'Kun Yi', 'Chia', 'kyyou@gmail.com', '0100000', 'f', 13),
(9, 'naline', 'Heng', 'naline@gmail.com', '0000000', 'm', 14),
(10, 'heng wei chen', 'adsf', 'weichenheng22@gmail.com', '00000000', 'm', 16),
(11, '123', 'abc', 'boon@gmail.com', '00000', 'm', 17),
(12, 'asdf', 'asdf', 'ky@gmail.com', '123123', 'm', 18);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Opinion` varchar(800) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `CustID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `Rating`, `Opinion`, `Username`, `Date`, `CustID`) VALUES
(5, 4, '11/11 no friends single T.T', 'kyyou@gmail.com', '7 Nov 2023', 8),
(6, 5, 'Japanese girl cute cute', 'naline@gmail.com', '7 Nov 2023', 9),
(7, 3, 'nice', 'naline@gmail.com', '10 Nov 202', 9),
(8, 5, 'Going to japan on my brithday with my gf', 'kyyou@gmail.com', '10 Nov 202', 8),
(9, 3, 'so far so good', 'kyyou@gmail.com', '12 Nov 202', 8);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ImageID` int(11) NOT NULL,
  `Image` text NOT NULL,
  `ProductID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ImageID`, `Image`, `ProductID`) VALUES
(35, 'IMG-65461e823b7753.71150296.jpg', 8),
(36, 'IMG-65461e823cd646.08086924.jpg', 8),
(57, 'IMG-6547bae9a46f81.18703235.jpg', 14),
(59, 'IMG-6547bae9a72757.08420234.jpg', 14),
(63, 'IMG-655245945f5239.49784376.jpg', 16),
(64, 'IMG-655245945fdca0.47468782.jpg', 16),
(65, 'IMG-6552459460b642.52450895.jpg', 16),
(66, 'IMG-655248e0924bb9.50219590.jpg', 17),
(68, 'IMG-655248e0939f36.69852815.jpg', 17),
(70, 'IMG-65524979070778.60918326.jpg', 17),
(74, 'IMG-655258d04373d3.43416624.jpg', 18),
(75, 'IMG-655258d0447543.20864243.jpg', 18),
(76, 'IMG-65525acac78985.03517337.jpg', 19),
(77, 'IMG-65525acac83c12.36336438.png', 19),
(78, 'IMG-65525c2d2d5749.68196430.jpg', 20),
(79, 'IMG-65525c2d2e0781.03455893.jpg', 20),
(80, 'IMG-65525c2d2edb82.24399435.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `MerchantID` int(11) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `RequestID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`MerchantID`, `Email`, `RequestID`, `UserID`) VALUES
(3, 'abc@gmail.com', 2, 8),
(6, 'testing@gmail.com', 7, 15),
(7, 'aaa@gmail.com', 10, 19),
(8, 'merchant1@gmail.com', 11, 20),
(9, 'merchant2@gmail.com', 12, 21),
(10, 'merchant3@gmail.com', 13, 22);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Highlight` text NOT NULL,
  `Package` text NOT NULL,
  `Price` int(11) NOT NULL,
  `MerchantID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Description`, `Highlight`, `Package`, `Price`, `MerchantID`) VALUES
(8, 'Japan Trip', 'Experience the beauty and culture of Japan on this unforgettable journey. From ancient temples to modern metropolises, Japan offers a blend of tradition and innovation that will captivate your senses. Explore historical landmarks, savor delectable cuisine, and immerse yourself in the rich traditions11', 'Visit Kyoto\'s iconic Kinkaku-ji (Golden Pavilion) and witness its stunning golden architecture.\nDiscover the ancient charm of Nara Park, home to friendly deer and historic temples.\nEnjoy a traditional tea ceremony in a quaint tea house in the heart of Kyoto.\nExplore the bustling streets of Tokyo, where modern skyscrapers meet historic neighborhoods.', 'Round-trip airfare to Tokyo, Japan.\nAccommodation in 4-star hotels throughout the trip.\nGuided tours to famous landmarks and attractions.\nDaily breakfast and select meals featuring authentic Japanese cuisine.\nTransportation within Japan, including Shinkansen (bullet train) rides.', 1500, 3),
(14, 'Bali Adventure Tour', 'Explore the breathtaking island of Bali on an unforgettable adventure trip. Discover the rich culture, lush landscapes, and thrilling activities that Bali has to offer. This trip is designed for the ultimate adventurer, seeking to experience the best of Bali.', 'Trek to the summit of Mount Agung for a sunrise like no other.\r\nDiscover the mystical Tegallalang Rice Terraces.\r\nWhite-water rafting on the Ayung River, a thrilling experience.\r\nExplore the ancient Goa Gajah Elephant Cave.', 'Accommodation in well-appointed hotels and resorts.\r\nDaily breakfast and selected meals.\r\nAll transportation and transfers.\r\nExperienced local guides for all activities.', 1200, 3),
(16, 'Interesting Korea Trip', 'Embark on an enchanting journey through the heart of South Korea, where ancient traditions harmonize with modern marvels. Immerse yourself in the rich tapestry of Korean culture, from historic landmarks to bustling urban landscapes. Here\'s a glimpse of what awaits you on this captivating adventure:', 'Serene Beauty of Jeju Island: Discover the natural wonders of Jeju Island, known for its picturesque landscapes, waterfalls, and the iconic Hallasan Mountain.\r\n\r\nHistoric Charm of Gyeongju: Step back in time in Gyeongju, the \"City of Temples,\" and visit Bulguksa Temple and Seokguram Grotto, UNESCO World Heritage Sites.\r\n\r\nCulinary Delights: Indulge in the flavors of Korea with traditional dishes like Bibimbap, Kimchi, and Korean BBQ. Experience a Hanjeongsik feast for a taste of royal cuisine.', 'Round-trip Airfare to Seoul, South Korea: Enjoy a comfortable journey to the vibrant capital city.\r\n\r\nAccommodation: Stay in luxurious 4-star hotels, offering comfort and convenience throughout your trip.\r\n\r\nGuided Tours: Explore the best of Korea with knowledgeable guides leading you to iconic landmarks and hidden gems.\r\n\r\nDaily Meals: Start your day with hearty breakfasts and savor authentic Korean cuisine in select meals.', 2000, 8),
(17, 'Parisian Escapade', 'Embark on a captivating journey through the heart of Paris, where timeless elegance meets contemporary allure. Immerse yourself in the enchanting tapestry of French culture, from iconic landmarks to the charming streets of Montmartre. Here\'s a glimpse of the extraordinary adventure that awaits you:', 'Eiffel Tower Extravaganza: Ascend the iconic Eiffel Tower for panoramic views of the City of Light, and experience its sparkling brilliance during a magical evening.\r\n\r\nLouvre and Notre-Dame: Explore world-renowned art at the Louvre, home to the Mona Lisa, and marvel at the Gothic masterpiece of Notre-Dame Cathedral.\r\n\r\nChamps-Élysées Stroll: Wander down the glamorous Champs-Élysées, lined with boutiques and cafes, and reach the majestic Arc de Triomphe.\r\n\r\nMontmartre\'s Bohemian Vibes: Discover the artistic allure of Montmartre, visit the historic Sacré-Cœur Basilica, and relish the ambiance of its charming streets.', 'Round-trip Airfare to Paris, France: Begin your journey with a seamless flight to the enchanting capital.\r\n\r\nAccommodation: Experience Parisian elegance with stays in luxurious 4-star hotels, offering comfort and sophistication.\r\nDaily Delights: Start each day with delightful breakfasts and savor delectable French cuisine in select meals.\r\n\r\nEffortless Transportation: Navigate the city effortlessly with efficient transportation, including scenic Seine River cruises and the Paris Metro.', 2500, 9),
(18, 'China Explorer\'s Expedition', 'Embark on a mesmerizing journey through the diverse landscapes and rich heritage of China, where ancient wonders seamlessly blend with contemporary marvels. Immerse yourself in the tapestry of Chinese culture, from historic landmarks to dynamic urban environments. Here\'s a glimpse of the extraordinary adventure that awaits you:', 'The Great Wall Odyssey: Walk along the iconic Great Wall of China, a testament to ancient engineering and a symbol of the nation\'s strength.\r\n\r\nForbidden City Marvels: Explore the opulent Forbidden City in Beijing, home to centuries of imperial history and architectural grandeur.\r\nYangshuos Scenic Splendor: Cruise along the Li River in Yangshuo, surrounded by breathtaking karst landscapes and picturesque rural scenes.\r\n\r\nTerracotta Army Encounter: Witness the Terracotta Army in Xian, a jaw-dropping archaeological marvel preserving the legacy of China first emperor.', 'Round-trip Airfare to Beijing, China: Begin your adventure with a comfortable journey to the bustling capital city.\r\n\r\nLuxurious Accommodation: Enjoy stays in 4-star hotels, offering a perfect blend of comfort and sophistication throughout your exploration.\r\n\r\nExpert-Guided Tours: Uncover the treasures of China with knowledgeable guides leading you through iconic landmarks and hidden gems.\r\n\r\nDaily Gastronomic Journeys: Start each day with hearty breakfasts and indulge in authentic Chinese cuisine during select meals.', 2550, 10),
(19, 'India Discovery Tour', 'Embark on an extraordinary journey through the diverse landscapes of India, where ancient traditions seamlessly blend with the vibrancy of modern life. Immerse yourself in the kaleidoscope of Indian culture, from historic wonders to bustling markets. Here is a glimpse of the enchanting adventure that awaits you:', 'Majestic Monuments of Delhi: Explore the grandeur of Indias capital, Delhi, with visits to iconic landmarks such as the Red Fort, Qutub Minar, and Humayuns Tomb.\r\n\r\nTaj Mahal in Agra: Witness the breathtaking beauty of the Taj Mahal, a UNESCO World Heritage Site and one of the Seven Wonders of the World, as it shimmers in the morning light.\r\n\r\nSpiritual Varanasi: Experience the spiritual energy of Varanasi as you take a boat ride along the Ganges River, witness mesmerizing evening rituals, and explore the citys ancient temples.\r\n\r\nCultural Riches of Jaipur: Step into the \"Pink City\" of Jaipur and marvel at the architectural wonders of Hawa Mahal, City Palace, and the historic Amber Fort.\r\n\r\nWildlife Safari in Ranthambore: Embark on a thrilling wildlife safari in Ranthambore National Park, home to the majestic Bengal tiger and a variety of other exotic species.', 'Luxurious Accommodation: Stay in handpicked 4-star hotels that offer a perfect blend of comfort and local charm, ensuring a memorable stay.\r\n\r\nGuided Tours: Explore the best of India with expert guides who will lead you through the intricate history and vibrant culture of each destination.\r\n\r\nDaily Meals: Start your day with delicious breakfasts and experience the variety of Indian cuisine with select meals included in your package.\r\n\r\nEfficient Transportation: Travel seamlessly between cities with efficient transportation, including train journeys that showcase the scenic beauty of India.', 1800, 10),
(20, 'Malaysia Explorer Tour', 'Embark on a mesmerizing journey through the heart of Malaysia, where a harmonious blend of cultural diversity and natural wonders awaits. Immerse yourself in the vibrant tapestry of Malaysian heritage, from bustling urban centers to serene landscapes. Here is a glimpse of the captivating adventure that awaits you:', 'Kuala Lumpurs Modern Marvels: Explore the dynamic cityscape of Kuala Lumpur, home to iconic landmarks like the Petronas Twin Towers and the futuristic KL Tower.\r\n\r\nCultural Melting Pot of Penang: Dive into the rich cultural heritage of Penang, known for its historic George Town, vibrant street art, and diverse culinary scene.\r\n\r\nBreathtaking Langkawi Archipelago: Discover the natural wonders of Langkawi, an archipelago of pristine islands with crystal-clear waters, secluded beaches, and lush rainforests.\r\n\r\nHistorical Melaka: Step into the historical charm of Melaka, a UNESCO World Heritage Site, and explore its colonial architecture, Jonker Street, and ancient temples.\r\n\r\nGastronomic Adventure: Indulge in the diverse flavors of Malaysian cuisine, from delicious Nasi Lemak to savory Satay, showcasing the country\'s culinary richness.', 'Round-trip Airfare to Kuala Lumpur, Malaysia: Enjoy a seamless journey to the dynamic capital city of Malaysia.\r\n\r\nLuxurious Accommodation: Stay in handpicked 4-star hotels that combine comfort with local charm, ensuring a delightful stay throughout your trip.\r\n\r\nGuided Tours: Explore the best of Malaysia with knowledgeable guides, unraveling the cultural and natural treasures of each destination.\r\n\r\nDaily Meals: Begin your day with hearty breakfasts and savor the authentic flavors of Malaysian cuisine with select meals included in your package.\r\n\r\nEfficient Transportation: Experience the convenience of Malaysias transportation, ensuring swift travel between cities, including scenic train rides and local transportation.', 1200, 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Total` int(11) NOT NULL,
  `Pax` int(11) NOT NULL,
  `BillDate` varchar(10) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `CustID` int(11) DEFAULT NULL,
  `MerchantID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseID`, `Date`, `Total`, `Pax`, `BillDate`, `ProductID`, `CustID`, `MerchantID`) VALUES
(6, '2023-11-11', 2400, 2, '2023-11-08', 14, 8, 3),
(7, '2023-12-01', 7500, 5, '2023-11-08', 8, 9, 3),
(8, '2023-11-18', 1200, 1, '2023-11-09', 14, 9, 3),
(9, '2023-11-18', 1500, 1, '2023-11-09', 8, 9, 3),
(10, '2023-11-16', 2400, 2, '2023-11-10', 14, 8, 3),
(11, '2023-11-15', 15000, 10, '2023-11-12', 8, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` int(11) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Filename` varchar(20) NOT NULL,
  `File` text NOT NULL,
  `Status` varchar(7) NOT NULL,
  `Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `Phone`, `Email`, `Description`, `Filename`, `File`, `Status`, `Date`) VALUES
(2, '123123123', 'weichen8277@gmail.com', 'This is my company', 'paige beuckers', 'IMG-65426ce0696ab8.56450852.png', 'APPROVE', '01/11/2023'),
(3, '123123123', 'asdf@gmail.com', 'sdfgsdfg', 'sdfgsdfg', 'IMG-65426d776c6859.44277495.jpg', 'APPROVE', '01/11/2023'),
(4, '123123', 'ky@gmail.com', 'Company', 'OoiPuiJack', 'IMG-65426f3b57b745.63115142.jpg', 'REJECT', '01/11/2023'),
(5, '0100000', 'aidenhengdreamvest@gmail.com', 'The best company', 'My license', 'IMG-65479ea8c1f6b6.56683593.jpg', 'APPROVE', '05/11/2023'),
(6, '012321312', 'weichen8277@gmail.com', 'Leng lui company', 'My GirlFriend', 'IMG-6547ac85f3e779.37056701.png', 'REJECT', '05/11/2023'),
(7, '11111111', 'testing@gmail.com', 'NIce company', 'paige beuckers', 'IMG-654a1aa0206d74.53226892.jpg', 'APPROVE', '07/11/2023'),
(8, '123', 'ky@gmail.com', 'dsfa', 'adsf', 'IMG-65509fcd63b516.64175277.jpg', 'REJECT', '12/11/2023'),
(9, '123', 'ky@gmail.com', 'adsf', 'dasf', 'IMG-65509fff67eb93.73207645.jpg', 'REJECT', '12/11/2023'),
(10, '123', 'aaa@gmail.com', 'asdfasdf', 'asdfafsd', 'IMG-6550a2386e8a07.34051789.png', 'APPROVE', '12/11/2023'),
(11, '01023232', 'merchant1@gmail.com', 'We are more than just travel enthusiasts; we are architects of memories. With a passion for exploration and a commitment to excellence, we have carefully designed each tourism package to reflect the unique charm and cultural richness of our destinations.', 'License', 'IMG-65522e348fcac6.88397899.jpg', 'APPROVE', '13/11/2023'),
(12, '123520', 'merchant2@gmail.com', 'we believe that travel is not just about reaching a destination; it is about embracing the magic of the journey. With a foundation built on passion, expertise, and a love for exploration, we curate distinctive travel packages that resonate with the soul of every adventurer.', 'License', 'IMG-65524319b93244.25909916.jpg', 'APPROVE', '13/11/2023'),
(13, '0100000', 'merchant3@gmail.com', 'we believe in the transformative power of travel.', 'License', 'IMG-65524400f38e15.72613347.jpg', 'APPROVE', '13/11/2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(35) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Role`) VALUES
(8, 'abc@gmail.com', '123', 'merchant'),
(10, 'admin@admin.com', 'admin123', 'admin'),
(13, 'kyyou@gmail.com', '12345678', 'customer'),
(14, 'naline@gmail.com', '12345678', 'customer'),
(15, 'testing@gmail.com', '12345', 'merchant'),
(16, 'weichenheng22@gmail.com', '12345678', 'customer'),
(17, 'boon@gmail.com', '12345678', 'customer'),
(18, 'ky@gmail.com', '123123123', 'customer'),
(19, 'aaa@gmail.com', '123123123', 'merchant'),
(20, 'merchant1@gmail.com', '123123123', 'merchant'),
(21, 'merchant2@gmail.com', '123123123', 'merchant'),
(22, 'merchant3@gmail.com', '123123123', 'merchant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustID`),
  ADD KEY `fk_user_id` (`UserID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `fk_feedback_customer` (`CustID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `fk_ProductID` (`ProductID`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`MerchantID`),
  ADD KEY `fk_UserID` (`UserID`),
  ADD KEY `fk_request` (`RequestID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `fk_MerchantID` (`MerchantID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `fk_purchase_product` (`ProductID`),
  ADD KEY `fk_purchase_customer` (`CustID`),
  ADD KEY `MerchantID` (`MerchantID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `MerchantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_customer` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`) ON DELETE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `fk_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_request` FOREIGN KEY (`RequestID`) REFERENCES `request` (`RequestID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_MerchantID` FOREIGN KEY (`MerchantID`) REFERENCES `merchant` (`MerchantID`) ON DELETE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_purchase_customer` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_purchase_product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`MerchantID`) REFERENCES `merchant` (`MerchantID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
