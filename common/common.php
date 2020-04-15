<?php

	function gengo($seireki){
		if($seireki >= 1868){
			if($seireki <=1911){
				return '明治';
			} else if($seireki <=1925){
				return '大正';
			} else if($seireki <=1988){
				return '昭和';
			} else {
				return '平成';
			}
		}else{
			return '明治以前のため、わかりません';
		}
	}
	
	function sanitize($before){
		foreach($before as $key =>$value){
			$after[$key]=htmlspecialchars($value,ENT_QUOTES,'UTF-8');
		}
		
		return $after;
	}
	
	function pulldown_year(){
		echo '<select name="year">';
		echo '<option value="2017">2017</option>';
		echo '<option value="2018">2018</option>';
		echo '<option value="2019">2019</option>';
		echo '<option value="2020">2020</option>';
		echo '</select>';
	}
	
	function pulldown_month(){
		echo '<select name="month">';
		echo '<?php for($i=1;$i<=12;$i++): ?>';
		echo '<option value="<?php echo floor($i/10).$i%10 ?> "><?php echo floor($i/10).$i%10 ?></option>';
		echo '<?php endfor ?>';
		echo '</select>';
	}
	
	function pulldown_day(){
		echo '<select name="day">';
		echo '<?php for($i=1;$i<=31;$i++): ?>';
		echo '<option value="<?php echo floor($i/10).$i%10 ?> "><?php echo floor($i/10).$i%10 ?></option>';
		echo '<?php endfor ?>';
		echo '</select>';
	}

?>

