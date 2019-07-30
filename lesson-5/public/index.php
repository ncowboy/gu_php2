<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../vendor/Autoload.php';


$controllerName = $_GET['c'] ?: 'products';
$actionName = $_GET['a'];
$params = [];
foreach ($_GET as $key => $param) {
  if($key !== 'a' && $key !== 'c'){
    $params[$key] = $param;
  }
}

$controllerClass = 'app\\controllers\\' .
  ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
  $controller = new $controllerClass(new \app\services\renders\TwigRenderServices());
  $controller->run($actionName, $params);
}









