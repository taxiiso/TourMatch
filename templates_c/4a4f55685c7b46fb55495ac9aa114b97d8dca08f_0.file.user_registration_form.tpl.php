<?php
/* Smarty version 3.1.33, created on 2019-08-14 11:03:46
  from '/Applications/MAMP/htdocs/templates/user_registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53ea9280a9f9_42532424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a4f55685c7b46fb55495ac9aa114b97d8dca08f' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/user_registration_form.tpl',
      1 => 1565759880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d53ea9280a9f9_42532424 (Smarty_Internal_Template $_smarty_tpl) {
?><section id=URF>
 <h2>ユーザー新規登録フォーム</h2>
 <!-- エラーメッセージの出力 -->
 <?php echo $_smarty_tpl->tpl_vars['er_mess']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_mail']->value;?>

 <?php echo $_smarty_tpl->tpl_vars['er_loginid']->value;?>

 <form class="in_form" action="user_registration_confirm.php" method="post">
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
     <?php echo $_smarty_tpl->tpl_vars['birthday']->value;?>

   <p>性別<br>
   男<input type="radio" name="gender" value="男" <?php echo $_smarty_tpl->tpl_vars['man']->value;?>
>　女<input type="radio" name="gender" value="女" <?php echo $_smarty_tpl->tpl_vars['woman']->value;?>
></p>
   <p>メールアドレス<br>
   <input type="email" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
" required></p>
   <input type="submit" value="入力完了">
 </form>
</section>
<?php }
}
