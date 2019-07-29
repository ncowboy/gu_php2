<?php


namespace app\models;


class Product extends Model
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
}