<?php


namespace app\models\entities;


class Product extends Entity
{
  public $id;
  public $name;
  public $img;
  public $description;
  public $price;

  /**
   * @inheritDoc
   */
  protected static function getTableName()
  {
    return 'products';
  }

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
  public function getImg()
  {
    return $this->img;
  }

  /**
   * @param mixed $img
   */
  public function setImg($img): void
  {
    $this->img = $img;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param mixed $description
   */
  public function setDescription($description): void
  {
    $this->description = $description;
  }

  /**
   * @return mixed
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price): void
  {
    $this->price = $price;
  }

  /**
   * @return string
   */
  protected function getRepository()
  {
    // TODO: Implement getRepository() method.
  }
}