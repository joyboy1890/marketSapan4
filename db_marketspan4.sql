-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2019 at 07:40 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marketspan4`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `irregular_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `log_detail_id` int(11) NOT NULL,
  `booking_price` int(11) NOT NULL,
  `booking_status` int(11) DEFAULT '0',
  `booking_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_status`, `booking_create_date`, `booking_update_date`) VALUES
(12, 41, 1, 14, 250, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(13, 41, 1, 3, 250, 3, '2019-11-23 08:17:55', '2019-11-23 08:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cus_address` text COLLATE utf8_unicode_ci NOT NULL,
  `cus_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cus_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cus_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cus_role` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_address`, `cus_tel`, `cus_username`, `cus_password`, `cus_role`) VALUES
(1, 'Administrator', '', '', 'admin', 'password', '1');

-- --------------------------------------------------------

--
-- Table structure for table `irregular`
--

CREATE TABLE `irregular` (
  `irreg_id` int(11) NOT NULL COMMENT 'รหัสพ่อค้าแม่ค้าขาจร',
  `irreg_fname` text NOT NULL COMMENT 'ชื่อ',
  `irreg_lname` text NOT NULL COMMENT 'นามสกุล',
  `irreg_id_card` varchar(13) NOT NULL COMMENT 'รหัสบัตรประจำตัวประชาชน',
  `irreg_address` text NOT NULL COMMENT 'ที่อยู่',
  `irreg_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์ประจำ',
  `irreg_username` text NOT NULL COMMENT 'ชื่อผู้ใช้',
  `irreg_password` text NOT NULL COMMENT 'รหัสผ่าน',
  `irreg_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่เพิ่มข้อมูล',
  `irreg_update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่อัพเดทข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `irregular`
--

INSERT INTO `irregular` (`irreg_id`, `irreg_fname`, `irreg_lname`, `irreg_id_card`, `irreg_address`, `irreg_tel`, `irreg_username`, `irreg_password`, `irreg_create_date`, `irreg_update_date`) VALUES
(41, 'ทดสอบ', 'ทดสอบ', '1234567890123', 'ทดสอบที่อยู่', '0123456789', 'test', 'password', '2019-11-23 08:17:55', '2019-11-23 17:45:51'),
(42, 'ทดสอบ', 'ระบบ', '1349900844772', 'ทดสอบระบบ', '0958397716', 'testsystem', 'password', '2019-11-23 16:33:05', '2019-11-23 17:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_name` text NOT NULL,
  `log_type` text NOT NULL,
  `log_create_date` date NOT NULL,
  `log_update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_name`, `log_type`, `log_create_date`, `log_update_date`) VALUES
(1, 'A', 'อาหารสด', '2019-09-13', '2019-09-13'),
(2, 'B', 'กับข้าวสำเร็จรูป', '2019-08-11', '2019-08-11'),
(3, 'C', 'เสื้อผ้าและของใช้', '2019-11-07', '2019-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `log_detail`
--

CREATE TABLE `log_detail` (
  `log_detail_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `log_detail_name` text NOT NULL,
  `log_detail_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_detail`
--

INSERT INTO `log_detail` (`log_detail_id`, `log_id`, `log_detail_name`, `log_detail_status`) VALUES
(1, 1, 'A1', 0),
(2, 1, 'A2', 0),
(3, 1, 'A3', 1),
(4, 1, 'A4', 0),
(5, 1, 'A5', 0),
(6, 1, 'A6', 0),
(7, 1, 'A7', 0),
(8, 1, 'A8', 0),
(9, 1, 'A9', 0),
(10, 1, 'A10', 0),
(11, 1, 'A11', 0),
(12, 1, 'A12', 0),
(13, 1, 'A13', 0),
(14, 1, 'A14', 1),
(15, 1, 'A15', 0),
(16, 1, 'A16', 0),
(17, 1, 'A17', 0),
(18, 1, 'A18', 0),
(19, 1, 'A19', 0),
(20, 1, 'A20', 0),
(21, 1, 'A21', 0),
(22, 1, 'A22', 0),
(23, 1, 'A23', 0),
(24, 2, 'B1', 0),
(25, 2, 'B2', 0),
(26, 2, 'B3', 0),
(27, 2, 'B4', 0),
(28, 2, 'B5', 0),
(29, 2, 'B6', 0),
(30, 2, 'B7', 0),
(31, 2, 'B8', 0),
(32, 2, 'B9', 0),
(33, 2, 'B10', 0),
(34, 2, 'B11', 0),
(35, 2, 'B12', 0),
(36, 2, 'B13', 0),
(37, 2, 'B14', 0),
(38, 2, 'B15', 0),
(39, 2, 'B16', 0),
(40, 2, 'B17', 0),
(41, 2, 'B18', 0),
(42, 2, 'B19', 0),
(43, 2, 'B20', 0),
(44, 2, 'B21', 0),
(45, 2, 'B22', 0),
(46, 2, 'B23', 0),
(47, 2, 'B24', 0),
(48, 2, 'B25', 0),
(49, 2, 'B26', 0),
(50, 2, 'B27', 0),
(51, 2, 'B28', 0),
(52, 2, 'B29', 0),
(53, 2, 'B30', 0),
(54, 2, 'B31', 0),
(55, 2, 'B32', 0),
(56, 2, 'B33', 0),
(57, 2, 'B34', 0),
(58, 2, 'B35', 0),
(59, 2, 'B36', 0),
(60, 2, 'B37', 0),
(61, 2, 'B38', 0),
(62, 2, 'B39', 0),
(63, 2, 'B40', 0),
(104, 3, 'C1', 0),
(105, 3, 'C2', 0),
(106, 3, 'C3', 0),
(107, 3, 'C4', 0),
(108, 3, 'C5', 0),
(109, 3, 'C6', 0),
(110, 3, 'C7', 0),
(111, 3, 'C8', 0),
(112, 3, 'C9', 0),
(113, 3, 'C10', 0),
(114, 3, 'C11', 0),
(115, 3, 'C12', 0),
(116, 3, 'C13', 0),
(117, 3, 'C14', 0),
(118, 3, 'C15', 0),
(119, 3, 'C16', 0),
(120, 3, 'C17', 0),
(121, 3, 'C18', 0),
(122, 3, 'C19', 0),
(123, 3, 'C20', 0),
(124, 3, 'C21', 0),
(125, 3, 'C22', 0),
(126, 3, 'C23', 0),
(127, 3, 'C24', 0),
(128, 3, 'C25', 0),
(129, 3, 'C26', 0),
(130, 3, 'C27', 0),
(131, 3, 'C28', 0),
(132, 3, 'C29', 0),
(133, 3, 'C30', 0),
(134, 3, 'C31', 0),
(135, 3, 'C32', 0),
(136, 3, 'C33', 0),
(137, 3, 'C34', 0),
(138, 3, 'C35', 0),
(139, 3, 'C36', 0),
(140, 3, 'C37', 0),
(141, 3, 'C38', 0),
(142, 3, 'C39', 0),
(143, 3, 'C40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `bank_id` text NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `payment_price` double NOT NULL,
  `payment_image` text NOT NULL,
  `payment_role` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT '0',
  `payment_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `bank_id`, `reg_id`, `booking_id`, `payment_price`, `payment_image`, `payment_role`, `payment_status`, `payment_create_date`, `payment_update_date`) VALUES
(1, '1', 41, NULL, 222, '1565868386.PNG', 2, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(2, '2', 4, NULL, 200, '1573220689.jpeg', 1, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(3, '1', 41, NULL, 100, '1573756415.png', 2, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(4, '1', 41, 12, 200, '1573756541.png', 2, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(5, '1', 5, NULL, 200, '1573756597.png', 1, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(6, '1', 4, 0, 200, '1574090577.png', 1, 0, '2019-11-23 08:17:55', '2019-11-23 08:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `regular`
--

CREATE TABLE `regular` (
  `reg_id` int(11) NOT NULL COMMENT 'รหัสพ่อค้าแม่ค้าประจำ',
  `reg_fname` text NOT NULL COMMENT 'ชื่อ',
  `reg_lname` text NOT NULL COMMENT 'นามสกุล',
  `reg_id_card` varchar(13) NOT NULL COMMENT 'รหัสบัตรประจำตัวประชาชน',
  `reg_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์ประจำ',
  `reg_address` text NOT NULL COMMENT 'ที่อยู่',
  `reg_zone` varchar(10) NOT NULL COMMENT 'โซน',
  `type_product_id` text NOT NULL COMMENT 'ประเภทโซน',
  `reg_amount_log` int(11) NOT NULL COMMENT 'จำนวนล็อค',
  `reg_log_1` varchar(10) NOT NULL COMMENT 'ล็อคที่',
  `reg_log_2` varchar(10) NOT NULL COMMENT 'ล็อคที่',
  `reg_price` double NOT NULL COMMENT 'ราคารวม',
  `reg_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่เริมขาย',
  `reg_update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่อัพเดทข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regular`
--

INSERT INTO `regular` (`reg_id`, `reg_fname`, `reg_lname`, `reg_id_card`, `reg_tel`, `reg_address`, `reg_zone`, `type_product_id`, `reg_amount_log`, `reg_log_1`, `reg_log_2`, `reg_price`, `reg_create_date`, `reg_update_date`) VALUES
(4, 'มะลิ', 'พรมทอง', '1523695478521', '0954412578', '79 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง ', 'A', 'ประเภทอาหารสด', 1, '1', '', 2000, '2019-11-23 08:17:55', '2019-11-23 16:02:42'),
(5, 'สาริกา', 'แก้วตา', '1254786587412', '0652145963', '80 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง ', 'A', 'ประเภทอาหารสด', 2, '2', '3', 4000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(6, 'ศิริรัตน์', 'อมพร', '1458756931254', '0815214785', '58 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง ', 'A', 'ประเภทอาหารสด', 1, '4', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(7, 'ปดิวรัดา', 'คำทอง', '1523647856910', '0824785691', '90/9 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง ', 'A', 'ประเภทอาหารสด', 1, '5', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(8, 'สดใส', 'นามี', '1900084672356', '0947438201', '15/5 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง \r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '1', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(9, 'สมร', 'ทองดี', '1804873720167', '0873672160', '601/45 ต.หนองบัวระเหว อ.หนองบัวระเหว จ.ชัยภูมิ ', 'B', 'ประเภทกับข้าวสำเร็จรูป', 2, '2', '3', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(10, 'ภพธร', 'พาที', '1904783278324', '0983768125', '52 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง ', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '5', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(11, 'สุวิมล', 'พิทักษ์พูน', '1254785596315', '0625415987', '3 หมู่ที่ 5 ต.ท่าดี อ.ลานสกา จ.นครศรีธรรมราช', 'A', 'ประเภทอาหารสด', 2, '6', '7', 4000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(15, 'พรผกา', 'หมากแก้ว', '1528745962351', '0805214596', '86/1 หมู่ที่ 14 ต.ท่าศาลา อ.ท่าศาลา จ.นครศรีธรรมราช ', 'A', 'ประเภทอาหารสด', 1, '10', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(16, 'ลำไย', 'สามมารถทอง', '1905672561567', '0980982546', '54 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง\r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '6', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(17, 'พริมา', 'พานทอง', '3624529874521', '0905214589', '553/807 หมู่ที่ 5 ซ.31ต.ปากพูน อ.เมืองนครศรีธรรมราช จ.นครศรีธรรมราช', 'A', 'ประเภทอาหารสด', 1, '11', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(18, 'พรศิลป์', 'บัวงาม', '2514587459621', '0854526329', '79 หมู่ที่ 3  ต.เกาะนางคำ อ.ปากพะยูน จ.พัทลุง', 'A', 'ประเภทอาหารสด', 1, '12', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(19, 'มาลัย', 'แก้วงาม', '5963217859214', '0957521459', '553/807 หมู่ที่ 5  ต.ปากพูน อ.เมืองนครศรีธรรมราช จ.นครศรีธรรมราช ', 'A', 'ประเภทอาหารสด', 1, '13', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(20, 'มุทิตา', 'แสนดี', '129037802874', '0865483657', '2/9 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง\r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '7', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(21, 'พลพัฒน์', 'ภูธรภักดี', '5236987452012', '0801452369', '48/1 หมู่ที่ 4 ต.ท่าขึ้น อ.ท่าศาลา จ.นครศรีธรรมราช', 'A', 'ประเภทอาหารสด', 1, '13', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(22, 'พัชราภรณ์', 'เอื้อจิตรเมศ', '5214526987125', '0905214587', '17/4 หมู่ที่ 3 ซ.- ถ.- ต.ร่อนพิบูลย์ อ.ร่อนพิบูลย์ จ.นครศรีธรรมราช', 'A', 'ประเภทอาหารสด', 1, '14', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(23, 'ชัยทัช ', 'เงินท้วม', '9854123695214', '0965412589', '215 หมู่ 9 ต.ทุ่งสุขลา อ.ศรีราชา จ.ชลบุรี', 'A', 'ประเภทอาหารสด', 1, '15', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(24, 'มยุรฉัตร', 'เจือมา', '1208769376254', '0876543726', '8/10ต.มาบยางพร อ.ปลวกแดง จ.ระยอง \r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 2, '8', '19', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(25, 'แดง', 'สมัครคีชัย', '1809876547892', '0865438791', '58/5 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง \r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '9', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(26, 'หญิงภัณฑิรา ', 'ดาวกระจาย', '3251452369245', '0952145236', '99/9 แขวงคลองตันเหนือ  เขตวัฒนา กรุงเทพ ', 'A', 'ประเภทอาหารสด', 1, '16', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(27, 'ปริศนา', 'ตรีนารัตน์', '3253691489325', '0825462179', '187 ถ.ประชาสันติสุข ต.นางรอง อ.นางรอง จ.บุรีรัมย์ ', 'A', 'ประเภทอาหารสด', 1, '17', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(28, 'เด่นชัย', 'ทองดี', '1098756438762', '0976874321', '601/45 ต.หนองบัวระเหว อ.หนองบัวระเหว จ.ชัยภูมิ \r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '4', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(29, 'ณัฐรินทร์', 'คำพา', '5236362147135', '0851452369', '807/265 ม.8 ถ.พหลโยธิน ต.คูคต อ.ลำลูกกา จ.ปทุมธานี', 'A', 'ประเภทอาหารสด', 2, '17', '18', 4000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(30, 'สมหญิง', 'มณีวรรณ', '1409870468756', '0698765434', '69/60 ต.โคกสำราญ อ.บ้านแฮด จ.ขอนแก่น \r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '10', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(31, ' ชัยกร', 'ประสารดี', '1907654897254', '0986543278', ' 12/9 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง\r\n', 'B', 'ประเภทกับข้าวสำเร็จรูป', 1, '11', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(32, 'มนวรรธน์', 'จันดี', '1609567843987', '0867890489', '23 ต.มาบยางพร อ.ปลวกแดง จ.ระยอง\r\n', 'C', 'ประเภทเสื้อผ้าและของใช้', 1, '1', '', 1500, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(36, 'มาดี', 'ใสสะอาด', '1234561234512', '0000000000', 'บ้าน', 'A', 'ประเภทอาหารสด', 1, '44', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55'),
(40, 'มาดี', 'มานะ', '1111111111111', '0000000000', 'บ้านนะจ้ะ', 'A', 'ประเภทอาหารสด', 1, '44', '', 2000, '2019-11-23 08:17:55', '2019-11-23 08:17:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `irregular`
--
ALTER TABLE `irregular`
  ADD PRIMARY KEY (`irreg_id`) USING BTREE;

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `log_detail`
--
ALTER TABLE `log_detail`
  ADD PRIMARY KEY (`log_detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `regular`
--
ALTER TABLE `regular`
  ADD PRIMARY KEY (`reg_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `irregular`
--
ALTER TABLE `irregular`
  MODIFY `irreg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพ่อค้าแม่ค้าขาจร', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_detail`
--
ALTER TABLE `log_detail`
  MODIFY `log_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regular`
--
ALTER TABLE `regular`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพ่อค้าแม่ค้าประจำ', AUTO_INCREMENT=41;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
