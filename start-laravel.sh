cat > start-laravel.sh <<'EOF'
#!/bin/bash
# 1) Permisos correctos
chown -R www-data:www-data /app/storage /app/bootstrap/cache
chmod -R ug+rw /app/storage /app/bootstrap/cache

# 2) Migraciones (si no se han corrido)
cd /app
# 1) ¿Hay alguna migración ejecutada?
MIGRATED=$(php artisan migrate:status --no-ansi | grep -c 'Ran' || echo 0)

if [ "$MIGRATED" -eq 0 ]; then
    # DB está vacía → crearla + seed + plantilla
    php artisan template:install
else
    # DB ya tiene datos → solo asegurar que falta poco
    php artisan migrate --force || true
fi

# 3) Delegar al arranque original
exec "$@"
EOF
chmod +x start-laravel.sh
