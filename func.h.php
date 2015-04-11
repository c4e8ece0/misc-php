<?php

// --------------------------------------------------------------------------
// Подготовка пользовательских данных для вывода в html
// --------------------------------------------------------------------------

function h($arr) {
	if($arr == null) {
		$arr = '';
	}

	if(is_scalar($arr)) {
		$arr = htmlspecialchars($arr);
		$arr = str_replace( // tpl special case
			array('%', '{', '}'),
			array('&#x25;', '&#x7b;', '&#x7d;'),
			$arr
		);
	} else {
		$arr = (array) $arr;
		foreach($arr as $k=>$v) {
			$arr[$k] = h($v);
		}
	}

	return $arr;
}

?>