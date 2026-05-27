#!/bin/sh

cat > /var/www/html/.env << EOF
APP_NAME=Laravel
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

DB_CONNECTION=${DB_CONNECTION:-mysql}
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT:-3306}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}
EOF

php /var/www/html/artisan config:clear
php /var/www/html/artisan config:cache

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

if [ -n "$SSL_CA_BASE64" ]; then
    echo "$SSL_CA_BASE64" | base64 -d > /var/www/html/ca.pem
    export MYSQL_ATTR_SSL_CA=/var/www/html/ca.pem
fi
