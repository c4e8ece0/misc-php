<?php

// --------------------------------------------------------------------------
// Приведение объекта stdClass к array()
// например после json_decode()
// --------------------------------------------------------------------------

function as_array($obj) {
	$res = array();
	if(is_scalar($obj)) {
		return $obj;
	}
	foreach((array) $obj as $k=>$v) {
		$res[$k] = as_array($v);
	}
	return $res;
}

?>