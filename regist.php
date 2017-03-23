<?php
session_start();

// 設定ファイル読み込み
require_once './conf/const.php';
// 関数ファイル読み込み
require_once './model/function.php';
// model読み込み
require_once './model/user.php';

// 初期設定
$err_msg = [];

// DB接続
$dbh = get_db_connect();

// POST時の処理
if(get_request_method() === "POST") {

	if(isset($_POST['confirm'])) { // 確認画面
		// $_POSTから値を取得
		$name = get_post_data('name');
		$email = get_post_data('email');
		$password = get_post_data('password');

		// 入力チェック
		if($name === '') {
			$err_msg[] = '名前が未入力です。';
		}
		if($email === '') {
			$err_msg[] = 'メールアドレスが未入力です。';
		}
		if($password === '') {
			$err_msg[] = 'パスワードが未入力です。';
		}

		if(count($err_msg) === 0) {
			$_SESSION['REGIST'] = array(
				'name' => $name,
				'email' => $email,
				'password' => $password,
			);

			// テンプレートファイル読み込み
			include_once './view/regist_confirm.php';
			exit();
		}
	} else
	if(isset($_POST['regist'])) { // 完了画面
		// $_POSTから値を取得
		$name = get_post_data('name');
		$email = get_post_data('email');
		$password = get_post_data('password');

		// 入力チェック
		if($name === '' || $email === '' || $password === '') {
			header("Location: ./regist.php");
			exit();
		}

		// 登録処理
		insert_user($dbh, $name, $email, md5($password));

		// セッション削除
		$_SESSION['REGIST'] = [];

		// テンプレートファイル読み込み
		include_once './view/regist_done.php';
		exit();
	}
}

// テンプレートファイル読み込み
include_once './view/regist.php';
