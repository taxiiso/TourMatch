<?php
session_start();

// ログインされていない場合はadmin.phpに飛ばす
if(empty($_SESSION['loginid']) || empty($_SESSION['password'])){
  header('Location:index.php');
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
$_SESSION['change'] = $post;
// $post = $_POST;

$loginid = $post['loginid'];
$name = $post['name'];
$adrress = $post['pref'];
$tel = $post['tel'];
$birth_year = $post['birth_year'];
$birth_month = $post['birth_month'];
$birth_day = $post['birth_day'];
$gender = $post['gender'];
$mail = $post['mail'];
$image = $_SESSION['post']['image'];
$_SESSION['new_image'] = $_FILES;
$self_introduction = $post['self_introduction'];
$post['birthday'] = "{$birth_year}-{$birth_month}-{$birth_day}";

$japanese = '';
$english = '';
$chinese = '';
// $image = array();
if(isset($post['japanese'])){
  $japanese = $post['japanese'];
  $_SESSION['post']['japanese'] = "可";
}else{
  $_SESSION['post']['japanese'] = "不可";
}
if(isset($post['english'])){
  $english = $post['english'];
  $_SESSION['post']['english'] = "可";
}else{
  $_SESSION['post']['english'] = "不可";
}
if(isset($post['chinese'])){
  $chinese = $post['chinese'];
  $_SESSION['post']['chinese'] = "可";
}else{
  $_SESSION['post']['chinese'] = "不可";
}
if(isset($_FILES['image'])){
  if($_FILES['image']['size'] == 0){
    unset($_FILES['image']);
  }else{
  $new_image = $_FILES['image'];
  $_SESSION['new_image'] = $_FILES['image'];
  }
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
$er_mail = "";

if(empty($post['loginid'])){
  $erCount ++;
  $erAry[] = "ログインID";
}
if(empty($post['name'])){
  $erCount ++;
  $erAry[] = "お名前";
}if(empty($post['pref'])){
  $erCount ++;
  $erAry[] = "住所";
}
if(empty($post['tel'])){
  $erCount ++;
  $erAry[] = "電話番号";
}
if(empty($post['birth_year'])){
  $erCount ++;
  $erAry[] = "生まれた年";
}
if(empty($post['birth_month'])){
  $erCount ++;
  $erAry[] = "生まれた月";
}
if(empty($post['birth_day'])){
  $erCount ++;
  $erAry[] = "生まれた日";
}
if(empty($post['gender'])){
  $erCount ++;
  $erAry[] = "性別";
}
if(empty($post['mail'])){
  $erCount ++;
  $erAry[] = "メールアドレス";
}else{
  // メールアドレスの正規表現チェック
  if(!$rg->getMailChk($post['mail'])){
    $er_mail = "メールアドレスが不正です。";
    $_SESSION['er_mail'] = $er_mail;
    $erCount ++;
  }
}
if(empty($post['japanese']) && empty($post['english']) && empty($post['chinese'])){
  $er_lang = "対応可能言語は少なくとも一つは選択してください。";
  $_SESSION['er_lang'] = $er_lang;
  $erCount ++;
}
// 画像サイズのチェック

$images = "";
if(isset($_FILES['image'])){

  if($_FILES['image']['size'] > 0){
    if($_FILES['image']['size'] > 5000000){
      $er_image_size = "5MB以内の写真をアップロードしてください。";
      $_SESSION['er_image_size'] = $er_image_size;
      $erCount ++;

    }else{
          // 画像アップロードのファイル形式のチェック
          // (未)関数化する
          //getimagesize関数で画像情報を取得する
      list($img_width, $img_height, $mime_type, $attr) = getimagesize($_FILES['image']['tmp_name']);
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
        $_SESSION['er_image_type'] = $er_image_type;
        $erCount ++;

      }
    }
  }
    // 画像を保存しないまま表示させる準備
    $fp = fopen($_FILES['image']['tmp_name'], "rb");
    $img = fread($fp, filesize($_FILES['image']['tmp_name']));
    fclose($fp);

    $enc_img = base64_encode($img);


    $imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);


  }
if(empty($post['self_introduction'])){
  $erCount ++;
  $erAry[] = "自己紹介";
}else{
  // 自己紹介の文字数チェック
  if(mb_strlen($self_introduction, 'UTF-8') > 1000){
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
  header('Location:guide_mypage.php');
  exit();

// 画像のアップロード
}elseif(isset($_FILES['image'])){
  $guide_image = $_FILES['image'];
  $file_dir = 'guide_image/';
  $file_path = $file_dir.$guide_image['name'];
  move_uploaded_file($guide_image['tmp_name'], $file_path);
  $_SESSION['file_path'] = $file_path;
  $images = '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'">';
}else{
  $images .= "<img src='guide_image/{$image}'>";
  }



// (未)mb_convert_kanaをする

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("loginid",$loginid);
$view -> setAssign("name",$name);
$view -> setAssign("adrress",$adrress);
$view -> setAssign("tel",$tel);
$view -> setAssign("birth_year",$birth_year);
$view -> setAssign("birth_month",$birth_month);
$view -> setAssign("birth_day",$birth_day);
$view -> setAssign("gender",$gender);
$view -> setAssign("mail",$mail);
$view -> setAssign("japanese",$japanese);
$view -> setAssign("english",$english);
$view -> setAssign("chinese",$chinese);
$view -> setAssign("images",$images);
$view -> setAssign("self_introduction",$self_introduction);

$view -> screenView('guide_edit_confirm');
