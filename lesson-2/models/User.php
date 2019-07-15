<?php


namespace app\models;


class User extends Model
{
    public $id;
    public $email;
    public $name;
    public $login;
    public $password;

    /**
     * @inheritDoc
     */
    protected function getTableName()
    {
        return 'users';
    }
}