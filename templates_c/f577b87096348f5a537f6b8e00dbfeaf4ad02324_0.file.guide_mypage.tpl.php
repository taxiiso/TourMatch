<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:36:13
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/guide_mypage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f7b4de698a3_56826292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f577b87096348f5a537f6b8e00dbfeaf4ad02324' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/guide_mypage.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f7b4de698a3_56826292 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="name">
  <p>ようこそ<?php echo $_smarty_tpl->tpl_vars['guide_name']->value;?>
さん　<i class="fas fa-user-circle fa-color" ></i><a href="guide_mypage.php">マイページ</a></p>
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
  <?php echo $_smarty_tpl->tpl_vars['htmlu']->value;?>

 </table>
 <h2 id="tourcancel">ガイド取り消し</h2>
 <form class="in_form" action="#" method="post" name="guidemanage">
   <!-- エラーメッセージの出力 -->
   <?php echo $_smarty_tpl->tpl_vars['err_mes']->value;?>

   <!-- キャンセル完了メッセージの出力 -->
   <?php echo $_smarty_tpl->tpl_vars['guide_can_mes']->value;?>

  <p>登録ID<input type="tel" name="guidebook_id" required>番のツアーをキャンセルする<br>
  ※すでに予約が入っているものはキャンセルできません。</p>
  <p class="right"><input type="submit" value="実行"></p>
 </form>
 <p>　</p>
 <h2 id="guidechange">ガイド登録情報の変更</h2>
 <!-- エラーメッセージの出力 -->
 <?php echo $_smarty_tpl->tpl_vars['er_mess']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_mail']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_loginid']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_lang']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_image_size']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_num']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_image_type']->value;?>

 <form class="in_form" action="guide_edit_confirm.php" method="post" enctype="multipart/form-data">
   <p>ログインID<br>
   <input type="text" name="loginid" value="<?php echo $_smarty_tpl->tpl_vars['loginid']->value;?>
" required></p>
   <p>お名前<br>
   <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" required></p>
   <p>住所<br>
     <!-- 住所のフォームを出力 -->
     <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

   </p>
   <p>電話番号<br>
   <input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
" required></p>
   <p>生年月日<br>
     <!-- 生年月日のフォームを出力 -->
     <?php echo $_smarty_tpl->tpl_vars['birthday']->value;?>

   <p>性別<br>
     男<input type="radio" name="gender" value="男" <?php echo $_smarty_tpl->tpl_vars['man']->value;?>
>　女<input type="radio" name="gender" value="女" <?php echo $_smarty_tpl->tpl_vars['woman']->value;?>
></p>
   <p>メールアドレス<br>
   <input type="email" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
" required></p>
   <p>対応可能言語<br>
     日本語<input type="checkbox" name="japanese" value="日本語" <?php echo $_smarty_tpl->tpl_vars['japanese']->value;?>
>　英語<input type="checkbox" name="english" value="英語" <?php echo $_smarty_tpl->tpl_vars['english']->value;?>
>　中国語<input type="checkbox" name="chinese" value="中国語" <?php echo $_smarty_tpl->tpl_vars['chinese']->value;?>
></p>
   <p>登録されている写真</p>
   <p><?php echo $_smarty_tpl->tpl_vars['image']->value;
echo $_smarty_tpl->tpl_vars['image_er']->value;?>
</p>
   <p>写真を変更する(※5MB以内で、ファイル形式はJPEG、PNG、GIFのみ)<br>
   <input type="file" name="image" value=""></p>
   <p>自己紹介(1000文字以内)<br>
   <textarea name="self_introduction" style="width:400px; height:200px" required><?php echo $_smarty_tpl->tpl_vars['self_introduction']->value;?>
</textarea></p>
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
<?php }
}
