<?php
require_once "DbConnect.php";

class GetList {

  // ユーザデータをすべて取得する関数
  public function getUserAry () {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `user_id`,`loginid`,`password`,`name`,`address`,`tel`,`birthday`,`gender`,`joindate`,`mail`,`afg`
    FROM t_user";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $userAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $userAry;
  }

  // ガイドデータを画像以外すべて取得する関数
  public function getGuideAry () {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `guide_id`,`loginid`,`password`,`name`,`address`,`tel`,`birthday`,`gender`,`joindate`,`japanese`,`english`,`chinese`,`self_introduction`,`mail`,`afg`
    FROM t_guide";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $guideAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $guideAry;
  }

  // ガイドデータを画像以外すべて取得する関数
  public function getGuideImageAry () {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `image`
    FROM t_guide";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $guideImageAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $guideImageAry;
  }

  // ツアーデータを画像以外すべて取得する関数
  public function getTourAry () {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `tour_id`,`tour_name`,`tour_address`,`tour_price`,`tour_detail`,`tour_make_date`,`afg`
    FROM t_tour";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $tourAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $tourAry;
  }

  // ツアーデータの画像を取得する関数
  public function getTourImageAry() {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `tour_image`
    FROM t_tour";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $tourImageAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $tourImageAry;
  }

  // ツアーデータの画像を取得する関数(afg縛りあり)
  public function getTourImageACAry() {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `tour_image`
    FROM `t_tour`
    WHERE `afg`=1";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $tourImageACAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $tourImageACAry;
  }

  // ユーザ・ガイドページ用ツアーデータを画像以外すべて取得する関数
  // アクティブフラグで判定して実施データだけ選ぶ
  public function getTourUGAry () {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT `tour_id`,`tour_name`,`tour_address`,`tour_price`,`tour_detail`
    FROM `t_tour`
    WHERE `afg`=1";
    $stmh = $stmt->prepare($sql);

    $stmh->execute();
    $tourAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $tourAry;
  }

  // データベースに同じログインIDが登録されているか調べる関数
  public function idNGCheck($id, $idname, $tablename){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じIDを呼び出す
    $sql = "SELECT * FROM {$tablename} WHERE {$idname}=?";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($id));
    $val = $stmh->fetchall();

    if(count($val) == 0){
      return TRUE;
    }
  }

}


 ?>
