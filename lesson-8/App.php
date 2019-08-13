<?php

namespace app;

use app\services\Request;
use app\traits\TSingleton;

/**
 * Class App
 * @package app
 *
 * @property $db
 * @property $user
 * @property $productsInCartRepository
 * @property $cartRepository
 * @property $productInCartRepository
 * @property $userRepository
 */
class App
{
  private $config;
  private $componentsData;
  private $components = [];

  use TSingleton;

  static public function call(): App
  {
    return static::getInstance();
  }

  public function run($config)
  {
    $this->config = $config;
    $this->componentsData = $config['components'];
    $this->runController();
  }

  public function getConfig($key)
  {
    if ($key == 'components') {
      return [];
    }

    return array_key_exists($key, $this->config)
      ? $this->config[$key]
      : [];
  }

  private function runController()
  {
    $request = new Request();

    $defaultControllerName = $this->config['defaultControllerName'];
    $controllerName = $request->getControllerName() ?: $defaultControllerName;
    $actionName = $request->getActionName();

    $controllerClass = 'app\\controllers\\' .
      ucfirst($controllerName) . 'Controller';
    if (class_exists($controllerClass)) {
      /**@var \app\services\Controller $controller */
      $controller = new $controllerClass(
        new \app\services\renders\TwigRenderServices(),
        $request
      );
      $controller->run($actionName);
    }
  }

  public function __get(string $name)
  {
    if (array_key_exists($name, $this->components)) {
      return $this->components[$name];
    }

    if (array_key_exists($name, $this->componentsData)) {
      $class = $this->componentsData[$name]['class'];
      if (!class_exists($class)) {
        return null;
      }

      if (array_key_exists('config', $this->componentsData[$name])) {
        $config = $this->componentsData[$name]['config'];
        $component = new $class($config);
      } else {
        $component = new $class();
      }
      $this->components[$name] = $component;
      return $component;
    }
    return null;
  }
}