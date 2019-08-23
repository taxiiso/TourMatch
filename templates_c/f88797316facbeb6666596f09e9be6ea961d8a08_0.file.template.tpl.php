<?php
/* Smarty version 3.1.33, created on 2019-08-14 11:02:03
  from '/Applications/MAMP/htdocs/templates/template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53ea2bb04530_03259520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f88797316facbeb6666596f09e9be6ea961d8a08' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/template.tpl',
      1 => 1565324684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d53ea2bb04530_03259520 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TOURMATCH</title>
  <?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body>
  <header id="index">
  	<h1><a href="index.php">TOURMATCH</a></h1>
  </header>
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tplfile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
