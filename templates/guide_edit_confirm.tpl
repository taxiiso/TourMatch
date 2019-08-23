<section>
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
    <tr>
      <th>対応可能言語</th><td>{$japanese}　{$english}　{$chinese}</td>
    </tr>
    <tr>
      <th>写真</th><td>{$images}</td>
    </tr>
    <tr>
      <th>自己紹介</th><td>{$self_introduction}</td>
    </tr>
  </table>
  <div class="clearfix">
    <form class="left_button" action="guide_edit_complete.php" method="post">
      <input type="submit"  name="complete" value="再登録する">
    </form>
    <form class="left_button" action="guide_mypage.php" method="post">
      <input type="submit"  name="back" value="修正する">
    </form>
  </div>
</section>
