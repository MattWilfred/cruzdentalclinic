-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2022 at 03:09 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cruzdentalclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `admin_first_name` varchar(20) NOT NULL,
  `admin_surname` varchar(20) NOT NULL,
  `admin_email_address` varchar(20) NOT NULL,
  `admin_contact_number` int(11) NOT NULL,
  `admin_birthdate` date NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `annc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`annc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `dentist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `treatment` text NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sched_id`),
  KEY `dentist_id_fk` (`dentist_id`),
  KEY `user_id_fk` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dentalbackground`
--

DROP TABLE IF EXISTS `dentalbackground`;
CREATE TABLE IF NOT EXISTS `dentalbackground` (
  `dental_background_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prev_treatment_problem` tinyint(4) DEFAULT NULL,
  `injury` tinyint(4) DEFAULT NULL,
  `dry_mouth` tinyint(4) DEFAULT NULL,
  `anesthetic_reaction` tinyint(4) DEFAULT NULL,
  `dentures` tinyint(4) DEFAULT NULL,
  `dental_implants` tinyint(4) DEFAULT NULL,
  `fixed_bridges` tinyint(4) DEFAULT NULL,
  `gum_periodontal` tinyint(4) DEFAULT NULL,
  `orthodontics` tinyint(4) DEFAULT NULL,
  `endodontics` tinyint(4) DEFAULT NULL,
  `extraction` tinyint(4) DEFAULT NULL,
  `bleaching` tinyint(4) DEFAULT NULL,
  `bad_breath` tinyint(4) DEFAULT NULL,
  `bleeding_gums` tinyint(4) DEFAULT NULL,
  `canker_sore` tinyint(4) DEFAULT NULL,
  `clicking_jaw` tinyint(4) DEFAULT NULL,
  `trapped_food` tinyint(4) DEFAULT NULL,
  `grinding_teeth` tinyint(4) DEFAULT NULL,
  `loose_teeth` tinyint(4) DEFAULT NULL,
  `broken_fillings` tinyint(4) DEFAULT NULL,
  `periodontal` tinyint(4) DEFAULT NULL,
  `cold_sensitivity` tinyint(4) DEFAULT NULL,
  `heat_sensitivity` tinyint(4) DEFAULT NULL,
  `sweet_sensitivity` tinyint(4) DEFAULT NULL,
  `biting_sensitivity` tinyint(4) DEFAULT NULL,
  `staining` tinyint(4) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`dental_background_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dentists`
--

DROP TABLE IF EXISTS `dentists`;
CREATE TABLE IF NOT EXISTS `dentists` (
  `dentist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dentist_first_name` varchar(20) NOT NULL,
  `dentist_surname` varchar(20) NOT NULL,
  `dentist_email_address` varchar(20) NOT NULL,
  `dentist_contact_number` int(11) NOT NULL,
  `dentist_gender` varchar(10) NOT NULL,
  `dentist_birthdate` date NOT NULL,
  `dentist_title` varchar(20) NOT NULL,
  PRIMARY KEY (`dentist_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT,
  `tooth_number` varchar(255) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`diagnosis_id`),
  KEY `userid_fk_diagnosis` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `tooth_number`, `findings`, `description`, `date_added`, `userid`) VALUES
(9, '13', 'Missing', 'Severe gum swelling', '2022-11-26 19:50:07', 28),
(10, '36-1st molar,37-2st molar,38', 'Root Fragment', 'Trauma by biting hard objects like ice or candy ', '2022-11-26 19:52:51', 35),
(11, '18', 'Fixed Partial Denture', 'Loosed metal clasps', '2022-11-26 19:54:41', 35),
(12, '12', 'Fracture', 'Trauma by hard objects like ice or candy.', '2022-11-27 21:05:42', 35),
(13, '11', 'Missing', 'Hit by a ball', '2022-11-27 21:39:07', 20);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

DROP TABLE IF EXISTS `holiday`;
CREATE TABLE IF NOT EXISTS `holiday` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicalbackground`
--

DROP TABLE IF EXISTS `medicalbackground`;
CREATE TABLE IF NOT EXISTS `medicalbackground` (
  `medicalbackground_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `aids` tinyint(4) DEFAULT NULL,
  `anemia` int(11) DEFAULT NULL,
  `arthritis` tinyint(1) DEFAULT NULL,
  `artificial_heart_valve` tinyint(1) DEFAULT NULL,
  `artificial_joint` tinyint(1) DEFAULT NULL,
  `asthma` tinyint(1) DEFAULT NULL,
  `back_problems` tinyint(1) DEFAULT NULL,
  `blood_disease` tinyint(1) DEFAULT NULL,
  `cancer` tinyint(1) DEFAULT NULL,
  `cancer_type` varchar(50) DEFAULT NULL,
  `chemo` tinyint(1) DEFAULT NULL,
  `circulation_problems` tinyint(1) DEFAULT NULL,
  `cortisone` tinyint(1) DEFAULT NULL,
  `cough` tinyint(1) DEFAULT NULL,
  `diabetes` tinyint(1) DEFAULT NULL,
  `emphysema` tinyint(1) DEFAULT NULL,
  `epilepsy` tinyint(1) DEFAULT NULL,
  `fainting` tinyint(1) DEFAULT NULL,
  `food_allergies` tinyint(1) DEFAULT NULL,
  `headaches` tinyint(1) DEFAULT NULL,
  `hearing_loss` tinyint(1) DEFAULT NULL,
  `heart_murmur` tinyint(1) DEFAULT NULL,
  `heart_problem` tinyint(1) DEFAULT NULL,
  `heart_problem_type` varchar(50) DEFAULT NULL,
  `hemophilia` tinyint(1) DEFAULT NULL,
  `herpes` tinyint(1) DEFAULT NULL,
  `hepatitis` tinyint(1) DEFAULT NULL,
  `high_blood` tinyint(1) DEFAULT NULL,
  `jaundice` tinyint(1) DEFAULT NULL,
  `jaw_pain` tinyint(1) DEFAULT NULL,
  `kidney_disease` tinyint(1) DEFAULT NULL,
  `liver_disease` tinyint(1) DEFAULT NULL,
  `low_blood` tinyint(1) DEFAULT NULL,
  `mitral_valve` tinyint(1) DEFAULT NULL,
  `nervous_prob` tinyint(1) DEFAULT NULL,
  `pacemaker` tinyint(1) DEFAULT NULL,
  `psychiatric_care` tinyint(1) DEFAULT NULL,
  `respiratory_disease` tinyint(1) DEFAULT NULL,
  `rheumatic_fever` tinyint(1) DEFAULT NULL,
  `seizure` tinyint(1) DEFAULT NULL,
  `shingles` tinyint(1) DEFAULT NULL,
  `shortness_breath` tinyint(1) DEFAULT NULL,
  `sinus_problems` tinyint(1) DEFAULT NULL,
  `skin_rash` tinyint(1) DEFAULT NULL,
  `stroke` tinyint(1) DEFAULT NULL,
  `surgical_implants` tinyint(1) DEFAULT NULL,
  `swelling` tinyint(1) DEFAULT NULL,
  `thyroid_problems` tinyint(1) DEFAULT NULL,
  `tuberculosis` tinyint(1) DEFAULT NULL,
  `ulcer` tinyint(1) DEFAULT NULL,
  `visual_impairment` tinyint(1) DEFAULT NULL,
  `other` tinyint(1) DEFAULT NULL,
  `other_type` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`medicalbackground_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patientbilling`
--

DROP TABLE IF EXISTS `patientbilling`;
CREATE TABLE IF NOT EXISTS `patientbilling` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Treatment` varchar(200) DEFAULT NULL,
  `TotalPayment` decimal(10,2) DEFAULT NULL,
  `Date_Added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `patient_first_name` varchar(20) NOT NULL,
  `patient_surname` varchar(20) NOT NULL,
  `patient_email_address` varchar(30) NOT NULL,
  `patient_contact_number` int(11) NOT NULL,
  `patient_address` varchar(50) NOT NULL,
  `patient_occupation` varchar(20) NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `patient_civil_status` varchar(15) DEFAULT NULL,
  `patient_religion` varchar(20) DEFAULT NULL,
  `patient_height` smallint(3) DEFAULT NULL,
  `patient_weight` decimal(5,2) DEFAULT NULL,
  `patient_birthdate` date NOT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_image` longblob NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `generic` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `duration` date NOT NULL,
  `notes` varchar(255) NOT NULL,
  `ptr_no` int(11) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `prescriptiondate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `procedureslist`
--

DROP TABLE IF EXISTS `procedureslist`;
CREATE TABLE IF NOT EXISTS `procedureslist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedures` varchar(255) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

DROP TABLE IF EXISTS `receptionists`;
CREATE TABLE IF NOT EXISTS `receptionists` (
  `receptionist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receptionist_first_name` varchar(20) NOT NULL,
  `receptionist_surname` varchar(20) NOT NULL,
  `receptionist_email_address` varchar(20) NOT NULL,
  `receptionist_contact_number` int(11) NOT NULL,
  `receptionist_birthdate` date NOT NULL,
  PRIMARY KEY (`receptionist_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

DROP TABLE IF EXISTS `referral`;
CREATE TABLE IF NOT EXISTS `referral` (
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `referral_image` longblob,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`referral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

DROP TABLE IF EXISTS `secretary`;
CREATE TABLE IF NOT EXISTS `secretary` (
  `secretary_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `secretary_first_name` varchar(20) NOT NULL,
  `secretary_surname` varchar(20) NOT NULL,
  `secretary_email_address` varchar(20) NOT NULL,
  `secretary_contact_number` int(11) NOT NULL,
  `secretary_gender` varchar(10) NOT NULL,
  `secretary_birthdate` date NOT NULL,
  PRIMARY KEY (`secretary_id`),
  KEY `user_id_fk_sec` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statement_of_account`
--

DROP TABLE IF EXISTS `statement_of_account`;
CREATE TABLE IF NOT EXISTS `statement_of_account` (
  `soa_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  PRIMARY KEY (`soa_id`),
  KEY `user_id_soa` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statement_of_account`
--

INSERT INTO `statement_of_account` (`soa_id`, `user_id`, `balance`) VALUES
(1, 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `soa_id` int(11) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `type_of_procedure` varchar(255) NOT NULL,
  `procedure_price` varchar(255) DEFAULT NULL,
  `other_charges` varchar(50) DEFAULT NULL,
  `other_charges_price` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `amount_paid` decimal(10,0) DEFAULT NULL,
  `transaction_type` varchar(20) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id_trans` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `soa_id`, `transaction_date`, `type_of_procedure`, `procedure_price`, `other_charges`, `other_charges_price`, `total_amount`, `amount_paid`, `transaction_type`, `status`) VALUES
(1, 35, 1, '2022-11-26', 'Dental Check-Up', '500', '', '0', '500', '500', 'FULL PAYMENT', 'FULLY PAID');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL,
  `accrole` text NOT NULL,
  `profilepicture` text,
  `status` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `paddress`, `birthdate`, `username`, `phonenumber`, `gender`, `email`, `userpassword`, `accrole`, `profilepicture`, `status`, `code`, `updated_time`) VALUES
(11, 'Marites', 'Cruz', 'Borol 1st Balagtas, Bulacan', '1970-10-20', 'maritescruz', '09223637580', 'Female', 'maritescruzdental@gmail.com', 'cruzdentalclinic', 'Dentist', NULL, 1, NULL, NULL),
(12, 'Janette', 'Cruz', 'Borol 1st Balagtas, Bulacan', '1970-10-21', 'janettecruz', '09223637580', 'Female', 'janettecruzdental@gmail.com', 'cruzdentalclinic', 'Dentist', NULL, 1, NULL, NULL),
(13, 'Sean', 'Galvez', 'Borol 1st Balagtas, Bulacan', '1970-10-22', 'seangalvez', '09223637580', 'Male', 'seangalvezdental@gmail.com', 'cruzdentalclinic', 'Dentist', NULL, 0, NULL, NULL),
(14, 'Mae', 'Santos', 'Borol 1st Balagtas, Bulacan', '1971-12-25', 'maesantos', '09223637580', 'Female', 'maesantosdental@gmail.com', 'cruzdentalclinic', 'Secretary', NULL, 1, NULL, NULL),
(15, 'Ana', 'Gonzales', 'Borol 1st Balagtas, Bulacan', '1980-12-20', 'anagonzales', '09223637580', 'Female', 'anagonzalesdental@gmail.com', 'cruzdentalclinic', 'Receptionist', NULL, 1, NULL, NULL),
(16, 'Irish', 'Bayubay', 'Poliwes', '2000-11-15', 'irishbayubay', '09561475407', 'Female', '2200679@slu.edu.ph', 'irishbayubay', 'Patient', NULL, 1, NULL, NULL),
(17, 'Christine Meg', 'Santos', 'Bakakeng Norte', '2001-01-13', 'megsantos', '09995722382', 'Female', '2205495@slu.edu.ph', 'megsantos', 'Patient', NULL, 1, NULL, NULL),
(18, 'Matt Wilfred', 'Salvador', 'Bonifacio Street', '1997-06-01', 'mattsalvador', '09667528054', 'Male', 'smattwilfred0601@gmail.com', 'mattsalvador', 'Patient', NULL, 1, NULL, NULL),
(19, 'Klyde ', 'Formoso', 'Phase 1 Bakakeng', '1999-03-20', 'klydeformoso', '09064923564', 'Male', '2190873@slu.edu.ph', 'klydeformoso', 'Patient', NULL, 1, NULL, NULL),
(20, 'Dhen Aaron', 'Arellano', 'La Union', '2000-03-11', 'dhenarellano', '09267286776', 'Male', '2191557@slu.edu.ph', 'dhenarellano', 'Patient', NULL, 1, NULL, NULL),
(21, 'Gerard ', 'Bernal', 'Phase 1 Bakakeng', '1999-08-17', 'gerardbernal', '09273795764', 'Male', '2190171@slu.edu.ph', 'gerardbernal', 'Patient', NULL, 1, NULL, NULL),
(22, 'Bryan Joshua', 'Bucu', 'Canada', '1998-12-31', 'bryanbucu', '09995722382', 'Male', '2191793@slu.edu.ph', 'bryanbucu', 'Patient', NULL, 1, NULL, NULL),
(23, 'Justin', 'Padunan', 'Baguio City', '1972-07-13', 'justinpadunan', '09261787958', 'Male', '2203222@slu.edu.ph', 'justinpan', 'Patient', NULL, 1, NULL, NULL),
(24, 'Christine ', 'Tuazon', 'Baguio city', '2012-11-09', 'christinetuazon', '09945634525', 'Female', 'christinetuazon@gmail.com', 'christazon', 'Patient', '', 1, NULL, NULL),
(25, 'Mike', 'Jordan', 'Baguio city', '2011-11-09', 'mikejordan', '09452358475', 'Male', 'mikejordan@gmail.com', 'mikejordan', 'Patient', '', 1, NULL, NULL),
(26, 'Daniel', 'Maximos', 'South Cotabato', '2009-01-09', 'danielmax', '09451061511', 'Male', 'danielmax@gmail.com', 'danielmax', 'Patient', '', 1, NULL, NULL),
(27, 'Peter', 'Parker', 'Palawan', '2000-11-09', 'paterparker', '09455409313', 'Male', 'peterparker@gmail.com', 'spiderboy', 'Patient', '', 1, NULL, NULL),
(28, 'Gerald', 'Anderson', 'Davao del Sur', '1997-11-18', 'geraldande', '09075777112', 'Male', 'geraldanderson@gmail.com', 'geraldanderson', 'Patient', '', 1, NULL, NULL),
(29, 'Bryan ', 'Cutao', 'Pampanga', '1999-07-29', 'bryan', '09477756322', 'Male', 'bryancutao@gmail.com', 'bryancuts', 'Patient', '', 0, NULL, NULL),
(30, 'Christian', 'Marasigan', 'Ilocos Sur', '1998-02-10', 'christian', '09075446312', 'Male', 'christianmars@gmail.com', 'christmars', 'Patient', '', 1, NULL, NULL),
(31, 'Matthew', 'Fernandez', 'Manila', '2002-06-07', 'matthew', '09054521212', 'Male', 'matthefernandez@gmail.com', 'mattewfer', 'Patient', '', 1, NULL, NULL),
(32, 'Leslie', 'Pugad', 'ilocos-sur', '2000-09-09', 'lala', '09165237294', 'Female', 'lesliepugad@gmail.com', 'moveitlala', 'Patient', '', 0, NULL, NULL),
(33, 'Michael', 'Jackstone', 'Lanao del Norte', '1983-09-13', 'michaelstone', '09007564312', 'Male', 'michaeljackstone@gmail.com', 'michaelhehe', 'Patient', '', 0, NULL, NULL),
(34, 'Cardo', 'Dalisay', 'Manila', '1985-05-13', 'cardo', '09785633265', 'Male', 'cardodalisay@gmail.com', 'cardodong', 'Patient', '', 1, NULL, NULL),
(35, 'Jose Marie', 'Chu', 'Bakakeng North', '1972-12-25', 'mariechan', '09253199854', 'Male', 'josemariechan@gmail.com', 'josemarie', 'Patient', '', 1, NULL, NULL),
(36, 'Reina', 'Lin', 'Baguio City', '1999-12-03', 'lin', '09054437611', 'Female', 'lin@gmail.com', 'lin11', 'Patient', '', 1, NULL, NULL),
(37, 'Devon', 'Crooks', 'Vigan city', '2009-07-09', 'devoncrooks', '09781142356', 'Female', 'devoncrooks@gmail.com', 'devoncrooks', 'Patient', '', 1, NULL, NULL),
(38, 'Ora', 'Pagac', 'Bulacan', '1997-01-13', 'orapagac', '09064552525', 'Male', 'orapagac@gmail.com', 'orapagac', 'Patient', '', 1, NULL, NULL),
(39, 'Rey ', 'Connery', 'Sampaloc', '1980-03-27', 'reycon', '09156638686', 'Male', 'renconnery@gmail.com', 'reycon', 'Patient', '', 1, NULL, NULL),
(40, 'Paddy', 'Pimblett', 'Ilocos Sur ', '1990-12-20', 'paddypimb', '09064521477', 'Male', 'paddythebaddy@gmail.com', 'paddypimb', 'Patient', '', 1, NULL, NULL),
(41, 'Frankie', 'Edgar', 'Bulakan, Bulacan', '1989-05-01', 'frankieedgar', '09156482659', 'Male', 'frankieedgar@gmail.com', 'frankedgar', 'Patient', '', 0, NULL, NULL),
(42, 'Mike', 'Wassawski', 'Ilocos Norte', '1999-08-14', 'mikeee', '09154565231', 'Male', 'mikewassawski@gmail.com', 'oneeyemike', 'Patient', '', 0, NULL, NULL),
(43, 'Albert', 'Martinez', 'Angeles Pampanga', '1995-11-02', 'albertmartinez', '09154453398', 'Male', 'albertmartinez@gmail.com', 'asiancutie', 'Patient', '', 1, NULL, NULL),
(44, 'Ador', 'Dalisay', 'Manila', '1985-01-11', 'adordalisay', '09063365214', 'Male', 'adordalisay@gmail.com', 'adorsabaw', 'Patient', '', 1, NULL, NULL),
(45, 'Jason', 'Myers', 'Bakakeng North', '1978-05-13', 'jasonmyers', '09150513022', 'Male', 'jasonmyers@gmail.com', 'jasonmyers', 'Patient', '', 1, NULL, NULL),
(46, 'Gerry', 'Lim', 'Baguio City', '1977-12-12', 'gerrylim', '09151152255', 'Male', 'gerrylim@gmail.com', 'gerrythesinger', 'Patient', '', 0, NULL, NULL),
(47, 'Allan', 'Leonardo', 'Phase 2 Bakakeng, Baguio City', '2006-08-16', 'allanleonardo', '9064553561', 'Male', 'allanleonardo@gmai.com', 'allanleonardo', 'Patient', NULL, 0, NULL, NULL),
(48, 'Jhorvin', 'Forbes', 'Sikatuna Street', '2010-08-01', 'jhorvs', '9054558877', 'Male', 'jhorvinforbes@gmail.com', 'jhorvinforbes', 'Patient', NULL, 0, NULL, NULL),
(49, 'Michael', 'Forbes', 'Bataan', '1983-08-31', 'michaelforbes2022', '9456327844', 'Male', 'michaelforbes2022@gmail.com', 'forbesmagazine', 'Patient', NULL, 0, NULL, NULL),
(50, 'Jade', 'Villar', 'Bulakan, Bulacan', '2009-04-09', 'jadevillar', '9156653012', 'Male', 'jadevillar01@gmail.com', 'jadevillar', 'Patient', NULL, 0, NULL, NULL),
(51, 'Ezekiel', 'Antiporda', 'Bulacan', '2002-08-17', 'ezekielantiporda', '09154632565', 'Male', 'ezekielantiporda@gmail.com', 'ezantiporda', 'Patient', NULL, 0, NULL, NULL),
(52, 'David', 'Norton', 'Bulacan', '2005-01-04', 'davidnorton', '9153694569', 'Male', 'davidnorton@gmail.com', 'davidnorton', 'Patient', NULL, 0, NULL, NULL),
(53, 'Michelle', 'Evangelista', 'Bulacan', '1999-07-11', 'michelle', '09063327852', 'Female', 'michelleevangelista@gmail.com', 'evangelista', 'Patient', NULL, 0, NULL, NULL),
(54, 'Aleyn', 'Caesar', 'Bulacan', '1994-03-16', 'aleyncy', '9164553265', 'Male', 'aleyncaesar@gmail.com', 'aleyncy123', 'Patient', NULL, 0, NULL, NULL),
(55, 'Dental', 'Administrator', 'Borol 1st Balagtas, Bulacan', '2022-11-27', 'admincruzdental', '09061523654', 'Male', 'cruzdentaladmin@gmail.com', 'cruzadministrator112722', 'Administrator', NULL, 1, NULL, NULL),
(56, 'Geremy', 'Tuclao', 'Bulacan', '2008-03-08', 'geremytuclao', '9146543210', 'Male', 'geremytuclao@gmail.com', 'geremytuclao', 'Patient', NULL, 0, NULL, NULL),
(57, 'Joshua', 'Aquino', 'Bulacan', '2000-05-11', 'joshuaaquino', '9164446598', 'Male', 'joshuaquino@gmail.com', 'joshuamoto', 'Patient', NULL, 0, NULL, NULL),
(58, 'Cristiano', 'Hernandez', 'Bulacan', '2010-06-16', 'cristiano', '9145632885', 'Male', 'cristianohernandez@gmail.com', 'cristianohernando', 'Patient', NULL, 0, NULL, NULL),
(59, 'Andrew', 'Garnett', 'Bulacan', '1990-07-17', 'andrew', '9143652322', 'Male', 'andrewgarnett@gmail.com', 'andrewgarnett', 'Patient', NULL, 0, NULL, NULL),
(60, 'Austin', 'Martinez', 'Bulacan', '1988-03-25', 'austin', '9487962356', 'Male', 'austinmartinez@gmail.com', 'austinmartin', 'Patient', NULL, 0, NULL, NULL),
(61, 'Gloria', 'Gascon', 'Bulacan', '1975-05-30', 'gloria', '9063652653', 'Female', 'gloriagascon@gmail.com', 'gloriagascon', 'Patient', NULL, 0, NULL, NULL),
(62, 'Kathryn', 'Santos', 'Bulacan', '1995-09-27', 'kathryn', '9165220587', 'Female', 'kathrynsantos@gmail.com', 'katsantos', 'Patient', NULL, 0, NULL, NULL),
(63, 'Katrina', 'Pugal', 'Bulacan', '1996-04-20', 'katrina', '9453651236', 'Female', 'katrinapugal@gmail.com', 'katrinapugal', 'Patient', NULL, 0, NULL, NULL),
(64, 'Amanda', 'Palomares', 'Bulacan', '2000-04-13', 'amanda', '9153658433', 'Female', 'amandapalomares@gmail.com', 'amandapalomares', 'Patient', NULL, 0, NULL, NULL),
(65, 'Kurt', 'Lumbania', 'Bulacan', '1994-09-22', 'kurtlum', '9167493698', 'Male', 'kurtlumbania@gmail.com', 'kurtlumbania', 'Patient', NULL, 0, NULL, NULL),
(66, 'Caryl', 'Salvador', 'Bulacan', '1999-11-12', 'caryl', '19156544565', 'Female', 'carylsalvador@gmail.com', 'caryl123', 'Patient', NULL, 0, NULL, NULL),
(67, 'Jecelito', 'Paiste', 'Bulacan', '1993-12-26', 'jecelito', '9154569878', 'Male', 'jecelitopaiste@gmail.com', 'jecelitopaiste', 'Patient', NULL, 0, NULL, NULL),
(68, 'Jeremiah', 'Galpo', 'Bulacan', '1996-04-30', 'jeremiah', '9156123645', 'Male', 'jeremiahgalpo@gmail.com', 'jeremiahgalpo123', 'Patient', NULL, 0, NULL, NULL),
(69, 'Klay', 'Marquez', 'Bulacan', '1991-05-19', 'klaymar', '9153210000', 'Male', 'klaymarquez@gmail.com', 'klaymarquez123', 'Patient', NULL, 0, NULL, NULL),
(70, 'Andrea', 'Gonzales', 'Bulacan', '2003-01-13', 'andrea', '9156548520', 'Female', 'andreagonzales@gmail.com', 'gonzalesandrea', 'Patient', NULL, 0, NULL, NULL),
(71, 'Angelo', 'Orio', 'Bulacan', '1997-06-04', 'angelorio', '9154557700', 'Male', 'angeloorio@gmail.com', 'angelorio', 'Patient', NULL, 0, NULL, NULL),
(72, 'Arlene', 'Sagucio', 'Bulacan', '1975-06-24', 'arlene', '9163693699', 'Female', 'arlenesagucio@gmail.com', 'arlenesagucio', 'Patient', NULL, 0, NULL, NULL),
(73, 'Patrick', 'Yeun', 'Bulacan', '1969-08-15', 'patrick', '9156546545', 'Male', 'patrickyeun@gmail.com', 'patrick123456', 'Patient', NULL, 0, NULL, NULL),
(74, 'Rodrigo', 'Padunan', 'Bulacan', '1966-12-30', 'rodrigo', '9157850323', 'Male', 'rodrigopadunan@gmail.com', 'rodrigopadunan123', 'Patient', NULL, 0, NULL, NULL),
(75, 'Catelyn', 'Smith', 'Bulacan', '1992-10-13', 'catelyn', '9062358881', 'Female', 'catelynsmith@gmail.com', 'catelynsmith', 'Patient', NULL, 0, NULL, NULL),
(76, 'Lucian', 'Fortuna', 'Bulacan', '1990-02-26', 'lucian', '9052319865', 'Male', 'lucianfortuna@gmail.com', 'lucianfortuna', 'Patient', NULL, 0, NULL, NULL),
(77, 'Kevin', 'Smith', 'Bulacan', '1988-03-22', 'kevinsmith', '9154583326', 'Male', 'kevinsmith@gmail.com', 'kevinsmith0123', 'Patient', NULL, 0, NULL, NULL),
(78, 'Cassandra', 'Chu', 'Bulacan', '1997-02-10', 'cassandrachu', '9156547895', 'Female', 'cassandrachu@gmail.com', 'cassandrachu123', 'Patient', NULL, 0, NULL, NULL),
(79, 'Danny', 'Padilla', 'Bulacan', '1984-03-20', 'dannypadilla', '9265487785', 'Male', 'dannypadilla@gmail.com', 'dannypadilla123', 'Patient', NULL, 0, NULL, NULL),
(80, 'Chris', 'Delos Santos', 'Bulacan', '1997-06-22', 'chrisdelossantos', '9156543745', 'Male', 'chrisdelossantos@gmail.com', 'chrissantos', 'Patient', NULL, 0, NULL, NULL),
(81, 'Gino', 'Padilla', 'Bulacan', '1978-11-27', 'ginopadilla', '9166547891', 'Male', 'ginopadilla@gmail.com', 'ginopadilla123', 'Patient', NULL, 0, NULL, NULL),
(82, 'Arthur', 'Querubin', 'Bulacan', '1972-12-01', 'arthurque', '9156587458', 'Male', 'arthurquerubin@gmail.com', 'arthurque123', 'Patient', NULL, 0, NULL, NULL),
(83, 'Sean', 'Cruz', 'Bulacan', '1997-09-22', 'seancruz', '9155489999', 'Male', 'seancruz@gmail.com', 'seancruz456', 'Patient', NULL, 0, NULL, NULL),
(84, 'Jonah', 'Montefalco', 'Bulacan', '1980-02-22', 'jonahmontefalco', '9155551212', 'Female', 'jonahmontefalco@gmail.com', 'jonahfalco123', 'Patient', NULL, 0, NULL, NULL),
(85, 'Yeshua', 'Altamirano', 'Bulacan', '1998-10-08', 'yeshua', '9156583120', 'Male', 'yeshuaaltamirano@gmail.com', 'yeshuajuswa', 'Patient', NULL, 0, NULL, NULL),
(86, 'Zarrick Amiel', 'Mercadejas', 'Bulacan', '1990-06-05', 'zarrickamiel', '9156503535', 'Male', 'amielmercadejas@gmail.com', 'zarrick2022', 'Patient', NULL, 0, NULL, NULL),
(87, 'Nels', 'Brown', 'Bulacan', '1972-12-20', 'brownnels', '09223634353', 'Male', 'brownnels@gmail.com', 'brownnels', 'Patient', NULL, 1, NULL, NULL),
(88, 'Eldridge', 'Howe', 'Bulacan', '1980-10-26', 'howeeldridge', '09222347580', 'Male', 'howeeldridge@gmail.com', 'howeeldridge', 'Patient', NULL, 1, NULL, NULL),
(89, 'Lue', 'Casper', 'Bulacan', '1990-01-22', 'casperlue', '09383644551', 'Male', 'casperlue@gmail.com', 'casperlue', 'Patient', NULL, 0, NULL, NULL),
(90, 'Maritza', 'Blick', 'Bulacan', '1991-12-25', 'blickmaritza', '09377723303', 'Female', 'blickmaritza@gmail.com', 'blickmaritza', 'Patient', NULL, 1, NULL, NULL),
(91, 'Eli', 'Leannon', 'Bulacan', '2000-12-20', 'elileannon', '09375749554', 'Female', 'elileannon@gmail.com', 'elileannon', 'Patient', NULL, 1, NULL, NULL),
(92, 'Romaguera', 'Bruce', 'Bulacan', '1990-11-30', 'bruceroma', '09561475407', 'Male', 'bruceroma@gmail.com', 'bruceroma', 'Patient', NULL, 1, NULL, NULL),
(93, 'Connelly', 'Thelma', 'Bulacan', '2000-04-13', 'thelmacon', '09354038311', 'Female', 'thelmacon@gmail.com', 'thelmacon', 'Patient', NULL, 1, NULL, NULL),
(94, 'Claire', 'Scheider', 'Bulacan', '1997-08-02', 'clairescheid', '09348117063', 'Female', 'clairescheid@gmail.com', 'clairescheid', 'Patient', NULL, 1, NULL, NULL),
(95, 'Johnny', 'Skiles', 'Bulacan', '2000-03-20', 'johnnyski', '09344169564', 'Male', 'johnnyski@gmail.com', 'johnnyski', 'Patient', NULL, 1, NULL, NULL),
(96, 'Hakey', 'Waelchi', 'Bulacan', '2002-03-11', 'hakeywaelchi', '09338248316', 'Male', 'hakeywaelchi@gmail.com', 'hakeywaelchi', 'Patient', NULL, 1, NULL, NULL),
(97, 'Montana', 'Beatty', 'Bulacan', '2000-09-30', 'montanabeat', '09273795764', 'Female', 'montanabeat@gmail.com', 'montanabeat', 'Patient', NULL, 1, NULL, NULL),
(98, 'Jodie', 'McLaughlin', 'Bulacan', '2003-10-17', 'jodiemclaugh', '09273795764', 'Female', 'jodiemclaugh@gmail.com', 'jodiemclaugh', 'Patient', NULL, 1, NULL, NULL),
(99, 'Minnie', 'Veum', 'Bulacan', '1980-11-17', 'minnieveum', '09330353319', 'Female', 'minnieveum@gmail.com', 'minnieveum', 'Patient', NULL, 1, NULL, NULL),
(100, 'Shyann', 'Haley', 'Bulacan', '2000-12-23', 'shyhaley', '09273795764', 'Feale', 'shyhaley@gmail.com', 'shyhaley', 'Patient', NULL, 1, NULL, NULL),
(101, 'Reyna', 'Hermann', 'Bulacan', '1999-01-17', 'reynahermann', '09314563324', 'Female', 'reynahermann@gmail.com', 'reynahermann', 'Patient', NULL, 1, NULL, NULL),
(102, 'Jan Michael', 'Lim', 'San Fernando City', '1981-12-11', 'jamich', '0915112255', 'Male', 'jamich@gmail.com', 'jamich123', 'Patient', '', 0, NULL, NULL),
(103, 'Jonathan', 'Kamingga', 'Dagupan City', '1992-01-01', 'jkamingga', '09161152255', 'Male', 'kamingga@gmail.com', 'jkamingga0101', 'Patient', '', 0, NULL, NULL),
(104, 'Stephen', 'Thompson', 'Mabalacat Pampangga', '1995-02-01', 'stephT', '09163152255', 'Male', 'stephson@gmail.com', 'stephson0201', 'Patient', '', 0, NULL, NULL),
(105, 'Jericho', 'Valdez', 'Dagupan City', '1997-01-01', 'jvaaldez', '09161252255', 'Male', 'jvaldez@gmail.com', 'jvaldez0124', 'Patient', '', 0, NULL, NULL),
(106, 'Ron', 'Art', 'San Fernando City', '2000-03-03', 'ron0303', '09161152155', 'Male', 'ron03@gmail.com', 'ron0303', 'Patient', '', 0, NULL, NULL),
(107, 'Ron', 'Arthur', 'San Fernando City', '2000-03-03', 'ron0303', '09161152155', 'Male', 'ron03@gmail.com', 'ron0303', 'Patient', '', 0, NULL, NULL),
(108, 'Eric', 'Flores', 'San Fernando City', '2002-03-03', 'ericsakalam011', '09181152155', 'Male', 'eric03@gmail.com', 'eric03012', 'Patient', '', 0, NULL, NULL),
(109, 'Erica', 'Flores', 'San Fernando City', '2002-03-03', 'erickasakalam011', '09183322155', 'Female', 'ericka03@gmail.com', 'erika03012', 'Patient', '', 0, NULL, NULL),
(110, 'Marian', 'Panit', 'San Fernando City', '2004-03-03', 'marian02031', '091821152155', 'Female', 'MA_031@gmail.com', 'marian4354', 'Patient', '', 0, NULL, NULL),
(111, 'Jones', 'Galvan', 'Vigan City', '2002-05-02', 'jones3241', '091814312155', 'Male', 'joneskolang@gmail.com', 'mrjones0321', 'Patient', '', 0, NULL, NULL),
(112, 'Jm', 'Flores', 'Dagupan City', '2000-01-03', 'jm94213', '09261152155', 'Male', 'jm_sakalam@gmail.com', 'jmthegreatest0112', 'Patient', '', 0, NULL, NULL),
(113, 'Klyde', 'Nicolas', 'Irisan Baguio City', '2000-01-04', 'klydiee0322', '092611521232', 'Male', 'Klydiee0213@gmail.com', 'kldye03224', 'Patient', '', 0, NULL, NULL),
(114, 'Rica', 'Bucu', 'Pampanga', '2002-01-03', 'ricabucs021', '09262422155', 'Male', 'ricababes@gmail.com', 'ricathebest01', 'Patient', '', 0, NULL, NULL),
(115, 'Jm', 'Flores', 'Dagupan City', '2000-01-03', 'jm94213', '09261152155', 'Male', 'jm_sakalam@gmail.com', 'jmthegreatest0112', 'Patient', '', 0, NULL, NULL),
(116, 'Erika', 'Formoso', 'Vigan City', '2001-01-03', 'ericka241', '09261152234', 'Female', 'Ericka_1253@gmail.com', 'ericka23643', 'Patient', '', 0, NULL, NULL),
(117, 'Arlyn', 'Flores', 'Baguio City', '1992-01-03', 'arlyn03134', '09263242155', 'Female', 'arlynthegreat@gmail.com', 'greatestofall0311', 'Patient', '', 0, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`dentist_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `userid_fk_diagnosis` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `useridfkpatient` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `statement_of_account`
--
ALTER TABLE `statement_of_account`
  ADD CONSTRAINT `useridfk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
