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

## License

This software is licensed under the MIT license (see `LICENSE.txt`).

## Author Information

Nimrod Adar, [contact me](mailto:nimrod@shore.co.il) or visit my [website](
https://www.shore.co.il/). Patches are welcome via [`git send-email`](
http://git-scm.com/book/en/v2/Git-Commands-Email). The repository is located
at: <https://www.shore.co.il/git/>.
