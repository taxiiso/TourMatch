<?php
require_once "DbConnect.php";

class guide {
  // ガイドの個人情報を出力する
  public function getGuideAry ($loginid) {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT *
    FROM t_guide
    WHERE loginid = ?";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($loginid));
    $guideAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $guideAry;
  }

  // ツアーガイドが登録されている一覧を出力する
  public function getTourGuideAry ($guide_id) {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT t_guidebook.guidebook_id,t_tour.tour_name,t_guidebook.tour_date,t_tour.tour_address,t_tour.tour_price,t_guidebook.afg
    FROM t_guidebook INNER JOIN t_tour
    ON t_guidebook.tour_id = t_tour.tour_id
    WHERE t_guidebook.guide_id = {$guide_id}";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($guide_id));
    $tourGuideAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $tourGuideAry;
  }

  // 退会する際に予約中のツアーがないか調べる関数
  public function guideDeleteNGCheck($guide_id){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じツアーIDを呼び出す
    $sql = "SELECT * FROM `t_guidebook` WHERE `guide_id` = {$guide_id} AND (`afg`= '募集中' OR `afg` = '予約成立')";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($guide_id));
    $val = $stmh->fetchall();

    if(count($val) != 0){
      return TRUE;
    }
  }

}
?>
