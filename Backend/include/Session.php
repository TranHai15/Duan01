<!-- liên quan đến sesion hay cookki -->
<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}

// ham gan session
function setSession($key, $value)
{
    return $_SESSION[$key] = $value;
}



// Ham doc session
function getSession($key = '')
{
    if (empty($key)) {
        return $_SESSION;
    } else {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
}

// Ham xoa sessioin

function removesession($key = ' ')
{
    if (empty($key)) {
        session_destroy();
        return true;
    } else {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
    }
}

// ham gans flash data
function setflashdata($key, $value)
{
    $key = 'flash_' . $key;

    return setSession($key, $value);
}

// Ham doc flash data
function getflashdata($key)
{
    $key = 'flash_' . $key;
    $data = getSession($key);
    removesession($key);
    return $data;
}



?>