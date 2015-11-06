<?php

namespace Store\Entities;

class ProductTest extends \PHPUnit_Framework_TestCase
{
	private $product;

	public function setUp()
	{
		$this->product = new Product;
	}

	public function testSholdSetId()
	{
		$id = 1;
		$this->product->setId($id);

		$this->assertEquals($id, $this->product->getId());
	}

	public function testSholdSetIdAndReturnSelfInstance()
	{
		$this->assertInstanceOf('Store\Entities\Product', $this->product->setId(1));
	}

	/**
	 * @dataProvider getPossiblesTypesInt
	*/
	public function testGetTypeReturn($value, $expected)
	{
		$this->product->setId($value);

		$this->assertInternalType($expected, $this->product->getId());
	}

	public function testSetNameProductReturnSelfIntanceOfObject()
	{
		$this->assertInstanceOf('Store\Entities\Product', $this->product->setName("Produc 1"));
	}

	public function testSholdReciveTheProductName()
	{
		$this->product->setName("Product 1");

		$name = "Product 1";

		$this->assertEquals('Product 1', $this->product->getName());
	}

	public function testSetNameRecive()
	{
		$name = "Product 1";
		$this->product->setName($name);

		$this->assertEquals($name, $this->product->getName());
	}

	public function testSholdSetBrandOfProduct()
	{
		$brand = "Makita";
		$this->product->setBrand($brand);

		$this->assertEquals($brand, $this->product->getBrand());
	}

	public function testSholdReciveSelIntanceOfClass()
	{
		$this->assertInstanceOf('Store\Entities\Product', $this->product->setBrand("Makita"));
	}

	public function testSholdReciveTheBrandName()
	{
		$brand = "Makita";
		$this->product->setBrand($brand);

		$this->assertEquals($brand, $this->product->getBrand());
	}

	public function testSholdRecivePriceOfProduct()
	{
		$this->product->setPrice(9.99);

		$this->assertEquals(9.99, $this->product->getPrice());
	}

	public function testSholdReturnProductIntanceToReturnSetPrice()
	{
		$this->assertInstanceOf('Store\Entities\Product', $this->product->setPrice(19.99));
	}

	public function testSholdGetPriceProduct()
	{
		$this->product->setPrice(19.9);

		$this->assertEquals(19.9, $this->product->getPrice());
	}

	/**
	 * @dataProvider getPossiblesTypesFloat
	*/
	public function testSholdGetpriceProductIsFloat($price, $expected)
	{
		$this->product->setPrice($price);

		$this->assertInternalType($expected, $this->product->getPrice());
	}

	public function testShuldSetQuantity()
	{
		$this->product->setQuantity(100);

		$this->assertEquals(100, $this->product->getQuantity());
	}

	public function testShuldSetQuantityReturnProductIntance()
	{
		$this->assertInstanceOf('Store\Entities\Product', $this->product->setQuantity(100));
	}

	public function testSholdReciveTheQuantityOfProduct()
	{
		$this->product->setQuantity(100);

		$this->assertEquals(100, $this->product->getQuantity());
	}

	/**
	 * @dataProvider getPossiblesTypesInt
	*/
	public function testGetIntQuantity($quantity, $expected)
	{
		$this->product->setQuantity($quantity);

		$this->assertInternalType($expected, $this->product->getQuantity());
	}

	/**
	 * @dataProvider getPossiblesComercialName
	*/
	public function testSholdReciveComercialName($name, $brand, $expected)
	{
		$this->product->setName($name);
		$this->product->setBrand($brand);

		$this->assertEquals($expected, $this->product->getComercialName());
	}

	public function getPossiblesTypesInt()
	{
		return [
			[1, 'int'],
			[122, 'int'],
			['Makita', 'int'],
			['Sukita', 'int']
		];
	}

	public function getPossiblesTypesFloat()
	{
		return [
			[19.9, 'float'],
			[129.9, 'float'],
			[215, 'float'],
			[11, 'float']
		];
	}

	public function getPossiblesComercialName()
	{
		return [
			['Product 1', 'brand', 'Product 1 - brand'],
			['Product 2', 'Makita', 'Product 2 - Makita'],
			['Product 3', '', 'Product 3'],
			['Product 4', '', 'Product 4']
		];
	}

	public function tearDown()
	{
		$this->product = null;
	}
}
