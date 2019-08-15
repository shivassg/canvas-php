-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 11, 2019 at 11:29 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `canvas`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(40) NOT NULL,
  `CourseLevel` varchar(20) NOT NULL,
  `Credits` int(1) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `CourseLevel`, `Credits`, `Department`) VALUES
(101, 'CPSC101Python', 'Graduate', 3, 'Computer Science'),
(102, 'Python', 'Graduate', 3, 'Computer Science'),
(103, 'Engcolloquim', 'Graduate', 1, 'Computer Science'),
(104, 'CPSC104Algorithms', 'Undergraduate', 3, 'Computer Science'),
(105, 'Machine Learning', 'Graduate', 3, 'Computer Science'),
(106, 'ML', 'Graduate', 3, 'Computer Science'),
(107, 'Data Mining', 'Graduate', 3, 'Computer Science'),
(109, 'AI', 'Graduate', 3, 'Computer Science'),
(110, 'OS', 'Graduate', 3, 'Computer Science'),
(111, 'Thermo', 'Graduate', 3, 'Mechanical'),
(112, 'DCC', 'Graduate', 3, 'Computer Science'),
(999, 'Python', 'Graduate', 3, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `courses_professors`
--

CREATE TABLE `courses_professors` (
  `courseid` int(11) NOT NULL,
  `ubid` int(11) NOT NULL,
  `term` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses_professors`
--

INSERT INTO `courses_professors` (`courseid`, `ubid`, `term`, `department`) VALUES
(1, 1056083, 'Fall 2019', 'Computer Science'),
(5, 1056084, 'Fall 2019', 'Computer Science'),
(5555, 1056084, 'Fall 2019', 'Computer Science'),
(104, 1056084, 'Fall 2019', 'Computer Science'),
(104, 1056084, 'Fall 2019', 'Computer Science'),
(103, 1056084, 'Fall 2019', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `courses_students`
--

CREATE TABLE `courses_students` (
  `courseid` int(20) NOT NULL,
  `studentid` int(11) NOT NULL,
  `term` varchar(10) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses_students`
--

INSERT INTO `courses_students` (`courseid`, `studentid`, `term`, `department`) VALUES
(1, 101, 'fall2019', 'Computer Science'),
(1, 1056083, 'Fall2019', 'Computer Science'),
(4, 1056086, 'Fall2019', ''),
(7, 1056083, 'Fall2019', 'Computer Science'),
(101, 1056087, 'Fall2019', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `ubID` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `Flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `ubID`, `password`, `firstName`, `lastName`, `gender`, `email`, `mobile`, `Flag`) VALUES
(1, 1000, 'hello123', 'Shiva', 'Shankar', 'M', 'shivaletters', '123', 3),
(2, 1001, 'hello123', 'Shankar', 'Shiva', 'M', 'sganesan@my.bridgeport.edu', '893936123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UB_ID` (`ubID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
