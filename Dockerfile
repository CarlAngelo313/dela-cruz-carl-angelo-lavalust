# Use PHP 8.2 with Apache
FROM php:8.2-apache

# 1. Enable mod_rewrite (Crucial for LavaLust/Laravel routing to work)
RUN a2enmod rewrite

# 2. Install system dependencies and required PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip pdo_mysql mbstring bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Configure Apache to use the 'public' folder as the root
# (If your specific version of LavaLust does NOT use a 'public' folder, change this to /var/www/html)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Allow .htaccess overrides so your framework's routing works
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 5. Install Composer (to install your PHP dependencies)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Copy your project files into the container
COPY . /var/www/html/
WORKDIR /var/www/html

# 7. Install PHP dependencies
RUN if [ -f "composer.json" ]; then composer install --no-dev --optimize-autoloader; fi

# 8. Set proper permissions for cache/logs folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/cache /var/www/html/logs 2>/dev/null || true

# 9. Expose port 80 for web traffic
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]