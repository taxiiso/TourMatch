<?php

session_start();

// ログインされていない場合はindex.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
  exit();
}

$guide_id = $_SESSION['post']['guide_id'];
$guide_name = $_SESSION['post']['name'];
$err_mes ="";
$guide_can_mes = "";

$loginid = "";
if(isset($_SESSION['post']['loginid'])){
  $loginid = $_SESSION['post']['loginid'];
}

$name = "";
if(isset($_SESSION['post']['name'])){
  $name = $_SESSION['post']['name'];
}

$tel = "";
if(isset($_SESSION['post']['tel'])){
  $tel = $_SESSION['post']['tel'];
}

$man = "";
if(!isset($_SESSION['post']['gender']) || $_SESSION['post']['gender'] === '男'){
   $man = 'checked';
 }

$woman = "";
if(isset($_SESSION['post']['gender']) && $_SESSION['post']['gender'] === '女'){
  $woman = 'checked';
}

$mail = "";
if(isset($_SESSION['post']['mail'])){
  $mail = $_SESSION['post']['mail'];
}

$japanese = "";
if(isset($_SESSION['post']['japanese']) && $_SESSION['post']['japanese'] == '日本語'){
   $japanese = 'checked';
 }

$english = "";
if(isset($_SESSION['post']['english']) && $_SESSION['post']['english'] == '英語'){
$english = 'checked';
}

$chinese = "";
if(isset($_SESSION['post']['chinese']) && $_SESSION['post']['chinese'] == '中国語'){
 $chinese = 'checked';
}

$image = "";
$image_er = "";
if(isset($_SESSION['post']['image'])){
   $image = "<img src='guide_image/{$_SESSION['post']['image']}'>";
 }else{
   $image_er = 'なし';
}

$self_introduction = "";
if(isset($_SESSION['post']['self_introduction'])){
 $self_introduction = $_SESSION['post']['self_introduction'];
}

  // 住所のフォームを出力
  require_once 'model/m_form.php';
  $pr = new registration;
  if(isset($_SESSION['post']['pref'])){$spref = $_SESSION['post']['pref'];}else{$spref = FALSE;}
  $html = $pr->getPref($prefText = "", $spref);

  // 生年月日のフォーム
  require_once 'model/m_form.php';
  $pr = new registration;
  if(isset($_SESSION['post']['birth_year'])){$syear = $_SESSION['post']['birth_year'];}else{$syear = FALSE;}
  if(isset($_SESSION['post']['birth_month'])){$smonth = $_SESSION['post']['birth_month'];}else{$smonth = FALSE;}
  if(isset($_SESSION['post']['birth_day'])){$sday = $_SESSION['post']['birth_day'];}else{$sday = FALSE;}
  $year = $pr->getYear($year=0, $syear);
  $month = $pr->getMonth($month=0, $smonth);
  $day = $pr->getDay($day=0, $sday);
  $year .= '年';
  $month .= '月';
  $day .= '日';
  $birthday = "{$year}{$month}{$day}";


// 修正ボタンが押されて戻った時はエラーメッセージを消す
if(isset($_POST['back'])){
  $_SESSION['er_mess'] = "";
  $_SESSION['er_mail'] = "";
  $_SESSION['er_loginid'] = "";
  $_SESSION['er_lang'] = "";
  $_SESSION['er_image_size'] = "";
  $_SESSION['er_num'] = "";
  $_SESSION['er_image_type'] = "";

  if(isset($_SESSION['file_path'])){
    unlink($_SESSION['file_path']);
    unset($_SESSION['file_path']);
  }
}

// 未入力項目があればエラーメッセージを返す
$er_mess = "";
if(isset($_SESSION['er_mess'])){
  $er_mess = $_SESSION['er_mess'];

}

$er_mail = "";
if(isset($_SESSION['er_mail'])){
  $er_mail = $_SESSION['er_mail'];

}

$er_loginid = "";
if(isset($_SESSION['er_loginid'])){
  $er_loginid = $_SESSION['er_loginid'];

}

$er_lang = "";
if(isset($_SESSION['er_lang'])){
  $er_lang = $_SESSION['er_lang'];

}

$er_image_size = "";
if(isset($_SESSION['er_image_size'])){
  $er_image_size = $_SESSION['er_image_size'];

}

$er_num = "";
if(isset($_SESSION['er_num'])){
  $er_num = $_SESSION['er_num'];

}

$er_image_type = "";
if(isset($_SESSION['er_image_type'])){
  $er_image_type = $_SESSION['er_image_type'];

}

// ガイド予定キャンセルボタンが押されたら
//予約状況を確認し予約済ならエラーで返す
if(isset($_POST['guidebook_id'])){

  // その予約IDのデータを取得する
  $guidebook_id = $_POST['guidebook_id'];

  require_once "model/DbConnect.php";

  $dc = new DbConnect();
  $stmt = $dc->getStmt();

  $sql = "SELECT *
          FROM t_guidebook
          WHERE guidebook_id = ?";
  $stmh = $stmt->prepare($sql);

  $stmh->execute(array($guidebook_id));
  $guidebookAry = $stmh->fetchall(PDO::FETCH_ASSOC);


$guide_can_mes = "";
$err_mes = "";
if(isset($guidebookAry['0'])){
    // すでに予約済みならエラーメッセージ
    if($guidebookAry[0]['afg'] == "予約成立"){
      $err_mes = "<p>予約済みのガイド予定はキャンセルできません。</p>";
    }elseif($guidebookAry[0]['afg'] == "キャンセル済"){
      $err_mes = "<p>その予定は既にキャンセル済です。</p>";
    }elseif($guidebookAry[0]['afg'] == "終了"){
      $err_mes = "<p>その予定は終了しています。</p>";
    }elseif($guidebookAry[0]['guide_id'] != $guide_id){
      $err_mes = "<p>存在しないIDです。</p>";
    }else{
    // キャンセルを実行する
    $sql = "UPDATE `t_guidebook` SET `afg` = 'キャンセル済' WHERE `guidebook_id` = {$guidebook_id}";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();

    $guide_can_mes = "<p>ガイド予定をキャンセルしました。</p>";

   }
 }else{
   $err_mes = "<p>存在しないIDです。</p>";
 }
}

// ガイドが登録しているツアー一覧を取得する
require_once "model/guide.php";
$rg = new guide();
$tourGuideAry = $rg->getTourGuideAry ($guide_id);

$htmlu = "";
foreach($tourGuideAry as $i){
    $htmlu .= '<tr>';
  foreach($i as $key => $value){
    $htmlu .= "<td>{$value}</td>";
  }
  $htmlu .= '</tr>';
}

  // viewの出力
  include 'view/view.php';
  $view = new view();
  $view -> setAssign("guide_name",$guide_name);
  $view -> setAssign("err_mes",$err_mes);
  $view -> setAssign("guide_can_mes",$guide_can_mes);
  $view -> setAssign("er_mess",$er_mess);
  $view -> setAssign("er_mail",$er_mail);
  $view -> setAssign("er_loginid",$er_loginid);
  $view -> setAssign("er_lang",$er_lang);
  $view -> setAssign("er_image_size",$er_image_size);
  $view -> setAssign("er_num",$er_num);
  $view -> setAssign("er_image_type",$er_image_type);
  $view -> setAssign("loginid",$loginid);
  $view -> setAssign("name",$name);
  $view -> setAssign("html",$html);
  $view -> setAssign("tel",$tel);
  $view -> setAssign("birthday",$birthday);
  $view -> setAssign("man",$man);
  $view -> setAssign("woman",$woman);
  $view -> setAssign("mail",$mail);
  $view -> setAssign("japanese",$japanese);
  $view -> setAssign("english",$english);
  $view -> setAssign("chinese",$chinese);
  $view -> setAssign("english",$english);
  $view -> setAssign("image",$image);
  $view -> setAssign("image_er",$image_er);
  $view -> setAssign("self_introduction",$self_introduction);
  $view -> setAssign("htmlu",$htmlu);


  $view -> screenView('guide_mypage');
