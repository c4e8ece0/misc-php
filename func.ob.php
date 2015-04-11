<?php

// --------------------------------------------------------------------------
// Кеширование результатов работы функции
// --------------------------------------------------------------------------

function ob($name) {
	$t = '';

	$arg = func_num_args() > 1 ? array_slice(func_get_args(), 1) : array();

	if(!function_exists($name) && IS_DEVELOPMENT) {
		$t = '<div class="err">func not exists ' . h($name) . '</div>';
	} else {
		ob_start();
		call_user_func_array($name, $arg);
		$t = ob_get_clean();
	}

	return $t;
}

?>