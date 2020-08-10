from ubuntu:20.04

ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get dist-upgrade -y

RUN apt-get install apache2 libapache2-mod-php7.4 -y

RUN a2enmod php7.4
RUN a2enmod rewrite

# expose port 80 and 443 (ssl) for the web requests
EXPOSE 80
EXPOSE 443

# Manually set the apache environment variables in order to get apache to work immediately.
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_RUN_DIR=/var/run/apache2

# It appears that the new apache requires these env vars as well
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid


# Turn on display errors. We will disable them based on environment
RUN sed -i 's;display_errors = .*;display_errors = On;' /etc/php/7.4/apache2/php.ini
RUN sed -i 's;post_max_size = .*;post_max_size = 10G;' /etc/php/7.4/apache2/php.ini
RUN sed -i 's;upload_max_filesize = .*;upload_max_filesize = 10G;' /etc/php/7.4/apache2/php.ini

# install cron service to tie up the fg
RUN apt-get install cron -y


# Update our apache sites available with the config we created
ADD docker/apache-config.conf /etc/apache2/sites-enabled/000-default.conf


# Add the startup script to the container
ADD docker/startup.sh /root/.


# Add the site's code to the container.
# We could mount it with volume, but by having it in the container, deployment is easier.
COPY --chown=root:www-data app /var/www/my-site
RUN chown root:www-data /var/www
RUN chmod 750 -R /var/www


# use the cron service as foreground process
CMD ["/bin/bash", "/root/startup.sh"]
