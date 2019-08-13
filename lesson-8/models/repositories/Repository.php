<?php

namespace app\models\repositories;

use app\App;
use app\models\entities\Entity;
use app\services\Db;
use app\services\Session;

/**
 * Class Repository
 * @package app\models
 *
 */
abstract class Repository
{
  /**
   * @var Db Класс для работы с базой данных
   */
  protected $db;

  /**
   * Model constructor.
   */
  public function __construct()
  {
    $this->db = App::call()->db;
  }

  /**
   * Данный метод должен вернуть название таблицы
   * @return string
   */
  abstract protected function getTableName();

  /**
   * @return string
   */

  abstract protected function getEntityName();

  /**
   * Возращает запись с указанным id
   *
   * @param int $id ID Записи таблицы
   * @return array
   */
  public function getOne($id)
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName} WHERE id = :id";
    return $this->db->queryObject(
      $sql,
      $this->getEntityName(),
      [':id' => $id]
    );
  }

  /**
   * @param array $params
   * @return array
   */
  public function getByParams(array $params)
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName} WHERE ";
    $values = [];
    $queryParams = [];
    foreach ($params as $key => $value) {
        $values[] = "{$key} = :${key}";
        $queryParams[":{$key}"] = $value;
    }
    $sql .= implode(' AND ', $values);
    return $this->db->queryObjects(
      $sql,
      $this->getEntityName(),
      $queryParams
    );
  }

  /**
   * Получение всех записей таблицы
   * @return mixed
   */
  public function getAll()
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName} ";
    return $this->db->queryObjects($sql, $this->getEntityName());
  }

  public function delete(Entity $entity)
  {
    $tableName = $this->getTableName();
    $sql = "DELETE FROM {$tableName} WHERE id = :id";
    return $this->db->execute($sql, [':id' => $entity->id]);
  }

  public function save(Entity $entity)
  {

    if (empty($entity->id)) {
      return $this->create($entity);
    }
    return $this->update($entity);
  }

  protected function create(Entity $entity)
  {
    $tableName = $this->getTableName();
    $cols = implode(', ', $entity->getAttributes());
    $values = [];
    $params = [];
    foreach ($entity as $key => $value) {
      if ($key === 'db' || $key === 'errors') {
        continue;
      }
      $params[":$key"] = $value;
      $values[] = ":$key";
    }
    $sql = "INSERT INTO {$tableName} ({$cols}) values (" . implode(', ', $values) . ')';
    $this->db->execute($sql, $params);
    $errInfo = $this->db->errors[0]['info'][2];
    if (!is_null($errInfo)) {
      echo "PDO Error: {$errInfo}";
      return false;
    }
    return $this->db->getLastInsertedId();
  }

  protected function update(Entity $entity)
  {
    $tableName = $this->getTableName();
    $params = [];
    $sqlUnformatted = "UPDATE {$tableName} SET ";
    foreach ($entity as $key => $value) {
      if ($key == 'db') {
        continue;
      }
      if (!is_null($value)) {
        $sqlUnformatted .= "{$key}=:{$key}, ";
        $params[":$key"] = $value;
      }
    }
    $sql = mb_substr($sqlUnformatted, 0, mb_strlen($sqlUnformatted) - 2);
    $sql .= " WHERE id = :id";
    $this->db->execute($sql, $params);
    $errInfo = $this->db->errors[0]['info'][2];
    if (!is_null($errInfo)) {
      echo "PDO Error: {$errInfo}";
      return false;
    }
    return true;
  }
}
