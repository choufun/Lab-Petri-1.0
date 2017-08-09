/* USE   
*********************************************************************/
USE labpetri;

/* USERS
*********************************************************************/
CREATE TABLE IF NOT EXISTS users (
   user_id int(11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   verified INT(1) NOT NULL DEFAULT '0',
   hash VARCHAR(32) NOT NULL,
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
CREATE TABLE IF NOT EXISTS education (
   user_id INT(11) NOT NULL,
   university VARCHAR(255) NOT NULL,
   major VARCHAR(255) NOT NULL,
   standing VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* CONTACT INFORMATION
***********************************************************************/
CREATE TABLE IF NOT EXISTS contact (
   user_id INT(11) NOT NULL,
   email VARCHAR(255) NOT NULL,
   phone VARCHAR(255) NOT NULL,
   linkedin VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id)
) ENGINE = MYISAM;

/* RESEARCH FILES
***********************************************************************/
CREATE TABLE IF NOT EXISTS research_files (
   post_id INT(11),
   user_id INT(11) NOT NULL,
   filename VARCHAR(255) NOT NULL
) ENGINE = MYISAM;

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
/*
CREATE TABLE IF NOT EXISTS posts (
   post_id INT(11) NOT NULL AUTO_INCREMENT,
   user_id INT(11) NOT NULL,
   type INT(1) NOT NULL,
   title VARCHAR(255) NOT NULL,
   abstract TEXT NOT NULL,
   topic VARCHAR(255) NOT NULL,
   month VARCHAR(9) NOT NULL,
   day INT(2) NOT NULL,
   yr  INT(4) NOT NULL,
   initial_time VARCHAR(8) NOT NULL,
   comment_id VARCHAR(255) NOT NULL,
   PRIMARY KEY (post_id)
) ENGINE = MYISAM;
*/

/* BLOG POSTS
*********************************************************************/
CREATE TABLE IF NOT EXISTS blog_posts (
   post_id INT(11) NOT NULL AUTO_INCREMENT,
   user_id INT(11) NOT NULL,
   title VARCHAR(255) NOT NULL,
   quotes TEXT NOT NULL,
   blog TEXT NOT NULL,
   month VARCHAR(9) NOT NULL,
   day INT(2) NOT NULL,
   yr  INT(4) NOT NULL,
   initial_time VARCHAR(8) NOT NULL,
   comment_id VARCHAR(255) NOT NULL,
   PRIMARY KEY (post_id)
) ENGINE = MYISAM;

/* BLOG COMMENTS
*********************************************************************/
CREATE TABLE IF NOT EXISTS blog_comments (
   comment_id VARCHAR(255) NOT NULL,
   order_id VARCHAR(255)NOT NULL,
   user_id INT(11) NOT NULL,
   comments TEXT,
   month VARCHAR(9),
   day INT(2),
   yr  INT(4),
   initial_time VARCHAR(8)
) ENGINE = MYISAM;

/* BOOKMARKS
*********************************************************************/
CREATE TABLE IF NOT EXISTS bookmarks (
   bookmark_id INT(11) NOT NULL AUTO_INCREMENT,
   user_id INT(11) NOT NULL,
   post_id INT(11) NOT NULL,
   type VARCHAR(255) NOT NULL,
   PRIMARY KEY(bookmark_id)
) ENGINE = MYISAM;

/* POST VIEWS
*********************************************************************/
CREATE TABLE IF NOT EXISTS blog_post_views (
   post_id INT(11) NOT NULL,
   views INT(11) NOT NULL,
   ip_address VARCHAR(255),
   PRIMARY KEY(post_id)
) ENGINE = MYISAM;

/* FRIEND LISTS
*********************************************************************/
CREATE TABLE IF NOT EXISTS friends (
   user_id INT(11) NOT NULL,
   friend_id INT(11) NOT NULL,
   status VARCHAR(8) NOT NULL,
   action VARCHAR(10) NOT NULL
) ENGINE = MYISAM;

/* MESSAGES
*********************************************************************/
CREATE TABLE IF NOT EXISTS messages (
   group_id TEXT NOT NULL,
   order_id INT(11) NOT NULL,
   user_id INT(11) NOT NULL,
   message TEXT NOT NULL
) ENGINE = MYISAM;

/* NOTIFICATIONS :: messages,
*********************************************************************/
CREATE TABLE IF NOT EXISTS notifications (
   user_id INT(11) NOT NULL,
   friend_id INT(11) NOT NULL,
   new_messages INT(1) NOT NULL DEFAULT '0'
) ENGINE = MYISAM;

/* ACTIVITIES
*********************************************************************/
CREATE TABLE IF NOT EXISTS activities (
   user_id INT(11) NOT NULL,
   type VARCHAR(255) NOT NULL,
   month VARCHAR(9) NOT NULL,
   day INT(2) NOT NULL,
   yr  INT(4) NOT NULL,
   time VARCHAR(8) NOT NULL,
   activity TEXT NOT NULL
) ENGINE = MYISAM;

/* ISSUES
*********************************************************************/
CREATE TABLE IF NOT EXISTS issues (
   issue_id VARCHAR(255) NOT NULL,
   user_id INT(11) NOT NULL
) ENGINE = MYISAM;

/* NEWS
*********************************************************************/
CREATE TABLE IF NOT EXISTS news (
   news_id INT(11) NOT NULL AUTO_INCREMENT,
   title VARCHAR(255) NOT NULL,
   description TEXT NOT NULL,
   url TEXT NOT NULL,
   month VARCHAR(9) NOT NULL,
   day INT(2) NOT NULL,
   yr  INT(4) NOT NULL,
   time VARCHAR(8) NOT NULL,
   PRIMARY KEY(news_id)
) ENGINE = MYISAM;

/* TEST
*********************************************************************/
CREATE TABLE IF NOT EXISTS test (
   message TEXT NOT NULL
) ENGINE = MYISAM;



