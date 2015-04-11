<?php

// --------------------------------------------------------------------------
// Выделение из списка хешей значений по заданному ключу
// --------------------------------------------------------------------------

function af($arr, $name='', $uniq = 1) {
	$rrr = array();
	$n   = count($arr);

	if(!is_array($arr)) {
		$arr = (array) $arr;
	}

	if($name) {
		foreach($arr as $k=>$v) {
			if(isset($v[$name])) {
				$rrr[] = $v[$name];
			}
		}
	} else {
		foreach($arr as $k=>$v) {
			foreach($v as $a=>$b) {
				$rrr[] = $b;
			}
		}
	}

	if($uniq) {
		return array_unique($rrr);
	}

	return $rrr;
}

?>