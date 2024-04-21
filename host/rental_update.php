<?php
    $db = new mysqli("localhost","root","1755","rental");
    $db->set_charset("utf8");

    $act = ""; 
    $itemtype = ""; 
    $name = ""; 
    $description = ""; 

    if(isset($_GET["no"])){
        $no = $_GET["no"];
        $query = "SELECT * FROM list WHERE no=".$no;
        $res = $db->query($query);
        if($res){
            $row = $res->fetch_array();
            $act = "edit";
            $itemtype = $row["itemtype"];
            $name = $row["name"];
            $description = $row["description"];
        }
    }
    else{
        $act = "c";
        $itemtype = "";
        $name = "";
        $description = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="host_db.php" method="post">
        <table>
            <input type="hidden" name="act" value="<?php echo $act ?>">
            <input type="hidden" name="no" value="<?php echo isset($_GET['no']) ? $no : '' ?>">
            
            <tr>
                <th>분류</th>
                <td><input type="text" name="itemtype" value="<?php echo $itemtype ?>" required></td>
            </tr>
            <tr>
                <th>이름</th>
                <td><input type="text" name="name" value="<?php echo $name ?>"></td>
            </tr>
            <tr>
                <th>설명</th>
                <td><textarea name="description" cols="30" rows="10"><?php echo $description ?></textarea></td>
            </tr>
        </table>
        <input type="submit" value="<?php echo isset($_GET['no']) ? '수정' : '추가' ?>">
    </form>
</body>
</html>