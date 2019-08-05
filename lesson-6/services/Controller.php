<?php


namespace app\services;

use app\models\repositories\ProductInCartRepository;
use App\services\renders\IRenderService;

abstract class Controller
{
  protected $defaultAction = 'index';
  protected $action;
  protected $renderer;
  protected $request;

  public function __construct(IRenderService $renderer, Request $request)
  {
    $this->renderer = $renderer;
    $this->request = $request;
  }

  public function run($action)
  {
    $this->action = $action ?: $this->defaultAction;
    $method = $this->action . 'Action';
    if (method_exists($this, $method)) {
      $this->$method();
    } else {
      echo "404: страница {$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']} не существует";
    }
  }

  public function render($template, $params = [])
  {
    $content = $this->renderTmpl($template, $params);
    $id_cart = Session::read('id_cart');
    $cart = $id_cart ? $this->renderTmpl('cart_header', $this->renderCart($id_cart)) : null;
    $count = $id_cart ? $this->getCartCount($id_cart) : null;
    return $this->renderTmpl('layouts/main', [
      'content' => $content,
      'cart' => $cart,
      'count' => $count
    ]);
  }

  public function renderTmpl($template, $params = [])
  {
    return $this->renderer->renderTmpl($template, $params);
  }

  public function getId()
  {
    return $this->request->getId();
  }

  protected function renderCart($id_cart)
  {
    $result = [];
    $productInCartRepo = new ProductInCartRepository();
    $productsInCart = $productInCartRepo->getByParams(['cart_id' => $id_cart]);
    foreach ($productsInCart as $value) {
      $arrValue = (array)$value;
      $arrValue['price'] = $value->getProduct()->price;
      $arrValue['name'] = $value->getProduct()->name;
      $arrValue['img'] = $value->getProduct()->img;
      $result[] = $arrValue;
    }
    return $result;
  }

  protected function getCartCount($id_cart)
  {
    $result = 0;
    $productInCartRepo = new ProductInCartRepository();
    $productsInCart = $productInCartRepo->getByParams(['cart_id' => $id_cart]);
    foreach ($productsInCart as $value) {
      $result += $value->quantity;
    }
    return $result;
  }
}