<?php
class Account extends Model{
    // lay tat ca categories
    public function getAllUser()
    {
        $sql = "SELECT * FROM accounts WHERE role_id = 2;";
        // tạo câu sql chuẩn bị
        $this->prepareQuery($sql);
        // lấy ra danh sách users
        $users = $this->getAllResult();
        return $users;
    }
    //thêm tài khoản user
    public function addUser($username,$password,$name,$date,$phone,$address)
    {
        
        $sql = "INSERT INTO accounts(username,password,role_id,name,date,phone,address)
        VALUES (:username, :password, 2, :name, :date, :phone, :address);";
        $this->prepareQuery($sql);
        $this->bindData(':username', $username);
        $this->bindData(':password', $password);
        $this->bindData(':name', $name);
        $this->bindData(':date', $date);
        $this->bindData(':phone', $phone);
        $this->bindData(':address', $address);
        $this->executeQuery();
        $result = $this->getRowCount();
        return $result;
    } 
}
