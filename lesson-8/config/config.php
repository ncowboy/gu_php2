<?php

$db = require_once 'db.php';
return [
  'rootName' => $_SERVER['DOCUMENT_ROOT'] . '/../',
  'name' => 'Мой магазин',
  'defaultControllerName' => 'products',

  'components' => [
    'db' => $db,
    'cartRepository' => [
      'class' => \app\models\repositories\CartRepository::class
    ],
    'userRepository' => [
      'class' => \app\models\repositories\UserRepository::class
    ],
    'productsInCartRepository' => [
      'class' => \app\models\repositories\ProductInCartRepository::class
    ],
    'productRepository' => [
      'class' => \app\models\repositories\ProductRepository::class
    ],
    'user' => [
      'class' => \app\services\Auth::class
    ]
  ],
];
