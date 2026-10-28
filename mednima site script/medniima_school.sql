-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 03:37 PM
-- Server version: 5.6.26-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medniima_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'c82138c7e01ad922b0a58fdd33c3a91c', '2017-10-11 16:22:10');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
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
(10, 'Academic Curriculum in Brief\n', 'ACADEMIC_CURRICULUM', '<p><strong>Medni&#39;ima</strong> runs a six-year programme divided into two sections - The Junior Secondary School (JSS) and the Senior Secondary School (SSS) in accordance with the National Policy on Education, simply described as the 6-3-3-4 system of education. As the School awaits the (9-3-4) New National policy on Education. SECTION I:- Junior Secondary School. The first 3 years are spent in the junior school. Students are prepared for the Junior Secondary Certificate Examinations (JSCE) State and National Examination Council (NECO) Federal. The following subjects are available for study:- Mathematics, Agricultural Science, Physical &amp; Health Education, English Language, Business Studies, Basic Technology, French, Music, Home Economics, Yoruba, Creative Art, Computer Science, Basic Science, Christian Religious Studies &amp; Social Studies. SECTION II:- Senior Secondary School. At the Senior Secondary School, students are prepared for the following :- (a) Primary Programmes I. WASSCE (West African Senior School Certificate Examination) II. NECO SSCE (National Examination Council) (b) Secondary Programmes I. Cambridge O&rsquo;level II. U.M.E (University Matriculation Examinations of JAMB) III. IJMB (Interim Joint Matriculation Board)</p>\r\n', 'this is the school academic curiculum in Brief\n', 2, 4),
(11, 'School Logo', 'SCHOOL_LOGO', 'logo.png', 'this is the school logo', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_link` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `name`, `image_link`, `date`) VALUES
(1, '', '../gallery_image/852502618.JPG', '2017-10-18 03:42:38'),
(2, '', '../gallery_image/956295274.JPG', '2017-10-18 03:43:29'),
(3, '', '../gallery_image/270454745.JPG', '2017-10-18 03:44:12'),
(4, '', '../gallery_image/950916302.JPG', '2017-10-18 03:47:51'),
(5, '', '../gallery_image/598141759.JPG', '2017-10-18 03:48:05');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
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
(9, 'NABTEB', 'National Business And Technical Examinations Board', 'nabteb.jpg', 'nabteb', '1', '2017-11-01 04:01:43');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_configuration`
--

INSERT INTO `quiz_configuration` (`id`, `name`, `configuration_key`, `configuration_value`, `desc`, `group_id`, `sort_by`) VALUES
(1, 'Question Per Page', 'QUESTION_PER_PAGE', '1', 'No of Questions display in single page', 1, 1),
(2, 'Exam Time', 'EXAM_TIME', '00:30:00', 'Examination Time Duration', 1, 2);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=1067 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Option_E`, `Answer`, `Diagram`, `sub_id`) VALUES
(1, 'Which of the following is correct? ', 'The average kinetic energy of a gas is directly proportional to its temperature.', ' At constant temperature, the volume of afgas increases as the pressure increases.', 'The pressure of a gas is inversely proportional to its volume.', 'The temperature of a gas is directly proportional to its volume', 'The collisions of molecules with each other are inelastic', 'A', NULL, 4),
(2, 'One of the following techniques can be used  to show that chlorophyll pigment is a mixture of chemical compounds and not a single coloured compound ', 'Crystallization', 'Hydrolysis', 'Sublimation', ' Filtration', 'chromatography', 'E', NULL, 4),
(3, 'Zinc Oxide is a ', ' Basic oxide', ' acidic oxide', 'amphoteric oxide', 'neutral oxide', 'reactive oxide', 'C', NULL, 4),
(4, 'When sodium chloride and metallic sodium are each dissolved in water ', ' both processes are exothermic', 'both processes are endothermic', 'the dissolution of metallic sodium is endothermic', 'the dissolution of metallic sodium is exothermic', 'the dissolution of sodium is explosive ', 'D', NULL, 4),
(5, 'The periodic classification of the elements is an arrangement of the elements in order of their ', ' atomic weights ', 'isotopic weights ', 'molecular weights', 'atomic', 'atomic masses', 'D', NULL, 4),
(6, 'In the reaction between sodium hydroxide and sulphuric acid solutions, what volume of 0.5 molar hydroxide would exactly neutralize 10cm cube of 1.25 molar sulphuric acid solutions? ', '5 cm cube', '10cm cube', '20cm cube', '25cm cube', '50cm cube', 'E', NULL, 4),
(7, 'A small quantity of solid ammonium chloride (NH4SCI) was heated gently in a test tube, the solid gradually disappeared to produce a mixture of two gases. Later a white cloudy deposit was observed on the cooler part of the test tube. The ammonium chloride is said to have undergone ', 'distillation', 'sublimation', 'precipitation', 'evaporation', 'decomposition', 'B', NULL, 4),
(8, 'Elements P,Q,R.S, have 6,11,15 and 17 electrons respectively, therefore, A. P will form an electrovalent bond with R B Q will form a covalent bond with S C R will form an electrovalent bond with S D Q will form an electrovalent bond with S E Q will form a covalent bond with R.', 'P will form an electrovalent bond with R', ' Q will form a covalent bond with S', 'R will form an electrovalent bond with S', ' Q will form an electrovalent bond with S', ' Q will form a covalent bond with R.', 'D', NULL, 4),
(9, 'An element X forms the following compounds with chlorine: XCI4, XCI3, XCI2. This illustrates the A. law of multitude proportions B. law of chemical proportions C. nitrogen and oxygen D. law of conservation of mass E. law of definite proportions', ' law of multitude proportions', 'law of chemical proportions', 'nitrogen and oxygen', ' law of conservation of mass', 'law of definite proportions', 'A', NULL, 4),
(10, 'The oxidation state of chlorine in potassium chlorate is', '+1', '+2', '+3', '+5', '+7', 'D', NULL, 4),
(11, 'When air which contains the gases: oxygen, nitrogen, carbon dioxide, water vapour and the rare gases, is passed through alkaline pyrogallol and then over quicklime, the only gases left are:', 'nitrogen and carbon dioxide', ' the rare gases ', ' nitrogen and oxygen ', 'nitrogen and the rare gases ', 'nitrogen, carbon dioxide and the rare gases', 'D', NULL, 4),
(12, 'When heat is absorbed during a chemical reaction, the reaction is said to be', ' thermodynamic', 'exothermic', 'isothermal ', 'endothermic', 'thermostatic', 'D', NULL, 4),
(13, 'When large hydrocarbon molecules are heated at high temperature in the presence of a catalyst to give smaller molecules, the process is known as ', 'disintegration', 'polymerization', 'cracking ', ' degration', 'distillation', 'C', NULL, 4),
(14, 'The pH of four solutions W,X,Y,Y are 4,6,8,10 respectively. Therefore,', 'none of these solutions is acidic', 'the pH of Y is made more acidic by addition of distilled water', 'Z is the most acidic solution', 'W is the most acidic solution', 'X is neutral.', 'D', NULL, 4),
(15, 'When each of the nitrate of potassium, magnesium and iron is heated,', 'all the nitrates decompose to their oxides', 'the nitrate of magnesium gives the nitrate and oxygen', ' the nitrates of magnesium and iron give the oxides', ' the nitrate of iron gives the nitrate and oxygen', 'the nitrate of the magnesium is not decomposed. ', 'C', NULL, 4),
(16, 'Which of the following metals cannot replace hydrogen from water or stream? ', 'sodium', 'magnesium', 'iron', 'Calcium', 'copper', 'E', NULL, 4),
(17, 'A sample of hard water contains some calcium sulphate and calcium hydrogen hydroxide', 'N/A', 'N/A', 'adding sodium carbonate ', 'N/A', 'adding magnesium hydroxide', 'D', NULL, 4),
(18, 'During the electrolysis of copper II sulphate platinum electrodes, if litmus solution is added to the anode compartment,', 'the litmus turns blue but no gas is evolved', 'the litmus turns blue and oxygen is evolved', ' the litmus turns blue and hydrogen is evolved', 'the litmus turns red and oxygen is evolved ', ' the litmus turns red and then becomes colourless.', 'D', NULL, 4),
(19, 'The reaction between an organic acid and an alcohol in the presence of an acid catalyst is known as', 'saponification', 'dehydration', 'esterification', 'hydrolysis', 'hydration', 'C', NULL, 4),
(20, 'The IUPAC names for the compound CH3COOH and CH2 are respectively ', ' acetic acid and ethane', ' ethanoic acid and ethane', 'methanoic acid and ethylene', 'ethanol and ethene', 'acetic acid and ethylene.', 'B', NULL, 4),
(21, 'If 30cm cube of oxygen diffuses through a porous pot in 7 seconds, how long will it take 60cm3 of chlorine to diffuse through the same pot, if the vapour densities of oxygen and chlorine are 16 and 36 respectively? ', '9.3 sec', '14 sec', '21 sec', '28 sec', '30.3 sec', 'C', NULL, 4),
(22, 'Brass and Bronze are both metallic alloys. Which of the following constituents is common to both alloys? ', 'tin ', 'zinc', 'Copper', 'lead', 'aluminium', 'C', NULL, 4),
(23, 'Which of the following gases may not be dried with concentrated sulphuric acid? ', 'HCL', 'N2 ', 'Cl2', 'SO2', 'NH3', 'E', NULL, 4),
(24, 'Which of the following reactions does not take place in the smelting of iron in a blast furnace? ', 'CaCO3(s)?CaO(s) + CO2(g) ', ' C(s) + O2(g)?CO2(g)', '3Fe(s) + 2O2(g)?FeO4(s) ', 'SO2(S) CaO(s)', 'CO2(g) + C(S) ?2CO(g)', 'C', NULL, 4),
(25, 'Which of the following reactions does not a member of the homologous series of the parafins (alkanes)? ', 'C3H8', 'C5H12', 'C7H16', 'C15H32', 'C24H43', 'E', NULL, 4),
(26, 'When ammonia and hydrogen ion bond together to form ammonium ion, the bond formed is called', 'ionic bond ', 'electrovalent bond ', 'covalent bond', 'co-ordinate bond', ' hydrogen bond.', 'D', NULL, 4),
(27, 'An example of an alcohol is ', 'CCL4', 'CH3COOH', 'C2H6', 'CHCL3', 'CH3OH', 'E', NULL, 4),
(28, 'The nucleus of an atom contains', 'protons only', ' neutrons only', 'protons and electrons', 'neutrons and electrons', ' protons and neutrons.', 'E', NULL, 4),
(29, 'Hypochlorous acid is used as a bleach because', 'It is a strong acid', ' it yields chlorine readily in pure water', ' it is an oxidizing agent', 'it is a weak acid ', 'it is a reducing agent', 'C', NULL, 4),
(30, 'The normal boiling point of a liquid is defined as ', 'the temperature at which its vapour equals the atmospheric pressure', 'the temperature at which bubbles begin to form', 'the temperature at which the vapour pressure equals 1 atmosphere', ' the temperature at which the rate of condensation of vapour equals the rate of vapourisation of the liquid', ' the temperature at which the space above the liquid is saturated.', 'C', NULL, 4),
(31, 'Which of the following compounds will form a solution if exposed to the air?', 'Na2CO3.10H2O ', 'NaNO3', 'CuSO4', 'CaCl2', 'Na2SO4.1OH2O', 'D', NULL, 4),
(32, 'The most common type of chemical reaction which alkanes undergo is ', ' substitution', 'addition', 'condensation', 'polymerization', 'double decomposition', 'A', NULL, 4),
(33, 'Consider the following exothermic reaction 2SO2(g) = 2SO3(g). If the temperature of the reaction is reduced from 80C to 500C, and no other change takes place, then ', ' The reaction rate increases', 'concentration of SO3 decreases ', 'concentration of SO3 increases', ' SO3 gas becomes unreactive ', 'O2 gas becomes unreactive.', 'A', NULL, 4),
(34, 'If excess Zinc is added to a bluish green solution of copper (II) sulphate, and the excess zinc filtered off after completion of reaction, a colourless solution is obtained because ', 'both zinc and copper are metals', 'the sulphate radical and the zinc ions are divalent', 'zinc is more electropositive than copper', 'both zinc and copper are copper form depositive ions in solution', ' zinc is a reducing agent', 'C', NULL, 4),
(35, 'Three solutions contain carbonate, sulphate and sulphide ions respectively. One test that will identify just ONE of them completely is by adding to each of them of', 'barium chloride solution', ' dilute hydrochloric acid', ' lead nitrate solution', 'calcium chloride solution', 'sodium hydroxide solution.', 'B', NULL, 4),
(36, 'Two gas cylinders contain ethylene (ethane) and acetylene respectively. One test which can be used to distinguish between them is by ', 'passing each gas through bromine water', ' passing each gas through dilute potassium permaganate solution', 'passing each gas through silver nitrate solution', 'passing each gas through ammoniacal copper (I) chloride solution', ' treating each gas catalytically with excess hydrogen gas.', 'D', NULL, 4),
(37, 'No question, No question, No question.', 'N/A ', 'N/A', 'N/A', 'N/A', '', 'C', NULL, 4),
(38, 'If hydrogen sulphide gas is passed into a solution of a pure iron chloride, a yellow deposit appears. If the deposit is filtered a pale green solution is left behind. The pale green solution is ', 'dilute sulphuric acid', 'dilute hydrochloric acid', 'unreacted hydrogen sulphuric in water ', ' iron (III) chloride', ' iron (II) chloride.', 'E', NULL, 4),
(39, 'Which of the following changes is physical?', 'Adding iron fillings to aerated water ', 'Adding sodium metal to water', 'Colling a solution of iron (II) sulphate to obtain the hydrated salt', 'Cooling water to obtain ice', 'Burning the domestic gas (Utilgas) for cooking.', 'D', NULL, 4),
(40, 'By means of filtration, one component can be obtained pure from an aqueous mixture of sodium chloride and', 'Potassium nitrate', 'Sand', 'Lead nitrate', 'Sugar (glucose) ', 'Starch.', 'B', NULL, 4),
(41, 'Five atoms T,W,XY,Z, consist of the following particles:\n\n			T	W	X	Y	Z\n	Proton 		13	16	17	19	20\n	Electron		13	16	17	19	20\n	Neutron		14	16	35	20	20\nWhich of the five atoms can be described by the following properties: “Relative atomic mass is greater than 30 but less than 40, it has odd atomic number and forms a unipositive ion in solution” \n', 'T', 'W', 'X', 'Y', 'Z', 'D', NULL, 4),
(42, 'A solid X when heated gives off a brown gas. If X is soluble in excess sodium hydroxide solution but insoluble in excess ammonium hydroxide solution then X is ', ' basic lead carbonate', 'lead (II) nitrate', 'sodium carbonate', 'zinc nitrate', 'sodium nitrate', 'E', NULL, 4),
(43, 'Consider the solubility curves of three    salts X,Y and Z in the diagram, each solution of the salt contains 200g, and is heated to 1000 which solution or solution or solutions will deposit more than 100g of the solute when suddenly  cooled to O0C? ', 'X Only', 'Y Only', 'Z Only', ' X and Z', 'Y and Z', 'E', NULL, 4),
(44, 'An experimental test of the law of Conservation of Mass air in the gas jar had been used up by burning in the gas jar had been used up by burning is illustrated in the diagram. In practice, the flask is weighed before and after reaction between solutions X and Y which of the following pairs of solutions will be unsuitable for the experiments', 'X = hydrochloric acid; Y = silver nitrate', 'X = Barium chloride;  Y = Dilute sulphuric acid', ' X= Barium chloride;  Y = Dilute sulphuric acid', 'X = Hydrochloric acid; Y = Lead nitrate', 'X = Hydrochloric acid; Y = Sodium carbonate\n', 'E', NULL, 4),
(45, 'In titration involving sodium hydroxide solution and dilute hydrochloric acid, where would you place the base?', 'In the beaker', ' in the conical flask', ' In the burette', 'In the standard flask', ' In the measuring cylinder', 'B', NULL, 4),
(46, 'A gas jar was inverted over burning yellow phosphorus floating over water in a beaker. After burning, the water level was to rise in the gas jar. The water level rises because \n	', 'Pressure inside the gas jar is greater than pressure outside it', 'The air in the gas jar had been used up by burning', 'Oxygen in the gas jar had been used up by burning ', 'Nitrogen in the gas jar had been used up by burning ', 'The temperature in the jar had risen considerably\n', 'C', NULL, 4),
(47, 'You are provided with five gas jars containing SO2, CO2, H2, CO and NO respectively. Select a test from A to E which will identify ANY ONE of the gases completely. ', ' Pass each gas into lime water', 'Pass each gas into water and test with litmus paper', 'Pass each gas into concentrated sulphuric acid ', 'Expose each gas to atmospheric air ', 'Expose each gas to fumes of hydrogen chloride \n', 'A', NULL, 4),
(48, 'Which of the following substances would you use as an indicator in the titration of sodium carbonate solution against hydrochloric acid (complete neutralization) ', 'Litmus paper ', 'Phenolphthalein', 'Methylorange ', 'Universal indicator', 'None of these', 'C', NULL, 4),
(49, 'Five compounds R, T, W, X and Y form the following compounds: a basic hydride RH, an acidic hydride YH, amphoteric oxide W2O3XO2. Which of the elements is an alkali? ', 'R', 'T', 'W', 'X', 'Y', 'A', NULL, 4),
(50, 'Five compounds R, T, W, X and Y form the following compounds: a basic hydride RH, an acidic hydride YH, amphoteric oxide W2O3XO2. Which of the elements is an alkali? ', 'R', 'T', 'W', 'X', 'Y', 'A', NULL, 4),
(51, 'Which of following gases will diffuse fastest when passed through a porous lug?', 'Propane', 'Oxygen', 'Methane', 'Ammonia. [H = 1, C = 12, N = 14, 0 = 16]', '', 'C', NULL, 4),
(52, 'Mg(s) + 2HCl(aq)      MgCl2(aq) + H2(g). From the equation, the mass of magnesium required  to react with 250cm3 of 0.5M HCl is', '0.3g ', '1.5g ', '3.0g ', '2.4g [Mg = 24] ', '', 'B', NULL, 4),
(53, 'What is the temperature of a given mass of a gas initially at 0?C and 9 atm, if the pressure is reduced to 3 atm at constant volume?', '91K', '182K', '273K', '819K', '', 'A', NULL, 4),
(54, '56.00cm3 of a gas at s.t.p. weighted 0.11g. What is the vapour density of the gas?', '11.00', '22.00', '33.00', '44.00cm2 [molar volume of a gas at s.t.p. = 22.4dm3]', '', 'B', NULL, 4),
(55, 'A gaseous metallic chloride MCI consists of 20.22% of M by mass. The formula chloride is', 'MCI', 'MCI2', 'MCI3', 'M2CI6, CI = 35.5]', '', 'C', NULL, 4),
(56, 'Which of the following have its mass increased when heated in air? ', 'Helium', 'Magnesium', 'Copper pyrites ', 'Glass', '', 'C', NULL, 4),
(57, '200m3 each 0.1m solutions of lead (III) Trioxonitrate (V) and hydrochloric acid were mixed. Assuming that lead (II) chloride is completely insoluble, calculate the mass of (II) chloride that will be precipitated. ', '2.78g ', '5.56g ', '8.34g ', '11.12g [pb=207, CI=35.5, N=14, O=16]', '', 'B', NULL, 4),
(58, 'In the diagram, the mixture of the two solids P and Q can be separated by ', 'distillation', 'fractional distillation', 'crystallization', 'fractional crystallization', '', 'D', 'Solubility Diagram', 4),
(59, 'Nitrogen obtained from nitrogen contained compounds because the former contains', 'water vapour ', 'oxygen', 'carbon (IV) oxide ', 'rare gases', '', 'D', NULL, 4),
(60, '1s2s22p63s23p63d7 4s2. Ans element with this electron configuration is a ', 'non-metal ', 'metal', 'transition', 'group two element  ', '', 'C', NULL, 4),
(61, 'The method that can be used to convert hard water to soft water is', 'chlorination', 'passage over activated charcoal ', 'the use of an ion-exchange', 'aeration', '', 'C', NULL, 4),
(62, 'Given that electro negativity increases down a group in the periodic table, in which of the following compounds will be molecules be held together by the strongest hydrogen bond?  ', 'HF(g) ', 'NH3(g) ', 'CH4(g) ', 'HCI(g)', '', 'A', NULL, 4),
(63, 'In order to remove one electron from a 3s-orbital of gaseous sodium atom, about 496KJ moI-1 of energy is required. This energy is referred to as ', 'electron affinity', 'ionization energy', 'activation energy', 'electro  negativity', '', 'B', NULL, 4),
(64, 'In which of the following water molecules in the most disorderly arrangement ', 'Ice at 10?C', 'Ice at 0?C', 'Water at 100?C ', 'Steam at 1000C', '', 'C', NULL, 4),
(65, 'The element that is likely to participate in covalent rather than icon bonding is', 'Z', 'Y', 'X', 'W', '', 'C', 'Diagram', 4),
(66, 'The least reactive element is ', 'W', 'X', 'Y', 'Z', '', 'D', 'Diagram', 4),
(67, 'What is observed when aqueous solutions of each of tetraoxosulphate (VI) acic, potassium trioxoiodate (V) and potassium iodide are mixed together?', 'A white precipitate is formed', 'A green precipitate is formed', 'The mixture remains colourless ', 'The mixture turns reddish-brown', '', 'C', NULL, 4),
(68, 'The solution with the lowest pH value is ', '5ml of M/10 HCI ', '10ml of M/10 HCI ', '15ml of M/5HCL ', '20ml of M/8HCL', '', 'A', NULL, 4),
(69, 'The correct order of increasing oxidation number of the transition metal ions for the compounds K2Cr2O7, O5 and KMnO4 is ', 'V2O5<K2Cr2O7<KMnO2 ', 'K2Cr2O7<KMnO2<V2O5 ', 'KMnO4<K2Cr2O7<V2O5 ', 'KMnO4<V2O5<K2CrO7', '', 'A', NULL, 4),
(70, 'From the diagram, the mass of crystals deposited when 1dm3 of a saturated solution is cooled from 80oC to 60oC is ', '117.00g   ', '58.50g ', '11.7g ', '5.85g [Na=23, CI=35.5]', '', 'A', NULL, 4),
(71, 'The solubility product of CU(IO3)2 is 1.80 x 10-7. Assuming that neither ions react appreciably with water to form H+ and OH-, what is the solubility of is salt? ', '2.7x10-8 mol dm-3', '9.0x10-3 mol dm-3', '3.0x10-3 moldm-3', '9.0x10-8 mol dm-3 ', '', 'B', NULL, 4),
(72, 'The set of pollutants that is most likely to be produced when petrol is accidentally spilled on plastic materials and ignited is ', 'Co, Co and SO2', 'CO, HCI and SO2', 'CO, CO2 and HCI', 'SO2, CO2 and HCI', '', 'B', NULL, 4),
(73, '0.25 mole of hydrogen chloride was dissolved in distilled water and the volume made up to 0.50dm3 . if 15.oocm3 of the solution requires 12.50cm3 of aqueous sodium trioxocarbonate of the alkaline solution.', '0.30 mol dm-3 ', '0.40 mole dm3', '0.50 ml dm-3 ', '0.60 mol dm-3', '', 'A', NULL, 4),
(74, 'N2O4(g) 2NO2(g). Increase in total pressure of this equilibrium reaction will', 'produce more of NO2(g) in the mixture', 'convert all of N2O4(g) to NO2(g)', 'N2O4(g) ', 'produce', '', 'C', NULL, 4),
(75, 'RS(aq) + HF(aq) = RF (s) + HS(aq) H =6.57 KJ mol-1 from the equation, it can be deduced that', 'the heat contant of the reactants is lower than that of the products', 'the heat content of the reactants is higher than that of the products', 'the reaction is slow', 'a large amount of heat is absorbed', '', 'B', NULL, 4),
(76, 'X+Y = Z. the rate equation for the chemical reactions, the overall order of the reaction is ', '0', '1', '2', '3', '', 'D', 'Reaction Rate', 4),
(77, '2SOP2(g) + O  =  2SO3(g). In the chemical reaction, the substance that will increase the rate of production of sulphur (VI) oxide is ', 'manganese (IV) oxide', 'finely divided iron ', 'vanadium (V) oxide', 'nickel', '', 'C', NULL, 4),
(78, 'Which of the following statement is true of the electromechanical series?                       ', 'Electropositivity of metals increases down the series', 'Electropositivity of non-metals decreases down the series ', 'Electropositivity of non-metals increases down the series ', 'Electropositivity of metals decreases down the series', '', 'D', NULL, 4),
(79, 'What quantity of electricity will liberate 0.125 moles of oxygen molecules during the electrolysis of dilute sodium chloride solution?', '24 125 coulombs ', '48 250 coulombs', '72 375 coulombs ', '96 500 coulombs [F=96 500c mol-1]', '', 'B', NULL, 4),
(80, 'The entropy and enthalpy of a system are a measure of', 'degree of disorderliness and heat content respectively ', 'heat content and degree of disorderliness respectively ', 'heat content of a system only', 'degree of disorderliness only', '', 'A', NULL, 4),
(81, 'When a current/ was passed through an electrolyte for 40minutes, a mass Xg of a univalent metal was deposited at the cathode. What mass of the metal will be deposited when a current 2/ is passed through the solution for 10 minutes? ', 'X/4g ', 'X/2g ', '2Xg', '3Xg', '', 'B', NULL, 4),
(82, 'Hydrogen is used in oxy-hydrogen flames for melting metals because it ', 'evolves a lot of heat when burnt', 'combines explosively with oxygen', 'is a very light gas ', 'is a rocket fuel', '', 'A', NULL, 4),
(83, 'A pair of compounds that can be used to generate a gas which has physiological effect on human beings is ', 'sodium trioxonatrate (IV) and calcium chloride', 'sodium dioxonitrate (III) and ammonium chloride', 'sodium Trioxonitrate (V) and ammonium chloride', 'sodium dioxonitrate (III and potassium chloride', '', 'C', NULL, 4),
(84, 'The gas that will form a white precipitate with acidified silver Trioxonitrate (V) is', 'NH3 ', 'SO2', 'CO2', 'HCI', '', 'D', NULL, 4),
(85, 'In the diagram Y is a mixture of ', 'calcium hydroxide and ammonium chloride', 'calcium hydroxide and sodium chloride ', 'sodium chloride and ammonium Trioxonitrate', 'sodium dioxonitrate (III) and ammonium chloride', '', 'A', NULL, 4),
(86, 'Chloride, bromine and resemble one another in that they ', 'dissolve in alkalis ', 'react violently with hydrogen without heating ', 'are liquids ', 'displace one another from solutions of their salts', '', 'B', NULL, 4),
(87, 'The salt that reacts with dilute hydrochloric acid to produce a pungent smelling gas which decolourizes acidifies purple potassium tetraoxomanganate (VII) solution is', 'NaSO4', 'NaSO3', 'Na2S', 'Na2CO3', '', 'B', NULL, 4),
(88, 'The pair of metals in the reactivity series that are unusually extracted by the electrolysis of their ores is ', 'magnesium and zinc', 'magnesium and calcium ', 'copper and zinc ', 'lead and calcium', '', 'B', NULL, 4),
(89, 'What properties of duralumin make it more useful than its constituent metals?', 'it is heavy with a high melting point', 'it is malleable and has high density', '. it is strong and light', 'it is hard and ductile', '', 'C', NULL, 4),
(90, 'Which of the following metals is passive to concentrated Trioxonitrate (V) acid? ', 'Iron ', 'Tin ', 'Copper', 'Zinc ', '', 'A', NULL, 4),
(91, 'A metal that can be extracted from cassiterite is', 'calcium', 'magnesium', 'tin', 'copper', '', 'C', NULL, 4),
(92, 'When excess ethanol is heated to 145?C in the presence of concentrated H2SO4, the product is ', 'ethyne', 'diethyl sulphate ', 'diethyl ether ', 'acetone', '', 'C', NULL, 4),
(93, 'How many grammes of bromine will saturate 5.2g of but-1-ene3-yne? ', '64.0g ', '48.0g ', '32.0g ', '16.0g [C=12, H=1, Br=80]  ', '', 'B', NULL, 4),
(94, 'When the two end alkyl groups of ethyl ethanoate are interchanged, the compound formed is known as ', 'methyl ethanoate ', 'ethyl propanoate ', 'methyl propanoate ', 'propyl ethanoate', '', 'C', NULL, 4),
(95, '2-methlprop-lene is an isomer of ', 'but-2-ene', 'pent-1-ene', '2-methlbut-ene ', '2-methylbut-1-ene', '', 'A', NULL, 4),
(96, 'Which of the following is a solvent for perfumes? ', 'C5H12', 'C4H6 ', 'CH3COOH', 'C2H5OH', '', 'D', NULL, 4),
(97, 'Which of the compounds above would react to take up two molecules of bromine during \nbromination?  ', 'I only', 'III only ', 'I and II only ', 'II and III only', '', 'C', 'Molecular Diagram', 4),
(98, 'The hydrocarbon that burns in air with a    sooty flame is ', 'C2H6', 'C3H8', 'C4H10', 'C6H6', '', 'D', NULL, 4),
(99, 'An organic compound that does not undergo a reaction with both hydrogen cyanide and hydroxylamine can be an ', 'alkaline', 'alkanal', 'alkanone', 'alkanoic acid', '', 'C', NULL, 4),
(100, 'Polyvinyl chloride is used to produce ', 'bread', 'pencils', ' ink ', 'pipes', '', 'D', NULL, 4),
(101, 'An example of oxidation-reduction enzyme is ', 'amylase', 'Protease', 'lipase', 'dehydrogenase', '', 'C', NULL, 4),
(102, 'What is the concentration of a solution containing 2g of NaOH IN 100cm3 of solution? ', '0.30 mol dm-3', '0.40 mol dm-3  ', '0.50 mol dm-3  ', '0.05 mol dm-3  [Na = 23,O = 16, h = 1]', '', 'C', NULL, 4),
(103, 'Which of the following properties is NOT peculiar to matter?  ', 'Random motion of particles increase from gas to solid', '. Kinetic energy of particles increases from solid to gas ', 'Random motion of particles increases from liquid to gas', 'Orderliness of particles increases from gas to liquid', '', 'D', NULL, 4),
(104, ' The principle of column chromatography is based on the ability of constituents to ', 'React with each other in the column', 'Move at different speeds in the column ', 'Dissolve in each other in the column', 'React with the solvent in the column', '', 'B', NULL, 4),
(105, 'From the diagram above, an ideal gas can be represented ', 'L', 'M', 'N', 'K', '', 'C', 'Diagram', 4),
(106, 'Which of the following statements is correct about the periodic table? ', 'Elements in the same period have the same number of valence electrons ', 'The non-metallic properties of the elements tend to decrease across each period ', 'The valence electrons of the elements increase progressively across the period ', 'Elements in the same group have the same number of electron shells', '', 'C', NULL, 4),
(107, 'The relative atomic mass of a naturally occurring lithium consisting of 90% 7 Li and 10% 6 Li is', '6.8', '6.9', '7.1', '6.2', '', 'B', NULL, 4),
(108, 'An isotope has atomic number of 15 and a mass number of 31. The number of protons it contains is', '31', '16', '15', '46', '', 'C', NULL, 4),
(109, 'The molecular lattice of iodine is held together by', 'Van der Waal?s forces ', 'Dative bond ', 'Metallic bond ', 'Hydrogen bond', '', 'A', NULL, 4),
(110, 'The arrangement of particles in crystal lattices can be studied using ', 'B ? rays ', 'X- rays ', 'Y ? rays ', 'A ? rays', '', 'B', NULL, 4),
(111, 'From the diagram above, find the amount of solute deposited when 200cm3 of the solution is cooled from 55?C to 40?C', '0.02 mole ', '0.10 mole ', '0.20 mole', '0.01 mole', '', 'B', 'Diagram', 4),
(112, 'The importance sodium aluminate (III) in the treatment of water is to ', 'Kill germs ', 'Cause tooth decay', '', '', '', 'B', NULL, 4),
(113, 'What type of bond exists between an element X with atomic number 12 and Y with atomic number 17? ', 'Dative ', 'Electrovalent ', 'Metallic', 'Covalent', '', 'B', NULL, 4),
(114, 'Hardness of water is mainly due to the presence of ', 'Calcium chloride or sodium chloride salts', '', 'Calcium trioxocarbonate (IV) or calcium tetraoxosulphate (VI)', 'Sodium hydroxide or magnesium hydroxide', '', 'C', NULL, 4),
(115, 'A suitable solvent for iodine and naphathalene is ', 'Benzene', 'Carbon (IV) sulphide', 'Ethanol ', 'Water', '', 'C', NULL, 4),
(116, 'Which of the following noble gases is commonly found in the atmosphere                          ', 'Argon', 'Xenon', 'Neon', 'Helium', '', 'C', NULL, 4),
(117, 'N2O4(g) 2NO2(g)  ? H = +ve. In the reaction above, an increase in temperature will        ', 'Shift the equilibrium to the left ', 'Increase the value of the equilibrium constant', 'Decrease the value of the equilibrium constant ', 'Increase the reactant production', '', 'B', NULL, 4),
(118, 'CH3 COOH(aq) + OH-(aq) + CH3COO(aq) + H2O(1) . In the reaction above, CH3COOH(aq)  is the', 'Conjugate acid', 'Conjugate base ', 'Acid', 'Base ', '', 'A', NULL, 4),
(119, 'How many cations will be from a solution of potassium tetraoxosulphate (VI)? ', '2', '3', '4', '1', '', 'A', NULL, 4),
(120, 'Which of the following is NOT an alkali?', 'NaOH', 'NH3', 'Mg(OH)2  ', 'Ca(OH)2', '', 'C', NULL, 4),
(121, 'An effect of thermal pollution on water bodies is that the', 'Level of oxygen reduces', 'Volume of water reduces       ', 'Volume of chemical waste increases ', 'Level of oxides of nitrogen increases', '', 'A', NULL, 4),
(122, 'Which of the following is a deliquescent compound? ', 'Na2 CO3. 10H2O ', 'Na2CO3', 'CaCl2', 'CuO', '', 'C', NULL, 4),
(123, 'A chemical reaction in which the hydration energy is greater than the lattice energy is referred to as', 'A reversible reaction ', 'A spontaneous reaction', 'An endothermic reaction', 'An exothermic reaction', '', 'B', NULL, 4),
(124, 'The function of zinc electrode in a galvanic cell is that it ', 'Uses up electrons', 'Undergoes reduction ', 'Serves as the positive electrode', 'Produces electrons', '', 'C', NULL, 4),
(125, 'CH4(g) + Cl2(g)      CH3Cl(s) + HCl(g)   The major factor that influence the rate of the reaction above is ', 'Light ', 'Catalyst', 'Temperature ', 'Concentration', '', 'A', NULL, 4),
(126, 'The condition required for corrosion to take place is the presence of ', 'Water and oxygen', 'Water and carbon (IV) oxide', 'Water, carbon (IV) oxide and  ', '', '', 'A', NULL, 4),
(127, 'In the diagram above, X is the', 'Activated complex', 'Enthalpy', 'Enthalpy change', 'Activation energy', '', 'C', 'Reaction Diagram', 4),
(128, 'The diagram above best illustrates the effect of decrease in \n', 'Pressure', 'Concentration', 'Temperature ', 'Surface area', '', 'D', 'Diagram', 4),
(129, 'MnO+4(aq) + Y + 5Fe2+(aq)     Mn2+(aq) + 5Fe2+(aq) + 4H2O(1) in the equation above, Y is ', '8H+(aq) ', '5H+(aq) ', '4H+(aq) ', '10H+(a)', '', 'A', 'Equation', 4),
(130, 'Given that M is the mass of a substance deposited during electrolysis and Q is the      quantity of electric\nity consumed, then Faraday?s first law can be written as                             ', 'M =F/2Q ', 'M =E/Q', 'M = EQ ', 'M =Q/E', '', 'C', NULL, 4),
(131, 'The impurities formed during the laboratory preparation of chlorine gas are removed by ', 'HCl', 'H2O ', 'NH3', 'H2SO4', '', 'B', NULL, 4),
(132, 'The effect of the presence of impurities such as carbon and sulphur on iron is that they', 'Lower its melting point ', 'Give it high tensile strength', 'Make it malleable and ductile', 'Increase its melting point ', '', 'A', NULL, 4),
(133, 'A few drops of concentrated HNO3 is added to an unknown solution and boiled for a while. If this produces a brown solution, the cation present is likely to be  ', 'Fe2+', 'Pb2+', 'Cu2+', 'Fe3+ ', '', 'D', NULL, 4),
(134, 'The bleaching action of chlorine gas is effective due to the presence of', 'Oxygen', 'Hydrogen chloride ', 'Water', 'Air', '', 'C', NULL, 4),
(135, 'In the laboratory preparation of oxygen, dried oxygen is usually collected over', 'Tetraoxosulphate (IV) acid                            ', 'Hydrochloric acid ', 'Mercury', 'Calcium chloride ', '', 'C', NULL, 4),
(136, 'The property of concentrated H2SO4 that makes it suitable for preparing HNO3 is it?s ', 'Dehydrating property ', 'Boiling point', 'Density ', 'Oxidizing property ', '', 'A', NULL, 4),
(137, 'Bronze is preferred to copper in the making of medals because it', 'Has low tensile strength', 'Is stronger ', 'Can withstand low temperature', 'Is lighter', '', 'B', NULL, 4),
(138, 'The constituent of baking powder that makes the dough to rise is ', 'NaCl', 'NaHCO3 ', 'NaOH ', 'Na2CO3 ', '', 'B', NULL, 4),
(139, 'Which of the following compounds is used as a gaseous fuel? ', 'CH3 ? CH2 ? CH2 ? CH3', 'CH3 ? C = CH ', 'CH2 ? CH2 ? CH3\n   |\n OH  ', '', '', 'B', NULL, 4),
(140, 'The ability of carbon to form long chains is referred to as ', 'Carbonation', 'Alkylation', 'Acylation ', 'Catenation', '', 'D', NULL, 4),
(141, 'Which of the following compounds will undergo polymerization reaction?', 'C2H5OH', 'C2H4 ', 'C2H5 COOH', 'C2H6', '', 'B', NULL, 4),
(142, 'The compound above exhibits', 'Positional isomerism', 'Geometric isomerism', 'Optical isomerism ', 'Structural isomerism ', '', 'C', 'Molecular Diagram', 4),
(143, 'An organic compound has an empirical formula CH2O and vapour density of 45. What is its molecular formula? ', 'C2H4O2', 'C3H7OH', 'C2H5OH', 'C3H6O3 [C = 12, H = 1, O = 16] ', '', 'D', NULL, 4),
(144, 'The reaction represented by the equation above is useful in the production of', 'Ethanol', 'Propanol', 'Butanol ', 'Methanol', '', 'A', 'Chemical Reaction', 4),
(145, 'The number of isomers that can be obtained from C4H10 is ', '2', '3', '4', '1', '', 'A', NULL, 4),
(146, 'The functional groups present in the compound above are ', 'Hydroxyl and halo-group ', 'Alkene and halo-group', 'Hydroxyl and chloro-group ', 'Alkene and chloro-group', '', 'C', 'Molecular Diagram', 4),
(147, 'Which of the following is a primary amine? ', '(CH3)2NH', '(CH3)3N ', 'CH3NH2 ', 'CH3C- NH2\n       ||\n        O', '', 'C', NULL, 4),
(148, 'Two organic compounds K and L were treated with a few drops of Fehling?s solution respectively. K formed a brick-red precipitate while L remains unaffected. The compound K is an ', 'Alkanone', 'Alkanol ', 'Alkane', 'Alkanal', '', 'A', NULL, 4),
(149, 'Which of the following statements is true about 2-methylpropane and butane?        ', 'They have the same chemical properties ', 'They are members of the same homologous series ', 'They have the same boiling points ', 'They have different number of carbon atoms  ', '', 'B', NULL, 4),
(150, ' The reaction above is best described as         ', 'Neutralization ', 'Esterification ', 'Condensation ', 'Saponification  ', '', 'B', 'Chemical Reaction', 4),
(151, 'COMPREHENSION\nRead each passage carefully and answer the questions that follow it \n\nA. All over the world till lately, and in most of the world still today, mankind has been following the course of nature, that is to say, it has been breeding up to the maximum. To let nature take her extravagant course in the reproduction of the human race may have made sense in an age in which we were also letting her take her course in decimating mankind by the causalities of war, pestilence, and famine. Being human, we have at last revolted against that senseless waste. We have started to impose on nature’s heartless play a humane new order of our own. But, when once man has begun to interfere with nature, he cannot afford to stop half way. We cannot, with impunity, cut down the death-rate and at the same time allow the birth-rate to go on taking nature’s course. We must consciously try to establish an equilibrium or, sooner or later, famine will stalk abroad again. \n1. The author observes that \n', 'war, pestilence and famine were caused by the extravagance of nature ', 'nature was heartless and senseless ', 'there was a time when uncontrolled birth made sense ', 'It was wise at a time when mankind did not interfere with normal reproduction ', 'nature was heartless in its reproductive process. ', 'C', '\0\0\0\0', 8),
(152, 'All over the world till lately, and in most of the world still today, mankind has been following the course of nature, that is to say, it has been breeding up to the maximum. To let nature take her extravagant course in the reproduction of the human race may have made sense in an age in which we were also letting her take her course in decimating mankind by the causalities of war, pestilence, and famine. Being human, we have at last revolted against that senseless waste. We have started to impose on nature’s heartless play a humane new order of our own. But, when once man has begun to interfere with nature, he cannot afford to stop half way. We cannot, with impunity, cut down the death-rate and at the same time allow the birth-rate to go on taking nature’s course. We must consciously try to establish an equilibrium or, sooner or later, famine will stalk abroad again.\n\n2. Which of these statements does not express the opinion of the author? ', 'mankind has started to interfere with the work of nature ', 'many people had died in the past through want and disease ', 'mankind should not have the maximum number of children possible ', 'mankind should take care of its children ', 'man’s present relationship with nature in matters of birth and death is a happy one ', 'E', '\0\0\0\0', 8),
(153, 'All over the world till lately, and in most of the world still today, mankind has been following the course of nature, that is to say, it has been breeding up to the maximum. To let nature take her extravagant course in the reproduction of the human race may have made sense in an age in which we were also letting her take her course in decimating mankind by the causalities of war, pestilence, and famine. Being human, we have at last revolted against that senseless waste. We have started to impose on nature’s heartless play a humane new order of our own. But, when once man has begun to interfere with nature, he cannot afford to stop half way. We cannot, with impunity, cut down the death-rate and at the same time allow the birth-rate to go on taking nature’s course. We must consciously try to establish an equilibrium or, sooner or later, famine will stalk abroad again. \n\n3. ‘Humane’ as used in the passage means ?', 'sensible', 'wise', 'human', 'benevolent', 'thorough ', 'A', '\0\0\0\0', 8),
(154, 'All over the world till lately, and in most of the world still today, mankind has been following the course of nature, that is to say, it has been breeding up to the maximum. To let nature take her extravagant course in the reproduction of the human race may have made sense in an age in which we were also letting her take her course in decimating mankind by the causalities of war, pestilence, and famine. Being human, we have at last revolted against that senseless waste. We have started to impose on nature’s heartless play a humane new order of our own. But, when once man has begun to interfere with nature, he cannot afford to stop half way. We cannot, with impunity, cut down the death-rate and at the same time allow the birth-rate to go on taking nature’s course. We must consciously try to establish an equilibrium or, sooner or later, famine will stalk abroad again. \n\n4. ‘we must consciously try to establish an equilibrium, (line 8) implies that mankind must ?', 'realistically find an equation', 'strive not to be wasteful ', 'deliberately try to fight nature ', 'try to fight nature ', 'purposely find a balance ', 'E', '\0\0\0\0', 8),
(155, 'All over the world till lately, and in most of the world still today, mankind has been following the course of nature, that is to say, it has been breeding up to the maximum. To let nature take her extravagant course in the reproduction of the human race may have made sense in an age in which we were also letting her take her course in decimating mankind by the causalities of war, pestilence, and famine. Being human, we have at last revolted against that senseless waste. We have started to impose on nature’s heartless play a humane new order of our own. But, when once man has begun to interfere with nature, he cannot afford to stop half way. We cannot, with impunity, cut down the death-rate and at the same time allow the birth-rate to go on taking nature’s course. We must consciously try to establish an equilibrium or, sooner or later, famine will stalk abroad again. \n\n5. The main idea of this passage is that ?', 'nature is heartless ', 'man should control the birth rate ', 'mankind will soon perish of starvation', 'pestilence causes more deaths than war ', ') man should change nature’s course gradually ', 'B', '\0\0\0\0', 8),
(156, 'The endeavour to maintain proper standards of fairness in journalism must be pursued. It is fatally easy for the journalist to deviate from the straight path. There is his natural desire to ‘make a story’ and insidious temptation to twist facts to square with his paper’s policy. Both are as indefensible as the framing of misleading headlines for the sake of effect. The conscientious journalist must check any tendency to basis, and guard against the dangers inherent in personal antipathies or friendships, and in traditional opposition between rival schools of thought. When a political opponent, whose stupidity habitually provokes attack, makes an effective speech, honesty requires that he be given credit for it. Where personal relationships might make it easier and more congenial to keep silent than to criticize, the journalist must never forget his duty to the public and the supreme importance of recording the truth.  \n\n6. When may a journalist have to act against his own inclination? ', 'when his friends act stupidly ', 'when he becomes weak and decrepit ', 'when his enemies make a mistake', 'when his political opponents frame misleading head lines ', '', 'A', '\0\0\0\0', 8),
(157, 'The endeavour to maintain proper standards of fairness in journalism must be pursued. It is fatally easy for the journalist to deviate from the straight path. There is his natural desire to ‘make a story’ and insidious temptation to twist facts to square with his paper’s policy. Both are as indefensible as the framing of misleading headlines for the sake of effect. The conscientious journalist must check any tendency to basis, and guard against the dangers inherent in personal antipathies or friendships, and in traditional opposition between rival schools of thought. When a political opponent, whose stupidity habitually provokes attack, makes an effective speech, honesty requires that he be given credit for it. Where personal relationships might make it easier and more congenial to keep silent than to criticize, the journalist must never forget his duty to the public and the supreme importance of recording the truth.\n\n7. A journalist would be able to uphold the tenets of his profession if ?', 'he seeks publicity', 'he tires to achieve popularity ', 'he resists temptation to bias', 'he can manipulate his story to please his employers ', 'he tries protect his friends ', 'C', '\0\0\0\0', 8),
(158, 'The endeavour to maintain proper standards of fairness in journalism must be pursued. It is fatally easy for the journalist to deviate from the straight path. There is his natural desire to ‘make a story’ and insidious temptation to twist facts to square with his paper’s policy. Both are as indefensible as the framing of misleading headlines for the sake of effect. The conscientious journalist must check any tendency to basis, and guard against the dangers inherent in personal antipathies or friendships, and in traditional opposition between rival schools of thought. When a political opponent, whose stupidity habitually provokes attack, makes an effective speech, honesty requires that he be given credit for it. Where personal relationships might make it easier and more congenial to keep silent than to criticize, the journalist must never forget his duty to the public and the supreme importance of recording the truth.  \n\n8. ‘Insidious’ (line 2) means ?', 'subtle', 'wicked', 'natural', 'unusual', 'wild ', 'A', '\0\0\0\0', 8),
(159, 'The endeavour to maintain proper standards of fairness in journalism must be pursued. It is fatally easy for the journalist to deviate from the straight path. There is his natural desire to ‘make a story’ and insidious temptation to twist facts to square with his paper’s policy. Both are as indefensible as the framing of misleading headlines for the sake of effect. The conscientious journalist must check any tendency to basis, and guard against the dangers inherent in personal antipathies or friendships, and in traditional opposition between rival schools of thought. When a political opponent, whose stupidity habitually provokes attack, makes an effective speech, honesty requires that he be given credit for it. Where personal relationships might make it easier and more congenial to keep silent than to criticize, the journalist must never forget his duty to the public and the supreme importance of recording the truth.  \n\n9. A dutiful journalist must ? ', 'read widely ', 'have political acumen', 'make no enemies but friends', 'be able to make an effective speech', 'be able to recognise merit wherever found. ', 'E', '\0\0\0\0', 8),
(160, 'The endeavour to maintain proper standards of fairness in journalism must be pursued. It is fatally easy for the journalist to deviate from the straight path. There is his natural desire to ‘make a story’ and insidious temptation to twist facts to square with his paper’s policy. Both are as indefensible as the framing of misleading headlines for the sake of effect. The conscientious journalist must check any tendency to basis, and guard against the dangers inherent in personal antipathies or friendships, and in traditional opposition between rival schools of thought. When a political opponent, whose stupidity habitually provokes attack, makes an effective speech, honesty requires that he be given credit for it. Where personal relationships might make it easier and more congenial to keep silent than to criticize, the journalist must never forget his duty to the public and the supreme importance of recording the truth.  \n\n10. The duty of the journalist to the public entails ?', ' giving credit to his political enemies', 'keeping quiet when necessary', ' trying to ‘make a story’ ', 'telling the truth', ' defending the weak.', 'D', '\0\0\0\0', 8),
(161, 'So far I have been speaking of science in its university, viewed from the perspective of the world at large. For in the context of our own country and our sister developing countries, many of the factors mentioned earlier are not very important. For example, pollution, deterioration of the environment and population explosion are not yet serious problems for us in this country. Let me now turn to a more specific area, namely the question of scientific choice for developing countries. There is no doubt than the role which science and technology gave played in the upliftment of the materials and economic well-being of the developed nations will, and does, influence the criteria that the Third World nations must choose in order to establish their science policies and priorities. But the criteria to be used by their nations do not have to be same as those which have brought the developed countries to their present stage of evolution. For while human beings have the same problems, their solutions, to be meaningful will have to be sought within some relevant frame of reference, such as the available resources and expertise, social values, place and time in the historical scale. \n\n11. ‘Frame of reference’in this passage (line 11) means ?', 'point of information ', 'range of authority', 'economic pattern', 'context of situation', 'wholesome choice ', 'D', '\0\0\0\0', 8),
(162, 'So far I have been speaking of science in its university, viewed from the perspective of the world at large. For in the context of our own country and our sister developing countries, many of the factors mentioned earlier are not very important. For example, pollution, deterioration of the environment and population explosion are not yet serious problems for us in this country. Let me now turn to a more specific area, namely the question of scientific choice for developing countries. There is no doubt than the role which science and technology gave played in the upliftment of the materials and economic well-being of the developed nations will, and does, influence the criteria that the Third World nations must choose in order to establish their science policies and priorities. But the criteria to be used by their nations do not have to be same as those which have brought the developed countries to their present stage of evolution. For while human beings have the same problems, their solutions, to be meaningful will have to be sought within some relevant frame of reference, such as the available resources and expertise, social values, place and time in the historical scale. \n\n12. The writer apparently believes that through science and technology our country can achieve ?', 'peace and order', 'progress and material success', 'social values and universality', 'wealth and economic progress', 'military development and power', 'B', '\0\0\0\0', 8),
(163, 'So far I have been speaking of science in its university, viewed from the perspective of the world at large. For in the context of our own country and our sister developing countries, many of the factors mentioned earlier are not very important. For example, pollution, deterioration of the environment and population explosion are not yet serious problems for us in this country. Let me now turn to a more specific area, namely the question of scientific choice for developing countries. There is no doubt than the role which science and technology gave played in the upliftment of the materials and economic well-being of the developed nations will, and does, influence the criteria that the Third World nations must choose in order to establish their science policies and priorities. But the criteria to be used by their nations do not have to be same as those which have brought the developed countries to their present stage of evolution. For while human beings have the same problems, their solutions, to be meaningful will have to be sought within some relevant frame of reference, such as the available resources and expertise, social values, place and time in the historical scale. \n\n13. According to the passage, the basic consideration for developing science and technology should be three of the following: \n         (1) technical know-how (2) availability of raw materials (3) atmospheric pollution (4)the people’s tradition and beliefs (5) population (6) capital \n', ' 2,1 and 6 only', ' 3,2 and 4 only', '5,3 and 6 only', '6,5 and 4 only', '5,2 and 6 only', 'A', '\0\0\0\0', 8);
INSERT INTO `quiz_questions` (`id`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Option_E`, `Answer`, `Diagram`, `sub_id`) VALUES
(164, 'So far I have been speaking of science in its university, viewed from the perspective of the world at large. For in the context of our own country and our sister developing countries, many of the factors mentioned earlier are not very important. For example, pollution, deterioration of the environment and population explosion are not yet serious problems for us in this country. Let me now turn to a more specific area, namely the question of scientific choice for developing countries. There is no doubt than the role which science and technology gave played in the upliftment of the materials and economic well-being of the developed nations will, and does, influence the criteria that the Third World nations must choose in order to establish their science policies and priorities. But the criteria to be used by their nations do not have to be same as those which have brought the developed countries to their present stage of evolution. For while human beings have the same problems, their solutions, to be meaningful will have to be sought within some relevant frame of reference, such as the available resources and expertise, social values, place and time in the historical scale. \n\n14.  The main idea of this passage is that ', 'there is a yawning gap between the haves and the have-nots', ' there is need to rid his countrymen from the scourges of hunger, disease, ignorance and want', 'there could be atmospheric pollution and population explosion ', 'the concerns of science and technology are the same in all countries ', 'each nation must plan its development according to its needs and resources. ', 'E', '\0\0\0\0', 8),
(165, 'So far I have been speaking of science in its university, viewed from the perspective of the world at large. For in the context of our own country and our sister developing countries, many of the factors mentioned earlier are not very important. For example, pollution, deterioration of the environment and population explosion are not yet serious problems for us in this country. Let me now turn to a more specific area, namely the question of scientific choice for developing countries. There is no doubt than the role which science and technology gave played in the upliftment of the materials and economic well-being of the developed nations will, and does, influence the criteria that the Third World nations must choose in order to establish their science policies and priorities. But the criteria to be used by their nations do not have to be same as those which have brought the developed countries to their present stage of evolution. For while human beings have the same problems, their solutions, to be meaningful will have to be sought within some relevant frame of reference, such as the available resources and expertise, social values, place and time in the historical scale. \n\n15. The term ‘our sister developing countries’ implies ?', 'Britain, Gambia and Canada', 'Ghana, Germany and Togo', 'Russia, Switzerland and America', 'Liberia Sierra Leone and Gabon', 'China, India and Holland.', 'E', '\0\0\0\0', 8),
(166, 'These two factors, the altitude and the weather, tend separately and together to defeat the climber. The height weakens, slows him down; it forces him to spend days and nights in the course of his assault on the summit; the weather, besides adding to the demands of his energy and moral fortitude, conspires to deny him the time he needs to complete his mission. Whereas in lower mountains and on easy ground the weather may be no more than a handicap, his mission. Whereas in lower mountains and on easy ground the weather may  be no more than a handicap, in the high Himalayas it is decisive, regardless of terrain. The deduction to be drawn from these two factors was clear enough. We must either so fortify ourselves that we could continue, without detriment, to live and have our being above the limit of natural acclimatization, or, better still, we must solve the problem of speed. It was desirable, in fact, that we should meet both these requirements and thus give to those chosen to attempt the summit and to their supporting teams some measure of insurance against the vagaries of the weather, for safety in mountain climbing is as much a matter of swiftness as of sureness of foot. Either or both could be achieved only by the administration of oxygen in sufficient quantities to make up for the deficiency in the air, and for the duration of the upward journey above the limit of successful acclimatization. \n\n16. The author believes that to overcome the problems of altitude and weather the climber needs mainly ?', 'courage and speed', 'energy and moral fortitude', 'sufficient quantities of oxygen', 'swiftness and sureness of foot', 'quick acclimatization ', 'C', '\0\0\0\0', 8),
(167, 'These two factors, the altitude and the weather, tend separately and together to defeat the climber. The height weakens, slows him down; it forces him to spend days and nights in the course of his assault on the summit; the weather, besides adding to the demands of his energy and moral fortitude, conspires to deny him the time he needs to complete his mission. Whereas in lower mountains and on easy ground the weather may be no more than a handicap, his mission. Whereas in lower mountains and on easy ground the weather may  be no more than a handicap, in the high Himalayas it is decisive, regardless of terrain. The deduction to be drawn from these two factors was clear enough. We must either so fortify ourselves that we could continue, without detriment, to live and have our being above the limit of natural acclimatization, or, better still, we must solve the problem of speed. It was desirable, in fact, that we should meet both these requirements and thus give to those chosen to attempt the summit and to their supporting teams some measure of insurance against the vagaries of the weather, for safety in mountain climbing is as much a matter of swiftness as of sureness of foot. Either or both could be achieved only by the administration of oxygen in sufficient quantities to make up for the deficiency in the air, and for the duration of the upward journey above the limit of successful acclimatization.\n\n17. ‘Conspires’ (line 3) means ?', 'ruins', 'makes secret plans', 'takes a wicked action', 'Comines ', 'aggravates', 'D', '\0\0\0\0', 8),
(168, 'These two factors, the altitude and the weather, tend separately and together to defeat the climber. The height weakens, slows him down; it forces him to spend days and nights in the course of his assault on the summit; the weather, besides adding to the demands of his energy and moral fortitude, conspires to deny him the time he needs to complete his mission. Whereas in lower mountains and on easy ground the weather may be no more than a handicap, his mission. Whereas in lower mountains and on easy ground the weather may  be no more than a handicap, in the high Himalayas it is decisive, regardless of terrain. The deduction to be drawn from these two factors was clear enough. We must either so fortify ourselves that we could continue, without detriment, to live and have our being above the limit of natural acclimatization, or, better still, we must solve the problem of speed. It was desirable, in fact, that we should meet both these requirements and thus give to those chosen to attempt the summit and to their supporting teams some measure of insurance against the vagaries of the weather, for safety in mountain climbing is as much a matter of swiftness as of sureness of foot. Either or both could be achieved only by the administration of oxygen in sufficient quantities to make up for the deficiency in the air, and for the duration of the upward journey above the limit of successful acclimatization.\n\n18. ‘regardless of terrain’ (line 5) means ?', 'ever on easy ground ', 'despite the nature of the ground', 'because of steeper gradients', 'ignoring the inhospitality of the mountainside', 'without considering the handicap. ', 'B', '\0\0\0\0', 8),
(169, 'These two factors, the altitude and the weather, tend separately and together to defeat the climber. The height weakens, slows him down; it forces him to spend days and nights in the course of his assault on the summit; the weather, besides adding to the demands of his energy and moral fortitude, conspires to deny him the time he needs to complete his mission. Whereas in lower mountains and on easy ground the weather may be no more than a handicap, his mission. Whereas in lower mountains and on easy ground the weather may  be no more than a handicap, in the high Himalayas it is decisive, regardless of terrain. The deduction to be drawn from these two factors was clear enough. We must either so fortify ourselves that we could continue, without detriment, to live and have our being above the limit of natural acclimatization, or, better still, we must solve the problem of speed. It was desirable, in fact, that we should meet both these requirements and thus give to those chosen to attempt the summit and to their supporting teams some measure of insurance against the vagaries of the weather, for safety in mountain climbing is as much a matter of swiftness as of sureness of foot. Either or both could be achieved only by the administration of oxygen in sufficient quantities to make up for the deficiency in the air, and for the duration of the upward journey above the limit of successful acclimatization.\n\n19. ‘to live and have our being above the limit of natural acclimatization’ (line 7) means ?', ' to be protected from the effects of the weather ', 'to expect no protection from the bad weather', 'to survive under unnatural weather conditions ', 'limit our natural desires to get acclimatized to the weather', 'none of the above. ', 'C', '\0\0\0\0', 8),
(170, 'These two factors, the altitude and the weather, tend separately and together to defeat the climber. The height weakens, slows him down; it forces him to spend days and nights in the course of his assault on the summit; the weather, besides adding to the demands of his energy and moral fortitude, conspires to deny him the time he needs to complete his mission. Whereas in lower mountains and on easy ground the weather may be no more than a handicap, his mission. Whereas in lower mountains and on easy ground the weather may  be no more than a handicap, in the high Himalayas it is decisive, regardless of terrain. The deduction to be drawn from these two factors was clear enough. We must either so fortify ourselves that we could continue, without detriment, to live and have our being above the limit of natural acclimatization, or, better still, we must solve the problem of speed. It was desirable, in fact, that we should meet both these requirements and thus give to those chosen to attempt the summit and to their supporting teams some measure of insurance against the vagaries of the weather, for safety in mountain climbing is as much a matter of swiftness as of sureness of foot. Either or both could be achieved only by the administration of oxygen in sufficient quantities to make up for the deficiency in the air, and for the duration of the upward journey above the limit of successful acclimatization.\n\n20. Which ONE of the following was NOT  a reason for using oxygen?', ' it gave them psychological encouragement', 'it fortified them to live above the limit of natural acclimatization ', 'it protected them against the unexpected changes of the weather', 'it quickened their journey to the summit', 'it helped them to survive the worst effects of the weather.', 'A', '\0\0\0\0', 8),
(171, 'I dare not lift the veil that protects our tribal marriage customs and ceremonies from the eyes of outsiders. There is already too little in this world that is sacred; and what Fatmata and I were required to go through during the next week must remain so. I was deeply in debt by the time everything was over, but I was absolutely satisfied with my parents’ choice. Fatmata was as black as satin, and as soft. She had the teeth and smile of a goddess. The Dopo tutors had done their job well; she was a completely efficient lover and mother. I brought her home with swelling pride, and began at once to save all I could spare towards the cost of acquiring my second wife. My anti-Western revolt was gaining momentum. \n\n21. The evidence would seem to indicate that ?', ' the author adores his wife', 'he disapproves of her ways ', 'he thinks she is extravagant ', 'the author regrets the cause of his debt ', 'she had not been properly brought up. ', 'A', '\0\0\0\0', 8),
(172, 'I dare not lift the veil that protects our tribal marriage customs and ceremonies from the eyes of outsiders. There is already too little in this world that is sacred; and what Fatmata and I were required to go through during the next week must remain so. I was deeply in debt by the time everything was over, but I was absolutely satisfied with my parents’ choice. Fatmata was as black as satin, and as soft. She had the teeth and smile of a goddess. The Dopo tutors had done their job well; she was a completely efficient lover and mother. I brought her home with swelling pride, and began at once to save all I could spare towards the cost of acquiring my second wife. My anti-Western revolt was gaining momentum. \n\n22. When the author said ‘my anti-Western revolt was gaining momentum’ (line 6 and 7) he was refer ring to the fact that ?', 'he did not like polygamy', 'he hated Europeans', 'he did not want to marry another wife', ' he admired everything about his wife', 'he revolted against European values ', 'E', '\0\0\0\0', 8),
(173, 'I dare not lift the veil that protects our tribal marriage customs and ceremonies from the eyes of outsiders. There is already too little in this world that is sacred; and what Fatmata and I were required to go through during the next week must remain so. I was deeply in debt by the time everything was over, but I was absolutely satisfied with my parents’ choice. Fatmata was as black as satin, and as soft. She had the teeth and smile of a goddess. The Dopo tutors had done their job well; she was a completely efficient lover and mother. I brought her home with swelling pride, and began at once to save all I could spare towards the cost of acquiring my second wife. My anti-Western revolt was gaining momentum.\n\n23. It would appear that the marriage had turned him into ?', 'a good worker', ' a faithful husband', 'an incurable debtor', 'a tragic figure ', 'a proud husband. ', 'E', '\0\0\0\0', 8),
(174, 'I dare not lift the veil that protects our tribal marriage customs and ceremonies from the eyes of outsiders. There is already too little in this world that is sacred; and what Fatmata and I were required to go through during the next week must remain so. I was deeply in debt by the time everything was over, but I was absolutely satisfied with my parents’ choice. Fatmata was as black as satin, and as soft. She had the teeth and smile of a goddess. The Dopo tutors had done their job well; she was a completely efficient lover and mother. I brought her home with swelling pride, and began at once to save all I could spare towards the cost of acquiring my second wife. My anti-Western revolt was gaining momentum.\n\n24. Which one of the following is NOT true of the passage ? ', 'the lady was beautiful', ' the marriage cost a lot of money', 'the marriage was according to native law and custom', 'Fatmata never had an issue', ' the author wanted another wife.', 'D', '\0\0\0\0', 8),
(175, 'I dare not lift the veil that protects our tribal marriage customs and ceremonies from the eyes of outsiders. There is already too little in this world that is sacred; and what Fatmata and I were required to go through during the next week must remain so. I was deeply in debt by the time everything was over, but I was absolutely satisfied with my parents’ choice. Fatmata was as black as satin, and as soft. She had the teeth and smile of a goddess. The Dopo tutors had done their job well; she was a completely efficient lover and mother. I brought her home with swelling pride, and began at once to save all I could spare towards the cost of acquiring my second wife. My anti-Western revolt was gaining momentum. \n\n25. ‘Swelling’ (line 6) means ?', 'jovial', 'great', 'remarkable ', 'happy', 'growing ', 'B', '\0\0\0\0', 8),
(176, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the underlined portion in each of the following sentences\n\nIn the match against the Uplanders team, the submariners turned out to be the dark horse \n', ' played most brilliantly', ' played below their usual form ', 'won unexpectedly', 'lost as expected', ' won as expected.', 'C', '\0\0\0\0', 8),
(177, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the underlined portion in each of the following sentences\n\n27. Only the small fry get punished for such social misdemeanors.', 'Small boys ', 'unimportant people', 'frightened people ', 'frivolous people ', 'inexperienced peoples ', 'B', '\0\0\0\0', 8),
(178, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the underlined portion in each of the following sentences\n\nHe spoke with his heart in this mouth ', ' courageously', ' with such unusual cowardice', 'with a lot of confusion in his speech', 'without being able to make up his mind', ' with fright and agitation.', 'E', '\0\0\0\0', 8),
(179, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the underlined portion in each of the following sentences\n\nThe ''leaderin'' today’s issue of our popular newspaper focuses on inflation ', 'president', 'headline ', 'editorial ', 'columnist', 'proprietor ', 'C', '\0\0\0\0', 8),
(180, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the underlined portion in each of the following sentences\n\nFrom the ways my friend talks, you can see he is such a ''bore''  ', 'rude', 'brilliant', 'uninteresting ', 'overbearing', 'humorous', 'C', '\0\0\0\0', 8),
(181, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nHis jail terms were to run ''concurrently''', 'simultaneously', ' uniformly', ' laboriously', 'consecutively', ' judiciously ', 'A', '\0\0\0\0', 8),
(182, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nThere is some obvious ''symmetry'' in the whole presentation', 'confusion', 'hesitation', ' excitement', ' orderliness ', ' dissatisfaction ', 'D', '\0\0\0\0', 8),
(183, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences.\n\nThis bill has to wait as we are now ''insolvent'' \n', 'overworked', 'bankrupt', 'unsettled', 'insoluble', 'affluent ', 'B', '\0\0\0\0', 8),
(184, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nAll his plans ''fell through''', 'failed ', 'were accomplished', 'had to be reviewed', 'were rejected', 'fell ', 'A', '\0\0\0\0', 8),
(185, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nThe balance sheet at the end of the business year shows that we broke even', ' lost heavily', 'made profit', 'neither lost nor gained', 'had no money to continue business', 'were heavily indebted to our bankers ', 'B', '\0\0\0\0', 8),
(186, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nHe was appointed specifically ''to put the recruits through'' ', 'assign them to work', 'train them', 'discipline them', 'assist them at work', 'supervise them at work ', 'B', '\0\0\0\0', 8),
(187, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences.\n\nThe result of his experiment represents a ''breakthrough'' in medical science \n', 'an outstanding success', 'catastrophe', ' an end to such experiment', ' a breaking point', ' a colossal failure ', 'A', '\0\0\0\0', 8),
(188, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences.\n\nBeing an optimist, our professor always sees the ''Brightside'' of most things ', 'charming', 'illumined ', 'brilliant', 'pleasing', 'cheerful ', 'E', '\0\0\0\0', 8),
(189, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences.\n\nThe State Government appointed a Commission of inquiry to go into  the community’s complaints carefully and without prejudice ', 'investigate', ' search ', 'look for', 'account for ', 'ascertain ', 'A', '\0\0\0\0', 8),
(190, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences.\n\nThe traffic situation in Lagos can lead to disastrous consequences a man lost a very lucrative job because he was ''held up''  by it.', 'confused', 'delayed', 'annoyed', 'intrigued ', 'obstructed. ', 'B', '\0\0\0\0', 8),
(191, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the underlined portion in each of the following sentences\n''\nMrs. Dada has been deserted by her husband because he feels she has a ''heart of stone''\n\n', 'she  has a heavy heart', 'played below their usual form', 'she has little warmth of feeling', 'she has a hard heart', 'he has a strong heart.  ', 'D', '\0\0\0\0', 8),
(192, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\n\nMr. Jack ''could be a successful businessman'' if he paid more attention to the more intricate aspects of his account ', 'Mr. Jack will undoubtedly succeed', 'Mr. Jack Cannot succeed', 'Jack will have a very good chance of succeeding', 'Mr. Jack will find it difficult to succeed', ' Mr. Jack will succeed in spite of all odds ', 'C', '\0\0\0\0', 8),
(193, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nIf my father had not arrived, I would have starved. This sentence means ', 'my father did arrive and I didn’t starve ', ' I had to starve because my father didn’t come', 'my father didn’t arrive and I didn’t starve', ' I should have starved but I didn’t', ' I had starved before my father arrived. ', 'A', '\0\0\0\0', 8),
(194, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nThe two sprinters were running ''neck and neck'' ', 'exactly level', 'very slowly', 'very fast ', 'with their necks together', 'together', 'A', '\0\0\0\0', 8),
(195, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nHe stared  at her', 'glanced', 'peeped', ' looked ', 'gazed ', 'fixed ', 'B', '\0\0\0\0', 8),
(196, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nWhen the man was caught by the police he ''presented a bold  front'' (A) he attacked the policemen boldly (B) he walked up to the policemen (C) he faced the situation with apparent boldness (D) he bravely attempted to give them a present (D) he bravely attempted to give them a present (E) he frowned at them in a defiant manner. ', 'he attacked the policemen boldly', 'he walked up to the policemen', 'he faced the situation with apparent boldness', ' he bravely attempted to give them a presen', ' he frowned at them in a defiant manner.', 'C', '\0\0\0\0', 8),
(197, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nI have been able to observe him at ''close quarters'' ', 'in government houses nearby', 'within a short space of time', 'in a small family house', ' at close range', 'at regular intervals. ', 'D', '\0\0\0\0', 8),
(198, 'LEXIS AND STRUCTURE\nChoose the option that best conveys the meaning of the quoted portion in each of the following sentences\n\nAt the sight of the ghastly accident the poor woman’s hair ''stood on end'' ', 'the woman’s hair became straight', ' the wind blew her hair upwards', 'the woman was unmoved', 'the woman disarranged her hair', 'the woman was frightened.', 'E', '\0\0\0\0', 8),
(199, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nWhen the beggar was tried he…. Down by the roadside  \n', ' lied ', 'laid', 'layer', 'lay ', 'lain ', 'D', '\0\0\0\0', 8),
(200, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHe did not like ………leaving the class early (A) we (B) us (C) our (D) ourselves (E) ourselves ', 'we', 'us', 'our', 'ourselves', 'ourselves', 'C', '\0\0\0\0', 8),
(201, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nBefore the operation the dentist found that his patient’s teeth…….. ', 'have long decayed', 'have long been decayed', 'have long being decayed', ' had long decayed', 'had been decayed ', 'D', '\0\0\0\0', 8),
(202, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThe employer, not the salesman and his representative ………responsible for the loss ', 'are', 'are being', 'are never', 'have been', 'is', 'E', '\0\0\0\0', 8),
(203, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThe boy was born before his parents actually got married and so the court has declared him…… (A) illegal (B) illegitimate (C) illicit (D) unlawful (E) untenable ', 'illegal', 'illegitimate', 'illicit', 'unlawful', 'untenable ', 'B', '\0\0\0\0', 8),
(204, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nAs he was still owing me two naira, I was careful not to……… him any more money ', 'lend ', 'loan ', ' borrow', ' extend ', 'credit ', 'A', '\0\0\0\0', 8),
(205, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nLast week the ……….at the theatre was the largest I had ever seen ', 'assembly', 'congregation', 'convention', 'audience', 'crowd ', 'D', '\0\0\0\0', 8),
(206, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nIf you travel by air you will be given an allowance to cover …….', 'a luggage', 'luggage', 'luggages', 'a baggage', 'baggages', 'B', '\0\0\0\0', 8),
(207, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nTennyson and Browning lived about the same and are therefore …….poets ', ' contrary', 'contractual', 'contemporaneous', 'contemporary', 'contemptible ', 'D', '\0\0\0\0', 8),
(208, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nThe green snake which lives in the green grass is using a perfect……..', ' ambush ', ' under cover', 'camouflage', 'shelter', ' subterfuge', 'C', '\0\0\0\0', 8),
(209, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nIn order to carry out the necessary examination the dead body was…… ', 'extracted', 'extradited ', 'exiled', 'expelled ', 'exhumed ', 'E', '\0\0\0\0', 8),
(210, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nRemember this matter is strictly…….(A) between you and I (B) among you and I (C) among you and me (D) between you and me (E) between you and myself ', 'between you and I', 'among you and I', 'among you and me ', 'between you and me', 'between you and myself ', 'D', '\0\0\0\0', 8),
(211, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHe went abroad with a view……. A business partner ', ' to find', ' to be finding', 'to have found', 'to finding ', 'he will find', 'D', '\0\0\0\0', 8),
(212, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHe has just entered the office……..the telephone rang', 'as', 'before', ' since', 'when', 'until ', 'D', '\0\0\0\0', 8),
(213, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThey ……… receive visitors at short notice', 'use to', 'are used to', 'used to ', ' are always', 'are use to ', 'C', '\0\0\0\0', 8),
(214, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHis suggestion is completely ………the point and cannot be accepted ', 'to', 'about', 'beside', 'on', 'under', 'C', '\0\0\0\0', 8),
(215, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nFor…….he is secretary we shall not be correct minutes ', 'because', 'as long as', 'so long', 'in as much ', 'although ', 'B', '\0\0\0\0', 8),
(216, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHe went up quickly and returned …… (A) Fastest (B) fastly (C) as fastly (D) as fast (E) in fastness', 'Fastest', 'fastly ', 'as fastly', 'as fast', 'in fastness', 'D', '\0\0\0\0', 8),
(217, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nInvariably, he ends all his letters’ …….amicably', 'you', 'your’s', 'yours’ ', 'yours', 'your own ', 'D', '\0\0\0\0', 8),
(218, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nIf I went to the cinema I ……. Early ', ' shall return ', 'am retuning', 'would return', 'had returned', 'may return ', 'C', '\0\0\0\0', 8),
(219, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThe traditional folktales form an…..to the book ', 'index', 'insertion', 'information', ' overview', ' appendix ', 'E', '\0\0\0\0', 8),
(220, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nThe frightening explosion in the factory……whole wing', 'washed out ', 'wiped out', 'rooted out', 'flushed out', 'cleared out ', 'B', '\0\0\0\0', 8),
(221, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nOur plane was scheduled to ……at 10.00 hrs but it was delayed because of bad weather ', 'fly out', 'take off', 'start out ', 'shoot off', 'lift off ', 'B', '\0\0\0\0', 8),
(222, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nAs luck would have it, the weather brightened almost immediately and after six hours flight we…….at Heathrow Airport', 'touched down', 'dropped', 'came down', 'flew down', 'stopped', 'A', '\0\0\0\0', 8),
(223, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nBefore we left the airport, each passenger was made to …….certain forms ', 'fill in', 'write in', 'enter in', 'go through ', 'read out', 'A', '\0\0\0\0', 8),
(224, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nMy father cannot bear the …….of the concoction that emanates from my mother’s soup pot  ', ' sweet', 'scouring', 'aroma', 'smell ', ' scent ', 'C', '\0\0\0\0', 8),
(225, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nI would not have condescended to appease the traffic policeman but I happened …… traffic regulations (A) to have broken (B) to be breaking (C) to break (D) to break in (E) to have evaded \n\n', 'to have broken', 'to be breaking', ' to break', 'to break in', 'to have evaded ', 'A', '\0\0\0\0', 8),
(226, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThe Managing Director did not pay his staff last month……? ', ' didn’t he', 'had he not', 'is not it', 'did he', 'has he ', 'D', '\0\0\0\0', 8),
(227, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nAlthough he is in all respects a poor student, he has managed to buy a tape recorder to improve his ….. of French ', 'mastery', ' mastering ', 'speaking', 'ideas', 'thinking', 'A', '\0\0\0\0', 8),
(228, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nGranted you are my senior by one year, you cannot……me around as if I were your servant', 'control', 'dribble ', 'order', ' ask ', 'compel', 'C', '\0\0\0\0', 8),
(229, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n……….marked an important step in the history of the industrial revolution (A) the invention of the locomotive engine (B) the discovery of locomotion (C) the discovery of the engine (D) inquiry into locomotion (E) the process of locomotion ', 'the invention of the locomotive engine', ' the discovery of locomotion', 'the discovery of the engine ', 'inquiry into locomotion ', 'the process of locomotion', 'A', '\0\0\0\0', 8),
(230, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nBecause the referee was partial and his opponent rough, the loser of the wrestling match received……. Cheers than the winner. ', 'thunderous ', 'many more ', 'overwhelming', 'a little more', 'several ', 'B', '\0\0\0\0', 8),
(231, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThe boxer was highly rated ……..his doggedness and ability to absorb heavy punches ', ' by', 'through', 'for', 'about', 'in', 'C', '\0\0\0\0', 8),
(232, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nMany lives are lost on Nigerian roads……lack of consideration for other road users by many crazy drivers ', 'in view of', ' resulting in', 'owing totally to ', 'through', 'by ', 'C', '\0\0\0\0', 8),
(233, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nThe man no longer feared his opponents after their spokesman had assured him that they were well disposed……him ', ' to', 'towards', 'around ', 'about', 'for ', 'B', '\0\0\0\0', 8),
(234, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nMy little boy is hyper-active and he is therefore prone……accidents', 'with respect to', 'for', 'to', 'about', ' as regards ', 'C', '\0\0\0\0', 8),
(235, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHis horrible high-pitched laugh……on my nerves', 'jags', 'Jabs', 'jams', ' jars ', 'jeers ', 'D', '\0\0\0\0', 8),
(236, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nHis train rattled along…….full speed', ' in', 'at', 'with', 'by', ' on ', 'A', '\0\0\0\0', 8),
(237, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nyou would have thought that somebody would’ve informed me ……', 'shouldn’t they', ' wouldn’t you ', 'I should think', 'you agree', 'isn’t it ', 'B', '\0\0\0\0', 8),
(238, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nIf this had happened to you, what ……? \n\n', 'would you do', 'have you done', ' would you have done', 'will you do ', 'would you be doing. ', 'C', '\0\0\0\0', 8),
(239, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nWhat a relief that the strike……when it did! ', ' would end ', 'was ending', 'ended ', 'has ended', 'is ending ', 'C', '\0\0\0\0', 8),
(240, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nWe should take care……the robbers come back', 'may be', 'should in case', 'perhaps', 'probably', ' in case ', 'E', '\0\0\0\0', 8),
(241, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nBy the time the rainy season ended, all the young cocoa trees……in size', ' have double', 'had doubled', 'were doubling', 'doubled', 'will double ', 'B', '\0\0\0\0', 8),
(242, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\n\nThere were so many children….. ', 'that she couldn’t feed them all', 'than she could feed', ' that she couldn’t feed', 'that she could feed them all', 'more than she could feed them all', 'A', '\0\0\0\0', 8),
(243, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nIsn’t it high time you……your office? ', 'are leaving', 'do leave ', 'leave', 'left', 'did leave ', 'D', '\0\0\0\0', 8),
(244, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nIn West Africa the ……of sickle cell is about 25 per cent.', 'incident', ' incidence', 'accident', 'accidence', ' incense ', 'B', '\0\0\0\0', 8),
(245, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nWe got to the hall after the play …. ', 'is started', 'was starting', 'had started', 'has started', 'would start ', 'C', '\0\0\0\0', 8),
(246, 'Complete each of the following sentences by choosing the option that most suitably fills the space. \n\nSubstitute for the underlined word in the following sentence the word that most closely expresses the opposite meaning: The ''plaintiff '' made very cogent submissions to the trial judge ', 'bailiff', 'prosecutor', ' lawyer ', 'defendant', 'accused. ', 'D', '\0\0\0\0', 8),
(247, 'Choose the option which is nearest in meaning to the statements in each of the following questions \n\nWe visited the home of one boy. That’s the boy I mean. ', 'that’s the boy whom we visited his home', 'that’s the boy whose home we visited', 'that’s the boy to whose home we visited', 'that’s the boy whom we visited the home  ', ' that’s the boy the home of whom we visited.  ', 'B', '\0\0\0\0', 8),
(248, 'Choose the option which is nearest in meaning to the statements in each of the following questions \n\nThe dog was limping. It appeared that one of its legs might have been injured. ', 'The dog was limping as if it had an injured leg ', 'The dog was limping so it had an injured leg', 'the dog was limping so as it had an injured led', 'the dog was limping for it had an injured leg', 'the dog was limping for it had an injured leg.', 'A', '\0\0\0\0', 8),
(249, 'Choose the option which is nearest in meaning to the statements in each of the following questions \n\nI can walk that distance and have done so many times. ', 'I am used to walk that distance', 'I used to walk that distance', 'I used to walking that distance', 'I am used to walking that distance', ' I will walk that distance. ', 'D', '\0\0\0\0', 8),
(250, 'Choose the option which is nearest in meaning to the statements in each of the following questions \n\nFor all he cared, his parents might have been dead for years ', 'although concerned about his parents, he had been unable to find out if they were alive ', 'he cared for no-one except his parents and it was possible that they had died long before', 'he did not care whether his parents were alive or had died long before', 'He was concerned about every one, just about his parents, who might have died long before ', 'He cared very much for his parents even though they were dead.  ', 'C', '\0\0\0\0', 8),
(251, 'COMPREHENSION\nRead each passage carefully and answer the questions that follow\n\nPASSAGE 1\nThe young are not listening to their elders, and perhaps they never have. But now, it happens that, with many of them, the reason may be medical. The young aren’t listening because they can’t hear. Just as nagging parents have long suspected, otologists (hearing specialists) now report that youngsters are going deaf as a result of blasting their eardrums with electronically amplified rock ‘n’ roll.  \n\nThe hearing specialists used to worry about loud noise as a cause of deafness only in industrial and military situations. They knew that eight hours of daily exposure, year in and year out, to the din of the proverbial boiler factory, would eventually result in permanent hearing loss. Riveters were particularly susceptible. Then they learned that the same thing happened to aviators. After the advent of jets, the hazard applied to ground crews at airports and flight-deck personnel abroad aircraft carriers- hence the introduction of insulated, noise-absorbing plastic earmuffs. \n\nIn discotheques and rock ‘n’ roll joints, the trouble is not so much in the instruments themselves, or the close quarters. The blame goes to the electronic amplifiers. An old –fashioned military band, playing a march in Ramat park, generated as much sound. But the sound was not amplified and was dissipated in the open air. A trombonist sitting in front of a tuba player might be a bit deaf for an hour or so after a concert, then his hearing returned to normal. A microphone hooks up to a public address system did not appreciably increase the hearing hazard. What he sis was multiple microphones and speakers, and the installation of internal microphones in such instruments as guitars and bouzoukis.\n\n1. The young are not listening to their elders because ?\n', ' they never have', 'their parents nag constantly', 'they are permanently deaf', ' they appear to be going deaf ', '', 'D', '\0\0\0\0', 8),
(252, 'COMPREHENSION\nRead each passage carefully and answer the questions that follow\n\nPASSAGE 1\nThe young are not listening to their elders, and perhaps they never have. But now, it happens that, with many of them, the reason may be medical. The young aren’t listening because they can’t hear. Just as nagging parents have long suspected, otologists (hearing specialists) now report that youngsters are going deaf as a result of blasting their eardrums with electronically amplified rock ‘n’ roll.  \n\nThe hearing specialists used to worry about loud noise as a cause of deafness only in industrial and military situations. They knew that eight hours of daily exposure, year in and year out, to the din of the proverbial boiler factory, would eventually result in permanent hearing loss. Riveters were particularly susceptible. Then they learned that the same thing happened to aviators. After the advent of jets, the hazard applied to ground crews at airports and flight-deck personnel abroad aircraft carriers- hence the introduction of insulated, noise-absorbing plastic earmuffs. \n\nIn discotheques and rock ‘n’ roll joints, the trouble is not so much in the instruments themselves, or the close quarters. The blame goes to the electronic amplifiers. An old –fashioned military band, playing a march in Ramat park, generated as much sound. But the sound was not amplified and was dissipated in the open air. A trombonist sitting in front of a tuba player might be a bit deaf for an hour or so after a concert, then his hearing returned to normal. A microphone hooks up to a public address system did not appreciably increase the hearing hazard. What he sis was multiple microphones and speakers, and the installation of internal microphones in such instruments as guitars and bouzoukis.\n\n2.  ‘Just as nagging parents have long suspected’ implies that the parents suspected that ?', ' their children did not listen to them', 'children could not hear properly after listening to amplified music', 'otologists were always right', ' children were disobedient because they did not listen to their parents. ', '', 'B', '\0\0\0\0', 8),
(253, 'COMPREHENSION\nRead each passage carefully and answer the questions that follow\n\nPASSAGE 1\nThe young are not listening to their elders, and perhaps they never have. But now, it happens that, with many of them, the reason may be medical. The young aren’t listening because they can’t hear. Just as nagging parents have long suspected, otologists (hearing specialists) now report that youngsters are going deaf as a result of blasting their eardrums with electronically amplified rock ‘n’ roll.  \n\nThe hearing specialists used to worry about loud noise as a cause of deafness only in industrial and military situations. They knew that eight hours of daily exposure, year in and year out, to the din of the proverbial boiler factory, would eventually result in permanent hearing loss. Riveters were particularly susceptible. Then they learned that the same thing happened to aviators. After the advent of jets, the hazard applied to ground crews at airports and flight-deck personnel abroad aircraft carriers- hence the introduction of insulated, noise-absorbing plastic earmuffs. \n\nIn discotheques and rock ‘n’ roll joints, the trouble is not so much in the instruments themselves, or the close quarters. The blame goes to the electronic amplifiers. An old –fashioned military band, playing a march in Ramat park, generated as much sound. But the sound was not amplified and was dissipated in the open air. A trombonist sitting in front of a tuba player might be a bit deaf for an hour or so after a concert, then his hearing returned to normal. A microphone hooks up to a public address system did not appreciably increase the hearing hazard. What he sis was multiple microphones and speakers, and the installation of internal microphones in such instruments as guitars and bouzoukis.\n\n3. What is the result of being subjected to the din of the proverbial boiler factory for a prolonged length of time ? ', 'a loss of haring which will never improve', 'total deafness eight hours a day', 'temporary deafness', 'hearing loss which can be corrected by medical treatments.', '', 'A', '\0\0\0\0', 8),
(254, 'COMPREHENSION\nRead each passage carefully and answer the questions that follow\n\nPASSAGE 1\nThe young are not listening to their elders, and perhaps they never have. But now, it happens that, with many of them, the reason may be medical. The young aren’t listening because they can’t hear. Just as nagging parents have long suspected, otologists (hearing specialists) now report that youngsters are going deaf as a result of blasting their eardrums with electronically amplified rock ‘n’ roll.  \n\nThe hearing specialists used to worry about loud noise as a cause of deafness only in industrial and military situations. They knew that eight hours of daily exposure, year in and year out, to the din of the proverbial boiler factory, would eventually result in permanent hearing loss. Riveters were particularly susceptible. Then they learned that the same thing happened to aviators. After the advent of jets, the hazard applied to ground crews at airports and flight-deck personnel abroad aircraft carriers- hence the introduction of insulated, noise-absorbing plastic earmuffs. \n\nIn discotheques and rock ‘n’ roll joints, the trouble is not so much in the instruments themselves, or the close quarters. The blame goes to the electronic amplifiers. An old –fashioned military band, playing a march in Ramat park, generated as much sound. But the sound was not amplified and was dissipated in the open air. A trombonist sitting in front of a tuba player might be a bit deaf for an hour or so after a concert, then his hearing returned to normal. A microphone hooks up to a public address system did not appreciably increase the hearing hazard. What he sis was multiple microphones and speakers, and the installation of internal microphones in such instruments as guitars and bouzoukis.\n\n4.‘The same thing happened to aviators’. This except, according to the passage means ?', 'that riveters were particularly susceptible', 'industrial and military deafness', ' that continued loud noise resulted in deafness', ' that working in a boiler factory affected one’s hearing ', '', 'C', '\0\0\0\0', 8);
INSERT INTO `quiz_questions` (`id`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Option_E`, `Answer`, `Diagram`, `sub_id`) VALUES
(255, 'COMPREHENSION\nRead each passage carefully and answer the questions that follow\n\nPASSAGE 1\nThe young are not listening to their elders, and perhaps they never have. But now, it happens that, with many of them, the reason may be medical. The young aren’t listening because they can’t hear. Just as nagging parents have long suspected, otologists (hearing specialists) now report that youngsters are going deaf as a result of blasting their eardrums with electronically amplified rock ‘n’ roll.  \n\nThe hearing specialists used to worry about loud noise as a cause of deafness only in industrial and military situations. They knew that eight hours of daily exposure, year in and year out, to the din of the proverbial boiler factory, would eventually result in permanent hearing loss. Riveters were particularly susceptible. Then they learned that the same thing happened to aviators. After the advent of jets, the hazard applied to ground crews at airports and flight-deck personnel abroad aircraft carriers- hence the introduction of insulated, noise-absorbing plastic earmuffs. \n\nIn discotheques and rock ‘n’ roll joints, the trouble is not so much in the instruments themselves, or the close quarters. The blame goes to the electronic amplifiers. An old –fashioned military band, playing a march in Ramat park, generated as much sound. But the sound was not amplified and was dissipated in the open air. A trombonist sitting in front of a tuba player might be a bit deaf for an hour or so after a concert, then his hearing returned to normal. A microphone hooks up to a public address system did not appreciably increase the hearing hazard. What he sis was multiple microphones and speakers, and the installation of internal microphones in such instruments as guitars and bouzoukis.\n\n5. What is the difference between an old-fashioned military band on the one hand and discotheque and rock ‘n’ roll joint on the other ? ', 'one is old-fashioned while the other is modern', 'one produces sounds for marching, the other for disco ', 'one has drums, the other has guitars', 'one produces amplified sounds, the other does not.', '', 'D', '\0\0\0\0', 8),
(256, 'PASSAGE II\nThe preparation which a study of the humanities can provide, stems from three observations about education in our world of accelerating social and technological change. First, with the rate of change, we cannot hope to train our students for specific technologies. That kind of vocational education is obsolescent. By the time the specific training will have completed, the world will have moved on. \n\nIf our education consists of narrow training, we will not be prepared to change. Second and paradoxically what our students desires from their education is preparation for specific careers – business, engineering, medicine, computer programming and the like, but we will not be able to train them for a life-long career. Their confronting the depressed job market gives our students a certain anxiety, but the solution they seek in vocational training is not sufficient. Third, we sense in our students a narrowing materialism, with the good life defined in terms of material comforts. Education, then means learning to do a job which will make money. I see in this definition a limiting sense of what education and thus life offer, a definition which excludes joy and meaning. Our approach to the study of the humanities responds to these three related problems. In our changing, yet narrowing world, the teaching of the humanities finds one powerful justification – it teaches students how to think. \n\n6. ‘Our world of accelerating social and technological change’ means that ?', 'our world is moving too fast socially and technologically', 'our world is going through more rapid, social and technological change', ' the social and technological changes is more exhilarating than before', 'the social and technological change is accelerating our world ', '', 'B', '\0\0\0\0', 8),
(257, 'PASSAGE II\nThe preparation which a study of the humanities can provide, stems from three observations about education in our world of accelerating social and technological change. First, with the rate of change, we cannot hope to train our students for specific technologies. That kind of vocational education is obsolescent. By the time the specific training will have completed, the world will have moved on. \n\nIf our education consists of narrow training, we will not be prepared to change. Second and paradoxically what our students desires from their education is preparation for specific careers – business, engineering, medicine, computer programming and the like, but we will not be able to train them for a life-long career. Their confronting the depressed job market gives our students a certain anxiety, but the solution they seek in vocational training is not sufficient. Third, we sense in our students a narrowing materialism, with the good life defined in terms of material comforts. Education, then means learning to do a job which will make money. I see in this definition a limiting sense of what education and thus life offer, a definition which excludes joy and meaning. Our approach to the study of the humanities responds to these three related problems. In our changing, yet narrowing world, the teaching of the humanities finds one powerful justification – it teaches students how to think. \n\nWhat is the major weakness of training students for specific technologies ? ', 'it trains students for only onetype of career', 'it helps students to acquire money later when they are employed ', 'it makes them anxious for a job in the market', 'it cannot help students to cope with the rapid changes in the world.', '', 'D', '\0\0\0\0', 8),
(258, 'PASSAGE II\nThe preparation which a study of the humanities can provide, stems from three observations about education in our world of accelerating social and technological change. First, with the rate of change, we cannot hope to train our students for specific technologies. That kind of vocational education is obsolescent. By the time the specific training will have completed, the world will have moved on. \n\nIf our education consists of narrow training, we will not be prepared to change. Second and paradoxically what our students desires from their education is preparation for specific careers – business, engineering, medicine, computer programming and the like, but we will not be able to train them for a life-long career. Their confronting the depressed job market gives our students a certain anxiety, but the solution they seek in vocational training is not sufficient. Third, we sense in our students a narrowing materialism, with the good life defined in terms of material comforts. Education, then means learning to do a job which will make money. I see in this definition a limiting sense of what education and thus life offer, a definition which excludes joy and meaning. Our approach to the study of the humanities responds to these three related problems. In our changing, yet narrowing world, the teaching of the humanities finds one powerful justification – it teaches students how to think. \n\n‘We sense in our students a narrowing materialism’ means that our students’ concept of education is one that ?', 'prepares them for money, joy and meaning ', 'makes them ready to confront the depressed job market', 'only prepares them to acquire materials comforts ', 'trains them for life-long career', '', 'C', '\0\0\0\0', 8),
(259, 'PASSAGE II\nThe preparation which a study of the humanities can provide, stems from three observations about education in our world of accelerating social and technological change. First, with the rate of change, we cannot hope to train our students for specific technologies. That kind of vocational education is obsolescent. By the time the specific training will have completed, the world will have moved on. \n\nIf our education consists of narrow training, we will not be prepared to change. Second and paradoxically what our students desires from their education is preparation for specific careers – business, engineering, medicine, computer programming and the like, but we will not be able to train them for a life-long career. Their confronting the depressed job market gives our students a certain anxiety, but the solution they seek in vocational training is not sufficient. Third, we sense in our students a narrowing materialism, with the good life defined in terms of material comforts. Education, then means learning to do a job which will make money. I see in this definition a limiting sense of what education and thus life offer, a definition which excludes joy and meaning. Our approach to the study of the humanities responds to these three related problems. In our changing, yet narrowing world, the teaching of the humanities finds one powerful justification – it teaches students how to think. \n\n9. According to the writer, a study of the humanities (A) is accepted by present day students essential (B) prepares students for specific careers (C) provides a missing link in the technological education of our students (D) is the best solution to the problem of unemployment. ', 'is accepted by present day students essential', 'prepares students for specific careers', ' provides a missing link in the technological education of our students', 'is the best solution to the problem of unemployment. ', '', 'C', '\0\0\0\0', 8),
(260, 'PASSAGE II\nThe preparation which a study of the humanities can provide, stems from three observations about education in our world of accelerating social and technological change. First, with the rate of change, we cannot hope to train our students for specific technologies. That kind of vocational education is obsolescent. By the time the specific training will have completed, the world will have moved on. \n\nIf our education consists of narrow training, we will not be prepared to change. Second and paradoxically what our students desires from their education is preparation for specific careers – business, engineering, medicine, computer programming and the like, but we will not be able to train them for a life-long career. Their confronting the depressed job market gives our students a certain anxiety, but the solution they seek in vocational training is not sufficient. Third, we sense in our students a narrowing materialism, with the good life defined in terms of material comforts. Education, then means learning to do a job which will make money. I see in this definition a limiting sense of what education and thus life offer, a definition which excludes joy and meaning. Our approach to the study of the humanities responds to these three related problems. In our changing, yet narrowing world, the teaching of the humanities finds one powerful justification – it teaches students how to think. \n\nWhat type of education does the writer advocate for our students ? \n\n', 'vocational does as well as technological education', 'business, engineering, medicine and computer programming, ', 'technological education plus the humanities', 'technological education only', '', 'C', '\0\0\0\0', 8),
(261, 'PASSAGE III\nOne fact that we have to comprehend is that, in our unconscious mind, we cannot distinguish between a wish and a deed. We are all aware of some of our illogical dreams in which two completely opposite statements can exist side by side____ very acceptable in our dreams but unthinkable and illogical in our walking state. Just as our unconscious mind cannot differentiate between the wish to kill somebody in anger and the act of having done so, the young child is unable to make this distinction. The child who angrily wishes his mother to drop dead for not having gratified his needs will be traumatized greatly by the actual death of his mother _____ even if this event is not linked closely in time with his destructive wishes. He will always take part of or the whole of the blame for the loss of his mother. He will always say to himself_____ rarely to others _____ ‘I did it. I am responsible. I was bad, therefore mummy left me. ‘It is well to remember that the child will react in the same manner if he loses a parent by divorce, separation or desertion. \n\nDeath is often seen by a child as an impermanent thing and has therefore little distinction from a divorce in which he may have an opportunity to see a parent again. \n\n11. This passage emphasizes (A) child growing up in ignorance (B) our unconscious mind (C) a child’s inability to distinguish between dream and reality (D) illogical dreams ', 'child growing up in ignorance', ' our unconscious mind ', 'a child’s inability to distinguish between dream and reality', ' illogical dreams ', '', 'A', '\0\0\0\0', 8),
(262, 'PASSAGE III\nOne fact that we have to comprehend is that, in our unconscious mind, we cannot distinguish between a wish and a deed. We are all aware of some of our illogical dreams in which two completely opposite statements can exist side by side____ very acceptable in our dreams but unthinkable and illogical in our walking state. Just as our unconscious mind cannot differentiate between the wish to kill somebody in anger and the act of having done so, the young child is unable to make this distinction. The child who angrily wishes his mother to drop dead for not having gratified his needs will be traumatized greatly by the actual death of his mother _____ even if this event is not linked closely in time with his destructive wishes. He will always take part of or the whole of the blame for the loss of his mother. He will always say to himself_____ rarely to others _____ ‘I did it. I am responsible. I was bad, therefore mummy left me. ‘It is well to remember that the child will react in the same manner if he loses a parent by divorce, separation or desertion. \n\nDeath is often seen by a child as an impermanent thing and has therefore little distinction from a divorce in which he may have an opportunity to see a parent again. \n\n12. Our unconscious minds and dreams are alike in that ?', 'both are out of our control', ' both can accommodate contradiction', 'neither functions in a continuous manner', 'both deal with non-real issues ', '', 'B', '\0\0\0\0', 8),
(263, 'PASSAGE III\nOne fact that we have to comprehend is that, in our unconscious mind, we cannot distinguish between a wish and a deed. We are all aware of some of our illogical dreams in which two completely opposite statements can exist side by side____ very acceptable in our dreams but unthinkable and illogical in our walking state. Just as our unconscious mind cannot differentiate between the wish to kill somebody in anger and the act of having done so, the young child is unable to make this distinction. The child who angrily wishes his mother to drop dead for not having gratified his needs will be traumatized greatly by the actual death of his mother _____ even if this event is not linked closely in time with his destructive wishes. He will always take part of or the whole of the blame for the loss of his mother. He will always say to himself_____ rarely to others _____ ‘I did it. I am responsible. I was bad, therefore mummy left me. ‘It is well to remember that the child will react in the same manner if he loses a parent by divorce, separation or desertion. \n\nDeath is often seen by a child as an impermanent thing and has therefore little distinction from a divorce in which he may have an opportunity to see a parent again. \n\n13. The child would feel responsible for his mother’s death even if it is unconnected with his wishes because ?', ' he regards his wish as a curse', 'he hates her and wants her dead', 'his needs are not gratified', 'he cannot distinguish between wish and reality ', '', 'D', '\0\0\0\0', 8),
(264, 'PASSAGE III\nOne fact that we have to comprehend is that, in our unconscious mind, we cannot distinguish between a wish and a deed. We are all aware of some of our illogical dreams in which two completely opposite statements can exist side by side____ very acceptable in our dreams but unthinkable and illogical in our walking state. Just as our unconscious mind cannot differentiate between the wish to kill somebody in anger and the act of having done so, the young child is unable to make this distinction. The child who angrily wishes his mother to drop dead for not having gratified his needs will be traumatized greatly by the actual death of his mother _____ even if this event is not linked closely in time with his destructive wishes. He will always take part of or the whole of the blame for the loss of his mother. He will always say to himself_____ rarely to others _____ ‘I did it. I am responsible. I was bad, therefore mummy left me. ‘It is well to remember that the child will react in the same manner if he loses a parent by divorce, separation or desertion. \n\n14. Traumatized’ as used in the passage means ?', 'angered', 'made happy and satisfied', 'made sad  and dejected ', ' made to feel guilt ', '', 'C', '\0\0\0\0', 8),
(265, 'PASSAGE III\nOne fact that we have to comprehend is that, in our unconscious mind, we cannot distinguish between a wish and a deed. We are all aware of some of our illogical dreams in which two completely opposite statements can exist side by side____ very acceptable in our dreams but unthinkable and illogical in our walking state. Just as our unconscious mind cannot differentiate between the wish to kill somebody in anger and the act of having done so, the young child is unable to make this distinction. The child who angrily wishes his mother to drop dead for not having gratified his needs will be traumatized greatly by the actual death of his mother _____ even if this event is not linked closely in time with his destructive wishes. He will always take part of or the whole of the blame for the loss of his mother. He will always say to himself_____ rarely to others _____ ‘I did it. I am responsible. I was bad, therefore mummy left me. ‘It is well to remember that the child will react in the same manner if he loses a parent by divorce, separation or desertion. \n\n15. From the child’s point of view, in what way is death likened to a divorce? ', 'both are losses ', 'both are temporary', 'both would involve his mother', ' he feels responsible in each case', '', 'B', '\0\0\0\0', 8),
(266, 'PASSAGE IV\nUndergraduate students in Psychology and Education come to their first course in statistics with diverse expectations of and backgrounds in mathematics. Some have considerable formal training and quantitative aptitude and look forward to learning statistics. Others – perhaps the majority, including some of those who aspire to postgraduate studies – are less confident in their quantitative skills. They regard a course in statistics as a necessary evil for the understanding or carrying out research in their chosen fields, but an evil nonetheless. \n\nThe third edition, like its predecessor, directed primarily at the latter audience it was written with the conviction that statistical concepts can be described simply without loss of accuracy and that understanding of statistical techniques as research tools can be effectively promoted by discussing them within the context of their application to concrete data rather than as pure abstractions. Further, its contents are limited to those statistical techniques that are widely used in the literature of Psychology and to the principles underlying them.\n\nThe changes that have been made in this edition reflect both the results of our teaching experience and the increasing prominence being given by statisticians to certain topics. Thus our discussion of some procedures, particularly those in the realm of descriptive statistics, which students grasp easily, have been shortened or rearranged. The treatment of other topics has been expanded. Greater emphasis has been placed on sampling theory, hypothesis testing, and the notion of statistical power. \n\n16. The book discussed in this passage is about (A) psychology and education (B) mathematics for undergraduate students (C) quantitative skills for postgraduate studies (D) statistical procedure relating to research \n', ' psychology and education', ' mathematics for undergraduate students', 'quantitative skills for postgraduate studies', 'statistical procedure relating to research ', '', 'D', '\0\0\0\0', 8),
(267, 'PASSAGE IV\nUndergraduate students in Psychology and Education come to their first course in statistics with diverse expectations of and backgrounds in mathematics. Some have considerable formal training and quantitative aptitude and look forward to learning statistics. Others – perhaps the majority, including some of those who aspire to postgraduate studies – are less confident in their quantitative skills. They regard a course in statistics as a necessary evil for the understanding or carrying out research in their chosen fields, but an evil nonetheless. \n\nThe third edition, like its predecessor, directed primarily at the latter audience it was written with the conviction that statistical concepts can be described simply without loss of accuracy and that understanding of statistical techniques as research tools can be effectively promoted by discussing them within the context of their application to concrete data rather than as pure abstractions. Further, its contents are limited to those statistical techniques that are widely used in the literature of Psychology and to the principles underlying them.\n\nThe changes that have been made in this edition reflect both the results of our teaching experience and the increasing prominence being given by statisticians to certain topics. Thus our discussion of some procedures, particularly those in the realm of descriptive statistics, which students grasp easily, have been shortened or rearranged. The treatment of other topics has been expanded. Greater emphasis has been placed on sampling theory, hypothesis testing, and the notion of statistical power. \n\n17. The expression, ‘necessary evil’ means that ', ' evil is essential in studying the subject discussed ', ' studying the subject is an unpleasant experience which must be endured', 'only those who are evil can understand the subject', ' those lacking in quantitative skills see the subject as an evil. ', '', 'B', '\0\0\0\0', 8),
(268, 'PASSAGE IV\nUndergraduate students in Psychology and Education come to their first course in statistics with diverse expectations of and backgrounds in mathematics. Some have considerable formal training and quantitative aptitude and look forward to learning statistics. Others – perhaps the majority, including some of those who aspire to postgraduate studies – are less confident in their quantitative skills. They regard a course in statistics as a necessary evil for the understanding or carrying out research in their chosen fields, but an evil nonetheless. \n\nThe third edition, like its predecessor, directed primarily at the latter audience it was written with the conviction that statistical concepts can be described simply without loss of accuracy and that understanding of statistical techniques as research tools can be effectively promoted by discussing them within the context of their application to concrete data rather than as pure abstractions. Further, its contents are limited to those statistical techniques that are widely used in the literature of Psychology and to the principles underlying them.\n\nThe changes that have been made in this edition reflect both the results of our teaching experience and the increasing prominence being given by statisticians to certain topics. Thus our discussion of some procedures, particularly those in the realm of descriptive statistics, which students grasp easily, have been shortened or rearranged. The treatment of other topics has been expanded. Greater emphasis has been placed on sampling theory, hypothesis testing, and the notion of statistical power. \n\n18. From the passage, we learn that the book discussed has been ', 'reprinted twice', ' published three times', ' rewritten three times', 'revised twice ', '', 'C', '\0\0\0\0', 8),
(269, 'PASSAGE IV\nUndergraduate students in Psychology and Education come to their first course in statistics with diverse expectations of and backgrounds in mathematics. Some have considerable formal training and quantitative aptitude and look forward to learning statistics. Others – perhaps the majority, including some of those who aspire to postgraduate studies – are less confident in their quantitative skills. They regard a course in statistics as a necessary evil for the understanding or carrying out research in their chosen fields, but an evil nonetheless. \n\nThe third edition, like its predecessor, directed primarily at the latter audience it was written with the conviction that statistical concepts can be described simply without loss of accuracy and that understanding of statistical techniques as research tools can be effectively promoted by discussing them within the context of their application to concrete data rather than as pure abstractions. Further, its contents are limited to those statistical techniques that are widely used in the literature of Psychology and to the principles underlying them.\n\nThe changes that have been made in this edition reflect both the results of our teaching experience and the increasing prominence being given by statisticians to certain topics. Thus our discussion of some procedures, particularly those in the realm of descriptive statistics, which students grasp easily, have been shortened or rearranged. The treatment of other topics has been expanded. Greater emphasis has been placed on sampling theory, hypothesis testing, and the notion of statistical power. \n\nThe changes that were made in the book were motivated by ?', 'professional experience and popularity of topics', 'teaching experience and statisticians’ views of some topics', 'the examination results of previous generation of students', 'the need to avoid areas which students grasp easily. ', '', 'B', '\0\0\0\0', 8),
(270, 'PASSAGE IV\nUndergraduate students in Psychology and Education come to their first course in statistics with diverse expectations of and backgrounds in mathematics. Some have considerable formal training and quantitative aptitude and look forward to learning statistics. Others – perhaps the majority, including some of those who aspire to postgraduate studies – are less confident in their quantitative skills. They regard a course in statistics as a necessary evil for the understanding or carrying out research in their chosen fields, but an evil nonetheless. \n\nThe third edition, like its predecessor, directed primarily at the latter audience it was written with the conviction that statistical concepts can be described simply without loss of accuracy and that understanding of statistical techniques as research tools can be effectively promoted by discussing them within the context of their application to concrete data rather than as pure abstractions. Further, its contents are limited to those statistical techniques that are widely used in the literature of Psychology and to the principles underlying them.\n\nThe changes that have been made in this edition reflect both the results of our teaching experience and the increasing prominence being given by statisticians to certain topics. Thus our discussion of some procedures, particularly those in the realm of descriptive statistics, which students grasp easily, have been shortened or rearranged. The treatment of other topics has been expanded. Greater emphasis has been placed on sampling theory, hypothesis testing, and the notion of statistical power. \n\n20. It can be inferred from the passage that the book was written by ?', 'an educational psychologist', 'more than one author', ' a prominent statistician ', 'a professor of statistics. ', '', 'B', '\0\0\0\0', 8),
(271, 'PASSAGE V\nAll too often, there is deference between what we say and what we think we have said, and between how we feel we have handled people and how they think they have been treated. When such ‘gaps’ occur between the intent and the action, it is often stated that there has been ‘a break-down in communication’. Sometimes the break-down is allowed to become so serious that the gap becomes a chasm, relatives in family ceasing to speak to one another, managements and trade unions refusing to meet, or governments recalling ambassadors when relations between states reach a low ebb. \n\nIn fact, sometimes when people communicate, either as individuals or within groups, problems inevitably occur; instructions may be impossible to carry out, offence is taken at a particular remark, a directive is ambiguously phrased or people’s attitudes are coloured by jealousy resentment or frustration. \n\nDuring the past fifty years, industrial, commercial and public service organizations have grown prodigiously to meet the needs of advanced technological societies.  Sometimes as many as 10,000 people work on one site, or one company employs more than 50,000 people. Clearly, good communications are essential to the efficient operations of any organization, and vital to the fulfillment of all those who commit their working lives to it. \n\nFor this reason, management specialists and behavioural scientists have devoted much thought and energy over recent years to analyzing the problems caused by bad communication practices, and to creating good communication climates and systems \n\nAs a result of the current structure of societies and economies, most of us will spend our working lived in an organization – for many of us it will be a large one. If we are to understand our working environment, it is essential that we become good communicators with social skills\n\n21. Which of the following titles best sums up the passage ? ', 'the need for effective communication', 'breakdown in communication ', 'communication in technological societies ', 'bad communication practices ', '', 'A', '\0\0\0\0', 8),
(272, 'PASSAGE V\nAll too often, there is deference between what we say and what we think we have said, and between how we feel we have handled people and how they think they have been treated. When such ‘gaps’ occur between the intent and the action, it is often stated that there has been ‘a break-down in communication’. Sometimes the break-down is allowed to become so serious that the gap becomes a chasm, relatives in family ceasing to speak to one another, managements and trade unions refusing to meet, or governments recalling ambassadors when relations between states reach a low ebb. \n\nIn fact, sometimes when people communicate, either as individuals or within groups, problems inevitably occur; instructions may be impossible to carry out, offence is taken at a particular remark, a directive is ambiguously phrased or people’s attitudes are coloured by jealousy resentment or frustration. \n\nDuring the past fifty years, industrial, commercial and public service organizations have grown prodigiously to meet the needs of advanced technological societies.  Sometimes as many as 10,000 people work on one site, or one company employs more than 50,000 people. Clearly, good communications are essential to the efficient operations of any organization, and vital to the fulfillment of all those who commit their working lives to it. \n\nFor this reason, management specialists and behavioural scientists have devoted much thought and energy over recent years to analyzing the problems caused by bad communication practices, and to creating good communication climates and systems \n\nAs a result of the current structure of societies and economies, most of us will spend our working lived in an organization – for many of us it will be a large one. If we are to understand our working environment, it is essential that we become good communicators with social skills\n\n22. According to the passage, which of the following are NOT likely to contribute to a breakdown in communication? ', 'people’s attitudes and feeling', ' ambiguously phrased instructions', 'managements and trade unions', ' Management specialists and behavioural scientists. ', '', 'D', '\0\0\0\0', 8),
(273, 'PASSAGE V\nAll too often, there is deference between what we say and what we think we have said, and between how we feel we have handled people and how they think they have been treated. When such ‘gaps’ occur between the intent and the action, it is often stated that there has been ‘a break-down in communication’. Sometimes the break-down is allowed to become so serious that the gap becomes a chasm, relatives in family ceasing to speak to one another, managements and trade unions refusing to meet, or governments recalling ambassadors when relations between states reach a low ebb. \n\nIn fact, sometimes when people communicate, either as individuals or within groups, problems inevitably occur; instructions may be impossible to carry out, offence is taken at a particular remark, a directive is ambiguously phrased or people’s attitudes are coloured by jealousy resentment or frustration. \n\nDuring the past fifty years, industrial, commercial and public service organizations have grown prodigiously to meet the needs of advanced technological societies.  Sometimes as many as 10,000 people work on one site, or one company employs more than 50,000 people. Clearly, good communications are essential to the efficient operations of any organization, and vital to the fulfillment of all those who commit their working lives to it. \n\nFor this reason, management specialists and behavioural scientists have devoted much thought and energy over recent years to analyzing the problems caused by bad communication practices, and to creating good communication climates and systems \n\nAs a result of the current structure of societies and economies, most of us will spend our working lived in an organization – for many of us it will be a large one. If we are to understand our working environment, it is essential that we become good communicators with social skills\n\nFrom the text, it can be inferred that a good communication to ?', 'create favourable communication conditions', 'get the technological systems to work efficiently', 'call a spade a spade', 'be able to address 10,000 workers. ', '', 'A', '\0\0\0\0', 8),
(274, 'PASSAGE V\nAll too often, there is deference between what we say and what we think we have said, and between how we feel we have handled people and how they think they have been treated. When such ‘gaps’ occur between the intent and the action, it is often stated that there has been ‘a break-down in communication’. Sometimes the break-down is allowed to become so serious that the gap becomes a chasm, relatives in family ceasing to speak to one another, managements and trade unions refusing to meet, or governments recalling ambassadors when relations between states reach a low ebb. \n\nIn fact, sometimes when people communicate, either as individuals or within groups, problems inevitably occur; instructions may be impossible to carry out, offence is taken at a particular remark, a directive is ambiguously phrased or people’s attitudes are coloured by jealousy resentment or frustration. \n\nDuring the past fifty years, industrial, commercial and public service organizations have grown prodigiously to meet the needs of advanced technological societies.  Sometimes as many as 10,000 people work on one site, or one company employs more than 50,000 people. Clearly, good communications are essential to the efficient operations of any organization, and vital to the fulfillment of all those who commit their working lives to it. \n\nFor this reason, management specialists and behavioural scientists have devoted much thought and energy over recent years to analyzing the problems caused by bad communication practices, and to creating good communication climates and systems \n\nAs a result of the current structure of societies and economies, most of us will spend our working lived in an organization – for many of us it will be a large one. If we are to understand our working environment, it is essential that we become good communicators with social skills\n\n24. ‘Chasm’ as used in the passage means ', 'serious eruption', 'disaster ', 'wide difference ', 'disagreement ', '', 'C', '\0\0\0\0', 8),
(275, 'PASSAGE V\nAll too often, there is deference between what we say and what we think we have said, and between how we feel we have handled people and how they think they have been treated. When such ‘gaps’ occur between the intent and the action, it is often stated that there has been ‘a break-down in communication’. Sometimes the break-down is allowed to become so serious that the gap becomes a chasm, relatives in family ceasing to speak to one another, managements and trade unions refusing to meet, or governments recalling ambassadors when relations between states reach a low ebb. \n\nIn fact, sometimes when people communicate, either as individuals or within groups, problems inevitably occur; instructions may be impossible to carry out, offence is taken at a particular remark, a directive is ambiguously phrased or people’s attitudes are coloured by jealousy resentment or frustration. \n\nDuring the past fifty years, industrial, commercial and public service organizations have grown prodigiously to meet the needs of advanced technological societies.  Sometimes as many as 10,000 people work on one site, or one company employs more than 50,000 people. Clearly, good communications are essential to the efficient operations of any organization, and vital to the fulfillment of all those who commit their working lives to it. \n\nFor this reason, management specialists and behavioural scientists have devoted much thought and energy over recent years to analyzing the problems caused by bad communication practices, and to creating good communication climates and systems \n\nAs a result of the current structure of societies and economies, most of us will spend our working lived in an organization – for many of us it will be a large one. If we are to understand our working environment, it is essential that we become good communicators with social skills\n\n25. The most essential tool of communication not specially mentioned in this passage is ', 'specialization ', 'environment', 'writing ', ' language. ', '', 'C', '\0\0\0\0', 8),
(276, 'LEXIS AND STRUCTURES\nIn each of questions 26 to 30, choose the option opposite in meaning to the word in quotes\n26. I am happy to inform you that your boys are ''conscientious'' \n', 'industrious ', 'carefree', 'careful', 'corrupt ', '', 'B', '\0\0\0\0', 8),
(277, 'LEXIS AND STRUCTURES\nIn each of questions 26 to 30, choose the option opposite in meaning to the word in quotes\n\n27. My father is a very ''prosperous'' businessman ', ' ungrateful', 'unscrupulous ', 'unskillful ', 'unsuccessful ', '', 'D', '\0\0\0\0', 8),
(278, 'LEXIS AND STRUCTURES\nIn each of questions 26 to 30, choose the option opposite in meaning to the word in quotes\n\n28. The hostess greeted her guests in a very ''relaxed'' manner ', ' energetic', 'athletic', 'stiff ', 'perplexed ', '', 'C', '\0\0\0\0', 8),
(279, 'LEXIS AND STRUCTURES\nIn each of questions 26 to 30, choose the option opposite in meaning to the word in quotes\n\n29. Ayo takes his studies rather ''lightly'' ', ' humorously', ' tediously', 'carefully', 'seriously ', '', 'D', '\0\0\0\0', 8),
(280, 'LEXIS AND STRUCTURES\nIn each of questions 26 to 30, choose the option opposite in meaning to the word in quotes\n\n30. The doctor was very ''gentle'' with his patients in the examining room ', 'harsh', 'rude', ' tough', 'unkind', '', 'C', '\0\0\0\0', 8),
(281, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in quotes. \n\nThere is ''no love lost'' between Hassan and Hassana (A) dislike each other (B) are head over heels in love (C) will love each other (D) are still good friends ', ' dislike each other', 'are head over heels in love', 'will love each other', 'are still good friends ', '', 'D', '\0\0\0\0', 8),
(282, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in quotes. \n\nWhether the village head should identify himself with the activities of religious denominations has remained a burning question (A) a subject of discord (B) a perennial issue (C) a matter of serious controversy (D) a sensitive matter.', 'a subject of discord ', 'a perennial issue', 'a matter of serious controversy ', 'a sensitive matter.', '', 'C', '\0\0\0\0', 8),
(283, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in quotes. \n\nI would ''rather not'' attend the party ', 'detest attending', ' do not have the enthusiasm to attend', ' must not attend', 'have a choice to attend or not to ', '', 'B', '\0\0\0\0', 8),
(284, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in quotes. \n\nIf garba had listened to advice, he would not have had to be rushed to the hospital ', 'deliberately desired to be rushed', 'was in a position to have prevented the need to be rushed ', ' was rushed against his wish ', 'was given a cheque, but preferred to go.', '', 'B', '\0\0\0\0', 8),
(285, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in quotes.\n\n Aduke: Ngozi, let’s visit the market.\n Ngozi: if you insist: \nAduke, ', ' is very willing to accompany Aduke', 'must accompany Aduke', ' is not keen on going with Aduke', ' is pretending not to be interested in going with Aduke. ', '', 'C', '\0\0\0\0', 8),
(286, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in italics\n\nThe new leader hands out an olive branch. ', 'Sues for peace', 'gives out branches of the olive tree ', 'gives out branches of the olive tree ', 'challenges his opponents to a fight', 'blesses his supporters. ', 'A', '\0\0\0\0', 8),
(287, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in italics\n\nWhen you go to a foreign country to study, you will discover that life there is not a bed of roses. ', 'as pleasant as one thought', 'a bed with roses', 'an unmitigated disappointment ', 'as expected. ', '', 'A', '\0\0\0\0', 8),
(288, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in italics. \n\nBecause our representative is immature and biased, he takes a jaundiced view of our problems ', 'hazy', ' unclear', 'prejudiced', 'bleak ', '', 'C', '\0\0\0\0', 8),
(289, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in italics. \n\nThe president has sent his regrets. He is unable to attend the meeting ', 'explanations', 'anxieties ', 'unhappiness', 'apologies ', '', 'D', '\0\0\0\0', 8),
(290, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in italics. \n\nThe woman acted courageously when she was attacked by thieves ', 'shyly', 'fearlessly', 'timidly', ' carelessly', '', 'B', '\0\0\0\0', 8),
(291, 'In each of questions 31 to 41, choose the option nearest in meaning to the word or phrases in italics. \n\nWe all have both and bad characteristics. Either is, however, easily manifested in times of crisis ', 'demanded', 'highlighted ', 'submerged ', 'determined. ', '', 'B', '\0\0\0\0', 8),
(292, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    	\n\n42. The sea wave continue to …….. the cliff on the west coast constantly \n', 'impair ', 'rub', 'knock', 'erode ', '', 'D', '\0\0\0\0', 8),
(293, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nThe college bus was traveling at a high ……. When the accident occurred ', 'velocity', 'acceleration', 'rapidity ', 'speed ', '', 'D', '\0\0\0\0', 8),
(294, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nthat only senior members of staff have the …….. of using the toilet upstairs \n', ' permission', 'occasion', 'privilege', ' habit', '', 'C', '\0\0\0\0', 8),
(295, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nThe chief priest will …..the men into the cult today', 'indoctrinate', 'usher', 'convert ', 'initiate ', '', 'D', '\0\0\0\0', 8),
(296, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nThe chief priest will …..the men into the cult today ', 'indoctrinate', 'usher ', 'convert', 'initiate ', '', 'B', '\0\0\0\0', 8),
(297, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nJimoh is noted for his …… attitude to his seniors at school ?', 'receptive', 'respectful ', 'respective', 'respectable ', '', 'D', '\0\0\0\0', 8),
(298, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nThe police report was …….. to that of the eye witness', 'contrary ', 'inconsistent', 'different', ' congruent ', '', 'A', '\0\0\0\0', 8),
(299, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    	\n\nThe African extended family system gives security to ……members ', ' his ', ' her ', ' its ', 'their ', '', 'C', '\0\0\0\0', 8),
(300, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)   \n\nI know I ……read more, but I am tired. ', 'may', 'ought to', 'would', 'could ', '', 'B', '\0\0\0\0', 8),
(301, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nInsects can become…….to insecticides ', 'immunized', 'resistant ', 'reticent ', 'immobilized ', '', 'B', '\0\0\0\0', 8),
(302, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nThe council chairman ……..the tension between the villagers and the tax collectors ', ' dispersed', 'defused', ' difused ', 'disputed ', '', 'B', '\0\0\0\0', 8),
(303, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nIf had been told of the matter earlier, I …..there so late ', 'would not go', ' should not go ', 'will not have gone ', 'would not have gone', '', 'D', '\0\0\0\0', 8),
(304, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)    \n\nEach of the candidates that came late…… to compete …….', 'have/this form', 'are having / these forms', ' have/these forms ', 'has/this form ', '', 'D', '\0\0\0\0', 8),
(305, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nI wanted to avail myself …..the opportunity of listening to the lecture but the lecturer failed to turn up ', 'with', 'for ', 'of', 'at', '', 'C', '\0\0\0\0', 8),
(306, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nI would have been surprised if you …..the orange ', 'plucked', 'have plucked', 'had plucked', 'did pluck', '', 'C', '\0\0\0\0', 8),
(307, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\n\nOn getting to the seashore,….. ', 'it was empty', 'nobody was there', 'people had deserted the place', 'he found nobody there ', '', 'D', '\0\0\0\0', 8),
(308, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nLittle did Tunde realize that his frequent un-warranted reports about me were working ……..my advantage', 'in		', 'to', 'for', 'against', '', 'B', '\0\0\0\0', 8),
(309, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nThe Board has been having……series of meetings lately ', 'some', 'a', 'a lot', 'many ', '', 'B', '\0\0\0\0', 8),
(310, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\n…….i know, nobody has seen any leopards in this area (A) so far as (B) in as much as (C) provided (D) even as ', 'so far as', 'in as much as', 'provided', 'even as ', '', 'A', '\0\0\0\0', 8),
(311, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\n------ him in the crowd, I would have told you at once ', 'if I will see', 'if I saw', 'had I seen ', 'should I see ', '', 'C', '\0\0\0\0', 8),
(312, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nInyang has always been shy to speak……(A) in public (B) publicity (C) in the public (D) with the public ', 'in public', 'publicity', 'in the public', 'with the public', '', 'C', '\0\0\0\0', 8),
(313, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\n……….his uncle helped him or not, he would still not be able to do it ', 'although', 'if', 'whether ', ' since ', '', 'C', '\0\0\0\0', 8),
(314, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nI have only three tubers of yam …… in the store, I cannot afford to give you any more ', 'still', ' outstanding', 'left ', ' remainder ', '', 'C', '\0\0\0\0', 8);
INSERT INTO `quiz_questions` (`id`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Option_E`, `Answer`, `Diagram`, `sub_id`) VALUES
(315, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nBefore the bill could be settled, Chuwang……..all the money ', 'has spent', 'will have spent', 'had spent', 'will spend ', '', 'C', '\0\0\0\0', 8),
(316, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nEither the chief of the village or the leader of the farmers……to be held responsible for the revolt ', 'were', 'are ', 'is', 'have ', '', 'C', '\0\0\0\0', 8),
(317, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nWe must observe that most of the support by other states…. Only marginal returns ', 'have yielded ', 'yield ', 'has yielded', 'have yield ', '', 'A', '\0\0\0\0', 8),
(318, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nShe asked me whether I ….. the letter for her ', 'minded to pos', 'mind to post ', 'minded posting', 'minded to posting ', '', 'C', '\0\0\0\0', 8),
(319, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nThe effort made by the principal to get students to be serious in their studies……', ' are appreciated', ' will appreciate ', 'is to appreciate ', ' is appreciated ', '', 'D', '\0\0\0\0', 8),
(320, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nHow I wish I ….. my mother’s advice (A) had heeded (B) have heeded (C) heed (D) will heed ', 'had heeded', 'have heeded', 'heed', 'will heed ', '', 'A', '\0\0\0\0', 8),
(321, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nOnly observers from the Ministry of Works……. Allowed into the conference room', 'is ', 'are ', 'have', 'has been', '', 'B', '\0\0\0\0', 8),
(322, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nA panel set up to probe the organization’s activities …….. yet to sit', 'are', 'is', 'will', 'would', '', 'B', '\0\0\0\0', 8),
(323, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\n\nThe school will …… for Easter in another six weeks', ' break off', 'break away', 'break out', 'break up ', '', 'A', '\0\0\0\0', 8),
(324, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nHis power supply was …….. from the mains because he did not pay his electricity bill ', 'blown out', ' cut off ', 'put off ', 'put out ', '', 'B', '\0\0\0\0', 8),
(325, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nWhen you’ve finished using the telephone, please hang……', 'down', 'up', 'off', 'on', '', 'B', '\0\0\0\0', 8),
(326, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nI do not intend to stay for long at the function, I only want to ……', ' put in an appearance', 'put up appearance ', 'show up appearance', 'keep up appearance', '', 'B', '\0\0\0\0', 8),
(327, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nThe man rose to an important position as a result of …… hard work ', ' sheer', 'cheer', 'share', 'shear', '', 'A', '\0\0\0\0', 8),
(328, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nEbun Ojo……. International fame as an actress \n\n', 'acquired ', ' acquired ', 'acquired ', ' acquired', '', 'B', '\0\0\0\0', 8),
(329, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nstory on the lost jewel was quite …… (A) unbelievable (B) unbelievable (C) unbelieveable (D) unbelievable  ', ' unbelievable', 'unbelievable', ' unbelieveable', 'unbelievable  ', '', 'A', '\0\0\0\0', 8),
(330, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nThe patient is suffering from…… (A) reumatism (B) rheumantism (D) rheumatism (D) rheumatism ', 'reumatism', ' rheumantism ', ' rheumatism', 'rheumatism ', '', 'D', '\0\0\0\0', 8),
(331, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nThe attitude of my students to …….. baffles me ', 'pronunciation', 'pronounciation', 'pronouceation', 'pronounceation', '', 'A', '\0\0\0\0', 8),
(332, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nWhne we got to the president’s house, we were told that he….. two days earlier (A) may have left (B) left (C) had left (D) has left ', 'may have left', 'left ', 'had left', 'has left ', '', 'C', '\0\0\0\0', 8),
(333, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nAtuk, without giving any hint as to what he intended to do, went and ….. himself (A) hung (B) hang (C) hanged (D) hunged', 'hung', 'hang ', 'hanged ', 'hunged', '', 'C', '\0\0\0\0', 8),
(334, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nProvided you….. to the market very soon, we shall be able to eat early enough', ' shall go', ' would go', 'went', 'go ', '', 'D', '\0\0\0\0', 8),
(335, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nHe….. by now, I can hear all the people shouting \n\n', 'would have arrived ', 'must have arrived ', 'has arrived ', 'should have arrived. ', '', 'B', '\0\0\0\0', 8),
(336, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nBy the time the plane reaches Harare, it …….. in the air for twelve hours ', 'has been', 'would be', 'would have been', ' should be ', '', 'C', '\0\0\0\0', 8),
(337, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nIf only Adoyi ….. what was good for him he could easily have avoided the tragedy ', 'has known', ' have known', 'knew ', 'had known ', '', 'D', '\0\0\0\0', 8),
(338, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nWe saw Ifueko …… an egg on the wall  ', 'smashed ', 'smash', 'smashing ', 'smashes ', '', 'B', '\0\0\0\0', 8),
(339, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nMany streets in the town….. in need of lights at night ', 'stand ', 'stood', 'have stood ', ' are standing ', '', 'A', '\0\0\0\0', 8),
(340, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nI did not enjoy the party. If you had invited Teriere, it ………. better organized ', 'had been', 'would  have been reading', ' has read', 'has been reading', '', 'B', '\0\0\0\0', 8),
(341, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nSibi…… novels since she came home ', 'is reading', 'had been reading', 'has read', ' has been reading ', '', 'D', '\0\0\0\0', 8),
(342, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nAsabe is overdue for retirement as she ….. in  this college since 1954 ', 'is teaching', 'has been teaching', 'taught', 'was teaching ', '', 'B', '\0\0\0\0', 8),
(343, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nThe boy who stole the mango was given …… by an eye witness (A) out (B) in (C) away (D) up ', 'out', 'in', 'away', 'up	', '', 'C', '\0\0\0\0', 8),
(344, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s)  \n\nAfter listening to the statements from the two students, the headmaster realized that it was a trivial argument that …… a serious quarrel between them ', ' touched in ', 'drew up', 'touched off ', 'brought up', '', 'D', '\0\0\0\0', 8),
(345, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s) \n\nMr. and Mrs. Akoka were sad and disappointed…… the performance of their son ', 'about ', ' for ', 'at ', 'over', '', 'C', '\0\0\0\0', 8),
(346, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s) \n\nWhen the transformer blew up, Saka threw himself down…… his stomach ', 'at', 'over', 'to', 'on', '', 'D', '\0\0\0\0', 8),
(347, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s) \n\nI ran ……an old friend of mine on Broad Streetand brought him home ', 'into', 'to', 'over', 'cross', '', 'A', '\0\0\0\0', 8),
(348, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s) \n\nThe spokesman confirmed that government would not give …..to the demands of the trade union leaders ', 'up', 'into', 'onto', 'in', '', 'D', '\0\0\0\0', 8),
(349, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s) \n\nMany students have joined the …… movement ', ' revivalists', ' revival ', 'revivalist', ' revivalist’s', '', 'B', '\0\0\0\0', 8),
(350, 'In each of questions 42 to 100, choose the word(s) or phrase(s) which best fill(s) the gap(s) \n\nIf they had not all jumped out of the car just in time they …….. ', 'might have been perished', 'will have perished', 'were all going to perish', 'would', '', 'D', '\0\0\0\0', 8),
(351, 'Which Question paper Type of Use of English is given to?', 'Type A', 'Type B', 'Type C', 'Type D ', '', 'B', '\0\0\0\0', 8),
(352, 'According to the passage, balance must be enthroned because it is', 'a critical interdependent, function ', 'an amazing help for conscience ', 'a critical part of fidelity', 'a serious way of ensuring success. ', '', 'B', '\0\0\0\0', 8),
(353, 'The word inclinations, as used in the passage, means', 'creeds', 'tendencies ', 'inhibitions', 'power ', '', 'B', '\0\0\0\0', 8),
(354, 'Which of the following statements is true according to the passage? ', 'Greatness in life emerges when square pegs are put in round holes', 'people agree on all issues and behave the same way for the same reason ', 'understanding life at different levels gives no account of visible acquisition', 'understanding life at different levels gives no account of visible acquisition', '', 'D', '\0\0\0\0', 8),
(355, 'From the passage, it can be inferred that ', 'people insincerely discuss fact that govern their behaviour ', 'all managerial decisions are based on assumptions ', 'people make conscious efforts to acquire hidden knowledge', 'all things in life exist on some beliefs. ', '', 'C', '\0\0\0\0', 8),
(356, 'Which of the following represents the writer?s view in the passage? ', 'evil thoughts may come but there is virtue in keeping them out', 'evil thoughts will continue to stings us likes vipers as long as there are enemies who cause offence ', 'like the pendulum, evil thoughts will always come to our minds no matter what we do ', 'like most birds, evil thoughts fly swiftly in our minds without perching. ', '', 'A', '\0\0\0\0', 8),
(357, 'Which of the following statements represents the view expressed by the writer in the first paragraph? ', 'evil thoughts will eventually ruin the man ', 'if we do not stop the pendulum of thoughts from swinging, our thoughts will soon become our enemies ', 'too many evil thoughts leave fatal consequences', 'it is possible to decide what controls our thoughts', '', 'A', '\0\0\0\0', 8),
(358, 'From the argument in the second paragraph, it can be concluded that evil thoughts control the lives of people who ', 'are helpless because they fly out of their minds ', 'cherist idle and slothful ways', 'are thieves with evil instincts', 'treasure and ruminate on them ', '', 'C', '\0\0\0\0', 8),
(359, 'The expression Think of the devil and he will appear?.., as used in the passage, suggest that', 'like the devil evil thoughts must not reign in our hearts', 'evil thoughts are fantasies which exist only in people?s minds.', 'uncontrolled evil thoughts may lead to evil deeds ', 'the devil gives evil thoughts only to those who invite him in. ', '', 'C', '\0\0\0\0', 8),
(360, 'Which of the following statements summarizes the argument of the last paragraph? ', 'heavy traffic on a miry and dirty road may lead to evil thoughts. ', 'the more evil we think, the more vile we are likely to become ', 'evil people should not be welcomed as guests in our homes the same way we welcome good people ', 'evil thoughts control the key to the human heart and no one can keep them out.', '', 'B', '\0\0\0\0', 8),
(361, 'A suitable title for the passage is ', 'energy from living things ', 'electricity and living creatures', 'biocell and scientific discoveries', 'the biocell?s future. ', '', 'D', '\0\0\0\0', 8),
(362, 'The writer?s posture, as conveyed in the statement electricity from living cells in no new idea, can be described as', 'ineffectual', 'contentious', 'logical', 'unguarded ', '', 'C', '\0\0\0\0', 8),
(363, 'Which of the following is true according to the passage? ', 'scientists felt that biocells would produce very costly energy ', 'biocells, at the beginning, derived their energy from sugar', 'sugar and fuel were initially used as sources of energy for biocells.', 'Biocells were forms of power used by the scientists ', '', 'C', '\0\0\0\0', 8),
(364, 'The inventors of biocell justified the need for it by saying that it would', 'develop ways for changing biocells into fuel for use ', 'yield a source of energy without much spending', 'produce electricity for all types of machines', 'produce signals to guild all ships and other vessels', '', 'B', '\0\0\0\0', 8),
(365, 'According to the passage, electricity was first discovered in ', 'hearts and brains', 'muscles of animals ', 'lighting', 'fish ', '', 'A', '\0\0\0\0', 8),
(366, 'Believe it or not, change is to human existence what the blood is to the human body. We live in an era of amazing ', ' well-defined ', 'fast-paced ', 'favourable ', 'social', '', 'D', '\0\0\0\0', 8),
(367, 'change spawned by advancing technology and industrialization. However, man?s ', 'knowledge of ', 'attitude to', 'commitment to', 'opinion  of', '', 'C', '\0\0\0\0', 8),
(368, 'promoting and  defending change in a deliberate effort to establish', 'customs', 'companies', 'trade-zones ', 'variations', '', 'D', '\0\0\0\0', 8),
(369, 'that stimulate advancement for man?s concern is proving unfavourable to the climate with threatening', 'repercussions', 'clouds', 'pressure', 'implication', '', 'A', '\0\0\0\0', 8),
(370, 'Human-induced climate change has awakened widespread concern across the globe. As a matter of fact, climate change, is now', 'an acceptable ', 'a foremost ', 'the only ', 'the last', '', 'B', '\0\0\0\0', 8),
(371, 'global issue. It is a major test of Africa?s', 'popularity ', 'energy', 'ingenuity', 'incapability', '', 'C', '\0\0\0\0', 8),
(372, 'The fourth Assessment Report (AR4) of the intergovernmental Panel on Climate Change (IPCC) confirmed that human actions are changing the earth?s climate and creating makordisturbances in human', 'geography ', 'societies', 'systems ', 'life', '', 'B', '\0\0\0\0', 8),
(373, 'and ecosystems. The IPCC reports that the world has warned by an average of 0.760C since pre-industrial times. The rising global', 'command', 'demand', 'warming', 'supply', '', 'B', '\0\0\0\0', 8),
(374, 'for energy and the adverse changes in the climate put the earth and its inhabitants in a catch ? 22 situation. ', 'structure', 'paints ', 'emulsion ', 'emission', '', 'D', '\0\0\0\0', 8),
(375, 'in spews out, perhaps Africa would have been spared and would probably be just an amused spectator. But as it is, this is not the case. Here again, we see well meaning global citizens appealing for the rest of the world to take responsibility for the problems of Africa, a strategy that cannot, thus far, termed ', 'notable ', 'liable', 'credible', 'flexible ', '', 'C', '\0\0\0\0', 8),
(376, 'Since its inception in 1983, the newspaper has attracted thousands of readers ', 'renaissance', 'coming ', 'commencement', 'publication ', '', 'C', '\0\0\0\0', 8),
(377, 'Mrs. Asio wanted her sister to stop being so detached ', 'friendly', 'careless', 'indifferent', 'passionate ', '', 'C', '\0\0\0\0', 8),
(378, 'Lantana dwelt in a ruined cottage on the hillside ', 'set ', 'worked', 'slept ', 'lived ', '', 'D', '\0\0\0\0', 8),
(379, 'The mistake brought the show to an ignominious end ', 'a good ', 'a palatable', 'a disgraceful ', 'a satisfactory ', '', 'C', '\0\0\0\0', 8),
(380, 'He compliments me on my way of doing things ', 'complements', 'imitates', 'disgusts ', 'praises', '', 'D', '\0\0\0\0', 8),
(381, 'The girl is angry with her friend who had ensured her into this relationship ', 'tricked', 'encouraged', 'forced', 'enslaved ', '', 'A', '\0\0\0\0', 8),
(382, 'Their new house was roofed with corrugated sheets ', 'folded ', 'iron ', 'aluminum', 'corruption ', '', 'A', '\0\0\0\0', 8),
(383, 'The stockbroker said it was an astute move to sell the shares then ', 'a bad ', 'a shrewd ', 'an unprofitable ', 'aniunsincere', '', 'B', '\0\0\0\0', 8),
(384, 'The principal described Oche as the most tactful person he had ever worked with ', 'passionate ', 'passionate ', 'hard-working ', 'innovative ', '', 'B', '\0\0\0\0', 8),
(385, 'The old woman is suffering from dementia ', 'lucidity', 'senility', 'insanity', 'sagacity ', '', 'B', '\0\0\0\0', 8),
(386, 'Some drugs have a deleterious effect on a child?s development ', 'debilitating ', 'helpful', 'harmful ', 'healing ', '', 'C', '\0\0\0\0', 8),
(387, 'Fila has always been described as belligerent ', 'beautiful', 'attractive ', 'combative', 'innocent ', '', 'C', '\0\0\0\0', 8),
(388, 'Laraba saw a dorlon little figure sitting outside the class ', 'wise and intelligent', 'lonely and unhappy ', 'smart and healthy ', 'short and ugly ', '', 'B', '\0\0\0\0', 8),
(389, 'The circular supersedes all previous correspondence on the matter ', 'supports', 'displaces', 'eliminates ', 'circumvents ', '', 'B', '\0\0\0\0', 8),
(390, 'Her problem was exacerbated by the loss of her father ', 'exaggerated', 'solved', 'aggravated', 'infuriated ', '', 'C', '\0\0\0\0', 8),
(391, 'If he were here, could be more fun ', 'he was expected but did not show up to make the occasion lively ', 'there was no fun because he was not present', 'He did not show up and so the occasion lacked much fun ', 'He was being expected to supply more fun.', '', 'C', '\0\0\0\0', 8),
(392, 'The secretary said that the postponement of the meeting  was due to unforeseen circumstances', 'the date of the meeting was shifted as a result of unexpected reasons ', 'The meeting?s date was out off for strange reasons', 'the meeting was called as a result of  obstacles hitherto unknown ', 'the meeting broke off as a result of unusual difficulties', '', 'A', '\0\0\0\0', 8),
(393, 'The hunter has a bird?s eye view of the animals. ', 'he view animals from a high position ', 'He views the bird?s eye', 'he views the birds on tree with one eye', 'he watches animals and birds closely.', '', 'A', '\0\0\0\0', 8),
(394, 'Even though Susan was the last in the examination, her result wasn?t too different from what had been expected ', 'her result was poor ', 'her result was a disappointment', 'her result was as expected ', 'she had not been serious with her studies. ', '', 'C', '\0\0\0\0', 8),
(395, 'Mrs. Adasu does all her work with more haste, less speed ', 'she accepts whatever she does with more haste and speed ', 'she approaches whatever she does hurriedly ', 'she addresses everything she does very quickly to avoid mistakes', 'she does everything carefully to avoid mistakes. ', '', 'B', '\0\0\0\0', 8),
(396, 'She stopped her education as her uncle left her in the lurch', 'her uncle deceived her ', 'her uncle disinherited her', 'her uncle refused to help her ', 'her uncle refused to help her', '', 'C', '\0\0\0\0', 8),
(397, 'The plan to upgrade the dispensary to a general hospital did not materialize ', 'the plan did not meet the required specifications ', 'the arrangement did not work out as wished ', 'it was difficult to obtain the materials', 'the materials purchased were not the right ones. ', '', 'B', '\0\0\0\0', 8),
(398, 'Okon?s company took a hit last year ', 'his company improved last year ', 'his company made a huge success last year', 'his company was established last year. ', '', '', 'C', '\0\0\0\0', 8),
(399, 'My eldest son, who is in Lagos, studying English ', 'only my son is in Lagos studying English', 'My only son is in Lagos studying English ', 'One of my sons is in Lagos studying English ', '', '', 'C', '\0\0\0\0', 8),
(400, 'If I went to the village I would visit the king', 'if I go to the village, I will visit the king', 'I did not go to the village and I did not visit the king ', 'all the times I went to the village I also visited the king', 'I will visit the king when u go to the village. ', '', 'B', '\0\0\0\0', 8),
(401, 'The warning communities were coerced into negotiating a settlement ', 'driven', 'compelled', 'persuaded', 'pressured ', '', 'B', '\0\0\0\0', 8),
(402, 'His father served as a mercenary in the army', 'preacher', 'regular ', 'recruit', 'officer ', '', 'C', '\0\0\0\0', 8),
(403, 'Jummai is cruel to her husband', 'harsh', 'brutal', 'passionate', 'ferocious. ', '', 'C', '\0\0\0\0', 8),
(404, 'The teacher who beat the student was treated with mercy', 'disrespect', 'contempt', 'vengeance', 'kindness', '', 'C', '\0\0\0\0', 8),
(405, 'His wife hates his garrulous attitude ', 'outspoken', 'unfriendly', 'reticent', 'thoughtful ', '', 'B', '\0\0\0\0', 8),
(406, 'Agoshito is a callow youth;, said the teacher', 'an ignorant ', 'an experienced', 'an idol ', 'an organized ', '', 'D', '\0\0\0\0', 8),
(407, 'What you are asking me to do is a herculean task', 'strenuous', 'a demanding ', 'a lovely ', 'an easy ', '', 'D', '\0\0\0\0', 8),
(408, 'Nkechi was a novice when she was first employed', 'manager', 'clerk ', 'supervisor', 'professional', '', 'C', '\0\0\0\0', 8),
(409, '?I do not trust him, he said, in a rare moment of candour ', 'reproach ', 'dishonesty', 'frankness', 'fairness ', '', 'D', '\0\0\0\0', 8),
(410, 'Mrs. Akunilo looks anaemic today ', 'strange', 'sick', 'weak', 'strong ', '', 'A', '\0\0\0\0', 8),
(411, 'It is inconceivable that the son shone in the night ', 'credible ', 'unthinkable', 'impossible', 'contestable ', '', 'C', '\0\0\0\0', 8),
(412, 'She only gives a superficial impression of warmth and friendliness ', 'a strong ', 'a fake ', 'deep', 'an unrealistic ', '', 'A', '\0\0\0\0', 8),
(413, 'As a prudent businessman, Adayi does not leave anything to chance', 'frugal ', 'shrewd ', 'careless', 'unsuccessful ', '', 'B', '\0\0\0\0', 8),
(414, 'His antipathy affected the growth of is business ', 'hatred ', 'neceptivenes ', 'loyalty', 'hostility', '', 'D', '\0\0\0\0', 8),
(415, 'Okonkwo?s lethal right foot did the magic in the football match ', 'weak ', 'wicked', 'fat', 'harmless ', '', 'D', '\0\0\0\0', 8),
(416, 'When his car tyre........on the way, he did not know what to do ', 'has burst ', 'had burst ', 'busted', 'burst ', '', 'D', '\0\0\0\0', 8),
(417, 'Lami?s father?..as a gardener when he was young, but not he is a driver  ', 'had been working ', 'use to work', 'has worked ', 'used to work ', '', 'A', '\0\0\0\0', 8),
(418, '?..he switches on the light, the shadow disappears ', 'whenever', 'except', 'since', 'until', '', 'B', '\0\0\0\0', 8),
(419, 'It is important that you clear the refuse in front of your house every ?? ', 'fourtnight', 'fortnight', 'fourthninght', 'forthnight', '', 'C', '\0\0\0\0', 8),
(420, 'The policemen became suspicious as the boodlums?? in their office ', 'ferreted', 'ferreted', 'ferreted about ', 'ferreted about ', '', 'D', '\0\0\0\0', 8),
(421, 'Suara needn?t come with us ?.? ', 'does she', 'will she ', 'can she ', 'need she ', '', 'D', '\0\0\0\0', 8),
(422, 'Unoka?..the whole house to find his missing wristwatch ', 'scourged', 'scoured', 'scored', 'scouted ', '', 'B', '\0\0\0\0', 8),
(423, 'Ife asked me?..', 'what time it was ', 'what is it by my time ', 'what time is it', 'what time it is ', '', 'A', '\0\0\0\0', 8),
(424, 'There are many ways to kill a rat, so we should be ?.. in our approach to the task ahead of us ', 'ecletic', 'eclectic', 'eclectic', 'eclectic ', '', 'B', '\0\0\0\0', 8),
(425, 'Audu took these actions purely ?.. his own career', 'on furtherance of ', 'in furtherance of ', 'to furtherance in ', 'in furtherance with ', '', 'B', '\0\0\0\0', 8),
(426, 'Here is Mr. Odumusuwho teaches English?. In our school ', 'pronuntiation', 'pronounciation', 'pronunciation', 'pronoutiation', '', 'C', '\0\0\0\0', 8),
(427, 'Instead of ?.. she lied ', 'pleading', 'her to plead ', 'her pleading ', 'plead ', '', 'A', '\0\0\0\0', 8),
(428, 'Of the three girls, Uka is the ?.. ', 'so much notorious', 'notorious', 'naughty', 'naughtiest ', '', 'D', '\0\0\0\0', 8),
(429, 'I wonder how he will?.. being absent from school for a long time ', 'make  in', 'make up', 'make off ', 'make out ', '', 'B', '\0\0\0\0', 8),
(430, 'Please sit on the ?? ', 'carier', 'career ', 'carrier', 'carrear', '', 'C', '\0\0\0\0', 8),
(431, 'I want to ?..this chance to acquaint you with the latest development ', 'size', 'seize ', 'sieze', 'cease ', '', 'B', '\0\0\0\0', 8),
(432, 'Getting a well paid job nowadays is an ?.. task ', 'utmost', 'upbeat', 'uphill ', 'upfield', '', 'C', '\0\0\0\0', 8),
(433, 'The secretary has no right to ?.my affairs', 'spy from ', 'meddle in ', 'toy at ', 'complain into ', '', 'B', '\0\0\0\0', 8),
(434, 'Bola studiously avoided?.the questions ', 'parrying', 'answering', 'projecting', 'destroying ', '', 'B', '\0\0\0\0', 8),
(435, 'The school authority dismissed him for ?.. but I won?t tell you about it yet', 'certain reason ', 'a reason ', 'more reason', 'a certain reason ', '', 'D', '\0\0\0\0', 8),
(436, 'fuel ', 'cruel', 'fool', 'rule', 'field ', '', 'A', '\0\0\0\0', 8),
(437, 'match', 'harsh', 'batch', 'such ', 'watch ', '', 'B', '\0\0\0\0', 8),
(438, 'sheer ', 'sheila', 'care', 'ear', 'sherry', '', 'C', '\0\0\0\0', 8),
(439, 'termination', 'termination ', 'TERmination', 'termiNAtion', 'terMination', '', 'C', '\0\0\0\0', 8),
(440, 'meditative ', 'melDltative ', 'meditative', 'Meditative', 'meditative', '', 'B', '\0\0\0\0', 8),
(441, 'suggestible', 'suggeSTlble', 'Suggestible', 'suggestible', 'suggestible', '', 'C', '\0\0\0\0', 8),
(442, 'bubble', 'guy ', 'bull', 'bumper', 'gurgle', '', 'C', '\0\0\0\0', 8),
(443, 'weight', 'whale', 'white', 'whet ', 'wrythe', '', 'A', '\0\0\0\0', 8),
(444, 'leach', 'gear', 'cedar', 'cheer', 'death ', '', 'B', '\0\0\0\0', 8),
(445, 'mention ', 'that ', 'machine ', 'church', 'test ', '', 'B', '\0\0\0\0', 8),
(446, 'prestige', 'bag', 'badge', 'reggae ', 'leisure ', '', 'D', '\0\0\0\0', 8),
(447, 'knot', 'cot', 'keep', 'nom ', 'king ', '', 'C', '\0\0\0\0', 8),
(448, 'Uche LOVES Toyota cars', ') who loves Toyota cars?', 'what brand of ear does Uche love?', 'doesUche love hate Toyota cars?', 'Does Uche love bicycle?', '', 'C', '\0\0\0\0', 8),
(449, 'The POLICE arrested the suspect ', 'Did the police placate the suspect? ', 'who arrested the suspect?', 'who did the police arrest? ', 'did the police arrest the suspect? ', '', 'B', '\0\0\0\0', 8),
(450, 'Maiduguri is the CAPITAL of Borno State ', ') is Maiduguri the capital of Plateau State? ', 'Which State is Maiduguri the capital of?', ' Is Maiduguri a town in Borno State? ', 'what  is the capital of Borno State?. ', '', 'C', '\0\0\0\0', 8),
(662, '1.	A rectangular picture 6cm by 8cm is enclosed by a frame 1/2cm wide. Calculate the area of the frame.', ' 15sqcm ', '20sqcm', '13sqcm', '16sq cm. ', '', 'A', NULL, 16),
(663, 'The sum of 3  7/8   and 1  1/3 is less than the difference between3/8 and 1  1/3 by', ' 5  2/3  ', '5  1/4', '1  1/2  ', '8 1/8  ', 'None ', 'E', NULL, 16),
(664, 'Multiply (x +3y + 2) by (2x^2 + 5y + 2) ', '2x^2 + 3y + 3yx^2 + 5y^2 + 13y + 10x^2 +2x+10', ' 2x^3 +6yx^2 +5xy + 5y^2 + 31y +10x^2 + 2x +10', ' 2x^3 + 3yx^2 +5xy + 10y^2 +13y +5x^2 +2x +10', '2x^3 +6xy^2 + 5xy + 15y^2 + 13y + 10x^2 + 2x + 10', ' 2x^3 + 2yx^3 + 10xy +10y^2 + 31y + 5x^2 +10. ', 'B', NULL, 16),
(665, 'In the figure, DE/BC: DB//FE: DE = 2cm, FC = 3cm,  AE =4cm. Determined the length of EC ', '4cm', '6cm', '3cm', '3cm', '1cm', 'B', NULL, 16),
(666, 'In the figure, AB is parallel to CD then x + y + z =', '195', '200', '180', '270', '360', 'E', NULL, 16),
(667, 'Arrange and  3/5  ,  9/16,   34/59 and 71/97 in ascending order of magnitude ', ' 3/5  ,  9/16,   34/59, 71/97', ' 9/16, 3/5  ,  71/97 ,   34/59 ', '  9/16,    34/59,3/5  ,  71/97 ', '  34/59 ,  71/97, 3/5, 9/16', ' 3/5   9/16, ,  71/97 ,   34/59', 'C', NULL, 16),
(668, 'The sum of the progression is 1 + x +x^2+ x^3+...… =', ' 1/(1-X) ', '1/(1+X)', '1/(X-1)', '1/X ', 'none of these ', 'A', NULL, 16),
(669, 'The number of telephone calls N between two cities A and B varies directly as the population PA, PB in A and B respectively and inversely as the square of distance D between A and b. which of the following equations represents this relation?', 'N=kpA  + CPB  ', 'N = kpA PB', ' N = KDPAPB', ' N = KDPA + CDPB', 'N=KD2APB ', 'B', NULL, 16),
(670, 'Find the square root of 170 – 20 (30)^1/2', ' 2(10)^1/2 - 5(3) ^1/2    ', ' 3(5)^1/2 - 8(6 )^1/2', ' 2(5)^1/2 - 5(6 )^1/2 ', ' 5(5)^1/2  - 2(6)^1/2 ', ' 5(10) ^1/2 - 5(2 )^1/2', 'E', NULL, 16),
(671, 'If x^2 + 4 = 0, then x = ', '4', '-4', '2', '-2', 'None', 'E', NULL, 16),
(672, 'In figure FD// AC, the area of AEF = 6sq. cm, AE = 3cm, BC =3cm. CD = 5cm < BCD is an obtuse angle. Find the length of BD.  ', '(33)^1/2', '6', '4', '2(13 )^1/2', ' 4 (5)^1/2 ', 'D', NULL, 16),
(673, 'What is the number whose logarithm to base 10 is 2.3482?', '223.6', '2228', '2.235 ', '22.37', '0.02229  ', 'E', NULL, 16),
(674, 'Five years ago, a father was 3 times as old as his son, now, their combined ages amount to 110 years. Thus, the present age of the father is ', '75years', '60years', '98years', '81years', 'None of these', 'E', NULL, 16),
(675, 'If y =2x^2 + 9x-35. Find the range of value for which y <0. ', '-7<x<5/2 ', '-7</= x<5', ' -5</=x<7  ', ' -7/2<x</=5', 'none of the above', 'A', NULL, 16),
(676, 'Father reduced the quantity of food bought for the family by 10% when he found that the cost of living had increased by 15%. Thus the factional increase in the family food bill is now in now ', ' 1/12 ', ' 6/35 ', ' 19/300  ', ' 7/200', ' 5/100', 'D', NULL, 16),
(677, 'Given that a*b =ab + a + b and that a 0b = a+b+1. Find an expression (not involving *or 0) for (a*b) 0(a*c) If a,b,c are real numbers and the operation on the right are ordinary addition and multiplication of numbers', ' ac+ ab + bc +b+ c +1 ', ' a c+ ab + a + c+2 ', 'ab + ac + a + b + 1', ' ac + bc + ab + a + c +2 ', ' ab + ac + b +c+1.	', 'E', NULL, 16),
(678, 'If a circular paper disc is trimmed in such a way that its circumference is reduced in the ratio 2:5, in what ration is the surface reduced? ', '8:125  ', '2:5', '8:25', ' 4:25', ' 4:10', 'D', NULL, 16),
(679, 'If the four interior angles of a quadrilateral are (P+ 10), (P -30), (2P - 45), and (P + 15), then P is', '125		', '82', '135', '105', '60', 'B', NULL, 16),
(680, 'Simplify a – b – a +b. ', '4ab', '2ab', '4ab', '4ab', '2ab', 'C', NULL, 16),
(681, 'In the figure, 0 is the centre of the circle ABC, <CED = 30, <EDA = 40. What is the size of <ABC?  ', '70', '110', '130  									', '125', '145', 'D', NULL, 16),
(682, 'A force of 5 units acts on particle in the direction to the east and another force of 4 units acts on the particle in the direction north-east. The resultant on the two forces is ', '(3)^1/2 Units ', '3 units ', '(41+20(3)^1/2)^1/2  units ', '(41 (2+20) ^1/2)^1/2 units', '', 'C', NULL, 16),
(683, 'The minimum point on the curve y = x^2 - 6x + 5 is at ', ' (1, 5)', ' (2,3)', '(-3,-4) ', '(-3,4) ', ' (3,-4)', 'E', NULL, 16),
(684, 'If 3x-(1/4)^(-1/2) > ¼-x, then the interval of values of x is ', ' x>1/3', ' x<1/3', ' x<1/4', ' x<9/16 ', ' x>9/16', 'B', NULL, 16),
(685, 'A canal has rectangular cross section of width 10 cm and breadth 1m. If water of uniform density 1 g/ cm^3 flows through it at a constant speed of 1000mm per minute, the adjacent sea is', '100000', '1000000', '120000', '30000', '350000', 'A', NULL, 16),
(686, 'A man runs a distance of 9km/h at a constant speed for the distance. The whole run takes him one hour. His average speed for the first 4km is', ' 6km/h', '8km/h ', ' 9km/h', ' 11km/h', '13km/h. ', 'B', NULL, 16),
(687, 'A pyramid is constructed on a cuboid. The figure has ', 'Twelve faces ', ' Thirteen vertical ', ' Fourteen edges', 'Fifteen edges ', ' Sixteen edges.', 'E', NULL, 16),
(688, 'In a geometric progression, the first is 153 and the sixth term is 17/27. The sum of the first four terms is\n', ' 860/3 ', '680/3', ' 608/3 ', ' 806/3 ', '680/27. ', 'B', NULL, 16),
(689, 'An arithmetic progression has first term 11 and fouth term 32. The sum of the first nine terms is', '351', '531', '135', '315', '153', 'A', NULL, 16),
(690, 'A triangle has angles 30, 15, and 135 degree. The side opposite to the angle 30 is length 6cm. the side opposite to the angle 135 is equal to ', ' 12cm ', '6cm ', '6(2)^1/2cm ', ' 12 (2)^1/2cm ', ' 6(3)^1/2cm ', 'C', NULL, 16),
(691, 'A regular hexagon is constructed inside a circle of diameter 12cm. The area of the hexagon is ', '36 pi ', ' 36/pi', '54(3)^1/2 sq cm', '54/(3)^1/2 sq  cm ', ' 54(3)^1/2 sq cm', 'C', NULL, 16),
(692, 'In a soccer competition in one season, a club had scored the following goal: 2,0,3,3,2,1,4,0,0,5,1,0, 2,1,3,1,4,1, and 1. The mean, median and mode are respectively  ', ' 1,1.8 and 1.5 ', ' 1.8,1.5 and 1', ' 1.8, 1 and 1.5', ' 1.5,1.8 and 1.', '', 'B', NULL, 16),
(693, 'If sec^(2) ? + tan^(2) ?= 3, then the angle ? is equal to ', '30', '45', '60', '90', '105', 'B', NULL, 16),
(694, 'A hollow right prism of equilateral triangle base of side 4cm is filled with water up to a certain height. If a sphere or radius ½cm is immersed in the water, then the rise of water is', '1cm', '  (3pi/24)^1/2', '  54/(3)^1/2 sq cm', '54(3)^1/2 sq cm', '', 'C', NULL, 16),
(695, 'The set of value of x and y which saties the equations X^2 – y – 1 = 0 and y –2x +2 = 0 is', '1,0', '1,1', '2,2', '1,2', '', 'A', NULL, 16),
(696, ' A solid sphere of radius 3cm, a solid right cone of radius 3cm and height 12cm and a solid right circular cycular of radius 3cm and height 4cm. Which of the following statements is true? ', 'That volume of the sphere is greater than the volume of the cone ', ' The volume of the cone is less than the volume of the cylinder. ', 'The total surface area of the cone is greater than that of sphere ', 'The total surface area of the cylinder is less than than of the sphere', ' The total surface area of the cone is equal to that of the cylinder', 'D', NULL, 16),
(697, 'The quality (x + y) is a factor of', ' x^2 +y^2 ', 'x^3 – y^3', '2x^2 – 3xy + 1 ', ' 2x^3 + 2x^(2)y – xy +3x –y^2+3y ', ' x^5 – y^5', 'C', NULL, 16),
(698, 'Two traingles have the same areas if ', 'two sides in one tringle are equal to two sides in the other ', ' three sides in one triangle are equal to three side into other  ', ' two angles is the triangle are equal sides in the other', 'three angles in one triangle are equal to three angles in the other', 'one side and the opposite angle in one triangle are equal to one side and opposite angles in the other. ', 'D', NULL, 16),
(699, 'If (25)^(x-1)= 64 (5/2)^6, then x has the value ', '7', '4', '32', '64', '5', 'A', NULL, 16),
(700, 'Assuming log, 4.4 = 1.4816 and log, 7.7 = 2.0142, then the value of log, 7/4 is ', ' 0.5326 ', ' 3.4958', 'O.4816 ', ' 0.0142 ', '1.3594. ', 'A', NULL, 16),
(701, 'The locus of all points having a distance of 1 unit from each of the two fixed points a and b is:', 'a line parallel to the line ab ', 'a line perpendicular to the line ab through the mid-point of ab', ' a circle through a and b with center at the mid-point of ab ', ' a circle with centre at a and passes through b ', 'a circle in a plane perpendicular to ab and centre at the mid-point of the line ab.', 'B', NULL, 16),
(702, 'Without using tables, simplify (ln(216)^1/2- ln (125)^1/2- ln (8)^1/2)/(2(1n 3-1n5))', '-3', '3', '3/4', '-3/2', 'ln 6 – 2 ln5', 'C', NULL, 16),
(703, 'Simplify ((a-(1/a))+(a 4/3+(1/a)))/(a^2-(1/a^2) ) ', ' a^(2/3)  ', ' a^(-1/3) ', ' a^(2 + 1) ', ' a ', 'a^1/3', 'E', NULL, 16),
(704, 'If x^4-kx^3+lx-3 is divisible by (x-1), and if when it is divided by (x + 2) the remainder is 27, find the constants k and l', 'k = -7, l = -15, ', ' k = -15, l= -7  ', ' k=-21/5, l = -21/5 ', 'k = -5/4, l= 19/3 ', ' k = 5/3, l = -19/3', 'A', NULL, 16),
(705, 'Evaluate without using tables sin (-1290degree) ', '3/2', '-3/2', '2/2', '1', '1/2', 'E', NULL, 16),
(706, 'The angle of elevation of the top of a vertical tower from a point A on the ground is 60degree. From a point B, 2 units of distance future away from the foot of the tower, the angle of election of the top of the tower is 45degree. Find the distance of A from the foot of the tower.  ', '3+ (3 )^1/2	', ' 5+ (3)^1/2   ', '3 - (3)^1/2 ', '1 + (3) ^1/2    ', ' (3)^1/2 – 1', 'D', NULL, 16),
(707, 'The vectors a and b are given in terms of two perpendicular unit vectors i and j on a plane by a = 2i -3j, b = -i +2j. Find the magnitude of the vector a + 3b', '2', '4', '13 +35', '22', '10', 'B', NULL, 16),
(708, 'In the figure,   ABC are in adjacent planes. AB = AC = 5cm, BC =6cm and <ADE = 60degree then AE is equal to  ', '3(2)^1/2 ', '2(3)^1/2 ', '(3^1/2)/2 ', '2/(3 )^1/2', '3/(2 )^1/2 ', 'D', NULL, 16),
(709, 'Add the same number to the numerator and denomination of 3/18. If the resulting fraction ½, then, the number added is ', '13', '14', '15', '11', '', 'D', NULL, 16),
(710, 'The smallest number such that when it is divided by 3 has a remainder of 6 and when it is divided by 9, has a remainder of 7 is ', '387', '493', '502', '441', '634', 'B', NULL, 16),
(711, 'Simplify (3  1/3  - 1  1/4)   x  (2/3 + 1  2/5)', '2', '3', '4', '4', '', 'B', NULL, 16),
(712, 'If 2257 is the result of subtracting 4477 from 7056 in base n, find n. ', '8  17/30', ' 9  9/10 ', ' 10  1/10', '11  11/36', '', 'A', NULL, 16),
(713, 'Find correct to 3 decimal places \n(1/0.05) ÷ (1/5.005) ^ (0.05 x 2.05)\n	\n', '99.998', '98.999', ' 89.899 ', ' 9.998', '', 'C', NULL, 16),
(714, 'Express 63÷3 as a decimal correct to 3 significant figure: ', '20.6', '20.667', '20.67', '20.7', '', 'D', NULL, 16),
(715, 'Factory P production 20 000 bags of cement per day while factor Q produce 15 000 bags per day. If P reduces production by 15% and Q increases production by 5% determine the effective loss in the number of bags produced per day by the two factories', '250', '750', '1000', '1250', '', 'E', NULL, 16),
(716, 'Musa borrows N 10.00 at 2% per month simple interest and repays N8.00 after 4 mouths. How many ', 'N/A', 'N/A', 'N/A', 'N/A', '', 'C', NULL, 16),
(717, 'If 3 gallons of spirit containing 20% water are added to 5 gallons of another spirit containing 155 water, what percentage of the mixture is water? ', ' 2  4/5%', '16  7/8% 	  ', '18  1/8%', '18  7/7%    ', '', 'D', NULL, 16),
(718, 'What is the product of( 27/5^1)  (3)^-1 and (  1/3  )^-1? ', '5', '3', '1', '1/25', '', 'C', NULL, 16),
(719, 'Simplify 2log 2/5 log 72/125  + log 9   ', '1 – 4 log 3   ', ' -1 +log3 ', ' -1+5 log 2', '1 -2log2   ', '', 'D', NULL, 16),
(720, 'Rationalize (2 (3 )^1/2 + 3(2)^1/2)/ ( 3(2)^1/2 - 2(3)^1/2 ) 	', ' 5- 2(6)^1/2  ', '5+2(6)^1/2', '  5(2)^1/2', '5', '', 'B', NULL, 16),
(721, 'Simplify 1/(3+(5)^1/2)   1/(3-(5)^1/2)      ', '-  1/2  (5 )^1/2', '1/2  (5)^1/2', ' - 1/4  (5)^1/2  ', '0', '', 'A', NULL, 16),
(722, 'Multiply (x^2- 3x + 1) by (x –a) ', ' x^3 –(3+a) x^2+ (1+ 3a) x-a ', ' x^3 - (3-a) x^2 + 3ax –a', ' x^3-(a-3) x^2 –(1+3a)-a ', ' x^3+ (3-a) x^2 + (1+3a) –a', '', 'A', NULL, 16),
(723, 'Evaluate (x^2- x^2 y)/(x^2- xy^1 ) When x = -2 and y = 3    ', '3', '-3/5', '3/5', '3', '', 'A', NULL, 16),
(724, 'A car travels from Calabar to Enugu, a distance of Pkm with an average speed of ukm per hour and continues to Benin, a distance qkm, with an average speed of wkm per hour. Find its average speed from Calabar to Benin. ', '(p+q )/(up+wp) ', ' u +w 	', '(uw (p+q))/(wp+uq)', ' (wp+uq)/(up+wp) ', '', 'C', NULL, 16),
(725, 'If w varies as (ur )/(u + r) and is equal to 8 when u = 2 and r=6, find a relationship between u, r, w.  ', ' urw =16 (u+r) ', '16ur = 3w (u + r)', 'urw= 12(u+r)', '12urw+u+r', '', 'C', NULL, 16),
(726, 'If g(x) = x^2 - 3x + 4, find g(x + 1) – g(x) 	', '(x+2) ', ' 2(x +2)  	', ' (2x+1)', ' (x^2 + 4)', '', 'B', NULL, 16),
(727, 'Factorize m^3 – 2m^2 – m + 2 ', ' (m^2 + 1) (m^2 + 1) (m -2) ', ' (m+1) (m+1) (m+1)', ' (m-2) (m+1 (m-1)', '(m^2+2) (m-1)', '', 'C', NULL, 16),
(728, 'Factorize 1 – (a-b)2 ', '(1 –a – b) (1 – a + b) ', ' (1–a + b) (1+a-b) ', '(1-a-b) (1- a + b)  ', '(1 – a – b) (1 + a – b).', '', 'B', NULL, 16),
(729, 'Which of the following is a factor of rs + tr – pt – ps?', ' (p – s) ', ' (s – p) ', ' (r – p) ', ' (r + p) ', '', 'C', NULL, 16),
(730, 'Find the two value of y which satisfy the simultaneous equation 3x + y = 8  and  x^2+ xy = 6 ', '-1 and 5', '-5 and 1', '1 and 5', '1 and 1', '', 'A', NULL, 16),
(731, 'Find the range of values of x which satisfy the inequality (x /2)+(x/3) + (x < 1/4  )', ' x < 12/13 ', ' x<13 ', ' x < 9', ' 13/12', '', 'A', NULL, 16),
(732, 'Find the positive number n, such that thrice its square is equal to twelve times number ', '1', '2', '3', '4', '', 'D', NULL, 16),
(733, 'Solve the equation (x – 2) (x – 3) = 12 ', '2, 3', '3, 6', '-1, 6', '1, 6', '', 'C', NULL, 16),
(734, 'Simplify(  (1 +x )^1/2 + (x)^1/2 )/( (1+ x)^1/2 - (x)^1/2 )', '–2x – 2 (x (1+x))^1/2', '1+ 2x +2', '(x (1+x)) ^1/2', ' 1 + 2x – 2(x (1+x)) ^1/2', '', 'B', NULL, 16),
(735, 'Evaluate x^2(x2 - 1) ^½ - (x^2 – 1)^ ½', '(x^2 - 1)^½   ', ' (x^2-1) ', ' (x^2 -1)^–½ ', '(x^2 - 1)^–½', '', 'D', NULL, 16),
(736, 'Find the gradient of the line passing through the points (-2,0) and (0, -4)', '2', '-4', '-2', '1', '', 'C', NULL, 16),
(737, 'At what value of x is the function y – x^2 -2x – 3 minimum? ', '1', '-1', '-4', '4', '', 'A', NULL, 16),
(738, 'What is the nth term of the progression 27, 9, 3 ….?   ', ' 2 (1/3)^(n-1)', ' 3^(n+2)', ' 27 + 18 (n-1)', '27 + 6 (n-1).', '', 'A', NULL, 16),
(739, 'Find the sum of the 20 term of the progression whose first term is 7 and last term is 117 ', '2480', '1240', '620', '124', '', 'B', NULL, 16),
(740, 'In the figure above, find the value of x. ', '110', '110', '100', '90', '', 'A', NULL, 16),
(741, 'No question No  ------------------------------------------------------------------------------------', 'N/A', 'N/A', 'N/A', 'N/A', '', 'B', NULL, 16),
(742, 'The area of a square is 144 sq m. find the length of its diagonal    ', '11(3)^1/2 cm ', '12cm', '12(2 )^1/2 cm', '13cm', '', 'C', NULL, 16),
(743, 'One angle of a rhombus is 60. The shorter of the two diagonals is 8cm long. Find the length of the longer one.    ', '8(3 )^1/2  ', 'B. 16/(3)^1/2 ', 'C. 5(3 )^1/2 ', ' 10/(3) ^1/2 ', '', 'A', NULL, 16),
(744, 'If the exterior angles of a pentagon are x, (x + 5), (x+10), (X+15) and (x+20), find x ', '118', '72', '62', '36', '', 'C', NULL, 16),
(745, 'Use the figure below to answer questions 35 and 36 PMN and PQR are two secants of the circle MQTRN and Pt is a tangent\n If PM =5cm, PN = 12cm and PQ = 4.8cm, calculate the respective lengths of PR and PT in centimeters \n', ' 7.3, 5.9 ', '7.7, 12.5', ' 12.5, 7.7', '5.9, 7.3 ', '', 'C', NULL, 16),
(746, 'Use the figure below to answer questions 35 and 36 PMN and PQR are two secants of the circle MQTRN and Pt is a tangent\nIf PNR = 1100 and PMQ = 550, find MPQ A. ', '40', '30', '25', '15', '', 'D', NULL, 16),
(747, 'In the figure above, find the value of y', '28', '122', '150', '152', '', 'B', NULL, 16),
(748, 'In this figure, PQ = PR = Ps and SRT = 68. Find QPS', '136', '124', '112', '68', '', 'A', NULL, 16),
(749, 'A flagstaff stands on the top a vertical tower. A man standing 60m away from the tower observes that the angles of election of the top and bottom of the flagstaff are 64 and 62 respectively. Find the length of the flagstaff. ', ' 60 (tan 620 – tan 640)', ' (cot 64- cot 62) ', ' 60(cot 62–cot 64) ', '60(tan 64– tan 62)', '', 'D', NULL, 16),
(750, 'Simplify cos^2 x (sec^2 x +sec^2 x tan^2 x)', ' Tan x ', 'Tan x sec x', ' Sec^2 x ', ' Cosec^2 x.', '', 'C', NULL, 16),
(751, 'If cos x ( a /b)^1/2   find coses x.', 'b/(b-a)^1/2 ', '(b/a)^1/2 ', '(b/b-a)^1/2 ', '(b-a/a)^1/2 ', '', 'C', NULL, 16),
(752, 'From a point Z, 60 m north of X, a man walks 60 (3)^1/2 m eastwards to another point Y. find the bearing of Y from X', '030', '045', '060', '090', '', 'C', NULL, 16),
(753, 'No question . No question . Noquestion', 'N/A', 'N/A', 'N/A', 'N/A', '', 'A', NULL, 16),
(754, 'In the figure, PQRS is a square of side 8cm. What is the area of  UVW? ', '64sq cm ', '40sq cm  ', '50 sq cm', ' 10sq cm ', '', 'D', NULL, 16),
(755, '  Find the total area of the surface of a solid cylinder whose base radius is 4cm and height is 5cm  ', '56pi  sqcm', ' 72pi sqcm ', ' 96pi  sqcm ', '192pi  sqcm', '', 'B', NULL, 16),
(756, 'Find the volume of the figure              \n  \n', '( a^pi (x+3y))/3 ', 'a pi^(2)y ', '( a^pi (y + x))/3            ', ' 1/3 api^(2) xy', '', 'A', NULL, 16),
(757, '35 of a family’s income is spent on electricity , 59% on food, 20% on transport, 11% on education and 7% on extended family. The angles subtended at the centre of the pie chart under education and food are respectively ', '76.8 and 25.2', ' 10.8 and 224 ', '122 and 212.4. ', 'N/A', '', 'D', NULL, 16),
(758, 'Use the following information to answer questions 48 and 49. Fifty boxes each of 50 bolts were inspected for the numbers which were defective. The following was the result. \nNo. defective per box.	4	5	6	7	8	9\n\n\nNo. of boxes 		2	7	17	10	8	6\nThe mean and the median of the distribution are respectively \n', ' 6.7,6 ', '6.7,6.5 ', ' 6,6.7 ', ' 6.5, 6.7 ', '', 'A', NULL, 16),
(759, 'Use the following information to answer questions 48 and 49. Fifty boxes each of 50 bolts were inspected for the numbers which were defective. The following was the result\nNo. defective per box.	4	5	6	7	8	9\n\nNo. of boxes        	2	7	17	10	8	6\n	\nFind the percentage of boxes containing at least 5 defective bolts each ', '98', '84', '92', '90', '', 'A', NULL, 16),
(760, 'A create of soft drinks contains 10 bottles of Cocacola, 8 of Fanta and 6 of Sprite. If one bottle is selected at random, what is the probability that it is NOT a Cocacola bottle? ', '5/12', '1/3', '3/4', '7/12', '', 'D', NULL, 16),
(761, 'Calculate 3310 base5 - 1442 base5  ', '1313 base 5', '2131 base 5', '4302 base 5', '1103 base 5', '', 'A', NULL, 16),
(762, 'Convert 3.145926 to 5 decimal places. ', '3.14160 ', '3.14159 ', ' 0.31415 ', '3.14200 ', '', 'B', NULL, 16),
(763, 'The length of a notebook 15cm was measured as figures. ', '12.00% ', '11.00%', ' 10.71% ', '12% ', '', 'A', NULL, 16),
(764, 'A worker’s present salary is N24 000 per annum. His annual increment is 10% of his basic salary. What would be his annual salary at the beginning of the third year? ', '28800', '29040', '31200', '31944', '', 'B', NULL, 16),
(765, 'Express the product of 0.0014 and 0.011 in standard form ', '1.54 X 10^-2', ' 1.54 X 10^-3 ', '1.54 X 10^-3', ' 1.54 X 10^-3 ', '', 'D', NULL, 16),
(766, 'Evaluate (18^(3/4  )- (27)^(1/3))/(3 x 2 ^3 ) ', '27', '1', '1/3', '1/8', '', 'B', NULL, 16),
(767, ' the value of (16)^3 + log( base 10)0.0001 + log (base 2) 32 ', '0.065', '0.650', '6.500', '65.00', '', 'D', NULL, 16),
(768, 'Simplify( (12)^1/2 -(3)^1/2)/((12)^1/2 +(3)^1/2)', '1/3', '0', '16', '3', '', 'A', NULL, 16),
(769, 'Four members of a school first eleven cricket team are also members of the first fourteen rugby team. How many boys play for at least one of the two teams? ', '25', '21', '16', '3', '', 'B', NULL, 16),
(770, 'If S = (x:x^2 = 9, x>4), then S is equal to ', '0', '{0}', '*', '{*}', '', 'C', NULL, 16),
(771, 'If x – 1 and x+1 are both factors of the equation x^3+ px^2 + qx + 6 = 0, evaluate  p and q', '-6,-1', '6,1', '1,-1', '6,-6', '', 'A', NULL, 16),
(772, 'Find a positive value of p if the expression 2x^2 – px + p leaves a remainder 6 when divided by x- p', '1', '2', '3', '4', '', 'B', NULL, 16),
(773, 'Find T in terms of k, Q and S if S = 2r (piQT + K)     ', '(S^2/(2pir^2 Q)) - ( K/Q) ', '(S^2/(2pir^2 Q))-(K )', '(S^2/(4pir^2 Q)) -  (K/Q)', ' S^2/(4pir^2 Q) ', '', 'B', NULL, 16),
(774, 'The graph of f(x) = x^2 – 5x + 6 crosses the x-axis at the point ', '(-6, 0) (-1, 0)', '(-3, 0) (-2, 0)', '(-6, 0) (1, 0)', '(2, 0) (3, 0)', '', 'D', NULL, 16),
(775, 'Factorize completely the expression abx^2 + 6y–3ax – 2byx ', '(ax – 2y) (bx – 3)', '(bx+3) (2y – ax)', '(bx + 3) (ax -2y)', '(ax – 2y)', '', 'A', NULL, 16),
(776, 'Solve the following inequality (x – 3) (x – 4) </= 0 ', ' 3</= x </= 4', ' 3< x < 4 ', ' 3</= x < 4 ', ' 3 < x </=4', '', 'A', NULL, 16),
(777, 'The 4th term of an A.P is 12 while the 10th term is 31. Find the 21st term', '175', '85', '64 ', '45', '', 'C', NULL, 16),
(778, 'Simplify (x^2- 1 )/(x^2+ 2x^2- x-2 )  ', '1/(x-1)', '(x- 1)/(x+1) ', '(x-1)/(x + 2)', '1/(x-2) ', '', 'A', NULL, 16),
(779, 'Express (5x-12)/((x-2)(x-3)) in partial fractions  	 ', '( 2/(x-2))-(3/(x-3))', '(2/(x-2))+ ( 3/(x-3))', '(2/(x-3)) - (3/(x-2))', ' ( 5/(x-3))+ (4/(x + 2))', '', 'B', NULL, 16),
(780, 'Use the graph of the curve y – f(x) to solve the inequality f(x) >/= 0 ', '-1</= x </=1, x</=2', 'x>/= -1, 1 </= x</=2 ', 'x</=-1, 1</=x  </= 2', ' x</=2, -1 </=x</=1', '', 'B', NULL, 16);
INSERT INTO `quiz_questions` (`id`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Option_E`, `Answer`, `Diagram`, `sub_id`) VALUES
(781, 'Which of the following binary operations is cumulative in the set of integers?', 'a*b = a = 2b', 'a*b = a + b – ab ', 'a*b = a2 + b', ' a*b =  (a (b+1))/2', '', 'C', NULL, 16),
(782, 'If a*b = +(ab)^1/2, evaluate 2* (12*27) ', '12', '9', '6', '2', '', 'C', NULL, 16),
(783, 'Find the sum to infinity of the following sequence 1,9/10, (9/10 )^2, (9/10 )^3  ', '1/10', '9/10', '10/9', '10', '', 'D', NULL, 16),
(784, 'Find the value of k if	\n\n-2       1        1\n  2       1        k           = 23\n  1       3      -1\n', '1', '2', '3', '4', '', 'B', NULL, 16),
(785, 'If X =  1      2   and Y =  2      1    \n             0      3                     4      3', '10       7\n12        9', '2      7\n4      17', '10     4\n4        6', '4         3\n10       9', '', 'A', NULL, 16),
(786, 'Determine the value of x in the figure A', '134', '81', '53', '46', '', 'D', NULL, 16),
(787, 'PT is a tangent to the circle TYZX. YT and <PTX = 50. Calculate <TZY', '50', '65', '85', '13', '', 'B', NULL, 16),
(788, 'In a triangle XYZ, <YXZ = 44 and <XYZ = 112. Calculate the acute angle between the internal bisectors of <XZY ', '12', '56', '68', '78', '', 'B', NULL, 16),
(789, 'Find the distance two towns P (45N, 30W) and Q (15S, 30W) if the radius of the earth is 7 000 km.  [pi = 22/7]', '  1100/3km  ', '  2200/3km', '22 000/3km  ', '1100/3km', '', 'C', NULL, 16),
(790, 'Two perpendicular lines PQ and QR intersect at (1, -1). If the equation of PQ is x-2y +4 =0, find the equation of QR. ', 'x + 2y – 1 = 0', '2x + y – 3 = 0', 'x – 2y – 3 = 0', '2x + y – 1 = 0 ', '', 'D', NULL, 16),
(791, 'P is on the locus of points equidistant from two given point X and Y. UV is a straight line through Y parallel to the locus. If <PYU is 40, find <XPY ', '100', '80', '50', '40', '', 'B', NULL, 16),
(792, 'In the diagram k, m and n are parallel line. What is the value of the angle marked x? ', '37', '63', '117', '153', '', 'B', NULL, 16),
(793, 'In the diagram, the base diameter is 14cm while the height is 12cm. calculate the total surface area if the cylinder has both a base and a top. [ pi= 22/7] ', '836 sq  cm', '528 sq  cm', '308  sq  cm', '156 sq  cm', '', 'A', NULL, 16),
(794, 'In a diagram, find PQ if the area of triangle PQR is 35 sq cm ', '7', '10', '14', '17', '', 'A', NULL, 16),
(795, 'A school boy lying on the ground 30m away from foot of a water tank tower observes that the angle of elevation of the top of the tank is 60. Calculate the height of the water tank. ', '60m', ' 30(3 )^1/2 m', '20 (3 )^1/2 m', ' 10 (3 )^1/2 m', '', 'B', NULL, 16),
(796, 'QRS is a triangle with QS = 12cm <RQS = 30 and <QRS = 45. Calculate the length of RS. A. 18?(2 ) m B. 12?2 m C. 6?(2 ) D. 10 ?(3 ) m', '18(2 )^1/2m', '12(2 )^1/2m', ' 6(2 )^1/2 ', '10 (3 )^1/2 m', '', 'C', NULL, 16),
(797, 'Which of the following is a sketch of y = 3sin x?', 'N/A', 'N/A', 'N/A', 'N/A', '', 'B', NULL, 16),
(798, 'The derivative of cosec x is ', ' tan x cosec x', '–cot x sec x', 'tan x sec x', '–cot x sec x ', '', 'B', NULL, 16),
(799, 'For what value of x is the tangent to the curve y = x^2 -4x +3 parallel to the x-axis? ', '3', '2', '1', '0', '', 'B', NULL, 16),
(800, 'Two variable x and y are such the dy/dx = 4x – 3 and y = 5 when x – 2. Find y in terms of x = 2. Find y in term of x.', ' 2x^2 – 3x + 5', '3x + 3', ' 2x^2 – 3x', '4', '', 'B', NULL, 16),
(801, 'Find the area bounded by the curve y = 3x^2 – 2x + 1, the ordinates x = 1 and x = 3 and the a-axis.', '24', '22', '21', '20', '', 'B', NULL, 16),
(802, '\nAge in years 		13	14	15	16	17\nNo. of students 	3	10	30	42	15\nThe frequency distribution above shows the ages of students in a secondary school. In a pie chart constructed to represent the data, the angle corresponding to the 15 year-old is ', '27', '30', '54', '108', '', 'C', NULL, 16),
(803, 'The pie chart shows the distribution of students in a secondary school class if 30 students offered French. How many offered C.R.K? ', '25', '15', '10', '8', '', 'C', NULL, 16),
(804, 'The mean and the range of the set of numbers 1, 20, 1.00, 0.90, 1.40, 0.80, 1.20 and 1.10 are me and r respectively. Find m + r', '1.11', '1.65', '1.85', '2.45', '', 'B', NULL, 16),
(805, '\nClass 	  1-3	  4-6	  7-9\nFrequency    	5	8	  5\nFind the standard deviation of the data using the table above ', '5', '6^1/2', '5/3', '5^1/2', '', 'B', NULL, 16),
(806, 'The variance of the scores 1, 2, 3, 4, 5, is ', '1,2', '1,4', '2.0', '3.0', '', 'C', NULL, 16),
(807, '\nClass Interval	Frequency	Class Boundaries	Class\n 				Mid-Point\n1.5 – 1.9	2	1.15 – 1.95	 	1.7\n2.0 – 2.4	21	1.95 – 2.45		2.2\n2.5 – 2.9	4	2.45 – 2.95		2.7\n3.0 – 2.9	15	2.95 – 3.45		3.2\n3.5 – 3.9	10	3.45 – 3.95		3.7\n4.0 – 4.4	5	3.95 – 4.45		4.2\n4.5 – 4.9	3	4.45 – 4.95            	4.7\nFind the mode of the distribution', '3.2', '3.4', '3.7', '4.2', 'None ', 'E', NULL, 16),
(808, '\nClass Interval	Frequency	Class Boundaries	Class\n				Mid-Point\n1.5 – 1.9	2	1.15 – 1.95		1.7\n2.0 – 2.4	21	1.95 – 2.45		2.2\n2.5 – 2.9	4	2.45 – 2.95		2.7\n3.0 – 2.9	15	2.95 – 3.45		3.2\n3.5 – 3.9	10	3.45 – 3.95		3.7\n4.0 – 4.4	5	3.95 – 4.45		4.2\n4.5 – 4.9	3	4.45 – 4.95		4.7\nThe median of the distribution is \n', '4.0', '3.5', '3.2', '3.0', 'None', 'E', NULL, 16),
(809, 'Let P be probability function on set S, where S = (a1, a2, a3, a4). Find P (a1) if P (a2) =1/3, P (a3) = 1/6 and P (a4)=1/3', '7/3', '2/3', '1/3', '3/10', '', 'D', NULL, 16),
(810, 'A die has four of its faces coloured white and the remaining two coloured black. What is the probability that when the die is thrown two consecutive time the top face will be white in both cases?', '2/3', '1/9', '4/9', '1/36', '', 'C', NULL, 16),
(811, ' Which Question Paper Type of Mathematics is given to you? ', ' Type A', 'Type B', ' Type C ', 'Type D.', '', 'D', NULL, 16),
(812, 'If 2q3 base5 = 77base8, find q', '2', '1', '4', '0', '', 'A', NULL, 16),
(813, 'Simplify (3  2/3  x 5/6   x 2/3)/(11/15  x 3/4  x 2/27)  ', '5  2/3', '30', '4  1/3', '50', '', 'D', NULL, 16),
(814, 'A man invested N5,000 for 9 months at 4%. What is the simple interest? ', 'N150', 'N220', 'N130', 'N250', '', 'A', NULL, 16),
(815, 'If the numbers M,N,Q are in the ration 5:4:3, find the value of (2N-Q )/M', '2', '3', '1', '4', '', 'A', NULL, 16),
(816, 'Simplify (16/81)^(1/4) + (9/16)- (1/2)', '2/3', '1/2', '8/9', '1/3', '', 'B', NULL, 16),
(817, 'If log base3(18) – log base3(x) = 3, find x', '1', '2', '0', '3', '', 'B', NULL, 16),
(818, 'Rationalize(2- ( 5) ^1/2 )/(3-(5)^1/2)', '  (1- ( 5)^1/2  )/2  ', ' (1- ( 5)^1/2 )/4 ', '(( 5)^1/2- 1)/2', '  (1- ( 5)^1/2  )/4', '', 'B', NULL, 16),
(819, 'Simplify ((2)^1/2+ 1/(3)^1/2) ((2)^1/2- 1/(3)^1/2)  ', '7/3', '5/3', '3/2', 'N/A', '', 'B', NULL, 16),
(820, 'From the Venn diagram above, the complement of the set P n Q^i is given by ', '{a,b,d,e} ', '{b, d}', '{a,e}', '{c}', '', 'C', NULL, 16),
(821, 'Raila has 7 different posters to be hanged in her bedroom, living room and kitchen. Assuming she has plans to place at least a poster in each of the 3 rooms how many choices does she have? ', '49', '170', '21', '210', '', 'D', NULL, 16),
(822, 'Make R the subject of the formula if T = (KR^2+ M)/3     \n \n', '((3T-K)/M) ^1/2 ', '((3T+M)/K)^1/2', '((3T-M)/K)^1/2', '((3T-M)/K)^1/2', '', 'D', NULL, 16),
(823, 'Find the reminder when x^3 – 2x^2 + 3x – 3 is divided by x^2+1.                               ', ' 2x – 1', ' x+3', ' 2x+ 1', ' x – 3', '', 'A', NULL, 16),
(824, 'Factorize completely 9y^2 – 16x^2 ', '(3y – 2x) (3y + 4y)', '(3y+4x)(3y + 4x)', '(3y +2x)(3y – 4x)', '(3y+4x)(3y-4x)', '', 'D', NULL, 16),
(825, 'Solve for x and y respectively in the simultaneous equations -2x – 5y = 3 and  x + 3y =0', '-3,-9', '9,-3', '3,-9', 'N/A', '', 'C', NULL, 16),
(826, 'If x varies directly as square root of y and x = 81 when y = 9, find x when y = 17/9 ', '20 1/4', '27', '2  1/4', '36', '', 'D', NULL, 16),
(827, 'T Varies inversely as the cube of R. when R = 3, T=2/81, find T when R = 2 ', 'N/A', 'N/A', 'N/A', 'N/A', '', 'B', NULL, 16),
(828, 'Which of the following diagrams represents the solution of the inequalities y </= x – 2 and y >/= x^2 – 4?', 'N/A', 'N/A', 'N/A', 'N/A', '', 'A', NULL, 16),
(829, 'Solving the inequity – 6 (x+3) </= 4(x – 2) ', ' x</=2', ' x>/=- 1', 'x>/= - 2', 'x</= - 1', '', 'B', NULL, 16),
(830, 'Solve the inequality x^2 + 2x > 15. \n', ' x< - 3 or x > 5', '–5 < x< 3', 'x < 3 or x > 5', 'x > 3 or x < - 5 ', '', 'D', NULL, 16),
(831, 'Find the sum of the first 18 terms of the series 3, 6, 9, …, 36', '505', '513', '433', '635', '', 'B', NULL, 16),
(832, 'The second term of a geometric series is 4 while the forth term is 16. Find the sum of the first terms ', '60', '62', '54', '64', '', 'B', NULL, 16),
(833, 'A binary operation *  on real numbers is defined by x  * y= xy + x + y for real numbers x and y. find the value of 3 –  *   2/3 ', '-1/2', '1/3', '-1', '2', '', 'B', NULL, 16),
(834, 'If |2   3 |= |4   1 | find the value of x', '-6', '6', '-12', '12', '', 'A', NULL, 16),
(835, '\nEvaluate  	\n 4     2      -1 \n 2      3     -1\n-1     1      3', '25', '45', '15', '55', '', 'A', NULL, 16),
(836, 'The inverse of matrix N = \n 2     3\n 4      1', '\n1/5 (2     1)\n         (3      4)', '\n1/5 (4   -3)\n         (-1   2)', '\n1/5 (2    -1)\n         (-3   4)', '\n1/5 (4    3)\n         (1     2)', '', 'B', NULL, 16),
(837, 'What is the size of each interior angles of a 12-sided regular polygon? ', '120', '150', '30', '180', '', 'B', NULL, 16),
(838, 'A circle of perimeter 28cm is opened to form a square? ', '56 sq cm', '49 sq cm', '98 sq cm', '28 sq cm', '', 'B', NULL, 16),
(839, 'A chord of a circle. What is the length of the chord?  ', '4(6)^1/2 cm', '3(6) cm', ' 6(6)^1/2 cm  ', ' 2(6)^1/2 cm', '', 'C', NULL, 16),
(840, 'A solid metal cube of side 3 cm is pleased in a rectangular tank of dimensions 3, 4 and 5 cm. what volume of water can the tank now hold? ', '48 cm cube', '33 cm cube', '60 cm cube', '27 cm cube', '', 'B', NULL, 16),
(841, 'The perpendicular bisector of a line XY is the locus of a point.  ', ' whose distance from X is always twice its distance from Y', ' whose distance from Y is always twice its distance from X', ' which moves on the line XY ', ' which equidistant from the points X and Y ', '', 'D', NULL, 16),
(842, 'The midpoint of p(x, y) and Q (8, 6) is (5, 8). Find x and y ', '(2, 10) ', '(2, 8) ', '(2, 12)	', '(2, 6)', '', 'A', NULL, 16),
(843, 'Find the equation of a line perpendicular to line 2y = 5x + 4 which passes through (4, 2). ', '5y – 2x – 18 = 0', '5y + 2x =- 18 = 0 ', '5y – 2x + 18 = 0 ', ' 5y + 2x – 2 = 0', '', 'B', NULL, 16),
(844, 'In a right angled triangle, if tan ? = ¾. What is cos ? – sin ??', '2/5', '3/5', '1/5', '4/5', '', 'C', NULL, 16),
(845, 'A man walks 100m due West from a point X to Y, he then walks 100m due North to a point Z. Find the bearing of x from Z', '195', '1350', '225', '045', '', 'B', NULL, 16),
(846, 'The derivative of (2x+ 1)(3x + 1) is ', ' 12x+1', '6x +5', '6x + 1', ' 12x + 5', '', 'D', NULL, 16),
(847, 'Find the derivative of sin?/cos?  ', 'sec^2? ', ' tan ? cosec', 'cosec ? sec?', 'cosec^2 ?', '', 'A', NULL, 16),
(848, 'Find the value of x at the minimum point of the curve y = x^3 – x + 1', '1/3', '-1/3', '1', '-1', '', 'D', NULL, 16),
(849, 'Integrate (3-2x)dx . (Upper limit= 1, lower limit =0)', '3', '5', '2', '6', '', 'C', NULL, 16),
(850, 'Find the integral of cos4dx  (Upper limits = 1, Lower limits=0)', '3/4  sin4x+ k ', '-1/4  sin4x+ k', '-  3/4  sin4x+ k  ', '1/4  sin4x+ k', '', 'D', NULL, 16),
(851, 'The pie chart above shows the distribution of courses offered by students. What percentage of the students offer English?  ', '30%', '25% ', '35% ', '20% ', '', 'B', NULL, 16),
(852, 'The bar chart above shows the distribution of SS2 students in a school. Find the total number of students. ', '180', '135', '210', '105', '', 'A', NULL, 16),
(853, 'The sum of four consecutive integers is 34. Find the least of these numbers ', '7', '6', '8', '5', '', 'A', NULL, 16),
(854, 'From the table , find the median and range of the data respectively\nNo.	0	1	2	3	4	5\nFrequency 	1	4	3	8	2	5\n', '(8, 5) ', '(3, 5) ', '(5, 8) ', ' (5, 3) ', '', 'B', NULL, 16),
(855, 'Find the mode of the distribution. \nClass Interval 	0 – 2	3 – 5	6 – 8	9 – 11\nFrequency 	4	3	8	2\n', '9', '8', '1', '7', '', 'D', NULL, 16),
(856, 'Find the standard deviation of the  distribution.\nClass Interval 	3 – 5	6 – 8	9 – 11\nFrequency 	2	2	2\n', '5^1/2', '3^1/2', '7^1/2', '2^1/2', '', 'B', NULL, 16),
(857, 'In how many ways can the letters of the word ELATION be arranged? ', '6!', '7!', '5!', '8!', '', 'B', NULL, 16),
(858, 'In how many ways can five people sit round a circular table?', '24', '60', '12', '120', '', 'A', NULL, 16),
(859, 'Find the probability that a number picked at random from the set {43, 44, 45. …, 60} is a prime number.', '2/3', '1/3', '2/9', '7/9', '', 'C', NULL, 16),
(860, 'In a class of 60 students, 30 offer Physics and 40 offers Chemistry, if a student is picked at random from the class, what is the probability that the student offer both Physics and Chemistry. ', '1/3', '1/4', '1/2', '1/6', '', 'D', NULL, 16),
(861, 'Simplify 3_3^1  - 1_4^1   X2/3 + 1_5^2   ', '2', '3', '4', '5', '', 'B', NULL, 16),
(917, 'A man walks 1km due east and the 1km  due north. His displacement is ', '1km                  ', '1km N30oE ', '2km N 45oE ', '2km N  60oE ', '2km N 75oE', 'C', NULL, 17),
(918, 'The frictional force between two bodies ', 'Exists only when there is relative  motion or tendency for motion. ', 'acts so  as to oppose the motion ', 'depends on  the normal reaction between the two  surfaces', 'is relatively independent of  the area in contact ', 'has all of these  characteristics', 'E', NULL, 17),
(919, 'An air force jet flying with a speed of  335ms-1 went past an anti-aircraft gun.  How far is the aircraft 5s later when the  gun was fired? ', '838m', '3350m', '670m', '1675m', '67m', 'D', NULL, 17),
(920, 'A palm fruit dropped to the ground from  the top of a tree 45m tall. How long does  it take to reach the ground? ', '9s', '4.5s ', '6s', '7.5s ', '3s', 'E', NULL, 17),
(921, 'A piece of rubber 10cm long stretches  6mm when a load of 100Nis hung from it.  What is the strain? ', '60', '6', '10 x 10-2', '6 x 10-3 ', '0.6', 'C', NULL, 17),
(922, 'An ice cubes floats in a glass of water  filled to the brim. What happens when the  ice melts? ', 'the water level remains the  same.', 'there is a drop in the level of  water in the glass due to condensation on  its outside. ', 'the water in the glass  overflows', 'the level of water drops  because melted ice occupied less  volume.', 'NONE', 'A', NULL, 17),
(923, 'A machine gun with a mass of 5kg fires a  50g bullet at a speed of 10ms-1. The  recoil speed of the machine gun is ', '0.5  m/sec ', '1.5m/sec ', '1 m/sec ', '2 m/sec ', '4 m/sec', 'C', NULL, 17),
(924, 'Mercury is a better barometric fluid than  water because I. it needs no colouring II.  Its density is many times greater than that  of water III. It does not wet glass. IV. It has  a high vapour pressure V. It has a high  boiling point. Which of the above  statements are true? ', 'I and II only ', 'I,II and III only ', 'III and IV only ', 'Iv and V only ', 'III, IV and V only', 'B', NULL, 17),
(925, 'The internationally agreed system of units  (SI) for physical measurements are ', 'Ib,ft,sec ', 'g,m,sec ', 'kg,m,sec ', 'cm,g,sec ', 'kg, cm, sec', 'C', NULL, 17),
(926, 'To determine the weight of an object, you  could', 'Use a beam balance', 'use a  spring balance ', 'find the force necessary  to give it a certain acceleration', 'use none of these methods ', 'use any of  these methods', 'B', NULL, 17),
(927, 'The force required to make an object of  mass m, traveling with velocity v, trn in a  circle of radius r is ', 'mv2/r ', 'mr2/v ', 'mr/v ', 'mv/r2 ', 'mv/r', 'A', NULL, 17),
(928, 'The density of a solid is defined as the', 'mass of the solid compared to the mass  of an equal volume of water ', 'amount of  water displaced when a unit mass of the  solid is immersed in it ', 'weight per unit  volume of the solid', 'volume per unit  mass of the solid', 'mass per unit volume  of the solid', 'E', NULL, 17),
(929, 'In the diagram below what is the value of  W?', '5N', '10N', '15N', '20N', '30N', 'B', NULL, 17),
(930, 'A solid suspended by a piece of string is completely immersed in water.On attempting to lift the solid out of the water, the string breaks when the solid is partly out of the water. This is because', 'the tension in the string decreases as the solid is lifted.', 'the mass of the solid has increased.', 'the solid apparently weighs less when completely immersed in water than when partially immersed.', 'part of the solid still in water is exerting more force on the string.', 'the solid is no longer in equilibrium with water.', 'C', NULL, 17),
(931, 'The statements below were made by some students describing what happened during  the determination of the melting point of  solids.\n1.The temperature of the solid was  constant until melting started \n2.The temperature of the solid rose until melting started.During melting, the temperature was rising \n4. During melting, the  temperature was constant \n5. The  temperature continued to rise after all the solid had melted. \n6. The temperature stopped rising after all the solid had melted. Which of the following gives correct statements in the right order?\n', '2,4 and 5 ', '2,3 and 6 ', '1,3 and 6 ', '1,3 and 5 ', '1, 4 and 5', 'A', NULL, 17),
(932, 'A few grains of table salt were put in a cup of cold water, kept at constant temperature and left undisturbed. Eventually all the water tasted salty. This action is due to', 'Convection ', 'Osmosis', 'Capillarity', 'Diffusion', 'Conductivity', 'D', NULL, 17),
(933, 'A temperature of 20oC is the same as ', '36oF', '68oF', '11.1oF ', '43.1oF ', '25oF', 'B', NULL, 17),
(934, 'The latent heat of fusion of ice is 80 cal g-1. How much heat is required to change 10g of ice at 0oC into water at the same temperature? ', '80 cal ', '10 cal', '8 cal ', '800 cal ', '400 cal', 'D', NULL, 17),
(935, 'A man standing between two parrarel mirrors in a barber?s shop will see the following number of his own image', 'Eight', 'Two', 'Four', 'One', 'Infinite', 'E', NULL, 17),
(936, 'A gas at pressure PN-m-2 and temperature 27oC is heated to 77oC at constant volume. The new pressure is', '0.85 PN-m-2 ', '0.86 PN-m-2 ', '1.16 PN-m-2 ', '1.18 PN-m-2 ', '2.85 PN-m-2', 'C', NULL, 17),
(937, 'The following are some units I. NS II. Nm  III. Nm-2 IV. J0K-1 V. JKg-1.What are the units of latent heat?', 'I', 'II', 'III', 'IV', 'V', 'E', NULL, 17),
(938, 'A steel plug has a diameter of 5cm at 30oC. At what temperature will it fit exactly into a hole of constant diameter 4.997cm?  (coefficient of linear expansion of steel is  11x10-6oC-1) ', '27.3oC ', ' -27.3oc ', '-2.7oC ', '7.32oC ', 'Minus 24.5oC', 'E', NULL, 17),
(939, 'The heat from the sun reaches the earth by the process of', 'insulation', 'precipitation', 'conduction', 'convection', 'radiation', 'E', NULL, 17),
(940, 'The amount of heat required to raise the temperature of a body is ', 'Thermal energy ', 'thermal conduction ', 'heat lost ', 'specific  heat capacity ', 'thermal capacity', 'E', NULL, 17),
(941, 'Two lamps rated 40W and 220V each are connected in series. The total power  dissipated in both lamps is ', '10W', '20W', '40W', '80W', 'none of the above', 'D', NULL, 17),
(942, 'Two resistors R1 and R2 are connected in parallel,R2 being greater than R1.The combined resistance is ', 'less than R1 ', 'greater than R2 ', 'the sum of R1 and R2 ', 'the difference of R2 and R1 ', 'greater than R1 but less than R2', 'A', NULL, 17),
(943, 'Three 5 ohm resistors connected in parallel have a potential difference of 60V applied across the combination. The current in each resistor is ', '4A', '36A', '12A', '24A', '10A', 'C', NULL, 17),
(944, 'If NEPA charges 5k per kWh, what is the  cost of operating for 24 hours a lamp  requiring 1A on a 200V line? ', '24K', '55K', '40K', '26K', '32K', 'A', NULL, 17),
(945, 'The equivalent capacitance for the circuit  drawn below is ', '18uf ', '4uf', '2uf', '12uf', '13uf', 'B', NULL, 17),
(946, 'A magnet is moved through a coil of wire.  The e.m.f produced in the wire depends on ', 'The number of turns in the coil ', 'the  strength of the magnet ', 'the speed at  which the magnet is moved', 'all of the  above. ', 'none of the above', 'D', NULL, 17),
(947, 'In order to convert a galvanometer into an  ammeter', 'a low resistance shunt is  connected in parallel', 'a low resistance  shunt is connected in series', 'a medium  resistance shunt is connected in series ', 'a high resistance shunt is connected in  parallel', 'a high resistance shunt is  connected in series', 'A', NULL, 17),
(948, 'In a D.C circuit, a 10 microfarad (mf)  capacitor is placed in series with a 10ohm  resistor. The total resistance of the  combination is ', '10 ohms ', '1 ohm ', 'zero ', '20 ohms ', 'infinite', 'E', NULL, 17),
(949, 'On an a.c generator, which of the following  does not apply? ', 'field magnet ', 'comutator', 'armature', 'ship rings', 'carbon brushes', 'B', NULL, 17),
(950, 'Why is it impossible for the lines of force of an electric field to cross one another? ', 'like charges repel each other ', 'a charged particle is deflected by an electric field ', 'like charges are arranged on the same lines of force.', 'a positively charged                                             particle can travel in only one direction at any time           ', 'none of this is correct', 'D', NULL, 17),
(951, 'A potential difference of 6V is used to produce a current of 5A for 200s through a  heating coil. The heat produced is ', '4800 cal ', '6000 cal ', '2400 J', '240 kcal ', '600J.', 'E', NULL, 17),
(952, 'The electric supply from Kainji Dam is transmitted at high voltages of the order hundreds of kilovolts but is converted to domestic use of about 220 volts by ', 'commutators', 'transistors', 'valves and  diodes ', 'rectifiers', 'transformers', 'E', NULL, 17),
(953, 'Every house supplied with electricity is provided with a box of fuses so that ', 'the consumption of electricity can be recorded', 'people residing in the house will not have  an electric shock if they touch a live wire. ', 'the total current drawn from the mains can  be limited', 'the voltage supply can be  stabilized.', 'serves as a standby supply  when there is a power failure', 'A', NULL, 17),
(954, 'An electric charge could be transmitted through', 'wood, rubber and stone', 'paper, clay and plastic ', 'glass, acid and  cloth ', 'the human body, water and metals', 'all of the above', 'D', NULL, 17),
(955, 'A guitar string is 75cm long. The wave length of its fundamental note is ', '75cm', '150cm', '37.5cm ', '112.5cm ', '50cm', 'B', NULL, 17),
(956, 'Two boys are communicating with each  other by stretching a string passing through  a hole punched in the bottom of each of two  tin cans. The physical principle employed is  that sound travels. ', 'mainly through air ', 'fainter in stretched string ', 'faster through gases than in solids and liquids', 'with greater ease through a string than in air.', 'none of the above is correct.', 'D', NULL, 17),
(957, 'A herdsman yelling out to fellow herdsman heard his voice reflected by a cliff 4s later. What is the velocity of sound in air if the cliff is 680m away?', '170ms-1 ', '136ms-1 ', '340ms-1 ', '680ms-1 ', '510ms-1', 'C', NULL, 17),
(958, 'An object 1cm high placed on the axis 15cm from a converging lens forms an image `from the lens. The size of the image is ', '0.5cm ', '1.5cm ', '3cm', '2.5cm ', '2cm', 'E', NULL, 17),
(959, 'The visible part of light consists of the following colours: ', 'red, indigo, infra-red,violet, yellow, green and blue', 'red, green, blue, violet, indigo, orange and yellow', 'blue, ultra-violet, infra-red, red, yellow,indigo violet, green and orange ', 'infra-red and ultra violet ', 'red, orange, yellow, green, blue, indigo and infra-red.', 'B', NULL, 17),
(960, 'An object is positioned between two plane mirrors inclined at right angles to each  other. The object is 1 unit distance from  each mirror. The number of images formed is', '1', '2', '3', '4', '5', 'C', NULL, 17),
(961, 'Which of the following is true for the image formed by a convex mirror? I.The image is always virtual II. The image is always erect.  III.The image lies between pole and focus  IV.The image is never magnified V. The focal length is negative. ', 'I only', 'I and II only ', 'II and III only ', 'I, II, III and IV only', 'All five', 'D', NULL, 17),
(962, 'The angular dispersion of a prism depends on ', 'the index of refraction only', 'the  angle of incidence only ', 'the angle of incidence only ', 'the thickness of the prism ', 'the prism angle', 'A', NULL, 17),
(963, 'A string is sustaining a stationary wave  when the', 'the frequency of the wave is not proportional to the wave length of the wave ', 'the amplitude of vibration is always zero ', 'two equal waves are travelling in opposite directions ', 'the waves are longitudinal ', 'the frequency is directly proportional to the length of the string.', 'C', NULL, 17),
(964, 'For the correction of myopic defects in the human eye we require ', 'a convex lens ', 'a concave lens ', 'a combination of concave  and convex lenses ', 'a prism ', 'a concave mirror', 'B', NULL, 17),
(965, 'Of the following which is different from others? ', 'x-rays ', 'gamma-rays ', 'cathode rays ', 'ultra violet rays ', 'infrared  rays', 'C', NULL, 17),
(966, 'An object is placed 30cm from a concave mirror of focal length 15cm. The linear magnification of the image produced ', '0', '2/3 ', '1', '2', '3', 'C', NULL, 17),
(967, 'Which of the following is the most suitable for use as an altimeter ', 'a mercury barometer ', 'a fortin barometer ', 'a  mercury manometer ', 'an aneroid barometer', '', 'D', NULL, 17),
(968, 'A body of weight W N rests on a smooth  plane inclined at an angle 0o to the  horizontal. What is the resolved part of the weight in Newtons along the plane? ', 'W sin 0 ', 'W cos 0 ', 'W sec 0 ', 'W tan 0', '', 'A', NULL, 17),
(969, 'A small metal ball is thrown vertically upwards from the top of a tower with an initial velocity of 20ms-1. If the ball took a total of 6s to reach ground level, determine the height of the tower. (g = 10ms-2)', '60m ', '80m', '100m', '120m', '', 'A', NULL, 17),
(970, 'An object moves with uniform speed round a circle. Its acceleration has ', 'constant magnitude and constant direction ', 'constant magnitude and varying direction ', 'varying magnitude but constant direction', 'varying magnitude and varying direction', '', 'B', NULL, 17),
(971, 'A body of mass 100g moving with a velocity of 10.0ms-1 collides with wall. If after the collision, it moves with a velocity of 2.0ms-1 in the opposite direction, calculate the change  in momentum.', '0.8Ns ', '1.2Ns ', '12.0Ns ', '80.0Ns', '', 'B', NULL, 17),
(972, 'Find the tension T, in the diagram above if  the system is in equilibrium.  (g=10ms -2)', '200/3N', '100/3N ', '300/ 3N', '100N', '', 'B', NULL, 17),
(973, 'A spring of force constant 1500 Nm-1 is  acted upon by a constant force of 75N. Calculate the potential energy stored in the spring.', '', '', '', '', '', 'A', NULL, 17),
(974, 'A wheel and axle have radii 80cm and 10cm respectively. If the efficiency of the  machine is 0.85, an applied force of 1200N to the wheel will raise a load of ', '8.0N ', '6.8N ', '8160.0N ', '9600.0N', '', 'C', NULL, 17),
(975, 'A body is under the action of a force F such  that the force - displacement graph of the body is semicircular as shown above. The work done on the body by the force in moving through 24 metres is', '36?J', '72?J', '144?J', '288?J', '', 'B', NULL, 17),
(976, 'A 20kg mass is to be pulled up a slope inclined at 30o to the horizontal. If the efficiency of the plane is 75%, the force  required to pull the load up the plane sis (g=100ms-1)', '13.3N ', '73.5N ', '133.3N ', '533.2N ', '', 'C', NULL, 17),
(977, 'The spiral spring of a spring balance is 25.0cm long when 5N hangs on it and 30.0cm long, when the weight is 10N. What is the length of the spring if the weight is 3N assuming Hooke?s Law is obeyed? ', '15.0cm ', '17.0cm ', '20.0cm ', '23.0cm', '', 'D', NULL, 17),
(978, 'The mass of a stone is 15.0g when completely immersed in water and 10.0g when completely immersed in liquid of  relative density 2.0. The mass of the stone in air is ', '5.0g ', '12.0g ', '20.0g ', '25.0g', '', 'C', NULL, 17),
(979, 'A pilot records the atmospheric pressure outside his plane as 63cm of Hg while a ground observer pressure on the ground. Assuming that the density of the atmosphere is constant, calculate the  height of the plane above the ground. (Replace density of Hg = 13.0 an that of air = 0.00013) ', '1200m', '6300m', '7500m', '13800m', '', 'A', NULL, 17),
(980, 'In which of the following is surface tension important?', 'The floating of a ship in water ', 'The floating of a dry needle in water ', 'The floating of a balloon in air ', 'The diffusion of sugar solution across a membrane', '', 'B', NULL, 17),
(981, 'A thermometer with an arbitrary scale, S, of equal divisions registers - 30oS at the ice point and + 90oS at the steam point. Calculate the Celcius temperature corresponding to 60oS. ', '25.0oC ', '50.0oC ', '66.7oC ', '75.0oC', '', 'D', NULL, 17),
(982, 'A brass rod is 2n long at a certain temperature, what is the length for a  temperature rise of 100K, if the expansibility of brass is 18 x 10-6 K-1? ', '2.0036m ', '2.0018m ', '1800m', '2.0360m', '', 'A', NULL, 17),
(983, 'What is the difference in the amount of heat given out by 4kg of steam and 4kg of water  when both are cooled from 100oC to 80oC?{The specific latent heat of steam is 2,260,000 J kg-1} ', '4200J', '2,260,000J ', '9040,000J ', '9,380,000J', '', 'C', NULL, 17),
(984, 'The graphs below show the variation of volume(V) against temperature (T) in Kelvin for a given mass of gas at constant pressure. Which of the graphs depicts the behavior of an ideal gas?', 'Check Diagram', 'Check Diagram', 'Check Diagram', 'Check Diagram', '', 'A', NULL, 17),
(985, 'How long does it take a 750-W heater to raise the temperature of 1kg of water from 20oC to 50oC. (specific heat capacity of water = 4200 J kg-1 K-1)', '', '', '', '', '', 'C', NULL, 17),
(986, 'The saturated vapour pressure of a liquid increases as the ', 'volume of the liquid increases ', 'volume of the liquid decreases ', 'temperature of the liquid decreases ', 'temperature of the liquid decreases', '', 'C', NULL, 17),
(987, 'The absolute temperature of a perfect gas is proportional to the average. ', 'potential energy of molecules ', 'separation between the molecules ', 'Kinetic energy of the  molecules ', 'velocity of the molecules', '', 'C', NULL, 17),
(988, 'A room is heated by means of a charcoal fire. An occupant of the room standing  away from the fire is warmed mainly by ', 'convection', 'radiation', 'conduction', 'reflection', '', 'B', NULL, 17),
(989, 'A boy timed 30 oscillation of a certain pendulum thrice and obtained 1 min. 10s, 1  min. 12s and 1min. 7s respectively. The  mean period of oscillation of the pendulum is ', '0.14s ', '0.43s ', '2.32s ', '6.97s', '', 'C', NULL, 17),
(990, 'Which of the following is true of light and sound waves? ', 'they both transmit energy ', 'they both need a medium for propagation', 'they are both transverse waves ', 'their velocities in air are equal', '', 'A', NULL, 17),
(991, 'The image in a pin-hole camera is ', 'erect and formed by refraction through a lens', 'they both need a medium for propagation', 'they are both transverse waves ', 'inverted and formed by the light from each point  travelling in a straight line', '', 'D', NULL, 17),
(992, 'When a plane mirror at which a ray is incident is rotated through an angle ?, the reflected ray will be rotated through ', '??', '?', '2?', '3?', '', 'C', NULL, 17),
(993, 'A trough 12.0cm deep is filled with water of refractive index 4/3. By how much would a  coin at the bottom of the trough appear to be displaced when viewed vertically from  above the water surface? ', '3.0cm ', '6.0cm ', '9.0cm ', '16.0cm', '', 'A', NULL, 17),
(994, 'In a ray diagram for a thin converging lens, a ray that is not parallel to the optic axis but passes through the optic centre will ', 'pass  through undeviated ', 'pass through the centre of curvature after refraction ', '', 'emerge parallel to the principal focus after refraction', '', 'A', NULL, 17),
(995, 'Which is the following correctly describes the image of an object, 4cm from a diverging lens of focal length - 12cm? ', 'the image is virtual, 3cm in front of the lens ', 'the image is real, 6cm behind the lens ', 'the image is virtual, 6cm in front of the lens. ', 'the image is real, 3cm in front of the lens', '', 'A', NULL, 17),
(996, 'Two tuning forks of frequencies 256Hz and 260Hz are sounded close to each other. What is the frequency of the beats  produces? ', '2 Hz ', '4 Hz ', '8 Hz ', '258 Hz', '', 'B', NULL, 17),
(997, 'A man hears his echo from a nearby hill 2s after he shouted. If the frequency of his voice is 260 Hz and the wavelengths is 1.29m, how far away is the hill? ', '330.0m ', '335.4m ', '660.0m ', '670.8m', '', 'B', NULL, 17),
(998, 'When the bottom tip of a vibrating tuning fork is held in contact with a wooden box, a louder sound is heard. This phenomenon is known as ', 'Beats', 'echoing', 'resonance', 'reverberation', '', 'C', NULL, 17),
(999, 'Which of the following statement I correct about the earth?s magnetic field? ', 'The  angle of dip is the angle which is freely suspended magnet makes with the vertical ', 'the angle of declination is the angle between the magnetic meridian and the geographic meridian ', 'the angle of declination is the angle which a magnetic compass makes with the magnetic meridian ', 'the angle of inclination is the difference between the angle of dip and the  angle of declination', '', 'B', NULL, 17),
(1000, 'An insulated rod when rubbed with a material acquires \n', 'a negative charge if it is made of glass and rubbed with silk \n', 'no charge if it is made of glass and rubbed with fur \n', 'no charge if it is made of copper and rubbed with silk ', 'a positive charge if it is made of copper and\nrubbed with fur.\n', '', 'B', NULL, 17),
(1001, 'The internal resistance of each of the cells E1and E2 shown in the figure above is 2. Calculate the total current in the circuit. \n', '0.80A ', '0.50A        ', '0.40A ', '0.004A', '', 'C', NULL, 17),
(1002, 'The function of the system of granulated carbon mixed with manganese (IV) oxide in a Leclanche cell is to \n', 'increase the e.m.f of the cell to 2.0V \n', 'prevent local action in the cell ', 'prevent polarization in the cell ', 'make the cell black and hence a good radiator', '', 'C', NULL, 17),
(1003, 'A moving coil galvanometer of 300?resistance gives full scale deflection for 1.0mA.The resistance,R, of the shunt that is required to convert the galvanometer into a  3.0A ammeter is ', '8.99.70? ', '10.00', '0.10', '0.01', '', 'C', NULL, 17),
(1004, 'Which of the following obeys Ohm?s Law? ', 'Glass', 'Diode', 'All electrolytes ', 'All metals', '', 'D', NULL, 17),
(1005, 'The net capacitance in the circuit shown above is ', '8.0uf ', '6.0uf ', '4.0uf ', '2.0uf', '', 'D', NULL, 17),
(1006, ' In the above circuit, the fuse wire melts when', 'k is opened ', 'k is closed ', 'the 14 -? resistor is doubled with k closed ', 'the  6-? resistor is doubled with k closed', '', 'B', NULL, 17),
(1007, 'An equipment whose power is 1500W and resistance is 375 ohms would draw current  of ', '0.10A ', '2.00A ', '4.00A ', '77.5A ', '', 'B', NULL, 17),
(1008, 'To convert an alternating current dynamo into a direct current dynamo, the ', 'number of turns in the coil is increased ', 'strength of the field magnet is increased ', 'slip rings are replaced with a split ring commutator', 'coil is wound on a soft iron armature.', '', 'C', NULL, 17),
(1009, 'If a current carrying coil is mounted in a  metal frame, the back e.m.f induced in the  coil causes ', 'inductance', 'eddy currents ', 'electro-magnetism ', 'dipole moment', '', 'B', NULL, 17),
(1010, 'The electrochemical equivalent of platinum Is 5.0x10-7kgC-1.To plate-out 1.0kg of  platinum,a current of 100A must be passed through an appropriate vessel for ', '5.6  hours ', '56 hours ', '1.4 x 104 hours ', '2.0  x 104 hours', '', 'A', NULL, 17),
(1011, 'Which of the following statements are true of isotopes? I. Isotopes of an element have  the same chemical properties because they have the same number of electrons. II,Isotopes of elements are normally separated using physical properties III.Isotopes of an element have the same number of protons in their nuclei.', 'I and II only. ', 'I and III only ', 'II and III only', 'I, II and III', '', 'B', NULL, 17),
(1012, 'When an atom loses or gains a charge, it becomes ', 'An electron ', 'an ion ', 'a neutron ', 'a proton', '', 'B', NULL, 17),
(1013, '4g of a radioactive material of half-life 10 days in spilled on a laboratory floor. How  long would it take to disintegrate 3.5g of the material? ', '1 ? days ', '8 ? days ', '30 days ', '80 days', '', 'C', NULL, 17),
(1014, 'In a nuclear fusion process, four protons each dice mass Mp were fused to produce a nucleus X of mass Mx. Which of the following equations is CORRECT. ', '4Mp> Mx ', '4Mp = Mx', '4Mp<Mx ', 'Mp = Mx', '', 'B', NULL, 17),
(1015, 'Which of the following are TRUE for a-decay.I.Mass number decreases by 4II.Atomic number decreases by 2III.Mass number does not change. \n', 'I and II only ', 'II and III only ', 'I and III only ', 'I, II and III', '', 'A', NULL, 17),
(1016, 'Which of the following phenomena is called photoelectric effect? ', 'High energy ', 'a high energy photons emits photons as it is slows down', 'a metal absorbs quanta of  light and they emits electrons.', 'two electrons are created from a quantum of light', '', 'C', NULL, 17),
(1017, 'Which of the following is the dimension of pressure? \n', 'ML -1T-2 ', 'MLT-2 ', 'ML2T-3 ', 'ML-3', '', 'A', NULL, 17),
(1018, 'The length of a  displaced pendulum bob which passes its lowest point twice every second is (g=10ms-2)\n', '0.25m ', '0.45m ', '0.58m ', '1.00m ', '', 'A', NULL, 17),
(1019, 'In the diagram above, PQ and R are vectors. Which of the following options gives the correct relationship between the vectors? \n', 'P=Q +R ', 'P= Q-R ', 'P=R-Q', 'P+Q+R = O', '', 'D', NULL, 17),
(1020, 'The value of T in the figure above is ', '10.0N', '11.8N ', '20.0N ', '40.0N', '', 'D', NULL, 17),
(1021, 'When a ball rolls on a smooth level ground, the motion of its centre is\n', 'translational ', 'oscillatory', 'random', 'rotational', '', 'D', NULL, 17),
(1022, 'The velocity time graph of a body moving in a straight line and decelerating uniformity to rest is represented by \n', '', '', '', '', '', 'C', NULL, 17),
(1023, 'A cone is unstable equilibrium has has its potential energy ', 'decreased', 'Increased', 'unchanged', 'Oscillating ', '', 'B', NULL, 17),
(1024, 'What is the acceleration due to gravity ?g? on the moon, if g is 10ms-2 on the earth? \n', '0.10ms-2 ', '0.74ms-2 ', '1.67ms-2 ', '10.00ms-2', '', 'C', NULL, 17),
(1025, 'A body is projected from the earth?s surfacewith the intention of letting it escape from the earth?s gravitational field. What is the minimum escape velocity of the body? \n', '14km s-1 ', '13km s-1 ', '12km s-1 ', '11km s-1', '', 'D', NULL, 17),
(1026, 'A uniform rod PQ of length 1m and mass 2kg is pivoted at the end P. If a load of 14N is placed at the center of the rod, find the force that should be applied vertically upwards at Q to maintain the rod in equilibrium horizontally. (g = 10ms2)\n', '68N', '28N', '17N', '7 N', '', 'C', NULL, 17),
(1027, 'A vehicle of mass m is driven by an engine of power P from rest. Find the minimum time it will take to acquire a speed v. \n', 'mv2/P ', 'mv2/2p ', 'mv/p ', 'mv/2P', '', 'A', NULL, 17),
(1028, 'A box of mass 40kg is being dragged along the floor by a rope inclined at 60o to the horizontal. The frictional force between the box and the floor is 100N and the tension on the rope is 300N. How much work is done in dragging the box through a distance of 4m? \n', '680J', '400J', '200J ', '100J', '', 'C', NULL, 17),
(1029, 'Which of the following statements are TRUE about frictional force? I. It is always a disadvantage II. It is sometimes a disadvantage III. It always exists where there is a relative motion of two bodies that are in contact IV. It is sometimes very useful. \n\n', 'I and III only ', 'I and IV only ', 'II and III only ', 'II and IV only', '', 'D', NULL, 17),
(1030, 'The energy contained in a wire when it is extended by 0.02m by a force of 500N is \n', '5 J', '10J', '103J', '104J', '', 'A', NULL, 17),
(1031, 'Which of the following levers has the greatest mechanical advantage.\n', 'Refere To Diagram', 'Refere To Diagram', 'Refere To Diagram', 'Refere To Diagram', '', 'C', NULL, 17),
(1032, 'A hydraulic press has a large circular piston of radius 0.8m and a circular plunger of radius 0.2m. A force of 500N is exerted by the plunger. Find the force exerted on the piston. \n', '8000 N ', '4000 N', '2000 N', '31 N', '', 'C', NULL, 17),
(1033, 'The volume of an air bubble increases from the bottom to the top of a lake at constant temperature because \n', 'atmospheric pressure acts on the surface of the lake \n', 'pressure increases with depth ', 'density remains constant with pressure dabble experiences an upthrust\n', '', '', 'B', NULL, 17),
(1034, 'Temperature is a measure of the ', 'quantity of heat transferred into the molecules of an object', 'mean kinetic energy of the molecules of the object ', 'kinetic energy of any individual  molecule of the substance \n', 'amount of work done by the molecules of the object.', '', 'B', NULL, 17),
(1035, 'A rectangular metal block of volume 10-6m3 at 273K is heated to 573K. If its coefficient of linear expansion is 1.2 x 10-5K-1, the percentage change of its volume is \n', '1.50%', '1.10%', '0.40%', '0.10%', '', 'B', NULL, 17),
(1036, 'A piece of wood floats inside water at room temperature with a fraction of it above the liquid surface. As the temperature of the water is raised, the part of the wood above the liquid will \n', 'decrease because the density of water decreases with temperature \n', 'increase because the density of water decreases with temperature \n', 'decrease because the density of water increases with emperature ', 'increase because the density of water increases with temperature.\n', '', 'A', NULL, 17),
(1037, 'The education PxVyT2 = constant is Charles? law when \n', 'x = 1, y = -1 ', 'x=0, y=1, z=-1', 'x=1, y=0, z=-1 ', 'x=0, y=1, z = 1', '', 'B', NULL, 17),
(1038, 'An electric kettle with negligible heat capacity is rated at 2000W. If 2.0kg os water is put in it, how long will it take the temperature of water to rise from 20oC to 100oC? \n', '420s', '336s', '168s ', '84s', '', 'B', NULL, 17),
(1039, 'A temperature scale has a lower fixed point of 40mm and an upper fixed point of 200mm. What is the reading on this scale when a thermometer reads 60oC. \n', '33.3mm ', '36.0mm ', '96.0mm ', '136.0mm', '', 'D', NULL, 17),
(1040, 'A quantity of ice at - 10oC is heated until the temperature of the heating vessel is 90oC. Which of the following constants is NOT required to determine the quantity of heat supplied to the vessel?\n', 'specific heat capacity of ice ', 'Specific heat capacity of water ', 'specific latent heat of fusion ', 'Specific latent heat of vaporization.', '', 'D', NULL, 17),
(1041, 'Which of the following statements give the TRUE differences between evaporation and boiling? I. Evaporation occurs at all temperatures while boiling occurs at a fixed temperature for a given pressure II. Evaporation is a surface phenomenon while boiling III. Evaporation is affected by surface area while boiling is not. \n', 'I and II only ', 'I and III only ', 'II and III only ', 'I, II and III', '', 'D', NULL, 17),
(1042, 'A well-lagged bar of length 100cm and has its ends maintained at 100oC and 40oC respectively. What is the temperature at a point 60cm from the hotter end? \n', '58oC', '62oC', '64oC', '76oC', '', 'D', NULL, 17),
(1043, 'Which of the following is the exclusive property of a transverse wave? \n', 'Diffraction', 'Refraction', 'Compression', 'Poliarization', '', 'D', NULL, 17),
(1044, 'The wavelength of signals from a radio transmitter is 1500m and the frequency is 200kHz. What is the wavelength for a transmitter operating at 1000kHz?\n', '7500m', '300m', '75m', '15m', '', 'B', NULL, 17),
(1045, 'The difference between sound waves and light waves is that sound waves \n', 'are transverse while light waves are longitudinal ', 'require a medium to travel while light waves do not ', 'can be diffracted but light waves cannot ', 'cannot be reflected but light waves can', '', 'B', NULL, 17),
(1046, 'Which of the diagrams below represents the second overtone of a vibrating string fixed at both ends? \n', 'Refere To Diagram', 'Refere To Diagram', 'Refere To Diagram', 'Refere To Diagram', '', 'D', NULL, 17),
(1047, 'The pitch of an acoustic device can be increased by\n', 'increasing the frequency ', 'increasing the amplitude ', 'decreasing the loudness ', 'decreasing the intensity', '', 'A', NULL, 17),
(1048, 'Total eclipse of the sun occurs when the ', 'earth is between the moon and the sun ', 'sun is between the moon and the earth ', 'moon is between the sun and the earth ', 'ozone layer is threatened.', '', 'C', NULL, 17),
(1049, 'What is the approximate critical angel for total internal reflection for diamond if the refractive index of diamond is 2.42? \n', '21o', '22o', '23o ', '24o', '', 'D', NULL, 17),
(1050, 'Which of the graphs represents the relationship between m and v for a converging mirror?\n', 'Refere To Diagram', 'Refere To Diagram', 'Refere To Diagram', 'Refere To Diagram', '', 'D', NULL, 17),
(1051, 'A real object is placed at a distance ucm in front of a curved mirror of focal length fcm. If the image is upright and magnified, then the mirror is \n', 'convex and u = 2f', 'convex and u =f/2 ', 'convex and u = f/2', 'concave and u = f/2', '', 'D', NULL, 17),
(1052, 'Which of the following pairs of colours gives the widest separation in the spectrum of white light?\n', 'Red and violet ', 'Green and yellow ', 'Red and Indigo ', 'Yellow and violet', '', 'A', NULL, 17),
(1053, 'Two parallel plates at a distance of  8.0 x 10-3m apart are maintained at a p.d. of 600 volts with the negative plate earthed. What is the electric field strength? \n', '4.8 Vm-1', '75.0 Vm-1 ', '4800.0Vm-1 ', '75000.0 Vm-1', '', 'D', NULL, 17),
(1054, 'At different locations on the earth?s surface, the earth?s magnetic field is \n', 'the same in magnitude and direction ', 'the same in magnitude but different indirect ', 'different in both magnitude and direction \n', 'different in magnitude but not in direction', '', 'A', NULL, 17),
(1055, 'If a resistance is halved in value and the potential difference across it is tripled, then the ratio of the new current to the old is \n', '1:6 ', '1:3 ', '2:1 ', '6:1', '', 'D', NULL, 17),
(1056, 'If 12-V battery has an internal resistance of 0.5W. If a cable of 1.0W resistance is connected across the two terminals of the battery, the current drawn from the battery is \n', '16.0A ', '8.0A ', '0.8A ', '0.4A', '', 'B', NULL, 17),
(1057, 'The diagram above shows similar bulbs X and Y connected to a suitable power supply with F as an appropriate fuse rating. If the filament of X breaks, then the\n', 'brightness of y will reduce ', 'brightness of Y will remain constant ', 'brightness of Y will increase ', 'fuse F will blow', '', 'C', NULL, 17),
(1058, 'The purpose of a dielectric material in a parallel plate capacitor is to \n', 'increase its capacitance ', 'decrease its capacitance ', 'insulate the plates from each other ', 'increase the magnetic field between the plates.', '', 'A', NULL, 17),
(1059, 'The resultant capacitor in the figure above is ', '15.0?f ', '9.8?f ', '1.3?f ', '0.8?f', '', 'D', NULL, 17),
(1060, 'An electric current of 2 amperes flows in a heating coil of resistance 50 ohms for 3 minutes 20 seconds. Determine the heat produces.\n', '0.5Kj ', '8.0kJ ', '20.0 Kj ', '40.0Kj', '', 'D', NULL, 17),
(1061, 'If the maximum voltage across a 100-oh, resistor is 20V, then the maximum power it can dissipate is \n', '5.00W ', '4.00W ', '2.00W ', '0.25W', '', 'B', NULL, 17),
(1062, 'Which of the following is required to convert a milliammeter to an ammeter? \n', 'A high resistance in parallel ', 'A high resistance in series ', 'A low resistance in parallel ', 'A low resistance in series', '', 'C', NULL, 17),
(1063, 'The primary winding of a transformer has 400 turns and its secondary has 100 turns. If a source of e.m.f. of 12V is applied to the primary, the secondary e.m.f will be \n', '3V', '6V', '24V', '48V', '', 'A', NULL, 17),
(1064, 'An alternating source is connected in series to a capacitor reactance of 103?3 and a resistor of resistance 103?. The impedance of the circuit is \n', '2000?3? ', '2000?', '1000?3? ', '1000?', '', 'B', NULL, 17),
(1065, 'The half-life of a radioactive element is 9 days. What fraction of atoms has decayed in 36 days? \n', '1/16 ', '?', '?', '15/16', '', 'D', NULL, 17),
(1066, 'A light of energy 5eV falls on a metal and the electrons with a maximum kinetic energy of 2eV are ejected. The work function of the metal is \n', '0.4eV ', '2.5eV ', '3.0eV ', '7.0Ev', '', 'C', NULL, 17);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
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
(10, '1285807', 2, 1, 4, 108, 'B', 0, '2017-11-03 01:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_settings`
--

CREATE TABLE IF NOT EXISTS `quiz_settings` (
  `id` bigint(20) NOT NULL,
  `pagenum` varchar(50) DEFAULT NULL,
  `examtime` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_settings`
--

INSERT INTO `quiz_settings` (`id`, `pagenum`, `examtime`) VALUES
(1, '1', '00:50:00');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
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
(78, 7, 19, 1, '2017-11-02 04:27:27', '2017-11-02 04:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_subjects`
--

CREATE TABLE IF NOT EXISTS `quiz_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `subject_desc` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
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
(19, 'ENGLISH JNR', '(Jrn) Test of grammar, vocabulary and english as a language ', '2017-11-02 04:26:04');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblassignment`
--

INSERT INTO `tblassignment` (`id`, `name`, `teacher_id`, `class_id`, `subject_id`, `question`, `dead_line_date`, `dead_line_time`, `created_date`, `status`, `lastupdate`) VALUES
(1, 'faruk testing assihnment', 2, 1, 2, 'testing for faruk', '2018-06-11', '3:47 AM', '2017-10-26 10:47:59', '1', '2017-10-26 10:47:59');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbook_tutor`
--

INSERT INTO `tblbook_tutor` (`id`, `email`, `name`, `subjects`, `phone`, `age`, `gender`, `address`, `date`) VALUES
(1, 'ismartnaija@gmail.com', 'ibrahim yekeen', 'maths', '07038858824', 24, 'Male', 'badawa layout', '2017-10-17 01:36:37');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
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
(17, 'J S S THREE', '3', 'A', '2017-10-24 07:31:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `title`, `content`, `date`, `time`, `location`, `last_update`) VALUES
(3, 'event three', 'dsfasfassadas', '2017-12-04', '5:42 PM', 'dasdasdas', '2017-10-16 09:06:42'),
(4, 'End Of The Year Party', 'the school will be having her final year end of the year party for graduating students please inform others', '2017-12-27', '11:28 AM', 'School Compound', '2017-10-17 03:28:53'),
(5, 'End Of The Graduation', 'testing mode', '2017-12-15', '10:38 AM', 'School Compound', '2017-10-17 04:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblfees`
--

CREATE TABLE IF NOT EXISTS `tblfees` (
  `id` int(11) NOT NULL,
  `ClassName_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
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
(19, 1, 'P.T.A', 500);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
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
(42, 'DSC_1499.JPG', 0, '../gallery_image/502783332.JPG', '1508298335zuilt', '2017-10-18 03:45:35');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`id`, `title`, `content`, `image`, `date`, `last_update`) VALUES
(2, 'testing news post', 'ha dwiadf idfwd\r\ndsdhfsid\r\ndsdijs dw\r\ndsdjsw dws', '', '2017-10-16 04:41:37', '2017-10-16 04:41:37'),
(3, 'school mid term break', 'school will be going on a short break soon please all parent should inform their children of this', '', '2017-10-17 03:26:54', '2017-10-17 03:26:54');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `page_name`, `slug`, `content`, `row`, `date`) VALUES
(1, 'About Us', 'about', '<p>In October 2015, the Kano State Government gave an approval to the establishment of an educational initiative. This was the <span style="font-size:14px"><strong>Medni&#39;ima</strong></span> Teaching and Learning Center, which was situated at the Badawa Layout Kano. It&rsquo;s dual objectives consisted the provision of complementary evening lessons to secondary school students and enabling assistance to credit deficient school learners.</p>\r\n', '1', '2017-10-25 01:37:03'),
(2, 'Academic Curriculum', 'academic-curriculum', '<p><strong>The College</strong> runs a six-year programme divided into two sections</p>\r\n\r\n<p>The Junior Secondary School (JSS) and the Senior Secondary School (SSS) in accordance with the National Policy on Education, simply described as the 6-3-3-4 system of education. As the School awaits the (9-3-4) New National policy on Education.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>SECTION I:- Junior Secondary School. </strong></span></p>\r\n\r\n<p>The first 3 years are spent in the junior school. Students are prepared for the Junior Secondary Certificate Examinations (JSCE) State and National Examination Council (NECO) Federal.</p>\r\n\r\n<p>The following subjects are available for study:-</p>\r\n\r\n<ol>\r\n	<li>Mathematics,</li>\r\n	<li>English Language,</li>\r\n	<li>Agricultural Science,</li>\r\n	<li>Physical &amp; Health Education,</li>\r\n	<li>Business Studies,</li>\r\n	<li>Basic Technology,</li>\r\n	<li>French,</li>\r\n	<li>Music,</li>\r\n	<li>Home Economics,</li>\r\n	<li>Hausa,</li>\r\n	<li>Creative Art,</li>\r\n	<li>Computer Science,</li>\r\n	<li>Basic Science,</li>\r\n	<li>Christian Religious Studies &amp; Social Studies.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>SECTION II:- Senior Secondary School.</strong></span></p>\r\n\r\n<p>At the Senior Secondary School, students are prepared for the following :-</p>\r\n\r\n<p><strong>(a) Primary Programmes</strong></p>\r\n\r\n<p>I. WASSCE (West African Senior School Certificate Examination)</p>\r\n\r\n<p>II. NECO SSCE (National Examination Council)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>(b) Secondary Programmes </strong></p>\r\n\r\n<p>I. Cambridge O&rsquo;level</p>\r\n\r\n<p>II. U.M.E (University Matriculation Examinations of JAMB)</p>\r\n\r\n<p>III. IJMB (Interim Joint Matriculation Board)</p>\r\n', '1', '2017-10-25 01:43:05');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblparent`
--

INSERT INTO `tblparent` (`id`, `title`, `username`, `fullname`, `occupation`, `gender`, `phone`, `email`, `password`, `p_photo`, `children_id`, `address`, `state`, `LGA`, `town`, `school_ref`, `pta_exco`, `status`, `date`) VALUES
(1, 'Mrs', 'MIS/PAR/88921', 'Naima Ahmed', 'teacher', 'Female', '08028825833', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ueueyww.jpg', '1,2', 'badawa', 'kano', 'nassawra', 'ishfhsds', '2', '1', '', '2017-10-24 02:49:48'),
(2, 'Mr', 'MIS/PAR/21457', 'Sulyman Yekeen', 'Teacher', 'Female', '08108677175', 'sule@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '1', 'dfghugfyds', 'kwara', 'irepodun', 'ajase', '1', '0', '', '2017-10-24 10:20:10'),
(3, 'Mr', 'MIS/PAR/23491', 'Sanusi Akinwumi', 'engr', 'Male', '07038858834', 'asdarrrrds@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '3', 'ertyu987y7', 'kwara', 'irepodun', 'ishfhsds', '2', '1', '1', '2017-10-24 10:19:17');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblptanews`
--

INSERT INTO `tblptanews` (`id`, `title`, `content`, `image`, `date`, `last_update`) VALUES
(2, 'testing news post', 'ha dwiadf idfwd\r\ndsdhfsid\r\ndsdijs dw\r\ndsdjsw dws', '', '2017-10-16 04:41:37', '2017-10-16 04:41:37'),
(3, 'school mid term break', 'school will be going on a short break soon please all parent should inform their children of this', '', '2017-10-17 03:26:54', '2017-10-17 03:26:54'),
(4, 'pta meeting held on 14', 'the meeting started by 3 and sjjkajdfasdfasdfas', '', '2017-05-14 00:00:00', '2017-10-24 04:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblpta_excos`
--

CREATE TABLE IF NOT EXISTS `tblpta_excos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `post` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpta_excos`
--

INSERT INTO `tblpta_excos` (`id`, `parent_id`, `post`, `date`) VALUES
(1, 1, 'Chair Lady', '2017-10-23 22:42:52'),
(3, 3, 'chairman', '2017-10-24 10:19:17');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblquestion`
--

INSERT INTO `tblquestion` (`id`, `name`, `phone`, `email`, `question`, `date`) VALUES
(1, 'ismartnews', '08028825833', 'mdtvhausa@gmail.com', 'sjadhjasda dadada\r\nsd\r\nadsa\r\ndadad\r\na', '2017-10-17 03:23:04');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `termid`, `session_id`, `SubjectId`, `test_marks`, `exam_marks`, `PostingDate`, `UpdationDate`) VALUES
(16, 1, 7, 1, '2017', 8, 21, 43, '2017-10-24 09:30:58', NULL),
(17, 1, 7, 1, '2017', 14, 12, 23, '2017-10-24 09:30:58', NULL),
(18, 1, 7, 1, '2017', 2, 12, 32, '2017-10-24 09:30:58', NULL),
(19, 1, 7, 1, '2017', 16, 23, 53, '2017-10-24 09:30:58', NULL),
(20, 1, 7, 1, '2017', 1, 30, 50, '2017-10-24 09:30:58', NULL);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
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
(21, 'PBIh9xH9lTNq9e', '6761610', '1', 0, '2017-10-17 04:36:49');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblscracth_card_use`
--

INSERT INTO `tblscracth_card_use` (`id`, `card_id`, `student_id`, `class_id`, `term_id`, `session_id`, `time_used`, `date`) VALUES
(1, 1, 1, 7, 1, '2017', 4, '2017-10-24 09:31:05');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `password`, `StudentEmail`, `Gender`, `photo`, `DOB`, `ClassId`, `parent_id`, `address`, `state`, `LGA`, `town`, `sport_house`, `fee_payment_status`, `F_school_name`, `F_school_address`, `F_school_date`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'adana ibrahim ololade', 'MIS/STU/89124', '827ccb0eea8a706c4c34a16891f84e7b', 'o89124@mis.com', 'Male', '89124.png', '2017/10/20', 7, 1, 'adrghjkl', 'kwara', 'irepodun', 'ajase', '', '0', 'wertyui', 'uewrty', '2017-10-20', '2017-10-21 01:29:57', '2017-10-22 06:32:00', 1),
(2, 'abdul yekeen olamide', 'MIS/STU/77254', '827ccb0eea8a706c4c34a16891f84e7b', 'o77254@mis.com', 'Male', '77254.jpg', '2014/02/04', 1, 1, 'drtfghjuk', 'kwara', 'irepodun', 'ajase', '', '0', 'my former school noni', 'sdfghj', '2017-05-22', '2017-10-21 03:09:05', '2017-10-22 06:32:05', 1),
(3, 'Sanusi Tajudeen Akinwumi', 'MIS/STU/54106', '827ccb0eea8a706c4c34a16891f84e7b', 'a54106@mis.com', 'Male', '54106.JPG', '2015/08/06', 8, 0, 'Tokarawa off Hadejia', 'Osun', 'Aiyedade', 'Gbongan', '', '0', 'Medniima International School', 'Badawa layout', '2017-09-18', '2017-10-24 07:48:52', '2017-10-24 07:48:52', 1);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
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
(45, 7, 14, 1, '2017-10-17 04:27:28', '2017-10-17 04:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
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
(18, 'Qautitative Reasoning ', 'Quan', '2017-10-17 04:25:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`id`, `username`, `fullname`, `email`, `phone`, `address`, `gender`, `DOB`, `password`, `classid`, `decipline`, `subject_taken`, `photo`, `employ_date`, `salary`, `status`, `date`) VALUES
(2, 'MIS/STAFF/26272', 'omolola owoeye', 'ismartnaija@gmail.com', '08028825833', 'sdfxcghjkl;lkjhjhaersdtgfhjpoftdf', 'Female', '1993-11-08', 'c82138c7e01ad922b0a58fdd33c3a91c', 1, 'chemistry', '1,2,3', '26272.jpg', '2017-10-02', 10000, '1', '2017-10-21 07:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblterm`
--

CREATE TABLE IF NOT EXISTS `tblterm` (
  `id` int(11) NOT NULL,
  `term` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblterm`
--

INSERT INTO `tblterm` (`id`, `term`, `date`) VALUES
(1, '1st Term', '2017-10-11 23:35:45'),
(2, '2nd Term', '2017-10-11 23:35:45'),
(3, '3rd Term', '2017-10-11 23:35:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_configuration`
--
ALTER TABLE `quiz_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `quiz_settings`
--
ALTER TABLE `quiz_settings`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `quiz_subjectcombination`
--
ALTER TABLE `quiz_subjectcombination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblSubj_ibfk_1` (`CatId`),
  ADD KEY `tblSubj_ibfk_2` (`SubjectId`);

--
-- Indexes for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tblassignment`
--
ALTER TABLE `tblassignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbook_tutor`
--
ALTER TABLE `tblbook_tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfees`
--
ALTER TABLE `tblfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblparent`
--
ALTER TABLE `tblparent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblptanews`
--
ALTER TABLE `tblptanews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpta_excos`
--
ALTER TABLE `tblpta_excos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_ibfk_1` (`StudentId`),
  ADD KEY `result_ibfk_2` (`ClassId`);

--
-- Indexes for table `tblscracth_card`
--
ALTER TABLE `tblscracth_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblscracth_card_use`
--
ALTER TABLE `tblscracth_card_use`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_ibfk_2` (`card_id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblSubj_ibfk_1` (`ClassId`),
  ADD KEY `tblSubj_ibfk_2` (`SubjectId`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubmited_assignment`
--
ALTER TABLE `tblsubmited_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblterm`
--
ALTER TABLE `tblterm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quiz_configuration`
--
ALTER TABLE `quiz_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1067;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quiz_settings`
--
ALTER TABLE `quiz_settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quiz_subjectcombination`
--
ALTER TABLE `quiz_subjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblassignment`
--
ALTER TABLE `tblassignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblbook_tutor`
--
ALTER TABLE `tblbook_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblfees`
--
ALTER TABLE `tblfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblparent`
--
ALTER TABLE `tblparent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblptanews`
--
ALTER TABLE `tblptanews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblpta_excos`
--
ALTER TABLE `tblpta_excos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tblscracth_card`
--
ALTER TABLE `tblscracth_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tblscracth_card_use`
--
ALTER TABLE `tblscracth_card_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tblsubmited_assignment`
--
ALTER TABLE `tblsubmited_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblterm`
--
ALTER TABLE `tblterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD CONSTRAINT `quiz_result_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `quiz_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_3` FOREIGN KEY (`ques_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `tblstudents` (`StudentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_subjectcombination`
--
ALTER TABLE `quiz_subjectcombination`
  ADD CONSTRAINT `quiz_subjectcombination_ibfk_1` FOREIGN KEY (`CatId`) REFERENCES `quiz_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_subjectcombination_ibfk_2` FOREIGN KEY (`SubjectId`) REFERENCES `quiz_subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `tblstudents` (`StudentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`ClassId`) REFERENCES `tblclasses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblscracth_card_use`
--
ALTER TABLE `tblscracth_card_use`
  ADD CONSTRAINT `card_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `tblscracth_card` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD CONSTRAINT `tblSubj_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `tblclasses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblSubj_ibfk_2` FOREIGN KEY (`SubjectId`) REFERENCES `tblsubjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
