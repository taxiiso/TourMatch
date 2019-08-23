<section id=GRF>
 <h2>ガイド新規登録フォーム</h2>
 <!-- エラーメッセージの出力 -->
 {$er_mess}
 {$er_mail}
 {$er_loginid}
 {$er_lang}
 {$er_image_size}
 {$er_num}
 {$er_image_type}
 <form class="in_form" action="guide_registration_confirm.php" method="post" enctype="multipart/form-data">
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
   <p>写真(※5MB以内で、ファイル形式はJPEG、PNG、GIFのみ)<br>
   <input type="file" name="image" value="" required></p>
   <p>自己紹介(1000文字以内)<br>
   <textarea name="self_introduction" style="width:400px; height:200px" required>{$self_introduction}</textarea></p>
   <input type="submit" value="入力完了">
 </form>
</section>
