<?php


namespace app\controllers;

use app\App;
use app\services\Controller;
use Exception;

class ProductsController extends Controller
{
  public function indexAction()
  {
    echo $this->render('catalog', [
      'items' => App::call()->productRepository->getAll(),
    ]);
  }

  /**
   * @throws Exception
   */
  public function viewAction()
  {
    $product = App::call()->productRepository->getOne($this->getId());
    if (!$product) {
      throw new Exception('Товар не найден');
    }
    echo $this->render('product', [
      'item' => $product
    ]);
  }
}