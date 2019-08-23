<?php
/* Smarty version 3.1.33, created on 2019-08-14 14:06:14
  from 'C:\Users\C-01\Desktop\xampp\htdocs\templates\guide_book_confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5396c6e45820_87305242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a66c416565345b295de0b42f37919893f64acff' => 
    array (
      0 => 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\templates\\guide_book_confirm.tpl',
      1 => 1565671072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5396c6e45820_87305242 (Smarty_Internal_Template $_smarty_tpl) {
?>  <section id="GBC">
   <p>以下の内容でツアーガイドを登録します。<br>
   よろしければ登録ボタンを押してください。</p>
   <table class="nomal">
     <tr>
       <th>ツアーID</th><td><?php echo $_smarty_tpl->tpl_vars['tour_id']->value;?>
</td>
     </tr>
     <tr>
       <th>ツアー日時</th><td><?php echo $_smarty_tpl->tpl_vars['tour_date']->value;?>
</td>
     </tr>
     <tr>
       <th>ツアー名</th><td><?php echo $_smarty_tpl->tpl_vars['tour_name']->value;?>
</td>
     </tr>
     <tr>
       <th>場所</th><td><?php echo $_smarty_tpl->tpl_vars['tour_address']->value;?>
</td>
     </tr>
     <tr>
       <th>ツアー料金</th><td><?php echo $_smarty_tpl->tpl_vars['tour_price']->value;?>
</td>
     </tr>
   </table>
   <div class="clearfix">
     <form class="left_button" action="guide_book_complete.php" method="post">
       <input type="submit"  name="complete" value="登録する">
     </form>
     <form class="right_button" action="guide_book.php" method="post">
       <input type="submit"  name="back" value="修正する">
     </form>
   </div>
  </section>
<?php }
}
