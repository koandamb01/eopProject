CREATE TABLE `eop`.`users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , 
	`firstname` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`lastname` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`email` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`title` VARCHAR(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`password` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`hash` VARCHAR(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`active` TINYINT(1) NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = MyISAM;

	ALTER TABLE users ADD c_code INT(5) NOT NULL



CREATE TABLE `eop`.`tblstudents` ( 
	`student_id` INT(11) NOT NULL AUTO_INCREMENT, 
	`firstname` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`lastname` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`email` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL , 
	`academic_year` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`c_code` INT(11) NULL DEFAULT NULL, 
    PRIMARY KEY (`student_id`),
    FOREIGN KEY (`c_code`) REFERENCES `users`(`c_code`)) ENGINE = MyISAM;
	

CREATE TABLE `eop`.`tblmentors` ( 
	`mentor_id` INT(11) NOT NULL AUTO_INCREMENT, 
	`firstname` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`lastname` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
	`email` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL , 
	`academic_year` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
    PRIMARY KEY (`mentor_id`)) ENGINE = MyISAM;


CREATE TABLE `eop`.`tblschedule` ( 
	`id` INT(11) NOT NULL AUTO_INCREMENT, 
	`mentor_id` INT(11) NOT NULL,
	`day` INT(1) NOT NULL,
    `start_at` time,
    `end_at` time,
    PRIMARY KEY (`id`),
 	FOREIGN KEY (`mentor_id`) REFERENCES `tblmentors`(`mentor_id`)) ENGINE = MyISAM;


CREATE TABLE `eop`.`tblcourses` ( 
	`course_id` INT(11) NOT NULL AUTO_INCREMENT, 
	`mentor_id` INT(11) NOT NULL,
	`course_name` VARCHAR(3) NOT NULL,
    PRIMARY KEY (`course_id`),
 	FOREIGN KEY (`mentor_id`) REFERENCES `tblmentors`(`mentor_id`)) ENGINE = MyISAM;