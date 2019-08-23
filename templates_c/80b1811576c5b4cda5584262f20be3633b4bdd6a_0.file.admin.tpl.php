<?php
/* Smarty version 3.1.33, created on 2019-08-15 01:10:32
  from '/Applications/MAMP/htdocs/templates/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54b108b48e01_79104031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80b1811576c5b4cda5584262f20be3633b4bdd6a' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/admin.tpl',
      1 => 1565674624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54b108b48e01_79104031 (Smarty_Internal_Template $_smarty_tpl) {
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
