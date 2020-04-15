<?php
	session_start();//セッションはじめる
	session_regenerate_id(true);//セッションハイジャック対策
	//ログインチェック
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

ダウンロードしたい注文日を選んでください。<br />

<form method="post" action="order_download_done.php">
	<select name="year">
		<option value="2017">2017</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		<option value="2020">2020</option>
	</select>
	年
	<select name="month">
		<?php for($i=1;$i<=12;$i++): ?>
			<option value="<?php echo floor($i/10).$i%10 ?> "><?php echo floor($i/10).$i%10 ?></option>
		<?php endfor ?>
	</select>
	
	月
	<select name="day">
		<?php for($i=1;$i<=31;$i++): ?>
			<option value="<?php echo floor($i/10).$i%10 ?> "><?php echo floor($i/10).$i%10 ?></option>
		<?php endfor ?>	
	</select>
	
	日<br />
	<br />
	
	<input type="submit" value="ダウンロードへ">
</form>

</body>
</html>