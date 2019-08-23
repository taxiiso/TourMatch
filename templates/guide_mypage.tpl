<div class="name">
  <p>ようこそ{$guide_name}さん　<i class="fas fa-user-circle fa-color" ></i><a href="guide_mypage.php">マイページ</a></p>
</div>
<section id="GM">
 <nav>
   <ul>
     <li><a href="#guidecancel">ガイド取り消し</a></li>
     <li><a href="#guidechange">ガイド登録変更</a></li>
     <li><a href="#guideexit">退会する</a></li>
     <li><a href="guide_book.php">ツアーガイド登録する</a></li>
   </ul>
</nav>
<p>　</p>
 <h2 id="guidelist">ガイド予定一覧</h2>
 <table class="nomal">
  <tr>
    <th>登録ID</th><th>ツアー名</th><th>日付</th><th>場所</th><th>料金</th><th>予約</th>
  </tr>
  <!-- ガイドが予約しているツアー一覧を出力する -->
  {$htmlu}
 </table>
 <h2 id="tourcancel">ガイド取り消し</h2>
 <form class="in_form" action="#" method="post" name="guidemanage">
   <!-- エラーメッセージの出力 -->
   {$err_mes}
   <!-- キャンセル完了メッセージの出力 -->
   {$guide_can_mes}
  <p>登録ID<input type="tel" name="guidebook_id" required>番のツアーをキャンセルする<br>
  ※すでに予約が入っているものはキャンセルできません。</p>
  <p class="right"><input type="submit" value="実行"></p>
 </form>
 <p>　</p>
 <h2 id="guidechange">ガイド登録情報の変更</h2>
 <!-- エラーメッセージの出力 -->
 {$er_mess}
 {$er_mail}
 {$er_loginid}
 {$er_lang}
 {$er_image_size}
 {$er_num}
 {$er_image_type}
 <form class="in_form" action="guide_edit_confirm.php" method="post" enctype="multipart/form-data">
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
     <!-- 生年月日のフォームを出力 -->
     {$birthday}
   <p>性別<br>
     男<input type="radio" name="gender" value="男" {$man}>　女<input type="radio" name="gender" value="女" {$woman}></p>
   <p>メールアドレス<br>
   <input type="email" name="mail" value="{$mail}" required></p>
   <p>対応可能言語<br>
     日本語<input type="checkbox" name="japanese" value="日本語" {$japanese}>　英語<input type="checkbox" name="english" value="英語" {$english}>　中国語<input type="checkbox" name="chinese" value="中国語" {$chinese}></p>
   <p>登録されている写真</p>
   <p>{$image}{$image_er}</p>
   <p>写真を変更する(※5MB以内で、ファイル形式はJPEG、PNG、GIFのみ)<br>
   <input type="file" name="image" value=""></p>
   <p>自己紹介(1000文字以内)<br>
   <textarea name="self_introduction" style="width:400px; height:200px" required>{$self_introduction}</textarea></p>
   <input type="submit" value="入力完了">
 </form>
 <p>　</p>
 <h2 id="guideexit">退会する</h2>
 <form class="in_form" action="guide_delete.php" method="post">
   <p>退会を希望される方は退会希望ボタン押してください。</p>
   <p class="right"><input type="submit"  name="exit_guide" value="退会する"></p>
 </form>
 <p>　</p>
</section>
