<?php
/* Smarty version 3.1.33, created on 2019-08-14 11:04:24
  from '/Applications/MAMP/htdocs/templates/guide_registration_confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53eab80436d3_52335492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e206605247e7029ba1670280dffd625126bd1786' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/guide_registration_confirm.tpl',
      1 => 1565759910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d53eab80436d3_52335492 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="GRC">
  <h2>入力内容確認</h2>
  <table class="nomal">
    <tr>
      <th>ログインID</th><td><?php echo $_smarty_tpl->tpl_vars['loginid']->value;?>
</td>
    </tr>
    <tr>
      <th>お名前</th><td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
    </tr>
    <tr>
      <th>住所</th><td><?php echo $_smarty_tpl->tpl_vars['adrress']->value;?>
</td>
    </tr>
    <tr>
      <th>電話番号</th><td><?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
</td>
    </tr>
    <tr>
      <th>生年月日</th><td><?php echo $_smarty_tpl->tpl_vars['birth_year']->value;?>
年<?php echo $_smarty_tpl->tpl_vars['birth_month']->value;?>
月<?php echo $_smarty_tpl->tpl_vars['birth_day']->value;?>
日</td>
    </tr>
    <tr>
      <th>性別</th><td><?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
</td>
    </tr>
    <tr>
      <th>メールアドレス</th><td><?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
</td>
    </tr>
    <tr>
      <th>対応可能言語</th><td><?php echo $_smarty_tpl->tpl_vars['japanese']->value;?>
　<?php echo $_smarty_tpl->tpl_vars['english']->value;?>
　<?php echo $_smarty_tpl->tpl_vars['chinese']->value;?>
</td>
    </tr>
    <tr>
      <th>写真</th><td><?php echo $_smarty_tpl->tpl_vars['images']->value;
echo $_smarty_tpl->tpl_vars['er_image']->value;?>
</td>
    </tr>
    <tr>
      <th>自己紹介</th><td><?php echo $_smarty_tpl->tpl_vars['self_introduction']->value;?>
</td>
    </tr>
  </table>
  <div class="clearfix">
    <form class="left_button" action="guide_registration_complete.php" method="post">
      <input type="submit"  name="complete" value="登録する">
    </form>
    <form class="right_button" action="guide_registration_form.php" method="post">
      <input type="submit"  name="back" value="修正する">
    </form>
  </div>
</section>
<?php }
}
