#!/bin/bash
echo "------------ Installation in DEV mode ------------ "

export WP_ENV=development
echo 'ServerName localhost' >> /etc/apache2/apache2.conf
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.pha
/usr/local/bin/php wp-cli.phar --info
chmod +x wp-cli.pha
/usr/local/bin/php wp-cli.phar plugin activate --all --allow-root

echo "------------ END INSTALLATION ------------"
# /usr/local/bin/php wp-cli.phar db export --add-drop-table --allow-root
# execute apache
exec "apache2-foreground"
