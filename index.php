<?php

$url = (isset($_GET["url"])) ? $_GET["url"] : "Index/index";
$url = (explode("/", $url));

$controller = (isset($url[0])) ? $url[0]."_controller" : "Index_controller";
$method = ($url[1] != null) ? $url[1] : 'index';
$params = (isset($url[2]) && $url[2] != null) ? $url[2] : null;

echo "Controller: " . $controller;
echo "<br> Method: " . $method;
echo "<br> Params: " . $params;
echo "<pre>";
var_dump($url);
echo "<pre>";
