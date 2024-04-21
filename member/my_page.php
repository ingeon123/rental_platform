<?php
    include '../reset_list.php';
    $db = new mysqli("localhost","root","1755","rental");
    $db->set_charset("utf8");
    $user_id = $_GET["user_id"];
    $user_query = "SELECT * FROM list WHERE rental_user = '$user_id'";
    $user_res = $db->query($user_query);
?>
<style>
    table,tr,th,td{
        border: 1px solid black;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="my_imfo">

    </div>
    <div class="my_rental_list">
        <h2>내가 대여한 품목</h2>
        <table>
            <tr>
                <th>분류</th>
                <th>이름</th>
                <th>설명</th>
                <th>대여 날짜</th>
                <th>취소</th>
            </tr>
            
            <?php
                while($user_row = $user_res->fetch_array()){
                    $user_rental_no = $user_row["no"]
            ?>
            <tr>
                <td><?php echo $user_row["itemtype"]?></td>
                <td><?php echo $user_row["name"]?></td>
                <td><?php echo $user_row["description"]?></td>
                <td><?php echo $user_row["rental_date"]?></td>
                <td><button onclick="location.href=
                '../rental/rental_list_db.php?no=<?php echo $user_rental_no?>&user_id=<?php echo $user_id?>'">대여 취소</button></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <button onclick="location.href='../main.php?user_id=<?php echo $_GET['user_id']?>'">메인 페이지 이동</button>
</body>
</html>