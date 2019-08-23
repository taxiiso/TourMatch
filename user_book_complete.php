<?php

session_start();

// ログインされていない場合はindex.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}

// データが入力されて入力フォームボタンを押したかチェック
if(empty($_POST['complete'])){

  header('Location:user_book.php');
  exit();

}

// 同じ日付で登録するとエラーにする
require_once "model/user.php";
$rg = new user();
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

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベースに入力する準備
$sql = "INSERT INTO `t_userbook` (`guidebook_id`,`user_id`,`afg`) VALUES (?,?,?)";
$stmh = $stmt->prepare($sql);

// 入力するその他のデータの設定
$post = $_SESSION;
$post['guidebook_id'] = $post['book']['0']['guidebook_id'];
$guidebook_id = $post['book']['0']['guidebook_id'];
$post['user_id'] = $post['post']['user_id'];
$post['afg'] = '予約中';

// 入力項目を揃えてデータベースに入力する
$sortAry = array("guidebook_id","user_id","afg");

foreach($sortAry as $key => $value){
  $insertAry[] = $post[$value];
}
$stmh->execute($insertAry);

// ガイドブックのafgを予約済に変更する
$sql = "UPDATE `t_guidebook` SET `afg` = '予約成立' WHERE `guidebook_id` = {$guidebook_id}";
$stmh = $stmt->prepare($sql);
$stmh->execute();

$scsses_mes = "<p>ツアー予約を完了しました。<br>
               ツアーガイドから登録メールに連絡が届きますので<br>
               よろしくお願いします。</p>";

// ガイドに予約成立メールを送る
require_once "model/SendMail.php";
$ms = new SendMail();
$toMail = $post['book'][0]['mail'];
$toName = $post['book'][0]['name'];
$tour_name = $post['book'][0]['tour_name'];
$tour_date = $post['book'][0]['tour_date'];
$ms->bookCompMail($toMail,$toName,$tour_name,$tour_date);

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("scsses_mes",$scsses_mes);

$view -> screenView('user_book_complete');
