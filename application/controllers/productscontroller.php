<?php

class ProductsController extends Controller
{
    function beforeAction()
    {
    }

    public function view($id)
    {
        $product = $this->Product->getDetailProduct($id);
        $this->set('product', $product);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keyword = $_POST['keyword'];
            $products = $this->Product->searchProduct($keyword);
            $this->set('products', $products);
            $this->set('keyword', $keyword);
            $this->set('count', count($products));
        }
    }

    function afterAction()
    {
        $words = $this->Product->getAllNameProduct();
        $this->set('words',$words);
    }
}
