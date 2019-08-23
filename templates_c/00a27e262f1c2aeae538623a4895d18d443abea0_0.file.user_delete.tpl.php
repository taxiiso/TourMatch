<?php
/* Smarty version 3.1.33, created on 2019-08-17 10:54:01
  from '/Applications/MAMP/htdocs/templates/user_delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d57dcc99c29d0_87426511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00a27e262f1c2aeae538623a4895d18d443abea0' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/user_delete.tpl',
      1 => 1565237954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d57dcc99c29d0_87426511 (Smarty_Internal_Template $_smarty_tpl) {
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
