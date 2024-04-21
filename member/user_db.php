<?php
    $db = new mysqli("localhost","root","1755","rental");

    if ($db->connect_error) {
        die('DB 연결 실패: ' . $db->connect_error);
    }

    if($_POST['act']=='l'){
        $user_id = $_POST['user_id'];
        $user_passwd = $_POST['user_passwd'];
        $query = "SELECT * FROM user WHERE id = '$user_id' AND passwd = '$user_passwd'";
        $res = $db->query($query);
        $row = $res->fetch_array();
        if($res->num_rows > 0){
            if($row['rank']=='host'){
                echo "<script>alert('관리자 로그인');location.href='/../host/host_page.php'</script>"; 
            }
            echo "<script>alert('로그인 성공');location.href='/../main.php?user_id=".$row['no']."'</script>";
        }
        else{
            echo "<script>alert('로그인 실패');location.href='login.php'</script>";
        }
    }
    elseif($_POST['act']=="r"){
        $user_id = $_POST['user_id'];
        $user_passwd = $_POST['user_passwd'];
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        
        $query = "INSERT INTO user (id, passwd, name, phone) VALUES ('$user_id','$user_passwd','$user_name','$user_phone')";
        $res = $db->query($query);
        if($res){
            echo "<script>alert('회원가입 성공');location.href='login.php'</script>";
        }
        else{
            echo "<script>alert('회원가입 실패');location.href='register.php'</script>";
        }
    }
?>
