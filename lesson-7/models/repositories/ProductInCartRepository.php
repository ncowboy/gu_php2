<?php


namespace app\models\repositories;

use app\models\entities\ProductInCart;

class ProductInCartRepository extends Repository
{

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    protected function getTableName()
    {
        return 'products_in_cart';
    }

    /**
     * @return string
     */
    protected function getEntityName()
    {
        return ProductInCart::class;
    }
}