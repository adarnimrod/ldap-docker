FROM debian:stretch-slim
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        gnutls-bin \
        ldap-utils \
        slapd \
    && \
    mkdir -p /run/slapd && \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/lists/* /var/cache/apt/archives/*
COPY entrypoint /
EXPOSE 389
VOLUME [ "/var/lib/ldap" ]
ENV LDAP_URLS="ldap:/// ldapi:/// ldaps:///"
ENTRYPOINT [ "/entrypoint" ]
CMD [ "slapd", "-F", "/etc/ldap/slapd.d", "-u", "openldap", "-g", "openldap", "-h", "\"$LDAP_URLS\"", "-d", "NONE" ]
HEALTHCHECK CMD ldapsearch -b cn=config -H ldapi:/// > /dev/null || exit 1
