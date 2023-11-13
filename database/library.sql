-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 05:13 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `first` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '0133299464', 'pfp1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `image` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `published` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`image`, `bid`, `name`, `authors`, `publisher`, `published`, `language`, `description`, `status`, `quantity`) VALUES
('../bookimage/9780071549011, 0071549013.jpg', '9780071549011, 0071549013', 'PHP: A BEGINNER\'S GUIDE', 'Vikram Vaswani', 'McGraw-Hill Education', 'October 2, 2008', 'English', 'English  Essential Skills--Made Easy!\r\n\r\nLearn how to build dynamic, data-driven Web applications using PHP. Covering the latest release of this cross-platform, open-source scripting language, PHP: A Beginner\'s Guide teaches you how to write basic PHP programs and enhance them with more advanced features such as MySQL and SQLite database integration, XML input, and third-party extensions. This fast-paced tutorial provides one-stop coverage of software installation, language syntax and data struc', 'Available', 2),
('../bookimage/9786558940951, 6558940957.jpg', '9786558940951, 6558940957', 'MY INVENTIONS: And Other Writings - Tesla', 'Nikola Tesla', 'Lebooks Editora', 'July 20, 2021', 'English', 'Nikola Tesla was born in 1856, in what is now Croatia. His father was a priest, an intellectual who prodded his son to develop unusual mental discipline. His mother was an inventor of many time-saving devices used for domestic tasks. Nikola Tesla became one of the greatest scientists and inventors that have ever lived. His experiments were far beyond his time, which left much of his work underappreciated until after he passed away. While in the United States, his showmanship and inventions earne', 'Available', 10),
('../bookimage/9781119580355, 1119580358.jpg', '9781119580355, 1119580358', 'Career Development and Counseling', 'Robert W. Lent, Steven D. Brown', 'Wiley', 'November 24, 2020', 'English', 'Discover comprehensive coverage of leading research and theory in career psychology with the newest edition of a canonical work\r\n\r\nThe newly revised and thoroughly updated third edition of Career Development and Counseling retains many features of the celebrated second edition, including in-depth coverage of major theories of career development, interventions and assessment systems across the life span, and the roles of diversity, individual differences, and social factors in career development.', 'Available', 10),
('../bookimage/9781904671602, 1904671608.jpg', '9781904671602, 1904671608', 'Mindreadings', 'Femi Oyebode', 'Royal College of Psychiatrists', '2009', 'English', 'English  What can psychiatry learn from literature? For psychiatrists, literary texts can be valuable tools for furthering our understanding of patients and their conditions. This book explores the fruitful relationships between the written word and central aspects of psychiatric practice. It includes newly commissioned chapters plus articles originally published in the journal Advances in Psychiatric Treatment that have been reworked and updated. The contributors examine such topics as: why doc', 'Available', 10),
('../bookimage/9781605206882, 1605206881.jpg', '9781605206882, 1605206881', 'The Story of My Life', 'Helen Keller', 'Cosimo, Incorporated', 'July 2009', 'English', '*The Story of My Life* may be the most extraordinary autobiography ever written. Its author was only 22 when it was published, in 1903, but her life to that point had already been most uncommon: she had been rendered deaf, blind, and later mute by an illness at the age of 19 months, and only years later learned to read, speak, and understand others through the dedication of a teacher extraordinary in her own right. American author and activist HELEN ADAMS KELLER (1880-1968) became famous thanks ', 'Available', 10),
('../bookimage/9780807056424, 0807056421.jpg', '9780807056424, 0807056421', 'The Great Transformation', 'Karl Polanyi', 'Beacon Press', 'March 28, 2001', 'English', 'In this classic work of economic history and social theory, Karl Polanyi analyzes the economic and social changes brought about by the \"great transformation\" of the Industrial Revolution. His analysis explains not only the deficiencies of the self-regulating market, but the potentially dire social consequences of untempered market capitalism. New introductory material reveals the renewed importance of Polanyi\'s seminal analysis in an era of globalization and free trade.', 'Available', 10),
('../bookimage/9780133522853, 0133522857.jpg', '9780133522853, 0133522857', 'The C++ Programming Language', 'Bjarne Stroustrup', 'Pearson Education', 'July 10, 2013', 'English', 'The new C++11 standard allows programmers to express ideas more clearly, simply, and directly, and to write faster, more efficient code. Bjarne Stroustrup, the designer and original implementer of C++, has reorganized, extended, and completely rewritten his definitive reference and tutorial for programmers ', 'Available', 10),
('../bookimage/9781801071109, 1801071101.jpg', '9781801071109, 1801071101', 'Expert Python Programming', 'Michał Jaworski, Tarek Ziadé', 'Packt Publishing', 'May 28, 2021', 'English', 'Python is used in a wide range of domains owing to its simple yet powerful nature. Although writing Python code is easy, making it readable, reusable, and easy to maintain can be challenging. Complete with best practices, useful tools, and standards implemented by professional Python developers, this fourth edition will help you in not only overcoming such challenges but also learning Python\'s latest features and advanced concepts.', 'Available', 10),
('../bookimage/9780596159900, 0596159900.jpg', '9780596159900, 0596159900', 'Head First HTML and CSS', 'Elisabeth Robson, Eric Freeman', 'O\'Reilly', '2012', 'English', 'Tired of reading HTML books that only make sense after you\'re an expert? Then it\'s about time you picked up Head First HTML and really learned HTML. You want to learn HTML so you can finally create those web pages you\'ve always wanted, so you can communicate more effectively with friends, family, fans, and fanatic customers. You also want to do it right so you can actually maintain and expand your web pages over time so they work in all browsers and mobile devices. Oh, and if you\'ve never heard ', 'Available', 10),
('../bookimage/9780137142521, 0137142528.jpg', '9780137142521, 0137142528', 'Java Performance', 'Charlie Hunt, Binu John', 'Addison-Wesley', '2012', 'English', '\"The definitive master class in performance tuning Java applications...if you love all the gory details, this is the book for you.\"\r\n-James Gosling, creator of the Java Programming Language\r\n\r\nImprovements in the Java platform and new multicore/multiprocessor hardware have made it possible to dramatically improve the performance and scalability of Java software.\r\n\r\n\r\n\r\nJava(tm) Performance covers the latest Oracle and third-party tools for monitoring and measuring performance on a wide variety o', 'Available', 10);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(1, 'user', 'Hi admin, can you add book named \"Coding as a Playground\"');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `uic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first`, `last`, `username`, `password`, `uic`, `email`, `contact`, `pic`) VALUES
('user', 'user', 'user', 'user', '010101010110', 'user@gmail.com', '0111111111', 'pp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
