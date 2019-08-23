<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:44:59
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f7d5ba57bf7_92911602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0875193ec4385a31ba7ccab1a8b627a5b6b60066' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_registration_form.tpl',
      1 => 1566537295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f7d5ba57bf7_92911602 (Smarty_Internal_Template $_smarty_tpl) {
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
