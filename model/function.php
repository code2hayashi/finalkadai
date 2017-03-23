<?php
/**
* REQUEST_METHODを取得
*/
function get_request_method() {
	return $_SERVER['REQUEST_METHOD'];
}

/**
* POSTを取得
*/
function get_post_data($key) {
	$str = '';
	if (isset($_POST[$key]) === TRUE) {
		$str = $_POST[$key];
	}
	return $str;
}

/**
* 特殊文字をHTMLエンティティに変換する
*/
function entity_str($str) {
	return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}

/**
* DB関連：DB接続＋ハンドラ取得
*/
function get_db_connect() {
	try {
		// データベースに接続
		$dbh = new PDO(DNS, DB_USER, DB_PSWD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo '接続できませんでした。理由：'.$e->getMessage();
		exit();
	}
	return $dbh;
}

/**
* DB関連：クエリを実行しその結果を配列で取得
*/
function get_as_array($dbh, $sql, $val=array()) {
	try {
		// SQL文を実行する準備
		$stmt = $dbh->prepare($sql);
		// SQLを実行
		if(is_array($val) && count($val) > 0) {
			$stmt->execute($val); //引数あり
		} else {
			$stmt->execute();
		}
		// レコードの取得
		$rows = $stmt->fetchAll();
	} catch (PDOException $e) {
		echo '接続できませんでした。理由：'.$e->getMessage();
		exit();
	}
	return $rows;
}

/**
* DB関連：insert/update/deleteを実行
*/
function execute_db($dbh, $sql, $val=array()) {
	try {
		// SQL文を実行する準備
		$stmt = $dbh->prepare($sql);
		// SQLを実行
		if(is_array($val) && count($val) > 0) {
			$stmt->execute($val); //引数あり
		} else {
			$stmt->execute();
		}
	} catch (PDOException $e) {
		return false;
	}
	return true;
}
