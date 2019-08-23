<?php
/* Smarty version 3.1.33, created on 2019-08-15 01:10:56
  from '/Applications/MAMP/htdocs/templates/admin_tour_registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54b1202a3365_03606613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a16d82da0f64cb84fc224c0408624082f821b0b' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/admin_tour_registration_form.tpl',
      1 => 1565675648,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54b1202a3365_03606613 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="ATR">
  <p><a href="admin_edit.php">管理画面に戻る</a></p>
  <h2>ツアー新規登録フォーム</h2>
  <?php echo $_smarty_tpl->tpl_vars['er_mess']->value;?>

  <?php echo $_smarty_tpl->tpl_vars['er_image_size']->value;?>

  <?php echo $_smarty_tpl->tpl_vars['er_num']->value;?>

  <?php echo $_smarty_tpl->tpl_vars['er_image_type']->value;?>

  <form class="in_form" action="admin_tour_registration_confirm.php" method="post" enctype="multipart/form-data">
    <p>ツアーの名前<br>
    <input type="text" name="tour_name" value="<?php echo $_smarty_tpl->tpl_vars['tour_name']->value;?>
" required></p>
    <p>ツアーの場所<br>
    <!-- フォームの出力 -->
    <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

    </p>
    <p>ツアー料金<br>
    <input type="tel" name="tour_price" value="<?php echo $_smarty_tpl->tpl_vars['tour_price']->value;?>
" required></p>
    <p>写真(※5MB以内で、ファイル形式はJPEG、PNG、GIFのみ)<br>
    <input type="file" name="tour_image" value="" required></p>
    <p>ツアー内容(1000文字以内)<br>
    <textarea name="tour_detail" style="width:400px; height:200px" required><?php echo $_smarty_tpl->tpl_vars['tour_detail']->value;?>
</textarea></p>
    <input type="submit" value="入力完了">
  </form>
</section>
<?php }
}
