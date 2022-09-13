<?php

class Cart extends Model
{
    public $productModel;

    public function __construct()
    {
        parent::__construct();
        $this->productModel = new Product;
    }

    // lấy danh sách sản phẩm trong giỏ hàng của người dùng
    public function getCartByAccountId($account_id)
    {
        $sql = "SELECT carts.*, products.name,products.image,products.price FROM carts,products WHERE carts.isDelete = 0 AND carts.account_id = :account_id AND products.id = carts.product_id;";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        $this->bindData(':account_id', $account_id);
        // lấy ra danh sách sản phẩm trong giỏ hàng kèm theo tên giá
        $carts = $this->getAllResult();
        return $carts;
    }

    // xóa sản phẩm trong giỏ hàng theo id giỏ hàng
    public function deleteCartbyId($id)
    {
        // xóa bằng cách đổi giá trị cột isDelete
        $sql = "UPDATE carts SET isDelete = 1 WHERE id = :id;";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        $this->bindData(':id', $id);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result; //trả về số bản ghi được thực hiện bằng câu lệnh sql
    }

    // xóa sản phẩm trong giỏ hàng theo id giỏ hàng
    public function deleteCartbyAccountId($account_id)
    {
        // xóa bằng cách đổi giá trị cột isDelete
        $sql = "UPDATE carts SET isDelete = 1 WHERE account_id = :account_id;";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        $this->bindData(':account_id', $account_id);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result; //trả về số bản ghi được thực hiện bằng câu lệnh sql
    }

    // thêm sản phẩm vào giỏ hàng
    public function addProductToCart($account_id, $product_id, $quantity)
    {
        $sql = "INSERT INTO carts (account_id, product_id, quantity, isDelete) VALUES (:account_id, :product_id, :quantity, 0);";
        $this->prepareQuery($sql);
        $this->bindData(':account_id', $account_id);
        $this->bindData(':product_id', $product_id);
        $this->bindData(':quantity', $quantity);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result;
    }

    // cập nhập lại giỏ hàng sản phẩm vào giỏ hàng
    public function updateCart($cart_id, $account_id, $product_id, $quantity)
    {
        $sql = "UPDATE carts SET quantity = :quantity WHERE id = :cart_id AND account_id = :account_id AND product_id = :product_id ;";
        $this->prepareQuery($sql);
        $this->bindData(':cart_id', $cart_id);
        $this->bindData(':account_id', $account_id);
        $this->bindData(':product_id', $product_id);
        $this->bindData(':quantity', $quantity);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result;
    }
}
