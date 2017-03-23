<?php
/**
* カートモデル(カートはセッション$_SESSION['CART']を使用)
* /

/**
* カート取得
*/
function get_cart() {
	if(!isset($_SESSION['CART'])) {
		$_SESSION['CART'] = [];
	}
	return $_SESSION['CART'];
}

/**
* カートに追加
*/
function add_cart($item_id) {
	if(isset($_SESSION['CART'][$item_id])) { // すでにカートにその商品が追加されていたら個数増加
		$_SESSION['CART'][$item_id]++;
	} else { // カートにその商品が追加されていなければ新規に個数1で追加
		$_SESSION['CART'][$item_id] = 1;
	}
	return $_SESSION['CART'][$item_id];
}

/**
* カートから削除
*/
function delete_cart($item_id) {
	if(!isset($_SESSION['CART'])) {
		$_SESSION['CART'] = [];
	}
	if(isset($_SESSION['CART'][$item_id])) { // カートにその商品が追加されていたら消去
		unset($_SESSION['CART'][$item_id]);
	}
	return $_SESSION['CART'];
}

/**
* カートを変更
*/
function change_cart($item_id, $amount=1) {
	if(!isset($_SESSION['CART'])) {
		$_SESSION['CART'] = [];
	}
	if(isset($_SESSION['CART'][$item_id])) { // カートにその商品が追加されていたら個数変更
		$_SESSION['CART'][$item_id] = (int)$amount;
	}
	return $_SESSION['CART'];
}
