<?php


namespace app\services;


use App\services\renders\IRenderService;

abstract class Controller
{
  protected $defaultAction = 'index';
  protected $action;
  protected $renderer;

  public function __construct(IRenderService $renderer)
  {
    $this->renderer = $renderer;
  }

  public function run($action, $params)
  {
    $this->action = $action ?: $this->defaultAction;
    $method = $this->action . 'Action';
    if (method_exists($this, $method)) {
      $this->$method(implode(', ', $params));
    } else {
      echo "404: страница {$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']} не существует";
    }
  }

  public function render($template, $params = [])
  {
    $content = $this->renderTmpl($template, $params);
    return $this->renderTmpl('layouts/main', [
      'content' => $content
    ]);
  }

  public function renderTmpl($template, $params = [])
  {
    return $this->renderer->renderTmpl($template, $params);
  }
}