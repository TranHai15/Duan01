<!-- File Ket noi vs PDO -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}
try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . _DB . '; host=' . _HOST;
        // $options = [
        //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        // ];
        $conn = new PDO($dsn, _USER, _PASS);
        if ($conn) {
            // echo 'Ket NOi Thanh CONg';
        }
    }
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>';
    die();
}
