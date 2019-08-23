<?php
/* Smarty version 3.1.33, created on 2019-08-23 19:30:45
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_book_confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5fc055cbcd38_13330300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9eaf5762d002d0902cddd1c8eb705d92dfe1a971' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_book_confirm.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5fc055cbcd38_13330300 (Smarty_Internal_Template $_smarty_tpl) {
?>  <section id="UBC">
   <p>以下の内容でツアーを予約します。<br>
   よろしければ登録ボタンを押してください。</p>
   <table class="nomal">
     <tr>
       <th>ツアー予定ID</th><td>：<?php echo $_smarty_tpl->tpl_vars['guidebook_id']->value;?>
</td>
     </tr>
     <tr>
       <th>ツアー日時</th><td>：<?php echo $_smarty_tpl->tpl_vars['tour_date']->value;?>
</td>
     </tr>
     <tr>
       <th>ツアー名</th><td>：<?php echo $_smarty_tpl->tpl_vars['tour_name']->value;?>
</td>
     </tr>
     <tr>
       <th>ツアー料金</th><td>：<?php echo $_smarty_tpl->tpl_vars['tour_price']->value;?>
円</td>
     </tr>
   </table>
   <div class="guide-detail clearfix">
     <h2 class="center">担当ガイド</h2>
     <p class="float-left"><img src="guide_image/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt=''><br><br><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
（<?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
）</td>
     <p class="float-right">日本語：<?php echo $_smarty_tpl->tpl_vars['japanese']->value;?>
　英語：<?php echo $_smarty_tpl->tpl_vars['english']->value;?>
　中国語：<?php echo $_smarty_tpl->tpl_vars['chinese']->value;?>
<br><br>
        【自己紹介】<br><br>
        <?php echo $_smarty_tpl->tpl_vars['self_introduction']->value;?>
</p>
   </div>
   <div class="clearfix">
     <form class="left_button" action="user_book_complete.php" method="post">
       <p><input type="submit"  name="complete" value="予約する"></p>
     </form>
     <form class="right_button" action="user_book.php" method="post">
       <p><input type="submit"  name="back" value="修正する"><p>
     </form>
   </div>
  </section>
<?php }
}
