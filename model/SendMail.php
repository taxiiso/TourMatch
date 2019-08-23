<?php
class SendMail {
  private $to;
  private $name;

  public function setMail($toMail,$toName){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "テスト"; // 題名
    $this->to = $toMail;
    $this->name = $toName;
    $body = <<<EOF
{$this->name} 様
ご登録ありがとうございます。

/*/*/*/*/*/*/*/*/*/*/
株式会社　〇〇〇〇〇〇
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";
    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }

  public function userRegMail($toMail,$toName,$regUrl){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "TOUR-MATCHのユーザ仮登録"; // 題名
    $this->to = $toMail;
    $this->name = $toName;
    $body = <<<EOF
{$this->name} 様
TOUR-MATCHのユーザ仮登録ありがとうございます。
下記のURLをクリックしてユーザ本登録の手続きを完了してください。

{$regUrl}


/*/*/*/*/*/*/*/*/*/*/
株式会社　TOUR-MATCH
tour-match@gmail.com
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";
    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }

  public function userCompMail($toMail,$toName,$loginId,$loginPassword){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "TOUR-MATCHのユーザ本登録"; // 題名
    $this->to = $toMail;
    $this->name = $toName;

    $body = <<<EOF
{$this->name} 様
ユーザ本登録ありがとうございます。
下記のログイン情報をご利用ください。

ログインID： {$loginId}
ログインパスワード： {$loginPassword}

TOUR-MATCHのTOPページ：　localhost/index.php

/*/*/*/*/*/*/*/*/*/*/
株式会社　TOUR-MATCH
tour-match@gmail.com
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";

    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }

  public function guideRegMail($toMail,$toName,$regUrl){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "TOUR-MATCHのガイド仮登録"; // 題名
    $this->to = $toMail;
    $this->name = $toName;
    $body = <<<EOF
{$this->name} 様
TOUR-MATCHのガイド仮登録ありがとうございます。
下記のURLをクリックしてガイド本登録の手続きを完了してください。

{$regUrl}


/*/*/*/*/*/*/*/*/*/*/
株式会社　TOUR-MATCH
tour-match@gmail.com
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";

    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }

  public function guideCompMail($toMail,$toName,$loginId,$loginPassword){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "TOUR-MATCHのガイド本登録"; // 題名
    $this->to = $toMail;
    $this->name = $toName;

    $body = <<<EOF
{$this->name} 様
ガイド本登録ありがとうございます。
下記のログイン情報をご利用ください。

ログインID： {$loginId}
ログインパスワード： {$loginPassword}

TOUR-MATCHのTOPページ：　localhost/index.php

/*/*/*/*/*/*/*/*/*/*/
株式会社　TOUR-MATCH
tour-match@gmail.com
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";
    

    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }

  public function bookCompMail($toMail,$toName,$tour_name,$tour_date){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "TOUR-MATCHのツアー予約が入りました。"; // 題名
    $this->to = $toMail;
    $this->name = $toName;

    $body = <<<EOF
{$this->name} 様
TOUR-MATCHのツアー予約が入りました。

【予約されたツアー】
ツアー名：{$tour_name}
日　　付：{$tour_date}

ログイン後、予約情報を確認してユーザに連絡をして下さい。

TOUR-MATCHのTOPページ：　localhost/index.php

/*/*/*/*/*/*/*/*/*/*/
株式会社　TOUR-MATCH
tour-match@gmail.com
/*/*/*/*/*/*/*/*/*/*/
EOF;
$header = "From: $email\nReply-To: $email\n";
mb_send_mail($this->to, $subject, $body, $header);
  }

  public function bookCanMail($toMail,$toName,$tour_name,$tour_date){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "tour-match@gmail.com";
    $subject = "TOUR-MATCHのツアーがキャンセルされました。"; // 題名
    $this->to = $toMail;
    $this->name = $toName;

    $body = <<<EOF
{$this->name} 様
TOUR-MATCHのツアーがキャンセルされました。

【キャンセルされたツアー】
ツアー名：{$tour_name}
日　　付：{$tour_date}

このツアーは再募集中です。
ログイン後、キャンセル情報を確認して下さい。

TOUR-MATCHのTOPページ：　localhost/index.php

/*/*/*/*/*/*/*/*/*/*/
株式会社　TOUR-MATCH
tour-match@gmail.com
/*/*/*/*/*/*/*/*/*/*/
EOF;
$header = "From: $email\nReply-To: $email\n";
mb_send_mail($this->to, $subject, $body, $header);
  }
}


?>
