<?php

// --------------------------------------------------------------------------
// Упрощение текста для тизеров
// --------------------------------------------------------------------------

function simplify($t, $len = 200) {
	$t = preg_replace('/<script.*?<\/script>/isu', '', $t);
	$t = preg_replace('/<style.*?<\/style>/isu', '', $t);
	$t = strip_tags($t);
	$t = str_replace('&nbsp;', ' ', $t);
	$t = preg_replace('/\s+/isu', ' ', trim($t));

	if(mb_strlen($t) > $len + 20) {
		$min = $len + 20;

		foreach(array($len + 20, 
			mb_strpos($t, ' ', $len),
			mb_strpos($t, ',', $len),
			mb_strpos($t, '.', $len),
			mb_strpos($t, '!', $len),
			mb_strpos($t, '?', $len),
			mb_strpos($t, ':', $len),
		) as $l )
		{
			if($l !== false && $l < $min) {
				$min = $l;
			}
		}
		$t = mb_substr($t, 0, $min);
	}

	return trim($t);
}

?>