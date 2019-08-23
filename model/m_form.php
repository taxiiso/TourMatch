<?php

class registration{

  // クラスで設定された変数
  private $pref = array("北海道","青森県","岩手県",
  "宮城県","秋田県","山形県","福島県","茨城県",
  "栃木県","群馬県","埼玉県","千葉県","東京都",
  "神奈川県","山梨県","静岡県","長野県","新潟県",
  "富山県","石川県","福井県","岐阜県","愛知県",
  "三重県","滋賀県","京都府","大阪府","兵庫県",
  "奈良県","和歌山県","鳥取県","島根県","岡山県",
  "広島県","山口県","徳島県","香川県","愛媛県",
  "高知県","福岡県","佐賀県","長崎県","熊本県",
  "大分県","宮崎県","鹿児島県","沖縄県");

  // サニタイズする関数
  public function sanitize($before){

    foreach($before as $key => $value){
      $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    return $after;

  }

  // 行頭と末尾の半角全角スペースを空文字に置き換える関数
  public function space_trim ($before) {
    // 行頭の半角、全角スペースを、空文字に置き換える
    $before = preg_replace('/^[ 　]+/u', '', $before);

    // 末尾の半角、全角スペースを、空文字に置き換える
    $after = preg_replace('/[ 　]+$/u', '', $before);

    return $after;
  }

  // データベースに同じログインIDが登録されているか調べる関数
  public function loginidNGCheck($loginid, $tablename){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じログインIDを呼び出す
    $sql = "SELECT * FROM {$tablename} WHERE `loginid`=?";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($loginid));
    $val = $stmh->fetchall();

    if(count($val) > 0){
      return TRUE;
    }
  }

  // メールアドレスを正規表現でチェックする
  public function getMailChk($mail){
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$mail)){
      return true;
    }else{
      return false;
    }
  }

  // 都道府県選択のフォームを作成する
  public function getPref($prefText = "", $spref){
    $html = '<select name="pref" required>'."\n";

    if(!$spref === FALSE){
      $html .= "<option value='{$spref}'>{$spref}</option>\n";
    }elseif($prefText == ""){
      $html .= "<option value=''>都道府県を選択してください。</option>\n";
    }
    foreach($this->pref as $value){
      $txt = "";
      if($value == $prefText){
        $txt = "selected";
      }
      $html .= "<option value='{$value}' {$txt}>{$value}</option>\n";
    }
    $html .= "</select>";
    return $html;
  }

  // 生年月日を登録するフォームを作成する
  public function getYear($year=0, $syear){
    $html = '<select name="birth_year" required>'."\n";

    if(!$syear === FALSE){
      $html .= "<option value='{$syear}'>{$syear}</option>\n";
    }elseif($year == ""){
      $html .= "<option value=''>年を選択してください。</option>\n";
    }
    $start = 1919;
    $end = date('Y');
    for($i = $start; $i <= $end; $i++){
      $txt = "";
      if($i == $year){
        $txt = "selected";
      }
      $html .= "<option value='{$i}' {$txt}>{$i}</option>\n";
    }
    $html .= "</select>";
    return $html;
  }

  public function getMonth($month=0, $smonth){
    $html = '<select name="birth_month" required>'."\n";

    if(!$smonth === FALSE){
      $html .= "<option value='{$smonth}'>{$smonth}</option>\n";
    }elseif($month == ""){
      $html .= "<option value=''>月を選択してください。</option>\n";
    }

    for($i = 1; $i <= 12; $i++){
      $txt = "";
      if($i == $month){
        $txt = "selected";
      }
      $html .= "<option value='{$i}' {$txt}>{$i}</option>\n";
    }
    $html .= "</select>";
    return $html;
  }
  public function getDay($day=0, $sday){
    $html = '<select name="birth_day" required>'."\n";

    if(!$sday === FALSE){
      $html .= "<option value='{$sday}'>{$sday}</option>\n";
    }elseif($day == ""){
      $html .= "<option value=''>日を選択してください。</option>\n";
    }

    for($i = 1; $i <= 31; $i++){
      $txt = "";
      if($i == $day){
        $txt = "selected";
      }
      $html .= "<option value='{$i}' {$txt}>{$i}</option>\n";
    }
    $html .= "</select>";
    return $html;
  }

  // ツアーガイド登録する日付フォームを作成する（本日から3か月以内）
  public function tourGetDate($date=0, $sdate){
    $html = '<select name="tour_date" required>'."\n";

    if(!$sdate === FALSE){
      $html .= "<option value='{$sdate}'>{$sdate}</option>\n";
    }elseif($date == ""){
      $html .= "<option value=''>日付を選択してください。</option>\n";
    }

    $start = strtotime("now");
    $end = strtotime("+3 MONTH");
    // 1日の秒数
    $sec = 60 * 60 * 24;// 60秒 × 60分 × 24時間
    // 日付取得
    $key = 0;
    //曜日を表示(今回はしない)
    $week = array("日", "月", "火", "水", "木", "金", "土");
    for ($i = $start ; $i <= $end ; $i += $sec) {
        $dates[$key]['date'] = date("Y-m-d", $i);
        $w = date("w", $i);
        $dates[$key]['week'] = $week[$w];
        $key ++;
    }

    foreach($dates as $date){
        // if ($date['week'] == "日") continue;  //日曜はskip
        $html .= "<option value=" . "\"" . $date['date'] . "\"" . ">" .$date['date'] . "</option>\n";
    }
    $html .= "</select>";
    return $html;
  }
}
?>
