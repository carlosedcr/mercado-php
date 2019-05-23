<?php

namespace App\Model\Product;

interface ProductRepository{
    public function getProducts();
    public function getProduct($id);
    public function getTypes();
    public function delete($id);
    public function edit($id, $name, $price, $tax, $type);
    public function add($name, $price, $tax, $type);
    public function addType($type);
    public function setImage($image);
}
