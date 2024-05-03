<!-- danh sach san pham -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
$kq =  selsects("sp_nam");
$sql = "SELECT * FROM sp_nam";
$a =  demdulieu($sql);

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
        th,
        td {
            border: 1px solid gray;
            text-align: center;
            margin: 0 auto;
        }

        th {
            padding: 1rem;
        }

        .imag {
            width: 80px;
            height: 50px;
        }

        .imag img {
            object-fit: contain;
            width: 100%;
            height: 100%;
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
        </thead>
        <tbody class="tbody">
            <?php foreach ($kq as $value => $key) :   ?>
                <tr>
                    <td class="imag"> <img src="<?php echo $key['Anh_sp'] ?>"> </td>
                    <td class="imag"> <img src="<?php echo $key['Anh_sp1'] ?>"> </td>
                    <td class="imag"> <img src="<?php echo $key['Anh_sp2'] ?>"> </td>
                    <td class="imag"> <img src="<?php echo $key['Anh_sp3'] ?>"> </td>
                    <td class="imag"> <img src="<?php echo $key['Anh_sp4'] ?>"> </td>
                    <td class="imag"> <img src="<?php echo $key['Anh_sp5'] ?>"> </td>
                    <td class="name"> <?php echo $key['Ten_sp']     ?></td>
                    <td class="gia"> <?php echo $key['Gia_sp']     ?></td>
                    <td class="mota"> <?php echo $key['Mota_sp']     ?></td>
                    <td class="size"> <?php echo $key['Size_sp']     ?></td>
                    <td class="Soluong"> <?php echo $key['Soluongmua']     ?></td>
                    <td class="tonkho"> <?php echo $key['Tonkho']     ?></td>

                </tr>
            <?php endforeach;   ?>
        </tbody>

    </table>
    <h1><?php echo $a;  ?> </h1>
</body>

</html>