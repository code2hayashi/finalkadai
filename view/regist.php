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
        </div>
    </header>
    <div class="content">
		<form action="regist.php" method="post">
			<div class="login_error">
				<?php foreach ($err_msg as $value) { //エラーメッセージ ?>
			    <p><?php print $value; ?></p>
				<?php } ?>
			</div>
			<div class="login_form">
				<dl>
					<dt>名前</dt>
					<dd><input type="text" name="name" value=""></dd>
					<dt>メールアドレス</dt>
					<dd><input type="text" name="email" value=""></dd>
					<dt>パスワード</dt>
					<dd><input type="text" name="password" value=""></dd>
				</dl>
				<div class="login_submit">
					<input type="submit" name="confirm" value="登録">
				</div>
			</div>
		</form>
    </div>
</body>
</html>
