<?php


namespace app\models\repositories;


use app\models\entities\User;

class UserRepository extends Repository
{

  /**
   * Данный метод должен вернуть название таблицы
   * @return string
   */
  protected function getTableName()
  {
    return 'users';
  }

  /**
   * @return string
   */
  protected function getEntityName()
  {
    return User::class;
  }
}