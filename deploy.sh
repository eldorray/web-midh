#!/bin/bash

# Script untuk deploy Laravel ke Hostinger
# Jalankan script ini di server hosting

echo "🚀 Starting Laravel Deployment..."

# 1. Set permissions
echo "📝 Setting permissions..."
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# 2. Install dependencies (jika composer tersedia)
if command -v composer &> /dev/null; then
    echo "📦 Installing Composer dependencies..."
    composer install --optimize-autoloader --no-dev
else
    echo "⚠️  Composer not found. Please install dependencies manually."
fi

# 3. Generate application key (jika belum ada)
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating application key..."
    php artisan key:generate
fi

# 4. Create symbolic link for storage
echo "🔗 Creating storage link..."
php artisan storage:link

# 5. Optimize for production
echo "⚡ Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

echo "✅ Deployment completed successfully!"
echo ""
echo "📋 Next steps:"
echo "1. Update .env file with production settings"
echo "2. Set APP_ENV=production"
echo "3. Set APP_DEBUG=false"
echo "4. Configure database credentials"
echo "5. Test your application"
