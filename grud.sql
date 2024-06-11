-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 03:59 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grud`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `detail` varchar(12000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `Id` int(11) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `class` varchar(100) NOT NULL,
  `place/prize` varchar(200) NOT NULL,
  `seminar/event` varchar(200) NOT NULL,
  `organizer` varchar(200) NOT NULL,
  `competition_type` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_interaction`
--

CREATE TABLE `alumni_interaction` (
  `SNo` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail_of_Alumni` varchar(500) NOT NULL,
  `Type_of_Program` varchar(100) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

CREATE TABLE `association` (
  `SNo` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Event` varchar(120) NOT NULL,
  `Date` date NOT NULL,
  `Strength` int(11) NOT NULL,
  `Winner` varchar(255) NOT NULL,
  `Runner` varchar(255) NOT NULL,
  `Staff_Incharge` varchar(255) NOT NULL,
  `Evidence1` varchar(250) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audio_book`
--

CREATE TABLE `audio_book` (
  `ID` int(10) NOT NULL,
  `Staff_ID` varchar(50) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Title_of_Program` varchar(100) NOT NULL,
  `Organising_Agency` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Prize` varchar(25) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Certificate` varchar(25) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `ID` int(10) NOT NULL,
  `Staff_ID` varchar(25) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Nature_of_Award` varchar(250) NOT NULL,
  `Issued_by` varchar(255) NOT NULL,
  `Awarding_Agency` varchar(200) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beyondsyllabus_activity`
--

CREATE TABLE `beyondsyllabus_activity` (
  `ID` int(11) NOT NULL,
  `Department` varchar(113) NOT NULL,
  `Year` varchar(12) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ID` int(5) NOT NULL,
  `Staff_ID` varchar(6) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Co_Author` varchar(255) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Title_of_book` varchar(150) NOT NULL,
  `Volume` varchar(25) NOT NULL,
  `Address_of_Publisher` varchar(255) NOT NULL,
  `Name_of_author` varchar(100) NOT NULL,
  `Proceeding_of_conference` varchar(50) NOT NULL,
  `Name_of_publisher` varchar(50) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `Issn_isbn_for_proceeding` varchar(10) NOT NULL,
  `Year_of_publishing` year(4) NOT NULL,
  `Date` date NOT NULL,
  `Certificate` varchar(50) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Staff_ID` varchar(25) NOT NULL,
  `Staff_Name` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Organized_by` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(250) NOT NULL,
  `Evidence3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cluster_meeting`
--

CREATE TABLE `cluster_meeting` (
  `ID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Organized_by` varchar(255) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Certificate` varchar(25) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_service`
--

CREATE TABLE `consultancy_service` (
  `ID` int(10) NOT NULL,
  `Name_of_The_Staff` varchar(50) NOT NULL,
  `Name_of_The_Student` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Name_of_Project` varchar(255) NOT NULL,
  `Name_of_Agency` varchar(250) NOT NULL,
  `Agency_Address` varchar(255) NOT NULL,
  `Amount_generated` int(10) NOT NULL,
  `Receipt` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_activity`
--

CREATE TABLE `department_activity` (
  `ID` int(5) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `Event` varchar(50) NOT NULL,
  `Nature_of_program` varchar(150) NOT NULL,
  `Level` varchar(25) NOT NULL,
  `Source_of_Funding` varchar(255) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Name_of_Speaker` varchar(5000) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `No_of_participants` int(5) NOT NULL,
  `To_Date` date NOT NULL,
  `Title_of_Event` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Major` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Industry` varchar(225) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Name_of_Activity` varchar(255) NOT NULL,
  `No_of_Students` varchar(255) NOT NULL,
  `No_of_Faculty` varchar(255) NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `Target_Group` varchar(255) NOT NULL,
  `Type_of_Program` varchar(255) NOT NULL,
  `Photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_code`
--

CREATE TABLE `department_code` (
  `Department` varchar(100) NOT NULL,
  `Department_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_in`
--

CREATE TABLE `department_in` (
  `SNo` int(11) NOT NULL,
  `Major` varchar(255) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Event_Type` varchar(50) NOT NULL,
  `Name_of_Program` varchar(250) DEFAULT NULL,
  `Source_of_Funding_Agency` varchar(25) DEFAULT NULL,
  `Level` varchar(25) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `To_Date` date DEFAULT NULL,
  `Purpose` varchar(255) DEFAULT NULL,
  `Institute_Industry_Address` varchar(255) DEFAULT NULL,
  `Name_of_Activity` varchar(150) DEFAULT NULL,
  `No_of_Faculty` int(10) DEFAULT NULL,
  `No_of_Students` int(10) DEFAULT NULL,
  `Amount` int(10) DEFAULT NULL,
  `Venue` varchar(150) DEFAULT NULL,
  `Target_Group` varchar(250) DEFAULT NULL,
  `Detail_of_Speaker` varchar(250) NOT NULL,
  `Type_of_Program` varchar(50) DEFAULT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disabled`
--

CREATE TABLE `disabled` (
  `Student_ID` varchar(10) NOT NULL,
  `Student_Name` varchar(120) NOT NULL,
  `Department` varchar(225) NOT NULL,
  `Joining_Year` year(4) NOT NULL,
  `Year_of_Passout` year(4) NOT NULL,
  `Type_of_Disabled` varchar(255) NOT NULL,
  `Percentage` int(11) NOT NULL,
  `Evidence1` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dropout`
--

CREATE TABLE `dropout` (
  `id` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Class` varchar(113) NOT NULL,
  `Boys_Strength` int(11) NOT NULL,
  `Girls_Strength` int(11) NOT NULL,
  `Total_Strength` int(11) NOT NULL,
  `Boys_dropout` int(11) NOT NULL,
  `Girls_dropout` int(11) NOT NULL,
  `Total_dropout` int(11) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `year` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `Staff_ID` varchar(25) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Exam_Passed` varchar(255) NOT NULL,
  `Year` year(4) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extension_activity`
--

CREATE TABLE `extension_activity` (
  `Department` varchar(50) NOT NULL,
  `Nature_of_Activity` varchar(400) NOT NULL,
  `Source_of_Fund` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `No_of_Faculty` int(5) NOT NULL,
  `No_of_Students` int(5) NOT NULL,
  `Amount_Spent` int(10) NOT NULL,
  `id` int(255) NOT NULL,
  `Target_Group` varchar(255) NOT NULL,
  `No_of_Participants` int(11) NOT NULL,
  `Objective` varchar(255) NOT NULL,
  `Impact` varchar(255) NOT NULL,
  `Beneficiary` int(11) NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fdp`
--

CREATE TABLE `fdp` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Level` varchar(25) NOT NULL,
  `Title_of_Program` varchar(150) NOT NULL,
  `Speaker` varchar(255) NOT NULL,
  `Organizing_Agency` varchar(100) NOT NULL,
  `Place` varchar(255) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `field_visit`
--

CREATE TABLE `field_visit` (
  `ID` int(10) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Institude_Address` varchar(250) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Staff_Incharge` varchar(255) NOT NULL,
  `No_of_Students` int(11) NOT NULL,
  `Knowledge_gained` varchar(255) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidance2` varchar(255) NOT NULL,
  `Evidance3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `first`
--

CREATE TABLE `first` (
  `id` int(11) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Year` varchar(225) NOT NULL,
  `First_Graduate_Boys_Strength` int(11) NOT NULL,
  `First_Graduate_Girls_Strength` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `futureplans`
--

CREATE TABLE `futureplans` (
  `id` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Year` varchar(12) NOT NULL,
  `file` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grant_applied`
--

CREATE TABLE `grant_applied` (
  `SNo` int(5) NOT NULL,
  `Date` date NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Staff_ID` varchar(25) NOT NULL,
  `Organizing_Secretary` varchar(255) NOT NULL,
  `Level` varchar(25) NOT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Fund_expected` bigint(15) NOT NULL,
  `Agency` varchar(100) NOT NULL,
  `Received` varchar(10) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `green_measures`
--

CREATE TABLE `green_measures` (
  `ID` int(11) NOT NULL,
  `Department` varchar(120) NOT NULL,
  `Year` varchar(12) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest_lecture`
--

CREATE TABLE `guest_lecture` (
  `ID` int(10) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Place` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Certificate` varchar(25) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(12) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Co_Guide` varchar(255) NOT NULL,
  `Student_Name` varchar(300) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Date_of_Submission` date NOT NULL,
  `Date_of_Viva_Voce` date NOT NULL,
  `Date_of_Syndicate_Approval_letter` date NOT NULL,
  `Mentioned` varchar(12) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internship_training`
--

CREATE TABLE `internship_training` (
  `id` int(11) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `traning institute` varchar(200) NOT NULL,
  `instituteconductar details and addr` varchar(250) NOT NULL,
  `date` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `Roll_No` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intra_clge`
--

CREATE TABLE `intra_clge` (
  `SNo` int(11) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Event` varchar(225) NOT NULL,
  `Year` varchar(25) NOT NULL,
  `Date` date NOT NULL,
  `Colleges` int(11) NOT NULL,
  `Teams` int(11) NOT NULL,
  `Students` int(11) NOT NULL,
  `Winner` varchar(255) NOT NULL,
  `Runner` varchar(255) NOT NULL,
  `Staff_Incharge` varchar(250) NOT NULL,
  `Evidence1` varchar(250) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `linkage_for_ojt`
--

CREATE TABLE `linkage_for_ojt` (
  `ID` int(5) NOT NULL,
  `Year` year(4) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Name_of_Partnering_Institution` varchar(250) NOT NULL,
  `Duration` varchar(25) NOT NULL,
  `Nature_of_linkage` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Staff_ID` varchar(10) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `New_Password` varchar(255) NOT NULL,
  `confirm_pass` varchar(255) NOT NULL,
  `User_Type` varchar(10) NOT NULL,
  `Department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mou_signed`
--

CREATE TABLE `mou_signed` (
  `SNo` int(10) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Institute_Company` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Duration` varchar(25) NOT NULL,
  `No_of_Students` int(10) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_teaching_method`
--

CREATE TABLE `new_teaching_method` (
  `Id` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Year` varchar(16) NOT NULL,
  `Report` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nme`
--

CREATE TABLE `nme` (
  `SNo` int(11) NOT NULL,
  `Department` varchar(120) NOT NULL,
  `Title_Of_Paper` varchar(120) NOT NULL,
  `SubjectCode` varchar(255) NOT NULL,
  `Year` varchar(11) NOT NULL,
  `Semester` varchar(7) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Incharge` varchar(123) NOT NULL,
  `Evidence1` varchar(125) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overall_result`
--

CREATE TABLE `overall_result` (
  `ID` int(11) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Name_of_course` varchar(10) NOT NULL,
  `Final_pass_percentage` int(5) NOT NULL,
  `Year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `over_all`
--

CREATE TABLE `over_all` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Event` varchar(255) NOT NULL,
  `Evidance1` varchar(255) NOT NULL,
  `Evidance2` varchar(255) NOT NULL,
  `Evidance3` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_publication`
--

CREATE TABLE `paper_publication` (
  `ID` int(25) NOT NULL,
  `Staff_ID` varchar(25) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Name_of_Journal` varchar(250) NOT NULL,
  `Year_Date` date NOT NULL,
  `Conference_Name` varchar(255) NOT NULL,
  `Title_of_Paper` varchar(255) NOT NULL,
  `ISSN_ISBN` varchar(25) NOT NULL,
  `Indexed` varchar(25) NOT NULL,
  `Page_No` varchar(255) NOT NULL,
  `Impact_Factor` varchar(255) NOT NULL,
  `Scopus` varchar(255) NOT NULL,
  `UGC` varchar(255) NOT NULL,
  `Organization` varchar(225) NOT NULL,
  `Place` varchar(255) NOT NULL,
  `Mentioned` varchar(10) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Level` varchar(25) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phd`
--

CREATE TABLE `phd` (
  `Staff_ID` varchar(25) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `University` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Joining_Year` year(4) NOT NULL,
  `Completing_Year` year(4) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(250) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `ID` int(10) NOT NULL,
  `Student_ID` varchar(25) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `Year` varchar(10) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Placed_In` varchar(255) NOT NULL,
  `Campus` varchar(25) NOT NULL,
  `Evidance` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_pro`
--

CREATE TABLE `project_pro` (
  `SNo` int(11) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Title_of_Project` varchar(100) NOT NULL,
  `Staff_ID` varchar(25) NOT NULL,
  `Staff_Name` varchar(100) NOT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Agency` varchar(100) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Period_of_Project` varchar(25) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_received`
--

CREATE TABLE `project_received` (
  `ID` int(5) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(100) NOT NULL,
  `Co_Investigator` varchar(255) NOT NULL,
  `Duration_of_project` varchar(25) NOT NULL,
  `Name_of_Project` varchar(250) NOT NULL,
  `Nature_of_Project` varchar(25) NOT NULL,
  `Date_of_Implementation` date NOT NULL,
  `Amount_fund_received` int(20) NOT NULL,
  `Name_of_fundingagency` varchar(50) NOT NULL,
  `Year_of_sanction` year(4) NOT NULL,
  `Received` varchar(12) NOT NULL,
  `Certificate` varchar(50) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refresh_orientation_course`
--

CREATE TABLE `refresh_orientation_course` (
  `SNo` int(11) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Name_of_Course` varchar(100) NOT NULL,
  `Place` varchar(250) NOT NULL,
  `Duration_From` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remedial`
--

CREATE TABLE `remedial` (
  `id` int(11) NOT NULL,
  `Staff_ID` varchar(255) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Date` date NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(150) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Guidance` varchar(5) NOT NULL,
  `Year` year(4) NOT NULL,
  `Completed` int(5) DEFAULT NULL,
  `Under_Guidance` int(5) DEFAULT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `ID` int(11) NOT NULL,
  `Student_ID` varchar(12) NOT NULL,
  `Student_Name` varchar(120) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Scholarship_Type` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Evidence` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_or_workshop`
--

CREATE TABLE `seminar_or_workshop` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Level` varchar(50) NOT NULL,
  `Event` varchar(25) NOT NULL,
  `Title_of_Proceeding` varchar(255) NOT NULL,
  `Title_of_Program` varchar(255) NOT NULL,
  `Place` varchar(150) NOT NULL,
  `Presented` varchar(25) NOT NULL,
  `Title_of_Paper` varchar(255) NOT NULL,
  `Page_No` varchar(255) NOT NULL,
  `ISSN` varchar(113) NOT NULL,
  `Mentioned` varchar(25) NOT NULL,
  `Nature_of_Award` varchar(255) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `significant`
--

CREATE TABLE `significant` (
  `id` int(11) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Year` varchar(12) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `significant_achievement`
--

CREATE TABLE `significant_achievement` (
  `ID` int(11) NOT NULL,
  `Department` varchar(113) NOT NULL,
  `Year` varchar(14) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(11) NOT NULL,
  `Staff_ID` varchar(255) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Program_Name` varchar(255) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `special_program`
--

CREATE TABLE `special_program` (
  `SNo` int(5) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Type_of_Program` varchar(250) NOT NULL,
  `To_Date` date NOT NULL,
  `Title_of_Course` varchar(250) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Strength` int(10) NOT NULL,
  `Incharge_Faculty` varchar(150) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Certificate` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_achieve`
--

CREATE TABLE `staff_achieve` (
  `SNo` int(5) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(150) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Event_Name` varchar(150) NOT NULL,
  `Title_of_Program` varchar(255) DEFAULT NULL,
  `Title_of_Paper` varchar(200) DEFAULT NULL,
  `ISSN_ISBN_No` varchar(10) DEFAULT NULL,
  `Indexed` varchar(25) DEFAULT NULL,
  `Venue` varchar(255) DEFAULT NULL,
  `Name_of_Journal` varchar(150) DEFAULT NULL,
  `Date` date NOT NULL,
  `To_Date` date DEFAULT NULL,
  `Level` varchar(25) DEFAULT NULL,
  `Certificate` varchar(50) DEFAULT NULL,
  `Consulting_Agency` varchar(150) DEFAULT NULL,
  `Name_of_Project` varchar(150) DEFAULT NULL,
  `Amount_generated` bigint(15) DEFAULT NULL,
  `Agency_Contact_No` bigint(10) DEFAULT NULL,
  `Name_of_Award` varchar(150) DEFAULT NULL,
  `Organising_Agency` varchar(150) DEFAULT NULL,
  `Duration` varchar(25) DEFAULT NULL,
  `Amount_Received` bigint(15) DEFAULT NULL,
  `Guidance` varchar(10) DEFAULT NULL,
  `Completed` int(15) DEFAULT NULL,
  `Under_guidance` int(15) DEFAULT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Qualification` varchar(150) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Area_of_Interest` varchar(250) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Residential_Address` varchar(250) NOT NULL,
  `Contact_No` bigint(10) NOT NULL,
  `Image_path` varchar(250) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Date_of_Join` date NOT NULL,
  `Year_of_Experience` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `Student_ID` varchar(12) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `Department` varchar(214) NOT NULL,
  `Joining_Year` year(4) NOT NULL,
  `Year_of_Passout` year(4) NOT NULL,
  `Native_State` varchar(255) NOT NULL,
  `Evidence1` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `strength_weakness_dept`
--

CREATE TABLE `strength_weakness_dept` (
  `ID` int(11) NOT NULL,
  `Department` varchar(120) NOT NULL,
  `Year` varchar(12) NOT NULL,
  `File` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SNo` int(10) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Roll_No` varchar(10) NOT NULL,
  `Student_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `Reg_No` varchar(10) NOT NULL,
  `Student_Name` varchar(150) NOT NULL,
  `Class` varchar(150) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Dob` date NOT NULL,
  `Email_ID` varchar(255) NOT NULL,
  `Mobile_No` bigint(10) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `ID` int(10) NOT NULL,
  `Student_ID` varchar(10) NOT NULL,
  `Student_Name` varchar(150) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Event_Type` varchar(50) DEFAULT NULL,
  `Title_of_Event` varchar(500) DEFAULT NULL,
  `Title_of_program` varchar(255) NOT NULL,
  `Title_of_Paper` varchar(255) NOT NULL,
  `Titleoftheproject` varchar(255) NOT NULL,
  `nameofguide` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `Organizer` varchar(250) DEFAULT NULL,
  `beneficiary` varchar(200) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL,
  `Competitive_Exam_Passed` varchar(100) DEFAULT NULL,
  `traininsitiut` varchar(250) NOT NULL,
  `Level` varchar(25) DEFAULT NULL,
  `Place_Prize` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `To_Date` date DEFAULT NULL,
  `Certificate` varchar(250) DEFAULT NULL,
  `Presented` varchar(25) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(255) NOT NULL,
  `Award` varchar(255) NOT NULL,
  `Indexed` varchar(255) NOT NULL,
  `Status` varchar(113) NOT NULL,
  `ISSN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_info`
--

CREATE TABLE `student_personal_info` (
  `Roll_No` varchar(10) NOT NULL,
  `Student_Name` varchar(150) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Gender` varchar(12) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Batch_Year` varchar(10) NOT NULL,
  `Mail_ID` varchar(150) NOT NULL,
  `Mobile_No` bigint(10) NOT NULL,
  `Mode_of_study` varchar(20) NOT NULL,
  `Marital_Status` varchar(10) NOT NULL,
  `Photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_progression`
--

CREATE TABLE `student_progression` (
  `ID` int(5) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Roll_No` varchar(15) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `College` varchar(225) NOT NULL,
  `Batch` varchar(10) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Evidence1` varchar(255) NOT NULL,
  `Evidence2` varchar(225) NOT NULL,
  `Evidence3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `id` int(11) NOT NULL,
  `Staff_ID` varchar(255) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Department_Name` varchar(255) NOT NULL,
  `UG_or_PG` varchar(255) NOT NULL,
  `Place` varchar(255) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `study2`
--

CREATE TABLE `study2` (
  `ID` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `UG_or_PG` varchar(225) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `From_Date` date NOT NULL,
  `External_Examiner` varchar(255) NOT NULL,
  `Industrial_Specialist` varchar(255) NOT NULL,
  `Student_Nomine` varchar(255) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Evidence2` varchar(255) NOT NULL,
  `Evidence3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `womensafety_measures`
--

CREATE TABLE `womensafety_measures` (
  `ID` int(11) NOT NULL,
  `Department` varchar(120) NOT NULL,
  `Year` varchar(12) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Staff_Name` varchar(225) NOT NULL,
  `Staff_ID` varchar(255) NOT NULL,
  `UG_Gain` int(11) NOT NULL,
  `UG_Loss` int(11) NOT NULL,
  `POMU` int(11) NOT NULL,
  `PG_Gain` int(11) NOT NULL,
  `PG_Loss` int(11) NOT NULL,
  `POMP` int(11) NOT NULL,
  `Year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `alumni_interaction`
--
ALTER TABLE `alumni_interaction`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `audio_book`
--
ALTER TABLE `audio_book`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `beyondsyllabus_activity`
--
ALTER TABLE `beyondsyllabus_activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cluster_meeting`
--
ALTER TABLE `cluster_meeting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `consultancy_service`
--
ALTER TABLE `consultancy_service`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department_activity`
--
ALTER TABLE `department_activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department_code`
--
ALTER TABLE `department_code`
  ADD PRIMARY KEY (`Department_Code`);

--
-- Indexes for table `department_in`
--
ALTER TABLE `department_in`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `disabled`
--
ALTER TABLE `disabled`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `dropout`
--
ALTER TABLE `dropout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extension_activity`
--
ALTER TABLE `extension_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdp`
--
ALTER TABLE `fdp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `field_visit`
--
ALTER TABLE `field_visit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `first`
--
ALTER TABLE `first`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `futureplans`
--
ALTER TABLE `futureplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grant_applied`
--
ALTER TABLE `grant_applied`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `green_measures`
--
ALTER TABLE `green_measures`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guest_lecture`
--
ALTER TABLE `guest_lecture`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `internship_training`
--
ALTER TABLE `internship_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intra_clge`
--
ALTER TABLE `intra_clge`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `linkage_for_ojt`
--
ALTER TABLE `linkage_for_ojt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `mou_signed`
--
ALTER TABLE `mou_signed`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `new_teaching_method`
--
ALTER TABLE `new_teaching_method`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nme`
--
ALTER TABLE `nme`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `overall_result`
--
ALTER TABLE `overall_result`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `over_all`
--
ALTER TABLE `over_all`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_publication`
--
ALTER TABLE `paper_publication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phd`
--
ALTER TABLE `phd`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `project_pro`
--
ALTER TABLE `project_pro`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `project_received`
--
ALTER TABLE `project_received`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `refresh_orientation_course`
--
ALTER TABLE `refresh_orientation_course`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `remedial`
--
ALTER TABLE `remedial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seminar_or_workshop`
--
ALTER TABLE `seminar_or_workshop`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `significant`
--
ALTER TABLE `significant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `significant_achievement`
--
ALTER TABLE `significant_achievement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_program`
--
ALTER TABLE `special_program`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `staff_achieve`
--
ALTER TABLE `staff_achieve`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `strength_weakness_dept`
--
ALTER TABLE `strength_weakness_dept`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`Reg_No`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  ADD PRIMARY KEY (`Roll_No`);

--
-- Indexes for table `student_progression`
--
ALTER TABLE `student_progression`
  ADD PRIMARY KEY (`ID`,`Batch`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study2`
--
ALTER TABLE `study2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `womensafety_measures`
--
ALTER TABLE `womensafety_measures`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni_interaction`
--
ALTER TABLE `alumni_interaction`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `association`
--
ALTER TABLE `association`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audio_book`
--
ALTER TABLE `audio_book`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beyondsyllabus_activity`
--
ALTER TABLE `beyondsyllabus_activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cluster_meeting`
--
ALTER TABLE `cluster_meeting`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancy_service`
--
ALTER TABLE `consultancy_service`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_activity`
--
ALTER TABLE `department_activity`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_in`
--
ALTER TABLE `department_in`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropout`
--
ALTER TABLE `dropout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extension_activity`
--
ALTER TABLE `extension_activity`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdp`
--
ALTER TABLE `fdp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_visit`
--
ALTER TABLE `field_visit`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `first`
--
ALTER TABLE `first`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `futureplans`
--
ALTER TABLE `futureplans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grant_applied`
--
ALTER TABLE `grant_applied`
  MODIFY `SNo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `green_measures`
--
ALTER TABLE `green_measures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_lecture`
--
ALTER TABLE `guest_lecture`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_training`
--
ALTER TABLE `internship_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intra_clge`
--
ALTER TABLE `intra_clge`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linkage_for_ojt`
--
ALTER TABLE `linkage_for_ojt`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mou_signed`
--
ALTER TABLE `mou_signed`
  MODIFY `SNo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_teaching_method`
--
ALTER TABLE `new_teaching_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nme`
--
ALTER TABLE `nme`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overall_result`
--
ALTER TABLE `overall_result`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `over_all`
--
ALTER TABLE `over_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_publication`
--
ALTER TABLE `paper_publication`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_pro`
--
ALTER TABLE `project_pro`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_received`
--
ALTER TABLE `project_received`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refresh_orientation_course`
--
ALTER TABLE `refresh_orientation_course`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remedial`
--
ALTER TABLE `remedial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholar`
--
ALTER TABLE `scholar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminar_or_workshop`
--
ALTER TABLE `seminar_or_workshop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `significant`
--
ALTER TABLE `significant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `significant_achievement`
--
ALTER TABLE `significant_achievement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_program`
--
ALTER TABLE `special_program`
  MODIFY `SNo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_achieve`
--
ALTER TABLE `staff_achieve`
  MODIFY `SNo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strength_weakness_dept`
--
ALTER TABLE `strength_weakness_dept`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `SNo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_progression`
--
ALTER TABLE `student_progression`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study`
--
ALTER TABLE `study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study2`
--
ALTER TABLE `study2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `womensafety_measures`
--
ALTER TABLE `womensafety_measures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
