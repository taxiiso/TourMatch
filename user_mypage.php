<?php

session_start();

// ログインされていない場合はindex.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}else{

  $user_id = $_SESSION['post']['user_id'];
  $user_name = $_SESSION['post']['name'];
  $err_mes ="";
  $user_can_mes = "";

  // ツアーキャンセルボタンが押されたら
  //予約状況を確認し予約済ならエラーで返す
  if(isset($_POST['userbook_id'])){

    // その予約IDのデータを取得する
    $userbook_id = $_POST['userbook_id'];

    require_once "model/DbConnect.php";

    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT *
            FROM t_userbook
            WHERE userbook_id = ?";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($userbook_id));
    $userbookAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    if(isset($userbookAry['0'])){
    // すでに予約済みならエラーメッセージ
      if($userbookAry[0]['afg'] == 'キャンセル済'){
        $err_mes = "<p>その予定は既にキャンセル済です。</p>";
      }elseif($userbookAry[0]['afg'] == '終了'){
        $err_mes = "<p>その予定は終了しています。</p>";
      }elseif($userbookAry[0]['user_id'] != $user_id){
        $err_mes = "<p>存在しないIDです。</p>";
      }else{
      // キャンセルを実行する
      $sql = "UPDATE `t_userbook` SET `afg` = 'キャンセル済' WHERE `userbook_id` = {$userbook_id}";
      $stmh = $stmt->prepare($sql);

      $stmh->execute();

      // ガイド側のafg表示を募集中に変更する
      $guidebook_id = $userbookAry[0]['guidebook_id'];

      $sql = "UPDATE `t_guidebook` SET `afg` = '募集中' WHERE `guidebook_id` = {$guidebook_id}";
      $stmh = $stmt->prepare($sql);

      $stmh->execute();


      // メール用にキャンセルされたツアーデータを出力する
      $sql = "SELECT * FROM t_guidebook JOIN t_guide ON t_guidebook.guide_id = t_guide.guide_id JOIN t_tour ON t_guidebook.tour_id = t_tour.tour_id WHERE t_guidebook.guidebook_id ={$guidebook_id}";
      $stmh = $stmt->prepare($sql);

      $stmh->execute();
      $tourCanAry = $stmh->fetchall(PDO::FETCH_ASSOC);

      // ガイドに予約キャンセルメールを送る
      require_once "model/SendMail.php";
      $ms = new SendMail();
      $toMail = $tourCanAry[0]['mail'];
      $toName = $tourCanAry[0]['name'];
      $tour_name = $tourCanAry[0]['tour_name'];
      $tour_date = $tourCanAry[0]['tour_date'];
      $ms->bookCanMail($toMail,$toName,$tour_name,$tour_date);

      $user_can_mes = "<p>ツアー予約をキャンセルしました。</p>";

      }
    }else{
      $err_mes = "<p>存在しないIDです。</p>";
    }
  }

  // ユーザが予約しているツアー一覧を取得する
  require_once "model/user.php";
  $rg = new user();
  $UserbookList = $rg->getUserbookListAry ($user_id);

  $htmlu = "";
  foreach($UserbookList as $i){
      $htmlu .= '<tr>';
    foreach($i as $key => $value){
      $htmlu .= "<td class='center'>{$value}</td>";
    }
    $htmlu .= '</tr>';
  }

    // 登録フォームに必要なデータ
    $loginid = "";
    if(isset($_SESSION['post']['loginid'])){
      $loginid = $_SESSION['post']['loginid'];
    }

    $name = "";
    if(isset($_SESSION['post']['name'])){
      $name = $_SESSION['post']['name'];
    }

    $tel = "";
    if(isset($_SESSION['post']['tel'])){
      $tel = $_SESSION['post']['tel'];
    }

    $man = "";
    if(!isset($_SESSION['post']['gender']) || $_SESSION['post']['gender'] === '男'){
       $man = 'checked';
     }

     $woman = "";
     if(isset($_SESSION['post']['gender']) && $_SESSION['post']['gender'] === '女'){
        $woman = 'checked';
      }

      $mail = "";
      if(isset($_SESSION['post']['mail'])){
        $mail = $_SESSION['post']['mail'];
      }

      // 住所のフォーム
      require_once 'model/m_form.php';
      $pr = new registration;
      if(isset($_SESSION['post']['address'])){$spref = $_SESSION['post']['address'];}else{$spref = FALSE;}
      $htmlp = $pr->getPref($prefText = "", $spref);

      // 生年月日のフォーム
      require_once 'model/m_form.php';
      $pr = new registration;
      if(isset($_SESSION['post']['birth_year'])){$syear = $_SESSION['post']['birth_year'];}else{$syear = FALSE;}
      if(isset($_SESSION['post']['birth_month'])){$smonth = $_SESSION['post']['birth_month'];}else{$smonth = FALSE;}
      if(isset($_SESSION['post']['birth_day'])){$sday = $_SESSION['post']['birth_day'];}else{$sday = FALSE;}
      $year = $pr->getYear($year=0, $syear);
      $month = $pr->getMonth($month=0, $smonth);
      $day = $pr->getDay($day=0, $sday);
      $year .= '年';
      $month .= '月';
      $day .= '日';
      $birthday = "{$year}{$month}{$day}";

      // 修正ボタンが押されて戻った時はエラーメッセージを消す
      if(isset($_POST['back'])){
        $_SESSION['er_mess'] = "";
        $_SESSION['er_mail'] = "";
        $_SESSION['er_loginid'] = "";
      }

      // 未入力項目があればエラーメッセージを返す
      $er_mess = "";
      if(isset($_SESSION['er_mess'])){
        $er_mess = $_SESSION['er_mess'];

      }

      $er_mail = "";
      if(isset($_SESSION['er_mail'])){
        $er_mail = $_SESSION['er_mail'];

      }

      $er_loginid = "";
      if(isset($_SESSION['er_loginid'])){
        $er_loginid = $_SESSION['er_loginid'];

      }

}

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("user_name",$user_name);
$view -> setAssign("er_mess",$er_mess);
$view -> setAssign("er_mail",$er_mail);
$view -> setAssign("er_loginid",$er_loginid);
$view -> setAssign("err_mes",$err_mes);
$view -> setAssign("user_can_mes",$user_can_mes);
$view -> setAssign("htmlu",$htmlu);
$view -> setAssign("loginid",$loginid);
$view -> setAssign("name",$name);
$view -> setAssign("htmlp",$htmlp);
$view -> setAssign("tel",$tel);
$view -> setAssign("birthday",$birthday);
$view -> setAssign("man",$man);
$view -> setAssign("woman",$woman);
$view -> setAssign("mail",$mail);

$view -> screenView('user_mypage');
