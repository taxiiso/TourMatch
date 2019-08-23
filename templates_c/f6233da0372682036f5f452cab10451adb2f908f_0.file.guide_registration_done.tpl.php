<?php
/* Smarty version 3.1.33, created on 2019-08-23 19:19:01
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/guide_registration_done.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5fbd95d19054_18404704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6233da0372682036f5f452cab10451adb2f908f' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/guide_registration_done.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5fbd95d19054_18404704 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
  <!-- 仮登録がなかった時のエラーメッセージ -->
  <?php echo $_smarty_tpl->tpl_vars['err_mes']->value;?>

  <!-- 本登録完了のメッセージ -->
  <?php echo $_smarty_tpl->tpl_vars['sac_mes']->value;?>

</section>
<?php }
}
