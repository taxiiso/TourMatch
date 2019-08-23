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

$guidebook_id = $_POST['guidebook_id'];

// 入力項目のチェック
if(empty($_POST['guidebook_id'])){
  $er_mess = "※ツアーIDが入力されていません。";
  $_SESSION['er_mess'] = $er_mess;
  header('Location:user_book.php');
  exit();
}else{
  if(isset($_SESSION['er_mess'])){$_SESSION['er_mess'] = "";}
  $guidebook_id = $_POST['guidebook_id'];
}

require_once "model/user.php";
$rg = new user();
$ic = $rg->guidebookIdNGCheck($guidebook_id, 't_guidebook');

if($ic == TRUE){
  $er_mess2 = "※存在しないツアーIDです。";
  $_SESSION['er_mess2'] = $er_mess2;
  header('Location:user_book.php');
  exit();
}else{
  if(isset($_SESSION['er_mess2'])){$_SESSION['er_mess2'] = "";}
}

// 同じ日付で登録するとエラーにする
$tour_date = $_SESSION['tour'][0]['tour_date'];
$user_id = $_SESSION['post']['user_id'];
$sd = $rg->userbookDateNGCheck($tour_date, $user_id);
if($sd == TRUE){
  $er_mess_date = "※同じ日に複数のツアーを予約することはできません。";
  $_SESSION['er_mess_date'] = $er_mess_date;
  header('Location:user_book.php');
  exit();
}else{
  if(isset($_SESSION['er_mess_date'])){$_SESSION['er_mess_date'] = "";}
}

// ツアー予定情報を取得する関数
$getUserbookAry = $rg->getUserbookAry($guidebook_id);
$_SESSION['book'] = $getUserbookAry;
$tour_date = $getUserbookAry[0]['tour_date'];
$tour_id = $getUserbookAry[0]['tour_id'];
$tour_name = $getUserbookAry[0]['tour_name'];
$tour_price = $getUserbookAry[0]['tour_price'];
$name = $getUserbookAry[0]['name'];
$gender = $getUserbookAry[0]['gender'];
$japanese = $getUserbookAry[0]['japanese'];
$english = $getUserbookAry[0]['english'];
$chinese = $getUserbookAry[0]['chinese'];
$image = $getUserbookAry[0]['image'];
$self_introduction = $getUserbookAry[0]['self_introduction'];


// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("guidebook_id",$guidebook_id);
$view -> setAssign("tour_date",$tour_date);
$view -> setAssign("tour_name",$tour_name);
$view -> setAssign("tour_price",$tour_price);
$view -> setAssign("name",$name);
$view -> setAssign("gender",$gender);
$view -> setAssign("japanese",$japanese);
$view -> setAssign("english",$english);
$view -> setAssign("chinese",$chinese);
$view -> setAssign("self_introduction",$self_introduction);
$view -> setAssign("image",$image);

$view -> screenView('user_book_confirm');
