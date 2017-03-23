<?php
/**
* ec_user会員テーブルモデル
* /

/**
* 会員の一覧を取得
*/
function get_user_list($dbh) {
	// SQL生成
	$sql = 'SELECT * FROM ec_user';
	// クエリ実行
	return get_as_array($dbh, $sql);
}

/**
* 特定の会員情報を取得
*/
function get_user_data($dbh, $id) {
	// SQL生成
	$sql = 'SELECT * FROM ec_user WHERE id = ?';
	$val = [$id];
	// クエリ実行
	return get_as_array($dbh, $sql, $val);
}

/**
* 新規会員を追加
*/
function insert_user($dbh, $name, $email, $password) {
	// SQL生成
	$sql = 'INSERT INTO ec_user (name, email, password, created_date) VALUES (?, ?, ?, now())';
	$val = [$name, $email, $password];
	// クエリ実行
	return execute_db($dbh, $sql, $val);
}


/**
* 会員パスワードを変更
*/
function update_user_password($dbh, $id, $password) {
	// SQL生成
	$sql = 'UPDATE ec_user SET password = ?, updated_date = now() WHERE id = ? LIMIT 1';
	$val = [md5($password), $id];
	// クエリ実行
	return execute_db($dbh, $sql, $val);
}
