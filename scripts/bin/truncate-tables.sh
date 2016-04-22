#!/bin/bash

# SCRIPT FOR CREATING LABPETRI TABLES
##############################################################

clear
echo "#######################################################"
echo " truncate: labeptri tables "
echo "#######################################################"

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/truncate/tables.sql"

cd /var/www/html/users
cp -rf ./pictures ../


echo "#######################################################"
echo " done "
echo "#######################################################"