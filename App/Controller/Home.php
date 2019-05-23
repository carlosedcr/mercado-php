<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Product\ProductRepository;
use App\Controller\Cart;
use App\Model\Shopping\Cart as ICart;
use App\Model\Shopping\Filter; 

class Home extends Controller {
    private $product;
    private $cart;


    public function __construct(ProductRepository $product, ICart $cart){
        parent::__construct();
        $this->cart = $cart;
        $this->product = $product;

    }

    public function index(){
        
        $this->view->set('types', $this->product->getTypes());
        $this->view->set('cartTax', $this->cart->getTaxTotal());
        $this->view->set('cartTotal', $this->cart->getTotal());
        $this->view->set('cartItems', $this->cart->getCartItems());
        $this->view->set('products', $this->product->getProducts());
        $this->view->render('home');


    }



}
