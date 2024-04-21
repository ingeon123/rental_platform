
<div>
    <form action="user_db.php" method="post">
        <input type="hidden" name="act" value="l">
        <input type="text" name="user_id" placeholder="ID" required>
        <br><br>
        <input type="password" name="user_passwd" placeholder="password" required>
        <input type="submit" value="로그인">
    </form>
    <button onclick="location.href='register.php'">회원가입</button>
    <button onclick="location.href='../index.php'">메인 페이지 이동</button>
</div>