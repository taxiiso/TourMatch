<?php

session_start();

// ログインされていない場合はadmin.phpに飛ばす
if(empty($_SESSION['admin_loginid']) || empty($_SESSION['admin_password'])){
  header('Location:admin.php');
}

// 修正ボタンが押されて戻った時はエラーメッセージを消す
if(isset($_POST['back'])){
  $_SESSION['er_mess'] = "";
  $_SESSION['er_image_size'] = "";
  $_SESSION['er_num'] = "";
  $_SESSION['er_image_type'] = "";

  if(isset($_SESSION['file_path'])){
    unlink($_SESSION['file_path']);
    unset($_SESSION['file_path']);
  }
}

// フォームに必要な情報の出力
$tour_name = "";
if(isset($_SESSION['post']['tour_name'])){
  $tour_name = $_SESSION['post']['tour_name'];
}

$tour_price = "";
if(isset($_SESSION['post']['tour_price'])){
  $tour_price = $_SESSION['post']['tour_price'];
}

$tour_detail = "";
if(isset($_SESSION['post']['tour_detail'])){
  $tour_detail = $_SESSION['post']['tour_detail'];
}


// ツアーの場所のフォームの出力
require_once 'model/m_form.php';
$pr = new registration;
if(isset($_SESSION['post']['pref'])){$spref = $_SESSION['post']['pref'];}else{$spref = FALSE;}
$html = $pr->getPref($prefText = "", $spref);

// 未入力項目があればエラーメッセージを返す
$er_mess = "";
$er_image_size = "";
$er_num = "";
$er_image_type = "";

if(isset($_SESSION['er_mess'])){
  $er_mess = $_SESSION['er_mess'];
}

if(isset($_SESSION['er_image_size'])){
  $er_image_size = $_SESSION['er_image_size'];
}

if(isset($_SESSION['er_num'])){
  $er_num = $_SESSION['er_num'];
}

if(isset($_SESSION['er_image_type'])){
  $er_image_type = $_SESSION['er_image_type'];
}

include 'view/view.php';
$view = new view();
$view -> setAssign("er_mess",$er_mess);
$view -> setAssign("er_image_size",$er_image_size);
$view -> setAssign("er_num",$er_num);
$view -> setAssign("er_image_type",$er_image_type);
$view -> setAssign("html",$html);
$view -> setAssign("tour_name",$tour_name);
$view -> setAssign("tour_price",$tour_price);
$view -> setAssign("tour_detail",$tour_detail);

$view->screenView('admin_tour_registration_form');
