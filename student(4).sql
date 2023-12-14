-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 03:53 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Add_New_Student` (IN `InputName` VARCHAR(50), IN `InputAddress` VARCHAR(50))  BEGIN
    DECLARE LastID VARCHAR(6);
    DECLARE NewID VARCHAR(6);
    DECLARE VarName VARCHAR(50);
    DECLARE VarAddress VARCHAR(50);
    DECLARE FormattedID VARCHAR(11);
    SET VarName = InputName;
    SET VarAddress = InputAddress;
    
    SELECT SUBSTRING(ID_Number, -6) INTO LastID FROM student ORDER BY ID_Number DESC LIMIT 1;
    
    SET NewID = CAST(LastID AS INT) + 1;
	SET NewID = CAST(NewID AS VARCHAR(6));

	SET FormattedID = CONCAT('2023-', NewID);
	SELECT FormattedID;

	INSERT INTO `student`(`ID_Number`, `Name`, `Address`) VALUES (FormattedID,VarName,VarAddress);
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Get_LastID` ()  BEGIN
    SELECT SUBSTRING(ID_Number, -6) AS Incrementing_Numbers
    FROM student
    ORDER BY ID_Number DESC
    LIMIT 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_ID` int(6) NOT NULL,
  `student_name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_ID`, `student_name`, `email`, `phone`) VALUES
(5, 'Jose Rizal', NULL, '1234567890'),
(6, 'Andres Bonifacio', NULL, '9876543210'),
(7, 'Emilio Aguinaldo', NULL, '5555555555'),
(8, 'Lapu Lapu', NULL, '9999999999'),
(9, 'Apolinario Mabini', NULL, '1111111111'),
(10, 'Antonio Luna', NULL, '2222222222'),
(11, 'Jose Jacinto', NULL, '3333333333'),
(12, 'Gregorio Del Pilar', NULL, '4444444444'),
(13, 'Jose Rizal', NULL, '1234567890'),
(14, 'Andres Bonifacio', NULL, '9876543210'),
(15, 'Vinsmoke Sanji', 'baratie@gmail.com', '0999999999'),
(16, 'Joyboy', 'OnePiece@gmail.com', '0999999999');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `username`, `password`) VALUES
(1, 'rizal', 'password1'),
(2, 'bonifacio', 'password2'),
(3, 'aguinaldo', 'password3'),
(4, 'lapulapu', 'password4'),
(5, 'mabini', 'password5'),
(6, 'luna', 'password6'),
(7, 'jacinto', 'password7'),
(8, 'delapilar', 'password8'),
(9, 'rizal2', 'password9'),
(10, 'bonifacio2', 'password10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
