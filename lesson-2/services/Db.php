<?php
namespace app\services;
class Db
{

    public function find($sql)
    {
        echo $sql;
    }

    public function findAll($sql)
    {
        return $sql;
    }
}