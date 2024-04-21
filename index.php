<style>
    .category{
        display: inline-block;
        padding: 10px 20px;
        background-color: #f2f2f2;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 5px;
        border: 1px solid black;
        width: 100px;
    }
    header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    .user {
        display: flex;
        gap: 10px;
    }
</style>

<header>
    <h1>공공 기관 대여 플랫폼</h1>
    <div class="user">
        <button onclick="location.href='member/login.php'">로그인</button>
        <button onclick="location.href='member/register.php'">회원가입</button>
    </div>
</header>
<body>
    <form action="rental/list.php" method="GET">
        <h3>검색창</h3>
        <input type="hidden" name="act" value="se">
        <input type="text" name="item" placeholder="대여 품목 입력">
        <input type="submit" value="검색">
    </form>
    <div>
        <div>
            <div class="category" onclick="redirectToRental('soccer')"><h3>축구장</h3></div>
            <div class="category" onclick="redirectToRental('basketball')"><h3>농구장</h3></div>
        </div>
        <div>
            <div class="category" onclick="redirectToRental('swimming')"><h3>수영장</h3></div>
            <div class="category" onclick="redirectToRental('baseball')"><h3>야구장</h3></div>
        </div>
    </div>
</body>
<footer>

</footer>
<script>
    function redirectToRental(item) {
  var urlParams = new URLSearchParams(window.location.search);
  var user_id = urlParams.get('user_id');
  
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'rental/list.php?itemtype=' + item + '&act=t', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        window.location.href = 'rental/list.php?&itemtype=' + item + '&act=t';
    }
  };
  xhr.send();
}
    function logout(){
        window.location.href = '/'
        alert("로그아웃 완료");
    }
</script>