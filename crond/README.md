# crond

> Cron container image.

## Description

This container periodically runs the slapd backup script. The script runs in the
slapd container so the `dockerd` socket is bind mounted to this container and
the commands are executed via `docker exec` in the other containers. Thus,
outside of the context of this setup this container doesn't make much sense.

## License

This software is licensed under the MIT license (see `LICENSE.txt`).

## Author Information

Nimrod Adar, [contact me](mailto:nimrod@shore.co.il) or visit my [website](
https://www.shore.co.il/). Patches are welcome via [`git send-email`](
http://git-scm.com/book/en/v2/Git-Commands-Email). The repository is located
at: <https://www.shore.co.il/git/>.
