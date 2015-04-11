<?php

// --------------------------------------------------------------------------
// Выделение из списка хешей значений по заданному ключу
// --------------------------------------------------------------------------

function flat_arr($t) {
	$res = array();
	$arr = is_scalar($t) ? array($t) : array_values($t);
	$n   = count($arr);

	for($i=0; $i<$n; $i++) {
		if(is_array($arr[$i])) {
			$r = flat_arr($arr[$i]);
			$k = count($r);

			for($j=0; $j<$k; $j++) {
				$res[] = $r[$j];
			}
		} else {
			$res[] = $arr[$i];
		}
	}
	return $res;
}

?>