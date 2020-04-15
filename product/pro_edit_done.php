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

	require_once('../common/common.php');
	
	$post=sanitize($_POST);

	try{
		$pro_name = $post['name'];
		$pro_price = $post['price'];
		$pro_code = $post['code'];
		$pro_gazou_name = $post['gazou_name'];
		$pro_gazou_name_old = $post['gazou_name_old'];
		
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql = 'UPDATE mst_product SET name =?,price=?,gazou=? WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_name;
		$data[] = $pro_price;
		if($pro_gazou_name !=''){
			$data[] = $pro_gazou_name;
		} else {
			$data[] = $pro_gazou_name_old;
		}
		$data[] = $pro_code;
		$stmt->execute($data);
		
		$dbh = null;
		
		if($pro_gazou_name !='' && $pro_gazou_name_old != ''){
			unlink('./gazou/'.$pro_gazou_name_old);
		}
				
	}	catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

	
?>

修正しました。<br />
<br />

<a href="pro_list.php">戻る</a>

	
</body>
</html>