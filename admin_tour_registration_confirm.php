<?php
session_start();

// ログインされていない場合はadmin.phpに飛ばす
if(empty($_SESSION['admin_loginid']) || empty($_SESSION['admin_password'])){
  header('Location:admin.php');
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
$_SESSION['post'] = $post;
// $post = $_POST;

$tour_name = $post['tour_name'];
$tour_address = $post['pref'];
$tour_price = $post['tour_price'];
$tour_detail = $post['tour_detail'];
$imaget = "";
$image_err = "";

$tour_image = array();
if(isset($_FILES['tour_image'])){
  if($_FILES['tour_image']['size'] == 0){
    unset($_FILES['tour_image']);
  }else{
  $image = $_FILES['tour_image'];
  $_SESSION['tour_image'] = $_FILES['tour_image'];
  }
}else{
  $image_err = "なし";
}

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

if(empty($post['tour_name'])){
  $erCount ++;
  $erAry[] = "ツアーの名前";
}if(empty($post['pref'])){
  $erCount ++;
  $erAry[] = "ツアーの場所";
}
if(empty($post['tour_price'])){
  $erCount ++;
  $erAry[] = "ツアー料金";
}
// 画像サイズのチェック
if(isset($_FILES['tour_image'])){

  if($_FILES['tour_image']['size'] > 0){
    if($_FILES['tour_image']['size'] > 5000000){
      $er_image_size = "5MB以内の写真をアップロードしてください。";
      $_SESSION['er_tour_image'] = $er_tour_image;
      $erCount ++;

    }else{
          // 画像アップロードのファイル形式のチェック
          // (未)関数化する
          //getimagesize関数で画像情報を取得する
      list($img_width, $img_height, $mime_type, $attr) = getimagesize($_FILES['tour_image']['tmp_name']);
      //list関数の第3引数にはgetimagesize関数で取得した画像のMIMEタイプが格納されているので条件分岐で拡張子を決定する
      switch($mime_type){
          //jpegの場合
          case IMAGETYPE_JPEG:
              //拡張子の設定
              $img_extension = "jpg";
              break;
          //pngの場合
          case IMAGETYPE_PNG:
          //拡張子の設定
              $img_extension = "png";
              break;
          //gifの場合
          case IMAGETYPE_GIF:
              //拡張子の設定
              $img_extension = "gif";
              break;
      }

      if($img_extension != "jpg" && $img_extension != "png" && $img_extension != "gif"){
        $er_image_type = "アップロードできる画像ファイルの種類は、JPEG、PNG、GIFのみです。";
        $_SESSION['er_tour_image_type'] = $er_tour_image_type;
        $erCount ++;

      }
    }
  }
    // 画像を保存しないまま表示させる準備
    $fp = fopen($_FILES['tour_image']['tmp_name'], "rb");
    $img = fread($fp, filesize($_FILES['tour_image']['tmp_name']));
    fclose($fp);

    $enc_img = base64_encode($img);


    $imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);

  }
if(empty($post['tour_detail'])){
  $erCount ++;
  $erAry[] = "ツアー内容";
}else{
  // ツアー内容の文字数チェック
  if(mb_strlen($tour_detail, 'UTF-8') > 1000){
    $er_num = "自己紹介は1000文字以内でお書きください。";
    $_SESSION['er_num'] = $er_num;
    $erCount ++;
  }
}

if($erCount > 0){
  $er_mess = "";
  if(count($erAry)){
    $er_mess = implode("、",$erAry)."が入力されていません。";
    $_SESSION['er_mess'] = $er_mess;

  }
  header('Location:admin_tour_registration_form.php');
  exit();

}elseif(isset($_SESSION['tour_image'])){
  $tour_image = $_SESSION['tour_image'];
  $file_dir = 'tour_image/';
  $file_path = $file_dir.$tour_image['name'];
  move_uploaded_file($tour_image['tmp_name'], $file_path);
  $_SESSION['file_path'] = $file_path;
  $imaget = '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'">';

}else{
  $imaget = "<img src='guide_image/{$image}'>";
  }

// (未)mb_convert_kanaをする
include 'view/view.php';
$view = new view();

$view -> setAssign("tour_name",$tour_name);
$view -> setAssign("tour_price",$tour_price);
$view -> setAssign("tour_detail",$tour_detail);
$view -> setAssign("tour_address",$tour_address);
$view -> setAssign("imaget",$imaget);
$view -> setAssign("image_err",$image_err);

$view->screenView('admin_tour_registration_confirm');
