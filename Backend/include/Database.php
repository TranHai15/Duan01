<!-- Cac ham xu ly  den database -->

<?php
if (!defined('_CODE')) {
    die('Truy cập không hợp lệ');
}

// ham chay du lieu
function query($sql, $data = [], $check = false)
{
    global $conn;
    $kq = false;
    try {
        $statement = $conn->prepare($sql);
        if (!empty($data)) {
            $kq = $statement->execute($data);
        } else {
            $kq = $statement->execute();
        }
    } catch (Exception $exp) {
        echo $exp->getMessage() . '<br>';
        echo 'File ' . $exp->getFile() . '<br>';
        echo 'Line ' . $exp->getLine();
        die();
    }
    if ($check) {
        return $statement;
    }
    return $kq;
}
// ham them du lieu vao bang
function insert($table, $data)
{
    $key = array_keys($data);
    $truonginsert = implode(',', $key);
    $value = ':' . implode(',:', $key);
    $sql = 'INSERT INTO ' .  $table  . ' (' . $truonginsert  . ') ' . ' VALUES ' .   '( ' . $value . ')';
    $ketqua =  query($sql, $data, '');
    return $ketqua;
}


// ham update
function updates($table, $data, $dieukien = '')
{
    $update = '';
    foreach ($data as $key => $values) {
        $update .= $key . '= :' . $key . ',';
    }
    $update = trim($update, ',');
    if (!empty($dieukien)) {
        $sql = 'UPDATE ' .  $table  . ' SET ' .  $update  . ' WHERE ' . $dieukien;
    } else {
        $sql = 'UPDATE  ' . $table . ' SET ' . $update;
    }
    $ketqua = query($sql, $data);
    return $ketqua;
}


// ham deleta
function deletes($table, $dieukien = '')
{
    if (!empty($dieukien)) {
        $sql = 'DELETE FROM  ' . $table . ' WHERE ' . $dieukien;
    } else {
        $sql = 'DELETE FROM ' . $table;
    }
    $ketqua = query($sql);
    return $ketqua;
}
// Lấy Nhiều dòng dữ liệu
function getRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFeth = $kq->fetchAll(PDO::FETCH_ASSOC);
    }
    return $dataFeth;
}

// Lay mot dong du lieu
function oneRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFeth = $kq->fetch(PDO::FETCH_ASSOC);
    }
    return $dataFeth;
}
// đếm số dòng sữ liệu 

function demdulieu($sql)
{
    $kq = query($sql, '', true);
    if (!empty($kq)) {
        return $kq->rowCount();
    }
}






// Hien thi toan bo haoc co dieu kien 
function selsects($table, $dieukien = '')
{
    global $conn; // Thêm dòng này để có thể sử dụng biến $conn trong hàm
    if (!empty($dieukien)) {
        $sql = "SELECT * FROM $table WHERE $dieukien"; // Sử dụng * để chọn tất cả các cột
    } else {
        $sql = "SELECT * FROM $table";
    }
    try {
        $statement = $conn->prepare($sql);
        $statement->execute();
        $ketqua = $statement->fetchAll(PDO::FETCH_ASSOC);
        // print_r($ketqua);
        return $ketqua;
    } catch (Exception $exp) {
        echo $exp->getMessage() . '<br>';
        echo 'File ' . $exp->getFile() . '<br>';
        echo 'Line ' . $exp->getLine();
        die();
    }
}
// Hien thi co dieu kien va gio han ;
function selecttopsp($table, $dieukien, $slhienthi = 1)
{
    global $conn;
    $sql = "SELECT * FROM $table  WHERE $dieukien ORDER BY Soluongmua DESC LIMIT $slhienthi";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute();
        $ketqua = $statement->fetchAll(PDO::FETCH_ASSOC);
        // print_r($ketqua);
        return $ketqua;
    } catch (Exception $exp) {
        echo $exp->getMessage() . '<br>';
        echo 'File ' . $exp->getFile() . '<br>';
        echo 'Line ' . $exp->getLine();
        die();
    }
}
