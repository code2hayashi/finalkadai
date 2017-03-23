
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>CodeSHOP</title>
    <link type="text/css" rel="stylesheet" href="./lib/style.css">
</head>
<body>
    <header>
        <div class="header-box">
          <a class="mangashop" href="./">
              📕MANGASHOP
          </a>
            <?php if(check_login()) { ?>
            <a href="logout.php" class="menu">[ログアウト]</a>
            <a href="cart.php" class="menu">[カート]</a>
            <p class="menu"><?php print $_SESSION['LOGIN']['name']; ?>さん</p>
            <?php } else { ?>
            <a href="regist.php" class="menu">[会員登録]</a>
            <a href="login.php" class="menu">[ログイン]</a>
            <?php } ?>
        </div>
    </header>
    <div class="content">
		<?php if (!empty($result_msg)) { //結果メッセージ ?>
        <p class="msg"><?php print $result_msg; ?></p>
		<?php } ?>
		<?php foreach ($err_msg as $value) { //エラーメッセージ ?>
	    <p><?php print $value; ?></p>
		<?php } ?>
        <ul class="item-list">

			<?php foreach ($data as $value)  { ?>
            <li>
                <div class="item">
                    <form action="./" method="post">
                        <img class="item-img" src="<?php print IMG_DIR; ?>boy<?php print $value['id']; ?>.png" >
                        <div class="item-info">
                            <span class="item-name"><?php print $value['name']; ?></span>
                            <span class="item-price">¥<?php print $value['price']; ?></span>
                        </div>
						<?php if ($value['stock'] > 0) { ?>
						    <input class="cart-btn" type="submit" value="カートに入れる">
						<?php } else { ?>
						    <p class="sold-out" >売り切れ</p>
						<?php } ?>
                        <input type="hidden" name="item_id" value="<?php print $value['id']; ?>">
                        <input type="hidden" name="mode" value="insert_cart">
                    </form>
                </div>
            </li>
			<?php } ?>

        </ul>
    </div>
</body>
</html>
