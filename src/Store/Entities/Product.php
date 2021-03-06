<?php

namespace Store\Entities;

/**
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @package Store\Entities
*/
class Product
{
	/**
	 * @var (int) id primary key to product
	 * @var (string) name name to product
	 * @var (string) brand to product
	 * @var (float) price to product
	 * @var (int) quantity to product
	*/
	private $id;
	private $name;
	private $brand;
	private $price;
	private $quantity;

	/**
	 * Set the id of the product and return self class
	 * @param $id id to product
	 * @return $this self instance to class Product
	*/
	public function setId($id)
	{
		$this->id = (int) $id;

		return $this;
	}

	/**
	 * Get the id of the product
	 * @return $this->id the id fill to product
	*/
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the name of the product and return self classs
	 * @param $name the name of product
	 * @return $this  self instance to class Product
	*/
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * Get the name of the product
	 * @return $this->name the name to product
	*/
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the brand of the product and return self class
	 * @param $brand recive the brand of product
	 * @return $this self instance to class Product
	*/
	public function setBrand($brand)
	{
		$this->brand = $brand;
		return $this;
	}

	/**
	 * Get the brand of the product
	 * @return $this->brand the brand to product
	*/
	public function getBrand()
	{
		return $this->brand;
	}

	/**
	 * Set the price of product and return self instance
	 * @param (float) $price price to product
	 * @return $this self instance to class Product
	*/
	public function setPrice($price)
	{
		$this->price = (float) $price;
		return $this;
	}

	/**
	 * Get the price to product
	 * @return $this->price have price of the product
	*/
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the quantity of product and return self instance
	 * @param (int) $qunatity param contain the quantity of the prduct
	 * @return $this self instance to class Product
	*/
	public function setQuantity($quantity)
	{
		$this->quantity = (int) $quantity;
		return $this;
	}

	/**
	 * Get the price to product
	 * @return $this->quantity product quantity
	*/
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Get the comercial name
	 * @return $comercialName is the name of product plus brand to product
	*/
	public function getComercialName()
	{
		$comercialName = $this->getname();

		if ($this->getBrand()) {
			$comercialName .= " - " . $this->getBrand();
		}

		return $comercialName;
	}
}