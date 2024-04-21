<?php
    include '../reset_list.php';
    $db = new mysqli("localhost","root","1755","rental");
    $db->set_charset("utf8");
    if(isset($_GET["item"])&&$_GET["act"]=="se"){
        $item = $_GET["item"];
        $query = "SELECT * FROM list WHERE name LIKE '%$item%' AND rental = 0";
        $res = $db->query($query);
    }
    elseif(isset($_GET['itemtype'])&&$_GET["act"]=="t"){
        $type = $_GET["itemtype"];
        $query = "SELECT * FROM list WHERE itemtype = '$type' AND rental = 0";
        $res = $db->query($query);
    }

    if($res && $res->num_rows < 1){
        $query = "SELECT * FROM list WHERE rental = 0";
        $res = $db->query($query);
    }

?>
<style>
    table, tr, th, td{
        border: 1px solid black;
    }
</style>
    <form action="list.php" method="GET">
        <h3>검색창</h3>
        <?php if(isset($_GET['user_id']) && !empty($_GET['user_id'])): ?>
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
        <?php endif; ?>
        <input type="hidden" name="act" value="se">
        <input type="text" name="item" placeholder="대여 품목 입력">
        <input type="submit" value="검색">
    </form>
    <table>
        <tr>
            <th>분류</th>
            <th>이름</th>
            <th>설명</th>
        </tr>
<?php
    while($row = $res->fetch_array()){
?>
        <tr>
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']?>">
            <td><?php echo $row["itemtype"] ?></td>
            <td><a href="view.php?<?php if (isset($_GET["user_id"]) && $_GET["user_id"] !== '') echo "user_id=" . urlencode($_GET["user_id"]); ?>&no=<?php echo $row["no"] ?>">
        <?php echo $row["name"] ?>
    </a></td>
            <td><?php echo $row["description"] ?></td>
        </tr>
<?php      
    }
?>
    </table>
    <button onclick="location.href='<?php echo isset($_GET['user_id']) && $_GET['user_id'] !== '' ?
     '../main.php?user_id='.urlencode($_GET['user_id']) : '../index.php' ?>'">
     메인 페이지 이동</button>