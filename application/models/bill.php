<?php

class Bill extends Model
{

    public $cartModel;
    public $provinceModel;
    public $districtModel;
    public $wardModel;

    public function __construct() {
        parent::__construct();
        $this->cartModel = new Cart;
        $this->provinceModel= new Province;
        $this->districtModel = new District;
        $this->wardModel = new Ward;
    }
    
    // thêm đơn hàng
    public function addBill($account_id, $name, $phone, $address, $payment, $cost)
    {
        $status = 'Đang chờ';
        $sql = "INSERT INTO bills (account_id, name, phone, address, payment, cost, order_time, status) VALUES (:account_id, :name, :phone, :address, :payment, :cost, NOW(), :status);";
        $this->prepareQuery($sql);
        $this->bindData(':account_id', $account_id);
        $this->bindData(':name', $name);
        $this->bindData(':phone', $phone);
        $this->bindData(':address', $address);
        $this->bindData(':payment', $payment);
        $this->bindData(':cost', $cost);
        $this->bindData(':status', $status);
        $this->executeQuery();
        $result = $this->getLastInsertId();
        return $result;
    }

    // thêm chi tiết đơn hàng
    public function addBillDetail($bill_id, $product_id, $quantity)
    {
        $sql = "INSERT INTO bill_detail (bill_id, product_id, quantity) VALUES (:bill_id, :product_id, :quantity);";
        $this->prepareQuery($sql);
        $this->bindData(':bill_id', $bill_id);
        $this->bindData(':product_id', $product_id);
        $this->bindData(':quantity', $quantity);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result;
    }
}
