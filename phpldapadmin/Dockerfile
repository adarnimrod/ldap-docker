FROM alpine:3.8
RUN apk add --update --no-cache phpldapadmin php5-apache2 php5-openssl && \
    ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log && \
    mkdir -p /run/apache2/

COPY --chown=root:root config.php /usr/share/webapps/phpldapadmin/config/
COPY --chown=root:root phpldapadmin.conf /etc/apache2/conf.d/
ENV PLA_HOST=ldapi://%2frun%2fslapd%2fldapi
CMD [ "httpd", "-DFOREGROUND" ]
HEALTHCHECK CMD wget --spider --quiet http://localhost/htdocs/index.php || exit 1
