<?php
class User extends Model
{

    public $productModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new Product;
    }

    // lay user by id
    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM accounts WHERE role_id = 2 AND id=:user_id;";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        $this->bindData(':user_id', $user_id);
        $this->executeQuery();
        $result = $this->getSingleResult();
        return $result;
    }

    // ham update thong tin user
    public function updateInformation($name, $date, $phone, $address, $id)
    {
        $sql = "UPDATE accounts SET name=:name, date=:date, phone=:phone, address=:address WHERE id=:id;";
        $this->prepareQuery($sql);
        $this->bindData(':name', $name);
        $this->bindData(':date', $date);
        $this->bindData(':phone', $phone);
        $this->bindData(':address', $address);
        $this->bindData(':id', $id);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result;
    }
    
    public function updatePassword($password, $id)
    {
        $sql = "UPDATE accounts SET password=:password WHERE id=:id;";
        $this->prepareQuery($sql);
        $this->bindData(':password', $password);
        $this->bindData(':id', $id);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result;
    }
}
