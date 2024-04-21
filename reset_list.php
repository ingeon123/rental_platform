<?php
    $db = new mysqli("localhost","root","1755","rental");
    $query = "UPDATE list SET rental = 0, rental_user = 0 WHERE rental_date < CURDATE() AND rental != 2";
    $res = $db->query($query);

    if($res){
        return 0;
    }
    else{
        return 0;
    }
?>