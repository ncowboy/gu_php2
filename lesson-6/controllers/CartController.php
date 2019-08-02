<?php


namespace app\controllers;


use app\models\entities\Cart;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\services\Controller;
use app\services\Session;

class CartController extends Controller
{
  public function addAction()
  {
    $post = $this->request->post();
    $cartRepo = new CartRepository();
    $cart_id = $this->isCartExist();
    var_dump($cart_id);
    if (isset($post) && !$cart_id) {
      $cart = new Cart();
      $cart->setProductId($post['cart']['product_id']);
      $cart->setQuantity($post['cart']['quantity']);
      $cart_id = $cartRepo->save($cart);
      if ($cart_id) {
        Session::write('id_cart', $cart_id);
        echo 'ОК';
      }
    } else {
      $this->updateCart($cart_id, $post);
    }
  }

  protected function isCartExist()
  {
    return Session::read('id_cart');
  }

  protected function updateCart($cart_id, $post)
  {
     $id_product = $post['cart']['product_id'];
     $cartRepo = new CartRepository();
     $cart = $cartRepo->getByParams([
       'product_id' => $id_product,
       'id' => $cart_id
       ]);
     if($cart) {
       $cart->quantity += $post['quantity'];
       return $ca
     }
  }
}