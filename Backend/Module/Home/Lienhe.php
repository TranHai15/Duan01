<!-- lien he -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
if (isset($_SESSION['user'])) {
    echo $_SESSION['user'];
}
