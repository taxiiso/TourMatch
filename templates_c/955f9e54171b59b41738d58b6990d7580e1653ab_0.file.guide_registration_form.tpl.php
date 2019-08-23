<?php
/* Smarty version 3.1.33, created on 2019-08-14 11:03:52
  from '/Applications/MAMP/htdocs/templates/guide_registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53ea98e35430_12791828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '955f9e54171b59b41738d58b6990d7580e1653ab' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/guide_registration_form.tpl',
      1 => 1565533086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d53ea98e35430_12791828 (Smarty_Internal_Template $_smarty_tpl) {
?><section id=GRF>
 <h2>ガイド新規登録フォーム</h2>
 <!-- エラーメッセージの出力 -->
 <?php echo $_smarty_tpl->tpl_vars['er_mess']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_mail']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_loginid']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_lang']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_image_size']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_num']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_image_type']->value;?>

 <form class="in_form" action="guide_registration_confirm.php" method="post" enctype="multipart/form-data">
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
   <p>写真(※5MB以内で、ファイル形式はJPEG、PNG、GIFのみ)<br>
   <input type="file" name="image" value="" required></p>
   <p>自己紹介(1000文字以内)<br>
   <textarea name="self_introduction" style="width:400px; height:200px" required><?php echo $_smarty_tpl->tpl_vars['self_introduction']->value;?>
</textarea></p>
   <input type="submit" value="入力完了">
 </form>
</section>
<?php }
}
