<?php
namespace app\models;

abstract class Model
{
    /**
     * @var Db Класс для работы с базой данных
     */
    protected $bd;

    /**
     * Model constructor.
     * @param  $bd
     */
    public function __construct( $bd)
    {
        $this->bd = $bd;
    }

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected function getTableName();

    /**
     * Возращает пользователя с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        $this->bd->find($sql);
        return [];
    }

    /**
     *
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName";
        return $this->bd->findAll($sql);
    }
}
