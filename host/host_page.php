<?php
    include '../reset_list.php';
    $db = new mysqli("localhost","root","1755","rental");
    $db->set_charset("utf8");
    $user_query = "SELECT * FROM user";
    $user_res = $db->query($user_query);
    $list_query = "SELECT * FROM list";
    $list_res = $db->query($list_query);
    if(isset($_GET["item"])){
        $name = $_GET["item"];
        $list_query = "SELECT * FROM list WHERE name = '$name'";
        $list_res = $db->query($list_query);
        if($list_res && $list_res->num_rows < 1){
            $list_query = "SELECT * FROM list";
            $list_res = $db->query($list_query);
        }
    }
?>
<link rel="stylesheet" type="text/css" href="host_style.css">
    <script>
        function logout(){
            alert("로그 아웃")
            window.location.href="/"
        }
    </script>
    <div class="logout">
        <button onclick="logout()">로그 아웃</button>
    </div>
    <h3>유저 정보</h3>
    <table>
        <tr>
            <th>name</th>
            <th>id</th>
            <th>password</th>
            <th>rank</th>
            <th>phone</th>
        </tr>
<?php
    while($user_row = $user_res->fetch_array()){
?>
        <tr>
            <th><?php echo $user_row["name"]?></th>
            <th><?php echo $user_row["id"]?></th>
            <th><?php echo $user_row["passwd"]?></th>
            <th><?php echo $user_row["rank"]?></th>
            <th><?php echo $user_row["phone"]?></th>
        </tr>
<?php      
    }
?>
    </table>
    <br><br><br>
    <form action="host_page.php" method="GET">
        <label for="select"><strong>검색창</strong></label>
        <input id="select" type="text" name="item" placeholder="대여 품목 입력">
        <input type="submit" value="검색">
    </form>
    <h3>대여 리스트</h3>
    
    <div class="table-container">
        <table class="list_tb">
            <tr>
                <th>itemtype</th>
                <th>name</th>
                <th>description</th>
                <th>rental</th>
                <th>rental_user</th>
                <th>삭제</th>
                <th>수정</th>
                <th>상태</th>
            </tr>
    <?php
        while($list_row = $list_res->fetch_array()){
    ?>
            <tr>
                <td><?php echo $list_row["itemtype"]?></td>
                <td><?php echo $list_row["name"]?></td>
                <td><?php echo $list_row["description"]?></td>
                <td><?php if($list_row["rental"]==0){echo "사용가능";}elseif($list_row["rental"]==1){echo "대여 중";}elseif($list_row["rental"]==2){echo "유지보수중";}else{echo "오류";}?></td>
                <td><?php echo $list_row["rental_user"]?></td>
                <td><button onclick="location.href='host_db.php?no=<?php echo $list_row['no']; ?>&act=del'">삭제</button></td>
                <td><button onclick="location.href='rental_update.php?no=<?php echo $list_row['no']; ?>'">수정</button></td>
                <td><input type="button" value="
                <?php if($list_row["rental"]==0){echo "유지보수 전환";}elseif($list_row["rental"]==1){echo "대여 중";}elseif($list_row["rental"]==2){echo "사용가능 전환";}else{echo "오류";}?>
                " onclick="location.href='host_db.php?no=<?php echo $list_row['no']; ?>&rental=<?php echo $list_row['rental']; ?>&act=fix'"></td>
            </tr>
    <?php      
        }
    ?>
        </table>
        <div class="button-container">
            <button onclick="location.href='rental_update.php'">리스트 추가</button>
        </div>
    </div>