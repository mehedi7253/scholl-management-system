-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 11:02 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(2, 'admin@gmail.com', '123', 'mehedi');

-- --------------------------------------------------------

--
-- Table structure for table `check_message`
--

CREATE TABLE `check_message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_message`
--

INSERT INTO `check_message` (`id`, `name`, `email`, `phone`, `message`) VALUES
(2, 'moin kabir', 'mon@gmail.com', '55555555555', 'i want to admit my son in your school '),
(3, 'jahangir', 'jhan@gmail.com', '56', 'mhe sdjavds'),
(4, 'mehedi', 'm@gmail.com', '125444', 'kjhfj');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `teacher`) VALUES
(2, 'PHP', 'mehedi'),
(3, 'Network', 'fahim');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_course`
--

CREATE TABLE `enroll_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `s_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enroll_course`
--

INSERT INTO `enroll_course` (`id`, `course_name`, `s_id`, `s_name`) VALUES
(1, 'PHP', '67', 'mehedi'),
(2, 'PHP', '67', 'mithu'),
(4, 'Network', '64', 'Nuha');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `mission` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id`, `mission`) VALUES
(7, 'mehedi hasan'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque culpa cum sint. A accusantium asperiores autem beatae dicta esse eveniet, ex ipsa magnam, nesciunt, quae rerum sunt vitae voluptas!');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `notice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `issue`, `notice`) VALUES
(1, 'Event', 'Event Held on 21 marsh 2020.. all students are requested to join Event.'),
(3, 'ICT Carnival', 'Every one requested to join ');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `sat` varchar(255) NOT NULL,
  `sun` varchar(255) NOT NULL,
  `mon` varchar(255) NOT NULL,
  `tues` varchar(255) NOT NULL,
  `wed` varchar(255) NOT NULL,
  `thurs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `time`, `sat`, `sun`, `mon`, `tues`, `wed`, `thurs`) VALUES
(2, '10:30', 'Bangla', 'English', 'Relegion', 'Math', 'Social Science', 'Science'),
(3, '12:10', 'Bangla', 'English', 'Math', 'Science', 'Culture', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_upload`) VALUES
(5, 'still-life-851328__340.jpg', '2019-10-28'),
(6, 'study-hard-pictures.jpg', '2019-10-28'),
(7, 'QRWIofXh_image_jpg.jpg', '2019-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `fatherphone` varchar(255) NOT NULL,
  `motherphone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `username`, `password`, `status`, `contact`, `address`, `dob`, `gender`, `fathername`, `mothername`, `fatherphone`, `motherphone`, `image`) VALUES
(60, 'mehedi', 'hasan', 'mehedi@gmail.com', 'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d', '1', '01941697253', 'panthapath', '2019-10-16', 'Male', 'nurul islam', 'fatema islam', '01818830865', '01941697253', 'IMG_2225-01.jpeg'),
(62, 'Moin', 'kabir', 'moin@gmail.com', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '0', '012450154', 'Jigatala', '1996-10-15', 'Male', 'kashem', 'Salma', '12345645', '154588', '30705689_1600995010016243_5591359471809294493_n.jpg'),
(63, 'MD', 'Al-Amin', 'al@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '124561455', 'Zamalpur', '1996-11-17', 'Male', 'unknown', 'unknown', '2115454512', '51111', '47389013_946213492256366_2626265531048525824_n.jpg'),
(64, 'Umme Aiemon', 'Nuha', 'nuha@gmail.com', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '0', '01245756211', 'Chandpur', '2014-03-17', 'Female', 'Nurul islam', 'Fatema Islam', '01245659', '0124556', 'nuha.jpeg'),
(67, 'mehedi ', 'hasan', 'm@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01941697253', 'West Raza Bazar', '1997-12-12', 'Male', 'Nurul Islam', 'Fatema Islam', '215454', '1547444', '76717483_798066940636244_9153890151884128256_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `present` tinyint(4) NOT NULL,
  `absent` tinyint(4) NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `student_id`, `present`, `absent`, `attendance_date`) VALUES
(91, 60, 0, 1, '2019-12-13'),
(92, 62, 1, 0, '2019-12-13'),
(93, 63, 0, 1, '2019-12-13'),
(94, 64, 0, 1, '2019-12-13'),
(95, 67, 1, 0, '2019-12-13'),
(96, 60, 1, 0, '2019-12-11'),
(97, 62, 1, 0, '2019-12-11'),
(98, 63, 1, 0, '2019-12-11'),
(99, 64, 1, 0, '2019-12-11'),
(100, 67, 1, 0, '2019-12-11'),
(106, 60, 0, 1, '2019-12-20'),
(107, 62, 0, 1, '2019-12-20'),
(108, 63, 0, 1, '2019-12-20'),
(109, 64, 0, 1, '2019-12-20'),
(110, 67, 0, 1, '2019-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `fcname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `filename`, `created`, `fcname`, `title`, `subject`) VALUES
(38, '38-Basic_Router_Config.pdf', '2019-12-12 21:34:02', 'mehedi', 'This is Basic Router Configuration slide', 'Network');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `password`, `name`, `subject`, `contact`) VALUES
(42, 'mehedi@gmail.com', '123', 'mehedi', 'bangla', '01941697253'),
(47, 'fahim@gmail.com', '123', 'fahim', 'English', '01255554');

-- --------------------------------------------------------

--
-- Table structure for table `vission`
--

CREATE TABLE `vission` (
  `id` int(11) NOT NULL,
  `vission` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vission`
--

INSERT INTO `vission` (`id`, `vission`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur incidunt ipsam molestiae non perferendis ratione sunt, temporibus! Cumque debitis necessitatibus, optio quis veniam voluptas! Cupiditate doloremque libero modi obcaecati?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_message`
--
ALTER TABLE `check_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_course`
--
ALTER TABLE `enroll_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vission`
--
ALTER TABLE `vission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `check_message`
--
ALTER TABLE `check_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enroll_course`
--
ALTER TABLE `enroll_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vission`
--
ALTER TABLE `vission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
