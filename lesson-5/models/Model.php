<?php

namespace app\models;

use app\services\Db;

abstract class Model
{
  /**
   * @var Db Класс для работы с базой данных
   */
  protected $db;


  /**
   * Model constructor.
   * @param  $db
   */
  public function __construct()
  {
    $this->db = Db::getInstance();
  }

  /**
   * Данный метод должен вернуть название таблицы
   * @return string
   */
  abstract protected static function getTableName();

  /**
   * Возращает пользователя с указанным id
   *
   * @param int $id ID Записи таблицы
   * @return array
   */
  public static function getOne($id)
  {
    $tableName = static::getTableName();
    $sql = "SELECT * FROM {$tableName} WHERE id = :id";
    return Db::getInstance()->queryObject(
      $sql,
      get_called_class(),
      [':id' => $id]
    );
  }

  /**
   * @return mixed
   */
  public static function getAll()
  {
    $tableName = static::getTableName();
    $sql = "SELECT * FROM {$tableName}";
    return Db::getInstance()->queryObjects($sql, get_called_class());
  }

  /**
   * @param $id
   */
  public function delete()
  {
    $tableName = $this->getTableName();
    $sql = "DELETE FROM {$tableName} WHERE id = :id";
    return $this->db->execute($sql, [':id' => $this->id]);
  }

  public function save()
  {
    $tableName = $this->getTableName();
    $model = get_object_vars($this);
    unset($model['db']);
    $params = [];
    $sql = '';
    if (is_null($model['id'])) {
      $cols = implode(', ', $this->getAttributes());
      $vals = [];
      foreach ($model as $key => $value) {
        $params[":$key"] = $value;
        $vals[] = ":$key";
      }
      $sql .= "INSERT INTO {$tableName} ({$cols}) values (" . implode(', ', $vals) . ')';
    } else {
      $sqlUnformatted = "UPDATE {$tableName} SET ";
      foreach ($model as $key => $value) {
        if (!is_null($value))
          $sqlUnformatted .= "{$key}=:{$key}, ";
      }
      $sql = mb_substr($sqlUnformatted, 0, mb_strlen($sqlUnformatted) - 2);
      $sql .= " WHERE id = :id";
      foreach ($model as $key => $value) {
        if (!is_null($value))
          $params[":$key"] = $value;
      }
    }
    $this->db->execute($sql, $params);
    $errInfo = $this->db->errors[0]['info'][2];
    if (!is_null($errInfo)) {
      echo "PDO Error: {$errInfo}";
      return false;
    }
    return true;
  }

  public function getAttributes()
  {
    $props = [];
    foreach ($this as $key => $value) {
      $props[] = $key;
    }
    unset($props[count($props) - 1]);
    return $props;
  }
}
