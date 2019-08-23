<?php

class tour{

  // データベースに同じツアーIDが登録されているか調べる関数
  public function touridNGCheck($tour_id, $tablename){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じツアーIDを呼び出す
    $sql = "SELECT * FROM {$tablename} WHERE `tour_id`=? && `afg`=1";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($tour_id));
    $val = $stmh->fetchall();

    if(count($val) == 0){
      return TRUE;
    }
  }

  // ツアーの情報を出力する
  public function getTourAry ($tour_id) {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT *
    FROM t_tour
    WHERE tour_id = ?";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($tour_id));
    $tourAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $tourAry;
  }

  // ガイドが同じ日に複数の登録をしていないか調べる関数
  public function tourDateNGCheck($tour_date, $guide_id){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じツアーIDを呼び出す
    $sql = "SELECT * FROM `t_guidebook` WHERE `tour_date`=? AND `guide_id`=? AND (`afg`='募集中' OR `afg`='予約成立')";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($tour_date, $guide_id));
    $val = $stmh->fetchall();

    if(count($val) > 0){
      return TRUE;
    }
  }

}

?>
