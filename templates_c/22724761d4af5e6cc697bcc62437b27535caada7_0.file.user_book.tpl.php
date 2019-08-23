<?php
/* Smarty version 3.1.33, created on 2019-08-23 04:21:07
  from '/Applications/MAMP/htdocs/tourmatch/templates/user_book.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5f69b37f84b1_53241455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22724761d4af5e6cc697bcc62437b27535caada7' => 
    array (
      0 => '/Applications/MAMP/htdocs/tourmatch/templates/user_book.tpl',
      1 => 1566532080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5f69b37f84b1_53241455 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <div class="name">
    <p>ようこそ<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
さん　<i class="fas fa-user-circle fa-color" ></i><a href="user_mypage.php">マイページ</a></p>
  </div>
  <section id="UB">
    <h2>【ツアー予約ページ】</h2>
    <h2>ツアーを予約する</h2>
    <form class="in_form" action="#" method="post" name="check_tour">
      <p class="center">【ツアー検索】</p>
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
      <p class="right"><input type="submit" value="検索する"></p>
    </form>
    <!-- ツアー検索結果の出力 -->
    <?php echo $_smarty_tpl->tpl_vars['htmlcr']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['er_mess2']->value;?>

    <h2>現在実施されているツアー一覧</h2>
    <div class="clearfix">

      <?php echo $_smarty_tpl->tpl_vars['htmluu']->value;?>


    </div>

  </section>
<?php }
}
