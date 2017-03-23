<?php
/**
* ec_order注文テーブルモデル
* /


/**
* 新規商品を追加
*/
function insert_order($dbh, $user_id, $price, $cart) {
	try {
		$dbh->beginTransaction();

		// 注文概要
		// SQL生成
		$sql = 'INSERT INTO ec_order (user_id, price, created_date) VALUES (?, ?, now())';
		$val = [$user_id, $price];
		// クエリ実行
		execute_db($dbh, $sql, $val);
		$order_id = $dbh->lastInsertId();

		// 注文詳細
		foreach($cart as $v) {
			// SQL生成
			$sql = 'INSERT INTO ec_order_detail (order_id, item_id, amount, price, created_date) VALUES (?, ?, ?, ?, now())';
			$val = [$order_id, $v['item_id'], $v['amount'], $v['price']];
			// クエリ実行
			execute_db($dbh, $sql, $val);
		}

		$dbh->commit();
		$ret = TRUE;
	} catch (PDOException $e) {
		$dbh->rollBack();
		echo "失敗しました。" . $e->getMessage();
		$ret = FALSE;
  	}
  	return $ret;
}
