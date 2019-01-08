DROP DATABASE IF EXISTS `login`;

CREATE DATABASE `login`;
USE `login`;

DROP TABLE IF EXISTS `credential`;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`ID`, `Username`, `Password`, `First_Name`, `Last_Name`) VALUES
(1, 'GJ-X-43573@Cred.com', '12654', 'George', 'Jackson'),
(2, 'JP-S-96735@Cred.com', 'sdf4', 'Jamie', 'Peterson'),
(3, 'JS-F-56318@Cred.com', 'jimson', 'Jimmy', 'Sanders'),
(4, 'SW-Q-32453@Cred.com', 'willy', 'Samson', 'Williams'),
(5, 'MC-K-68055@Cred.com', 'mikecarter', 'Michael', 'Carter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
-- COMMIT;
