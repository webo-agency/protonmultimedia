#!/bin/bash
echo "------------ Restore in DEV mode ------------ "
docker exec mysql_database /usr/bin/mysql -u root --password=password wordpress -r ./test/sql/development-wordpress.sql