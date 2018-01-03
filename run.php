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

function printBool($b) {return ($b) ? 'OK' : 'NOT OK';}

$test_string=file_get_contents('/home/zeolite/OTUS/HW1/composer_bracketeer/src/string');
echo $test_string;
try {
    echo printBool($bracketeer->isBalanced($test_string));
} catch (Exception $e) {
    echo get_class($e) . ": " . $e->getMessage();
}