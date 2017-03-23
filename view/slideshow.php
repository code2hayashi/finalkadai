
<!DOCTYPE html>
<html>
<head lang="ja">
  <meta charset="utf-8">
  <title>slideshow</title>
  <link href="./lib/jquery.bxslider.css" rel="stylesheet" />
  <link href="./lib/slideshow.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="./lib/jquery.bxslider.min.js"></script>


  <script type="text/javascript">
            $(document).ready(function(){
                $('.bxslider').bxSlider({
                    auto: true,
                });
        	});
  </script>


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
  <ul class="bxslider">
    <form method="post" action="buy.php">
  	<li><input type="image" class="p100" src="./img/p100.png"></li>
    </form>
    <form method="post" action="buy.php">
  	<li><input type="image" class="p99" src="./img/p99.png"></li>
    </form>
    <form method="post" action="buy.php">
  	<li><input type="image" class="p98" src="./img/p98.png"></li>
    </form>
  </ul>
  <form method="post" action="anchorcart.php">

      <input class="anchor" type="submit" name="anchor" value="自身のおすすめの漫画を探す">


  </form>
  <footer>
      <div class="footer-box"> &copy; copyright
      </div>
  </footer>
</body>
</html>
