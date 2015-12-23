/* CREATE
*********************************************************************/

/* USE   
*********************************************************************/
USE labpetri

/* PROFILE ***********************************************************************/
/* USERS
*********************************************************************/
CREATE TABLE IF NOT EXISTS users (
   user_id int(11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id), UNIQUE(email)
) ENGINE = MYISAM;

/* PROFILE PICTURES
***********************************************************************/
CREATE TABLE IF NOT EXISTS profile_pictures (
   user_id int(11) NOT NULL,
   default_picture int(1),
   filename varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* EDUCATION RECORD
***********************************************************************/
CREATE TABLE IF NOT EXIST education_records (
   user_id int(11) NOT NULL
   university varchar(255) NOT NULL,
   degree varchar(255) NOT NULL,
   major varchar(255) NOT NULL,
   minor varchar(255) NOT NULL,
   certifications varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* CONTACT INFORMATION
***********************************************************************/
CREATE TABLE IF NOT EXIST contact_information (
   user_id int(11) NOT NULL,
   email VARCHAR(255) NOT NULL,
   phone varchar(255) NOT NULL,
   linkedin varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* WORK EXPERIENCE
***********************************************************************/
CREATE TABLE IF NOT EXIST work_experiences (
   user_id int(11) NOT NULL,
   position varchar(255) NOT NULL,
   company varchar(255) NOT NULL,
   location varchar(255) NOT NULL,
   details varchar(255) NOT NULL,
   reference varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* RESEARCH PROFILE
***********************************************************************/
CREATE TABLE IF NOT EXISTS lab_notebook (
   user_id int(11) NOT NULL,
   goal varchar(255) NOT NULL,
   interest varchar(255) NOT NULL,
   expertise varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* FILES
***********************************************************************/
CREATE TABLE IF NOT EXISTS research_files (
   user_id int(11) NOT NULL,
   filename varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* LOGIN, REGISTRATION  ***********************************************************************/
/* MAJORS
*********************************************************************/
CREATE TABLE IF NOT EXISTS majors (
   id int(11) NOT NULL AUTO_INCREMENT,
   major varchar(255) NOT NULL,
   PRIMARY KEY (id), UNIQUE (major)
) ENGINE = MYISAM;

/* UNIVERSITIES
*********************************************************************/
CREATE TABLE IF NOT EXISTS universities (
   id int(11) NOT NULL AUTO_INCREMENT,
   university VARCHAR(255) NOT NULL,
   PRIMARY KEY (id), UNIQUE (name)
) ENGINE = MYISAM;

