<?php

namespace App\Model\Product;

class Product{
    private $id;
    private $name;
    private $price;
    private $tax;
    private $type;
    private $image;


    public function setId($id){
        if (!is_int($id)) {
            throw new \InvalidArgumentException("Id precisa ser inteiro");
        }
        $this->id = $id;
    }

    public function setName($name){
        if (empty($name)) {
            throw new \InvalidArgumentException("É obrigatório ter o nome");
        }
        $this->name = $name;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setPrice($price){
        if (!is_float($price)) {
            throw new \InvalidArgumentException("Preço precisar ser um float");
        }
        $this->price = $price;
    }

    public function setTax($tax){
        if (!is_float($tax)) {
            throw new \InvalidArgumentException("Preço precisar ser um float");
        }
        $this->tax = $tax;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
       return $this->image;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getType(){
        return $this->type;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getTax(){
        return $this->tax;
    }
}
