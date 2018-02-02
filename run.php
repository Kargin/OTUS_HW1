#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';
use Kargin\Bracketeer;

/**
 * Prints result based on boolean value
 *
 * @param $b
 * @return string
 */
function printBool($b) {
    return $b ? "OK. Brackets in given string ARE balanced.\n": "ERROR. Brackets in given string are NOT balanced.\n";

}

/**
 * Handles warnings
 *
 * @param $errno
 * @param $errstr
 */
function warningHandler($errno, $errstr) {
 echo "ERROR\n$errstr\nERROR CODE = $errno\n";
}

$bracketeer = new Bracketeer();

echo "Press \"Enter\" for using one of three default tests.\n";
echo "Enter path to file that contains string with bracket problem [tests/test_1]: \n";

$line = readline();

if (empty($line)) {
    $line = 'tests/test_1';
}

set_error_handler("warningHandler", E_WARNING);
$testString = file_get_contents($line);
restore_error_handler();

if ($testString !== false) {
    try {
        echo printBool($bracketeer->isBalanced($testString));
    } catch (Exception $e) {
        echo get_class($e) . ":\n";
        echo $e->getMessage() . "\n";
    }
}

