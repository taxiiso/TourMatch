<?php
require_once "DbConnect.php";

class user {
  // ユーザの登録情報を出力する
  public function getUserAry ($loginid) {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT *
    FROM t_user
    WHERE loginid = ?";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($loginid));
    $userAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $userAry;
  }


  // ツアーが登録されている一覧の表示させるものだけを出力する
  public function getCheckTourAry ($tour_id, $tour_date){
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT t_guidebook.guidebook_id,
                   t_guidebook.tour_date,
                   t_tour.tour_name,
                   t_guide.name
            FROM t_guidebook
            INNER JOIN t_tour
            ON t_guidebook.tour_id = t_tour.tour_id
            INNER JOIN t_guide
            ON t_guidebook.guide_id = t_guide.guide_id
            WHERE t_guidebook.tour_id =?
            AND t_guidebook.tour_date =?
            AND t_guidebook.afg ='募集中'
            ";

    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($tour_id, $tour_date));
    $CheckTourAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $CheckTourAry;
  }

  // データベースに同じ予定IDが登録されているか調べる関数
  public function guidebookIdNGCheck($guidebook_id, $tablename){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じツアーIDを呼び出す
    $sql = "SELECT * FROM {$tablename} WHERE `guidebook_id`=? && `afg`='募集中'";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($guidebook_id));
    $val = $stmh->fetchall();

    if(count($val) == 0){
      return TRUE;
    }
  }

  // ユーザが同じ日に複数の予約をしていないか調べる関数
  public function userbookDateNGCheck($tour_date, $user_id){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じツアーIDを呼び出す
    $sql = "SELECT * FROM `t_userbook` INNER JOIN `t_guidebook` ON t_userbook.guidebook_id = t_guidebook.guidebook_id WHERE `tour_date`=? AND `user_id`=? AND `t_userbook.afg`='予約中'";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($tour_date, $user_id));
    $val = $stmh->fetchall();

    if(count($val) > 0){
      return TRUE;
    }
  }

  // 予約希望のツアーの情報を出力する
  public function getUserbookAry ($guidebook_id) {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT t_guidebook.guidebook_id,
                   t_guidebook.tour_date,
                   t_tour.tour_id,
                   t_tour.tour_name,
                   t_tour.tour_price,
                   t_guide.name,
                   t_guide.gender,
                   t_guide.japanese,
                   t_guide.english,
                   t_guide.chinese,
                   t_guide.image,
                   t_guide.mail,
                   t_guide.self_introduction
            FROM t_guidebook
            INNER JOIN t_tour
            ON t_guidebook.tour_id = t_tour.tour_id
            INNER JOIN t_guide
            ON t_guidebook.guide_id = t_guide.guide_id
            WHERE t_guidebook.guidebook_id =?
            ";

    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($guidebook_id));
    $getUserbookAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $getUserbookAry;
  }

  // ツアーが予約されている一覧を出力する
  public function getUserbookListAry ($user_id) {
    $dc = new DbConnect();
    $stmt = $dc->getStmt();

    $sql = "SELECT t_userbook.userbook_id,t_guidebook.tour_date,t_tour.tour_name,t_tour.tour_price,t_guide.name,t_userbook.afg
    FROM t_userbook
    INNER JOIN t_guidebook
    ON t_userbook.guidebook_id = t_guidebook.guidebook_id
    INNER JOIN t_guide
    ON t_guidebook.guide_id = t_guide.guide_id
    INNER JOIN t_tour
    ON t_guidebook.tour_id = t_tour.tour_id
    WHERE t_userbook.user_id =?";

    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($user_id));
    $UserbookListAry = $stmh->fetchall(PDO::FETCH_ASSOC);

    return $UserbookListAry;
  }

  // 退会する際に予約中のツアーがないか調べる関数
  public function userDeleteNGCheck($user_id){
    require_once "model/DbConnect.php";
    $rg = new DbConnect();
    $stmt = $rg->getStmt();

    // データベース内の同じツアーIDを呼び出す
    $sql = "SELECT * FROM `t_userbook` WHERE `user_id` = {$user_id} AND `afg`= '予約中'";
    $stmh = $stmt->prepare($sql);

    $stmh->execute(array($user_id));
    $val = $stmh->fetchall();

    if(count($val) != 0){
      return TRUE;
    }
  }
}
?>
