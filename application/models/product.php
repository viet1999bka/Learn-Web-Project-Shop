<?php

class Product extends Model
{

    // lấy tất cả sản phẩm
    public function getAllProduct()
    {
        $sql = "SELECT * FROM products WHERE isDelete = 0";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        // lấy ra danh sách product
        $products = $this->getAllResult();
        return $products;
    }

    // hàm lấy sản phẩm theo id danh muc
    public function getProductByCategoryId($category_id)
    {
        $sql = "SELECT * FROM products WHERE isDelete = 0 AND category_id = :category_id";
        $this->prepareQuery($sql);
        // gắn dữ liệu
        $this->bindData(':category_id', $category_id);
        // lấy ra danh sách kết quả product
        $products = $this->getAllResult();
        return $products;
    }

    // hàm xem chi tiết 1 sản phẩm
    public function getDetailProduct($id)
    {
        $sql = "SELECT * FROM products WHERE isDelete = 0 AND id = :id";
        $this->prepareQuery($sql);
        $this->bindData(':id', $id);
        $product = $this->getSingleResult();
        return $product;
    }

    // hàm tìm kiếm sản phẩm theo từ khoá 
    public function searchProduct($keyword)
    {
        $sql = "SELECT * FROM products WHERE name LIKE :keyword";
        $keyword = "%" . $keyword . "%";
        $this->prepareQuery($sql);
        $this->bindData(':keyword', $keyword);
        $products = $this->getAllResult();
        return $products;
    }

    // lấy top sản phẩm đắt tiền nhất
    public function getTopProductExpensive()
    {
        $sql = "SELECT * FROM products WHERE isDelete = 0 ORDER BY price DESC LIMIT 5; ";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        // lấy ra danh sách product
        $products = $this->getAllResult();
        return $products;
    }

    // lấy top sản phẩm đắt tiền nhất
    public function getTopProductCheap()
    {
        $sql = "SELECT * FROM products WHERE isDelete = 0 ORDER BY price ASC LIMIT 5; ";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        // lấy ra danh sách product
        $products = $this->getAllResult();
        return $products;
    }

    // trả về danh sách tên sản phẩm hiện có
    public function getAllNameProduct()
    {
        $products = $this->getAllProduct();
        $words = '';
        foreach($products as $product) {
            $words = $words .$product['name'].',' ;
        }
        $words = rtrim($words,",");
        return $words;
    }
}
