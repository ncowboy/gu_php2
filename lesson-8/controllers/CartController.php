<?php


namespace app\controllers;


use app\App;
use app\models\entities\Cart;
use app\models\entities\ProductInCart;
use app\services\Controller;
use app\services\Session;

class CartController extends Controller
{
  public function addAction()
  {
    $post = $this->request->post();
    $response = [];
    $cart_id = $this->isCartExist();
    if (isset($post) && !$cart_id) {
      $cart = new Cart();
      $cart_id = App::call()->cartRepository->save($cart);
      if ($cart_id) {
        Session::write('id_cart', $cart_id);
        $this->addProductInCart($cart_id, $post);
      }
    } else {
      $this->updateCart($cart_id, $post);
    }
    $response['cart_id'] = $cart_id;
    echo json_encode($response);
  }

  public function getAction()
  {
    $response = [];
    $productsInCart = App::call()->productsInCartRepository
      ->getByParams(['cart_id' => $this->request->getId()]);
    foreach ($productsInCart as $value) {
      $arrValue = (array)$value;
      $arrValue['price'] = $value->getProduct()->price;
      $arrValue['name'] = $value->getProduct()->name;
      $arrValue['img'] = $value->getProduct()->img;
      $response[] = $arrValue;
    }
    echo json_encode($response);
  }

  public function clearAction()
  {
    $id = $this->request->post('id');
    if ($id) {
      $productsInCart = App::call()->productsInCartRepository
        ->getByParams(['cart_id' => $id]);
      foreach ($productsInCart as $entity) {
        App::call()->productsInCartRepository->delete($entity);
      };
      echo json_encode(['errors' => 0]);
    } else {
      throw new Exception('Entity not found');
    }
  }

  protected function addProductInCart($cart_id, $post)
  {
    $repo = App::call()->productsInCartRepository;
    $productInCart = new ProductInCart();
    $productInCart->setCartId($cart_id);
    $productInCart->setProductId($post['cart']['product_id']);
    $productInCart->setQuantity($post['cart']['quantity']);
    return $repo->save($productInCart);
  }

  protected function isCartExist()
  {
    return Session::read('id_cart');
  }

  protected function updateCart($cart_id, $post)
  {
    $id_product = $post['cart']['product_id'];
    $repo = App::call()->productsInCartRepository;
    $productInCart = $repo->getByParams([
      'product_id' => $id_product,
      'cart_id' => $cart_id
    ])[0];
    if ($productInCart) {
      $productInCart->quantity += $post['cart']['quantity'];
      return $repo->save($productInCart);
    } else {
      $productInCart = new ProductInCart();
      $productInCart->setQuantity($post['cart']['quantity']);
      $productInCart->setProductId($post['cart']['product_id']);
      $productInCart->setCartId($cart_id);
      return $repo->save($productInCart);
    }
  }

  public function decreaseAction()
  {
    $post = $this->request->post() ?? null;
    if (!is_null($post)) {
      $repo = App::call()->productsInCartRepository;
      $product = $repo->getByParams([
        'product_id' => $post['product_id'],
        'cart_id' => $post['cart_id']
      ])[0];
      $qty = $product->getQuantity();
      if((int)$qty === 1) {
         $repo->delete($product);
      } else {
        $product->setQuantity(--$qty);
        $repo->save($product);
      }
      $response['cart_id'] = $post['cart_id'];
      echo json_encode($response);
    }
  }
}