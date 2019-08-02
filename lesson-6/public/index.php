<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
$request = new \app\services\Request();
$controllerName = $request->getControllerName() ?: 'products';
$actionName = $request->getActionName();

$controllerClass = 'app\\controllers\\' .
  ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
  $controller = new $controllerClass(new \app\services\renders\TwigRenderServices(), $request);
  $controller->run($actionName);
}











