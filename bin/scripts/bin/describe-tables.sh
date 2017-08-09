#!/bin/bash

# SCRIPT FOR CREATING LABPETRI TABLES
##############################################################

clear
echo "#######################################################"
echo " describe: labeptri tables "
echo "#######################################################"

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/describe/tables.sql"

echo "#######################################################"
echo " done "
echo "#######################################################"