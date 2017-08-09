/**
 * PROJECTS
 */
CREATE TABLE IF NOT EXISTS projects (
    post_id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    title VARCHAR(255) NOT NULL,
    topic VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    month VARCHAR(9) NOT NULL,
    day INT(2) NOT NULL,
    year  INT(4) NOT NULL,
    time VARCHAR(8) NOT NULL,
    comment_id VARCHAR(255) NOT NULL,
    views INT(11) NOT NULL,
    members TEXT NOT NULL,
    PRIMARY KEY (post_id)
) ENGINE = MYISAM;

/**
 * PROJECT VIEWERS
 */
CREATE TABLE IF NOT EXISTS project_views (
   post_id INT(11) NOT NULL,
   ip_address VARCHAR(255),
   PRIMARY KEY(post_id)
) ENGINE = MYISAM;

/**
 * PROJECT COMMENTS
 */
CREATE TABLE IF NOT EXISTS project_comments (
    comment_id VARCHAR(255) NOT NULL,
    order_id VARCHAR(255)NOT NULL,
    user_id INT(11) NOT NULL,
    comments TEXT,
    month VARCHAR(9) NOT NULL,
    day INT(2) NOT NULL,
    year  INT(4) NOT NULL,
    time VARCHAR(8) NOT NULL,
   PRIMARY KEY(comment_id)
) ENGINE = MYISAM;

/**
 * QUESTIONS
 */
CREATE TABLE IF NOT EXISTS questions (
    question_id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    question TEXT NOT NULL,
    topic VARCHAR(255) NOT NULL,
    month VARCHAR(9) NOT NULL,
    day INT(2) NOT NULL,
    year  INT(4) NOT NULL,
    time VARCHAR(8) NOT NULL,
    views INT(11) NOT NULL,
    PRIMARY KEY(question_id)
) ENGINE = MYISAM;

/**
 * QUESTION VIEWS
 */
CREATE TABLE IF NOT EXISTS question_views (
    question_id INT(11) NOT NULL,
    ip_address VARCHAR(255),
    PRIMARY KEY(question_id)
) ENGINE = MYISAM;

/**
 * ANSWERS
 */
CREATE TABLE IF NOT EXISTS answers (
    question_id INT(11) NOT NULL,
    order_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    answer TEXT NOT NULL,
    month VARCHAR(9) NOT NULL,
    day INT(2) NOT NULL,
    year  INT(4) NOT NULL,
    time VARCHAR(8) NOT NULL,
    PRIMARY KEY(question_id)
) ENGINE = MYISAM;