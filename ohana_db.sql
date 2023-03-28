-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohana_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_information`
--

CREATE TABLE `chatbot_information` (
  `information_id` int(1) NOT NULL,
  `chatbot_avatar` varchar(500) NOT NULL,
  `chatbot_name` varchar(50) NOT NULL,
  `chatbot_introduction` varchar(250) NOT NULL,
  `chatbot_no_response` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot_information`
--

INSERT INTO `chatbot_information` (`information_id`, `chatbot_avatar`, `chatbot_name`, `chatbot_introduction`, `chatbot_no_response`) VALUES
(1, 'dwsadasdasdasda', 'Frenchie', 'Hello', 'No response');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_responses`
--

CREATE TABLE `chatbot_responses` (
  `response_id` int(11) NOT NULL,
  `response` varchar(250) NOT NULL,
  `query` varchar(250) NOT NULL,
  `times_asked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_account`
--

CREATE TABLE `ohana_account` (
  `account_id` int(11) NOT NULL,
  `account_type` varchar(13) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `number` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'UNREGISTERED',
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_appointments`
--

CREATE TABLE `ohana_appointments` (
  `appointment_id` int(30) NOT NULL,
  `appointment_type` varchar(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `appointment_title` text NOT NULL,
  `appointment_description` text NOT NULL,
  `appointment_start` datetime NOT NULL,
  `appointment_end` datetime DEFAULT NULL,
  `appointment_status` varchar(20) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_boarding_slot`
--

CREATE TABLE `ohana_boarding_slot` (
  `slot_id` int(11) NOT NULL,
  `slot_image` longblob NOT NULL,
  `slot_name` varchar(50) NOT NULL,
  `slot_information` varchar(250) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `pet_id` int(11) DEFAULT NULL,
  `pet_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_config`
--

CREATE TABLE `ohana_config` (
  `config_name` varchar(50) NOT NULL,
  `config_information` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ohana_config`
--

INSERT INTO `ohana_config` (`config_name`, `config_information`) VALUES
('DOMAIN_NAME', 'localhost'),
('EMAIL_KEY', 'kgubwhvwmbtrutjj'),
('EMAIL_USERNAME', 'ohanakennelph.business@gmail.com'),
('SEMAPHORE_API_KEY', '32274a2beca5d1b3d66be07f3541128e');

-- --------------------------------------------------------

--
-- Table structure for table `ohana_feedbacks`
--

CREATE TABLE `ohana_feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `feedback_rating` int(1) NOT NULL,
  `feedback_message` varchar(250) NOT NULL,
  `feedback_date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_logs`
--

CREATE TABLE `ohana_logs` (
  `log_id` int(11) NOT NULL,
  `log_account_id` int(11) DEFAULT NULL,
  `log_account_type` text NOT NULL,
  `log` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_orders`
--

CREATE TABLE `ohana_orders` (
  `order_id` int(11) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_pet_profiles`
--

CREATE TABLE `ohana_pet_profiles` (
  `pet_id` int(11) NOT NULL,
  `pet_reference` varchar(100) DEFAULT NULL,
  `pet_image` longblob DEFAULT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_type` varchar(20) NOT NULL,
  `pet_birthdate` date NOT NULL,
  `pet_sex` varchar(6) NOT NULL,
  `pet_color` varchar(20) NOT NULL,
  `pet_trait` varchar(50) NOT NULL,
  `is_vaccinated` tinyint(1) NOT NULL,
  `pcci_status` varchar(10) NOT NULL,
  `account_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `pet_price` decimal(10,2) NOT NULL,
  `pet_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_stud_history`
--

CREATE TABLE `ohana_stud_history` (
  `stud_id` int(11) NOT NULL,
  `male_id` int(11) NOT NULL,
  `female_id` int(11) NOT NULL,
  `stud_date` datetime DEFAULT current_timestamp(),
  `stud_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_transactions`
--

CREATE TABLE `ohana_transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_reference` varchar(50) NOT NULL,
  `account_id` int(10) NOT NULL,
  `total_price` float NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `payment_confirmation` mediumblob DEFAULT NULL,
  `payment_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ohana_vaccine_records`
--

CREATE TABLE `ohana_vaccine_records` (
  `vaccine_id` int(11) NOT NULL,
  `pet_reference` varchar(250) NOT NULL,
  `vaccine_image` longblob NOT NULL,
  `vaccine_name` text NOT NULL,
  `vaccine_date` date NOT NULL,
  `vaccine_revaccination` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot_information`
--
ALTER TABLE `chatbot_information`
  ADD PRIMARY KEY (`information_id`);

--
-- Indexes for table `chatbot_responses`
--
ALTER TABLE `chatbot_responses`
  ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `ohana_account`
--
ALTER TABLE `ohana_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `ohana_appointments`
--
ALTER TABLE `ohana_appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD UNIQUE KEY `appointment_id` (`appointment_id`),
  ADD UNIQUE KEY `appointment_id_2` (`appointment_id`),
  ADD UNIQUE KEY `appointment_id_3` (`appointment_id`),
  ADD UNIQUE KEY `appointment_start` (`appointment_start`,`appointment_end`),
  ADD KEY `fk_appointments_account_id` (`account_id`);

--
-- Indexes for table `ohana_boarding_slot`
--
ALTER TABLE `ohana_boarding_slot`
  ADD PRIMARY KEY (`slot_id`),
  ADD UNIQUE KEY `slot_name` (`slot_name`),
  ADD KEY `fk_boarding_slot_pet_id` (`pet_id`);

--
-- Indexes for table `ohana_config`
--
ALTER TABLE `ohana_config`
  ADD UNIQUE KEY `config_name` (`config_name`);

--
-- Indexes for table `ohana_feedbacks`
--
ALTER TABLE `ohana_feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_feedbacks_account_id` (`account_id`);

--
-- Indexes for table `ohana_logs`
--
ALTER TABLE `ohana_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_logs_account_id` (`log_account_id`);

--
-- Indexes for table `ohana_orders`
--
ALTER TABLE `ohana_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_transaction_id` (`transaction_id`);

--
-- Indexes for table `ohana_pet_profiles`
--
ALTER TABLE `ohana_pet_profiles`
  ADD PRIMARY KEY (`pet_id`),
  ADD UNIQUE KEY `pet_reference` (`pet_reference`),
  ADD KEY `fk_pet_profile_account_id` (`account_id`);

--
-- Indexes for table `ohana_stud_history`
--
ALTER TABLE `ohana_stud_history`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `fk_stud_history_female_id` (`female_id`),
  ADD KEY `fk_stud_history_male_id` (`male_id`);

--
-- Indexes for table `ohana_transactions`
--
ALTER TABLE `ohana_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_transaction_account_id` (`account_id`);

--
-- Indexes for table `ohana_vaccine_records`
--
ALTER TABLE `ohana_vaccine_records`
  ADD PRIMARY KEY (`vaccine_id`),
  ADD KEY `fk_vaccine_pet_reference` (`pet_reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot_information`
--
ALTER TABLE `chatbot_information`
  MODIFY `information_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chatbot_responses`
--
ALTER TABLE `chatbot_responses`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_account`
--
ALTER TABLE `ohana_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_appointments`
--
ALTER TABLE `ohana_appointments`
  MODIFY `appointment_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_boarding_slot`
--
ALTER TABLE `ohana_boarding_slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ohana_feedbacks`
--
ALTER TABLE `ohana_feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_logs`
--
ALTER TABLE `ohana_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_orders`
--
ALTER TABLE `ohana_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_pet_profiles`
--
ALTER TABLE `ohana_pet_profiles`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_stud_history`
--
ALTER TABLE `ohana_stud_history`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ohana_transactions`
--
ALTER TABLE `ohana_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ohana_vaccine_records`
--
ALTER TABLE `ohana_vaccine_records`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ohana_appointments`
--
ALTER TABLE `ohana_appointments`
  ADD CONSTRAINT `fk_appointments_account_id` FOREIGN KEY (`account_id`) REFERENCES `ohana_account` (`account_id`);

--
-- Constraints for table `ohana_boarding_slot`
--
ALTER TABLE `ohana_boarding_slot`
  ADD CONSTRAINT `fk_boarding_slot_pet_id` FOREIGN KEY (`pet_id`) REFERENCES `ohana_pet_profiles` (`pet_id`);

--
-- Constraints for table `ohana_feedbacks`
--
ALTER TABLE `ohana_feedbacks`
  ADD CONSTRAINT `fk_feedbacks_account_id` FOREIGN KEY (`account_id`) REFERENCES `ohana_account` (`account_id`);

--
-- Constraints for table `ohana_logs`
--
ALTER TABLE `ohana_logs`
  ADD CONSTRAINT `fk_logs_account_id` FOREIGN KEY (`log_account_id`) REFERENCES `ohana_account` (`account_id`);

--
-- Constraints for table `ohana_orders`
--
ALTER TABLE `ohana_orders`
  ADD CONSTRAINT `fk_order_transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `ohana_transactions` (`transaction_id`);

--
-- Constraints for table `ohana_pet_profiles`
--
ALTER TABLE `ohana_pet_profiles`
  ADD CONSTRAINT `fk_pet_profile_account_id` FOREIGN KEY (`account_id`) REFERENCES `ohana_account` (`account_id`);

--
-- Constraints for table `ohana_stud_history`
--
ALTER TABLE `ohana_stud_history`
  ADD CONSTRAINT `fk_stud_history_female_id` FOREIGN KEY (`female_id`) REFERENCES `ohana_pet_profiles` (`pet_id`),
  ADD CONSTRAINT `fk_stud_history_male_id` FOREIGN KEY (`male_id`) REFERENCES `ohana_pet_profiles` (`pet_id`);

--
-- Constraints for table `ohana_transactions`
--
ALTER TABLE `ohana_transactions`
  ADD CONSTRAINT `fk_transaction_account_id` FOREIGN KEY (`account_id`) REFERENCES `ohana_account` (`account_id`);

--
-- Constraints for table `ohana_vaccine_records`
--
ALTER TABLE `ohana_vaccine_records`
  ADD CONSTRAINT `fk_vaccine_pet_reference` FOREIGN KEY (`pet_reference`) REFERENCES `ohana_pet_profiles` (`pet_reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
