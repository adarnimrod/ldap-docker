<?php

$servers = new Datastore();

$servers->newServer('ldap_pla');
$servers->setValue('server', 'name', getenv('PLA_NAME') ?: 'LDAP Server');
$servers->setValue('server', 'host', getenv('PLA_HOST') ?: 'slapd');
$servers->setValue('server', 'port', getenv('PLA_PORT') ?: '389');
$servers->setValue('server', 'base', array(getenv('PLA_BASE_DN') ?: ''));
$servers->setValue('login', 'auth_type', getenv('PLA_AUTH_TYPE') ?: 'cookie');
$servers->setValue('login', 'bind_id', getenv('PLA_BIND_ID') ?: '');
$servers->setValue('server', 'tls', strtolower(getenv('PLA_TLS') ?: 'false') == 'true');

?>
