<?php

echo "Running setup...\n";

exec('composer install --no-dev --optimize-autoloader');
exec('cp .env.example .env');

// Generate app key
exec('php artisan key:generate');

// Set environment values (if not already done in Render Dashboard)
putenv('APP_ENV=production');
putenv('APP_DEBUG=false');

// Run migrations
exec('php artisan migrate --force');

// Setup environment and database
exec('php artisan p:environment:setup --author="sakinlolu26@gmail.com" --url="https://pterodactyl-smaver.onrender.com" --timezone="UTC" --cache="redis"');
exec('php artisan p:environment:database --host=your-db-host --port=5432 --database=your-db-name --username=your-db-user --password=your-db-password');

// Create admin user (you can update this with your credentials)
exec('php artisan p:user:make --email=sakinlolu26@gmail.com --username=admin --name=Admin --password="1234,,,,mmmm"');

echo "Setup complete.\n";