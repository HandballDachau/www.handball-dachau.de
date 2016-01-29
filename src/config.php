<?php

// Global config
define("TEAM_UEBER", "Fotograf");

// Local config
if ($_SERVER['SERVER_NAME'] == 'local.handball-dachau.de') {

    $config['debug'] = TRUE;
    error_reporting(E_ALL);

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'db1340654');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

// LIVE config
} else {

    $config['debug'] = FALSE;
    error_reporting(0);

    define('DB_HOST', 'rdbms.strato.de');
    define('DB_NAME', 'DB1340654');
    define('DB_USER', 'U1340654');
    define('DB_PASSWORD', 'qwasqwas1');

}

///**
// * Error handler, passes flow over the exception logger with new ErrorException.
// */
//function log_error( $num, $str, $file, $line, $context = null ) {
//    log_exception( new ErrorException( $str, 0, $num, $file, $line ) );
//}
//
///**
// * Uncaught exception handler.
// */
//function log_exception( Exception $e ) {
//    global $config;
//
//    $message = "Type: " . get_class( $e ) . "; Message: {$e->getMessage()}; File: {$e->getFile()}; Line: {$e->getLine()};";
//    file_put_contents( "logs/exceptions.log", $message . PHP_EOL, FILE_APPEND );
//
//    if ( $config["debug"] == true ) {
//
//        print "<div style='text-align: center;'>";
//        print "<h2 style='color: rgb(190, 50, 50);'>Exception Occured:</h2>";
//        print "<table style='width: 800px; display: inline-block;'>";
//        print "<tr style='background-color:rgb(230,230,230);'><th style='width: 80px;'>Type</th><td>" . get_class( $e ) . "</td></tr>";
//        print "<tr style='background-color:rgb(240,240,240);'><th>Message</th><td>{$e->getMessage()}</td></tr>";
//        print "<tr style='background-color:rgb(230,230,230);'><th>File</th><td>{$e->getFile()}</td></tr>";
//        print "<tr style='background-color:rgb(240,240,240);'><th>Line</th><td>{$e->getLine()}</td></tr>";
//        print "</table></div>";
//    } else {
//        //echo 'Es ist ein Fehler aufgetreten, bitte versuchen Sie es später noch einmal.';
//        mail('nzseokiwi@gmail.com', 'Error auf www.handball-dachau.de', $message);
//    }
//
//    exit();
//}
//
///**
// * Checks for a fatal error, work around for set_error_handler not working on fatal errors.
// */
//function check_for_fatal() {
//    $error = error_get_last();
//    if ( $error["type"] == E_ERROR ) {
//        log_error( $error["type"], $error["message"], $error["file"], $error["line"] );
//    }
//}
//
//register_shutdown_function( "check_for_fatal" );
//set_error_handler( "log_error" );
//set_exception_handler( "log_exception" );
//ini_set( "display_errors", "off" );