<?php

namespace app\tests;

use app\models\entities\Product;
use app\models\repositories\ProductRepository;

class ProductsControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testIndexActionCase()
    {
        $mock = $this->getMockBuilder(ProductRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(['getAll'])->getMock();

        $mock->expects($this->once())
            ->method('getAll')
            ->willReturn($this->dataForTest());

        $result = $mock->getAll();
        $this->assertIsArray($result);
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

}