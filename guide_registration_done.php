<?php

// ゲット値がなければTOPページへ
if(isset($_GET['pass']) && !empty($_GET['pass'])){
  $pass = $_GET['pass'];

}else{
  header("Location: index.php");
  exit();

}

// データベースに接続するクラスの呼び出し
require_once "model/DbConnect.php";
$rg = new DbConnect();
$stmt = $rg->getStmt();

// データベース内の同じ仮パスワードを呼び出す
$sql = "SELECT * FROM `t_guide` WHERE `temppass`=?";
$stmh = $stmt->prepare($sql);

$stmh->execute(array($pass));
$val = $stmh->fetchall();

// もし一致する仮パスワードがなければ、エラーメッセージを返す
$err_mes = "";
$sac_mes = "";
if(count($val) == 0){
  echo '　仮登録データがありません。<br>
        　再度、登録の手続きをお願いします。<br>
        <a href="index.php">TOPページへ</a>';
  exit();

}else{
// 仮パスワードが一致すれば、アクティブフラグを2にして、
// 仮パスワードを削除する
$sql = "UPDATE `t_guide` SET afg = 2 ,temppass = null ";
$sql .= "WHERE guide_id ='{$val[0]['guide_id']}'";
$stmt->query($sql);

// 本登録完了のメールを送る
require_once "model/SendMail.php";
$ms = new SendMail();
$to = $val[0]['mail'];
$name = $val[0]['name'];
$loginId =$val[0]['loginid'];
$loginPassword =$val[0]['password'];
$ms->userCompMail($to, $name, $loginId, $loginPassword);

// TOPページへのリンク
$sac_mes = '<p>　　ガイド本登録を完了しました。<br>
              　お客様のログイン情報を記載したメールを送信しましたので、<br />
              　内容をご確認ください。</p>
            <p><a href="index.php">　TOPページに戻る</a></p>';
}

// viewの出力
include 'view/view.php';
$view = new view();
$view -> setAssign("err_mes",$err_mes);
$view -> setAssign("sac_mes",$sac_mes);

$view -> screenView('guide_registration_done');
