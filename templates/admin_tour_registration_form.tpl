<section id="ATR">
  <p><a href="admin_edit.php">管理画面に戻る</a></p>
  <h2>ツアー新規登録フォーム</h2>
  {$er_mess}
  {$er_image_size}
  {$er_num}
  {$er_image_type}
  <form class="in_form" action="admin_tour_registration_confirm.php" method="post" enctype="multipart/form-data">
    <p>ツアーの名前<br>
    <input type="text" name="tour_name" value="{$tour_name}" required></p>
    <p>ツアーの場所<br>
    <!-- フォームの出力 -->
    {$html}
    </p>
    <p>ツアー料金<br>
    <input type="tel" name="tour_price" value="{$tour_price}" required></p>
    <p>写真(※5MB以内で、ファイル形式はJPEG、PNG、GIFのみ)<br>
    <input type="file" name="tour_image" value="" required></p>
    <p>ツアー内容(1000文字以内)<br>
    <textarea name="tour_detail" style="width:400px; height:200px" required>{$tour_detail}</textarea></p>
    <input type="submit" value="入力完了">
  </form>
</section>
