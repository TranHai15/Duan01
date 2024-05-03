<!-- Them san phams -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
if (isset($_POST['btn'])) {
    $Anh_sp = $_POST['Anh_sp'];
    $Anh_sp1 = $_POST['Anh_sp1'];
    $Anh_sp2 = $_POST['Anh_sp2'];
    $Anh_sp3 = $_POST['Anh_sp3'];
    $Anh_sp4 = $_POST['Anh_sp4'];
    $Anh_sp5 = $_POST['Anh_sp5'];
    $name_sp = $_POST['Name_sp'];
    $Gia_sp = $_POST['Gia_sp'];
    $Mo_ta = $_POST['Mo_ta'];
    $size = $_POST['Size'];
    $So_Luong_ban = $_POST['So_Luong_ban'];
    $ton_kho = $_POST['Ton_kho'];

    $data = [
        "Anh_sp" => $Anh_sp,
        "Anh_sp1" => $Anh_sp1,
        "Anh_sp2" => $Anh_sp2,
        "Anh_sp3" => $Anh_sp3,
        "Anh_sp4" => $Anh_sp4,
        "Anh_sp5" => $Anh_sp5,
        "Ten_sp" => $name_sp,
        "Gia_sp" => $Gia_sp,
        "Mota_sp" => $Mo_ta,
        "Size_sp" => $size,
        "Soluongmua" => $So_Luong_ban,
        "Tonkho" => $ton_kho
    ];
    $a =  insert("sp_nam", $data);
    echo $a;
}
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
    <link rel="stylesheet" href="Fontend/Css/resert.css?ver=12" />
    <link rel="stylesheet" href="Fontend/Css/gird.css?ver=11" />
    <link rel="stylesheet" href="Fontend/Css/reponsit.css?ver=13" />
    <title>Header</title>
    <style>
        .table,
        th {
            border: 1px solid red;
        }

        th,
        td,
        input {
            width: 80px;
            height: 50px;
            padding: 0.5rem;
        }
    </style>
</head>

<body>
    <table class="table">
        <thead class="thead">
            <th>Anh San Pham</th>
            <th>Anh 1</th>
            <th>Anh 2</th>
            <th>Anh 3</th>
            <th>Anh 4</th>
            <th>Anh 5</th>
            <th> Ten san Pham</th>
            <th>Gia San Pham</th>
            <th>Mo Ta </th>
            <th>Zize</th>
            <th>So Luong Mua</th>
            <th>Ton Kho</th>
            <th>Them</th>
        </thead>
        <tbody class="tbody">
            <form action="#" method="post">
                <tr>
                    <td><input type="text" name="Anh_sp" id="Anh_sp" placeholder="Anh san Pham"></td>
                    <td><input type="text" name="Anh_sp1" id="Anh_sp1" placeholder="Anh 1"></td>
                    <td><input type="text" name="Anh_sp2" id="Anh_sp2" placeholder="Anh 2"></td>
                    <td><input type="text" name="Anh_sp3" id="Anh_sp3" placeholder="Anh 3"></td>
                    <td><input type="text" name="Anh_sp4" id="Anh_sp4" placeholder="Anh 4"></td>
                    <td><input type="text" name="Anh_sp5" id="Anh_sp5" placeholder="Anh 5"></td>
                    <td><input type="text" name="Name_sp" id="name_sp" placeholder="Ten san Pham"></td>
                    <td><input type="text" name="Gia_sp" id="Gia_sp" placeholder="Gia san Pham"></td>
                    <td><input type="text" name="Mo_ta" id="Mo_ta" placeholder="Mo Ta"></td>
                    <td><input type="text" name="Size" id="size" placeholder="SIZE"></td>
                    <td><input type="number" name="So_Luong_ban" placeholder="So Luong ban" id="So_Luong_ban"></td>
                    <td><input type="number" name="Ton_kho" id="ton_kho" placeholder="ton Kho"></td>
                    <td><button type="submit" name="btn">Them</button></td>
                </tr>
            </form>
        </tbody>

    </table>
</body>

</html>