#!/bin/bash
echo "Empty Documentation/"
rm -rf /var/www/html/documentation/*
echo "Reload Documentation/"
phpdoc -d /var/www/html/application/controllers/ -t ../documentation/

