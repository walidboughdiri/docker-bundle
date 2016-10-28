FROM php:5.6-fpm
MAINTAINER Daniel Ribeiro <drgomesp@gmail.com>

COPY conf/php.ini /usr/local/etc/php/conf.d/
COPY conf/pool.conf /usr/local/etc/php/

WORKDIR /app

# Install utilities used by TYPO3 CMS / Flow / Neos
RUN apt-get update \
	&& apt-get install -y \
		imagemagick \
		graphicsmagick \
		zip \
		unzip \
		vim \
		wget \
		curl \
		git \
		mysql-client \
		moreutils \
		dnsutils \
	&& rm -rf /var/lib/apt/lists/*

# pdo + pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

# gd
RUN buildRequirements="libpng12-dev libjpeg-dev libfreetype6-dev" \
	&& apt-get update && apt-get install -y ${buildRequirements} \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/lib \
	&& docker-php-ext-install gd \
	&& apt-get purge -y ${buildRequirements} \
	&& rm -rf /var/lib/apt/lists/*

# iconv + mcrypt
RUN runtimeRequirements="re2c libmcrypt-dev" \
	&& apt-get update && apt-get install -y ${runtimeRequirements} \
	&& docker-php-ext-install iconv mcrypt \
	&& rm -rf /var/lib/apt/lists/*

RUN pecl config-set php_ini /usr/local/etc/php/conf.d/php.ini

# xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# intl
RUN buildRequirements="libicu-dev g++" \
    && apt-get update && apt-get install -y ${buildRequirements} \
    && docker-php-ext-install intl \
    && apt-get purge -y ${buildRequirements} \
    && runtimeRequirements="libicu52" \
    && apt-get install -y --auto-remove ${runtimeRequirements} \
    && rm -rf /var/lib/apt/lists/*

# yaml
RUN buildRequirements="libyaml-dev" \
	&& apt-get update && apt-get install -y ${buildRequirements} \
	&& pecl install yaml \
	&& echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini \
	&& apt-get purge -y ${buildRequirements} \
	&& rm -rf /var/lib/apt/lists/*

# opcache
RUN docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php -- \
      --install-dir=/usr/local/bin \
      --filename=composer && \
      echo "phar.readonly = off" > /usr/local/etc/php/conf.d/phar.ini

CMD php-fpm -F --allow-to-run-as-root
