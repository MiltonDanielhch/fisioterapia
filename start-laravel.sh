#!/bin/bash
set -e

# 0) Esperar a que la DB esté levantada y accesible
echo "Esperando a la base de datos..."
until php artisan tinker --execute="echo DB::connection()->getPdo() ? 'DB ready' : die(1);" >/dev/null 2>&1; do
  sleep 2
done

# 1) Permisos
chown -R www-data:www-data /app/storage /app/bootstrap/cache
chmod -R ug+rw /app/storage /app/bootstrap/cache

# 2) Entrar al directorio del proyecto
cd /app

# 3) Ejecutar instalación o migraciones según estado
php artisan template:install -r || true   # -r resetea si ya hay datos
# (O usa migrate --force si prefieres evitar el reset)
# php artisan migrate --force || true

# 4) Arrancar el servidor (php-fpm, octane, etc.)
exec "$@"
