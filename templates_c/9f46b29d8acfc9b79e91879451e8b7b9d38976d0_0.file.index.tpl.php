<?php
/* Smarty version 3.1.33, created on 2019-08-14 11:03:32
  from '/Applications/MAMP/htdocs/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53ea84d86e47_25951188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f46b29d8acfc9b79e91879451e8b7b9d38976d0' => 
    array (
      0 => '/Applications/MAMP/htdocs/templates/index.tpl',
      1 => 1565700708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d53ea84d86e47_25951188 (Smarty_Internal_Template $_smarty_tpl) {
?>  <div id="topImage">
    <!-- <img src="image\topimage-870x324.jpg" alt="TOPページのイメージ画像"> -->
  </div>
  <section id="index">
    <div id="topIntro">
      <h2>-TOURMATCHとは-</h2>
      <p>「今週末に大阪を観光したいな。」</p>
      <p>「今週末は京都をガイドしてあげたいな。」</p>
      <p>ここはガイドをしてほしい人とガイドをしたい人をマッチングする場所</p>
    </div>
    <div id="loginBox" class="clearfix">
      <div id="loginInbox">
        <div id="login">
          <h3>【ユーザログイン】</h3>
          <!-- 画像サイズは225*225 -->
          <img src="image\user-image.png" alt="">
          <form action="user_book.php" method="post" name="userLogin">
            <p>ログインID<br>
            <input type="text" name="loginid" required></p>
            <p>パスワード<br>
            <input type="password" name="password" required></p>
            <p><input type="submit" value="ログイン"></p>
          </form>
          <p class="login-bottom"><a href="user_registration_form.php"><i class="far fa-id-card"></i> 新規登録する</a></p>
        </div>
      </div>
      <div id="loginInbox">
        <div id="login">
          <h3>【ガイドログイン】</h3>
          <!-- 画像サイズは225*225 -->
          <img src="image\tour-guide-icon-225x225.jpg" alt="">
          <form action="guide_book.php" method="post" name="guideLogin">
            <p class="aj">ログインID<br>
            <input type="text" name="loginid" required></p>
            <p>パスワード<br>
            <input type="password" name="password" required></p>
            <p><input type="submit" value="ログイン"></p>
          </form>
          <p class="login-bottom"><a href="guide_registration_form.php"><i class="far fa-id-card"></i> 新規登録する</a></p>
        </div>
      </div>
    </div>
  </section>
<?php }
}
