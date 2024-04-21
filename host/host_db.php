<?php
    $db = new mysqli("localhost","root","1755","rental");
    
    if($_POST["act"]=="c"){
        echo "if문 들어감";
        $insert_itemtype = $_POST["itemtype"];
        $insert_name = $_POST["name"];
        $insert_description = $_POST["description"];
        $insert_no = $_POST["no"];
        $insert_query = "INSERT INTO 
                        list (itemtype, name, description) 
                        VALUES ('$insert_itemtype', '$insert_name', '$insert_description')";
        $insert_res = $db->query($insert_query);
        if($insert_res){
            echo "<script>alert('대여 리스트 추가 완료');location.href='host_page.php'</script>";
        }
        if($insert_res === false){
            echo "쿼리 실행 실패: " . $db->error;
        }
    }
    elseif(isset($_GET["no"])&&$_GET["act"]=="del"){
        $delete_no = $_GET["no"];
        $delete_query = "DELETE FROM list WHERE no = '$delete_no';";
        $delete_res = $db->query($delete_query);
        if($delete_res){
            echo "<script>alert('대여 리스트 삭제 완료');location.href='host_page.php'</script>";
        }
    }

    // 
    elseif(isset($_POST["no"])&&$_POST["act"]=="edit"){
        $update_no = $_POST["no"];
        $update_itemtype = $_POST["itemtype"];
        $update_name = $_POST["name"];
        $update_description = $_POST["description"];
        $update_query = "UPDATE list SET itemtype = '$update_itemtype', name = '$update_name' ,description = '$update_description' WHERE no = '$update_no'";
        $update_res = $db->query($update_query);
        if($update_res){
            echo "<script>alert('대여 리스트 수정');location.href='host_page.php'</script>";
        }
        else{
            echo "오류";
        }
    }
    elseif(isset($_GET["rental"])&&$_GET["act"]=="fix")
    {
        $fix_rental = $_GET["rental"];
        $fix_no = $_GET["no"];
        if($fix_rental==2){
            $fix_query = "UPDATE list SET rental = 0 WHERE no = '$fix_no'";
            $fix_res = $db->query($fix_query);
            echo "<script>alert('유지보수 수정 완료');location.href='host_page.php'</script>";
        }
        elseif($fix_rental==1){
            echo "<script>alert('손님 대여 중');location.href='host_page.php'</script>";
        }
        elseif($fix_rental==0){
            $fix_query = "UPDATE list SET rental = 2 WHERE no = '$fix_no'";
            $fix_res = $db->query($fix_query);
            echo "<script>alert('유지보수 수정 완료');location.href='host_page.php'</script>";
        }
        else{
            echo "오류";
        }
    }
?>
