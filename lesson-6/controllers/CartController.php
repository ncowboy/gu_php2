<?php


namespace app\controllers;


use app\models\entities\Cart;
use app\services\Controller;

class CartController extends Controller
{
    public function addAction()
    {
        $post = $this->request->post();
        if(isset($post)){
            $cart = $post['cart'];
            $qty = $cart['quantity'];
            $cartEntity = new Cart();
        }
    }
}