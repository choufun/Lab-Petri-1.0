#!/bin/bash

# SCRIPT FOR CREATING TEMP USERS
##############################################################

clear
echo "#######################################################"
echo "- starting create_users process -"
echo "#######################################################"

cd /var/www/html/users
echo "- entered users/ -"

mkdir 8/
mkdir 8/connections/
mkdir 8/research/
mkdir 8/pictures/
echo "- user one made -"

mkdir 9/
mkdir 9/connections/
mkdir 9/research/
mkdir 9/pictures/
echo "- user two made -"

mkdir 10/
mkdir 10/connections/
mkdir 10/research/
mkdir 10/pictures/
echo "- user three made -"

mkdir 11/
mkdir 11/connections/
mkdir 11/research/
mkdir 11/pictures/
echo "- user four made -"

mkdir 12/
mkdir 12/connections/
mkdir 12/research/
mkdir 12/pictures/
echo "- user five made -"

mkdir 13/
mkdir 13/connections/
mkdir 13/research/
mkdir 13/pictures/
echo "- user six made -"

mkdir 14/
mkdir 14/connections/
mkdir 14/research/
mkdir 14/pictures/
echo "- user seven made -"

ls

rm -rf 8/
rm -rf 9/
rm -rf 10/
rm -rf 11/
rm -rf 12/
rm -rf 13/
rm -rf 14/

echo "- removed newly added users -"

ls

mysql --user=root --password=labpeetree -e "source /var/www/html/sql/admin/create.sql"

