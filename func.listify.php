<?php

// --------------------------------------------------------------------------
// Разбивка строки по токену + стандартная зачистка
// --------------------------------------------------------------------------

function listify($str, $delim = "\n") {
	return array_values(array_filter(
		array_map(
			"trim",
			explode($delim, (string) $str)
		),
		"strlen"
	));
}

?>