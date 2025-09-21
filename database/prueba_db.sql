-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2025 at 10:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prueba_db`
--

CREATE DATABASE IF NOT EXISTS `prueba_db` 
  DEFAULT CHARACTER SET utf8mb4 
  COLLATE utf8mb4_0900_ai_ci;

USE `prueba_db`;
-- --------------------------------------------------------

--
-- Table structure for table `aprendices`
--

CREATE TABLE IF NOT EXISTS  `aprendices` (
  `id` int NOT NULL,
  `primer_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `segundo_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `primer_apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `segundo_apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sexo` enum('masculino','femenino') NOT NULL,
  `Documento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_tipo_documento` int NOT NULL DEFAULT '0',
  `id_grupo_sanguineo` int NOT NULL DEFAULT '0',
  `id_programa` int NOT NULL DEFAULT '0',
  `ficha` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupo_sanguineo`
--

CREATE TABLE IF NOT EXISTS  `grupo_sanguineo` (
  `id` int NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grupo_sanguineo`
--

INSERT INTO `grupo_sanguineo` (`id`, `nombre_grupo`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `programa_formacion`
--

CREATE TABLE IF NOT EXISTS  `programa_formacion` (
  `id` int NOT NULL,
  `nombre_programa` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `programa_formacion`
--

INSERT INTO `programa_formacion` (`id`, `nombre_programa`) VALUES
(1, 'Análisis y desarrollo de software'),
(2, 'Talento Humano');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

CREATE TABLE IF NOT EXISTS  `tipo_documento` (
  `id` int NOT NULL,
  `tipo_documento` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo_documento`) VALUES
(1, 'Cedula'),
(2, 'Tarjeta de identidad'),
(3, 'Cedula extranjera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_aprendices_tipo_documento` (`id_tipo_documento`),
  ADD KEY `FK_aprendices_grupo_sanguineo` (`id_grupo_sanguineo`),
  ADD KEY `FK_aprendices_programa_formacion` (`id_programa`);

--
-- Indexes for table `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programa_formacion`
--
ALTER TABLE `programa_formacion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `programa_formacion`
--
ALTER TABLE `programa_formacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `FK_aprendices_grupo_sanguineo` FOREIGN KEY (`id_grupo_sanguineo`) REFERENCES `grupo_sanguineo` (`id`),
  ADD CONSTRAINT `FK_aprendices_programa_formacion` FOREIGN KEY (`id_programa`) REFERENCES `programa_formacion` (`id`),
  ADD CONSTRAINT `FK_aprendices_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
