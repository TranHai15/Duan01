<!-- Chay mac dinh -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}

include "Fontend/Layout/Header.html";
include "Fontend/Layout/Footer.html";
if (isset($_SESSION['user'])) {
    echo $_SESSION['user'];
}
?>