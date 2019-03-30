<?php
/**
 * 
 */

require_once __DIR__."/../vendor/autoload.php";

use Symfony\Component\Yaml\Yaml;

// $value = Yaml::parse("foo: bar");

// var_dump($value);die;
// // $value = ['foo' => 'bar']


$array = [
    'foo' => 'bar',
    'bar' => ['foo' => 'bar', 'bar' => 'baz'],
];

$yaml = Yaml::dump($array);

file_put_contents('file_demo1.yaml', $yaml);

?>