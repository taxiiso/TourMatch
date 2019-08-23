<?php
/* Smarty version 3.1.33, created on 2019-08-23 14:16:23
  from '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_mypage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f76a7228020_73193997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9240ead4bd95cbb58d9ded16193144aac0c707d' => 
    array (
      0 => '/home/users/0/taxiiso/web/taxi-world.work/tourmatch/templates/user_mypage.tpl',
      1 => 1566537294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f76a7228020_73193997 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="name">
  <p>ようこそ<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
さん　<i class="fas fa-user-circle fa-color" ></i><a href="user_mypage.php">マイページ</a></p>
</div>
<section id="UM">
   <nav>
     <ul class="clearfix">
       <li><a href="#tourcancel">ツアー取り消し</a></li>
       <li><a href="#userchange">ユーザ登録変更</a></li>
       <li><a href="#userexit">退会する</a></li>
       <li><a href="user_book.php">ツアー予約する</a></li>
     </ul>
   </nav>
   <p>　</p>
   <h2 id="userlist">ツアー予約一覧</h2>
   <table class="nomal">
    <tr>
      <th>予約ID</th><th>日時</th><th>ツアー名</th><th>ツアー料金</th><th>ガイド名</th><th>予約</th>
    </tr>
    <!-- ユーザが予約しているツアー一覧を出力する -->
    <?php echo $_smarty_tpl->tpl_vars['htmlu']->value;?>

   </table>
   <h2 id="tourcancel">ツアー取り消し</h2>
   <form class="in_form" action="#" method="post" name="usermanage">
    <!-- エラーメッセージの出力 -->
    <?php echo $_smarty_tpl->tpl_vars['err_mes']->value;?>

    <!-- キャンセル完了メッセージの出力 -->
    <?php echo $_smarty_tpl->tpl_vars['user_can_mes']->value;?>

    <p>登録ID<input type="tel" name="userbook_id" required>番のツアーをキャンセルする<br>
    ※一度キャンセルボタンを押すと元には戻せません</p>
    <p class="right"><input type="submit" value="実行"></p>
   </form>
   <p>　</p>
   <h2 id="userchange">ユーザ登録フォームの変更</h2>
   <!-- エラーメッセージの出力 -->
   <?php echo $_smarty_tpl->tpl_vars['er_mess']->value;?>

   <?php echo $_smarty_tpl->tpl_vars['er_mail']->value;?>

   <?php echo $_smarty_tpl->tpl_vars['er_loginid']->value;?>

   <form class="in_form" action="user_edit_confirm.php" method="post">
     <p>ログインID<br>
     <input type="text" name="loginid" value="<?php echo $_smarty_tpl->tpl_vars['loginid']->value;?>
" required></p>
     <p>お名前<br>
     <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" required></p>
     <p>住所<br>
       <!-- 住所のフォームの出力 -->
       <?php echo $_smarty_tpl->tpl_vars['htmlp']->value;?>

     </p>
     <p>電話番号<br>
     <input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
" required></p>
     <p>生年月日<br>
       <!-- 生年月日のフォームの出力 -->
       <?php echo $_smarty_tpl->tpl_vars['birthday']->value;?>

     <p>性別<br>
     男<input type="radio" name="gender" value="男" <?php echo $_smarty_tpl->tpl_vars['man']->value;?>
>　女<input type="radio" name="gender" value="女" <?php echo $_smarty_tpl->tpl_vars['woman']->value;?>
></p>
     <p>メールアドレス<br>
     <input type="email" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
" required></p>
     <input type="submit" value="入力完了">
   </form>
   <p>　</p>
   <h2 id="userexit">退会する</h2>
   <form class="in_form" action="user_delete.php" method="post">
     <p>退会を希望される方は退会希望ボタン押してください。</p>
     <p class="right"><input type="submit"  name="exit_user" value="退会する"></p>
   </form>
   <p>　</p>
 </section>
<?php }
}
