<?php
declare(strict_types=1);

use app\{AltCalculator};


$loader = require( __DIR__ . '/vendor/autoload.php' );
 
$calc = new AltCalculator;

var_dump($calc->run(1,2,"*"));


try
{
var_dump($calc->run());
}
catch (\TypeError $e) 
    {print $e->getMessage(). "\n";}

try
{
var_dump($calc->run(1,2.3,"*"));
}
catch (\TypeError $e) 
    {print $e->getMessage()."\n";}


try
{
var_dump($calc->run(1,2,"h"));
}
catch (\BadFunctionCallException $e) 
    {print $e->getMessage()."\n";}
