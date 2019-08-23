<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:16:43
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/adminTemplate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f76bbec89c0_41654182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e968d0e0f0d5d49e06f324daae55216a9b9e4af' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/adminTemplate.tpl',
      1 => 1566537293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d5f76bbec89c0_41654182 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TOURMATCH</title>
  <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body>
  <header>
  	<h1><a href="index.php">TOURMATCH 管理者ページ</a></h1>
  </header>

  <div id="contents">
      <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tplfile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  </div>
  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
