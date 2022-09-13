<?php

class Category extends Model
{

    public $productModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new Product;
    }

    // lay tat ca categories
    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories WHERE isDelete = 0;";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        // lấy ra danh sách categories
        $categories = $this->getAllResult();
        return $categories;
    }

}
