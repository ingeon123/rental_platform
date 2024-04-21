<?php
    $db = new mysqli("localhost","root","1755","rental");
    $db->set_charset("utf8");
    if(isset($_GET["no"])){
        $itme_no = $_GET["no"];
        $query = "SELECT * FROM list WHERE no = '$itme_no'";
        $res = $db->query($query);
        $row = $res->fetch_array();
    }
?>
<style>
    table, tr, th, td{
        border: 1px solid black;
    }
</style>
<body>
    <table>
        <tr>
            <th>분류</th>
            <th>이름</th>
            <th>설명</th>
        </tr>
        <tr>
            <td><?php echo $row["itemtype"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["description"]?></td>
        </tr>
    </table>
    <form action="rental_page.php" method="post">
        <?php
            if (isset($_GET['user_id']) && $_GET['user_id'] !== '') {
                echo '<input type="hidden" name="user_id" value="'.htmlspecialchars($_GET['user_id']).'">';
            }
        ?>
        <input type="hidden" name="itemtype" value="<?php echo $row["itemtype"]?>">
        <input type="hidden" name="name" value="<?php echo $row["name"]?>">
        <input type="hidden" name="description" value="<?php echo $row["description"]?>" >
        <input type="hidden" name="no" value="<?php echo $_GET['no']?>">
        <input type="submit" value="대여">
    </form>
    <button onclick="location.href='<?php echo isset($_GET['user_id']) && $_GET['user_id'] !== '' ?
     '../main.php?user_id='.urlencode($_GET['user_id']) : '../index.php' ?>'">
     메인 페이지 이동</button>
</body>