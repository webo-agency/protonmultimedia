#!/bin/bash
echo "------------ Backup in DEV mode ------------ "
docker exec mysql_database /usr/bin/mysqldump -u root --password=password wordpress > ./test/sql/development-wordpress.sql