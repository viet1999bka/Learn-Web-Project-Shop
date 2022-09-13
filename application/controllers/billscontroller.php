<?php

class BillsController extends Controller
{

    function beforeAction()
    {
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $account_id = $_SESSION['user_id'];
            $carts = $this->Bill->cartModel->getCartByAccountId($account_id);
            if (empty($carts)) {
                $_SESSION['empty_bill'] = 'Bạn chưa có sản phẩm nào trong giỏ, hãy mua hàng trước khi thanh toán!';
                header("Location: " . BASEPATH . "/home/index");
            } else {
                $provinces = $this->Bill->provinceModel->getAllProvince();
                $this->set('provinces', $provinces);
                $this->set('carts', $carts);
            }
        } else {
            header("Location: " . BASEPATH . "/accounts/login");
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $account_id = $_SESSION['user_id'];
            $carts = $this->Bill->cartModel->getCartByAccountId($account_id);
            $cost = 0;
            foreach ($carts as $cart) {
                $cost += $cart['price'] * $cart['quantity'];
            }
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            if (empty($province)) {
                $_SESSION['dangerous_bill'] = 'Bạn chưa nhập địa chỉ!';
                header("Location: " . BASEPATH . "/bills/index");
            } else {
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $street = $_POST['street'];
                $payment = $_POST['payment'];
                $address = $street . ', ' . $ward . ', ' . $district . ', ' . $province;
                $bill_id = $this->Bill->addBill($account_id, $name, $phone, $address, $payment, $cost);
                if (!empty($bill_id)) {
                    $count = 0;
                    foreach ($carts as $cart) {
                        $count += $this->Bill->addBillDetail($bill_id, $cart['product_id'], $cart['quantity']);
                    }
                    $result = $this->Bill->cartModel->deleteCartbyAccountId($account_id);
                    if ($count == $result && $result == count($carts)) {
                        $_SESSION['access_bill'] = 'Bạn đã đặt hàng thành công!';
                        header("Location: " . BASEPATH . "/home/index");
                    } else {
                        $_SESSION['dangerous_bill'] = 'Đặt hàng thất bại, xin thử lại!';
                        header("Location: " . BASEPATH . "/carts/viewall");
                    }
                } else {
                    $_SESSION['dangerous_bill'] = 'Đặt hàng thất bại, xin thử lại!';
                    header("Location: " . BASEPATH . "/carts/viewall");
                }
            }
        }
    }

    public function district($province_name)
    {
        $districts = $this->Bill->districtModel->getDistrictByProvinceName($province_name);
        if (!empty($districts)) {
            foreach ($districts as $district) {
                echo '<option value="' . $district['name'] . '">' . $district['name'] . '</option>';
            }
        }
    }

    public function ward($district_name)
    {
        $wards = $this->Bill->wardModel->getWardByDistrictName($district_name);
        if (!empty($wards)) {
            foreach ($wards as $ward) {
                echo '<option value="' . $ward['name'] . '">' . $ward['name'] . '</option>';
            }
        }
    }

    function afterAction()
    {
        // goi y tren thanh search
        $words = $this->Bill->cartModel->productModel->getAllNameProduct();
        $this->set('words',$words);
    }
}
