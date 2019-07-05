FROM debian:sid-slim
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        ca-certificates=20190110 \
        ldap-account-manager=6.7-1 \
        patch=2.7.6-4 \
        wget=1.20.1-1.1 \
    && \
    chmod 755 /var/log/apache2 && \
    ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log && \
    ln -sf /dev/stdout /var/log/apache2/lam.log && \
    ln -sf /dev/stdout /var/log/apache2/other_vhosts_access.log && \
    mv /etc/ldap-account-manager/config.cfg /var/lib/ldap-account-manager/config/config.cfg && \
    ln -sf /var/lib/ldap-account-manager/config/config.cfg /etc/ldap-account-manager/config.cfg && \
    mv /var/lib/ldap-account-manager /var/lib/ldap-account-manager.orig && \
    mkdir -m 755 /var/lib/ldap-account-manager && \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/lists/* /var/cache/apt/archives/*
ENV APACHE_RUN_DIR=/run/apache2 \
    APACHE_LOG_DIR=/var/log/apache2 \
    APACHE_RUN_USER=www-data \
    APACHE_RUN_GROUP=www-data \
    APACHE_PID_FILE=/run/apache2/apache2.pid
COPY --chown=root:root patch.diff /root/
COPY --chown=root:root entrypoint /entrypoint
RUN patch --strip 0 --verbose --directory / --input /root/patch.diff && \
    apache2 -t
EXPOSE 80
VOLUME /var/lib/ldap-account-manager
ENTRYPOINT [ "/entrypoint" ]
CMD [ "apache2", "-DFOREGROUND" ]
HEALTHCHECK CMD wget --spider --quiet http://localhost/lam/ --user-agent 'Healthcheck' || exit 1
