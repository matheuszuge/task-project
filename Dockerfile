# Dockerfile para Task project PHP
FROM php:8.2-apache

# Instala extensões necessárias do PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia os arquivos da aplicação para o container
COPY . /var/www/html/

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80

# Define o diretório de trabalho
WORKDIR /var/www/html

# Comando padrão
CMD ["apache2-foreground"]
