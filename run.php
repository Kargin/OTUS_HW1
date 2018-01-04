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

function printBool($b) {return $b ? "OK\n": "NOT OK\n";}
function warning_handler($errno, $errstr) {
 echo "ERROR\n$errstr\nERROR CODE = $errno\n";
}
echo "Press \"Enter\" for using one of three default tests.\n";
echo "Enter path to file that contains string with bracket problem [tests/test_1]: \n";
$line = readline();
if (empty($line)) {
    $line = 'tests/test_1';
}

set_error_handler("warning_handler", E_WARNING);
$test_string = file_get_contents($line);
restore_error_handler();

if ($test_string !== FALSE) {
    try {
        echo printBool($bracketeer->isBalanced($test_string));
    } catch (Exception $e) {
        echo get_class($e) . ":\n";
        echo $e->getMessage() . "\n";
    }
}

