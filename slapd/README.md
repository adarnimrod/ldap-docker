# slapd

> Dockerized OpenLDAP daemon.

## Interfaces exposed

The container exposes TCP ports 389 (LDAP) and 636 (LDAPS) as well as the
`ldapi` Unix socket in the `/run/slapd` volume.

## Environment variables

Name | Description | Default value
\-\-\- | \-\-\- | \-\-\-
`LDAP_URLS` | List of URLs to serve. | `ldap:/// ldapi:/// ldaps:///`
`LDAP_ROOTPASS` | Root password.
`LDAP_DOMAIN` | Domain.
`LDAP_ORGANIZATION` | Organization.
`SLAPD_DEBUG_LEVEL` | The `slapd` debug/ log level. | `stats,stats2,none`
`SSL_CERT_FILE` | Location of the SSL certificate file.
`SSL_KEY_FILE` | Location of the SSL key file.
`SSL_CA_FILE` | Location of the SSL certificate authority file.

## SSL

If the relevant environment variables aren't changed from their default values,
on startup the container will generate a key and self-signed certificate with
the FQDN of the container. If the location of the SSL key and certificate are
provided, those are used instead.

## Persistence

The configuration (`cn=config`) and data LDAP directories reside in the
`config` and `data` diretories respectively in the `/var/lib/ldap` volume.
The LDAP directories are generated only if they're missing. Changes to
environment variables afterwards won't change the configuration, since that is
persisted to a volume. There's also the `/var/backups/ldap` volume where the
`backup` script saves snapshots of the LDAP directories (config directory
included).

## License

This software is licensed under the MIT license (see `LICENSE.txt`).

## Author Information

Nimrod Adar, [contact me](mailto:nimrod@shore.co.il) or visit my
[website](https://www.shore.co.il/). Patches are welcome via
[`git send-email`](http://git-scm.com/book/en/v2/Git-Commands-Email). The repository
is located at: <https://git.shore.co.il/expore/>.
