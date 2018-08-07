# slapd

> Dockerized OpenLDAP daemon.

## Environment variables

Name | Description | Default value
--- | --- | ---
`LDAP_URLS` | List of URLs to serve. | `ldap:/// ldapi:/// ldaps:///`
`LDAP_ROOTPASS` | Root password.
`LDAP_DOMAIN` | Domain.
`LDAP_ORGANIZATION` | Organization.

## Persistence

The database is at `/var/lib/ldap`.
