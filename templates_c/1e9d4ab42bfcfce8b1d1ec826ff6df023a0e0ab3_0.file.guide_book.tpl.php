<?php
/* Smarty version 3.1.33, created on 2019-08-14 14:06:00
  from 'C:\Users\C-01\Desktop\xampp\htdocs\templates\guide_book.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5396b85a3854_89014870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e9d4ab42bfcfce8b1d1ec826ff6df023a0e0ab3' => 
    array (
      0 => 'C:\\Users\\C-01\\Desktop\\xampp\\htdocs\\templates\\guide_book.tpl',
      1 => 1565759156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5396b85a3854_89014870 (Smarty_Internal_Template $_smarty_tpl) {
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
