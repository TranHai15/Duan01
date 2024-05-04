<!-- Danh sach san pham Home -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
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
    <link rel="stylesheet" href="Fontend/Css/gird.css?ver=14" />
    <link rel="stylesheet" href="Fontend/Css/Home.css?ver=43" />
    <link rel="stylesheet" href="Fontend/Css/reponsit.css?ver=63" />
    <style>
        .container {
            background-color: beige;
        }

        .select {
            display: flex;
            justify-content: space-between;
            padding: 1.5rem 0;
        }

        .product {
            background-color: cornsilk;
        }

        .sale_items {
            background-color: cornflowerblue;
        }

        .product_items_sp {
            background-color: blueviolet;
        }

        .item_sp {
            background-color: aquamarine;
        }

        .images {
            width: 100%;
        }

        .images img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .item_sp {
            width: 100%;
            height: 100%;
            background-color: brown;
            display: flex;
            flex-direction: column;
            justify-content: start;
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
        <div class="product grid">
            <div class="row product_items">
                <div class="sale col l-2 m-3 c-0">
                    <div class="sale_items">sss</div>
                </div>
                <div class="product_items_sp col l-10 m-9 c-12">
                    <div class="row product_item">
                        <div class="item_sp col l-3 m-4 c-12">
                            <div class="images"><img src="https://bizweb.dktcdn.net/thumb/large/100/438/408/products/apm3299-xxm-7.jpg?v=1690163862957"></div>
                            <div class="name">Áo Polo Nam Pique Mắt Chim Basic Co Giãn Thoáng Khí</div>
                            <div class="price">309.303 d</div>
                            <ul class="san">
                                <li class="san_image"><img src="" alt=""></li>
                            </ul>

                        </div>
                        <div class="item_sp col l-3 m-4 c-12">aa</div>
                        <div class="item_sp col l-3 m-4 c-12">aa</div>
                        <div class="item_sp col l-3 m-0 c-12">aa</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>