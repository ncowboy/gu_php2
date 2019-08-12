<?php


namespace app\controllers;

use app\models\Product;
use app\services\Controller;


class ProductsController extends Controller
{
  public function indexAction()
  {
    echo $this->render('catalog', [
      'items' => Product::getAll()
    ]);
  }

  public function viewAction($id)
  {
    echo $this->render('product', [
      'item' => Product::getOne($id)
    ]);
  }
}