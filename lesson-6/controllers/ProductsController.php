<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\services\Controller;
use Exception;

class ProductsController extends Controller
{
  public function indexAction()
  {
    echo $this->render('catalog', [
      'items' => (new ProductRepository())->getAll(),
    ]);
  }

  /**
   * @throws Exception
   */
  public function viewAction()
  {
    $product = (new ProductRepository())->getOne($this->getId());
    if (!$product) {
      throw new Exception('Товар не найден');
    }
    echo $this->render('product', [
      'item' => $product
    ]);
  }
}