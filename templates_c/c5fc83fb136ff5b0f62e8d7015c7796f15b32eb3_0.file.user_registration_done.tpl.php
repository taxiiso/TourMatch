<?php
/* Smarty version 3.1.33, created on 2019-08-23 18:36:11
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_registration_done.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5fb38b6be330_72841785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5fc83fb136ff5b0f62e8d7015c7796f15b32eb3' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_registration_done.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5fb38b6be330_72841785 (Smarty_Internal_Template $_smarty_tpl) {
?><sectio>
  <!-- 仮登録がなかった時のエラーメッセージ -->
  <?php echo $_smarty_tpl->tpl_vars['err_mes']->value;?>

  <!-- 本登録完了のメッセージ -->
  <?php echo $_smarty_tpl->tpl_vars['sac_mes']->value;?>

</sectio>
<?php }
}
