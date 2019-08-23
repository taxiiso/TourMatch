
   <div class="name">
     <p>ようこそ{$guide_name}さん　<i class="fas fa-user-circle fa-color" ></i><a href="guide_mypage.php">マイページ</a></p>
   </div>
   <section id="GB">
     <h2>ツアーガイド登録ページ</h2>
     <h2>ツアーガイドに登録する</h2>
     <form class="in_form" action="guide_book_confirm.php" method="post">
       <!-- エラーメッセージの出力 -->
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
       <p class="right"><input type="submit" value="登録する"></p>
     </form>
     <h2>現在実施されているツアー一覧</h2>
     <div class="clearfix">
     <!-- <table class="tour-list"> -->
      <!-- <tr>
        <th>ツアーID</th><th>ツアー名</th><th>場所</th><th>料金</th><th>内容</th><th>イメージ</th>
      </tr> -->
      <!-- <tr><td>　　</td></tr>でツアーデータ出力 -->
       {$htmluu}
     <!-- </table> -->
     </div>
   </section>
