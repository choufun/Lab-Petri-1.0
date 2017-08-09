#!/bin/bash

# SCRIPT FOR CREATING LABPETRI TABLES
##############################################################

clear
echo "#######################################################"
echo " create: labeptri tables "
echo "#######################################################"

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/create/tables.sql"

echo "#######################################################"
echo " done "
echo "#######################################################"


echo "#######################################################"
echo " insert: labeptri tables: default users "
echo "#######################################################"

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/insert/default/users.sql"

cd /var/www/html/users

mkdir 1/
cd 1/
mkdir connections/
mkdir pictures/
mkdir research/
cd ../

mkdir 2/
cd 2/
mkdir connections/
mkdir pictures/
mkdir research/
cd ../

mkdir 3/
cd 3/
mkdir connections/
mkdir pictures/
mkdir research/
cd ../


echo "#######################################################"
echo " done "
echo "#######################################################"
