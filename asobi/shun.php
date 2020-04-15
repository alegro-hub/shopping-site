<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

	$tsuki = $_POST['tsuki'];

	$yasai = array('','ブロッコリー','カリフラワー','レタス','みつば','アスパラガス','セロリ','ナス','ピーマン','オクラ','さつまいも','大根','ほうれんそう');

	echo $tsuki;
	echo '月は';
	echo $yasai[$tsuki];
	echo 'が旬です。';
	
?>

</body>
</html>