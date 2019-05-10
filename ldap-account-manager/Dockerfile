FROM debian:sid-slim
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        ldap-account-manager\
        wget \
    && \
    ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log && \
    ln -sf /dev/stdout /var/log/apache2/lam.log && \
    mv /etc/ldap-account-manager/config.cfg /var/lib/ldap-account-manager/config/config.cfg && \
    ln -sf /var/lib/ldap-account-manager/config/config.cfg /etc/ldap-account-manager/config.cfg && \
    mv /var/lib/ldap-account-manager /var/lib/ldap-account-manager.orig && \
    mkdir -m 755 /var/lib/ldap-account-manager && \
    sed -i 's@SYSLOG@/var/log/apache2/lam.log@' /var/lib/ldap-account-manager.orig/config/config.cfg && \
    sed -i '/<\/VirtualHost>/i RedirectMatch permanent "^/$" "/lam"' /etc/apache2/sites-enabled/000-default.conf && \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/lists/* /var/cache/apt/archives/*
COPY --chown=root:root entrypoint /entrypoint
ENV APACHE_RUN_DIR=/run/apache2 \
    APACHE_LOG_DIR=/var/log/apache2 \
    APACHE_RUN_USER=www-data \
    APACHE_RUN_GROUP=www-data \
    APACHE_PID_FILE=/run/apache2/apache2.pid
EXPOSE 80
VOLUME /var/lib/ldap-account-manager
ENTRYPOINT [ "/entrypoint" ]
CMD [ "apache2", "-DFOREGROUND" ]
HEALTHCHECK CMD wget --spider --quiet http://localhost/lam || exit 1
