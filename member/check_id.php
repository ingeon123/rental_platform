<?php
    $db = new mysqli("localhost","root","1755","rental");

    if ($db->connect_error) {
        die('DB 연결 실패: ' . $db->connect_error);
    }
    $user_id = $_POST['user_id'];

    $query = "SELECT * FROM user WHERE id = $user_id";
    $res = $db->query($query);
    if ($res->num_rows > 0) {
        echo "exists";
    } else {
        echo "available";
    }
?>