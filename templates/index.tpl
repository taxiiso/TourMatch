  <div id="topImage">
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
