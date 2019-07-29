<?php

use app\services\Autoload;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';

spl_autoload_register(
  [new Autoload(),
    'loadClass']
);

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
  $controller = new $controllerClass();
  $controller->run($actionName, $params);
}









