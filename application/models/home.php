<?php

class Home extends Model
{
    public $productModel;
    public $categoryModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new Product;
        $this->categoryModel = new Category;
    }
}
