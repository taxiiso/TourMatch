<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:16:41
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f76b9e55d10_37408365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2205ef00c8cca67b3d854cfcd27848ed985ac3d6' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/admin.tpl',
      1 => 1566537295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f76b9e55d10_37408365 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="AD">
  <h2>管理者ログイン</h2>
  <form class="in_form" action="admin_edit.php" method="post" name="adminLogin">
    <p>ログインID<br>
    <input type="text" name="admin_loginid" required></p>
    <p>パスワード<br>
    <input type="password" name="admin_password" required></p>
    <input type="submit" value="ログイン">
  </form>
</section>
<?php }
}
