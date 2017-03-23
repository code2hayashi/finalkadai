<?php
session_start();

// 設定ファイル読み込み
require_once './conf/const.php';
// 関数ファイル読み込み
require_once './model/function.php';
// model読み込み
require_once './model/login.php';

// 初期設定
$err_msg = [];

// POST時の処理
if(get_request_method() === "POST") {

	// $_POSTから値を取得
	$email = get_post_data('email');
	$password = get_post_data('password');

	// 入力チェック
	if($email === '') {
		$err_msg[] = 'メールアドレスが未入力です。';
	}
	if($password === '') {
		$err_msg[] = 'パスワードが未入力です。';
	}

	// DB接続
	$dbh = get_db_connect();

	// ログインできたらトップに戻る
	$id = login($dbh, $email, $password);
	if($id) {
		// セッションにログイン情報記録
		$_SESSION['LOGIN']['id'] = $id;
		$_SESSION['LOGIN']['name'] = get_name_by_id($dbh, $id);

		// トップに遷移
		header("Location: ./");
		exit();
	}
}

// テンプレートファイル読み込み
include_once './view/login.php';
