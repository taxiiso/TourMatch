<?php
/* Smarty version 3.1.33, created on 2019-08-14 13:51:26
  from 'C:\Users\C-01\Desktop\xampp\htdocs\templates\user_edit_confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53934eba03b7_95966360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93f3b79bf8c92adaae1dec268d5dcca7934b3fc6' => 
    array (
      0 => 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\templates\\user_edit_confirm.tpl',
      1 => 1565670412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d53934eba03b7_95966360 (Smarty_Internal_Template $_smarty_tpl) {
?> <section id="UEC">
  <table class="nomal">
    <tr>
      <th>ログインID</th><td><?php echo $_smarty_tpl->tpl_vars['loginid']->value;?>
</td>
    </tr>
    <tr>
      <th>お名前</th><td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
    </tr>
    <tr>
      <th>住所</th><td><?php echo $_smarty_tpl->tpl_vars['adrress']->value;?>
</td>
    </tr>
    <tr>
      <th>電話番号</th><td><?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
</td>
    </tr>
    <tr>
      <th>生年月日</th><td><?php echo $_smarty_tpl->tpl_vars['birth_year']->value;?>
年<?php echo $_smarty_tpl->tpl_vars['birth_month']->value;?>
月<?php echo $_smarty_tpl->tpl_vars['birth_day']->value;?>
日</td>
    </tr>
    <tr>
      <th>性別</th><td><?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
</td>
    </tr>
    <tr>
      <th>メールアドレス</th><td><?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
</td>
    </tr>
  </table>
  <div class="clearfix">
    <form class="left_button" action="user_edit_complete.php" method="post">
      <input type="submit"  name="complete" value="再登録する">
    </form>
    <form action="user_mypage.php" method="post">
      <input class="right_button" type="submit"  name="back" value="修正する">
    </form>
  </div>
</section>
<?php }
}
