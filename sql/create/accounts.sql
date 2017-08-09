USE accounts;

CREATE TABLE IF NOT EXISTS undergraduates(
   id INT (11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   verified INT(1) NOT NULL DEFAULT '0',
   hash VARCHAR(32) NOT NULL,
   PRIMARY KEY (id), UNIQUE(email)
) ENGINE = MYISAM;

CREATE TABLE IF NOT EXISTS graduates(
   id INT (11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   verified INT(1) NOT NULL DEFAULT '0',
   hash VARCHAR(32) NOT NULL,
   PRIMARY KEY (id), UNIQUE(email)
) ENGINE = MYISAM;

CREATE TABLE IF NOT EXISTS alumnus(
   id INT (11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   verified INT(1) NOT NULL DEFAULT '0',
   hash VARCHAR(32) NOT NULL,
   PRIMARY KEY (id), UNIQUE(email)
) ENGINE = MYISAM;
