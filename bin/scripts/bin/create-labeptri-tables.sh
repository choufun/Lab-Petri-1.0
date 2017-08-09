#!/bin/bash

# SCRIPT FOR CREATING LABPETRI TABLES
##############################################################

clear
echo "#######################################################"
echo " create: labeptri tables "
echo "#######################################################"

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/create/tables.sql"
mysql --user=root --password=labpeetree -e "source /var/www/html/sql/insert/extensions/california.sql"
mysql --user=root --password=labpeetree -e "source /var/www/html/sql/insert/majors/majors.sql"
mysql --user=root --password=labpeetree -e "source /var/www/html/sql/insert/universities/california.sql"



echo "#######################################################"
echo " done "
echo "#######################################################"