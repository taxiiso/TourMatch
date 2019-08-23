<?php
/* Smarty version 3.1.33, created on 2019-08-23 19:00:03
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_edit_complete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5fb9239b1739_48691765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a71f8493a70d87714bcbedd6dfbf8c400dd20ba0' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_edit_complete.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5fb9239b1739_48691765 (Smarty_Internal_Template $_smarty_tpl) {
?> <section>
   <!-- 変更完了メッセージの出力 -->
  <?php echo $_smarty_tpl->tpl_vars['scsses_mes']->value;?>

  <p><a href="user_mypage.php">マイページに戻る</a></p>
 </section>
<?php }
}
