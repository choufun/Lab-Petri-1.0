/* CREATE
*********************************************************************/

/* USE   
*********************************************************************/
USE labpetri

/* PROFILE ************************************************************/
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
CREATE TABLE IF NOT EXISTS profile_picture (
   user_id INT(11) NOT NULL,
   default_picture INT(1),
   filename VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* EDUCATION RECORD
***********************************************************************/
CREATE TABLE IF NOT EXISTS education_records (
   user_id INT(11) NOT NULL,
   university VARCHAR(255) NOT NULL,
   degree VARCHAR(255) NOT NULL,
   major VARCHAR(255) NOT NULL,
   minor VARCHAR(255) NOT NULL,
   certifications VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* CONTACT INFORMATION
***********************************************************************/
CREATE TABLE IF NOT EXISTS contact_informations (
   user_id INT(11) NOT NULL,
   email VARCHAR(255) NOT NULL,
   phone VARCHAR(255) NOT NULL,
   linkedin VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* WORK EXPERIENCE
***********************************************************************/
CREATE TABLE IF NOT EXISTS work_experiences (
   user_id INT(11) NOT NULL,
   position VARCHAR(255) NOT NULL,
   company VARCHAR(255) NOT NULL,
   location VARCHAR(255) NOT NULL,
   details VARCHAR(255) NOT NULL,
   reference VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* RESEARCH PROFILE
***********************************************************************/
CREATE TABLE IF NOT EXISTS lab_notebook (
   user_id INT(11) NOT NULL,
   goal VARCHAR(255) NOT NULL,
   interest VARCHAR(255) NOT NULL,
   expertise VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* FILES
***********************************************************************/
CREATE TABLE IF NOT EXISTS research_files (
   user_id int(11) NOT NULL,
   filename varchar(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* LOGIN, REGISTRATION  ***********************************************/
/* MAJORS
*********************************************************************/
CREATE TABLE IF NOT EXISTS majors (
   id int(11) NOT NULL AUTO_INCREMENT,
   major VARCHAR(255) NOT NULL,
   PRIMARY KEY (id), UNIQUE (major)
) ENGINE = MYISAM;

/* UNIVERSITIES
*********************************************************************/
CREATE TABLE IF NOT EXISTS universities (
   id INT(11) NOT NULL AUTO_INCREMENT,
   university VARCHAR(255) NOT NULL,
   PRIMARY KEY (id), UNIQUE (university)
) ENGINE = MYISAM;

/* UNIVERSITY EXTENSIONS
*********************************************************************/
CREATE TABLE IF NOT EXISTS university_extensions (
   id INT(11) NOT NULL AUTO_INCREMENT,
   extension VARCHAR(255) NOT NULL,
   PRIMARY KEY (id), UNIQUE (extension)
) ENGINE = MYISAM;

/* POSTS
*********************************************************************/
CREATE TABLE IF NOT EXISTS posts (
   post_id INT(11) NOT NULL AUTO_INCREMENT,
   user_id INT(11) NOT NULL,
   title VARCHAR(255) NOT NULL,
   abstract TEXT NOT NULL,
   month VARCHAR(9) NOT NULL,
   day INT(2) NOT NULL,
   yr  INT(4) NOT NULL,
   initial_time VARCHAR(8) NOT NULL,
   comment_id VARCHAR(255) NOT NULL,
   PRIMARY KEY (post_id)
) ENGINE = MYISAM;

/* COMMENTS
*********************************************************************/
CREATE TABLE IF NOT EXISTS comments (
   comment_id VARCHAR(255) NOT NULL,
   order_id VARCHAR(255)NOT NULL,
   comments TEXT,
   month VARCHAR(9),
   day INT(2),
   yr  INT(4),
   initial_time VARCHAR(8)
) ENGINE = MYISAM;
