<!-- Dang Nhap -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
if (isPost()) {
    $filterAll = filter();
    $error = []; // mang chua cac loi
    // validate name
    if (empty($filterAll['name'])) {
        $error['name']['required'] = "Ho ten bat buoc phai nhap";
    } else {
        if (strlen($filterAll['name']) < 6) {
            $error['name']['min'] = "Ho ten phai co it nhat 5 ki tu";
        }
    }
    // validate email
    if (empty($filterAll['email'])) {
        $error['email']['required'] = "Email bat buoc phai nhap";
    } else {
        $email = $filterAll['email'];
        $sql = "SELECT Id_users FROM users WHERE Email_users = '$email' ";

        if (demdulieu($sql) > 0) {
            $error['email']['unique'] = "Email da ton tai";
        }
    }
    // validate phone
    if (empty($filterAll['phone'])) {
        $error['phone']['required'] = 'So dien thoai bat buoc phai nhap';
    } else {
        $phone = $filterAll['phone'];
        $chec =  isPhone($phone);
        if (!$chec) {
            $error['phone']['min'] = 'So dien thoai khong hop le';
        }
    }
    // validate password
    if (empty($filterAll['password'])) {
        $error['password']['required'] = 'Mat khau khong duoc de trong';
    } else {
        if (strlen($filterAll['password']) < 8) {
            $error['password']['min'] = 'Mat Khau phai lon hon 6 ki tu';
        }
    }


    if (empty($error)) {
        setflashdata('sol', "Dang Ky Thanh Cong");

        $name = $filterAll['name'];
        $phone = $filterAll['phone'];
        $email = $filterAll['email'];
        $pass = $filterAll['password'];
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $_SESSION['user'] = $name;
        $data = [
            "Name_users" => "$name",
            "Phone_users" => "$phone",
            "Email_users" => "$email",
            "Password_users" => "$password",
        ];
        $kq = insert("users", $data);
        header("Location: ?Module=Home&action=Home");
        exit();
    } else {
        setflashdata('smg', "Vui Long kiem tra lai du lieu");
        setflashdata("error", $error);
        setflashdata("old", $filterAll);
        header("Location: ?Module=Auth&action=Account");
        exit();
    }
}


$smg = getflashdata('smg');
$smg_type = getflashdata('sol');
$old = getflashdata('old');
$error = getflashdata('error');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Fontend/Css/resert.css?ver=2" />
    <link rel="stylesheet" href="Fontend/Css/gird.css?ver=2" />
    <!-- <link rel="stylesheet" href="Fontend/Css/layout.css?ver=322" /> -->
    <link rel="stylesheet" href="Fontend/Css/reponsit.css?ver=" />
    <style>
        body {
            background-image: url(https://i.pinimg.com/564x/f5/8e/89/f58e8928baf7deb328fc669d1cea3190.jpg);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            font-family: "Mulish", sans-serif;
        }

        .conten {
            min-width: 42rem;
            width: 50%;
            margin: 15rem auto 5rem auto;
            background-color: white;
        }

        .conten>p {
            display: flex;
            justify-content: center;
            font-size: 1.8rem;
            color: gray;
            padding: 3.5rem 0;
            font-weight: 500;
        }

        .conten>h1>span:first-child {
            font-size: 2.7rem;
            font-weight: bold;
            color: #11006f;
            letter-spacing: 0.1rem;
        }

        .conten>h1>span:last-child {
            font-size: 2.7rem;
            font-weight: bold;
            color: #fcaf17;
            letter-spacing: 0.1rem;
            margin-left: 1rem;
        }

        .conten>h1 {
            margin-bottom: 4rem;
            display: flex;
            justify-content: center;
        }

        .form__account {
            width: 70%;
            margin: 0 auto;
        }

        .form__account,
        .layout,
        .face__gg {
            width: 70%;
        }

        .form__account>input {
            display: block;
            width: 100%;
            padding: 1.3rem;

            border-radius: 3px;
            border: 1px solid grey;
        }

        button {
            width: 100%;
            padding: 1.3rem;
            background-color: #fcaf17;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            font-size: 1.9rem;
            color: white;
            font-weight: bold;
        }

        hr:first-child {
            position: absolute;
            width: 30%;
            right: 0;
        }

        hr:last-child {
            position: absolute;
            width: 30%;
            left: 0;
        }

        .layout {
            margin: 3rem auto;
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 3rem;
            position: relative;
            font-size: 1.5rem;
        }

        .face__gg {
            display: flex;
            width: 70%;
            margin: 3rem auto;
            justify-content: center;
            gap: 1rem;
        }

        .google,
        .face {
            width: 12rem;
            height: 4.9rem;
            border-radius: 30px;
            border: 1px solid gray;
            cursor: pointer;
        }

        .location {
            display: flex;
            width: 70%;
            margin: 0 auto;
            justify-content: center;
            padding-bottom: 7rem;
        }

        .location>h1 {
            font-size: 1.6rem;
            font-weight: 600;
            color: grey;
        }

        .location a {
            text-decoration: none;
            color: #fcaf17;
            font-weight: bold;
        }

        .banner,
        .nav__class,
        .banner__sale {
            display: none;
        }

        .error {
            width: 70%;
            display: flex;
            justify-content: center;
            margin: 1rem auto 1rem auto;
            height: 5rem;
            border: 1px solid red;
            align-items: center;
            color: red;
            font-size: 1.7rem;
            font-weight: 700;
            background-color: #fcaf;
            border-radius: 5px;
        }

        .thanhcong {
            width: 70%;
            display: flex;
            justify-content: center;
            margin: 1rem auto 1rem auto;
            height: 5rem;
            border: 1px solid cadetblue;
            align-items: center;
            color: rgb(159, 252, 255);

            font-size: 1.7rem;
            font-weight: 700;
            background-color: cadetblue;
            border-radius: 5px;
        }

        .error_con {
            padding: 0.3rem 0 1.5rem 1rem;
            font-size: 1.3rem;
            color: red;
        }

        .error_con {
            height: 3rem;
        }
    </style>
</head>

<body>

    <div class="conten">
        <p>Chào mừng bạn đến với Yody</p>
        <h1><span>ĐĂNG</span><span>KÝ</span></h1>

        <div class="error_cha">
            <?php if (!empty($smg) || !empty($smg_type)) {
                if (isset($smg)) {
                    echo  "  <div class='error'>  $smg</div>";
                } else {
                    echo "<div class='thanhcong'> $smg_type</div>";
                }
            }   ?></div>

        <form action="#" method="post" onchange="input_err()" onsubmit=" return  validate__account()" class="form__account">
            <input type="text" name="name" id="name" placeholder=" Họ va Tên" value="<?php echo (!empty($old['name'])) ? $old['name'] : null; ?>" />
            <div class="error_con">
                <?php echo (!empty($error['name'])) ? "<div class=' phone'> " . reset($error['name']) . "</div>" : null;     ?>
            </div>
            <input type="text" name="phone" id="phone" placeholder=" Số điện thoại" value="<?php echo (!empty($old['phone'])) ? $old['phone'] : null; ?>" />
            <div class="error_con"> <?php echo (!empty($error['phone'])) ? "<div class=' phone'> " . reset($error['phone']) . "</div>" : null;     ?> </div>
            <input type="text" name="email" id="email" placeholder=" Địa chỉ Email" value="<?php echo (!empty($old['email'])) ? $old['email'] : null; ?>" />
            <div class="error_con"> <?php echo (!empty($error['email'])) ? "<div class=' email'> " . reset($error['email']) . "</div>" : null;     ?> </div>
            <input type="password" name="password" id="password" placeholder=" Mật Khẩu" value="<?php echo (!empty($old['password'])) ? $old['password'] : null; ?>" />
            <div class="error_con"> <?php echo (!empty($error['password'])) ? "<div class=' password'> " . reset($error['password']) . "</div>" : null;     ?> </div>
            <button onclick="btn()" type="submit" name="btn">Đăng Ký</button>
        </form>
        <div class="layout">
            <hr />
            <p>Hoặc đăng ký bằng</p>
            <hr />
        </div>
        <div class="face__gg">
            <div class="google">
                <img src="https://bizweb.dktcdn.net/100/438/408/themes/949050/assets/ic_btn_google.svg?1714530454667" alt="" />
            </div>
            <div class="face">
                <img src="https://bizweb.dktcdn.net/100/438/408/themes/949050/assets/ic_btn_facebook.svg?1714530454667" alt="" />
            </div>
        </div>
        <div class="location">
            <h1>
                Bạn đã có tài khoản?
                <a href="?Module=Auth&action=Login">Đăng Nhập Ngay!</a>
            </h1>
        </div>
    </div>

</body>

<script src="Fontend/Js/validate_form.js"></script>

</html>