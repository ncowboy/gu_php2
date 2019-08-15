<?php

namespace app\tests;

use app\controllers\ProductsController;
use app\models\entities\Product;
use app\services\renders\TwigRenderServices;
use app\services\Request;

class ProductsControllerTest extends \PHPUnit\Framework\TestCase
{
  public function testIndexActionCase()
  {
    $twigService = new TwigRenderServices();
    $mockController = $this->getMockBuilder(ProductsController::class)
      ->setConstructorArgs([$twigService, $this->getTestRequest('products/index')])
      ->getMock();
    $mockController->expects($this->any())
      ->method('render')
      ->with('catalog', ['items' => $this->dataForTest()])
      ->willReturn($twigService->renderTmpl('catalog', ['items' => $this->dataForTest()]));

    $result = $mockController->render('catalog', [
      'items' => $this->dataForTest()
    ]);
    $this->assertNotEmpty($result);
  }

  public function testViewActionCase()
  {
    $twigService = new TwigRenderServices();
    $mockController = $this->getMockBuilder(ProductsController::class)
      ->setConstructorArgs([$twigService, $this->getTestRequest('products/view?id=1')])
      ->getMock();
    $mockController->expects($this->any())
      ->method('render')
      ->with('product', ['item' => $this->dataForTest()[1]])
      ->willReturn($twigService->renderTmpl('product', ['item' => $this->dataForTest()[1]]));

    $result = $mockController->render('product', [
      'item' => $this->dataForTest()[1]
    ]);
    $this->assertNotEmpty($result);
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

  public function getTestRequest($request)
  {
    $reflectionRequest = new \ReflectionClass(Request::class);
    $reflectionRequestString = $reflectionRequest->getProperty('requestString');
    $reflectionParseMethod = $reflectionRequest->getMethod('parseRequest');
    $reflectionParseMethod->setAccessible(true);
    $reflectionRequestString->setAccessible(true);
    $requestObject = new Request();
    $reflectionRequestString->setValue($requestObject, $request);
    $reflectionParseMethod->invoke($requestObject);
    return $requestObject;
  }


}