<?php
/**
* ログインチェック
*/
function check_login() {
	if(isset($_SESSION['LOGIN']['id'])) {
		return true;
	} else {
		return false;
	}
}

/**
* ログアウト
*/
function logout() {
	$_SESSION['LOGIN'] = [];
}

/**
* ログイン処理
*/
function login($dbh, $email, $password) {
	// SQL生成
	$sql = 'SELECT id FROM ec_user WHERE email = ? AND password = ?';
	$val = [$email, md5($password)];
	// クエリ実行
	$ret = get_as_array($dbh, $sql, $val);
	if(count($ret) > 0) {
		return $ret[0]['id'];
	} else {
		return false;
	}
}

/**
* ログイン処理
*/
function get_name_by_id($dbh, $id) {
	// SQL生成
	$sql = 'SELECT name FROM ec_user WHERE id = ?';
	$val = [$id];
	// クエリ実行
	$ret = get_as_array($dbh, $sql, $val);
	if(count($ret) > 0) {
		return $ret[0]['name'];
	} else {
		return '';
	}
}
