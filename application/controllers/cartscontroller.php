<?php

class CartsController extends Controller
{

    function beforeAction()
    {
    }

    public function viewall()
    {
        if (isset($_SESSION['user_id'])) {
            $account_id = $_SESSION['user_id'];
            $carts = $this->Cart->getCartByAccountId($account_id);
            $this->set('carts', $carts);
        } else { // nếu chưa đăng nhập thì chuyển đến đăng nhập
            header("Location: " . BASEPATH . "/accounts/login");
        }
    }

    public function delete($id)
    {
        $result = $this->Cart->deleteCartbyId($id);
        if ($result == 1) {
            header("Location: " . BASEPATH . "/carts/viewall");
        } else {
            $_SESSION['dangerous_delete_cart'] = 'Xóa sản phẩm thất bại, xin thử lại!';
            header("Location: " . BASEPATH . "/carts/viewall");
        }
    }

    public function add()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $account_id = $_SESSION['user_id'];
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $carts = $this->Cart->getCartByAccountId($account_id);
                $isUpdate = 0;
                foreach ($carts as $cart) {
                    if ($product_id == $cart['product_id']) {
                        $quantity += $cart['quantity'];
                        $result = $this->Cart->updateCart($cart['id'], $account_id, $product_id, $quantity);
                        $isUpdate = 1;
                    }
                }
                if ($isUpdate == 0) {
                    $result = $this->Cart->addProductToCart($account_id, $product_id, $quantity);
                }
                if ($result == 1) {
                    $_SESSION['access_add_product'] = 'Thêm sản phẩm vào giỏ hàng thành công!';
                } else {
                    $_SESSION['dangerous_add_product'] = 'Thêm sản phẩm vào giỏ hàng thất bại, xin thử lại!';
                }
                header("Location: " . BASEPATH . "/products/view/" . $product_id);
            }
        } else { // nếu chưa đăng nhập thì chuyển đến đăng nhập
            header("Location: " . BASEPATH . "/accounts/login");
        }
    }

    function edit($cart_id)
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $account_id = $_SESSION['user_id'];
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $result = $this->Cart->updateCart($cart_id, $account_id, $product_id, $quantity);
                if ($result != 1) {
                    $_SESSION['dangerous_edit_cart'] = 'Sửa giỏ hàng thất bại, xin thử lại!';
                }
                header("Location: " . BASEPATH . "/carts/viewall");
            }
        } else { // nếu chưa đăng nhập thì chuyển đến đăng nhập
            header("Location: " . BASEPATH . "/accounts/login");
        }
    }

    function afterAction()
    {
        // goi y thanh search
        $words = $this->Cart->productModel->getAllNameProduct();
        $this->set('words', $words);
    }
}
