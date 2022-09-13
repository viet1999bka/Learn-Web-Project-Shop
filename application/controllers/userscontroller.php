<?php

class UsersController extends Controller
{

    function beforeAction()
    {
    }

    function profile()
    {
        $this->set('title', 'Tài khoản');
        $user = $this->User->getUserById($_SESSION['user_id']);
        $this->set('user', $user);
    }

    function password()
    {
        $this->set('title', 'Tài khoản');
        $user = $this->User->getUserById($_SESSION['user_id']);
        $this->set('user', $user);
    }

    function updateInformation()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->testInput($_POST['name']);
            $phone = $this->testInput($_POST['phone']);
            $date = $this->testInput($_POST['date']);
            $address = $this->testInput($_POST['address']);
            $result = $this->User->updateInformation($name, $date, $phone, $address, $_SESSION['user_id']);
            if ($result == 1) {
                $_SESSION['user_notification'] = 'Thay đổi thông tin tài khoản thành công!';
            } else {
                $_SESSION['user_notification'] = 'Thay đổi thông tin tài khoản thất bại, xin thử lại!';
            }
            header("Location: " . BASEPATH . "/users/profile");
        }
    }

    function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->User->getUserById($_SESSION['user_id']);
            $currentPassword = $this->testInput($_POST['currentpassword']);
            $newPassword = $this->testInput($_POST['newpassword']);
            $repeatPassword = $this->testInput($_POST['repeatpassword']);
            if (md5($currentPassword) != $user['password']) {
                $_SESSION['user_notification'] = 'Mật khẩu nhập vào không chính xác!';
            } elseif ($newPassword != $repeatPassword) {
                $_SESSION['user_notification'] = 'Nhập lại mật khẩu không chính xác!';
            } elseif ($currentPassword == $newPassword) {
                $_SESSION['user_notification'] = 'Hãy nhập mật khẩu khác!';
            } else {
                $result = $this->User->updatePassword(md5($newPassword), $_SESSION['user_id']);
                if ($result == 1) {
                    $_SESSION['user_notification'] = 'Thay đổi mật khẩu thành công!';
                } else {
                    $_SESSION['user_notification'] = 'Thay đổi mật khẩu thất bại, xin thử lại!';
                }
            }
            header("Location: " . BASEPATH . "/users/password");
        }
    }

    function afterAction()
    {
        // goi y o tren thanh search
        $words = $this->User->productModel->getAllNameProduct();
        $this->set('words', $words);
    }
}
