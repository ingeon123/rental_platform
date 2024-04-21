<!DOCTYPE html>
<html>
<head>
    <title>대여 페이지</title>
</head>
<style>
    table, tr, th, td{
        border: 1px solid black;
    }
    input,button{
        margin-top: 5px;
    }
</style>
<body>
    <h1>대여자 : <?php echo isset($_POST['user_id']) && $_POST['user_id'] !== '' ? $_POST['user_id'] : 'guest'; ?></h1>

    <h3>대여 물품</h3>
    <form action="rental_list_db.php" method="post">
    <?php
        if (isset($_POST['user_id']) && $_POST['user_id'] !== '') {
            echo '<input type="hidden" name="user_id" value="'.htmlspecialchars($_POST['user_id']).'">';
        }
    ?>
        <table>
            <tr>
                <th>분류</th>
                <th>이름</th>
                <th>설명</th>
            </tr>
            <tr>
                <td><?php echo $_POST["itemtype"]?></td>
                <td><?php echo $_POST["name"]?></td>
                <td><?php echo $_POST["description"]?></td>
            </tr>
        </table>
        <input type="hidden" name="no" value="<?php echo $_POST['no']; ?>">
        <input type="date" name="rental_date">
        <br>
        <input type="submit" value="대여">
    </form>
    <button onclick="location.href='<?php echo isset($_POST['user_id']) && $_POST['user_id'] !== '' ?
     '../main.php?user_id='.urlencode($_POST['user_id']) : '../index.php' ?>'">
     메인 페이지 이동</button>
</body>
</html>