<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Product\ProductRepository;

class Register extends Controller{

  private $product;

  public function __construct(ProductRepository $product){

    parent::__construct();
    $this->product = $product;

  }


  public function index(){

    $this->view->set('types', $this->product->getTypes());
    $this->view->set('products', $this->product->getProducts());
    $this->view->render('register');

  }

  public function add(){

    if (isset($_POST['name']) && isset($_POST['price'])) {
      $this->product->add($_POST['name'], $_POST['price'], $_POST['tax'], $_POST['type']);
    }
    header("Location: index.php?page=register");
    
  }

  public function addType(){

    if (isset($_POST['type']) ) {
      $this->product->addType($_POST['type']);
    }

    header("Location: index.php?page=register");

  }

  public function edit(){

    if (isset($_POST['id']) ) {
      $this->product->edit($_POST['id'], $_POST['name'], $_POST['price'], $_POST['tax'], $_POST['type']);
    }

    header("Location: index.php?page=register");

  }

  public function delete(){

    if (isset($_GET['id']) ) {
      $this->product->delete($_GET['id']);
    }

  header("Location: index.php?page=register");
  }

  public function addImage(){
    $ext = strtolower(substr($_FILES['pic']['name'],-4));
    $id = $_POST['id'];
    $name = $_POST['name'];
    $new_name = 'image'.$name . $ext;
    $dir = 'app/assets/imagens/'; 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name);
    $this->product->setImage($id);
    header("Location: index.php?page=register");
  }

}