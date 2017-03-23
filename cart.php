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

// 未ログインの場合はログインページへ遷移
if(check_login() !== TRUE) {
	header("Location: ./login.php");
	exit();
}

// 初期設定
$err_msg = [];

// DB接続
$dbh = get_db_connect();

// POST時の処理
if(get_request_method() === "POST") {
	$mode = get_post_data("mode");
	$item_id = get_post_data("item_id");
	if($mode === "delete_cart") {
		// カートから商品削除処理
		delete_cart($item_id);
	} else
	if($mode === "change_cart") {
		// カートから商品変更処理
		$select_amount = get_post_data("select_amount");
		change_cart($item_id, $select_amount);
	}
}

// カート取得
$cart = get_cart();

// カート詳細をデータベースから取得
$data = array();
$sum_price = 0;
foreach($cart as $item_id => $amount) {
	// 商品IDを指定して商品情報を取得
	list($item) = get_item_data($dbh, $item_id);

	// 商品情報をあわせてカート情報を配列$dataに追加
	$data[] = array(
		'item_id' => $item_id, // 商品ID
		'amount'  => $amount, // 商品金額
		'name'    => $item['name'], // 商品名
		'price'   => $item['price'], // 商品金額
		'img'     => IMG_DIR . 'boy' . $item_id . '.png', // 商品画像名
	);

	// 合計金額算出
	$sum_price += $item['price'] * $amount;
}

// テンプレートファイル読み込み
include_once './view/cart.php';
