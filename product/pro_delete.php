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
		
		echo '商品削除<br /><br />';
		echo '商品コード<br />';
		echo $procode;
		echo '<br />';
		echo '商品名<br />';
		echo $rec['name'];
		echo '<br />';
		echo '価格<br />';
		echo $rec['price'];
		echo '<br />';
		if($rec['gazou']!=''){
			echo '<img src="./gazou/'.$rec['gazou'].'">';
		}
		echo '<br /><br />';
		echo '本当に削除してよろしいですか？';
		echo '<br /><br />';
		echo '<form method="post" action="pro_delete_done.php">';
		echo '<input type="hidden" name="code" value="'.$procode.'"> ';
		echo '<input type="hidden" name="gazou_name" value="'.$rec['gazou'].'">';
		echo '<input type="button" onclick="history.back()" value="戻る">';
		echo '<input type="submit" value="OK">';
	} catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

?>
	

</body>
</html>