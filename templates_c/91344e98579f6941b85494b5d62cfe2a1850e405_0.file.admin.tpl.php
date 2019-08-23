<?php
/* Smarty version 3.1.33, created on 2019-08-23 01:28:17
  from '/Applications/MAMP/htdocs/tourmatch/templates/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f4131725cb3_88325101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91344e98579f6941b85494b5d62cfe2a1850e405' => 
    array (
      0 => '/Applications/MAMP/htdocs/tourmatch/templates/admin.tpl',
      1 => 1565674624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f4131725cb3_88325101 (Smarty_Internal_Template $_smarty_tpl) {
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
