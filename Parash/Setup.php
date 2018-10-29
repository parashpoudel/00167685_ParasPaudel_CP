<?php

$conn1 = mysqli_connect("localhost","root","");
$create = "CREATE database Parash";

mysqli_query($conn1,$create);
$conn=mysqli_connect('localhost','root','','Parash');

mysqli_query($conn,'CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_desc` varchar(250) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

mysqli_query($conn,"INSERT INTO `company` (`company_id`, `company_name`, `company_email`, `company_desc`, `username`, `user_id`) VALUES
(29, 'Chiran pvt ltd', 'chiran@gmail.com', 'ticketing', 'Chiran', 26),
(30, 'grow by data', 'growbydata@gmail.com', 'works on data', 'Chiran', 26),
(31, 'malkda pvt ltd', 'malkda@gmail.com', 'works on import and export', 'Chiran', 26),
(32, 'Google', 'google@gmail.com', 'search engine', 'Chiran', 26),
(33, 'Namuna vidhya mandir', 'nvm@gmail.com', 'school', 'Chiran', 26)");

mysqli_query($conn,'CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_category` varchar(50) NOT NULL,
  `job_level` varchar(50) NOT NULL,
  `job_no` int(11) NOT NULL,
  `job_shift` varchar(50) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `job_salary` int(11) NOT NULL,
  `job_deadline` date NOT NULL,
  `job_education` varchar(100) NOT NULL,
  `job_experience` int(11) NOT NULL,
  `job_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

mysqli_query($conn,"INSERT INTO `job` (`job_id`, `company_id`, `job_title`, `job_category`, `job_level`, `job_no`, `job_shift`, `job_location`, `job_salary`, `job_deadline`, `job_education`, `job_experience`, `job_upload_date`) VALUES
(28, 29, 'Manager', 'Administration', 'Expert', 1, 'Full time', 'kathmandu', 25000, '2018-10-17', 'Bachelor', 10, '2018-10-08 13:30:18'),
(29, 30, 'Data scientist', 'IT and Telecommunication', 'intern', 10, 'Full time', 'kathmandu', 25000, '2018-10-01', 'Bachelor', 0, '2018-10-08 13:31:15')");

mysqli_query($conn,'CREATE TABLE `job_desc` (
  `job_desc_id` int(11) NOT NULL,
  `job_desc` varchar(200) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_other_spec` varchar(200) NOT NULL,
  `company_benefit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1');
mysqli_query($conn,'CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `postalCode` int(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

mysqli_query($conn,"CREATE TABLE `rate` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($conn,"INSERT INTO `rate` (`company_id`, `user_id`, `rating`, `rate_id`) VALUES
(29, 38, 5, 1),
(29, 29, 5, 4),
(29, 12, 5, 5)");

mysqli_query($conn,"CREATE TABLE `review` (
  `company_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($conn,"INSERT INTO `review` (`company_id`, `comment`, `user_id`) VALUES
(29, 'It is best for data scientist', 38)");

mysqli_query($conn,"INSERT INTO `user` (`user_id`, `email`, `username`, `gender`, `password`, `address`, `phoneNumber`, `postalCode`, `role`) VALUES
(1, 'parash@gmail.com', 'parash', 'male', 'parash', 'Kathmandu', '9876540000', 44600, 'admin'),
(2, 'ashish@gmail.com', 'ashish', 'male', 'aaa', 'thulo varyang', '9800000000', 44600, 'user'),
(3, 'manjil@gmail.com', 'manjil', 'male', 'man123', 'sankhuwasava', '987654', 98765, 'user'),
(5, 'sumanshresthas670@gmail.com', 'sumana', 'male', 'aaa', 'kathmandu', '9816341959', 44600, 'user'),
(10, 'dhimal@gmail.com', 'juman', 'female', 'aaa', 'dharan', '9819872342', 44300, 'employer'),
(12, 'juman@gmail.com', 'jumanji', 'male', 'aaa', 'kathmandu', '98163401918', 44600, 'employer'),
(15, 'suman@gmail.com', 'suman670', 'male', 'aa', 'biratnagar', '9819276510', 44300, 'employer'),
(25, 'dipesh@gmail.com', 'Dipesha', 'male', 'aa', 'kathmandu', '98197029292', 44600, 'employer'),
(26, 'chiran@gb.com', 'Chiran', 'male', 'aa', 'kathmandu', '981567890', 44600, 'employer'),
(28, 'dipes@gmail.com', 'Dipes', 'male', 'a', 'kathmandu', '9813493933', 44600, 'employer'),
(29, 'bipin@gmail.com', 'bipin', 'male', 'aa', 'kathmandu', '9816456789', 44600, 'employer')");

mysqli_query($conn,'ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD UNIQUE KEY `company_email` (`company_email`)');

mysqli_query($conn,'ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`)');

mysqli_query($conn,'ALTER TABLE `job_desc`
  ADD PRIMARY KEY (`job_desc_id`)');

mysqli_query($conn,'ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`)');

mysqli_query($conn,'ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34');

mysqli_query($conn,'ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30');

mysqli_query($conn,'ALTER TABLE `job_desc`
  MODIFY `job_desc_id` int(11) NOT NULL AUTO_INCREMENT');

mysqli_query($conn,'ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;');
header('location: index.php');

?>