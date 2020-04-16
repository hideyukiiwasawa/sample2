<?php
class getFormAction {
	public $pdo;

	function __construct() {
		try {
			$this->pdo = new PDO( PDO_DSN, DATABASE_USER, DATABASE_PASSWORD);
		} catch (PDOException $e) {
			echo 'error' . $e->getMessage();
			die();
		}


	}


	function saveDbPostData($data){
	

		// データの保存
		$smt = $this->pdo->prepare('insert into samplebbs (name,email,body,created_at,updated_at) values(:name,:email,:body,now(),now())');

		$smt->bindParam(':name',$data['name'], PDO::PARAM_STR);
		$smt->bindParam(':email',$data['email'], PDO::PARAM_STR);
		$smt->bindParam(':body',$data['body'], PDO::PARAM_STR);
		$smt->execute();
	}


	function getDbPostData(){
		// 登録データ取得
		$smt = $this->pdo->prepare('select * from samplebbs order by created_at DESC limit 100');
		$smt->execute();
		// 実行結果を配列に返す。
		$result = $smt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}	

}

?>
