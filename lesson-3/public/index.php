<?php

use app\services\Autoload;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);


$user = new \app\models\User();
//$user->setId(5);
//$user->setName('userTest111');
//$user->save();
$user->setName('UserTest1');
$user->setEmail('UserTest1@mail.me');
$user->setLogin('UserTest1@mail.me');
$user->setPassword('123123');
$user->save();







