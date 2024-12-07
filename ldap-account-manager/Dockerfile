FROM registry.shore.co.il/httpd:bookworm
USER root
# hadolint ignore=DL3008
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        gettext-base \
        ldap-account-manager \
        patch \
    && \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/lists/* /var/cache/apt/archives/*
COPY --chown=root:root patch.diff /root/
COPY --chown=root:root entrypoint /usr/local/bin/
COPY --chown=root:root lam-setpass /usr/local/bin/
RUN patch --strip 0 --verbose --directory / --input /root/patch.diff && \
    apache2 -t
USER www-data
ENV LDAP_URI=ldapi:///
ENTRYPOINT [ "entrypoint" ]
CMD [ "apache2", "-DFOREGROUND" ]
HEALTHCHECK CMD wget --spider --quiet http://localhost/lam/ --user-agent 'Healthcheck' || exit 1
