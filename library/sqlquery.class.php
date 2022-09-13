<?php

class SQLQuery
{
    private $con; // biến đại diện cho kết nối sql
    private $stmt;
    private $error; // biến lưu lỗi

    // hàm kết nối database
    public function connect($host, $username, $password, $dbname)
    {
        //kết nối database bằng PDO
        try {
            $this->con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            //echo "Connection failed: " . $e->getMessage();
        }
    }

    // hàm chuẩn bị câu lệnh (PHP MySQL Prepared Statements)
    public function prepareQuery($sql)
    {
        $this->stmt = $this->con->prepare($sql);
    }

    // hàm gán giá trị cho câu lệnh đã chuẩn bị
    public function bindData($param, $value)
    {
        $type = null;
        if (is_int($value)) {
            $type = PDO::PARAM_INT;
        } elseif (is_bool($value)) {
            $type = PDO::PARAM_BOOL;
        } elseif (is_null($value)) {
            $type = PDO::PARAM_NULL;
        } else {
            $type = PDO::PARAM_STR;
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // hàm thực hiện truy vấn câu sql đã chuẩn bị và gán xong dữ liệu
    public function executeQuery()
    {
        return $this->stmt->execute();
    }

    // Hàm trả về mảng là kết quả của toàn bộ result set
    public function getAllResult()
    {
        $this->executeQuery();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hàm trả về hàng tiếp theo từ result set
    public function getSingleResult()
    {
        $this->executeQuery();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm lấy ra kết quả số bản ghi bị ảnh hưởng (dùng để kiểm tra update,insert,delete)
    public function getRowCount()
    {
        return $this->stmt->rowCount();
    }

    // Hàm lấy ra id của bản ghi cuối cùng được thêm vào
    public function getLastInsertId()
    {
        return $this->con->lastInsertId();
    }
}
