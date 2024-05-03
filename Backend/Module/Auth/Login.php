<!-- Dang Nhap -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
if (isPost()) {
    $filterAll = filter();
    $error = []; // mang chua cac loi
    // validate name
    // validate email
    if (empty($filterAll['email'])) {
        $error['email']['required'] = "Email bat buoc phai nhap";
    } else {
        $email = $filterAll['email'];
        $sql = "SELECT Id_users FROM users WHERE Email_users = '$email' ";

        if (demdulieu($sql) <= 0) {
            $error['email']['unique'] = "Email Khong ton tai";
        }
    }
    // validate password
    if (empty($filterAll['password'])) {
        $error['password']['required'] = 'Mat khau khong duoc de trong';
    } elseif (strlen($filterAll['password']) < 8) {
        $error['password']['min'] = 'Mat Khau phai lon hon 6 ki tu';
    } else {
        $email = $filterAll['email'];
        $password = $filterAll['password'];
        $sql = "SELECT Password_users FROM users WHERE Email_users = :email";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $dataFeth = $statement->fetch(PDO::FETCH_ASSOC);
        if ($dataFeth) {
            $pass_database = $dataFeth['Password_users'];
            if (password_verify($password, $pass_database)) {
                $_SESSION['user'] = $filterAll['email'];
                setflashdata('sol', "Dang Nhap Thanh Cong");
                location();
                exit();
            } else {
                $error['password']['database'] = "Mat Khau Khong Chinh Xac";
            }
        } else {
            $error['email']['min'] = 'Email Khong Ton tai';
        }
    }
    if (!empty($error)) {
        setflashdata('smg', "Vui Long kiem tra lai du lieu");
        setflashdata("error", $error);
        setflashdata("old", $filterAll);
        location("Auth", "Login");
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
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
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

        .error_con {
            padding: 0.3rem 0 1.5rem 1rem;
            font-size: 1.3rem;
            color: red;
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

        .forgot {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 3rem auto 1rem auto;
        }

        .forgot a {
            color: #fcaf17;
            font-size: 1.7rem;
            font-weight: 700;
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
    </style>
</head>

<body>
    <?php  ?>
    <div class="conten">
        <p>Chào mừng bạn đến với Yody</p>
        <h1> <span>ĐĂNG</span><span>NHẬP</span> </h1>
        <div class="error_cha">
            <?php if (!empty($smg) || !empty($smg_type)) {
                if (isset($smg)) {
                    echo  "  <div class='error'>  $smg</div>";
                } else {
                    echo "<div class='thanhcong'> $smg_type</div>";
                }
            }   ?></div>
        <form action="#" method="post" onsubmit=" return validate__login()" class="form__account">
            <input oninput="inp()" type="email" name="email" id="email" placeholder=" Địa chỉ Email" value="<?php echo (!empty($old['email'])) ? $old['email'] : null; ?>">
            <div class="error_con"> <?php echo (!empty($error['email'])) ? "<div class=' email'> " . reset($error['email']) . "</div>" : null;     ?> </div>
            <input oninput="inp()" type="password" name="password" id="password" placeholder=" Mật Khẩu" value="<?php echo (!empty($old['password'])) ? $old['password'] : null; ?>">
            <div class="error_con"> <?php echo (!empty($error['password'])) ? "<div class=' password'> " . reset($error['password']) . "</div>" : null;     ?> </div>
            <button onclick="btn()" type="submit">Đăng Nhập</button>
        </form>
        <div class="forgot">
            <a href="?Module=Auth&action=Forgot">Quên mật khẩu</a>
        </div>
        <div class="layout">
            <hr>
            <p>Hoặc đăng Nhập bằng</p>
            <hr>
        </div>
        <div class="face__gg">
            <div class="google"><img src="https://bizweb.dktcdn.net/100/438/408/themes/949050/assets/ic_btn_google.svg?1714530454667" alt=""></div>
            <div class="face"><img src="https://bizweb.dktcdn.net/100/438/408/themes/949050/assets/ic_btn_facebook.svg?1714530454667" alt=""></div>
        </div>
        <div class="location">
            <h1>Bạn chưa có tài khoản? <a href="?Module=Auth&action=Account">Đăng Ký Ngay!</a></h1>
        </div>
    </div>
    <?php include "Fontend/Layout/Footer.html"; ?>
</body>
<script src="Fontend/Js/login.js"></script>

</html>