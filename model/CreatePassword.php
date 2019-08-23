<?php
class CreatePassword {

	// private $pass;

	public function getPass($digit = 12){
		$pass = "";
		$ary = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
		for ($i = 0; $i < $digit; $i++) {
			$pass .= $ary[rand(0, count($ary) - 1)];
		}
		return $pass;
	}

}
?>
