<?php


namespace app\models\repositories;


use app\models\entities\Cart;

class CartRepository extends Repository
{

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    protected function getTableName()
    {
        return 'carts';
    }

    /**
     * @return string
     */
    protected function getEntityName()
    {
        return Cart::class;
    }
}