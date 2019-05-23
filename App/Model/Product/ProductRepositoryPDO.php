<?php

namespace App\Model\Product;

class ProductRepositoryPDO implements ProductRepository{
    private $pdo;


    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;

    }

    public function getProducts(){
        $stmt = $this->pdo->prepare("SELECT * FROM product");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Product');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTypes(){
        $stmt = $this->pdo->prepare("SELECT * FROM type");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Type');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addType($type){
        $stmt = $this->pdo->prepare("INSERT INTO type (type) VALUES ('$type') ");
        $stmt->execute();
    }

    public function getProduct($id){
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Product');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id){
        $aux = $id;
        $stmt = $this->pdo->prepare("DELETE FROM product WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        $idx = $this->pdo->query("SELECT COUNT(*) FROM product")->fetchColumn() + 1;
        for ($i=1; $i <= $idx; $i++){
            $stmt2 = $this->pdo->prepare("UPDATE product SET id = '$aux' WHERE id = :aux + 1");
            $stmt2->bindValue(":aux", $aux, \PDO::PARAM_INT);
            $stmt2->execute();
            $aux++;
        }

    }

    public function edit($id, $name, $price, $tax, $type){
        $stmt = $this->pdo->prepare("UPDATE product SET name = '$name' , price = '$price' , tax = '$tax', type = '$type' WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function add($name, $price, $tax, $type){
        $id = $this->pdo->query("SELECT COUNT(*) FROM product")->fetchColumn() + 1;
        $stmt = $this->pdo->prepare("INSERT INTO product (id, name, price, tax, type, image) VALUES ('$id', '$name', '$price', '$tax', '$type', false) ");
        $stmt->execute();
    }

    public function setImage($id){
        $stmt = $this->pdo->prepare("UPDATE product SET image = true WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
    }


}
