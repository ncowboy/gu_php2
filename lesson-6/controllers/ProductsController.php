<?php


namespace app\controllers;

use app\models\Product;
use app\services\Controller;
use app\services\Request;
use Exception;

class ProductsController extends Controller
{
  public function indexAction()
  {
    echo $this->render('catalog', [
      'items' => Product::getAll()
    ]);
  }

  /**
   * @throws Exception
   */
  public function viewAction()
  {
    $product = Product::getOne($this->getId());
    if (!$product) {
      throw new Exception('Товар не найден');
    }
    echo $this->render('product', [
      'item' => $product
    ]);
  }
}