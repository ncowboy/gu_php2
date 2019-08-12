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
  public static function getTableName()
  {
    return 'users';
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id): void
  {
    $this->id = $id;
  }


  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email): void
  {
    $this->email = $email;
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name): void
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * @param mixed $login
   */
  public function setLogin($login): void
  {
    $this->login = $login;
  }

  /**
   * @return mixed
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param mixed $password
   */
  public function setPassword($password): void
  {
    $this->password = $password;
  }
}