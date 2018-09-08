# nss-pam-ldapd

> Dockerized example nss-pam-ldapd.

## Usage

The process running inside the container is `nslcd` which is the nameserver
daemon. To use this container, execute a different process (like `su` or
`getent`) inside the container.

## Environment variables

Name | Default value
--- | ---
`LDAP_URIS` | `ldapi:///`
`LDAP_AUTH_TYPE` | `none`
`LDAP_BINDDN`
`LDAP_STARTTLS` | `false`
`LDAP_BASE_DN` | `dc=trusted`
`LDAP_CACERTFILE` | `/etc/ssl/certs/ca-certificates.crt`
