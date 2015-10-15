<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1); 
//echo "Hi there";
require 'Slim-2.6.2/Slim/Slim.php';
//echo "aa";
\Slim\Slim::registerAutoloader();
//echo "auto loader";
$app = new \Slim\Slim();
//Enable debugging (on by default)
$app->config('debug', true);
//echo "this is app";
//echo "<pre>";
//print_r($app);
//echo "</pre>";
$app->get('/customer/:name', function ($name) {
    echo "Hello, $name";
});
//echo "Can error be here";
$app->run();
?>
