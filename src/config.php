<?php

// Global config
define("TEAM_UEBER", "Fotograf");

// Local config
if ($_SERVER['SERVER_NAME'] == 'local.handball-dachau.de') {

    error_reporting(E_ALL);

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'db1340654');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

// LIVE config
} else {

    error_reporting(0);

    define('DB_HOST', 'rdbms.strato.de');
    define('DB_NAME', 'DB1340654');
    define('DB_USER', 'U1340654');
    define('DB_PASSWORD', 'qwasqwas1');

}