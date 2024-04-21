<?php
    $db = new mysqli("localhost","root","1755","rental");
    $db->set_charset("utf8");
    
    if($_POST["user_id"]==null&&(!isset($_GET["no"]) || $_GET["no"] === '')){
        echo "<script>alert('로그인 후 이용해주세요');location.href='../member/login.php'</script>";
    }

    elseif(isset($_POST["user_id"])&&isset($_POST['no'])){
        echo "대여 if 들어옴";
        $user_id = $_POST["user_id"];
        $rental_date = $_POST["rental_date"];
        $no = $_POST["no"];
        $query = "UPDATE list SET rental=1,rental_user='$user_id' ,rental_date='$rental_date' WHERE no='$no'";
        $res = $db->query($query);
        if($res){
            echo "<script>alert('대여 성공');location.href='../main.php?user_id=".$user_id."'</script>";
        }
    }
    elseif(isset($_GET["no"])){
        $list_no = $_GET["no"];
        $user_id = $_GET["user_id"];
        $query = "UPDATE list SET rental_user = 0,rental = 0 WHERE no = '$list_no'";
        $res = $db->query($query);
        if($res){
            echo "<script>alert('취소 성공');location.href='../member/my_page.php?user_id=$user_id'</script>";
        }
    }
?>