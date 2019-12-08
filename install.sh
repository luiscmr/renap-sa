#!/bin/bash

sudo chgrp -R www-data storage bootstrap/cache;  sudo chmod -R ug+rwx storage bootstrap/cache;  sudo chmod -R 777 storage/

sudo php artisan permission:cache-reset
sudo php artisan cache:forget spatie.permission.cache
sudo php artisan cache:forget spatie.role.cache
sudo php artisan cache:clear
sudo php artisan config:clear
sudo php artisan route:clear
sudo php artisan view:clear

# activar modulos necesarios
php artisan module:enable Autenticacion
php artisan module:enable Usuarios

# migrar la base de datos
php artisan migrate:refresh

# llenar base de datos default por medio de seeds
php artisan module:seed Usuarios

# link de storage
php artisan storage:link



sudo chgrp -R www-data storage bootstrap/cache;  sudo chmod -R ug+rwx storage bootstrap/cache;  sudo chmod -R 777 storage/
