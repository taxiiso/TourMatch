<?php

session_start();

// ログインされていない場合はindex.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}

// データが入力されて入力フォームボタンを押したかチェック
if(empty($_POST['complete'])){

  header('Location:guide_book.php');
  exit();

}

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベースに入力する準備
$sql = "INSERT INTO `t_guidebook` (`tour_id`,`guide_id`,`tour_date`,`afg`) VALUES (?,?,?,?)";
$stmh = $stmt->prepare($sql);

// 入力するその他のデータの設定
$post = $_SESSION;
$post['tour_id'] = $post['tour']['tour_id'];
$post['guide_id'] = $post['post']['guide_id'];
$post['tour_date'] = $post['tour']['tour_date'];
$post['afg'] = "募集中";

// 入力項目を揃えてデータベースに入力する
$sortAry = array("tour_id","guide_id","tour_date","afg");

foreach($sortAry as $key => $value){
  $insertAry[] = $post[$value];
}
$stmh->execute($insertAry);
$scsses_mes = "<p>ツアーガイド登録を完了しました。</p>";

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("scsses_mes",$scsses_mes);

$view -> screenView('guide_book_complete');
