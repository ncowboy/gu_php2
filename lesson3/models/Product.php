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
    protected function getTableName()
    {
        return 'products';
    }
}