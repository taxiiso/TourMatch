<?php

// データベースに接続する関数
class DbConnect {
	private $dsn = "mysql:dbname=_tourmutch_db;host=mysql006.phy.heteml.lan;charset=utf8;";
	private $dbuser = "_tourmutch_db";
	private $dbpass = "tourmutch01";
	private $conn;

	function __construct() {
		try {
			// MySQLへ接続する
			$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION,
			);
			$this->conn = new PDO(
				$this->dsn,
				$this->dbuser,
				$this->dbpass,
				$options);

				// データベースに繋ぐと昨日までのafgが終了になる
				$stmt = $this->conn;

				// ガイド予約を先に日付で終了にする
				$sql = "UPDATE `t_guidebook` SET `afg` = '終了' WHERE `tour_date` < (NOW() - INTERVAL 1 DAY)";
				$stmh = $stmt->prepare($sql);
				$stmh->execute();

				// ガイド予約が終了していれば、ツアー予約も終了させる
				$sql = "SELECT `guidebook_id` FROM `t_guidebook` WHERE `afg`='終了'";
				$stmh = $stmt->prepare($sql);
				$stmh->execute();
				$result = $stmh->fetchall();

				foreach($result as $a){
					$sql = "UPDATE `t_userbook` SET `afg` = '終了' WHERE `guidebook_id` = {$a['guidebook_id']} AND `afg` != '終了'";
					$stmh = $stmt->prepare($sql);
					$stmh->execute();
				}




				// $sql = "UPDATE `t_userbook` SET `t_userbook.afg` = '終了' FROM `t_userbook` JOIN `t_guidebook` ON `t_userbook.guidebook_id` = `t_guidebook.guidebook_id` AND `t_guidebook.afg` = '終了'";
				// $stmh = $stmt->prepare($sql);
				// $stmh->execute();

		} catch (PDOException $e) {
			exit('データベース接続エラー '.$e->getMessage());
		}
	}

	function getStmt() {
		return $this->conn;

	}
}

?>
