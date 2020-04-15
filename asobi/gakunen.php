<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

	$gakunen = $_POST['gakunen'];
	
	switch($gakunen){
		case 1:
			echo 'あなたの校舎は南校舎です。';
			break;
		
		case 2:
			echo 'あなたの校舎は西校舎です。';
			break;
		
		case 3:
			echo 'あなたの校舎は東校舎です。';
			break;
		
		default:
			echo 'あなたの校舎は3年生と同じです。';
			
	}

?>

</body>
</html>