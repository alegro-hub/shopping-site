<?php
	require_once('../common/common.php');
	
	$post=sanitize($_POST);

	try{
		$member_email=$post['email'];
		$member_pass=$post['pass'];
		echo $member_pass;
		echo '<br />';
		$member_pass=md5($member_pass);
		
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql = 'SELECT * FROM dat_member WHERE password=? AND email=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $member_pass;
		$data[] = $member_email;
		$stmt->execute($data);
		
		$dbh = null;
		
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($rec==false){
			echo $member_pass.$member_email.'メールアドレスかパスワードが間違っています。<br />';
			echo '<a href="member_login.html">戻る</a>';
		} else {
			session_start();
			$_SESSION['member_login']=1;
			$_SESSION['member_code']=$rec['code'];
			$_SESSION['member_name']=$rec['name'];
			header('Location:shop_list.php');
			exit();
		}
	} catch(Exception $e){
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}
	
?>