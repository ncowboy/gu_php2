<?php


namespace app\models\entities;


use app\models\repositories\ProductRepository;

class ProductInCart extends Entity
{
    public $product_id;
    public $cart_id;
    public $quantity;

    /**
     * @return mixed
     */

    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getCartId()
    {
        return $this->cart_id;
    }

    /**
     * @param mixed $cart_id
     */
    public function setCartId($cart_id): void
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return (new ProductRepository())->getOne($this->product_id);
    }

  /**
   * @return string
   */
  protected function getRepository()
  {
    // TODO: Implement getRepository() method.
  }
}