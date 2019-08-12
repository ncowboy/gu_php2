<?php


namespace app\models;


class Carts extends Model
{
    public $id;
    public $status;
    public $id_order;
    public $created_at;

    /**
     * @inheritDoc
     */
    protected function getTableName()
    {
        return 'carts';
    }
}