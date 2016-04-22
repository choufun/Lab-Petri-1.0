#!/bin/bash

# SCRIPT FOR CREATING LABPETRI TABLES
##############################################################

clear
echo "#######################################################"
echo " create database: labeptri "
echo "#######################################################"

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/create/database.sql"

echo "#######################################################"
echo " done "
echo "#######################################################"