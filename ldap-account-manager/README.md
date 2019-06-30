# LDAP Account Manager

> Dockerized LDAP Account Manager.

## Usage

The image isn't configured with environment variables, instead it uses a volume
for `/var/lib/ldap-account-manager` that contains the application's
configuration files. On first run the default files are copied to the volume and
the configuration is done through the application itself. The default master
password is `lam`.

## License

This software is licensed under the MIT license (see `LICENSE.txt`).

## Author Information

Nimrod Adar, [contact me](mailto:nimrod@shore.co.il) or visit my [website](
https://www.shore.co.il/). Patches are welcome via [`git send-email`](
http://git-scm.com/book/en/v2/Git-Commands-Email). The repository is located
at: <https://www.shore.co.il/git/>.
