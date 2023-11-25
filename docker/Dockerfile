# 利用するdockerイメージ
FROM php:8.1.2-apache

# ドキュメントルートをデフォルトから修正（000-default.confをコピーする場合は不要）
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
COPY php.ini /usr/local/etc/php/
#COPY 000-default.conf /etc/apache2/sites-enabled/

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# LaravelAPI用ミドルウェアのインストール
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libfreetype6-dev \
libjpeg62-turbo-dev \
libwebp-dev \
mariadb-client \
wget \
nodejs \
&& docker-php-ext-install pdo_mysql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
&& docker-php-ext-install -j$(nproc) gd

# Node.js と npm をインストール
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs


# Laravelで必要なmodRewriteを有効化
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

# 日本語化
RUN apt update && apt install -y locales locales-all
ENV LC_ALL ja_JP.UTF-8
ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP.UTF-8
