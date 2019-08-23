<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:35:51
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/guide_book.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f7b37206083_60688204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44b7ae71e6e909e91429d31a27258644079a2e50' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/guide_book.tpl',
      1 => 1566537293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f7b37206083_60688204 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <div class="name">
     <p>ようこそ<?php echo $_smarty_tpl->tpl_vars['guide_name']->value;?>
さん　<i class="fas fa-user-circle fa-color" ></i><a href="guide_mypage.php">マイページ</a></p>
   </div>
   <section id="GB">
     <h2>ツアーガイド登録ページ</h2>
     <h2>ツアーガイドに登録する</h2>
     <form class="in_form" action="guide_book_confirm.php" method="post">
       <!-- エラーメッセージの出力 -->
       <?php echo $_smarty_tpl->tpl_vars['er_mess']->value;?>

       <div class="clearfix">
         <p class="float-left">ツアーIDを選んでください<br>
         <br>
         <input type="tel" name="tour_id" required></p>
       <?php echo $_smarty_tpl->tpl_vars['er_mess_date']->value;?>

         <p class="float-right">希望する日時を選んでください<br>
            ※本日から3か月以内<br>
       <!-- 日付のフォームを出力 -->
       <?php echo $_smarty_tpl->tpl_vars['date']->value;?>

         </p>
       </div>
       <p class="right"><input type="submit" value="登録する"></p>
     </form>
     <h2>現在実施されているツアー一覧</h2>
     <div class="clearfix">
     <!-- <table class="tour-list"> -->
      <!-- <tr>
        <th>ツアーID</th><th>ツアー名</th><th>場所</th><th>料金</th><th>内容</th><th>イメージ</th>
      </tr> -->
      <!-- <tr><td>　　</td></tr>でツアーデータ出力 -->
       <?php echo $_smarty_tpl->tpl_vars['htmluu']->value;?>

     <!-- </table> -->
     </div>
   </section>
<?php }
}
