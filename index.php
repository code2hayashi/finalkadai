<?php
session_start();

// 設定ファイル読み込み
require_once './conf/const.php';
// 関数ファイル読み込み
require_once './model/function.php';
// model読み込み
require_once './model/login.php';
require_once './model/item.php';
require_once './model/cart.php';

// 初期設定
$data = [];
$err_msg = [];
$result_msg = "";

// DB接続
$dbh = get_db_connect();

// POST時の処理
if(get_request_method() === "POST") {
	$mode = get_post_data("mode");
	if($mode === "insert_cart") {
		// 未ログインの場合はログインページへ遷移
		if(check_login() !== TRUE) {
			header("Location: ./login.php");
			exit();
		}

		// カートへの追加処理
		$item_id = get_post_data("item_id");
		add_cart($item_id);

		// メッセージ
		$result_msg = "カートに追加しました";
	}
}

// 商品一覧取得
$data = get_item_list($dbh);

// テンプレートファイル読み込み
include_once './view/slideshow.php';
