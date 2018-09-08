# LDAP Account Manager

> Dockerized LDAP Account Manager.

## Usage

The image isn't configured with environment variables, instead it uses a volume
for `/var/lib/ldap-account-manager` that contains the application's
configuration files. On first run the default files are copied to the volume and
the configuration is done through the application itself.
