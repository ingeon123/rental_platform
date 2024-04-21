<?php
    $db = new mysqli("localhost","root","1755","rental");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form id="user_id_form" action="user_db.php" method="post">
    <input type="hidden" name="act" value="r">
    <label for="user_name">이름 입력</label>
    <br>
    <input id="user_name" type="text" name="user_name">
    <br>

    <label for="user_id">아이디 입력</label>
    <br>
    <input id="user_id" type="text" name="user_id">
    <button type="button" id="check_btn">중복 검사</button>
    <br>

    <label for="user_passwd">비밀번호 입력</label>
    <br>
    <input id="user_passwd" type="text" name="user_passwd">
    <br>

    <label for="phone_num">휴대폰 번호 입력</label>
    <br>
    <input id="user_phone" type="text" name="user_phone">

    <input type="submit" value="회원가입">
</form>
<button onclick="location.href='../index.php'">메인 페이지 이동</button>
<script>
$(document).ready(function(){
    $("#check_btn").click(function(event){
        var userId = $("#user_id").val();
        $.ajax({
            url: "check_id.php",
            type: "POST",
            data: {user_id: userId},
            success: function(data){
                if(data == "exists"){
                    alert("중복된 id입니다.");
                } else {
                    alert("사용 가능한 id입니다.");
                }
            }
        });
    });
});
    </script>