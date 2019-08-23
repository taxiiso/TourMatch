<?php
/* Smarty version 3.1.33, created on 2019-08-23 19:00:12
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5fb92c56fce5_22308291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7df56f735861e9760f0a58c773930f66f50e6ea7' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_delete.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5fb92c56fce5_22308291 (Smarty_Internal_Template $_smarty_tpl) {
?>  <section>
    <!-- 予約中のツアーがあり退会できないメッセージ -->
   <?php echo $_smarty_tpl->tpl_vars['err_mes1']->value;?>


    <!-- 退会確認ボタンの出力 -->
   <?php echo $_smarty_tpl->tpl_vars['delete_comfirm_mes']->value;?>


    <!-- 退会完了のメッセージ -->
   <?php echo $_smarty_tpl->tpl_vars['delete_mes']->value;?>

  </section>
<?php }
}
