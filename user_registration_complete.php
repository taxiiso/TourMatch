<?php
session_start();

$scsses_mes ="";
// データが入力されて入力フォームボタンを押したかチェック
if(isset($_SESSION['post']) && isset($_POST['complete'])){

  $post = $_SESSION['post'];
  session_destroy();

}else{

  header('Location:user_registration_form.php');
  exit();

}

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベースに入力する準備
$sql = "INSERT INTO `t_user` (`loginid`,`name`,`address`,`tel`,`birthday`,`gender`,`mail`,`password`,`afg`,`temppass`,`birth_year`,`birth_month`,`birth_day`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmh = $stmt->prepare($sql);

// 仮パスワードを発行するクラスの呼び出し
require_once "model/CreatePassword.php";
$cp = new CreatePassword();
$tempPass = $cp->getPass(30);

// 入力するその他のデータの設定
$post['birthday'] = "{$post['birth_year']}-{$post['birth_month']}-{$post['birth_day']}";
$post['afg'] = 1;
$post['password'] = $cp->getPass(6);
$post['temppass'] = $tempPass;
$post['address'] = $post['pref'];

// 入力項目を揃えてデータベースに入力する
$sortAry = array("loginid","name","address","tel","birthday","gender","mail","password","afg","temppass","birth_year","birth_month","birth_day");

foreach($sortAry as $key => $value){
  $insertAry[] = $post[$value];
}

$stmh->execute($insertAry);

// 仮登録のメールを送る
require_once "model/SendMail.php";
$ms = new SendMail();
$to = $post['mail'];
$name = $post['name'];
$regUrl = "https://taxi-world.work/tourmatch/user_registration_done.php?pass=".$tempPass;
$ms->userRegMail($to, $name, $regUrl);

$ary[] = $tempPass;
$scsses_mes = '<p>　　TOUR-MATCHのユーザ仮登録ありがとうございます。<br>
                　登録されたメールアドレスに本登録のためのメールを送信しました。<br>
                　メール内のURLをクリックしてユーザ本登録の手続きを完了してください。</p>';

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("scsses_mes",$scsses_mes);

$view -> screenView('user_registration_complete');
