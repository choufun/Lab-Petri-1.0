/* USE   
*********************************************************************/
USE labpetri_com

/* CREATE
*********************************************************************/
/* USERS */
CREATE TABLE IF NOT EXISTS users (
   user_id int(11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   major VARCHAR(255) NOT NULL,
   school VARCHAR(255) NOT NULL,
   occupation VARCHAR(255),
   experience VARCHAR(255),
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* SCHOOLS */
CREATE TABLE IF NOT EXISTS schools (
   id int(11) NOT NULL AUTO_INCREMENT,
   name VARCHAR(255) NOT NULL,
   PRIMARY KEY (id), UNIQUE (name)
) ENGINE = MYISAM;

/* SESSIONS */
CREATE TABLE IF NOT EXISTS ci_sessions (
   session_id varchar(40) DEFAULT '0' NOT NULL,
   ip_address varchar(45) DEFAULT '0' NOT NULL,
   user_agent varchar(120) NOT NULL,
   last_activity int(10) unsigned DEFAULT 0 NOT NULL,
   user_data text NOT NULL,
   PRIMARY KEY (session_id),
   KEY last_activity_idx (last_activity)
);

/* POSTS */
CREATE TABLE IF NOT EXISTS posts (
   post_id int(11) NOT NULL AUTO_INCREMENT,
   user_id int(11) NOT NULL,
   title VARCHAR(255) NOT NULL,
   abstract TEXT,
   topic VARCHAR(255) NOT NULL,
   additional_info TEXT,
   file_path TEXT,   
   month VARCHAR(9) NOT NULL,
   day int(2) NOT NULL,
   yr  int(4) NOT NULL,
   initial_time TIME NOT NULL,
   PRIMARY KEY (post_id)
) ENGINE = MYISAM;

/* MAJORS */
CREATE TABLE IF NOT EXISTS majors
(
   id int(11) NOT NULL AUTO_INCREMENT,
   major VARCHAR(255) NOT NULL,
   PRIMARY KEY (id)
) ENGINE = MYISAM;

/*  EMAIL EXTENSIONS */
CREATE TABLE IF NOT EXISTS ext
(
   email VARCHAR(255) NOT NULL,
   UNIQUE (email)
) ENGINE = MYISAM;

/* FILES */
CREATE TABLE IF NOT EXISTS files (
   filename varchar(255) NOT NULL,
   user_id int(11) NOT NULL
) ENGINE = MYISAM;

/* PROFILE PICTURE */
CREATE TABLE IF NOT EXISTS profile_picture (
   filename varchar(255) NOT NULL,
   user_id int(11) NOT NULL
) ENGINE = MYISAM;

/* CONTACT INFORMATION
***********************************************************************/
CREATE TABLE IF NOT EXIST contact_information (
   user_id int(11) NOT NULL,
   email VARCHAR(255) NOT NULL,
   phone varchar(255) NOT NULL,
   linkedin varchar(255) NOT NULL,
) ENGINE = MYISAM;

/* EDUCATION INFORMATION
***********************************************************************/
CREATE TABLE IF NOT EXISTS education (
   user_id int(11) NOT NULL,
   university varchar(255) NOT NULL,
   degree varchar(255) NOT NULL,
   major varchar(255) NOT NULL,
   minor varchar(255) NOT NULL,
   cetifications varchar(255) NOT NULL
) ENGINE = MYISAM;