#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: zeolite
 * Date: 03.01.18
 * Time: 12:14
 */

function printBool($b) {return ($b) ? 'OK' : 'NOT OK';}

$test_string=file_get_contents('/home/zeolite/OTUS/HW1/composer_bracketeer/src/string');
echo $test_string;
try {
    echo printBool(isBalanced($test_string));
} catch (Exception $e) {
    echo get_class($e) . ": " . $e->getMessage();
}