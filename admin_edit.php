<?php

session_start();

$err_mess = "";
$tourchange_mes = "";
$userchange_mes = "";
$guidechange_mes = "";


// ポスト送信されたIDとパスワードをセッションに変換
if(isset($_POST['admin_loginid'])){
  $_SESSION['admin_loginid'] = $_POST['admin_loginid'];
}

if(isset($_POST['admin_password'])){
  $_SESSION['admin_password'] = $_POST['admin_password'];
}

$admin_loginid = $_SESSION['admin_loginid'];
$admin_password = $_SESSION['admin_password'];

// ログインを管理するクラスの呼び出し
require_once "model/Auth.php";
$au = new Auth;

// ログインチェック
$err_login = "";
if($au->adminAuthChk($admin_loginid,$admin_password) === FALSE){
  $err_login = '<p>ログインIDまたはパスワードが違います<br>
                <a href="admin.php">ログイン画面に戻る</a></p>';

  include 'view/view.php';
  $view = new view();
  $view -> setAssign("err_login",$err_login);

  $view->screenView('loginErr');

  exit();

}else{

  // ツアー中止変更ボタンが押されたら
  // （未）この関数のモデル化
  if(isset($_POST['tourid']) && isset($_POST['afg'])){

    $tourid = $_POST['tourid'];
    $afg = $_POST['afg'];


    // 存在しないIDを入力したときのエラーメッセージ
    require_once "model/GetList.php";
    $gl = new GetList;

    if($gl->idNGCheck($tourid, "tour_id", "t_tour")){
      $err_mess = "<p>存在しないIDです。</p>";
    }else{

    require_once "model/DbConnect.php";

    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "UPDATE `t_tour` SET `afg` = {$afg} WHERE `tour_id` = {$tourid}";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();

    $tourchange_mes = "<p>ツアーの状態を変更しました。</p>";
    $err_mess = "";
    }
  }


  // ツアーデータをすべて取得する関数
  require_once "model/GetList.php";

  $gl = new GetList;
  $tourAry = $gl->getTourUGAry();
  $tourImageACAry = $gl->getTourImageACAry();


  // ツアーデータを画像は別ですべて取得する
  require_once "model/GetList.php";

  $gl = new GetList;
  $tourAry = $gl->getTourAry();
  $tourImageAry = $gl->getTourImageAry();

  $htmltu = "";
  foreach($tourAry as $i){
      $htmltu .= '<tr>';
    foreach($i as $key => $value){
      $htmltu .= "<td>{$value}</td>";
    }
    $htmltu .= '</tr>';
  }

  $htmlti = "";
  foreach($tourImageAry as $i){
      $htmlti .= '<p>';
    foreach($i as $key => $value){
      $htmlti .= "<img src='tour_image/{$value}' alt=''>";
    }
    $htmlti .= '</p>';
  }


  // ユーザ退会変更ボタンが押されたら
  // （未）この関数のモデル化
  if(isset($_POST['userid']) && isset($_POST['afg'])){

    $userid = $_POST['userid'];
    $afg = $_POST['afg'];
    $err_mess = "";

    // 存在しないIDを入力したときのエラーメッセージ
    require_once "model/GetList.php";
    $gl = new GetList;

    if($gl->idNGCheck($userid, "user_id", "t_user")){
      $err_mess = "<p>存在しないIDです。</p>";
    }else{

    require_once "model/DbConnect.php";

    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "UPDATE `t_user` SET `afg` = {$afg} WHERE `user_id` = {$userid}";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();

    $userchange_mes = "<p>ユーザの状態を変更しました。</p>";
   }
  }


  // ユーザデータをすべて取得する関数
  require_once "model/GetList.php";

  $gl = new GetList;
  $userAry = $gl->getUserAry();

  $htmluu = "";
  foreach($userAry as $i){
      $htmluu .= '<tr>';
    foreach($i as $key => $value){
      $htmluu .= "<td>{$value}</td>";
    }
    $htmluu .= '</tr>';
  }

  // ガイド退会変更ボタンが押されたら
  // （未）この関数のモデル化
  if(isset($_POST['guideid']) && isset($_POST['afg'])){

    $guideid = $_POST['guideid'];
    $afg = $_POST['afg'];
    $err_mess = "";

    // 存在しないIDを入力したときのエラーメッセージ
    require_once "model/GetList.php";
    $gl = new GetList;

    if($gl->idNGCheck($guideid, "guide_id", "t_guide")){
      $err_mess = "<p>存在しないIDです。</p>";
    }else{

    require_once "model/DbConnect.php";

    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "UPDATE `t_guide` SET `afg` = {$afg} WHERE `guide_id` = {$guideid}";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();

    $guidechange_mes = "<p>ガイドの状態を変更しました。</p>";
   }
  }


  // ガイドデータを画像は別ですべて取得する関数
  require_once "model/GetList.php";

  $gl = new GetList;
  $guideAry = $gl->getGuideAry();
  $guideImageAry = $gl->getGuideImageAry();

  $htmlg = "";
  foreach($guideAry as $u){
      $htmlg .= '<tr>';
    foreach($u as $key => $value){
      $htmlg .= "<td>{$value}</td>";
    }
    $htmlg .= '</tr>';
  }

  $htmlgi = "";
  foreach($guideImageAry as $i){
      $htmlgi .= '<p>';
    foreach($i as $key => $value){
      $htmlgi .= "<img src='guide_image/{$value}' alt=''>";
    }
    $htmlgi .= '</p>';
  }


  include 'view/view.php';
  $view = new view();
  $view -> setAssign("tourchange_mes",$tourchange_mes);
  $view -> setAssign("userchange_mes",$userchange_mes);
  $view -> setAssign("guidechange_mes",$guidechange_mes);
  $view -> setAssign("err_mess",$err_mess);
  $view -> setAssign("htmltu",$htmltu);
  $view -> setAssign("htmlti",$htmlti);
  $view -> setAssign("htmluu",$htmluu);
  $view -> setAssign("htmlg",$htmlg);
  $view -> setAssign("htmlgi",$htmlgi);

  $view->screenView('admin_edit');

}
