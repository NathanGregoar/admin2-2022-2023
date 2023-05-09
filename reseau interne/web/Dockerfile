FROM ubuntu:latest

LABEL group="2TM2-5"

ENV DEBIAN_FRONTEND=noninteractive 

# Install Apache and PHP
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Set up document root and enable Apache modules
RUN rm -rf /var/www/html && \
    ln -s /opt/html /var/www/html && \
    a2enmod rewrite

# Configure Apache to handle PHP files
RUN echo "<FilesMatch \\.php$>" >> /etc/apache2/mods-enabled/php7.4.conf && \
    echo "SetHandler application/x-httpd-php" >> /etc/apache2/mods-enabled/php7.4.conf && \
    echo "</FilesMatch>" >> /etc/apache2/mods-enabled/php7.4.conf

# Copy HTML and PHP files to container
COPY html /opt/html
COPY php.ini /etc/php/8.1/apache2/php.ini


# Expose port 80 for HTTP traffic
EXPOSE 80

# Restart Apache to apply configuration changes
RUN service apache2 restart

# Start Apache in foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]