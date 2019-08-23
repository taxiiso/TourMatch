<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:45:10
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_registration_confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f7d66b00675_27945091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ead3ded1455b30976642e0749d6faf4984850186' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_registration_confirm.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f7d66b00675_27945091 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="URC">
  <h2>入力内容確認</h2>
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
    <form class="left_button" action="user_registration_complete.php" method="post">
      <input type="submit"  name="complete" value="登録する">
    </form>
    <form class="right_button" action="user_registration_form.php" method="post">
      <input type="submit"  name="back" value="修正する">
    </form>
  </div>
</section>
<?php }
}
