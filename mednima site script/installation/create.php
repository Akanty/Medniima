<?php

$link = mysql_connect(SERVER, DB_USER, DB_PASS);

if($link)
{

$result = mysql_query("CREATE DATABASE IF NOT EXISTS ".DB_NAME."",$link);
$result .= mysql_query("USE ".DB_NAME."",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'c82138c7e01ad922b0a58fdd33c3a91c', '2017-10-11 16:22:10');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `configuration_key` varchar(200) NOT NULL,
  `configuration_value` text NOT NULL,
  `desc` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `sort_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `configuration_key`, `configuration_value`, `desc`, `group_id`, `sort_by`) VALUES
(1, 'School Name', 'SCHOOL_NAME', 'Medni''ima International School', 'the name of the school ', 1, 1),
(2, 'contact phone number', 'CONTACT_PHONE_NUMBER', '08162181613', 'Contact Number that will show on the main page', 1, 5),
(3, 'School Short Name ', 'SUB_TITLE', 'Medni''ima', 'the school name in a short form', 1, 2),
(4, 'School Description', 'SCHOOL_DESC', 'DAYCARE, NURSERY, PRIMARY & SECONDARY SCHOOL', 'School description break down', 1, 3),
(5, 'School Address', 'SCHOOL_ADDRESS', 'No.6 UMAR BABURA STREET, OFF SARDAUNA CRESCENT BADAWA LAYOUT', 'School Address', 1, 4),
(6, 'school email', 'SCHOOL_EMAIL', 'info@medniimainternationalschool.com', 'the school official email', 1, 6),
(7, 'Home Page Breif Admission Details', 'ADMISSION_IN_BRIEF', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n', 'Home Page Admission Details in Brief\n', 2, 2),
(8, 'Home Page Student Result in Brief', 'STUDENT_RESULT_IN_BRIEF', '<p>Vero eos et accusamus et iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>\r\n', 'Home Page Student Result in Brief', 2, 3),
(9, 'Homepage Greeting', 'HOME_GREETING', '<p>On behalf of the entire Medniima Internation School Family, I warmly welcome you to Our Website. Medniima is a place to be. I am therefore convinced that after a Tour of this website you will be eager to pay us a visit....Do have a great day!</p>\r\n', 'this is the director greeting at the homepage', 2, 1),
(10, 'Academic Curriculum in Brief\n', 'ACADEMIC_CURRICULUM', '<p><strong>Medni&#39;ima</strong> runs a six-year programme divided into two sections - The Junior Secondary School (JSS) and the Senior Secondary School (SSS) in accordance with the National Policy on Education, simply described as the 6-3-3-4 system of education. As the School awaits the (9-3-4) New National policy on Education. SECTION I:- Junior Secondary School. The first 3 years are spent in the junior school. Students are prepared for the Junior Secondary Certificate Examinations (JSCE) State and National Examination Council (NECO) Federal. The following subjects are available for study:- Mathematics, Agricultural Science, Physical &amp; Health Education, English Language, Business Studies, Basic Technology, French, Music, Home Economics, Yoruba, Creative Art, Computer Science, Basic Science, Christian Religious Studies &amp; Social Studies. SECTION II:- Senior Secondary School. At the Senior Secondary School, students are prepared for the following :- (a) Primary Programmes I. WASSCE (West African Senior School Certificate Examination) II. NECO SSCE (National Examination Council) (b) Secondary Programmes I. Cambridge O&rsquo; level II. U.M.E (University Matriculation Examinations of JAMB) III. IJMB (Interim Joint Matriculation Board)</p>\r\n', 'this is the school academic curiculum in Brief\n', 2, 4),
(11, 'School Logo', 'SCHOOL_LOGO', 'logo.png', 'this is the school logo', 0, 0);",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_link` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `name`, `image_link`, `date`) VALUES
(1, '', '../gallery_image/852502618.JPG', '2017-10-18 03:42:38'),
(2, '', '../gallery_image/956295274.JPG', '2017-10-18 03:43:29'),
(3, '', '../gallery_image/270454745.JPG', '2017-10-18 03:44:12'),
(4, '', '../gallery_image/950916302.JPG', '2017-10-18 03:47:51'),
(5, '', '../gallery_image/598141759.JPG', '2017-10-18 03:48:05');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_categories`
--

CREATE TABLE IF NOT EXISTS `quiz_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `img` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `quiz_categories`
--

INSERT INTO `quiz_categories` (`id`, `name`, `fullname`, `img`, `slug`, `status`, `date`) VALUES
(1, 'JAMB CBT', 'Joint Admissions And Matriculation Board', 'jamb-logo.png', 'jamb', '1', '2017-10-31 00:26:59'),
(2, 'WAEC', 'West African Examinations Council', 'waec.png', 'waec', '1', '2017-11-01 06:59:11'),
(3, 'NECO', 'National Examination Council', 'neco.png', 'neco', '1', '2017-10-31 00:27:07'),
(4, 'POST UTME', 'Post Unified Tertiary Matriculation Examimation', 'post-utme.png', 'post-utme', '1', '2017-10-31 00:27:12'),
(5, 'MOCK TEST', 'Take aggregated exams and prove how prepared you are.', 'mock.png', 'mock', '0', '2017-10-30 18:24:19'),
(6, 'COMMON ENTRANCE', 'Skill test', 'mock.png', 'common-entrance', '0', '2017-10-30 18:28:59'),
(7, 'JUNIOR WAEC', 'Junior Exam For Secondary School Students In Their 3rd Year', 'mock.png', 'junior-waec', '1', '2017-11-02 04:24:17'),
(8, 'STUDY MODE', 'This part you study on every test', 'mock.png', 'study-mode', '1', '2017-10-31 00:27:21'),
(9, 'NABTEB', 'National Business And Technical Examinations Board', 'nabteb.jpg', 'nabteb', '1', '2017-11-01 04:01:43');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_configuration`
--

CREATE TABLE IF NOT EXISTS `quiz_configuration` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `configuration_key` varchar(200) NOT NULL,
  `configuration_value` text NOT NULL,
  `desc` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `sort_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `quiz_configuration`
--

INSERT INTO `quiz_configuration` (`id`, `name`, `configuration_key`, `configuration_value`, `desc`, `group_id`, `sort_by`) VALUES
(1, 'Question Per Page', 'QUESTION_PER_PAGE', '1', 'No of Questions display in single page', 1, 1),
(2, 'Exam Time', 'EXAM_TIME', '00:30:00', 'Examination Time Duration', 1, 2);",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` int(11) NOT NULL,
  `Question` mediumtext NOT NULL,
  `Option_A` text NOT NULL,
  `Option_B` text NOT NULL,
  `Option_C` text NOT NULL,
  `Option_D` text NOT NULL,
  `Option_E` text NOT NULL,
  `Answer` char(1) NOT NULL,
  `Diagram` varchar(250) DEFAULT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1067 DEFAULT CHARSET=latin1;",$link);




$result .= mysql_query("
--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` int(11) NOT NULL,
  `Question` mediumtext NOT NULL,
  `Option_A` text NOT NULL,
  `Option_B` text NOT NULL,
  `Option_C` text NOT NULL,
  `Option_D` text NOT NULL,
  `Option_E` text NOT NULL,
  `Answer` char(1) NOT NULL,
  `Diagram` varchar(250) DEFAULT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1067 DEFAULT CHARSET=latin1;",$link);




$result .= mysql_query("
--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`);",$link);

$result .= mysql_query("
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1067;",$link);
  
  $result .= mysql_query("
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);





$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE IF NOT EXISTS `quiz_result` (
  `result_id` int(11) NOT NULL,
  `exam_id` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `choose_ans` char(1) NOT NULL,
  `score` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`result_id`, `exam_id`, `student_id`, `cat_id`, `sub_id`, `ques_id`, `choose_ans`, `score`, `date`) VALUES
(1, '4496798', 2, 1, 8, 253, 'B', 0, '2017-11-03 01:06:03'),
(2, '4496798', 2, 1, 8, 400, 'A', 0, '2017-11-03 01:06:07'),
(3, '4496798', 2, 1, 8, 167, 'B', 0, '2017-11-03 01:06:09'),
(4, '4496798', 2, 1, 8, 203, 'B', 1, '2017-11-03 01:06:13'),
(5, '4496798', 2, 1, 8, 355, 'C', 1, '2017-11-03 01:06:16'),
(6, '1285807', 2, 1, 4, 46, 'C', 1, '2017-11-03 01:26:05'),
(7, '1285807', 2, 1, 4, 127, 'B', 0, '2017-11-03 01:26:08'),
(8, '1285807', 2, 1, 4, 140, 'A', 0, '2017-11-03 01:26:10'),
(9, '1285807', 2, 1, 4, 95, 'B', 0, '2017-11-03 01:26:12'),
(10, '1285807', 2, 1, 4, 108, 'B', 0, '2017-11-03 01:26:15');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_settings`
--

CREATE TABLE IF NOT EXISTS `quiz_settings` (
  `id` bigint(20) NOT NULL,
  `pagenum` varchar(50) DEFAULT NULL,
  `examtime` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `quiz_settings`
--

INSERT INTO `quiz_settings` (`id`, `pagenum`, `examtime`) VALUES
(1, '1', '00:50:00');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_subjectcombination`
--

CREATE TABLE IF NOT EXISTS `quiz_subjectcombination` (
  `id` int(11) NOT NULL,
  `CatId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `quiz_subjectcombination`
--

INSERT INTO `quiz_subjectcombination` (`id`, `CatId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(2, 1, 2, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(3, 1, 3, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(4, 1, 4, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(5, 1, 5, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(6, 1, 6, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(7, 1, 7, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(8, 1, 8, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(9, 1, 9, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(10, 1, 10, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(11, 1, 11, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(12, 1, 14, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(13, 1, 15, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(14, 1, 16, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(15, 1, 17, 1, '2017-10-31 22:43:24', '2017-10-31 22:43:24'),
(16, 2, 1, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(17, 2, 2, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(18, 2, 3, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(19, 2, 4, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(20, 2, 5, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(21, 2, 6, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(22, 2, 7, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(23, 2, 8, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(24, 2, 9, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(25, 2, 10, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(26, 2, 11, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(27, 2, 12, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(28, 2, 14, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(29, 2, 15, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(30, 2, 16, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(31, 2, 17, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(32, 2, 18, 1, '2017-10-31 22:45:47', '2017-10-31 22:45:47'),
(33, 3, 1, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(34, 3, 2, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(35, 3, 3, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(36, 3, 4, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(37, 3, 5, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(38, 3, 6, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(39, 3, 7, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(40, 3, 8, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(41, 3, 9, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(42, 3, 10, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(43, 3, 11, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(44, 3, 12, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(45, 3, 14, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(46, 3, 15, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(47, 3, 16, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(48, 3, 17, 1, '2017-10-31 22:47:56', '2017-10-31 22:47:56'),
(49, 9, 1, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(50, 9, 2, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(51, 9, 3, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(52, 9, 4, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(53, 9, 5, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(54, 9, 7, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(55, 9, 8, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(56, 9, 9, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(57, 9, 10, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(58, 9, 15, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(59, 9, 16, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(60, 9, 17, 1, '2017-11-01 09:02:40', '2017-11-01 09:02:40'),
(61, 4, 1, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(62, 4, 2, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(63, 4, 3, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(64, 4, 4, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(65, 4, 5, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(66, 4, 6, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(67, 4, 7, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(68, 4, 8, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(69, 4, 9, 1, '2017-11-01 09:04:13', '2017-11-01 09:04:13'),
(70, 4, 10, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(71, 4, 11, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(72, 4, 12, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(73, 4, 14, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(74, 4, 15, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(75, 4, 16, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(76, 4, 17, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(77, 4, 18, 1, '2017-11-01 09:04:14', '2017-11-01 09:04:14'),
(78, 7, 19, 1, '2017-11-02 04:27:27', '2017-11-02 04:27:27');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `quiz_subjects`
--

CREATE TABLE IF NOT EXISTS `quiz_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `subject_desc` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `quiz_subjects`
--

INSERT INTO `quiz_subjects` (`subject_id`, `subject_name`, `subject_desc`, `date`) VALUES
(1, 'Accounts', 'Test on the study of accounts principles and book - keeping', '2017-10-29 07:58:53'),
(2, 'Agricultural Science', 'Test on the study of the science of farming, cattle rearing ', '2017-10-29 07:58:53'),
(3, 'Biology', 'Test for the study of the science of man and his environment', '2017-10-31 00:29:04'),
(4, 'Chemistry', 'Test for the study of the science chemical reactions and equation', '2017-10-31 00:29:08'),
(5, 'Commerce', 'Test on the knowledge of commerce and business basics', '2017-10-29 08:00:13'),
(6, 'CRK', 'Test of your knowledge of Christianity as a religion', '2017-10-29 08:00:13'),
(7, 'Economics', 'Test on the study of use of resources, goods and services ', '2017-10-29 08:00:38'),
(8, 'English', 'Test of   grammar,   vocabulary and english as   a   language ', '2017-10-31 00:29:12'),
(9, 'Geography', 'Test on the study of the earth, places and environment ', '2017-10-29 08:01:34'),
(10, 'Government', 'Test on the knowledge of governance and rule of law', '2017-10-29 08:01:34'),
(11, 'Hausa', 'Test of grammar, vocabulary and hausa as a language', '2017-10-29 08:02:09'),
(12, 'Igbo', 'Test of grammar, vocabulary   and igbo   as a   language', '2017-10-29 08:02:09'),
(14, 'IRK', 'Test of your knowledge of Islam as a religion', '2017-10-29 08:02:32'),
(15, 'Literature', 'Test on the study of literature written in english language', '2017-10-29 08:03:06'),
(16, 'Mathematics', 'Test of arithmetic and mathematical competency', '2017-10-31 00:29:19'),
(17, 'Physics', 'Test on the study of natural science, energy and their interaction', '2017-10-31 00:29:22'),
(18, 'Civic Education', 'Test on the study on national ethics, discipline, rights and obligations ', '2017-10-29 08:10:50'),
(19, 'ENGLISH JNR', '(Jrn) Test of grammar, vocabulary and english as a language ', '2017-11-02 04:26:04');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblassignment`
--

CREATE TABLE IF NOT EXISTS `tblassignment` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `dead_line_date` date NOT NULL,
  `dead_line_time` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblassignment`
--

INSERT INTO `tblassignment` (`id`, `name`, `teacher_id`, `class_id`, `subject_id`, `question`, `dead_line_date`, `dead_line_time`, `created_date`, `status`, `lastupdate`) VALUES
(1, 'faruk testing assihnment', 2, 1, 2, 'testing for faruk', '2018-06-11', '3:47 AM', '2017-10-26 10:47:59', '1', '2017-10-26 10:47:59');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblbook_tutor`
--

CREATE TABLE IF NOT EXISTS `tblbook_tutor` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subjects` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblbook_tutor`
--

INSERT INTO `tblbook_tutor` (`id`, `email`, `name`, `subjects`, `phone`, `age`, `gender`, `address`, `date`) VALUES
(1, 'ismartnaija@gmail.com', 'ibrahim yekeen', 'maths', '07038858824', 24, 'Male', 'badawa layout', '2017-10-17 01:36:37');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE IF NOT EXISTS `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` enum('1','2','3') NOT NULL,
  `Section` varchar(5) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(1, 'SS 1', '3', 'A', '2017-10-12 02:16:10', '2017-10-22 03:57:31'),
(2, 'SS 1', '3', 'B', '2017-10-12 02:16:19', '2017-10-22 03:57:35'),
(3, 'SS 1', '3', 'C', '2017-10-12 02:16:28', '2017-10-22 03:57:57'),
(4, 'SS 2', '3', 'A', '2017-10-12 02:16:50', '2017-10-22 03:57:57'),
(5, 'SS 2', '3', 'B', '2017-10-12 02:17:11', '2017-10-22 03:57:57'),
(6, 'SS 2', '3', 'C', '2017-10-12 02:17:20', '2017-10-22 03:57:57'),
(7, 'Primary One', '2', 'A', '2017-10-17 04:24:36', '2017-10-22 03:56:53'),
(8, 'Pre-Nursery ', '1', 'A', '2017-10-24 07:22:49', '0000-00-00 00:00:00'),
(9, 'Nursery One', '1', 'A', '2017-10-24 07:25:13', '0000-00-00 00:00:00'),
(10, 'Nursery Two', '1', 'A', '2017-10-24 07:25:40', '0000-00-00 00:00:00'),
(11, 'Primary Two', '2', 'A', '2017-10-24 07:26:19', '0000-00-00 00:00:00'),
(12, 'Primary Three', '2', 'A', '2017-10-24 07:26:50', '0000-00-00 00:00:00'),
(13, 'Primary Four', '2', 'A', '2017-10-24 07:27:17', '0000-00-00 00:00:00'),
(14, 'Primary Five', '2', 'A', '2017-10-24 07:27:45', '0000-00-00 00:00:00'),
(15, 'J S S ONE', '3', 'A', '2017-10-24 07:30:23', '0000-00-00 00:00:00'),
(16, 'J S S TWO', '3', 'A', '2017-10-24 07:30:46', '0000-00-00 00:00:00'),
(17, 'J S S THREE', '3', 'A', '2017-10-24 07:31:11', '0000-00-00 00:00:00');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE IF NOT EXISTS `tblevent` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `title`, `content`, `date`, `time`, `location`, `last_update`) VALUES
(3, 'event three', 'dsfasfassadas', '2017-12-04', '5:42 PM', 'dasdasdas', '2017-10-16 09:06:42'),
(4, 'End Of The Year Party', 'the school will be having her final year end of the year party for graduating students please inform others', '2017-12-27', '11:28 AM', 'School Compound', '2017-10-17 03:28:53'),
(5, 'End Of The Graduation', 'testing mode', '2017-12-15', '10:38 AM', 'School Compound', '2017-10-17 04:39:09');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblfees`
--

CREATE TABLE IF NOT EXISTS `tblfees` (
  `id` int(11) NOT NULL,
  `ClassName_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblfees`
--

INSERT INTO `tblfees` (`id`, `ClassName_id`, `name`, `amount`) VALUES
(1, 3, 'REGISTRATION FEE', 1000),
(2, 3, 'SCHOOL FEE', 11000),
(3, 3, 'SCHOOL UNIFORM FEE', 2500),
(4, 3, 'SCIENCE & FACILITIES', 1000),
(5, 3, 'EXAMINATION FEE', 500),
(6, 3, 'REPORT BOOKLET FEE', 500),
(7, 3, 'P.T.A', 500),
(8, 2, 'REGISTRATION FEE', 1000),
(9, 2, 'SCHOOL FEE', 9500),
(10, 2, 'SCHOOL UNIFORM FEE', 2000),
(11, 2, 'EXAMINATION FEE', 500),
(12, 2, 'REPORT BOOKLET FEE', 500),
(13, 2, 'P.T.A', 500),
(14, 1, 'REGISTRATION FEE', 1000),
(15, 1, 'SCHOOL FEE', 8000),
(16, 1, 'SCHOOL UNIFORM FEE', 1800),
(17, 1, 'EXAMINATION FEE', 500),
(18, 1, 'REPORT BOOKLET FEE', 500),
(19, 1, 'P.T.A', 500);",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE IF NOT EXISTS `tblgallery` (
  `id` int(11) NOT NULL,
  `photo_name` varchar(250) NOT NULL,
  `album_id` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `slug` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `photo_name`, `album_id`, `link`, `slug`, `date`) VALUES
(26, 'DSC_1337.JPG', 0, '../gallery_image/852502618.JPG', '1508298080dalwc', '2017-10-18 03:41:20'),
(27, 'DSC_1570.JPG', 0, '../gallery_image/956295274.JPG', '1508298080ugzyt', '2017-10-18 03:41:20'),
(28, 'DSC_1558.JPG', 0, '../gallery_image/294724669.JPG', '1508298083nuirf', '2017-10-18 03:41:23'),
(34, 'DSC_1492.JPG', 0, '../gallery_image/131332996.JPG', '1508298325rboqn', '2017-10-18 03:45:25'),
(35, 'DSC_1491.JPG', 0, '../gallery_image/598141759.JPG', '1508298325kqdos', '2017-10-18 03:45:25'),
(36, 'DSC_1493.JPG', 0, '../gallery_image/950916302.JPG', '1508298330oxlpv', '2017-10-18 03:45:30'),
(37, 'DSC_1494.JPG', 0, '../gallery_image/1010128033.JPG', '1508298330vjfsh', '2017-10-18 03:45:30'),
(38, 'DSC_1496.JPG', 0, '../gallery_image/1110219956.JPG', '1508298332khevt', '2017-10-18 03:45:32'),
(39, 'DSC_1495.JPG', 0, '../gallery_image/1194217993.JPG', '1508298332frodi', '2017-10-18 03:45:32'),
(40, 'DSC_1498.JPG', 0, '../gallery_image/877762273.JPG', '1508298334wenlt', '2017-10-18 03:45:34'),
(41, 'DSC_1497.JPG', 0, '../gallery_image/209909028.JPG', '1508298334ivgru', '2017-10-18 03:45:34'),
(42, 'DSC_1499.JPG', 0, '../gallery_image/502783332.JPG', '1508298335zuilt', '2017-10-18 03:45:35');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE IF NOT EXISTS `tblnews` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`id`, `title`, `content`, `image`, `date`, `last_update`) VALUES
(2, 'testing news post', 'ha dwiadf idfwd\r\ndsdhfsid\r\ndsdijs dw\r\ndsdjsw dws', '', '2017-10-16 04:41:37', '2017-10-16 04:41:37'),
(3, 'school mid term break', 'school will be going on a short break soon please all parent should inform their children of this', '', '2017-10-17 03:26:54', '2017-10-17 03:26:54');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE IF NOT EXISTS `tblpages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(250) NOT NULL,
  `slug` text NOT NULL,
  `content` text NOT NULL,
  `row` enum('1','2','3','4') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `page_name`, `slug`, `content`, `row`, `date`) VALUES
(1, 'About Us', 'about', '<p>In October 2015, the Kano State Government gave an approval to the establishment of an educational initiative. This was the <span style='font-size:14px'><strong>Medni&#39;ima</strong></span> Teaching and Learning Center, which was situated at the Badawa Layout Kano. It&rsquo;s dual objectives consisted the provision of complementary evening lessons to secondary school students and enabling assistance to credit deficient school learners.</p>\r\n', '1', '2017-10-25 01:37:03'),
(2, 'Academic Curriculum', 'academic-curriculum', '<p><strong>The College</strong> runs a six-year programme divided into two sections</p>\r\n\r\n<p>The Junior Secondary School (JSS) and the Senior Secondary School (SSS) in accordance with the National Policy on Education, simply described as the 6-3-3-4 system of education. As the School awaits the (9-3-4) New National policy on Education.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=font-size:18px><strong>SECTION I:- Junior Secondary School. </strong></span></p>\r\n\r\n<p>The first 3 years are spent in the junior school. Students are prepared for the Junior Secondary Certificate Examinations (JSCE) State and National Examination Council (NECO) Federal.</p>\r\n\r\n<p>The following subjects are available for study:-</p>\r\n\r\n<ol>\r\n	<li>Mathematics,</li>\r\n	<li>English Language,</li>\r\n	<li>Agricultural Science,</li>\r\n	<li>Physical &amp; Health Education,</li>\r\n	<li>Business Studies,</li>\r\n	<li>Basic Technology,</li>\r\n	<li>French,</li>\r\n	<li>Music,</li>\r\n	<li>Home Economics,</li>\r\n	<li>Hausa,</li>\r\n	<li>Creative Art,</li>\r\n	<li>Computer Science,</li>\r\n	<li>Basic Science,</li>\r\n	<li>Christian Religious Studies &amp; Social Studies.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style='font-size:18px'><strong>SECTION II:- Senior Secondary School.</strong></span></p>\r\n\r\n<p>At the Senior Secondary School, students are prepared for the following :-</p>\r\n\r\n<p><strong>(a) Primary Programmes</strong></p>\r\n\r\n<p>I. WASSCE (West African Senior School Certificate Examination)</p>\r\n\r\n<p>II. NECO SSCE (National Examination Council)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>(b) Secondary Programmes </strong></p>\r\n\r\n<p>I. Cambridge O&rsquo;level</p>\r\n\r\n<p>II. U.M.E (University Matriculation Examinations of JAMB)</p>\r\n\r\n<p>III. IJMB (Interim Joint Matriculation Board)</p>\r\n', '1', '2017-10-25 01:43:05');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblparent`
--

CREATE TABLE IF NOT EXISTS `tblparent` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `p_photo` varchar(250) NOT NULL,
  `children_id` text NOT NULL,
  `address` text NOT NULL,
  `state` varchar(200) NOT NULL,
  `LGA` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `school_ref` enum('1','2') NOT NULL,
  `pta_exco` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblparent`
--

INSERT INTO `tblparent` (`id`, `title`, `username`, `fullname`, `occupation`, `gender`, `phone`, `email`, `password`, `p_photo`, `children_id`, `address`, `state`, `LGA`, `town`, `school_ref`, `pta_exco`, `status`, `date`) VALUES
(1, 'Mrs', 'MIS/PAR/88921', 'Naima Ahmed', 'teacher', 'Female', '08028825833', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ueueyww.jpg', '1,2', 'badawa', 'kano', 'nassawra', 'ishfhsds', '2', '1', '', '2017-10-24 02:49:48'),
(2, 'Mr', 'MIS/PAR/21457', 'Sulyman Yekeen', 'Teacher', 'Female', '08108677175', 'sule@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '1', 'dfghugfyds', 'kwara', 'irepodun', 'ajase', '1', '0', '', '2017-10-24 10:20:10'),
(3, 'Mr', 'MIS/PAR/23491', 'Sanusi Akinwumi', 'engr', 'Male', '07038858834', 'asdarrrrds@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '3', 'ertyu987y7', 'kwara', 'irepodun', 'ishfhsds', '2', '1', '1', '2017-10-24 10:19:17');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblptanews`
--

CREATE TABLE IF NOT EXISTS `tblptanews` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblptanews`
--

INSERT INTO `tblptanews` (`id`, `title`, `content`, `image`, `date`, `last_update`) VALUES
(2, 'testing news post', 'ha dwiadf idfwd\r\ndsdhfsid\r\ndsdijs dw\r\ndsdjsw dws', '', '2017-10-16 04:41:37', '2017-10-16 04:41:37'),
(3, 'school mid term break', 'school will be going on a short break soon please all parent should inform their children of this', '', '2017-10-17 03:26:54', '2017-10-17 03:26:54'),
(4, 'pta meeting held on 14', 'the meeting started by 3 and sjjkajdfasdfasdfas', '', '2017-05-14 00:00:00', '2017-10-24 04:38:46');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblpta_excos`
--

CREATE TABLE IF NOT EXISTS `tblpta_excos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `post` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblpta_excos`
--

INSERT INTO `tblpta_excos` (`id`, `parent_id`, `post`, `date`) VALUES
(1, 1, 'Chair Lady', '2017-10-23 22:42:52'),
(3, 3, 'chairman', '2017-10-24 10:19:17');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE IF NOT EXISTS `tblquestion` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `question` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblquestion`
--

INSERT INTO `tblquestion` (`id`, `name`, `phone`, `email`, `question`, `date`) VALUES
(1, 'ismartnews', '08028825833', 'mdtvhausa@gmail.com', 'sjadhjasda dadada\r\nsd\r\nadsa\r\ndadad\r\na', '2017-10-17 03:23:04');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE IF NOT EXISTS `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `termid` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `test_marks` int(11) NOT NULL,
  `exam_marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `termid`, `session_id`, `SubjectId`, `test_marks`, `exam_marks`, `PostingDate`, `UpdationDate`) VALUES
(16, 1, 7, 1, '2017', 8, 21, 43, '2017-10-24 09:30:58', NULL),
(17, 1, 7, 1, '2017', 14, 12, 23, '2017-10-24 09:30:58', NULL),
(18, 1, 7, 1, '2017', 2, 12, 32, '2017-10-24 09:30:58', NULL),
(19, 1, 7, 1, '2017', 16, 23, 53, '2017-10-24 09:30:58', NULL),
(20, 1, 7, 1, '2017', 1, 30, 50, '2017-10-24 09:30:58', NULL);",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblscracth_card`
--

CREATE TABLE IF NOT EXISTS `tblscracth_card` (
  `id` int(11) NOT NULL,
  `sn` varchar(15) NOT NULL,
  `pin` varchar(15) NOT NULL,
  `available` enum('0','1') NOT NULL,
  `used_time` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblscracth_card`
--

INSERT INTO `tblscracth_card` (`id`, `sn`, `pin`, `available`, `used_time`, `created`) VALUES
(1, 'e1vXhG8Mtl4smH', '5454644', '1', 0, '2017-10-17 04:36:30'),
(2, 'waplJ62dUUmRMk', '2297634', '1', 0, '2017-10-17 04:36:30'),
(3, 'waplJ62dUUmRMk', '2297634', '1', 0, '2017-10-17 04:36:30'),
(4, 'dv6UeNbp53kwit', '5945637', '1', 0, '2017-10-17 04:36:30'),
(5, 'LGNC2eD2eaiQ62', '9593641', '1', 0, '2017-10-17 04:36:30'),
(6, 'LGNC2eD2eaiQ62', '9593641', '1', 0, '2017-10-17 04:36:30'),
(7, 'WFwtHhXHLsaHJS', '8325737', '1', 0, '2017-10-17 04:36:49'),
(8, 'EZDadz9SvQYlfa', '3084852', '1', 0, '2017-10-17 04:36:49'),
(9, 'wtTIzHieVyWG4i', '6732855', '1', 0, '2017-10-17 04:36:49'),
(10, 'wtTIzHieVyWG4i', '6732855', '1', 0, '2017-10-17 04:36:49'),
(11, 'dEk1MYKr6XUkQs', '1491970', '1', 0, '2017-10-17 04:36:49'),
(12, 'dEk1MYKr6XUkQs', '1491970', '1', 0, '2017-10-17 04:36:49'),
(13, 'tEB8iePE18qQba', '5374891', '1', 0, '2017-10-17 04:36:49'),
(14, 'aYSp5x1Qagnuyj', '9022894', '1', 0, '2017-10-17 04:36:49'),
(15, 'ItiWRFacBFmPLs', '3782009', '1', 0, '2017-10-17 04:36:49'),
(16, 'gXHwBnl1LMiO59', '2189127', '1', 0, '2017-10-17 04:36:49'),
(17, 'OsXdW6MDvugtSI', '5837131', '1', 0, '2017-10-17 04:36:49'),
(18, 'OsXdW6MDvugtSI', '5837131', '1', 0, '2017-10-17 04:36:49'),
(19, '6DpMtOxOVTeOpQ', '9485134', '1', 0, '2017-10-17 04:36:49'),
(20, 'mX64GfXa72ctCY', '4244249', '1', 0, '2017-10-17 04:36:49'),
(21, 'PBIh9xH9lTNq9e', '6761610', '1', 0, '2017-10-17 04:36:49');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblscracth_card_use`
--

CREATE TABLE IF NOT EXISTS `tblscracth_card_use` (
  `id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `time_used` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblscracth_card_use`
--

INSERT INTO `tblscracth_card_use` (`id`, `card_id`, `student_id`, `class_id`, `term_id`, `session_id`, `time_used`, `date`) VALUES
(1, 1, 1, 7, 1, '2017', 4, '2017-10-24 09:31:05');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE IF NOT EXISTS `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `photo` text NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(200) NOT NULL,
  `LGA` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `sport_house` varchar(200) NOT NULL,
  `fee_payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `F_school_name` text NOT NULL,
  `F_school_address` text NOT NULL,
  `F_school_date` date NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `password`, `StudentEmail`, `Gender`, `photo`, `DOB`, `ClassId`, `parent_id`, `address`, `state`, `LGA`, `town`, `sport_house`, `fee_payment_status`, `F_school_name`, `F_school_address`, `F_school_date`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'adana ibrahim ololade', 'MIS/STU/89124', '827ccb0eea8a706c4c34a16891f84e7b', 'o89124@mis.com', 'Male', '89124.png', '2017/10/20', 7, 1, 'adrghjkl', 'kwara', 'irepodun', 'ajase', '', '0', 'wertyui', 'uewrty', '2017-10-20', '2017-10-21 01:29:57', '2017-10-22 06:32:00', 1),
(2, 'abdul yekeen olamide', 'MIS/STU/77254', '827ccb0eea8a706c4c34a16891f84e7b', 'o77254@mis.com', 'Male', '77254.jpg', '2014/02/04', 1, 1, 'drtfghjuk', 'kwara', 'irepodun', 'ajase', '', '0', 'my former school noni', 'sdfghj', '2017-05-22', '2017-10-21 03:09:05', '2017-10-22 06:32:05', 1),
(3, 'Sanusi Tajudeen Akinwumi', 'MIS/STU/54106', '827ccb0eea8a706c4c34a16891f84e7b', 'a54106@mis.com', 'Male', '54106.JPG', '2015/08/06', 8, 0, 'Tokarawa off Hadejia', 'Osun', 'Aiyedade', 'Gbongan', '', '0', 'Medniima International School', 'Badawa layout', '2017-09-18', '2017-10-24 07:48:52', '2017-10-24 07:48:52', 1);",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE IF NOT EXISTS `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 1, '2017-10-12 02:11:33', '2017-10-12 02:11:33'),
(2, 1, 2, 1, '2017-10-12 02:11:40', '2017-10-12 02:11:40'),
(3, 1, 5, 1, '2017-10-12 02:11:54', '2017-10-12 02:11:54'),
(4, 1, 6, 1, '2017-10-12 02:12:10', '2017-10-12 02:12:10'),
(5, 1, 7, 1, '2017-10-12 02:12:17', '2017-10-12 02:12:17'),
(7, 1, 3, 1, '2017-10-14 10:25:18', '2017-10-14 10:25:18'),
(8, 1, 8, 1, '2017-10-14 10:25:32', '2017-10-14 10:25:32'),
(9, 1, 13, 1, '2017-10-14 10:25:44', '2017-10-14 10:25:44'),
(10, 1, 12, 1, '2017-10-14 10:26:04', '2017-10-14 10:26:04'),
(11, 1, 4, 1, '2017-10-14 10:26:25', '2017-10-14 10:26:25'),
(12, 1, 14, 1, '2017-10-14 10:26:39', '2017-10-14 10:26:39'),
(13, 1, 15, 1, '2017-10-14 10:27:00', '2017-10-14 10:27:00'),
(14, 1, 16, 1, '2017-10-14 10:27:12', '2017-10-14 10:27:12'),
(15, 2, 1, 1, '2017-10-14 10:57:37', '2017-10-14 10:57:37'),
(16, 2, 2, 1, '2017-10-14 10:57:48', '2017-10-14 10:57:48'),
(17, 2, 7, 1, '2017-10-14 10:57:58', '2017-10-14 10:57:58'),
(18, 2, 9, 1, '2017-10-14 10:58:12', '2017-10-14 10:58:12'),
(19, 2, 17, 1, '2017-10-14 10:58:26', '2017-10-14 10:58:26'),
(20, 2, 14, 1, '2017-10-14 10:58:40', '2017-10-14 10:58:40'),
(21, 2, 4, 1, '2017-10-14 10:58:57', '2017-10-14 10:58:57'),
(22, 2, 12, 1, '2017-10-14 10:59:08', '2017-10-14 10:59:08'),
(23, 2, 10, 1, '2017-10-14 10:59:21', '2017-10-14 10:59:21'),
(24, 2, 13, 1, '2017-10-14 10:59:32', '2017-10-14 10:59:32'),
(25, 2, 15, 1, '2017-10-14 10:59:45', '2017-10-14 10:59:45'),
(26, 2, 16, 1, '2017-10-14 10:59:55', '2017-10-14 10:59:55'),
(27, 2, 3, 1, '2017-10-14 11:00:07', '2017-10-14 11:00:07'),
(28, 3, 1, 1, '2017-10-14 11:01:07', '2017-10-14 11:01:07'),
(29, 3, 2, 1, '2017-10-14 11:01:18', '2017-10-14 11:01:18'),
(30, 3, 7, 1, '2017-10-14 11:01:26', '2017-10-14 11:01:26'),
(31, 3, 17, 1, '2017-10-14 11:01:38', '2017-10-14 11:01:38'),
(32, 3, 11, 1, '2017-10-14 11:02:01', '2017-10-14 11:02:01'),
(33, 3, 4, 1, '2017-10-14 11:02:19', '2017-10-14 11:02:19'),
(34, 3, 9, 1, '2017-10-14 11:02:36', '2017-10-14 11:02:36'),
(35, 3, 3, 1, '2017-10-14 11:02:53', '2017-10-14 11:02:53'),
(36, 3, 14, 1, '2017-10-14 11:03:06', '2017-10-14 11:03:06'),
(37, 3, 12, 1, '2017-10-14 11:03:35', '2017-10-14 11:03:35'),
(38, 3, 8, 1, '2017-10-14 11:03:55', '2017-10-14 11:03:55'),
(39, 3, 15, 1, '2017-10-14 11:04:06', '2017-10-14 11:04:06'),
(40, 3, 16, 1, '2017-10-14 11:04:17', '2017-10-14 11:04:17'),
(41, 7, 1, 1, '2017-10-17 04:26:36', '2017-10-17 04:26:36'),
(42, 7, 2, 1, '2017-10-17 04:26:47', '2017-10-17 04:26:47'),
(43, 7, 8, 1, '2017-10-17 04:27:00', '2017-10-17 04:27:00'),
(44, 7, 16, 1, '2017-10-17 04:27:12', '2017-10-17 04:27:12'),
(45, 7, 14, 1, '2017-10-17 04:27:28', '2017-10-17 04:27:28');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'MATHEMATICS', 'MTH', '2017-10-12 02:05:18', '2017-10-14 09:27:56'),
(2, 'ENGLISH', 'ENG', '2017-10-12 02:05:27', '0000-00-00 00:00:00'),
(3, 'GEOGRAPHY', 'GEO', '2017-10-12 02:05:35', '0000-00-00 00:00:00'),
(4, 'ECONOMICS', 'ECO', '2017-10-12 02:06:12', '0000-00-00 00:00:00'),
(5, 'PHYSICS', 'PHY', '2017-10-12 02:06:22', '0000-00-00 00:00:00'),
(6, 'CHEMISTRY', 'CHM', '2017-10-12 02:06:31', '0000-00-00 00:00:00'),
(7, 'BIOLOGY', 'BIO', '2017-10-12 02:06:40', '0000-00-00 00:00:00'),
(8, 'AGRICULTURAL SCIENCE', 'AGRIC', '2017-10-12 02:07:03', '0000-00-00 00:00:00'),
(9, 'COMMERCE', 'COMMERCE', '2017-10-12 02:07:17', '0000-00-00 00:00:00'),
(10, 'ACCOUNTING', 'ACCT', '2017-10-12 02:07:29', '0000-00-00 00:00:00'),
(11, 'LITRATURE', 'LIT', '2017-10-12 02:07:46', '0000-00-00 00:00:00'),
(12, 'COMPUTER STUDIES', 'COM', '2017-10-12 02:07:56', '2017-10-14 09:28:53'),
(13, 'FISHERY', 'FSH', '2017-10-14 09:31:27', '0000-00-00 00:00:00'),
(14, 'CIVIC EDUCATION', 'CIVIC', '2017-10-14 09:31:43', '0000-00-00 00:00:00'),
(15, 'HAUSA LANGUAGE', 'HAUSA', '2017-10-14 09:31:57', '0000-00-00 00:00:00'),
(16, 'IRK/CRK', 'IRK/CRK', '2017-10-14 09:32:11', '0000-00-00 00:00:00'),
(17, 'GOVERNMENT', 'GOV', '2017-10-14 09:32:31', '0000-00-00 00:00:00'),
(18, 'Qautitative Reasoning ', 'Quan', '2017-10-17 04:25:18', '0000-00-00 00:00:00');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblsubmited_assignment`
--

CREATE TABLE IF NOT EXISTS `tblsubmited_assignment` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `submited_date` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL,
  `teacher_comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE IF NOT EXISTS `tblteacher` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `password` text NOT NULL,
  `classid` int(11) NOT NULL,
  `decipline` varchar(250) NOT NULL,
  `subject_taken` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `employ_date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`id`, `username`, `fullname`, `email`, `phone`, `address`, `gender`, `DOB`, `password`, `classid`, `decipline`, `subject_taken`, `photo`, `employ_date`, `salary`, `status`, `date`) VALUES
(2, 'MIS/STAFF/26272', 'omolola owoeye', 'ismartnaija@gmail.com', '08028825833', 'sdfxcghjkllkjhjhaersdtgfhjpoftdf', 'Female', '1993-11-08', 'c82138c7e01ad922b0a58fdd33c3a91c', 1, 'chemistry', '1,2,3', '26272.jpg', '2017-10-02', 10000, '1', '2017-10-21 07:03:45');",$link);

$result .= mysql_query(" -- --------------------------------------------------------

--
-- Table structure for table `tblterm`
--

CREATE TABLE IF NOT EXISTS `tblterm` (
  `id` int(11) NOT NULL,
  `term` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;",$link);

$result .= mysql_query(" --
-- Dumping data for table `tblterm`
--

INSERT INTO `tblterm` (`id`, `term`, `date`) VALUES
(1, '1st Term', '2017-10-11 23:35:45'),
(2, '2nd Term', '2017-10-11 23:35:45'),
(3, '3rd Term', '2017-10-11 23:35:54');",$link);



$result .= mysql_query("--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_configuration`
--
ALTER TABLE `quiz_configuration`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `student_id` (`student_id`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_settings`
--
ALTER TABLE `quiz_settings`
  ADD UNIQUE KEY `id` (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_subjectcombination`
--
ALTER TABLE `quiz_subjectcombination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblSubj_ibfk_1` (`CatId`),
  ADD KEY `tblSubj_ibfk_2` (`SubjectId`);",$link);

$result .= mysql_query("--
-- Indexes for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  ADD PRIMARY KEY (`subject_id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblassignment`
--
ALTER TABLE `tblassignment`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblbook_tutor`
--
ALTER TABLE `tblbook_tutor`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblfees`
--
ALTER TABLE `tblfees`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblparent`
--
ALTER TABLE `tblparent`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblptanews`
--
ALTER TABLE `tblptanews`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblpta_excos`
--
ALTER TABLE `tblpta_excos`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_ibfk_1` (`StudentId`),
  ADD KEY `result_ibfk_2` (`ClassId`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblscracth_card`
--
ALTER TABLE `tblscracth_card`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblscracth_card_use`
--
ALTER TABLE `tblscracth_card_use`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_ibfk_2` (`card_id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblSubj_ibfk_1` (`ClassId`),
  ADD KEY `tblSubj_ibfk_2` (`SubjectId`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblsubmited_assignment`
--
ALTER TABLE `tblsubmited_assignment`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`id`);",$link);

$result .= mysql_query("--
-- Indexes for table `tblterm`
--
ALTER TABLE `tblterm`
  ADD PRIMARY KEY (`id`);",$link);



$result .= mysql_query("--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_configuration`
--
ALTER TABLE `quiz_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1067;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_settings`
--
ALTER TABLE `quiz_settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_subjectcombination`
--
ALTER TABLE `quiz_subjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblassignment`
--
ALTER TABLE `tblassignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblbook_tutor`
--
ALTER TABLE `tblbook_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblfees`
--
ALTER TABLE `tblfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblparent`
--
ALTER TABLE `tblparent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblptanews`
--
ALTER TABLE `tblptanews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblpta_excos`
--
ALTER TABLE `tblpta_excos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblscracth_card`
--
ALTER TABLE `tblscracth_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblscracth_card_use`
--
ALTER TABLE `tblscracth_card_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblsubmited_assignment`
--
ALTER TABLE `tblsubmited_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;",$link);
$result .= mysql_query("--
-- AUTO_INCREMENT for table `tblterm`
--
ALTER TABLE `tblterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;",$link);


$result .= mysql_query("--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);

$result .= mysql_query("--
-- Constraints for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD CONSTRAINT `quiz_result_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `quiz_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_3` FOREIGN KEY (`ques_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `tblstudents` (`StudentId`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);

$result .= mysql_query("--
-- Constraints for table `quiz_subjectcombination`
--
ALTER TABLE `quiz_subjectcombination`
  ADD CONSTRAINT `quiz_subjectcombination_ibfk_1` FOREIGN KEY (`CatId`) REFERENCES `quiz_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_subjectcombination_ibfk_2` FOREIGN KEY (`SubjectId`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);

$result .= mysql_query("--
-- Constraints for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `tblstudents` (`StudentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`ClassId`) REFERENCES `tblclasses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);

$result .= mysql_query("--
-- Constraints for table `tblscracth_card_use`
--
ALTER TABLE `tblscracth_card_use`
  ADD CONSTRAINT `card_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `tblscracth_card` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);

$result .= mysql_query("--
-- Constraints for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD CONSTRAINT `tblSubj_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `tblclasses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblSubj_ibfk_2` FOREIGN KEY (`SubjectId`) REFERENCES `tblsubjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;",$link);



		

		@mysql_free_result($link);
	 	if (!$result)
		{ echo(" <div align='center' class='errortext'>
				 <p class='errortext'>Unable to create tables.<br>");
		     echo("Your tables might have already be created.</p>");
		    echo(" <div>");
		    //echo(mysql_error());
		}
		else
		{
		   include "school-details-settings.php";
		}
	}
	
else
{
	$vv =false;
}


if($vv === false)
{ ?>


<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">iSt Installation Manager</h3>
          </div>
          <div class="box-body">
<p>
Unable to connect to the database.<br>
Please check your database entries</p>
<form name=setf method=POST action='<?php echo $PHP_SELF;?>' >
<input type=hidden name=type value=changedb>
 <div class="form-group mt-20">
                                        
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Database Entries<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
</form>
</div>
</div>


<? }
?>
