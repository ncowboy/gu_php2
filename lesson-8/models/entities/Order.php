<?php

namespace app\models\entities;

use app\App;

class Order extends Entity
{
  public $id;
  public $name;
  public $phone;
  public $address;
  public $info;
  public $id_user;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name): void
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param mixed $phone
   */
  public function setPhone($phone): void
  {
    $this->phone = $phone;
  }

  /**
   * @return mixed
   */
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * @param mixed $address
   */
  public function setAddress($address): void
  {
    $this->address = $address;
  }

  /**
   * @return mixed
   */
  public function getInfo()
  {
    return $this->info;
  }

  /**
   * @param mixed $info
   */
  public function setInfo($info): void
  {
    $this->info = $info;
  }

  /**
   * @return mixed
   */
  public function getIdUser()
  {
    return $this->id_user;
  }

  /**
   * @param mixed $id_user
   */
  public function setIdUser($id_user): void
  {
    $this->id_user = $id_user;
  }

  public function getCart()
  {
    return App::call()->cartRepository->getByParams(['id_order' => $this->getId()])[0];
  }

  public function getProductsInOrder()
  {
    $result = [];
    $repo = App::call()->productsInCartRepository;
    $productsInCart = $repo->getByParams(['cart_id' => $this->getCart()->getId()]);
    foreach ($productsInCart as $value) {
      $arrValue = (array)$value;
      $arrValue['price'] = $value->getProduct()->price;
      $arrValue['name'] = $value->getProduct()->name;
      $arrValue['img'] = $value->getProduct()->img;
      $result[] = $arrValue;
    }
    return $result;
  }


  /**
   * @return string
   */
  protected function getRepository()
  {
    // TODO: Implement getRepository() method.
  }
}