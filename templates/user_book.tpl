
  <div class="name">
    <p>ようこそ{$user_name}さん　<i class="fas fa-user-circle fa-color" ></i><a href="user_mypage.php">マイページ</a></p>
  </div>
  <section id="UB">
    <h2>【ツアー予約ページ】</h2>
    <h2>ツアーを予約する</h2>
    <form class="in_form" action="#" method="post" name="check_tour">
      <p class="center">【ツアー検索】</p>
    {$er_mess}
      <div class="clearfix">
        <p class="float-left">ツアーIDを選んでください<br>
        <br>
        <input type="tel" name="tour_id" required></p>
      {$er_mess_date}
        <p class="float-right">希望する日時を選んでください<br>
           ※本日から3か月以内<br>
      <!-- 日付のフォームを出力 -->
      {$date}
        </p>
      </div>
      <p class="right"><input type="submit" value="検索する"></p>
    </form>
    <!-- ツアー検索結果の出力 -->
    {$htmlcr}
    {$er_mess2}
    <h2>現在実施されているツアー一覧</h2>
    <div class="clearfix">

      {$htmluu}

    </div>

  </section>
