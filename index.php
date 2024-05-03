<!-- File dieu huong -->
<?php
session_start();
require_once('Count.php');
require_once('Backend/include/PDO.php');
require_once('Backend/include/Database.php');
require_once('Backend/include/Function.php');
require_once('Backend/include/Session.php');

$data = [
    'Name_users' => 'Tran Van hai',
    'Phone_users' => '0965932120',
    'Email_users'  => 'hairobet15092005@gmail.com',
    'Password_users' => '123456789',

];

// insert("users", $data);



$module = _MODULE;
$action = _ACTION;
if (!empty($_GET['Module'])) {
    if (is_string($_GET['Module'])) {
        $module =  trim($_GET['Module']);
    }
}
if (!empty($_GET['action'])) {
    if (is_string($_GET['action'])) {
        $action =  trim($_GET['action']);
    }
}
// echo $module . "<br>";
// echo $action;
$path = 'Backend/' . 'Module/' . $module . '/' . $action . '.php';
if (file_exists($path)) {
    require_once($path);
} else {
    require_once('Backend/Module/Error/404.php');
}
