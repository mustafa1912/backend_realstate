#!/bin/bash
cp /home/site/wwwroot/default /etc/nginx/sites-available/default
service nginx reload
cd /home/site/wwwroot
rm -f bootstrap/cache/*.php
php artisan package:discover
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache