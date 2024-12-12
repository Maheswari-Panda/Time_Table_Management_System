-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 08:14 AM
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
-- Database: `ttm`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `Academic_Year_Id` int(11) NOT NULL,
  `Academic_Year_From` date NOT NULL,
  `Academic_Year_To` date NOT NULL,
  `Faculty_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`Academic_Year_Id`, `Academic_Year_From`, `Academic_Year_To`, `Faculty_Id`) VALUES
(0, '2024-06-14', '2025-05-20', 3),
(2, '2024-06-10', '2025-05-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `Batch_Id` int(11) NOT NULL,
  `Batch_Code` varchar(50) NOT NULL,
  `Batch_Name` varchar(100) NOT NULL,
  `No_Of_Students` int(11) NOT NULL CHECK (`No_Of_Students` > 0),
  `Division_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`Batch_Id`, `Batch_Code`, `Batch_Name`, `No_Of_Students`, `Division_Id`) VALUES
(1, 'A', 'A', 20, 1),
(2, 'B', 'B', 20, 1),
(3, 'C', 'C', 20, 1),
(4, 'A', 'A', 20, 2),
(5, 'B', 'B', 20, 2),
(6, 'C', 'C', 20, 2),
(7, 'A', 'A', 15, 4),
(8, 'B', 'B', 15, 4),
(9, 'A', 'A', 20, 4),
(10, 'B', 'B', 20, 4),
(11, 'C', 'C', 20, 4),
(12, 'A', 'A', 20, 5),
(13, 'B', 'B', 20, 5),
(14, 'C', 'C', 20, 5),
(15, 'D', 'D', 20, 5),
(16, 'A', 'A', 20, 6),
(17, 'B', 'B', 20, 6),
(18, 'C', 'C', 20, 6),
(19, 'A', 'A', 20, 7),
(20, 'B', 'B', 20, 7),
(21, 'C', 'C', 20, 7),
(22, 'A', 'A', 20, 8),
(23, 'B', 'B', 20, 8),
(24, 'C', 'C', 20, 8),
(25, 'A', 'A', 20, 9),
(26, 'B', 'B', 20, 9),
(27, 'C', 'C', 20, 10),
(28, 'A', 'A', 20, 11),
(29, 'B', 'B', 20, 11),
(30, 'C', 'C', 20, 11),
(31, 'A', 'A', 20, 12),
(32, 'B', 'B', 20, 12),
(33, 'C', 'C', 20, 12),
(34, 'A', 'A', 20, 13),
(35, 'B', 'B', 20, 13),
(36, 'C', 'C', 20, 13),
(37, 'A', 'A', 20, 14),
(38, 'B', 'B', 20, 14),
(39, 'C', 'C', 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `class_semester`
--

CREATE TABLE `class_semester` (
  `Class_Id` int(11) NOT NULL,
  `Semester_Id` int(11) NOT NULL,
  `Class_Code` varchar(50) NOT NULL,
  `Class_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_semester`
--

INSERT INTO `class_semester` (`Class_Id`, `Semester_Id`, `Class_Code`, `Class_Name`) VALUES
(1, 1, 'BE-I', 'BE-I'),
(2, 6, 'MCA-I', 'MCA-I'),
(3, 2, 'BE-I', 'BE-I'),
(4, 10, 'BE-II', 'BE-II'),
(5, 11, 'BE-II', 'BE-II'),
(6, 12, 'BE-III', 'BE-III'),
(7, 13, 'BE-III', 'BE-III'),
(8, 14, 'BE-IV', 'BE-IV'),
(9, 15, 'BE-IV', 'BE-IV'),
(10, 7, 'MCA-I', 'MCA-I'),
(11, 8, 'MCA-II', 'MCA-II'),
(12, 9, 'MCA-II', 'MCA-II');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `Day_Id` int(11) NOT NULL,
  `Day_Code` varchar(50) NOT NULL,
  `Day_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`Day_Id`, `Day_Code`, `Day_Name`) VALUES
(1, 'MON', 'MONDAY'),
(2, 'TUE', 'TUESDAY'),
(3, 'WED', 'WEDNESDAY'),
(4, 'THUR', 'THURSDAY'),
(5, 'FRI', 'FRIDAY'),
(6, 'SAT', 'SATURDAY');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `Dean_Id` int(11) NOT NULL,
  `Dean_Name` varchar(100) NOT NULL,
  `Dean_Email` varchar(100) NOT NULL,
  `Teacher_Id` int(11) NOT NULL,
  `Faculty_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`Dean_Id`, `Dean_Name`, `Dean_Email`, `Teacher_Id`, `Faculty_Id`) VALUES
(2, 'Dhanesh Patel', 'dean-techo@msubaroda.ac.in', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_Id` int(11) NOT NULL,
  `Department_Code` varchar(50) NOT NULL,
  `Department_Name` varchar(100) NOT NULL,
  `Faculty_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_Id`, `Department_Code`, `Department_Name`, `Faculty_Id`) VALUES
(1, 'CSE', 'Computer Science and Engineering', 1),
(2, 'EE', 'Electrical Engineering', 1),
(3, 'ECE', 'Electronics  & Communication Engineering', 1),
(4, 'PHY', 'Department of Physics', 2),
(5, 'MATH', 'Department of Mathematics', 2),
(6, 'APHY', 'Applied Physics', 1),
(7, 'ACHM', 'Applied Chemistry', 1),
(8, 'AMSE', 'Applied Mechanics and Structural Engineering', 1),
(9, 'AMTH', 'Applied Mathematics', 1),
(10, 'ARCH', 'Architecture', 1),
(11, 'BECO', 'Business Economics', 1),
(15, 'CHME', 'Chemical Engineering', 1),
(16, 'CVLE', 'Civil Engineering', 1),
(17, 'MCHE', 'Mechanical Engineering', 1),
(18, 'MME', 'Metallurgical and Materials Engineering', 1),
(19, 'TCHE', 'Textile Chemistry', 1),
(20, 'TXTE', 'Textile Engineering', 1),
(21, 'WREMI', 'Water Resources Engineering and Management Institute (WREMI)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `Division_Id` int(11) NOT NULL,
  `Division_Code` varchar(50) NOT NULL,
  `Division_Name` varchar(100) NOT NULL,
  `Class_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`Division_Id`, `Division_Code`, `Division_Name`, `Class_Id`) VALUES
(1, 'DIV-I', 'DIV-I', 1),
(2, 'DIV-II', 'DIV-II', 1),
(4, 'DIV-I', 'DIV-I', 2),
(5, 'DIV-I', 'DIV-I', 3),
(6, 'DIV-I', 'DIV-I', 4),
(7, 'DIV-I', 'DIV-I', 5),
(8, 'DIV-I', 'DIV-I', 6),
(9, 'DIV-I', 'DIV-I', 7),
(10, 'DIV-I', 'DIV-I', 8),
(11, 'DIV-I', 'DIV-I', 9),
(12, 'DIV-I', 'DIV-I', 10),
(13, 'DIV-I', 'DIV-I', 11),
(14, 'DIV-I', 'DIV-I', 12);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `faculty_Code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_Code`) VALUES
(1, 'Faculty Of Technology and Engineering', 'FoTE'),
(2, 'Faculty of Science', 'FoS'),
(3, 'Faculty Of Commerce', 'FoC'),
(4, 'Faculty of Arts', 'FoA'),
(5, 'Faculty of Performing Arts', 'FoPA'),
(6, 'Faculty of Fine Arts', 'FoFA'),
(7, 'Faculty of Pharmacy', 'FoP'),
(8, 'Faculty of Medicine', 'FoM'),
(9, 'Faculty of Journalism and Communication', 'FoJC'),
(10, 'Faculty of Family and Community Science', 'FoFCS'),
(11, 'Faculty of Law', 'FoL'),
(13, 'Faculty of Education and Phsychology', 'FoEP'),
(14, 'Faculty of Social Work', 'FoSW');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `Hod_Id` int(11) NOT NULL,
  `Hod_Name` varchar(100) NOT NULL,
  `Hod_Email` varchar(100) NOT NULL,
  `Teacher_Id` int(11) NOT NULL,
  `Department_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`Hod_Id`, `Hod_Name`, `Hod_Email`, `Teacher_Id`, `Department_Id`) VALUES
(1, 'Prof. (Dr.) Apurva M. Shah', 'head-cse@msubaroda.ac.in', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_Id` int(11) NOT NULL,
  `Location_Code` varchar(50) NOT NULL,
  `Location_Name` varchar(100) NOT NULL,
  `Location_Description` varchar(255) DEFAULT NULL,
  `Capacity` int(11) NOT NULL CHECK (`Capacity` > 0),
  `Department_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_Id`, `Location_Code`, `Location_Name`, `Location_Description`, `Capacity`, `Department_Id`) VALUES
(1, 'NLAB', 'New Lab', 'First Floor, CSE dept, WINDOWS 8, PROJECTOR, PC', 60, 1),
(2, 'MAT LAB', 'Matrix Lab', 'First Floor CSE DEPT, LINUX OS, PROJECTOR', 20, 1),
(3, 'HPLAB', 'HP LAB', 'PC With HP WINDOWS 11', 20, 1),
(4, 'CCFLAB', 'CCF LAB', 'HP DESKTOPS,PROJECTOR', 20, 1),
(5, 'DLIB', 'Department Library', 'PROJECTOR', 30, 1),
(6, 'BE-II', 'BE-II', 'FIRST FLOOR,PROJECTOR', 80, 1),
(7, 'BE-III', 'BE-III', 'FIRST FLOOR,PROJECTOR', 80, 1),
(8, 'BE-IV', 'SMART CLASS BE-IV', 'FIRST FLOOR,PROJECTOR', 80, 1),
(9, 'ADVLAB', 'ADVANCED LAB', 'GROUND FLOOR', 40, 1),
(10, 'MCA-I', 'MCA-I', 'FIRST FLOOR,PROJECTOR', 40, 1),
(11, 'MCA-II', 'MCA-II', 'FIRST FLOOR,PROJECTOR', 40, 1),
(12, 'SEMHALL', 'SEMINAR HALL', 'SECOND FLOOR, PROJECTOR,', 80, 1),
(13, 'JELAB', 'Juniour Electrical LAB', 'GROUND FLOOR,ELECTRICAL DEPARTMENT', 30, 2),
(14, 'ADCLAB', 'ADC LAB', 'FIRST FLOOR', 30, 2),
(15, 'DWH', 'DRAWING HALL', 'FIRST FLOOR', 80, 15),
(16, 'WRKS', 'WORKSHOP', 'GROUND FLOOR', 100, 17),
(17, 'FTG', 'FACULTY GROUND', 'FCEE LAB', 30, 16),
(18, 'BE-I', 'CSE BE-I', 'FIRST FLOOR', 60, 16),
(19, 'APHLAB', 'Applied Physics Lab', 'GROUND FLOOR, PHYSICS EQUIPMENTS', 30, 6);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Program_Id` int(11) NOT NULL,
  `Program_Code` varchar(50) NOT NULL,
  `Program_Name` varchar(100) NOT NULL,
  `Program_Type` enum('Undergraduate','Postgraduate','Diploma') NOT NULL,
  `Department_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Program_Id`, `Program_Code`, `Program_Name`, `Program_Type`, `Department_Id`) VALUES
(1, 'BE', 'Bachelor of Engineering in Computer Science', 'Undergraduate', 1),
(2, 'MCA', 'Master Of Computer Applications', 'Postgraduate', 1),
(4, 'BE', 'Bachelor of Engineering in Electrical Engineering', 'Undergraduate', 2),
(5, 'ME', 'Master of Engineering in Electrical Engineering', 'Postgraduate', 2),
(6, 'BSC', 'Bachelor of Science', 'Undergraduate', 4),
(7, 'MSC', 'Master of Science', 'Postgraduate', 4),
(8, 'PhD', 'Doctor of Philosophy', 'Postgraduate', 4),
(9, 'BSc', 'Bachelor of Science', 'Undergraduate', 5),
(10, 'PhD', 'Ph.D.', 'Postgraduate', 1),
(11, 'BE', 'Bachelor of Engineering in Textile Engineering', 'Undergraduate', 20),
(12, 'BE', 'Bachelor of Engineering in Textile Technology', 'Undergraduate', 20);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `Semester_Id` int(11) NOT NULL,
  `Semester_Code` varchar(50) NOT NULL,
  `Semester_Name` varchar(100) NOT NULL,
  `Program_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`Semester_Id`, `Semester_Code`, `Semester_Name`, `Program_Id`) VALUES
(1, 'FS BE-I', 'First Semester of BE-I', 1),
(2, 'SS BE-I', 'Second Semester of BE-I', 1),
(4, 'FS Bsc-I', 'First Year of Bsc', 6),
(5, 'SS Bsc', 'Second Semester of Bsc', 6),
(6, 'FS MCA-I', 'First Semester of MCA', 2),
(7, 'SS MCA-I', 'Second Semester of MCA', 2),
(8, 'FS MCA-II', 'First Semester of MCA-II', 2),
(9, 'SS MCA-II', 'Second Semester of MCA-II', 2),
(10, 'FS BE-II', 'First Semester of BE-II', 1),
(11, 'SS BE-II', 'Second Semester of BE-II', 1),
(12, 'FS BE-III', 'First Semester of BE-III', 1),
(13, 'SS BE-III', 'Second Semester of BE-III', 1),
(14, 'FS BE-IV', 'First Semester of BE-IV', 1),
(15, 'SS BE-IV', 'Second Semester of BE-IV', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slot_durations`
--

CREATE TABLE `slot_durations` (
  `duration_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slot_durations`
--

INSERT INTO `slot_durations` (`duration_id`, `start_time`, `end_time`) VALUES
(1, '10:00:00', '11:00:00'),
(2, '11:00:00', '12:00:00'),
(3, '12:00:00', '13:00:00'),
(4, '13:00:00', '14:00:00'),
(5, '14:30:00', '15:30:00'),
(6, '15:30:00', '16:30:00'),
(7, '16:30:00', '17:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_Id` bigint(20) NOT NULL,
  `Student_Name` varchar(100) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Student_Email` varchar(255) NOT NULL DEFAULT 'student-msu@gmail.com',
  `Student_Password` varchar(255) NOT NULL DEFAULT 'Student@123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `Student_Name`, `Class_Id`, `Student_Email`, `Student_Password`) VALUES
(0, 'Maheswari Panda', 8, 'maheswari123@gmial.com', 'Student@123'),
(8024050206, 'MANISHA GUPTA', 1, 'student-msu@gmail.com', 'Student@123'),
(8024050211, 'AYUSHI SHARMA', 1, 'student-msu@gmail.com', 'Student@123'),
(8024050223, 'RAJESH SHAH', 1, 'student-msu@gmail.com', 'Student@123'),
(8024050271, 'RITA RAO', 1, 'student-msu@gmail.com', 'Student@123');

-- --------------------------------------------------------

--
-- Table structure for table `student_elective_subject`
--

CREATE TABLE `student_elective_subject` (
  `Student_Id` bigint(20) NOT NULL,
  `Subject_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_elective_subject`
--

INSERT INTO `student_elective_subject` (`Student_Id`, `Subject_Id`) VALUES
(8024050206, 1),
(8024050206, 2),
(8024050211, 1),
(8024050211, 2),
(8024050271, 2),
(8024050271, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_Id` int(11) NOT NULL,
  `Subject_Code` varchar(50) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Is_Elective` tinyint(1) NOT NULL DEFAULT 0,
  `Elective_Code` varchar(50) DEFAULT NULL,
  `Elective_Name` varchar(100) DEFAULT NULL,
  `Is_Lecture` tinyint(1) NOT NULL DEFAULT 1,
  `Is_Lab` tinyint(1) NOT NULL DEFAULT 0,
  `Is_Tutorial` tinyint(1) NOT NULL DEFAULT 0,
  `Semester_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_Id`, `Subject_Code`, `Subject_Name`, `Is_Elective`, `Elective_Code`, `Elective_Name`, `Is_Lecture`, `Is_Lab`, `Is_Tutorial`, `Semester_Id`, `Class_Id`) VALUES
(1, 'AMT1101', 'Applied Mathematics-I', 0, NULL, NULL, 1, 0, 0, 1, 1),
(2, 'APH1101', 'Applied Physics-I', 0, NULL, NULL, 1, 1, 0, 1, 1),
(3, 'CVL1104', 'Fundamentals of Civil and Environmental Engineering', 0, NULL, NULL, 1, 1, 0, 1, 1),
(4, 'MEC1101', 'Engineering Drawing-I', 0, NULL, NULL, 1, 1, 0, 1, 1),
(5, 'MEC1102', 'Material Science', 0, NULL, NULL, 1, 0, 0, 1, 1),
(6, 'CSE1202', 'Programming in C and C++', 0, NULL, NULL, 1, 1, 0, 2, 3),
(7, 'AMT1201', 'Applied Mathematics-II', 0, NULL, NULL, 1, 0, 0, 2, 3),
(8, 'APH1202', 'Applied Physics-II', 0, NULL, NULL, 1, 1, 0, 2, 3),
(9, 'APM1202', 'Engineering Mechanics', 0, NULL, NULL, 1, 1, 0, 2, 3),
(10, 'ELE1206', 'Electrical Engineering & Machines', 0, NULL, NULL, 1, 1, 0, 2, 3),
(11, 'AMT1306', 'Applied Mathematics-III', 0, NULL, NULL, 1, 0, 0, 10, 4),
(12, 'AMT1309', 'Combinatorial Methods', 0, NULL, NULL, 1, 0, 0, 10, 4),
(13, 'CSE1301', 'Object Oriented Programming with Java', 0, NULL, NULL, 1, 1, 0, 10, 4),
(14, 'CSE1302', 'Data Structure', 0, NULL, NULL, 1, 1, 0, 10, 4),
(15, 'ELE1316', 'Electronics Engineering', 0, NULL, NULL, 1, 1, 0, 10, 4),
(16, 'ENG1003', 'Communication Skills', 0, NULL, NULL, 1, 1, 0, 10, 4),
(17, 'AMT1405', 'Applied Mathematics-IV', 0, NULL, NULL, 1, 0, 0, 11, 5),
(18, 'CSE1401', 'Database Management System', 0, NULL, NULL, 1, 1, 0, 11, 5),
(19, 'CSE1402', 'Design and Analysis of Algorithm', 0, NULL, NULL, 1, 1, 0, 11, 5),
(20, 'CSE1403', 'Digital Logic and Design', 0, NULL, NULL, 1, 1, 0, 11, 5),
(21, 'ELE1414', 'Analog and Digital Communication', 0, NULL, NULL, 1, 1, 0, 11, 5),
(22, 'CSE1501', 'Basics of Web Programming', 0, NULL, NULL, 1, 1, 0, 12, 6),
(23, 'CSE1502', 'Computer Graphics', 0, NULL, NULL, 1, 1, 0, 12, 6),
(24, 'CSE1503', 'Computer Organization', 0, NULL, NULL, 1, 1, 0, 12, 6),
(25, 'CSE1504', 'Theory of Computation', 0, NULL, NULL, 1, 0, 0, 12, 6),
(26, 'CSE1505', 'Engineering Economics', 0, NULL, NULL, 1, 0, 0, 12, 6),
(27, 'CSE1601', 'Compiler Design', 0, NULL, NULL, 1, 0, 0, 13, 7),
(28, 'CSE1602', 'Computer Networks', 0, NULL, NULL, 1, 1, 0, 13, 7),
(29, 'CSE1603', 'Operating System', 0, NULL, NULL, 1, 1, 0, 13, 7),
(30, 'CSE1604', 'Software Engineering', 0, NULL, NULL, 1, 0, 0, 13, 7),
(31, 'CSE1605', '.NET Technologies', 1, 'PE-I', 'Programming_Elective_I', 1, 1, 0, 13, 7),
(32, 'CSE1606', 'Advanced Java Technologies', 1, 'PE-I', 'Programming_Elective_I', 1, 1, 0, 13, 7),
(33, 'CSE1701', 'Microprocessor Architecture and Interfacing', 0, NULL, NULL, 1, 1, 0, 14, 8),
(34, 'CSE1702', 'Minor Project-I', 0, NULL, NULL, 0, 1, 0, 14, 8),
(35, 'CSE1703', 'Artificial Intelligence', 1, 'CE-I', 'Core_Elective_I', 1, 1, 0, 14, 8),
(36, 'CSE1704', 'Linux Administration & Network Programming', 1, 'CE-I', 'Core_Elective_I', 1, 1, 0, 14, 8),
(37, 'CSE1705', 'Statistics in Data Science', 1, 'CE-I', 'Core_Elective_I', 1, 1, 0, 14, 8),
(38, 'CSE1706', 'Data Warehousing & Data Mining', 1, 'CE-II', 'Core_Elective_II', 1, 1, 0, 14, 8),
(39, 'CSE1707', 'Distributed Systems', 1, 'CE-II', 'Core_Elective_II', 1, 1, 0, 14, 8),
(40, 'CSE1708', 'Network Security', 1, 'CE-II', 'Core_Elective_II', 1, 1, 0, 14, 8),
(41, 'CSE1709', 'Mobile Application Programming', 1, 'PE-II', 'Programming_Elective_II', 1, 1, 0, 14, 8),
(42, 'CSE1710', 'Python Programming', 1, 'PE-II', 'Programming_Elective_II', 1, 1, 0, 14, 8),
(43, 'CSE1801', 'Major Project', 0, NULL, NULL, 0, 1, 0, 15, 9),
(44, 'CSE1802', 'Minor Project-II', 0, NULL, NULL, 0, 1, 0, 15, 9),
(45, 'CSE1803', 'Big Data Analytics', 1, 'CE-III', 'Core_Elective_III', 1, 1, 0, 15, 9),
(46, 'CSE1804', 'Cloud Computing', 1, 'CE-III', 'Core_Elective_III', 1, 1, 0, 15, 9),
(47, 'CSE1805', 'Real Time Systems', 1, 'CE-III', 'Core_Elective_III', 1, 1, 0, 15, 9),
(48, 'CSE1806', 'Computer Vision and Applications', 1, 'CE-IV', 'Core_Elective_IV', 1, 1, 0, 15, 9),
(49, 'CSE1807', 'Machine Learning', 1, 'CE-IV', 'Core_Elective_IV', 1, 1, 0, 15, 9),
(50, 'CSE1808', 'Natural Language Processing', 1, 'CE-IV', 'Core_Elective_IV', 1, 1, 0, 15, 9),
(51, 'CSE1809', 'Internet Of Things', 1, 'CE-V', 'Core_Elective_V', 1, 1, 0, 15, 9),
(52, 'CSE1810', 'Mobile Computing', 1, 'CE-V', 'Core_Elective_V', 1, 1, 0, 15, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `Subject_Teacher_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Teacher_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`Subject_Teacher_Id`, `Subject_Id`, `Teacher_Id`) VALUES
(1, 6, 8),
(2, 1, 21),
(3, 1, 20),
(4, 7, 20),
(5, 7, 22),
(6, 11, 20),
(7, 11, 17),
(8, 12, 20),
(9, 12, 18),
(10, 17, 20),
(11, 17, 19),
(12, 2, 23),
(13, 2, 24),
(14, 8, 23),
(15, 8, 24),
(16, 9, 25),
(17, 9, 28),
(18, 13, 6),
(19, 14, 5),
(20, 18, 4),
(21, 19, 5),
(22, 20, 2),
(23, 22, 14),
(24, 23, 12),
(25, 24, 1),
(26, 24, 11),
(27, 25, 2),
(28, 26, 29),
(29, 27, 2),
(30, 28, 7),
(31, 29, 1),
(32, 29, 11),
(33, 30, 3),
(34, 31, 9),
(35, 32, 6),
(36, 33, 1),
(37, 33, 11),
(38, 34, 14),
(39, 35, 8),
(40, 36, 11),
(41, 36, 8),
(42, 37, 2),
(43, 37, 4),
(44, 38, 4),
(45, 38, 2),
(46, 39, 6),
(47, 40, 7),
(48, 41, 15),
(49, 42, 9),
(50, 43, 14),
(51, 44, 14),
(52, 45, 8),
(53, 46, 9),
(54, 47, 19),
(55, 48, 2),
(56, 49, 4),
(57, 50, 4),
(58, 51, 2),
(59, 52, 15),
(60, 3, 30),
(61, 3, 31),
(62, 3, 32),
(63, 3, 33),
(64, 10, 35),
(65, 10, 39),
(66, 15, 40),
(67, 15, 42),
(68, 21, 36),
(69, 21, 38),
(70, 21, 37),
(71, 4, 43),
(72, 4, 44),
(73, 5, 25),
(74, 5, 27),
(75, 5, 26),
(76, 16, 46);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_Id` int(11) NOT NULL,
  `Teacher_Code` varchar(50) NOT NULL,
  `Teacher_Name` varchar(100) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Department_Id` int(11) NOT NULL,
  `Teacher_Email` varchar(255) DEFAULT NULL,
  `Teacher_Password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'Teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_Id`, `Teacher_Code`, `Teacher_Name`, `Designation`, `Department_Id`, `Teacher_Email`, `Teacher_Password`, `role`) VALUES
(1, 'AS', 'Prof. (Dr.) Apurva M. Shah\r\n', 'HOD', 1, 'head-cse@msubaroda.ac.in', 'Hod@123', 'HOD'),
(2, 'HB', 'Hetal Bhavasar', 'Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(3, 'KV', 'Kamlesh Vaishnav', 'Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(4, 'AJ', 'Anjali G. Jivani', 'Associate Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(5, 'VK', 'Viral V. Kapadia', 'Associate Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(6, 'MP', 'Mamta C. Padole', 'Associate Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(7, 'KG', 'Mr. Kshitij U Gupte', 'Assistant Professor', 1, 'kshitij.gupte-cse@msubaroda.ac.in', 'Ttm@123', 'TTM'),
(8, 'JS', 'Jal Shah', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(9, 'MD', 'Meghna Tarun Desai', 'Temporary Assistant Professor', 1, 'meghnadesai123@gmail.com', 'Teacher@123', 'Teacher'),
(10, 'CS', 'Chaitali Shah', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(11, 'SK', 'Mr. Sunny Kamra', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(12, 'CB', 'Ms. Chaitali Bhoi', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(13, 'SM', 'Ms. Smita Mahajani', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(14, 'VSM', 'Ms. Vilas Sunny Machhi', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(15, 'PK', 'Prerna R Kadia', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(16, 'SP', 'Snehal Patel', 'Temporary Assistant Professor', 1, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(17, 'TS', 'Dr. Trupti P. Shah', 'Associate Professor', 9, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(18, 'BSR', 'Dr. B.S. Ratanpal', 'Associate Professor', 9, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(19, 'JS', 'Dr. Jaita Sharma', 'Assistant Professor', 9, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(20, 'NP', 'Dr. Nimisha Pathak', 'Assistant Professor', 9, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(21, 'AC', 'Mr. Anil Chavada', 'Temporary Assistant Professor', 9, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(22, 'GT', 'Ms. Gargi Trivedi', 'Temporary Assistant Professor', 9, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(23, 'AG', 'Mr. Akshay N Gadaria', 'Temporary Assistant Professor', 6, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(24, 'CL', 'Dr. Chetan G. Limbachiya', 'Associate Professor', 6, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(25, 'RC', 'Dr. Rajshree H. Charan', 'Assistant Professor', 8, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(26, 'JKS', 'Mr. Jaimin K Shah', 'Temporary Assistant Professor', 8, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(27, 'GR', 'Ms. Gopi Raval', 'Temporary Assistant Professor', 8, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(28, 'GMP', 'Ms. Grishma M Patel', 'Temporary Assistant Professor', 8, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(29, 'SC', 'Dr. Sumana Chatterjee', 'Assistant Professor', 11, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(30, 'GHB', 'Dr. Gopal Hiraji Bhatti', 'Associate Professor', 16, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(31, 'SDS', 'Dr. Suvarna D. Shah', 'Associate Professor', 16, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(32, 'KAS', 'Dr. Kosha A. Shah', 'Assistant Professor', 16, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(33, 'DS', 'Ms. Divyangi Shah', 'Temporary Assistant Professor', 16, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(34, 'JK', 'Ms. Juhi Khandelwal', 'Temporary Assistant Professor', 16, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(35, 'BD', 'Dr. Bharat Dangar', 'Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(36, 'MM', 'Mrs. Manisha Mayavanshi', 'Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(37, 'BBP', 'Mrs. Bhavna B. Pancholi', 'Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(38, 'PPS', 'Dr. Prativa P. Saraswala', 'Temporary Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(39, 'AC', 'Mrs. Alpa Chapaneria', 'Temporary Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(40, 'APS', 'Ms Ami Pranay Sen', 'Temporary Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(41, 'JC', 'Ms Janki Chotai', 'Temporary Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(42, 'DSS', 'Ms. Dipali S Soni', 'Temporary Assistant Professor', 2, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(43, 'MPB', 'Mr. Mehul P Bambhania', 'Assistant Professor', 17, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(44, 'SSS', 'Mrs. Sheetal S Soni', 'Assistant Professor', 17, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(45, 'NPJ', 'Mr. Narayan P. Jaiswal', 'Temporary Assistant Professor', 17, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(46, 'PS', 'Parul Shah', 'Temporary Assistant Professor', 11, 'teacher_email@msu.ac.in', 'Teacher@123', 'Teacher'),
(49, 'DP', 'Dhanesh Patel', 'Dean', 16, 'dean-techo@msubaroda.ac.in', 'Dean@123', 'Dean');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `Time_Slot_Id` int(11) NOT NULL,
  `Time_Slot_From` time NOT NULL,
  `Time_Slot_To` time NOT NULL,
  `Department_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`Time_Slot_Id`, `Time_Slot_From`, `Time_Slot_To`, `Department_Id`) VALUES
(1, '10:00:00', '17:30:00', 1),
(2, '11:00:00', '17:30:00', 2);

--
-- Triggers `time_slot`
--
DELIMITER $$
CREATE TRIGGER `check_time_slot_before_insert` BEFORE INSERT ON `time_slot` FOR EACH ROW BEGIN
    IF NEW.Time_Slot_From >= NEW.Time_Slot_To THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Time_Slot_From must be less than Time_Slot_To';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_time_slot_before_update` BEFORE UPDATE ON `time_slot` FOR EACH ROW BEGIN
    IF NEW.Time_Slot_From >= NEW.Time_Slot_To THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Time_Slot_From must be less than Time_Slot_To';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `Time_Table_Id` int(11) NOT NULL,
  `Time_Slot_Id` int(11) NOT NULL,
  `Location_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Teacher_Id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `Division_Id` int(11) NOT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `Program_Id` int(11) NOT NULL,
  `Department_Id` int(11) NOT NULL,
  `Faculty_Id` int(11) NOT NULL,
  `Duration_Id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) NOT NULL,
  `day_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`Time_Table_Id`, `Time_Slot_Id`, `Location_Id`, `Subject_Id`, `Teacher_Id`, `batch_id`, `Division_Id`, `semester_id`, `Program_Id`, `Department_Id`, `Faculty_Id`, `Duration_Id`, `subject_type`, `day_id`) VALUES
(5, 2, 18, 1, 20, 1, 1, 1, 1, 1, 1, 2, 'lab', 1),
(8, 1, 18, 3, 31, 1, 1, 1, 1, 1, 1, 3, 'tutorial', 1),
(9, 1, 15, 4, 22, 1, 1, 1, 1, 1, 1, 4, 'lecture', 1),
(10, 1, 18, 9, 25, 1, 5, 2, 1, 1, 1, 2, 'lecture', 1),
(11, 1, 18, 10, 35, 1, 5, 2, 1, 1, 1, 3, 'lecture', 1),
(12, 1, 15, 9, 27, 12, 5, 2, 1, 1, 1, 4, 'lab', 1),
(13, 1, 15, 9, 27, 12, 5, 2, 1, 1, 1, 5, 'lab', 1),
(14, 1, 18, 7, 20, 1, 5, 2, 1, 1, 1, 6, 'lecture', 1),
(15, 1, 18, 6, 8, 1, 5, 2, 1, 1, 1, 7, 'lecture', 1),
(16, 1, 18, 10, 39, 1, 5, 2, 1, 1, 1, 2, 'lecture', 2),
(17, 1, 18, 6, 8, 1, 5, 2, 1, 1, 1, 3, 'lecture', 2),
(18, 1, 15, 9, 28, 13, 5, 2, 1, 1, 1, 4, 'lab', 2),
(19, 1, 15, 9, 28, 13, 5, 2, 1, 1, 1, 5, 'lab', 2),
(20, 1, 18, 9, 25, 1, 5, 2, 1, 1, 1, 6, 'lecture', 2),
(21, 1, 18, 8, 23, 1, 5, 2, 1, 1, 1, 7, 'lecture', 2),
(22, 1, 18, 8, 24, 1, 5, 2, 1, 1, 1, 2, 'lecture', 3),
(23, 1, 18, 6, 8, 1, 5, 2, 1, 1, 1, 3, 'lecture', 3),
(24, 1, 18, 10, 35, 1, 5, 2, 1, 1, 1, 4, 'lecture', 3),
(25, 1, 18, 7, 21, 1, 5, 2, 1, 1, 1, 5, 'lecture', 3),
(27, 1, 18, 7, 20, 1, 5, 2, 1, 1, 1, 3, 'lecture', 4),
(28, 1, 18, 8, 23, 1, 5, 2, 1, 1, 1, 4, 'lecture', 4),
(29, 1, 13, 10, 39, 13, 5, 2, 1, 1, 1, 5, 'lab', 4),
(30, 1, 13, 10, 39, 13, 5, 2, 1, 1, 1, 6, 'lab', 4),
(31, 1, 2, 6, 9, 14, 5, 2, 1, 1, 1, 5, 'lab', 4),
(32, 1, 2, 6, 9, 14, 5, 2, 1, 1, 1, 6, 'lab', 4),
(33, 1, 19, 8, 23, 12, 5, 2, 1, 1, 1, 5, 'lab', 4),
(34, 1, 19, 8, 23, 12, 5, 2, 1, 1, 1, 6, 'lab', 4),
(35, 1, 18, 7, 21, 1, 5, 2, 1, 1, 1, 2, 'lecture', 5),
(36, 1, 18, 9, 26, 1, 5, 2, 1, 1, 1, 3, 'lecture', 5),
(37, 1, 18, 8, 23, 1, 5, 2, 1, 1, 1, 4, 'lecture', 5),
(38, 1, 13, 10, 35, 12, 5, 2, 1, 1, 1, 5, 'lab', 5),
(39, 1, 13, 10, 35, 12, 5, 2, 1, 1, 1, 6, 'lab', 5),
(40, 1, 2, 6, 9, 13, 5, 2, 1, 1, 1, 5, 'lab', 5),
(41, 1, 2, 6, 9, 13, 5, 2, 1, 1, 1, 6, 'lab', 5),
(42, 1, 19, 8, 23, 13, 5, 2, 1, 1, 1, 5, 'lab', 5),
(43, 1, 19, 8, 23, 13, 5, 2, 1, 1, 1, 6, 'lab', 5),
(44, 1, 18, 8, 24, 1, 5, 2, 1, 1, 1, 2, 'lecture', 6),
(45, 1, 18, 6, 8, 1, 5, 2, 1, 1, 1, 3, 'lecture', 6),
(47, 1, 18, 10, 39, 1, 5, 2, 1, 1, 1, 4, 'lecture', 6),
(48, 1, 13, 10, 39, 13, 5, 2, 1, 1, 1, 5, 'lab', 6),
(49, 1, 13, 10, 39, 13, 5, 2, 1, 1, 1, 6, 'lab', 6),
(50, 1, 2, 6, 9, 12, 5, 2, 1, 1, 1, 5, 'lab', 6),
(51, 1, 2, 6, 9, 12, 5, 2, 1, 1, 1, 6, 'lab', 6),
(52, 1, 19, 8, 23, 14, 5, 2, 1, 1, 1, 5, 'lab', 6),
(53, 1, 19, 8, 23, 14, 5, 2, 1, 1, 1, 6, 'lab', 6),
(57, 1, 18, 2, 23, 1, 1, 1, 1, 1, 1, 2, 'lecture', 1),
(77, 1, 14, 9, 26, 1, 5, 2, 1, 1, 1, 1, 'lecture', 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_table_manager`
--

CREATE TABLE `time_table_manager` (
  `Time_Table_Manager_Id` int(11) NOT NULL,
  `TTM_Name` varchar(100) NOT NULL,
  `TTM_Email` varchar(100) NOT NULL,
  `Teacher_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table_manager`
--

INSERT INTO `time_table_manager` (`Time_Table_Manager_Id`, `TTM_Name`, `TTM_Email`, `Teacher_Id`) VALUES
(1, 'Mr. Kshitij U Gupte', 'kshitij.gupte-cse@msubaroda.ac.in', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('Admin','Student','Teacher','Dean','HOD','TTM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `User_Email`, `Password`, `Role`) VALUES
(1, 'maheswaripanda123@gmail.com', 'Mahi@123', 'Student'),
(2, 'jankichauhan05@gmail.com', 'Janki@123', 'Student'),
(3, 'meghnadesai123@gmail.com', 'Meghna@123', 'Teacher'),
(4, 'kshitij.gupte-cse@msubaroda.ac.in', 'Teacher@123', 'TTM'),
(5, 'hetal.bhavsar-cse@msubaroda.ac.in', 'Teacher@123', 'Teacher'),
(6, 'head-cse@msubaroda.ac.in', 'Hod@123', 'HOD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`Academic_Year_Id`),
  ADD KEY `Faculty_Id` (`Faculty_Id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`Batch_Id`),
  ADD KEY `Division_Id` (`Division_Id`);

--
-- Indexes for table `class_semester`
--
ALTER TABLE `class_semester`
  ADD PRIMARY KEY (`Class_Id`),
  ADD KEY `Semester_Id` (`Semester_Id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`Day_Id`),
  ADD UNIQUE KEY `Day_Code` (`Day_Code`),
  ADD UNIQUE KEY `Day_Name` (`Day_Name`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`Dean_Id`),
  ADD UNIQUE KEY `Dean_Email` (`Dean_Email`),
  ADD KEY `Teacher_Id` (`Teacher_Id`),
  ADD KEY `Faculty_Id` (`Faculty_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_Id`),
  ADD UNIQUE KEY `Department_Code` (`Department_Code`),
  ADD KEY `Faculty_Id` (`Faculty_Id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`Division_Id`),
  ADD KEY `Class_Id` (`Class_Id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_Code` (`faculty_Code`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`Hod_Id`),
  ADD UNIQUE KEY `Hod_Email` (`Hod_Email`),
  ADD KEY `Teacher_Id` (`Teacher_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Program_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`Semester_Id`),
  ADD KEY `Program_Id` (`Program_Id`);

--
-- Indexes for table `slot_durations`
--
ALTER TABLE `slot_durations`
  ADD PRIMARY KEY (`duration_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `Class_Id` (`Class_Id`);

--
-- Indexes for table `student_elective_subject`
--
ALTER TABLE `student_elective_subject`
  ADD PRIMARY KEY (`Student_Id`,`Subject_Id`),
  ADD KEY `Subject_Id` (`Subject_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_Id`),
  ADD KEY `Semester_Id` (`Semester_Id`),
  ADD KEY `Class_Id` (`Class_Id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`Subject_Teacher_Id`),
  ADD KEY `Subject_Id` (`Subject_Id`),
  ADD KEY `Teacher_Id` (`Teacher_Id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`Time_Slot_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`Time_Table_Id`),
  ADD UNIQUE KEY `unique_teacher_time_slot` (`day_id`,`Duration_Id`,`Teacher_Id`),
  ADD KEY `Time_Slot_Id` (`Time_Slot_Id`),
  ADD KEY `Location_Id` (`Location_Id`),
  ADD KEY `Subject_Id` (`Subject_Id`),
  ADD KEY `Teacher_Id` (`Teacher_Id`),
  ADD KEY `Batch_Id` (`batch_id`),
  ADD KEY `Division_Id` (`Division_Id`),
  ADD KEY `Class_Id` (`semester_id`),
  ADD KEY `Program_Id` (`Program_Id`),
  ADD KEY `Department_Id` (`Department_Id`),
  ADD KEY `Faculty_Id` (`Faculty_Id`),
  ADD KEY `fk_duration_id` (`Duration_Id`);

--
-- Indexes for table `time_table_manager`
--
ALTER TABLE `time_table_manager`
  ADD PRIMARY KEY (`Time_Table_Manager_Id`),
  ADD UNIQUE KEY `TTM_Email` (`TTM_Email`),
  ADD KEY `Teacher_Id` (`Teacher_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `User_Email` (`User_Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `Academic_Year_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `Batch_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `class_semester`
--
ALTER TABLE `class_semester`
  MODIFY `Class_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `Day_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dean`
--
ALTER TABLE `dean`
  MODIFY `Dean_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `Division_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `Hod_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `Program_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `Semester_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slot_durations`
--
ALTER TABLE `slot_durations`
  MODIFY `duration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `Subject_Teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `Time_Slot_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `Time_Table_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `time_table_manager`
--
ALTER TABLE `time_table_manager`
  MODIFY `Time_Table_Manager_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD CONSTRAINT `academic_year_ibfk_1` FOREIGN KEY (`Faculty_Id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`Division_Id`) REFERENCES `division` (`Division_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_semester`
--
ALTER TABLE `class_semester`
  ADD CONSTRAINT `class_semester_ibfk_1` FOREIGN KEY (`Semester_Id`) REFERENCES `semester` (`Semester_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dean`
--
ALTER TABLE `dean`
  ADD CONSTRAINT `dean_ibfk_1` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dean_ibfk_2` FOREIGN KEY (`Faculty_Id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`Faculty_Id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `division`
--
ALTER TABLE `division`
  ADD CONSTRAINT `division_ibfk_1` FOREIGN KEY (`Class_Id`) REFERENCES `class_semester` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `hod_ibfk_1` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hod_ibfk_2` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`Program_Id`) REFERENCES `program` (`Program_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Class_Id`) REFERENCES `class_semester` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_elective_subject`
--
ALTER TABLE `student_elective_subject`
  ADD CONSTRAINT `student_elective_subject_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_elective_subject_ibfk_2` FOREIGN KEY (`Subject_Id`) REFERENCES `subject` (`Subject_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`Semester_Id`) REFERENCES `semester` (`Semester_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`Class_Id`) REFERENCES `class_semester` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_ibfk_1` FOREIGN KEY (`Subject_Id`) REFERENCES `subject` (`Subject_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_teacher_ibfk_2` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD CONSTRAINT `time_slot_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `fk_day` FOREIGN KEY (`day_id`) REFERENCES `days` (`Day_Id`),
  ADD CONSTRAINT `fk_duration_id` FOREIGN KEY (`Duration_Id`) REFERENCES `slot_durations` (`duration_id`),
  ADD CONSTRAINT `fk_semester` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`Semester_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_1` FOREIGN KEY (`Time_Slot_Id`) REFERENCES `time_slot` (`Time_Slot_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_10` FOREIGN KEY (`Faculty_Id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_2` FOREIGN KEY (`Location_Id`) REFERENCES `location` (`Location_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_3` FOREIGN KEY (`Subject_Id`) REFERENCES `subject` (`Subject_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_4` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_5` FOREIGN KEY (`Batch_Id`) REFERENCES `batch` (`Batch_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_6` FOREIGN KEY (`Division_Id`) REFERENCES `division` (`Division_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_7` FOREIGN KEY (`semester_id`) REFERENCES `class_semester` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_8` FOREIGN KEY (`Program_Id`) REFERENCES `program` (`Program_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_9` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_table_manager`
--
ALTER TABLE `time_table_manager`
  ADD CONSTRAINT `time_table_manager_ibfk_1` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
