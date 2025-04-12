-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 02:11 PM
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
-- Database: `migagrometer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `Allowed_farm` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_number` varchar(255) NOT NULL,
  `User_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `Allowed_farm`, `Password`, `Phone_number`, `User_name`) VALUES
(1, 'All', 'Surafelsky@3', '0962251081', 'Mekduyewa'),
(2, 'All', 'Surafelsky@3', '0962251081', 'Surafel');

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_beha`
--

CREATE TABLE `agriceft_beha` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agriceft_beha`
--

INSERT INTO `agriceft_beha` (`ID`, `Record_date`, `Precipitation`, `Additional_information`, `Farm_name`) VALUES
(3, '2025-02-28', '23', '', 'agriceft_beha'),
(4, '2025-02-27', '17', '', 'agriceft_beha'),
(5, '2025-02-25', '26', '', 'agriceft_beha'),
(6, '2025-02-23', '20', '', 'agriceft_beha'),
(7, '2025-02-21', '28', '', 'agriceft_beha'),
(8, '2025-02-19', '23', '', 'agriceft_beha'),
(9, '2025-02-17', '18', '', 'agriceft_beha'),
(10, '2025-02-16', '22', '', 'agriceft_beha'),
(11, '2025-02-14', '17', '', 'agriceft_beha'),
(12, '2025-02-15', '29', '', 'agriceft_beha'),
(13, '2025-01-22', '30', '', 'agriceft_beha'),
(14, '2024-12-25', '30', '', 'agriceft_beha'),
(15, '2024-11-20', '19', '', 'agriceft_beha'),
(16, '2024-06-02', '30', '', 'agriceft_beha'),
(17, '2023-06-02', '22', '', 'agriceft_beha'),
(18, '2022-02-02', '32', '', 'agriceft_beha'),
(19, '2025-04-09', '30', '', 'agriceft_beha');

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_duyina_unit_01`
--

CREATE TABLE `agriceft_duyina_unit_01` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_duyina_unit_02`
--

CREATE TABLE `agriceft_duyina_unit_02` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_duyina_unit_03`
--

CREATE TABLE `agriceft_duyina_unit_03` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_duyina_unit_04`
--

CREATE TABLE `agriceft_duyina_unit_04` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumadero_unit_01`
--

CREATE TABLE `agriceft_gumadero_unit_01` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumadero_unit_02`
--

CREATE TABLE `agriceft_gumadero_unit_02` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumadero_unit_03`
--

CREATE TABLE `agriceft_gumadero_unit_03` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumadero_unit_04`
--

CREATE TABLE `agriceft_gumadero_unit_04` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumero_unit_01`
--

CREATE TABLE `agriceft_gumero_unit_01` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumero_unit_02`
--

CREATE TABLE `agriceft_gumero_unit_02` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_gumero_unit_03`
--

CREATE TABLE `agriceft_gumero_unit_03` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_wush_wush_unit_01`
--

CREATE TABLE `agriceft_wush_wush_unit_01` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_wush_wush_unit_02`
--

CREATE TABLE `agriceft_wush_wush_unit_02` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriceft_wush_wush_unit_03`
--

CREATE TABLE `agriceft_wush_wush_unit_03` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora`
--

CREATE TABLE `elfora` (
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL DEFAULT 'N/A',
  `Farm_name` varchar(255) NOT NULL,
  `ID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elfora`
--

INSERT INTO `elfora` (`Record_date`, `Precipitation`, `Additional_information`, `Farm_name`, `ID`) VALUES
('2025-01-30', '30', '', 'Elfora / Holeta', 58),
('2025-01-29', '28', '', 'Elfora / Holeta', 59),
('2025-01-28', '28', '', 'Elfora / Bishoftu', 60),
('2025-01-27', '27', '', 'Elfora / Holeta', 61),
('2025-01-26', '26', '', 'Elfora / Holeta', 62),
('2025-01-25', '25', '', 'Elfora / Holeta', 63),
('2025-01-24', '24', '', 'Elfora / Holeta', 64),
('2025-01-23', '23', '', 'Elfora / Holeta', 65),
('2025-01-22', '22', '', 'Elfora / Holeta', 66),
('2025-01-21', '15', '', 'Elfora / Holeta', 67),
('2024-12-23', '45', '', 'Elfora / Holeta', 68),
('2024-12-18', '33', '', 'Elfora / Holeta', 69),
('2024-11-20', '30', '', 'Elfora / Holeta', 70),
('2024-11-21', '34', '', 'Elfora / Bishoftu', 71),
('2024-12-16', '43', '', 'Elfora / Holeta', 72),
('2024-11-26', '24', '', 'Elfora / Holeta', 73),
('2024-11-11', '32', '', 'Elfora / Holeta', 74),
('2024-11-16', '30', '', 'Elfora / Holeta', 75),
('2024-10-02', '31', '', 'Elfora / Holeta', 76),
('2025-01-01', '26', '', 'Elfora / Bishoftu', 77);

-- --------------------------------------------------------

--
-- Table structure for table `elfora_chefa`
--

CREATE TABLE `elfora_chefa` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora_melga`
--

CREATE TABLE `elfora_melga` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora_shallo_av`
--

CREATE TABLE `elfora_shallo_av` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora_shallo_unit_1`
--

CREATE TABLE `elfora_shallo_unit_1` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora_shallo_unit_2`
--

CREATE TABLE `elfora_shallo_unit_2` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora_shallo_unit_3`
--

CREATE TABLE `elfora_shallo_unit_3` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elfora_shallo_unit_4`
--

CREATE TABLE `elfora_shallo_unit_4` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_bebeka_farm_01`
--

CREATE TABLE `horizon_bebeka_farm_01` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_bebeka_farm_02`
--

CREATE TABLE `horizon_bebeka_farm_02` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_bebeka_farm_03`
--

CREATE TABLE `horizon_bebeka_farm_03` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_bebeka_farm_04`
--

CREATE TABLE `horizon_bebeka_farm_04` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_bebeka_farm_05`
--

CREATE TABLE `horizon_bebeka_farm_05` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_cheleleki`
--

CREATE TABLE `horizon_cheleleki` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_gojeb`
--

CREATE TABLE `horizon_gojeb` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_goma_1_05`
--

CREATE TABLE `horizon_goma_1_05` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_goma_1_mo`
--

CREATE TABLE `horizon_goma_1_mo` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_goma_2`
--

CREATE TABLE `horizon_goma_2` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_gumer`
--

CREATE TABLE `horizon_gumer` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_kossa_algie`
--

CREATE TABLE `horizon_kossa_algie` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_kossa_dembi`
--

CREATE TABLE `horizon_kossa_dembi` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_kossa_gurumu`
--

CREATE TABLE `horizon_kossa_gurumu` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_kossa_office`
--

CREATE TABLE `horizon_kossa_office` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_sentu_central`
--

CREATE TABLE `horizon_sentu_central` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_sentu_gijeb`
--

CREATE TABLE `horizon_sentu_gijeb` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horizon_sentu_tenebo`
--

CREATE TABLE `horizon_sentu_tenebo` (
  `ID` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jitu_jitu_bishoftu`
--

CREATE TABLE `jitu_jitu_bishoftu` (
  `ID` int(11) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Record_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jitu_jitu_holeta`
--

CREATE TABLE `jitu_jitu_holeta` (
  `ID` int(11) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Record_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jitu_jitu_koka`
--

CREATE TABLE `jitu_jitu_koka` (
  `ID` int(11) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Record_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jitu_jitu_tkurwha`
--

CREATE TABLE `jitu_jitu_tkurwha` (
  `ID` int(11) NOT NULL,
  `Additional_information` varchar(255) NOT NULL,
  `Farm_name` varchar(255) NOT NULL,
  `Precipitation` varchar(255) NOT NULL,
  `Record_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jitu_jitu_tkurwha`
--

INSERT INTO `jitu_jitu_tkurwha` (`ID`, `Additional_information`, `Farm_name`, `Precipitation`, `Record_date`) VALUES
(1, '', 'jitu_jitu_tkurwha', '23', '2025-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `ID` int(11) NOT NULL,
  `Allowed_farm` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_number` varchar(255) NOT NULL,
  `User_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`ID`, `Allowed_farm`, `Password`, `Phone_number`, `User_name`) VALUES
(7, 'agriceft_duyina_unit_01', 'hihi', '0962251081', 'Kirubel'),
(11, 'agriceft_beha', 'Surafelsky@3', '0962251081', 'Surafel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `farms_allowed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `farms_allowed`) VALUES
(1, 'Kirubel', 'Kirubelsky@3', 'agriceft_beha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_beha`
--
ALTER TABLE `agriceft_beha`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_duyina_unit_01`
--
ALTER TABLE `agriceft_duyina_unit_01`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_duyina_unit_02`
--
ALTER TABLE `agriceft_duyina_unit_02`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_duyina_unit_03`
--
ALTER TABLE `agriceft_duyina_unit_03`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_duyina_unit_04`
--
ALTER TABLE `agriceft_duyina_unit_04`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumadero_unit_01`
--
ALTER TABLE `agriceft_gumadero_unit_01`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumadero_unit_02`
--
ALTER TABLE `agriceft_gumadero_unit_02`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumadero_unit_03`
--
ALTER TABLE `agriceft_gumadero_unit_03`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumadero_unit_04`
--
ALTER TABLE `agriceft_gumadero_unit_04`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumero_unit_01`
--
ALTER TABLE `agriceft_gumero_unit_01`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumero_unit_02`
--
ALTER TABLE `agriceft_gumero_unit_02`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_gumero_unit_03`
--
ALTER TABLE `agriceft_gumero_unit_03`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_wush_wush_unit_01`
--
ALTER TABLE `agriceft_wush_wush_unit_01`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_wush_wush_unit_02`
--
ALTER TABLE `agriceft_wush_wush_unit_02`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agriceft_wush_wush_unit_03`
--
ALTER TABLE `agriceft_wush_wush_unit_03`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora`
--
ALTER TABLE `elfora`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_chefa`
--
ALTER TABLE `elfora_chefa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_melga`
--
ALTER TABLE `elfora_melga`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_shallo_av`
--
ALTER TABLE `elfora_shallo_av`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_shallo_unit_1`
--
ALTER TABLE `elfora_shallo_unit_1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_shallo_unit_2`
--
ALTER TABLE `elfora_shallo_unit_2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_shallo_unit_3`
--
ALTER TABLE `elfora_shallo_unit_3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elfora_shallo_unit_4`
--
ALTER TABLE `elfora_shallo_unit_4`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_bebeka_farm_01`
--
ALTER TABLE `horizon_bebeka_farm_01`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_bebeka_farm_02`
--
ALTER TABLE `horizon_bebeka_farm_02`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_bebeka_farm_03`
--
ALTER TABLE `horizon_bebeka_farm_03`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_bebeka_farm_04`
--
ALTER TABLE `horizon_bebeka_farm_04`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_bebeka_farm_05`
--
ALTER TABLE `horizon_bebeka_farm_05`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_cheleleki`
--
ALTER TABLE `horizon_cheleleki`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_gojeb`
--
ALTER TABLE `horizon_gojeb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_goma_1_05`
--
ALTER TABLE `horizon_goma_1_05`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_goma_1_mo`
--
ALTER TABLE `horizon_goma_1_mo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_goma_2`
--
ALTER TABLE `horizon_goma_2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_gumer`
--
ALTER TABLE `horizon_gumer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_kossa_algie`
--
ALTER TABLE `horizon_kossa_algie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_kossa_dembi`
--
ALTER TABLE `horizon_kossa_dembi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_kossa_gurumu`
--
ALTER TABLE `horizon_kossa_gurumu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_kossa_office`
--
ALTER TABLE `horizon_kossa_office`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_sentu_central`
--
ALTER TABLE `horizon_sentu_central`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_sentu_gijeb`
--
ALTER TABLE `horizon_sentu_gijeb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `horizon_sentu_tenebo`
--
ALTER TABLE `horizon_sentu_tenebo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jitu_jitu_bishoftu`
--
ALTER TABLE `jitu_jitu_bishoftu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jitu_jitu_holeta`
--
ALTER TABLE `jitu_jitu_holeta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jitu_jitu_koka`
--
ALTER TABLE `jitu_jitu_koka`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jitu_jitu_tkurwha`
--
ALTER TABLE `jitu_jitu_tkurwha`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agriceft_beha`
--
ALTER TABLE `agriceft_beha`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `agriceft_duyina_unit_01`
--
ALTER TABLE `agriceft_duyina_unit_01`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_duyina_unit_02`
--
ALTER TABLE `agriceft_duyina_unit_02`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_duyina_unit_03`
--
ALTER TABLE `agriceft_duyina_unit_03`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_duyina_unit_04`
--
ALTER TABLE `agriceft_duyina_unit_04`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumadero_unit_01`
--
ALTER TABLE `agriceft_gumadero_unit_01`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumadero_unit_02`
--
ALTER TABLE `agriceft_gumadero_unit_02`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumadero_unit_03`
--
ALTER TABLE `agriceft_gumadero_unit_03`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumadero_unit_04`
--
ALTER TABLE `agriceft_gumadero_unit_04`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumero_unit_01`
--
ALTER TABLE `agriceft_gumero_unit_01`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumero_unit_02`
--
ALTER TABLE `agriceft_gumero_unit_02`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_gumero_unit_03`
--
ALTER TABLE `agriceft_gumero_unit_03`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_wush_wush_unit_01`
--
ALTER TABLE `agriceft_wush_wush_unit_01`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_wush_wush_unit_02`
--
ALTER TABLE `agriceft_wush_wush_unit_02`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriceft_wush_wush_unit_03`
--
ALTER TABLE `agriceft_wush_wush_unit_03`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora`
--
ALTER TABLE `elfora`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `elfora_chefa`
--
ALTER TABLE `elfora_chefa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora_melga`
--
ALTER TABLE `elfora_melga`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora_shallo_av`
--
ALTER TABLE `elfora_shallo_av`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora_shallo_unit_1`
--
ALTER TABLE `elfora_shallo_unit_1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora_shallo_unit_2`
--
ALTER TABLE `elfora_shallo_unit_2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora_shallo_unit_3`
--
ALTER TABLE `elfora_shallo_unit_3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfora_shallo_unit_4`
--
ALTER TABLE `elfora_shallo_unit_4`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_bebeka_farm_01`
--
ALTER TABLE `horizon_bebeka_farm_01`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_bebeka_farm_02`
--
ALTER TABLE `horizon_bebeka_farm_02`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_bebeka_farm_03`
--
ALTER TABLE `horizon_bebeka_farm_03`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_bebeka_farm_04`
--
ALTER TABLE `horizon_bebeka_farm_04`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_bebeka_farm_05`
--
ALTER TABLE `horizon_bebeka_farm_05`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_cheleleki`
--
ALTER TABLE `horizon_cheleleki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_gojeb`
--
ALTER TABLE `horizon_gojeb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_goma_1_05`
--
ALTER TABLE `horizon_goma_1_05`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_goma_1_mo`
--
ALTER TABLE `horizon_goma_1_mo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_goma_2`
--
ALTER TABLE `horizon_goma_2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_gumer`
--
ALTER TABLE `horizon_gumer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_kossa_algie`
--
ALTER TABLE `horizon_kossa_algie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_kossa_dembi`
--
ALTER TABLE `horizon_kossa_dembi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_kossa_gurumu`
--
ALTER TABLE `horizon_kossa_gurumu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_kossa_office`
--
ALTER TABLE `horizon_kossa_office`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_sentu_central`
--
ALTER TABLE `horizon_sentu_central`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_sentu_gijeb`
--
ALTER TABLE `horizon_sentu_gijeb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horizon_sentu_tenebo`
--
ALTER TABLE `horizon_sentu_tenebo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jitu_jitu_bishoftu`
--
ALTER TABLE `jitu_jitu_bishoftu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jitu_jitu_holeta`
--
ALTER TABLE `jitu_jitu_holeta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jitu_jitu_koka`
--
ALTER TABLE `jitu_jitu_koka`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jitu_jitu_tkurwha`
--
ALTER TABLE `jitu_jitu_tkurwha`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
