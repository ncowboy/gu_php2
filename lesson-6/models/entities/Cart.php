<?php


namespace app\models\entities;


class Cart extends Entity
{
  public $id;
  public $product_id;
  public $quantity;
  public $id_order = null;
  public $created_at;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  public function __construct()
  {
    $this->created_at = date("Y-m-d H:i:s");
  }

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

  /**
   * @return null
   */
  public function getIdOrder()
  {
    return $this->id_order;
  }

  /**
   * @param null $id_order
   */
  public function setIdOrder($id_order): void
  {
    $this->id_order = $id_order;
  }

  /**
   * @return mixed
   */
  public function getCreatedAt()
  {
    return $this->created_at;
  }
}