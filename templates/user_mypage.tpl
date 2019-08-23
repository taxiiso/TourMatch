<div class="name">
  <p>ようこそ{$user_name}さん　<i class="fas fa-user-circle fa-color" ></i><a href="user_mypage.php">マイページ</a></p>
</div>
<section id="UM">
   <nav>
     <ul class="clearfix">
       <li><a href="#tourcancel">ツアー取り消し</a></li>
       <li><a href="#userchange">ユーザ登録変更</a></li>
       <li><a href="#userexit">退会する</a></li>
       <li><a href="user_book.php">ツアー予約する</a></li>
     </ul>
   </nav>
   <p>　</p>
   <h2 id="userlist">ツアー予約一覧</h2>
   <table class="nomal">
    <tr>
      <th>予約ID</th><th>日時</th><th>ツアー名</th><th>ツアー料金</th><th>ガイド名</th><th>予約</th>
    </tr>
    <!-- ユーザが予約しているツアー一覧を出力する -->
    {$htmlu}
   </table>
   <h2 id="tourcancel">ツアー取り消し</h2>
   <form class="in_form" action="#" method="post" name="usermanage">
    <!-- エラーメッセージの出力 -->
    {$err_mes}
    <!-- キャンセル完了メッセージの出力 -->
    {$user_can_mes}
    <p>登録ID<input type="tel" name="userbook_id" required>番のツアーをキャンセルする<br>
    ※一度キャンセルボタンを押すと元には戻せません</p>
    <p class="right"><input type="submit" value="実行"></p>
   </form>
   <p>　</p>
   <h2 id="userchange">ユーザ登録フォームの変更</h2>
   <!-- エラーメッセージの出力 -->
   {$er_mess}
   {$er_mail}
   {$er_loginid}
   <form class="in_form" action="user_edit_confirm.php" method="post">
     <p>ログインID<br>
     <input type="text" name="loginid" value="{$loginid}" required></p>
     <p>お名前<br>
     <input type="text" name="name" value="{$name}" required></p>
     <p>住所<br>
       <!-- 住所のフォームの出力 -->
       {$htmlp}
     </p>
     <p>電話番号<br>
     <input type="text" name="tel" value="{$tel}" required></p>
     <p>生年月日<br>
       <!-- 生年月日のフォームの出力 -->
       {$birthday}
     <p>性別<br>
     男<input type="radio" name="gender" value="男" {$man}>　女<input type="radio" name="gender" value="女" {$woman}></p>
     <p>メールアドレス<br>
     <input type="email" name="mail" value="{$mail}" required></p>
     <input type="submit" value="入力完了">
   </form>
   <p>　</p>
   <h2 id="userexit">退会する</h2>
   <form class="in_form" action="user_delete.php" method="post">
     <p>退会を希望される方は退会希望ボタン押してください。</p>
     <p class="right"><input type="submit"  name="exit_user" value="退会する"></p>
   </form>
   <p>　</p>
 </section>
