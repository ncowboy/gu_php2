<?php


namespace app\controllers;


use app\models\entities\Cart;
use app\models\entities\ProductInCart;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductInCartRepository;
use app\services\Controller;
use app\services\Session;

class CartController extends Controller
{
    public function addAction()
    {
        $post = $this->request->post();
        $response = [];
        $cartRepo = new CartRepository();
        $cart_id = $this->isCartExist();
        if (isset($post) && !$cart_id) {
            $cart = new Cart();
            $cart_id = $cartRepo->save($cart);
            if ($cart_id) {
                Session::write('id_cart', $cart_id);
                $this->addProductInCart($cart_id, $post);
            }
        } else {
            $this->updateCart($cart_id, $post);
        }
        $response['cart_id'] = $cart_id;
        echo json_encode($response);
        echo $this->render('cart_header', ['cart' => 1212]);
    }

    public function getAction()
    {
        $response = [];
        $productInCartRepo = new ProductInCartRepository();
        $productsInCart = $productInCartRepo->getByParams(['cart_id' => $this->request->getId()]);
        //var_dump($productsInCart);
        foreach ($productsInCart as $value) {
            $arrValue = (array)$value;
            $arrValue['price'] = $value->getProduct()->price;
            $arrValue['name'] = $value->getProduct()->name;
            $arrValue['img'] = $value->getProduct()->img;
            $response[] = $arrValue;
        }
        echo json_encode($response);
    }

    protected function addProductInCart($cart_id, $post)
    {
        $productInCartRepo = new ProductInCartRepository();
        $productInCart = new ProductInCart();
        $productInCart->setCartId($cart_id);
        $productInCart->setProductId($post['cart']['product_id']);
        $productInCart->setQuantity($post['cart']['quantity']);
        return $productInCartRepo->save($productInCart);
    }

    protected function isCartExist()
    {
        return Session::read('id_cart');
    }

    protected function updateCart($cart_id, $post)
    {
        $id_product = $post['cart']['product_id'];
        $productInCartRepo = new ProductInCartRepository();
        $productInCart = $productInCartRepo->getByParams([
            'product_id' => $id_product,
            'cart_id' => $cart_id
        ])[0];
        if ($productInCart) {
            $productInCart->quantity += $post['cart']['quantity'];
            return $productInCartRepo->save($productInCart);
        } else {
            $productInCart = new ProductInCart();
            $productInCart->setQuantity($post['cart']['quantity']);
            $productInCart->setProductId($post['cart']['product_id']);
            $productInCart->setCartId($cart_id);
            return $productInCartRepo->save($productInCart);
        }
    }
}