<?php
session_start();

// セッションのデータを出力する
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

  // 住所のフォームを出力
  require_once 'model/m_form.php';
  $pr = new registration;
  if(isset($_SESSION['post']['pref'])){$spref = $_SESSION['post']['pref'];}else{$spref = FALSE;}
  $html = $pr->getPref($prefText = "", $spref);

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

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("er_mess",$er_mess);
$view -> setAssign("er_mail",$er_mail);
$view -> setAssign("er_loginid",$er_loginid);
$view -> setAssign("loginid",$loginid);
$view -> setAssign("name",$name);
$view -> setAssign("html",$html);
$view -> setAssign("tel",$tel);
$view -> setAssign("birthday",$birthday);
$view -> setAssign("man",$man);
$view -> setAssign("woman",$woman);
$view -> setAssign("mail",$mail);

$view -> screenView('user_registration_form');
