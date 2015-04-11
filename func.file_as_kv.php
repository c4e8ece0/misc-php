<?php

// --------------------------------------------------------------------------
// Преобразование файла в хеш
// --------------------------------------------------------------------------

function file_as_kv($path) {
	$res = array();
	$arr = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach($arr as $k=>$v) {
		list($a, $b) = explode("\t", $v."\t");
		$a = trim($a);
		$b = trim($b);
		$res[$a] = $b;
	}
	return $res;
}

?>