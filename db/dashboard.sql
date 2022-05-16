-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 04:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `avatar_path`, `client_name`, `client_email`) VALUES
(1, 'logo', 'Unify', 'unify@test.com'),
(2, 'logo', 'Like Media Inc', 'likeManager@test.com'),
(5, 'logo', 'Smile holding', 'smile@test.com'),
(6, 'logo', 'Bon Ton', 'bonton@gmail.com'),
(9, 'logo', 'C Dounts LTD', 'donuts@test.com'),
(10, 'logo', 'Disperse', 'disperse@test.com'),
(11, 'logo', 'Securitas', 'securitas@test.com'),
(12, 'logo', 'Fruitas', 'fruitas@gmail.com'),
(13, 'logo', 'Gerty', 'gerty@test.com'),
(14, 'logo', 'Haerty', 'haerty@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220511083038', '2022-05-11 10:31:45', 64),
('DoctrineMigrations\\Version20220511093441', '2022-05-11 11:36:15', 108),
('DoctrineMigrations\\Version20220512084421', '2022-05-12 10:45:12', 592),
('DoctrineMigrations\\Version20220512084600', '2022-05-12 10:46:10', 193);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`) VALUES
(1, 'nele128@yahoo.com', '[\"ROLE_ADMIN\"] 	', '$2y$13$jFR27/njMYNLfO2NiSIX9u72zSaJxQWXisg1wk8dZl5pZV/7B2/Wa', 'Nebojsa', 'Basic Palkovic'),
(3, 'navi1962@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$pYJvkDUqvGzHKdRBcvlSd.Byagf5Bo.9h7ipjixpnaLUXMvFqC/pa', 'Ivan', 'Basic Palkovic'),
(4, 'marko88@yahoo.com', '[\"ROLE_DEVELOPER\"]', '$2y$13$cn73vvzZvNat7xB7.UTT4Ot1SLWU1.YqC5BxYlDug6xkUP4StJZbq', 'Marko', 'Markovic'),
(5, 'bojan91@gmail.com', '[\"ROLE_DEVELOPER\"]', '$2y$13$3XT1Az.jCO2oGOl9eFDFkekBO4pJDptCkdNAkhAjikV1rXPNeGS6S', 'Bojan', 'Istvancic'),
(6, 'milan80@yahoo.com', '[\"ROLE_DEVELOPER\"]', '$2y$13$qhYfvwrC7XsX3AfMaxymsOFv2SpZrSI4sFQlJUoEtB/uMRZ3Qkwmi', 'Milan', 'Bacic'),
(7, 'goran85@yahoo.com', '[\"ROLE_DEVELOPER\"]', '$2y$13$TwQiE.3d7/3HTfRTMdpqOO36TXQXnbNJPmrrBzCzqLU.IpK3vUkgm', 'Goran', 'Maric');

-- --------------------------------------------------------

--
-- Table structure for table `users_clients`
--

CREATE TABLE `users_clients` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `client_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- Indexes for table `users_clients`
--
ALTER TABLE `users_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F0C85ABE9D86650F` (`user_id_id`),
  ADD KEY `IDX_F0C85ABEDC2902E0` (`client_id_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_clients`
--
ALTER TABLE `users_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_clients`
--
ALTER TABLE `users_clients`
  ADD CONSTRAINT `FK_F0C85ABE9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_F0C85ABEDC2902E0` FOREIGN KEY (`client_id_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
