<?php


namespace app\models\entities;

use app\models\repositories\UserRepository;

class User extends Entity
{
  public $id;
  public $login;
  public $name;
  public $password;
  public $email;
  public $phone;
  public $address;
  public $role_id = 2;

  public function rules()
  {
    return [
      'required' => ['login', 'name', 'password', 'email', 'phone', 'address'],
      'unique' => ['login', 'email']
    ];
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
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
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param mixed $phone
   */
  public function setPhone($phone): void
  {
    $this->phone = $phone;
  }

  /**
   * @return mixed
   */
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * @param mixed $address
   */
  public function setAddress($address): void
  {
    $this->address = $address;
  }

  /**
   * @return mixed
   */
  public function getRoleId()
  {
    return $this->role_id;
  }

  /**
   * @param mixed $role_id
   */
  public function setRoleId($role_id): void
  {
    $this->role_id = $role_id;
  }


  /**
   * @return string
   */
  protected function getRepository()
  {
    return UserRepository::class;
  }
}