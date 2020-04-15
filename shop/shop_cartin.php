<?php
	session_start();
	session_regenerate_id(true);
	if(isset($_SESSION['member_login'])==false){
		echo 'ようこそゲスト様　';
		echo '<a href="member_login.html">会員ログイン</a><br />';
		echo '<br />';
		
	} else {
		echo 'ようこそ';	
		echo $_SESSION['member_name'];
		echo '様　';
		echo '<a href="member_logout.php">ログアウト</a><br />';
		echo '<br />';
		
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

	$procode = $_GET['procode'];
	
	try{
	
		if(isset($_SESSION['cart'])==true){
			$cart = $_SESSION['cart'];
			$kazu = $_SESSION['kazu'];
			
			if(in_array($procode,$cart)==true){
				echo 'その商品はすでにカートに入っています。<br />';
				echo '<a href="shop_list.php">商品一覧に戻る</a>';
				exit();
			}
		}
		
		$cart[]=$procode;
		$kazu[]=1;
		$_SESSION['cart']=$cart;
		$_SESSION['kazu']=$kazu;
		
		
		foreach($cart as $key => $val){
			echo $key;
			echo $val;
			echo '<br />';
		}

	}	catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}
	
?>
	
カートに追加しました。<br />
<br />
<a href="shop_list.php">商品一覧に戻る</a>


</body>
</html>