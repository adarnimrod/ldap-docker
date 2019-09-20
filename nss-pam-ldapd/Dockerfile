FROM debian:buster-slim
# hadolint ignore=DL3008
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        ca-certificates \
        gosu \
        libnss-ldapd \
        libpam-ldapd \
        pamtester \
    && \
    mkdir -p /run/nslcd && \
    chown -R nslcd:nslcd /run/nslcd/ && \
    sed -i 's/compat/compat ldap/g' /etc/nsswitch.conf && \
    apt-get clean && \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/lists/* /etc/nslcd.conf
COPY --chown=root:root entrypoint /
ENV LDAP_URIS=ldapi:/// \
    LDAP_AUTH_TYPE=none \
    LDAP_STARTTLS=false \
    LDAP_BASE_DN="dc=trusted" \
    LDAP_CACERTFILE=/etc/ssl/certs/ca-certificates.crt \
    LDAP_REQCERT=never
ENTRYPOINT [ "/entrypoint" ]
CMD [ "/usr/sbin/nslcd", "--nofork" ]
HEALTHCHECK CMD pgrep nslcd || exit 1
