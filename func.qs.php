<?php

#------------------------------------------------------------------------------
# Сборка параметров QUERY_STRING (2-й вариант)
# Принимает:
# 1. Либо один массив из пар ключ-значение
# 2. Либо список из ключей и их значений
#------------------------------------------------------------------------------

function qs(){
	$res = array();
	$arr = array();

	if(func_num_args() == 1) {
		$arr = func_get_arg(0);
	} else {
		$pre = func_get_args(1);
		$num = count($pre);
		$keys = array();
		$vals = array();
		for($i=0; $i < $num; $i+=2) {
			$keys[] = $pre[$i];
			$vals[] = $pre[$i+1];
		}
		$arr = array_combine($keys, $vals);
	}

	foreach($arr as $k=>$v) {
		$res[$k] =  utf8_encode($v);
	}

	foreach($res as $k=>$v) {
		if(empty($v)) {
			unset($res[$k]);
		}
	}

	return $res ? '?' . http_build_query($res) : ''; 
}

?>