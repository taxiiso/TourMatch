<?php

session_start();

// 修正ボタンで返ってきた場合はエラーメッセージを消す
if(isset($_POST['back'])){
  $_SESSION['er_mess'] = "";
  $_SESSION['er_mess_date'] = "";
}

// ポスト送信されたIDとパスワードをセッションに変換
if(isset($_POST['loginid']) && isset($_POST['password'])){
  $_SESSION['loginid'] = $_POST['loginid'];
  $_SESSION['password'] = $_POST['password'];
}

$guide_loginid = $_SESSION['loginid'];
$guide_password = $_SESSION['password'];

// confirmからのエラーメッセージの受け取り
$er_mess = "";
$er_mess_date = "";
if(isset($_SESSION['er_mess'])){
  $er_mess = $_SESSION['er_mess'];
}
if(isset($_SESSION['er_mess_date'])){
  $er_mess_date = $_SESSION['er_mess_date'];
}

// ログインを管理するクラスの呼び出し
require_once "model/Auth.php";
$au = new Auth;

// ログインチェック
if($au->guideAuthChk($guide_loginid,$guide_password) === FALSE){
  session_destroy();
  $err_login = 'ログインIDまたはパスワードが違います<br>
                <a href="index.php">ログイン画面に戻る</a>';
  echo $err_login;
  exit();

}else{

// ガイドの個人データを読み込む
require_once "model/guide.php";
$getGuideAry = new guide();
$guideAry = $getGuideAry->getGuideAry($guide_loginid);

$_SESSION['post'] = $guideAry[0];
$guide_name = $guideAry[0]['name'];
$afg = $guideAry[0]['afg'];

// アクティブフラグでログインチェック
if($afg == 1){
  session_destroy();
  $err_login = '本登録が済んでいないガイドIDです<br>
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

// 日付のフォームの出力
$date = "";
require_once 'model/m_form.php';
$pr = new registration;
if(isset($_SESSION['post']['tour_date'])){$sdate = $_SESSION['post']['tour_date'];}else{$sdate = FALSE;}
$date = $pr->tourGetDate($date=0, $sdate);

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("guide_name",$guide_name);
$view -> setAssign("htmluu",$htmluu);
$view -> setAssign("er_mess",$er_mess);
$view -> setAssign("er_mess_date",$er_mess_date);
$view -> setAssign("date",$date);

$view -> screenView('guide_book');
