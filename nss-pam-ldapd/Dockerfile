FROM debian:stretch-slim
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        ca-certificates \
        gosu \
        libnss-ldapd \
        libpam-ldapd \
    && \
    mkdir -p /run/nslcd && \
    chown -R nslcd:nslcd /run/nslcd/ && \
    sed -i 's/compat/compat ldap/g' /etc/nsswitch.conf && \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/lists/* /var/cache/apt/archives/* /etc/nslcd.conf
COPY --chown=root:root entrypoint /
ENV LDAP_URIS=ldapi:/// \
    LDAP_AUTH_TYPE=none \
    LDAP_STARTTLS=false \
    LDAP_BASE_DN="dc=trusted" \
    LDAP_CACERTFILE=/etc/ssl/certs/ca-certificates.crt
ENTRYPOINT [ "/entrypoint" ]
CMD [ "/usr/sbin/nslcd", "--nofork" ]
HEALTHCHECK CMD pgrep nslcd || exit 1
