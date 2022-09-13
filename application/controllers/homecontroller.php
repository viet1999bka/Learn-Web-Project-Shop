<?php

class HomeController extends Controller
{

    function beforeAction()
    {
    }

    public function index()
    {
        // lấy dữ liệu cần thiết cho trang home
        $categories = $this->Home->categoryModel->getAllCategory();
        $this->set('categories', $categories);
        $productsExpensive = $this->Home->productModel->getTopProductExpensive();
        $this->set('productsExpensive', $productsExpensive);
        $productsCheap = $this->Home->productModel->getTopProductCheap();
        $this->set('productsCheap', $productsCheap);
    }

    public function notfound()
    {
    }

    function afterAction()
    {
        // goi y tren thanh search
        $words = $this->Home->productModel->getAllNameProduct();
        $this->set('words',$words);
    }
}
