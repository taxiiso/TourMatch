<?php
/* Smarty version 3.1.33, created on 2019-08-14 14:12:35
  from 'C:\Users\C-01\Desktop\xampp\htdocs\templates\user_delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5398434e3444_97944497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6837d9d46e52c8f609fdad07e2601cf270bbe6fa' => 
    array (
      0 => 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\templates\\user_delete.tpl',
      1 => 1565237954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5398434e3444_97944497 (Smarty_Internal_Template $_smarty_tpl) {
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
