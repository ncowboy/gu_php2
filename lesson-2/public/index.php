<?php
use app\services\Autoload;
use app\models\Product;
use app\services\Db;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

$db = new Db();
$product = new Product($db);
var_dump($product->getAll());



