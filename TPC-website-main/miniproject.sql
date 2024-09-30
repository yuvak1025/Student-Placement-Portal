-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 29, 2023 at 08:01 AM
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
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `rollno` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpi` double NOT NULL,
  `branch` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `placedIitp` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`rollno`, `name`, `password`, `cpi`, `branch`, `dept`, `year`, `location`, `placedIitp`, `area`, `position`) VALUES
('', '', '', 0, '', '', 0, '', 'yes', '', ''),
('1901AE11', 'Ravi', 'password', 8.9, 'Aerospace Engineering', 'AE', 2021, 'Lucknow', 'yes', 'Design', 'Engineer'),
('1901BT05', 'Sara', 'password', 8.8, 'BioTechnology', 'BT', 2020, 'Pune', 'yes', 'Research', 'Scientist'),
('1901CE02', 'Jane', 'password', 8.2, 'Civil Engineering', 'Civil', 2021, 'Chennai', 'yes', 'Construction', 'Manager'),
('1901CE04', 'Karthik Reddy', '1234', 9, 'Civil and Environmental Engineering', 'Civil', 2021, 'Hyderabad', 'yes', 'Construction', 'Manager'),
('1901CH07', 'Sam', 'password', 9, 'Chemical Engineering', 'CH', 2022, 'Chandigarh', 'yes', 'Process Control', 'Engineer'),
('1901CS01', 'John', 'password', 8.5, 'Computer Science and Engineering', 'CSE', 2020, 'Bangalore', 'yes', 'Software', 'SDE-2'),
('1901DS10', 'Lena', 'password', 9.3, 'Data Science', 'DS', 2023, 'Nagpur', 'yes', 'Analytics', 'Consultant'),
('1901EC08', 'Mike', 'password', 8.7, 'Electronics and Communication Engineering', 'ECE', 2021, 'Ahmedabad', 'yes', 'Networking', 'Manager'),
('1901EE03', 'Alex', 'password', 9.1, 'Electrical Engineering', 'EE', 2022, 'Mumbai', 'yes', 'Power', 'Manager'),
('1901EN17', 'Amit', 'password', 8.5, 'Energy Engineering', 'EN', 2021, 'Indore', 'yes', 'Renewable Energy', 'Consultant'),
('1901ME02', 'Rajesh Sharma', '1234', 8.5, 'Mechanical Engineering', 'ME', 2021, 'Mumbai', 'yes', 'Design', 'Senior Engineer'),
('1901ME04', 'David', 'password', 8.6, 'Mechanical Engineering', 'ME', 2021, 'Kolkata', 'yes', 'Manufacturing', 'Team Lead'),
('1901MN13', 'Ankit', 'password', 9.4, 'Mining Engineering', 'MN', 2021, 'Ranchi', 'yes', 'Operations', 'Manager'),
('1901MS09', 'Tom', 'password', 9.2, 'Material Science', 'MS', 2020, 'Jaipur', 'yes', 'Research', 'Scientist'),
('1901MS16', 'Deepak', 'password', 9.5, 'Mathematics', 'MS', 2022, 'Nashik', 'yes', 'Research', 'Scientist'),
('1901MT12', 'Priya', 'password', 8.1, 'Metallurgy', 'MT', 2022, 'Hyderabad', 'yes', 'Research', 'Scientist'),
('1901NA14', 'Shreya', 'password', 8.3, 'Naval Architecture', 'NA', 2020, 'Goa', 'yes', 'Design', 'Engineer'),
('1901PE15', 'Vijay', 'password', 8, 'Petroleum Engineering', 'PE', 2021, 'Mangalore', 'yes', 'Exploration', 'Geologist'),
('1901PH06', 'Rachel', 'password', 8.4, 'Physics', 'PH', 2021, 'Delhi', 'yes', 'Education', 'Professor'),
('2101ai01', 'x@gmail.com', '123', 8.5, 'Computer Science Engineering', 'CSE', 2021, 'Hyderabad local', 'yes', 'IT', 'SDE');

-- --------------------------------------------------------

--
-- Table structure for table `alumni2`
--

CREATE TABLE `alumni2` (
  `rollno` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `package` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni2`
--

INSERT INTO `alumni2` (`rollno`, `companyName`, `role`, `package`, `year`) VALUES
('1901AE11', 'Microsoft', 'Software Engineer', 2000000, 2021),
('1901BT05', 'Amazon', 'Software Development Engineer', 1800000, 2023),
('1901CE02', 'Google', 'Product Manager', 2500000, 2022),
('1901CE04', 'Tesla', 'Mechanical Engineer', 2200000, 2021),
('1901CH07', 'Goldman Sachs', 'Quantitative Analyst', 3000000, 2022),
('1901CS01', 'L&T Construction', 'Civil Engineer', 1500000, 2022),
('1901DS10', 'Bajaj Auto', 'Electrical Engineer', 1800000, 2021),
('1901EC08', 'Microsoft', 'Software Development Engineer', 2000000, 2022),
('1901EE03', 'Maruti Suzuki', 'Mechanical Engineer', 1600000, 2023),
('1901EN17', 'Morgan Stanley', 'Investment Banking Analyst', 2800000, 2021),
('1901ME02', 'Adani Group', 'Civil Engineer', 1700000, 2023),
('1901ME04', 'Adobe', 'Software Development Engineer', 1900000, 2022),
('1901MN13', 'Qualcomm', 'Electrical Engineer', 2100000, 2021),
('1901MS09', 'General Motors', 'Mechanical Engineer', 2000000, 2023),
('1901MS16', 'Goldman Sachs', 'Risk Management Analyst', 3200000, 2022),
('1901MT12', 'L&T Infotech', 'Software Engineer', 1800000, 2021),
('1901NA14', 'General Electric', 'Electrical Engineer', 1900000, 2023),
('1901PE15', 'Amazon', 'Software Development Engineer', 2200000, 2022),
('1901PH06', 'Ford Motors', 'Mechanical Engineer', 1700000, 2021),
('2101ai01', 'Amazon', 'SDE', 50000000, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `rollNo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`rollNo`, `email`) VALUES
('2101CS01', 'amazon@gmail.com'),
('2101CS01', 'bhel@gmail.com'),
('2101CS01', 'ge@gmail.com'),
('2101CS01', 'google@gmail.com'),
('2101CS01', 'hr@netflix.com'),
('2101CS01', 'hr@uber.com'),
('2101CS01', 'recruiting@intel.com'),
('2101CS01', 'recruitment@twitter.com'),
('2101cs44', 'accenture@gmail.com'),
('2101cs44', 'hr@netflix.com'),
('2101cs44', 'hr@tesla.com'),
('2101cs44', 'hr@uber.com'),
('2101cs44', 'infosys@gmail.com'),
('2101cs44', 'jobs@apple.com'),
('2101cs44', 'recruiting@facebook.com'),
('2101CS65', 'accenture@gmail.com'),
('2101CS65', 'google@gmail.com'),
('2101CS65', 'hr@netflix.com');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `job_description` varchar(600) NOT NULL,
  `role_offered` varchar(100) NOT NULL,
  `preferred_department` varchar(100) NOT NULL,
  `essential_skills` varchar(300) NOT NULL,
  `salary_package` int(11) NOT NULL,
  `mode_of_interview` varchar(100) NOT NULL,
  `recruiting_since` int(11) NOT NULL,
  `minimum_cpi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `email`, `password`, `job_description`, `role_offered`, `preferred_department`, `essential_skills`, `salary_package`, `mode_of_interview`, `recruiting_since`, `minimum_cpi`) VALUES
('Accenture', 'accenture@gmail.com', '1234', 'Provide a range of services to clients in various industries', 'Software Engineer', 'CSE', 'Java, Python, C++', 1000000, 'online', 2010, 7.5),
('Amazon', 'amazon@gmail.com', '123', 'sde', 'SDE', 'CSE', 'AI', 50000000, 'Online', 2010, 7),
('BHEL', 'bhel@gmail.com', '1234', 'Provide services in power generation and transmission', 'Electrical Engineer', 'Electrical', 'Power systems, Control systems', 1800000, 'offline', 2007, 7),
('GE', 'ge@gmail.com', '1234', 'Provide services in healthcare, aviation, and power generation industries', 'Software Engineer', 'CSE', 'Java, Python, C++', 2000000, 'online', 2008, 8),
('Google', 'google@gmail.com', 'password', 'Web developer for Google Search', 'Web Developer', 'CSE', 'HTML, CSS, JavaScript', 1500000, 'Online', 2021, 8),
('Netflix', 'hr@netflix.com', 'password', 'Develop software for Netflix products', 'Software Developer', 'CSE', 'Java, Python, Scala', 1900000, 'Online', 2021, 8.5),
('Tesla', 'hr@tesla.com', 'password', 'Develop software for Tesla vehicles and infrastructure', 'Software Engineer', 'EE', 'Python, C++, Java', 2200000, 'Online', 2020, 8),
('Uber', 'hr@uber.com', 'password', 'Develop software for Uber products and services', 'Software Engineer', 'CSE', 'Java, Python, JavaScript', 1800000, 'Offline', 2017, 8),
('Infosys', 'infosys@gmail.com', '1234', 'Provide services in IT consulting, software engineering, and digital transformation', 'Software Engineer', 'CSE', 'Java, Python, Angular', 1200000, 'online', 2006, 8),
('Apple', 'jobs@apple.com', 'password', 'Design and implement software for Mac and iOS', 'iOS Developer', 'CSE', 'Swift, Objective-C', 2000000, 'Offline', 2022, 8.5),
('L&T', 'lnt@gmail.com', '1234', 'Provide services in engineering, procurement, and construction projects', 'Civil Engineer', 'Civil', 'Project management, AutoCAD, MS Project', 1500000, 'offline', 2005, 7),
('Microsoft', 'microsoft@hotmail.com', 'password', 'Create and maintain software for Windows and other Microsoft products', 'Software Engineer', 'CSE', 'C++, C#, Java', 1800000, 'Offline', 2019, 7.5),
('Facebook', 'recruiting@facebook.com', 'password', 'Develop software for Facebook products', 'Software Engineer', 'CSE', 'Python, C++, Java', 1700000, 'Offline', 2019, 8),
('Intel', 'recruiting@intel.com', 'password', 'Develop software and hardware for Intel products', 'Hardware Engineer', 'EE', 'Verilog, SystemVerilog, VHDL', 2000000, 'Online', 2021, 7.5),
('IBM', 'recruitment@ibm.com', 'password', 'Design and implement software for IBM products and services', 'Software Developer', 'CSE', 'Java, Python, Ruby', 1600000, 'Offline', 2018, 7),
('Twitter', 'recruitment@twitter.com', 'password', 'Develop software for Twitter products', 'Software Engineer', 'CSE', 'Ruby, Python, Java', 1600000, 'Online', 2020, 7.5),
('Siemens', 'siemens@gmail.com', '1234', 'Provide services in automation and digitalization in various industries', 'Electrical Engineer', 'Electrical', 'PLC programming, SCADA, HMI', 2200000, 'offline', 2009, 8),
('TCS', 'tcs@gmail.com', '1234', 'Provide IT services, consulting, and business solutions to various industries', 'Systems Engineer', 'CSE', 'Java, SQL, C#', 900000, 'offline', 2011, 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rollNo` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `marks` double NOT NULL,
  `cpi` double NOT NULL,
  `age` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `areaOfIntrest` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `placementStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rollNo`, `name`, `password`, `marks`, `cpi`, `age`, `branch`, `dept`, `areaOfIntrest`, `year`, `placementStatus`) VALUES
('', '', '', 0, 0, 0, '', '', '', 0, 'placed'),
('1', '', '', 0, 0, 0, '', '', '', 0, 'placed'),
('2101ai10', 'eshwar', '123', 100, 9, 18, 'Computer Science Engineering', 'CSE', 'ML', 2022, 'placed'),
('2101AI11', 'J.Kumar', '1234', 95, 7.5, 20, 'Artificial Intelligence and Data Science', 'CSE', 'Natural Language Processing', 2021, 'placed'),
('2101AI22', 'R.Naveen', '1234', 96, 8.1, 19, 'Artificial Intelligence and Data Science', 'CSE', 'Computer Vision', 2021, 'placed'),
('2101AI33', 'Neha Sharma', '5678', 89, 8.7, 22, 'Computer Science and Engineering', 'CSE', 'Artificial Intelligence', 2021, 'placed'),
('2101AI41', 'Kunal Patel', '1234', 95, 8.2, 21, 'Information Technology', 'IT', 'Web Development', 2021, 'placed'),
('2101AI48', 'Aakash Singh', '5678', 91, 9.1, 21, 'Electronics and Communication Engineering', 'ECE', 'Signal Processing', 2021, 'placed'),
('2101AI55', 'Sana Ahmed', '1234', 96, 9.6, 20, 'Mechanical Engineering', 'ME', 'Design and Analysis', 2021, 'placed'),
('2101AI62', 'Siddharth Pandey', '5678', 93, 9.3, 21, 'Electrical Engineering', 'EE', 'Power Systems', 2021, 'placed'),
('2101AI81', 'J.Kumar', '1234', 95, 7.5, 20, 'Artificial Intelligence and Data Science', 'CSE', 'Natural Language Processing', 2021, 'placed'),
('2101BT01', 'Kavya Sharma', '1234', 93, 8.5, 21, 'Biotechnology', 'BT', 'Bioinformatics', 2021, 'not placed'),
('2101BT02', 'Ankit Mishra', '1234', 88, 7.9, 22, 'Biotechnology', 'BT', 'Genetic Engineering', 2022, 'not placed'),
('2101CH01', 'Aryan Gupta', '1234', 91, 8.1, 20, 'Chemical Engineering', 'CHE', 'Process Design', 2022, 'not placed'),
('2101CH02', 'Shreya Singh', '1234', 85, 7.8, 19, 'Chemical Engineering', 'CHE', 'Process Control', 2022, 'not placed'),
('2101CS01', 'Rahul Jain', '1234', 95, 8.5, 20, 'Computer Science and Engineering', 'CSE', 'Artificial Intelligence', 2022, 'placed'),
('2101CS02', 'Anjali Sharma', '1234', 89, 7.5, 21, 'Computer Science and Engineering', 'CSE', 'Web Development', 2021, 'not placed'),
('2101CS16', 'S.Raj', '1234', 92, 7.2, 21, 'Computer Science and Engineering', 'CSE', 'Artificial Intelligence', 2022, 'placed'),
('2101CS28', 'K.Priya', '1234', 93, 8.4, 20, 'Computer Science and Engineering', 'CSE', 'Web Development', 2021, 'placed'),
('2101CS30', 'Sneha Sharma', '1234', 95, 7.2, 20, 'Computer Science and Engineering', 'CSE', 'Data Analytics', 2022, 'not placed'),
('2101CS35', 'G.Sanjay', '1234', 94, 8.8, 22, 'Computer Science and Engineering', 'CSE', 'Database Management', 2022, 'placed'),
('2101cs44', 'Jayanth', '123', 90, 8, 19, 'Computer Science Engineering', 'CSE', 'AI', 2021, 'placed'),
('2101CS65', 'vivek', '123', 98, 8, 18, 'Computer Science Engineering', 'CSE', 'AI', 2021, 'not placed'),
('2101EC33', 'Nitin Gupta', '1234', 92, 7.5, 20, 'Electronics and Communication Engineering', 'ECE', 'Embedded Systems', 2022, 'not placed'),
('2101EE01', 'Karthik Reddy', '1234', 85, 7.2, 22, 'Electrical and Electronics Engineering', 'EEE', 'Power Systems', 2022, 'not placed'),
('2101EE02', 'Sneha Patel', '1234', 94, 8.1, 20, 'Electrical and Electronics Engineering', 'EEE', 'Control Systems', 2022, 'not placed'),
('2101EE12', 'P.Ravi', '1234', 91, 8.2, 21, 'Electrical Engineering', 'EE', 'Power Systems', 2022, 'placed'),
('2101EE28', 'V.Sujith', '1234', 90, 7.8, 20, 'Electrical Engineering', 'EE', 'Control Systems', 2021, 'placed'),
('2101EE55', 'Sachin Kumar', '1234', 93, 7.4, 20, 'Electrical Engineering', 'EE', 'Power Systems', 2022, 'not placed'),
('2101ME01', 'Rajat Singh', '1234', 92, 8.7, 21, 'Mechanical Engineering', 'ME', 'Automotive Design', 2021, 'not placed'),
('2101ME02', 'Mitali Goyal', '1234', 96, 9.2, 22, 'Mechanical Engineering', 'ME', 'Thermal Engineering', 2022, 'not placed'),
('2101ME19', 'A.Krishna', '1234', 89, 6.9, 19, 'Mechanical Engineering', 'ME', 'Thermodynamics', 2021, 'placed'),
('2101ME28', 'B.Sai', '1234', 87, 6.5, 20, 'Mechanical Engineering', 'ME', 'Manufacturing Processes', 2021, 'placed'),
('2101ME42', 'Mansi Singh', '1234', 90, 7.8, 20, 'Mechanical Engineering', 'ME', 'Robotics', 2022, 'not placed');

-- --------------------------------------------------------

--
-- Table structure for table `students2`
--

CREATE TABLE `students2` (
  `rollNo` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `package` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students2`
--

INSERT INTO `students2` (`rollNo`, `companyName`, `role`, `package`, `year`) VALUES
('2101AI33', 'Amazon', 'Software Engineer', 2000000, 2021),
('2101AI41', 'Google', 'Data Analyst', 2500000, 2022),
('2101AI48', 'Microsoft', 'Business Analyst', 5000000, 2023),
('2101AI55', 'IBM', 'Software Developer', 3800000, 2021),
('2101AI62', 'Oracle', 'Database Administrator', 4200000, 2022),
('2101CS01', 'Accenture', 'Software Engineer', 1000000, 2023),
('2101CS16', 'Infosys', 'System Engineer Trainee', 3500000, 2023),
('2101CS28', 'Accenture', 'Associate Software Engineer', 4000000, 2022),
('2101CS35', 'TCS', 'Data Analyst', 4500000, 2024),
('2101cs44', 'Amazon', 'SDE', 500000, 2022),
('2101EE12', 'GE', 'Electrical Engineer', 5000000, 2024),
('2101EE28', 'Siemens', 'Automation Engineer', 4000000, 2022),
('2101ME19', 'L&T', 'Graduate Engineer Trainee', 4500000, 2022),
('2101ME28', 'BHEL', 'Mechanical Engineer', 3500000, 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `alumni2`
--
ALTER TABLE `alumni2`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`rollNo`,`email`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `students2`
--
ALTER TABLE `students2`
  ADD PRIMARY KEY (`rollNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
