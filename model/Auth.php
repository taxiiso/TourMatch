<?php
  require_once "DbConnect.php";

  class Auth{
    // 管理者のログインチェック
    public function adminAuthChk($admin_loginid,$admin_password){
      $dc = new Dbconnect();
      $stmt = $dc->getStmt();

      $sql = "SELECT *
      FROM `m_admin` WHERE `admin_loginid` = ? AND `admin_password` = ?;";
      $stmh = $stmt->prepare($sql);

      $stmh->execute(array($admin_loginid,$admin_password));
      $val = $stmh->fetchall();

      if(count($val)){
        $_SESSION['admin']['admin_loginid'] = $val[0]['admin_loginid'];
        $_SESSION['admin']['admin_password'] = $val[0]['admin_password'];
        return TRUE;
      }
      return FALSE;
    }

    // ガイドのログインチェック
    public function guideAuthChk($guide_loginid,$guide_password){
      $dc = new Dbconnect();
      $stmt = $dc->getStmt();

      $sql = "SELECT *
      FROM `t_guide` WHERE `loginid` = ? AND `password` = ?;";
      $stmh = $stmt->prepare($sql);

      $stmh->execute(array($guide_loginid,$guide_password));
      $val = $stmh->fetchall();

      if(count($val)){
        $_SESSION['guide']['guide_loginid'] = $val[0]['loginid'];
        $_SESSION['guide']['guide_password'] = $val[0]['password'];
        return TRUE;
      }
      return FALSE;
    }

    // ユーザのログインチェック
    public function userAuthChk($user_loginid,$user_password){
      $dc = new Dbconnect();
      $stmt = $dc->getStmt();

      $sql = "SELECT *
      FROM `t_user` WHERE `loginid` = ? AND `password` = ?;";
      $stmh = $stmt->prepare($sql);

      $stmh->execute(array($user_loginid,$user_password));
      $val = $stmh->fetchall();

      if(count($val)){
        $_SESSION['user']['user_loginid'] = $val[0]['loginid'];
        $_SESSION['user']['user_password'] = $val[0]['password'];
        return TRUE;
      }
      return FALSE;
    }
  }






 ?>
