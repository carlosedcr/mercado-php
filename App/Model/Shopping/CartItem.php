<?php

namespace App\Model\Shopping;

use App\Model\Product\Product;


class CartItem{

    private $product;
    private $quantity;

    public function __construct(Product $product, $quantity){

        $this->product = $product;
        $this->quantity = (int)$quantity;

    }

    public function getProduct(){
        return $this->product;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getSubTotal(){
        return $this->product->getPrice() * $this->quantity;
    }

    public function getTax(){
        $aux = $this->product->getPrice() * $this->quantity;
        $tax = ($this->product->getTax())  / 100;
        return $aux * $tax;
    }
    
}
