<?php

session_start();

// ログインされていない場合はindex.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}

// 登録関係のクラスの呼び出し
require_once "model/m_form.php";
$rg = new registration();

// サニタイズする関数の呼び出し
$_POST = $rg->sanitize($_POST);

// 行頭と末尾の半角全角スペースを空文字に置き換える関数
$_POST = $rg->space_trim ($_POST);

// 登録ページへデータを送る
$_SESSION['tour'] = $_POST;

$tour_id = $_SESSION['tour']['tour_id'];
$guide_id = $_SESSION['post']['guide_id'];
$tour_date = $_SESSION['tour']['tour_date'];

// 入力項目のチェック
if(empty($tour_id)){
  $er_mess = "※ツアーIDが入力されていません。";
  $_SESSION['er_mess'] = $er_mess;
  header('Location:guide_book.php');
  exit();
}

if(empty($tour_date)){
  $er_mess_date = "※日付が入力されていません。";
  $_SESSION['er_mess_date'] = $er_mess_date;
  header('Location:guide_book.php');
  exit();
}

require_once "model/tour.php";
$rg = new tour();
$ic = $rg->touridNGCheck($tour_id, 't_tour');

if($ic == TRUE){
  $er_mess = "※存在しないツアーIDです。";
  $_SESSION['er_mess'] = $er_mess;
  header('Location:guide_book.php');
  exit();
}

// 同じ日付で登録するとエラーにする
$sd = $rg->tourDateNGCheck($tour_date, $guide_id);
if($sd == TRUE){
  $er_mess_date = "※同じ日に複数のツアーガイドを登録することはできません。";
  $_SESSION['er_mess_date'] = $er_mess_date;
  header('Location:guide_book.php');
  exit();
}

// ツアー情報を取得する関数
$gt = $rg->getTourAry($tour_id);
// var_dump($gt);
$tour_name = $gt[0]['tour_name'];
$tour_address = $gt[0]['tour_address'];
$tour_price = $gt[0]['tour_price'];

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("tour_id",$tour_id);
$view -> setAssign("tour_date",$tour_date);
$view -> setAssign("tour_name",$tour_name);
$view -> setAssign("tour_price",$tour_price);
$view -> setAssign("tour_address",$tour_address);

$view -> screenView('guide_book_confirm');
