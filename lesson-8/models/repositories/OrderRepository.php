<?php


namespace app\models\repositories;


use app\models\entities\Order;

class OrderRepository extends Repository
{

  /**
   * Данный метод должен вернуть название таблицы
   * @return string
   */
  protected function getTableName()
  {
    return 'orders';
  }

  /**
   * @return string
   */
  protected function getEntityName()
  {
    return Order::class;
  }
}