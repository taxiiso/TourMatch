<?php
session_start();

// ログインされていない場合はadmin.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}

// データが入力されて入力フォームボタンを押したかチェック
if(isset($_SESSION['post']) && isset($_POST['complete'])){

  $post = $_SESSION;
  $scsses_mes = "";

}else{

  header('Location:user_mypage.php');
  exit();

}

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベースに入力する準備
$sql = "UPDATE `t_user` SET `loginid`=:loginid,`name`=:name,`address`=:address,`tel`=:tel,`birthday`=:birthday,`gender`=:gender,`mail`=:mail,`birth_year`=:birth_year,`birth_month`=:birth_month,`birth_day`=:birth_day ";
$sql .= "WHERE user_id ='{$post['post']['user_id']}'";
$stmh = $stmt->prepare($sql);

// 入力するその他のデータの設定
$post['change']['birthday'] = "{$post['change']['birth_year']}-{$post['change']['birth_month']}-{$post['change']['birth_day']}";
$loginid = $post['change']['loginid'];
$name = $post['change']['name'];
$address = $post['change']['pref'];
$tel = $post['change']['tel'];
$birthday = $post['change']['birthday'];
$gender = $post['change']['gender'];
$mail = $post['change']['mail'];
$birth_year = $post['change']['birth_year'];
$birth_month = $post['change']['birth_month'];
$birth_day = $post['change']['birth_day'];

// 入力項目を揃えてデータベースに入力する
$sortAry = array(":loginid"=>$loginid,":name"=>$name,":address"=>$address,"tel"=>$tel,"birthday"=>$birthday,"gender"=>$gender,"mail"=>$mail,"birth_year"=>$birth_year,"birth_month"=>$birth_month,"birth_day"=>$birth_day);
$stmh->execute($sortAry);
$scsses_mes = "<p>登録情報の変更を完了しました。</p>";

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("scsses_mes",$scsses_mes);

$view -> screenView('user_edit_complete');
