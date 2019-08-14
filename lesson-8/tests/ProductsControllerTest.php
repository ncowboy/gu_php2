<?php

namespace app\tests;

use app\controllers\ProductsController;
use app\models\entities\Product;
use app\models\repositories\ProductRepository;
use app\services\Controller;
use app\services\renders\TwigRenderServices;
use app\services\Request;

class ProductsControllerTest extends \PHPUnit\Framework\TestCase
{
  public function testIndexActionCase()
  {
    $mockController = $this->getMockBuilder(ProductsController::class)
      ->setConstructorArgs([new TwigRenderServices(), $this->getTestRequest()])
      ->getMock();
    $mockController->expects($this->once())
      ->method('render')
      ->with('catalog', ['items' => $this->dataForTest()])
      ->willReturn($mockController->renderer->renderTmpl('catalog', ['items' => $this->dataForTest()]));
//
//    $result = $mockController->render('catalog', [
//      'items' => $this->dataForTest()
//    ]);
   var_dump($mockController->render('catalog', [
      'items' => $this->dataForTest()
    ]));


//
//    $controller = new $mockController();
//    echo $controller->render('catalog', [
//      'items' => $mockProducts->getAll()
//    ]);
  }

  public function testViewActionCase()
  {
    $mock = $this->getMockBuilder(ProductRepository::class)
      ->disableOriginalConstructor()
      ->setMethods(['getOne'])->getMock();

    $mock->expects($this->once())
      ->method('getOne')
      ->with(1)
      ->willReturn($this->dataForTest()[0]);
    $result = $mock->getOne(1);
    $this->assertIsObject($result);

  }

  public function dataForTest()
  {
    $product = new Product();
    $product2 = new Product();
    $product->id = 1;
    $product->setName('Product');
    $product->setImg('Product.png');
    $product->setDescription('Product');
    $product->setPrice(500);
    $product2->id = 2;
    $product2->setName('Product2');
    $product2->setImg('Product2.png');
    $product2->setDescription('Product2');
    $product2->setPrice(100);
    return [$product, $product2];
  }

  public function getTestRequest()
  {
    $reflectionRequest = new \ReflectionClass(Request::class);
    $reflectionRequestString = $reflectionRequest->getProperty('requestString');
    $reflectionParseMethod = $reflectionRequest->getMethod('parseRequest');
    $reflectionParseMethod->setAccessible(true);
    $reflectionRequestString->setAccessible(true);
    $request = new Request();
    $reflectionRequestString->setValue($request, '/products/index');
    $reflectionParseMethod->invoke($request);
    return $request;
  }


}