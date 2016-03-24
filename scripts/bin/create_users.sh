#!/bin/bash

# SCRIPT FOR CREATING TEMP USERS
##############################################################

clear
echo "#######################################################"
echo "- starting create_users process -"
echo "#######################################################"

cd /var/www/html/admin
echo "- entered users/ -"

mkdir 1/
echo "- user one made -"

mkdir 2/
echo "- user two made -"

mkdir 3/
echo "- user three made -"

mkdir 4/
echo "- user four made -"

ls

rm -rf 1/
echo "- user one deleted -"

rm -rf 2/
echo "- user one deleted -"

rm -rf 3/
echo "- user one deleted -"

rm -rf 4/
echo "- user one deleted -"

ls

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/admin/create.sql"

echo "#######################################################"
echo "- finished create_users process -"
echo "#######################################################"