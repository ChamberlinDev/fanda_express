#!/bin/sh
set -e

composer install --no-dev --optimize-autoloader --no-interaction

chown -R www:www /var/www/storage /var/www/bootstrap/cache /var/www/vendor

exec "$@"
