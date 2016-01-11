/* USE   
*********************************************************************/
USE labpetri_com
/* DELETE
*********************************************************************/
/*
DELETE FROM table_name
WHERE some_column=some_value;
*/

DELETE FROM users WHERE email = 'stschou@ucsc.edu';
DELETE FROM users WHERE firstname = 'bob';
DELETE FROM users WHERE email = 'wingshum357@gmail.com';
DELETE FROM users WHERE email = 'hellogoodbye@ucsd.edu'