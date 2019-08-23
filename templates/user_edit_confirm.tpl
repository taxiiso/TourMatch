 <section id="UEC">
  <table class="nomal">
    <tr>
      <th>ログインID</th><td>{$loginid}</td>
    </tr>
    <tr>
      <th>お名前</th><td>{$name}</td>
    </tr>
    <tr>
      <th>住所</th><td>{$adrress}</td>
    </tr>
    <tr>
      <th>電話番号</th><td>{$tel}</td>
    </tr>
    <tr>
      <th>生年月日</th><td>{$birth_year}年{$birth_month}月{$birth_day}日</td>
    </tr>
    <tr>
      <th>性別</th><td>{$gender}</td>
    </tr>
    <tr>
      <th>メールアドレス</th><td>{$mail}</td>
    </tr>
  </table>
  <div class="clearfix">
    <form class="left_button" action="user_edit_complete.php" method="post">
      <input type="submit"  name="complete" value="再登録する">
    </form>
    <form action="user_mypage.php" method="post">
      <input class="right_button" type="submit"  name="back" value="修正する">
    </form>
  </div>
</section>
