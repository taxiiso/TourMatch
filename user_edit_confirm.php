<?php
session_start();

// ログインされていない場合はadmin.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}


// 登録関係のクラスの呼び出し
require_once "model/m_form.php";
$rg = new registration();

// サニタイズする関数の呼び出し
$post = $rg->sanitize($_POST);

// 行頭と末尾の半角全角スペースを空文字に置き換える関数
$post = $rg->space_trim($post);

// 登録ページへデータを送る
$_SESSION['change'] = $post;
// $post = $_POST;

$loginid = $post['loginid'];
$name = $post['name'];
$adrress = $post['pref'];
$tel = $post['tel'];
$birth_year = $post['birth_year'];
$birth_month = $post['birth_month'];
$birth_day = $post['birth_day'];
$gender = $post['gender'];
$mail = $post['mail'];
$post['birthday'] = "{$birth_year}-{$birth_month}-{$birth_day}";

// 登録関係のクラスの呼び出し
require_once "model/m_form.php";
$rg = new registration();

// サニタイズする関数の呼び出し
$post = $rg->sanitize($_POST);

// 行頭と末尾の半角全角スペースを空文字に置き換える関数
$post = $rg->space_trim ($post);

// 各項目が入力されているかのチェック
$erCount = 0;
$erAry = array();
$er_mail = "";

if(empty($post['loginid'])){
  $erCount ++;
  $erAry[] = "ログインID";
}
if(empty($post['name'])){
  $erCount ++;
  $erAry[] = "お名前";
}if(empty($post['pref'])){
  $erCount ++;
  $erAry[] = "住所";
}
if(empty($post['tel'])){
  $erCount ++;
  $erAry[] = "電話番号";
}
if(empty($post['birth_year'])){
  $erCount ++;
  $erAry[] = "生まれた年";
}
if(empty($post['birth_month'])){
  $erCount ++;
  $erAry[] = "生まれた月";
}
if(empty($post['birth_day'])){
  $erCount ++;
  $erAry[] = "生まれた日";
}
if(empty($post['gender'])){
  $erCount ++;
  $erAry[] = "性別";
}
if(empty($post['mail'])){
  $erCount ++;
  $erAry[] = "メールアドレス";
}else{
  // メールアドレスの正規表現チェック
  if(!$rg->getMailChk($post['mail'])){
    $er_mail = "メールアドレスが不正です。";
    $_SESSION['er_mail'] = $er_mail;
    $erCount ++;
  }
}

if($erCount > 0){
  $er_mess = "";
  if(count($erAry)){
    $er_mess = implode("、",$erAry)."が入力されていません。";
    $_SESSION['er_mess'] = $er_mess;

  }
  header('Location:guide_registration_form.php');
  exit();
}
// (未)mb_convert_kanaをする

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("loginid",$loginid);
$view -> setAssign("name",$name);
$view -> setAssign("adrress",$adrress);
$view -> setAssign("tel",$tel);
$view -> setAssign("birth_year",$birth_year);
$view -> setAssign("birth_month",$birth_month);
$view -> setAssign("birth_day",$birth_day);
$view -> setAssign("gender",$gender);
$view -> setAssign("mail",$mail);

$view -> screenView('user_edit_confirm');
