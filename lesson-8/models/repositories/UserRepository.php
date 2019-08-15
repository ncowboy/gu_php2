<?php


namespace app\models\repositories;


use app\models\entities\User;
use app\services\Session;

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

  /**
   * @param User $user
   * @return array|bool
   */
  public function validate(User $user)
  {
    var_dump($this->getByParams(['login' => $user->login]));
//    $errors = [];
//    if (!empty($this->getByParams(['login' => $user->login]))) {
//      $errors[] = 'Пользователь с таким логином уже существует';
//    }
//    if (!empty($this->getByParams(['email' => $user->email]))) {
//      $errors[] = 'Пользователь с таким e-mail уже существует';
//      Session::write('errors', $errors);
//    }
//    return empty($errors) ? true : $errors;
  }
}