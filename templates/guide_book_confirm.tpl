  <section id="GBC">
   <p>以下の内容でツアーガイドを登録します。<br>
   よろしければ登録ボタンを押してください。</p>
   <table class="nomal">
     <tr>
       <th>ツアーID</th><td>{$tour_id}</td>
     </tr>
     <tr>
       <th>ツアー日時</th><td>{$tour_date}</td>
     </tr>
     <tr>
       <th>ツアー名</th><td>{$tour_name}</td>
     </tr>
     <tr>
       <th>場所</th><td>{$tour_address}</td>
     </tr>
     <tr>
       <th>ツアー料金</th><td>{$tour_price}</td>
     </tr>
   </table>
   <div class="clearfix">
     <form class="left_button" action="guide_book_complete.php" method="post">
       <input type="submit"  name="complete" value="登録する">
     </form>
     <form class="right_button" action="guide_book.php" method="post">
       <input type="submit"  name="back" value="修正する">
     </form>
   </div>
  </section>
