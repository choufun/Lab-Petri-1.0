USE labpetri;
/*
+-----------------------+
| Tables_in_labpetri    |
+-----------------------+
| comments              |
| contact               |
| education             |
| majors                |
| posts                 |
| profile_picture       |
| research_files        |
| universities          |
| university_extensions |
| users                 |
+-----------------------+
*/

SHOW TABLES;

CREATE TABLE IF NOT EXISTS admins (
   user_id int(11) NOT NULL AUTO_INCREMENT,
   firstname VARCHAR(255) NOT NULL,
   lastname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   PRIMARY KEY (user_id), UNIQUE(email)
) ENGINE = MYISAM;

DESCRIBE admins;

/*
   ADMINISTRATION ACCOUNTS
   
   INSERT INTO table_name (column1, column2, column3,...)
   VALUES (value1, value2, value3,...)
   
**************************************************************************************************/
INSERT INTO admins (user_id, firstname, lastname, email, password)
VALUES ('1', 'Steven', 'Chou', 'steven.chou@labpetri.com', '1abyssia');

INSERT INTO admins (user_id, firstname, lastname, email, password)
VALUES ('2', 'Nghia', 'Nguyen', 'nghia.nguyen@labpetri.com', 'megamanxu');

INSERT INTO admins (user_id, firstname, lastname, email, password)
VALUES ('3', 'Kevin', 'Shum', 'kevin.shum@labpetri.com', 'Laser301!');

INSERT INTO admins (user_id, firstname, lastname, email, password)
VALUES ('4', 'Brian', 'Nguyen', 'brian.nguyen@labpetri.com', 'labpeetree');

SELECT * FROM admins;
