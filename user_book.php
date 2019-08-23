<?php

session_start();

// ポスト送信されたIDとパスワードをセッションに変換
if(isset($_POST['loginid']) && isset($_POST['password'])){
  $_SESSION['loginid'] = $_POST['loginid'];
  $_SESSION['password'] = $_POST['password'];
}

$user_loginid = $_SESSION['loginid'];
$user_password = $_SESSION['password'];

// ログインを管理するクラスの呼び出し
require_once "model/Auth.php";
$au = new Auth;

// ログインチェック
if($au->userAuthChk($user_loginid,$user_password) === FALSE){
  session_destroy();
  $err_login = 'ログインIDまたはパスワードが違います<br>
                <a href="index.php">ログイン画面に戻る</a>';
  echo $err_login;
  exit();

}else{

// ユーザの個人データを読み込む
require_once "model/user.php";
$dc = new DbConnect();
$dc->getStmt();
$getUserAry = new user();
$userAry = $getUserAry->getUserAry($user_loginid);

$er_mess = "";
$er_mess2 = "";
$er_mess_date = "";
$_SESSION['post'] = $userAry[0];
$user_name = $userAry[0]['name'];
$afg = $userAry[0]['afg'];
if(isset($_SESSION['er_mess'])){$er_mess = $_SESSION['er_mess'];}
if(isset($_SESSION['er_mess2'])){$er_mess = $_SESSION['er_mess2'];}
if(isset($_SESSION['er_mess_date'])){$er_mess = $_SESSION['er_mess_date'];}


// アクティブフラグでログインチェック
if($afg == 1){
  session_destroy();
  $err_login = '本登録が済んでいないユーザIDです<br>
                <a href="index.php">ログイン画面に戻る</a>';
  echo $err_login;
  exit();
}

if($afg == 3){
  session_destroy();
  $err_login = '存在しないIDです<br>
                <a href="index.php">ログイン画面に戻る</a>';
  echo $err_login;
  exit();
}

// ツアーデータをすべて取得する関数
require_once "model/GetList.php";

$gl = new GetList;
$tourAry = $gl->getTourUGAry();
$tourImageACAry = $gl->getTourImageACAry();

// 現在実施されているツアー一覧を出力
$htmluu = "";
$htmlu = "";

$tourIdAry = array_column($tourAry, 'tour_id');
$tourTitleAry = array_column($tourAry, 'tour_name');
$tourAddressAry = array_column($tourAry, 'tour_address');
$tourPriceAry = array_column($tourAry, 'tour_price');
$tourDetailAry = array_column($tourAry, 'tour_detail');

foreach (array_map(null,$tourIdAry, $tourTitleAry, $tourImageACAry, $tourAddressAry, $tourPriceAry, $tourDetailAry) as list($i, $t, $im, $a, $p, $d)){
    $htmlu .= '<div class="grid-items"><ul><li><div class="heightLine">';

    foreach((array)$i as $key => $val1){
      $htmlu .= "<p class='tour-title'><span class='id-number'>{$val1}</span>";
    }
    foreach((array)$t as $key => $val2){
      $htmlu .= "　{$val2}</p>";
    }
    foreach($im as $key => $val3){
      $htmlu .= "<img class='tour-image' src='tour_image/{$val3}' alt='tour-image'>";
    }
    foreach((array)$a as $key => $val4){
      $htmlu .= "<p class='tour-address-price'>場所：{$val4}<br>";
    }
    foreach((array)$p as $key => $val5){
      $htmlu .= "料金：{$val5}円(※4名まで)</p>";
    }
    foreach((array)$d as $key => $val6){
      $htmlu .= "<p class='tour-detail'>{$val6}</p>";
      $htmlu .= '</div></li></ul></div>';
    }
  }
  $htmluu .= $htmlu;

// ツアー検索日付フォームを出力
require_once 'model/m_form.php';
$pr = new registration;
if(isset($_SESSION['post']['tour_date'])){$sdate = $_SESSION['post']['tour_date'];}else{$sdate = FALSE;}
$date = $pr->tourGetDate($date=0, $sdate);

// ツアー検索されたらそのデータを出力する
if(isset($_POST['tour_id']) && isset($_POST['tour_date'])){
  $tour_id = $_POST['tour_id'];
  $tour_date = $_POST['tour_date'];
  $CheckTourAry = "";

  require_once "model/user.php";
  $ud = new user;
  $CheckTourAry = $ud->getCheckTourAry($tour_id, $tour_date);

  $html1 = "<h2>検索結果</h2>
   <div class='req-box'>
   <table class='nomal'>
   <tr>
     <th>ツアー予定ID</th><th>日付</th><th>ツアー名</th><th>ガイド</th>
   </tr>";

   $html2 = '</table><form class="in_form" action="user_book_confirm.php" method="post">
     <p class="center">ツアー予定IDを選んでください<br>
     <br>
     <input type="tel" name="guidebook_id" required></p>
     <p class="right"><input type="submit" value="予約する"></p>
   </form>
   </div>
   ';

   $_SESSION['tour'] = $CheckTourAry;

 }

 $htmlcr = "";
 if(!empty($CheckTourAry)){
   $htmlcr .= $html1;
   $htmlu ="";
   foreach($CheckTourAry as $i){
     $htmlu .= '<tr>';
   foreach($i as $key => $value){
     $htmlu .= "<td class='center'>{$value}</td>";
     }
     $htmlu .= '</tr>';
   }
   $htmlcr .= $htmlu;
   $htmlcr .= $html2;
 }

}

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("user_name",$user_name);
$view -> setAssign("htmluu",$htmluu);
$view -> setAssign("er_mess",$er_mess);
$view -> setAssign("er_mess_date",$er_mess_date);
$view -> setAssign("date",$date);
$view -> setAssign("htmlcr",$htmlcr);
$view -> setAssign("er_mess2",$er_mess2);

$view -> screenView('user_book');
