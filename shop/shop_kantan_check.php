<?php
	session_start();
	session_regenerate_id(true);
	echo 'ようこそ';	
	echo $_SESSION['member_name'];
	echo '様　';
	echo '<a href="member_logout.php">ログアウト</a><br />';
	echo '<br />';		
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php
	
	$member_code=$_SESSION['member_code'];
	$member_name=$_SESSION['member_name'];
	
	try{
			
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql = 'SELECT * FROM dat_member WHERE name=? AND code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $member_name;
		$data[] = $member_code;
		$stmt->execute($data);
		
		$dbh = null;
		
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	
		$onamae=$rec['name'];
		$email=$rec['email'];
		$postal1=$rec['postal1'];
		$postal2=$rec['postal2'];
		$address=$rec['address'];
		$tel=$rec['tel'];
		
		echo 'お名前<br />';
		echo $onamae;
		echo '<br /><br />';
		echo 'メールアドレス<br />';
		echo $email;
		echo '<br /><br />';
		echo '郵便番号<br />';
		echo $postal1.'-'.$postal2;
		echo '<br /><br />';
		echo '住所<br />';
		echo $address;
		echo '<br /><br />';
		echo '電話番号<br />';
		echo $tel;
		echo '<br /><br />';
		
		
		echo '<form method="post" action="shop_kantan_done.php">';
		echo '<input type = "hidden" name ="email" value="'.$email.'">';
		echo '<input type = "hidden" name ="postal1" value="'.$postal1.'">';
		echo '<input type = "hidden" name ="postal2" value="'.$postal2.'">';
		echo '<input type = "hidden" name ="address" value="'.$address.'">';
		echo '<input type = "hidden" name ="tel" value="'.$tel.'">';
		echo '<input type = "button" onclick = "history.back()" value ="戻る">';
		echo '<input type = "submit" value = "OK"><br />';
		echo '</form>';
		
	}catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}
	

	
?>
	
</body>
</html>