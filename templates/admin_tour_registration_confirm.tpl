<section id="ATRC">
  <h2>ツアー新規作成確認</h2>
  <table class="nomal">
    <tr>
      <th>ツアーの名前</th><td>{$tour_name}</td>
    </tr>
    <tr>
      <th>ツアーの場所</th><td>{$tour_address}</td>
    </tr>
    <tr>
      <th>ツアー料金</th><td>{$tour_price}</td>
    </tr>
    <tr>
      <th>写真</th><td>{$imaget}{$image_err}</td>
    </tr>
    <tr>
      <th>ツアー内容</th><td>{$tour_detail}</td>
    </tr>
  </table>
  <div class="clearfix">
    <form class="left_button" action="admin_tour_registration_complete.php" method="post">
      <input type="submit" name="complete" value="登録する">
    </form>
    <form class="right_button" action="admin_tour_registration_form.php" method="post">
      <input type="submit" name="back" value="修正する">
    </form>
  </div>
</section>
