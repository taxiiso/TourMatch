<section id="AE">
    <nav>
     <ul>
       <li><a href="#tourlist">観光一覧・中止</a></li>
       <li><a href="#userlist">ユーザ一覧・復退会</a></li>
       <li><a href="#guidelist">ガイド一覧・復退会</a></li>
       <li><a href="admin_tour_registration_form.php">新規観光登録</a></li>
     </ul>
    </nav>
    <!-- エラーメッセージの出力 -->
   {$tourchange_mes}
   {$userchange_mes}
   {$guidechange_mes}
   {$err_mess}

   <h2 id="tourlist">観光一覧</h2>
   <table border=1>
    <tr>
      <th>ツアーID</th><th>ツアー名</th><th>場所</th><th>料金</th><th>内容</th><th>登録日</th><th>状態</th>
    </tr>
     <!-- ツアーデータの画像以外の一覧を出力 -->
    {$htmltu}
   </table>
     <!-- ツアーデータの画像を出力 -->
    <!-- {$htmlti} -->
    <p>※状態は、1.実施　2.中止</p>
    <form class="in_form" action="#" method="post" name="tourmanage">
     <p>ツアーID<input type="tel" name="tourid" required>番のツアーを<br>
        中止<input type="radio" name="afg" value="2" checked>　実施<input type="radio" name="afg" value="1"></p>
     <p><input type="submit" value="実行"></p>
    </form>
   <h2 id="userlist">ユーザ一覧</h2>
   <table border=1>
    <tr>
      <th>ユーザID</th><th>ログインID</th><th>パスワード</th><th>名前</th><th>住所</th><th>電話番号</th><th>生年月日</th><th>性別</th><th>登録日</th><th>メールアドレス</th><th>状態</th>
    </tr>
    <!-- ユーザ一覧を出力 -->
    {$htmluu}
  </table>
  <p>※状態は、1.仮登録　2.本登録　3.退会中</p>
  <form class="in_form" action="#" method="post" name="usermanage">
   <p>ユーザID<input type="tel" name="userid" required>番の会員を<br>
      退会<input type="radio" name="afg" value="3" checked>　復帰<input type="radio" name="afg" value="2"></p>
   <p><input type="submit" value="実行"></p>
  </form>
  <h2 id="guidelist">ガイド一覧</h2>
  <table border=1>
   <tr>
    <th>ガイドID</th><th>ログインID</th><th>パスワード</th><th>名前</th><th>住所</th><th>電話番号</th><th>生年月日</th><th>性別</th><th>登録日</th><th>日本語</th><th>英語</th><th>中国語</th><th>自己紹介</th><th>メールアドレス</th><th>状態</th>
  </tr>
  <!-- ガイド一覧の画像以外を出力 -->
  {$htmlg}
  </table>
  <!-- ガイドの画像一覧を出力 -->
  <!-- {$htmlgi} -->
  <p>※状態は、1.仮登録　2.本登録　3.退会中</p>
  <form class="in_form" action="#" method="post" name="guidemanage">
   <p>ガイドID<input type="tel" name="guideid" required>番の会員を<br>
      退会<input type="radio" name="afg" value="3" checked>　復帰<input type="radio" name="afg" value="2"></p>
   <p><input type="submit" value="実行"></p>
  </form>
</section>
