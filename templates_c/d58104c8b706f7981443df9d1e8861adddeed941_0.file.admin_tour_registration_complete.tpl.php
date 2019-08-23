<?php
/* Smarty version 3.1.33, created on 2019-08-23 18:17:02
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/admin_tour_registration_complete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5faf0e550502_08073803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd58104c8b706f7981443df9d1e8861adddeed941' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/admin_tour_registration_complete.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5faf0e550502_08073803 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
  <!-- 新規登録完了のメッセージ -->
  <?php echo $_smarty_tpl->tpl_vars['scsses_mes']->value;?>

  <p><a href="admin_tour_registration_form.php">ツアーを新規登録する</a></p>
  <p><a href="admin_edit.php">管理画面に戻る</a></p>
</section>
<?php }
}
