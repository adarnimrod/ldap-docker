FROM registry.hub.docker.com/library/httpd:2.4.46-alpine
# hadolint ignore=DL3018
RUN apk add --update --no-cache libcap && \
    setcap CAP_NET_BIND_SERVICE=+ep bin/httpd && \
    chown www-data logs
COPY httpd.conf confi/httpd.conf
USER www-data
RUN httpd -v
HEALTHCHECK CMD wget --user-agent 'Docker health check' --spider http://localhost/ || exit 1
