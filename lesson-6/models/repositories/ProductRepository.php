<?php


namespace app\models\repositories;


use app\models\entities\Product;

class ProductRepository extends Repository
{

  /**
   * Данный метод должен вернуть название таблицы
   * @return string
   */
  protected function getTableName()
  {
    return 'products';
  }

  /**
   * @return string
   */
  protected function getEntityName()
  {
    return Product::class;
  }
}