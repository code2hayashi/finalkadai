<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>CodeSHOP</title>
    <link type="text/css" rel="stylesheet" href="./lib/slideshow.css">
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
			<div class="login_form">
				<dl>
					<dt>名前</dt>
					<dd><?php print $name; ?></dd>
					<dt>メールアドレス</dt>
					<dd><?php print $email; ?></dd>
					<dt>パスワード</dt>
					<dd><?php print str_repeat("●", strlen($password)); ?></dd>
				</dl>
				<div class="login_submit">
					<input type="hidden" name="name" value="<?php print $name; ?>">
					<input type="hidden" name="email" value="<?php print $email; ?>">
					<input type="hidden" name="password" value="<?php print $password; ?>">
					<input type="submit" name="regist" value="確認">
				</div>
			</div>
		</form>
    </div>
</body>
</html>
