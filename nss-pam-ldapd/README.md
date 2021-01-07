# nss-pam-ldapd

> Dockerized example nss-pam-ldapd.

## Usage

The process running inside the container is `nslcd` which is the nameserver
daemon. To use this container, execute a different process (like `su` or
`getent`) inside the container.

## Environment variables

Name | Default value
\-\-\- | \-\-\-
`LDAP_URIS` | `ldapi:///`
`LDAP_AUTH_TYPE` | `none`
`LDAP_BINDDN`
`LDAP_STARTTLS` | `false`
`LDAP_BASE_DN` | `dc=trusted`
`LDAP_CACERTFILE` | `/etc/ssl/certs/ca-certificates.crt`
`LDAP_REQCERT` | `never`

## License

This software is licensed under the MIT license (see `LICENSE.txt`).

## Author Information

Nimrod Adar, [contact me](mailto:nimrod@shore.co.il) or visit my
[website](https://www.shore.co.il/). Patches are welcome via
[`git send-email`](http://git-scm.com/book/en/v2/Git-Commands-Email). The repository
is located at: <https://git.shore.co.il/expore/>.
