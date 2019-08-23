  <section id="UBC">
   <p>以下の内容でツアーを予約します。<br>
   よろしければ登録ボタンを押してください。</p>
   <table class="nomal">
     <tr>
       <th>ツアー予定ID</th><td>：{$guidebook_id}</td>
     </tr>
     <tr>
       <th>ツアー日時</th><td>：{$tour_date}</td>
     </tr>
     <tr>
       <th>ツアー名</th><td>：{$tour_name}</td>
     </tr>
     <tr>
       <th>ツアー料金</th><td>：{$tour_price}円</td>
     </tr>
   </table>
   <div class="guide-detail clearfix">
     <h2 class="center">担当ガイド</h2>
     <p class="float-left"><img src="guide_image/{$image}" alt=''><br><br>{$name}（{$gender}）</td>
     <p class="float-right">日本語：{$japanese}　英語：{$english}　中国語：{$chinese}<br><br>
        【自己紹介】<br><br>
        {$self_introduction}</p>
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
