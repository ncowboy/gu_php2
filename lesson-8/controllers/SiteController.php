<?php

namespace app\controllers;

use app\App;
use app\models\entities\Order;
use app\models\entities\User;
use app\models\repositories\OrderRepository;
use app\services\Controller;
use app\services\Db;
use app\services\Session;

class SiteController extends Controller
{
  public function indexAction()
  {
    return $this->redirect('/');
  }

  public function loginAction()
  {
    Session::unset('errors');
    $post = $this->request->post();
    if ($post && App::call()->user->login($post['login'], $post['password'])) {
      return $this->redirect('/products');
    } else {
      echo $this->render('login', [
        'errors' => Session::read('errors')
      ]);
    }
  }

  public function logoutAction()
  {
    Session::unset('user_id');
    $this->redirect('/');
  }

  public function registerAction()
  {
    $userRepo = App::call()->userRepository;
    $post = $this->request->post();
    $user = new User();
    if ($user->inputPost($post) && $user->validate() && $userRepo->save($user)) {
      return $this->redirect('/site/login');
    }
    echo $this->render('register', ['errors' => $user->errors]);
  }

  public function checkoutAction()
  {
    $post = $this->request->post();
    $cartRepo = App::call()->cartRepository;
    $orderRepo = new OrderRepository();
    if (empty(Session::read('id_cart'))) {
      $this->redirect('/products');
    }
    if (is_null(App::call()->user->getUser())) {
      $this->redirect('/site/login');
    }
    if ($post) {
      $order = new Order();
      $order->setName($post['name']);
      $order->setPhone($post['phone']);
      $order->setAddress($post['address']);
      $order->setInfo($post['info']);
      $order->setIdUser(App::call()->user->getUser()->getId());
      if ($orderRepo->save($order)) {
        $order = $orderRepo->getOne(App::call()->db->getLastInsertedId());
        $id_cart = Session::read('id_cart');
        $cart = $cartRepo->getOne($id_cart);
        $cart->setIdOrder($order->getId());
        if ($cartRepo->save($cart))
          Session::unset('id_cart');
        echo $this->render('order_confirm', [
          'order' => $orderRepo->getOne($order->getId()),
          'products' => $order->getProductsInOrder()
        ]);
      }
    } else {
      echo $this->render('checkout', [
        'user' => App::call()->user->getUser()
      ]);
    }
  }

}