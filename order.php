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
require_once './model/order.php';

// 未ログインの場合はログインページへ遷移
if(check_login() !== TRUE) {
	header("Location: ./login.php");
	exit();
}

// 初期設定
$err_msg = [];

// DB接続
$dbh = get_db_connect();

// カート取得
$cart = get_cart();

// POST時の処理
if(get_request_method() === "POST") {

	// セッションからカート情報取得
	$data = array();
	$sum_price = 0;
	foreach($cart as $item_id => $amount) {
		// 商品IDを指定して商品情報を取得
		list($item) = get_item_data($dbh, $item_id);

		$data[] = array(
			'item_id' => $item_id, // 商品ID
			'amount'  => $amount, // 商品金額
			'name'    => $item['name'], // 商品名
			'price'   => $item['price'], // 商品金額小計
			'img'     => IMG_DIR . 'p' . $item_id . '.png', // 商品画像名
		);

		// 合計金額算出
		$sum_price += $item['price'] * $amount;
	}

	// 登録処理
	insert_order($dbh, $_SESSION['LOGIN']['id'], $sum_price, $data);

	// セッション削除
	$_SESSION['CART'] = [];

	// テンプレートファイル読み込み
	include_once './view/order.php';
	exit();
}

// 直接アクセスは強制的にトップに遷移
header("Location: ./");
exit();
