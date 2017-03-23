<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>anchor</title>
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
  <div class="body">
  <h1 class="anchort">アンケート</h1>
  <h2 class="janle">あなたが好きなマンガのジャンルは？
    </h2>
  <form method="post">
    <input type="checkbox" name="boy" value="少年漫画"> 少年漫画
    <input type="checkbox" name="girl" value="少女漫画"> 少女漫画
    <input type="checkbox" name="sport" value="スポーツ漫画"> スポーツ漫画　
    <input type="submit" value="検索">
    </form>






    <?php if (isset($_POST['boy'])) {


      $image_rand = array(
          "./img/boy1.png",
          "./img/boy2.png",
          "./img/boy3.png",
          "./img/boy4.png",
          "./img/boy5.png",
          "./img/boy6.png",
          "./img/boy7.png",
          "./img/boy8.png",
          "./img/boy9.png",
          "./img/boy10.png",
          "./img/boy11.png",
          "./img/boy12.png",

      );

      shuffle($image_rand);
      for ($i = 0 ; $i < 3 ; $i++){
      echo '<img src="'.$image_rand[$i].'" alt="">';
   }
 }
    ?>



          <?php if (isset($_POST['girl'])) {


            $image_rand2 = array(
                "./img/boy13.png",
                "./img/boy14.png",
                "./img/boy15.png",
                "./img/boy16.png",
                "./img/boy17.png",
                "./img/boy18.png",
                "./img/boy19.png",
                "./img/boy20.png",
                "./img/boy21.png",
                "./img/boy22.png",
                "./img/boy23.png",
                "./img/boy24.png",

            );

            shuffle($image_rand2);
            for ($i = 0 ; $i < 3 ; $i++){
            echo '<img src="'.$image_rand2[$i].'" alt="">';
         }
          }
            ?>


                <?php if (isset($_POST['sport'])) {


                  $image_rand3 = array(
                      "./img/boy25.png",
                      "./img/boy26.png",
                      "./img/boy27.png",
                      "./img/boy28.png",
                      "./img/boy30.png",
                      "./img/boy31.png",
                      "./img/boy32.png",
                      "./img/boy33.png",
                      "./img/boy34.png",
                      "./img/boy35.png",
                      "./img/boy36.png",

                  );

                  shuffle($image_rand3);
                  for ($i = 0 ; $i < 3 ; $i++){
                  echo '<img src="'.$image_rand3[$i].'" alt="">';
               }
                }
                  ?>
                  <form method="GET" action="./buy.php">
                    <input class="lastbutton" type="submit" value="購入画面へ">
                    </form>








</div>
</body>
</html>
