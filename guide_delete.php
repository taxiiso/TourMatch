<?php

session_start();

// ログインされていない場合はindex.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}

$err_mes1 = "";
$delete_comfirm_mes = "";
$delete_mes = "";

// 退会承認ボタンを表示する
if(isset($_POST['exit_guide'])){

  // 退会する際に予約中のツアーがないか調べる関数
  $guide_id = $_SESSION['post']['guide_id'];

  require_once "model/guide.php";
  $dc = new guide();
  $cc =$dc->guideDeleteNGCheck($guide_id);

  if($cc){
    $err_mes1 .= '<p>募集中または予約成立のツアーがある場合は退会できません。<br>
          <a href="guide_mypage.php">マイページに戻る</a></p>';

  }else{

  $delete_comfirm_mes .= '<form action="#" method="post">';
  $delete_comfirm_mes .= "<p>一度退会すると取り消すことはできません。<br>
                        了承されましたら下記の退会ボタンを押してください。</p>";
  $delete_comfirm_mes .= '<input type="submit" name="exit_guide_complate" value="了承して退会する"></form>';
  $delete_comfirm_mes .= '<p><a href="guide_mypage.php">マイページに戻る</a></p>';

 }
}

// 退会承認ボタンが押されたら退会処理をする
if(isset($_POST['exit_guide_complate'])){

  $guideid = $_SESSION['post']['guide_id'];

  require_once "model/DbConnect.php";

  $dc = new DbConnect();
  $stmt = $dc->getStmt();

  $sql = "UPDATE `t_guide` SET `afg` = 3 WHERE `guide_id` = {$guideid}";
  $stmh = $stmt->prepare($sql);

  $stmh->execute();
  $_SESSION = "";
  session_destroy();

  $delete_mes .= "<p>退会処理を行いました。<br>
                  サービスのご利用ありがとうございました。</p>";
  $delete_mes .= '<p><a href="index.php">TOPページに戻る</a></p>';

}

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("err_mes1",$err_mes1);
$view -> setAssign("delete_comfirm_mes",$delete_comfirm_mes);
$view -> setAssign("delete_mes",$delete_mes);

$view -> screenView('guide_delete');
