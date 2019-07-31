<?php

namespace app\models\entities;

/**
 * Class Entity
 * @package App\models\entities
 *
 * @property int $id
 */
abstract class Entity
{
  public function getAttributes()
  {
    $props = [];
    foreach ($this as $key => $value) {
      $props[] = $key;
    }
    return $props;
  }
}

