# PHP-CRUD-Application

fully functional employee CRUDapplication in php

CREATE DATABASE company

CREATE TABLE `employee_record` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `emp_name` varchar(20) NOT NULL DEFAULT '---',
  `emp_age` varchar(3) DEFAULT '---',
  `emp_role` varchar(25) NOT NULL DEFAULT '---',
  `salary` varchar(8) NOT NULL DEFAULT '---',
  `home_address` varchar(300) NOT NULL DEFAULT '---',
  `sex` varchar(10) NOT NULL DEFAULT '---'
) AUTO_INCREMENT=100;


in project multiselect delete is currently not working....
