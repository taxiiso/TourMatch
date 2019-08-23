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

}else{

  header('Location:guide_mypage.php');
  exit();

}

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベースに入力する準備
$sql = "UPDATE `t_guide` SET `loginid`=:loginid,`name`=:name,`address`=:address,`tel`=:tel,`birthday`=:birthday,`gender`=:gender,`mail`=:mail,`japanese`=:japanese,`english`=:english,`chinese`=:chinese,`image`=:image,`self_introduction`=:self_introduction,`birth_year`=:birth_year,`birth_month`=:birth_month,`birth_day`=:birth_day ";
$sql .= "WHERE guide_id ='{$post['post']['guide_id']}'";
$stmh = $stmt->prepare($sql);

// 入力するその他のデータの設定
$post['change']['birthday'] = "{$post['change']['birth_year']}-{$post['change']['birth_month']}-{$post['change']['birth_day']}";
if(isset($post['new_image']['name'])){
$post['post']['image'] = $post['new_image']['name'];
}
if(isset($post['change']['japanese'])){
  $post['change']['japanese'] = "可";
}else{
  $post['change']['japanese'] = "不可";
}
if(isset($post['change']['english'])){
  $post['change']['english'] = "可";
}else{
  $post['change']['english'] = "不可";
}
if(isset($post['change']['chinese'])){
  $post['change']['chinese'] = "可";
}else{
  $post['change']['chinese'] = "不可";
}

$loginid = $post['post']['loginid'];
$name = $post['change']['name'];
$address = $post['change']['pref'];
$tel = $post['change']['tel'];
$birthday = $post['change']['birthday'];
$gender = $post['change']['gender'];
$japanese = $post['change']['japanese'];
$english = $post['change']['english'];
$chinese = $post['change']['chinese'];
$image = $post['post']['image'];
$self_introduction = $post['change']['self_introduction'];
$mail = $post['change']['mail'];
$birth_year = $post['change']['birth_year'];
$birth_month = $post['change']['birth_month'];
$birth_day = $post['change']['birth_day'];

// 入力項目を揃えてデータベースに入力する
$sortAry = array(":loginid"=>$loginid,":name"=>$name,":address"=>$address,"tel"=>$tel,"birthday"=>$birthday,"gender"=>$gender,"mail"=>$mail,"japanese"=>$japanese,"english"=>$english,"chinese"=>$chinese,"image"=>$image,"self_introduction"=>$self_introduction,"birth_year"=>$birth_year,"birth_month"=>$birth_month,"birth_day"=>$birth_day);
$stmh->execute($sortAry);
$scsses_mes = "<p>登録情報の変更を完了しました。</p>";

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("scsses_mes",$scsses_mes);

$view -> screenView('guide_edit_complete');
