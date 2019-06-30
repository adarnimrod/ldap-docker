# slapd

> Dockerized OpenLDAP daemon.

## Interfaces exposed

The container exposes TCP ports 389 (LDAP) and 636 (LDAPS) as well as the
`ldapi` Unix socket in the `/run/slapd` volume.

## Environment variables

Name | Description | Default value
--- | --- | ---
`LDAP_URLS` | List of URLs to serve. | `ldap:/// ldapi:/// ldaps:///`
`LDAP_ROOTPASS` | Root password.
`LDAP_DOMAIN` | Domain.
`LDAP_ORGANIZATION` | Organization.

## Persistence

The database is at `/var/lib/ldap`.
