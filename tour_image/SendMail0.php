<?php
class SendMail {
  private $to;
  private $name;

  public function setMail($toMail,$toName){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "denettestphp@gmail.com";
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

  public function regMail($toMail,$toName,$regUrl){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "denettestphp@gmail.com";
    $subject = "テスト"; // 題名
    $this->to = $toMail;
    $this->name = $toName;
    $body = <<<EOF
{$this->name} 様
仮登録ありがとうございます。
下記のURLをクリックして本登録の手続きを完了してください。

{$regUrl}


/*/*/*/*/*/*/*/*/*/*/
株式会社　〇〇〇〇〇〇
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";
    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }

  public function compMail($toMail,$toName,$loginId,$loginPassword){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $email = "denettestphp@gmail.com";
    $subject = "テスト"; // 題名
    $this->to = $toMail;
    $this->name = $toName;

    $body = <<<EOF
{$this->name} 様
本登録ありがとうございます。
下記のログイン情報をご利用ください。

ログインID： {$loginId}
ログインパスワード： {$loginPassword}


/*/*/*/*/*/*/*/*/*/*/
株式会社　〇〇〇〇〇〇
/*/*/*/*/*/*/*/*/*/*/
EOF;
    $header = "From: $email\nReply-To: $email\n";
    if(!mb_send_mail($this->to, $subject, $body, $header)){
      echo "メール送信に失敗しました。";
    }
  }
}


?>
