<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

	$mbango = $_POST['mbango'];

	$hoshi = array('M1'=>'カニ星雲','M31'=>'アンドロメダ大星雲','M42'=>'オリオン大星雲','M45'=>'すばる','M57'=>'ドーナツ星雲');

	echo 'あなたが選んだ星は、';
	echo $hoshi[$mbango];
	
?>

</body>
</html>