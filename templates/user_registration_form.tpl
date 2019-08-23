<section id=URF>
 <h2>ユーザー新規登録フォーム</h2>
 <!-- エラーメッセージの出力 -->
 {$er_mess}
 {$er_mail}
 {$er_loginid}
 <form class="in_form" action="user_registration_confirm.php" method="post">
   <p>ログインID<br>
   <input type="text" name="loginid" value="{$loginid}" required></p>
   <p>お名前<br>
   <input type="text" name="name" value="{$name}" required></p>
   <p>住所<br>
       <!-- 住所のフォームを出力 -->
      {$html}
   </p>
   <p>電話番号<br>
   <input type="text" name="tel" value="{$tel}" required></p>
   <p>生年月日<br>
     {$birthday}
   <p>性別<br>
   男<input type="radio" name="gender" value="男" {$man}>　女<input type="radio" name="gender" value="女" {$woman}></p>
   <p>メールアドレス<br>
   <input type="email" name="mail" value="{$mail}" required></p>
   <input type="submit" value="入力完了">
 </form>
</section>
