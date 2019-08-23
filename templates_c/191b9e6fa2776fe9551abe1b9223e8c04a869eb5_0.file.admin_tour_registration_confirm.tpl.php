<?php
/* Smarty version 3.1.33, created on 2019-08-23 18:16:54
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/admin_tour_registration_confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5faf0694e442_23750283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '191b9e6fa2776fe9551abe1b9223e8c04a869eb5' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/admin_tour_registration_confirm.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5faf0694e442_23750283 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="ATRC">
  <h2>ツアー新規作成確認</h2>
  <table class="nomal">
    <tr>
      <th>ツアーの名前</th><td><?php echo $_smarty_tpl->tpl_vars['tour_name']->value;?>
</td>
    </tr>
    <tr>
      <th>ツアーの場所</th><td><?php echo $_smarty_tpl->tpl_vars['tour_address']->value;?>
</td>
    </tr>
    <tr>
      <th>ツアー料金</th><td><?php echo $_smarty_tpl->tpl_vars['tour_price']->value;?>
</td>
    </tr>
    <tr>
      <th>写真</th><td><?php echo $_smarty_tpl->tpl_vars['imaget']->value;
echo $_smarty_tpl->tpl_vars['image_err']->value;?>
</td>
    </tr>
    <tr>
      <th>ツアー内容</th><td><?php echo $_smarty_tpl->tpl_vars['tour_detail']->value;?>
</td>
    </tr>
  </table>
  <div class="clearfix">
    <form class="left_button" action="admin_tour_registration_complete.php" method="post">
      <input type="submit" name="complete" value="登録する">
    </form>
    <form class="right_button" action="admin_tour_registration_form.php" method="post">
      <input type="submit" name="back" value="修正する">
    </form>
  </div>
</section>
<?php }
}
