<!-- File chua cac ham dung chung -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}

//  kiem tra xem phuong thuc gui la phuong thuc nao

function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    } else {
        return false;
    }
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    } else {
        return false;
    }
}

// ham loc du lieu dau vao va xu ly
function filter()
{
    $array = [];
    if (isGet()) {
        foreach ($_GET as $key => $value) {
            $array[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    if (isPost()) {
        foreach ($_POST as $key => $value) {
            $array[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    return $array;
}

// validate from
// kiem tra email
function isEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}
// ham kiem tra so nguyen;
function isNumber($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    return $checkNumber;
}
// ham kiem tra so thuc
function isFloat($float)
{
    $checkFloat = filter_var($float, FILTER_VALIDATE_FLOAT);
    return $checkFloat;
}

// kiem tra so dien thoai

function isPhone($phone)
{
    $checkZero = false;
    if ($phone[0] == '0') {
        $checkZero = true;
        $phone = substr($phone, 1);
    }
    $checkNumber = false;
    if (isNumber($phone) && (strlen($phone) == 9)) {
        $checkNumber = true;
    }
    if ($checkZero && $checkNumber) {
        return true;
    }
    return false;
}


// ham chuyen huong

function location($past = 'index.php ')
{
    header("location: $past ");
    exit;
}

// // liem tra dang nhap
function isLogin()
{
    $checklogin = false;
    if (getSession('loginToken')) {
        $tokenlogin = getSession('loginToken');
        // echo $tokenlogin;
        $kiemtratoken = oneRaw("SELECT Id_users From logintoken WHERE Trangthai = '$tokenlogin' ");
        if (!empty($kiemtratoken)) {
            $checklogin = true;
        } else {
            removesession('loginToken');
        }
    }
    return $checklogin;
}
