<?php


namespace app\models;


class Orders extends Model
{
    public $id;
    public $name;
    public $phone;
    public $adress;
    public $info;
    public $id_user;

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    protected function getTableName()
    {
        return 'orders';
    }
}