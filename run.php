#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: zeolite
 * Date: 03.01.18
 * Time: 12:14
 */
require_once 'vendor/autoload.php';
use Kargin\Bracketeer;

$bracketeer = new Bracketeer();

function printBool($b) {return $b ? 'OK' : 'NOT OK';}
function warning_handler($errno, $errstr) {
 echo "ERROR\n$errstr\nERROR CODE = $errno\n";
}

$line = readline("Enter path to file that contains string with bracket problem: ");
set_error_handler("warning_handler", E_WARNING);
$test_string = file_get_contents($line);
restore_error_handler();

if ($test_string !== FALSE) {
    echo $test_string;
    try {
        echo printBool($bracketeer->isBalanced($test_string));
    } catch (Exception $e) {
        echo get_class($e) . ": " . $e->getMessage();
    }
}

