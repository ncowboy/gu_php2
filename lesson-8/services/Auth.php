<?php


namespace app\services;


use app\App;

class Auth
{
  public $user = null;

  public function __construct()
  {
    $uid = Session::read('user_id');
    $_user = App::call()->userRepository->getOne($uid);
    if($_user) {
      $this->setUser($_user);
    }
  }

  /**
   * @return mixed
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * @param mixed $user
   */
  public function setUser($user): void
  {
    $this->user = $user;
  }


  public function login($login, $password)
  {
    $user = App::call()->userRepository->getByParams(['login' => $login])[0];
    if (!$user || !$this->validatePassword($password, $user->getPassword()) ) {
      Session::write('errors', 'Неверные данные');
      return false;
    }  else {
      Session::write('user_id', $user->getId());
      return true;
    }
  }

  protected function validatePassword($pass, $userPass)
  {
    return password_verify($pass, $userPass);
  }
}