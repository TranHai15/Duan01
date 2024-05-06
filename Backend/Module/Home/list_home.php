<!-- Danh sach san pham Home -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
$ab = selsects("sp_nam");
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
    <link rel="stylesheet" href="Fontend/Css/resert.css?ver=155" />
    <link rel="stylesheet" href="Fontend/Css/gird.css?ver=1654" />
    <link rel="stylesheet" href="Fontend/Css/Home.css?ver=375" />
    <link rel="stylesheet" href="Fontend/Css/reponsit.css?ver=885" />
    <style>
        body {
            font-family: "Mulish", sans-serif;
        }

        .select {
            display: flex;
            justify-content: space-between;
            padding: 1.5rem 0;
        }

        .images {
            width: 100%;
            border-radius: 5px;
            overflow: hidden;
            transition: all .5s ease;
        }

        .images img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 5px;
        }

        .item_sp {
            margin: 0 0 2rem 0;
            cursor: pointer;
            position: relative;
            width: 100%;
            height: 100%;
        }


        .name {
            width: 100%;
            height: 3.4rem;
            line-height: 1.7rem;
            color: black;
            overflow: hidden;
            font-size: 1.4rem;
            font-weight: 500;
            margin-top: 1rem;
        }

        .name:hover {
            color: #fcaf17;
        }

        .price {
            width: 100%;
            color: rgb(177, 0, 0);
            font-weight: bold;
            font-size: 1.5rem;
            margin-top: 1.2rem;
        }

        .price_old {
            color: grey;
            font-weight: 500;
            font-size: 1.4rem;
            text-decoration: line-through;
            margin-left: 1rem;
        }

        .sale_items img {
            width: 100%;
        }

        .search {
            width: 30%;
            background-color: brown;
            padding: 0.3rem;
            right: 10px;
            top: 0;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .images:hover img {
            transform: scale(1.2);
        }

        .select h1 {
            color: #11006f;
            font-weight: 700;
            font-size: 1.8rem;
            margin-left: 1rem;
        }

        .select a {
            font-size: 1.6rem;
            color: gray;
            font-weight: 600;
            text-decoration: none;
        }

        .select>a>span {
            font-size: 1.2rem;
            text-align: center;
            margin-right: 2rem;
        }
    </style>
    <title>Home</title>
</head>

<body>
    <div class="container grid wide">
        <div class="select">
            <h1>Hang Moi Gia Tot</h1>
            <a href="#">Xem them <span>></span></a>
        </div>
        <div class="product__add grid">
            <div class="row product_items">
                <div class="sale col_l l-2 m-3 c-0">
                    <div class="sale_items"><img src="https://bizweb.dktcdn.net/100/438/408/themes/949050/assets/home_preivew_sanpham_2_image_desktop.jpg" alt=""></div>
                </div>
                <div class="product_items_sp col_l l-10 m-9 c-12">
                    <div class="row product_item">
                        <?php foreach ($ab as $value => $key) :       ?>
                            <div class="item_sp col_l l-3 m-4 c-6">
                                <div class="images"><img src="<?php echo $key['Anh_sp'] ?>"></div>
                                <div class="name"><?php echo $key['Ten_sp']   ?></div>
                                <div class="price"><?php echo $key['Gia_sp']  ?> <span class="price_old">222.087đ</span></div>
                                <div class="search">-5%</div>
                            </div>
                        <?php endforeach;  ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>