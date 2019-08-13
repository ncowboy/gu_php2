<?php

namespace app\services\renders;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderServices implements IRenderService
{
  public $tmplPath = '../views';

  public function renderTmpl($template, $params = [])
  {
    $loader = new FilesystemLoader($this->tmplPath);
    $twig = new Environment($loader, ['debug' => true]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $template = $twig->loadTemplate("{$template}.twig");
    return $template->render($params);
  }

}