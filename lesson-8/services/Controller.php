<?php


namespace app\services;

use app\App;
use app\models\repositories\ProductInCartRepository;
use App\services\renders\IRenderService;

/**
 * Class Controller
 * @package app\services
 * @property Request $request
 */
abstract class Controller
{
  protected $defaultAction = 'index';
  protected $action;
  protected $renderer;
  protected $request;
  protected $cart = ['id_cart' => 1];

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
    $id_cart = Session::read('id_cart');
    $cart = $id_cart ? $this->renderCart($id_cart) : null;
    $count = $id_cart ? $this->getCartCount($id_cart) : null;
    $authUser = App::call()->user->getUser();
    $params[] = [
      'cart' => $cart,
      'count' => $count,
      'authUser' => is_null($authUser) ? false : (array)$authUser
    ];
    return $this->renderer->renderTmpl($template, $params);
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

  /**
   * @param string $path
   */
  protected function redirect($path = '')
  {
    if (empty($path)) {
      $path = $_SERVER['HTTP_REFERER'];
    }
    return header('Location:' . $path);
  }
}