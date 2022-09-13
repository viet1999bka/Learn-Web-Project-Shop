<?php

    class Admin extends Model
    {

        public function getAllAdmin()
        {
            $sql = "SELECT * FROM accounts WHERE role_id = 1;";
            $this->prepareQuery($sql);
            $admins = $this->getAllResult();
            if ($admins) {
                return $admins;
            } else {
                return NULL;
            }
        }
        public function addAdmin($username,$password,$name,$date,$phone,$address)
        {
            
            $sql = "INSERT INTO accounts(username,password,role_id,name,date,phone,address)
            VALUES (:username, :password, 1, :name, :date, :phone, :address);";
            $this->prepareQuery($sql);
            $this->bindData(':username', $username);
            $this->bindData(':password', $password);
            $this->bindData(':name', $name);
            $this->bindData(':date', $date);
            $this->bindData(':phone', $phone);
            $this->bindData(':address', $address);
            $this->executeQuery();
        } 
        public function getDetailAdmin($id) {
            $sql = "SELECT * FROM accounts WHERE id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':id', $id);
            $deAdmin = $this->getSingleResult();
            if ($deAdmin) {
                return $deAdmin;
            } else {
                return NULL;
            }
        }
        public function editAdmin($name,$date,$phone,$address, $id)
        {
            
            $sql = "UPDATE accounts SET name = :name,
            date= :date, phone = :phone, address= :address WHERE id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':name', $name);
            $this->bindData(':date', $date);
            $this->bindData(':phone', $phone);
            $this->bindData(':address', $address);
            $this->bindData(':id', $id);
            $this->executeQuery();
        } 
        public function getAllUser()
        {
            $sql = "SELECT * FROM accounts WHERE role_id = 2;";
            $this->prepareQuery($sql);
            $users = $this->getAllResult();
            if ($users) {
                return $users;
            } else {
                return NULL;
            }
        }

        public function change($password,$id)
        {
            
            $sql = "UPDATE accounts SET password= :password WHERE id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':password', $password);
            $this->bindData(':id', $id);
            $this->executeQuery();
        } 
    
        public function getAllCategory()
        {
            $sql = "SELECT * FROM categories WHERE isDelete = 0;";
            $this->prepareQuery($sql);
            $categories = $this->getAllResult();
            if ($categories) {
                return $categories;
            } else {
                return NULL;
            }
        }
        public function addCategory($category)
        {
            
            $sql = "INSERT INTO categories(name)
            VALUES (:name);";
            $this->prepareQuery($sql);
            $this->bindData(':name', $category);
            $this->executeQuery();
        } 
        public function getActProduct()
        {
            $sql = "SELECT * FROM products WHERE isDelete =0";
            $this->prepareQuery($sql);
            $products = $this->getAllResult();
            if ($products) {
                return $products;
            } else {
                return NULL;
            }
        }
        
        public function getAllProduct()
        {
            $sql = "SELECT * FROM products";
            $this->prepareQuery($sql);
            $products = $this->getAllResult();
            if ($products) {
                return $products;
            } else {
                return NULL;
            }
        }
        public function findCateById($id)
        {
            $sql = "SELECT * FROM categories WHERE isDelete = 0 AND id = :id;";
            $this->prepareQuery($sql);
            $this->bindData(':id', $id);
            $fcate = $this->getSingleResult();
            if ($fcate) {
                return $fcate;
            } else {
                return NULL;
            }
        }
        public function getDetailProduct($id) {
            $sql = "SELECT * FROM products WHERE id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':id', $id);
            $deUser = $this->getSingleResult();
            if ($deUser) {
                return $deUser;
            } else {
                return NULL;
            }
        }
        public function addProduct($name,$category_id,$image,$price,$detail)
        {
            
            $sql = "INSERT INTO products(name,category_id,image,price,detail,isDelete)
            VALUES (:name, :category_id, :image, :price, :detail, :isDelete);";
            $this->prepareQuery($sql);
            $this->bindData(':name', $name);
            $this->bindData(':category_id', $category_id);
            $this->bindData(':image', $image);
            $this->bindData(':price', $price);
            $this->bindData(':detail', $detail);
            $this->bindData(':isDelete', 0);
            $this->executeQuery();
        } 
        public function editProduct($name,$category_id,$image,$price,$detail,$id)
        {
            
            $sql = "UPDATE products SET name = :name, category_id= :category_id, image = :image,
            price= :price, detail = :detail, isDelete = 0 WHERE id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':name', $name);
            $this->bindData(':category_id', $category_id);
            $this->bindData(':image', $image);
            $this->bindData(':price', $price);
            $this->bindData(':detail', $detail);
            $this->bindData(':id', $id);
            $this->executeQuery();
        } 
        public function deleteProduct($id)
        {
            
            $sql = "UPDATE products SET isDelete = 1 WHERE id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':id', $id);
            $this->executeQuery();
        }
        public function getAllBill()
        {
            $sql = "SELECT * FROM bills";
            $this->prepareQuery($sql);
            $products = $this->getAllResult();
            if ($products) {
                return $products;
            } else {
                return NULL;
            }
        }
        public function getDetailBill($id)
        {
            $sql = "SELECT * FROM bill_detail WHERE bill_id = :id";
            $this->prepareQuery($sql);
            $this->bindData(':id', $id);
            $products = $this->getAllResult();
            if ($products) {
                return $products;
            } else {
                return NULL;
            }
        }
    }