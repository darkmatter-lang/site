FROM php:8.0.29-fpm-alpine3.16 as php
RUN apk add --update zlib-dev libpng-dev \
	&& docker-php-ext-install mysqli gd \
	&& docker-php-ext-enable mysqli gd

FROM nginx:alpine3.17-slim
LABEL name="darkmatter-site"
LABEL description="Darkmatter Site"

# PHP Binaries
COPY --from=php /usr/local/bin/php /usr/local/bin/php
COPY --from=php /usr/local/sbin/php-fpm /usr/local/sbin/php-fpm

# PHP Libraries
COPY --from=php /usr/lib/* /usr/lib/
COPY --from=php /usr/local/lib/php/extensions /usr/local/lib/php/extensions

# PHP Config
COPY --from=php /usr/local/etc/php-fpm.conf /usr/local/etc/
COPY --from=php /usr/local/etc/php-fpm.d/ /usr/local/etc/php-fpm.d/

# Install dependencies
RUN apk add --update curl-dev

# Add user for PHP
RUN adduser -u 82 -D -S -G www-data www-data \
	&& mkdir -p /usr/local/var/log/ \
	&& touch /usr/local/var/log/php-fpm.log \
	&& chown www-data:www-data /usr/local/var/log/php-fpm.log \
	&& mkdir -p /usr/local/etc/php/conf.d/

# PHP Extensions
COPY --from=php /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/

# Install more dependencies and include entrypoint scripts
RUN apk add --update openssl curl whois file gnupg py3-pip python3 \
	&& echo -e "#!/bin/sh\n\nphp-fpm --daemonize\n" > /docker-entrypoint.d/11-start-php-fpm.sh \
	&& rm /docker-entrypoint.d/10-listen-on-ipv6-by-default.sh

# Make script executable & Generate SSL Certs
RUN chmod +x /docker-entrypoint.d/*.sh \
	&& mkdir -p /etc/nginx/certs \
	&& openssl req -x509 -nodes -days 1460 \
		-subj "/C=US/ST=CA/L=Monterey/O=Darkmatter/CN=darkmatter.local" \
		-newkey rsa:4096 -keyout /etc/nginx/certs/darkmatter.local.key -out /etc/nginx/certs/darkmatter.local.crt

# Create cron 1min and link cron jobs
RUN echo "Initializing cron jobs ..." \
	&& echo "*	*	*	*	*	/usr/bin/php /mnt/public/index.php cron every_minute" >> /etc/crontabs/root \
	&& echo "0	*	*	*	*	/usr/bin/php /mnt/public/index.php cron every_hour" >> /etc/crontabs/root \
	&& echo "0	0	*	*	*	/usr/bin/php /mnt/public/index.php cron every_day" >> /etc/crontabs/root \
	&& crontab -l

EXPOSE 80/tcp
EXPOSE 443/tcp
