FROM php:8.1-apache

# Atualiza os pacotes e instala as dependências necessárias para o cURL
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*

# Instala a extensão cURL do PHP
RUN docker-php-ext-install curl

# Copia os arquivos do site para a pasta padrão do Apache
COPY . /var/www/html/

EXPOSE 80
