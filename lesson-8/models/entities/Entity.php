<?php

namespace app\models\entities;

/**
 * Class Entity
 * @package App\models\entities
 *
 * @property int $id
 * @property int $errors
 */
abstract class Entity
{
  public $errors = [];

  /**
   * @return string
   */
  abstract protected function getRepository();

  public function getAttributes()
  {
    $props = [];
    foreach ($this as $key => $value) {
      if ($key === 'errors') {
        continue;
      }
      $props[] = $key;
    }
    return $props;
  }


  /**
   *
   */
  public function rules()
  {
  }

  /**
   * @return bool
   */
  public function validate()
  {
    if (isset($this->rules()['required'])) {
      $this->isEmptyValidate();
      $this->uniqueValidate();
    }
    return empty($this->errors);
  }

  protected function isEmptyValidate()
  {
    $checkAttributes = $this->rules()['required'];
    foreach ($this as $key => $value) {
      if (empty($value) && is_integer(array_search($key, $checkAttributes))) {
        $this->errors[$key] = "Поле {$key} не может быть пустым";
      }
    }
  }

  /**
   *
   */
  protected function uniqueValidate()
  {
    $checkAttributes = $this->rules()['unique'];
    $repoClass = $this->getRepository();
    $repo = new $repoClass();
    foreach ($this as $key => $value) {
        if(is_integer(array_search($key, $checkAttributes)) && !empty($repo->getByParams([$key => $value]))) {
          $this->errors[$key] = " {$key} уже есть в базе данных";
        }
    }
  }

  /**
   * @param $post
   * @return bool
   */
  public function inputPost($post)
  {
    if (!empty($post)) {
      foreach ($post as $key => $value) {
        $this->$key = $post[$key];
      }
      return true;
    }
    return false;
  }

}

