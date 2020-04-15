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

	$staffcode = $_GET['staffcode'];
	
	try{
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql = 'SELECT code,name FROM mst_staff WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staffcode;
		$stmt->execute($data);
		
		$dbh = null;
		
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	
		echo 'スタッフ削除<br /><br />';
		echo 'スタッフコード<br />';
		echo $staffcode;
		echo '<br />';
		echo 'スタッフ名<br />';
		echo $rec['name'];
		echo '<br /><br />';
		echo '本当に削除してよろしいですか？';
		echo '<br /><br />';
		echo '<form method="post" action="staff_delete_done.php">';
		echo '<input type="hidden" name=code value="'.$staffcode.'"> ';
		echo '<input type="button" onclick="history.back()" value="戻る">';
		echo '<input type="submit" value="OK">';
	} catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

?>
	

</body>
</html>