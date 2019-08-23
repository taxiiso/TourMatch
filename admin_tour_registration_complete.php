<?php
session_start();

$scsses_mes = "";

// ログインされていない場合はadmin.phpに飛ばす
if(empty($_SESSION['admin_loginid']) || empty($_SESSION['admin_password'])){
  header('Location:admin.php');
}

// データが入力されて入力フォームボタンを押したかチェック
if(isset($_SESSION['post']) && isset($_POST['complete'])){

  $post = $_SESSION['post'];

}else{

  header('Location:tour_registration_form.php');
  exit();

}

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベースに入力する準備
$sql = "INSERT INTO `t_tour` (`tour_name`,`tour_address`,`tour_price`,`tour_image`,`tour_detail`,`afg`) VALUES (?,?,?,?,?,?)";
$stmh = $stmt->prepare($sql);

// 入力するその他のデータの設定
$post['afg'] = 1;
$post['tour_address'] = $post['pref'];
if(isset($_SESSION['file_path'])){
$post['tour_image'] = $_SESSION['tour_image']['name'];
}else{
  $post['tour_image'] = "";
}

// 入力項目を揃えてデータベースに入力する
$sortAry = array("tour_name","tour_address","tour_price","tour_image","tour_detail","afg");

foreach($sortAry as $key => $value){
  $insertAry[] = $post[$value];
}

$stmh->execute($insertAry);

$scsses_mes = "<p>ツアーを新規登録しました。</p>";

include 'view/view.php';
$view = new view();

$view -> setAssign("scsses_mes",$scsses_mes);

$view->screenView('admin_tour_registration_complete');
