<?php
	session_start();
	session_regenerate_id(true);
	if(isset($_SESSION['login'])==false){
		echo 'ログインされていません。<br />';
		echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
		exit();
	} else {
		echo $_SESSION['staff_name'];
		echo 'さんログイン中<br /><br />';
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
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql = 'SELECT * FROM mst_product WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $procode;
		$stmt->execute($data);
		
		$dbh = null;
		
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo '商品修正<br /><br />';
		echo '商品コード<br />';
		echo $procode;
		echo '<br />';
		echo '<form method="post" action="pro_edit_check.php" enctype="multipart/form-data">';
		echo '<input type="hidden" name="code" value="'.$procode.'">';
		echo '<input type="hidden" name="gazou_name_old" value="'.$rec['gazou'].'">';
		echo '商品名を入力してください。<br />';
		echo '<input type="text" name="name" style="width:200px" value="'.$rec['name'].'"><br />';
		echo '価格を入力してください。<br />';
		echo '<input type="text" name="price" style="width:50px" value="'.$rec['price'].'"><br />';
		echo '画像を選んでください。<br />';
		echo '<input type="file" name="gazou" style="width:400px"><br />' ;
		if($rec['gazou']!=''){
			echo '<img src="./gazou/'.$rec['gazou'].'"><br />';
		}
		echo '<br /><br />';
		echo '<input type="button" onclick="history.back()" value="戻る">';
		echo '<input type="submit" value="OK">';
		echo '</form>';
	}	catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}
	
?>
	

</body>
</html>